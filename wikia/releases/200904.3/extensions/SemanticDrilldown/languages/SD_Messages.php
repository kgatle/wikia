<?php
/**
 * Internationalization file for the Semantic Drilldown extension
 *
 * @ingroup Language
 * @ingroup I18n
 * @ingroup SDLanguage
*/

$messages = array();

/** English
 * @author Yaron Koren
 */
$messages['en'] = array(
	// user messages
	'semanticdrilldown-desc'		=> 'A drilldown interface for navigating through semantic data',
	'specialpages-group-sd_group'           => 'Semantic Drilldown',
	'browsedata'                            => 'Browse data',
	'sd_browsedata_choosecategory'          => 'Choose a category',
	'sd_browsedata_viewcategory'            => 'view category',
	'sd_browsedata_docu'                    => 'Click on one or more items below to narrow your results.',
	'sd_browsedata_subcategory'             => 'Subcategory',
	'sd_browsedata_other'                   => 'Other',
	'sd_browsedata_none'                    => 'None',
	'sd_browsedata_filterbyvalue'           => 'Filter by this value',
	'sd_browsedata_filterbysubcategory'     => 'Filter by this subcategory',
	'sd_browsedata_otherfilter'             => 'Show pages with another value for this filter',
	'sd_browsedata_nonefilter'              => 'Show pages with no value for this filter',
	'sd_browsedata_or'			=> 'or',
        'sd_browsedata_removefilter'            => 'Remove this filter',
        'sd_browsedata_removesubcategoryfilter' => 'Remove this subcategory filter',
        'sd_browsedata_resetfilters'            => 'Reset filters',
	'sd_browsedata_addanothervalue'		=> 'Add another value',
	'sd_browsedata_daterangestart'		=> 'Start:',
	'sd_browsedata_daterangeend'		=> 'End:',
	'filters'                               => 'Filters',
	'sd_filters_docu'                       => 'The following filters exist in {{SITENAME}}:',
	'createfilter'                          => 'Create a filter',
	'sd_createfilter_name'                  => 'Name:',
	'sd_createfilter_property'              => 'Property that this filter covers:',
	'sd_createfilter_usepropertyvalues'     => 'Use all values of this property for the filter',
	'sd_createfilter_usecategoryvalues'     => 'Get values for filter from this category:',
	'sd_createfilter_usedatevalues'         => 'Use date ranges for this filter with this time period:',
	'sd_createfilter_entervalues'           => 'Enter values for filter manually (values should be separated by commas - if a value contains a comma, replace it with "\,"):',
	'sd_createfilter_inputtype'		=> 'Input type for this filter:',
	'sd_createfilter_listofvalues'		=> 'list of values (default)',
	'sd_createfilter_requirefilter'         => 'Require another filter to be selected before this one is displayed:',
	'sd_createfilter_label'                 => 'Label for this filter (optional):',
	'sd_blank_error'                        => 'cannot be blank',

	// content messages
	'sd_filter_coversproperty'         => 'This filter covers the property $1.',
	'sd_filter_getsvaluesfromcategory' => 'It gets its values from the category $1.',
	'sd_filter_usestimeperiod'         => 'It uses $1 as its time period.',
	'sd_filter_year'                   => 'Year',
	'sd_filter_month'                  => 'Month',
	'sd_filter_hasvalues'              => 'It has the values $1.',
	'sd_filter_hasinputtype'           => 'It has the input type $1.',
	'sd_filter_freetext'               => 'text',
	'sd_filter_daterange'              => 'date range',
	'sd_filter_requiresfilter'         => 'It requires the presence of the filter $1.',
	'sd_filter_haslabel'               => 'It has the label $1.',
);

/** Message documentation (Message documentation)
 * @author EugeneZelenko
 * @author Jon Harald Søby
 */
$messages['qqq'] = array(
	'sd_browsedata_other' => '{{Identical|Other}}',
	'sd_browsedata_none' => '{{Identical|None}}',
	'filters' => '{{Identical|Filter}}',
	'sd_createfilter_name' => '{{Identical|Name}}',
	'sd_blank_error' => '{{Identical|Cannot be blank}}',
	'sd_filter_year' => '{{Identical|Year}}',
	'sd_filter_month' => '{{Identical|Month}}',
);

/** Afrikaans (Afrikaans)
 * @author Arnobarnard
 * @author Naudefj
 * @author SPQRobin
 */
$messages['af'] = array(
	'sd_browsedata_other' => 'Ander',
	'sd_browsedata_none' => 'Geen',
	'sd_createfilter_name' => 'Naam:',
	'sd_filter_month' => 'Maand',
);

/** Amharic (አማርኛ)
 * @author Codex Sinaiticus
 */
$messages['am'] = array(
	'sd_createfilter_name' => 'ስም:',
	'sd_filter_month' => 'ወር',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'filters' => 'Filtros',
	'sd_createfilter_name' => 'Nombre:',
);

/** Arabic (العربية)
 * @author Alnokta
 * @author Meno25
 * @author OsamaK
 * @author Ouda
 */
$messages['ar'] = array(
	'semanticdrilldown-desc' => 'واجهة نزول للإبحار خلال بيانات سيمانتيك',
	'specialpages-group-sd_group' => 'سيمانتيك دريل داون',
	'browsedata' => 'تصفح البيانات',
	'sd_browsedata_choosecategory' => 'اختر تصنيفا',
	'sd_browsedata_viewcategory' => 'عرض التصنيف',
	'sd_browsedata_docu' => 'اضغط على واحد أو أكثر من المدخلات بالأسفل لتضييق نتائجك.',
	'sd_browsedata_subcategory' => 'تصنيف فرعي',
	'sd_browsedata_other' => 'آخر',
	'sd_browsedata_none' => 'لا شيء',
	'sd_browsedata_filterbyvalue' => 'فلترة بواسطة هذه القيمة',
	'sd_browsedata_filterbysubcategory' => 'فلترة بواسطة هذا التصنيف الفرعي',
	'sd_browsedata_otherfilter' => 'اعرض الصفحات بقيمة أخرى لهذا الفلتر',
	'sd_browsedata_nonefilter' => 'اعرض الصفحات التي هي بدون قيمة لهذا الفلتر',
	'sd_browsedata_or' => 'أو',
	'sd_browsedata_removefilter' => 'أزل هذا الفلتر',
	'sd_browsedata_removesubcategoryfilter' => 'أزل فلتر التصنيف الفرعي هذا',
	'sd_browsedata_resetfilters' => 'أعد ضبط الفلاتر',
	'sd_browsedata_addanothervalue' => 'إضافة قيمة أخرى',
	'sd_browsedata_daterangestart' => ':البداية',
	'sd_browsedata_daterangeend' => ':النهاية',
	'filters' => 'فلاتر',
	'sd_filters_docu' => 'الفلاتر التالية موجودة في {{SITENAME}}:',
	'createfilter' => 'إنشاء فلتر',
	'sd_createfilter_name' => 'الاسم:',
	'sd_createfilter_property' => 'الخاصية التي يغطيها هذا الفلتر:',
	'sd_createfilter_usepropertyvalues' => 'استخدم كل قيم هذه الخاصية للفلتر',
	'sd_createfilter_usecategoryvalues' => 'احصل على القيم للفلتر من هذا التصنيف:',
	'sd_createfilter_usedatevalues' => 'استخدم نطاقات زمنية لهذا الفلتر بهذه الفترة الزمنية:',
	'sd_createfilter_entervalues' => 'أدخل القيم للفلتر يدويا (القيم ينبغي أن يتم فصلها بواسطة فاصلات - لو أن قيمة ما تحتوي على فاصلة، استبدلها ب "\\,"):',
	'sd_createfilter_inputtype' => ': نوع المدخل للفلتر',
	'sd_createfilter_listofvalues' => 'قائمة القيم (أفتراضي)',
	'sd_createfilter_requirefilter' => 'يتطلب اختيار فلتر آخر قبل أن يتم عرض هذا:',
	'sd_createfilter_label' => 'علامة لهذا الفلتر (اختياري):',
	'sd_blank_error' => 'لا يمكن أن يكون فارغا',
	'sd_filter_coversproperty' => 'هذا الفلتر يغطي الخاصية $1.',
	'sd_filter_getsvaluesfromcategory' => 'يحصل على قيمه من التصنيف $1.',
	'sd_filter_usestimeperiod' => 'يستخدم $1 كفترته الزمنية.',
	'sd_filter_year' => 'عام',
	'sd_filter_month' => 'شهر',
	'sd_filter_hasvalues' => 'يمتلك القيم $1.',
	'sd_filter_hasinputtype' => 'لها نوع المدخل $1',
	'sd_filter_freetext' => 'نص',
	'sd_filter_daterange' => 'معدل البيانات',
	'sd_filter_requiresfilter' => 'يتطلب وجود الفلتر $1.',
	'sd_filter_haslabel' => 'يمتلك العلامة $1.',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 * @author Ouda
 * @author Ramsis II
 */
$messages['arz'] = array(
	'specialpages-group-sd_group' => 'سيمانتيك دريل داون',
	'browsedata' => 'تصفح البيانات',
	'sd_browsedata_choosecategory' => 'اختر تصنيفا',
	'sd_browsedata_viewcategory' => 'عرض التصنيف',
	'sd_browsedata_docu' => 'اضغط على واحد أو أكثر من المدخلات بالأسفل لتضييق نتائجك.',
	'sd_browsedata_subcategory' => 'تصنيف فرعي',
	'sd_browsedata_other' => 'آخر',
	'sd_browsedata_none' => 'لا شيء',
	'sd_browsedata_filterbyvalue' => 'فلترة بواسطة هذه القيمة',
	'sd_browsedata_filterbysubcategory' => 'فلترة بواسطة هذا التصنيف الفرعي',
	'sd_browsedata_otherfilter' => 'اعرض الصفحات بقيمة أخرى لهذا الفلتر',
	'sd_browsedata_nonefilter' => 'اعرض الصفحات التى هى بدون قيمة لهذا الفلتر',
	'sd_browsedata_or' => 'أو',
	'sd_browsedata_removefilter' => 'أزل هذا الفلتر',
	'sd_browsedata_removesubcategoryfilter' => 'أزل فلتر التصنيف الفرعى هذا',
	'sd_browsedata_resetfilters' => 'أعد ضبط الفلاتر',
	'sd_browsedata_addanothervalue' => 'إضافة قيمة أخرى',
	'sd_browsedata_daterangestart' => ':البداية',
	'sd_browsedata_daterangeend' => ':النهاية',
	'filters' => 'فلاتر',
	'sd_filters_docu' => 'الفلاتر التالية موجودة فى {{SITENAME}}:',
	'createfilter' => 'إنشاء فلتر',
	'sd_createfilter_name' => 'الاسم:',
	'sd_createfilter_property' => 'الخاصية التى يغطيها هذا الفلتر:',
	'sd_createfilter_usepropertyvalues' => 'استخدم كل قيم هذه الخاصية للفلتر',
	'sd_createfilter_usecategoryvalues' => 'احصل على القيم للفلتر من هذا التصنيف:',
	'sd_createfilter_usedatevalues' => 'استخدم نطاقات زمنية لهذا الفلتر بهذه الفترة الزمنية:',
	'sd_createfilter_entervalues' => 'أدخل القيم للفلتر يدويا (القيم ينبغى أن يتم فصلها بواسطة فاصلات - لو أن قيمة ما تحتوى على فاصلة، استبدلها ب "\\,"):',
	'sd_createfilter_inputtype' => ': نوع المدخل للفلتر',
	'sd_createfilter_listofvalues' => 'قائمة القيم (أفتراضي)',
	'sd_createfilter_requirefilter' => 'يتطلب اختيار فلتر آخر قبل أن يتم عرض هذا:',
	'sd_createfilter_label' => 'علامة لهذا الفلتر (اختياري):',
	'sd_blank_error' => 'لا يمكن أن يكون فارغا',
	'sd_filter_coversproperty' => 'هذا الفلتر يغطى الخاصية $1.',
	'sd_filter_getsvaluesfromcategory' => 'يحصل على قيمه من التصنيف $1.',
	'sd_filter_usestimeperiod' => 'يستخدم $1 كفترته الزمنية.',
	'sd_filter_year' => 'عام',
	'sd_filter_month' => 'شهر',
	'sd_filter_hasvalues' => 'يمتلك القيم $1.',
	'sd_filter_hasinputtype' => 'لها نوع المدخل $1',
	'sd_filter_freetext' => 'نص',
	'sd_filter_daterange' => 'مدى البيانات',
	'sd_filter_requiresfilter' => 'يتطلب وجود الفلتر $1.',
	'sd_filter_haslabel' => 'يمتلك العلامة $1.',
);

/** Kotava (Kotava)
 * @author Wikimistusik
 */
$messages['avk'] = array(
	'browsedata' => 'Origwigara',
	'sd_browsedata_choosecategory' => 'Kiblara va loma',
	'sd_browsedata_viewcategory' => 'Wira va loma',
	'sd_browsedata_subcategory' => 'Volveyloma',
	'sd_browsedata_other' => 'Ar',
	'sd_browsedata_none' => 'Mek',
	'sd_browsedata_filterbyvalue' => 'Espara kan bata voda',
	'sd_browsedata_filterbysubcategory' => 'Espara kan bata volveyloma',
	'sd_browsedata_otherfilter' => 'Nedira va bueem vadjes va ara esparavoda',
	'sd_browsedata_nonefilter' => 'Nedira va bueem mevadjes va bata espara',
	'sd_browsedata_removefilter' => 'Tioltera va bata espara',
	'sd_browsedata_removesubcategoryfilter' => 'Tioltera va bata volveylomafa espara',
	'sd_browsedata_resetfilters' => 'Dimplekura va espara',
	'filters' => 'Espasikieem',
	'sd_filters_docu' => 'Bata espara se tid in {{SITENAME}} :',
	'createfilter' => 'Redura va espara',
	'sd_createfilter_name' => 'Yolt :',
	'sd_createfilter_property' => 'Pilkaca espanon skuna :',
	'sd_createfilter_usepropertyvalues' => 'Favera va vodeem ke bata esparapilkaca',
	'sd_createfilter_usecategoryvalues' => 'Plekura va esparavoda mal bata loma :',
	'sd_createfilter_label' => 'Kral tori bata espara (rotisa) :',
	'sd_blank_error' => 'me rotir vlardafa',
	'sd_filter_coversproperty' => 'Bata espara va $1 pilkaca skur.',
	'sd_filter_getsvaluesfromcategory' => 'Mal $1 loma in va voda plekur.',
	'sd_filter_usestimeperiod' => 'In wetce intaf ugalolk va $1 faver.',
	'sd_filter_year' => 'Ilana',
	'sd_filter_month' => 'Aksat',
	'sd_filter_hasvalues' => 'In va $1 voda se digir.',
	'sd_filter_requiresfilter' => 'Batcoba va tira ke $1 espasiki kucilar.',
	'sd_filter_haslabel' => 'In tir dem $1 kral.',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 */
$messages['be-tarask'] = array(
	'filters' => 'Фільтры',
	'sd_createfilter_name' => 'Назва:',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'browsedata' => 'Разглеждане на данните',
	'sd_browsedata_choosecategory' => 'Избор на категория',
	'sd_browsedata_viewcategory' => 'преглед на категорията',
	'sd_browsedata_subcategory' => 'Подкатегория',
	'sd_browsedata_other' => 'Други',
	'sd_browsedata_none' => 'Няма',
	'sd_browsedata_filterbyvalue' => 'Филтриране по тази стойност',
	'sd_browsedata_filterbysubcategory' => 'Филтриране по тази подкатегория',
	'sd_browsedata_otherfilter' => 'Показване на страниците с други стойности за този филтър',
	'sd_browsedata_nonefilter' => 'Показване на страниците без стойности за този филтър',
	'sd_browsedata_removefilter' => 'Премахване на филтъра',
	'sd_browsedata_removesubcategoryfilter' => 'Премахване на филтъра за подкатегория',
	'sd_browsedata_resetfilters' => 'Изчистване на филтрите',
	'sd_browsedata_addanothervalue' => 'Добавяне на друга стойност',
	'filters' => 'Филтри',
	'sd_filters_docu' => 'В {{SITENAME}} съществуват следните филтри:',
	'createfilter' => 'Създаване на филтър',
	'sd_createfilter_name' => 'Име:',
	'sd_createfilter_requirefilter' => 'Изисква се да бъде избран друг филтър преди да може този да бъде показан:',
	'sd_createfilter_label' => 'Заглавие за този филтър (незадължително):',
	'sd_blank_error' => 'не може да бъде празно',
	'sd_filter_year' => 'Година',
	'sd_filter_month' => 'Месец',
	'sd_filter_hasvalues' => 'Има стойности $1.',
	'sd_filter_requiresfilter' => 'Необходимо е наличието на филтър $1.',
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'browsedata' => 'Pregledaj podatke',
	'sd_browsedata_choosecategory' => 'Izaberi kategoriju',
	'sd_browsedata_viewcategory' => 'pogledaj kategoriju',
	'sd_browsedata_subcategory' => 'Podkategorija',
	'sd_browsedata_other' => 'Ostalo',
	'sd_browsedata_none' => 'Ništa',
	'sd_browsedata_or' => 'ili',
	'sd_browsedata_removefilter' => 'Ukloni ovaj filter',
	'sd_browsedata_removesubcategoryfilter' => 'Ukloni ovaj filter podkategorije',
	'sd_browsedata_resetfilters' => 'Resetuj filtere',
	'sd_browsedata_addanothervalue' => 'Dodaj drugu vrijednost',
	'filters' => 'Filteri',
	'createfilter' => 'Napravi filter',
	'sd_createfilter_name' => 'Ime:',
	'sd_createfilter_label' => 'Naslov za ovaj filter (opcija):',
	'sd_blank_error' => 'ne može biti prazno',
	'sd_filter_year' => 'Godina',
	'sd_filter_month' => 'mjesec',
	'sd_filter_hasvalues' => 'Ima vrijednosti $1.',
);

/** Catalan (Català)
 * @author Jordi Roqué
 */
$messages['ca'] = array(
	'sd_filter_month' => 'Mes',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'filters' => 'Hidlau',
);

/** Danish (Dansk)
 * @author Jon Harald Søby
 */
$messages['da'] = array(
	'sd_browsedata_none' => 'Ingen',
	'sd_createfilter_name' => 'Navn:',
	'sd_filter_year' => 'År',
	'sd_filter_month' => 'Måned',
);

/** German (Deutsch)
 * @author ChrisiPK
 * @author DaSch
 * @author Krabina
 * @author Melancholie
 * @author MichaelFrey
 * @author Revolus
 * @author Umherirrender
 */
$messages['de'] = array(
	'semanticdrilldown-desc' => 'Eine Drilldown-Benutzerschnittstelle, um durch semantische Daten zu navigieren',
	'specialpages-group-sd_group' => 'Semantisches Drill-Down',
	'browsedata' => 'Daten ansehen',
	'sd_browsedata_choosecategory' => 'Kategorie auswählen',
	'sd_browsedata_viewcategory' => 'Kategorie ansehen',
	'sd_browsedata_docu' => 'Klick auf einen oder mehrere der Filter um das Ergebnis einzuschränken.',
	'sd_browsedata_subcategory' => 'Unterkategorie',
	'sd_browsedata_other' => 'Anderes',
	'sd_browsedata_none' => 'Keines',
	'sd_browsedata_filterbyvalue' => 'Filter für diesen Wert',
	'sd_browsedata_filterbysubcategory' => 'Filter für diese Subkategorie',
	'sd_browsedata_otherfilter' => 'Zeige Seiten mit einem anderen Wert für diesen Filter',
	'sd_browsedata_nonefilter' => 'Zeige Seiten mit keinem Wert für diesen Filter',
	'sd_browsedata_or' => 'oder',
	'sd_browsedata_removefilter' => 'Lösche diesen Filter',
	'sd_browsedata_removesubcategoryfilter' => 'Lösche diesen Subkategorie-Filter',
	'sd_browsedata_resetfilters' => 'Filter zurücksetzen',
	'sd_browsedata_addanothervalue' => 'Anderen Wert hinzufügen',
	'sd_browsedata_daterangestart' => 'Anfang:',
	'sd_browsedata_daterangeend' => 'Ende:',
	'filters' => 'Filter',
	'sd_filters_docu' => 'Die folgenden Filter existieren in diesem Wiki:',
	'createfilter' => 'Erstelle einen Filter',
	'sd_createfilter_name' => 'Name:',
	'sd_createfilter_property' => 'Attribut dieses Filters:',
	'sd_createfilter_usepropertyvalues' => 'Verwende alle Werte dieses Attributs für den Filter.',
	'sd_createfilter_usecategoryvalues' => 'Verwende die Werte für den Filter von dieser Kategorie:',
	'sd_createfilter_usedatevalues' => 'Verwende folgende Zeitangabe für diesen Filter:',
	'sd_createfilter_entervalues' => 'Verwende diese Werte für den Filter (Werte durch Komma getrennt eingeben - Wenn ein Wert ein Komma enthält, mit „\\,“ ersetzen):',
	'sd_createfilter_inputtype' => 'Eingabetyp dieses Filters:',
	'sd_createfilter_listofvalues' => 'Liste von Werten (Standard)',
	'sd_createfilter_requirefilter' => 'Bevor dieser Filter angezeigt wird, muss folgender anderer Filter gesetzt sein:',
	'sd_createfilter_label' => 'Bezeichnung dieses Filters (optional):',
	'sd_blank_error' => 'darf nicht leer sein',
	'sd_filter_coversproperty' => 'Dieser Filter betrifft das Attribut $1.',
	'sd_filter_getsvaluesfromcategory' => 'Er erhält seine Werte aus der Kategorie $1.',
	'sd_filter_usestimeperiod' => 'Er verwendet $1 als Zeitangabe.',
	'sd_filter_year' => 'Jahr',
	'sd_filter_month' => 'Monat',
	'sd_filter_hasvalues' => 'Er hat den Wert $1.',
	'sd_filter_hasinputtype' => 'Es hat den Eingabetypen $1.',
	'sd_filter_freetext' => 'Text',
	'sd_filter_daterange' => 'Zeitspanne',
	'sd_filter_requiresfilter' => 'Er setzt den Filter $1 voraus.',
	'sd_filter_haslabel' => 'Er hat die Bezeichnung $1.',
);

/** Zazaki (Zazaki)
 * @author Belekvor
 */
$messages['diq'] = array(
	'sd_browsedata_none' => 'çino',
);

/** Greek (Ελληνικά)
 * @author Consta
 */
$messages['el'] = array(
	'sd_browsedata_choosecategory' => 'Επιλέξτε μια κατηγορία',
	'sd_browsedata_subcategory' => 'Υποκατηγορία',
	'sd_browsedata_or' => 'ή',
	'filters' => 'Φίλτρα',
	'sd_createfilter_name' => 'Όνομα:',
	'sd_filter_year' => 'Χρόνος',
	'sd_filter_month' => 'Μήνας',
);

/** Esperanto (Esperanto)
 * @author Melancholie
 * @author Yekrats
 */
$messages['eo'] = array(
	'browsedata' => 'Rigardu datenojn',
	'sd_browsedata_choosecategory' => 'Elektu kategorion',
	'sd_browsedata_viewcategory' => 'rigardu kategorion',
	'sd_browsedata_subcategory' => 'Subkategorio',
	'sd_browsedata_other' => 'Alia',
	'sd_browsedata_none' => 'Neniu',
	'sd_browsedata_filterbyvalue' => 'Filtru laŭ ĉi tiu valuto',
	'sd_browsedata_filterbysubcategory' => 'Filtru laŭ ĉi tiu subkategorio',
	'sd_browsedata_otherfilter' => 'Montru paĝojn kun alia valuto por ĉi tiu filtrilo',
	'sd_browsedata_nonefilter' => 'Montru paĝojn kun neniu valuto por ĉi tiu filtrilo',
	'sd_browsedata_or' => 'aŭ',
	'sd_browsedata_removefilter' => 'Forigu filtrilon',
	'sd_browsedata_removesubcategoryfilter' => 'Forigu ĉi tiun subkategorian filtrilon',
	'sd_browsedata_resetfilters' => 'Restarigu filtrilojn',
	'sd_browsedata_addanothervalue' => 'Aldonu plian valuton',
	'sd_browsedata_daterangestart' => 'Ekde:',
	'sd_browsedata_daterangeend' => 'Al:',
	'filters' => 'Filtriloj',
	'sd_filters_docu' => 'La jenaj filtriloj ekzistas en {{SITENAME}}:',
	'createfilter' => 'Kreu filtrilon',
	'sd_createfilter_name' => 'Nomo:',
	'sd_createfilter_property' => 'Eco kovrita de ĉi tiu filtrilo:',
	'sd_createfilter_usepropertyvalues' => 'Uzu ĉiujn valutojn de ĉi tiu eco por la filtrilo',
	'sd_createfilter_usecategoryvalues' => 'Akiru valutojn por filtrilo de ĉi tiu kategorio:',
	'sd_createfilter_usedatevalues' => 'Uzu dat-intervalojn por ĉi tiu filtrilo kun ĉi tiu tempo-periodo:',
	'sd_createfilter_entervalues' => 'Enigu valutojn por filtrilo permane (valutoj estu apartigitaj de komoj - se valuto enhavas komon, anstataŭigu ĝin per "\\,"):',
	'sd_createfilter_requirefilter' => 'Devigu alian filtrilon esti selektita antaŭ ĉi tiu estas montrita:',
	'sd_createfilter_label' => 'Etikedo por ĉi tiu filtrilo (nedeviga):',
	'sd_blank_error' => 'ne povas esti malplena',
	'sd_filter_coversproperty' => 'Ĉi tiu filtrilo kovras la econ $1.',
	'sd_filter_getsvaluesfromcategory' => 'Ĝi akiras ties valutojn de la kategorio $1.',
	'sd_filter_usestimeperiod' => 'Ĝi uzas $1 kiel ies tempdaŭron.',
	'sd_filter_year' => 'Jaro',
	'sd_filter_month' => 'Monato',
	'sd_filter_hasvalues' => 'Ĝi havas valutojn $1.',
	'sd_filter_freetext' => 'teksto',
	'sd_filter_daterange' => 'tempospaco',
	'sd_filter_requiresfilter' => 'Ĝi devigas la eston de la filtrilo $1.',
	'sd_filter_haslabel' => 'Ĝi havas etikedon $1.',
);

/** Spanish (Español)
 * @author Imre
 * @author Sanbec
 */
$messages['es'] = array(
	'sd_browsedata_subcategory' => 'Subcategoría',
	'sd_browsedata_other' => 'Otro',
	'sd_browsedata_none' => 'Ninguno',
	'sd_browsedata_or' => 'o',
	'sd_browsedata_daterangestart' => 'Inicio:',
	'sd_createfilter_name' => 'Nombre:',
	'sd_filter_year' => 'Año',
	'sd_filter_month' => 'Mes',
	'sd_filter_freetext' => 'texto',
);

/** Basque (Euskara)
 * @author An13sa
 */
$messages['eu'] = array(
	'sd_browsedata_choosecategory' => 'Kategoria aukeratu',
	'sd_browsedata_viewcategory' => 'kategoria ikusi',
	'sd_browsedata_subcategory' => 'Azpikategoria',
	'sd_browsedata_or' => 'edo',
	'sd_browsedata_addanothervalue' => 'Beste balio bat gehitu',
	'sd_createfilter_name' => 'Izena:',
	'sd_filter_year' => 'Urtea',
	'sd_filter_month' => 'Hilabetea',
	'sd_filter_freetext' => 'testua',
);

/** Persian (فارسی)
 * @author Huji
 * @author Ibrahim
 * @author Tofighi
 */
$messages['fa'] = array(
	'browsedata' => 'نمایش اطلاعات',
	'sd_browsedata_choosecategory' => 'انتخاب یک رده',
	'sd_browsedata_viewcategory' => 'نمایش رده',
	'sd_browsedata_subcategory' => 'زیررده',
	'sd_browsedata_other' => 'دیگر',
	'sd_browsedata_none' => 'هیچکدام',
	'sd_browsedata_filterbyvalue' => 'فیلتر با این مقدار',
	'sd_browsedata_filterbysubcategory' => 'فیلتر با این زیر رده',
	'sd_browsedata_otherfilter' => 'نمایش صفحاتی با مقدار دیگر برای این فیلتر',
	'sd_browsedata_nonefilter' => 'نمایش صفحه‌های فاقد مقدار برای این فیلتر',
	'sd_browsedata_or' => 'یا',
	'sd_browsedata_removefilter' => 'حذف این فیلتر',
	'sd_browsedata_removesubcategoryfilter' => 'حذف این فیلتر زیر رده',
	'sd_browsedata_resetfilters' => 'تنظیم فیلترها از نو',
	'sd_browsedata_addanothervalue' => 'مقدار دیگری اضافه کنید',
	'sd_browsedata_daterangestart' => ':شروع',
	'filters' => 'فیلترها',
	'sd_filters_docu' => 'فیلترهای زیر در این ویکی وجود دارد:',
	'createfilter' => 'فیلتر بسازید',
	'sd_createfilter_name' => 'نام:',
	'sd_createfilter_property' => 'ویژگی که این فیلتر شامل آن می‌شود:',
	'sd_createfilter_usepropertyvalues' => 'همه مقادیر این ویژگی را برای این فیلتر به‌کار برید',
	'sd_createfilter_usecategoryvalues' => 'مقادیر فیلتر را از این رده بگیرید:',
	'sd_createfilter_usedatevalues' => 'بازه زمانی که به عنوان پریود زمانی این فیلتر به‌کار گرفته شود:',
	'sd_createfilter_entervalues' => 'مقادیر فیلتر را دستی وارد کنید (مقادیر باید با کاما جدا شوند، اگر یک مقدار کاما دارد، آن‌را با "\\،" جایگزین کنید):',
	'sd_createfilter_requirefilter' => 'قبل از نمایش این یکی، یک فیلتر دیگر باید انتخاب شود:',
	'sd_createfilter_label' => 'برچسب این فیلتر (دلخواه)',
	'sd_blank_error' => 'نمی‌تواند خالی باشد',
	'sd_filter_coversproperty' => 'این فیلتر ویژگی $1 را شامل می‌شود.',
	'sd_filter_getsvaluesfromcategory' => 'مقادیرش را از رده $1 می‌گیرد',
	'sd_filter_usestimeperiod' => '$1 را به عنوان پریود زمانی به‌کار می‌برد',
	'sd_filter_year' => 'سال',
	'sd_filter_month' => 'ماه',
	'sd_filter_hasvalues' => 'مقادیر $1 را دارد.',
	'sd_filter_requiresfilter' => 'به وجود فیلتر $1 احتیاج دارد.',
	'sd_filter_haslabel' => 'برچسب $1 دارد.',
);

/** Finnish (Suomi)
 * @author Nike
 * @author Str4nd
 */
$messages['fi'] = array(
	'browsedata' => 'Datan selaus',
	'sd_browsedata_choosecategory' => 'Valitse luokka',
	'sd_browsedata_viewcategory' => 'näytä luokka',
	'sd_browsedata_subcategory' => 'Alaluokka',
	'sd_browsedata_other' => 'Muu',
	'sd_browsedata_none' => 'Ei mikään',
	'sd_browsedata_or' => 'tai',
	'sd_browsedata_removefilter' => 'Poista suodin',
	'sd_browsedata_resetfilters' => 'Nollaa suotimet',
	'sd_browsedata_daterangestart' => 'Alku',
	'sd_browsedata_daterangeend' => 'Loppu',
	'filters' => 'Suotimet',
	'sd_filters_docu' => 'Tässä wikissä on seuraavat suotimet:',
	'createfilter' => 'Luo suodin',
	'sd_createfilter_name' => 'Nimi',
	'sd_blank_error' => 'ei voi olla tyhjä',
	'sd_filter_year' => 'Vuosi',
	'sd_filter_month' => 'Kuukausi',
);

/** French (Français)
 * @author Grondin
 * @author IAlex
 * @author Sherbrooke
 * @author Urhixidur
 */
$messages['fr'] = array(
	'semanticdrilldown-desc' => 'Une interface d’exercice pour la navigation au travers de semantic data',
	'specialpages-group-sd_group' => 'Exercice de sémantique',
	'browsedata' => 'Chercher les données',
	'sd_browsedata_choosecategory' => 'Choisir une catégorie',
	'sd_browsedata_viewcategory' => 'Voir la catégorie',
	'sd_browsedata_docu' => 'Cliquer sur un ou plusieurs éléemnts pour resserrer vos résultats.',
	'sd_browsedata_subcategory' => 'Sous-catégorie',
	'sd_browsedata_other' => 'Autre',
	'sd_browsedata_none' => 'Néant',
	'sd_browsedata_filterbyvalue' => 'Filtré par valeur',
	'sd_browsedata_filterbysubcategory' => 'Filtrer par cette sous-catégorie',
	'sd_browsedata_otherfilter' => 'Voir les pages avec une autre valeur pour ce filtre',
	'sd_browsedata_nonefilter' => 'Voir les pages avec aucune valeur pour ce filtre',
	'sd_browsedata_or' => 'ou',
	'sd_browsedata_removefilter' => 'Retirer ce filtre',
	'sd_browsedata_removesubcategoryfilter' => 'Retirer cette sous-catégorie de filtre',
	'sd_browsedata_resetfilters' => 'Remise à zéro des filtres',
	'sd_browsedata_addanothervalue' => 'Ajouter une autre valeur',
	'sd_browsedata_daterangestart' => 'Début :',
	'sd_browsedata_daterangeend' => 'Fin :',
	'filters' => 'Filtres',
	'sd_filters_docu' => 'Le filtre suivant existe sur {{SITENAME}} :',
	'createfilter' => 'Créer un filtre',
	'sd_createfilter_name' => 'Nom :',
	'sd_createfilter_property' => 'Propriété que ce filtre couvrira :',
	'sd_createfilter_usepropertyvalues' => 'Utiliser, pour ce filtre, toutes les valeurs de cette propriété',
	'sd_createfilter_usecategoryvalues' => 'Obtenir les valeurs pour ce filtre à partir de cette catégorie :',
	'sd_createfilter_usedatevalues' => 'Utilise des blocs de date pour ce filtre avec cette période temporelle :',
	'sd_createfilter_entervalues' => 'Entrez manuellement les valeurs pour ce filtre (les valeurs devront être séparées par des virgules - si une valeur contient une virgule, remplacez-la par « \\, ») :',
	'sd_createfilter_inputtype' => "Type d'entrée pour ce filtre :",
	'sd_createfilter_listofvalues' => 'Liste des valeurs (défaut)',
	'sd_createfilter_requirefilter' => 'Exiger qu’un autre filtre soit sélectionné avant que celui-ci ne soit affiché :',
	'sd_createfilter_label' => 'Étiquette pour ce filtre (facultatif) :',
	'sd_blank_error' => 'ne peut être laissé en blanc',
	'sd_filter_coversproperty' => 'Ce filtre couvre la propriété $1.',
	'sd_filter_getsvaluesfromcategory' => 'Il obtient ses valeurs à partir de la catégorie $1.',
	'sd_filter_usestimeperiod' => 'Il utilise $1 comme durée de sa période',
	'sd_filter_year' => 'Année',
	'sd_filter_month' => 'Mois',
	'sd_filter_hasvalues' => 'Il a $1 comme valeur',
	'sd_filter_hasinputtype' => "Il a le type d'entrée $1.",
	'sd_filter_freetext' => 'texte',
	'sd_filter_daterange' => 'Gamme de date',
	'sd_filter_requiresfilter' => 'Il nécessite la présence du filtre $1.',
	'sd_filter_haslabel' => 'Étiqueté $1.',
);

/** Western Frisian (Frysk)
 * @author Snakesteuben
 */
$messages['fy'] = array(
	'sd_browsedata_other' => 'Oare',
	'sd_browsedata_none' => 'Gjin',
	'filters' => 'Filters',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 */
$messages['gl'] = array(
	'semanticdrilldown-desc' => 'Unha interface para navegar a través de datos semánticos',
	'specialpages-group-sd_group' => 'Exercicio de semántica',
	'browsedata' => 'Datos do navegador',
	'sd_browsedata_choosecategory' => 'Elixir unha categoría',
	'sd_browsedata_viewcategory' => 'ver categoría',
	'sd_browsedata_docu' => 'Prema nun ou máis elementos dos de embaixo para estreitar os seus resultados.',
	'sd_browsedata_subcategory' => 'Subcategoría',
	'sd_browsedata_other' => 'Outro',
	'sd_browsedata_none' => 'Ningún',
	'sd_browsedata_filterbyvalue' => 'Filtrar por este valor',
	'sd_browsedata_filterbysubcategory' => 'Filtrar por esta subcategoría',
	'sd_browsedata_otherfilter' => 'Amosar páxinas con outro valor para este filtro',
	'sd_browsedata_nonefilter' => 'Amosar páxinas con ningún valor para este filtro',
	'sd_browsedata_or' => 'ou',
	'sd_browsedata_removefilter' => 'Eliminar este filtro',
	'sd_browsedata_removesubcategoryfilter' => 'Eliminar este filtro de subcategorías',
	'sd_browsedata_resetfilters' => 'Eliminar filtros',
	'sd_browsedata_addanothervalue' => 'Engadir outro valor',
	'sd_browsedata_daterangestart' => 'Comezo:',
	'sd_browsedata_daterangeend' => 'Fin:',
	'filters' => 'Filtros',
	'sd_filters_docu' => 'Os seguintes filtros existen en {{SITENAME}}:',
	'createfilter' => 'Crear un filtro',
	'sd_createfilter_name' => 'Nome:',
	'sd_createfilter_property' => 'Propiedade que o filtro inclúe:',
	'sd_createfilter_usepropertyvalues' => 'Usar todos os valores da propiedade para o filtro',
	'sd_createfilter_usecategoryvalues' => 'Obter os valores para o filtro desta categoría:',
	'sd_createfilter_usedatevalues' => 'Use rangos de data para este filtro con este período de tempo:',
	'sd_createfilter_entervalues' => 'Introduza valores para filtrar manualmente (os valores deben separarse por comas - se o valor contén unha coma, substitúaa por "\\,"):',
	'sd_createfilter_inputtype' => 'Tipo de entrada para este filtro:',
	'sd_createfilter_listofvalues' => 'lista de valores (por defecto)',
	'sd_createfilter_requirefilter' => 'Requírese que sexa seleccionado outro filtro antes de que este sexa amosado:',
	'sd_createfilter_label' => 'Lapela para este filtro (opcional):',
	'sd_blank_error' => 'non pode estar en branco',
	'sd_filter_coversproperty' => 'O filtro inclúe a propiedade $1.',
	'sd_filter_getsvaluesfromcategory' => 'Obtén os seus valores da categoría $1.',
	'sd_filter_usestimeperiod' => 'Usa $1 como o seu período de tempo.',
	'sd_filter_year' => 'Ano',
	'sd_filter_month' => 'Mes',
	'sd_filter_hasvalues' => 'Ten os valores $1.',
	'sd_filter_hasinputtype' => 'Ten o tipo de entrada $1.',
	'sd_filter_freetext' => 'texto',
	'sd_filter_daterange' => 'gama de data',
	'sd_filter_requiresfilter' => 'Require a presenza do filtro $1.',
	'sd_filter_haslabel' => 'Ten a lapela $1.',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'sd_browsedata_none' => 'Οὐδεμία',
	'sd_browsedata_or' => 'ἢ',
	'filters' => 'Διηθητήρια',
	'sd_createfilter_name' => 'Ὄνομα:',
	'sd_filter_month' => 'Μήν',
);

/** Manx (Gaelg)
 * @author MacTire02
 */
$messages['gv'] = array(
	'sd_browsedata_viewcategory' => 'jeeagh er ronney',
	'sd_browsedata_other' => 'Elley',
	'sd_createfilter_name' => 'Ennym:',
	'sd_filter_year' => 'Blein',
	'sd_filter_month' => 'Mee',
);

/** Hawaiian (Hawai`i)
 * @author Singularity
 */
$messages['haw'] = array(
	'sd_createfilter_name' => 'Inoa:',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 */
$messages['hi'] = array(
	'browsedata' => 'डाटा देखें',
	'sd_browsedata_choosecategory' => 'एक श्रेणी चुनें',
	'sd_browsedata_viewcategory' => 'श्रेणी देखें',
	'sd_browsedata_subcategory' => 'उपश्रेणी',
	'sd_browsedata_other' => 'अन्य',
	'sd_browsedata_none' => 'बिल्कुल नहीं',
	'sd_browsedata_filterbyvalue' => 'इस वैल्यू के अनुसार फ़िल्टर करें',
	'sd_browsedata_filterbysubcategory' => 'इस उपश्रेणी के अनुसार फ़िल्टर करें',
	'sd_browsedata_removefilter' => 'यह फ़िल्टर हटायें',
	'sd_browsedata_removesubcategoryfilter' => 'यह उपश्रेणी फ़िल्टर हटायें',
	'sd_browsedata_resetfilters' => 'फ़िल्टर रिसैट करें',
	'filters' => 'फ़िल्टर्स',
	'createfilter' => 'फ़िल्टर बनायें',
	'sd_createfilter_name' => 'नाम:',
	'sd_createfilter_property' => 'यह फ़िल्टर कौनसे गुणधर्मका इस्तेमाल करता हैं:',
	'sd_createfilter_usepropertyvalues' => 'इस फ़िल्टरके लिये इस गुणधर्मकी सभी वैल्यूओंका इस्तेमाल करें',
	'sd_createfilter_usecategoryvalues' => 'इस फ़िल्टरके लिये इस श्रेणी से वैल्यू लें:',
	'sd_createfilter_label' => 'इस फ़िल्टरका लेबल (वैकल्पिक):',
	'sd_blank_error' => 'खाली नहीं हो सकता',
	'sd_filter_year' => 'साल',
	'sd_filter_month' => 'महिना',
	'sd_filter_hasvalues' => 'इसमें $1 यह वैल्यू हैं।',
	'sd_filter_haslabel' => 'इसको $1 यह लेबल हैं।',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'semanticdrilldown-desc' => 'Interfejs Drilldown za nawigaciju znutřka semantiskich datow',
	'specialpages-group-sd_group' => 'Semantiski Drilldown',
	'browsedata' => 'Daty přepytać',
	'sd_browsedata_choosecategory' => 'Wubjer kategoriju',
	'sd_browsedata_viewcategory' => 'Kategoriju wobhladać',
	'sd_browsedata_docu' => 'Klikń na jedyn zapisk abo na wjacore zapiski, zo by wuslědki zamjezował.',
	'sd_browsedata_subcategory' => 'Podkategorija',
	'sd_browsedata_other' => 'Druhe',
	'sd_browsedata_none' => 'Žane',
	'sd_browsedata_filterbyvalue' => 'Po tutej hódnoće filtrować',
	'sd_browsedata_filterbysubcategory' => 'Po tutej podkategoriji filtorwać',
	'sd_browsedata_otherfilter' => 'Strony z druhej hódnotu za tutón filter pokazać',
	'sd_browsedata_nonefilter' => 'Strony bjez hódnoty za tutón filter pokazać',
	'sd_browsedata_or' => 'abo',
	'sd_browsedata_removefilter' => 'Tutón filter wotstronić',
	'sd_browsedata_removesubcategoryfilter' => 'Tutón podkategorijny filter wotstronić',
	'sd_browsedata_resetfilters' => 'Filtry wróćo stajić',
	'sd_browsedata_addanothervalue' => 'Druhu hódnotu přidać',
	'sd_browsedata_daterangestart' => 'Spočatk:',
	'sd_browsedata_daterangeend' => 'Kónc:',
	'filters' => 'Filtry',
	'sd_filters_docu' => 'Slědowace filtry we {{GRAMMAR:Lokatiw|{{SITENAME}}}} eksistuja:',
	'createfilter' => 'Wutwor filter',
	'sd_createfilter_name' => 'Mjeno:',
	'sd_createfilter_property' => 'Kajkosć tutho filtra:',
	'sd_createfilter_usepropertyvalues' => 'Wužij wšě hódnoty tuteje kajkosće za filter',
	'sd_createfilter_usecategoryvalues' => 'Wobstaraj hódnoty za filter z tuteje kategorije:',
	'sd_createfilter_usedatevalues' => 'Wužij datumowe wotrězk za tutón filter z tutej dobu:',
	'sd_createfilter_entervalues' => 'Zapodaj hódnoty za filter manuelnje (hódnoty měli so z komami rozdźělić  - jeli hódnota komu wobsahuje, narunaj ju přez "\\", "):',
	'sd_createfilter_inputtype' => 'Typ zapodaća za tutón filter:',
	'sd_createfilter_listofvalues' => 'lisćina hódnotow (standard)',
	'sd_createfilter_requirefilter' => 'Zo by tutón filter zwobrazniło, je druhi filter trjeba:',
	'sd_createfilter_label' => 'Mjeno tutoho filtra (opcionalny):',
	'sd_blank_error' => 'njesmě prózdny być',
	'sd_filter_coversproperty' => 'Tutón filter wobsahuje kajkosć $1.',
	'sd_filter_getsvaluesfromcategory' => 'Wobsahuje swoje hódnoty z kategorije $1.',
	'sd_filter_usestimeperiod' => 'Wužiwa $1 jako dobu.',
	'sd_filter_year' => 'Lěto',
	'sd_filter_month' => 'Měsac',
	'sd_filter_hasvalues' => 'Ma hódnoty $1.',
	'sd_filter_hasinputtype' => 'Ma typ zapodaća $1.',
	'sd_filter_freetext' => 'tekst',
	'sd_filter_daterange' => 'rozsah datow',
	'sd_filter_requiresfilter' => 'Trjeba filter $1.',
	'sd_filter_haslabel' => 'Ma mjeno $1.',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author Dorgan
 */
$messages['hu'] = array(
	'sd_browsedata_none' => 'Nincs',
	'sd_filter_year' => 'Év',
	'sd_filter_month' => 'Hónap',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'semanticdrilldown-desc' => 'Un interfacie de exercitio pro navigar per datos semantic',
	'specialpages-group-sd_group' => 'Exercitio de semantica',
	'browsedata' => 'Percurrer datos',
	'sd_browsedata_choosecategory' => 'Selige un categoria',
	'sd_browsedata_viewcategory' => 'vider categoria',
	'sd_browsedata_docu' => 'Clicca super un o plus entratas in basso pro restringer tu resultatos.',
	'sd_browsedata_subcategory' => 'Subcategoria',
	'sd_browsedata_other' => 'Altere',
	'sd_browsedata_none' => 'Nulle',
	'sd_browsedata_filterbyvalue' => 'Filtrar per iste valor',
	'sd_browsedata_filterbysubcategory' => 'Filtrar per iste subcategoria',
	'sd_browsedata_otherfilter' => 'Monstrar paginas con un altere valor pro iste filtro',
	'sd_browsedata_nonefilter' => 'Monstrar paginas sin valor pro iste filtro',
	'sd_browsedata_or' => 'o',
	'sd_browsedata_removefilter' => 'Remover iste filtro',
	'sd_browsedata_removesubcategoryfilter' => 'Remover iste filtro de subcategoria',
	'sd_browsedata_resetfilters' => 'Reinitiar filtros',
	'sd_browsedata_addanothervalue' => 'Adder un altere valor',
	'sd_browsedata_daterangestart' => 'Initio:',
	'sd_browsedata_daterangeend' => 'Fin:',
	'filters' => 'Filtros',
	'sd_filters_docu' => 'Le sequente filtros existe in {{SITENAME}}:',
	'createfilter' => 'Crear un filtro',
	'sd_createfilter_name' => 'Nomine:',
	'sd_createfilter_property' => 'Le proprietate que iste filtro coperi:',
	'sd_createfilter_usepropertyvalues' => 'Usar tote le valores de iste proprietate pro le filtro',
	'sd_createfilter_usecategoryvalues' => 'Obtener valores pro filtro ab iste categoria:',
	'sd_createfilter_usedatevalues' => 'Usar intervallos de datas pro iste filtro con iste periodo de tempore:',
	'sd_createfilter_entervalues' => 'Entra valores pro le filtro manualmente (le valores debe esser separate per commas - si un valor contine un comma, reimplacia lo con "\\,"):',
	'sd_createfilter_inputtype' => 'Typo de input pro iste filtro:',
	'sd_createfilter_listofvalues' => 'lista de valores (predefinite)',
	'sd_createfilter_requirefilter' => 'Requirer que un altere filtro sia seligite ante que iste es monstrate:',
	'sd_createfilter_label' => 'Etiquetta pro iste filtro (optional):',
	'sd_blank_error' => 'non pote esser vacue',
	'sd_filter_coversproperty' => 'Iste filtro coperi le proprietate $1.',
	'sd_filter_getsvaluesfromcategory' => 'Illo obtene su valores ab le categoria $1.',
	'sd_filter_usestimeperiod' => 'Illo usa $1 como su periodo de tempore.',
	'sd_filter_year' => 'Anno',
	'sd_filter_month' => 'Mense',
	'sd_filter_hasvalues' => 'Illo ha le valores $1.',
	'sd_filter_hasinputtype' => 'Illo ha le typo de input $1.',
	'sd_filter_freetext' => 'texto',
	'sd_filter_daterange' => 'gamma de datas',
	'sd_filter_requiresfilter' => 'Illo require le presentia del filtro $1.',
	'sd_filter_haslabel' => 'Illo ha le etiquetta $1.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Irwangatot
 * @author Rex
 */
$messages['id'] = array(
	'sd_browsedata_none' => 'Tidak ada',
	'sd_createfilter_name' => 'Nama:',
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 */
$messages['is'] = array(
	'filters' => 'Síur',
	'sd_createfilter_name' => 'Nafn:',
);

/** Italian (Italiano)
 * @author Darth Kule
 */
$messages['it'] = array(
	'sd_createfilter_name' => 'Nome:',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Hosiryuhosi
 */
$messages['ja'] = array(
	'sd_browsedata_none' => 'なし',
	'sd_filter_year' => '年',
	'sd_filter_freetext' => 'テキスト',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 */
$messages['jv'] = array(
	'sd_browsedata_choosecategory' => 'Pilih kategori',
	'sd_browsedata_viewcategory' => 'ndeleng kategori',
	'sd_browsedata_subcategory' => 'Subkategori',
	'sd_browsedata_other' => 'Liyané',
	'sd_browsedata_none' => 'Ora ana',
	'sd_browsedata_or' => 'utawa',
	'sd_browsedata_removefilter' => 'Ilangana filter iki',
	'sd_browsedata_addanothervalue' => 'Tambahna biji liya',
	'filters' => 'Filter-filter',
	'createfilter' => 'Nggawé filter',
	'sd_createfilter_name' => 'Jeneng:',
	'sd_createfilter_property' => 'Sifat sing diliput filter iki:',
	'sd_createfilter_label' => 'Label kanggo filter (opsional):',
	'sd_blank_error' => 'ora bisa kosong',
	'sd_filter_year' => 'Taun',
	'sd_filter_month' => 'Sasi',
	'sd_filter_requiresfilter' => 'Merlokaké anané filter $1.',
);

/** Georgian (ქართული)
 * @author Malafaya
 */
$messages['ka'] = array(
	'sd_createfilter_name' => 'სახელი:',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author Thearith
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'browsedata' => 'រាវរកទិន្នន័យ',
	'sd_browsedata_choosecategory' => 'ជ្រើសរើសចំណាត់ថ្នាក់ក្រុម',
	'sd_browsedata_viewcategory' => 'មើលចំណាត់ថ្នាក់ក្រុម',
	'sd_browsedata_subcategory' => 'ចំណាត់ក្រុមរង',
	'sd_browsedata_other' => 'ផ្សេងៗទៀត',
	'sd_browsedata_none' => 'ទទេ',
	'sd_browsedata_filterbyvalue' => 'តម្រង​តាមរយៈ​តម្លៃ​នេះ',
	'sd_browsedata_filterbysubcategory' => 'តម្រង​តាមរយៈ​ចំណាត់ថ្នាក់ក្រុម​នេះ',
	'sd_browsedata_otherfilter' => 'បង្ហាញ​ទំព័រ​ជាមួយ​តម្លៃ​ផ្សេង​សម្រាប់​តម្រង​នេះ',
	'sd_browsedata_nonefilter' => 'បង្ហាញ​ទំព័រ​ដោយ​គ្មាន​តម្លៃ​សម្រាប់​តម្រង​នេះ',
	'sd_browsedata_or' => 'ឬ',
	'sd_browsedata_removefilter' => 'ដក​តម្រង​នេះចេញ',
	'sd_browsedata_removesubcategoryfilter' => 'ដក​តម្រង​ចំណាត់ថ្នាក់ក្រុមរង​នេះ​ចេញ',
	'sd_browsedata_resetfilters' => 'កំណត់​តម្រង​ឡើងវិញ',
	'sd_browsedata_addanothervalue' => 'បន្ថែម​តម្លៃ​ផ្សេង',
	'sd_browsedata_daterangestart' => 'ចាប់ផ្ដើម:',
	'sd_browsedata_daterangeend' => 'បញ្ចប់:',
	'filters' => 'តម្រងការពារនានា',
	'sd_filters_docu' => 'តម្រង​ដូចតទៅនេះ​មាន​នៅក្នុង {{SITENAME}}:',
	'createfilter' => 'បង្កើត​តម្រង',
	'sd_createfilter_name' => 'ឈ្មោះ៖',
	'sd_createfilter_property' => 'លក្ខណៈសម្បត្តិ​ដែល​តម្រង​នេះ​គ្រប:',
	'sd_createfilter_usepropertyvalues' => 'តម្លៃ​ទាំងអស់​នៃលក្ខណៈសម្បត្តិ​នេះ​សម្រាប់​តម្រង',
	'sd_createfilter_usecategoryvalues' => 'ទទួល​តម្លៃ​សម្រាប់​តម្រង​ពី​ចំណាត់ថ្នាក់ក្រុម​នេះ:',
	'sd_createfilter_usedatevalues' => 'ប្រើប្រាស់​ជួរ​កាលបរិច្ឆេទ សម្រាប់​តម្រង​នេះ​ជាមួយ​កំលុងពេល​នេះ:',
	'sd_createfilter_entervalues' => 'បញ្ចូល​តម្លៃ​សម្រាប់​តម្រង​ដោយដៃ (តម្លៃ​គួរតែ​ត្រូវ​បាន​ខណ្ឌចែក​ដោយ​ចុល្លភាគ​នានា (commas)- ប្រសិនបើ​តម្លៃ​មាន​ចុល្លភាគ​មួយ ចូរ​ជំនួស​វា​ដោយ "\\,"):',
	'sd_createfilter_inputtype' => 'បញ្ចូល​គំរូ​សម្រាប់​តម្រង​នេះ:',
	'sd_createfilter_listofvalues' => 'បញ្ជី​នៃ​តម្លៃ (លំនាំដើម)',
	'sd_createfilter_requirefilter' => 'ទាមទារ​តម្រង​ផ្សេងទៀត​ដើម្បី​ធ្វើការ​ជ្រើសរើស មុនពេល​តម្រង​មួយនេះ​ត្រូវ​បាន​បង្ហាញ:',
	'sd_createfilter_label' => 'ស្លាក​សម្រាប់​តម្រង​នេះ (តាមបំណង):',
	'sd_blank_error' => 'មិន​អាច​ទទេ​បាន​ឡើយ',
	'sd_filter_coversproperty' => 'តម្រង​នេះ​គ្របដណ្ដប់​ចំណាត់ថ្នាក់ក្រុម $1 ។',
	'sd_filter_getsvaluesfromcategory' => 'វា​ទទួល​តម្លៃ​របស់​ខ្លួន​ពី​ចំណាត់ថ្នាក់ក្រុម $1 ។',
	'sd_filter_usestimeperiod' => 'វា​ប្រើប្រាស់ $1 ជា​កំលុងពេល​របស់​វា​។',
	'sd_filter_year' => 'ឆ្នាំ',
	'sd_filter_month' => 'ខែ',
	'sd_filter_hasvalues' => 'វា​មាន​តម្លៃ $1 ។',
	'sd_filter_freetext' => 'អក្សរ',
	'sd_filter_daterange' => 'ជួរ​កាលបរិច្ឆេទ',
	'sd_filter_requiresfilter' => 'វា​ទាមទារ​ឱ្យ​មាន​វត្តមាន​របស់​តម្រង $1 ។',
	'sd_filter_haslabel' => 'វា​មាន​ស្លាក $1 ។',
);

/** Korean (한국어)
 * @author Albamhandae
 */
$messages['ko'] = array(
	'filters' => '필터',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'browsedata' => 'En dä Date bläddere',
	'sd_browsedata_other' => 'Söns wat',
	'sd_createfilter_name' => 'Name:',
	'sd_filter_year' => 'Johr',
	'sd_filter_month' => 'Mohnd',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'semanticdrilldown-desc' => "En ''Drilldown''-Interface, fir duerch semantesch Daten ze navigéieren",
	'specialpages-group-sd_group' => "Semnateschen ''Drilldown''",
	'sd_browsedata_choosecategory' => 'Eng Kategorie wielen',
	'sd_browsedata_viewcategory' => 'Kategorie weisen',
	'sd_browsedata_subcategory' => 'Ënnerkategorie',
	'sd_browsedata_other' => 'Aner',
	'sd_browsedata_none' => 'Keen',
	'sd_browsedata_filterbyvalue' => 'Filter fir dëse Wert',
	'sd_browsedata_filterbysubcategory' => 'No dëser Ënnerkategorie filteren',
	'sd_browsedata_otherfilter' => 'Säite weisen déi matt engem anere Wert fir dëse Filter',
	'sd_browsedata_nonefilter' => 'Sàite weisen déi kee Wert fir dëse Filter hunn',
	'sd_browsedata_or' => 'oder',
	'sd_browsedata_removefilter' => 'Dëse filtr ewechhuelen',
	'sd_browsedata_removesubcategoryfilter' => 'Dëse Filter vun den Ënnerkategorien ewechhuelen',
	'sd_browsedata_resetfilters' => 'Filteren zrécksetzen',
	'sd_browsedata_addanothervalue' => 'Een anere Wert derbäisetzen',
	'sd_browsedata_daterangestart' => 'Ufank:',
	'sd_browsedata_daterangeend' => 'Enn:',
	'filters' => 'Filteren',
	'sd_filters_docu' => 'Dës Filtere gëtt et op {{SITENAME}}:',
	'createfilter' => 'E Filter uleeën',
	'sd_createfilter_name' => 'Numm:',
	'sd_createfilter_usepropertyvalues' => 'All Werter vun dëser Eegeschaft fir de Filter benotzen',
	'sd_createfilter_usecategoryvalues' => 'Werter fir dëse Filter vun dëser Kategorie kréien:',
	'sd_createfilter_listofvalues' => 'Lëscht vun de Werter (stanard)',
	'sd_createfilter_requirefilter' => 'Verlaangen dat en anere Filter gewielt gëtt ier dësen ugewise gëtt:',
	'sd_createfilter_label' => 'Etiquette fir dëse Filter (fakultativ):',
	'sd_blank_error' => 'däerf net eidel sinn',
	'sd_filter_getsvaluesfromcategory' => 'E kritt seng Werter aus der Kategorie $1.',
	'sd_filter_year' => 'Joer',
	'sd_filter_month' => 'Mount',
	'sd_filter_hasvalues' => 'En huet de Wert $1.',
	'sd_filter_freetext' => 'Text',
	'sd_filter_daterange' => 'Datumsberäich',
	'sd_filter_requiresfilter' => "E verlaangt d'Presenz vum Filter $1.",
	'sd_filter_haslabel' => "en huet d'Etiquette $1.",
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'sd_browsedata_choosecategory' => 'ഒരു വിഭാഗം തിരഞ്ഞെടുക്കുക',
	'sd_browsedata_viewcategory' => 'വിഭാഗം കാണുക',
	'sd_browsedata_subcategory' => 'ഉപവിഭാഗം',
	'sd_browsedata_other' => 'മറ്റുള്ളവ',
	'sd_browsedata_none' => 'ഒന്നുമില്ല',
	'sd_browsedata_filterbyvalue' => 'ഈ മൂല്യം ഉപയോഗിച്ച് അരിക്കുക',
	'sd_browsedata_filterbysubcategory' => 'ഈ ഉപവിഭാഗം ഉപയോഗിച്ച് അരിക്കുക',
	'sd_browsedata_otherfilter' => 'ഈ ഫില്‍റ്റര്‍ ഉപയോഗിച്ച് മറ്റൊരു മൂല്യത്തിലുള്ള താളുകള്‍ കാണിക്കുക',
	'sd_browsedata_nonefilter' => 'മൂല്യമൊന്നും ചേര്‍ക്കാതെ ഈ ഫില്‍റ്റര്‍ ഉപയോഗിച്ച് താളുകള്‍ കാണിക്കുക',
	'sd_browsedata_or' => 'അല്ലെങ്കില്‍',
	'sd_browsedata_removefilter' => 'ഈ ഫില്‍റ്റര്‍ ഒഴിവാക്കുക',
	'sd_browsedata_removesubcategoryfilter' => 'ഈ ഉപവിഭാഗ ഫില്‍റ്റര്‍ ഒഴിവാക്കുക',
	'sd_browsedata_resetfilters' => 'ഫില്‍റ്ററുകള്‍ പുനഃക്രമീകരിക്കുക',
	'sd_browsedata_addanothervalue' => 'മറ്റൊരു മൂല്യം ചേര്‍ക്കുക',
	'filters' => 'ഫില്‍റ്ററുകള്‍',
	'sd_filters_docu' => '{{SITENAME}} സം‌രംഭത്തില്‍ താഴെ പ്രദര്‍ശിപ്പിച്ചിരിക്കുന്ന ഫില്‍റ്ററുകള്‍ നിലവിലുണ്ട്:',
	'createfilter' => 'ഒരു ഫില്‍റ്റര്‍ സൃഷ്ടിക്കുക',
	'sd_createfilter_name' => 'പേര്‌:',
	'sd_blank_error' => 'ശൂന്യമാക്കിയിടുന്നത് അനുവദനീയമല്ല',
	'sd_filter_getsvaluesfromcategory' => '$1 എന്ന വിഭാഗത്തില്‍ നിന്നാണ്‌ ഇതിനു മൂല്യങ്ങള്‍ കിട്ടുന്നത്.',
	'sd_filter_usestimeperiod' => 'ഇതു സമയ പരിധിയായി ഉപയോഗിക്കുന്നത് $1 ആണ്‌.',
	'sd_filter_year' => 'വര്‍ഷം',
	'sd_filter_month' => 'മാസം',
	'sd_filter_hasvalues' => 'ഇതിന്റെ മൂല്യങ്ങള്‍ $1 ആണ്‌.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 * @author Mahitgar
 */
$messages['mr'] = array(
	'browsedata' => 'डाटा न्याहाळा',
	'sd_browsedata_choosecategory' => 'एक वर्ग निवडा',
	'sd_browsedata_viewcategory' => 'वर्ग पहा',
	'sd_browsedata_subcategory' => 'उपवर्ग',
	'sd_browsedata_other' => 'इतर',
	'sd_browsedata_none' => '(काहीही नाही)',
	'sd_browsedata_filterbyvalue' => 'या किंमती प्रमाणे फिल्टर करा',
	'sd_browsedata_filterbysubcategory' => 'या उपवर्गा प्रमाणे फिल्टर करा',
	'sd_browsedata_otherfilter' => 'या फिल्टरच्या दुसर्‍या किंमतीसाठीची पाने दाखवा',
	'sd_browsedata_nonefilter' => 'या फिल्टरच्या शून्य किंमतीसाठीची पाने दाखवा',
	'sd_browsedata_or' => 'किंवा',
	'sd_browsedata_removefilter' => 'हा फिल्टर काढा',
	'sd_browsedata_removesubcategoryfilter' => 'हा उपवर्ग फिल्टर काढा',
	'sd_browsedata_resetfilters' => 'फिल्टर पूर्ववत करा',
	'sd_browsedata_addanothervalue' => 'दुसरी किंमत वाढवा',
	'filters' => 'फिल्टर्स',
	'sd_filters_docu' => '{{SITENAME}} वर खालील फिल्टर्स उपलब्ध आहेत:',
	'createfilter' => 'नवीन फिल्टर बनवा',
	'sd_createfilter_name' => 'नाव:',
	'sd_createfilter_property' => 'हा फिल्टर कुठल्या गुणधर्मासाठी वापरायचा आहे:',
	'sd_createfilter_usepropertyvalues' => 'या फिल्टरकरीता या गुणधर्माच्या सर्व किंमती वापरा',
	'sd_createfilter_usecategoryvalues' => 'या फिल्टरकरीता या वर्गातून किंमती मिळवा:',
	'sd_createfilter_usedatevalues' => 'या फिल्टरकरीता या कालावधीतील तारखा वापरा:',
	'sd_createfilter_entervalues' => 'फिल्टरसाठी स्वत: किंमती भरा (किंमती स्वल्पविराम "," वापरून लिहाव्या, जर एखाद्या किंमतीतच स्वल्पविराम येत असेल तर त्याजागी "\\," लिहा):',
	'sd_createfilter_requirefilter' => 'हा फिल्टर दर्शविण्याआधी जर दुसरा फिल्टर वापरायचा असेल तर त्याचे नाव:',
	'sd_createfilter_label' => 'या फिल्टरकरीत लेबल (वैकल्पिक):',
	'sd_blank_error' => 'रिकामे असू शकत नाही',
	'sd_filter_coversproperty' => 'हा फिल्टर $1 या गुणधर्मावर चालतो.',
	'sd_filter_getsvaluesfromcategory' => 'तो $1 या वर्गातून किंमती घेतो.',
	'sd_filter_usestimeperiod' => 'तो $1 कालावधी वापरतो.',
	'sd_filter_year' => 'वर्ष',
	'sd_filter_month' => 'महीना',
	'sd_filter_hasvalues' => 'त्यामध्ये $1 या किंमती आहेत.',
	'sd_filter_requiresfilter' => 'या साठी $1 हा फिल्टर असणे आवश्यक आहे.',
	'sd_filter_haslabel' => 'त्याला $1 हे लेबल आहे.',
);

/** Erzya (Эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'sd_browsedata_subcategory' => 'Алкс категория',
	'sd_browsedata_other' => 'Лия',
	'sd_browsedata_or' => 'эли',
	'filters' => 'Сувтеметь',
	'createfilter' => 'Шкамс сувтеме',
	'sd_createfilter_name' => 'Лемезэ:',
	'sd_filter_year' => 'Иесь',
	'sd_filter_month' => 'Ковось',
);

/** Nahuatl (Nāhuatl)
 * @author Fluence
 */
$messages['nah'] = array(
	'sd_browsedata_other' => 'Occē',
	'sd_browsedata_none' => 'Ahtlein',
	'sd_browsedata_or' => 'nozo',
	'sd_createfilter_name' => 'Tōcāitl:',
	'sd_filter_year' => 'Xihuitl',
	'sd_filter_month' => 'Mētztli',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'sd_createfilter_name' => 'Naam:',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'semanticdrilldown-desc' => 'Een drilldowninterface voor het navigeren door semantische gegevens',
	'specialpages-group-sd_group' => 'Semantic Drilldown',
	'browsedata' => 'Gegevens bekijken',
	'sd_browsedata_choosecategory' => 'Kies een categorie',
	'sd_browsedata_viewcategory' => 'categorie bekijken',
	'sd_browsedata_docu' => 'Selecteer een of meer van de onderstaande termen om het aantal resultaten te verkleinen.',
	'sd_browsedata_subcategory' => 'Ondercategorie',
	'sd_browsedata_other' => 'Andere',
	'sd_browsedata_none' => 'Geen',
	'sd_browsedata_filterbyvalue' => 'Op deze waarde filteren',
	'sd_browsedata_filterbysubcategory' => 'Op deze ondercategorie filteren',
	'sd_browsedata_otherfilter' => "Pagina's met een andere waarde voor deze filter bekijken",
	'sd_browsedata_nonefilter' => "Pagina's zonder waarde voor deze filter bekijken",
	'sd_browsedata_or' => 'of',
	'sd_browsedata_removefilter' => 'Deze filter verwijderen',
	'sd_browsedata_removesubcategoryfilter' => 'Deze ondercategoriefilter verwijderen',
	'sd_browsedata_resetfilters' => 'Filters opnieuw instellen',
	'sd_browsedata_addanothervalue' => 'Waarde toevoegen',
	'sd_browsedata_daterangestart' => 'Begin:',
	'sd_browsedata_daterangeend' => 'Einde:',
	'filters' => 'Filters',
	'sd_filters_docu' => 'In {{SITENAME}} bestaan de volgende filters:',
	'createfilter' => 'Filter aanmaken',
	'sd_createfilter_name' => 'Naam:',
	'sd_createfilter_property' => 'Eigenschap voor deze filter:',
	'sd_createfilter_usepropertyvalues' => 'Alle waarden voor deze eigenschap voor deze filter gebruiken',
	'sd_createfilter_usecategoryvalues' => 'Waarden voor deze filter uit de volgende categorie halen:',
	'sd_createfilter_usedatevalues' => 'Gebruik voor deze filter de volgende datumreeks:',
	'sd_createfilter_entervalues' => 'Waarden voor de filter handmatig invoeren (waarden moeten gescheiden worden door komma\'s - als de waarde een komma bevast, vervang die dan door "\\,"):',
	'sd_createfilter_inputtype' => 'Invoertype voor deze filter:',
	'sd_createfilter_listofvalues' => 'lijst met waarden (standaard)',
	'sd_createfilter_requirefilter' => 'Selectie van een andere filter voor deze filter zichtbaar is vereisen:',
	'sd_createfilter_label' => 'Label voor deze filter (optioneel):',
	'sd_blank_error' => 'mag niet leeg zijn',
	'sd_filter_coversproperty' => 'Deze filter heeft betrekking op de eigenschap $1.',
	'sd_filter_getsvaluesfromcategory' => 'Het haalt de waarden van de categorie $1.',
	'sd_filter_usestimeperiod' => 'Het gebruikt $1 als de tijdsduur.',
	'sd_filter_year' => 'Jaar',
	'sd_filter_month' => 'Maand',
	'sd_filter_hasvalues' => 'Het heeft de waarden $1.',
	'sd_filter_hasinputtype' => 'Het heeft het invoertype $1.',
	'sd_filter_freetext' => 'tekst',
	'sd_filter_daterange' => 'datumreeks',
	'sd_filter_requiresfilter' => 'De filter $1 moet aanwezig zijn.',
	'sd_filter_haslabel' => 'Het heeft het label $1.',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['nn'] = array(
	'semanticdrilldown-desc' => 'Eit «drilldown»-brukargrensesnitt for navigering gjennom semantiske data',
	'specialpages-group-sd_group' => 'Semantisk «drilldown»',
	'browsedata' => 'Bla gjennom data',
	'sd_browsedata_choosecategory' => 'Vel ein kategori',
	'sd_browsedata_viewcategory' => 'sjå kategori',
	'sd_browsedata_docu' => 'Trykk på ein eller fleire einingar nedanfor for å avgrensa resultata.',
	'sd_browsedata_subcategory' => 'Underkategori',
	'sd_browsedata_other' => 'Annan',
	'sd_browsedata_none' => 'Ingen',
	'sd_browsedata_filterbyvalue' => 'Filtrer etter denne verdien',
	'sd_browsedata_filterbysubcategory' => 'Filtrer etter denne underkategorien',
	'sd_browsedata_otherfilter' => 'Syn sider med ein annan verdi for dette filteret',
	'sd_browsedata_nonefilter' => 'Syn sider med null verdi for dette fileteret',
	'sd_browsedata_or' => 'eller',
	'sd_browsedata_removefilter' => 'Fjern dette filteret',
	'sd_browsedata_removesubcategoryfilter' => 'Fjern dette underkategorifilteret',
	'sd_browsedata_resetfilters' => 'Nullstill filter',
	'sd_browsedata_addanothervalue' => 'Legg til ny verdi',
	'sd_browsedata_daterangestart' => 'Byrjing:',
	'sd_browsedata_daterangeend' => 'Slutt:',
	'filters' => 'Filter',
	'sd_filters_docu' => 'Følgjande filter finst på {{SITENAME}}:',
	'createfilter' => 'Opprett eit filter',
	'sd_createfilter_name' => 'Namn:',
	'sd_createfilter_property' => 'Eigenskap som dette fileteret dekkjer:',
	'sd_createfilter_usepropertyvalues' => 'Nytt alle verdiar av denne eigenskapen for filteret:',
	'sd_createfilter_usecategoryvalues' => 'Få verdiar for filteret frå denne kategorien:',
	'sd_createfilter_usedatevalues' => 'Nytt datoområde for dette filteret med denne tidsperioden:',
	'sd_createfilter_entervalues' => 'Skriv inn verdiar for filteret manuelt (verdiar burde vera skilde med komma, so om ein verdi inneheld eit komma, erstatt kommaet med «\\,»);',
	'sd_createfilter_inputtype' => 'Inndatatype for dette filteret:',
	'sd_createfilter_listofvalues' => 'lista over verdiar (standard)',
	'sd_createfilter_requirefilter' => 'Krev at eit anna filter blir valt før dette blir vist:',
	'sd_createfilter_label' => 'Merkelapp for dette filteret (valfritt):',
	'sd_blank_error' => 'kan ikkje vera tom',
	'sd_filter_coversproperty' => 'Dette filteret dekkjer eigenskapen $1.',
	'sd_filter_getsvaluesfromcategory' => 'Det får verdiane sine frå kategorien $1.',
	'sd_filter_usestimeperiod' => 'Det nyttar $1 som tidsperiode.',
	'sd_filter_year' => 'År',
	'sd_filter_month' => 'Månad',
	'sd_filter_hasvalues' => 'Det har verdiane $1.',
	'sd_filter_hasinputtype' => 'Det har inndatatypen $1.',
	'sd_filter_freetext' => 'tekst',
	'sd_filter_daterange' => 'datoområde',
	'sd_filter_requiresfilter' => 'Det krev at filteret $1 er til stades.',
	'sd_filter_haslabel' => 'Det har merkelappen $1.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Harald Khan
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'browsedata' => 'Bla gjennom data',
	'sd_browsedata_choosecategory' => 'Velg en kategori',
	'sd_browsedata_viewcategory' => 'se kategori',
	'sd_browsedata_docu' => 'Klikk på en eller flere enheter nedenfor for å smalne inn søket.',
	'sd_browsedata_subcategory' => 'Underkategori',
	'sd_browsedata_other' => 'Annen',
	'sd_browsedata_none' => 'Ingen',
	'sd_browsedata_filterbyvalue' => 'Filtrer etter denne verdien',
	'sd_browsedata_filterbysubcategory' => 'Filtrer etter denne underkategorien',
	'sd_browsedata_otherfilter' => 'Vis sider med en annen verdi for dette filteret',
	'sd_browsedata_nonefilter' => 'Vis sider uten noen verdi for dette filteret',
	'sd_browsedata_or' => 'eller',
	'sd_browsedata_removefilter' => 'Fjern dette filteret',
	'sd_browsedata_removesubcategoryfilter' => 'Fjern dette underkategorifilteret',
	'sd_browsedata_resetfilters' => 'Resett filtre',
	'sd_browsedata_addanothervalue' => 'Legg til ny verdi',
	'filters' => 'Filtre',
	'sd_filters_docu' => 'Følgende filtre finnes på {{SITENAME}}:',
	'createfilter' => 'Opprett et filter',
	'sd_createfilter_name' => 'Navn:',
	'sd_createfilter_property' => 'Egenskap dette filteret dekker:',
	'sd_createfilter_usepropertyvalues' => 'Bruk alle verdier av denne egenskapen for filteret',
	'sd_createfilter_usecategoryvalues' => 'Få verdier for filteret fra denne kategorien:',
	'sd_createfilter_usedatevalues' => 'Bruk datoområder for dette filteret med denne tidsperioden:',
	'sd_createfilter_entervalues' => 'Skriv inn verdier for filteret manuelt (verdier burde adskilles med komma – om en verdi inneholder et komma, erstatt det med «\\,»);',
	'sd_createfilter_requirefilter' => 'Krev at et annet filter velges før dette vises:',
	'sd_createfilter_label' => 'Etikett for dette filteret (valgfritt):',
	'sd_blank_error' => 'kan ikke være blank',
	'sd_filter_coversproperty' => 'Dette filteret dekker egenskapen $1.',
	'sd_filter_getsvaluesfromcategory' => 'Det får verdiene sine fra kategorien $1.',
	'sd_filter_usestimeperiod' => 'Det bruker $1 som tidsperiode.',
	'sd_filter_year' => 'År',
	'sd_filter_month' => 'Måned',
	'sd_filter_hasvalues' => 'Den har verdiene $1.',
	'sd_filter_requiresfilter' => 'Det krever at filteret $1 er til stede.',
	'sd_filter_haslabel' => 'Det har etiketten $1.',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'sd_browsedata_viewcategory' => 'Nyakorela sehlopha',
	'sd_browsedata_subcategory' => 'Sehlophana',
	'sd_createfilter_name' => 'Leina:',
	'sd_filter_year' => 'Ngwaga',
	'sd_filter_month' => 'Kgwedi',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'semanticdrilldown-desc' => 'Una interfàcia d’exercici per la navigacion a travèrs de semantic data',
	'specialpages-group-sd_group' => 'Exercici de semantica',
	'browsedata' => 'Cercar las donadas',
	'sd_browsedata_choosecategory' => 'Causir una categoria',
	'sd_browsedata_viewcategory' => 'Veire la categoria',
	'sd_browsedata_docu' => 'Clicar sus un o maites elements per resarrar vòstres resultats.',
	'sd_browsedata_subcategory' => 'Soscategoria',
	'sd_browsedata_other' => 'Autre',
	'sd_browsedata_none' => 'Nonrés',
	'sd_browsedata_filterbyvalue' => 'Filtrat per valor',
	'sd_browsedata_filterbysubcategory' => 'Filtrar per aquesta soscategoria',
	'sd_browsedata_otherfilter' => 'Veire las paginas amb una autra valor per aqueste filtre',
	'sd_browsedata_nonefilter' => 'Veire las paginas amb pas cap de valor per aqueste filtre',
	'sd_browsedata_or' => 'o',
	'sd_browsedata_removefilter' => 'Levar aqueste filtre',
	'sd_browsedata_removesubcategoryfilter' => 'Levar aquesta soscategoria de filtre',
	'sd_browsedata_resetfilters' => 'Remesa a zèro dels filtres',
	'sd_browsedata_addanothervalue' => 'Apondre una autra valor',
	'sd_browsedata_daterangestart' => 'Començament :',
	'sd_browsedata_daterangeend' => 'Fin :',
	'filters' => 'Filtres',
	'sd_filters_docu' => 'Lo filtre seguent existís sus {{SITENAME}} :',
	'createfilter' => 'Crear un filtre',
	'sd_createfilter_name' => 'Nom :',
	'sd_createfilter_property' => "Proprietat qu'aqueste filtre cobrirà :",
	'sd_createfilter_usepropertyvalues' => "Utilizar, per aqueste filtre, totas las valors d'aquesta proprietat",
	'sd_createfilter_usecategoryvalues' => "Obténer las valors per aqueste filtre a partir d'aquesta categoria :",
	'sd_createfilter_usedatevalues' => 'Utiliza de blòts de data per aqueste filtre amb aqueste periòde temporal :',
	'sd_createfilter_entervalues' => 'Entrar manualament las valors per aqueste filtre (las valors deuràn èsser separadas per de virgulas - se una valor conten una virgula, remplaçatz-la per « \\, ») :',
	'sd_createfilter_inputtype' => "Tipe d'entrada per aqueste filtre :",
	'sd_createfilter_listofvalues' => 'Lista de las valors (defaut)',
	'sd_createfilter_requirefilter' => "Necessita un filtre devent èsser seleccionat abans qu'aqueste siá afichat :",
	'sd_createfilter_label' => 'Etiqueta per aqueste filtre (facultatiu) :',
	'sd_blank_error' => 'pòt pas èsser daissat en blanc',
	'sd_filter_coversproperty' => 'Aqueste filtre cobrís la proprietat $1.',
	'sd_filter_getsvaluesfromcategory' => 'Obten sas valors a partir de la categoria $1.',
	'sd_filter_usestimeperiod' => 'Utiliza $1 coma durada de son periòde',
	'sd_filter_year' => 'Annada',
	'sd_filter_month' => 'Mes',
	'sd_filter_hasvalues' => 'A $1 coma valor',
	'sd_filter_hasinputtype' => "A lo tipe d'entrada $1.",
	'sd_filter_freetext' => 'tèxt',
	'sd_filter_daterange' => 'Gama de data',
	'sd_filter_requiresfilter' => 'Necessita la preséncia del filtre $1.',
	'sd_filter_haslabel' => 'Dispausa del labèl $1.',
);

/** Ossetic (Иронау)
 * @author Amikeco
 */
$messages['os'] = array(
	'sd_browsedata_none' => 'Нæй',
	'sd_filter_year' => 'Аз',
);

/** Polish (Polski)
 * @author Airwolf
 * @author Maikking
 * @author Maire
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'browsedata' => 'Przeglądaj dane',
	'sd_browsedata_choosecategory' => 'Wybierz kategorię',
	'sd_browsedata_viewcategory' => 'podgląd kategorii',
	'sd_browsedata_subcategory' => 'Kategoria podrzędna',
	'sd_browsedata_or' => 'lub',
	'createfilter' => 'Utwórz filtr',
	'sd_filter_year' => 'Rok',
	'sd_filter_month' => 'Miesiąc',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'sd_browsedata_choosecategory' => 'يوه وېشنيزه ټاکل',
	'sd_browsedata_viewcategory' => 'وېشنيزه ښکاره کول',
	'sd_browsedata_subcategory' => 'وړه-وېشنيزه',
	'sd_browsedata_other' => 'بل',
	'sd_browsedata_none' => 'هېڅ',
	'sd_browsedata_filterbysubcategory' => 'د همدې وړې-وېشنيزې له مخې چاڼول',
	'sd_browsedata_or' => 'يا',
	'sd_browsedata_removefilter' => 'همدا چاڼګر لرې کول',
	'sd_browsedata_daterangestart' => 'پيل:',
	'sd_browsedata_daterangeend' => 'پای:',
	'filters' => 'چاڼګرونه',
	'createfilter' => 'يو چاڼګر جوړول',
	'sd_createfilter_name' => 'نوم:',
	'sd_filter_year' => 'کال',
	'sd_filter_month' => 'مياشت',
	'sd_filter_freetext' => 'متن',
);

/** Portuguese (Português)
 * @author 555
 * @author Lijealso
 * @author Malafaya
 */
$messages['pt'] = array(
	'browsedata' => 'Navegar pelos dados',
	'sd_browsedata_choosecategory' => 'Escolha uma categoria',
	'sd_browsedata_viewcategory' => 'ver categoria',
	'sd_browsedata_subcategory' => 'subcategoria',
	'sd_browsedata_other' => 'Outro',
	'sd_browsedata_none' => 'Nenhum',
	'sd_browsedata_filterbyvalue' => 'Filtrar por este valor',
	'sd_browsedata_filterbysubcategory' => 'Filtrar por esta subcategoria',
	'sd_browsedata_otherfilter' => 'Exibir páginas com outro valor para este filtro',
	'sd_browsedata_nonefilter' => 'Exibir páginas sem valores para este filtro',
	'sd_browsedata_or' => 'ou',
	'sd_browsedata_removefilter' => 'Remover este filtro',
	'sd_browsedata_removesubcategoryfilter' => 'Remover esta subcategoria da função de filtro',
	'sd_browsedata_resetfilters' => 'Zerar filtros',
	'sd_browsedata_daterangestart' => 'Início:',
	'sd_browsedata_daterangeend' => 'Fim:',
	'filters' => 'Filtros',
	'sd_filters_docu' => '{{SITENAME}} possui os seguintes filtros:',
	'createfilter' => 'Criar um filtro',
	'sd_createfilter_name' => 'Nome:',
	'sd_createfilter_property' => 'Propriedades que este filtro abrange:',
	'sd_createfilter_usepropertyvalues' => 'Usar todos os valores desta propriedade no filtro',
	'sd_createfilter_usecategoryvalues' => 'Obter valores de filtro a partir desta categoria:',
	'sd_createfilter_requirefilter' => 'Necessita de outro filtro seleccionado antes deste ser exibido:',
	'sd_createfilter_label' => 'Etiqueta para este filtro (opcional):',
	'sd_blank_error' => 'não pode estar em branco',
	'sd_filter_coversproperty' => 'Este filtro abrange a propriedade $1.',
	'sd_filter_usestimeperiod' => 'Utiliza $1 como seu período de tempo.',
	'sd_filter_year' => 'Ano',
	'sd_filter_month' => 'Mês',
	'sd_filter_hasvalues' => 'Possui os valores $1.',
	'sd_filter_freetext' => 'texto',
	'sd_filter_requiresfilter' => 'Requer a presença do filtro $1.',
	'sd_filter_haslabel' => 'Possui a etiqueta $1.',
);

/** Brazilian Portuguese (Português do Brasil)
 * @author Enqd
 */
$messages['pt-br'] = array(
	'browsedata' => 'Navegar pelo dados',
	'sd_browsedata_choosecategory' => 'Escolha uma categoria',
	'sd_browsedata_viewcategory' => 'ver categoria',
	'sd_browsedata_subcategory' => 'Subcategoria',
	'sd_browsedata_other' => 'Outro',
	'sd_browsedata_none' => 'Nenhum',
	'sd_browsedata_filterbyvalue' => 'Filtrar por este valor',
	'sd_browsedata_filterbysubcategory' => 'Filtrar por esta subcategoria',
	'sd_browsedata_otherfilter' => 'Exibir páginas com outro valor para este filtro',
	'sd_browsedata_nonefilter' => 'Exibir páginas sem valores para este filtro',
	'sd_browsedata_or' => 'ou',
	'sd_browsedata_removefilter' => 'Remover este filtro',
	'sd_browsedata_resetfilters' => 'Zerar filtros',
	'sd_browsedata_addanothervalue' => 'Adicionar outro valor',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 * @author Mihai
 */
$messages['ro'] = array(
	'sd_browsedata_subcategory' => 'Subcategorie',
	'sd_browsedata_none' => 'Nimic',
	'filters' => 'Filtre',
	'sd_createfilter_name' => 'Nume:',
	'sd_blank_error' => 'nu poate fi gol',
	'sd_filter_year' => 'An',
	'sd_filter_month' => 'Lună',
	'sd_filter_hasvalues' => 'Are valorile $1.',
	'sd_filter_freetext' => 'text',
);

/** Russian (Русский)
 * @author Innv
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'browsedata' => 'Обзор данных',
	'sd_browsedata_choosecategory' => 'Выберите категорию',
	'sd_browsedata_viewcategory' => 'просмотр категории',
	'sd_browsedata_subcategory' => 'Подкатегория',
	'sd_browsedata_other' => 'Другие',
	'sd_browsedata_none' => 'Нет',
	'sd_browsedata_filterbyvalue' => 'Фильтр по этому значению',
	'sd_browsedata_filterbysubcategory' => 'Фильтр по этой подкатегории',
	'sd_browsedata_otherfilter' => 'Показать страницы с другими значениями по этому фильтру',
	'sd_browsedata_nonefilter' => 'Показать страницы без значений по этому фильтру',
	'sd_browsedata_or' => 'или',
	'sd_browsedata_removefilter' => 'Убрать этот фильтр',
	'sd_browsedata_removesubcategoryfilter' => 'Убрать этот фильтр по подкатегории',
	'sd_browsedata_resetfilters' => 'Сбросить фильтры',
	'filters' => 'Фильтры',
	'sd_filters_docu' => '{{SITENAME}} содержит следующие фильтры:',
	'createfilter' => 'Создать фильтр',
	'sd_createfilter_name' => 'Имя:',
	'sd_createfilter_property' => 'Свойство, которое покрывает этот фильтр:',
	'sd_createfilter_usepropertyvalues' => 'Использовать все значения этого свойства для фильтра',
	'sd_createfilter_usecategoryvalues' => 'Получить значения для фильтра из этой категории:',
	'sd_createfilter_usedatevalues' => 'Использовать следующий диапазон дат для фильтра:',
	'sd_createfilter_entervalues' => 'Введите значения для фильтра вручную (значения должны разделяться запятыми, если значение содержит запятую, замените её на «\\,»):',
	'sd_createfilter_requirefilter' => 'Требовать выбора другого фильтра, перед тем, как отображать этот:',
	'sd_createfilter_label' => 'Пометка для этого фильтра (необязательно):',
	'sd_blank_error' => 'не может быть пустым',
	'sd_filter_coversproperty' => 'Этот фильтр покрывает свойство $1.',
	'sd_filter_getsvaluesfromcategory' => 'Получает свои значения из категории $1.',
	'sd_filter_usestimeperiod' => 'Использует $1 как временной диапазон.',
	'sd_filter_year' => 'Год',
	'sd_filter_month' => 'Месяц',
	'sd_filter_hasvalues' => 'Имеет значения $1.',
	'sd_filter_requiresfilter' => 'Требует наличия фильтра $1.',
	'sd_filter_haslabel' => 'Имеет пометку $1.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'semanticdrilldown-desc' => 'Rozhranie na navigáciu sémantickými údajmi',
	'specialpages-group-sd_group' => 'Sémantické operácie',
	'browsedata' => 'Prehliadať údaje',
	'sd_browsedata_choosecategory' => 'Vyberte kategóriu',
	'sd_browsedata_viewcategory' => 'zobraziť kategóriu',
	'sd_browsedata_docu' => 'Výsledky môžete zúžiť kliknutím na jednu alebo viac dolu uvedených položiek.',
	'sd_browsedata_subcategory' => 'Podkategória',
	'sd_browsedata_other' => 'Iné',
	'sd_browsedata_none' => 'Žiadne',
	'sd_browsedata_filterbyvalue' => 'Filtrovať podľa tejto hodnoty',
	'sd_browsedata_filterbysubcategory' => 'Filtrovať podľa tejto podkategórie',
	'sd_browsedata_otherfilter' => 'Zobraziť stránky s inou hodnotou tohto filtra',
	'sd_browsedata_nonefilter' => 'Zobraziť stránky s bez hodnoty tohto filtra',
	'sd_browsedata_or' => 'alebo',
	'sd_browsedata_removefilter' => 'Odstrániť tento filter',
	'sd_browsedata_removesubcategoryfilter' => 'Odstrániť tento filter podkategórie',
	'sd_browsedata_resetfilters' => 'Resetovať filtre',
	'sd_browsedata_addanothervalue' => 'Pridať ďalšiu hodnotu',
	'sd_browsedata_daterangestart' => 'Začiatok:',
	'sd_browsedata_daterangeend' => 'Koniec:',
	'filters' => 'Filtre',
	'sd_filters_docu' => 'Na {{GRAMMAR:lokál|{{SITENAME}}}} existujú nasledovné filtre:',
	'createfilter' => 'Vytvoriť filter',
	'sd_createfilter_name' => 'Názov:',
	'sd_createfilter_property' => 'Vlastnosť, ktorú tento filter pokrýva:',
	'sd_createfilter_usepropertyvalues' => 'Použiť všetky hodnoty tejto vlastnosti pre tento filter',
	'sd_createfilter_usecategoryvalues' => 'Získať hodnoty filtra z tejto kategórie:',
	'sd_createfilter_usedatevalues' => 'Použiť rozsahy dátumov pre tento filter z tohoto časového intervalu:',
	'sd_createfilter_entervalues' => 'Zadajte hodnoty pre tento filter ručne (hodnoty by mali byť oddelené čiarkami - ak hodnota obsahuje čiarku, nahraďte ju „\\,“):',
	'sd_createfilter_inputtype' => 'Typ vstupu pre tento filter:',
	'sd_createfilter_listofvalues' => 'zoznam hodnôt (štandardné)',
	'sd_createfilter_requirefilter' => 'Vyžadovať, aby bol vybraný iný filter než sa zobrazí tento:',
	'sd_createfilter_label' => 'Označenie tohto filtra (voliteľné):',
	'sd_blank_error' => 'nemôže byť nevyplnené',
	'sd_filter_coversproperty' => 'Tento filter pokrýva vlastnosť $1.',
	'sd_filter_getsvaluesfromcategory' => 'Získava hodnoty z kategórie $1.',
	'sd_filter_usestimeperiod' => 'Používa ako časový interval $1.',
	'sd_filter_year' => 'Rok',
	'sd_filter_month' => 'Mesiac',
	'sd_filter_hasvalues' => 'Má hodnoty $1.',
	'sd_filter_hasinputtype' => 'Má typ vstupu $1.',
	'sd_filter_freetext' => 'text',
	'sd_filter_daterange' => 'rozsah dátumov',
	'sd_filter_requiresfilter' => 'Vyžaduje prítomnosť filtra $1.',
	'sd_filter_haslabel' => 'Má označenie $1.',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'sd_browsedata_none' => 'Нема',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'browsedata' => 'Doaten bekiekje',
	'sd_browsedata_choosecategory' => 'Wääl ne Kategorie',
	'sd_browsedata_viewcategory' => 'Kategorie bekiekje',
	'sd_browsedata_subcategory' => 'Unnerkategorie',
	'sd_browsedata_other' => 'Uur',
	'sd_browsedata_none' => 'Neen',
	'filters' => 'Filter',
	'sd_filters_docu' => 'Do foulgjende Filtere existierje in disse Wiki:',
	'createfilter' => 'Moak n Filter',
	'sd_createfilter_name' => 'Noome:',
	'sd_createfilter_property' => 'Attribut fon dit Filter:',
	'sd_createfilter_usepropertyvalues' => 'Ferweend aal Wäide fon dit Attribut foar dän Filter.',
	'sd_createfilter_usecategoryvalues' => 'Ferweend do Wäide foar dän Filter fon disse Kategorie:',
	'sd_createfilter_usedatevalues' => 'Ferweend foulgjende Tiedangoawe foar dissen Filter:',
	'sd_createfilter_entervalues' => 'Ferweend disse Wäide foar dän Filter (Wäide truch Komma tränd ienreeke. Wan n Wäid n Komma änthaalt, mäd "\\,"ärsätte.):',
	'sd_createfilter_requirefilter' => 'Eer dissen Filter anwiest wäd, mout foulgjenden uur Filter sät weese:',
	'sd_createfilter_label' => 'Beteekenge fon dit Filter (optionoal):',
	'sd_blank_error' => 'duur nit loos weese',
	'sd_filter_coversproperty' => 'Dissen Filter beträft dät Attribut $1.',
	'sd_filter_getsvaluesfromcategory' => 'Hie kricht sien Wäide uut ju Kategorie $1.',
	'sd_filter_usestimeperiod' => 'Ferwoant $1 as Tiedangoawe.',
	'sd_filter_year' => 'Jier',
	'sd_filter_month' => 'Mound',
	'sd_filter_hasvalues' => 'Häd dän Wäid $1.',
	'sd_filter_requiresfilter' => 'Sät dän Filter $1 foaruut.',
	'sd_filter_haslabel' => 'Häd ju Beteekenge $1.',
);

/** Swedish (Svenska)
 * @author M.M.S.
 */
$messages['sv'] = array(
	'browsedata' => 'Bläddra genom data',
	'sd_browsedata_choosecategory' => 'Välj en kategori',
	'sd_browsedata_viewcategory' => 'visa kategori',
	'sd_browsedata_subcategory' => 'Subkategori',
	'sd_browsedata_other' => 'Andra',
	'sd_browsedata_none' => 'Ingen',
	'sd_browsedata_filterbyvalue' => 'Filtrera efter det här värdet',
	'sd_browsedata_filterbysubcategory' => 'Filtrera efter den här underkategorin',
	'sd_browsedata_otherfilter' => 'Visa sidor med ett annat värde för det här filtret',
	'sd_browsedata_nonefilter' => 'Visa sidor utan några värden för detta filter',
	'sd_browsedata_or' => 'eller',
	'sd_browsedata_removefilter' => 'Ta bort detta filter',
	'sd_browsedata_removesubcategoryfilter' => 'Ta bort detta underkategorifiltret',
	'sd_browsedata_resetfilters' => 'Återställ filter',
	'sd_browsedata_addanothervalue' => 'Lägg till nytt värde',
	'filters' => 'Filter',
	'sd_filters_docu' => 'Följande filter finns på {{SITENAME}}:',
	'createfilter' => 'Skapa ett filter',
	'sd_createfilter_name' => 'Namn:',
	'sd_createfilter_property' => 'Egenskaper som detta filter döljer:',
	'sd_createfilter_usepropertyvalues' => 'Använd alla värden av den här egenskapen för filtret',
	'sd_createfilter_usecategoryvalues' => 'Hämta värden för filtret från den här kategorin:',
	'sd_createfilter_usedatevalues' => 'Använd datumområden för det här filtret med den här tidsperioden:',
	'sd_createfilter_entervalues' => 'Skriv in värden för filtret manuellt (värdena ska separeras med komma - om ett värde innehåller ett komma, ersätt det med "\\,"):',
	'sd_createfilter_requirefilter' => 'Kräv att ett annat filter väljs före detta visas:',
	'sd_createfilter_label' => 'Etikett för det här filtret (valfritt):',
	'sd_blank_error' => 'kan inte vara tom',
	'sd_filter_coversproperty' => 'Detaa filter döljer egenskapen $1.',
	'sd_filter_getsvaluesfromcategory' => 'Det får sina värden från kategorin $1.',
	'sd_filter_usestimeperiod' => 'Det använder $1 som tidsperiod.',
	'sd_filter_year' => 'År',
	'sd_filter_month' => 'Månad',
	'sd_filter_hasvalues' => 'Det har värdena $1.',
	'sd_filter_requiresfilter' => 'Det kräver att filtret $1 är på plats.',
	'sd_filter_haslabel' => 'Det har etiketten $1.',
);

/** Silesian (Ślůnski)
 * @author Herr Kriss
 */
$messages['szl'] = array(
	'sd_createfilter_name' => 'Mjano:',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'browsedata' => 'భోగట్టాని చూడండి',
	'sd_browsedata_choosecategory' => 'ఓ వర్గాన్ని ఎంచుకోండి',
	'sd_browsedata_viewcategory' => 'వర్గాన్ని చూడండి',
	'sd_browsedata_subcategory' => 'ఉపవర్గం',
	'sd_browsedata_other' => 'ఇతర',
	'sd_browsedata_none' => 'ఏమీలేదు',
	'sd_browsedata_or' => 'లేదా',
	'sd_browsedata_removefilter' => 'ఈ వడపోతని తొలగించు',
	'sd_browsedata_addanothervalue' => 'మరో విలువని చేర్చండి',
	'sd_browsedata_daterangestart' => 'మొదలు:',
	'sd_browsedata_daterangeend' => 'ముగింపు:',
	'filters' => 'వడపోతలు',
	'sd_createfilter_name' => 'పేరు:',
	'sd_createfilter_usecategoryvalues' => 'వడపోతకి విలువలని ఈ వర్గంనుండి తీసుకోవాలి:',
	'sd_blank_error' => 'ఖాళీగా ఉండకూడదు',
	'sd_filter_year' => 'సంవత్సరం',
	'sd_filter_month' => 'నెల',
	'sd_filter_freetext' => 'పాఠ్యం',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'sd_browsedata_other' => 'Seluk',
	'sd_createfilter_name' => 'Naran:',
	'sd_filter_year' => 'Tinan',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'browsedata' => 'Мурури дода',
	'sd_browsedata_choosecategory' => 'Гурӯҳеро интихоб кунед',
	'sd_browsedata_viewcategory' => 'нигаристан гурӯҳ',
	'sd_browsedata_subcategory' => 'Зергурӯҳ',
	'sd_browsedata_other' => 'Дигар',
	'sd_browsedata_none' => 'Ҳеҷ',
	'sd_browsedata_or' => 'ё',
	'sd_browsedata_daterangestart' => 'Шурӯъ:',
	'sd_browsedata_daterangeend' => 'Охир:',
	'sd_createfilter_name' => 'Ном:',
	'sd_createfilter_entervalues' => 'Миқдорҳоро барои филтр дастӣ ворид кунед (миқдорҳо бояд бо вергулҳо ҷудо шаванд - агар миқдор вергул дошта бошад, онро бо "\\," иваз кунед):',
	'sd_createfilter_requirefilter' => 'Қабл аз намоиши ин яке, филтри дигар бояд интихоб шавад:',
	'sd_createfilter_label' => 'Барчасб барои ин филтр (ихтиёрӣ):',
	'sd_blank_error' => 'наметавонад холӣ бошад',
	'sd_filter_coversproperty' => 'Ин филтр вижагии $1-ро шомил мешавад.',
	'sd_filter_getsvaluesfromcategory' => 'Миқдорҳояшро аз гурӯҳи $1 мегирад.',
	'sd_filter_usestimeperiod' => '$1-ро ба унвони давраи вақти худ ба кор мебарад.',
	'sd_filter_year' => 'Сол',
	'sd_filter_month' => 'Моҳ',
	'sd_filter_hasvalues' => 'Миқдорҳои $1-ро дорад.',
	'sd_filter_requiresfilter' => 'Ба вуҷуди филтри $1 эҳтиёҷ дорад.',
	'sd_filter_haslabel' => 'Ин барчасби $1 дорад.',
);

/** Thai (ไทย)
 * @author Octahedron80
 */
$messages['th'] = array(
	'filters' => 'ตัวกรอง',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'semanticdrilldown-desc' => 'Isang pambutas ("pambarena") na ugnayang-hangganan para sa paglilibot sa kahabaan ng datong semantiko (hinggil sa kahulugan ng salita)',
	'specialpages-group-sd_group' => 'Semantikong Pababang Pagbubutas ("Pagbabarena")',
	'browsedata' => 'Tumingin-tingin sa dato',
	'sd_browsedata_choosecategory' => 'Pumili ng isang kaurian (kategorya)',
	'sd_browsedata_viewcategory' => 'tingnan ang kaurian',
	'sd_browsedata_docu' => 'Pindutin ang isa o mahigit pang mga bagay na nasa ibaba upang mapakipot/mapakaunti pa ang mga kinalabasan.',
	'sd_browsedata_subcategory' => 'Kabahaging kaurian',
	'sd_browsedata_other' => 'Iba pa',
	'sd_browsedata_none' => 'Wala',
	'sd_browsedata_filterbyvalue' => 'Salain sa pamamagitan ng ganitong halaga',
	'sd_browsedata_filterbysubcategory' => 'Salain sa pamamagitan ng ganitong kabahaging kaurian',
	'sd_browsedata_otherfilter' => 'Ipakita ang mga pahinang may iba pang halaga para sa ganitong pansala',
	'sd_browsedata_nonefilter' => 'Ipakita ang mga pahinang walang halaga para sa pansalang ito',
	'sd_browsedata_or' => 'o',
	'sd_browsedata_removefilter' => 'Tanggalin ang pansalang ito',
	'sd_browsedata_removesubcategoryfilter' => 'Tanggalin ang ganitong pansala ng kabahaging kaurian',
	'sd_browsedata_resetfilters' => 'Muling itakda ang mga pansala',
	'sd_browsedata_addanothervalue' => 'Magdagdag ng iba pang halaga',
	'sd_browsedata_daterangestart' => 'Simula:',
	'sd_browsedata_daterangeend' => 'Wakas:',
	'filters' => 'Mga pansala',
	'sd_filters_docu' => 'Umiiral ang sumusunod na mga pansala sa loob ng {{SITENAME}}:',
	'createfilter' => 'Lumikha ng isang pansala',
	'sd_createfilter_name' => 'Pangalan:',
	'sd_createfilter_property' => 'Pag-aaring nasasakop ng pansalang ito:',
	'sd_createfilter_usepropertyvalues' => 'Gamitin ang lahat ng mga halaga ng pag-aaring ito para sa pansalang ito',
	'sd_createfilter_usecategoryvalues' => 'Kumuha ng mga halaga para sa pansala mula sa kauriang ito:',
	'sd_createfilter_usedatevalues' => 'Gamitin ang mga saklaw ng petsa para sa pansalang ito na may ganitong sakop ng kapanahunan:',
	'sd_createfilter_entervalues' => 'Kinakamay na ipasok ang mga halaga para sa pansala (dapat na pinaghihiwahiwalay ng mga kuwit ang mga halaga - kung naglalaman ng kuwit ang isang halaga, palitan ito ng "\\,"):',
	'sd_createfilter_inputtype' => 'Uri ng pampasok/pinapasok para sa pansalang ito:',
	'sd_createfilter_listofvalues' => 'talaan ng mga halaga (likas na nakatakda)',
	'sd_createfilter_requirefilter' => 'Pilitin ang iba pang pansala na mapili bago ipakita ang isang ito:',
	'sd_createfilter_label' => 'Tatak para pansalang ito (maaaring wala nito):',
	'sd_blank_error' => 'hindi maaaring walang laman/patlang',
	'sd_filter_coversproperty' => 'Nasasakop ng pansalang ito ang ari-ariang $1.',
	'sd_filter_getsvaluesfromcategory' => 'Kumukuha ito ng sarili niyang mga halaga mula sa kauriang $1.',
	'sd_filter_usestimeperiod' => 'Ginagamit nito ang $1 bilang saklaw ng kapanahunan.',
	'sd_filter_year' => 'Taon',
	'sd_filter_month' => 'Buwan',
	'sd_filter_hasvalues' => 'Mayroon itong mga halagang $1.',
	'sd_filter_hasinputtype' => 'Mayroon itong uri ng pagpasok/ipinasok na $1.',
	'sd_filter_freetext' => 'teksto',
	'sd_filter_daterange' => 'saklaw ng petsa',
	'sd_filter_requiresfilter' => 'Kinakailangan nito ang pagkakaroon ng pansalang $1.',
	'sd_filter_haslabel' => 'Mayroon itong tatak na $1.',
);

/** Turkish (Türkçe)
 * @author Karduelis
 */
$messages['tr'] = array(
	'sd_browsedata_none' => 'Hiçbiri',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'browsedata' => 'Duyệt dữ liệu',
	'sd_browsedata_choosecategory' => 'Chọn một thể loại',
	'sd_browsedata_viewcategory' => 'xem thể loại',
	'sd_browsedata_subcategory' => 'Tiểu thể loại',
	'sd_browsedata_other' => 'Khác',
	'sd_browsedata_none' => 'Không có',
	'sd_browsedata_filterbyvalue' => 'Lọc theo giá trị này',
	'sd_browsedata_filterbysubcategory' => 'Lọc theo tiểu thể loại này',
	'sd_browsedata_otherfilter' => 'Hiển thị trang với giá trị khác cho bộ lọc này',
	'sd_browsedata_nonefilter' => 'Hiển thị không có giá trị nào đối với bộ lọc này',
	'sd_browsedata_or' => 'hoặc',
	'sd_browsedata_removefilter' => 'Bỏ bộ lọc này',
	'sd_browsedata_removesubcategoryfilter' => 'Bỏ bộ lọc tiểu thể loại này',
	'sd_browsedata_resetfilters' => 'Tái tạo bộ lọc',
	'sd_browsedata_addanothervalue' => 'Thêm giá trị khác',
	'filters' => 'Bộ lọc',
	'sd_filters_docu' => 'Bộ lọc sau tồn tại trong {{SITENAME}}:',
	'createfilter' => 'Tạo bộ lọc',
	'sd_createfilter_name' => 'Tên:',
	'sd_createfilter_property' => 'Tính chất bộ lọc này bao phủ:',
	'sd_createfilter_usepropertyvalues' => 'Sử dụng tất cả các giá trị của thuộc tính này cho bộ lọc',
	'sd_createfilter_usecategoryvalues' => 'Lấy giá trị cho bộ lọc từ thể loại này:',
	'sd_createfilter_usedatevalues' => 'Sử dụng khoảng ngày cho bộ lọc này với khoảng thời gian này:',
	'sd_createfilter_entervalues' => 'Nhập bằng tay giá trị cho bộ lọc (giá trị nên được phân tách bằng dấu phẩy - nếu một giá trị có chứa dấu phẩy, hãy thay nó bằng "\\,"):',
	'sd_createfilter_requirefilter' => 'Cần bộ lọc khác được chọn trước khi hiển thị cái này:',
	'sd_createfilter_label' => 'Đánh nhãn cho bộ lọc này (tùy chọn):',
	'sd_blank_error' => 'không được để trống',
	'sd_filter_coversproperty' => 'Bộ lọc này bao phủ thuộc tính $1.',
	'sd_filter_getsvaluesfromcategory' => 'Nó có giá trị từ thể loại $1.',
	'sd_filter_usestimeperiod' => 'Nó sử dụng $1 làm khoảng thời gian.',
	'sd_filter_year' => 'Năm',
	'sd_filter_month' => 'Tháng',
	'sd_filter_hasvalues' => 'Nó có giá trị $1.',
	'sd_filter_requiresfilter' => 'Nó yêu cầu sự hiện diện của bộ lọc $1.',
	'sd_filter_haslabel' => 'Nó có nhãn $1.',
);

/** Volapük (Volapük)
 * @author Malafaya
 * @author Smeira
 */
$messages['vo'] = array(
	'browsedata' => 'Padön da nünods',
	'sd_browsedata_choosecategory' => 'Välön kladi',
	'sd_browsedata_viewcategory' => 'logön kladi',
	'sd_browsedata_subcategory' => 'Donaklad',
	'sd_browsedata_other' => 'Votik',
	'sd_browsedata_none' => 'Nonik',
	'sd_browsedata_or' => 'u',
	'sd_browsedata_addanothervalue' => 'Läükön völadi votik',
	'sd_browsedata_daterangestart' => 'Prim:',
	'sd_browsedata_daterangeend' => 'Fin:',
	'sd_createfilter_name' => 'Nem:',
	'sd_filter_year' => 'Yel',
	'sd_filter_month' => 'Mul',
	'sd_filter_freetext' => 'vödem',
);

/** Chinese (China) (‪中文(中国大陆)‬)
 * @author Roc Michael
 */
$messages['zh-cn'] = array(
	'browsedata' => '查看资料',
	'sd_browsedata_choosecategory' => '选取某项分类(category)',
	'sd_browsedata_viewcategory' => '查看分类页面',
	'sd_browsedata_subcategory' => '子分类',
	'sd_browsedata_other' => '其他的',
	'sd_browsedata_none' => '无',
	'filters' => '筛选器',
	'sd_filters_docu' => '此wiki系统内已设有如下的筛选器(filters)',
	'createfilter' => '建立筛选器',
	'sd_createfilter_name' => '名称：',
	'sd_createfilter_property' => '此一筛选器所涵盖的性质：',
	'sd_createfilter_usepropertyvalues' => '将此一性质的值设给筛选器所用',
	'sd_createfilter_usecategoryvalues' => '从此分类中为筛选器取得筛选值：',
	'sd_createfilter_usedatevalues' => '以此一期间为此筛选器设置日期范围值：',
	'sd_createfilter_entervalues' => '以手工的方式键入筛选器的筛选值(其值必须以半型逗号","分隔，如果您的输入值内包含半型逗号则须则"\\,"取代):',
	'sd_createfilter_requirefilter' => '在此一筛选器展示其作用之前要求须选取其他的筛选器：',
	'sd_createfilter_label' => '为此一筛选选器设置标签(选择性的)：',
	'sd_blank_error' => '不得为空白',
	'sd_filter_coversproperty' => '此筛选器涵盖了$1性质。',
	'sd_filter_getsvaluesfromcategory' => '其从$1分类取得它的值。',
	'sd_filter_usestimeperiod' => '其使用「$1」做为时间期限值',
	'sd_filter_year' => '年',
	'sd_filter_month' => '月',
	'sd_filter_hasvalues' => '其有着$1的这些值。',
	'sd_filter_requiresfilter' => '其以$1筛选器为基础。',
	'sd_filter_haslabel' => '其有着此一$1标签',
);

/** Chinese (Taiwan) (‪中文(台灣)‬)
 * @author Roc michael
 */
$messages['zh-tw'] = array(
	'browsedata' => '瀏覽資料',
	'sd_browsedata_choosecategory' => '選取某項分類(category)',
	'sd_browsedata_viewcategory' => '查看分類頁面',
	'sd_browsedata_docu' => '選取1項或多項以限制輸出的結果',
	'sd_browsedata_subcategory' => '子分類',
	'sd_browsedata_other' => '其他的',
	'sd_browsedata_none' => '無',
	'sd_browsedata_filterbyvalue' => '依此值設置篩選器',
	'sd_browsedata_filterbysubcategory' => '依此子分類(subcategory)設置篩選器',
	'sd_browsedata_otherfilter' => '查看屬於此篩選器中其他值的頁面，',
	'sd_browsedata_nonefilter' => '查看此篩選器設置條件中無任何值的頁面',
	'sd_browsedata_or' => '或',
	'sd_browsedata_removefilter' => '移除此篩選器',
	'sd_browsedata_removesubcategoryfilter' => '移除此子分類(subcategory)篩選器',
	'sd_browsedata_resetfilters' => '重置篩選器',
	'sd_browsedata_addanothervalue' => '增加其他值',
	'sd_browsedata_daterangestart' => '起始於：',
	'sd_browsedata_daterangeend' => '結束於：',
	'filters' => '篩選器',
	'sd_filters_docu' => '此wiki系統內已設有如下的篩選器(filters)',
	'createfilter' => '建立篩選器',
	'sd_createfilter_name' => '名稱：',
	'sd_createfilter_property' => '此一篩選器所涵蓋的性質：',
	'sd_createfilter_usepropertyvalues' => '將此一性質的值設給篩選器所用',
	'sd_createfilter_usecategoryvalues' => '從此分類中為篩選器取得篩選值：',
	'sd_createfilter_usedatevalues' => '以此一期間為此篩選器設置日期範圍值：',
	'sd_createfilter_entervalues' => '以手工的方式鍵入篩選器的篩選值(其值必須以半型逗號","分隔，如果您的輸入值內包含半型逗號則須則"\\,"取代):',
	'sd_createfilter_inputtype' => '為此篩選器輸入型態：',
	'sd_createfilter_listofvalues' => '列出值(預設)',
	'sd_createfilter_requirefilter' => '在此一篩選器展示其作用之前要求須選取其他的篩選器(即此一篩選器的作用係以另一篩選器為其基礎)：',
	'sd_createfilter_label' => '為此一篩選選器設定標籤(選擇性的)：',
	'sd_blank_error' => '不得為空白',
	'sd_filter_coversproperty' => '此篩選器涵蓋了$1性質。',
	'sd_filter_getsvaluesfromcategory' => '其從$1分類取得它的值。',
	'sd_filter_usestimeperiod' => '其使用「$1」做為時間期限值',
	'sd_filter_year' => '年',
	'sd_filter_month' => '月',
	'sd_filter_hasvalues' => '其有著$1的這些值。',
	'sd_filter_hasinputtype' => '其已有「$1」的輸入的型態了。',
	'sd_filter_freetext' => '文字',
	'sd_filter_daterange' => '資料範圍',
	'sd_filter_requiresfilter' => '其以$1篩選器為基礎。',
	'sd_filter_haslabel' => '其有著此一$1標籤',
);

