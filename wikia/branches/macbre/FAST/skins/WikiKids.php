<?php
/**
 * Wikikids nouveau
 *
 * Translated from gwicke's previous TAL template version to remove
 * dependency on PHPTAL.
 *
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */

if( !defined( 'MEDIAWIKI' ) )
	die();

/** */
require_once('includes/SkinTemplate.php');

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class SkinWikikids extends SkinTemplate {
	/** Using wikikids. */
	function initPage( &$out ) {
		SkinTemplate::initPage( $out );
		$this->skinname  = 'wikikids';
		$this->stylename = 'wikikids';
		$this->template  = 'WikikidsTemplate';
	}
}

/**
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class WikikidsTemplate extends QuickTemplate {
	/**
	 * Template filter callback for Wikikids skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
  <head>
    <meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
    <?php print Skin::makeGlobalVariablesScript( $this->data ); ?>
    <?php $this->html('headlinks') ?>
    <title><?php $this->text('pagetitle') ?></title>
    <style type="text/css" media="screen,projection">/*<![CDATA[*/ @import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/main.css"; /*]]>*/</style>
    <link rel="stylesheet" type="text/css" <?php if(empty($this->data['printable']) ) { ?>media="print"<?php } ?> href="<?php $this->text('stylepath') ?>/common/commonPrint.css" />
    <!--[if lt IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE50Fixes.css";</style><![endif]-->    <!--[if IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE55Fixes.css";</style><![endif]-->
<!--[if IE 6]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE60Fixes.css";</style><![endif]-->
    <!--[if IE 7]>
<style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE70Fixes.css?0";</style><![endif]-->
    <!--[if lt IE 7]><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js"></script>
    <meta http-equiv="imagetoolbar" content="no" /><![endif]-->
    <?php if($this->data['jsvarurl'  ]) { ?><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl'  ) ?>"></script><?php } ?>
    <script type="<?php $this->text('jsmimetype') ?>" src="<?php                                   $this->text('stylepath' ) ?>/common/wikibits.js"></script>
    <?php if($this->data['usercss'   ]) { ?><style type="text/css"><?php              $this->html('usercss'   ) ?></style><?php    } ?>
    <?php if($this->data['userjs'    ]) { ?><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs'    ) ?>"></script><?php } ?>
    <?php if($this->data['userjsprev']) { ?><script type="<?php $this->text('jsmimetype') ?>"><?php      $this->html('userjsprev') ?></script><?php   } ?>
    <?php if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>
  </head>
  <body <?php if($this->data['body_ondblclick']) { ?>ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
        <?php if($this->data['body_onload'    ]) { ?>onload="<?php     $this->text('body_onload')     ?>"<?php } ?>
        <?php if($this->data['nsclass'        ]) { ?>class="<?php      $this->text('nsclass')         ?>"<?php } ?>>
    <div id="globalWrapper">
      <div id="column-content">
	<div id="content">
	  <a name="top" id="top"></a>
	  <?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
	  <h1 class="firstHeading"><?php $this->text('title') ?></h1>
	  <div id="bodyContent">
	    <h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
	    <div id="contentSub"><?php $this->html('subtitle') ?></div>
	    <?php if($this->data['undelete']) { ?><div id="contentSub"><?php     $this->html('undelete') ?></div><?php } ?>
	    <?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
	    <!-- start content -->
	    <?php $this->html('bodytext') ?>
	    <?php if($this->data['catlinks']) { ?><div id="catlinks"><?php       $this->html('catlinks') ?></div><?php } ?>
	    <!-- end content -->
	    <div class="visualClear"></div>
	  </div>
	</div>
      </div>
      <div id="column-one">
	<div id="p-cactions" class="portlet">
	  <h5><?php $this->msg('views') ?></h5>
	  <ul>
	    <?php foreach($this->data['content_actions'] as $key => $action) {
	       ?><li id="ca-<?php echo htmlspecialchars($key) ?>"
	       <?php if($action['class']) { ?>class="<?php echo htmlspecialchars($action['class']) ?>"<?php } ?>
	       ><a href="<?php echo htmlspecialchars($action['href']) ?>"><?php
	       echo htmlspecialchars($action['text']) ?></a></li><?php
	     } ?>
	  </ul>
	</div>
	<div class="portlet" id="p-personal">
	  <h5><?php $this->msg('personaltools') ?></h5>
	  <div class="pBody">
	    <ul>
	    <?php foreach($this->data['personal_urls'] as $key => $item) {
	       ?><li id="pt-<?php echo htmlspecialchars($key) ?>"><a href="<?php
	       echo htmlspecialchars($item['href']) ?>"<?php
	       if(!empty($item['class'])) { ?> class="<?php
	       echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
	       echo htmlspecialchars($item['text']) ?></a></li><?php
	    } ?>
	    </ul>
	  </div>
	</div>
	<div class="portlet" id="p-logo">
	  <a style="background-image: url(<?php $this->text('logopath') ?>);"
	    href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"
	    title="<?php $this->msg('mainpage') ?>"></a>
	</div>

	<div id="p-search" class="portlet">
<img src="/wikikids/skins/wikikids/kop_zoekwoord_148.gif">
	  <div class="pBodyZoeken">
	    <form name="searchform" action="<?php $this->text('searchaction') ?>" id="searchform">
	      <input name="search" type="text" id="searchInput" value="<?php $this->text('search') ?>"
	        <?php if($this->haveMsg('accesskey-search')) {
	          ?>accesskey="<?php $this->msg('accesskey-search') ?>"<?php }
	        if( isset( $this->data['search'] ) ) {
	          ?><?php } ?> />
	      <input type='submit' name="go" class="searchButton" id="searchGoButton"
	        value="OK"
	        />&nbsp;<input type='submit' name="fulltext"
	        class="searchButton"
	        value="Meer..." />
	    </form>
	  </div>
	</div>

	<script type="<?php $this->text('jsmimetype') ?>"> if (window.isMSIE55) fixalpha(); </script>


<!--  Navigatiemenu door HAHO: Harm Hofstede -->

<a href="http://kennisnet.wikia.com/wikikids/wiki/Index.php/Alarm">
<img src="/wikikids/skins/wikikids/alarm_klein.gif" border="0"></a>
<a href="http://kennisnet.wikia.com/wikikids/wiki/Index.php/Boomhut">
<img src="/wikikids/skins/wikikids/boomhut_klein.gif" border="0"></a>

<div class='portlet' id=''>
<img src="/wikikids/skins/wikikids/kop_zoeken_148.gif">
      <div class='pBodyGreen'> 
<a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Allpages">Alle pagina's</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Categories">Categorie&euml;n</a> 
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Zoeken-Hulp">Hulp bij zoeken</a><br>
</div>
</div>

<div class='portlet' id=''>
<img src="/wikikids/skins/wikikids/kop_meehelpen_148.gif">
<div class='pBodyBlue'>
<a href="http://kennisnet.wikia.com/wikikids/wiki/Meehelpen-Informatie">Informatie</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Userlogin">Aanmelden</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Meehelpen-NieuwePagina">Nieuwe pagina</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Upload">Uploaden</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Imagelist">Afbeeldingenlijst</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Wantedpages">Wensenlijst</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Meehelpen-Hulp">Hulp bij meehelpen</a>
</div>
</div>

<div class='portlet' id=''>
<img src="/wikikids/skins/wikikids/kop_begeleiders_148.gif">
<div class='pBodyRed'>
<a href="http://kennisnet.wikia.com/wikikids/wiki/Begeleiders-Introductie">Introductie</a>
<a href="http://kennisnet.wikia.com/wikikids/wiki/Portaal:Onderwijs">OnderwijsPortaal</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Newimages">Plaatjes (nieuw)</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Newpages">Pag's (nieuw)</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Recentchanges">Pag's (gewijzigd)</a>
<br><a href="http://kennisnet.wikia.com/wikikids/wiki/Speciaal:Specialpages">Speciale pag's</a>
</div>
</div>

	<?php if( $this->data['language_urls'] ) { ?><div id="p-lang" class="portlet">
	  <h5><?php $this->msg('otherlanguages') ?></h5>
	  <div class="pBody">
	    <ul>
	      <?php foreach($this->data['language_urls'] as $langlink) { ?>
	      <li class="<?php echo htmlspecialchars($langlink['class'])?>">
	      <a href="<?php echo htmlspecialchars($langlink['href'])
	        ?>"><?php echo $langlink['text'] ?></a>
	      </li>
	      <?php } ?>
	    </ul>
	  </div>
	</div>
	<?php } ?>
      </div><!-- end of the left (by default at least) column -->
      <div class="visualClear"></div>
      <div id="footer">
    <?php if($this->data['poweredbyico']) { ?><div id="f-poweredbyico"><?php $this->html('poweredbyico') ?></div><?php } ?>
	<?php if($this->data['copyrightico']) { ?><div id="f-copyrightico"><?php $this->html('copyrightico') ?></div><?php } ?>
	<ul id="f-list">
	  <?php if($this->data['lastmod'   ]) { ?><li id="f-lastmod"><?php    $this->html('lastmod')    ?></li><?php } ?>
	  <?php if($this->data['viewcount' ]) { ?><li id="f-viewcount"><?php  $this->html('viewcount')  ?></li><?php } ?>
	  <?php if($this->data['numberofwatchingusers' ]) { ?><li id="f-numberofwatchingusers"><?php  $this->html('numberofwatchingusers') ?></li><?php } ?>
	  <?php if($this->data['credits'   ]) { ?><li id="f-credits"><?php    $this->html('credits')    ?></li><?php } ?>
	  <?php if($this->data['copyright' ]) { ?><li id="f-copyright"><?php  $this->html('copyright')  ?></li><?php } ?>
	  <?php if($this->data['about'     ]) { ?><li id="f-about"><?php      $this->html('about')      ?></li><?php } ?>
	  <?php if($this->data['disclaimer']) { ?><li id="f-disclaimer"><?php $this->html('disclaimer') ?></li><?php } ?>
	  <?php if($this->data['tagline']) { ?><li id="f-tagline"><?php echo $this->data['tagline'] ?></li><?php } ?>
	</ul>
      </div>
    </div>
    <?php $this->html('reporttime') ?>
  </body>
</html>
<?php
	wfRestoreWarnings();
	}
}
?>
