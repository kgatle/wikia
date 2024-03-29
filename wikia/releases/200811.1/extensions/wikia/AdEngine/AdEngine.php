<?php

require_once dirname(__FILE__) . '/ArticleAdLogic.php';

$wgExtensionCredits['other'][] = array(
	'name' => 'AdEngine',
	'author' => 'Inez Korczynski, Nick Sullivan'
);

interface iAdProvider {
	public static function getInstance();
	public function getAd($slotname, $slot);
	public function batchCallAllowed();
	public function addSlotToCall($slotname);
	public function getSetupHtml();
	public function getBatchCallHtml();
}

class AdEngine {

	const cacheKeyVersion = "2.01a";
	const cacheTimeout = 1800;

	// TODO: pull these from wikicities.provider
	private $providers = array(
		'1' => 'DART',
		'2' => 'OpenX',
		'3' => 'Google',
		'4' => 'GAM',
		'5' => 'PubMatic',
		'6' => 'Athena',
		'-1' => 'Null'
	);

	private $slots = array();

	private $placeholders = array();

	private $loadType = 'delayed';

	protected static $instance = false;
	
	public $bucketName = null;
	public $bucketNum = -1;

	private $bucketTests = array(
		1 => 'GAM_leaderboard', // Using Google Ad Manager for leaderboard testing
		2 => 'GAM_boxad', // Using Google Ad Manager for the box ad
                3 => 'lp', // Leaderboard placed left-center-right in current spot
                4 => 'lp', // Leaderboard placed left-center-right in current spot
                5 => 'bp', // Boxad placement
	);

	// Exclude these $wgDBname's from bucket testing
	private $handsOffWikis = array(
		'masseffect',
		'warhammeronline',
		'starcraft',
		'diablo',
		'blind'
	);

	// We treat international differently. Tier one langages see one set of ads, tier 2 see another.
	// pl, german, spanish, chinese
	private $tier1Languages = array( 'pl', 'de', 'es', 'zh');
	private $internationalSlotsTier1 = array(
		'HOME_LEFT_SKYSCRAPER_2', 
		'HOME_TOP_LEADERBOARD',
		'TOP_LEADERBOARD',
		'LEFT_SKYSCRAPER_1',
		'LEFT_SKYSCRAPER_2',
		'LEFT_SKYSCRAPER_3',
		'RIGHT_SKYSCRAPER_1'
	);

	private $internationalSlotsTier2 = array(
		'HOME_LEFT_SKYSCRAPER_2', 
		'LEFT_SKYSCRAPER_1',
		'LEFT_SKYSCRAPER_2',
		'LEFT_SKYSCRAPER_3',
		'RIGHT_SKYSCRAPER_1'
	);
		
	protected function __construct($slots = null) {
		if (!empty($slots)){
			$this->slots=$slots;
		} else {
			$this->loadConfig();
		}
		global $wgAutoloadClasses;
		foreach($this->providers as $p) {
			$wgAutoloadClasses['AdProvider' . $p]=dirname(__FILE__) . '/AdProvider'.$p.'.php';
		}
		$this->bucketNum = mt_rand(0,100);
	}

	public static function getInstance($slots = null) {
		if(self::$instance == false) {
			self::$instance = new AdEngine($slots);
		}
		return self::$instance;
	}

	// Load up all the providers. For each one, set up 

	public function getSetupHtml(){

		$out = "<!-- #### BEGIN " . __CLASS__ . '::' . __METHOD__ . " ####-->\n";

		/* TODO move this to allinone, and find a better spot for this code after I talk to Christian.
                         This is an experiment to see if moving it higher on the page makes it better */
		global $wgExtensionsPath;
		//$wgExtensionsPath='/extensions';
		$out .= '<script type="text/javascript" src="' . $wgExtensionsPath . '/wikia/AdEngine/AdEngine.js?' . self::cacheKeyVersion . '"></script>'. "\n";

		// If loading the ads inline, call the set up html for each provider.
		// If loading delayed, this is done in getDelayedAdLoading method instead.
		if ($this->loadType == 'inline'){
			foreach($this->slots as $slotname => $slot) {
                        	$AdProvider = $this->getAdProvider($slotname);        
                        	// Get setup HTML for each provider. May be empty.
                        	$out .= $AdProvider->getSetupHtml();
                        }
		}

		$out .= "<!-- #### END " . __CLASS__ . '::' . __METHOD__ . " ####-->\n";
			
		return $out;
	}

	public function loadConfig() {
		global $wgMemc, $wgCityId, $wgUser, $wgRequest;

                $skin_name = null;
                if ( is_object($wgUser)){
                        $skin_name = $wgUser->getSkin()->getSkinName();
                }

		$cacheKey = wfMemcKey(__CLASS__ . 'slots', $skin_name, self::cacheKeyVersion);
		$this->slots = $wgMemc->get($cacheKey);

		if(is_array($this->slots) && $wgRequest->getVal('action') != 'purge') {
			// Found a cached value
			return true;
		}

		$db = wfGetDB(DB_SLAVE);
		$ad_slot_table = wfSharedTable('ad_slot');
		$ad_slot_override_table = wfSharedTable('ad_slot_override');
		$ad_provider_value_table = wfSharedTable('ad_provider_value');

		$sql = "SELECT ad_slot.as_id, ad_slot.slot, ad_slot.size, ad_slot.load_priority,
				COALESCE(adso.provider_id, ad_slot.default_provider_id) AS provider_id,
				COALESCE(adso.enabled, ad_slot.default_enabled) AS enabled
				FROM $ad_slot_table
				LEFT OUTER JOIN $ad_slot_override_table AS adso
				  ON ad_slot.as_id = adso.as_id AND city_id=".intval($wgCityId)."
				WHERE skin='".$db->strencode($skin_name)."'";

		$res = $db->query($sql);

		while($row = $db->fetchObject($res)){
			$this->slots[$row->slot] = array(
				'as_id' => $row->as_id,
				'size' => $row->size,
				'provider_id' => $row->provider_id,
				'enabled' => $row->enabled,
				'load_priority' => $row->load_priority
			);
		}

		$sql = "SELECT * FROM $ad_provider_value_table WHERE
			 (city_id = ".intval($wgCityId)." OR city_id IS NULL) ORDER by city_id";
		$res = $db->query($sql);
		while($row = $db->fetchObject($res)) {
			 foreach($this->slots as $slotname => $slot) {
			 	if($slot['provider_id'] == $row->provider_id){
					$this->slots[$slotname]['provider_values'][] = array('keyname' => $row->keyname, 'keyvalue' => $row->keyvalue);
			 	}
			 }
		}
		$wgMemc->set($cacheKey, $this->slots, self::cacheTimeout);

		return true;
	}


	/* Category name/id is needed multiple times for multiple providers. Be gentle on our dbs by adding a thin caching layer. */
	public function getCachedCategory(){
		static $cat;
		if (! empty($cat)){
			// This function already called
			return $cat;
		}

		if (!empty($_GET['forceCategory'])){
			// Passed in through the url, or hard coded on a test_page. ;-)
			return $_GET['forceCategory'];
		}

		global $wgMemc, $wgCityId, $wgRequest;
		$cacheKey = wfMemcKey(__CLASS__ . 'category', self::cacheKeyVersion);

		$cat = $wgMemc->get($cacheKey);
		if (!empty($cat) && $wgRequest->getVal('action') != 'purge'){
			return $cat;
		}

		$hub = WikiFactoryHub::getInstance();
		$cat = array(
			'id'=>$hub->getCategoryId($wgCityId),
			'name'=>$hub->getCategoryName($wgCityId)
		);

		$wgMemc->set($cacheKey, $cat, self::cacheTimeout);
		return $cat;
	}

	// For the provided $slotname, get an ad tag.
	public function getAd($slotname) {
		$AdProvider = $this->getAdProvider($slotname);
		return $AdProvider->getAd($slotname, $this->slots[$slotname]);
	}

	// Logic for hiding/displaying ads should be here, not in the skin.
	private function getAdProvider($slotname) {
		global $wgShowAds, $wgUser, $wgLanguageCode;


		/* Note: Don't throw an exception on error. Fail gracefully for ads,
		 * don't under any circumstances fail the rendering of the page.
		 * Instead, return a "AdProviderNull" object with an error message.
		 * Note that the second parameter for AdProviderNull constructor
		 * is a boolean for whether or not to log it as an error
		 */

		// First handle error conditions
		if (empty($this->slots[$slotname])) {
			return new AdProviderNull('Unrecognized slot', true);

		} else if ($this->slots[$slotname]['enabled'] == 'No'){
			return new AdProviderNull("Slot is disabled", false);

		// As long as they are enabled via config, spotlights are always displayed...
		} else if ( AdEngine::getInstance()->getAdType($slotname) == 'spotlight' ){
			// ... and we always use Google Ad Manager
			return AdProviderGAM::getInstance();

		// Now some toggles based on preferences and logged in/out
		} else if (! ArticleAdLogic::isMandatoryAd($slotname) &&
			     empty($_GET['showads']) && $wgShowAds == false ){
			return new AdProviderNull('$wgShowAds set to false', false);

		} else if (! ArticleAdLogic::isMandatoryAd($slotname) && empty($_GET['showads']) &&
			   is_object($wgUser) && $wgUser->isLoggedIn() && !$wgUser->getOption('showAds') ){
			return new AdProviderNull('User is logged in', false);

		} else if (!empty($_GET['forceProviderid'])){
			// For debugging, allow ad providers to be forced
			return $this->getProviderFromId($_GET['forceProviderid']);

		// All of the errors and toggles are handled, now switch based on language
		} else {

			if ($wgLanguageCode == 'en' ){

				// Do bucket testing of different providers and different placements
				if ($slotname == 'TOP_LEADERBOARD' && (
				    $this->getBucketName() == 'GAM_leaderboard' ||
				    $this->getBucketName() == 'lp' ||
				    $this->getBucketName() == 'lp_at')){
					return AdProviderGAM::getInstance();
				} else if ($slotname == 'TOP_RIGHT_BOXAD' && (
				    $this->getBucketName() == 'GAM_boxad'  ||
				    $this->getBucketName() == 'bp')){
					return AdProviderGAM::getInstance();
				} else {
					return $this->getProviderFromId($this->slots[$slotname]['provider_id']);
				}
			} else if (in_array($wgLanguageCode, $this->tier1Languages)){
				
				if (!in_array($slotname, $this->internationalSlotsTier1)){
					return new AdProviderNull("Ads name not served for this language in this slot ($wgLanguageCode) ", false);
				} else {
					return AdProviderGAM::getInstance();
				}

			} else {
				if (!in_array( $slotname, $this->internationalSlotsTier2)){
					return new AdProviderNull("Ads name not served for this language in this slot ($wgLanguageCode) ", false);
				} else if (! in_array($wgLanguageCode, AdProviderGoogle::getSupportedLanguages())){
					// Google's TOS prevents serving ads for some languages
					return new AdProviderNull("Unsupported language for Google Adsense ($wgLanguageCode)", false);
				} else {
					return AdProviderGAM::getInstance();
				}
			}

		}

		// Should never happen, but be sure that an AdProvider object is always returned.
		return new AdProviderNull('Logic error in ' . __METHOD__, true);
	}


	public function getProviderFromId ($provider_id) {
		switch ($this->providers[$provider_id]){
			case 'DART': return AdProviderDART::getInstance();
			case 'OpenX': return AdProviderOpenX::getInstance();
			case 'Google': return AdProviderGoogle::getInstance();
			case 'GAM': return AdProviderGAM::getInstance();
			case 'PubMatic': return AdProviderPubMatic::getInstance();
			case 'Athena': return AdProviderAthena::getInstance();
			default: return new AdProviderNull('Unrecognized provider id', true);
		}
	}

	/* Size is stored as $widthx$size character column. Split here.
 	 * You may be asking, why not just store it as separate values to be begin with?
 	 * Because size is not always height/width. Possible values for size include:
 	 * 728x60
 	 * 300x250,300x600
 	 * 728x*
 	 *
 	 * Do the best you can to return a height/width
 	 */
        public function getHeightWidthFromSize($size){
                if (preg_match('/^([0-9]{2,4})x([0-9]{2,4})/', $size, $matches)){
                        return array('width'=>$matches[1], 'height'=>$matches[2]);
                } else if (preg_match('/^([0-9]{2,4})x\*/', $size, $matches)){
                        return array('width'=>$matches[1], 'height'=>'*');
                } else {
                        return false;
                }
        }


	/* For delayed ad loading, we have a place holder div that gets placed in the content,
	   to be loaded at the bottom of the page with an absolute position.
	   Keep track fo the placeholders for future refence */
	public function getPlaceHolderDiv($slotname, $reserveSpace=true){
		$AdProvider = $this->getAdProvider($slotname);
		// If it's a Null Ad, just return an empty comment, and don't store in place holder array.
		if ($AdProvider instanceof AdProviderNull){
			return "<div id=\"$slotname\" style=\"display:none\">'" . $AdProvider->getAd($slotname, array()) . "</div>";
		}

		$styles = array();
		$dim = self::getHeightWidthFromSize($this->slots[$slotname]['size']);
		if (!empty($dim['width'])){
			array_push($styles, "width: {$dim['width']}px;");
			array_push($styles, "height: {$dim['height']}px;");
		}

		if($this->slots[$slotname]['enabled'] == 'No' || $reserveSpace == false){
			array_push($styles, "display: none;");
		}

		$style = ' style="'. implode(" ", $styles) .'" class="wikia_ad_placeholder"';

		// We will use these at the bottom of the page for ads, if delayed ad loading is enabled
		$this->placeholders[$slotname]=$this->slots[$slotname]['load_priority'];

		// Fill in slotsToCall with a list of slotnames that will be used. Needed for getBatchCallHtml
		$AdProvider->addSlotToCall($slotname);
		
		return "<div id=\"$slotname\"$style></div>";
	}

	public function getBucketTestingCode(){
		// Bucket testing leaderboard ad placement
		$out = "<script type='text/javascript'>\n" . 
			"AdEngine.bucketTests = " . json_encode($this->bucketTests) . "\n" . 
			'AdEngine.bucketName = "' . addslashes($this->getBucketName()) . '"' . ";\n" .
			"AdEngine.doBucketTest();\n" .
			"AdEngine.bucketDebug();\n" .
			"</script>";
			
		return $out;
	}

	public function getBucketName(){
		global $wgDBname;
	        if (!is_null($this->bucketName)){
                	return $this->bucketName;
		} else if (!empty($_GET['forceBucket'])){
			// preg_replace to prevent XSS
			$this->bucketName = preg_replace('/[^a-z0-9A-Z\-\_]/', '', $_GET['forceBucket']);
			return $this->bucketName;
		} else if (in_array($wgDBname, $this->handsOffWikis)){
			$this->bucketName = '';
		} else {
			if (isset($this->bucketTests[$this->bucketNum])){
				$this->bucketName = $this->bucketTests[$this->bucketNum];
			} else {
				$this->bucketName = '';
			}
		}
	}

	public function getDelayedLoadingCode(){
		global $wgExtensionsPath;

		if (empty($this->placeholders)){
			// No delayed ads on this page
			return '<!-- No placeholders called for ' . __METHOD__ . " -->\n";
		}

		// Sort by load_priority
		asort($this->placeholders);
		$this->placeholders = array_reverse($this->placeholders);

		$out = "<!-- #### BEGIN " . __CLASS__ . '::' . __METHOD__ . " ####-->\n";

		$out .=  $this->getBucketTestingCode();
		global $wgCityId;
		$out .=  $this->providerValuesAsJavascript($wgCityId);
		
		$out .= '<script type="text/javascript">TieDivLibrary.timer()</script>' . "\n";

		// Get the setup code for ad providers used on this page. This is for Ad Providers that support multi-call.
		foreach ($this->placeholders as $slotname => $load_priority){
	                $AdProvider = $this->getAdProvider($slotname);

			// Get setup HTML for each provider. May be empty.
			$out .= $AdProvider->getSetupHtml();
		}

		foreach ($this->placeholders as $slotname => $load_priority){
			$AdProvider = $this->getAdProvider($slotname);

			// Hmm. Should we just use: class="wikia_$adtype"?
			$class = self::getAdType($slotname) == 'spotlight' ? ' class="wikia_spotlight"' : ' class="wikia_ad"';
			// This may be better, but needs more testing. $out .= '<div id="' . $slotname . '_load"' . $class . '>' . $AdProvider->getAd($slotname, $this->slots[$slotname]) . "</div>\n";
                        $out .= '<div id="' . $slotname . '_load" style="display: none; position: absolute;"'.$class.'>' . $AdProvider->getAd($slotname, $this->slots[$slotname]) . "</div>\n";


			/* This image is what will be returned if there is NO AD to be displayed.
 			 * If this happens, we want leave the div collapsed.
			 * We tried for a more elegant solution, but were a bit constrained on the
			 * code that could be returned from the ad networks we deal with.
			 * I'd like to see a better solution for this, someday
			 * See Christian or Nick for more info.
			*/
			$out .= '<script type="text/javascript">' .
				'AdEngine.displaySlotIfAd("'. $slotname .'");' .
				'TieDivLibrary.tie("'. $slotname .'");' .
				'</script>' . "\n";
		}
		$out .= "<!-- #### END " . __CLASS__ . '::' . __METHOD__ . " ####-->\n";
		return $out;
	}

	public function getPlaceHolders(){
		return $this->placeholders;
	}

	/* Sometimes there is different behavior for different types of ad. Reduce the number of
	 * hacks and hard coded slot names by providing a grouping on type of based on size.
	 * Possible return values:
	 *  "spotlight" , "leaderboard", "boxad", "skyscraper"
	 *
	 * NULL will be returned if this function is unable to determine the type of ad
	 *
	 * Long term, this should be a column in the ad_slots table. This will happen when
	 * we build the UI for managing those tables.
	 */
	public function getAdType($slotname){
		if (empty($this->slots[$slotname]['size'])){
			return NULL;
		}

		switch ($this->slots[$slotname]['size']){
			case '200x75': return 'spotlight';
			case '125x125': return 'spotlight';
			case '728x90': return 'leaderboard';
			case '300x250': return 'boxad';
			case '160x600': return 'skyscraper';
			case '120x600': return 'skyscraper';
			default: return NULL;
		}
	}


	/* Either 'delayed' or 'inline' */
	public function setLoadType($loadType){
		$this->loadType = $loadType;
		if ($loadType == 'inline'){
			// Fill in slotsToCall with a list of slotnames that will be used. Needed for getBatchCallHtml
			foreach($this->slots as $slotname => $slot) {
				$AdProvider = $this->getAdProvider($slotname);
				$AdProvider->addSlotToCall($slotname);
			}
		}
	}


	/* Odd request that I didn't have a better way to handle. Michael wanted the DART
	 * Key value string as a javascript variable. 
	 */
	public function providerValuesAsJavascript($city_id){
		global $wgMemc, $wgRequest;
		$cacheKey = wfMemcKey(__CLASS__ . 'dartkeyvalues', self::cacheKeyVersion);

		$out = $wgMemc->get($cacheKey);
		if (!empty($out) &&  $wgRequest->getVal('action') != 'purge'){
			return $out;
		}

		$db = wfGetDB(DB_SLAVE);
		$ad_provider_value_table = wfSharedTable('ad_provider_value');

                $sql = "SELECT * FROM $ad_provider_value_table WHERE
                         city_id = ".intval($city_id);
                $res = $db->query($sql);

		$list = array();
		$string = '';
                while($row = $db->fetchObject($res)) {
			$list[]= array('name'=> $row->keyname, 'value'=>$row->keyvalue);
			$string .= $row->keyname . '=' . urlencode($row->keyvalue) . ';';
                }

		$out =  '<script type="text/javascript">' . "\n" .
			'ProviderValues = {};' . "\n" . 
			'ProviderValues.list = ' . json_encode($list) . ";\n" .
			'ProviderValues.string = "' . $string . '"' . ";\n" . 
			'</script>';
		       
		$wgMemc->set($cacheKey, $out, self::cacheTimeout);

		return $out;	
	}

}
