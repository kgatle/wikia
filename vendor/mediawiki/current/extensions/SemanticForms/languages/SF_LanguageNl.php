<?php
/**
 * @author Siebrand Mazeland
 */

class SF_LanguageNl extends SF_Language {

/* private */ var $m_SpecialProperties = array(
	//always start upper-case
	SF_SP_HAS_DEFAULT_FORM  => 'Heeft standaardformulier'
);

var $m_Namespaces = array(
	SF_NS_FORM           => 'Formulier',
	SF_NS_FORM_TALK      => 'Overleg formulier'
);

}
