<?php
/**
 * SpamRegex - A special page with the interface for blocking, viewing and unblocking of unwanted phrases
 *
 * @ingroup Extensions
 * @author Bartek Łapiński
 * @version 1.2
 * @link http://www.mediawiki.org/wiki/Extension:SpamRegex Documentation
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Protect against register_globals vulnerabilities.
 * This line must be present before any global variable is referenced.
 */
if ( !defined('MEDIAWIKI') )
	die();

/* for memcached - expiration time */
define('SPAMREGEX_EXPIRE', 0);

/* two modes for two kinds of blocks */
define('SPAMREGEX_TEXTBOX', 0);
define('SPAMREGEX_SUMMARY', 1);

// Extension credits
$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Regular Expression Spam Block',
	'version' => '1.2',
	'author' => 'Bartek Łapiński',
	'url' => 'http://www.mediawiki.org/wiki/Extension:SpamRegex',
	'description' => 'Filters out unwanted phrases in edited pages, based on regular expressions',
	'descriptionmsg' => 'spamregex-desc',
);

// New user right
$wgAvailableRights[] = 'spamregex';
$wgGroupPermissions['staff']['spamregex'] = true;

/* return the proper db key for Memc */
function wfSpamRegexCacheKey( /*...*/ ) {
	global $wgSharedDB, $wgSharedTables, $wgSharedPrefix;
	$args = func_get_args();
	if( in_array( 'spam_regex', $wgSharedTables ) ) {
		$args = array_merge( array( $wgSharedDB, $wgSharedPrefix ), $args );
		return call_user_func_array( 'wfForeignMemcKey', $args );
	} else {
		return call_user_func_array( 'wfMemcKey', $args );
	}
}

// Set up the new special page
$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['SpamRegex'] = $dir . 'SpamRegex.i18n.php';
$wgExtensionAliasesFiles['SpamRegex'] = $dir . 'SpamRegex.alias.php';
$wgAutoloadClasses['SpamRegex'] = $dir . 'SpecialSpamRegex.php';
$wgAutoloadClasses['SpamRegexHooks'] = $dir . 'SpamRegexCore.php';
$wgSpecialPages['SpamRegex'] = 'SpamRegex';
$wgSpecialPageGroups['SpamRegex'] = 'pagetools';
// Hook it up
$wgHooks['EditFilter'][] = 'SpamRegexHooks::onEditFilter';
$wgHooks['AbortMove'][] = 'SpamRegexHooks::onAbortMove';