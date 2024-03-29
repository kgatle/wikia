<?php

if (!defined('MEDIAWIKI')) die();

global $IP;
include_once($IP . '/includes/SpecialPage.php');

/**
 * A simple extension of SpecialPage that ensures that all relevant SMW-user
 * messages are loaded when the special page is initialised. This is especially
 * relevant as an adaptor for query pages.
 *
 * @note AUTOLOAD
 */
class SMWSpecialPage extends SpecialPage {

	/**
	 * Constructor
	 */
	public function __construct($name, $function, $file = 'default', $listed=true, $restriction='') {
		smwfInitUserMessages();
		parent::__construct($name, $restriction, $listed, $function, $file);
	}

}
