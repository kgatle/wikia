<?php
/** 
*
* LDAP auth plug-in for phpBB3
*
* Authentication plug-ins is largely down to Sergey Kanareykin, our thanks to him.
*
* @package login
* @version $Id: auth_ldap.php,v 1.23 2006/11/19 14:14:20 acydburn Exp $
* @copyright (c) 2005 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* Connect to ldap server
* Only allow changing authentication to ldap if we can connect to the ldap server
* Called in acp_board while setting authentication plugins
*/
function init_ldap()
{
	global $config, $user;

	if (!@extension_loaded('ldap'))
	{
		return $user->lang['LDAP_NO_LDAP_EXTENSION'];
	}

	if (!($ldap = @ldap_connect($config['ldap_server'])))
	{
		return $user->lang['LDAP_NO_SERVER_CONNECTION'];
	}

	@ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	@ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	// ldap_connect only checks whether the specified server is valid, so the connection might still fail
	$search = @ldap_search(
		$ldap,
		$config['ldap_base_dn'],
		'(' . $config['ldap_uid'] . '=' . ldap_escape(htmlspecialchars_decode($user->data['username'])) . ')',
		(empty($config['ldap_email'])) ? array($config['ldap_uid']) : array($config['ldap_uid'], $config['ldap_email']),
		0,
		1
	);

	if ($search === false)
	{
		return $user->lang['LDAP_NO_SERVER_CONNECTION'];
	}

	$result = @ldap_get_entries($ldap, $search);

	@ldap_close($ldap);


	if (!is_array($result) || sizeof($result) < 2)
	{
		return sprintf($user->lang['LDAP_NO_IDENTITY'], $user->data['username']);
	}

	if (!empty($config['ldap_email']) && !isset($result[0][$config['ldap_email']]))
	{
		return $user->lang['LDAP_NO_EMAIL'];
	}

	return false;
}

/**
* Login function
*/
function login_ldap(&$username, &$password)
{
	global $db, $config, $user;

	if (!@extension_loaded('ldap'))
	{
		return array(
			'status'		=> LOGIN_ERROR_EXTERNAL_AUTH,
			'error_msg'		=> 'LDAP_NO_LDAP_EXTENSION',
			'user_row'		=> array('user_id' => ANONYMOUS),
		);
	}

	if (!($ldap = @ldap_connect($config['ldap_server'])))
	{
		return array(
			'status'		=> LOGIN_ERROR_EXTERNAL_AUTH,
			'error_msg'		=> 'LDAP_NO_SERVER_CONNECTION',
			'user_row'		=> array('user_id' => ANONYMOUS),
		);
	}

	@ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	@ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	$search = @ldap_search(
		$ldap,
		$config['ldap_base_dn'],
		'(' . $config['ldap_uid'] . '=' . ldap_escape(htmlspecialchars_decode($username)) . ')',
		(empty($config['ldap_email'])) ? array($config['ldap_uid']) : array($config['ldap_uid'], $config['ldap_email']),
		0,
		1
	);

	$ldap_result = @ldap_get_entries($ldap, $search);

	if (is_array($ldap_result) && sizeof($ldap_result) > 1)
	{
		if (@ldap_bind($ldap, $ldap_result[0]['dn'], htmlspecialchars_decode($password)))
		{
			@ldap_close($ldap);

			$sql ='SELECT user_id, username, user_password, user_passchg, user_email, user_type
				FROM ' . USERS_TABLE . "
				WHERE username_clean = '" . $db->sql_escape(utf8_clean_string($username)) . "'";
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			if ($row)
			{
				unset($ldap_result);

				// User inactive...
				if ($row['user_type'] == USER_INACTIVE || $row['user_type'] == USER_IGNORE)
				{
					return array(
						'status'		=> LOGIN_ERROR_ACTIVE,
						'error_msg'		=> 'ACTIVE_ERROR',
						'user_row'		=> $row,
					);
				}

				// Successful login... set user_login_attempts to zero...
				return array(
					'status'		=> LOGIN_SUCCESS,
					'error_msg'		=> false,
					'user_row'		=> $row,
				);
			}
			else
			{
				// retrieve default group id
				$sql = 'SELECT group_id
					FROM ' . GROUPS_TABLE . "
					WHERE group_name = '" . $db->sql_escape('REGISTERED') . "'
						AND group_type = " . GROUP_SPECIAL;
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				if (!$row)
				{
					trigger_error('NO_GROUP');
				}

				// generate user account data
				$ldap_user_row = array(
					'username'		=> $username,
					'user_password'	=> md5($password),
					'user_email'	=> (!empty($config['ldap_email'])) ? $ldap_result[0][$config['ldap_email']][0] : '',
					'group_id'		=> (int) $row['group_id'],
					'user_type'		=> USER_NORMAL,
					'user_ip'		=> $user->ip,
				);

				unset($ldap_result);

				// this is the user's first login so create an empty profile
				return array(
					'status'		=> LOGIN_SUCCESS_CREATE_PROFILE,
					'error_msg'		=> false,
					'user_row'		=> $ldap_user_row,
				);
			}
		}
		else
		{
			unset($ldap_result);
			@ldap_close($ldap);

			// Give status about wrong password...
			return array(
				'status'		=> LOGIN_ERROR_PASSWORD,
				'error_msg'		=> 'LOGIN_ERROR_PASSWORD',
				'user_row'		=> array('user_id' => ANONYMOUS),
			);
		}
	}

	@ldap_close($ldap);

	return array(
		'status'	=> LOGIN_ERROR_USERNAME,
		'error_msg'	=> 'LOGIN_ERROR_USERNAME',
		'user_row'	=> array('user_id' => ANONYMOUS),
	);
}

/**
* Escapes an LDAP AttributeValue
*/
function ldap_escape($string)
{
	return str_replace(array('*', '\\', '(', ')'), array('\\*', '\\\\', '\\(', '\\)'), $string);
}

/**
* This function is used to output any required fields in the authentication
* admin panel. It also defines any required configuration table fields.
*/
function acp_ldap(&$new)
{
	global $user;

	$tpl = '

	<dl>
		<dt><label for="ldap_server">' . $user->lang['LDAP_SERVER'] . ':</label><br /><span>' . $user->lang['LDAP_SERVER_EXPLAIN'] . '</span></dt>
		<dd><input type="text" id="ldap_server" size="40" name="config[ldap_server]" value="' . $new['ldap_server'] . '" /></dd>
	</dl>
	<dl>
		<dt><label for="ldap_dn">' . $user->lang['LDAP_DN'] . ':</label><br /><span>' . $user->lang['LDAP_DN_EXPLAIN'] . '</span></dt>
		<dd><input type="text" id="ldap_dn" size="40" name="config[ldap_base_dn]" value="' . $new['ldap_base_dn'] . '" /></dd>
	</dl>
	<dl>
		<dt><label for="ldap_uid">' . $user->lang['LDAP_UID'] . ':</label><br /><span>' . $user->lang['LDAP_UID_EXPLAIN'] . '</span></dt>
		<dd><input type="text" id="ldap_uid" size="40" name="config[ldap_uid]" value="' . $new['ldap_uid'] . '" /></dd>
	</dl>
	<dl>
		<dt><label for="ldap_email">' . $user->lang['LDAP_EMAIL'] . ':</label><br /><span>' . $user->lang['LDAP_EMAIL_EXPLAIN'] . '</span></dt>
		<dd><input type="text" id="ldap_email" size="40" name="config[ldap_email]" value="' . $new['ldap_email'] . '" /></dd>
	</dl>
	';

	// These are fields required in the config table
	return array(
		'tpl'		=> $tpl,
		'config'	=> array('ldap_server', 'ldap_base_dn', 'ldap_uid', 'ldap_email')
	);
}

?>