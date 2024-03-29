<?php
/**
 *
 *                 NEVER EDIT THIS FILE
 *
 *
 * To customize your installation, edit "LocalSettings.php". If you make
 * changes here, they will be lost on next upgrade of MediaWiki!
 *
 * Note that since all these string interpolations are expanded
 * before LocalSettings is included, if you localize something
 * like $wgScriptPath, you must also localize everything that
 * depends on it.
 *
 * Documentation is in the source and on:
 * http://www.mediawiki.org/wiki/Manual:Configuration_settings
 *
 */

# This is not a valid entry point, perform no further processing unless MEDIAWIKI is defined
if( !defined( 'MEDIAWIKI' ) ) {
	echo "This file is part of MediaWiki and is not a valid entry point\n";
	die( 1 );
}

/**
 * Use revision number
 */

$wgStyleVersion         = '772';
$wgMergeStyleVersionJS  = '772';
$wgMergeStyleVersionCSS = '772';

/**
 * @name $wgCityId
 *
 * contains wiki identifier from city_list table. If wiki is not from wiki.factory
 * contains null!
 */
$wgCityId = null;

/**
 * Wikia custom extensions, enabled sitewide. Pre-required by some skins
 */
include_once( "$IP/extensions/ExtensionFunctions.php" );
include_once( "$IP/extensions/wikia/DataProvider/DataProvider.php" );
include_once( "$IP/extensions/wikia/WidgetFramework/WidgetFramework.php" );
include_once( "$IP/extensions/wikia/SpecialWidgetDashboard/SpecialWidgetDashboard_setup.php" );
include_once( "$IP/extensions/wikia/StaffSig/StaffSig.php" );
include_once( "$IP/extensions/wikia/AjaxLogin/AjaxLogin.php" );
include_once( "$IP/extensions/wikia/MergeFiles/MergeFiles.php" );
include_once( "$IP/extensions/wikia/TagCloud/TagCloudClass.php" );
include_once( "$IP/extensions/wikia/MostPopularCategories/SpecialMostPopularCategories.php" );
include_once( "$IP/extensions/wikia/MostPopularArticles/SpecialMostPopularArticles.php" );
include_once( "$IP/extensions/wikia/MostVisitedPages/SpecialMostVisitedPages.php" );
include_once( "$IP/extensions/wikia/WidgetSpecialPage/WidgetsSpecialPage.php" );

include_once( "$IP/extensions/ParserDiffTest/ParserDiffTest.php" );

/**
 * Wikia libmemcached client
 */
require_once( "$IP/includes/wikia/MemcachePoolClientForWiki.php" );

if( isset( $wgMemCachedClassLocal ) && is_string( $wgMemCachedClassLocal ) ) {
	$wgMemCachedClass = $wgMemCachedClassLocal;
}
else {
	$wgMemCachedClass = "MemCachedClientforWiki"; #  "MemcachePoolClientForWiki";
}

$wgSkipSkins = array(
		'armchairgm',
		'cars',
		'chick',
		'cologneblue_view',
		'curse',
		'entertainment',
		'food',
		'games',
		'gwmonobook',
		'halo',
		'halogamespot',
		'health',
		'home',
		'law',
		'local',
		'memalpha',
		'music',
		'nostalgia',
		'politics',
		'psn',
		'restaurants',
		'searchwikia',
		'search',
		'test',
		'uncyclopedia',
		'wikikids',
		'wowwiki',
);

/**
 * @name wgReleaseNumber
 * release number is used for building links
 */
$HeadURL = split('/', '$HeadURL$');
$wgReleaseNumber = $HeadURL[5];

/**
 * Enable FAST extension for this branch only
 */
$wgEnableFASTExt = true;

/**
 * Definition of new log type (settings), related to ticket #2657,
 * will be me moved to different configuration file
 */
$wgLogTypes[] = 'var_log';
$wgLogHeaders['var_log'] = 'var_logheader';
$wgLogNames['var_log'] = 'var_logtext';
$wgLogNames['var_set'] = 'var_set';
$wgLogActions['var_log/var_set'] = 'var_set';
