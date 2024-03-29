<?php
/* This extension enables Hard Redirects (301), and implements the
 * "Redirected From" text with javascript. This has SEO benefits,
 * there is only one page for each article  (minimize duplicate content)
 *
 * 301 redirects alone are less than ideal, because the user loses the 
 * "Redirected From" text, which is both disorienting and it prevents users
 * from editing a redirect once it is created.
 *  
 * Note this requires a patch to the core to add an extra Hook call. Add this
 * line on about line 267 of Wiki.php, immediately before the "if( is_object( $target ) ) {" line:
 
	wfRunHooks('BeforeRedirect', array( &$wgTitle, &$target ) );

  Note: I'm working on getting this into the core code. It may be there
  by the time you read this.

 * Requires $wgEnableHardRedirectsWithJSText to be set to true
 * 
 * @addtogroup Extensions
 * @author Nick Sullivan nick at wikia-inc.com
 *
 *
 * Code Review Notes:
 * Confirm that cacheability is the same as it was before.
 * Test "Moved" pages
 */

if (!defined('MEDIAWIKI')) {
    echo 'To install this extension, put the following line in LocalSettings.php:
require_once( "$IP/extensions/wikia/HardRedirectsWithJSText/HardRedirectsWithJSText.php" );';
    exit( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
        'name' => 'HardRedirectsWithJSText',
        'author' => 'Nick Sullivan nick at wikia-inc.com',
        'description' => 'This extension enables Hard Redirects (301), and implements the "Redirected From" text with javascript. The benefit is for SEO, there is only one page for each article  (minimize duplicate content)'
);

$wgHooks['ArticleViewHeader'][]='jsRedirectedFromDiv';
$wgHooks['BeforeRedirect'][]='hardRedirectWithCookie'; // Note this hook does not exist in core. You must add it to Wiki.php (see header)
$wgHooks['BeforePageDisplay'][]='jsRedirectedFromText';

/* With hard redirects enabled, we always always print the redirectMsg div, and 
 * then use Javascript to check for a cookie to display it or not. Note that we
 * always display it so that the MD5 of the page is equal for Google's duplicate
 * content check
 */
function jsRedirectedFromDiv($article, $outputDone, $pcache){
	global $wgOut, $wgEnableHardRedirectsWithJSText;
	if (! $wgEnableHardRedirectsWithJSText){
		return true;
	}

	// Set up the subtitle "Redirected From"
	$wgOut->setSubtitle('<div id="redirectMsg" class="redirectMsg" style="display:none"></div>');
	return true;
}

// Fill in the text in the div created above. In a separate hook so the javascript is at the bottom of the page.
function jsRedirectedFromText($out){
	global $wgEnableHardRedirectsWithJSText, $wgCookiePrefix;
        global $wgCookiePath, $wgCookieDomain, $wgCookieSecure;
	if (! $wgEnableHardRedirectsWithJSText){
		return true;
	}
 
	// Supposedly this will be part of allinone, when it is, remove this.
	$out->addScript('<script src="http://yui.yahooapis.com/2.5.1/build/cookie/cookie-beta-min.js"></script>');
	$out->addInlineScript('
	  var jsrdCookie="' . addslashes($wgCookiePrefix) . 'RedirectedFrom";
	  var jsrdText="' . addslashes(wfMsg('redirectedfrom')) . '";
	  var jsrdVal=YAHOO.util.Cookie.get(jsrdCookie);

	  if (jsrdVal != null){
	    var rdVals=jsrdVal.split("|"); // RedirectFrom cookie has $url|$linktext
	    var rdLink="<a href=\"" + rdVals[0] + "?redirect=no\">" + rdVals[1].replace(/\+/g, " ") + "</a></span>";
	    YAHOO.util.Dom.get("redirectMsg").innerHTML=jsrdText.replace(/\$1/, rdLink);
	    YAHOO.util.Dom.setStyle("redirectMsg", "display", "");
	    YAHOO.util.Cookie.remove(jsrdCookie, {
		  domain: "' . $wgCookieDomain . '",
		  path: "' . $wgCookiePath . '",
		  secure: "' . $wgCookieSecure . '"
		 }
	    );
	  }');

	return true;
}


/* Hard redirect them to the new url with 301.
 * Append the query string if there is one.
 * Set a cookie for the "Redirected From" text.
 */
function hardRedirectWithCookie($wgTitle, $target){
	global $wgEnableHardRedirectsWithJSText;
	if ($wgEnableHardRedirectsWithJSText){
		global $wgOut, $wgCookiePrefix, $wgCookiePath, $wgCookieDomain,
			$wgCookieSecure, $wgRequest;

		if ($wgRequest->getVal('redirect')!='no'){
			 // Only set the cookie if they are not on a 'redirect=no' page.
			 setcookie( $wgCookiePrefix.'RedirectedFrom',
				$wgTitle->getLocalUrl() . '|' . $wgTitle->getText(),
	      			time() + 30, $wgCookiePath, $wgCookieDomain, $wgCookieSecure );
 		}

		if (($target !== false) && ($target instanceof Title)) {
			$wgOut->redirect( $target->getFullURL(), '301' );
		}
  	}
	return true;
}
