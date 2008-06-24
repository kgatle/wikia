<?php
/*
 * @author Inez Korczyński
 */

if(!defined('MEDIAWIKI')) {
	exit(1);
}

$wgExtensionCredits['other'][] = array(
        'name' => 'WikiaMiniUpload',
        'author' => 'Inez Korczyński',
);

$dir = dirname(__FILE__).'/';

$wgExtensionMessagesFiles['WikiaMiniUpload'] = $dir.'/WikiaMiniUpload.i18n.php';
$wgHooks['EditPage::showEditForm:initial2'][] = 'WMUSetup';

// Called on every edit page to add references to JavaScript files
function WMUSetup($editform) {
	global $wgOut, $wgStylePath, $wgExtensionsPath, $wgStyleVersion, $wgHooks;
	wfLoadExtensionMessages('WikiaMiniUpload');
	$wgHooks['ExtendJSGlobalVars'][] = 'WMUSetupVars';
	$wgOut->addScript('<script type="text/javascript" src="'.$wgStylePath.'/common/yui/2.5.1/get/get-min.js?'.$wgStyleVersion.'"></script>');
	$wgOut->addScript('<script type="text/javascript" src="'.$wgStylePath.'/common/yui/2.5.1/slider/slider-min.js?'.$wgStyleVersion.'"></script>');
	$wgOut->addScript('<script type="text/javascript" src="'.$wgExtensionsPath.'/wikia/WikiaMiniUpload/js/WMU.js?'.$wgStyleVersion.'"></script>');
	$wgOut->addScript('<link rel="stylesheet" type="text/css" href="'.$wgExtensionsPath.'/wikia/WikiaMiniUpload/css/WMU.css?'.$wgStyleVersion.'" />');
	$wgOut->addHtml('<div style="float: left; margin-top: 20px;"><a href="#" id="wmuLink">' . wfMsg ('wmu-imagelink') . '</a></div>');
	return true;
}

function WMUSetupVars($vars) {
	$vars['wmu_back'] = wfMsg('wmu-back');
	$vars['wmu_close'] = wfMsg('wmu-close');
	$vars['wmu_warn1'] = wfMsg('wmu-warn1');
	$vars['wmu_warn2'] = wfMsg('wmu-warn2');

	return true;
}

$wgAjaxExportList[] = 'WMU';

function WMU() {
	global $wgRequest, $wgGroupPermissions, $wgAllowCopyUploads;

	wfLoadExtensionMessages('WikiaMiniUpload');

	// Overwrite configuration settings needed by image import functionality
	$wgAllowCopyUploads = true;
	$wgGroupPermissions['user']['upload_by_url']   = true;
	$dir = dirname(__FILE__).'/';
	require_once($dir.'WikiaMiniUpload_body.php');

	$method = $wgRequest->getVal('method');
	$wmu = new WikiaMiniUpload();
	return new AjaxResponse($wmu->$method());
}
