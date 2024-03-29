<?php
/** 
*
* @package phpBB3
* @version $Id: swatch.php,v 1.10 2006/11/19 14:14:01 acydburn Exp $
* @copyright (c) 2005 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = './../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin(false);
$auth->acl($user->data);
$user->setup();

// Set custom template for admin area
$template->set_custom_template($phpbb_root_path . 'adm/style', 'admin');

$template->set_filenames(array(
	'body' => 'colour_swatch.html')
);

$template->assign_vars(array(
	'OPENER'		=> addslashes(request_var('form', '')),
	'NAME'			=> request_var('name', ''),
	'T_IMAGES_PATH'	=> "{$phpbb_root_path}images/",

	'S_USER_LANG'			=> $user->lang['USER_LANG'],
	'S_CONTENT_DIRECTION'	=> $user->lang['DIRECTION'],
	'S_CONTENT_ENCODING'	=> 'UTF-8',
	'S_CONTENT_DIR_LEFT'	=> $user->lang['LEFT'],
	'S_CONTENT_DIR_RIGHT'	=> $user->lang['RIGHT'],
));

$template->display('body');

garbage_collection();

?>