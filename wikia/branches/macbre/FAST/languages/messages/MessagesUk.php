<?php
/** Ukrainian (Українська)
 *
 * @addtogroup Language
 *
 * @author Gutsul (Gutsul.ua at Google Mail)
 * @author Ahonc
 * @author Dubyk
 * @author Kalan
 * @author AS
 * @author Siebrand
 */

/*
 * УВАГА! НЕ РЕДАГУЙТЕ ЦЕЙ ФАЙЛ!
 *
 * Якщо необхідно змінити переклад окремих частин інтерфейсу,
 * то це можна зробити редагуючи сторінки типу «MediaWiki:*».
 * Їх список можна знайти на сторінці «Special:Allmessages».
 */

$separatorTransformTable = array(
	',' => "\xc2\xa0", # nbsp
	'.' => ','
);

$fallback8bitEncoding = 'windows-1251';
$linkPrefixExtension = true;

$namespaceNames = array(
	NS_MEDIA            => 'Медіа',
	NS_SPECIAL          => 'Спеціальні',
	NS_MAIN             => '',
	NS_TALK             => 'Обговорення',
	NS_USER             => 'Користувач',
	NS_USER_TALK        => 'Обговорення_користувача',
	#NS_PROJECT set by $wgMetaNamespace
  	NS_PROJECT_TALK     => 'Обговорення_{{grammar:genitive|$1}}',
	NS_IMAGE            => 'Зображення',
	NS_IMAGE_TALK       => 'Обговорення_зображення',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'Обговорення_MediaWiki',
	NS_TEMPLATE         => 'Шаблон',
	NS_TEMPLATE_TALK    => 'Обговорення_шаблону',
	NS_HELP             => 'Довідка',
	NS_HELP_TALK        => 'Обговорення_довідки',
	NS_CATEGORY         => 'Категорія',
	NS_CATEGORY_TALK    => 'Обговорення_категорії',
);



$skinNames = array(
	'standard' => 'Стандартне',
	'nostalgia' => 'Ностальгія',
	'cologneblue' => 'Кельнське Синє',
	'monobook' => 'Моно-книга',
	'myskin' => 'Своє',
	'chick' => 'Ціпка'
);

$dateFormats = array(
	'mdy time' => 'H:i',
	'mdy date' => 'xg j, Y',
	'mdy both' => 'H:i, xg j, Y',

	'dmy time' => 'H:i',
	'dmy date' => 'j xg Y',
	'dmy both' => 'H:i, j xg Y',

	'ymd time' => 'H:i',
	'ymd date' => 'Y xg j',
	'ymd both' => 'H:i, Y xg j',

	'ISO 8601 time' => 'xnH:xni:xns',
	'ISO 8601 date' => 'xnY-xnm-xnd',
	'ISO 8601 both' => 'xnY-xnm-xnd"T"xnH:xni:xns',

);

$bookstoreList = array(
	'Amazon.com' => 'http://www.amazon.com/exec/obidos/ISBN=$1'
);


# Note to translators:
#   Please include the English words as synonyms.  This allows people
#   from other wikis to contribute more easily.
#
$magicWords = array(
#   ID                                 CASE  SYNONYMS
	'redirect'               => array( 0,    '#REDIRECT', '#ПЕРЕНАПРАВЛЕННЯ', '#ПЕРЕНАПР'),
	'notoc'                  => array( 0,    '__NOTOC__', '__БЕЗ_ЗМІСТУ__'),
	'nogallery'              => array( 0,    '__NOGALLERY__', '__БЕЗ_ГАЛЕРЕЇ__'),
	'forcetoc'               => array( 0,    '__FORCETOC__',  '__ОБОВ_ЗМІСТ__'),
	'toc'                    => array( 0,    '__TOC__', '__ЗМІСТ__'),
	'noeditsection'          => array( 0,    '__NOEDITSECTION__', '__БЕЗ_РЕДАГУВ_РОЗДІЛУ__'),
	'currentmonth'           => array( 1,    'CURRENTMONTH', 'ПОТОЧНИЙ_МІСЯЦЬ'),
	'currentmonthname'       => array( 1,    'CURRENTMONTHNAME','НАЗВА_ПОТОЧНОГО_МІСЯЦЯ'),
	'currentmonthnamegen'    => array( 1,    'CURRENTMONTHNAMEGEN','НАЗВА_ПОТОЧНОГО_МІСЯЦЯ_РОД'),
	'currentmonthabbrev'     => array( 1,    'CURRENTMONTHABBREV', 'НАЗВА_ПОТОЧНОГО_МІСЯЦЯ_АБР'),
	'currentday'             => array( 1,    'CURRENTDAY','ПОТОЧНИЙ_ДЕНЬ'),
	'currentday2'            => array( 1,    'CURRENTDAY2','ПОТОЧНИЙ_ДЕНЬ_2'),
	'currentdayname'         => array( 1,    'CURRENTDAYNAME','НАЗВА_ПОТОЧНОГО_ДНЯ'),
	'currentyear'            => array( 1,    'CURRENTYEAR','ПОТОЧНИЙ_РІК'),
	'currenttime'            => array( 1,    'CURRENTTIME','ПОТОЧНИЙ_ЧАС'),
	'currenthour'            => array( 1,    'CURRENTHOUR' , 'ПОТОЧНА_ГОДИНА' ),
	'localmonth'             => array( 1,    'LOCALMONTH', 'ЛОКАЛЬН_МІСЯЦЬ' ),
	'localmonthname'         => array( 1,    'LOCALMONTHNAME', 'НАЗВА_ЛОКАЛЬН_МІСЯЦЯ'),
	'localmonthnamegen'      => array( 1,    'LOCALMONTHNAMEGEN', 'НАЗВА_ЛОКАЛЬН_МІСЯЦЯ_РОД'),
	'localmonthabbrev'       => array( 1,    'LOCALMONTHABBREV', 'НАЗВА_ЛОКАЛЬН_МІСЯЦЯ_АБР'),
	'localday'               => array( 1,    'LOCALDAY' , 'ЛОКАЛЬН_ДЕНЬ'),
	'localday2'              => array( 1,    'LOCALDAY2', 'ЛОКАЛЬН_ДЕНЬ_2'),
	'localdayname'           => array( 1,    'LOCALDAYNAME', 'НАЗВА_ЛОКАЛЬН_ДНЯ'),
	'localyear'              => array( 1,    'LOCALYEAR', 'ЛОКАЛЬН_РІК'),
	'localtime'              => array( 1,    'LOCALTIME', 'ЛОКАЛЬН_ЧАС'),
	'localhour'              => array( 1,    'LOCALHOUR', 'ЛОКАЛЬН_ГОДИНА'),
	'numberofpages'          => array( 1,    'NUMBEROFPAGES', 'КІЛЬКІСТЬ_СТОРІНОК'),
	'numberofarticles'       => array( 1,    'NUMBEROFARTICLES','КІЛЬКІСТЬ_СТАТЕЙ'),
	'numberoffiles'          => array( 1,    'NUMBEROFFILES', 'КІЛЬКІСТЬ_ФАЙЛІВ'),
	'numberofusers'          => array( 1,    'NUMBEROFUSERS', 'КІЛЬКІСТЬ_КОРИСТУВАЧІВ'),
	'pagename'               => array( 1,    'PAGENAME','НАЗВА_СТОРІНКИ'),
	'pagenamee'              => array( 1,    'PAGENAMEE','НАЗВА_СТОРІНКИ_2'),
	'namespace'              => array( 1,    'NAMESPACE','ПРОСТІР_ІМЕН'),
	'namespacee'             => array( 1,    'NAMESPACEE','ПРОСТІР_ІМЕН_2'),
	'talkspace'              => array( 1,    'TALKSPACE', 'ПРОСТІР_ОБГОВОРЕННЯ'),
	'talkspacee'             => array( 1,    'TALKSPACEE', 'ПРОСТІР_ОБГОВОРЕННЯ_2'),
	'subjectspace'           => array( 1,    'SUBJECTSPACE', 'ARTICLESPACE', 'ПРОСТІР_СТАТЕЙ' ),
	'subjectspacee'          => array( 1,    'SUBJECTSPACEE', 'ARTICLESPACEE', 'ПРОСТІР_СТАТЕЙ_2' ),
	'fullpagename'           => array( 1,    'FULLPAGENAME', 'ПОВНА_НАЗВА_СТОРІНКИ' ),
	'fullpagenamee'          => array( 1,    'FULLPAGENAMEE', 'ПОВНА_НАЗВА_СТОРІНКИ_2' ),
	'subpagename'            => array( 1,    'SUBPAGENAME', 'НАЗВА_ПІДСТОРІНКИ' ),
	'subpagenamee'           => array( 1,    'SUBPAGENAMEE', 'НАЗВА_ПІДСТОРІНКИ_2'),
	'basepagename'           => array( 1,    'BASEPAGENAME', 'ОСНОВА_НАЗВИ_ПІДСТОРІНКИ'),
	'basepagenamee'          => array( 1,    'BASEPAGENAMEE', 'ОСНОВА_НАЗВИ_ПІДСТОРІНКИ_2'),
	'talkpagename'           => array( 1,    'TALKPAGENAME', 'НАЗВА_СТОРІНКИ_ОБГОВОРЕННЯ'),
	'talkpagenamee'          => array( 1,    'TALKPAGENAMEE', 'НАЗВА_СТОРІНКИ_ОБГОВОРЕННЯ_2'),
	'subjectpagename'        => array( 1,    'SUBJECTPAGENAME', 'ARTICLEPAGENAME', 'НАЗВА_СТОРІНКИ_СТАТТІ' ),
	'subjectpagenamee'       => array( 1,    'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE', 'НАЗВА_СТОРІНКИ_СТАТТІ_2' ),
	'msg'                    => array( 0,    'MSG:', 'ПОВІД:'),
	'subst'                  => array( 0,    'SUBST:','ПІДРЯД:'),
	'msgnw'                  => array( 0,    'MSGNW:', 'ПОВІД_БЕЗ_ВІКІ:'),
	'img_thumbnail'          => array( 1,    'thumbnail', 'thumb', 'міні'),
	'img_manualthumb'        => array( 1,    'thumbnail=$1', 'thumb=$1', 'міні=$1'),
	'img_right'              => array( 1,    'right','праворуч'),
	'img_left'               => array( 1,    'left','ліворуч'),
	'img_none'               => array( 1,    'none', 'без'),
	'img_width'              => array( 1,    '$1px','$1пкс'),
	'img_center'             => array( 1,    'center', 'centre','центр'),
	'img_framed'             => array( 1,    'framed', 'enframed', 'frame','обрамити'),
	'img_page'               => array( 1,    'page=$1', 'page $1', 'сторінка=$1', 'сторінка $1' ),
	'int'                    => array( 0,    'INT:', 'ВНУТР:'),
	'sitename'               => array( 1,    'SITENAME','НАЗВА_САЙТУ'),
	'ns'                     => array( 0,    'NS:','ПІ:'),
	'localurl'               => array( 0,    'LOCALURL:', 'ЛОКАЛЬНА_АДРЕСА:'),
	'localurle'              => array( 0,    'LOCALURLE:', 'ЛОКАЛЬНА_АДРЕСА_2:'),
	'server'                 => array( 0,    'SERVER','СЕРВЕР'),
	'servername'             => array( 0,    'SERVERNAME', 'НАЗВА_СЕРВЕРА'),
	'scriptpath'             => array( 0,    'SCRIPTPATH', 'ШЛЯХ_ДО_СКРИПТУ'),
	'grammar'                => array( 0,    'GRAMMAR:', 'ВІДМІНОК:'),
	'notitleconvert'         => array( 0,    '__NOTITLECONVERT__', '__NOTC__', '__БЕЗ_ПЕРЕТВОРЕННЯ_ЗАГОЛОВКУ__'),
	'nocontentconvert'       => array( 0,    '__NOCONTENTCONVERT__', '__NOCC__', '__БЕЗ_ПЕРЕТВОРЕННЯ_ТЕКСТУ__'),
	'currentweek'            => array( 1,    'CURRENTWEEK','ПОТОЧНИЙ_ТИЖДЕНЬ'),
	'currentdow'             => array( 1,    'CURRENTDOW','ПОТОЧНИЙ_ДЕНЬ_ТИЖНЯ'),
	'localweek'              => array( 1,    'LOCALWEEK', 'ЛОКАЛЬН_ТИЖДЕНЬ' ),
	'localdow'               => array( 1,    'LOCALDOW', 'ЛОКАЛЬН_ДЕНЬ_ТИЖНЯ' ),
	'revisionid'             => array( 1,    'REVISIONID', 'ІД_ВЕРСІЇ'),
	'revisionday'            => array( 1,    'REVISIONDAY', 'ДЕНЬ_ВЕРСІЇ' ),
	'revisionday2'           => array( 1,    'REVISIONDAY2' , 'ДЕНЬ_ВЕРСІЇ_2'),
	'revisionmonth'          => array( 1,    'REVISIONMONTH' , 'МІСЯЦЬ_ВЕРСІЇ'),
	'revisionyear'           => array( 1,    'REVISIONYEAR' , 'РІК_ВЕРСІЇ'),
	'plural'                 => array( 0,    'PLURAL:', 'МНОЖИНА:' ),
	'fullurl'                => array( 0,    'FULLURL:', 'ПОВНА_АДРЕСА:' ),
	'fullurle'               => array( 0,    'FULLURLE:', 'ПОВНА_АДРЕСА_2:' ),
	'lcfirst'                => array( 0,    'LCFIRST:', 'ПЕРША_БУКВА_МАЛА:' ),
	'ucfirst'                => array( 0,    'UCFIRST:' , 'ПЕРША_БУКВА_ВЕЛИКА:' ),
	'lc'                     => array( 0,    'LC:' , 'МАЛИМИ_БУКВАМИ:' ),
	'uc'                     => array( 0,    'UC:', 'ВЕЛИКИМИ_БУКВАМИ:' ),
	'raw'                    => array( 0,    'RAW:', 'НЕОБРОБ:' ),
	'displaytitle'           => array( 1,    'DISPLAYTITLE' , 'ПОКАЗАТИ_ЗАГОЛОВОК' ),
	'rawsuffix'              => array( 1,    'R' , 'Н' ),
	'newsectionlink'         => array( 1,    '__NEWSECTIONLINK__', '__ПОСИЛАННЯ_НА_НОВИЙ_РОЗДІЛ__' ),
	'currentversion'         => array( 1,    'CURRENTVERSION' , 'ПОТОЧНА_ВЕРСІЯ' ),
	'urlencode'              => array( 0,    'URLENCODE:' , 'ЗАКОДОВАНА_АДРЕСА:' ),
	'anchorencode'           => array( 0,    'ANCHORENCODE', 'КОДУВАТИ_МІТКУ'),
	'currenttimestamp'       => array( 1,    'CURRENTTIMESTAMP' , 'ШТАМП_ПОТОЧНОГО_ЧАСУ' ),
	'localtimestamp'         => array( 1,    'LOCALTIMESTAMP' , 'ШТАМП_ЛОКОЛЬН_ЧАСУ'),
	'directionmark'          => array( 1,    'DIRECTIONMARK', 'DIRMARK' , 'НАПРЯМОК_ПИСЬМА' ),
	'language'               => array( 0,    '#LANGUAGE:' , '#МОВА:' ),
	'contentlanguage'        => array( 1,    'CONTENTLANGUAGE', 'CONTENTLANG', 'МОВА_ЗМІСТУ' ),
	'pagesinnamespace'       => array( 1,    'PAGESINNAMESPACE:', 'PAGESINNS:' , 'СТОРІНОК_В_ПРОСТОРІ_ІМЕН:' ),
	'numberofadmins'         => array( 1,    'NUMBEROFADMINS', 'КІЛЬКІСТЬ_АДМІНІСТРАТОРІВ' ),
	'formatnum'              => array( 0,    'FORMATNUM', 'ФОРМАТУВАТИ_ЧИСЛО' ),
	'padleft'                => array( 0,    'PADLEFT', 'ЗАПОВНИТИ_ЛІВОРУЧ'),
	'padright'               => array( 0,    'PADRIGHT', 'ЗАПОВНИТИ_ПРАВОРУЧ'),
	'special'                => array( 0,    'special', 'спеціальна' ),
	'defaultsort'            => array( 1,    'DEFAULTSORT:', 'СТАНДАРТНЕ_СОРТУВАННЯ'),
);

$linkTrail = '/^([a-zабвгґдеєжзиіїйклмнопрстуфхцчшщьєюяёъы“»]+)(.*)$/sDu';

$messages = array(
# User preference toggles
'tog-underline'               => 'Підкреслювати посилання:',
'tog-highlightbroken'         => 'Форматувати неіснуючі посилання <a href="" class="new">ось так</a> (альтернатива: ось так<a href="" class="internal">?</a>).',
'tog-justify'                 => 'Вирівнювати текст по ширині сторінки',
'tog-hideminor'               => 'Ховати незначні редагування у списку останніх змін',
'tog-extendwatchlist'         => 'Розширений список спостереження',
'tog-usenewrc'                => 'Покращений список останніх змін (JavaScript)',
'tog-numberheadings'          => 'Автоматично нумерувати заголовки',
'tog-showtoolbar'             => 'Показувати панель інструментів при редагуванні (JavaScript)',
'tog-editondblclick'          => 'Редагувати сторінки при подвійному клацанні мишкою (JavaScript)',
'tog-editsection'             => 'Показувати посилання [ред.] для кожного розділу',
'tog-editsectiononrightclick' => 'Редагувати розділи при клацанні правою кнопкою мишки на заголовку (JavaScript)',
'tog-showtoc'                 => 'Показувати зміст (для сторінок з більш ніж трьома заголовками)',
'tog-rememberpassword'        => "Запам'ятати мій обліковий запис на цьому комп'ютері",
'tog-editwidth'               => 'Розширювати поле редагування до меж вікна браузера',
'tog-watchcreations'          => 'Додавати створені мною сторінки до мого списку спостереження',
'tog-watchdefault'            => 'Додавати змінені мною сторінки до мого списку спостереження',
'tog-watchmoves'              => 'Додавати перейменовані мною сторінки до мого списку спостереження',
'tog-watchdeletion'           => 'Додавати вилучені мною сторінки до мого списку спостереження',
'tog-minordefault'            => 'Спочатку позначати всі зміни незначними',
'tog-previewontop'            => 'Показувати попередній перегляд перед вікном редагування, а не після',
'tog-previewonfirst'          => 'Показувати попередній перегляд при першому редагуванні',
'tog-nocache'                 => 'Заборонити кешування сторінок',
'tog-enotifwatchlistpages'    => 'Повідомляти електронною поштою, коли сторінка з мого списку спостереження змінилася',
'tog-enotifusertalkpages'     => 'Повідомляти електронною поштою про зміну моєї сторінки обговорення',
'tog-enotifminoredits'        => 'Надсилати мені електронного листа навіть при незначних редагуваннях',
'tog-enotifrevealaddr'        => 'Показувати мою поштову адресу в повідомленнях',
'tog-shownumberswatching'     => 'Показувати кількість користувачів, які додали сторінку до свого списку спостереження',
'tog-fancysig'                => 'Простий підпис (без автоматичного посилання)',
'tog-externaleditor'          => 'За замовчуванням використовувати зовнішній редактор',
'tog-externaldiff'            => 'За замовчуванням використовувати зовнішню програму порівняння версій',
'tog-showjumplinks'           => 'Активізувати допоміжні посилання «перейти до»',
'tog-uselivepreview'          => 'Використовувати швидкий попередній перегляд (JavaScript, експериментально)',
'tog-forceeditsummary'        => 'Попереджати, коли не зазначений короткий опис редагування',
'tog-watchlisthideown'        => 'Ховати мої редагування у списку спостереження',
'tog-watchlisthidebots'       => 'Ховати редагування ботів у списку спостереження',
'tog-watchlisthideminor'      => 'Ховати незначні редагування у списку спостереження',
'tog-nolangconversion'        => 'Відключити перетворення систем письма',
'tog-ccmeonemails'            => 'Відправляти мені копії листів, які я надсилаю іншим користувачам',
'tog-diffonly'                => 'Не показувати вміст сторінки під різницею версій',

'underline-always'  => 'Завжди',
'underline-never'   => 'Ніколи',
'underline-default' => 'Використати налаштування браузера',

'skinpreview' => '(Попередній перегляд)',

# Dates
'sunday'        => 'неділя',
'monday'        => 'понеділок',
'tuesday'       => 'вівторок',
'wednesday'     => 'середа',
'thursday'      => 'четвер',
'friday'        => "п'ятниця",
'saturday'      => 'субота',
'sun'           => 'Нд',
'mon'           => 'Пн',
'tue'           => 'Вт',
'wed'           => 'Ср',
'thu'           => 'Чт',
'fri'           => 'Пт',
'sat'           => 'Сб',
'january'       => 'січень',
'february'      => 'лютий',
'march'         => 'березень',
'april'         => 'квітень',
'may_long'      => 'травень',
'june'          => 'червень',
'july'          => 'липень',
'august'        => 'серпень',
'september'     => 'вересень',
'october'       => 'жовтень',
'november'      => 'листопад',
'december'      => 'грудень',
'january-gen'   => 'січня',
'february-gen'  => 'лютого',
'march-gen'     => 'березня',
'april-gen'     => 'квітня',
'may-gen'       => 'травня',
'june-gen'      => 'червня',
'july-gen'      => 'липня',
'august-gen'    => 'серпня',
'september-gen' => 'вересня',
'october-gen'   => 'жовтня',
'november-gen'  => 'листопада',
'december-gen'  => 'грудня',
'jan'           => 'січ',
'feb'           => 'лют',
'mar'           => 'бер',
'apr'           => 'квіт',
'may'           => 'трав',
'jun'           => 'чер',
'jul'           => 'лип',
'aug'           => 'сер',
'sep'           => 'вер',
'oct'           => 'жов',
'nov'           => 'лис',
'dec'           => 'груд',

# Bits of text used by many pages
'categories'            => 'Категорії',
'pagecategories'        => '{{PLURAL:$1|Категорія|Категорії}}',
'category_header'       => 'Сторінки в категорії «$1»',
'subcategories'         => 'Підкатегорії',
'category-media-header' => 'Файли в категорії «$1»',
'category-empty'        => "''Ця категорія зараз порожня.''",

'linkprefix'        => '/^(.*?)(„|«)$/sD',
'mainpagetext'      => '<big>Програмне забезпечення «MediaWiki» успішно встановлене.</big>',
'mainpagedocfooter' => 'Інформацію про роботу з цією вікі можна знайти в [http://meta.wikimedia.org/wiki/%D0%9F%D0%BE%D0%BC%D0%BE%D1%89%D1%8C:%D0%A1%D0%BE%D0%B4%D0%B5%D1%80%D0%B6%D0%B0%D0%BD%D0%B8%D0%B5 посібнику користувача].

== Деякі корисні ресурси ==
* [http://www.mediawiki.org/wiki/Manual:Configuration_settings Список налаштувань];
* [http://www.mediawiki.org/wiki/Manual:FAQ Часті питання з приводу MediaWiki];
* [http://lists.wikimedia.org/mailman/listinfo/mediawiki-announce Розсилка повідомлень про появу нових версій MediaWiki].',

'about'          => 'Про',
'article'        => 'Стаття',
'newwindow'      => '(відкривається в новому вікні)',
'cancel'         => 'Скасувати',
'qbfind'         => 'Знайти',
'qbbrowse'       => 'Переглянути',
'qbedit'         => 'Редагувати',
'qbpageoptions'  => 'Налаштування сторінки',
'qbpageinfo'     => 'Інформація про сторінку',
'qbmyoptions'    => 'Мої налаштування',
'qbspecialpages' => 'Спеціальні сторінки',
'moredotdotdot'  => 'Детальніше…',
'mypage'         => 'Моя особиста сторінка',
'mytalk'         => 'Моя сторінка обговорення',
'anontalk'       => 'Обговорення для цієї IP-адреси',
'navigation'     => 'Навігація',
'and'            => 'і',

# Metadata in edit box
'metadata_help' => 'Метадані:',

'errorpagetitle'    => 'Помилка',
'returnto'          => 'Повернення до сторінки «$1».',
'tagline'           => 'Матеріал з {{grammar:genitive|{{SITENAME}}}}',
'help'              => 'Довідка',
'search'            => 'Пошук',
'searchbutton'      => 'Пошук',
'go'                => 'Перейти',
'searcharticle'     => 'Перейти',
'history'           => 'Історія сторінки',
'history_short'     => 'Історія',
'updatedmarker'     => 'оновлено після мого останнього перегляду',
'info_short'        => 'Інформація',
'printableversion'  => 'Версія для друку',
'permalink'         => 'Постійне посилання',
'print'             => 'Друк',
'edit'              => 'Редагувати',
'editthispage'      => 'Редагувати цю сторінку',
'delete'            => 'Вилучити',
'deletethispage'    => 'Вилучити цю сторінку',
'undelete_short'    => 'Відновити $1 {{PLURAL:$1|редагування|редагування|редагувань}}',
'protect'           => 'Захистити',
'protect_change'    => 'змінити рівень захисту',
'protectthispage'   => 'Захистити цю сторінку',
'unprotect'         => 'Зняти захист',
'unprotectthispage' => 'Зняти захист із цієї сторінки',
'newpage'           => 'Нова сторінка',
'talkpage'          => 'Обговорити цю сторінку',
'talkpagelinktext'  => 'обговорення',
'specialpage'       => 'Спеціальна сторінка',
'personaltools'     => 'Особисті інструменти',
'postcomment'       => 'Прокоментувати',
'articlepage'       => 'Переглянути статтю',
'talk'              => 'Обговорення',
'views'             => 'Перегляди',
'toolbox'           => 'Інструменти',
'userpage'          => 'Переглянути сторінку користувача',
'projectpage'       => 'Переглянути сторінку проекту',
'imagepage'         => 'Переглянути сторінку зображення',
'mediawikipage'     => 'Переглянути сторінку повідомлення',
'templatepage'      => 'Переглянути сторінку шаблону',
'viewhelppage'      => 'Отримати довідку',
'categorypage'      => 'Переглянути сторінку категорії',
'viewtalkpage'      => 'Переглянути обговорення',
'otherlanguages'    => 'Іншими мовами',
'redirectedfrom'    => '(Перенаправлено з $1)',
'redirectpagesub'   => 'Сторінка-перенаправлення',
'lastmodifiedat'    => 'Остання зміна цієї сторінки: $2, $1.', # $1 date, $2 time
'viewcount'         => 'Цю сторінку переглядали $1 {{plural:$1|раз|рази|разів}}.',
'protectedpage'     => 'Захищена сторінка',
'jumpto'            => 'Перейти до:',
'jumptonavigation'  => 'навігація',
'jumptosearch'      => 'пошук',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite'         => 'Про {{grammar:accusative|{{SITENAME}}}}',
'aboutpage'         => 'Project:Про',
'bugreports'        => 'Звіти про помилки',
'bugreportspage'    => 'Project:Звіти про помилки',
'copyright'         => 'Вміст доступний згідно з $1.',
'copyrightpagename' => 'Авторські права проекту {{SITENAME}}',
'copyrightpage'     => '{{ns:project}}:Авторське право',
'currentevents'     => 'Поточні події',
'currentevents-url' => 'Project:Поточні події',
'disclaimers'       => 'Умови використання',
'disclaimerpage'    => 'Project:Умови використання',
'edithelp'          => 'Довідка про редагування',
'edithelppage'      => 'Help:Довідка про редагування',
'faq'               => 'Часті питання',
'faqpage'           => 'Project:Часті питання',
'helppage'          => 'Help:Довідка',
'mainpage'          => 'Головна сторінка',
'policy-url'        => 'Project:Правила',
'portal'            => 'Портал спільноти',
'portal-url'        => 'Project:Портал спільноти',
'privacy'           => 'Політика конфіденційності',
'privacypage'       => 'Project:Політика конфіденційності',
'sitesupport'       => 'Пожертвування',
'sitesupport-url'   => 'Project:Пожертвування',

'badaccess'        => 'Помилка доступу',
'badaccess-group0' => 'Вам не дозволено виконувати цю дію.',
'badaccess-group1' => 'Дія, яку ви хотіли зробити, дозволена лише користувачам із групи $1.',
'badaccess-group2' => 'Дія, яку ви хотіли зробити, дозволена лише користувачам із груп $1.',
'badaccess-groups' => 'Дія, яку ви хотіли зробити, дозволена лише користувачам із груп $1.',

'versionrequired'     => 'Потрібна MediaWiki версії $1',
'versionrequiredtext' => 'Для роботи з цією сторінкою потрібна MediaWiki версії $1. Див. [[Special:Version|інформацію про версії програмного забезпечення, яке використовується]].',

'ok'                      => 'OK',
'pagetitle'               => '$1 — {{SITENAME}}',
'retrievedfrom'           => 'Отримано з $1',
'youhavenewmessages'      => 'Ви отримали $1 ($2).',
'newmessageslink'         => 'нові повідомлення',
'newmessagesdifflink'     => 'остання зміна',
'youhavenewmessagesmulti' => 'Ви отримали нові повідомлення на $1',
'editsection'             => 'ред.',
'editold'                 => 'ред.',
'editsectionhint'         => 'Редагувати розділ: $1',
'toc'                     => 'Зміст',
'showtoc'                 => 'показати',
'hidetoc'                 => 'сховати',
'thisisdeleted'           => 'Переглянути чи відновити $1?',
'viewdeleted'             => 'Переглянути $1?',
'restorelink'             => '{{PLURAL:$1|одне вилучене редагування|$1 вилучених редагування|$1 вилучених редагувань}}',
'feedlinks'               => 'У вигляді:',
'feed-invalid'            => 'Неправильний тип каналу для підписки.',
'feed-unavailable'        => 'Стрічки синдикації не доступні на сайті {{SITENAME}}',
'site-rss-feed'           => '$1 — RSS-стрічка',
'site-atom-feed'          => '$1 — Atom-стрічка',
'page-rss-feed'           => '«$1» — RSS-стрічка',
'page-atom-feed'          => '«$1» — Atom-стрічка',
'red-link-title'          => '$1 (ще не написано)',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main'      => 'Стаття',
'nstab-user'      => 'Сторінка користувача',
'nstab-media'     => 'Медіа-сторінка',
'nstab-special'   => 'Спеціальна сторінка',
'nstab-project'   => 'Сторінка проекту',
'nstab-image'     => 'Файл',
'nstab-mediawiki' => 'Повідомлення',
'nstab-template'  => 'Шаблон',
'nstab-help'      => 'Довідка',
'nstab-category'  => 'Категорія',

# Main script and global functions
'nosuchaction'      => 'Такої дії нема',
'nosuchactiontext'  => 'Дія, зазначена в URL, не розпізнається програмним забезпеченням вікі',
'nosuchspecialpage' => 'Такої спеціальної сторінки нема',
'nospecialpagetext' => "<big>'''Така спеціальна сторінка не існує.'''</big>

Див. [[{{ns:special}}:Specialpages|список спеціальних сторінок]].",

# General errors
'error'                => 'Помилка',
'databaseerror'        => 'Помилка бази даних',
'dberrortext'          => 'Знайдено синтаксичну помилку в запиті до бази даних.
Останній запит до бази даних:
<blockquote><tt>$1</tt></blockquote>
відбувся з функції "<tt>$2</tt>".
MySQL повернув помилку "<tt>$3: $4</tt>".',
'dberrortextcl'        => 'Знайдено синтаксичну помилку в запиті до бази даних.
Останній запит до бази даних:
«$1»
відбувся з функції «$2».
MySQL повернув помилку «$3: $4».',
'noconnect'            => "Вибачте! У зв'язку з технічними проблемами зараз неможливо зв'язатися з сервером баз даних.<br />
$1",
'nodb'                 => 'Неможливо вибрати базу даних $1',
'cachederror'          => 'Нижче показана кешована копія запитаної сторінки; можливо вона застаріла.',
'laggedslavemode'      => 'Увага: сторінка може не містити останніх редагувань.',
'readonly'             => 'Запис до бази даних заблокований',
'enterlockreason'      => 'Зазначте причину і приблизний термін блокування',
'readonlytext'         => 'Додавання нових статей та інші зміни бази даних у даний момент заблоковані, ймовірно, через планове сервісне обслуговування бази даних, після закінчення якого буде відновлено нормальний стан.

Адміністратор, що заблокував базу, дав наступне пояснення: $1',
'missingarticle'       => 'База даних не знайшла тексту сторінки, хоча повинна була знайти, під назвою «$1».

Зазвичай це викликано використанням застарілого посилання на журнал змін або відмінностей для сторінки, що була вилучена.

Якщо справа не в цьому, то, швидше за все, ви знайшли помилку в програмному забезпеченні вікі.
Будь ласка, повідомте про це адміністратору, зазначивши URL.',
'readonly_lag'         => 'База даних автоматично заблокована від змін, доки вторинний сервер БД не синхронізується з первинним.',
'internalerror'        => 'Внутрішня помилка',
'internalerror_info'   => 'Внутрішня помилка: $1',
'filecopyerror'        => 'Неможливо скопіювати файл «$1» в «$2».',
'filerenameerror'      => 'Неможливо перейменувати файл «$1» в «$2».',
'filedeleteerror'      => 'Неможливо вилучити файл «$1».',
'directorycreateerror' => 'Неможливо створити директорію «$1».',
'filenotfound'         => 'Неможливо знайти файл «$1».',
'fileexistserror'      => 'Неможливо записати до файлу «$1»: файл існує.',
'unexpected'           => 'Неочікуване значення: «$1»=«$2».',
'formerror'            => 'Помилка: неможливо передати дані форми',
'badarticleerror'      => 'Ця дія не може бути виконана на цій сторінці.',
'cannotdelete'         => 'Неможливо вилучити зазначену сторінку або файл.
Можливо, її (його) вже вилучив хтось інший.',
'badtitle'             => 'Неприпустима назва',
'badtitletext'         => 'Запитана назва сторінки неправильна, порожня, або неправильно зазначена міжмовна чи міжвікі назва.
Можливо, в назві використовуються недопустимі символи.',
'perfdisabled'         => 'На жаль, ця можливість тимчасово недоступна через завантаженість сервера.',
'perfcached'           => 'Наступні дані взяті з кешу і можуть бути застарілими:',
'perfcachedts'         => 'Наступні дані взяті з кешу, востаннє він оновлювався о $1.',
'querypage-no-updates' => 'Зміни цієї сторінки зараз заборонені. Дані тут не можуть бути оновлені зараз.',
'wrong_wfQuery_params' => 'Неприпустима параметри функцій wfQuery()<br />
Функція: $1<br />
Запит: $2',
'viewsource'           => 'Перегляд',
'viewsourcefor'        => 'Сторінка «$1»',
'actionthrottled'      => 'Обмеження за швидкістю',
'actionthrottledtext'  => 'Як захід боротьби зі спамом, установлено обмеження на багаторазове застосування цієї дії протягом короткого проміжку часу. Будь ласка, повторіть спробу через кілька хвилин.',
'protectedpagetext'    => 'Ця сторінка закрита для редагування.',
'viewsourcetext'       => 'Ви можете переглянути та скопіювати початковий текст цієї сторінки:',
'protectedinterface'   => 'Ця сторінка є частиною інтерфейсу програмного забезпечення і її можуть редагувати лише адміністратори проекту.',
'editinginterface'     => "'''Увага:''' Ви редагуєте сторінку, що є частиною текстового інтерфейсу. Зміни цієї сторінки викличуть зміну інтерфейсу для інших користувачів. Для перекладу повідомлення використовуйте [http://translatewiki.net/wiki/Main_Page?setlang=uk Betawiki] — проект, що займається локалізацією MediaWiki.",
'sqlhidden'            => '(SQL запит приховано)',
'cascadeprotected'     => 'Сторінка захищена від змін, оскільки її включено до {{PLURAL:$1|сторінки, для якої|наступних сторінок, для яких}} установлено каскадний захист: $2',
'namespaceprotected'   => 'У вас нема дозволу редагувати сторінки в просторі назв «$1».',
'customcssjsprotected' => 'У вас нема дозволу редагувати цю сторінку, бо вона містить особисті налаштування іншого користувача.',
'ns-specialprotected'  => 'Спеціальні сторінки не можна редагувати.',
'titleprotected'       => "Створення сторінки з такою назвою було заборонене користувачем [[User:$1|$1]].
Зазначена наступна причина: ''$2''.",

# Login and logout pages
'logouttitle'                => 'Вийти з системи',
'logouttext'                 => '<strong>Ви працюєте в тому ж режимі, який був до вашого входу до системи.</strong>
Ви ідентифікуєтесь не з іменем, а з IP-адресою.

Ви можете продовжувати використовувати проект анонімно або почати новий сеанс як той самий чи інший користувач. Деякі сторінки можуть відображатися, ніби ви ще представлені системі під іменем, щоб уникнути цього, оновіть кеш браузера.',
'welcomecreation'            => '== Вітаємо вас, $1! ==

Ви зареєстровані.
Не забудьте [[{{ns:special}}:Preferences|змінити налаштування сайту]].',
'loginpagetitle'             => 'Вхід до системи',
'yourname'                   => "Ім'я користувача:",
'yourpassword'               => 'Пароль:',
'yourpasswordagain'          => 'Повторний набір пароля:',
'remembermypassword'         => "Запам'ятовувати мій обліковий запис на цьому комп'ютері",
'yourdomainname'             => 'Ваш домен:',
'externaldberror'            => 'Сталася помилка при автентифікації за допомогою зовнішньої бази даних, або у вас недостатньо прав для внесення змін до свого зовнішнього облікового запису.',
'loginproblem'               => '<b>Проблема при вході до системи.</b><br />Спробуйте ще раз!',
'login'                      => 'Вхід до системи',
'loginprompt'                => 'Ви повинні активувати куки (cookies) для входу до системи.',
'userlogin'                  => 'Вхід / реєстрація',
'logout'                     => 'Вихід із системи',
'userlogout'                 => 'Вихід із системи',
'notloggedin'                => 'Ви не ввійшли до системи',
'nologin'                    => 'Ви ще не зареєструвались? $1.',
'nologinlink'                => 'Створіть обліковий запис',
'createaccount'              => 'Створити',
'gotaccount'                 => 'Ви вже зареєстровані? $1.',
'gotaccountlink'             => 'Увійдіть',
'createaccountmail'          => 'електронною поштою',
'badretype'                  => 'Уведені вами паролі не збігаються.',
'userexists'                 => "Введене вами ім'я користувача вже існує.
Оберіть, будь ласка, інше ім'я.",
'youremail'                  => 'Адреса електронної пошти:',
'username'                   => "Ім'я користувача:",
'uid'                        => 'Ідентифікатор користувача:',
'yourrealname'               => "Справжнє ім'я:",
'yourlanguage'               => 'Мова інтерфейсу:',
'yourvariant'                => 'Варіант мови:',
'yournick'                   => 'Ваш псевдонім (для підписів):',
'badsig'                     => 'Неправильний підпис. Перевірте коректність HTML-тегів.',
'badsiglength'               => 'Дуже довгий підпис, повинно бути не більше $1 символів.',
'email'                      => 'Електронна пошта',
'prefs-help-realname'        => "Справжнє ім'я (необов'язкове поле): якщо ви його зазначите, то воно буде використовуватися, щоб показувати, хто редагував сторінку.",
'loginerror'                 => 'Помилка при вході до системи',
'prefs-help-email'           => "Адреса електронної пошти (необов'язкове поле) дає можливість іншим користувачам зв'язатися з вами, не знаючи вашої електронної адреси.",
'prefs-help-email-required'  => 'Потрібно зазначити адресу електронної пошти.',
'nocookiesnew'               => 'Користувач зареєструвався, але не ввійшов до системи.
{{SITENAME}} використовує «cookies» для входу до системи.
У вас «cookies» заборонені.
Будь ласка, дозвольте їх, а потім ввійдіть під вашим новим іменем користувача і паролем.',
'nocookieslogin'             => "{{SITENAME}} використовує куки (''cookies'') для входу до системи.
Ви їх вимкнули.
Будь ласка, ввімкніть куки і спробуйте знову.",
'noname'                     => "Ви вказали неіснуюче ім'я користувача.",
'loginsuccesstitle'          => 'Успішний вхід до системи',
'loginsuccess'               => "'''Тепер ви працюєте у {{grammar:genitive|{{SITENAME}}}} під іменем $1.'''",
'nosuchuser'                 => 'Користувач з іменем $1 не існує.
Перевірте правильність написання або скористайтеся формою нижче, щоб зареєструвати нового користувача.',
'nosuchusershort'            => 'Користувача з іменем <nowiki>$1</nowiki> не існує.
Перевірте правильність написання імені.',
'nouserspecified'            => "Ви повинні вказати ім'я користувача.",
'wrongpassword'              => 'Ви ввели хибний пароль. Спробуйте ще раз.',
'wrongpasswordempty'         => 'Ви не ввели пароль. Будь ласка, спробуйте ще раз.',
'passwordtooshort'           => 'Ваш пароль неправильний або занадто короткий.
Він має містити принаймні $1 символів і відрізнятися від імені користувача.',
'mailmypassword'             => 'Надіслати новий пароль',
'passwordremindertitle'      => "Пам'ятка пароля користувача {{grammar:genitive|{{SITENAME}}}}",
'passwordremindertext'       => 'Хтось (можливо, ви, з IP-адреси $1)
зробив запит на відправлення вам нового пароля користувача {{grammar:genitive|{{SITENAME}}}} ($4).
Пароль користувача $2 тепер такий: <code>$3</code>.
Тепер вам необхідно ввійти до системи і змінити пароль.

Якщо ви не надсилали запиту на зміну пароля або якщо ви вже згадали свій пароль, ви можете ігнорувати це повідомлення і далі використовувати свій старий пароль.',
'noemail'                    => 'Для користувача "$1" не вказано адресу електронної пошти.',
'passwordsent'               => 'Новий пароль відправлено на адресу електронної пошти, вказану для "$1".

Будь-ласка, ввійдіть в систему після отримання пароля.',
'blocked-mailpassword'       => 'Редагування з вашої IP-адреси заборонено, заблокована також функція відновлення пароля.',
'eauthentsent'               => 'Тимчасовий пароль відправлено на адресу електронної пошти нового користувача $1. В листі описані дії необхідні для підтвердження, що ця адреса справді належить вам.',
'throttled-mailpassword'     => 'Функція нагадування паролю вже використовувалась протягом останніх $1 годин. Для попередження зловживань дозволено виконувати не більше одного нагадування за $1 годин.',
'mailerror'                  => 'Помилка при відправці пошти: $1',
'acct_creation_throttle_hit' => 'На жаль, ви вже створили $1 облікових записів. Ви не можете створити більше жодного.',
'emailauthenticated'         => 'Адресу вашої електронної пошти підтверджено $1.',
'emailnotauthenticated'      => 'Адресу вашої електронної пошти <strong>ще не підтверджено</strong>, функції вікі-двигуна роботи з ел. поштою відключені.',
'noemailprefs'               => 'Адресу електронної пошти не вказано, функції вікі роботи з ел. поштою відключені.',
'emailconfirmlink'           => 'Підтвердити адресу вашої електронної пошти',
'invalidemailaddress'        => 'Уведена адреса не може бути прийнята, бо вона не відповідає формату адрес електронної пошти.
Будь ласка, введіть коректну адресу або залиште поле порожнім.',
'accountcreated'             => 'Обліковий запис створено.',
'accountcreatedtext'         => 'Обліковий запис для $1 створено.',
'createaccount-title'        => '{{SITENAME}}: створення облікового запису',
'createaccount-text'         => 'Хтось створив обліковий запис «$2» на сервері проекту {{SITENAME}} ($4) з паролем «$3», зазначивши вашу адресу електронної пошти. Вам слід зайти і змінити пароль.

Проігноруйте дане повідомлення, якщо обліковий запис було створено помилково.',
'loginlanguagelabel'         => 'Мова: $1',

# Password reset dialog
'resetpass'               => 'Очистити пароль облікового запису',
'resetpass_announce'      => 'Ви ввійшли, використовуючи тимчасовий пароль, який отримали електронною поштою. Для завершення входу до системи, ви повинні вказати новий пароль тут:',
'resetpass_header'        => 'Очистити пароль',
'resetpass_submit'        => 'Установити пароль і ввійти',
'resetpass_success'       => 'Ваш пароль успішно змінено! Виконується вхід до системи…',
'resetpass_bad_temporary' => 'Недійсний тимчасовий пароль. Можливо, ви вже змінили ваш пароль. Спробуйте надіслати запит на тимчасовий пароль ще раз.',
'resetpass_forbidden'     => 'Можливість зміни паролю в цій вікі-системі не передбачена',
'resetpass_missing'       => 'Форма не містить даних.',

# Edit page toolbar
'bold_sample'     => 'Жирний текст',
'bold_tip'        => 'Жирний текст',
'italic_sample'   => 'Курсив',
'italic_tip'      => 'Курсив',
'link_sample'     => 'Назва посилання',
'link_tip'        => 'Внутрішнє посилання',
'extlink_sample'  => 'http://www.example.com назва посилання',
'extlink_tip'     => 'Зовнішнє посилання (не забудьте про префікс http://)',
'headline_sample' => 'Текст заголовку',
'headline_tip'    => 'Заголовок 2-го рівня',
'math_sample'     => 'Вставте сюди формулу',
'math_tip'        => 'Математична формула (LaTeX)',
'nowiki_sample'   => 'Вставляйте сюди невідформатований текст.',
'nowiki_tip'      => 'Ігнорувати вікі-форматування',
'image_tip'       => 'Зображення',
'media_tip'       => 'Посилання на медіа-файл',
'sig_tip'         => 'Ваш підпис з часовою міткою',
'hr_tip'          => 'Горизонтальна лінія (не використовуйте часто)',

# Edit pages
'summary'                   => 'Короткий опис змін',
'subject'                   => 'Тема/заголовок',
'minoredit'                 => 'Незначна зміна',
'watchthis'                 => 'Спостерігати за цією сторінкою',
'savearticle'               => 'Зберегти сторінку',
'preview'                   => 'Попередній перегляд',
'showpreview'               => 'Попередній перегляд',
'showlivepreview'           => 'Швидкий попередній перегляд',
'showdiff'                  => 'Показати зміни',
'anoneditwarning'           => "'''Увага''': Ви не ввійшли до системи. Ваша IP-адреса буде записана до історії змін цієї сторінки.",
'missingsummary'            => "'''Увага''': Ви не дали короткого опису змін. Натиснувши кнопку «Зберегти» ще раз, ви збережете зміни без коментарю.",
'missingcommenttext'        => 'Будь-ласка, введіть нище ваше повідомлення.',
'missingcommentheader'      => "'''Увага''': Ви не вказали заголовок коментарю. Натиснувши кнопку «Зберегти» ще раз, ви збережете коментар без заголовку.",
'summary-preview'           => 'Опис буде',
'subject-preview'           => 'Заголовок буде',
'blockedtitle'              => 'Користувача заблоковано',
'blockedtext'               => "<big>'''Ваш обліковий запис або IP-адреса заблоковані.'''</big>

Блокування виконане адміністратором $1. Зазначена наступна причина: ''«$2»''.

* Початок блокування: $8
* Закінчення блокування: $6
* Був заблокований: $7

Ви можете надіслати листа користувачеві $1 або будь-якому іншому [[{{MediaWiki:Grouppage-sysop}}|адміністратору]], щоб обговорити блокування.

Зверніть увагу, що ви не зможете надіслати листа адміністратору, якщо ви не зареєстровані або не підтвердили свою електронну адресу в [[Special:Preferences|особистих налаштуваннях]], а також якщо вам було заборонено надсилати листи при блокуванні.

Ваша IP-адреса — $3, ідентифікатор блокування — #$5. Будь ласка, зазначайте ці дані у своїх запитах.",
'autoblockedtext'           => "Ваша IP-адреса автоматично заблокована у зв'язку з тим, що вона раніше використовувалася кимось із заблокованих користувачів. Адміністратор ($1), що її заблокував, зазначив наступну причину блокування:

:«$2»

* Початок блокування: $8
* Закінчення блокування: $6

Ви можете надіслати листа користувачеві $1 або будь-якому іншому [[{{MediaWiki:Grouppage-sysop}}|адміністратору]], щоб обговорити блокування.

Зверніть увагу, що ви не зможете надіслати листа адміністраторові, якщо ви не зареєстровані у проекті або не підтвердили свою електронну адресу в [[{{ns:special}}:Preferences|особистих налаштуваннях]], а також якщо вам було заборонено надсилати листи при блокуванні.

Ваш ідентифікатор блокування — #$5. Будь ласка, зазначайте його у своїх запитах.",
'blockednoreason'           => 'не вказано причини',
'blockedoriginalsource'     => 'Зміст сторінки «$1» наведено нижче:',
'blockededitsource'         => "Текст '''ваших редагувань''' сторінки «$1» наведено нижче:",
'whitelistedittitle'        => 'Для редагування необхідно ввійти в систему',
'whitelistedittext'         => 'Ви повинні $1 щоб редагувати сторінки.',
'whitelistreadtitle'        => 'Для перегляду необхідно ввійти в систему',
'whitelistreadtext'         => 'Ви повинні [[Special:Userlogin|зареєструватися]] для перегляду цих сторінок.',
'whitelistacctitle'         => 'У вас немає прав для створення облікового запису',
'whitelistacctext'          => 'Щоб мати можливість створення облікових записів в цій вікі, ви повинні [[Special:Userlogin|зареєструватися]] й мати відповідні права.',
'confirmedittitle'          => 'Для редагування необхідно підтвердити адресу ел. пошти',
'confirmedittext'           => 'Ви повинні підтвердити вашу адресу електронної пошти перед редагуванням сторінок.
Будь-ласка зазначте і підтвердіть вашу електронну адресу на [[Special:Preferences|сторінці налаштувань]].',
'nosuchsectiontitle'        => 'Немає такого розділу',
'nosuchsectiontext'         => 'Ви пробуєте редагувати розділ, якого не існує. Оскільки немає розділу $1, нема куди зберегти ваші редагування.',
'loginreqtitle'             => 'Необхідно ввійти в систему',
'loginreqlink'              => 'ввійти в систему',
'loginreqpagetext'          => 'Ви повинні $1, щоб переглянути інші сторінки.',
'accmailtitle'              => 'Пароль надіслано.',
'accmailtext'               => "Пароль для '$1' надіслано на $2.",
'newarticle'                => '(Нова)',
'newarticletext'            => "Ви перейшли на статтю, яка поки що не існує.

Щоб створити нову сторінку, наберіть текст у вікні нижче
(див. [[{{MediaWiki:Helppage}}|довідкову статтю]], щоб отримати більше інформації).
Якщо ви опинились тут помилково, просто натисніть кнопку браузера '''назад'''.",
'anontalkpagetext'          => "----
''Це сторінка обговорення, що належить анонімному користувачу, який ще не зареєструвався або не скористався зареєстрованим ім'ям. Тому ми вимушені використовувати IP-адресу для його ідентифікації. Одна IP-адреса може використовуватися декількома користувачами. Якщо ви - анонімний користувач і вважаєте, що отримали коментарі, адресовані не вам, будь ласка [[Special:userlogin|зареєструйтесь або увійдіть в систему як зареєстрований користувач]], щоб у майбутньому уникнути можливої плутанини з іншими анонімними користувачами.''",
'noarticletext'             => "Зараз на цій сторінці нема тексту. Ви можете [[Special:Search/{{PAGENAME}}|пошукати цю назву]] в інших статтях або '''[{{fullurl:{{FULLPAGENAME}}|action=edit}} створити сторінку з такою назвою]'''.",
'userpage-userdoesnotexist' => 'Користувач під назвою "$1" не зареєстрований. Перевірте, якщо ви хочете створити/редагувати цю сторінку.',
'clearyourcache'            => "'''Зауваження:''' Після зберігання, ви маєте відновити кеш вашого браузера, щоб побачити зміни. '''Mozilla / Firefox / Safari:''' тримайте ''Shift'' коли натискаєте ''Reload'', або натисніть ''Ctrl-Shift-R'' (''Cmd-Shift-R'' на Apple Mac); '''IE:''' тримайте ''Ctrl'' коли натискаєте ''Refresh'', або натисніть ''Ctrl-F5''; '''Konqueror:''': натисніть кнопку ''Reload'', або натисніть ''F5''; '''Opera''' користувачам може знадобитись повністю очистити кеш у ''Tools→Preferences''.",
'usercssjsyoucanpreview'    => '<strong>Підказка:</strong> Використовуйте кнопку попереднього перегляду, щоб протестувати ваш новий css-файл чи js-файл перед збереженням.',
'usercsspreview'            => "'''Пам'ятайте, що це лише попередній перегляд вашого css-файлу, його ще не збережено!'''",
'userjspreview'             => "'''Пам'ятайте, що це тільки попередній перегляд вашого JavaScript-файлу і поки він ще не збережений!'''",
'userinvalidcssjstitle'     => "'''Увага:''' теми оформлення «$1» не знайдено. Пам\\'ятайте, що користувацькі .css и .js сторінки повинні мати назву, що складається лише з малих букв, наприклад «{{ns:user}}:Хтось/monobook.css», а не «{{ns:user}}:Хтось/Monobook.css».",
'updated'                   => '(Оновлена)',
'note'                      => '<strong>Зауваження:</strong>',
'previewnote'               => 'Зверніть увагу, - це тільки попередній перегляд, текст ще не збережено!',
'previewconflict'           => 'Цей попередній перегляд відображає текст з верхнього вікна редагування так, як він буде виглядіти, якщо ви вирішите зберегти його.',
'session_fail_preview'      => '<strong>Система не може зберегти ваші редагування оскільки втрачені дані сесії. Будь ласка повторіть вашу спробу. Якщо помилка буде повторюватись, спробуйте вийти з системи і зайти знов.
</strong>',
'session_fail_preview_html' => "<sstrong>Вибачте! Неможливо зберегти ваші зміни через втрату даних HTML-сесії.</sstrong>

''Так як дана вікі дозволяє використовувати чистий HTML, попередній перегляд відключено, щоб попередити JavaScript-атаки.''

<sstrong>Якщо це доброякісна спроба редагування, будь-ласка, спробуйте ще раз. Якщо не вийде знову, - спробуйте завершити сеанс роботи й ще раз ввійти до системи.</sstrong>",
'token_suffix_mismatch'     => '<strong>Ваше редагування було відхилене, оскільки ваша програма не правильно обробляє знаки пунктуації у вікні редагування. Редагування було скасоване для запобігання спотворенню тексту статті.
Подібні проблеми можуть виникати при використанні анонімізуючих веб-проксі, що містять помилки.</strong>',
'editing'                   => 'Редагування $1',
'editinguser'               => "Зміна прав користувача '''[[User:$1|$1]]''' ([[User talk:$1|{{int:talkpagelinktext}}]] | [[Special:Contributions/$1|{{int:contribslink}}]])",
'editingsection'            => 'Редагування $1 (розділ)',
'editingcomment'            => 'Редагування $1 (коментар)',
'editconflict'              => 'Конфлікт редакцій: $1',
'explainconflict'           => 'Ще хтось змінив цю статтю з того часу, як ви розпочали її змінювати.
В верхній частині тексту показано, як стаття виглядає зараз. Ваші зміни показані в нижній частині тексту.
Вам необхідно буде скомпонувати ваші зміни в існуючий текст.
Якщо ви натиснете "Зберегти статтю", то буде збережено <b>тільки</b> текст в верхньому вікні редагування.
<p>',
'yourtext'                  => 'Ваш текст',
'storedversion'             => 'Збережена версія',
'nonunicodebrowser'         => '<strong>ПОПЕРЕДЖЕННЯ: Ваш [[браузер]] не підтримує кодування [[Юнікод]]. При редагуванні статей всі не-ASCII символи будуть замінені на свої шіснадцяткові коди.</strong>',
'editingold'                => '<strong>ПОПЕРЕДЖЕННЯ: Ви редагуєте застарілу версію даної статті.
Якщо ви збережете її, будь-які редагування, зроблені між версіями, будуть втрачені.</strong>',
'yourdiff'                  => 'Відмінності',
'copyrightwarning'          => "Будь ласка, зверніть увагу, що будь-які добавлення
й зміни в {{SITENAME}} розглядаються як випущені на умовах ліцензії$2
(див. $1).
Якщо ви не бажаєте, щоб написане вами безжалісно редагувалось
і розповсюджувалося за бажанням будь-кого, - не пишіть тут.<br />
Ви також зобов'язуєтесь, що написане вами тут належить вам чи взято з джерела,
що є суспільною власністю чи подібним вільним джерелом.
<strong>НЕ ПУБЛІКУЙТЕ ТУТ БЕЗ ДОЗВОЛУ ТВОРИ, ЩО Є ОБ'ЄКТОМ АВТОРСКОГО ПРАВА,
Й ЛІЦЕНЗІЯ ЯКИХ НЕ ДОЗВОЛЯЄ ПОДІБНОЇ ПУБЛІКАЦІЇ!</strong>",
'copyrightwarning2'         => "Будь ласка, зверніть увагу, що всі внесені вами зміни
можуть редагуватися чи бути видаленими іншими користувачами.
Якщо ви не бажаєте, щоб написане вами безжалісно редагувалось - не пишіть тут.<br />
Ви також зобов'язуєтесь, що написане вами тут належить вам чи взято з джерела,
що є суспільною власністю чи подібним вільним джерелом (див. $1).<br />
<strong>НЕ ПУБЛІКУЙТЕ ТУТ БЕЗ ДОЗВОЛУ ТВОРИ, ЩО Є ОБ'ЄКТОМ АВТОРСКОГО ПРАВА,
Й ЛІЦЕНЗІЯ ЯКИХ НЕ ДОЗВОЛЯЄ ПОДІБНОЇ ПУБЛІКАЦІЇ!</strong>",
'longpagewarning'           => '<strong>ПОПЕРЕДЖЕННЯ: Довжина цієї статті $1 кілобайт; статті, розмір яких перевищує 32кб. можуть створювати проблеми для деяких браузерів.
Розгляньте, будь-ласка, варіанти розбиття статті на менші частини.</strong>',
'longpageerror'             => '<strong>ПОМИЛКА: текст, що ви хочете зберегти має $1 кілобайт, що більше ніж встановлену межу $2 кілобайт. Сторінку неможливо зберегти.</strong>',
'readonlywarning'           => "<strong>ПОПЕРЕДЖЕННЯ: База даних заблокована в зв'язку з процедурами обслуговування,
тому, на даний момент, ви не можете записати ваші зміни.
Можливо, вам варто зберегти текст в локальний файл (на своєму диску) й зберегти його пізніше.</strong>",
'protectedpagewarning'      => '<strong>ПОПЕРЕДЖЕННЯ: Ця стаття заблокована, так що тільки [[{{ns:project}}:Адміністратори|адміністратори]] можуть змінювати її. Будь-ласка, перегляньте
[[{{ns:project}}:Правила захисту статей|правила захисту статей]].</strong>',
'semiprotectedpagewarning'  => "'''Примітка:''' Ця сторінка захищена. Її можуть редагувати тільки зареєстровані користувачі.",
'cascadeprotectedwarning'   => "'''Попередження:''' Цю сторінку можуть редагувати лише користувачі з групи «Адміністратори», оскільки вона включена {{PLURAL:$1|до сторінки, для якої|до наступних сторінок, для яких}} активовано каскадний захист:",
'titleprotectedwarning'     => '<strong>Попередження. Ця сторінка була захищена, створити її можуть лише певні користувачі.</strong>',
'templatesused'             => 'Шаблони, використані на цій сторінці:',
'templatesusedpreview'      => 'Шаблони, використані на цій сторінці:',
'templatesusedsection'      => 'Шаблони, використані в цій секції:',
'template-protected'        => '(захищено)',
'template-semiprotected'    => '(частково захищено)',
'edittools'                 => '<!-- Розміщений тут текст буде відображатися під формою редагування і формою завантаження. -->',
'nocreatetitle'             => 'Створення сторінок обмежено',
'nocreatetext'              => 'На цьому сайті обмежено можливість створення нових сторінок.
Ви можете повернуться назад й змінити існуючу сторінку, [[{{ns:special}}:Userlogin|ввійти в систему, або створити новий обліковий запис]].',
'nocreate-loggedin'         => 'У вас нема дозволу створювати нові сторінки у {{grammar:genitive|{{SITENAME}}}}.',
'permissionserrors'         => 'Помилки прав доступу',
'permissionserrorstext'     => 'У вас нема прав на виконання цієї операції з {{PLURAL:$1|наступної причини|наступних причин|наступних причин}}:',
'recreate-deleted-warn'     => "'''Попередження: ви намагаєтеся створити сторінку, яка раніше вже була вилучена.'''

Перевірте, чи справді вам потрібно знову створювати цю сторінку.
Нижче наведений журнал вилучень:",

# "Undo" feature
'undo-success' => 'Редагування відмінено. Будь-ласка, натисніть «Зберегти», щоб зберегти зміни.',
'undo-failure' => 'Неможливо відмінити редагування через несумісність проміжних змін.',
'undo-summary' => 'Відміна редагування № $1 користувача [[Special:Contributions/$2|$2]] ([[User talk:$2|обговорення]])',

# Account creation failure
'cantcreateaccounttitle' => 'Не можливо створити обліковий запис',
'cantcreateaccount-text' => "Створення облікових записів із цієї IP-адреси ('''$1''') було заблоковане [[User:$3|користувачем $3]].

$3 зазначив наступну причину: ''$2''",

# History pages
'viewpagelogs'        => 'Показати журнали для цієї сторінки',
'nohistory'           => 'Для цієї статті відсутній журнал редагувань.',
'revnotfound'         => 'Версію не знайдено',
'revnotfoundtext'     => 'Неможливо знайти необхідну вам версію статті.
Будь-ласка, перевірте правильність посилання, яке ви використовували для доступу до цієї статті.',
'loadhist'            => 'Завантаження журналу редагувань статті',
'currentrev'          => 'Поточна версія',
'revisionasof'        => 'Версія $1',
'revision-info'       => 'Версія від $1; $2',
'previousrevision'    => '← Старіша версія',
'nextrevision'        => 'Новіша версія →',
'currentrevisionlink' => 'Поточна версія',
'cur'                 => 'поточн.',
'next'                => 'наст.',
'last'                => 'ост.',
'orig'                => 'ориг.',
'page_first'          => 'перша',
'page_last'           => 'остання',
'histlegend'          => "Пояснення: (поточн.) = відмінності від поточної версії,
(ост.) = відмінності від попередньої версії, '''м''' = незначне редагування",
'deletedrev'          => '[вилучена]',
'histfirst'           => 'найстаріші',
'histlast'            => 'останні',
'historysize'         => '($1 {{PLURAL:$1|байт|байти|байтів}})',
'historyempty'        => '(порожньо)',

# Revision feed
'history-feed-title'          => 'Історія редагувань',
'history-feed-description'    => 'Історія редагувань цієї сторінки в вікі',
'history-feed-item-nocomment' => '$1 в $2', # user at time
'history-feed-empty'          => 'Такої сторінки не існує.
Її могли вилучити чи перейменувати.
Спробуйте [[{{ns:special}}:Search|знайти в вікі]] подібні сторінки.',

# Revision deletion
'rev-deleted-comment'         => '(коментар вилучено)',
'rev-deleted-user'            => "(ім'я автора стерто)",
'rev-deleted-event'           => '(запис журналу вилучений)',
'rev-deleted-text-permission' => '<div class="mw-warning plainlinks">
Цю версію сторінки вилучено з загального архіву.
Можливо є пояснення в [{{fullurl:{{ns:special}}:Log/delete|page={{PAGENAMEE}}}} протоколі вилучень].
</div>',
'rev-deleted-text-view'       => '<div class="mw-warning plainlinks">
Цю версію сторінки вилучено з загального архіву.
Ви можете переглянути її, так як є адміністратором сайту.
Можливо є пояснення в [{{fullurl:{{ns:special}}:Log/delete|page={{PAGENAMEE}}}} протоколі вилучень].
</div>',
'rev-delundel'                => 'показати/сховати',
'revisiondelete'              => 'Вилучити / відновити версії сторінки',
'revdelete-nooldid-title'     => 'Не вказана цільова версія',
'revdelete-nooldid-text'      => 'Ви не вказали цільову версію (чи версії) для виконання цієї функції.',
'revdelete-selected'          => '{{PLURAL:$2|Обрана версія|Обрані версії}} сторінки [[:$1]]:',
'revdelete-text'              => 'Вилучені версії будуть відображатися в історії сторінки,
але їх зміст не буде доступним звичайним користувачам.

Адміністратори будуть мати доступ до прихованого змісту й зможуть відновити його за допомогою цього ж інтерфейсу,
крім випадків, коли були встановлені додаткові обмеження власниками сайту.',
'revdelete-legend'            => 'Установити обмеження',
'revdelete-hide-text'         => 'Прихований текст цієї версії сторінки',
'revdelete-hide-name'         => "Приховати дію та її об'єкт",
'revdelete-hide-comment'      => 'Приховати коментар',
'revdelete-hide-user'         => "Приховати ім'я автора",
'revdelete-hide-restricted'   => 'Застосовувати обмеження також і до адміністраторів',
'revdelete-suppress'          => 'Приховувати дані також і від адміністраторів',
'revdelete-hide-image'        => 'Приховати вміст файлу',
'revdelete-unsuppress'        => 'Зняти обмеження з відновлених версій',
'revdelete-log'               => 'Коментар:',
'revdelete-submit'            => 'Застосувати до вибраної версії',
'revdelete-logentry'          => 'Змінено видимість версії сторінки для [[$1]]',
'logdelete-logentry'          => 'змінена видимість події для [[$1]]',
'revdelete-logaction'         => '$1 {{PLURAL:$1|версія переведена|версії переведені|версій переведені}} до режиму $2',
'revdelete-success'           => "'''Видимість версії успішно змінена.'''",
'logdelete-success'           => "'''Видимість події успішно змінена.'''",

# Oversight log
'overlogpagetext' => 'Нижче наведений список останніх вилучень та блокувань, які стосуються матеріалів, прихованих від адміністраторів. Переглянути список діючих блокувань можна на [[Special:Ipblocklist|відповідній сторінці]].',

# History merging
'mergehistory'                     => "Об'єднання історій редагувань",
'mergehistory-box'                 => "Об'єднати історії редагувань двох сторінок:",
'mergehistory-from'                => 'Вихідна сторінка:',
'mergehistory-into'                => 'Цільова сторінка:',
'mergehistory-list'                => "Історія редагувань, що об'єднується",
'mergehistory-merge'               => "Наступні версії [[:$1]] можуть бути об'єднані у [[:$2]]. Використайте перемикачі для того, щоб об'єднати тільки вибраний діапазон редагувань. Врахуйте, що при використанні навігаційних посилань дані будуть втрачені.",
'mergehistory-go'                  => "Показати редагування, що об'єднуються",
'mergehistory-submit'              => "Об'єднати редагування",
'mergehistory-empty'               => "Не знайдені редагування для об'єднання.",
'mergehistory-success'             => '$3 {{PLURAL:$3|редагування|редагування|редагувань}} з [[:$1]] успішно перенесені до [[:$2]].',
'mergehistory-fail'                => "Не вдалося здійснити об'єднання історій сторінок, будь ласка, перевірте параметри сторінки й часу.",
'mergehistory-no-source'           => 'Вихідна сторінка «$1» не існує.',
'mergehistory-no-destination'      => 'Цільова сторінка «$1» не існує.',
'mergehistory-invalid-source'      => 'Джерело повинне мати правильний заголовок.',
'mergehistory-invalid-destination' => 'Цільова сторінка повинна мати правильний заголовок.',

# Merge log
'mergelog'           => "Журнал об'єднань",
'pagemerge-logentry' => "об'єднані [[$1]] і [[$2]] (версії до $3)",
'revertmerge'        => 'Розділити',
'mergelogpagetext'   => "Нижче наведений список останніх об'єднань історій сторінок.",

# Diffs
'history-title'           => 'Історія змін сторінки «$1»',
'difference'              => '(відмінності між версіями)',
'lineno'                  => 'Рядок $1:',
'compareselectedversions' => 'Порівняти вибрані версії',
'editundo'                => 'відмінити зміни',
'diff-multi'              => '($1 {{plural:$1|проміжну версію|проміжні версії|проміжних версій}} не показано.)',

# Search results
'searchresults'         => 'Результати пошуку',
'searchresulttext'      => 'Для отримання детальнішої інформації про пошук у проекті, див. [[{{ns:project}}:Пошук]].',
'searchsubtitle'        => 'На запит «[[:$1]]»',
'searchsubtitleinvalid' => 'На запит «$1»',
'noexactmatch'          => 'Статті з назвою «$1» не існує, проводиться пошук по всьому тексту.

<span style="display: block; margin: 1.5em 2em">
<strong>[[:$1|Створити статтю]]</strong></span>',
'noexactmatch-nocreate' => 'Сторінка з назвою «$1» не існує.',
'toomanymatches'        => 'Знайдено дуже багато відповідностей, будь ласка, спробуйте інший запит',
'titlematches'          => 'Збіг в назвах статей',
'notitlematches'        => 'Немає збігу в назвах статей',
'textmatches'           => 'Збіг в текстах статей',
'notextmatches'         => 'Немає збігу в текстах статей',
'prevn'                 => 'попередні $1',
'nextn'                 => 'наступні $1',
'viewprevnext'          => 'Переглянути ($1) ($2) ($3).',
'showingresults'        => "Нижче {{PLURAL:$1|показане|показані|показані}} '''$1''' {{PLURAL:$1|результат|результати|результатів}}, починаючи з №&nbsp;'''$2'''",
'showingresultsnum'     => 'Нижче показано <strong>$3</strong> {{plural:$3|результат|результати|результатів}}, починаючи з №&nbsp;<strong>$2</strong>.',
'nonefound'             => '<strong>Зауваження:</strong>: До невдалого пошуку часто може приводити спроба знайти загальні слова, які не підлягають індексації, наприклад - "також" and "що", або використання більш ніж одного ключового для пошуку слова (показуються тільки статті, що містять всі вказані для пошуку слова).',
'powersearch'           => 'Розширений пошук',
'powersearchtext'       => '
Пошук в просторі імен :<br />
$1<br />
$2 Показувати перенаправлення   Пошук на $3 $9',
'searchdisabled'        => '<p>Вибачте, повнотекстовий пошук тимчасово недоступний через перевантаження сервера; передбачається, що ця функція буде знову включена після установки нового обладнання. Поки що ми пропонуємо вам скористатися Google чи Yahoo!:</p>',

# Preferences page
'preferences'              => 'Налаштування',
'mypreferences'            => 'Налаштування',
'prefs-edits'              => 'Кількість редагувань:',
'prefsnologin'             => 'Ви не ввійшли в систему',
'prefsnologintext'         => 'Щоб змінити налаштування користувача, ви повинні [[Special:Userlogin|ввійти в систему]].',
'prefsreset'               => 'Відновлено стандартні налаштування.',
'qbsettings'               => 'Панель навігації',
'qbsettings-none'          => 'Не показувати панель',
'qbsettings-fixedleft'     => 'Фіксована ліворуч',
'qbsettings-fixedright'    => 'Фіксована праворуч',
'qbsettings-floatingleft'  => 'Плаваюча ліворуч',
'qbsettings-floatingright' => 'Плаваюча праворуч',
'changepassword'           => 'Змінити пароль',
'skin'                     => 'Оформлення',
'math'                     => 'Відображення формул',
'dateformat'               => 'Формат дати',
'datedefault'              => 'Стандартний',
'datetime'                 => 'Дата й час',
'math_failure'             => 'Неможливо розібрати вираз',
'math_unknown_error'       => 'невідома помилка',
'math_unknown_function'    => 'невідома функція',
'math_lexing_error'        => 'лексична помилка',
'math_syntax_error'        => 'синтаксична помилка',
'math_image_error'         => 'Перетворення в PNG відбулося з помилкою; перевірте правильність встановлення latex, dvips, gs та convert',
'math_bad_tmpdir'          => 'Не вдається створити чи записати в тимчасовий каталог математики',
'math_bad_output'          => 'Не вдається створити чи записати в вихідний каталог математики',
'math_notexvc'             => 'Не знайдено програму texvc; Див. math/README — довідку про налаштування.',
'prefs-personal'           => 'Особисті дані',
'prefs-rc'                 => 'Сторінка останніх редагувань',
'prefs-watchlist'          => 'Список спостереження',
'prefs-watchlist-days'     => 'Кількість днів, що відображаються у списку спостережень:',
'prefs-watchlist-edits'    => 'Кількість редагувань для відображення у розширеному списку спостереження:',
'prefs-misc'               => 'Інші налаштування',
'saveprefs'                => 'Зберегти',
'resetprefs'               => 'Скасувати незбережені зміни',
'oldpassword'              => 'Старий пароль:',
'newpassword'              => 'Новий пароль:',
'retypenew'                => 'Ще раз введіть новий пароль:',
'textboxsize'              => 'Розміри поля вводу',
'rows'                     => 'Рядків:',
'columns'                  => 'Колонок:',
'searchresultshead'        => 'Результати пошуку',
'resultsperpage'           => 'Кількість результатів на сторінку:',
'contextlines'             => 'Кількість рядків на результат',
'contextchars'             => 'Кількість символів контексту на рядок',
'stub-threshold'           => 'Поріг для визначення оформлення <a href="#" class="stub">посилань на стаби</a> (у байтах):',
'recentchangesdays'        => 'На скільки днів показувати нові редагування:',
'recentchangescount'       => 'Кількість заголовків статей на сторінці нових редагувань:',
'savedprefs'               => 'Ваші налаштування збережено.',
'timezonelegend'           => 'Часовий пояс',
'timezonetext'             => 'Введіть зміщення вашого місцевого часу (в годинах) від часу сервера (UTC - за Гринвічем).',
'localtime'                => 'Місцевий час',
'timezoneoffset'           => 'Зміщення',
'servertime'               => 'Час сервера',
'guesstimezone'            => 'Заповнити з браузера',
'allowemail'               => 'Дозволити електронну пошту від інших користувачів',
'defaultns'                => 'За замовчанням, шукати в таких просторах імен:',
'default'                  => 'за замовчанням',
'files'                    => 'Файли',

# User rights
'userrights-lookup-user'           => 'Управління групами користувача',
'userrights-user-editname'         => "Введіть ім'я користувача:",
'editusergroup'                    => 'Редагувати групи користувачів',
'userrights-editusergroup'         => 'Змінити групи користувача',
'saveusergroups'                   => 'Зберегти групи користувача',
'userrights-groupsmember'          => 'Член груп:',
'userrights-groupsremovable'       => 'Групи для відкликання:',
'userrights-groupsavailable'       => 'Доступні групи:',
'userrights-groupshelp'            => 'Виберіть групи, в які ви бажаєте включити чи з яких бажаєте виключити користувача.
Невибрані групи не зміняться. Зняти виділення з групи можна використовуючи CTRL + ліва кнопка миші.',
'userrights-reason'                => 'Причина зміни:',
'userrights-available-none'        => 'Ви не можете змінювати членство в групі.',
'userrights-available-add-self'    => 'Ви можете включити себе до {{PLURAL:$2|групи $1|наступних груп: $1}}.',
'userrights-available-remove-self' => 'Ви можете виключити себе з {{PLURAL:$2|групи $1|наступних груп: $1}}.',
'userrights-no-interwiki'          => 'У вас нема дозволу змінювати права користувачів на інших вікі.',
'userrights-nodatabase'            => 'База даних $1 не існує або не є локальною.',
'userrights-nologin'               => 'Ви повинні [[Special:Userlogin|ввійти до системи]] з обліковим записом адміністратора, щоб призначати права користувачам.',
'userrights-notallowed'            => 'Із вашого облікового запису не дозволено призначати права користувачам.',

# Groups
'group'               => 'Група:',
'group-autoconfirmed' => 'Автопідтверджені користувачі',
'group-bot'           => 'Боти',
'group-sysop'         => 'Адміністратори',
'group-bureaucrat'    => 'Бюрократи',
'group-all'           => '(всі)',

'group-autoconfirmed-member' => 'автопідтверджений користувач',
'group-bot-member'           => 'бот',
'group-sysop-member'         => 'адміністратор',
'group-bureaucrat-member'    => 'бюрократ',

'grouppage-autoconfirmed' => '{{ns:project}}:Автопідтверджені користувачі',
'grouppage-bot'           => '{{ns:project}}:Боти',
'grouppage-sysop'         => '{{ns:project}}:Адміністратори',
'grouppage-bureaucrat'    => '{{ns:project}}:Бюрократи',

# User rights log
'rightslog'      => 'Журнал прав користувача',
'rightslogtext'  => 'Це протокол зміни прав користувачів.',
'rightslogentry' => 'Користувачу $1 змінено права доступу: з $2 на $3',
'rightsnone'     => '(нема)',

# Recent changes
'nchanges'                          => '$1 {{PLURAL:$1|зміна|зміни|змін}}',
'recentchanges'                     => 'Нові редагування',
'recentchangestext'                 => "<div style=\"text-align:center\">
На цій сторінці показано [[{{ns:help}}:Нові редагування|нові редагування]] у {{grammar:genitive|{{SITENAME}}}}.

[[{{CURRENTDAY}} {{CURRENTMONTHNAMEGEN}}|{{CURRENTDAY}} {{CURRENTMONTHNAMEGEN}}]] [[{{CURRENTYEAR}}]].
В базі даних є '''[[{{ns:special}}:Statistics|{{NUMBEROFARTICLES}}]]''' статей.
<br />Нові — [[{{ns:special}}:Newpages|статті]] — [[{{ns:special}}:Newimages|зображення]] — [[{{ns:special}}:Log/newusers|користувачі]] — [[{{ns:special}}:Contributions/newbies|редагування новачків]] — [[{{ns:special}}:Log|журнали]]
</div>",
'recentchanges-feed-description'    => 'Відстежувати останні зміни у вікі в цьому потоці.',
'rcnote'                            => "{{PLURAL:$1|Остання '''$1''' зміна|Останні '''$1''' зміни|Останні '''$1''' змін}} за '''$2''' {{plural:$2|день|дні|днів}}, на момент часу $3.",
'rcnotefrom'                        => 'Нижче відображені редагування з <strong>$2</strong> (до <strong>$1</strong>).',
'rclistfrom'                        => 'Показати редагування починаючи з $1.',
'rcshowhideminor'                   => '$1 незначні редагування',
'rcshowhidebots'                    => '$1 ботів',
'rcshowhideliu'                     => '$1 зареєстрованих',
'rcshowhideanons'                   => '$1 анонімів',
'rcshowhidepatr'                    => '$1 перевірені',
'rcshowhidemine'                    => '$1 мої редагування',
'rclinks'                           => 'Показати останні $1 редагувань за $2 {{plural:$2|день|дні|днів}};<br />$3.',
'diff'                              => 'різн.',
'hist'                              => 'історія',
'hide'                              => 'сховати',
'show'                              => 'показати',
'minoreditletter'                   => 'м',
'newpageletter'                     => 'Н',
'boteditletter'                     => 'б',
'number_of_watching_users_pageview' => '[$1 {{PLURAL:$1|користувач спостерігає|користувачі спостерігають|користувачів спостерігають}}]',
'rc_categories'                     => 'Тільки з категорій (разділювач «|»)',
'rc_categories_any'                 => 'Будь-який',
'newsectionsummary'                 => '/* $1 */ нова тема',

# Recent changes linked
'recentchangeslinked'          => "Пов'язані редагування",
'recentchangeslinked-title'    => "Пов'язані редагування для «$1»",
'recentchangeslinked-noresult' => "На пов'язаних сторінках не було змін протягом зазначеного періоду.",

# Upload
'upload'                      => 'Завантажити файл',
'uploadbtn'                   => 'Завантажити файл',
'reupload'                    => 'Повторно завантажити',
'reuploaddesc'                => 'Повернутися до форми завантаження',
'uploadnologin'               => 'Ви не ввійшли в систему',
'uploadnologintext'           => 'Щоб завантажувати файли, ви повинні [[Special:Userlogin|ввійти в систему]].',
'upload_directory_read_only'  => 'Веб-сервер не має прав запису в папку ($1), в якій планується зберігати завантажувані файли.',
'uploaderror'                 => 'Помилка завантаження файлу',
'uploadtext'                  => 'За допомогою цієї форми ви можете завантажити файли на сервер.

Якщо файл із вказаною вами назвою вже існує в проекті, то його буде замінено без попередження. Тому, якщо ви не збираєтесь оновлювати файл,
було б непогано перевірити, чи такий файл вже існує.

Щоби переглянути вже завантажені файли,
зайдіть на: [[Special:imagelist|список завантажених файлів]].

Завантаження й вилучення відображаються в [[{{ns:special}}:Log|протоколі завантажень]].

Для вставки зображень в статті можна використовувати такі рядки:
* <nowiki>[[{{ns:image}}:Назва_зображення.jpg]]</nowiki>
* <nowiki>[[{{ns:image}}:Назва_зображення.jpg|thumb|Підпис під зображенням]]</nowiki>

для інших медіа-файлів використовуйте рядок виду:
* <nowiki>[[{{ns:media}}:Назва_звукового_файлу.ogg]]</nowiki></tt>.',
'upload-permitted'            => 'Дозволені типи файлів: $1.',
'upload-preferred'            => 'Бажані типи файлів: $1.',
'upload-prohibited'           => 'Заборонені типи файлів: $1.',
'uploadlog'                   => 'протокол завантажень',
'uploadlogpage'               => 'Протокол завантажень',
'uploadlogpagetext'           => 'Нижче наведено список останніх завантажених файлів.',
'filename'                    => 'Назва файлу',
'filedesc'                    => 'Опис файлу',
'fileuploadsummary'           => 'Короткий опис:',
'filestatus'                  => 'Умови поширення',
'filesource'                  => 'Джерело',
'uploadedfiles'               => 'Завантажені файли',
'ignorewarning'               => 'Ігнорувати попередження і зберегти файл',
'ignorewarnings'              => 'Ігнорувати всі попередження',
'minlength1'                  => 'Назва файлу повинна містити щонайменше одну літеру.',
'illegalfilename'             => 'Ім\'я файлу "$1" містить букви, що недозволені в заголовках сторінок. Будь ласка перейменуйте файл і спробуйте завантажити його знову.',
'badfilename'                 => 'Назву файла було змінено на $1.',
'filetype-badmime'            => 'Файли, що мають MIME-тип «$1», не можуть бути завантажені.',
'filetype-unwanted-type'      => "'''\".\$1\"''' — небажаний тип файлу. Бажані типи файлів: \$2.",
'filetype-banned-type'        => "'''\".\$1\"''' — заборонений тип файлу. Дозволені типи файлів: \$2.",
'filetype-missing'            => 'Відсутнє розширення файлу (наприклад, «.jpg»).',
'large-file'                  => 'Рекомендується використовувати зображення, розмір яких не перевищує $1 байтів (размір завантаженого файлу складає $2 байтів).',
'largefileserver'             => 'Розмір файлу більший за максимальнодозволений.',
'emptyfile'                   => 'Завантажений вами файл ймовірно порожній. Можливо, це сталося через помилку при введенні імені файлу. Будь-ласка, перевірте, чи справді ви бажаєте звантажити цей файл.',
'fileexists'                  => 'Файл з такою назвою вже існує. Перевірте, будь-ласка, $1 якщо ви не впевнені чи хочете змінювати його.',
'filepageexists'              => 'Сторінка (не файл) з такою назвою вже існує, будь ласка, подивіться <strong><tt>$1</tt></strong>, якщо ви не впевнені, чи хочете ви її змінювати.',
'fileexists-extension'        => 'Існує файл зі схожою назвою:<br />
Назва завантаженого файлу: <strong><tt>$1</tt></strong><br />
Назва існуючого файлу: <strong><tt>$2</tt></strong><br />
Будьте ласкаві, виберіть іншу назву.',
'fileexists-thumb'            => "<center>'''Існуюче зображення'''</center>",
'fileexists-thumbnail-yes'    => 'Можливо, файл є зменшеною копією (мініатюрою). Будь ласка, перевірте файл <strong><tt>$1</tt></strong>.<br />
Якщо вказаний файл є тим самим зображенням, не варто окремо завантажувати його зменшену копію.',
'file-thumbnail-no'           => 'Назва файлу починається на <strong><tt>$1</tt></strong>. Можллво, це зменшена копія зображення (мініатюра).
Якщо у вас є дане зображення у повному розмірі, будьте ласкаві, завантажте його, інакше змініть назву файлу.',
'fileexists-forbidden'        => 'Файл з такою назвою вже існує; будь ласка поверніться та завантажте цей файл під іншою назвою. [[Image:$1|thumb|center|$1]]',
'fileexists-shared-forbidden' => 'Файл з такою назвою вже існує в загальному сховищі файлів; будь-ласка, поверніться назад й завантажте файл під іншою назвою. [[Image:$1|thumb|center|$1]]',
'successfulupload'            => 'Завантаження успішно завершено',
'uploadwarning'               => 'Попередження',
'savefile'                    => 'Зберегти файл',
'uploadedimage'               => 'завантажено «[[$1]]»',
'overwroteimage'              => 'завантажена нова версія «[[$1]]»',
'uploaddisabled'              => 'Завантаження заборонене.',
'uploaddisabledtext'          => 'Вибачте, можливість завантаження на даному сайті відключена.',
'uploadscripted'              => 'Файл містить HTML-код або скрипт, який може помилково обробитися браузером.',
'uploadcorrupt'               => 'Файл пошкоджений, або має невірне розширення. Будь-ласка, перевірте файл й спробуйте завантажити його ще раз.',
'uploadvirus'                 => 'Файл містить вірус! Див. $1',
'sourcefilename'              => 'Назва початкового файлу',
'destfilename'                => 'Назва завантаженого файлу',
'watchthisupload'             => 'Додати цей файл до списку спостереження',
'filewasdeleted'              => 'Файл з такою назвою вже існував, але був вилучений. Будь-ласка, перевірте $1 перед повторним завантаженням.',
'upload-wasdeleted'           => "'''Попередження: ви хочете завантажити файл, який раніше вилучався.'''

Перевірте, чи справді варто завантажувати файл.
Нижче показано журнал вилучень для цього файла:",
'filename-bad-prefix'         => 'Назва завантажуваного файлу починається на <strong>«$1»</strong> і, можливо, є шаблонною назвою, яку цифрова фотокамера дає знімкам. Будь ласка, виберіть назву, яка краще описуватиме вміст файлу.',

'upload-proto-error'      => 'Невірний протокол',
'upload-proto-error-text' => 'Віддалене завантаження вимагає адресів, що починаються з <code>http://</code> або <code>ftp://</code>.',
'upload-file-error'       => 'Внутрішня помилка',
'upload-file-error-text'  => 'Внутрішня помилка при спробі створити тимчасовий файл на сервері. Будь-ласка, зверніться до системного адміністратора.',
'upload-misc-error'       => 'Невідома помилка завантаження',
'upload-misc-error-text'  => 'Невідома помилка завантаження. Будь-ласка, перевірте, що вказана адреса вірна й спробуйте ще. Якщо проблема виникає знову, зверніться до системного адміністратора.',

# Some likely curl errors. More could be added from <http://curl.haxx.se/libcurl/c/libcurl-errors.html>
'upload-curl-error6'       => 'Неможливо досягнути вказану адресу.',
'upload-curl-error6-text'  => 'Неможливо досягнути вказану адресу. Будь-ласка, перевірте, що вказана адреса вірна, а сайт доступний.',
'upload-curl-error28'      => 'Час виділений на завантаження вичерпано',
'upload-curl-error28-text' => 'Сайт надто довго не відповідає. Будь-ласка, перевірте, що сайт працює й після невеликої паузи спробуйте ще. Можливо, операцію слід провести в інший час, коли сайт менш завантажений.',

'license'            => 'Ліцензування',
'nolicense'          => 'Відсутнє',
'license-nopreview'  => '(Попередній перегляд недоступний)',
'upload_source_url'  => ' (вірна, публічно доступна інтернет-адреса)',
'upload_source_file' => " (файл на вашому комп'ютері)",

# Image list
'imagelist'                 => 'Список файлів',
'imagelist-summary'         => 'Ця спеціальна сторінка показує всі завантажені файли.
За замовчуванням останні завантажені файли показані зверху.
Натисніть на заголовок стовпчика, щоб відсортувати.',
'imagelisttext'             => "Нижче подано список з '''$1''' {{plural:$1|файлу|файлів|файлів}}, відсортованих $2.",
'getimagelist'              => 'отримання списку файлів',
'ilsubmit'                  => 'Шукати',
'showlast'                  => 'Показати останні $1 {{plural:$1|файл|файли|файлів}}, {{plural:$1|впорядкований|впорядковані|впорядкованих}} $2.',
'byname'                    => 'за назвою',
'bydate'                    => 'за датою',
'bysize'                    => 'за розміром',
'imgdelete'                 => 'вилуч.',
'imgdesc'                   => 'опис',
'imgfile'                   => 'файл',
'filehist'                  => 'Історія файлу',
'filehist-help'             => 'Клацніть на дату/час, щоб переглянути, як тоді виглядав файл.',
'filehist-deleteall'        => 'вилучити всі',
'filehist-deleteone'        => 'вилучити цей',
'filehist-revert'           => 'повернути',
'filehist-current'          => 'поточний',
'filehist-datetime'         => 'Дата/час',
'filehist-user'             => 'Користувач',
'filehist-dimensions'       => "Розмір об'єкта",
'filehist-filesize'         => 'Розмір файлу',
'filehist-comment'          => 'Коментар',
'imagelinks'                => 'Посилання',
'linkstoimage'              => 'Ось статті, що посилаються на даний файл:',
'nolinkstoimage'            => 'Статті, що посилаються на дане зображення, відсутні.',
'sharedupload'              => 'Цей файл завантажений до спільного для багатьох проектів сховища.',
'shareduploadwiki'          => 'Додаткову інформацію можна знайти на $1.',
'shareduploadwiki-desc'     => 'Опис, зазначений на його $1, показаний нижче.',
'shareduploadwiki-linktext' => 'сторінці опису файлу',
'noimage'                   => 'Немає файлу з такою назвою, ви можете $1.',
'noimage-linktext'          => 'завантажити його',
'uploadnewversion-linktext' => 'Завантажити нову версію цього файлу',
'imagelist_date'            => 'Дата',
'imagelist_name'            => 'Назва',
'imagelist_user'            => 'Користувач',
'imagelist_size'            => 'Розмір (в байтах)',
'imagelist_description'     => 'Опис',
'imagelist_search_for'      => 'Пошук по назві зображення:',

# File reversion
'filerevert'                => 'Повернення до старої версії $1',
'filerevert-legend'         => 'Повернути версію файлу',
'filerevert-intro'          => '<span class="plainlinks">Ви повертаєте \'\'\'[[Media:$1|$1]]\'\'\' до [$4 версії від $3, $2].</span>',
'filerevert-comment'        => 'Примітка:',
'filerevert-defaultcomment' => 'Повернення до версії від $2, $1',
'filerevert-submit'         => 'Повернути',
'filerevert-success'        => '<span class="plainlinks">\'\'\'[[Media:$1|$1]]\'\'\' був повернутий до [$4 версії від $3, $2].</span>',
'filerevert-badversion'     => 'Немає локальної версії цього файлу з вказаною поміткою дати і часу.',

# File deletion
'filedelete'                  => 'Вилучення $1',
'filedelete-legend'           => 'Вилучити файл',
'filedelete-intro'            => "Ви вилучаєте '''[[Media:$1|$1]]'''.",
'filedelete-intro-old'        => '<span class="plainlinks">Ви вилучаєте версію \'\'\'[[Media:$1|$1]]\'\'\' від [$4 $3, $2].</span>',
'filedelete-comment'          => 'Причина вилучення:',
'filedelete-submit'           => 'Вилучити',
'filedelete-success'          => "'''$1''' було вилучено.",
'filedelete-success-old'      => '<span class="plainlinks">Версія \'\'\'[[Media:$1|$1]]\'\'\' від $3, $2 була вилучена.</span>',
'filedelete-nofile'           => "Файл '''$1''' не існує у {{GRAMMAR:genitive|{{SITENAME}}}}.",
'filedelete-nofile-old'       => "Не існує архівної версії '''$1''' із зазначеними атрибутами.",
'filedelete-iscurrent'        => 'Ви намагаєтесь вилучити останню версію цього файлу. Будь ласка, поверніть спочатку файл до однієї зі старих версій.',
'filedelete-otherreason'      => 'Інша/додаткова причина:',
'filedelete-reason-otherlist' => 'Інша причина',
'filedelete-reason-dropdown'  => '* Поширені причини вилучення
** порушення авторських прав
** файл-дублікат',

# MIME search
'mimesearch'         => 'Пошук по MIME',
'mimesearch-summary' => 'Ця сторінка дозволяє вибирати файли за їх MIME-типом. Формат вводу: тип_вмісту/підтип, наприклад <tt>image/jpeg</tt>.',
'mimetype'           => 'MIME-тип:',
'download'           => 'завантажити',

# Unwatched pages
'unwatchedpages' => 'Сторінки, за якими ніхто не спостерігає',

# List redirects
'listredirects' => 'Список перенаправлень',

# Unused templates
'unusedtemplates'     => 'Шаблони, що не використовуються',
'unusedtemplatestext' => 'На цій сторінці перераховані все сторінки простору імен «Шаблони», які не включені в інші сторінки. Не забувайте перевірити відсутність інших посилань на шаблон, перш ніж вилучати його.',
'unusedtemplateswlh'  => 'інші посилання',

# Random page
'randompage'         => 'Випадкова стаття',
'randompage-nopages' => 'У цьому просторі назв нема сторінок.',

# Random redirect
'randomredirect'         => 'Випадкове перенаправлення',
'randomredirect-nopages' => 'Цей простір назв не містить перенаправлень.',

# Statistics
'statistics'             => 'Статистика',
'sitestats'              => 'Статистика сайту',
'userstats'              => 'Статистика користувачів',
'sitestatstext'          => "Загалом в базі даних є '''\$1''' сторінок.
Сюди входять сторінки «обговорень», статті про Вікіпедію, мінімальні статті-\"заглушки\", перенаправлення, та інші сторінки, які, можливо, не повинні розглядатися як статті.
За винятком них, є '''\$2''' сторінок, які вважаються повноцінними статтями. Для того щоб сторінка вважалася повноцінною статтею, вона повинна перебувати в основному просторі імен і містити хоча б одне внутрішнє посилання.<p>

З моменту встановлення програмного забезпечення зроблено '''\$3''' переглядів та '''\$4''' редагувань статей.
Таким чином, в середньому на одну сторінку припадає '''\$5''' редагувань та '''\$6''' переглядів на одне редагування.

{{plural:\$8 | Був завантажений | Було завантажено | Було завантажено}} '''\$8''' {{plural:\$8 | файл | файли | файлів}}.

Величина [[:meta:Help:Job queue | черги завдань]] становить '''\$7'''.",
'userstatstext'          => "{{plural:$1|Зареєструвався|Зареєструвалися|Зареєструвалися}} '''$1''' {{plural:$1|користувач|користувачі|користувачів}}, з яких '''$2''' ($4 %) {{PLURAL:$2|має|мають|мають}} права «$5».",
'statistics-mostpopular' => 'Сторінки, які найчастіше переглядають',

'disambiguations'      => 'Багатозначні статті',
'disambiguationspage'  => '{{SITENAME}}:Посилання на багатозначні статті

*[[{{ns:template}}:Disambig]]',
'disambiguations-text' => "Наступні сторінки посилаються на '''багатозначні сторінки'''. Однак вони, ймовірно, повинні вказувати на відповідну конкретну статтю.<br />Сторінка вважається багатозначною, якщо на ній розміщений шаблон, назва якого є на сторінці [[MediaWiki:Disambiguationspage]].",

'doubleredirects'     => 'Подвійні перенаправлення',
'doubleredirectstext' => '<b>Увага:</b> Цей список може містити невірні елементи. Це значить, що після першої директиви #REDIRECT йде додатковий текст з посиланнями.<br />
Кожен рядок містить посилання на перше та друге перенаправлення, а також перший рядок тексту другого перенаправлення, що, звичайно, містить "реальне" перенаправлення на необхідну статтю, куди повинно вказувати й перше перенаправлення.',

'brokenredirects'        => 'Розірвані перенаправлення',
'brokenredirectstext'    => 'Наступні перенаправлення вказують на неіснуючі статті:',
'brokenredirects-edit'   => '(редагувати)',
'brokenredirects-delete' => '(вилучити)',

'withoutinterwiki'        => 'Сторінки без міжмовних посилань',
'withoutinterwiki-header' => 'Наступні сторінки не мають інтервікі-посилань:',
'withoutinterwiki-submit' => 'Показати',

'fewestrevisions' => 'Сторінки з найменшою кількістю змін',

# Miscellaneous special pages
'nbytes'                  => '$1 {{PLURAL:$1|байт|байти|байтів}}',
'ncategories'             => '$1 {{PLURAL:$1|категорія|категорії|категорій}}',
'nlinks'                  => '$1 {{PLURAL:$1|посилання|посилання|посилань}}',
'nmembers'                => "$1 {{PLURAL:$1|об'єкт|об'єкти|об'єктів}}",
'nrevisions'              => '$1 {{PLURAL:$1|версія|версії|версій}}',
'nviews'                  => '$1 {{PLURAL:$1|перегляд|перегляди|переглядів}}',
'specialpage-empty'       => 'Запит не дав результатів.',
'lonelypages'             => 'Статті-сироти',
'lonelypagestext'         => 'На наступні сторінки не посилається жодна стаття цієї вікі.',
'uncategorizedpages'      => 'Некатегоризовані сторінки',
'uncategorizedcategories' => 'Некатегоризовані категорії',
'uncategorizedimages'     => 'Некатегоризовані зображення',
'uncategorizedtemplates'  => 'Некатегоризовані шаблони',
'unusedcategories'        => 'Категорії, що не використовуються',
'unusedimages'            => 'Файли, що не використовуються',
'popularpages'            => 'Популярні статті',
'wantedcategories'        => 'Необхідні категорії',
'wantedpages'             => 'Необхідні статті',
'mostlinked'              => 'Сторінки, на які найбільше посилань',
'mostlinkedcategories'    => 'Категорії, на які найбільше посилань',
'mostlinkedtemplates'     => 'Найуживаніші шаблони',
'mostcategories'          => 'Статті з найбільшою кількістю категорій',
'mostimages'              => 'Найуживаніші зображення',
'mostrevisions'           => 'Статті з найбільшою кількістю редакцій',
'allpages'                => 'Усі сторінки',
'prefixindex'             => 'Статті, що починаються з',
'shortpages'              => 'Короткі статті',
'longpages'               => 'Довгі статті',
'deadendpages'            => 'Статті без посилань',
'deadendpagestext'        => 'Наступні сторінки не містять посилань на інші сторінки цієї вікі.',
'protectedpages'          => 'Захищені сторінки',
'protectedpagestext'      => 'Наступні сторінки захищені від перейменування або зміни.',
'protectedpagesempty'     => 'Зараз нема захищених сторінок із зазначеними параметрами',
'protectedtitles'         => 'Заборонені назви',
'protectedtitlestext'     => 'Наступні назви не дозволено використовувати',
'protectedtitlesempty'    => 'Зараз нема захищених назв із зазначеними параметрами.',
'listusers'               => 'Список користувачів',
'specialpages'            => 'Спеціальні сторінки',
'spheading'               => 'Спеціальні сторінки',
'restrictedpheading'      => 'Спеціальні сторінки з обмеженим доступом',
'newpages'                => 'Нові сторінки',
'newpages-username'       => "Ім'я користувача:",
'ancientpages'            => 'Найстаріші статті',
'intl'                    => 'Міжмовні посилання',
'move'                    => 'Перейменувати',
'movethispage'            => 'Перейменувати цю сторінку',
'unusedimagestext'        => '<p>Будь-ласка, врахуйте, що інші веб-сайти можуть використовувати прямі посилання (URL) на це зображення, і тому зображення може активно використовуватися не дивлячись на його присутність в цьому списку.',
'unusedcategoriestext'    => 'Існують такі сторінки-категорій, що не містять статей чи інших категорій.',
'notargettitle'           => 'Не вказано ціль',
'notargettext'            => 'Ви не вказали цільову статтю чи користувача, для яких необхідно виконати цю дію.',
'pager-newer-n'           => '{{PLURAL:$1|новіша $1|новіші $1}}',
'pager-older-n'           => '{{PLURAL:$1|старіша $1|старіші $1}}',

# Book sources
'booksources'               => 'Джерела книг',
'booksources-search-legend' => 'Пошук інформації про книгу',
'booksources-go'            => 'Знайти',
'booksources-text'          => 'На цій сторінці наведено список посилань на сайти, де ви, можливо, знайдете додаткову інформацію про книгу. Це інтернет-магазини й системи пошуку в бібліотечних каталогах.',

'categoriespagetext' => 'У вікі є такі категорії.',
'data'               => 'Дані',
'userrights'         => 'Управління правами користувачів',
'groups'             => 'Групи користувачів',
'alphaindexline'     => 'від $1 до $2',
'version'            => 'Версія MediaWiki',

# Special:Log
'specialloguserlabel'  => 'Користувач:',
'speciallogtitlelabel' => 'Назва:',
'log'                  => 'Журнали',
'all-logs-page'        => 'Усі журнали',
'log-search-legend'    => 'Пошук журналів',
'log-search-submit'    => 'Знайти',
'alllogstext'          => 'Комбінований показ журналів завантаження, видалення, захисту, блокування й адміністрування. Ви можете відфільтрувати результати по типу журналу, імені користувача або сторінки.',
'logempty'             => 'В журналі немає подібних записів.',
'log-title-wildcard'   => 'Знайти заголовки, що починаються з цих символів',

# Special:Allpages
'nextpage'          => 'Наступна сторінка ($1)',
'prevpage'          => 'Попередня сторінка ($1)',
'allpagesfrom'      => 'Показати сторінки, що починаються з:',
'allarticles'       => 'Усі сторінки',
'allinnamespace'    => 'Усі сторінки (простір назв $1)',
'allnotinnamespace' => 'Усі сторінки (крім простору назв $1)',
'allpagesprev'      => 'Попередні',
'allpagesnext'      => 'Наступні',
'allpagessubmit'    => 'Виконати',
'allpagesprefix'    => 'Знайти сторінки, що починаються з:',
'allpagesbadtitle'  => 'Недопустима назва сторінки. Заголовок містить інтервіки, міжмовний префікс або заборонені в заголовках символи.',
'allpages-bad-ns'   => '{{SITENAME}} не має простору назв «$1».',

# Special:Listusers
'listusersfrom'      => 'Показати користувачів, починаючи з:',
'listusers-submit'   => 'Показати',
'listusers-noresult' => 'Не знайдено користувачів.',

# E-mail user
'mailnologin'     => 'Відсутня адреса для відправки',
'mailnologintext' => 'Щоб мати можливість відправляти електронну пошту іншим користувачам ви повинні [[{{ns:special}}:Userlogin|ввійти в систему]]
й мати адресу електронної пошти в ваших [[{{ns:special}}:Preferences|налаштуваннях]],
щоб мати можливість надсилати електронну пошту іншим користувачам.',
'emailuser'       => 'Надіслати листа цьому користувачеві',
'emailpage'       => 'Лист користувачеві',
'emailpagetext'   => 'Якщо цей користувач зазначив справжню адресу електронної пошти у своїх налаштуваннях, то, заповнивши наведену нижче форму, можна надіслати йому повідомлення.
Електронна адреса, яку ви вказали у своїх налаштуваннях, буде зазначена в полі «Від кого» листа, тому одержувач матиме можливість відповісти.',
'usermailererror' => 'При відправці повідомлення електронної пошти сталася помилка:',
'defemailsubject' => '{{SITENAME}}: лист',
'noemailtitle'    => 'Відсутня адреса електронної пошти',
'noemailtext'     => 'Цей користувач не вказав коректної адреси електронної пошти, або вказав, що не бажає отримувати листи від інших користувачів.',
'emailfrom'       => 'Від кого',
'emailto'         => 'Кому',
'emailsubject'    => 'Тема листа',
'emailmessage'    => 'Повідомлення',
'emailsend'       => 'Надіслати',
'emailccme'       => 'Надіслати мені копію повідомлення.',
'emailccsubject'  => 'Копія вашого повідомлення до $1: $2',
'emailsent'       => 'Електронне повідомлення надіслано',
'emailsenttext'   => 'Ваше електронне повідомлення надіслано.',

# Watchlist
'watchlist'            => 'Список спостереження',
'mywatchlist'          => 'Список спостереження',
'watchlistfor'         => "(користувача '''$1''')",
'nowatchlist'          => 'Ваш список спостереження порожній.',
'watchlistanontext'    => 'Вам необхідно $1, щоб переглянути чи редагувати список спостереження.',
'watchnologin'         => 'Ви не ввійшли до системи',
'watchnologintext'     => 'Щоб змінювати список спостереження, ви повинні [[{{ns:special}}:Userlogin|ввійти в систему]].',
'addedwatch'           => 'Додана до списку спостереження',
'addedwatchtext'       => "Сторінка «[[:$1]]» додана до вашого [[{{ns:special}}:Watchlist|списку спостереження]]. Наступні редагування цієї статті і пов'язаної з нею сторінки обговорення будуть відображатися в цьому списку, а також будуть виділені <b>жирним шрифтом</b> на сторінці зі [[{{ns:special}}:Recentchanges|списком останніх редагувань]], щоб їх було легше помітити.

Якщо пізніше ви захочете вилучити статтю зі списку спостереження, виберіть <b>«Скасувати спостереження»</b> серед закладок.",
'removedwatch'         => 'Вилучена зі списку спостереження',
'removedwatchtext'     => 'Сторінка «[[:$1]]» вилучена з вашого списку спостереження.',
'watch'                => 'Спостерігати',
'watchthispage'        => 'Спостерігати за цією сторінкою',
'unwatch'              => 'Скасувати спостереження',
'unwatchthispage'      => 'Скасувати спостереження',
'notanarticle'         => 'Не стаття',
'watchnochange'        => 'За вказаний період в статтях з списку спостереження нічого не змінено.',
'watchlist-details'    => 'В вашому списку спостереження є $1 {{plural:$1|сторінка|сторінки|сторінок}} (не враховуючи сторінок обговорення).',
'wlheader-enotif'      => '* Звістка ел. поштою ввімкнено.',
'wlheader-showupdated' => "* Сторінки, що змінилися після вашого останнього їх відвідування, виділені '''жирним''' шрифтом.",
'watchmethod-recent'   => 'перегляд останніх редагувань статей за якими ведеться спостереження',
'watchmethod-list'     => 'перегляд статей за якими ведеться спостереження',
'watchlistcontains'    => 'Ваш список спостереження містить $1 {{plural:$1|сторінку|сторінки|сторінок}}.',
'iteminvalidname'      => 'Проблема з елементом «$1», недопустима назва…',
'wlnote'               => 'Нижче наведені останні $1 {{plural:$1|редагування|редагування|редагувань}} за {{plural:$2|останній|останні|останні}} <strong>$2</strong> {{plural:$2|годину|години|годин}}.',
'wlshowlast'           => 'Показати останні $1 години $2 дні $3',
'watchlist-show-bots'  => 'Показати редагування ботів',
'watchlist-hide-bots'  => 'Сховати редагування ботів',
'watchlist-show-own'   => 'показати мої редагування',
'watchlist-hide-own'   => 'сховати мої редагування',
'watchlist-show-minor' => 'показати незначні редагування',
'watchlist-hide-minor' => 'сховати незначні редагування',

# Displayed when you click the "watch" button and it's in the process of watching
'watching'   => 'Додавання до списку спостереження…',
'unwatching' => 'Вилучення зі списку спостереження…',

'enotif_mailer'                => '{{SITENAME}} Служба сповіщення поштою',
'enotif_reset'                 => 'Помітити всі сторінки як переглянуті',
'enotif_newpagetext'           => 'Це нова сторінка.',
'enotif_impersonal_salutation' => 'Користувач {{grammar:genitive|{{SITENAME}}}}',
'changed'                      => 'змінено',
'created'                      => 'створено',
'enotif_subject'               => 'Сторінку проекту «{{SITENAME}}» $PAGETITLE було $CHANGEDORCREATED користувачем $PAGEEDITOR',
'enotif_lastvisited'           => 'Див. $1 щоб переглянути всі зміни, що відбулися після вашого останнього перегляду.',
'enotif_lastdiff'              => 'Див. $1 для ознайомлення з цією зміною.',
'enotif_anon_editor'           => 'анонімний користувач $1',
'enotif_body'                  => '$WATCHINGUSERNAME,

$PAGEEDITDATE сторінку проекту «{{SITENAME}}» $PAGETITLE було $CHANGEDORCREATED користувачем $PAGEEDITOR, див. $PAGETITLE_URL щоб переглянути поточну версію.

$NEWPAGE

Короткий опис змін: $PAGESUMMARY $PAGEMINOREDIT

Звернутися до користувача, що редагував:
ел. почта $PAGEEDITOR_EMAIL
вікі $PAGEEDITOR_WIKI

Не буде подальшого сповіщення в разі нових змін, якщо Ви не відвідуєте цю сторінку. Ви могли також повторно встановити флаги сповіщення для всіх сторінок в вашому списку спостереження.

             Система сповіщення {{grammar:genitive|{{SITENAME}}}}

--
Змінити налаштування вашого списку спостереження можна на
{{fullurl:{{ns:special}}:Watchlist/edit}}

Зворотній зв\'язок та допомога:
{{fullurl:{{ns:help}}:Зміст}}',

# Delete/protect/revert
'deletepage'                  => 'Вилучити сторінку',
'confirm'                     => 'Підтвердження',
'excontent'                   => 'зміст: «$1»',
'excontentauthor'             => 'зміст був: «$1» (єдиним автором був [[{{ns:special}}:Contributions/$2|$2]])',
'exbeforeblank'               => 'зміст до очистки: «$1»',
'exblank'                     => 'стаття була порожньою',
'delete-confirm'              => 'Вилучити «$1»',
'delete-legend'               => 'Вилучення',
'historywarning'              => 'Попередження: сторінка, яку ви збираєтеся вилучити, має історію редагувань:',
'confirmdeletetext'           => 'Ви ось-ось назавжди вилучите статтю або файл і всі її журнали редагувань з бази даних.
Будь-ласка, підтвердіть, що ви бажаєте зробити це, що ви повністю розумієте наслідки і що ви робите це у відповідності з [[{{ns:project}}:Правила|правилами Вікіпедії]].',
'actioncomplete'              => 'Дію виконано',
'deletedtext'                 => '"<nowiki>$1</nowiki>" було вилучено.
Див. $2 для перегляду списку останніх вилучень.',
'deletedarticle'              => 'вилучено "$1"',
'dellogpage'                  => 'Список вилучень',
'dellogpagetext'              => 'Нижче наведено список останніх вилучень.',
'deletionlog'                 => 'список вилучень',
'reverted'                    => 'Відновлено зі старої версії',
'deletecomment'               => 'Причина вилучення',
'deleteotherreason'           => 'Інша/додаткова причина:',
'deletereasonotherlist'       => 'Інша причина',
'deletereason-dropdown'       => '* Типові причини вилучення
** вандалізм
** за запитом автора
** порушення авторських прав',
'delete-toobig'               => 'У цієї сторінки дуже довга історія змін, більше $1 версій. Вилучення таких сторінок було заборонене з метою уникнення порушень у роботі сайту {{SITENAME}}.',
'delete-warning-toobig'       => 'У цієї сторінки дуже довга історія змін, більше $1 версій. Її вилучення може призвести до порушень у роботі бази даних сайту {{SITENAME}}; дійте обережно.',
'rollback'                    => 'Відкинути редагування',
'rollback_short'              => 'Відкинути',
'rollbacklink'                => 'відкинути',
'rollbackfailed'              => 'Відкинути зміни не вдалося',
'cantrollback'                => 'Неможливо відкинути редагування, останній хто редагував є єдиним автором цієї статті.',
'alreadyrolled'               => 'Неможливо відкинути останні редагування [[:$1]], зроблені [[User:$2|$2]] ([[User talk:$2|обговорення]]); хтось інший уже змінив чи відкинув редагування цієї статті.

Останні редагування зробив [[User:$3|$3]] ([[User talk:$3|обговорення]]).',
'editcomment'                 => 'Редагування прокоментовано так: <em>«$1»</em>.', # only shown if there is an edit comment
'revertpage'                  => 'Редагування користувача [[{{ns:special}}:Contributions/$2|$2]] ([[User_talk:$2|обговорення]]) відкинуті до версії користувача [[User:$1|$1]]', # Additional available: $3: revid of the revision reverted to, $4: timestamp of the revision reverted to, $5: revid of the revision reverted from, $6: timestamp of the revision reverted from
'rollback-success'            => 'Відкинуті редагування користувача $1; повернення до версії користувача $2.',
'sessionfailure'              => 'Здається, виникли проблеми с поточним сеансом роботи;
цю дію було відмінено з ціллю попередити «захоплення сеансу».
Будь-ласка, натисніть кнопку «Назад» й перезавантажте сторінку, з якої ви пришли.',
'protectlogpage'              => 'Протокол захисту',
'protectlogtext'              => 'Нижче наведено список установок й зняття захисту з сторінки.
Додаткова інформація: [[{{ns:project}}:Захищена стаття]].',
'protectedarticle'            => 'захист на [[$1]] встановлено',
'modifiedarticleprotection'   => 'змінено рівень захисту сторінки «[[$1]]»',
'unprotectedarticle'          => 'знято захист зі сторінки «[[$1]]»',
'protectsub'                  => '(Встановлення захисту для «$1»)',
'confirmprotect'              => 'Підтвердження встановлення захисту',
'protectcomment'              => 'Причина встановлення захисту',
'protectexpiry'               => 'Закінчується:',
'protect_expiry_invalid'      => 'Неправильний час закінчення захисту.',
'protect_expiry_old'          => 'Час закінчення — в минулому.',
'unprotectsub'                => '(Зняття захисту з «$1»)',
'protect-unchain'             => 'Розблокувати перейменування сторінки',
'protect-text'                => 'Тут ви можете переглянути ти змінити рівень захисту сторінки <strong>[[:$1]]</strong>.',
'protect-locked-blocked'      => 'Ви не можете змінювати рівень захисту сторінки, доки ваш обліковий запис заблокований. Поточні установки для сторінки <strong>[[:$1]]</strong>:',
'protect-locked-dblock'       => 'Рівень захисту не може бути зміненим, так як основна база даних тимчасово заблокована.
Поточні установки для сторінки <strong>[[:$1]]</strong>:',
'protect-locked-access'       => 'У вашого облікового запису недостатньо прав для зміни рівня захисту сторінки.
Поточні установки для сторінки: <strong>$1</strong>:',
'protect-cascadeon'           => 'Ця сторінка захищена, бо вона включена {{PLURAL:$1|до зазначеної нижче сторінки, на яку|до нижчезазначених сторінок, на які}} встановлено каскадний захист. Ви можете змінити рівень захисту цієї сторінки, але це не вплине на каскадний захист.',
'protect-default'             => '(за замовчанням)',
'protect-fallback'            => 'Потрібен дозвіл «$1»',
'protect-level-autoconfirmed' => 'Захистити від незареєстрованих та нових користувачів',
'protect-level-sysop'         => 'Тільки адміністратори',
'protect-summary-cascade'     => 'каскадний',
'protect-expiring'            => 'закінчується $1 (UTC)',
'protect-cascade'             => 'Захистити сторінки, що включені до цієї сторінки (каскадний захист)',
'protect-cantedit'            => 'Ви не можете змінювати рівень захисту цієї сторінки, тому що ви не маєте прав для її редагування.',
'restriction-type'            => 'Права:',
'restriction-level'           => 'Рівень доступу:',
'minimum-size'                => 'Мінімальний розмір',
'maximum-size'                => 'Максимальний розмір:',
'pagesize'                    => '(байтів)',

# Restrictions (nouns)
'restriction-edit'   => 'Редагувати',
'restriction-move'   => 'Перемістити',
'restriction-create' => 'Створення',

# Restriction levels
'restriction-level-sysop'         => 'повний захист',
'restriction-level-autoconfirmed' => 'частковий захист',
'restriction-level-all'           => 'усі рівні',

# Undelete
'undelete'                     => 'Переглянути вилучені статті',
'undeletepage'                 => 'Переглянути й відновити вилучені статті',
'viewdeletedpage'              => 'Переглянути видалені сторінки',
'undeletepagetext'             => 'Наступні статті було вилучено, але вони ще в архіві і тому можуть бути відновлені. Архів періодично очищається.',
'undeleteextrahelp'            => "Для повного відновлення сторінки залиште всі поля пустими й натисніть '''«Відновити»'''. Для часткового відновлення відмітьте ті версії сторінки, які необхідно відновити й натисніть '''«Відновити»'''. Натисніть '''«Очистити»''', щоб вимкнути всі помітки й очистити коментар.",
'undeleterevisions'            => 'В архіві $1 {{plural:$1|версія|версії|версій}}',
'undeletehistory'              => 'Якщо ви відновите статтю, всі версії будуть також відновлені, разом з журналом редагувань.
Якщо з моменту вилучення було створено статтю з такою ж назвою, відновлені версії будуть вказані в журналі редагувань перед новими записами, але поточна версія існуючої статті не буде замінена автоматично.',
'undeletehistorynoadmin'       => 'Стаття вилучена. Причина вилучення та список користувачів, що редагували статтю до вилучення, вказані нижче. Текст вилученої статті можуть переглянути лише адміністратори.',
'undelete-revision'            => 'Вилучена версія $1 (від $2, вилучив $3):',
'undeleterevision-missing'     => 'Невірна версія. Помилкове посилання, або вказану версію сторінки вилучено з архіву.',
'undelete-nodiff'              => 'Не знайдена попередня версія.',
'undeletebtn'                  => 'Відновити',
'undeletelink'                 => 'відновити',
'undeletereset'                => 'Очистити',
'undeletecomment'              => 'Коментар:',
'undeletedarticle'             => '«[[$1]]» відновлено',
'undeletedrevisions'           => '$1 {{plural:$1|редагування|редагування|редагувань}} відновлено',
'undeletedrevisions-files'     => '$1 {{plural:$1|версія|версії|версій}} та $2 {{plural:$2|файл|файли|файлів}} відновлено',
'undeletedfiles'               => '$1 {{plural:$1|файл|файли|файлів}} відновлено',
'cannotundelete'               => 'Не вдалося скасувати видалення, хтось інший вже міг відмінити видалення сторінки.',
'undeletedpage'                => "<big>'''Статтю \"\$1\" відновлено'''</big>

Подивіться [[{{ns:special}}:Log/delete|список вилучень]], щоб дізнатися про останні вилучення та відновлення.",
'undelete-header'              => 'Список нещодавно вилучених сторінок можна переглянути в [[{{ns:special}}:Log/delete|журналі вилучень]].',
'undelete-search-box'          => 'Пошук вилучених сторінок',
'undelete-search-prefix'       => 'Показати сторінки, що починаються з:',
'undelete-search-submit'       => 'Знайти',
'undelete-no-results'          => 'Не знайдено потрібних сторінок серед вилучених.',
'undelete-filename-mismatch'   => 'Неможливо відновити версію файлу з відміткою часу $1: невідповідність назви файлу',
'undelete-bad-store-key'       => 'Неможливо відновити версію файлу з позначкою часу $1: файл був відсутнім до вилучення.',
'undelete-cleanup-error'       => 'Помилка вилучення архівного файлу, що не використовується, «$1».',
'undelete-missing-filearchive' => 'Неможливо відновити файл з архівним ідентифікатором $1, так як він відсутній у базі даних. Можливо, файл уже був відновлений.',
'undelete-error-short'         => 'Помилка відновлення файлу: $1',
'undelete-error-long'          => 'Під час відновлення файлу виникли помилки:

$1',

# Namespace form on various pages
'namespace'      => 'Простір назв:',
'invert'         => 'Крім вибраного',
'blanknamespace' => '(Основний)',

# Contributions
'contributions' => 'Внесок користувача',
'mycontris'     => 'Мій внесок',
'contribsub2'   => 'Внесок $1 ($2)',
'nocontribs'    => 'Редагувань, що задовольняють заданим умовам не знайдено.',
'ucnote'        => 'Нижче наведено останні <strong>$1</strong> редагувань цього користувача за останні <strong>$2</strong> дні(ів).',
'uclinks'       => 'Переглянути $1 {{plural:$1|останнє редагування|останніх редагування|останніх редагувань}}; за {{plural:$2|останній|останні|останні}} $2 {{plural:$2|день|дні|днів}}.',
'uctop'         => ' (остання)',
'month'         => 'Від місяця (і раніше):',
'year'          => 'Від року (і раніше):',

'sp-contributions-newbies'     => 'Показати лише внесок з нових облікових записів',
'sp-contributions-newbies-sub' => 'Внесок новачків',
'sp-contributions-blocklog'    => 'Протокол блокувань',
'sp-contributions-search'      => 'Пошук внеску',
'sp-contributions-username'    => "IP-адреса або ім'я користувача:",
'sp-contributions-submit'      => 'Знайти',

'sp-newimages-showfrom' => 'Показати нові зображення, починаючи з $2, $1',

# What links here
'whatlinkshere'       => 'Посилання сюди',
'whatlinkshere-title' => 'Сторінки, що посилаються на $1',
'whatlinkshere-page'  => 'Сторінка:',
'linklistsub'         => '(Список посилань)',
'linkshere'           => "На '''[[:$1]]''' посилаються такі статті:",
'nolinkshere'         => "На статтю '''[[:$1]]''' не вказує жодна стаття.",
'nolinkshere-ns'      => "У вибраному просторі назв нема сторінок, що посилаються на '''[[:$1]]'''.",
'isredirect'          => 'сторінка-перенаправлення',
'istemplate'          => 'включення',
'whatlinkshere-prev'  => '{{PLURAL:$1|попередня|попередні|попередні}} $1',
'whatlinkshere-next'  => '{{PLURAL:$1|наступна|наступні|наступні}} $1',
'whatlinkshere-links' => '← посилання',

# Block/unblock
'blockip'                     => 'Заблокувати IP-адресу',
'blockiptext'                 => 'Використовуйте форму нижче, щоби заблокувати можливість збереження зі вказаної IP-адреси. Це може бути зроблене виключно для попередження [[{{ns:project}}:Вандалізм|вандалізму]] і тільки у відповідності до [[{{ns:project}}:Правила|правил Вікіпедії]]. Нижче вкажіть конкретну причину (наприклад, процитуйте деякі статті з ознаками вандалізму).',
'ipaddress'                   => 'IP-адреса:',
'ipadressorusername'          => "IP-адреса або ім'я користувача:",
'ipbexpiry'                   => 'Термін:',
'ipbreason'                   => 'Причина',
'ipbreasonotherlist'          => 'Інша причина',
'ipbreason-dropdown'          => "* Типові причини блокування
** Вставка неправильної інформації
** Видалення змісту сторінок
** Спам, рекламні посилання
** Вставка нісенітниці/лайки в текст
** Залякуюча поведінка/переслідування
** Зловживання кількома обліковими записами
** Неприйнятне ім'я користувача",
'ipbanononly'                 => 'Блокувати тільки анонімних користувачів',
'ipbcreateaccount'            => 'Заборонити створення нових облікових записів',
'ipbemailban'                 => 'Заборонити користувачеві відправляти листи електронною поштою',
'ipbenableautoblock'          => 'Автоматично блокувати IP-адреси, які використовуються цим користувачем та будь-які наступні адреси, з яких він буде редагувати',
'ipbsubmit'                   => 'Заблокувати доступ цьому користувачу',
'ipbother'                    => 'Інший термін',
'ipboptions'                  => '15 хвилин:15 minutes,2 години:2 hours,1 день:1 day,3 дні:3 days,1 тиждень:1 week,2 тижні:2 weeks,1 місяць:1 month,3 місяці:3 months,6 місяців:6 months,1 рік:1 year,назавжди:infinite', # display1:time1,display2:time2,...
'ipbotheroption'              => 'інший термін',
'ipbotherreason'              => 'Інша/додаткова причина:',
'ipbhidename'                 => "Приховати ім'я користувача в журналі блокувань, списку заблокованих та загальному списку користувачів.",
'badipaddress'                => 'IP-адреса записана в невірному форматі, або користувача з таким іменем не існує.',
'blockipsuccesssub'           => 'Блокування проведено',
'blockipsuccesstext'          => '[[{{ns:special}}:Contributions/$1|«$1»]] заблоковано.
<br />Див. [[{{ns:special}}:Ipblocklist|список заблокованих IP-адрес]].',
'ipb-edit-dropdown'           => 'Редагувати причини блокувань',
'ipb-unblock-addr'            => 'Розблокувати $1',
'ipb-unblock'                 => 'Розблокувати користувача або IP-адресу',
'ipb-blocklist-addr'          => 'Показати діючі блокування для $1',
'ipb-blocklist'               => 'Показати діючі блокування',
'unblockip'                   => 'Розблокувати IP-адресу',
'unblockiptext'               => 'Використовуйте подану нижче форму, щоб відновити можливість збереження з раніше заблокованої IP-адреси.',
'ipusubmit'                   => 'Розблокувати цю адресу',
'unblocked'                   => '[[User:$1|$1]] розблоковано.',
'unblocked-id'                => 'Блокування $1 було зняте',
'ipblocklist'                 => 'Список заблокованих IP-адрес та користувачів',
'ipblocklist-legend'          => 'Пошук заблокованого користувача',
'ipblocklist-username'        => 'Користувач або IP-адреса:',
'ipblocklist-submit'          => 'Пошук',
'blocklistline'               => '$1, $2 заблокував $3 ($4)',
'infiniteblock'               => 'блокування на невизначений термін',
'expiringblock'               => 'блокування закінчиться $1',
'anononlyblock'               => 'тільки анонімів',
'noautoblockblock'            => 'автоблокування вимкнене',
'createaccountblock'          => 'Створення облікових записів заблоковане',
'emailblock'                  => 'листи заборонені',
'ipblocklist-empty'           => 'Список блокувань порожній.',
'ipblocklist-no-results'      => "Запитана IP-адреса або ім'я користувача не заблоковані.",
'blocklink'                   => 'заблокувати',
'unblocklink'                 => 'розблокувати',
'contribslink'                => 'внесок',
'autoblocker'                 => 'Доступ заблоковано автоматично, тому що ви використовуєте ту саму адресу, що й "$1". Причина блокування: "$2".',
'blocklogpage'                => 'Журнал блокувань',
'blocklogentry'               => 'заблокував [[$1]] на термін $2 $3',
'blocklogtext'                => ":''<span class=\"plainlinks\">[{{fullurl:Special:Ipblocklist|action=unblock}} '''Розблокувати користувача''']</span> Журнал блокування й розблокування користувачів. IP-адреси, що блокуються автоматично тут не вказуються. Див. [[{{ns:special}}:Ipblocklist|список поточних заборон і блокувань]].",
'unblocklogentry'             => '«$1» розблоковано',
'block-log-flags-anononly'    => 'тільки анонімні користувачі',
'block-log-flags-nocreate'    => 'заборонена реєстрація облікових записів',
'block-log-flags-noautoblock' => 'автоблокування вимкнене',
'block-log-flags-noemail'     => 'електронні листи заборонені',
'range_block_disabled'        => 'Адміністраторам заборонено блокувати діапазони.',
'ipb_expiry_invalid'          => 'Невірно вказано термін.',
'ipb_already_blocked'         => '«$1» уже заблоковано. Для того, щоб призначити новий термін блокування, спочатку розблокуйте його.',
'ipb_cant_unblock'            => 'Помилка: блокування з ID $1 не знайдено. Можливо користувача вже було розблоковано.',
'ipb_blocked_as_range'        => 'Помилка: IP-адреса $1 була заблокована не напряму і не може бути розблокована. Однак, вона належить до заблокованого діапазону $2, який можна розблокувати.',
'ip_range_invalid'            => 'Неприпустимий діапазон IP-адрес.\\n',
'blockme'                     => 'Заблокуй мене',
'proxyblocker'                => 'Блокування проксі',
'proxyblocker-disabled'       => 'Функція відключена.',
'proxyblockreason'            => "Вашу IP-адресу заблоковано тому, що це відкритий проксі. Будь-ласка, зв'яжіться з вашим інтернет-провайдером чи службою підтримки й повідомте їм про цю серйозну проблему безпеки.",
'proxyblocksuccess'           => 'Виконано.',
'sorbsreason'                 => 'Ваша IP-адреса числиться як відкритий проксі в DNSBL.',
'sorbs_create_account_reason' => 'Ваша IP-адреса числиться як відкритий проксі в DNSBL. Ви не можете створити обліковий запис.',

# Developer tools
'lockdb'              => 'Заблокувати базу даних (режим "тільки для читання")',
'unlockdb'            => 'Розблокувати базу даних',
'lockdbtext'          => 'Блокування бази даних унеможливить редагування статей, налаштувань, списків спостереження та виконувати інші дії, що вимагають доступу до бази даних.
Будь-ласка, підтвердіть, що це - саме те, що ви бажаєте зробити, і що ви відміните блокування коли закінчите обслуговування бази даних.',
'unlockdbtext'        => 'Розблокування бази даних надасть можливість знову
редагувати статті, конфігурації, списки спостереження та виконувати інші дії, що вимагають доступу до бази даних.
Будь-ласка, підтвердіть, що це - саме те, що ви хочете зробити.',
'lockconfirm'         => "Так, я дійсно хочу заблокувати базу даних (перейти в режим ''тільки для читання'').",
'unlockconfirm'       => 'Так, я дійсно хочу розблокувати базу даних.',
'lockbtn'             => "Заблокувати базу даних (режим ''тільки для читання'')",
'unlockbtn'           => 'Розблокувати базу даних',
'locknoconfirm'       => 'Ви не поставили галочку в поле підтвердження.',
'lockdbsuccesssub'    => 'Базу даних заблоковано',
'unlockdbsuccesssub'  => 'Базу даних розблоковано',
'lockdbsuccesstext'   => 'Базу даних проекту заблоковано.
<br />Не забудьте її [[{{ns:special}}:Unlockdb|розблокувати]] після завершення обслуговування.',
'unlockdbsuccesstext' => 'Базу даних проекту розблоковано.',
'lockfilenotwritable' => 'Немає права на запис в файл блокування бази даних. Щоб заблокувати чи розблокувати БД, веб-сервер повинен мати дозвіл на запис в цей файл.',
'databasenotlocked'   => 'База даних не заблокована.',

# Move page
'movepage'                => 'Перемістити статтю',
'movepagetext'            => "За допомогою форми, що нижче, ви можете перейменувати сторінку, одночасно перемістивши на нове місце і журнал її редагувань.
Стара назва стане перенаправленням на нову.
Посилання на стару назву не будуть змінені; обов'язково
перевірте, чи не з'явилося [[Special:DoubleRedirects|подвійних]] чи [[Special:BrokenRedirects|розірваних]] перенаправлень.
Ви відповідаєте за те, щоб переконатися, що посилання далі вказують туди,
куди припускалося.

Зверніть увагу, що сторінка '''не''' буде перейменована, якщо сторінка з новою назвою вже існує, окрім випадків, коли вона порожня або є перенаправленням, а журнал її редагувань порожній. Це означає, що ви
можете повернути сторінці стару назву, якщо ви перейменували її помилково, але ви не можете затерти існуючу сторінку.

'''ПОПЕРЕДЖЕННЯ!'''
Дана дія може стати причиною серйозних та неочікуваних змін популярних сторінок.
Будь ласка, перед продовженням переконайтесь, що ви розумієте всі можливі наслідки.",
'movepagetalktext'        => "Приєднана сторінка обговорення також буде автоматично перейменована, '''окрім наступних випадків:'''
* Непорожня сторінка обговорення з такою назвою вже існує або
* Ви не поставили галочку в полі нижче.

У цих випадках ви будете змушені перейменувати чи об'єднати сторінки вручну в разі необхідності",
'movearticle'             => 'Перейменувати сторінку',
'movenologin'             => 'Ви не ввійшли в систему',
'movenologintext'         => 'Щоб перемістити статтю, ви повинні [[{{ns:special}}:Userlogin|ввійти в систему]].',
'movenotallowed'          => 'У вас нема дозволу перейменовувати сторінки у {{GRAMMAR:genitive|{{SITENAME}}}}.',
'newtitle'                => 'Нова назва',
'move-watch'              => 'Спостерігати за цією статтею',
'movepagebtn'             => 'Перемістити статтю',
'pagemovedsub'            => 'Переміщення виконано',
'movepage-moved'          => "<big>'''Сторінка «$1» перейменована на «$2»'''</big>", # The two titles are passed in plain text as $3 and $4 to allow additional goodies in the message.
'articleexists'           => 'Сторінка з такою назвою вже існує або зазначена вами назва недопустима.
Будь ласка, оберіть іншу назву.',
'cantmove-titleprotected' => 'Неможливо перейменувати сторінку, оскільки нова назва входить до списку заборонених.',
'talkexists'              => "'''Сторінка була перейменована, але її сторінка обговорення не може бути перейменована, бо сторінка з такою назвою вже існує. Будь-ласка, об'єднайте їх вручну.'''",
'movedto'                 => 'тепер називається',
'movetalk'                => 'Перемістити також і сторінку обговорення , якщо це можливо.',
'talkpagemoved'           => 'Відповідну сторінку обговорення також переміщено.',
'talkpagenotmoved'        => 'Відповідну сторінку обговорення <strong>не</strong> переміщено.',
'1movedto2'               => '«[[$1]]» перейменовано на «[[$2]]»',
'1movedto2_redir'         => '«[[$1]]» перейменовано на «[[$2]]» (поверх перенаправлення)',
'movelogpage'             => 'Протокол перейменувань',
'movelogpagetext'         => 'Далі подано список перейменованих сторінок.',
'movereason'              => 'Причина',
'revertmove'              => 'відкинути',
'delete_and_move'         => 'Вилучити і перемістити',
'delete_and_move_text'    => '==Потрібне видалення==

Стаття з назвою "[[$1]]" вже існує. Бажаєте видалити її для звільнення шляху для переміщення?',
'delete_and_move_confirm' => 'Так, вилучити цю сторінку',
'delete_and_move_reason'  => 'Видалена для звільнення шляху для переміщення',
'selfmove'                => 'Неможливо перейменувати сторінку: поточна й нова назви сторінки співпадають.',
'immobile_namespace'      => 'Вихідний або цільовий заголовок спеціального типу; не можна переміщувати сторінки з або до цього простору імен.',

# Export
'export'            => 'Експорт статей',
'exporttext'        => 'Ви можете експортувати текст та журнал змін конкретної сторінки чи множини сторінок в XML, який пізніше можна імпортувати в іншу вікі, що використовує програмне забезпечення MediaWiki.

Щоб експортувати статті, введіть їх назви в поле редагування, одну назву на рядок, й виберіть чи бажаєте ви експортувати всю історію змін статей, чи тільки останні версії статей.

Ви також можете використовувати спеціальну адресу для експорту тільки останньої версії. Наприклад, для сторіники «{{int:mainpage}}» ця адреса така: [[{{ns:special}}:Export/{{int:mainpage}}]].',
'exportcuronly'     => 'Включати тільки поточну версію, без повної історії',
'exportnohistory'   => "----
'''Зауваження:''' експорт всієї історії змін сторінок вимкнутий через проблеми з ресурсами.",
'export-submit'     => 'Експорт',
'export-addcattext' => 'Додати сторінки з категорії:',
'export-addcat'     => 'Додати',
'export-download'   => 'Зберегти як файл',
'export-templates'  => 'Включити шаблони',

# Namespace 8 related
'allmessages'               => 'Системні повідомлення',
'allmessagesname'           => 'Назва',
'allmessagesdefault'        => 'Стандартний текст',
'allmessagescurrent'        => 'Поточний текст',
'allmessagestext'           => 'Це список усіх системних повідомлень, які доступні в просторі назв «MediaWiki». 
Будь ласка, відвідайте [http://www.mediawiki.org/wiki/Localisation MediaWiki Localisation] і [http://translatewiki.net Betawiki], якщо ви хочете зробити внесок до спільної локалізації MediaWiki.',
'allmessagesnotsupportedDB' => "Ця сторінка не може використовуватися, оскільки вимкнена опція '''\$wgUseDatabaseMessages'''.",
'allmessagesfilter'         => 'Фільтр назв повідомлень:',
'allmessagesmodified'       => 'Показати тільки змінені',

# Thumbnails
'thumbnail-more'           => 'Збільшити',
'filemissing'              => 'Файл не знайдено',
'thumbnail_error'          => 'Помилка створення мініатюри: $1',
'djvu_page_error'          => 'Номер сторінки DjVu недосяжний',
'djvu_no_xml'              => 'Неможливо отримати XML для DjVu',
'thumbnail_invalid_params' => 'Помилковий параметр мініатюри',
'thumbnail_dest_directory' => 'Неможливо створити цільову директорію',

# Special:Import
'import'                     => 'Імпорт статей',
'importinterwiki'            => 'Міжвікі імпорт',
'import-interwiki-text'      => 'Вкажіть вікі й назву імпортованої сторінки.
Дати змін й імена авторів буде збережено.
Всі операції межвікі імпорту реєструються в [[{{ns:special}}:Log/import|відповідному протоколі]].',
'import-interwiki-history'   => 'Копіювати всю історію змін цієї сторінки',
'import-interwiki-submit'    => 'Імпортувати',
'import-interwiki-namespace' => 'Розміщати сторінки в просторі імен:',
'importtext'                 => 'Будь-ласка, експортуйте сторінку з іншої вікі використовуючи інструмент Special:Export, збережіть файл, а потім завантажте його сюди.',
'importstart'                => 'Імпорт сторінок…',
'import-revision-count'      => '$1 {{PLURAL:$1|версія|версії|версій}}',
'importnopages'              => 'Сторінки для імпорту відсутні.',
'importfailed'               => 'Не вдалося імпортувати: $1',
'importunknownsource'        => 'Невідомий тип імпортованої сторінки',
'importcantopen'             => 'Неможливо відкрити файл імпорту',
'importbadinterwiki'         => 'Невірне інтервікі-посилання',
'importnotext'               => 'Текст відсутній',
'importsuccess'              => 'Імпорт виконано!',
'importhistoryconflict'      => 'Конфлікт існуючих версій (можливо, цю сторінку вже імпортували)',
'importnosources'            => 'Не було вибране джерело міжвікі-імпорту, пряме завантаження історії змін вимкнуте.',
'importnofile'               => 'Файл імпорту не було завантажено.',
'importuploaderrorsize'      => 'Не вдалося завантажити або імпортувати файл. Розмір файлу перевищує встановлену межу.',
'importuploaderrorpartial'   => 'Не вдалося завантажити або імпортувати файл. Він був завантажений лише частково.',
'importuploaderrortemp'      => 'Не вдалося завантажити або імпортувати файл. Тимчасова папка відсутня.',
'import-parse-failure'       => 'Помилка розбору XML під час імпорту',
'import-noarticle'           => 'Нема сторінки для імпорту!',
'import-nonewrevisions'      => 'Усі версії були раніше імпортовані.',
'xml-error-string'           => '$1 в рядку $2, позиції $3 (байт $4): $5',

# Import log
'importlogpage'                    => 'Журнал імпорту',
'importlogpagetext'                => 'Імпорт адміністраторами сторінок з історією редагувань з інших вікі.',
'import-logentry-upload'           => '«[[$1]]» — імпорт з файлу',
'import-logentry-upload-detail'    => '$1 {{PLURAL:$1|версія|версії|версій}}',
'import-logentry-interwiki'        => '«$1» — міжвікі імпорт',
'import-logentry-interwiki-detail' => '$1 {{PLURAL:$1|версія|версії|версій}} з $2',

# Tooltip help for the actions
'tooltip-pt-userpage'             => 'Моя сторінка користувача',
'tooltip-pt-anonuserpage'         => 'Сторінка користувача для моєї IP-адреси',
'tooltip-pt-mytalk'               => 'Моя сторінка обговорення',
'tooltip-pt-anontalk'             => 'Обговорення редагувань з цієї IP-адреси',
'tooltip-pt-preferences'          => 'Мої налаштування',
'tooltip-pt-watchlist'            => 'Список сторінок, за якими я спостерігаю',
'tooltip-pt-mycontris'            => 'Мій внесок',
'tooltip-pt-login'                => "Тут можна зареєструватися в системі, але це не обов'язково.",
'tooltip-pt-anonlogin'            => "Тут можна зареєструватися в системі, але це не обов'язково.",
'tooltip-pt-logout'               => 'Вихід із системи',
'tooltip-ca-talk'                 => 'Обговорення змісту сторінки',
'tooltip-ca-edit'                 => 'Цю сторінку можна редагувати. Використовуйте, будь ласка, попередній перегляд перед збереженням.',
'tooltip-ca-addsection'           => 'Додати коментар до обговорення.',
'tooltip-ca-viewsource'           => 'Ця сторінка захищена від змін. Ви можете переглянути і скопіювати її вихідний текст.',
'tooltip-ca-history'              => 'Журнал змін сторінки.',
'tooltip-ca-protect'              => 'Захистити сторінку від змін',
'tooltip-ca-delete'               => 'Вилучити цю сторінку',
'tooltip-ca-undelete'             => 'Відновити зміни сторінки, зроблені до її вилучення',
'tooltip-ca-move'                 => 'Перейменувати цю сторінку',
'tooltip-ca-watch'                => 'Додати цю сторінку до вашого списку спостереження',
'tooltip-ca-unwatch'              => 'Вилучити цю сторінку з вашого списку спостереження',
'tooltip-search'                  => 'Шукати',
'tooltip-search-go'               => 'Перейти до сторінки, що має точно таку назву (якщо вона існує)',
'tooltip-search-fulltext'         => 'Знайти сторінки, що містять зазначений текст',
'tooltip-p-logo'                  => 'Головна сторінка',
'tooltip-n-mainpage'              => 'перейти на Головну сторінку',
'tooltip-n-portal'                => 'Про проект, про те, що ви можете зробити, де що знаходиться',
'tooltip-n-currentevents'         => 'Список поточних подій',
'tooltip-n-recentchanges'         => 'Список останніх змін.',
'tooltip-n-randompage'            => 'Переглянути випадкову сторінку',
'tooltip-n-help'                  => 'Довідка з проекту.',
'tooltip-n-sitesupport'           => 'Підтримайте проект',
'tooltip-t-whatlinkshere'         => 'Список усіх сторінок, що посилаються на цю сторінку',
'tooltip-t-recentchangeslinked'   => 'Останні зміни на сторінках, на які посилається ця сторінка',
'tooltip-feed-rss'                => 'Трансляція в RSS для цієї сторінки',
'tooltip-feed-atom'               => 'Трансляція в Atom для цієї сторінки',
'tooltip-t-contributions'         => 'Перегляд внеску цього користувача',
'tooltip-t-emailuser'             => 'Надіслати листа цьому корситувачеві',
'tooltip-t-upload'                => 'Завантажити файли',
'tooltip-t-specialpages'          => 'Список спеціальних сторінок',
'tooltip-t-print'                 => 'Версія для друку цієї сторінки',
'tooltip-t-permalink'             => 'Постійне посилання на цю версію сторінки',
'tooltip-ca-nstab-main'           => 'Вміст статті',
'tooltip-ca-nstab-user'           => 'Перегляд сторінки користувача',
'tooltip-ca-nstab-media'          => 'Медіа-файл',
'tooltip-ca-nstab-special'        => 'Це спеціальна сторінка, вона недоступна для редагування',
'tooltip-ca-nstab-project'        => 'Сторінка проекту',
'tooltip-ca-nstab-image'          => 'Сторінка зображення',
'tooltip-ca-nstab-mediawiki'      => 'Сторінка повідомлення MediaWiki',
'tooltip-ca-nstab-template'       => 'Сторінка шаблону',
'tooltip-ca-nstab-help'           => 'Сторінка довідки',
'tooltip-ca-nstab-category'       => 'Сторінка категорії',
'tooltip-minoredit'               => 'Відмінити це редагування як незначне',
'tooltip-save'                    => 'Зберегти ваші зміни',
'tooltip-preview'                 => 'Попередній перегляд сторінок, будь-ласка, використовуйте перед збереженням!',
'tooltip-diff'                    => 'Показати зміни, що зроблені відносно початкового тексту.',
'tooltip-compareselectedversions' => 'Переглянути різницю між двома вказаними версіями цієї сторінки.',
'tooltip-watch'                   => 'Додати поточну сторінку до списку спостереження',
'tooltip-recreate'                => 'Відновити сторінку недивлячись на те, що її вилучено',
'tooltip-upload'                  => 'Почати завантаження',

# Stylesheets
'common.css'   => '/** Розміщений тут CSS буде застосовуватися до всіх тем оформлення */',
'monobook.css' => '/* Розміщений тут CSS буде застосовуватися до всіх тем оформлення Monobook */

/*
Це необхідно щоб в вікні пошуку кнопки не розбивались на два рядки
нажаль в main.css для кнопки Go прописані паддінги .5em.
Але український текст довший ("Перейти") --st0rm
*/

#searchGoButton {
    padding-left: 0em;
    padding-right: 0em;
    font-weight: bold;
}',

# Scripts
'common.js' => '/* Розміщений тут код JavaScript буде завантажений всім користувачам при зверненні до будь-якої сторінки */',

# Metadata
'nodublincore'      => 'Метадані Dublin Core RDF заборонені для цього сервера.',
'nocreativecommons' => 'Метадані Creative Commons RDF заборонені для цього сервера.',
'notacceptable'     => "Вікі-сервер не може подати дані в форматі, який міг би прочитати ваш браузер.<br />
The wiki server can't provide data in a format your client can read.",

# Attribution
'anonymous'        => 'Анонімні користувачі {{grammar:genitive|{{SITENAME}}}}',
'siteuser'         => 'Користувач {{grammar:genitive|{{SITENAME}}}} $1',
'lastmodifiedatby' => 'Остання зміна $2, $1 користувачем $3.', # $1 date, $2 time, $3 user
'othercontribs'    => 'Базується на праці $1.',
'others'           => 'інші',
'siteusers'        => 'Користувач(і) {{grammar:genitive|{{SITENAME}}}} $1',
'creditspage'      => 'Подяки',
'nocredits'        => 'Відсутній список користувачів для цієї статті',

# Spam protection
'spamprotectiontitle'    => 'Спам-фільтр',
'spamprotectiontext'     => 'Сторінка, яку ви намагаєтесь зберегти, заблокована спам-фільтром. Ймовірно вона містить посилання на зовнішній сайт.',
'spamprotectionmatch'    => 'Наступне повідомлення отримане від спам-фільтра: $1.',
'subcategorycount'       => 'Ця категорія містить $1 {{PLURAL:$1|підкатегорію|підкатегорії|підкатегорій}}.',
'categoryarticlecount'   => 'Категорія містить $1 {{PLURAL:$1|статтю|статті|статей}}.',
'category-media-count'   => 'У цій категорії $1 {{PLURAL:$1|файл|файли|файлів}}.',
'listingcontinuesabbrev' => '(продовження)',
'spambot_username'       => 'Очистка спаму',
'spam_reverting'         => 'Відкинути до останньої версії, що не містить посилання на $1',
'spam_blanking'          => 'Всі версії містять посилання на $1, очистка',

# Info page
'infosubtitle'   => 'Інформація про сторінку',
'numedits'       => 'Кількість редагувань (сторінка): $1',
'numtalkedits'   => 'Кількість редагувань (сторінка обговорення): $1',
'numwatchers'    => 'Кількість спостерігачів: $1',
'numauthors'     => 'Кількість різних авторів (сторінка): $1',
'numtalkauthors' => 'Кількість авторів (сторінка обговорення): $1',

# Math options
'mw_math_png'    => 'Завжди генерувати PNG',
'mw_math_simple' => 'HTML в простих випадках, інакше - PNG',
'mw_math_html'   => 'Якщо можливо - HTML, інакше PNG',
'mw_math_source' => 'Залишити в вигляді ТеХ (для текстових браузерів)',
'mw_math_modern' => 'Рекомендовано для сучасних браузерів',
'mw_math_mathml' => 'Якщо можливо - MathML (експериментальна опція)',

# Patrolling
'markaspatrolleddiff'                 => 'Позначити як перевірену',
'markaspatrolledtext'                 => 'Позначити цю статтю як перевірену',
'markedaspatrolled'                   => 'Позначити як перевірена',
'markedaspatrolledtext'               => 'Вибрана версія позначена як перевірена.',
'rcpatroldisabled'                    => 'Патрулювання останніх змін заборонене',
'rcpatroldisabledtext'                => 'Можливість патрулювання останніх змін зараз вимкнена.',
'markedaspatrollederror'              => 'Неможливо позначити як перевірену',
'markedaspatrollederrortext'          => 'Ви повинні вказати редакцію, яку буде позначено як перевірену.',
'markedaspatrollederror-noautopatrol' => 'Вам не дозволено відмічати власні редагування як перевірені.',

# Patrol log
'patrol-log-page' => 'Журнал патрулювання',
'patrol-log-line' => 'перевірена $1 з $2 $3',
'patrol-log-auto' => '(автоматично)',

# Image deletion
'deletedrevision'                 => 'Видалена стара версія $1',
'filedeleteerror-short'           => 'Помилка вилучення файлу: $1',
'filedeleteerror-long'            => 'Під час вилучення файлу виникли помилки:

$1',
'filedelete-missing'              => 'Файл «$1» не може бути вилучений, бо він не існує.',
'filedelete-old-unregistered'     => 'Зазначена версія файлу «$1» не існує у базі даних.',
'filedelete-current-unregistered' => 'Зазначений файл «$1» не існує в базі даних.',
'filedelete-archive-read-only'    => 'Архівна директорія «$1» не доступна веб-серверу для запису.',

# Browsing diffs
'previousdiff' => '← Попередня різниця',
'nextdiff'     => 'Наступна різниця →',

# Media information
'mediawarning'         => "'''Увага''': цей файл може містити шкідливий програмний код, виконання якого може бути небезпечним для вашої системи. <hr />",
'imagemaxsize'         => 'Обмежити розмір зображень на сторінках опису зображень до:',
'thumbsize'            => 'Розмір зменшеної версії зображення:',
'widthheight'          => '$1 × $2',
'widthheightpage'      => '$1 × $2, $3 сторінки',
'file-info'            => '(розмір файлу: $1, MIME-тип: $2)',
'file-info-size'       => '($1 × $2 пікселів, розмір файлу: $3, MIME-тип: $4)',
'file-nohires'         => '<small>Нема версії з більшою роздільністю.</small>',
'svg-long-desc'        => '(SVG-файл, номінально $1 × $2 пікселів, розмір файлу: $3)',
'show-big-image'       => 'Повна роздільність',
'show-big-image-thumb' => '<small>Розмір при попередньому перегляді: $1 × $2 пікселів</small>',

# Special:Newimages
'newimages'    => 'Галерея нових файлів',
'showhidebots' => '($1 ботів)',
'noimages'     => 'Файли відсутні.',

# Bad image list
'bad_image_list' => 'Формат має бути наступним:

Будуть враховуватися лише елементи списку (рядки, що починаються з *). Перше посилання рядка має бути посиланням на заборонена для вставки зображення.
Наступні посилання у тому самому рядку будуть розглядатися як винятки, тобто статті, куди зображення може бути включене.',

# Metadata
'metadata'          => 'Метадані',
'metadata-help'     => 'Файл містить додаткові дані, які зазвичай додаються цифровими камерами чи сканерами. Якщо файл редагувався після створення, то деякі параметри можуть не відповідати цьому зображенню.',
'metadata-expand'   => 'Показати додаткові дані',
'metadata-collapse' => 'Приховати додаткові дані',
'metadata-fields'   => 'Поля метаданих, перераховані в цьому списку, будуть автоматично відображені на сторінці зображення, всі інші будуть приховані.
* make
* model
* datetimeoriginal
* exposuretime
* fnumber
* focallength', # Do not translate list items

# EXIF tags
'exif-imagewidth'                  => 'Ширина',
'exif-imagelength'                 => 'Висота',
'exif-bitspersample'               => 'Глибина кольору',
'exif-compression'                 => 'Метод стиснення',
'exif-photometricinterpretation'   => 'Колірна модель',
'exif-orientation'                 => 'Орієнтація кадру',
'exif-samplesperpixel'             => 'Кількість кольорових компонентів',
'exif-planarconfiguration'         => 'Принцип організації даних',
'exif-ycbcrsubsampling'            => 'Відношення розмірів компонентів Y та C',
'exif-ycbcrpositioning'            => 'Порядок розміщення компонентів Y та C',
'exif-xresolution'                 => 'Горизонтальна роздільна здатність',
'exif-yresolution'                 => 'Вертикальна роздільна здатність',
'exif-resolutionunit'              => 'Одиниця вимірювання роздільної здатності',
'exif-stripoffsets'                => 'Положення блоку даних',
'exif-rowsperstrip'                => 'Кількість рядків в 1 блоці',
'exif-stripbytecounts'             => 'Розмір стиснутого блоку',
'exif-jpeginterchangeformat'       => 'Положення початку блоку preview',
'exif-jpeginterchangeformatlength' => 'Розмір даних блоку preview',
'exif-transferfunction'            => 'Функція перетворення колірного простору',
'exif-whitepoint'                  => 'Колірність білої точки',
'exif-primarychromaticities'       => 'Колірність основних кольорів',
'exif-ycbcrcoefficients'           => 'Коефіцієнти перетворення колірної моделі',
'exif-referenceblackwhite'         => 'Положенння білої й чорної точок',
'exif-datetime'                    => 'Дата й час редагування файлу',
'exif-imagedescription'            => 'Назва зображення',
'exif-make'                        => 'Виробник камери',
'exif-model'                       => 'Модель камери',
'exif-software'                    => 'Програмне забезпечення',
'exif-artist'                      => 'Автор',
'exif-copyright'                   => 'Власник авторського права',
'exif-exifversion'                 => 'Версія Exif',
'exif-flashpixversion'             => 'Версія FlashPix, що підтримується',
'exif-colorspace'                  => 'Колірний простір',
'exif-componentsconfiguration'     => 'Конфігурація кольорових компонентів',
'exif-compressedbitsperpixel'      => 'Глибина кольору після стиснення',
'exif-pixelydimension'             => 'Повна висота зображення',
'exif-pixelxdimension'             => 'Повна ширина зображення',
'exif-makernote'                   => 'Додаткові дані виробника',
'exif-usercomment'                 => 'Додатковий коментар',
'exif-relatedsoundfile'            => 'Файл звукового коментаря',
'exif-datetimeoriginal'            => 'Оригинальні дата й час',
'exif-datetimedigitized'           => 'Дата й час оцифровки',
'exif-subsectime'                  => 'Долі секунд часу редагування файлу',
'exif-subsectimeoriginal'          => 'Долі секунд оригінального часу',
'exif-subsectimedigitized'         => 'Долі секунд часу оцифровки',
'exif-exposuretime'                => 'Час експозиції',
'exif-exposuretime-format'         => '$1 з ($2)',
'exif-fnumber'                     => 'Число діафрагми',
'exif-exposureprogram'             => 'Програма експозиції',
'exif-spectralsensitivity'         => 'Спектральна чутливість',
'exif-isospeedratings'             => 'Світлочутливість ISO',
'exif-oecf'                        => 'OECF (коефіцієнт оптикоелектричного перетворення)',
'exif-shutterspeedvalue'           => 'Витримка',
'exif-aperturevalue'               => 'Діафрагма',
'exif-brightnessvalue'             => 'Яскравість',
'exif-exposurebiasvalue'           => 'Компенсація експозиції',
'exif-maxaperturevalue'            => 'Мінімальне число діафрагми',
'exif-subjectdistance'             => "Відстань до об'єкту",
'exif-meteringmode'                => 'Режим вимірювання експозиції',
'exif-lightsource'                 => 'Джерело світла',
'exif-flash'                       => 'Статус спалаху',
'exif-focallength'                 => 'Фокусна відстань',
'exif-focallength-format'          => '$1 мм',
'exif-subjectarea'                 => "Положення й площа об'єкту зйомки",
'exif-flashenergy'                 => 'Енергія спалаху',
'exif-spatialfrequencyresponse'    => 'Просторова частотна характеристика',
'exif-focalplanexresolution'       => 'Роздільна здатність по X в фокальній площині',
'exif-focalplaneyresolution'       => 'Роздільна здатність по Y в фокальній площині',
'exif-focalplaneresolutionunit'    => 'Одиниця вимірювання роздільної здатності в фокальній площині',
'exif-subjectlocation'             => "Положення об'єкту відносно лівого верхнього кута",
'exif-exposureindex'               => 'Індекс експозиції',
'exif-sensingmethod'               => 'Тип сенсора',
'exif-filesource'                  => 'Джерело файла',
'exif-scenetype'                   => 'Тип сцени',
'exif-cfapattern'                  => 'Тип кольорового фільтра',
'exif-customrendered'              => 'Додаткова обробка',
'exif-exposuremode'                => 'Режим обрання експозиції',
'exif-whitebalance'                => 'Баланс білого',
'exif-digitalzoomratio'            => 'Коефіцієнт цифрового збільшення (цифровий зум)',
'exif-focallengthin35mmfilm'       => 'Еквівалентна фокусна відстань (для 35 мм плівки)',
'exif-scenecapturetype'            => 'Тип сцени при зйомці',
'exif-gaincontrol'                 => 'Підвищення яскравості',
'exif-contrast'                    => 'Контрастність',
'exif-saturation'                  => 'Насиченість',
'exif-sharpness'                   => 'Різкість',
'exif-devicesettingdescription'    => 'Опис налаштування камери',
'exif-subjectdistancerange'        => "Відстань до об'єкту зйомки",
'exif-imageuniqueid'               => 'Номер зображення (ID)',
'exif-gpsversionid'                => 'Версія блоку GPS-інформації',
'exif-gpslatituderef'              => 'Індекс широти',
'exif-gpslatitude'                 => 'Широта',
'exif-gpslongituderef'             => 'Індекс довготи',
'exif-gpslongitude'                => 'Довгота',
'exif-gpsaltituderef'              => 'Індекс висоти',
'exif-gpsaltitude'                 => 'Висота',
'exif-gpstimestamp'                => 'Точний час по UTC',
'exif-gpssatellites'               => 'Опис використаних супутників',
'exif-gpsstatus'                   => 'Статус приймача в момент зйомки',
'exif-gpsmeasuremode'              => 'Метод вимірювання положення',
'exif-gpsdop'                      => 'Точність вимірювання',
'exif-gpsspeedref'                 => 'Одиниці вимірювання швидкості',
'exif-gpsspeed'                    => 'Швидкість руху',
'exif-gpstrackref'                 => 'Тип азимута приймача GPS (справжній, магнітний)',
'exif-gpstrack'                    => 'Азимут приймача GPS',
'exif-gpsimgdirectionref'          => 'Тип азимута зображення (справжній, магнітний)',
'exif-gpsimgdirection'             => 'Азимут зображення',
'exif-gpsmapdatum'                 => 'Використана геодезична система координат',
'exif-gpsdestlatituderef'          => "Індекс довготи о'єктУа",
'exif-gpsdestlatitude'             => "Довгота об'єкту",
'exif-gpsdestlongituderef'         => "Індекс широти об'єкту",
'exif-gpsdestlongitude'            => "Широта об'єкту",
'exif-gpsdestbearingref'           => "Тип пеленга об'єкту (справжній, магнітний)",
'exif-gpsdestbearing'              => "Пеленг об'єкту",
'exif-gpsdestdistanceref'          => 'Одиниці вимірювання відстані',
'exif-gpsdestdistance'             => 'Відстань',
'exif-gpsprocessingmethod'         => 'Метод обчислення положення',
'exif-gpsareainformation'          => 'Назва області GPS',
'exif-gpsdatestamp'                => 'Дата',
'exif-gpsdifferential'             => 'Диференційна поправка',

# EXIF attributes
'exif-compression-1' => 'Нестиснутий',

'exif-unknowndate' => 'Невідома дата',

'exif-orientation-1' => 'Нормальна', # 0th row: top; 0th column: left
'exif-orientation-2' => 'Відображено по горизонталі', # 0th row: top; 0th column: right
'exif-orientation-3' => 'Повернуто на 180°', # 0th row: bottom; 0th column: right
'exif-orientation-4' => 'Відображено по вертикалі', # 0th row: bottom; 0th column: left
'exif-orientation-5' => 'Повернуто на 90° проти годинникової стрілки й відображено по вертикалі', # 0th row: left; 0th column: top
'exif-orientation-6' => 'Повернуто на 90° за годинниковою стрілкою', # 0th row: right; 0th column: top
'exif-orientation-7' => 'Повернуто на 90° за годинниковою стрілкою й відображено по вертикалі', # 0th row: right; 0th column: bottom
'exif-orientation-8' => 'Повернуто на 90° проти годинникової стрілки', # 0th row: left; 0th column: bottom

'exif-planarconfiguration-1' => 'формат «chunky»',
'exif-planarconfiguration-2' => 'формат «planar»',

'exif-xyresolution-i' => '$1 точок на дюйм',
'exif-xyresolution-c' => '$1 точок на сантиметр',

'exif-componentsconfiguration-0' => 'не існує',

'exif-exposureprogram-0' => 'Невідомо',
'exif-exposureprogram-1' => 'Ручний режим',
'exif-exposureprogram-2' => 'Програмний режим (нормальний)',
'exif-exposureprogram-3' => 'Пріоритет діафрагми',
'exif-exposureprogram-4' => 'Пріоритет витримки',
'exif-exposureprogram-5' => 'Художня програма (на основі необхідної глибини різкості)',
'exif-exposureprogram-6' => 'Спортивний режим (з мінімальною витримкою)',
'exif-exposureprogram-7' => 'Портретний режим (для знімків на близькій відстані, з фоном не в фокусі)',
'exif-exposureprogram-8' => 'Пейзажний режим (для пейзажних знімків, з фоном в фокусі)',

'exif-subjectdistance-value' => '$1 метрів',

'exif-meteringmode-0'   => 'Невідомо',
'exif-meteringmode-1'   => 'Середній',
'exif-meteringmode-2'   => 'Центрозважений',
'exif-meteringmode-3'   => 'Точковий',
'exif-meteringmode-4'   => 'Багатоточковий',
'exif-meteringmode-5'   => 'Матричний',
'exif-meteringmode-6'   => 'Частковий',
'exif-meteringmode-255' => 'Інший',

'exif-lightsource-0'   => 'Невідомо',
'exif-lightsource-1'   => 'Денне світло',
'exif-lightsource-2'   => 'Лампа денного світла',
'exif-lightsource-3'   => 'Лампа розжарювання',
'exif-lightsource-4'   => 'Спалах',
'exif-lightsource-9'   => 'Хороша погода',
'exif-lightsource-10'  => 'Хмарно',
'exif-lightsource-11'  => 'Тінь',
'exif-lightsource-12'  => 'Лампа денного світла тип D (5700 − 7100K)',
'exif-lightsource-13'  => 'Лампа денного світла тип N (4600 − 5400K)',
'exif-lightsource-14'  => 'Лампа денного світла тип W (3900 − 4500K)',
'exif-lightsource-15'  => 'Лампа денного світла тип WW (3200 − 3700K)',
'exif-lightsource-17'  => 'Стандартне джерело світла типу A',
'exif-lightsource-18'  => 'Стандартне джерело світла типу B',
'exif-lightsource-19'  => 'Стандартне джерело світла типу C',
'exif-lightsource-24'  => 'Студійна лампа стандарту ISO',
'exif-lightsource-255' => 'Інше джерело світла',

'exif-focalplaneresolutionunit-2' => 'дюймів',

'exif-sensingmethod-1' => 'Невизначений',
'exif-sensingmethod-2' => 'Однокристальний матричний сенсор кольорів',
'exif-sensingmethod-3' => 'Сенсор кольорів з двома матрицями',
'exif-sensingmethod-4' => 'Сенсор кольорів с трьома матрицями',
'exif-sensingmethod-5' => 'Матричний сенсор з послідовною зміною кольору',
'exif-sensingmethod-7' => 'Трьохколірний лінійний сенсор',
'exif-sensingmethod-8' => 'Лінійний сенсор з послідовною зміною кольору',

'exif-filesource-3' => 'Цифровий фотоапарат',

'exif-scenetype-1' => 'Зображення сфотографовано напряму',

'exif-customrendered-0' => 'Не виконувалась',
'exif-customrendered-1' => 'Нестандартна обробка',

'exif-exposuremode-0' => 'Автоматична експозиція',
'exif-exposuremode-1' => 'Ручне налаштування експозиції',
'exif-exposuremode-2' => 'Брекетінґ',

'exif-whitebalance-0' => 'Автоматичний баланс білого',
'exif-whitebalance-1' => 'Ручне налаштування балансу білого',

'exif-scenecapturetype-0' => 'Стандартний',
'exif-scenecapturetype-1' => 'Ландшафт',
'exif-scenecapturetype-2' => 'Портрет',
'exif-scenecapturetype-3' => 'Нічна зйомка',

'exif-gaincontrol-0' => 'Немає',
'exif-gaincontrol-1' => 'Невелике збільшення',
'exif-gaincontrol-2' => 'Велике збільшення',
'exif-gaincontrol-3' => 'Невелике зменшення',
'exif-gaincontrol-4' => 'Сильне зменшення',

'exif-contrast-0' => 'Нормальна',
'exif-contrast-1' => "М'яке підвищення",
'exif-contrast-2' => 'Сильне підвищення',

'exif-saturation-0' => 'Нормальна',
'exif-saturation-1' => 'Невелика насиченість',
'exif-saturation-2' => 'Велика насиченість',

'exif-sharpness-0' => 'Нормальна',
'exif-sharpness-1' => "М'яке підвищення",
'exif-sharpness-2' => 'Сильне підвищення',

'exif-subjectdistancerange-0' => 'Невідомо',
'exif-subjectdistancerange-1' => 'Макрозйомка',
'exif-subjectdistancerange-2' => 'Зйомка з близької відстані',
'exif-subjectdistancerange-3' => 'Зйомка здалеку',

# Pseudotags used for GPSLatitudeRef and GPSDestLatitudeRef
'exif-gpslatitude-n' => 'північної широти',
'exif-gpslatitude-s' => 'південної широти',

# Pseudotags used for GPSLongitudeRef and GPSDestLongitudeRef
'exif-gpslongitude-e' => 'східної довготи',
'exif-gpslongitude-w' => 'західної довготи',

'exif-gpsstatus-a' => 'Вимірювання не завершено',
'exif-gpsstatus-v' => 'Готовий до передачі даних',

'exif-gpsmeasuremode-2' => 'Вимірювання 2-х координат',
'exif-gpsmeasuremode-3' => 'Вимірювання 3-х координат',

# Pseudotags used for GPSSpeedRef and GPSDestDistanceRef
'exif-gpsspeed-k' => 'км/год',
'exif-gpsspeed-m' => 'миль/год',
'exif-gpsspeed-n' => 'вузлів',

# Pseudotags used for GPSTrackRef, GPSImgDirectionRef and GPSDestBearingRef
'exif-gpsdirection-t' => 'справжній',
'exif-gpsdirection-m' => 'магнітний',

# External editor support
'edit-externally'      => 'Редагувати цей файл використовуючи зовнішню програму',
'edit-externally-help' => 'Подробиці див. на сторінці [http://meta.wikimedia.org/wiki/Help:External_editors Meta:Help:External_editors].',

# 'all' in various places, this might be different for inflected languages
'recentchangesall' => 'всі',
'imagelistall'     => 'всі',
'watchlistall2'    => 'всі',
'namespacesall'    => 'всі',
'monthsall'        => 'всі',

# E-mail address confirmation
'confirmemail'            => 'Підтвердження адреси ел. пошти',
'confirmemail_noemail'    => 'В вашій [[{{ns:special}}:Preferences|конфігурації користувача]] відсутня коректна адреса електронної пошти.',
'confirmemail_text'       => 'Вікі-двигун потребує підтвердження адреси електронної пошти перед початком роботи. Натисніть на кнопку, щоб за вказаною адресою одержати листа, який міститиме посилання на спеціальну сторінку, після відкриття якої у браузері адреса електронної пошти буде вважатися підтвердженою.',
'confirmemail_pending'    => '<div class="error">
Код підтвердження вже відправлено на адресу вашої електронної пошти.
Якщо ви щойно створили обліковий запис, будь-ласка, перш ніж робити запит нового коду, почекайте декілька хвилин до отримання вже відісланого.
</div>',
'confirmemail_send'       => 'Надіслати лист із запитом на підтвердження',
'confirmemail_sent'       => 'Лист із запитом на підтвердження відправлений.',
'confirmemail_oncreate'   => "Код підтвердження відправлено на вашу електронну адресу. Цей код не вимагається для входу в систему, але він вам знадобиться для активації будь-яких можливостей вікі, що пов'язані з використанням електронної пошти.",
'confirmemail_sendfailed' => 'Неможливо відправити лист із запитом на підтвердження. Перевірте правильність адреси електронної пошти.

Відповідь сервера: $1',
'confirmemail_invalid'    => 'Невірний код підтвердження, або термін дії коду вичерпався.',
'confirmemail_needlogin'  => 'Для підтвердження вашої адреси електронної пошти вам необхідно $1.',
'confirmemail_success'    => 'Вашу адресу електронної пошти підтверджено.',
'confirmemail_loggedin'   => 'Вашу адресу електронної пошти підтверджено.',
'confirmemail_error'      => 'Під час процедури підтвердження адреси електронної пошти сталася помилка.',
'confirmemail_subject'    => '{{SITENAME}}:Запит на підтвердження адреси ел. пошти',
'confirmemail_body'       => 'Хтось (можливо Ви) із IP-адресою $1 , зареєстрував на сервері проекту {{SITENAME}} обліковий запис
«$2», вказавши вашу адресу електронної пошти.

Щоб підтвердити, що ви дозволяєте використовувати вашу адресу електронної пошти в цьому проекті, відкрийте у веб-оглядачі наведене далі посилання (це слід зробити до $4):

$3

Якщо ви не відправляли подібного запиту — просто ігноруйте цей лист.',

# Scary transclusion
'scarytranscludedisabled' => '[«Interwiki transcluding» вимкнено]',
'scarytranscludefailed'   => '[Нажаль, невдалося звернення до шаблону $1]',
'scarytranscludetoolong'  => '[Нажаль, URL надто довгий]',

# Trackbacks
'trackbackbox'      => '<div id="mw_trackbacks">
Trackback для цієї статті:<br />
$1
</div>',
'trackbackremove'   => ' ([$1 вилучити])',
'trackbacklink'     => 'Trackback',
'trackbackdeleteok' => 'Trackback вилучено.',

# Delete conflict
'deletedwhileediting' => 'Попередження: ця сторінка була вилучена після того, як ви розпочали редагування!',
'confirmrecreate'     => "Користувач [[User:$1|$1]] ([[User talk:$1|обговорення]]) видалив цю сторінку після того, як ви почали редагування і вказав причиною:
: ''$2''
Будь ласка підтвердіть, що ви дійсно бажаєте створити цю сторінку заново.",
'recreate'            => 'Повторно створити',

'unit-pixel' => ' пікс.',

# HTML dump
'redirectingto' => 'Перенаправлення на сторінку [[$1]]…',

# action=purge
'confirm_purge'        => 'Очистити кеш цієї сторінки?

$1',
'confirm_purge_button' => 'OK',

# AJAX search
'searchcontaining' => 'Шукати статті, які містять «$1».',
'searchnamed'      => 'Шукати статті з назвою «$1».',
'articletitles'    => 'Статті, що починаються з «$1»',
'hideresults'      => 'Сховати результати',
'useajaxsearch'    => 'Використовувати AJAX-пошук',

# Multipage image navigation
'imgmultipageprev' => '← попередня сторінка',
'imgmultipagenext' => 'наступна сторінка →',
'imgmultigo'       => 'Перейти!',
'imgmultigotopre'  => 'Перейти на сторінку',

# Table pager
'ascending_abbrev'         => 'зрост',
'descending_abbrev'        => 'спад',
'table_pager_next'         => 'Наступна сторінка',
'table_pager_prev'         => 'Попередня сторінка',
'table_pager_first'        => 'Перша сторінка',
'table_pager_last'         => 'Остання сторінка',
'table_pager_limit'        => 'Показувати $1 елементів на сторінці',
'table_pager_limit_submit' => 'Виконати',
'table_pager_empty'        => 'Не знайдено',

# Auto-summaries
'autosumm-blank'   => 'Видалений весь вміст сторінки',
'autosumm-replace' => 'Замінено сторінку на «$1»',
'autoredircomment' => 'Перенаправлено на [[$1]]',
'autosumm-new'     => 'Нова сторінка: $1',

# Size units
'size-bytes'     => '$1 байтів',
'size-kilobytes' => '$1 КБ',
'size-megabytes' => '$1 МБ',
'size-gigabytes' => '$1 ГБ',

# Live preview
'livepreview-loading' => 'Завантаження…',
'livepreview-ready'   => 'Завантаження… Готово!',
'livepreview-failed'  => 'Не вдалося використати швидкий попередній перегляд. Спробуйте скористатися звичайним попереднім переглядом.',
'livepreview-error'   => "Не вдалося встановити з'єднання: $1 «$2». Спробуйте скористатися звичайним попереднім переглядом.",

# Friendlier slave lag warnings
'lag-warn-normal' => 'Зміни, зроблені $1 {{plural:$1|секунду|секунди|секунд}} тому, можуть бути не показані в цьому списку.',
'lag-warn-high'   => 'Через велике відставання у синхронізації серверів баз даних зміни, зроблені менш ніж $1 {{plural:$1|секунду|секунди|секунд}} тому, можуть бути не показані в цьому списку.',

# Watchlist editor
'watchlistedit-numitems'       => 'Ваш список спостереження містить {{PLURAL:$1|$1 запис|$1 записи|$1 записів}}, не включаючи сторінок обговорення.',
'watchlistedit-noitems'        => 'Ваш список спостереження порожній.',
'watchlistedit-normal-title'   => 'Редагування списку спостереження',
'watchlistedit-normal-legend'  => 'Вилучення заголовків зі списку спостереження',
'watchlistedit-normal-explain' => 'Нижче відображено заголовки з вашого списку спостереження.
Для вилучення заголовка зі списку необхідно поставити галочку в квадратику біля нього і натиснути кнопку «Вилучити заголовки».
Ви можете також [[Special:Watchlist/raw|редагувати список як текст]] або [[Special:Watchlist/clear|вилучити всі заголовки]].',
'watchlistedit-normal-submit'  => 'Вилучити заголовки',
'watchlistedit-normal-done'    => '{{PLURAL:$1|$1 заголовок був вилучений|$1 заголовки були вилучені|$1 заголовків були вилучені}} з вашого списку спостереження:',
'watchlistedit-raw-title'      => 'Редагування рядків списку спостереження',
'watchlistedit-raw-legend'     => 'Редагування рядків списку спостереження',
'watchlistedit-raw-explain'    => 'Нижче наведені сторінки з вашого списку спостереження. Ви можете редагувати список, додаючи і вилучаючи з нього рядки з назвами. Після закінчення редагувань натисніть кнопку «Зберегти зміни».
Ви також можете використовувати [[Special:Watchlist/edit|звичайний спосіб зміни списку]].',
'watchlistedit-raw-titles'     => 'Заголовки:',
'watchlistedit-raw-submit'     => 'Зберегти список',
'watchlistedit-raw-done'       => 'Ваш список спостереження збережений.',
'watchlistedit-raw-added'      => '{{PLURAL:$1|$1 заголовок був доданий|$1 заголовки були додані|$1 заголовків були додані}}:',
'watchlistedit-raw-removed'    => '{{PLURAL:$1|$1 заголовок був вилучений|$1 заголовки були вилучені|$1 заголовків були вилучені}}:',

# Watchlist editing tools
'watchlisttools-view' => 'Зміни на сторінках зі списку',
'watchlisttools-edit' => 'Переглянути/редагувати список',
'watchlisttools-raw'  => 'Редагувати як текст',

# Core parser functions
'unknown_extension_tag' => 'Невідомий тег доповнення «$1»',

# Special:Version
'version-extensions'               => 'Установлені розширення',
'version-specialpages'             => 'Спеціальні сторінки',
'version-parserhooks'              => 'Перехоплювачі синтаксичного аналізатора',
'version-variables'                => 'Змінні',
'version-other'                    => 'Інше',
'version-mediahandlers'            => 'Обробники медіа',
'version-hooks'                    => 'Перехоплювачі',
'version-extension-functions'      => 'Функції розширень',
'version-parser-extensiontags'     => 'Теги розширень синтаксичного аналізатора',
'version-parser-function-hooks'    => 'Перехоплювачі функцій синтаксичного аналізатора',
'version-skin-extension-functions' => 'Функції розширень тем оформлення',
'version-hook-name'                => "Ім'я перехоплювача",
'version-hook-subscribedby'        => 'Підписаний на',
'version-version'                  => 'Версія',
'version-license'                  => 'Ліцензія',
'version-software'                 => 'Установлене програмне забезпечення',
'version-software-product'         => 'Продукт',
'version-software-version'         => 'Версія',

# Special:Filepath
'filepath'         => 'Шлях до файлу',
'filepath-page'    => 'Файл:',
'filepath-submit'  => 'Шлях',
'filepath-summary' => 'Ця спеціальна сторінка повертає повний шлях до файлу в тому вигляді, в якому він зберігається на диску.

Уведіть назву файлу без префіксу <code>{{ns:image}}:</code>.',

);
