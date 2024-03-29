<?php
/**
    *
    * This program is the full and free Spanish (of Spain) phpBB 3.0 Translation.
    * Copyright (c) 2007 Huan Manwe for phpbb-es.com
    *
    * This program is free software; you can redistribute it and/or modify
    * it under the terms of the GNU General Public License as published by
    * the Free Software Foundation; either version 2 of the License, or
    * (at your option) any later version.
    *
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    * GNU General Public License for more details.
    *
    * You should have received a copy of the GNU General Public License along
    * with this program; if not, write to the Free Software Foundation, Inc.,
    * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
    *
    */
	
// ’ » " " …

/**
*
* This program is the full and free Spanish (of Spain) phpBB 3.0 Translation.
* Copyright (c) 2007 Huan Manwe for phpbb-es.com
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
**/

/** 
*
* acp_ban.php [Spanish [Es]]
*
* @package language
* @version $Id: $
* @copyright (c) 2007 phpBB Group. Modified by Huan Manwe for phpbb-es.com in 2007 
* @author 2007-11-26 - Traducido por Huan Manwe junto con phpbb-es.com (http://www.phpbb-es.com) basado en la version argentina hecha por larveando.com.ar ).
* @author - ImagePack made by Xoom (webmaster of http://www.muchografico.com and colaborator of http://www.phpbb-es.com) 
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License 
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//


$lang = array_merge($lang, array(
	'1_HOUR'					=> '1 hora',
	'30_MINS'					=> '30 minutos',
	'6_HOURS'					=> '6 horas',

	'ACP_BAN_EXPLAIN'			=> 'Aquí puede controlar las exclusiones de usuarios por nombre, IP o dirección de email. Este método impide a un usuario acceder a cualquier parte del Sitio. Si quiere puede dar una razón breve (255 caracteres) para la exclusión. Se mostrará en el registro del admin. También puede especificar la duración de la exclusión. Si quiere que la exclusión termine en una fecha específica en lugar de después de un periodo de tiempo, seleccione <u>Hasta</u> en la duración de la exclusión e ingrese la fecha con el formato aaaa-mm-dd.',

	'BAN_EXCLUDE'				=> 'Quitar exclusión',
	'BAN_LENGTH'				=> 'Duración de la exclusión',
	'BAN_REASON'				=> 'Razón de la exclusión',
	'BAN_GIVE_REASON'			=> 'Explicación de la razón de la exclusión',
	'BAN_UPDATE_SUCCESSFUL'		=> 'La lista de exclusiones ha sido actualizada con éxito.',

	'EMAIL_BAN'					=> 'Excluir una o más direcciones de email',
	'EMAIL_BAN_EXCLUDE_EXPLAIN'	=> 'Habilite esto para quitar la dirección de email ingresada de todos las exclusiones actuales.',
	'EMAIL_BAN_EXPLAIN'			=> 'Para expecificar más de una dirección de email ingrese cada una en una nueva línea. Para direcciones parciales use * como comodín, p.ej. <samp>*@hotmail.com</samp>, <samp>*@*.domain.tld</samp>, etc.',
	'EMAIL_NO_BANNED'			=> 'No hay direcciones de email excluidas',
	'EMAIL_UNBAN'				=> 'Levantar exclusión de emails',
	'EMAIL_UNBAN_EXPLAIN'		=> 'Puede quitar la exclusión a múltiples direcciones de email al mismo tiempo usando la combinación apropiada de ratón y teclado para su navegador (p.ej. Ctrl+Clic). Las direcciones de email <em>excluidas</em> están en negrita.',

	'IP_BAN'					=> 'Excluir una o más IPs',
	'IP_BAN_EXCLUDE_EXPLAIN'	=> 'Habilite esto para quitar la IP ingresada de todas las exclusiones actuales.',
	'IP_BAN_EXPLAIN'			=> 'Para expecificar más de una IP ingrese cada una en una nueva línea. Para especificar un rango de direcciones IP separe el inicio y el final con un guión (-), para especificar un comodín use *',
	'IP_HOSTNAME'				=> 'Direcciones IP o hostnames',
	'IP_NO_BANNED'				=> 'No hay direcciones IP excluidas',
	'IP_UNBAN'					=> 'Levantar exclusión de IPs',
	'IP_UNBAN_EXPLAIN'			=> 'Puede quitar la exclusión a múltiples direcciones IP al mismo tiempo usando la combinación apropiada de ratón y teclado para su navegador (p.ej. Ctrl+Clic). Las direcciones IP <em>excluidas</em> están en negrita.',

	'LENGTH_BAN_INVALID'		=> 'La fecha debe tener el formato <kbd>AAAA-MM-DD</kbd>.',

	'PERMANENT'					=> 'Permanente',

	'UNTIL'						=> 'Hasta',
	'USER_BAN'					=> 'Excluir uno o más nombres de usuario',
	'USER_BAN_EXCLUDE_EXPLAIN'	=> 'Habilite esto para quitar el nombre de usuario ingresado de todos las exclusiones actuales.',
	'USER_BAN_EXPLAIN'			=> 'Para especificar más de un nombre de usuario ingresa cada uno en una nueva línea. Use el enlace <u>Buscar un usuario</u> para encontrar y añadir uno o más nombres de usuarios automáticamente.',
	'USER_NO_BANNED'			=> 'No hay nombres de usuario excluidos',
	'USER_UNBAN'				=> 'Levantar exclusión nombres de usuario',
	'USER_UNBAN_EXPLAIN'		=> 'Puede quitar la exclusión a múltiples nombres de usuario al mismo tiempo usando la combinación apropiada de ratón y teclado para su navegador (p.ej. Ctrl+Clic). Los nombres de usuario <em>excluidos</em> están en negrita.',

	
));

?>