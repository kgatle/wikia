<?php
/**
 * @file
 * @ingroup SMWDataValues
 */

/**
 * This datavalue implements Error-Datavalues.
 *
 * @author Nikolas Iwan
 * @note AUTOLOADED
 */
class SMWErrorValue extends SMWDataValue {

	private $m_value;
	
	public function SMWErrorValue($errormsg = '', $uservalue = '', $caption = false) {
		$this->setUserValue($uservalue, $caption);
		$this->addError($errormsg);
	}

	protected function parseUserValue($value) {
		if ($this->m_caption === false) {
			$this->m_caption = $value;
		}
		$this->m_value = $value;
		return true;
	}

	protected function parseXSDValue($value, $unit) {
		$this->setUserValue($value); // no units, compatible syntax
	}

	public function setOutputFormat($formatstring){
		// no output formats
	}

	public function getShortWikiText($linked = NULL) {
		//TODO: support linking?
		return $this->m_caption;
	}

	public function getShortHTMLText($linker = NULL) {
		return htmlspecialchars($this->getShortWikiText($linker));
	}

	public function getLongWikiText($linked = NULL) {
		//TODO: support linking?
		return $this->getErrorText();
	}

	public function getLongHTMLText($linker = NULL) {
		return $this->getErrorText();
	}

	public function getXSDValue() {
		return $this->getShortWikiText(); ///TODO: really? (errors are not meant to be saved, or are they?)
	}

	public function getWikiValue(){
		return $this->getShortWikiText(); /// FIXME: wikivalue must not be influenced by the caption
	}

}
