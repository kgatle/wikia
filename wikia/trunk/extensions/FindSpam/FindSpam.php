<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( "Not a valid entry point\n" );
}

# This is a simple example of a special page module
# Given a string in UTF-8, it converts it to HTML entities suitable for
# an ISO 8859-1 web page.

global $wgAvailableRights, $wgGroupPermissions;
$wgAvailableRights[] = 'findspam';
$wgGroupPermissions['sysop']['findspam'] = true;
$wgGroupPermissions['staff']['findspam'] = true;

$wgSpecialPages['FindSpam'] = 'FindSpamPage';
$wgSpecialPageGroups['FindSpam'] = 'spam';

$dir = dirname(__FILE__) . '/';
$wgAutoloadClasses['FindSpamPage'] = $dir . 'FindSpam_body.php';
$wgExtensionMessagesFiles['FindSpam'] = $dir . 'FindSpam.i18n.php';
$wgExtensionAliasesFiles['FindSpam'] = $dir . 'FindSpam.alias.php';

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'FindSpam',
	'url'=>'http://www.mediawiki.org/wiki/Extension:Find_Spam',
	'author' => 'Tim Starling',
	'description' => 'Adds a special page that allows to find recently added spam.',
	'descriptionmsg' => 'findspam-desc',
);

