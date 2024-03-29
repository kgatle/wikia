<?php
/** Kazakh (Latin) (Qazaqşa (Latın))
 *
 * @addtogroup Language
 *
 * @author GaiJin
 * @author AlefZet
 */

$fallback = 'kk-cyrl';

$separatorTransformTable = array(
	',' => "\xc2\xa0",
	'.' => ',',
);

$extraUserToggles = array(
	'nolangconversion'
);

$fallback8bitEncoding = 'windows-1254';

$linkPrefixExtension = true;

$namespaceNames = array(
	NS_MEDIA            => 'Taspa',
	NS_SPECIAL          => 'Arnaýı',
	NS_MAIN	            => '',
	NS_TALK	            => 'Talqılaw',
	NS_USER             => 'Qatıswşı',
	NS_USER_TALK        => 'Qatıswşı_talqılawı',
	# NS_PROJECT set by $wgMetaNamespace
	NS_PROJECT_TALK     => '$1_talqılawı',
	NS_IMAGE            => 'Swret',
	NS_IMAGE_TALK       => 'Swret_talqılawı',
	NS_MEDIAWIKI        => 'MedïaWïkï',
	NS_MEDIAWIKI_TALK   => 'MedïaWïkï_talqılawı',
	NS_TEMPLATE         => 'Ülgi',
	NS_TEMPLATE_TALK    => 'Ülgi_talqılawı',
	NS_HELP             => 'Anıqtama',
	NS_HELP_TALK        => 'Anıqtama_talqılawı',
	NS_CATEGORY         => 'Sanat',
	NS_CATEGORY_TALK    => 'Sanat_talqılawı'
);

$namespaceAliases = array(
	# Aliases to kk-cyrl namespaces
	'Таспа'               => NS_MEDIA,
	'Арнайы'              => NS_SPECIAL,
	'Талқылау'            => NS_TALK,
	'Қатысушы'            => NS_USER,
	'Қатысушы_талқылауы'  => NS_USER_TALK,
	'$1_талқылауы'        => NS_PROJECT_TALK,
	'Сурет'               => NS_IMAGE,
	'Сурет_талқылауы'     => NS_IMAGE_TALK,
	'МедиаУики'           => NS_MEDIAWIKI,
	'МедиаУики_талқылауы' => NS_MEDIAWIKI_TALK,
	'Үлгі'                => NS_TEMPLATE,
	'Үлгі_талқылауы'      => NS_TEMPLATE_TALK,
	'Анықтама'            => NS_HELP,
	'Анықтама_талқылауы'  => NS_HELP_TALK,
	'Санат'               => NS_CATEGORY,
	'Санат_талқылауы'     => NS_CATEGORY_TALK,

	# Aliases to renamed kk-arab namespaces
	'مەدياۋيكي'        => NS_MEDIAWIKI,
	'مەدياۋيكي_تالقىلاۋى'  => NS_MEDIAWIKI_TALK ,
	'ٷلگٸ'        => NS_TEMPLATE ,
	'ٷلگٸ_تالقىلاۋى'    => NS_TEMPLATE_TALK,
	'ٴۇلگٴى'              => NS_TEMPLATE,
	'ٴۇلگٴى_تالقىلاۋى'    => NS_TEMPLATE_TALK,

	# Aliases to kk-arab namespaces
	'تاسپا'              => NS_MEDIA,
	'ارنايى'              => NS_SPECIAL,
	'تالقىلاۋ'            => NS_TALK,
	'قاتىسۋشى'          => NS_USER,
	'قاتىسۋشى_تالقىلاۋى'=> NS_USER_TALK,
	'$1_تالقىلاۋى'        => NS_PROJECT_TALK,
	'سۋرەت'              => NS_IMAGE,
	'سۋرەت_تالقىلاۋى'    => NS_IMAGE_TALK,
	'مەدياۋيكي'           => NS_MEDIAWIKI,
	'مەدياۋيكي_تالقىلاۋى' => NS_MEDIAWIKI_TALK,
	'ٷلگٸ'              => NS_TEMPLATE,
	'ٷلگٸ_تالقىلاۋى'    => NS_TEMPLATE_TALK,
	'انىقتاما'            => NS_HELP,
	'انىقتاما_تالقىلاۋى'  => NS_HELP_TALK,
	'سانات'              => NS_CATEGORY,
	'سانات_تالقىلاۋى'    => NS_CATEGORY_TALK,
);

$skinNames = array(
	'standard'    => 'Dağdılı (standard)',
	'nostalgia'   => 'Añsaw (nostalgia)',
	'cologneblue' => 'Köln zeñgirligi (cologneblue)',
	'monobook'    => 'Dara kitap (monobook)',
	'myskin'      => 'Öz mänerim (myskin)',
	'chick'       => 'Balapan (chick)',
	'simple'      => 'Kädimgi (simple)',
	'modern'      => 'Qazirgi zaman (modern)',
);

$datePreferences = array(
	'default',
	'mdy',
	'dmy',
	'ymd',
	'yyyy-mm-dd',
	'persian',
	'hebrew',
	'ISO 8601',
);

$defaultDateFormat = 'ymd';

$datePreferenceMigrationMap = array(
	'default',
	'mdy',
	'dmy',
	'ymd'
);

$dateFormats = array(
	'mdy time' => 'H:i',
	'mdy date' => 'xg j, Y "j."',
	'mdy both' => 'H:i, xg j, Y "j."',

	'dmy time' => 'H:i',
	'dmy date' => 'j F, Y "j."',
	'dmy both' => 'H:i, j F, Y "j."',

	'ymd time' => 'H:i',
	'ymd date' => 'Y "j." xg j',
	'ymd both' => 'H:i, Y "j." xg j',

	'yyyy-mm-dd time' => 'xnH:xni:xns',
	'yyyy-mm-dd date' => 'xnY-xnm-xnd',
	'yyyy-mm-dd both' => 'xnH:xni:xns, xnY-xnm-xnd',

	'persian time' => 'H:i',
	'persian date' => 'xij xiF xiY', 
	'persian both' => 'xij xiF xiY, H:i',
	
	'hebrew time' => 'H:i',
	'hebrew date' => 'xjj xjF xjY',
	'hebrew both' => 'H:i, xjj xjF xjY',

	'ISO 8601 time' => 'xnH:xni:xns',
	'ISO 8601 date' => 'xnY-xnm-xnd',
	'ISO 8601 both' => 'xnY-xnm-xnd"T"xnH:xni:xns',
);

/**
 * Magic words
 * Customisable syntax for wikitext and elsewhere.
 *
 * IDs must be valid identifiers, they can't contain hyphens. 
 *
 * Note to translators:
 *   Please include the English words as synonyms.  This allows people
 *   from other wikis to contribute more easily.
 *   Please don't remove deprecated values, them should be keeped for backward compatibility.
 *
 * This array can be modified at runtime with the LanguageGetMagic hook
 */
$magicWords = array(
#   ID                                 CASE  SYNONYMS
	'redirect'               => array( 0,    '#REDIRECT', '#AÝDAW' ),
	'notoc'                  => array( 0,    '__MAZMUNSIZ__', '__MSIZ__', '__NOTOC__' ),
	'nogallery'              => array( 0,    '__QOÝMASIZ__', '__QSIZ__', '__NOGALLERY__' ),
	'forcetoc'               => array( 0,    '__MAZMUNDATQIZW__', '__MQIZW__', '__FORCETOC__' ),
	'toc'                    => array( 0,    '__MAZMUNI__', '__MZMN__', '__TOC__' ),
	'noeditsection'          => array( 0,    '__BÖLİMÖNDETKİZBEW__', '__NOEDITSECTION__' ),
	'currentmonth'           => array( 1,    'AĞIMDAĞIAÝ', 'CURRENTMONTH' ),
	'currentmonthname'       => array( 1,    'AĞIMDAĞIAÝATAWI', 'CURRENTMONTHNAME' ),
	'currentmonthnamegen'    => array( 1,    'AĞIMDAĞIAÝİLİKATAWI', 'CURRENTMONTHNAMEGEN' ),
	'currentmonthabbrev'     => array( 1,    'AĞIMDAĞIAÝJÏIR', 'AĞIMDAĞIAÝQISQA', 'CURRENTMONTHABBREV' ),
	'currentday'             => array( 1,    'AĞIMDAĞIKÜN', 'CURRENTDAY' ),
	'currentday2'            => array( 1,    'AĞIMDAĞIKÜN2', 'CURRENTDAY2' ),
	'currentdayname'         => array( 1,    'AĞIMDAĞIKÜNATAWI', 'CURRENTDAYNAME' ),
	'currentyear'            => array( 1,    'AĞIMDAĞIJIL', 'CURRENTYEAR' ),
	'currenttime'            => array( 1,    'AĞIMDAĞIWAQIT', 'CURRENTTIME' ),
	'currenthour'            => array( 1,    'AĞIMDAĞISAĞAT', 'CURRENTHOUR' ),
	'localmonth'             => array( 1,    'JERGİLİKTİAÝ', 'LOCALMONTH' ),
	'localmonthname'         => array( 1,    'JERGİLİKTİAÝATAWI', 'LOCALMONTHNAME' ),
	'localmonthnamegen'      => array( 1,    'JERGİLİKTİAÝİLİKATAWI', 'LOCALMONTHNAMEGEN' ),
	'localmonthabbrev'       => array( 1,    'JERGİLİKTİAÝJÏIR', 'JERGİLİKTİAÝQISQAŞA', 'JERGİLİKTİAÝQISQA', 'LOCALMONTHABBREV' ),
	'localday'               => array( 1,    'JERGİLİKTİKÜN', 'LOCALDAY' ),
	'localday2'              => array( 1,    'JERGİLİKTİKÜN2', 'LOCALDAY2'  ),
	'localdayname'           => array( 1,    'JERGİLİKTİKÜNATAWI', 'LOCALDAYNAME' ),
	'localyear'              => array( 1,    'JERGİLİKTİJIL', 'LOCALYEAR' ),
	'localtime'              => array( 1,    'JERGİLİKTİWAQIT', 'LOCALTIME' ),
	'localhour'              => array( 1,    'JERGİLİKTİSAĞAT', 'LOCALHOUR' ),
	'numberofpages'          => array( 1,    'BETSANI', 'NUMBEROFPAGES' ),
	'numberofarticles'       => array( 1,    'MAQALASANI', 'NUMBEROFARTICLES' ),
	'numberoffiles'          => array( 1,    'FAÝLSANI', 'NUMBEROFFILES' ),
	'numberofusers'          => array( 1,    'QATISWŞISANI', 'NUMBEROFUSERS' ),
	'numberofedits'          => array( 1,    'TÜZETWSANI', 'NUMBEROFEDITS' ),
	'pagename'               => array( 1,    'BETATAWI', 'PAGENAME' ),
	'pagenamee'              => array( 1,    'BETATAWI2', 'PAGENAMEE' ),
	'namespace'              => array( 1,    'ESİMAYASI', 'NAMESPACE' ),
	'namespacee'             => array( 1,    'ESİMAYASI2', 'NAMESPACEE' ),
	'talkspace'              => array( 1,    'TALQILAWAYASI', 'TALKSPACE' ),
	'talkspacee'             => array( 1,    'TALQILAWAYASI2', 'TALKSPACEE' ),
	'subjectspace'           => array( 1,    'TAQIRIPBETİ', 'MAQALABETİ', 'SUBJECTSPACE', 'ARTICLESPACE' ),
	'subjectspacee'          => array( 1,    'TAQIRIPBETİ2', 'MAQALABETİ2', 'SUBJECTSPACEE', 'ARTICLESPACEE' ),
	'fullpagename'           => array( 1,    'TOLIQBETATAWI', 'FULLPAGENAME' ),
	'fullpagenamee'          => array( 1,    'TOLIQBETATAWI2', 'FULLPAGENAMEE' ),
	'subpagename'            => array( 1,    'BETŞEATAWI', 'ASTIÑĞIBETATAWI', 'SUBPAGENAME' ),
	'subpagenamee'           => array( 1,    'BETŞEATAWI2', 'ASTIÑĞIBETATAWI2', 'SUBPAGENAMEE' ),
	'basepagename'           => array( 1,    'NEGİZGİBETATAWI', 'BASEPAGENAME' ),
	'basepagenamee'          => array( 1,    'NEGİZGİBETATAWI2', 'BASEPAGENAMEE' ),
	'talkpagename'           => array( 1,    'TALQILAWBETATAWI', 'TALKPAGENAME' ),
	'talkpagenamee'          => array( 1,    'TALQILAWBETATAWI2', 'TALKPAGENAMEE' ),
	'subjectpagename'        => array( 1,    'TAQIRIPBETATAWI', 'MAQALABETATAWI', 'SUBJECTPAGENAME', 'ARTICLEPAGENAME' ),
	'subjectpagenamee'       => array( 1,    'TAQIRIPBETATAWI2', 'MAQALABETATAWI2', 'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE' ),
	'msg'                    => array( 0,    'XBR:', 'MSG:' ),
	'subst'                  => array( 0,    'BÄDEL:', 'SUBST:' ),
	'msgnw'                  => array( 0,    'WÏKÏSİZXBR:', 'MSGNW:' ),
	'img_thumbnail'          => array( 1,    'nobaý', 'thumbnail', 'thumb' ),
	'img_manualthumb'        => array( 1,    'nobaý=$1', 'thumbnail=$1', 'thumb=$1'),
	'img_right'              => array( 1,    'oñğa', 'oñ', 'right' ),
	'img_left'               => array( 1,    'solğa', 'sol', 'left' ),
	'img_none'               => array( 1,    'eşqandaý', 'joq', 'none' ),
	'img_width'              => array( 1,    '$1 px', '$1px' ),
	'img_center'             => array( 1,    'ortağa', 'orta', 'center', 'centre' ),
	'img_framed'             => array( 1,    'sürmeli', 'framed', 'enframed', 'frame' ),
	'img_frameless'          => array( 1,    'sürmesiz', 'frameless' ),
	'img_page'               => array( 1,    'bet=$1', 'bet $1', 'page=$1', 'page $1' ),
	'img_upright'            => array( 1,    'tikti', 'tiktik=$1', 'tiktik $1', 'upright', 'upright=$1', 'upright $1' ),
	'img_border'             => array( 1,    'şekti', 'border' ),
	'img_baseline'           => array( 1,    'negizjol', 'baseline' ),
	'img_sub'                => array( 1,    'astılığı', 'ast', 'sub'),
	'img_super'              => array( 1,    'üstiligi', 'üst', 'sup', 'super', 'sup' ),
	'img_top'                => array( 1,    'üstine', 'top' ),
	'img_text_top'           => array( 1,    'mätin-üstinde', 'text-top' ),
	'img_middle'             => array( 1,    'aralığına', 'middle' ),
	'img_bottom'             => array( 1,    'astına', 'bottom' ),
	'img_text_bottom'        => array( 1,    'mätin-astında', 'text-bottom' ),
	'int'                    => array( 0,    'İŞKİ:', 'INT:' ),
	'sitename'               => array( 1,    'TORAPATAWI', 'SITENAME' ),
	'ns'                     => array( 0,    'EA:', 'ESİMAYA:', 'NS:' ),
	'localurl'               => array( 0,    'JERGİLİKTİJAÝ:', 'LOCALURL:' ),
	'localurle'              => array( 0,    'JERGİLİKTİJAÝ2:', 'LOCALURLE:' ),
	'server'                 => array( 0,    'SERVER', 'SERVER' ),
	'servername'             => array( 0,    'SERVERATAWI', 'SERVERNAME' ),
	'scriptpath'             => array( 0,    'ÄMİRJOLI', 'SCRIPTPATH' ),
	'grammar'                => array( 0,    'SEPTİGİ:', 'SEPTİK:', 'GRAMMAR:' ),
	'notitleconvert'         => array( 0,    '__ATAWALMASTIRĞIZBAW__', '__AABAW__', '__NOTITLECONVERT__', '__NOTC__' ),
	'nocontentconvert'       => array( 0,    '__MAĞLUMATALMASTIRĞIZBAW__', '__MABAW__', '__NOCONTENTCONVERT__', '__NOCC__' ),
	'currentweek'            => array( 1,    'AĞIMDAĞIAPTASI', 'AĞIMDAĞIAPTA', 'CURRENTWEEK' ),
	'currentdow'             => array( 1,    'AĞIMDAĞIAPTAKÜNİ', 'CURRENTDOW' ),
	'localweek'              => array( 1,    'JERGİLİKTİAPTASI', 'JERGİLİKTİAPTA', 'LOCALWEEK' ),
	'localdow'               => array( 1,    'JERGİLİKTİAPTAKÜNİ', 'LOCALDOW' ),
	'revisionid'             => array( 1,    'NUSQANÖMİRİ', 'REVISIONID' ),
	'revisionday'            => array( 1,    'NUSQAKÜNİ' , 'REVISIONDAY' ),
	'revisionday2'           => array( 1,    'NUSQAKÜNİ2', 'REVISIONDAY2' ),
	'revisionmonth'          => array( 1,    'NUSQAAÝI', 'REVISIONMONTH' ),
	'revisionyear'           => array( 1,    'NUSQAJILI', 'REVISIONYEAR' ),
	'revisiontimestamp'      => array( 1,    'NUSQAWAQITTÜÝİNDEMESİ', 'REVISIONTIMESTAMP' ),
	'plural'                 => array( 0,    'KÖPŞETÜRİ:','KÖPŞE:', 'PLURAL:' ),
	'fullurl'                => array( 0,    'TOLIQJAÝI:', 'TOLIQJAÝ:', 'FULLURL:' ),
	'fullurle'               => array( 0,    'TOLIQJAÝI2:', 'TOLIQJAÝ2:', 'FULLURLE:' ),
	'lcfirst'                => array( 0,    'KÄ1:', 'KİŞİÄRİPPEN1:', 'LCFIRST:' ),
	'ucfirst'                => array( 0,    'BÄ1:', 'BASÄRİPPEN1:', 'UCFIRST:' ),
	'lc'                     => array( 0,    'KÄ:', 'KİŞİÄRİPPEN:', 'LC:' ),
	'uc'                     => array( 0,    'BÄ:', 'BASÄRİPPEN:', 'UC:' ),
	'raw'                    => array( 0,    'QAM:', 'RAW:' ),
	'displaytitle'           => array( 1,    'KÖRSETİLETİNATAW', 'DISPLAYTITLE' ),
	'rawsuffix'              => array( 1,    'Q', 'R' ),
	'newsectionlink'         => array( 1,    '__JAÑABÖLİMSİLTEMESİ__', '__NEWSECTIONLINK__' ),
	'currentversion'         => array( 1,    'BAĞDARLAMANUSQASI', 'CURRENTVERSION' ),
	'urlencode'              => array( 0,    'JAÝDIMUQAMDAW:', 'URLENCODE:' ),
	'anchorencode'           => array( 0,    'JÄKİRDİMUQAMDAW', 'ANCHORENCODE' ),
	'currenttimestamp'       => array( 1,    'AĞIMDAĞIWAQITTÜÝİNDEMESİ', 'AĞIMDAĞIWAQITTÜÝİN', 'CURRENTTIMESTAMP' ),
	'localtimestamp'         => array( 1,    'JERGİLİKTİWAQITTÜÝİNDEMESİ', 'JERGİLİKTİWAQITTÜÝİN', 'LOCALTIMESTAMP' ),
	'directionmark'          => array( 1,    'BAĞITBELGİSİ', 'DIRECTIONMARK', 'DIRMARK' ),
	'language'               => array( 0,    '#TİL:', '#LANGUAGE:' ),
	'contentlanguage'        => array( 1,    'MAĞLUMATTİLİ', 'CONTENTLANGUAGE', 'CONTENTLANG' ),
	'pagesinnamespace'       => array( 1,    'ESİMAYABETSANI:', 'EABETSANI:', 'AYABETSANI:', 'PAGESINNAMESPACE:', 'PAGESINNS:' ),
	'numberofadmins'         => array( 1,    'ÄKİMŞİSANI', 'NUMBEROFADMINS' ),
	'formatnum'              => array( 0,    'SANPİŞİMİ', 'FORMATNUM' ),
	'padleft'                => array( 0,    'SOLĞAIĞIS', 'SOLIĞIS', 'PADLEFT' ),
	'padright'               => array( 0,    'OÑĞAIĞIS', 'OÑIĞIS', 'PADRIGHT' ),
	'special'                => array( 0,    'arnaýı', 'special' ),
	'defaultsort'            => array( 1,    'ÄDEPKİSURIPTAW:', 'ÄDEPKİSANATSURIPTAW:', 'ÄDEPKİSURIPTAWKİLTİ:', 'ÄDEPKİSURIP:', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ),
	'filepath'               => array( 0,    'FILEPATH:', 'FAÝLMEKENİ' ),
	'tag'                    => array( 0,    'belgi', 'tag' ),
);

$specialPageAliases = array(
	'DoubleRedirects'           => array( 'Şınjırlı_aýdatwlar' ),
	'BrokenRedirects'           => array( 'Jaramsız_aýdatwlar' ),
	'Disambiguations'           => array( 'Aýrıqtı_better' ),
	'Userlogin'                 => array( 'Qatıswşı_kirwi' ),
	'Userlogout'                => array( 'Qatıswşı_şığwı' ),
	'CreateAccount'             => array( 'Tirkelgi_Jaratw' ),
	'Preferences'               => array( 'Baptaw' ),
	'Watchlist'                 => array( 'Baqılaw_tizimi' ),
	'Recentchanges'             => array( 'Jwıqtağı_özgerister' ),
	'Upload'                    => array( 'Qotarw' ),
	'Imagelist'                 => array( 'Swret_tizimi' ),
	'Newimages'                 => array( 'Jaña_swretter' ),
	'Listusers'                 => array( 'Qatıswşılar', 'Qatıswşı_tizimi' ),
	'Statistics'                => array( 'Sanaq' ),
	'Randompage'                => array( 'Kezdeýsoq', 'Kezdeýsoq_bet' ),
	'Lonelypages'               => array( 'Sayaq_better' ),
	'Uncategorizedpages'        => array( 'Sanatsız_better' ),
	'Uncategorizedcategories'   => array( 'Sanatsız_sanattar' ),
	'Uncategorizedimages'       => array( 'Sanatsız_swretter' ),
	'Uncategorizedtemplates'    => array( 'Sanatsız_ülgiler' ),
	'Unusedcategories'          => array( 'Paýdalanılmağan_sanattar' ),
	'Unusedimages'              => array( 'Paýdalanılmağan_swretter' ),
	'Wantedpages'               => array( 'Toltırılmağan_better', 'Jaramsız_siltemeler' ),
	'Wantedcategories'          => array( 'Toltırılmağan_sanattar' ),
	'Mostlinked'                => array( 'Eñ_köp_siltengen_better' ),
	'Mostlinkedcategories'      => array( 'Eñ_köp_paýdalanılğan_sanattar', 'Eñ_köp_siltengen_sanattar' ),
	'Mostlinkedtemplates'       => array( 'Eñ_köp_paýdalanılğan_ülgiler', 'Eñ_köp_siltengen_ülgiler' ),
	'Mostcategories'            => array( 'Eñ_köp_sanattar_barı' ),
	'Mostimages'                => array( 'Eñ_köp_paýdalanılğan_swretter', 'Eñ_köp_swretter_barı' ),
	'Mostrevisions'             => array( 'Eñ_köp_nusqalar_barı' ),
	'Fewestrevisions'           => array( 'Eñ_az_tüzetilgen ' ),
	'Shortpages'                => array( 'Qısqa_better' ),
	'Longpages'                 => array( 'Uzın_better', 'Ülken_better' ),
	'Newpages'                  => array( 'Jaña_better' ),
	'Ancientpages'              => array( 'Eski_better' ),
	'Deadendpages'              => array( 'Tuýıq_better' ),
	'Protectedpages'            => array( 'Qorğalğan_better' ),
	'Protectedtitles'           => array( 'Qorğalğan_atawlar' ),
	'Allpages'                  => array( 'Barlıq_better' ),
	'Prefixindex'               => array( 'Bastawış_tizimi' ) ,
	'Ipblocklist'               => array( 'Buğattalğandar' ),
	'Specialpages'              => array( 'Arnaýı_better' ),
	'Contributions'             => array( 'Ülesi' ),
	'Emailuser'                 => array( 'Xat_jiberw' ),
	'Confirmemail'              => array( 'Quptaw_xat' ),
	'Whatlinkshere'             => array( 'Mında_siltegender' ),
	'Recentchangeslinked'       => array( 'Siltengenderdiñ_özgeristeri' ),
	'Movepage'                  => array( 'Betti_jıljıtw' ),
	'Blockme'                   => array( 'Özdiktik_buğattaw', 'Özdik_buğattaw', 'Meni_buğattaw',),
	'Booksources'               => array( 'Kitap_qaýnarları' ),
	'Categories'                => array( 'Sanattar' ),
	'Export'                    => array( 'Sırtqa_berw' ),
	'Version'                   => array( 'Nusqası' ),
	'Allmessages'               => array( 'Barlıq_xabarlar' ),
	'Log'                       => array( 'Jwrnal', 'Jwrnaldar' ),
	'Blockip'                   => array( 'Jaýdı_buğattaw', 'IP_buğattaw'),
	'Undelete'                  => array( 'Joywdı_boldırmaw', 'Joýılğandı_qaýtarw' ),
	'Import'                    => array( 'Sırttan_alw' ),
	'Lockdb'                    => array( 'Derekqordı_qulıptaw' ),
	'Unlockdb'                  => array( 'Derekqordı_qulıptamaw' ),
	'Userrights'                => array( 'Qatıswşı_quqıqtarı' ),
	'MIMEsearch'                => array( 'MIME_türimen_izdew' ),
	'Unwatchedpages'            => array( 'Baqılanılmağan_better' ),
	'Listredirects'             => array( 'Aýdatw_tizimi' ),
	'Revisiondelete'            => array( 'Nusqanı_joyw' ),
	'Unusedtemplates'           => array( 'Paýdalanılmağan_ülgiler' ),
	'Randomredirect'            => array( 'Kedeýsoq_aýdatw' ),
	'Mypage'                    => array( 'Jeke_betim' ),
	'Mytalk'                    => array( 'Talqılawım' ),
	'Mycontributions'           => array( 'Ülesim' ),
	'Listadmins'                => array( 'Äkimşiler', 'Äkimşi_tizimi'),
	'Listbots'                  => array( 'Bottar', 'Bottar_tizimi' ),
	'Popularpages'              => array( 'Eñ_köp_qaralğan_better', 'Äýgili_better' ),
	'Search'                    => array( 'İzdew' ),
	'Resetpass'                 => array( 'Qupïya_sözdi_qaýtarw' ),
	'Withoutinterwiki'          => array( 'Wïkï-aralıqsızdar' ),
	'MergeHistory'              => array( 'Tarïx_biriktirw' ),
);

#-------------------------------------------------------------------
# Default messages
#-------------------------------------------------------------------

$messages = array(
# User preference toggles
'tog-underline'               => 'Siltemeniñ astın sız:',
'tog-highlightbroken'         => 'Jaramsız siltemelerdi <a href="" class="new">bılaý sïyaqtı</a> pişimde (balaması: bılaý sïyaqtı<a href="" class="internal">?</a>).',
'tog-justify'                 => 'Ejelerdi eni boýınşa twralaw',
'tog-hideminor'               => 'Jwıqtağı özgeristerden şağındarın jasır',
'tog-extendwatchlist'         => 'Baqılaw tizimdi ulğaýt (barlıq jaramdı özgeristerdi körset)',
'tog-usenewrc'                => 'Keñeýtilgen jwıqtağı özgerister (JavaScript)',
'tog-numberheadings'          => 'Bas joldardı özdiktik nomirle',
'tog-showtoolbar'             => 'Öñdew qwraldar jolağın körset (JavaScript)',
'tog-editondblclick'          => 'Qos nuqımdap öñdew (JavaScript)',
'tog-editsection'             => 'Bölimderdi [öñdew] siltemesimen öñdewin qos',
'tog-editsectiononrightclick' => 'Bölim atawın oñ jaq nuqwmen öñdewin qos (JavaScript)',
'tog-showtoc'                 => 'Mazmunın körset (3-ten arta bölimi barılarğa)',
'tog-rememberpassword'        => 'Kirgenimdi osı komp′ywterde umıtpa',
'tog-editwidth'               => 'Öñdew awmağı tolıq enimen',
'tog-watchcreations'          => 'Men bastağan betterdi baqılaw tizimime üste',
'tog-watchdefault'            => 'Men öñdegen betterdi baqılaw tizimime üste',
'tog-watchmoves'              => 'Men jıljıtqan betterdi baqılaw tizimime üste',
'tog-watchdeletion'           => 'Men joýğan betterdi baqılaw tizimime üste',
'tog-minordefault'            => 'Ädepkiden barlıq tüzetwlerdi şağın dep belgile',
'tog-previewontop'            => 'Qarap şığw awmağı öñdew awmağı aldında',
'tog-previewonfirst'          => 'Birinşi öñdegende qarap şığw',
'tog-nocache'                 => 'Betti qosalqı qaltada saqtawdı öşir',
'tog-enotifwatchlistpages'    => 'Baqılanğan bet özgergende mağan xat jiber',
'tog-enotifusertalkpages'     => 'Talqılawım özgergende mağan xat jiber',
'tog-enotifminoredits'        => 'Şağın tüzetw twralı da mağan xat jiber',
'tog-enotifrevealaddr'        => 'E-poşta jaýımdı eskertw xatta aşıq körset',
'tog-shownumberswatching'     => 'Baqılap turğan qatıswşılardıñ sanın körset',
'tog-fancysig'                => 'Qam qoltañba (özdiktik siltemesiz;)',
'tog-externaleditor'          => 'Sırtqı öñdewişti ädepkiden qoldan',
'tog-externaldiff'            => 'Sırtqı aýırmağıştı ädepkiden qoldan',
'tog-showjumplinks'           => '«Ötip ketw» qatınaw siltemelerin qos',
'tog-uselivepreview'          => 'Twra qarap şığwdı qoldanw (JavaScript) (Sınaqtama)',
'tog-forceeditsummary'        => 'Öñdew sïpattaması bos qalğanda mağan eskert',
'tog-watchlisthideown'        => 'Tüzetwimdi baqılaw tizimnen jasır',
'tog-watchlisthidebots'       => 'Bot tüzetwin baqılaw tizimnen jasır',
'tog-watchlisthideminor'      => 'Şağın tüzetwlerdi baqılaw tiziminde körsetpe',
'tog-nolangconversion'        => 'Til türi awdarısın öşir',
'tog-ccmeonemails'            => 'Basqa qatıswşığa jibergen xatımnıñ köşirmesin mağan da jiber',
'tog-diffonly'                => 'Aýırma astında bet mağlumatın körsetpe',

'underline-always'  => 'Ärqaşan',
'underline-never'   => 'Eşqaşan',
'underline-default' => 'Şolğış boýınşa',

'skinpreview' => '(Qarap şığw)',

# Dates
'sunday'        => 'Jeksenbi',
'monday'        => 'Düýsenbi',
'tuesday'       => 'Seýsenbi',
'wednesday'     => 'Särsenbi',
'thursday'      => 'Beýsenbi',
'friday'        => 'Juma',
'saturday'      => 'Senbi',
'sun'           => 'Jek',
'mon'           => 'Düý',
'tue'           => 'Beý',
'wed'           => 'Sär',
'thu'           => 'Beý',
'fri'           => 'Jum',
'sat'           => 'Sen',
'january'       => 'qañtar',
'february'      => 'aqpan',
'march'         => 'nawrız',
'april'         => 'cäwir',
'may_long'      => 'mamır',
'june'          => 'mawsım',
'july'          => 'şilde',
'august'        => 'tamız',
'september'     => 'qırküýek',
'october'       => 'qazan',
'november'      => 'qaraşa',
'december'      => 'jeltoqsan',
'january-gen'   => 'qañtardıñ',
'february-gen'  => 'aqpannıñ',
'march-gen'     => 'nawrızdıñ',
'april-gen'     => 'säwirdiñ',
'may-gen'       => 'mamırdıñ',
'june-gen'      => 'mawsımnıñ',
'july-gen'      => 'şildeniñ',
'august-gen'    => 'tamızdıñ',
'september-gen' => 'qırküýektiñ',
'october-gen'   => 'qazannıñ',
'november-gen'  => 'qaraşanıñ',
'december-gen'  => 'jeltoqsannıñ',
'jan'           => 'qañ',
'feb'           => 'aqp',
'mar'           => 'naw',
'apr'           => 'cäw',
'may'           => 'mam',
'jun'           => 'maw',
'jul'           => 'şil',
'aug'           => 'tam',
'sep'           => 'qır',
'oct'           => 'qaz',
'nov'           => 'qar',
'dec'           => 'jel',

# Bits of text used by many pages
'categories'            => 'Sanattar',
'pagecategories'        => '{{PLURAL:$1|Sanat|Sanattar}}',
'category_header'       => '«$1» sanatındağı better',
'subcategories'         => 'Sanatşalar',
'category-media-header' => '«$1» sanatındağı taspalar',
'category-empty'        => "''Bul sanatta ağımda eş bet ne taspa joq.''",

'mainpagetext'      => "<big>'''MedïaWïkï bağdarlaması sätti ornatıldı.'''</big>",
'mainpagedocfooter' => 'Wïkï bağdarlamasın paýdalanw aqparatı üşin [http://meta.wikimedia.org/wiki/Help:Contents Paýdalanwşı nusqawlarımen] tanısıñız.

== Bastaw üşin ==

* [http://www.mediawiki.org/wiki/Manual:Configuration_settings Baptaw qalawlarınıñ tizimi]
* [http://www.mediawiki.org/wiki/Manual:FAQ MedïaWïkïdiñ Jïı Qoýılğan Sawaldarı]
* [http://lists.wikimedia.org/mailman/listinfo/mediawiki-announce MedïaWïkï şığw twralı xat taratw tizimi]',

'about'          => 'Joba twralı',
'article'        => 'Mağlumat beti',
'newwindow'      => '(jaña terezede)',
'cancel'         => 'Boldırmaw',
'qbfind'         => 'Tabw',
'qbbrowse'       => 'Şolw',
'qbedit'         => 'Öñdew',
'qbpageoptions'  => 'Bul bet',
'qbpageinfo'     => 'Mätin aralığı',
'qbmyoptions'    => 'Betterim',
'qbspecialpages' => 'Arnaýı better',
'moredotdotdot'  => 'Köbirek…',
'mypage'         => 'Jeke betim',
'mytalk'         => 'Talqılawım',
'anontalk'       => 'IP talqılawı',
'navigation'     => 'Bağıttaw',
'and'            => 'jäne',

# Metadata in edit box
'metadata_help' => 'Qosımşa derekter:',

'errorpagetitle'    => 'Qatelik',
'returnto'          => '$1 degenge qaýta oralw.',
'tagline'           => '{{GRAMMAR:ablative|{{SITENAME}}}}',
'help'              => 'Anıqtama',
'search'            => 'İzdew',
'searchbutton'      => 'İzde',
'go'                => 'Ötw',
'searcharticle'     => 'Öt!',
'history'           => 'Bet tarïxı',
'history_short'     => 'Tarïxı',
'updatedmarker'     => 'soñğı kelip-ketwimnen beri jañalanğan',
'info_short'        => 'Mälimet',
'printableversion'  => 'Basıp şığarw üşin',
'permalink'         => 'Turaqtı silteme',
'print'             => 'Basıp şığarw',
'edit'              => 'Öñdew',
'editthispage'      => 'Betti öñdew',
'delete'            => 'Joyw',
'deletethispage'    => 'Betti joyw',
'undelete_short'    => '{{PLURAL:$1|Bir|$1}} tüzetw joywın boldırmaw',
'protect'           => 'Qorğaw',
'protect_change'    => 'qorğawdı özgertw',
'protectthispage'   => 'Betti qorğaw',
'unprotect'         => 'Qorğamaw',
'unprotectthispage' => 'Betti qorğamaw',
'newpage'           => 'Jaña bet',
'talkpage'          => 'Betti talqılaw',
'talkpagelinktext'  => 'Talqılawı',
'specialpage'       => 'Arnaýı bet',
'personaltools'     => 'Jeke quraldar',
'postcomment'       => 'Mändeme jiberw',
'articlepage'       => 'Mağlumat betin qaraw',
'talk'              => 'Talqılaw',
'views'             => 'Körinis',
'toolbox'           => 'Quraldar',
'userpage'          => 'Qatıswşı betin qaraw',
'projectpage'       => 'Joba betin qaraw',
'imagepage'         => 'Swret betin qaraw',
'mediawikipage'     => 'Xabar betin qaraw',
'templatepage'      => 'Ülgi betin qaraw',
'viewhelppage'      => 'Anıqtama betin qaraw',
'categorypage'      => 'Sanat betin qaraw',
'viewtalkpage'      => 'Talqılaw betin qaraw',
'otherlanguages'    => 'Basqa tilderde',
'redirectedfrom'    => '($1 betinen aýdatılğan)',
'redirectpagesub'   => 'Aýdatw beti',
'lastmodifiedat'    => 'Bul bettiñ özgertilgen soñğı kezi: $2, $1.', # $1 date, $2 time
'viewcount'         => 'Bul bet {{PLURAL:$1|bir|$1}} ret qatınalğan.',
'protectedpage'     => 'Qorğalğan bet',
'jumpto'            => 'Mında ötw:',
'jumptonavigation'  => 'bağıttaw',
'jumptosearch'      => 'izdew',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite'         => '{{SITENAME}} twralı',
'aboutpage'         => 'Project:Joba twralı',
'bugreports'        => 'Qatelik eseptemeleri',
'bugreportspage'    => 'Project:Qatelik eseptemeleri',
'copyright'         => 'Mağlumat $1 boýınşa qatınaladı.',
'copyrightpagename' => '{{SITENAME}} awtorlıq quqıqtarı',
'copyrightpage'     => '{{ns:project}}:Awtorlıq quqıqtar',
'currentevents'     => 'Ağımdağı oqïğalar',
'currentevents-url' => 'Project:Ağımdağı oqïğalar',
'disclaimers'       => 'Jawapkerşilikten bas tartw',
'disclaimerpage'    => 'Project:Jawapkerşilikten bas tartw',
'edithelp'          => 'Öndew anıqtaması',
'edithelppage'      => 'Help:Öñdew',
'faq'               => 'Jïi qoýılğan sawaldar',
'faqpage'           => 'Project:Jïi qoýılğan sawaldar',
'helppage'          => 'Help:Mazmunı',
'mainpage'          => 'Bastı bet',
'policy-url'        => 'Project:Erejeler',
'portal'            => 'Qawım portalı',
'portal-url'        => 'Project:Qawım portalı',
'privacy'           => 'Jeke qupïyasın saqtaw',
'privacypage'       => 'Project:Jeke qupïyasın saqtaw',
'sitesupport'       => 'Demewşilik',
'sitesupport-url'   => 'Project:Demewşilik',

'badaccess'        => 'Ruqsat qatesi',
'badaccess-group0' => 'Suratılğan äreketiñizdi jegwiñizge ruqsat etilmeýdi.',
'badaccess-group1' => 'Suratılğan äreketiñiz $1 tobınıñ qatıswşılarına şekteledi.',
'badaccess-group2' => 'Suratılğan äreketiñiz $1 toptarı biriniñ qatwsışılarına şekteledi.',
'badaccess-groups' => 'Suratılğan äreketiñiz $1 toptarı biriniñ qatwsışılarına şekteledi.',

'versionrequired'     => 'MediaWiki $1 nusqası kerek',
'versionrequiredtext' => 'Osı betti qoldanw üşin MediaWiki $1 nusqası kerek. [[{{ns:special}}:Version|Jüýe nusqası betin]] qarañız.',

'ok'                      => 'Jaraýdı',
'pagetitle'               => '$1 — {{SITENAME}}',
'retrievedfrom'           => '«$1» betinen alınğan',
'youhavenewmessages'      => 'Sizge $1 bar ($2).',
'newmessageslink'         => 'jaña xabarlar',
'newmessagesdifflink'     => 'soñğı özgerisine',
'youhavenewmessagesmulti' => '$1 degende jaña xabarlar bar',
'editsection'             => 'öñdew',
'editold'                 => 'öñdew',
'editsectionhint'         => 'Bölimdi öñdew: $1',
'toc'                     => 'Mazmunı',
'showtoc'                 => 'körset',
'hidetoc'                 => 'jasır',
'thisisdeleted'           => 'Qaraw, ne qalpına keltirw me?: $1',
'viewdeleted'             => 'Qaraw ma?: $1',
'restorelink'             => 'joýılğan {{PLURAL:$1|bir|$1}} tüzetw',
'feedlinks'               => 'Arna:',
'feed-invalid'            => 'Jaramsız jazılımdı arna türi.',
'site-rss-feed'           => '$1 RSS arnası',
'site-atom-feed'          => '$1 Atom arnası',
'page-rss-feed'           => '«$1» degenniñ RSS arnası',
'page-atom-feed'          => '«$1» degenniñ Atom arnası',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main'      => 'Bet',
'nstab-user'      => 'Jeke bet',
'nstab-media'     => 'Taspa beti',
'nstab-special'   => 'Arnaýı',
'nstab-project'   => 'Joba beti',
'nstab-image'     => 'Faýl beti',
'nstab-mediawiki' => 'Xabar',
'nstab-template'  => 'Ülgi',
'nstab-help'      => 'Anıqtama',
'nstab-category'  => 'Sanat',

# Main script and global functions
'nosuchaction'      => 'Bundaý äreket joq',
'nosuchactiontext'  => 'Osı URL jaýımen engizilgen äreketti
osı wïkï joramaldap bilmedi.',
'nosuchspecialpage' => 'Bundaý arnaýı bet joq',
'nospecialpagetext' => "<big>'''Suratılğan arnaýı betiñiz jaramsız.'''</big>

Jaramdı arnaýı bet tizimin [[{{ns:special}}:Specialpages]] degennen taba alasız.",

# General errors
'error'                => 'Qate',
'databaseerror'        => 'Derekqor qatesi',
'dberrortext'          => 'Derekqor suranımında sïntaksïs qatesi boldı.
Bul bağdarlama qatesin belgilewi mümkin.
Soñğı bolğan derekqor suranımı:
<blockquote><tt>$1</tt></blockquote>
mına fwnkcïyasınan «<tt>$2</tt>».
MySQL qaýtarğan qatesi «<tt>$3: $4</tt>».',
'dberrortextcl'        => 'Derekqor suranımında sïntaksïs qatesi boldı.
Soñğı bolğan derekqor suranımı:
«$1»
mına fwnkcïyasınan: «$2».
MySQL qaýtarğan qatesi «$3: $4»',
'noconnect'            => 'Ğafw etiñiz! Bul wïkïde keýbir texnïkalıq qïınşılıqtar kezdesti, jäne de derekqor serverine baýlanısa almaýdı.<br />
$1',
'nodb'                 => '$1 derekqorı bölektenbedi',
'cachederror'          => 'Tömende suratılğan bettiñ qosalqı qaltadağı köşirmesi, osı bet jañartılmağan bolwı mümkin.',
'laggedslavemode'      => 'Qulaqtandırw: Bette jwıqtağı jañalawlar bolmawı mümkin.',
'readonly'             => 'Derekqorı qulıptalğan',
'enterlockreason'      => 'Qulıptaw sebebin engiziñiz, qaý waqıtqa deýin
qulıptalğanın kiristirip',
'readonlytext'         => 'Ağımda derekqor jaña jazba jäne tağı basqa özgerister jasawdan qulıptalınğan. Bul derekqordı jöndetw bağdarlamaların orındaw üşin bolwı mümkin, bunı bitirgennen soñ qalipti iske qaýtarıladı.

Qulıptağan äkimşi bunı bılaý tüsindiredi: $1',
'missingarticle'       => 'İzdestirilgen «$1» atawlı bet mätini derekqorda tabılmadı.

Bul dağdıda eskirgen aýırma siltemesine nemese joýılğan bet tarïxınıñ siltemesine
ergennen bolwı mümkin.

Eger bul boljam durıs sebep bolmasa, bağdarlamamızdağı qatege tap bolwıñız mümkin.
Bul twralı naqtı URL jaýına añğartıp, äkimşige esepteme jiberiñiz.',
'readonly_lag'         => 'Jetek derekqor serverler bastawışpen qadamlanğanda osı derekqor özdiktik qulıptalınğan',
'internalerror'        => 'İşki qate',
'internalerror_info'   => 'İşki qatesi: $1',
'filecopyerror'        => '«$1» faýlı «$2» faýlına köşirilmedi.',
'filerenameerror'      => '«$1» faýl atı «$2» atına özgertilmedi.',
'filedeleteerror'      => '«$1» faýlı joýılmaýdı.',
'directorycreateerror' => '«$1» qaltası jaratılmadı.',
'filenotfound'         => '«$1» faýlı tabılmadı.',
'fileexistserror'      => '«$1» faýlğa jazwğa bolmaýdı: osındaý faýl bar tüge',
'unexpected'           => 'Kütilmegen mağına: «$1» = «$2».',
'formerror'            => 'Qatelik: pişin jiberilmeýdi',
'badarticleerror'      => 'Osındaý äreket mına bette atqarılmaýdı.',
'cannotdelete'         => 'Aýtılmış bet ne swret joýılmaýdı. (Bunı basqa birew aldaqaşan joýğan mümkin.)',
'badtitle'             => 'Jaramsız ataw',
'badtitletext'         => 'Suratılğan bet atawı jaramsız, bos, tilara siltemesi ne wïkï-ara atawı burıs engizilgen. Atawlarda süemeldemegen birqatar äripter bolwı mümkin.',
'perfdisabled'         => 'Ğafw etiñiz! Bul mümkindik, derekqordıñ jıldamılığına äser etip, eşkimge wïkïdi paýdalanwğa bermegesin, waqıtşa öşirilgen.',
'perfcached'           => 'Kelesi derek qosalqı qaltasınan alınğan, sondıqtan tolıqtaý jañalanmağan bolwı mümkin.',
'perfcachedts'         => 'Kelesi derek qosalqı qaltasınan alınğan, soñğı jañalanlğan kezi: $1.',
'querypage-no-updates' => 'Bul bettiñ jañartılwı ağımda öşirilgen. Derekteri qazir özgertilmeýdi.',
'wrong_wfQuery_params' => 'wfQuery() fwnkcïyası üşin burıs baptalımdarı bar<br />
Fwnkcïya: $1<br />
Suranım: $2',
'viewsource'           => 'Qaýnarın qaraw',
'viewsourcefor'        => '$1 degen üşin',
'actionthrottled'      => 'Äreket bäseñdetildi',
'actionthrottledtext'  => 'Spamğa qarsı küres esebinde, osı äreketti qısqa waqıtta tım köp ret orındawıñız şektelindi, jäne bul şektew şamasınan asıp ketkensiz. Birneşe mïnöttan qaýta baýqap köriñiz.',
'protectedpagetext'    => 'Öñdewdi qaqpaýlaw üşin bul bet qulıptalınğan.',
'viewsourcetext'       => 'Bul bettiñ qaýnarın qarawıñızğa jäne köşirip alwñızğa boladı:',
'protectedinterface'   => 'Bul bet bağdarlamanıñ tildesw mätinin jetistiredi, sondıqtan qïyanattı qaqpaýlaw üşin özgertwi qulıptalğan.',
'editinginterface'     => "'''Qulaqtandırw:''' Bağdarlamağa tildesw mätinin jetistiretin betin öñdep jatırsız. Bul bettiñ özgertwi basqa qatıswşılarğa paýdalanwşılıq tildeswi qalaý körinetine äser etedi. Awdarw üşin, MediaWiki bağdarlamasın jersindirw [http://translatewiki.net/wiki/Translating:Intro Betawiki] jobası paýdalanwı jan-jağın qarañız.",
'sqlhidden'            => '(SQL suranımı jasırılğan)',
'cascadeprotected'     => 'Bul bet öñdewden qorğalğan, sebebi kelesi «bawlı qorğawı» qosılğan {{PLURAL:$1|betke|betterge}} kiristirilgen:

$2',
'namespaceprotected'   => "'''$1''' esim ayasındağı betterdi öñdew üşin ruqsatıñız joq.",
'customcssjsprotected' => 'Bul betti öñdewge ruqsatıñız joq, sebebi mında basqa qatıswşınıñ jeke baptawları bar.',
'ns-specialprotected'  => '{{ns:special}} esim ayasındağı better öñdelinbeýdi',
'titleprotected'       => 'Bul atawdıñ jaratwın [[{{ns:user}}:$1|$1]] qorğadı. Keltirilgen sebebi: <i>$2</i>.',

# Login and logout pages
'logouttitle'                => 'Qatıswşı şığwı',
'logouttext'                 => '<strong>Endi jüýeden şıqtıñız.</strong><br />
Jüýege kirmesten {{SITENAME}} jobasın paýdalanwın jalğastıra alasız,
nemese däl sol ne basqa qatıswşı bop qaýta krwiñiz mümkin.
Añğartpa: Keýbir better şolğıştıñ qosalqı qaltasın bosatqanşa deýin
äli de jüýege kirgeniñizdeý körinwi mümkin.',
'welcomecreation'            => '== Qoş keldiñiz, $1! ==

Tirkelgiñiz jaratıldı. {{SITENAME}} baptawıñızdı qalawıñızben özgertwdi umıtpañız.',
'loginpagetitle'             => 'Qatıswşı kirwi',
'yourname'                   => 'Qatıswşı atıñız:',
'yourpassword'               => 'Qupïya söziñiz:',
'yourpasswordagain'          => 'Qupïya sözdi qaýtalañız:',
'remembermypassword'         => 'Meniñ kirgenimdi bul komp′ywterde umıtpa',
'yourdomainname'             => 'Jeli üýşigiñiz:',
'externaldberror'            => 'Osında ne sırtqı teñdestirw derekqorında qate boldı, nemese sırtqı tirkelgiñizdi jañalaw ruqsatı joq.',
'loginproblem'               => '<b>Kirwiñiz kezinde osında qïındıqqa tap boldıq.</b><br />Qaýta baýqap köriñiz.',
'login'                      => 'Kirw',
'loginprompt'                => '{{SITENAME}} torabına kirwiñiz üşin «cookies» qosılwı tïisti.',
'userlogin'                  => 'Kirw / Tirkelw',
'logout'                     => 'Şığw',
'userlogout'                 => 'Şığw',
'notloggedin'                => 'Kirmegensiz',
'nologin'                    => 'Kirmegensiz be? $1.',
'nologinlink'                => 'Tirkeliñiz',
'createaccount'              => 'Tirkelw',
'gotaccount'                 => 'Aldaqaşan tirkeldiñiz be? $1.',
'gotaccountlink'             => 'Kiriñiz',
'createaccountmail'          => 'e-poştamen',
'badretype'                  => 'Engizgen qupïya sözderiñiz bir birine säýkes emes.',
'userexists'                 => 'Engizgen qatıswşı atıñız aldaqaşan paýdalanwda. Basqa ataw tandañız.',
'youremail'                  => 'E-poşta jaýıñız:',
'username'                   => 'Qatıswşı atıñız:',
'uid'                        => 'Qatıswşı teñdestirwiñiz:',
'yourrealname'               => 'Şın atıñız:',
'yourlanguage'               => 'Tiliñiz:',
'yourvariant'                => 'Nusqañız:',
'yournick'                   => 'Laqap atıñız:',
'badsig'                     => 'Qam qoltañbañız jaramsız; HTML belgişelerin tekseriñiz.',
'badsiglength'               => 'Laqap atıñız tım uzın; $1 nışannan aspawı kerek.',
'email'                      => 'E-poştañız',
'prefs-help-realname'        => 'Mindetti emes: Engizseñiz, şığarmañızdıñ awtorlığın belgilewi üşin qoldanıladı.',
'loginerror'                 => 'Kirw qatesi',
'prefs-help-email'           => 'Mindetti emes: «Qatıswşı» nemese «Qatıswşı_talqılawı» degen betteriñiz arqılı basqalarğa baýlanısw qosıladı. Öziñizdiñ kim ekeniñizdi bildirtpeýdi.',
'prefs-help-email-required'  => 'E-poşta jaýı kerek.',
'nocookiesnew'               => 'Qatıswşı tirkelgisi jaratıldı, biraq kirmegensiz. Qatıswşı kirw üşin {{SITENAME}} torabı «cookies» degendi qoldanadı. Sizde «cookies» öşirilgen. Sonı qosıñız da jaña qatıswşı atıñızdı jäne qupïya söziñizdi engizip kiriñiz.',
'nocookieslogin'             => 'Qatıswşı kirw üşin {{SITENAME}} torabı «cookies» degendi qoldanadı. Sizde «cookies» öşirilgen. Sonı qosıñız da kirwdi qaýta baýqap köriñiz.',
'noname'                     => 'Jaramdı qatıswşı atın engizbediñiz.',
'loginsuccesstitle'          => 'Kirwiñiz sätti ötti',
'loginsuccess'               => "'''Siz endi {{SITENAME}} jobasına «$1» retinde kirip otırsız.'''",
'nosuchuser'                 => 'Mında «$1» atawlı qatıswşı joq. Emleñizdi tekseriñiz, nemese jañadan tirkeliñiz.',
'nosuchusershort'            => 'Mında «<nowiki>$1</nowiki>» atawlı qatıswşı joq. Emleñizdi tekseriñiz.',
'nouserspecified'            => 'Qatıswşı atın engiziwiñiz kerek.',
'wrongpassword'              => 'Burıs qupïya söz engizilgen. Qaýta baýqap köriñiz.',
'wrongpasswordempty'         => 'Qupïya söz bos bolğan. Qaýta baýqap köriñiz.',
'passwordtooshort'           => 'Qupïya söziñiz jaramsız ne tım qısqa. Eñ keminde $1 ärip jäne qatıswşı atıñızdan basqa bolwı kerek.',
'mailmypassword'             => 'Qupïya sözimdi xatpen jiber',
'passwordremindertitle'      => '{{SITENAME}} üşin jaña waqıtşa qupïya söz',
'passwordremindertext'       => 'Keýbirew (IP jaýı: $1, bälkim öziñiz bolarsız)
{{SITENAME}} üşin bizden jaña qupïya sözin jiberwin suratılğan ($4).
«$2» qatıswşınıñ qupïya sözi «$3» boldı endi.
Qazir kirwiñiz jäne qupïya söziñizdi awıstrwıñız kerek.

Eger basqa birew bunı suratılğan bolsa, nemese qupïya söziñizdi umıtsañız da,
jäne bunı özgertkiñiz kelmese de, osı xabarlamağa añğarmawıñızğa da boladı,
eski qupïya söziñizdi äriğaraý qoldanıp.',
'noemail'                    => 'Mında «$1» qatıswşınıñ e-poştası joq.',
'passwordsent'               => 'Jaña qupïya söz «$1» üşin tirkelgen e-poşta
jaýına jiberildi.
Qabıldağannan keýin kirgende sonı engiziñiz.',
'blocked-mailpassword'       => 'IP jaýıñızdan öñdew buğattalğan, sondıqtan
qïyanattı qaqpaýlaw üşin qupïya söz jiberw qızmetiniñ äreketi ruqsat etilmeýdi.',
'eauthentsent'               => 'Quptaw xatı atalmış e-poşta jaýına jiberildi.
Basqa e-poşta xatın jiberwdiñ aldınan, tirkelgi şınınan sizdiki ekenin
quptaw üşin xattağı nusqawlarğa eriñiz.',
'throttled-mailpassword'     => 'Soñğı $1 sağatta qupïya söz eskertw xatı aldaqaşan jiberildi.
Qïyanattı qaqpaýlaw üşin, $1 sağat saýın tek bir ğana qupïya söz eskertw
xatı jiberiledi.',
'mailerror'                  => 'Xat jiberw qatesi: $1',
'acct_creation_throttle_hit' => 'Ğafw etiñiz, siz aldaqaşan $1 ret tirkeilipsiz. Onan artıq isteý almaýsız.',
'emailauthenticated'         => 'E-poşta jaýıñız quptalğan kezi: $1.',
'emailnotauthenticated'      => 'E-poşta jaýıñız äli quptalğan joq.
Tömendegi mümkindikter üşin eşqandaý xat jiberilmeýdi.',
'noemailprefs'               => 'Osı mümkindikter istewi üşin e-poşta jaýıñızdı engiziñiz.',
'emailconfirmlink'           => 'E-poşta jaýıñızdı quptañız',
'invalidemailaddress'        => 'Osı e-poşta jaýda jaramsız pişim bolğan, qabıl etilmeýdi.
Durıs pişimdelgen jaýdı engiziñiz, ne awmaqtı bos qaldırıñız.',
'accountcreated'             => 'Tirkelgi jaratıldı',
'accountcreatedtext'         => '$1 üşin qatıswşı tirkelgisi jaratıldı.',
'createaccount-title'        => '{{SITENAME}} üşin tirkelw',
'createaccount-text'         => 'Keýbirew ($1) {{SITENAME}} jobasında $2 üşin tirkelgen ($4).
«$2» degenniñ qupïya sözi — «$3». Qazir kiriñiz de qupïya söziñizdi
özgertiñiz

Eger osı tirkelgi qatelikpen jaratılsa, bul xabarğa elemewiñiz mümkin.',
'loginlanguagelabel'         => 'Til: $1',

# Password reset dialog
'resetpass'               => 'Tirkelginiñ qupïya sözin özgertw',
'resetpass_announce'      => 'Xatpen jiberilgen waqıtşa belgilememen kiripsiz. Tirkelwdi bitirw üşin jaña qupïya söziñizdi mında engiziñiz:',
'resetpass_header'        => 'Qupïya sözdi özgertw',
'resetpass_submit'        => 'Qupïya sözdi qoýıñız da kiriñiz',
'resetpass_success'       => 'Qupïya söziñiz sätti özgertildi! Endi kiriñiz…',
'resetpass_bad_temporary' => 'Waqıtşa qupïya söz jaramsız. Mümkin qupïya söziñizdi aldaqaşan sätti özgertken bolarsız nemese jaña waqıtşa qupïya sözin suratılğansız.',
'resetpass_forbidden'     => '{{SITENAME}} jobasında qupïya sözder özgertilmeýdi',
'resetpass_missing'       => 'Eş pişin derekteri joq.',

# Edit page toolbar
'bold_sample'     => 'Jwan mätin',
'bold_tip'        => 'Jwan mätin',
'italic_sample'   => 'Qïğaş mätin',
'italic_tip'      => 'Qïğaş mätin',
'link_sample'     => 'Silteme atawı',
'link_tip'        => 'İşki silteme',
'extlink_sample'  => 'http://www.example.com silteme atawı',
'extlink_tip'     => 'Sırtqı silteme (aldınan http:// engizwin umıtpañız)',
'headline_sample' => 'Bas jol mätini',
'headline_tip'    => '2-şi deñgeýli bas jol',
'math_sample'     => 'Formwlanı mında engiziñiz',
'math_tip'        => 'Matematïka formwlası (LaTeX)',
'nowiki_sample'   => 'Pişimdelmeýtin mätindi osında engiziñiz',
'nowiki_tip'      => 'Wïkï pişimin elemew',
'image_tip'       => 'Endirilgen swret',
'media_tip'       => 'Taspa faýlınıñ siltemesi',
'sig_tip'         => 'Qoltañbañız jäne waqıt belgisi',
'hr_tip'          => 'Dereleý sızıq (ünemdi qoldanıñız)',

# Edit pages
'summary'                   => 'Sïpattaması',
'subject'                   => 'Taqırıbı/bas jolı',
'minoredit'                 => 'Bul şağın tüzetw',
'watchthis'                 => 'Betti baqılaw',
'savearticle'               => 'Betti saqta!',
'preview'                   => 'Qarap şığw',
'showpreview'               => 'Qarap şıq',
'showlivepreview'           => 'Twra qarap şıq',
'showdiff'                  => 'Özgeristerdi körset',
'anoneditwarning'           => "'''Qulaqtandırw:''' Siz jüýege kirmegensiz. IP jaýıñız bul bettiñ öñdew tarïxında jazılıp alınadı.",
'missingsummary'            => "'''Eskertpe:''' Tüzetw sïpattamasın engizbepsiz. «Saqtaw» tüýmesin tağı bassañız, tüzetwiñiz mändemesiz saqtaladı.",
'missingcommenttext'        => 'Tömende mändemeñizdi engiziñiz.',
'missingcommentheader'      => "'''Eskertpe:''' Bul mändemege taqırıp/basjol jetistirmepsiz. Eger tağı da Saqtaw tüýmesin nuqısañız, tüzetwiñiz solsız saqtaladı.",
'summary-preview'           => 'Sïpattamasın qarap şığw',
'subject-preview'           => 'Taqırıbın/bas jolın qarap şığw',
'blockedtitle'              => 'Qatıswşı buğattalğan',
'blockedtext'               => "<big>'''Qatıswşı atıñız ne IP jaýıñız buğattalğan.'''</big>

Osı buğattawdı $1 istegen. Keltirilgen sebebi: ''$2''.

* Buğattaw bastalğanı: $8
* Buğattaw bitetini: $6
* Buğattaw maqsatı: $7

Osı buğattawdı talqılaw üşin $1 degenmen, ne basqa [[{{{{ns:mediawiki}}:grouppage-sysop}}|äkimşimen]] qatınaswıñızğa boladı.
[[{{ns:special}}:Preferences|Tirkelgi baptawların]] qoldanıp jaramdı e-poşta jaýın engizgenşe deýin jäne bunı paýdalanwı 
buğattalmağanşa deýin «Qatıswşığa xat jazw» mümkindigin qoldana almaýsız.
Ağımdıq IP jaýıñız: $3, jäne buğataw nömiri: $5. Sonıñ birewin, nemese ekewin de ärbir suranımıñızğa kiristiriñiz.",
'autoblockedtext'           => "$1 degen burın basqa qatıswşı paýdalanğan bolğasın osı IP jaýıñız özdiktik buğattalğan.
Keltirilgen sebebi:

:''$2''

* Buğattaw bastalğanı: $8
* Buğattaw bitetini: $6

Osı buğattawdı talqılaw üşin $1 degenmen,
ne basqa [[{{{{ns:mediawiki}}:grouppage-sysop}}|äkimşimen]] qatınaswıñızğa boladı.

Añğartpa: [[{{ns:special}}:Preferences|Tirkelgi baptawların]] qoldanıp jaramdı e-poşta jaýın engizgenşe 
deýin jäne bunı paýdalanwı buğattalmağanşa deýin «Qatıswşığa xat jazw» mümkindigin qoldana almaýsız. 

Buğataw nömiriñiz: $5. Bul nömirdi ärbir suranımıñızğa kiristiriñiz.",
'blockednoreason'           => 'eş sebebi keltirilmegen',
'blockedoriginalsource'     => "'''$1''' degenniñ qaýnarı 
tömende körsetiledi:",
'blockededitsource'         => "'''$1''' degenge jasalğan '''tüzetwleriñizdiñ''' mätini tömende körsetiledi:",
'whitelistedittitle'        => 'Öñdew üşin kirwiñiz jön.',
'whitelistedittext'         => 'Betterdi öñdew üşin $1 jön.',
'whitelistreadtitle'        => 'Oqw üşin kirwiñiz jön',
'whitelistreadtext'         => 'Betterdi oqw üşin [[{{ns:special}}:Userlogin|kirwiñiz]] jön.',
'whitelistacctitle'         => 'Tirkelwiñizge ruqsat berilmegen',
'whitelistacctext'          => '{{SITENAME}} jobasına tirkelwge üşin [[{{ns:special}}:Userlogin|kirwiñiz]] kerek jäne janasımdı ruqsattarıñız bolw kerek.',
'confirmedittitle'          => 'E-poşta jaýın quptaw xatı qaýta öñdelwi kerek',
'confirmedittext'           => 'Betterdi öñdew üşin aldın ala E-poşta jaýıñızdı quptawıñız kerek. Jaýıñızdı [[{{ns:special}}:Preferences|qatıswşı baptawı]] arqılı qoýıñız da jaramdılığın tekserip şığıñız.',
'nosuchsectiontitle'        => 'Bundaý bölim joq',
'nosuchsectiontext'         => 'Joq bölimdi öñdewdi talap etipsiz. Mında $1 degen bölim joq eken, öñdewleriñizdi saqtaw üşin orın joq.',
'loginreqtitle'             => 'Kirwiñiz kerek',
'loginreqlink'              => 'kirw',
'loginreqpagetext'          => 'Basqa betterdi körw üşin siz $1 bolwıñız kerek.',
'accmailtitle'              => 'Qupïya söz jiberildi.',
'accmailtext'               => '$2 jaýına «$1» qupïya sözi jiberildi.',
'newarticle'                => '(Jaña)',
'newarticletext'            => 'Siltemege erip äli bastalmağan betke kelipsiz.
Betti bastaw üşin, tömendegi awmaqta mätiniñizdi teriñiz
(köbirek aqparat üşin [[{{{{ns:mediawiki}}:helppage}}|anıqtama betin]] qarañız).
Eger jañılğannan osında kelgen bolsañız, şolğışıñız «Artqa» degen batırmasın nuqıñız.',
'anontalkpagetext'          => "----''Bul tirkelgisiz (nemese tirkelgisin qoldanbağan) qatıswşı talqılaw beti. Osı qatıswşını biz tek sandıq IP jaýımen teñdestiremiz. Osındaý IP jaýlar birneşe qatıswşığa ortaq bolwı mümkin. Eger siz tirkelgisiz qatıswşı bolsañız jäne sizge qatıssız mändemeler jiberilgenin sezseñiz, basqa tirkelgisiz qatıswşılarmen aralastırmawı üşin [[{{ns:special}}:Userlogin|tirkeliñiz ne kiriñiz]].''",
'noarticletext'             => 'Bul bette ağımda eş mätin joq, basqa betterden osı bet atawın [[{{ns:special}}:Search/{{PAGENAME}}|izdep körwiñizge]] nemese osı betti [{{fullurl:{{FULLPAGENAME}}|action=edit}} tüzetwiñizge] boladı.',
'userpage-userdoesnotexist' => '«$1» qatıswşı tirkelgisi jazıp alınbağan. Bul betti bastaw/öñdew talabıñızdı tekserip şığıñız.',
'clearyourcache'            => "'''Añğartpa:''' Saqtağannan keýin özgeristerdi körw üşin şolğış qosalqı qaltasın bosatw keregi mümkin. '''Mozilla  / Safari:''' ''Shift'' pernesin basıp turıp ''Reload'' (''Qaýta jüktew'') batırmasın nuqıñız (ne ''Ctrl-Shift-R'' basıñız); ''IE:'' ''Ctrl-F5'' basıñız; '''Opera / Konqueror''' ''F5'' pernesin basıñız.",
'usercssjsyoucanpreview'    => '<strong>Basalqı:</strong> Saqtaw aldında jaña CSS/JS faýlın tekserw üşin «Qarap şığw» batırmasın qoldanıñız.',
'usercsspreview'            => "'''Mınaw CSS mätinin tek qarap şığw ekenin umıtpañız, ol äli saqtalğan joq!'''",
'userjspreview'             => "'''Mınaw JavaScript qatıswşı bağdarlamasın tekserw/qarap şığw ekenin umıtpañız, ol äli saqtalğan joq!'''",
'userinvalidcssjstitle'     => "'''Qulaqtandırw:''' Bul «$1» degen bezendirw mäneri emes. Qatıswşınıñ .css jäne .js faýl atawı kişi äripppen jazılw tïisti ekenin umıtpañız, mısalğa {{ns:user}}:Foo/monobook.css degendi {{ns:user}}:Foo/Monobook.css degenmen salıstırıp qarañız.",
'updated'                   => '(Jañartılğan)',
'note'                      => '<strong>Añğartpa:</strong>',
'previewnote'               => '<strong>Mınaw tek qarap şığw ekenin umıtpañız; tüzetwler äli saqtalğan joq!</strong>',
'previewconflict'           => 'Bul qarap şığw joğarıdağı öñdew awmağındağı mätinge saqtağan kezindegi deý ıqpal etedi.',
'session_fail_preview'      => '<strong>Ğafw etiñiz! Sessïya derekteri ısırap qalğandıqtan öñdewiñizdi jöndeý almaýmız.
Qaýta baýqap köriñiz. Eger bul äli istemese, şığwdı jäne qaýta kirwdi baýqap köriñiz.</strong>',
'session_fail_preview_html' => "<strong>Ğafw etiñiz! Sessïya derekteri ısırap qalğandıqtan öñdewiñizdi jöndeý almaýmız.</strong>

''{{SITENAME}} jobasında qam HTML qosılğan, JavaScript şabwıldardan qorğanw üşin aldın ala qarap şığw jasırılğan.''

<strong>Eger bul öñdew adal talap bolsa, qaýta baýqap köriñiz. Eger bul äli istemese, şığwdı jäne qaýta kirwdi baýqap köriñiz.</strong>",
'token_suffix_mismatch'     => '<strong>Tüzetwiñiz taýdırıldı, sebebi tutınğışıñız öñdew nışanında 
emle tañbaların keskilep tastadı. Bet mätini bülinbew üşin tüzetwiñiz taýdırıladı.
Bul ğalamtorğa negizdelingen qate tolğan tirkelwi joq proksï-serverdi paýdalanğan bolwı mümkin.</strong>',
'editing'                   => 'Öñdelwde: $1',
'editinguser'               => 'Öñdelwde: <b>$1</b> degen qatıswşı',
'editingsection'            => 'Öñdelwde: $1 (bölimi)',
'editingcomment'            => 'Öñdelwde: $1 (mändemesi)',
'editconflict'              => 'Öñdew qaqtığısı: $1',
'explainconflict'           => 'Osı betti siz öñdeý bastağanda basqa birew betti özgertken.
Joğarğı awmaqta bettiñ ağımdıq mätini bar.
Tömengi awmaqta siz özgertken mätini körsetiledi.
Özgertwiñizdi ağımdıq mätinge üstewiñiz jön.
"Betti saqta!" tüýmesine basqanda
<b>tek</b> joğarğı awmaqtağı mätin saqtaladı.<br />',
'yourtext'                  => 'Mätiniñiz',
'storedversion'             => 'Saqtalğan nusqası',
'nonunicodebrowser'         => '<strong>QULAQTANDIRW: Şolğışıñız Unicode belgilewine üýlesimdi emes, sondıqtan latın emes äripteri bar betterdi öñdew zil bolw mümkin. Jumıs istewge ıqtïmaldıq berw üşin, tömengi öñdew awmağında ASCII emes äripter onaltılıq sanımen körsetiledi</strong>.',
'editingold'                => '<strong>QULAQTANDIRW: Osı bettiñ erterek nusqasın
öñdep jatırsız.
Bunı saqtasañız, osı nwsqadan soñğı barlıq özgerister joýıladı.</strong>',
'yourdiff'                  => 'Aýırmalar',
'copyrightwarning'          => 'Añğartpa: {{SITENAME}} jobasına berilgen barlıq ülester $2 (köbirek aqparat üşin: $1) qujatına saý dep sanaladı. Eger jazwıñızdıñ erkin tüzetilwin jäne aqısız köpşilikke taratwın qalamasañız, mında jarïyalamawıñız jön.<br />
Tağı da, bul mağlumat öziñiz jazğanıñızğa, ne qoğam qazınasınan nemese sondaý aşıq qaýnarlardan köşirilgenine bizge wäde beresiz.
<strong>AWTORLIQ QUQIQPEN QORĞAWLI MAĞLUMATTI RUQSATSIZ JARÏYALAMAÑIZ!</strong>',
'copyrightwarning2'         => 'Añğartpa: {{SITENAME}} jobasına berilgen barlıq ülesterdi basqa üleskerler tüzetwge, özgertwge, ne alastawğa mümkin. Eger jazwıñızdıñ erkin tüzetilwin qalamasañız, mında jarïyalamawıñız jön.<br />
Tağı da, bul mağlumat öziñiz jazğanıñızğa, ne qoğam qazınasınan nemese sondaý aşıq qaýnarlardan köşirilgenine bizge wäde beresiz
(köbirek aqparat üşin $1 qwjatın qarañız).
<strong>AWTORLIQ QUQIQPEN QORĞAWLI MAĞLUMATTI RUQSATSIZ JARÏYALAMAÑIZ!</strong>',
'longpagewarning'           => '<strong>QULAQTANDIRW: Bul bettiñ mölşeri — $1 KB; keýbir
şolğıştarda bet mölşeri 32 KB jetse ne onı assa öñdew kürdeli bolwı mümkin.
Betti birneşe kişkin bölimderge bölip köriñiz.</strong>',
'longpageerror'             => '<strong>QATELİK: Jiberetin mätiniñizdin mölşeri — $1 KB, eñ köbi $2 KB
ruqsat etilgen mölşerinen asqan. Bul saqtaý alınbaýdı.</strong>',
'readonlywarning'           => '<strong>QULAQTANDIRW: Derekqor jöndetw üşin qulıptalğan,
sondıqtan däl qazir tüzetwiñizdi saqtaý almaýsız. Sosın qoldanwğa üşin mätäniñizdi köşirip,
öz kompüteriñizde faýlğa saqtañız.</strong>',
'protectedpagewarning'      => '<strong>QULAQTANDIRW: Bul bet qorğalğan. Tek äkimşi ruqsatı bar qatıswşılar öñdew jasaý aladı.</strong>',
'semiprotectedpagewarning'  => "'''Añğartpa:''' Bet jartılaý qorğalğan, sondıqtan osını tek tirkelgen qatıswşılar öñdeý aladı.",
'cascadeprotectedwarning'   => "'''Qulaqtandırw''': Bul bet qulıptalğan, endi tek äkimşi quqıqtarı bar qatıswşılar bunı öñdeý aladı.Bunıñ sebebi: bul bet «bawlı qorğawı» bar kelesi {{PLURAL:$1|betke|betterge}} kiristirilgen:",
'titleprotectedwarning'     => '<strong>QULAQTANDIRW:  Bul bet qulıptalğan, sondıqtan tek birqatar qatıswşılar bunı jarata aladı.</strong>',
'templatesused'             => 'Bul bette qoldanılğan ülgiler:',
'templatesusedpreview'      => 'Bunı qarap şığwğa qoldanılğan ülgiler:',
'templatesusedsection'      => 'Bul bölimde qoldanılğan ülgiler:',
'template-protected'        => '(qorğalğan)',
'template-semiprotected'    => '(jartılaý qorğalğan)',
'nocreatetitle'             => 'Betti bastaw şektelgen',
'nocreatetext'              => '{{SITENAME}} jobasında jaña bet bastawı şektelgen.
Keri qaýtıp bar betti öñdewiñizge boladı, nemese [[{{ns:special}}:Userlogin|kirwiñizge ne tirkelwiñizge]] boladı.',
'nocreate-loggedin'         => '{{SITENAME}} jobasında jaña bet bastaw ruqsatıñız joq.',
'permissionserrors'         => 'Ruqsattar qateleri',
'permissionserrorstext'     => 'Bunı istewge ruqsatıñız joq, kelesi {{PLURAL:$1|sebep|sebepter}} boýınşa:',
'recreate-deleted-warn'     => "'''Qulaqtandırw: Aldında joýılğan betti qaýta bastaýın dep tursız.'''

Mına bet öñdewin jalğastırw üşin jarastığın tekserip şığwıñız jön.
Qolaýlı bolwı üşin bul bettiñ joyw jwrnalı keltirilgen:",

# "Undo" feature
'undo-success' => 'Bul tüzetw joqqa şığarılwı mümkin. Talabıñızdı bilip turıp aldın ala tömendegi salıstırwdı tekserip şığıñız da, tüzetwdiñ joqqa şığarwın bitirw üşin tömendegi özgeristerdi saqtañız.',
'undo-failure' => 'Bul tüzetw joqqa şığarılmaýdı, sebebi arada qaqtığıs jasaýtın tüzetwler bar.',
'undo-summary' => '[[{{ns:special}}:Contributions/$2|$2]] ([[User_talk:$2|talqılawı]]) istegen nömir $1 nusqasın joqqa şığardı',

# Account creation failure
'cantcreateaccounttitle' => 'Tirkelgi jaratılmadı',
'cantcreateaccount-text' => "Bul IP jaýdan (<b>$1</b>) tirkelwin [[User:$3|$3]] buğattağan.

$3 keltirilgen sebebi: ''$2''",

# History pages
'viewpagelogs'        => 'Osı betke qatıstı jwrnaldardı qaraw',
'nohistory'           => 'Osı bettiniñ nusqalar tarïxı joq.',
'revnotfound'         => 'Nusqa tabılmadı',
'revnotfoundtext'     => 'Osı suranısqan bettiñ eski nusqası tabılğan joq. Osı betti aşwğa paýdalanğan URL jaýın qaýta tekserip şığıñız.',
'loadhist'            => 'Bet tarïxı jüktelwde',
'currentrev'          => 'Ağımdıq nusqası',
'revisionasof'        => '$1 kezindegi nusqası',
'revision-info'       => '$1 kezindegi $2 jasağan nusqası',
'previousrevision'    => '← Eskilew nusqası',
'nextrevision'        => 'Jañalaw nusqası →',
'currentrevisionlink' => 'Ağımdıq nusqası',
'cur'                 => 'ağım.',
'next'                => 'kel.',
'last'                => 'soñ.',
'orig'                => 'tüpn.',
'page_first'          => 'alğaşqısına',
'page_last'           => 'soñğısına',
'histlegend'          => 'Aýırmasın bölektew: salıstıramın degen nusqalardı aýırıp-qosqışpen belgilep jäne de <Enter> pernesin basıñız, nemese astındağı batırmanı nuqıñız.<br />
Şarttı belgiler: (ağım.) = ağımdıq nusqamen aýırması,
(soñ.) = aldıñğı nusqamen aýırması, ş = şağın tüzetw',
'deletedrev'          => '[joýılğan]',
'histfirst'           => 'Eñ alğaşqısına',
'histlast'            => 'Eñ soñğısına',
'historysize'         => '({{PLURAL:$1|1|$1}} baýt)',
'historyempty'        => '(bos)',

# Revision feed
'history-feed-title'          => 'Nusqa tarïxı',
'history-feed-description'    => 'Mına wïkïdegi bul bettiñ nusqa tarïxı',
'history-feed-item-nocomment' => '$2 kezindegi $1 degen', # user at time
'history-feed-empty'          => 'Suratılğan bet joq boldı.
Ol mına wïkïden joýılğan, nemese atawı awıstırılğan.
Osığan qatıstı jaña betterdi [[{{ns:special}}:Search|bul wïkïden izdewdi]] baýqap köriñiz.',

# Revision deletion
'rev-deleted-comment'         => '(mändeme alastaldı)',
'rev-deleted-user'            => '(qatıswşı atı alastaldı)',
'rev-deleted-event'           => '(jazba alastaldı)',
'rev-deleted-text-permission' => '<div class="mw-warning plainlinks">
Osı bettiñ nusqası jarïya murağattarınan alastalğan.
Bul jaýtqa [{{fullurl:{{ns:special}}:Log/delete|page={{FULLPAGENAMEE}}}} joyw jwrnalında] egjeý-tegjeý mälimetteri bolwı mümkin.
</div>',
'rev-deleted-text-view'       => '<div class="mw-warning plainlinks">
Osı bettiñ nusqası jarïya murağattarınan alastalğan.
{{SITENAME}} äkimşisi bop sonı köre alasız;
[{{fullurl:{{ns:special}}:Log/delete|page={{FULLPAGENAMEE}}}} joyw jwrnalında] egjeý-tegjeý mälmetteri bolwı mümkin.
</div>',
'rev-delundel'                => 'körset/jasır',
'revisiondelete'              => 'Nusqalardı joyw/joywdı boldırmaw',
'revdelete-nooldid-title'     => 'Nısana nusqası joq',
'revdelete-nooldid-text'      => 'Osı äreketti orındaw üşin aqırğı nusqasınne nusqaların engizbepsiz.',
'revdelete-selected'          => "'''$1:''' degenniñ bölektengen {{PLURAL:$2|nusqası|nusqaları}}:",
'logdelete-selected'          => "'''$1:''' degenniñ bölektengen jwrnal {{PLURAL:$2|oqïğası|oqïğaları}}:",
'revdelete-text'              => 'Joýılğan nusqalar men jazbalardı äli de bet tarïxında jäne jwrnaldarda tabwğa boladı,
biraq olardıñ mağlumat bölşekteri barşağa qatınalmaýdı.

{{SITENAME}} jobasınıñ basqa äkimşileri jasırın mağlumatqa qatınaý aladı, jäne qosımşa tïımdar
qoýılğanşa deýin, osı tildesw arqılı joywdı boldırmawı mümkin.',
'revdelete-legend'            => 'Tïımdardı qoyw:',
'revdelete-hide-text'         => 'Nusqa mätinin jasır',
'revdelete-hide-name'         => 'Äreket pen maqsatın jasır',
'revdelete-hide-comment'      => 'Tüzetw mändemesin jasır',
'revdelete-hide-user'         => 'Öñdewşi atın (IP jaýın) jasır',
'revdelete-hide-restricted'   => 'Osı tïımdardı barşağa sïyaqtı äkimşilerge de qoldanw',
'revdelete-suppress'          => 'Äkimşiler jasağan mağlumattı basqalarşa perdelew',
'revdelete-hide-image'        => 'Faýl mağlumatın jasır',
'revdelete-unsuppress'        => 'Qalpına keltirilgen nusqalardan tïımdardı alastaw',
'revdelete-log'               => 'Jwrnal mändemesi:',
'revdelete-submit'            => 'Bölektengen nusqağa qoldanw',
'revdelete-logentry'          => '[[$1]] degenniñ nusqa körinisin özgertti',
'logdelete-logentry'          => '[[$1]] degenniñ jazba körinisin özgertti',
'revdelete-logaction'         => '{{PLURAL:$1|1|$1}} nusqanı $2 küýine qoýdı',
'logdelete-logaction'         => '[[$3]] degenge {{PLURAL:$1|1|$1}} oqïğanı $2 küýine qoýdı',
'revdelete-success'           => 'Nusqa körinisi sätti qoýıldı.',
'logdelete-success'           => 'Jazba körinisi sätti qoýıldı.',

# Oversight log
'oversightlog'    => 'Nusqa jasırw jwrnalı',
'overlogpagetext' => 'Tömende äkimşilerden jasırılğan mağlumatqa ıqpal etetin jwıqtağı bolğan joyw jäne buğattaw
tizimi beriledi. Ağımdağı amaldı buğattaw men tïım üşin [[{{ns:special}}:Ipblocklist|IP buğattaw tizimin]] qarañız.',

# History merging
'mergehistory'                     => 'Better tarïxın biriktirw',
'mergehistory-header'              => "Bul bet arqılı bir qaýnar bettiñ nusqalar tarïxın jaña betke biriktirwge mümkindik beredi.
Osı özgeris bettiñ tarïxï jalğastırwşılığın qoştaýtınına köziñiz jetsin.

'''Eñ keminde qaýnar betiniñ ağımdıq nusqası qalw kerek.'''",
'mergehistory-box'                 => 'Eki bettiñ nusqaların biriktirw:',
'mergehistory-from'                => 'Qaýnar beti:',
'mergehistory-into'                => 'Nısana beti:',
'mergehistory-list'                => 'Biriktirletin tüzetw tarïxı',
'mergehistory-merge'               => '[[:$1]] degenniñ kelesi nusqaları [[:$2]] degenge biriktirilwine mümkin. Biriktirwge tek engizilgen waqıtqa deýin jasalğan nusqalardı aýırıp-qosqış bağandı qoldanıñız. Añğartpa: bağıttaw siltemelerin qoldanğanda bul bağan qaýta qoýıladı.',
'mergehistory-go'                  => 'Biriktirletin tüzetwlerdi körset',
'mergehistory-submit'              => 'Nusqalardı biriktirw',
'mergehistory-empty'               => 'Eş nusqalar biriktirilmeýdi',
'mergehistory-success'             => '[[:$1]] degenniñ $3 nusqası [[:$2]] degenge sätti biriktirildi.',
'mergehistory-fail'                => 'Tarïx biriktirwi orındalmadı, bet pen waqıt baptalımdarın qaýta tekserip şığıñız.',
'mergehistory-no-source'           => '$1 degen qaýnar beti joq.',
'mergehistory-no-destination'      => '$1 degen nısana beti joq.',
'mergehistory-invalid-source'      => 'Qaýnar betinde jaramdı ataw bolwı kerek.',
'mergehistory-invalid-destination' => 'Nısana betinde jaramdı ataw bolwı kerek.',

# Merge log
'mergelog'           => 'Biriktirw jwrnalı',
'pagemerge-logentry' => '[[$1]] degen [[$2]] degenge biriktirildi ($3 deýingi nusqaları)',
'revertmerge'        => 'Biriktirwdi boldırmaw',
'mergelogpagetext'   => 'Tömende bir bettiñ tarïxı basqa betke eñ soñğı biriktirw tizimi keltiriledi.',

# Diffs
'history-title'           => '«$1» nusqa tarïxı',
'difference'              => '(Nusqalar arasındağı aýırmaşılıq)',
'lineno'                  => 'Jol nömiri $1:',
'compareselectedversions' => 'Bölektengen nusqalardı salıstırw',
'editundo'                => 'joqqa şığarw',
'diff-multi'              => '(Aradağı {{PLURAL:$1|bir|$1}} nusqa körsetilmegen.)',

# Search results
'searchresults'         => 'İzdestirw nätïjeleri',
'searchresulttext'      => '{{SITENAME}} jobasında izdestirw twralı köbirek aqparat üşin, [[{{{{ns:mediawiki}}:helppage}}|{{int:help}}]] qarañız.',
'searchsubtitle'        => "İzdestirw suranısıñız: '''[[:$1]]'''",
'searchsubtitleinvalid' => "İzdestirw suranısıñız: '''$1'''",
'noexactmatch'          => "'''Osında «$1» atawlı bet joq.''' Bul betti öziñiz [[:$1|bastaý alasız]].",
'noexactmatch-nocreate' => "'''Osında «$1» atawlı bet joq.'''",
'titlematches'          => 'Bet atawı säýkesi',
'notitlematches'        => 'Eş bet atawı säýkes emes',
'textmatches'           => 'Bet mätiniñ säýkesi',
'notextmatches'         => 'Eş bet mätini säýkes emes',
'prevn'                 => 'aldıñğı $1',
'nextn'                 => 'kelesi $1',
'viewprevnext'          => 'Körsetilwi: ($1) ($2) ($3) jazba',
'showingresults'        => "Tömende nömir '''$2''' ornınan bastap, jetkenşe {{PLURAL:$1|'''1'''|'''$1'''}} nätïje körsetilgen.",
'showingresultsnum'     => "Tömende nömir '''$2''' ornınan bastap {{PLURAL:$3|'''1'''|'''$3'''}} nätïje körsetilgen.",
'nonefound'             => "'''Añğartpa''': Tabw sätsiz bitwi jïi «bolğan» jäne «degen» sïyaqtı
tizimdelmeýtin jalpı sözdermen izdestirwden bolwı mümkin,
nemese birden artıq izdestirw şart sözderin egizgennen (nätïjelerde tek
barlıq şart sözder kedesse körsetiledi) bolwı mümkin.",
'powersearch'           => 'İzdew',
'powersearchtext'       => 'Mına esim ayalarda izdew:<br />$1<br />$2 Aýdatwlardı tizimdew<br />İzdestirw suranımı: $3 $9',
'searchdisabled'        => '{{SITENAME}} izdew qızmeti öşirilgen. Äzirşe Google arqılı izdewge boladı. Añğartpa: {{SITENAME}} mağlumatın tizimidewleri eskirgen bolwğa mümkin.',

# Preferences page
'preferences'              => 'Baptaw',
'mypreferences'            => 'Baptawım',
'prefs-edits'              => 'Tüzetw sanı:',
'prefsnologin'             => 'Kirmegensiz',
'prefsnologintext'         => 'Baptawıñızdı qoyw üşin [[{{ns:special}}:Userlogin|kirwiñiz]] tïisti.',
'prefsreset'               => 'Baptaw arqawdan qaýta qoýıldı.',
'qbsettings'               => 'Mäzir',
'qbsettings-none'          => 'Eşqandaý',
'qbsettings-fixedleft'     => 'Solğa bekitilgen',
'qbsettings-fixedright'    => 'Oñğa bekitilgen',
'qbsettings-floatingleft'  => 'Solğa qalqığan',
'qbsettings-floatingright' => 'Oñğa qalqığan',
'changepassword'           => 'Qupïya sözdi özgertw',
'skin'                     => 'Bezendirw',
'math'                     => 'Matematïka',
'dateformat'               => 'Kün-aý pişimi',
'datedefault'              => 'Eş qalawsız',
'datetime'                 => 'Waqıt',
'math_failure'             => 'Öñdetw sätsiz bitti',
'math_unknown_error'       => 'belgisiz qate',
'math_unknown_function'    => 'belgisiz fwnkcïya',
'math_lexing_error'        => 'leksïka qatesi',
'math_syntax_error'        => 'sïntaksïs qatesi',
'math_image_error'         => 'PNG awdarısı sätsiz bitti; latex, dvips, gs jäne convert bağdarlamalarınıñ durıs ornatwın tekserip şığıñız',
'math_bad_tmpdir'          => 'Matematïkanıñ waqıtşa qaltasına jazılmadı, ne qalta jaratılmadı',
'math_bad_output'          => 'Matematïkanıñ beris qaltasına jazılmadı, ne qalta jaratılmadı',
'math_notexvc'             => 'texvc bağdarlaması joğaltılğan; baptaw üşin math/README qujatın qarañız.',
'prefs-personal'           => 'Jeke derekteri',
'prefs-rc'                 => 'Jwıqtağı özgerister',
'prefs-watchlist'          => 'Baqılaw',
'prefs-watchlist-days'     => 'Baqılaw tiziminde körseterin eñ köp künderi:',
'prefs-watchlist-edits'    => 'Keñeýtilgen baqılaw tiziminde körseterin eñ köp tüzetwleri:',
'prefs-misc'               => 'Qosımşa',
'saveprefs'                => 'Saqta',
'resetprefs'               => 'Qaýta qoý',
'oldpassword'              => 'Ağımdıq qupïya söz:',
'newpassword'              => 'Jaña qupïya söz:',
'retypenew'                => 'Jaña qupïya sözdi qaýtalañız:',
'textboxsize'              => 'Öñdew',
'rows'                     => 'Joldar:',
'columns'                  => 'Bağandar:',
'searchresultshead'        => 'İzdew',
'resultsperpage'           => 'Bet saýın nätïje sanı:',
'contextlines'             => 'Nätïje saýın jol sanı:',
'contextchars'             => 'Jol saýın ärip sanı:',
'stub-threshold'           => '<a href="#" class="stub">Biteme siltemesin</a> pişimdew tabaldırığı (baýt):',
'recentchangesdays'        => 'Jüıqtağı özgeristerdegi körsetiletin künder:',
'recentchangescount'       => 'Jwıqtağı özgeristerdegi körsetiletin tüzetwler:',
'savedprefs'               => 'Baptawıñız saqtaldı.',
'timezonelegend'           => 'Waqıt beldewi',
'timezonetext'             => 'Jergilikti waqıtıñız ben server waqıtınıñ (UTC) arasındağı sağat sanı.',
'localtime'                => 'Jergilikti waqıt',
'timezoneoffset'           => 'Iğıstırw¹',
'servertime'               => 'Server waqıtı',
'guesstimezone'            => 'Şolğıştan alıp toltırw',
'allowemail'               => 'Basqadan xat qabıldawın qos',
'defaultns'                => 'Mına esim ayalarda ädepkiden izdew:',
'default'                  => 'ädepki',
'files'                    => 'Faýldar',

# User rights
'userrights-lookup-user'           => 'Qatıswşı toptarın rettew',
'userrights-user-editname'         => 'Qatıswşı atın engiziñiz:',
'editusergroup'                    => 'Qatıswşı toptarın öñdew',
'userrights-editusergroup'         => 'Qatıswşı toptarın öñdew',
'saveusergroups'                   => 'Qatıswşı toptarın saqtaw',
'userrights-groupsmember'          => 'Müşeligi:',
'userrights-groupsremovable'       => 'Alastalatın toptar:',
'userrights-groupsavailable'       => 'Jetimdi toptar:',
'userrights-groupshelp'            => 'Qatıswşını topqa üsteýmin ne toptan alastaýmın degen toptardı bölekteñiz. Bölektenbegen toptar özgertilimeýdi. Toptardıñ bölektewin CTRL + Sol jaq nuqwmen öşirwiñizge boladı.',
'userrights-reason'                => 'Özgertw sebebi:',
'userrights-available-none'        => 'Top müşeligin özgerte almaýsız.',
'userrights-available-add'         => 'Qatıswşılardı mına {{PLURAL:$2|topqa|toptarğa}} üsteý alasız: $1.',
'userrights-available-remove'      => 'Qatıswşılardı mına {{PLURAL:$2|toptan|toptardan}} alastaý alasız: $1.',
'userrights-available-add-self'    => 'Öziñizdi mına {{PLURAL:$2|topqa|toptarğa}} üsteý alasız: $1.',
'userrights-available-remove-self' => 'Öziñizdi mına {{PLURAL:$2|toptan|toptardan}} alastaý alasız: $1.',
'userrights-no-interwiki'          => 'Basqa wïkïlerdegi paýdalanwşı quqıqtarın öñdewge ruqsatıñız joq.',
'userrights-nodatabase'            => '$1 derekqorı joq ne jergilikti emes.',
'userrights-nologin'               => 'Qatıswşı quqıqtarın tağaýındaw üşin äkimşi tirkelgisimen [[{{ns:special}}:Userlogin|kirwiñiz]] jön.',
'userrights-notallowed'            => 'Qatıswşı quqıqtarın tağaýındaw üşin tirkelgiñizde ruqsat joq.',

# Groups
'group'               => 'Top:',
'group-autoconfirmed' => 'Özi quptalğandar',
'group-bot'           => 'Bottar',
'group-sysop'         => 'Äkimşiler',
'group-bureaucrat'    => 'Bitikşiler',
'group-all'           => '(barlığı)',

'group-autoconfirmed-member' => 'özi quptalğan',
'group-bot-member'           => 'bot',
'group-sysop-member'         => 'äkimşi',
'group-bureaucrat-member'    => 'bitikşi',

'grouppage-autoconfirmed' => '{{ns:project}}:Özi quptalğandar',
'grouppage-bot'           => '{{ns:project}}:Bottar',
'grouppage-sysop'         => '{{ns:project}}:Äkimşiler',
'grouppage-bureaucrat'    => '{{ns:project}}:Bitikşiler',

# User rights log
'rightslog'      => 'Qatıswşı quqıqtarı jwrnalı',
'rightslogtext'  => 'Bul qatıswşı quqıqtarın özgertw jwrnalı.',
'rightslogentry' => '$1 top müşelgin $2 degennen $3 degenge özgertti',
'rightsnone'     => '(eşqandaý)',

# Recent changes
'nchanges'                          => '{{PLURAL:$1|1|$1}} özgeris',
'recentchanges'                     => 'Jwıqtağı özgerister',
'recentchangestext'                 => 'Bul bette osı wïkïdegi bolğan jwıqtağı özgerister baýqaladı.',
'recentchanges-feed-description'    => 'Bul arnamenen wïkïdegi eñ soñğı özgerister qadağalanadı.',
'rcnote'                            => "$3 kezine deýin — tömende soñğı {{PLURAL:$2|kündegi|'''$2''' kündegi}}, soñğı {{PLURAL:$1|'''1'''|'''$1'''}} özgeris körsetilgen.",
'rcnotefrom'                        => '<b>$2</b> kezinen beri — tömende özgerister <b>$1</b> deýin körsetilgen.',
'rclistfrom'                        => '$1 kezinen beri — jaña özgeristerdi körset.',
'rcshowhideminor'                   => 'Şağın tüzetwdi $1',
'rcshowhidebots'                    => 'Bottardı $1',
'rcshowhideliu'                     => 'Tirkelgendi $1',
'rcshowhideanons'                   => 'Tirkelgisizdi $1',
'rcshowhidepatr'                    => 'Küzettegi tüzetwlerdi $1',
'rcshowhidemine'                    => 'Tüzetwimdi $1',
'rclinks'                           => 'Soñğı $2 künde bolğan, soñğı $1 özgeristi körset<br />$3',
'diff'                              => 'aýırm.',
'hist'                              => 'tar.',
'hide'                              => 'jasır',
'show'                              => 'körset',
'minoreditletter'                   => 'ş',
'newpageletter'                     => 'J',
'number_of_watching_users_pageview' => '[baqılağan {{PLURAL:$1|1|$1}} qatıswşı]',
'rc_categories'                     => 'Sanattarğa şektew ("|" belgisimen bölikteñiz)',
'rc_categories_any'                 => 'Qaýsıbir',
'newsectionsummary'                 => '/* $1 */ jaña bölim',

# Recent changes linked
'recentchangeslinked'          => 'Qatıstı özgerister',
'recentchangeslinked-title'    => '$1 degenge qatıstı özgerister',
'recentchangeslinked-noresult' => 'Siltelgen betterde keltirilgen merzimde eşqandaý özgeris bolmağan.',
'recentchangeslinked-summary'  => "Bul arnaýı bette siltelgen betterdegi jwıqtağı özgerister tizimi beriledi. Baqılaw tizimiñizdegi better '''jwan''' ärbimen belgilenedi.",

# Upload
'upload'                      => 'Faýl qotarw',
'uploadbtn'                   => 'Qotar!',
'reupload'                    => 'Qaýtalap qotarw',
'reuploaddesc'                => 'Qotarw pişinine oralw.',
'uploadnologin'               => 'Kirmegensiz',
'uploadnologintext'           => 'Faýl qotarw üşin [[{{ns:special}}:Userlogin|kirwiñiz]] kerek.',
'upload_directory_read_only'  => 'Qotarw qaltasına ($1) jazwğa veb-serverge ruqsat berilmegen.',
'uploaderror'                 => 'Qotarw qatesi',
'uploadtext'                  => "Tömendegi pişin faýl qotarwğa qoldanıladı, aldındağı swretterdi qaraw üşin ne izdew üşin [[{{ns:special}}:Imagelist|qotarılğan faýldar tizimine]] barıñız, qotarw men joyw tağı da [[{{ns:special}}:Log/upload|qotarw jwrnalına]] jazılıp alınadı.

Swretti betke kiristirwge, faýlğa twra siltew üşin mına pişindegi siltemeni qoldanıñız:
'''<nowiki>[[</nowiki>{{ns:image}}<nowiki>:File.jpg]]</nowiki>''',
'''<nowiki>[[</nowiki>{{ns:image}}<nowiki>:File.png|balama mätin]]</nowiki>''' ne
'''<nowiki>[[</nowiki>{{ns:media}}<nowiki>:File.ogg]]</nowiki>'''.",
'upload-permitted'            => 'Ruqsat berigen faýl türleri: $1.',
'upload-preferred'            => 'Unamdı faýl türleri $1.',
'upload-prohibited'           => 'uqsat berilmegen faýl türleri: $1.',
'uploadlog'                   => 'qotarw jwrnalı',
'uploadlogpage'               => 'Qotarw jwrnalı',
'uploadlogpagetext'           => 'Tömende jwıqtağı qotarılğan faýl tizimi.',
'filename'                    => 'Faýl atı',
'filedesc'                    => 'Sïpattaması',
'fileuploadsummary'           => 'Sïpattaması:',
'filestatus'                  => 'Awtorlıq quqıqtarı küýi',
'filesource'                  => 'Faýl qaýnarı',
'uploadedfiles'               => 'Qotarılğan faýldar',
'ignorewarning'               => 'Qulaqtandırwğa eleme de faýldı ärqaýsı jolımen saqta.',
'ignorewarnings'              => 'Ärqaýsı qulaqtandırwlarğa eleme',
'minlength1'                  => 'Faýl atawında eñ keminde bir ärip bolwı kerek.',
'illegalfilename'             => '«$1» faýl atawında bet atawlarında ruqsat etilmegen nışandar bar. Faýldı qaýta atañız da bunı jwktedi qaýta baýqap köriñiz.',
'badfilename'                 => 'Faýldıñ atı «$1» bop özgertildi.',
'filetype-badmime'            => '«$1» degen MIME türi bar faýldardı qotarwğa ruqsat etilmeýdi.',
'filetype-unwanted-type'      => "'''«.$1»''' — kütilmegen faýl türi. Unamdı faýl türleri: $2.",
'filetype-banned-type'        => "'''«.$1»''' — ruqsattalmağan faýl türi. Ruqsattalğan faýl türleri: $2.",
'filetype-missing'            => 'Bul faýldıñ («.jpg» sïyaqtı) keñeýtimi joq.',
'large-file'                  => 'Faýldı $1 mölşerden aspawına tırısıñız; bul faýl mölşeri — $2.',
'largefileserver'             => 'Osı faýldıñ mölşeri serverdiñ qalawınan asıp ketken.',
'emptyfile'                   => 'Qotarılğan faýlıñız bos sïyaqtı. Bul faýl atawında qate bolwı mümkin. Osı faýldı şınaýı qotarğıñız keletin tekserip şığıñız.',
'fileexists'                  => 'Osılaý atalğan faýl aldaqaşan bar, eger bunı özgertwge senimiñiz joq bolsa <strong><tt>$1</tt></strong> degendi tekserip şığıñız.',
'filepageexists'              => 'Bılaý atalğan bet (swret emes) aldaqaşan bar, bunı özgertwge senimiñiz bolmasa <strong><tt>$1</tt></strong> degendi tekserip şığıñız.',
'fileexists-extension'        => 'Uqsastı faýl atawı bar boldı:<br />
Qotarılatın faýl atawı: <strong><tt>$1</tt></strong><br />
Bar bolğan faýl atawı: <strong><tt>$2</tt></strong><br />
Basqa ataw tañdañız.',
'fileexists-thumb'            => "<center>'''Bar bolğan swret'''</center>",
'fileexists-thumbnail-yes'    => 'Osı faýl — mölşeri kişiritilgen swret <i>(nobaý)</i> sïyaqtı. Bul <strong><tt>$1</tt></strong> degen faýldı sınap şığıñız.<br />
Eger sınalğan faýl tüpnusqalı mölşeri bar dälme-däl swret bolsa, qosısmşa nobaýdı qotarw kereki joq.',
'file-thumbnail-no'           => 'Faýl atawı <strong><tt>$1</tt></strong> degenmen bastaladı. Bul — mölşeri kişiritilgen swret <i>(nobaý)</i> sïyaqtı.
Eger tolıq ajıratılımdığı bar swretiñiz bolsa, sonı qotarıñız, äýtpese faýl atawın özgertiñiz.',
'fileexists-forbidden'        => 'Osılaý atalğan faýl aldaqaşan bar. Keri qaýtıñız da, jäne osı faýldı basqa atımen qotarıñız. [[{{ns:image}}:$1|thumb|center|$1]]',
'fileexists-shared-forbidden' => 'Osılaý atalğan faýl ortaq faýl arqawında aldaqaşan bar. Keri qaýtıñız da, osı faýldı jaña atımen qotarıñız. [[{{ns:image}}:$1|thumb|center|$1]]',
'successfulupload'            => 'Qotarw sätti ötti',
'uploadwarning'               => 'Qotarw twralı qulaqtandırwı',
'savefile'                    => 'Faýldı saqtaw',
'uploadedimage'               => '«[[$1]]» faýlın qotardı',
'overwroteimage'              => '«[[$1]]» faýlın jaña nusqasın qotardı',
'uploaddisabled'              => 'Faýl qotarwı öşirilgen',
'uploaddisabledtext'          => '{{SITENAME}} jobasında faýl qotarwı öşirilgen.',
'uploadscripted'              => 'Osı faýlda, veb şolğıştı ağat tüsindikke keltiretiñ HTML belgilew, ne skrïpt kodı bar.',
'uploadcorrupt'               => 'Osı faýl büldirilgen, ne burıs keñeýtimi bar. Faýldı tekserip, qotarwın qaýtalañız.',
'uploadvirus'                 => 'Osı faýlda vïrws bolwı mümkin! Egjeý-tegjeý aqparatı: $1',
'sourcefilename'              => 'Qaýnardağı faýl atı',
'destfilename'                => 'Nısana faýl atı',
'watchthisupload'             => 'Osı betti baqılaw',
'filewasdeleted'              => 'Osı atawı bar faýl burın qotarılğan, sosın joýıldırılğan. Qaýta qotarw aldınan $1 degendi tekseriñiz.',
'upload-wasdeleted'           => "'''Qulaqtandırw: Aldında joýılğan faýldı qotaraýın dep tursız.'''

Mına faýl qotarwın jalğastırw üşin jarastığın tekserip şığwıñız jön.
Qolaýlı bolwı üşin bul faýldıñ joyw jwrnalı keltirilgen:",
'filename-bad-prefix'         => 'Qotaraýın degen faýlıñızdıñ atawı <strong>«$1» </strong> dep bastaladı, mınadaý sïpattawsız atawdı ädette sandıq kameralar özdiktik beredi. Faýlıñızğa sïpattılaw ataw tandap beriñiz.',

'upload-proto-error'      => 'Burıs xattamalıq',
'upload-proto-error-text' => 'Sırttan qotarw üşin URL jaýları <code>http://</code> nemese <code>ftp://</code> degenderden bastalw kerek.',
'upload-file-error'       => 'İşki qate',
'upload-file-error-text'  => 'Serverde waqıtşa faýl jaratılwı işki qatesine uşırastı. Bul jüýeniñ äkimşimen qatınasıñız.',
'upload-misc-error'       => 'Belgisiz qotarw qatesi',
'upload-misc-error-text'  => 'Qotarw kezinde belgisiz qatege uşırastı. URL jaýı jaramdı jäne qatınawlı ekenin tekserip şığıñız da qaýta baýqap köriñiz. Eger bul mäsele älde de qalsa, jüýe äkimşimen qatınasıñız.',

# Some likely curl errors. More could be added from <http://curl.haxx.se/libcurl/c/libcurl-errors.html>
'upload-curl-error6'       => 'URL jaýı jetilmedi',
'upload-curl-error6-text'  => 'Berilgen URL jaýı jetilmedi. Qaýsı URL jaýı durıs ekenin jäne torap iste ekenin qaýtalap qatañ tekseriñiz.',
'upload-curl-error28'      => 'Qotarwğa berilgen waqıt bitti',
'upload-curl-error28-text' => 'Toraptıñ jawap berwi tım uzaq waqıtqa sozıldı. Bul torap iste ekenin tekserip şığıñız, azğana kidire turıñız da qaýta baýqap köriñiz. Talabıñızdı qol tïgen kezinde qaýta baýqap körwiñiz mümkin.',

'license'            => 'Lïcenzïyası',
'nolicense'          => 'Eşteñe bölektenbegen',
'license-nopreview'  => '(Qarap şığw qatınalmaýdı)',
'upload_source_url'  => ' (jaramdı, barşağa qatınawlı URL jaý)',
'upload_source_file' => ' (komp′ywteriñizdegi faýl)',

# Image list
'imagelist'                 => 'Faýl tizimi',
'imagelisttext'             => "Tömende $2 surıptalğan {{PLURAL:$1|'''1'''|'''$1'''}} faýl tizimi.",
'getimagelist'              => 'faýl tizimin keltirwde',
'ilsubmit'                  => 'İzde',
'showlast'                  => 'Soñğı $1 faýldı $2 surıptap körset.',
'byname'                    => 'atawımen',
'bydate'                    => 'kün-aýımen',
'bysize'                    => 'mölşerimen',
'imgdelete'                 => 'joyw',
'imgdesc'                   => 'sïpp.',
'imgfile'                   => 'faýl',
'filehist'                  => 'Faýl tarïxı',
'filehist-help'             => 'Faýldıñ qaý waqıtta qalaý körinetin üşin Kün-aý/Waqıt degendi nuqıñız.',
'filehist-deleteall'        => 'barlığın joý',
'filehist-deleteone'        => 'bunı joý',
'filehist-revert'           => 'qaýtar',
'filehist-current'          => 'ağımdağı',
'filehist-datetime'         => 'Kün-aý/Waqıt',
'filehist-user'             => 'Qatıswşı',
'filehist-dimensions'       => 'Ölşemderi',
'filehist-filesize'         => 'Faýl mölşeri',
'filehist-comment'          => 'Mändemesi',
'imagelinks'                => 'Siltemeler',
'linkstoimage'              => 'Bul faýlğa kelesi better silteýdi:',
'nolinkstoimage'            => 'Bul faýlğa eş bet siltemeýdi.',
'sharedupload'              => 'Bul faýl ortaq arqawına qotarılğan sondıqtan basqa jobalarda qoldanwı mümkin.',
'shareduploadwiki'          => 'Bılaýğı aqparat üşin $1 degendi qarañız.',
'shareduploadwiki-linktext' => 'faýl sïpattaması beti',
'noimage'                   => 'Mınadaý atawlı faýl joq, $1 mümkindigiñiz bar.',
'noimage-linktext'          => 'bunı qotarw',
'uploadnewversion-linktext' => 'Bul faýldıñ jaña nusqasın qotarw',
'imagelist_date'            => 'Kün-aýı',
'imagelist_name'            => 'Atawı',
'imagelist_user'            => 'Qatıswşı',
'imagelist_size'            => 'Mölşeri',
'imagelist_description'     => 'Sïpattaması',
'imagelist_search_for'      => 'Swretti atawımen izdew:',

# File reversion
'filerevert'                => '$1 degendi qaýtarw',
'filerevert-legend'         => 'Faýldı qaýtarw',
'filerevert-intro'          => '<span class="plainlinks">\'\'\'[[{{ns:media}}:$1|$1]]\'\'\' degendi [$4 $3, $2 kezindegi nusqasına] qaýtarwdasız.</span>',
'filerevert-comment'        => 'Mändemesi:',
'filerevert-defaultcomment' => '$2, $1 kezindegi nusqasına qaýtarıldı',
'filerevert-submit'         => 'Qaýtar',
'filerevert-success'        => '<span class="plainlinks">\'\'\'[[{{ns:media}}:$1|$1]]\'\'\' degen [$4 $3, $2 kezindegi nusqasına] qaýtarıldı.</span>',
'filerevert-badversion'     => 'Keltirilgen waqıt belgisimen bul faýldıñ aldıñğı jergilikti nusqası joq.',

# File deletion
'filedelete'                  => '$1 degendi joyw',
'filedelete-legend'           => 'Faýldı joyw',
'filedelete-intro'            => "'''[[{{ns:media}}:$1|$1]]''' degendi joywdasız.",
'filedelete-intro-old'        => '<span class="plainlinks">\'\'\'[[{{ns:media}}:$1|$1]]\'\'\' degenniñ [$4 $3, $2 kezindegi nusqasın] joywdasız.</span>',
'filedelete-comment'          => 'Joyw sebebi:',
'filedelete-submit'           => 'Joý',
'filedelete-success'          => "'''$1''' degen joýıldı.",
'filedelete-success-old'      => '<span class="plainlinks">\'\'\'[[{{ns:media}}:$1|$1]]\'\'\' degenniñ $3, $2 kezindegi nusqası joýıldı.</span>',
'filedelete-nofile'           => "'''$1''' degen {{SITENAME}} jobasında joq.",
'filedelete-nofile-old'       => "Keltirilgen anıqtawıştarımen '''$1''' degenniñ murağattalğan nusqası mında joq.",
'filedelete-iscurrent'        => 'Bul faýldıñ eñ soñğı nusqasın joyw talap etkensiz. Aldınan eski nusqasına qaýtarıñız.',
'filedelete-otherreason'      => 'Basqa/qosımşa sebep:',
'filedelete-reason-otherlist' => 'Basqa sebep',
'filedelete-reason-dropdown'  => '
* Joywdıñ jalpı sebepteri
** Awtorlıq quqıqtarın buzw
** Qosarılanğan faýl',

# MIME search
'mimesearch'         => 'Faýldı MIME türimen izdew',
'mimesearch-summary' => 'Bul bette faýldardı MIME türimen süzgilewi qosılğan. Kirisi: «mağlumat türi»/«tür tarawı», mısalı <tt>image/jpeg</tt>.',
'mimetype'           => 'MIME türi:',
'download'           => 'jüktew',

# Unwatched pages
'unwatchedpages' => 'Baqılanılmağan better',

# List redirects
'listredirects' => 'Aýdatw bet tizimi',

# Unused templates
'unusedtemplates'     => 'Paýdalanılmağan ülgiler',
'unusedtemplatestext' => 'Bul bet basqa betke kirictirilmegen ülgi esim ayaısındağı barlıq betterdi tizimdeýdi. Ülgilerdi joyw aldınan bunıñ basqa siltemelerin tekserip şığwın umıtpañız',
'unusedtemplateswlh'  => 'basqa siltemeler',

# Random page
'randompage'         => 'Kezdeýsoq bet',
'randompage-nopages' => 'Bul esim ayasında better joq.',

# Random redirect
'randomredirect'         => 'Kezdeýsoq aýdatw',
'randomredirect-nopages' => 'Bul esim ayasında eş aýdatw joq.',

# Statistics
'statistics'             => 'Sanaq',
'sitestats'              => '{{SITENAME}} sanağı',
'userstats'              => 'Qatıswşı sanağı',
'sitestatstext'          => "Derekqorda {{PLURAL:$1|'''1'''|bulaýşa '''$1'''}} bet bar.
Buğan «talqılaw» betteri, {{SITENAME}} jobası twralı better, eñ az «biteme»
betteri, aýdatwlar, tağı da basqa mağlumat dep tanılmaýtın better kiristirledi.
Solardı esepten şığarğanda, mında mağlumat {{PLURAL:$2|beti|betteri}} dep sanalatın
{{PLURAL:$2|'''1'''|'''$2'''}} bet bar şığar.

Qotarılğan {{PLURAL:$8|'''1'''|'''$8'''}} faýl saqtaladı.

{{SITENAME}} ornatılğannan beri better {{PLURAL:$3|'''1'''|bulaýşa '''$3'''}} ret qaralğan,
jäne better {{PLURAL:$4|'''1'''|'''$4'''}} ret tüzetilgen.
Bunıñ nätïjesinde ortaşa eseppen ärbir betke '''$5''' ret tüzetw keledi, jäne ärbir tüzetwge '''$6''' ret qaraw keledi.

Ağımdıq [http://meta.wikimedia.org/wiki/Help:Job_queue tapsırım kezegi] uzındılığı: '''$7'''.",
'userstatstext'          => "Mında {{PLURAL:$1|'''1'''|'''$1'''}} [[{{ns:special}}:Listusers|tirkelgen qatıswşı]] bar, sonıñ işinde
{{PLURAL:$2|'''1'''|'''$2'''}} (ne '''$4 %''') qatıswşısında $5 quqıqtarı bar",
'statistics-mostpopular' => 'Eñ köp qaralğan better',

'disambiguations'      => 'Aýrıqtı better',
'disambiguations-text' => "Kelesi better '''aýrıqtı betke''' silteýdi. Bunıñ ornına belgili taqırıpqa siltewi kerek.<br />Eger [[{{ns:mediawiki}}:Disambiguationspage]] tizimindegi ülgi qoldanılsa, bet aýrıqtı dep sanaladı.",

'doubleredirects'     => 'Şınjırlı aýdatwlar',
'doubleredirectstext' => 'Bul bette basqa aýdatw betterge silteýtin better tizimi beriledi. Ärbir jolaqta birinşi jäne ekinşi aýdatwğa siltemeler bar, sonımen birge ekinşi aýdatw nısanası bar, ädette bul birinşi aýdatw bağıttaýtın «şın» nısana bet atawı bolwı kerek.',

'brokenredirects'        => 'Eş betke keltirmeýtin aýdatwlar',
'brokenredirectstext'    => 'Kelesi aýdatwlar joq betterge silteýdi:',
'brokenredirects-edit'   => '(öñdew)',
'brokenredirects-delete' => '(joyw)',

'withoutinterwiki'        => 'Eş tilge siltemegen better',
'withoutinterwiki-header' => 'Kelesi better basqa tilderge siltemeýdi:',
'withoutinterwiki-submit' => 'Körset',

'fewestrevisions' => 'Eñ az tüzetilgen better',

# Miscellaneous special pages
'nbytes'                  => '{{PLURAL:$1|1|$1}} baýt',
'ncategories'             => '{{PLURAL:$1|1|$1}} sanat',
'nlinks'                  => '{{PLURAL:$1|1|$1}} silteme',
'nmembers'                => '{{PLURAL:$1|1|$1}} bwın',
'nrevisions'              => '{{PLURAL:$1|1|$1}} nusqa',
'nviews'                  => '{{PLURAL:$1|1|$1}} ret qaralğan',
'specialpage-empty'       => 'Bul bayanatqa eş nätïje joq.',
'lonelypages'             => 'Eş betten siltelmegen better',
'lonelypagestext'         => 'Kelesi betterge {{SITENAME}} jobasındağı basqa better siltemeýdi.',
'uncategorizedpages'      => 'Sanatsız better',
'uncategorizedcategories' => 'Sanatsız sanattar',
'uncategorizedimages'     => 'Sanatsız swretter',
'uncategorizedtemplates'  => 'Sanatsız ülgiler',
'unusedcategories'        => 'Paýdalanılmağan sanattar',
'unusedimages'            => 'Paýdalanılmağan faýldar',
'popularpages'            => 'Eñ köp körilgen better',
'wantedcategories'        => 'Bastalmağan sanattar',
'wantedpages'             => 'Bastalmağan better',
'mostlinked'              => 'Eñ köp siltelgen better',
'mostlinkedcategories'    => 'Eñ köp paýdalanılğan sanattar',
'mostlinkedtemplates'     => 'Eñ köp paýdalanılğan ülgiler',
'mostcategories'          => 'Eñ köp sanatı bar better',
'mostimages'              => 'Eñ köp paýdalanılğan swretter',
'mostrevisions'           => 'Eñ köp tüzetilgen better',
'allpages'                => 'Barlıq better',
'prefixindex'             => 'Ataw bastawı tizimi',
'shortpages'              => 'Eñ qısqa better',
'longpages'               => 'Eñ uzın better',
'deadendpages'            => 'Eş betke siltemeýtin better',
'deadendpagestext'        => 'Kelesi better {{SITENAME}} jobasındağı basqa betterge siltemeýdi.',
'protectedpages'          => 'Qorğalğan better',
'protectedpagestext'      => 'Kelesi better öñdewden nemese jıljıtwdan qorğalğan',
'protectedpagesempty'     => 'Ağımda mınadaý baptalımdarımen eşbir bet qorğalmağan',
'protectedtitles'         => 'Qorğalğan atawlar',
'protectedtitlestext'     => 'Kelesi atawlardıñ jaratwına ruqsat berilmegen',
'protectedtitlesempty'    => 'Bul baptalımdarmen ağımda eş atawlar qorğalmağan.',
'listusers'               => 'Qatıswşı tizimi',
'specialpages'            => 'Arnaýı better',
'spheading'               => 'Barşanıñ arnaýı betteri',
'restrictedpheading'      => 'Tïımdı arnaýı better',
'newpages'                => 'Eñ jaña better',
'newpages-username'       => 'Qatıswşı atı:',
'ancientpages'            => 'Eñ eski better',
'intl'                    => 'Tilaralıq siltemeler',
'move'                    => 'Jıljıtw',
'movethispage'            => 'Betti jıljıtw',
'unusedimagestext'        => '<p>Añğartpa: Ğalamtordağı basqa toraptar faýldıñ
URL jaýına tikeleý siltewi mümkin. Sondıqtan, belsendi paýdalanwına añğarmaý,
osı tizimde qalwı mümkin.</p>',
'unusedcategoriestext'    => 'Kelesi sanat betteri bar bolıp tur, biraq oğan eşqandaý bet, ne sanat kirmeýdi.',
'notargettitle'           => 'Nısana joq',
'notargettext'            => 'Bul äreket orındalatın nısana betti, ne qatıswşını engizbepsiz.',
'pager-newer-n'           => '{{PLURAL:$1|jañalaw 1|jañalaw $1}}',
'pager-older-n'           => '{{PLURAL:$1|eskilew 1|eskilew $1}}',

# Book sources
'booksources'               => 'Kitap qaýnarları',
'booksources-search-legend' => 'Kitap qaýnarların izdew',
'booksources-go'            => 'Ötw',
'booksources-text'          => 'Tömende jaña jäne qoldanğan kitaptar satatıntoraptarınıñ siltemeleri tizimdelgen.
Bul toraptarda izdelgen kitaptar twralı bılaýğı aqparat bolwğa mümkin.',

'categoriespagetext' => 'Osında wïkïdegi barlıq sanattarınıñ tizimi berilip tur.',
'data'               => 'Derekter',
'userrights'         => 'Qatıswşılar quqıqtarın rettew',
'groups'             => 'Qatıswşı toptarı',
'alphaindexline'     => '$1 — $2',
'version'            => 'Jüýe nusqası',

# Special:Log
'specialloguserlabel'  => 'Qatıswşı:',
'speciallogtitlelabel' => 'Ataw:',
'log'                  => 'Jwrnaldar',
'all-logs-page'        => 'Barlıq jwrnaldar',
'log-search-legend'    => 'Jwrnaldardan izdew',
'log-search-submit'    => 'Öt',
'alllogstext'          => '{{SITENAME}} jobasınıñ barlıq qatınawlı jwrnaldarın biriktirip körsetwi.
Jwrnal türin, qatıswşı atın, ne tïisti betin bölektep, tarıltıp qarawıñızğa boladı.',
'logempty'             => 'Jwrnalda säýkes danalar joq.',
'log-title-wildcard'   => 'Mınadaý mätinneñ bastalıtın atawlardan izdew',

# Special:Allpages
'nextpage'          => 'Kelesi betke ($1)',
'prevpage'          => 'Aldıñğı betke ($1)',
'allpagesfrom'      => 'Mına betten bastap körsetw:',
'allarticles'       => 'Barlıq bet tizimi',
'allinnamespace'    => 'Barlıq bet ($1 esim ayası)',
'allnotinnamespace' => 'Barlıq bet ($1 esim ayasınan tıs)',
'allpagesprev'      => 'Aldıñğığa',
'allpagesnext'      => 'Kelesige',
'allpagessubmit'    => 'Ötw',
'allpagesprefix'    => 'Mınadan bastalğan betterdi körsetw:',
'allpagesbadtitle'  => 'Keltirilgen bet atawı jaramsız bolğan, nemese til-aralıq ne wïkï-aralıq bastawı bar boldı. Atawda qoldanwğa bolmaýtın nışandar bolwı mümkin.',
'allpages-bad-ns'   => '{{SITENAME}} jobasında «$1» esim ayası joq.',

# Special:Listusers
'listusersfrom'      => 'Mına qatıswşıdan bastap körsetw:',
'listusers-submit'   => 'Körset',
'listusers-noresult' => 'Qatıswşı tabılğan joq.',

# E-mail user
'mailnologin'     => 'Eş jiberiletin jaý joq',
'mailnologintext' => 'Basqa qatıswşığa xat jiberw üşin
[[{{ns:special}}:Userlogin|kirwiñiz]] kerek, jäne [[{{ns:special}}:Preferences|baptawıñızda]]
jaramdı e-poşta jaýı bolwı jön.',
'emailuser'       => 'Qatıswşığa xat jazw',
'emailpage'       => 'Qatıswşığa xat jiberw',
'emailpagetext'   => 'Eger bul qatıswşı baptawlarında jaramdı e-poşta
jaýın engizse, tömendegi pişin arqılı buğan jalğız e-poşta xatın jiberwge boladı.
Qatıswşı baptawıñızda engizgen e-poşta jaýıñız
«Kimnen» degen bas jolağında körinedi, sondıqtan
xat alwşısı twra jawap bere aladı.',
'usermailererror' => 'Mail nısanı qate qaýtardı:',
'defemailsubject' => '{{SITENAME}} e-poştasınıñ xatı',
'noemailtitle'    => 'Eş e-poşta jaýı joq',
'noemailtext'     => 'Bul qatıswşı jaramdı E-poşta jaýın engizbegen,
ne basqalardan xat qabıldawın öşirgen.',
'emailfrom'       => 'Kimnen',
'emailto'         => 'Kimge',
'emailsubject'    => 'Taqırıbı',
'emailmessage'    => 'Xat',
'emailsend'       => 'Jiberw',
'emailccme'       => 'Xatımdıñ köşirmesin mağan da jiber.',
'emailccsubject'  => '$1 degenge jiberilgen xatıñızdıñ köşirmesi: $2',
'emailsent'       => 'Xat jiberildi',
'emailsenttext'   => 'E-poşta xatıñız jiberildi.',

# Watchlist
'watchlist'            => 'Baqılaw tizimi',
'mywatchlist'          => 'Baqılawım',
'watchlistfor'         => "('''$1''' baqılawları)",
'nowatchlist'          => 'Baqılaw tizimiñizde eşbir dana joq',
'watchlistanontext'    => 'Baqılaw tizimiñizdegi danalardı qaraw, ne öñdew üşin $1 kerek.',
'watchnologin'         => 'Kirmegensiz',
'watchnologintext'     => 'Baqılaw tizimiñizdi özgertw üşin [[{{ns:special}}:Userlogin|kirwiñiz]] jön.',
'addedwatch'           => 'Baqılaw tizimine üsteldi',
'addedwatchtext'       => "«[[:$1]]» beti [[{{ns:special}}:Watchlist|baqılaw tizimiñizge]] üsteldi.
Osı bettiñ jäne sonıñ talqılaw betiniñ keleşektegi özgeristeri mında tizimdeledi.
Sonda bettiñ atawı tabwğa jeñildetip [[{{ns:special}}:Recentchanges|jwıqtağı özgerister tiziminde]]
'''jwan ärpimen''' körsetiledi.

Osı betti soñınan baqılaw tizimnen alastağıñız kelse «Baqılamaw» parağın nuqıñız.",
'removedwatch'         => 'Baqılaw tizimiñizden alastaldı',
'removedwatchtext'     => '«[[:$1]]» beti baqılaw tizimiñizden alastaldı.',
'watch'                => 'Baqılaw',
'watchthispage'        => 'Betti baqılaw',
'unwatch'              => 'Baqılamaw',
'unwatchthispage'      => 'Baqılawdı toqtatw',
'notanarticle'         => 'Mağlumat beti emes',
'watchnochange'        => 'Körsetilgen merzimde eş baqılanğan dana öñdelgen joq.',
'watchlist-details'    => 'Talqılaw betterin sanamağanda {{PLURAL:$1|1|$1}} bet baqlanğan.',
'wlheader-enotif'      => '* Eskertw xat jiberwi qosılğan.',
'wlheader-showupdated' => "* Soñğı kelip-ketwiñizden beri özgertilgen betterdi '''jwan''' qaripimen körset",
'watchmethod-recent'   => 'baqılawlı betterdiñ jwıqtağı özgeristerin tekserw',
'watchmethod-list'     => 'jwıqtağı özgeristerde baqılawlı betterdi tekserw',
'watchlistcontains'    => 'Baqılaw tizimiñizde {{PLURAL:$1|1|$1}} bet bar.',
'iteminvalidname'      => "'$1' danasınıñ jaramsız atawınan şataq twdı…",
'wlnote'               => "Tömende soñğı {{PLURAL:$2|sağatta|'''$2''' sağatta}} bolğan, {{PLURAL:$1|jwıqtağı özgeris|jwıqtağı '''$1''' özgeris}} körsetilgen.",
'wlshowlast'           => 'Soñğı $1 sağattağı, $2 kündegi, $3 bolğan özgeristi körsetw',
'watchlist-show-bots'  => 'Bottardı körset',
'watchlist-hide-bots'  => 'Bottardı jasır',
'watchlist-show-own'   => 'Tüzetwimdi körset',
'watchlist-hide-own'   => 'Tüzetwimdi jasır',
'watchlist-show-minor' => 'Şağın tüzetwdi körset',
'watchlist-hide-minor' => 'Şağın tüzetwdi jasır',

# Displayed when you click the "watch" button and it's in the process of watching
'watching'   => 'Baqılaw…',
'unwatching' => 'Baqılamaw…',

'enotif_mailer'                => '{{SITENAME}} eskertw xat jiberw qızmeti',
'enotif_reset'                 => 'Barlıq bet kelip-ketildi dep belgile',
'enotif_newpagetext'           => 'Mınaw jaña bet.',
'enotif_impersonal_salutation' => '{{SITENAME}} qatıswşısı',
'changed'                      => 'özgertti',
'created'                      => 'jarattı',
'enotif_subject'               => '{{SITENAME}} jobasında $PAGEEDITOR $PAGETITLE atawlı betti $CHANGEDORCREATED',
'enotif_lastvisited'           => 'Soñğı kelip-ketwiñizden beri bolğan özgerister üşin $1 degendi qarañız.',
'enotif_lastdiff'              => 'Osı özgeris üşin $1 degendi qarañız.',
'enotif_anon_editor'           => 'tirkelgisiz qatıswşı $1',
'enotif_body'                  => 'Qurmetti $WATCHINGUSERNAME,

{{SITENAME}} jobasınıñ $PAGETITLE atawlı betti $PAGEEDITDATE kezinde $PAGEEDITOR degen $CHANGEDORCREATED, ağımdıq nusqasın $PAGETITLE_URL jaýınan qarañız.

$NEWPAGE

Öñdewşi sïpattaması: $PAGESUMMARY $PAGEMINOREDIT

Öñdewşimen qatınasw:
e-poşta: $PAGEEDITOR_EMAIL
wïkï: $PAGEEDITOR_WIKI

Bılaýğı özgerister bolğanda da osı betke kelip-ketwiñizgenşe deýin eşqandaý basqa eskertw xattar jiberilmeýdi. Sonımen qatar baqılaw tizimiñizdegi bet eskertpelik belgisin qaýta qoýıñız.

             Sizdiñ dostı {{SITENAME}} eskertw qızmeti

----
Baqılaw tizimiñizdiñ baptawlırın özgertw üşin, mında kelip-ketiñiz:
{{fullurl:{{ns:special}}:Watchlist/edit}}

Sın-pikir berw jäne bılaýğı järdem alw üşin:
{{fullurl:{{{{ns:mediawiki}}:Helppage}}}}',

# Delete/protect/revert
'deletepage'                  => 'Betti joyw',
'confirm'                     => 'Quptaw',
'excontent'                   => "bolğan mağlumatı: '$1'",
'excontentauthor'             => "bolğan mağlumatı (tek '[[{{ns:special}}:Contributions/$2|$2]]' ülesi): '$1'",
'exbeforeblank'               => "tazartw aldındağı bolğan mağlumatı: '$1'",
'exblank'                     => 'bet bos boldı',
'delete-confirm'              => '«$1» degendi joyw',
'delete-legend'               => 'Joyw',
'historywarning'              => 'Qulaqtandırw: Joywğa arnalğan bette öz tarïxı bar:',
'confirmdeletetext'           => 'Betti nemese swretti barlıq tarïxımen birge derekqordan ärdaýım joýığıñız keletin sïyaqtı.
Bunı joywdıñ zardabın tüsinip şın nïettengeniñizdi, jäne [[{{{{ns:mediawiki}}:Policy-url}}]] degenge laýıqtı dep sengeniñizdi quptañız.',
'actioncomplete'              => 'Äreket bitti',
'deletedtext'                 => '«<nowiki>$1</nowiki>» joýıldı. Jwıqtağı joywlar twralı jazbaların $2 degennen qarañız.',
'deletedarticle'              => '«[[$1]]» betin joýdı',
'dellogpage'                  => 'Joyw_jwrnalı',
'dellogpagetext'              => 'Tömende jwıqtağı joywlardıñ tizimi berilgen.',
'deletionlog'                 => 'joyw jwrnalı',
'reverted'                    => 'Erterek nusqasına qaýtarılğan',
'deletecomment'               => 'Joywdıñ sebebi:',
'deleteotherreason'           => 'Basqa/qosımşa sebep:',
'deletereasonotherlist'       => 'Basqa sebep',
'deletereason-dropdown'       => '
*Joywdıñ jalpı sebepteri
** Awtordıñ suranımı boýınşa
** Awtorlıq quqıqtarın buzw
** Buzaqılıq',
'delete-toobig'               => 'Bul bette baýtaq öñdew tarïxı bar, $1 nusqadan astam. Bundaý betterdiñ joywı {{SITENAME}} torabın äldeqalaý üzip tastawına böget salw üşin tïımdalğan.',
'delete-warning-toobig'       => 'Bul bette baýtaq öñdew tarïxı bar, $1 nusqadan astam. Bunıñ joywı {{SITENAME}} torabındağı derekqor äreketterdi üzip tastawın mümkin; bunı abaýlap ötkiziñiz.',
'rollback'                    => 'Tüzetwlerdi keri qaýtarw',
'rollback_short'              => 'Keri qaýtarw',
'rollbacklink'                => 'keri qaýtarw',
'rollbackfailed'              => 'Keri qaýtarw sätsiz bitti',
'cantrollback'                => 'Tüzetw qaýtarılmaýdı; bul bettiñ awtorı tek soñğı ülesker bolğan.',
'alreadyrolled'               => '[[:$1]] betiniñ [[User:$2|$2]] ([[User_talk:$2|talqılawı]])
soñğı tüzetwi keri qaýtarılmadı; basqa birew betti aldaqaşan öñdegen ne qaýtarğan.

Soñğı öñdewdi [[User:$3|$3]] ([[User_talk:$3|talqılawı]]) istegen.',
'editcomment'                 => 'Bolğan tüzetw mändemesi: «<i>$1</i>».', # only shown if there is an edit comment
'revertpage'                  => '[[{{ns:special}}:Contributions/$2|$2]] ([[{{ns:user_talk}}:$2|talqılawı]]) tüzetwlerinen qaýtarğan; [[{{ns:user}}:$1|$1]] soñğı nusqasına özgertti.', # Additional available: $3: revid of the revision reverted to, $4: timestamp of the revision reverted to, $5: revid of the revision reverted from, $6: timestamp of the revision reverted from
'rollback-success'            => '$1 tüzetwlerinen qaýtarğan; $2 soñğı nusqasına özgertti.',
'sessionfailure'              => 'Kirw sessïyasında şataq bolğan sïyaqtı; sessïyağa şabwıldawdardan qorğanw üşin, osı äreket toqtatıldı. «Artqa» tüýmesin basıñız, jäne betti keri jükteñiz, sosın qaýta baýqap köriñiz.',
'protectlogpage'              => 'Qorğaw_jwrnalı',
'protectlogtext'              => 'Tömende betterdiñ qorğaw/qorğamaw tizimi berilgen. Ağımdağı qorğaw ärektter bar better üşin [[{{ns:special}}:Protectedpages|qorğalğan bet tizimin]] qarañız.',
'protectedarticle'            => '«[[$1]]» qorğaldı',
'modifiedarticleprotection'   => '«[[$1]]» degenniñ qorğalw deñgeýi özgerdi',
'unprotectedarticle'          => '«[[$1]]» qorğalmadı',
'protectsub'                  => '(«$1» qorğaw deñgeýin qoyw)',
'confirmprotect'              => 'Qorğawdı quptaw',
'protectcomment'              => 'Mändemesi:',
'protectexpiry'               => 'Bitetin merzimi:',
'protect_expiry_invalid'      => 'Bitetin waqıtı jaramsız.',
'protect_expiry_old'          => 'Bitetin waqıtı ötip ketken.',
'unprotectsub'                => '(«$1» qorğamawda)',
'protect-unchain'             => 'Jıljıtw ruqsattarın berw',
'protect-text'                => '<strong><nowiki>$1</nowiki></strong> betiniñ qorğaw deñgeýin qarap jäne özgertip şığa alasız.',
'protect-locked-blocked'      => 'Buğattawıñız öşirilgenşe deýin qorğaw deñgeýin özgerte almaýsız.
Mına <strong>$1</strong> bettiñ ağımdıq baptawları:',
'protect-locked-dblock'       => 'Derekqordıñ qulıptawı belsendi bolğandıqtan qorğaw deñgeýleri özgertilmeýdi.
Mına <strong>$1</strong> bettiñ ağımdıq baptawları:',
'protect-locked-access'       => 'Tirkelgiñizge bet qorğaw dengeýlerin özgertwine ruqsat joq.
Mına <strong>$1</strong> bettiñ ağımdıq baptawları:',
'protect-cascadeon'           => 'Bul bet ağımda qorğalğan, sebebi: osı bet bawlı qorğawı bar kelesi {{PLURAL:$1|betke|betterge}} kiristirilgen. Bul bettiñ qorğaw deñgeýin özgerte alasız, biraq bul bawlı qorğawğa ıqpal etpeýdi.',
'protect-default'             => '(ädepki)',
'protect-fallback'            => '«$1» ruqsatı kerek boldı',
'protect-level-autoconfirmed' => 'Tirkelgisizderge tïım',
'protect-level-sysop'         => 'Tek äkimşilerge ruqsat',
'protect-summary-cascade'     => 'bawlı',
'protect-expiring'            => 'bitwi: $1 (UTC)',
'protect-cascade'             => 'Bul betke kiristirilgen betterdi qorğaw (bawlı qorğaw).',
'protect-cantedit'            => 'Bul bettiñ qorğaw deñgeýin özgerte almaýsız, sebebi bunı öñdewge ruqstañız joq.',
'restriction-type'            => 'Ruqsatı:',
'restriction-level'           => 'Tïım deñgeýi:',
'minimum-size'                => 'Eñ az mölşeri',
'maximum-size'                => 'Eñ köp mölşeri',
'pagesize'                    => '(baýt)',

# Restrictions (nouns)
'restriction-edit'   => 'Öñdewge',
'restriction-move'   => 'Jıljıtwğa',
'restriction-create' => 'Jaratw',

# Restriction levels
'restriction-level-sysop'         => 'tolıq qorğalğan',
'restriction-level-autoconfirmed' => 'jartılaý qorğalğan',
'restriction-level-all'           => 'ärqaýsı deñgeýde',

# Undelete
'undelete'                     => 'Joýılğan betterdi qaraw',
'undeletepage'                 => 'Joýılğan betterdi qaraw jäne qalpına keltirw',
'viewdeletedpage'              => 'Joýılğan betterdi qaraw',
'undeletepagetext'             => 'Kelesi better joýıldı dep belgilengen, biraq mağlumatı murağatta bar
jäne qalpına keltirwge mümkin. Murağat merzim boýınşa tazalanıp turwı mümkin.',
'undeleteextrahelp'            => "Bükil betti qalpına keltirw üşin, barlıq şarşılardı qusbelgilerden bosatıp
'''''Qalpına keltir!''''' batırmasın nuqıñız. Bölektewmen qalpına keltirw orındaw üşin, keltiremin degen nusqalarına säýkes
qabaşaqtarın belgileñiz de, jäne '''''Qalpına keltir!''''' tüýmesin nuqıñız. '''''Qaýta qoý''''' tüýmesin
nuqığanda mändeme awmağı tazartadı jäne barlıq şarşılardı qusbelgilerden bosatadı.",
'undeleterevisions'            => '{{PLURAL:$1|1|$1}} nusqa murağattaldı',
'undeletehistory'              => 'Eger bet mağlumatın qalpına keltirseñiz, tarïxında barlıq nusqalar da
qaýtarıladı. Eger joywdan soñ däl solaý atawımen jaña bet bastalsa, qalpına keltirilgen nusqalar
tarïxtıñ aldında körsetiledi. Tağı da faýl nusqalarınıñ qalpına keltirgende tïımdarı joýılatın umıtpañız.',
'undeleterevdel'               => 'Eger bettiñ üstiñgi nusqası jarım-jartılaý joýılğan bolsa joyw boldırmawı
atqarılmaýdı. Osındaý jağdaýlarda, eñ jaña joýılğan nusqa belgilewin nemese jasırwın boldırmañız.
Körwiñizge ruqsat etilmegen faýl nusqaları qalpına keltirilmeýdi.',
'undeletehistorynoadmin'       => 'Bul bet joýılğan. Joyw sebebi aldındağı öñdegen qatıswşılar
egjeý-tegjeýlerimen birge tömendegi sïpattamasında körsetilgen.
Osı joýılğan nusqalardıñ mätini tek äkimşilerge qatınawlı.',
'undelete-revision'            => '$2 kezindegi $1 degenniñ nusqası ($3 joýğan):',
'undeleterevision-missing'     => 'Jaramsız ne joğalğan nusqa. Siltemeñiz jaramsız bolwı mümkin, ne
nusqa aldaqaşan qalpına keltirilgen nemese murağattan alastalğan.',
'undelete-nodiff'              => 'Eş aldıñğı nusqa tabılmadı.',
'undeletebtn'                  => 'Qalpına keltir!',
'undeletereset'                => 'Qaýta qoý',
'undeletecomment'              => 'Mändemesi:',
'undeletedarticle'             => '«[[$1]]» qalpına keltirildi',
'undeletedrevisions'           => '{{PLURAL:$1|1|$1}} nusqa qalpına keltirildi',
'undeletedrevisions-files'     => '{{PLURAL:$1|1|$1}} nusqa jäne {{PLURAL:$2|1|$2}} faýl qalpına keltirildi',
'undeletedfiles'               => '{{PLURAL:$1|1|$1}} faýl qalpına keltirildi',
'cannotundelete'               => 'Joyw boldırmawı sätsiz bitti; basqa birew alğaşında bettiñ joywdıñ boldırmawı mümkin.',
'undeletedpage'                => "<big>'''$1 qalpına keltirildi'''</big>

Jwıqtağı joywlar men qalpına keltirwler jöninde [[{{ns:special}}:Log/delete|joyw jwrnalın]] qarañız.",
'undelete-header'              => 'Jwıqtağı joýılğan better jöninde [[{{ns:special}}:Log/delete|joyw jwrnalın]] qarañız.',
'undelete-search-box'          => 'Joýılğan betterdi izdew',
'undelete-search-prefix'       => 'Mınadan bastalğan betterdi körset:',
'undelete-search-submit'       => 'İzdew',
'undelete-no-results'          => 'Joyw murağatında eşqandaý säýkes better tabılmadı.',
'undelete-filename-mismatch'   => '$1 waqıt belgisimen faýl nusqası joywdı boldırmaw atqarılmadı: faýl atı säýkessiz',
'undelete-bad-store-key'       => '$1 waqıt belgisimen faýl nusqası joywdı boldırmaw atqarılmadı: joywdıñ aldınan faýl joq bolğan.',
'undelete-cleanup-error'       => '«$1» paýdalanılmağan murağattalğan faýl joyw qatesi.',
'undelete-missing-filearchive' => 'Murağattalğan faýl (nömiri $1) qalpına keltirilmedi, sebebi ol derekqorda joq. Bunıñ joywın boldırmawı aldaqaşan bolğanı mümkin.',
'undelete-error-short'         => 'Faýl joywın boldırmaw qatesi: $1',
'undelete-error-long'          => 'Faýl joywın boldırmaw kezinde mına qateler kezdesti:

$1',

# Namespace form on various pages
'namespace'      => 'Esim ayası:',
'invert'         => 'Bölektewdi kerilew',
'blanknamespace' => '(Negizgi)',

# Contributions
'contributions' => 'Qatıswşı ülesi',
'mycontris'     => 'Ülesim',
'contribsub2'   => '$1 ($2) ülesi',
'nocontribs'    => 'Osı izdew şartına säýkes özgerister tabılğan joq.',
'ucnote'        => 'Tömende osı qatıswşı jasağan soñğı <b>$2</b> kündegi, soñğı <b>$1</b> özgerisi körsetledi.',
'uclinks'       => 'Soñğı $2 kündegi, soñğı jasalğan $1 özgerisin qaraw.',
'uctop'         => ' (üsti)',
'month'         => 'Aýdağı (jäne erterekten):',
'year'          => 'Jıldağı (jäne erterekten):',

'sp-contributions-newbies'     => 'Tek jaña tirkelgiden jasağan ülesterdi körset',
'sp-contributions-newbies-sub' => 'Jañadan tirkelgi jasağandar üşin',
'sp-contributions-blocklog'    => 'Buğattaw jwrnalı',
'sp-contributions-search'      => 'Üles üşin izdew',
'sp-contributions-username'    => 'IP jaý ne qatıswşı atı:',
'sp-contributions-submit'      => 'İzde',

'sp-newimages-showfrom' => '$1 kezinen beri — jaña swretterdi körset',

# What links here
'whatlinkshere'       => 'Siltelgen better',
'whatlinkshere-title' => '$1 degenge silteýtin better',
'whatlinkshere-page'  => 'Bet:',
'linklistsub'         => '(Siltemeler tizimi)',
'linkshere'           => "'''[[:$1]]''' degenge mına better silteýdi:",
'nolinkshere'         => "'''[[:$1]]''' degenge eş bet siltemeýdi.",
'nolinkshere-ns'      => "Talğanğan esim ayasında '''[[:$1]]''' degenge eşqandaý bet siltemeýdi.",
'isredirect'          => 'aýdatw beti',
'istemplate'          => 'kiriktirw',
'whatlinkshere-prev'  => '{{PLURAL:$1|aldıñğı|aldıñğı $1}}',
'whatlinkshere-next'  => '{{PLURAL:$1|kelesi|kelesi $1}}',
'whatlinkshere-links' => '← siltemeler',

# Block/unblock
'blockip'                     => 'Qatıswşını buğattaw',
'blockiptext'                 => 'Tömendegi pişin qatıswşınıñ jazw 
ruqsatın belgili IP jaýımen ne atawımen buğattaw üşin qoldanıladı.
Bunı tek buzaqılıqtı qaqpaýlaw üşin jäne de
[[{{{{ns:mediawiki}}:Policy-url}}|erejeler]] boýınşa atqarwıñız jön.
Tömende tïisti sebebin toltırıp körsetiñiz (mısalı, däýekke buzaqılıqpen
özgertken betterdi keltirip).',
'ipaddress'                   => 'IP jaýı:',
'ipadressorusername'          => 'IP jaýı ne atı:',
'ipbexpiry'                   => 'Bitetin merzimi:',
'ipbreason'                   => 'Sebebi:',
'ipbreasonotherlist'          => 'Basqa sebep',
'ipbreason-dropdown'          => '
* Buğattawdıñ jalpı sebebteri 
** Jalğan mälimet engizw 
** Betterdegi mağlumattı alastaw 
** Sırtqı toraptar siltemelerin jawdırw 
** Betterge mağınasızdıq/baldırlaw kiristirw 
** Qoqandaw/qwğındaw minezqulıq 
** Birneşe ret tirkelip qïyanattaw 
** Qolaýsız qatıswşı atawı',
'ipbanononly'                 => 'Tek tirkelgisiz qatıswşılardı buğattaw',
'ipbcreateaccount'            => 'Tirkelwdi qaqpaýlaw',
'ipbemailban'                 => 'Qatıswşı e-poştamen xat jiberwin qaqpaýlaw',
'ipbenableautoblock'          => 'Bul qatıswşı soñğı qoldanğan IP jaýı, jäne keýin öñdewge baýqap körgen ärqaýsı IP jaýları özdiktik buğattalsın',
'ipbsubmit'                   => 'Qatıswşını buğatta',
'ipbother'                    => 'Basqa merzimi:',
'ipboptions'                  => '2 sağat:2 hours,1 kün:1 day,3 kün:3 days,1 apta:1 week,2 apta:2 weeks,1 aý:1 month,3 aý:3 months,6 aý:6 months,1 jıl:1 year,mängi:infinite', # display1:time1,display2:time2,...
'ipbotheroption'              => 'basqa',
'ipbotherreason'              => 'Basqa/qosımşa sebep:',
'ipbhidename'                 => 'Buğattaw jwrnalındağı, belsendi buğattaw tizimindegi, qatıswşı tiziminnegi atı/IP jasırılsın',
'badipaddress'                => 'Jaramsız IP jaý',
'blockipsuccesssub'           => 'Buğattaw sätti ötti',
'blockipsuccesstext'          => '[[{{ns:special}}:Contributions/$1|$1]] degen buğattalğan.
<br />Buğattardı şolıp şığw üşin [[{{ns:special}}:Ipblocklist|IP buğattaw tizimin]] qarañız.',
'ipb-edit-dropdown'           => 'Buğattaw sebepterin öñdew',
'ipb-unblock-addr'            => '$1 degendi buğattamaw',
'ipb-unblock'                 => 'Qatıswşı atın nemese IP jaýın buğattamaw',
'ipb-blocklist-addr'          => '$1 üşin bar buğattawlardı qaraw',
'ipb-blocklist'               => 'Bar buğattawlardı qaraw',
'unblockip'                   => 'Qatıswşını buğattamaw',
'unblockiptext'               => 'Tömendegi pişindi aldındağı IP jaýımen ne atawımen buğattalğan qatıswşığa jazw qatınawın qalpına keltiriwi üşin qoldanıñız.',
'ipusubmit'                   => 'Osı jaýdı buğattamaw',
'unblocked'                   => '[[User:$1|$1]] buğattawı öşirildi',
'unblocked-id'                => '$1 degen buğattaw alastaldı',
'ipblocklist'                 => 'Buğattalğan qatıswşı / IP jaý tizimi',
'ipblocklist-legend'          => 'Buğattalğan qatıswşını tabw',
'ipblocklist-username'        => 'Qatıswşı atı / IP jaý:',
'ipblocklist-submit'          => 'İzde',
'blocklistline'               => '$1, $2 $3 degendi buğattadı ($4)',
'infiniteblock'               => 'mängi',
'expiringblock'               => 'bitwi: $1',
'anononlyblock'               => 'tek tirkelgisizder',
'noautoblockblock'            => 'özdiktik buğattaw öşirilgen',
'createaccountblock'          => 'tirkelw buğattalğan',
'emailblock'                  => 'e-poşta buğattalğan',
'ipblocklist-empty'           => 'Buğattaw tizimi bos.',
'ipblocklist-no-results'      => 'Suratılğan IP jaý ne qatıswşı atı buğattalğan emes.',
'blocklink'                   => 'buğattaw',
'unblocklink'                 => 'buğattamaw',
'contribslink'                => 'ülesi',
'autoblocker'                 => 'IP jaýıñızdı jwıqta «[[User:1|$1]]» paýdalanğan, sondıqtan özdiktik buğattalğan. $1 buğattawı üşin keltirilgen sebebi: «$2».',
'blocklogpage'                => 'Buğattaw_jwrnalı',
'blocklogentry'               => '[[$1]] degendi $2 merzimge buğattadı $3',
'blocklogtext'                => 'Bul qatıswşılardı buğattaw/buğattamaw äreketteriniñ jwrnalı. Özdiktik
buğattalğan IP jaýlar osında tizimdelgemegen. Ağımdağı belsendi buğattawların
[[{{ns:special}}:Ipblocklist|IP buğattaw tiziminen]] qarawğa boladı.',
'unblocklogentry'             => '«$1» degenniñ buğattawın öşirdi',
'block-log-flags-anononly'    => 'tek tirkelgisizder',
'block-log-flags-nocreate'    => 'tirkelw öşirilgen',
'block-log-flags-noautoblock' => 'özdiktik buğattaw öşirilgen',
'block-log-flags-noemail'     => 'e-poşta buğattalğan',
'range_block_disabled'        => 'Awqım buğattawların jasaw äkimşilik mümkindigi öşirilgen.',
'ipb_expiry_invalid'          => 'Bitetin waqıtı jaramsız.',
'ipb_already_blocked'         => '«$1» aldaqaşan buğattalğan',
'ipb_cant_unblock'            => 'Qatelik: IP $1 buğattawı tabılmadı. Onıñ buğattawı aldaqaşan öşirlgen mümkin.',
'ipb_blocked_as_range'        => 'Qatelik: IP $1 tikeleý buğattalmağan jäne buğattawı öşirilmeýdi. Biraq, bul buğattawı öşirilwi mümkin $2 awqımı böligi bop buğattalğan.',
'ip_range_invalid'            => 'IP jaý awqımı jaramsız.',
'blockme'                     => 'Özdiktik_buğattaw',
'proxyblocker'                => 'Proksï serverlerdi buğattawış',
'proxyblocker-disabled'       => 'Bul fwnkcïya öşirilgen.',
'proxyblockreason'            => 'IP jaýıñız aşıq proksï serverge jatatındıqtan buğattalğan. Ïnternet qızmetin jabdıqtawşıñızben, ne texnïkalıq medew qızmetimen qatınasıñız, jäne olarğa osı ote kürdeli qawıpsizdik şataq twralı aqparat beriñiz.',
'proxyblocksuccess'           => 'Bitti.',
'sorbsreason'                 => 'Sizdiñ IP jaýıñız {{SITENAME}} torabında qoldanılğan DNSBL qara tizimindegi aşıq proksï-server dep tabıladı.',
'sorbs_create_account_reason' => 'Sizdiñ IP jaýıñız {{SITENAME}} torabında qoldanılğan DNSBL qara tizimindegi aşıq proksï-server dep tabıladı. Tirkelgini jarata almaýsız.',

# Developer tools
'lockdb'              => 'Derekqordı qulıptaw',
'unlockdb'            => 'Derekqordı qulıptamaw',
'lockdbtext'          => 'Derekqordın qulıptalwı barlıq qatıswşılardıñ
bet öñdew, baptawın qalaw, baqılaw tizimin, tağı basqa
derekqordı özgertetin mümkindikterin toqtata turadı.
Osı maqsatıñızdı, jäne jöndewiñiz bitkende
derekqordı aşatıñızdı quptañız.',
'unlockdbtext'        => 'Derekqodın aşılwı barlıq qatıswşılardıñ bet öñdew,
baptawın qalaw, baqılaw tizimin, tağı basqa derekqordı özgertetin
mümkindikterin qalpına keltiredi.
Osı maqsatıñızdı quptañız.',
'lockconfirm'         => 'Ïä, men derekqordı rastan qulıptaýmın.',
'unlockconfirm'       => 'Ïä, men derekqordı rastan qulıptamaýmın.',
'lockbtn'             => 'Derekqordı qulıpta',
'unlockbtn'           => 'Derekqordı qulıptama',
'locknoconfirm'       => 'Quptaw belgisin qoýmapsız.',
'lockdbsuccesssub'    => 'Derekqor qulıptawı sätti ötti',
'unlockdbsuccesssub'  => 'Derekqor qulıptawı alastaldı',
'lockdbsuccesstext'   => 'Derekqor qulıptaldı.
<br />Jöndewiñiz bitkennen keýin [[{{ns:special}}:Unlockdb|qulıptawın alastawğa]] umıtpañız.',
'unlockdbsuccesstext' => 'Qulıptalğan derekqor sätti aşıldı.',
'lockfilenotwritable' => 'Derekqor qulıptaw faýlı jazılmaýdı. Derekqordı qulıptaw ne aşw üşin, veb-server faýlğa jazw ruqsatı bolw kerek.',
'databasenotlocked'   => 'Derekqor qulıptalğan joq.',

# Move page
'movepage'                => 'Betti jıljıtw',
'movepagetext'            => "Tömendegi pişindi qoldanıp betterdi qaýta ataýdı,
barlıq tarïxın jaña atawğa jıljıtadı.
Burınğı bet atawı jaña atawğa aýdatatın bet boladı.
Eski atawına silteýtin siltemeler özgertilmeýdi; jıljıtwdan soñ
şınjırlı ne jaramsız aýdatwlar bar-joğın tekserip şığıñız.
Siltemeler burınğı joldawımen bılaýğı ötwin tekserwine
siz mindetti bolasız.

Añğartpa: eger mında aldaqaşan jaña atawı bar bet bolsa, jäne soñğı tüzetw tarïxsız
bos bet ne aýdatw bolğanşa deýin, bet '''jıljıtılmaýdı'''.
Osınıñ mağınası: eger betti qatelikpen qaýta atasañız,
burınğı atawına qaýta atawğa boladı, jäne bar bettiñ üstine
jazwıñızğa bolmaýdı.

<b>QULAQTANDIRW!</b>
Bul köp qaralatın betke qatañ jäne kenet özgeris jasawğa mümkin;
ärekettiñ aldınan osınıñ zardaptarın tüsingeniñizge batıl
bolıñız.",
'movepagetalktext'        => "Kelesi sebepter '''bolğanşa''' deýin, talqılaw beti bunımen birge özdiktik jıljıtıladı:
* Bos emes talqılaw beti jaña atawda aldaqaşan bolğanda, ne
* Tömendegi qabışaqta belgini boldırmağanda.

Osı oraýda, qalawıñız bolsa, betti qoldan jıljıta ne qosa alasız.",
'movearticle'             => 'Betti jıljıtw:',
'movenologin'             => 'Jüýege kirmegensiz',
'movenologintext'         => 'Betti jıljıtw üşin tirkelgen bolwıñız jäne [[{{ns:special}}:Userlogin|kirwiñiz]] kerek.',
'movenotallowed'          => '{{SITENAME}} jobasında betterdi jıljıtw rwqsatıñız joq.',
'newtitle'                => 'Jaña atawğa:',
'move-watch'              => 'Bul betti baqılaw',
'movepagebtn'             => 'Betti jıljıt',
'pagemovedsub'            => 'Jıljıtw sätti ayaqtaldı',
'movepage-moved'          => "<big>'''«$1» degen «$2» degenge jıljıtıldı'''</big>", # The two titles are passed in plain text as $3 and $4 to allow additional goodies in the message.
'articleexists'           => 'Osılaý atalğan bet aldaqaşan bar, ne
tañdağan atawıñız jaramdı emes.
Basqa ataw tandañız',
'cantmove-titleprotected' => 'Betti mına orınğa jıljıta almaýsız, sebebi osı jaña ataw jaratılwı qorğalğan',
'talkexists'              => "'''Bettiñ özi sätti jıljıtıldı, biraq talqılaw beti birge jıljıtılmadı, onıñ sebebi jaña atawdıñ talqılaw beti aldaqaşan bar. Bunı qolmen qosıñız.'''",
'movedto'                 => 'mınağan jıljıtıldı:',
'movetalk'                => 'Qatıstı talqılaw betimen birge jıljıtw',
'talkpagemoved'           => 'Qatıstı talqılaw beti de jıljıtıldı.',
'talkpagenotmoved'        => 'Qatıstı talqılaw beti <strong>jıljıtılmadı</strong>.',
'1movedto2'               => '«[[$1]]» betinde aýdatw qaldırıp «[[$2]]» betine jıljıttı',
'1movedto2_redir'         => '«[[$1]]» betin «[[$2]]» aýdatw betiniñ üstine jıljıttı',
'movelogpage'             => 'Jıljıtw jwrnalı',
'movelogpagetext'         => 'Tömende jıljıtılğan betterdiñ tizimi berilip tur.',
'movereason'              => 'Sebebi:',
'revertmove'              => 'qaýtarw',
'delete_and_move'         => 'Joyw jäne jıljıtw',
'delete_and_move_text'    => '==Joyw kerek==

Nısana bet «[[$1]]» aldaqaşan bar. Jıljıtwğa jol berw üşin joyamız ba?',
'delete_and_move_confirm' => 'Ïä, bul betti joý',
'delete_and_move_reason'  => 'Jıljıtwğa jol berw üşin joýılğan',
'selfmove'                => 'Qaýnar jäne nısana atawı birdeý; bet özine jıljıtılmaýdı.',
'immobile_namespace'      => 'Qaýnar ne nısana atawı arnaýı türine jatadı; osındaý esim ayasına jäne esim ayasınan better jıljıtılmaýdı.',

# Export
'export'            => 'Betterdi sırtqa berw',
'exporttext'        => 'XML pişimine qaptalğan bölek bet ne better bwması
mätiniñ jäne öñdew tarïxın sırtqa bere alasız. Osını, basqa wïkïge
jüýeniñ [[{{ns:special}}:Import|sırttan alw betin]] paýdalanıp, alwğa boladı.

Betterdi sırtqa berw üşin, atawların tömendegi mätin awmağına engiziñiz
(bir jolda bir ataw), jäne de bölekteñiz: ne ağımdıq nusqasın, barlıq eski nusqaları men
jäne tarïxı joldarı men birge, nemese däl ağımdıq nusqasın, soñğı öñdew twralı aqparatı men birge.

Soñğı jağdaýda siltemeni de, mısalı «{{{{ns:mediawiki}}:Mainpage}}» beti üşin [[{{ns:special}}:Export/{{MediaWiki:Mainpage}}]] qoldanwğa boladı.',
'exportcuronly'     => 'Tolıq tarïxın emes, tek ağımdıq nusqasın kiristiriñiz',
'exportnohistory'   => "----
'''Añğartpa:''' Önimdilik äseri sebepterinen, betterdiñ tolıq tarïxın bul pişinmen sırtqa berwi öşirilgen.",
'export-submit'     => 'Sırtqa ber',
'export-addcattext' => 'Mına sanattağı betterdi üstew:',
'export-addcat'     => 'Üste',
'export-download'   => 'Faýl türinde saqtaw',
'export-templates'  => 'Ülgilerdi qosa alıp',

# Namespace 8 related
'allmessages'               => 'Jüýe xabarları',
'allmessagesname'           => 'Atawı',
'allmessagesdefault'        => 'Ädepki mätini',
'allmessagescurrent'        => 'Ağımdıq mätini',
'allmessagestext'           => 'Bul {{ns:mediawiki}} esim ayasında qatınawlı jüýe xabar tizimi.',
'allmessagesnotsupportedDB' => "'''\$wgUseDatabaseMessages''' öşirilgen sebebinen '''{{ns:special}}:AllMessages''' beti qoldanılmaýdı.",
'allmessagesfilter'         => 'Xabar atawımen süzgilew:',
'allmessagesmodified'       => 'Tek özgertilgendi körset',

# Thumbnails
'thumbnail-more'           => 'Ülkeýtw',
'filemissing'              => 'Joğalğan faýl',
'thumbnail_error'          => 'Nobaý jaratılw qatesi: $1',
'djvu_page_error'          => 'DjVu beti mümkindi awmaqtıñ sırtındda',
'djvu_no_xml'              => 'DjVu faýlına XML keltirwge bolmaýdı',
'thumbnail_invalid_params' => 'Nobaýdıñ baptalımdarı jaramsız',
'thumbnail_dest_directory' => 'Nısana qalta jaratılmadı',

# Special:Import
'import'                     => 'Betterdi sırttan alw',
'importinterwiki'            => 'Wïkï-tasımaldap sırttan alw',
'import-interwiki-text'      => 'Sırttan alatın wïkï jobasın jäne bet atawın bölekteñiz.
Nusqa kün-aýı jäne öñdewşi attarı saqtaladı.
Barlıq wïkï-tasımaldap sırttan alw äreketter [[{{ns:special}}:Log/import|sırttan alw jwrnalına]] jazılıp alınadı.',
'import-interwiki-history'   => 'Osı bettiñ barlıq tarïxï nusqaların köşirw',
'import-interwiki-submit'    => 'Sırttan alw',
'import-interwiki-namespace' => 'Mına esim ayasına betterdi tasımaldaw:',
'importtext'                 => 'Qaýnar wïkïden «Special:Export» qwralın qoldanıp, faýldı sırtqa beriñiz, dïskiñizge saqtañız, sosın mında qotarıñız.',
'importstart'                => 'Betterdi sırttan alwı…',
'import-revision-count'      => '{{PLURAL:$1|1|$1}} nusqa',
'importnopages'              => 'Sırttan alınatın better joq.',
'importfailed'               => 'Sırttan alw sätsiz bitti: $1',
'importunknownsource'        => 'Cırttan alw qaýnar türi tanımalsız',
'importcantopen'             => 'Sırttan alw faýlı aşılmaýdı',
'importbadinterwiki'         => 'Jaramsız wïkï-aralıq silteme',
'importnotext'               => 'Bostı, ne mätini joq',
'importsuccess'              => 'Sırttan alwı ayaqtaldı!',
'importhistoryconflict'      => 'Tarïxınıñ eges nusqaları bar (bul betti aldında sırttan alınğan sïyaqtı)',
'importnosources'            => 'Eşqandaý wïkï-tasımaldap sırttan alw qaýnarı belgilenmegen, jäne tarïxın tikeleý qotarwı öşirilgen.',
'importnofile'               => 'Sırttan alınatın faýl qotarılğan joq.',
'importuploaderrorsize'      => 'Sırttan alınatın faýldıñ qotarwı sätsiz ötti. Faýl mölşeri qotarwğa rwqsat etilgennen artıq.',
'importuploaderrorpartial'   => 'Sırttan alınatın faýldıñ qotarwı sätsiz ötti. Osı faýldıñ tek bölikteri qotarıldı.',
'importuploaderrortemp'      => 'Sırttan alınatın faýldıñ qotarwı sätsiz ötti. Waqıtşa qalta tabılmadı.',
'import-parse-failure'       => 'Sırttan alğanda XML öndetwi buzıldı',
'import-noarticle'           => 'Sırttan alatın eş bet joq!',
'import-nonewrevisions'      => 'Barlıq nusqaları aldında sırttan alınğan.',
'xml-error-string'           => '$1 nömir $2 jolda, bağan $3 (baýt $4): $5',

# Import log
'importlogpage'                    => 'Sırttan alw jwrnalı',
'importlogpagetext'                => 'Basqa wïkïlerden öñdew tarïxımen birge betterdi äkimşilik retinde sırttan alw.',
'import-logentry-upload'           => 'faýl qotarwımen sırttan «[[$1]]» beti alındı',
'import-logentry-upload-detail'    => '{{PLURAL:$1|1|$1}} nusqa',
'import-logentry-interwiki'        => 'wïkï arasınan tasımaldanğan $1',
'import-logentry-interwiki-detail' => '$2 degennen {{PLURAL:$1|1|$1}} nusqa',

# Tooltip help for the actions
'tooltip-pt-userpage'             => 'Jeke betim',
'tooltip-pt-anonuserpage'         => 'Osı IP jaýdıñ jeke beti',
'tooltip-pt-mytalk'               => 'Talqılaw betim',
'tooltip-pt-anontalk'             => 'Osı IP jaý tüzetwlerin talqılaw',
'tooltip-pt-preferences'          => 'Baptawım',
'tooltip-pt-watchlist'            => 'Özgeristerin baqılap turğan better tizimim.',
'tooltip-pt-mycontris'            => 'Ülesterimdiñ tizimi',
'tooltip-pt-login'                => 'Kirwiñizdi usınamız, ol mindetti emes.',
'tooltip-pt-anonlogin'            => 'Kirwiñizdi usınamız, biraq, ol mindetti emes.',
'tooltip-pt-logout'               => 'Şığw',
'tooltip-ca-talk'                 => 'Mağlumat betti talqılaw',
'tooltip-ca-edit'                 => 'Bul betti öñdeý alasız. Saqtawdıñ aldında «Qarap şığw» batırmasın nuqıñız.',
'tooltip-ca-addsection'           => 'Bul talqılaw betinde jaña taraw bastaw.',
'tooltip-ca-viewsource'           => 'Bul bet qorğalğan, biraq, qaýnarın qarawğa boladı.',
'tooltip-ca-history'              => 'Bul bettin jwıqtağı nusqaları.',
'tooltip-ca-protect'              => 'Bul betti qorğaw',
'tooltip-ca-delete'               => 'Bul betti joyw',
'tooltip-ca-undelete'             => 'Bul bettiñ joywdıñ aldındağı bolğan tüzetwlerin qalpına keltirw',
'tooltip-ca-move'                 => 'Bul betti jıljıtw',
'tooltip-ca-watch'                => 'Bul betti baqılaw tizimiñizge üstew',
'tooltip-ca-unwatch'              => 'Bul betti baqılaw tizimiñizden alastaw',
'tooltip-search'                  => '{{SITENAME}} jobasınan izdestirw',
'tooltip-search-go'               => 'Eger däl osı atawımen bolsa betke ötip ketw',
'tooltip-search-fulltext'         => 'Osı mätini bar betti izdew',
'tooltip-p-logo'                  => 'Bastı betke',
'tooltip-n-mainpage'              => 'Bastı betke kelip-ketiñiz',
'tooltip-n-portal'                => 'Joba twralı, ne istewiñizge bolatın, qaýdan tabwğa bolatın twralı',
'tooltip-n-currentevents'         => 'Ağımdağı oqïğalarğa qatıstı aqparat',
'tooltip-n-recentchanges'         => 'Osı wïkïdegi jwıqtağı özgerister tizimi.',
'tooltip-n-randompage'            => 'Kezdeýsoq betti jüktew',
'tooltip-n-help'                  => 'Anıqtama tabw ornı.',
'tooltip-n-sitesupport'           => 'Bizge järdem etiñiz',
'tooltip-t-whatlinkshere'         => 'Mında siltegen barlıq betterdiñ tizimi',
'tooltip-t-recentchangeslinked'   => 'Mınnan siltengen betterdiñ jwıqtağı özgeristeri',
'tooltip-feed-rss'                => 'Bul bettiñ RSS arnası',
'tooltip-feed-atom'               => 'Bul bettiñ Atom arnası',
'tooltip-t-contributions'         => 'Osı qatıswşınıñ üles tizimin qaraw',
'tooltip-t-emailuser'             => 'Osı qatıswşığa email jiberw',
'tooltip-t-upload'                => 'Swret ne taspa faýldarın qotarw',
'tooltip-t-specialpages'          => 'Barlıq arnaýı better tizimi',
'tooltip-t-print'                 => 'Bul bettiñ basıp şığarışqa arnalğan nusqası',
'tooltip-t-permalink'             => 'Mına bettiñ osı nusqasınıñ turaqtı siltemesi',
'tooltip-ca-nstab-main'           => 'Mağlumat betin qaraw',
'tooltip-ca-nstab-user'           => 'Qatıswşı betin qaraw',
'tooltip-ca-nstab-media'          => 'Taspa betin qaraw',
'tooltip-ca-nstab-special'        => 'Bul arnaýı bet, bettiñ özi öñdelinbeýdi.',
'tooltip-ca-nstab-project'        => 'Joba betin qaraw',
'tooltip-ca-nstab-image'          => 'Swret betin qaraw',
'tooltip-ca-nstab-mediawiki'      => 'Jüýe xabarın qaraw',
'tooltip-ca-nstab-template'       => 'Ülgini qaraw',
'tooltip-ca-nstab-help'           => 'Anıqtıma betin qaraw',
'tooltip-ca-nstab-category'       => 'Sanat betin qaraw',
'tooltip-minoredit'               => 'Osını şağın tüzetw dep belgilew',
'tooltip-save'                    => 'Jasağan özgeristeriñizdi saqtaw',
'tooltip-preview'                 => 'Saqtawdıñ aldınan jasağan özgeristeriñizdi qarap şığıñız!',
'tooltip-diff'                    => 'Mätinge qandaý özgeristerdi jasağanıñızdı qaraw.',
'tooltip-compareselectedversions' => 'Bettiñ eki bölektengen nusqası aýırmasın qaraw.',
'tooltip-watch'                   => 'Bul betti baqılaw tizimiñizge üstew',
'tooltip-recreate'                => 'Bet joýılğanına qaramastan qaýta bastaw',
'tooltip-upload'                  => 'Qotarwdı bastaw',

# Metadata
'nodublincore'      => 'Bul serverde «Dublin Core RDF» türi qosımşa derekteri öşirilgen.',
'nocreativecommons' => 'Bul serverde «Creative Commons RDF» türi qosımşa derekteri öşirilgen.',
'notacceptable'     => 'Tutınğışıñız oqıp alw üşin pişimdelingen derekterdi osı wïkï server jetistire almaýdı.',

# Attribution
'anonymous'        => '{{SITENAME}} tirkelgisiz qatıswşı(ları)',
'siteuser'         => '{{SITENAME}} qatıswşı $1',
'lastmodifiedatby' => 'Bul betti $3 qatıswşı soñğı özgertken kezi: $2, $1.', # $1 date, $2 time, $3 user
'othercontribs'    => 'Şığarma negizin $1 jazğan.',
'others'           => 'basqalar',
'siteusers'        => '{{SITENAME}} qatıswşı(lar) $1',
'creditspage'      => 'Betti jazğandar',
'nocredits'        => 'Bul betti jazğandar twralı aqparat joq.',

# Spam protection
'spamprotectiontitle'    => '«Spam»-nan qorğaýtın süzgi',
'spamprotectiontext'     => 'Bul bettiñ saqtawın «spam» süzgisi buğattadı. Bunıñ sebebi sırtqı torap siltemesinen bolwı mümkin.',
'spamprotectionmatch'    => 'Kelesi «spam» mätini süzgilengen: $1',
'subcategorycount'       => 'Bul sanatta {{PLURAL:$1|bir|$1}} sanatşa bar.',
'categoryarticlecount'   => 'Bul sanatta {{PLURAL:$1|bir|$1}} bet bar.',
'category-media-count'   => 'Bul sanatta {{PLURAL:$1|bir|$1}} faýl bar.',
'listingcontinuesabbrev' => '(jalğ.)',
'spam_reverting'         => '$1 degenge siltemesi joq soñğı nusqasına qaýtarıldı',
'spam_blanking'          => '$1 degenge siltemesi bar barlıq nusqalar tazartıldı',

# Info page
'infosubtitle'   => 'Bet twralı mälimet',
'numedits'       => 'Tüzetw sanı (bet): $1',
'numtalkedits'   => 'Tüzetw sanı (talqılaw beti): $1',
'numwatchers'    => 'Baqılawşı sanı: $1',
'numauthors'     => 'Ärtürli awtorlar sanı (bet): $1',
'numtalkauthors' => 'Ärtürli awtor sanı (talqılaw beti): $1',

# Math options
'mw_math_png'    => 'Ärqaşan PNG körsetkiz',
'mw_math_simple' => 'Eger öte qarapaýım bolsa — HTML, äýtpese PNG',
'mw_math_html'   => 'Eger ıqtïmal bolsa — HTML, äýtpese PNG',
'mw_math_source' => 'Bunı TeX pişiminde qaldır (mätindik şolğıştarğa)',
'mw_math_modern' => 'Osı zamanğı şolğıştarına usınıladı',
'mw_math_mathml' => 'Eger ıqtïmal bolsa — MathML (sınaqtama)',

# Patrolling
'markaspatrolleddiff'                 => 'Küzette dep belgilew',
'markaspatrolledtext'                 => 'Osı betti küzetwde dep belgilew',
'markedaspatrolled'                   => 'Küzette dep belgilendi',
'markedaspatrolledtext'               => 'Talğanğan nusqa küzette dep belgilendi.',
'rcpatroldisabled'                    => 'Jwıqtağı özgerister Küzeti öşirilgen',
'rcpatroldisabledtext'                => 'Jwıqtağı özgerister Küzeti mümkindigi ağımda öşirilgen.',
'markedaspatrollederror'              => 'Küzette dep belgilenbeýdi',
'markedaspatrollederrortext'          => 'Küzette dep belgilew üşin nusqasın engiziñiz.',
'markedaspatrollederror-noautopatrol' => 'Öziñiz jasağan özgeristeriñizdi küzetke qoya almaýsız.',

# Patrol log
'patrol-log-page' => 'Küzet jwrnalı',
'patrol-log-line' => 'küzettegi $2 degenniñ $1 nusqasın belgiledi $3',
'patrol-log-auto' => '(özdiktik)',
'patrol-log-diff' => 'nömir $1',

# Image deletion
'deletedrevision'                 => 'Mına eski nusqasın joýdı: $1',
'filedeleteerror-short'           => 'Faýl joyw qatesi: $1',
'filedeleteerror-long'            => 'Mına faýldı joýğanda qateler kezdesti:

$1',
'filedelete-missing'              => '«$1» faýlı joýılmaýdı, sebebi ol joq.',
'filedelete-old-unregistered'     => 'Faýldın keltirilgen «$1» nusqası derekqorda joq.',
'filedelete-current-unregistered' => 'Keltirilgen «$1» faýl derekqorda joq.',
'filedelete-archive-read-only'    => '«$1» degen murağat qaltasına vebserver jaza almaýdı.',

# Browsing diffs
'previousdiff' => '← Aldıñğı aýırm.',
'nextdiff'     => 'Kelesi aýırm. →',

# Media information
'mediawarning'         => "'''Qulaqtandırw''': Bul faýl türinde qaskünemdi ämirlerdiñ bar bolwı ıqtïmal; bunı jegip jüýeñizge zïyan keltirwiñiz mümkin.<hr />",
'imagemaxsize'         => 'Sïpattaması betindegi swrettiñ mölşerin şektewi:',
'thumbsize'            => 'Nobaý mölşeri:',
'widthheight'          => '$1 × $2',
'widthheightpage'      => '$1 × $2, $3 bet',
'file-info'            => 'Faýl mölşeri: $1, MIME türi: $2',
'file-info-size'       => '($1 × $2 pïksel, faýl mölşeri: $3, MIME türi: $4)',
'file-nohires'         => '<small>Joğarı ajıratılımdığı jetimsiz.</small>',
'svg-long-desc'        => '(SVG faýlı, kesimdi $1 × $2 pïksel, faýl mölşeri: $3)',
'show-big-image'       => 'Joğarı ajıratılımdı',
'show-big-image-thumb' => '<small>Qarap şığw mölşeri: $1 × $2 pïksel</small>',

# Special:Newimages
'newimages'    => 'Eñ jaña faýldar qoýması',
'showhidebots' => '(bottardı $1)',
'noimages'     => 'Köretin eşteñe joq.',

# Video information, used by Language::formatTimePeriod() to format lengths in the above messages
'video-dims'     => '$1, $2 × $3',
'minutes-abbrev' => 'mïn',
'hours-abbrev'   => 'sağ',

# Bad image list
'bad_image_list' => 'Pişimi tömendegideý:

Tek tizim danaları (* nışanımen bastalıtın joldar) esepteledi. Joldıñ birinşi siltemesi jaramsız swretke siltew kerek.
Sol joldağı keýingi ärbir siltemeler eren bolıp esepteledi, mısalı jol işindegi kezdesetin swreti bar better.',

# Metadata
'metadata'          => 'Qosımşa mälimetter',
'metadata-help'     => 'Osı faýlda qosımşa mälimetter bar. Bälkim, osı mälimetter faýldı jasap şığarw, ne sandılaw üşin paýdalanğan sandıq kamera, ne mätinalğırdan alınğan. Eger osı faýl negizgi küýinen özgertilgen bolsa, keýbir ejeleleri özgertilgen fotoswretke laýıq bolmas.',
'metadata-expand'   => 'Egjeý-tegjeýin körset',
'metadata-collapse' => 'Egjeý-tegjeýin jasır',
'metadata-fields'   => 'Osı xabarda tizimdelgen EXIF qosımşa mälimetter awmaqtarı,
swret beti körsetw kezinde qosımşa mälimetter keste jasırılığanda kiristirledi.
Basqaları ädepkiden jasırıladı.
* make
* model
* datetimeoriginal
* exposuretime
* fnumber
* focallength', # Do not translate list items

# EXIF tags
'exif-imagewidth'                  => 'Eni',
'exif-imagelength'                 => 'Bïiktigi',
'exif-bitspersample'               => 'Quraş saýın bït sanı',
'exif-compression'                 => 'Qısım sulbası',
'exif-photometricinterpretation'   => 'Pïksel qïıswı',
'exif-orientation'                 => 'Megzewi',
'exif-samplesperpixel'             => 'Quraş sanı',
'exif-planarconfiguration'         => 'Derek rettewi',
'exif-ycbcrsubsampling'            => 'Y quraşınıñ C quraşına jarnaqtawı',
'exif-ycbcrpositioning'            => 'Y quraşı jäne C quraşı mekendewi',
'exif-xresolution'                 => 'Dereleý ajıratılımdığı',
'exif-yresolution'                 => 'Tireleý ajıratılımdığı',
'exif-resolutionunit'              => 'X jäne Y ajıratılımdıqtarığınıñ ölşemi',
'exif-stripoffsets'                => 'Swret dererekteriniñ jaýğaswı',
'exif-rowsperstrip'                => 'Beldik saýın jol sanı',
'exif-stripbytecounts'             => 'Qısımdalğan beldik saýın baýt sanı',
'exif-jpeginterchangeformat'       => 'JPEG SOI degenge ığıswı',
'exif-jpeginterchangeformatlength' => 'JPEG derekteriniñ baýt sanı',
'exif-transferfunction'            => 'Tasımaldaw fwnkcïyası',
'exif-whitepoint'                  => 'Aq nükte tüstiligi',
'exif-primarychromaticities'       => 'Alğı şeptegi tüstilikteri',
'exif-ycbcrcoefficients'           => 'Tüs ayasın tasımaldaw matrïcalıq eselikteri',
'exif-referenceblackwhite'         => 'Qara jäne aq anıqtawış qos kolemderi',
'exif-datetime'                    => 'Faýldıñ özgertilgen kün-aýı',
'exif-imagedescription'            => 'Swret atawı',
'exif-make'                        => 'Kamera öndirwşisi',
'exif-model'                       => 'Kamera ülgisi',
'exif-software'                    => 'Qoldanılğan bağdarlama',
'exif-artist'                      => 'Jığarmaşısı',
'exif-copyright'                   => 'Jığarmaşılıq quqıqtar ïesi',
'exif-exifversion'                 => 'Exif nusqası',
'exif-flashpixversion'             => 'Süýemdelingen Flashpix nusqası',
'exif-colorspace'                  => 'Tüs ayası',
'exif-componentsconfiguration'     => 'Ärqaýsı quraş mäni',
'exif-compressedbitsperpixel'      => 'Swret qısımdaw tärtibi',
'exif-pixelydimension'             => 'Swrettiñ jaramdı eni',
'exif-pixelxdimension'             => 'Swrettiñ jaramdı bïiktigi',
'exif-makernote'                   => 'Öndirwşiniñ añğartpaları',
'exif-usercomment'                 => 'Qatıswşınıñ mändemeleri',
'exif-relatedsoundfile'            => 'Qatıstı dıbıs faýlı',
'exif-datetimeoriginal'            => 'Jasalğan kezi',
'exif-datetimedigitized'           => 'Sandıqtaw kezi',
'exif-subsectime'                  => 'Jasalğan keziniñ sekwnd bölşekteri',
'exif-subsectimeoriginal'          => 'Tüpnusqa keziniñ sekwnd bölşekteri',
'exif-subsectimedigitized'         => 'Sandıqtaw keziniñ sekwnd bölşekteri',
'exif-exposuretime'                => 'Ustalım waqıtı',
'exif-exposuretime-format'         => '$1 s ($2)',
'exif-fnumber'                     => 'Sañılaw mölşeri',
'exif-exposureprogram'             => 'Ustalım bağdarlaması',
'exif-spectralsensitivity'         => 'Spektr boýınşa sezgiştigi',
'exif-isospeedratings'             => 'ISO jıldamdıq jarnaqtawı (jarıq sezgiştigi)',
'exif-oecf'                        => 'Optoelektrondı türletw ıqpalı',
'exif-shutterspeedvalue'           => 'Japqış jıldamdılığı',
'exif-aperturevalue'               => 'Sañılawlıq',
'exif-brightnessvalue'             => 'Aşıqtıq',
'exif-exposurebiasvalue'           => 'Ustalım ötemi',
'exif-maxaperturevalue'            => 'Barınşa sañılaw aşwı',
'exif-subjectdistance'             => 'Nısana qaşıqtığı',
'exif-meteringmode'                => 'Ölşew tärtibi',
'exif-lightsource'                 => 'Jarıq közi',
'exif-flash'                       => 'Jarqıldağış',
'exif-focallength'                 => 'Şoğırlaw alşaqtığı',
'exif-subjectarea'                 => 'Nısana awqımı',
'exif-flashenergy'                 => 'Jarqıldağış qarqını',
'exif-spatialfrequencyresponse'    => 'Keñistik-jïilik äserşiligi',
'exif-focalplanexresolution'       => 'X boýınşa şoğırlaw jaýpaqtıqtıñ ajıratılımdığı',
'exif-focalplaneyresolution'       => 'Y boýınşa şoğırlaw jaýpaqtıqtıñ ajıratılımdığı',
'exif-focalplaneresolutionunit'    => 'Şoğırlaw jaýpaqtıqtıñ ajıratılımdıq ölşemi',
'exif-subjectlocation'             => 'Nısana mekendewi',
'exif-exposureindex'               => 'Ustalım aýqındawı',
'exif-sensingmethod'               => 'Sensordiñ ölşew ädisi',
'exif-filesource'                  => 'Faýl qaýnarı',
'exif-scenetype'                   => 'Saxna türi',
'exif-cfapattern'                  => 'CFA süzgi keýipi',
'exif-customrendered'              => 'Qosımşa swret öñdetwi',
'exif-exposuremode'                => 'Ustalım tärtibi',
'exif-whitebalance'                => 'Aq tüsiniñ tendestigi',
'exif-digitalzoomratio'            => 'Sandıq awqımdaw jarnaqtawı',
'exif-focallengthin35mmfilm'       => '35 mm taspasınıñ şoğırlaw alşaqtığı',
'exif-scenecapturetype'            => 'Tüsirgen saxna türi',
'exif-gaincontrol'                 => 'Saxnanı meñgerw',
'exif-contrast'                    => 'Qarama-qarsılıq',
'exif-saturation'                  => 'Qanıqtıq',
'exif-sharpness'                   => 'Aýqındıq',
'exif-devicesettingdescription'    => 'Jabdıq baptaw sïpattaması',
'exif-subjectdistancerange'        => 'Saxna qaşıqtığınıñ kölemi',
'exif-imageuniqueid'               => 'Swrettiñ biregeý nömiri (ID)',
'exif-gpsversionid'                => 'GPS belgişesiniñ nusqası',
'exif-gpslatituderef'              => 'Soltüstik nemese Oñtüstik boýlığı',
'exif-gpslatitude'                 => 'Boýlığı',
'exif-gpslongituderef'             => 'Şığıs nemese Batıs endigi',
'exif-gpslongitude'                => 'Endigi',
'exif-gpsaltituderef'              => 'Bïiktik körsetwi',
'exif-gpsaltitude'                 => 'Bïiktik',
'exif-gpstimestamp'                => 'GPS waqıtı (atom sağatı)',
'exif-gpssatellites'               => 'Ölşewge pýdalanılğan Jer serikteri',
'exif-gpsstatus'                   => 'Qabıldağış küýi',
'exif-gpsmeasuremode'              => 'Ölşew tärtibi',
'exif-gpsdop'                      => 'Ölşew däldigi',
'exif-gpsspeedref'                 => 'Jıldamdılıq ölşemi',
'exif-gpsspeed'                    => 'GPS qabıldağıştıñ jıldamdılığı',
'exif-gpstrackref'                 => 'Qozğalıs bağıtın körsetwi',
'exif-gpstrack'                    => 'Qozğalıs bağıtı',
'exif-gpsimgdirectionref'          => 'Swret bağıtın körsetwi',
'exif-gpsimgdirection'             => 'Swret bağıtı',
'exif-gpsmapdatum'                 => 'Paýdalanılğan geodezïyalıq tüsirme derekteri',
'exif-gpsdestlatituderef'          => 'Nısana boýlığın körsetwi',
'exif-gpsdestlatitude'             => 'Nısana boýlığı',
'exif-gpsdestlongituderef'         => 'Nısana endigin körsetwi',
'exif-gpsdestlongitude'            => 'Nısana endigi',
'exif-gpsdestbearingref'           => 'Nısana azïmwtın körsetwi',
'exif-gpsdestbearing'              => 'Nısana azïmwtı',
'exif-gpsdestdistanceref'          => 'Nısana qaşıqtığın körsetwi',
'exif-gpsdestdistance'             => 'Nısana qaşıqtığı',
'exif-gpsprocessingmethod'         => 'GPS öñdetw ädisiniñ atawı',
'exif-gpsareainformation'          => 'GPS awmağınıñ atawı',
'exif-gpsdatestamp'                => 'GPS kün-aýı',
'exif-gpsdifferential'             => 'GPS saralanğan durıstaw',

# EXIF attributes
'exif-compression-1' => 'Ulğaýtılğan',

'exif-unknowndate' => 'Belgisiz kün-aýı',

'exif-orientation-1' => 'Qalıptı', # 0th row: top; 0th column: left
'exif-orientation-2' => 'Dereleý şağılısqan', # 0th row: top; 0th column: right
'exif-orientation-3' => '180° burışqa aýnalğan', # 0th row: bottom; 0th column: right
'exif-orientation-4' => 'Tireleý şağılısqan', # 0th row: bottom; 0th column: left
'exif-orientation-5' => 'Sağat tilşesine qarsı 90° burışqa aýnalğan jäne tireleý şağılısqan', # 0th row: left; 0th column: top
'exif-orientation-6' => 'Sağat tilşe boýınşa 90° burışqa aýnalğan', # 0th row: right; 0th column: top
'exif-orientation-7' => 'Sağat tilşe boýınşa 90° burışqa aýnalğan jäne tireleý şağılısqan', # 0th row: right; 0th column: bottom
'exif-orientation-8' => 'Sağat tilşesine qarsı 90° burışqa aýnalğan', # 0th row: left; 0th column: bottom

'exif-planarconfiguration-1' => 'talpaq pişim',
'exif-planarconfiguration-2' => 'taýpaq pişim',

'exif-componentsconfiguration-0' => 'bar bolmadı',

'exif-exposureprogram-0' => 'Anıqtalmağan',
'exif-exposureprogram-1' => 'Qolmen',
'exif-exposureprogram-2' => 'Bağdarlamalı ädis (qalıptı)',
'exif-exposureprogram-3' => 'Sañılaw basıñqılığı',
'exif-exposureprogram-4' => 'Isırma basıñqılığı',
'exif-exposureprogram-5' => 'Öner bağdarlaması (anıqtıq terendigine sanasqan)',
'exif-exposureprogram-6' => 'Qïmıl bağdarlaması (japqış şapşandılığına sanasqan)',
'exif-exposureprogram-7' => 'Tireleý ädisi (artı şoğırlawsız tayaw tüsirmeler)',
'exif-exposureprogram-8' => 'Dereleý ädisi (artı şoğırlanğan dereleý tüsirmeler)',

'exif-subjectdistance-value' => '$1 m',

'exif-meteringmode-0'   => 'Belgisiz',
'exif-meteringmode-1'   => 'Birkelki',
'exif-meteringmode-2'   => 'Buldır daq',
'exif-meteringmode-3'   => 'BirDaqtı',
'exif-meteringmode-4'   => 'KöpDaqtı',
'exif-meteringmode-5'   => 'Örnekti',
'exif-meteringmode-6'   => 'Jırtındı',
'exif-meteringmode-255' => 'Basqa',

'exif-lightsource-0'   => 'Belgisiz',
'exif-lightsource-1'   => 'Kün jarığı',
'exif-lightsource-2'   => 'Künjarıqtı şam',
'exif-lightsource-3'   => 'Qızdırğıştı şam',
'exif-lightsource-4'   => 'Jarqıldağış',
'exif-lightsource-9'   => 'Aşıq kün',
'exif-lightsource-10'  => 'Bulınğır kün',
'exif-lightsource-11'  => 'Kölenkeli',
'exif-lightsource-12'  => 'Künjarıqtı şam (D 5700–7100 K)',
'exif-lightsource-13'  => 'Künjarıqtı şam (N 4600–5400 K)',
'exif-lightsource-14'  => 'Künjarıqtı şam (W 3900–4500 K)',
'exif-lightsource-15'  => 'Künjarıqtı şam (WW 3200–3700 K)',
'exif-lightsource-17'  => 'Qalıptı jarıq qaýnarı A',
'exif-lightsource-18'  => 'Qalıptı jarıq qaýnarı B',
'exif-lightsource-19'  => 'Qalıptı jarıq qaýnarı C',
'exif-lightsource-24'  => 'Stwdïyalıq ISO künjarıqtı şam',
'exif-lightsource-255' => 'Basqa jarıq qaýnarı',

'exif-focalplaneresolutionunit-2' => 'dywým',

'exif-sensingmethod-1' => 'Anıqtalmağan',
'exif-sensingmethod-2' => '1-çïpti awmaqtı tüssezgiş',
'exif-sensingmethod-3' => '2-çïpti awmaqtı tüssezgiş',
'exif-sensingmethod-4' => '3-çïpti awmaqtı tüssezgiş',
'exif-sensingmethod-5' => 'Kezekti awmaqtı tüssezgiş',
'exif-sensingmethod-7' => '3-sızıqtı tüssezgiş',
'exif-sensingmethod-8' => 'Kezekti sızıqtı tüssezgiş',

'exif-scenetype-1' => 'Tikeleý tüsirilgen fotoswret',

'exif-customrendered-0' => 'Qalıptı öñdetw',
'exif-customrendered-1' => 'Qosımşa öñdetw',

'exif-exposuremode-0' => 'Özdiktik ustalımdaw',
'exif-exposuremode-1' => 'Qolmen ustalımdaw',
'exif-exposuremode-2' => 'Özdiktik jarqıldaw',

'exif-whitebalance-0' => 'Aq tüsi özdiktik tendestirilgen',
'exif-whitebalance-1' => 'Aq tüsi qolmen tendestirilgen',

'exif-scenecapturetype-0' => 'Qalıptı',
'exif-scenecapturetype-1' => 'Dereleý',
'exif-scenecapturetype-2' => 'Tireleý',
'exif-scenecapturetype-3' => 'Tüngi saxna',

'exif-gaincontrol-0' => 'Joq',
'exif-gaincontrol-1' => 'Tömen zorayw',
'exif-gaincontrol-2' => 'Joğarı zorayw',
'exif-gaincontrol-3' => 'Tömen bayawlaw',
'exif-gaincontrol-4' => 'Joğarı bayawlaw',

'exif-contrast-0' => 'Qalıptı',
'exif-contrast-1' => 'Uyan',
'exif-contrast-2' => 'Turpaýı',

'exif-saturation-0' => 'Qalıptı',
'exif-saturation-1' => 'Tömen qanıqtı',
'exif-saturation-2' => 'Joğarı qanıqtı',

'exif-sharpness-0' => 'Qalıptı',
'exif-sharpness-1' => 'Uyan',
'exif-sharpness-2' => 'Turpaýı',

'exif-subjectdistancerange-0' => 'Belgisiz',
'exif-subjectdistancerange-1' => 'Tayaw tüsirilgen',
'exif-subjectdistancerange-2' => 'Jaqın tüsirilgen',
'exif-subjectdistancerange-3' => 'Alıs tüsirilgen',

# Pseudotags used for GPSLatitudeRef and GPSDestLatitudeRef
'exif-gpslatitude-n' => 'Soltüstik boýlığı',
'exif-gpslatitude-s' => 'Oñtüstik boýlığı',

# Pseudotags used for GPSLongitudeRef and GPSDestLongitudeRef
'exif-gpslongitude-e' => 'Şığıs endigi',
'exif-gpslongitude-w' => 'Batıs endigi',

'exif-gpsstatus-a' => 'Ölşew ulaswda',
'exif-gpsstatus-v' => 'Ölşew özara ärekette',

'exif-gpsmeasuremode-2' => '2-bağıttıq ölşem',
'exif-gpsmeasuremode-3' => '3-bağıttıq ölşem',

# Pseudotags used for GPSSpeedRef and GPSDestDistanceRef
'exif-gpsspeed-k' => 'km/h',
'exif-gpsspeed-m' => 'mil/h',
'exif-gpsspeed-n' => 'knot',

# Pseudotags used for GPSTrackRef, GPSImgDirectionRef and GPSDestBearingRef
'exif-gpsdirection-t' => 'Şın bağıt',
'exif-gpsdirection-m' => 'Magnïttı bağıt',

# External editor support
'edit-externally'      => 'Bul faýldı sırtqı qural/bağdarlama arqılı öñdew',
'edit-externally-help' => 'Köbirek aqparat üşin [http://meta.wikimedia.org/wiki/Help:External_editors ornatw nusqawların] qarañız.',

# 'all' in various places, this might be different for inflected languages
'recentchangesall' => 'barlığın',
'imagelistall'     => 'barlığı',
'watchlistall2'    => 'barlıq',
'namespacesall'    => 'barlığı',
'monthsall'        => 'barlığı',

# E-mail address confirmation
'confirmemail'            => 'E-poşta jaýın quptaw',
'confirmemail_noemail'    => '[[{{ns:special}}:Preferences|Qatıswşı baptawıñızda]] jaramdı e-poşta jaýın qoýmapsız.',
'confirmemail_text'       => '{{SITENAME}} e-poşta mümkindikterin paýdalanw üşin aldınan e-poşta jaýıñızdıñ
jaramdılığın tekserip şığwıñız kerek. Öziñizdiñ jaýıñızğa quptaw xatın jiberw üşin tömendegi batırmanı nuqıñız.
Xattıñ işinde arnaýı kodı bar silteme kiristirledi; e-poşta jaýıñızdıñ jaramdılığın quptaw üşin
siltemeni şolğıştıñ meken-jaý jolağına engizip aşıñız.',
'confirmemail_pending'    => '<div class="error">
Quptaw belgilemeñiz aldaqaşan xatpen jiberilipti; eger jwıqta
tirkelseñiz, jaña belgilemeni suratw aldınan 
xat kelwin birşama mïnöt küte turıñız.
</div>',
'confirmemail_send'       => 'Quptaw belgilemesin jiberw',
'confirmemail_sent'       => 'Quptaw xatı jiberildi.',
'confirmemail_oncreate'   => 'Quptaw belgilemesi e-poşta adresiñizge jiberildi.
Bul belgileme kirw üdirisine keregi joq, biraq e-poşta negizindegi
wïkï mümkindikterdi qosw üşin bunı jetistirwiñiz kerek.',
'confirmemail_sendfailed' => 'Quptaw xatı jiberilmedi. Jaýdı jaramsız äripterine tekserip şığıñız.

Poşta jibergiştiñ qaýtarğanı: $1',
'confirmemail_invalid'    => 'Quptaw belgilemesi jaramsız. Belgilemeniñ merzimi bitken şığar.',
'confirmemail_needlogin'  => 'E-poşta jaýıñızdı quptaw üşin $1 kerek.',
'confirmemail_success'    => 'E-poşta jaýıñız quptaldı. Endi wïkïge kirip jumısqa kiriswge boladı',
'confirmemail_loggedin'   => 'E-poşta jaýıñız endi quptaldı.',
'confirmemail_error'      => 'Quptawñızdı saqtağanda belgisiz qate boldı.',
'confirmemail_subject'    => '{{SITENAME}} torabınan e-poşta jaýıñızdı quptaw xatı',
'confirmemail_body'       => "Keýbirew, $1 degen IP jaýınan, öziñiz bolwı mümkin,
{{SITENAME}} jobasında bul E-poşta jaýın qoldanıp «$2» degen tirkelgi jasaptı.

Osı tirkelgi şınınan sizdiki ekenin quptaw üşin, jäne {{SITENAME}} jobasınıñ
e-poşta mümkindikterin belsendirw üşin, mına siltemeni şolğışpen aşıñız:

$3

Bul sizdiki '''emes''' bolsa, siltemege ermeñiz. Quptaw belgilemesiniñ
merzimi $4 kezinde bitedi.",

# Scary transclusion
'scarytranscludedisabled' => '[Wïkï-ara kiregwi öşirilgen]',
'scarytranscludefailed'   => '[$1 üşin ülgi keltirwi sätsiz bitti; ğafw etiñiz]',
'scarytranscludetoolong'  => '[URL jaýı tım uzın; ğafw etiñiz]',

# Trackbacks
'trackbackbox'      => '<div id="mw_trackbacks">
Bul bettiñ añıstawları:<br />
$1
</div>',
'trackbackremove'   => '([$1 Joyw])',
'trackbacklink'     => 'Añıstaw',
'trackbackdeleteok' => 'Añıstaw sätti joýıldı.',

# Delete conflict
'deletedwhileediting' => 'Qulaqtandırw: Bul betti öñdewiñizdi bastağanda, osı bet joýıldı!',
'confirmrecreate'     => "Bul betti öñdewiñizdi bastağanda [[User:$1|$1]] ([[User_talk:$1|talqılawı]]) osı betti joýdı, keltirgen sebebi:
: ''$2''
Osı betti şınınan qaýta bastawın quptañız.",
'recreate'            => 'Qaýta bastaw',

'unit-pixel' => ' px',

# HTML dump
'redirectingto' => '[[$1]] betine aýdatwda…',

# action=purge
'confirm_purge'        => 'Qosalqı qaltadağı osı betin tazalaýmız ba?

$1',
'confirm_purge_button' => 'Jaraýdı',

# AJAX search
'searchcontaining' => "''$1'' mağlumatı bar betterden izdew.",
'searchnamed'      => "''$1'' atawı bar betterden izdew.",
'articletitles'    => "''$1'' dep bastalğan betterdi",
'hideresults'      => 'Nätïjelerdi jasır',
'useajaxsearch'    => 'AJAX qoldanıp izdew',

# Multipage image navigation
'imgmultipageprev' => '← aldıñğı betke',
'imgmultipagenext' => 'kelesi betke →',
'imgmultigo'       => 'Öt!',
'imgmultigotopre'  => 'Mına betke ötw',

# Table pager
'ascending_abbrev'         => 'ösw',
'descending_abbrev'        => 'kemw',
'table_pager_next'         => 'Kelesi betke',
'table_pager_prev'         => 'Aldıñğı betke',
'table_pager_first'        => 'Alğaşqı betke',
'table_pager_last'         => 'Soñğı betke',
'table_pager_limit'        => 'Bet saýın $1 dana körset',
'table_pager_limit_submit' => 'Ötw',
'table_pager_empty'        => 'Eş nätïje joq',

# Auto-summaries
'autosumm-blank'   => 'Bettiñ barlıq mağlumatın alastattı',
'autosumm-replace' => "Betti '$1' degenmen almastırdı",
'autoredircomment' => '[[$1]] degenge aýdadı',
'autosumm-new'     => 'Jaña bette: $1',

# Size units
'size-bytes' => '$1 baýt',

# Live preview
'livepreview-loading' => 'Jüktewde…',
'livepreview-ready'   => 'Jüktewde… Daýın!',
'livepreview-failed'  => 'Twra qarap şığw sätsiz! Kädimgi qarap şığw ädisin baýqap köriñiz.',
'livepreview-error'   => 'Qosılw sätsiz: $1 «$2». Kädimgi qarap şığw ädisin baýqap köriñiz.',

# Friendlier slave lag warnings
'lag-warn-normal' => '$1 sekwndtan jañalaw özgerister bul tizimde körsetilmewi mümkin.',
'lag-warn-high'   => 'Derekqor serveri zor keşigwi sebebinen, $1 sekwndtan jañalaw özgerister bul tizimde körsetilmewi mümkin.',

# Watchlist editor
'watchlistedit-numitems'       => 'Baqılaw tizimiñizde, talqılaw bettersiz, {{PLURAL:$1|1|$1}} ataw bar.',
'watchlistedit-noitems'        => 'Baqılaw tizimiñizde eş ataw joq.',
'watchlistedit-normal-title'   => 'Baqılaw tizimdi öñdew',
'watchlistedit-normal-legend'  => 'Baqılaw tizimdegi atawlardı alastaw',
'watchlistedit-normal-explain' => 'Baqılaw tizimiñizdegi atawlar tömende körsetiledi. Atawdı alastaw üşin, qasındağı qabaşaqtı
belgileñiz, jäne Atawlardı alastaw degendi nuqıñız. Tağı da [[{{ns:special}}:Watchlist/raw|qam tizimdi öñdeý]] alasız.',
'watchlistedit-normal-submit'  => 'Atawlardı alastaw',
'watchlistedit-normal-done'    => 'Baqılaw tizimiñizden {{PLURAL:$1|1|$1}} ataw alastaldı:',
'watchlistedit-raw-title'      => 'Qam baqılaw tizimdi öñdew',
'watchlistedit-raw-legend'     => 'Qam baqılaw tizimdi öñdew',
'watchlistedit-raw-explain'    => 'Baqılaw tizimiñizdegi atawlar tömende körsetiledi, jäne de tizmge üstep jäne
tizmden alastap öñdewge boladı; bir jolda bir ataw keledi. Bitirgennen soñ Baqılaw tizimdi jañartw degendi nuqıñız.
Tağı da [[Special:Watchlist/edit|qalıptı öñdewişti paýdalana]] alasız.',
'watchlistedit-raw-titles'     => 'Atawlar:',
'watchlistedit-raw-submit'     => 'Baqılaw tizimdi jañartw',
'watchlistedit-raw-done'       => 'Baqılaw tizimiñiz jañartıldı.',
'watchlistedit-raw-added'      => '{{PLURAL:$1|1|$1}} ataw üsteldi:',
'watchlistedit-raw-removed'    => '{{PLURAL:$1|1|$1}} ataw alastaldı:',

# Watchlist editing tools
'watchlisttools-view' => 'Qatıstı özgeristerdi qaraw',
'watchlisttools-edit' => 'Baqılaw tizimdi qaraw jäne öñdew',
'watchlisttools-raw'  => 'Qam baqılaw tizimdi öñdew',

# Iranian month names
'iranian-calendar-m1'  => 'pırwardïn',
'iranian-calendar-m2'  => 'ärdïbeşt',
'iranian-calendar-m3'  => 'xırdad',
'iranian-calendar-m4'  => 'tïr',
'iranian-calendar-m5'  => 'mırdad',
'iranian-calendar-m6'  => 'şerïyar',
'iranian-calendar-m7'  => 'mer',
'iranian-calendar-m8'  => 'aban',
'iranian-calendar-m9'  => 'azar',
'iranian-calendar-m10' => 'dï',
'iranian-calendar-m11' => 'bemin',
'iranian-calendar-m12' => 'aspand',

# Hebrew month names
'hebrew-calendar-m1'      => 'tişrï',
'hebrew-calendar-m2'      => 'xışwan',
'hebrew-calendar-m3'      => 'kislw',
'hebrew-calendar-m4'      => 'tot',
'hebrew-calendar-m5'      => 'şıbat',
'hebrew-calendar-m6'      => 'adar',
'hebrew-calendar-m6a'     => 'adar',
'hebrew-calendar-m6b'     => 'wadar',
'hebrew-calendar-m7'      => 'nïsan',
'hebrew-calendar-m8'      => 'ayar',
'hebrew-calendar-m9'      => 'sïwan',
'hebrew-calendar-m10'     => 'tımoz',
'hebrew-calendar-m11'     => 'ab',
'hebrew-calendar-m12'     => 'aýlol',
'hebrew-calendar-m1-gen'  => 'tişrïdiñ',
'hebrew-calendar-m2-gen'  => 'xışwandıñ',
'hebrew-calendar-m3-gen'  => 'kislwdiñ',
'hebrew-calendar-m4-gen'  => 'tottıñ',
'hebrew-calendar-m5-gen'  => 'şıbattıñ',
'hebrew-calendar-m6-gen'  => 'adardıñ',
'hebrew-calendar-m6a-gen' => 'adardıñ',
'hebrew-calendar-m6b-gen' => 'wadardıñ',
'hebrew-calendar-m7-gen'  => 'nïsannıñ',
'hebrew-calendar-m8-gen'  => 'ayardıñ',
'hebrew-calendar-m9-gen'  => 'sïwannıñ',
'hebrew-calendar-m10-gen' => 'tımozdıñ',
'hebrew-calendar-m11-gen' => 'abtıñ',
'hebrew-calendar-m12-gen' => 'aýloldıñ',

# Core parser functions
'unknown_extension_tag' => 'Tanılmağan keñeýtpe belgisi «$1»',

# Special:Filepath
'filepath'         => 'Faýl ornalaswı ',
'filepath-page'    => 'Faýl atı:',
'filepath-submit'  => 'Ornalaswın tabw ',
'filepath-summary' => 'Bul arnaýı bet faýl ornalaswı tolıq jolın qaýtaradı. Swretter tolıq ajıratılımdığımen körsetiledi, basqa faýl türlerine qatıstı bağdarlaması twra jegiledi.

Faýl atawın «{{ns:image}}:» degen bastawışsız eñgiziñiz.',

);
