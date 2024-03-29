<?php
/** Latin (Latina)
 *
 * @ingroup Language
 * @file
 *
 * @author Esteban97
 * @author LeighvsOptimvsMaximvs
 * @author Omnipaedista
 * @author OrbiliusMagister
 * @author Rafaelgarcia
 * @author SPQRobin
 * @author UV
 * @author לערי ריינהארט
 */

$namespaceNames = array(
	NS_SPECIAL          => 'Specialis',
	NS_TALK             => 'Disputatio',
	NS_USER             => 'Usor',
	NS_USER_TALK        => 'Disputatio_Usoris',
	NS_PROJECT_TALK     => 'Disputatio_{{GRAMMAR:genitive|$1}}',
	NS_FILE             => 'Fasciculus',
	NS_FILE_TALK        => 'Disputatio_Fasciculi',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'Disputatio_MediaWiki',
	NS_TEMPLATE         => 'Formula',
	NS_TEMPLATE_TALK    => 'Disputatio_Formulae',
	NS_HELP             => 'Auxilium',
	NS_HELP_TALK        => 'Disputatio_Auxilii',
	NS_CATEGORY         => 'Categoria',
	NS_CATEGORY_TALK    => 'Disputatio_Categoriae',
);

$namespaceAliases = array(
	'Imago' => NS_FILE,
	'Disputatio_Imaginis' => NS_FILE_TALK,
);

$separatorTransformTable = array( ',' => "\xc2\xa0" );

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

$specialPageAliases = array(
	'DoubleRedirects'           => array( 'Redirectiones duplices' ),
	'BrokenRedirects'           => array( 'Redirectiones fractae' ),
	'Disambiguations'           => array( 'Paginae disambiguationis', 'Disambiguationes' ),
	'Userlogin'                 => array( 'Conventum aperire' ),
	'Userlogout'                => array( 'Conventum concludere' ),
	'CreateAccount'             => array( 'Rationem creare' ),
	'Preferences'               => array( 'Praeferentiae' ),
	'Watchlist'                 => array( 'Paginae custoditae' ),
	'Recentchanges'             => array( 'Nuper mutata', 'Mutationes recentes' ),
	'Upload'                    => array( 'Fasciculos onerare', 'Imagines onerare' ),
	'Listfiles'                 => array( 'Fasciculi', 'Imagines' ),
	'Newimages'                 => array( 'Fasciculi novi', 'Imagines novae' ),
	'Listusers'                 => array( 'Usores' ),
	'Listgrouprights'           => array( 'Gregum usorum potestates', 'Iura gregum' ),
	'Statistics'                => array( 'Census' ),
	'Randompage'                => array( 'Pagina fortuita' ),
	'Lonelypages'               => array( 'Paginae non annexae' ),
	'Uncategorizedpages'        => array( 'Paginae sine categoriis' ),
	'Uncategorizedcategories'   => array( 'Categoriae sine categoriis' ),
	'Uncategorizedimages'       => array( 'Fasciculi sine categoriis', 'Imagines sine categoriis' ),
	'Uncategorizedtemplates'    => array( 'Formulae sine categoriis' ),
	'Unusedcategories'          => array( 'Categoriae non in usu', 'Categoriae vacuae' ),
	'Unusedimages'              => array( 'Fasciculi non in usu', 'Imagines non in usu' ),
	'Wantedpages'               => array( 'Paginae desideratae', 'Nexus fracti' ),
	'Wantedcategories'          => array( 'Categoriae desideratae' ),
	'Wantedfiles'               => array( 'Fasciculi desiderati', 'Imagines desideratae' ),
	'Wantedtemplates'           => array( 'Formulae desideratae' ),
	'Mostlinked'                => array( 'Paginae maxime annexae' ),
	'Mostlinkedcategories'      => array( 'Categoriae maxime annexae' ),
	'Mostlinkedtemplates'       => array( 'Formulae maxime annexae' ),
	'Mostimages'                => array( 'Fasciculi maxime annexi', 'Imagines maxime annexae' ),
	'Mostcategories'            => array( 'Paginae plurimis categoriis' ),
	'Mostrevisions'             => array( 'Paginae plurimum mutatae' ),
	'Fewestrevisions'           => array( 'Paginae minime mutatae' ),
	'Shortpages'                => array( 'Paginae breves' ),
	'Longpages'                 => array( 'Paginae longae' ),
	'Newpages'                  => array( 'Paginae novae' ),
	'Ancientpages'              => array( 'Paginae veterrimae' ),
	'Deadendpages'              => array( 'Paginae sine nexu' ),
	'Protectedpages'            => array( 'Paginae protectae' ),
	'Protectedtitles'           => array( 'Tituli protecti' ),
	'Allpages'                  => array( 'Paginae omnes', 'Omnes paginae' ),
	'Prefixindex'               => array( 'Praefixa', 'Quaerere per praefixa' ),
	'Ipblocklist'               => array( 'Usores obstructi' ),
	'Specialpages'              => array( 'Paginae speciales' ),
	'Contributions'             => array( 'Conlationes', 'Conlationes usoris' ),
	'Emailuser'                 => array( 'Litteras electronicas usori mittere', 'Littera electronica' ),
	'Confirmemail'              => array( 'Inscriptionem electronicam confirmare' ),
	'Whatlinkshere'             => array( 'Nexus ad paginam' ),
	'Recentchangeslinked'       => array( 'Nuper mutata annexorum' ),
	'Movepage'                  => array( 'Paginam movere', 'Movere' ),
	'Blockme'                   => array( 'Usor obstructus' ),
	'Booksources'               => array( 'Librorum fontes' ),
	'Categories'                => array( 'Categoriae' ),
	'Export'                    => array( 'Exportare', 'Paginas exportare' ),
	'Version'                   => array( 'Versio' ),
	'Allmessages'               => array( 'Nuntia systematis' ),
	'Log'                       => array( 'Acta' ),
	'Blockip'                   => array( 'Usorem obstruere' ),
	'Undelete'                  => array( 'Paginam restituere' ),
	'Import'                    => array( 'Importare', 'Paginas importare' ),
	'Lockdb'                    => array( 'Basem datorum obstruere' ),
	'Unlockdb'                  => array( 'Basem datorum deobstruere' ),
	'Userrights'                => array( 'Usorum potestates', 'Iura usorum' ),
	'MIMEsearch'                => array( 'Quaerere per MIME' ),
	'FileDuplicateSearch'       => array( 'Quaerere fasciculos duplices', 'Quaerere imagines duplices' ),
	'Unwatchedpages'            => array( 'Paginae incustoditae' ),
	'Listredirects'             => array( 'Redirectiones' ),
	'Revisiondelete'            => array( 'Emendationem delere' ),
	'Unusedtemplates'           => array( 'Formulae non in usu' ),
	'Randomredirect'            => array( 'Redirectio fortuita' ),
	'Mypage'                    => array( 'Pagina mea' ),
	'Mytalk'                    => array( 'Disputatio mea' ),
	'Mycontributions'           => array( 'Conlationes meae' ),
	'Listadmins'                => array( 'Magistratus' ),
	'Listbots'                  => array( 'Automata' ),
	'Popularpages'              => array( 'Paginae saepe monstratae' ),
	'Search'                    => array( 'Quaerere' ),
	'Resetpass'                 => array( 'Tesseram novam creare' ),
	'Withoutinterwiki'          => array( 'Paginae sine nexibus ad linguas alias', 'Paginae sine nexibus intervicis' ),
	'MergeHistory'              => array( 'Historias paginarum confundere' ),
	'Invalidateemail'           => array( 'Adfimationem inscriptionis electronicae abrogare' ),
	'Blankpage'                 => array( 'Pagina vacua' ),
	'LinkSearch'                => array( 'Quaerere nexus externos' ),
	'DeletedContributions'      => array( 'Conlationes deletae', 'Conlationes usoris deletae' ),
);

$messages = array(
# User preference toggles
'tog-underline'               => 'Nexus linea subscribere:',
'tog-highlightbroken'         => 'Formare nexus fractos <a href="" class="new">sici</a> (alioqui: sic<a href="" class="internal">?</a>).',
'tog-justify'                 => 'Iustificare paragrapha',
'tog-hideminor'               => 'Celare recensiones minores in indice nuper mutatorum',
'tog-extendwatchlist'         => 'Extendere indicem paginarum custoditarum ut omnes emendationes monstrentur',
'tog-usenewrc'                => 'Index nuper mutatorum amplificatus (JavaScript)',
'tog-numberheadings'          => 'Numerare semper indices',
'tog-showtoolbar'             => 'Monstrare instrumenta ad paginas recensendas (JavaScript)',
'tog-editondblclick'          => 'Premere bis ad paginam recensendam (JavaScript)',
'tog-editsection'             => 'Sinere paginarum partes recensere per nexus [recensere]',
'tog-editsectiononrightclick' => 'Sinere paginarum partes recenseri cum dexter muris buto premitur in titulis partum (JavaScript)',
'tog-showtoc'                 => 'Indicem contenta monstrare (paginis in quibus sunt plus quam 3 partes)',
'tog-rememberpassword'        => 'Memorare tesserae meae inter conventa (utere cookies)',
'tog-editwidth'               => 'Capsa recensitorum totam latitudinem habet',
'tog-watchcreations'          => 'Paginas quas creo in paginarum custoditarum indicem addere',
'tog-watchdefault'            => 'Paginas quas recenseo in paginarum custoditarum indicem addere',
'tog-watchmoves'              => 'Paginas quas moveo in paginarum custoditarum indicem addere',
'tog-watchdeletion'           => 'Paginas quas deleo in paginarum custoditarum indicem addere',
'tog-minordefault'            => 'Notare omnes recensiones quasi minores',
'tog-previewontop'            => 'Monstrare praevisum ante capsam recensiti, non post ipsam',
'tog-previewonfirst'          => 'Praevisum monstrare recensione incipiente',
'tog-nocache'                 => 'Sistere paginas apothecare',
'tog-enotifwatchlistpages'    => 'Mittere mihi litteras electronicas si pagina a me custodita mutatur',
'tog-enotifusertalkpages'     => 'Mittere mihi litteras electronicas si mea disputatio mutatur',
'tog-enotifminoredits'        => 'Mittere mihi litteras electronicas etiam pro recensionibus minoribus',
'tog-enotifrevealaddr'        => 'Monstrare inscriptio mea electronica in nuntiis notificantibus',
'tog-shownumberswatching'     => 'Numerum usorum custodientium monstrare',
'tog-fancysig'                => 'Subscriptio cruda (sine nexu automatico)',
'tog-externaleditor'          => 'Utere editore externo semper',
'tog-externaldiff'            => 'Utere dissimilitudine externa semper',
'tog-showjumplinks'           => 'Sinere nexus ostendi forma "salire ad" monstrata',
'tog-uselivepreview'          => 'Praevisum viventem adhibere (JavaScript)',
'tog-forceeditsummary'        => 'Si recensionem non summatim descripsero, me roga si continuare velim',
'tog-watchlisthideown'        => 'Celare recensiones meas in paginarum custoditarum indice',
'tog-watchlisthidebots'       => 'Celare recensiones automatarias in paginarum custoditarum indice',
'tog-watchlisthideminor'      => 'Celare recensiones minores in paginarum custoditarum indice',
'tog-watchlisthideliu'        => 'Celare recensiones usorum notorum in paginarum custoditarum indice',
'tog-watchlisthideanons'      => 'Celare recensiones usorum ignotorum in paginarum custoditarum indice',
'tog-ccmeonemails'            => 'Mitte mihi transcriptiones litterarum quas ad alios usores mitto',
'tog-diffonly'                => 'Noli monstrare contenta paginae infra dissimilitudinem',
'tog-showhiddencats'          => 'Categorias celatas monstrare',
'tog-norollbackdiff'          => 'Noli monstrare dissimilitudinem post reversionem paginae',

'underline-always'  => 'Semper',
'underline-never'   => 'Numquam',
'underline-default' => 'Defalta navigatri interretialis',

# Dates
'sunday'        => 'dies Solis',
'monday'        => 'dies Lunae',
'tuesday'       => 'dies Martis',
'wednesday'     => 'dies Mercurii',
'thursday'      => 'dies Iovis',
'friday'        => 'dies Veneris',
'saturday'      => 'dies Saturni',
'sun'           => 'Sol',
'mon'           => 'Lun',
'tue'           => 'Mar',
'wed'           => 'Mer',
'thu'           => 'Iov',
'fri'           => 'Ven',
'sat'           => 'Sat',
'january'       => 'Ianuarius',
'february'      => 'Februarius',
'march'         => 'Martius',
'april'         => 'Aprilis',
'may_long'      => 'Maius',
'june'          => 'Iunius',
'july'          => 'Iulius',
'august'        => 'Augustus',
'september'     => 'September',
'october'       => 'October',
'november'      => 'November',
'december'      => 'December',
'january-gen'   => 'Ianuarii',
'february-gen'  => 'Februarii',
'march-gen'     => 'Martii',
'april-gen'     => 'Aprilis',
'may-gen'       => 'Maii',
'june-gen'      => 'Iunii',
'july-gen'      => 'Iulii',
'august-gen'    => 'Augusti',
'september-gen' => 'Septembris',
'october-gen'   => 'Octobris',
'november-gen'  => 'Novembris',
'december-gen'  => 'Decembris',
'jan'           => 'Ian',
'feb'           => 'Feb',
'mar'           => 'Mar',
'apr'           => 'Apr',
'may'           => 'Mai',
'jun'           => 'Iun',
'jul'           => 'Iul',
'aug'           => 'Aug',
'sep'           => 'Sep',
'oct'           => 'Oct',
'nov'           => 'Nov',
'dec'           => 'Dec',

# Categories related messages
'pagecategories'                 => '{{PLURAL:$1|Categoria|Categoriae}}',
'category_header'                => 'Paginae in categoria "$1"',
'subcategories'                  => 'Subcategoriae',
'category-media-header'          => 'Media in categoria "$1"',
'category-empty'                 => "''Huic categoriae non sunt paginae vel fasciculi.''",
'hidden-categories'              => '{{PLURAL:$1|Categoria celata|Categoriae celatae}}',
'hidden-category-category'       => 'Categoriae celatae', # Name of the category where hidden categories will be listed
'category-subcat-count'          => '{{PLURAL:$2|Huic categoriae est solum una subcategoria.|Huic categoriae {{PLURAL:$1|est haec subcategoria|sunt hae $1 subcategoriae}} ex omnino $2 subcategoriis.}}',
'category-subcat-count-limited'  => 'Huic categoriae {{PLURAL:$1|est haec subcategoria|sunt hae $1 subcategoriae}}.',
'category-article-count'         => '{{PLURAL:$2|Huic categoriae est solum una pagina.|Huic categoriae {{PLURAL:$1|est haec pagina|sunt hae $1 paginae}} ex omnino $2 paginis.}}',
'category-article-count-limited' => 'Huic categoriae {{PLURAL:$1|est haec pagina|sunt hae $1 paginae}}.',
'category-file-count'            => '{{PLURAL:$2|Huic categoriae est solum unus fasciculus.|Huic categoriae {{PLURAL:$1|est hic fasciculus|sunt hi $1 fasciculi}} ex omnino $2 fasciculis.}}',
'category-file-count-limited'    => 'Huic categoriae {{PLURAL:$1|est hic fasciculus|sunt hi $1 fasciculi}}.',
'listingcontinuesabbrev'         => 'cont.',

'about'          => 'De hoc',
'article'        => 'Pagina contenta continens',
'newwindow'      => '(in fenestra nova aperietur)',
'cancel'         => 'Abrogare',
'qbfind'         => 'Invenire',
'qbbrowse'       => 'Perspicere',
'qbedit'         => 'Recensere',
'qbpageoptions'  => 'Optiones paginae',
'qbpageinfo'     => 'Contextus',
'qbmyoptions'    => 'Paginae meae',
'qbspecialpages' => 'Paginae speciales',
'moredotdotdot'  => 'Plus...',
'mypage'         => 'Pagina mea',
'mytalk'         => 'Disputatio mea',
'anontalk'       => 'Disputatio huius IP',
'navigation'     => 'Navigatio',
'and'            => '&#32;et',

# Metadata in edit box
'metadata_help' => 'Metadata:',

'errorpagetitle'    => 'Erratum',
'returnto'          => 'Redire ad $1.',
'tagline'           => 'E {{grammar:ablative|{{SITENAME}}}}',
'help'              => 'Adiutatum',
'search'            => 'Quaerere',
'searchbutton'      => 'Quaerere',
'go'                => 'Ire',
'searcharticle'     => 'Ire',
'history'           => 'Historia paginae',
'history_short'     => 'Historia',
'info_short'        => 'Informatio',
'printableversion'  => 'Forma impressibilis',
'permalink'         => 'Nexus perpetuus',
'print'             => 'Imprimere',
'edit'              => 'Recensere',
'create'            => 'Creare',
'editthispage'      => 'Recensere hanc paginam',
'create-this-page'  => 'Creare hanc paginam',
'delete'            => 'Delere',
'deletethispage'    => 'Delere hanc paginam',
'undelete_short'    => 'Restituere {{PLURAL:$1|unam emendationem|$1 emendationes}}',
'protect'           => 'Protegere',
'protect_change'    => 'mutare',
'protectthispage'   => 'Protegere hanc paginam',
'unprotect'         => 'Deprotegere',
'unprotectthispage' => 'Deprotegere hanc paginam',
'newpage'           => 'Nova pagina',
'talkpage'          => 'Disputare hanc paginam',
'talkpagelinktext'  => 'Disputatio',
'specialpage'       => 'Pagina specialis',
'personaltools'     => 'Instrumenta personalia',
'postcomment'       => 'Adnotare',
'articlepage'       => 'Videre rem',
'talk'              => 'Disputatio',
'views'             => 'Visae',
'toolbox'           => 'Arca ferramentorum',
'userpage'          => 'Videre paginam usoris',
'projectpage'       => 'Videre consilium',
'imagepage'         => 'Videre paginam fasciculi',
'mediawikipage'     => 'Videre nuntium',
'templatepage'      => 'Videre formulam',
'viewhelppage'      => 'Videre auxilium',
'categorypage'      => 'Videre categoriam',
'viewtalkpage'      => 'Videre disputationem',
'otherlanguages'    => 'Linguis aliis',
'redirectedfrom'    => '(Redirectum de $1)',
'redirectpagesub'   => 'Pagina redirectionis',
'lastmodifiedat'    => 'Ultima mutatio: $2, $1.', # $1 date, $2 time
'viewcount'         => 'Haec pagina iam vista est {{PLURAL:$1|semel|$1 vices}}.',
'protectedpage'     => 'Pagina protecta',
'jumpto'            => 'Salire ad:',
'jumptonavigation'  => 'navigationem',
'jumptosearch'      => 'quaerere',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite'            => 'De {{grammar:ablative|{{SITENAME}}}}',
'aboutpage'            => 'Project:De {{GRAMMAR:ablative|{{SITENAME}}}}',
'copyright'            => 'Res ad manum sub $1.',
'copyrightpagename'    => '{{grammar:genitive|{{SITENAME}}}} verba privata',
'copyrightpage'        => '{{ns:project}}:Verba privata',
'currentevents'        => 'Novissima',
'currentevents-url'    => 'Project:Novissima',
'disclaimers'          => 'Repudiationes',
'disclaimerpage'       => 'Project:Repudiationes',
'edithelp'             => 'Opes recensendi',
'edithelppage'         => 'Help:De recensendo',
'faq'                  => 'Quaestiones frequentes',
'faqpage'              => 'Project:Quaestiones frequentes',
'helppage'             => 'Help:Adiutatum',
'mainpage'             => 'Pagina prima',
'mainpage-description' => 'Pagina prima',
'policy-url'           => 'Project:Consilium',
'portal'               => 'Porta communis',
'portal-url'           => 'Project:Porta communis',
'privacy'              => 'Consilium de secreto',
'privacypage'          => 'Project:Consilium de secreto',

'badaccess'        => 'Permissus erratum',
'badaccess-group0' => 'Non licet tibi actum quod petivisti agere.',
'badaccess-groups' => 'Actum quod petivisti solum potest agi ab usoribus ex {{PLURAL:$2|grege|uno gregum}}: $1.',

'versionrequired'     => 'MediaWiki versio $1 necesse',
'versionrequiredtext' => 'MediaWiki versio $1 necesse est ad hanc paginam videndum.
Vide [[Special:Version|paginam versionis]].',

'ok'                      => 'Age',
'retrievedfrom'           => 'Receptum de "$1"',
'youhavenewmessages'      => 'Habes $1 ($2).',
'newmessageslink'         => 'nuntia nova',
'newmessagesdifflink'     => 'dissimilia post mutationem ultimam',
'youhavenewmessagesmulti' => 'Habes nuntia nova in $1',
'editsection'             => 'recensere',
'editold'                 => 'recensere',
'viewsourceold'           => 'fontem videre',
'editlink'                => 'recensere',
'viewsourcelink'          => 'fontem videre',
'editsectionhint'         => 'Recensere partem: $1',
'toc'                     => 'Index',
'showtoc'                 => 'monstrare',
'hidetoc'                 => 'celare',
'thisisdeleted'           => 'Videre aut restituere $1?',
'viewdeleted'             => 'Visne conspicere $1?',
'restorelink'             => '{{PLURAL:$1|unam emendationem deletam|$1 emendationes deletas}}',
'feedlinks'               => 'Fluxus:',
'feed-unavailable'        => 'Fluxus syndicationis non praestiti',
'site-rss-feed'           => '$1 Fluxus RSS',
'site-atom-feed'          => '$1 Fluxus Atom',
'page-rss-feed'           => '"$1" Fluxus RSS',
'page-atom-feed'          => '"$1" Fluxus Atom',
'red-link-title'          => '$1 (pagina nondum scripta est)',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main'      => 'Res',
'nstab-user'      => 'Pagina usoris',
'nstab-media'     => 'Media',
'nstab-special'   => 'Specialis',
'nstab-project'   => 'Consilium',
'nstab-image'     => 'Fasciculus',
'nstab-mediawiki' => 'Nuntium',
'nstab-template'  => 'Formula',
'nstab-help'      => 'Auxilium',
'nstab-category'  => 'Categoria',

# Main script and global functions
'nosuchaction'      => 'Actio non est',
'nosuchactiontext'  => 'Actio in URL designata non agnoscitur a hoc vici.',
'nosuchspecialpage' => 'Pagina specialis non est',
'nospecialpagetext' => "<big>'''Paginam specialem invalidam petivisti.'''</big>

Pro indice paginarum specialum validarum, vide [[Special:SpecialPages|{{int:specialpages}}]].",

# General errors
'error'                => 'Erratum',
'databaseerror'        => 'Erratum in basi datorum',
'noconnect'            => '{{SITENAME}} per aerumnas technicas agit, et server basis datorum invenire non potest.<br />
$1',
'cachederror'          => 'Quae sequuntur sunt ex exemplo conditivo paginae quaesitae, fortasse non recente.',
'readonly'             => 'Basis datorum obstructa',
'missingarticle-rev'   => '(numerus emendationis: $1)',
'missingarticle-diff'  => '(Diss: $1, $2)',
'internalerror'        => 'Erratum internum',
'internalerror_info'   => 'Erratum internum: $1',
'filecopyerror'        => 'Non potuit fasciculus "$1" ad "$2" transcribi.',
'filedeleteerror'      => 'Non potuit deleri fasciculus "$1".',
'directorycreateerror' => 'Non potuit directorium "$1" creari.',
'filenotfound'         => 'Non potuit fasciculus "$1" inveniri.',
'unexpected'           => 'Valor improvisus: "$1"="$2".',
'badarticleerror'      => 'Haec actio non perfici potest in hac pagina.',
'cannotdelete'         => 'Pagina vel fasciculus deleri non potuit. (Fortasse usor alius iam deleverat.)',
'badtitle'             => 'Titulus malus',
'badtitletext'         => 'Nomen paginae quaestae fuit invalidum, vacuum, aut praeverbium interlingualem vel intervicialem habuit. Fortasse insunt una aut plus litterarum quae in titulis non possunt inscribier.',
'wrong_wfQuery_params' => 'Parametri incorrectae pro wfQuery()<br />
Functio: $1<br />
Inquisitio: $2',
'viewsource'           => 'Fontem videre',
'viewsourcefor'        => 'pro $1',
'actionthrottled'      => 'Actio strangulata',
'protectedpagetext'    => 'Haec pagina protecta est, ut emendationes prohibeantur.',
'viewsourcetext'       => 'Fontem videas et exscribeas:',
'protectedinterface'   => 'Haec pagina dat textum interfaciei pro logiciali, et est protecta ad vandalismum vetandum.',
'editinginterface'     => "'''Caveat censor:''' Emendas iam paginam quae textum interfaciei logicialem dat. Mutationes vultum {{grammar:genitive|{{SITENAME}}}} omnibus usoribus afficient. In nuntia MediaWiki vertendo, quaesumus te uti [http://translatewiki.net/wiki/Main_Page?setlang=la Betawiki].",
'sqlhidden'            => '(inquisitio SQL celata)',
'namespaceprotected'   => "Tibi non licet paginas spatii nominalis '''$1''' recensere.",
'ns-specialprotected'  => 'Paginae speciales recenseri non possunt.',
'titleprotected'       => 'Hic titulus protectus est ab usore [[User:$1|$1]] ne creetur.
Ratio data est "<i>$2</i>".',

# Virus scanner
'virus-unknownscanner' => 'antivirus incognitus:',

# Login and logout pages
'logouttitle'                => 'Conventum concludere',
'logouttext'                 => '<strong>Conventum tuum conclusum est.</strong>

Ignote continues {{grammar:ablative|{{SITENAME}}}} uti, aut conventum novum vel sub eodem vel novo nomine [[Special:UserLogin|aperias]].
Nota bene paginas fortasse videantur quasi tuum conventum esset apertum, priusquam navigatrum purgaveris.',
'welcomecreation'            => '== Salve, $1! ==
Ratio tua iam creata est.
Noli oblivisci [[Special:Preferences|praeferentias tuas]] apud {{grammar:accusative|{{SITENAME}}}} mutare.',
'loginpagetitle'             => 'Conventum aperire',
'yourname'                   => 'Nomen tuum usoris:',
'yourpassword'               => 'Tessera tua:',
'yourpasswordagain'          => 'Tesseram tuam adfirmare:',
'remembermypassword'         => 'Tesseram meam inter conventa memento',
'yourdomainname'             => 'Regnum tuum:',
'login'                      => 'Conventum aperire',
'nav-login-createaccount'    => 'Conventum aperire / conventum creare',
'loginprompt'                => 'Cookies potestatem facere debes ut conventum aperire.',
'userlogin'                  => 'Conventum aperire / conventum creare',
'logout'                     => 'Conventum concludere',
'userlogout'                 => 'Conventum concludere',
'notloggedin'                => 'Conventum non apertum est',
'nologin'                    => 'Num rationem non habes? $1.',
'nologinlink'                => 'Eam crea',
'createaccount'              => 'Rationem novam creare',
'gotaccount'                 => 'Habesne iam rationem? $1.',
'gotaccountlink'             => 'Conventum aperi',
'createaccountmail'          => 'ab inscriptione electronica',
'badretype'                  => 'Tesserae quas scripsisti inter se non congruunt.',
'userexists'                 => 'Nomen usoris quod selegisti iam est.
Nomen usoris alium selige.',
'youremail'                  => 'Inscriptio tua electronica:',
'username'                   => 'Nomen usoris:',
'uid'                        => 'ID usoris:',
'yourrealname'               => 'Nomen tuum verum:',
'yourlanguage'               => 'Lingua tua:',
'yourvariant'                => 'Differentia:',
'yournick'                   => 'Subscriptio:',
'badsig'                     => 'Subscriptio cruda non est valida; scrutina HTML textos.',
'badsiglength'               => 'Subscriptio nimis longa est.
{{PLURAL:$1|Una littera est|$1 litterae sunt}} longitudo maxima.',
'email'                      => 'Litterae electronicae',
'prefs-help-realname'        => 'Nomen verum non necesse est.
Si vis id dare, opera tua tibi ascribentur.',
'loginerror'                 => 'Error factus est in aperiendo conventum',
'prefs-help-email'           => 'Inscriptio electronica non necesse est, sed sinit tesseram novam tibi mitti si eae oblitus es.
Si vis, sinit etiam aliis tecum loqui per tuam paginam usoris vel disputationis, nisi te reveles.',
'prefs-help-email-required'  => 'Inscriptio electronica necesse est.',
'nocookiesnew'               => "Ratio usoris creata est, sed conventum non apertum est. {{SITENAME}} ''Cookies'' utitur in usorum conventa aperiendo. Cookies tua debiles sunt. Eis potestatem fac, tum conventum aperi cum nomine usoris tesseraque tua nova.",
'nocookieslogin'             => "{{SITENAME}} ''Cookies'' utitur in usorum conventa aperiendo. Cookies tua debiles sunt. Eis potestatem fac, tum conare denuo.",
'noname'                     => 'Nominem usoris ratum non designavisti.',
'loginsuccesstitle'          => 'Conventum prospere apertum est',
'loginsuccess'               => "'''Apud {{grammar:accusative|{{SITENAME}}}} agnosceris ut \"\$1\".'''",
'nosuchuser'                 => 'Usor "$1" non est.
Confirma orthographiam, aut [[Special:UserLogin/signup|crea novam rationem]].',
'nosuchusershort'            => 'Usor "<nowiki>$1</nowiki>" non est.
Confirma orthographiam.',
'nouserspecified'            => 'Nomen usoris indicare debes.',
'wrongpassword'              => 'Tessera quam scripsisti non constat. Conare denuo.',
'wrongpasswordempty'         => 'Tesseram vacuam scripsisti. Conare denuo.',
'mailmypassword'             => 'Tesseram novam per litteras electronicas petere',
'passwordremindertitle'      => 'Nova tessera apud {{grammar:accusative|{{SITENAME}}}}',
'passwordremindertext'       => 'Aliquis (tu probabiliter, ex loco IP $1)
tesseram novam petivit pro {{grammar:ablative|{{SITENAME}}}} ($4).
Tessera temporaria usoris "$2" creata est: "$3".
Si vis, conventum aperias et statim tesseram tuam mutes.

Si non ipse hanc petitionem fecisti, aut si tesserae tuae
meministi et etiam nolis eam mutare, potes hunc nuntium
ignorare, et tessera seni uti continuare.',
'acct_creation_throttle_hit' => 'Iam {{PLURAL:$1|unam rationem|rationes $1}} creavisti.
Plurimas non tibi licet creare.',
'emailauthenticated'         => 'Tua inscriptio electronica recognita est $3, $2.',
'accountcreated'             => 'Ratio creata',
'accountcreatedtext'         => 'Ratio pro usore $1 creata est.',
'createaccount-title'        => 'Ratio creata apud {{grammar:accusative|{{SITENAME}}}}',
'createaccount-text'         => 'Aliquis creavit rationem pro inscriptione electronica tua apud {{grammar:accusative|{{SITENAME}}}} ($4). Nomen usoris est "$2" et tessera est "$3". Conventum aperias et statim tesseram tuam mutes.

Hunc nuntium ignorare potes, si nolis hac ratione uti.',
'loginlanguagelabel'         => 'Lingua: $1',

# Password reset dialog
'resetpass'                 => 'Tesseram mutare',
'resetpass_header'          => 'Tesseram rationis mutare',
'oldpassword'               => 'Tessera vetus:',
'newpassword'               => 'Tessera nova:',
'retypenew'                 => 'Adfirmare tesseram novam:',
'resetpass_submit'          => 'Tesseram mutare et conventum aperire',
'resetpass_success'         => 'Tessera tua prospere mutata est. Aperiens conventum...',
'resetpass_forbidden'       => 'Tesserae mutari non possunt',
'resetpass-no-info'         => 'Necesse est conventum aperire ad hanc paginam adhibendum.',
'resetpass-submit-loggedin' => 'Tesseram mutare',

# Edit page toolbar
'bold_sample'     => 'Litterae pingues',
'bold_tip'        => 'Litterae pingues',
'italic_sample'   => 'Textus litteris italicis scriptus',
'italic_tip'      => 'Textus litteris italicis scriptus',
'link_sample'     => 'Titulum nexere',
'link_tip'        => 'Nexus internus',
'extlink_sample'  => 'http://www.example.com titulus nexus externi',
'extlink_tip'     => 'Nexus externus (memento praefixi http://)',
'headline_sample' => 'Textus capituli',
'headline_tip'    => 'Linea capitalis scalae 2',
'math_sample'     => 'Hic inscribe formulam',
'math_tip'        => 'Formula mathematica (LaTeX)',
'image_sample'    => 'Exemplum.jpg',
'image_tip'       => 'Imago in pagina imposita',
'media_sample'    => 'Exemplum.ogg',
'media_tip'       => 'Nexus ad fasciculum mediorum',
'sig_tip'         => 'Subscriptio tua cum indicatione temporis',
'hr_tip'          => 'Linea horizontalis (noli saepe uti)',

# Edit pages
'summary'                          => 'Summarium:',
'subject'                          => 'Res/titulus:',
'minoredit'                        => 'Haec est recensio minor',
'watchthis'                        => 'Custodire hanc paginam',
'savearticle'                      => 'Servare hanc rem',
'preview'                          => 'Praevidere',
'showpreview'                      => 'Monstrare praevisum',
'showlivepreview'                  => 'Monstrare praevisum viventem',
'showdiff'                         => 'Mutata ostendere',
'anoneditwarning'                  => "'''Monitio:''' Conventum tuum non apertum. Locus IP tuus in historia huius paginae notabitur.",
'missingcommenttext'               => 'Sententiam subter inscribe.',
'summary-preview'                  => 'Praevisum summarii:',
'subject-preview'                  => 'Praevisum rei/tituli:',
'blockedtitle'                     => 'Usor obstructus est',
'blockedtext'                      => '<big>\'\'\'Nomen usoris aut locus IP tuus obstructus est\'\'\'</big> a magistratu $1.

Ratio data est: \'\'$2\'\'.

* Initium obstructionis: $8
* Finis obstructionis: $6
* Obstructus est: $7

Potes ad $1 aut [[{{MediaWiki:Grouppage-sysop}}|magistratum]] alium nuntium mittere ad impedimentum disputandum.
Nota bene te non posse proprietate "Litteras electronicas usori mittere" uti, nisi tibi est inscriptio electronica confirmata apud [[Special:Preferences|praeferentias usoris tuas]] vel si tibi etiam litterae electronicae obstructi sunt.
Locus IP tuus est $3, et numerus obstructionis est #$5. Quaesumus te eos scripturum si quaestiones ullas roges.',
'autoblockedtext'                  => 'Locus IP tuus automatice obstructus est quia usor alius, qui a magistratu $1 obstructus est, eum adhiberat.
Ratio data est:

:\'\'$2\'\'

* Initium obstructionis erit: $8
* Finis obstructionis erit: $6

Potes ad $1 aut [[{{MediaWiki:Grouppage-sysop}}|magistratum]] alium nuntium mittere ad impedimentum disputandum.

Nota bene te non posse proprietate "Litteras electronicas usori mittere" uti, nisi tibi est inscriptio electronica confirmata apud [[Special:Preferences|praeferentias usoris tuas]].

Numerus obstructionis tuus est #$5. Quaesumus te eum scripturum si quaestiones ullas roges.',
'blockednoreason'                  => 'nulla causa data',
'blockedoriginalsource'            => "Fons '''$1''' subter monstratur:",
'blockededitsource'                => "Textus '''tuarum emendationum''' in '''$1''' subter monstratur:",
'whitelistedittitle'               => 'Conventum aperiendum ut recenseas',
'whitelistedittext'                => 'Necesse est tibi $1 priusquam paginas recenseas.',
'confirmedittitle'                 => 'Adfirmanda est inscriptio tua electronica prisuquam recenseas',
'confirmedittext'                  => 'Tua inscriptio electronica est adfirmanda priusquam paginas recenseas. Quaesumus eam selige et adfirma per tuas [[Special:Preferences|praeferentias]].',
'nosuchsectiontitle'               => 'Haec pars non est',
'nosuchsectiontext'                => 'Partem inexistentem recensere conaris. Quia pars $1 non est, recensio tua servari non potest.',
'loginreqtitle'                    => 'Conventum aperiendum',
'loginreqlink'                     => 'conventum aperire',
'loginreqpagetext'                 => 'Necesse est tibi $1 priusquam paginas alias legas.',
'accmailtitle'                     => 'Tessera missa est.',
'accmailtext'                      => 'Tessera usoris "$1" ad $2 missa est.',
'newarticle'                       => '(Nova)',
'newarticletext'                   => "Per nexum progressus es ad paginam quae nondum exsistit.
Novam paginam si vis creare, in capsam infra praebitam scribe.
(Vide [[{{MediaWiki:Helppage}}|paginam auxilii]] si plura cognoscere vis.)
Si hic es propter errorem, solum '''Retrorsum''' in navigatro tuo preme.",
'anontalkpagetext'                 => "----''Haec est pagina disputationis usoris anonymi, solum a loco IP suo noti. Memento locos IP aliquando mutaturos, et a usoribus multis fortasse adhibitos. Si es usor ignotus, et tibi querulae sine causa datae sunt, conventum [[Special:UserLogin/signup|crea]] vel [[Special:UserLogin|aperi]] ad confusionem futuram evitendam.''",
'noarticletext'                    => 'In hac pagina nondum litterae sunt. Potes etiam [[Special:Search/{{PAGENAME}}|hanc rem in aliis paginis quaerere]] aut [{{fullurl:{{FULLPAGENAME}}|action=edit}} hanc paginam creare].',
'userpage-userdoesnotexist'        => 'Usor "$1" non est. Visne re vera hanc paginam creare vel recensere?',
'updated'                          => '(Novata)',
'note'                             => '<strong>Nota:</strong>',
'previewnote'                      => '<strong>Memento hanc paginam solum praevisum esse, neque iam servatam!</strong>',
'editing'                          => 'Recensio paginae "$1"',
'editingsection'                   => 'Recensens $1 (partem)',
'editingcomment'                   => 'Recensens $1 (adnotum)',
'editconflict'                     => 'Contentio recensionis: $1',
'explainconflict'                  => "Alius hanc paginam mutavit postquam eadem recensere incipiebas.
Capsa superior paginae verba recentissima continet.
Mutationes tuae in capsa inferiore monstrantur.
Mutationes tuae in verba superiora adiungare debes.
'''Solum''' verba capsae superioris servabuntur quando \"Servare hanc rem\" premes.",
'yourtext'                         => 'Sententia tua',
'storedversion'                    => 'Verba recentissima',
'nonunicodebrowser'                => '<strong>CAVETO: Navigatorium retiale tuum systemati UNICODE morem non gerit. Modum habemus quo commentationes sine damno recenseas: litterae non-ASCII in capsa sub veste hexadecimali ostendentur.</strong>',
'editingold'                       => '<strong>MONITIO: Formam obsoletam huius paginae mutas.
Si eam servaveris, omnes mutationes recentiores obrogatae peribunt!</strong>',
'yourdiff'                         => 'Dissimilitudo',
'copyrightwarning'                 => 'Nota bene omnia contributa divulgari sub \'\'$2\'\' (vide singula apud $1).
Nisi vis verba tua crudelissime recenseri, mutari, et ad libidinem redistribui, noli ea submittere.<br />
Nobis etiam spondes te esse ipsum horum verborum scriptorem primum, aut ex opere in "dominio publico" exscripsisse.
<strong>NOLI OPERIBUS SUB IURE DIVULGANDI UTI SINE POTESTATE!</strong>',
'copyrightwarning2'                => 'Nota bene omnia contributa apud {{grammar:accusative|{{SITENAME}}}} ab aliis recenseri, mutari vel removi posse.
Nisi vis verba tua crudelissime recenseri, noli ea submittere.<br />
Nobis etiam spondes te esse ipsum horum verborum scriptorem primum, aut ex opere in "dominio publico" vel ex  libere fonte simili exscripsisse (vide singula apud $1).
<strong>NOLI OPERIBUS SUB IURE DIVULGANDI UTI SINE POTESTATE!</strong>',
'longpagewarning'                  => 'MONITIO: Haec pagina est $1 chilioctetis longa;
aliquae navigatra paginas longiores quam 32 chiliocteti recensere non possunt.
Considera paginam in partes minores frangere.',
'protectedpagewarning'             => '<strong>CAVE: Haec pagina protecta est ut magistratus soli eam recenseant.</strong>',
'templatesused'                    => 'Formulae hac in pagina adhibitae:',
'templatesusedpreview'             => 'Formulae hoc in praeviso adhibitae:',
'templatesusedsection'             => 'Formulae hac in parte adhibitae:',
'template-protected'               => '(protecta)',
'template-semiprotected'           => '(semi-protecta)',
'hiddencategories'                 => 'Haec pagina ad {{PLURAL:$1|unam categoriam celatam|$1 categorias celatas}} pertinet:',
'nocreatetitle'                    => 'Creatio paginarum coercita',
'nocreate-loggedin'                => 'Tibi non licet paginas novas creare.',
'permissionserrors'                => 'Errores permissionis',
'permissionserrorstext-withaction' => 'Tibi non licet $2, quia:',
'recreate-deleted-warn'            => "'''Cave: paginam qui antea iam deleta est creas.'''

Tibi oportet meditari utrum hanc paginam creare tamen convenit. Commodule notatio paginarum deletarum hic datur:",
'deleted-notice'                   => 'Haec pagina deleta est. Commodule notatio paginarum deletarum subter datur.',
'deletelog-fulllog'                => 'Inspicere acta plenissima',
'edit-hook-aborted'                => 'Recensio a hamo abrogata est.
Hamus nullam causam dedit.',
'edit-gone-missing'                => 'Non potui paginam modificare.
Haec pagina deleta esse videtur.',
'edit-conflict'                    => 'Contentio recensionis.',
'edit-no-change'                   => 'Recensio tua non servata est, quia contenta paginae non mutavisti.',
'edit-already-exists'              => 'Non potui paginam novam creare
quia haec pagina iam est.',

# Parser/template warnings
'parser-template-loop-warning' => 'Ansula formulae detecta: [[$1]]',

# "Undo" feature
'undo-norev'   => 'Recensio abrogari non potuit quia non est aut deleta est.',
'undo-summary' => 'Abrogans recensionem $1 ab usore [[Special:Contributions/$2|$2]] ([[User talk:$2|Disputatio]])',

# Account creation failure
'cantcreateaccounttitle' => 'Ratio creari non potest',
'cantcreateaccount-text' => "Creatio rationum ab hoc loco IP ('''$1''') obstructa est ab usore [[User:$3|$3]].

Ille hanc causam dedit: ''$2''",

# History pages
'viewpagelogs'           => 'Vide acta huius paginae',
'nohistory'              => 'Huic paginae non est historia.',
'currentrev'             => 'Emendatio recentissima',
'currentrev-asof'        => 'Emendatio recentissima ex $1',
'revisionasof'           => 'Emendatio ex $1',
'revision-info'          => 'Emendatio ex $1 ab $2', # Additionally available: $3: revision id
'previousrevision'       => '← Emendatio senior',
'nextrevision'           => 'Emendatio novior →',
'currentrevisionlink'    => 'Emendatio currens',
'cur'                    => 'nov',
'next'                   => 'seq',
'last'                   => 'prox',
'page_first'             => 'prim',
'page_last'              => 'ult',
'histlegend'             => "Selige pro dissimilitudine: indica emendationes in botones radiales et \"intrare\" in claviatura vel \"comparatio\" imprime ut conferas.<br />
Titulus: '''(nov)''' = dissimilis ab emendatione novissima,
'''(prox)''' = dissimilis ab emendatione proxima, '''m''' = recensio minor.",
'history-fieldset-title' => 'Quaerere in paginae historia',
'deletedrev'             => '[deleta]',
'histfirst'              => 'Veterrimus',
'histlast'               => 'Novissimus',
'historysize'            => '({{PLURAL:$1|1 octetus|$1 octeti}})',
'historyempty'           => '(vacua)',

# Revision feed
'history-feed-title'          => 'Historia',
'history-feed-item-nocomment' => '$1 ad $2', # user at time

# Revision deletion
'rev-deleted-comment'    => '(summarium celatum)',
'rev-deleted-user'       => '(nomen usoris celatum est)',
'rev-deleted-event'      => '(actio actorum celata)',
'rev-delundel'           => 'monstrare/celare',
'revisiondelete'         => 'Emendationem delere',
'revdelete-selected'     => "'''{{PLURAL:$2|Emendatio selecta|Emendationes selectae}} paginae [[:$1]]:'''",
'revdelete-hide-text'    => 'Celare textum emendationis',
'revdelete-hide-comment' => 'Celare adnotum emendationis',
'revdelete-hide-image'   => 'Celare contentum fasciculi',
'revdelete-log'          => 'Summarium pro actis:',
'revdel-restore'         => 'Visibilitatem mutare',
'pagehist'               => 'Historia paginae',
'deletedhist'            => 'Historia deleta',
'revdelete-content'      => 'contenta',
'revdelete-summary'      => 'summarium recensionis',
'revdelete-uname'        => 'nomen usoris',
'revdelete-hid'          => 'celavit $1',
'revdelete-unhid'        => 'monstravit $1',
'revdelete-log-message'  => '$1 {{PLURAL:$2|unius emendationis|$2 emendationum}}',
'logdelete-log-message'  => '$1 {{PLURAL:$2|unius eventi|$2 eventorum}}',

# History merging
'mergehistory-from'        => 'Pagina imponenda:',
'mergehistory-into'        => 'Pagina petita:',
'mergehistory-submit'      => 'Confundere emendationes',
'mergehistory-autocomment' => 'confundavit [[:$1]] cum [[:$2]]',
'mergehistory-comment'     => 'confundavit [[:$1]] cum [[:$2]]: $3',

# Merge log
'mergelog'    => 'Acta confundendi',
'revertmerge' => 'Inconfundere',

# Diffs
'history-title'           => 'Historia paginae "$1"',
'difference'              => '(Dissimilitudo inter emendationes)',
'lineno'                  => 'Linea $1:',
'compareselectedversions' => 'Conferre versiones selectas',
'visualcomparison'        => 'Comparatio visualis',
'wikicodecomparison'      => 'Comparatio vicitexti',
'editundo'                => 'abrogare',
'diff-added'              => '$1 additum',
'diff-src'                => 'fons',
'diff-withdestination'    => 'cum destinatione $1',
'diff-with'               => '&#32;cum $1 $2',
'diff-with-final'         => '&#32;et $1 $2',
'diff-width'              => 'amplitudo',
'diff-height'             => 'altitudo',
'diff-p'                  => "'''paragraphus'''",
'diff-blockquote'         => "'''citatus'''",
'diff-h1'                 => "'''capitulum (scalae 1)'''",
'diff-h2'                 => "'''capitulum (scalae 2)'''",
'diff-h3'                 => "'''capitulum (scalae 3)'''",
'diff-h4'                 => "'''capitulum (scalae 4)'''",
'diff-h5'                 => "'''capitulum (scalae 5)'''",
'diff-pre'                => "'''copia praeformata'''",
'diff-div'                => "'''divisio'''",
'diff-table'              => "'''tabula'''",
'diff-tr'                 => "'''linea'''",
'diff-td'                 => "'''cella'''",
'diff-th'                 => "'''capitulum'''",
'diff-hr'                 => "'''linea horizontalis'''",
'diff-dd'                 => "'''definitio'''",
'diff-form'               => "'''forma'''",
'diff-img'                => "'''imago'''",
'diff-span'               => "'''diductio'''",
'diff-a'                  => "'''nexus'''",
'diff-i'                  => "'''litterae obliquae'''",
'diff-b'                  => "'''litterae pingues'''",
'diff-strong'             => "'''fortis'''",
'diff-em'                 => "'''emphasis'''",
'diff-font'               => "'''series litterarum'''",
'diff-big'                => "'''magnum'''",
'diff-del'                => "'''deleta'''",
'diff-tt'                 => "'''amplitudo certa'''",
'diff-sub'                => "'''subscriptum'''",
'diff-sup'                => "'''superscriptum'''",
'diff-strike'             => "'''talea transversalis'''",

# Search results
'searchresults'            => 'Eventum investigationis',
'searchresulttext'         => 'Pro plurimis nuntiis de investigatione in {{grammar:ablative|{{SITENAME}}}}, vide [[{{MediaWiki:Helppage}}|{{MediaWiki:Help}}]].',
'searchsubtitle'           => 'Quaesitum est \'\'\'[[:$1]]\'\'\' ([[Special:Prefixindex/$1|omnes paginae quarum titulus incipit litteris "$1"]] | [[Special:WhatLinksHere/$1|omnes paginae quae ad "$1" nectunt]])',
'searchsubtitleinvalid'    => 'Pro investigatione "$1"',
'noexactmatch'             => "'''Nulla pagina cum titulo \"\$1\" exacto existit.''' Potes [[:\$1|eam creare]].",
'noexactmatch-nocreate'    => "'''Nulla pagina cum titulo \"\$1\" exacto existit.'''",
'titlematches'             => 'Exaequata indicibus rerum',
'notitlematches'           => 'Nulla exaequata',
'notextmatches'            => 'Nihil verbis quaesitis congruit',
'prevn'                    => '$1 superiores',
'nextn'                    => '$1 proxima',
'viewprevnext'             => 'Videre ($1) ($2) ($3).',
'searchmenu-exists'        => "'''Iam est pagina \"[[:\$1]]\"'''",
'searchmenu-new'           => "'''Creare paginam \"[[:\$1]]\"'''",
'searchhelp-url'           => 'Help:Adiutatum',
'searchprofile-project'    => 'Paginae incepti',
'searchprofile-images'     => 'Fasciculi',
'searchprofile-everything' => 'Omnia',
'searchprofile-advanced'   => 'Callidissime',
'search-result-size'       => '$1 ({{PLURAL:$2|1 verbum|$2 verba}})',
'search-result-score'      => 'Gravitas: $1%',
'search-redirect'          => '(redirectio $1)',
'search-section'           => '(pars $1)',
'search-suggest'           => 'Nonne dicere voluisti: $1',
'search-interwiki-default' => '$1 eventa:',
'search-interwiki-more'    => '(plus)',
'search-relatedarticle'    => 'Relata',
'searchrelated'            => 'relata',
'searchall'                => 'omnia',
'showingresults'           => "Subter monstrans {{PLURAL:$1|'''1''' eventu|'''$1''' eventibus}} tenus incipiens ab #'''$2'''.",
'showingresultsnum'        => "Subter monstrans {{PLURAL:$3|'''1''' eventum|'''$3''' eventus}} incipiens ab #'''$2'''.",
'showingresultstotal'      => "Subter monstrans {{PLURAL:$4|eventum '''$1''' ex '''$3'''|eventus '''$1 - $2''' ex '''$3'''}}",
'nonefound'                => "'''Note''': Only some namespaces are searched by default.
Try prefixing your query with ''all:'' to search all content (including talk pages, templates, etc), or use the desired namespace as prefix.",
'powersearch'              => 'Quaerere callidissime',
'powersearch-legend'       => 'Quaerere callidissime',
'powersearch-ns'           => 'Quaerere in spatiis nominalibus:',
'powersearch-redir'        => 'Monstrare redirectiones',
'powersearch-field'        => 'Quaerere',
'searchdisabled'           => 'Per {{grammar:accusative|{{SITENAME}}}} ad tempus non potes quaerere. Interea per [http://www.google.com Googlem] quaeras. Nota indices {{grammar:genitive|{{SITENAME}}}} contentorum apud Googlem fortasse antiquiores esse.',

# Preferences page
'preferences'              => 'Praeferentiae',
'mypreferences'            => 'Praeferentiae meae',
'prefs-edits'              => 'Numerus recensionum:',
'prefsnologin'             => 'Conventum non apertum',
'prefsnologintext'         => '<span class="plainlinks">[{{fullurl:Special:UserLogin|returnto=$1}} Conventum aperire]</span> debes ad praeferentias tuas modificandum.',
'prefsreset'               => 'Praeferentiae tuae reperscriptae sunt.',
'qbsettings'               => 'Figuratio claustri celeris',
'qbsettings-none'          => 'Nullus',
'qbsettings-fixedleft'     => 'Constituere a sinistra',
'qbsettings-fixedright'    => 'Constituere a dextra',
'qbsettings-floatingleft'  => 'Innens a sinistra',
'qbsettings-floatingright' => 'Innens a dextra',
'changepassword'           => 'Tesseram mutare',
'skin'                     => 'Aspectum',
'skin-preview'             => 'Praevisum',
'math'                     => 'Interpretatio artis mathematicae',
'dateformat'               => 'Forma diei',
'datedefault'              => 'Nullum praeferentiae',
'datetime'                 => 'Dies et tempus',
'math_failure'             => 'Excutare non potest',
'math_unknown_error'       => 'error ignotus',
'math_unknown_function'    => 'functio ignota',
'math_lexing_error'        => 'erratum lexicale',
'math_syntax_error'        => 'erratum syntaxis',
'prefs-personal'           => 'Minutiae rationis',
'prefs-rc'                 => 'Nuper mutata',
'prefs-watchlist'          => 'Paginae custoditae',
'prefs-watchlist-days'     => 'Numerus dierum displicandus in paginis tuis custoditis:',
'prefs-watchlist-edits'    => 'Numerus recensionum displicandus in paginis tuis custoditis extensis:',
'prefs-misc'               => 'Misc',
'prefs-resetpass'          => 'Tesseram mutare',
'saveprefs'                => 'Servare praeferentias',
'resetprefs'               => 'Reddere praeferentias',
'textboxsize'              => 'Mensura capsae verbi',
'prefs-edit-boxsize'       => 'Magnitudo capsae recensionis.',
'rows'                     => 'Lineae:',
'columns'                  => 'Columnae:',
'searchresultshead'        => 'Figuratio eventorum investigationis',
'resultsperpage'           => 'Eventa per paginam:',
'contextlines'             => 'Lineae per eventum:',
'contextchars'             => 'Litterae contexti per lineam:',
'recentchangesdays'        => 'Quot dies in nuper mutatis monstrandi:',
'recentchangescount'       => 'Quantum rerum in nuper mutatis, historiis et actis:',
'savedprefs'               => 'Praeferentiae tuae servatae sunt.',
'timezonelegend'           => 'Zona temporis',
'timezonetext'             => '¹Numerus horarum inter horam tuam et illam moderatri (UTC).',
'localtime'                => 'Hora indigena:',
'timezoneselect'           => 'Zona temporis:',
'timezoneuseoffset'        => 'Alia (da dissimilitudinem cinguli horae)',
'timezoneoffset'           => 'Dissimilitudo cinguli horae¹:',
'servertime'               => 'Hora moderatri:',
'guesstimezone'            => 'Hora ex navigatro scribere',
'allowemail'               => 'Sinere litteras electronicas inscriptioni electronicae meae mittere',
'prefs-namespaces'         => 'Spatia nominalia',
'defaultns'                => 'Quaerere per haec spatia nominalia a defalta:',
'default'                  => 'praedeterminatum',
'files'                    => 'Fasciculi',

# User rights
'userrights'               => 'Usorum potestates', # Not used as normal message but as header for the special page itself
'userrights-user-editname' => 'Nomen usoris inscribe:',
'editusergroup'            => 'Greges usorum recensere',
'editinguser'              => "Modificare potestates usoris '''[[User:$1|$1]]''' ([[User talk:$1|{{int:talkpagelinktext}}]] | [[Special:Contributions/$1|{{int:contribslink}}]])",
'userrights-editusergroup' => 'Greges usorum recensere',
'userrights-groupsmember'  => 'In grege aut in gregibus:',
'userrights-reason'        => 'Causa modificationis:',

# Groups
'group'            => 'Grex:',
'group-user'       => 'Usores',
'group-bot'        => 'Automata',
'group-sysop'      => 'Magistratus',
'group-bureaucrat' => 'Grapheocrates',
'group-suppress'   => 'Censurae',
'group-all'        => '(omnes)',

'group-user-member'       => 'Usor',
'group-bot-member'        => 'Automaton',
'group-sysop-member'      => 'Magistratus',
'group-bureaucrat-member' => 'Grapheocrates',
'group-suppress-member'   => 'Censura',

'grouppage-user'       => '{{ns:project}}:Usores',
'grouppage-bot'        => '{{ns:project}}:Automata',
'grouppage-sysop'      => '{{ns:project}}:Magistratus',
'grouppage-bureaucrat' => '{{ns:project}}:Grapheocrates',

# Rights
'right-read'                 => 'Paginas legere',
'right-edit'                 => 'Paginas recensere',
'right-createpage'           => 'Paginas creare (sine paginis disputationis)',
'right-createtalk'           => 'Paginas disputationis creare',
'right-createaccount'        => 'Rationes usoris novas creare',
'right-minoredit'            => 'Recensiones minores designare',
'right-move'                 => 'Paginas movere',
'right-move-subpages'        => 'Paginas una cum subpaginis movere',
'right-move-rootuserpages'   => 'Paginas usorum movere',
'right-movefile'             => 'Fasciculos movere',
'right-suppressredirect'     => 'Non creare redirectionem ex titulo vetere paginam movendo',
'right-upload'               => 'Fasciculos imponere',
'right-upload_by_url'        => 'Fasciculum imponere ex inscriptione URL',
'right-autoconfirmed'        => 'Paginas semiprotectas recensere',
'right-delete'               => 'Paginas delere',
'right-bigdelete'            => 'Paginas magnarum historiarum delere',
'right-deleterevision'       => 'Emendationes paginarum delere vel restituere',
'right-browsearchive'        => 'Paginas deletas quaerere',
'right-undelete'             => 'Paginam restituere',
'right-suppressrevision'     => 'Emendationes magistratus celatas inspicere vel restituere',
'right-suppressionlog'       => 'Acta privata inspicere',
'right-block'                => 'Usores alios obstruere ne recensere possunt',
'right-blockemail'           => 'Usorem obstruere ne litteras electronicas mittere potest',
'right-hideuser'             => 'Celare nomen usoris hunc usorem obstruendo',
'right-protect'              => 'Protectionem mutare vel paginas protectas recensere',
'right-editprotected'        => 'Paginas protectas recensere (sine protectione defluente quasi cataracta)',
'right-editusercssjs'        => 'Paginas CSS vel JS aliorum usorum recensere',
'right-rollback'             => 'Cito reverti recensiones proximas usoris cuiuslibet paginae',
'right-import'               => 'Paginas ex vicis aliis importare',
'right-importupload'         => 'Paginas ex fasciculo imponendo importare',
'right-unwatchedpages'       => 'Indicem paginarum non custoditarum inspicere',
'right-mergehistory'         => 'Historias paginarum confundere',
'right-userrights'           => 'Omnes potestates usorum recensere',
'right-userrights-interwiki' => 'Potestates usorum aliis in vicis recensere',
'right-siteadmin'            => 'Basem datorum obstruere vel deobstruere',

# User rights log
'rightslog'     => 'Index mutationum iuribus usorum',
'rightslogtext' => 'Haec est index mutationum iuribus usorum.',
'rightsnone'    => '(nullus)',

# Associated actions - in the sentence "You do not have permission to X"
'action-read'                 => 'hanc paginam legere',
'action-edit'                 => 'hanc paginam recensere',
'action-createpage'           => 'paginas creare',
'action-createtalk'           => 'paginas disputationis creare',
'action-createaccount'        => 'hanc rationem usoris creare',
'action-minoredit'            => 'hanc recensionem minorem designare',
'action-move'                 => 'hanc paginam movere',
'action-move-subpages'        => 'hanc paginam una cum subpaginis movere',
'action-move-rootuserpages'   => 'paginas usorum movere',
'action-movefile'             => 'hunc fasciculum movere',
'action-upload'               => 'hunc fasciculum imponere',
'action-upload_by_url'        => 'hunc fasciculum imponere ex inscriptione URL',
'action-delete'               => 'hanc paginam delere',
'action-deleterevision'       => 'hanc emendationem delere',
'action-browsearchive'        => 'paginas deletas quaerere',
'action-undelete'             => 'hanc paginam restituere',
'action-suppressrevision'     => 'hanc emendationem magistratus celatam inspicere vel restituere',
'action-suppressionlog'       => 'haec acta privata inspicere',
'action-block'                => 'hunc usorem obstruere ne recensere potest',
'action-protect'              => 'protectionem huius paginae mutare',
'action-import'               => 'paginam ex vico alio importare',
'action-importupload'         => 'paginam ex fasciculo imponendo importare',
'action-unwatchedpages'       => 'indicem paginarum non custoditarum inspicere',
'action-trackback'            => 'praebere retronexum',
'action-mergehistory'         => 'historiam huius paginae confundere',
'action-userrights'           => 'omnes potestates usorum recensere',
'action-userrights-interwiki' => 'potestates usorum aliis in vicis recensere',
'action-siteadmin'            => 'basem datorum obstruere vel deobstruere',

# Recent changes
'nchanges'                          => '$1 {{PLURAL:$1|mutatio|mutationes}}',
'recentchanges'                     => 'Nuper mutata',
'recentchangestext'                 => 'Inspice mutationes recentes huic vici in hac pagina.',
'rcnote'                            => "Subter {{PLURAL:$1|est '''1''' nuper mutatum|sunt '''$1''' nuperrime mutata}} in {{PLURAL:$2|die proximo|'''$2''' diebus proximis}} ex $5, $4.",
'rcnotefrom'                        => "Subter sunt '''$1''' nuperrime mutata in proxima '''$2''' die.",
'rclistfrom'                        => 'Monstrare mutata nova incipiens ab $1',
'rcshowhideminor'                   => '$1 recensiones minores',
'rcshowhidebots'                    => '$1 automata',
'rcshowhideliu'                     => '$1 usores notos',
'rcshowhideanons'                   => '$1 usores ignotos',
'rcshowhidemine'                    => '$1 conlationes meas',
'rclinks'                           => 'Monstrare $1 nuperrime mutata in $2 diebus proximis.<br />$3',
'diff'                              => 'diss',
'hist'                              => 'hist',
'hide'                              => 'celare',
'show'                              => 'monstrare',
'minoreditletter'                   => 'm',
'newpageletter'                     => 'N',
'boteditletter'                     => 'a',
'number_of_watching_users_pageview' => '[$1 {{PLURAL:$1|usor custodiens|usores custodientes}}]',
'rc_categories_any'                 => 'Ulla',
'newsectionsummary'                 => '/* $1 */ nova pars',

# Recent changes linked
'recentchangeslinked'         => 'Nuper mutata annexorum',
'recentchangeslinked-title'   => 'Nuper mutata in paginis quibus pagina "$1" nectit',
'recentchangeslinked-summary' => "Subter sunt nuperrime mutata paginis annexis. Paginae a [[Special:Watchlist|te custoditae]] '''litteris pinguis''' monstrantur.",
'recentchangeslinked-page'    => 'Titulus paginae:',

# Upload
'upload'             => 'Fasciculum imponere',
'uploadbtn'          => 'Fasciculum imponere',
'reupload'           => 'Iterum imponere',
'reuploaddesc'       => 'Siste imponere et ad imponendi formam redi',
'uploadnologin'      => 'Conventum non apertum est',
'uploadnologintext'  => 'Oportet [[Special:UserLogin|aperire conventum]] ut fasciculos imponas.',
'uploaderror'        => 'Imponendi erratum',
'uploadtext'         => "Utere formam subter ad fasciculos imponendos.
Ut fasciculos antea impositos videas aut quaeras, adi ad [[Special:FileList|indicem fasciculorum impositorum]]. Fasciculi impositi et deleti quoque in [[Special:Log/upload|notatione fasciculorum impositorum]] notantur.

Ad fasciculum in pagina includendum, utere nexu:
*'''<tt><nowiki>[[</nowiki>{{ns:file}}<nowiki>:Fasciculus.jpg]]''' aut
*'''<tt><nowiki>[[</nowiki>{{ns:file}}<nowiki>:Fasciculus.png|verba alia]]''' aut
*'''<tt><nowiki>[[</nowiki>{{ns:media}}<nowiki>:Fasciculus.ogg]]''' pro nexum ad fasciculum directum.",
'upload-permitted'   => 'Genera fasciculorum licita: $1.',
'upload-preferred'   => 'Genera fasciculorum suasa: $1.',
'upload-prohibited'  => 'Typi fasciculorum vetiti: $1.',
'uploadlog'          => 'notatio fasciculorum impositorum',
'uploadlogpage'      => 'Notatio fasciculorum impositorum',
'uploadlogpagetext'  => 'Subter est index fasciculorum recentissimorum impositorum.
Vide etiam [[Special:NewFiles|pinacothecam fasciculorum recentissimorum impositorum]].',
'filename'           => 'Nomen fasciculi',
'filedesc'           => 'Summarium',
'fileuploadsummary'  => 'Summarium:',
'filestatus'         => 'Locus verborum privatorum:',
'filesource'         => 'Fons:',
'uploadedfiles'      => 'Fasciculi impositi',
'ignorewarning'      => 'Ignorare monita et servare fasciculum',
'ignorewarnings'     => 'Ignorare monita omnia',
'minlength1'         => 'Nomina fasciculorum saltem unam litteram habere debent.',
'badfilename'        => 'Nomen fasciculi ad "$1" mutatum est.',
'filetype-missing'   => 'Fasciculus extensionem non habet (sicut e.&nbsp;g. ".jpg").',
'large-file'         => 'Suasum est ut fasciculi $1 magnitudine non excedant; magnitudo huius fasciculi est $2.',
'fileexists-thumb'   => "<center>'''Imago quae iam est'''</center>",
'successfulupload'   => 'Impositum est perfectum',
'uploadwarning'      => 'Monitus imponendi',
'savefile'           => 'Servare fasciculum',
'uploadedimage'      => 'imposuit "[[$1]]"',
'uploaddisabled'     => 'Fasciculos imponere prohibitum est',
'uploaddisabledtext' => 'Fasciculos imponere prohibitum est.',
'uploadvirus'        => 'Fasciculi huic est virus! Singula: $1',
'sourcefilename'     => 'Fasciculi imponendi nomen:',
'destfilename'       => 'Nomen fasciculi petitum:',
'upload-maxfilesize' => 'Maxima fasciculi magnitudo: $1',
'watchthisupload'    => 'Custodire hanc paginam',
'upload-wasdeleted'  => "'''Cave: fasciculum qui antea iam deletus est impones.'''

Tibi oportet meditari utrum hunc fasciculum iterum imponere tamen convenit.
Commodule notatio fasciculorum deletorum hic datur:",

'upload-proto-error' => 'Protocollum incorrectum',
'upload-file-error'  => 'Erratum internum',

'license'           => 'Typus permissionis:',
'nolicense'         => 'Nulla selecta',
'license-nopreview' => '(Praevisum monstrari non potest)',

# Special:ListFiles
'imgfile'               => 'fasciculus',
'listfiles'             => 'Fasciculorum index',
'listfiles_date'        => 'Dies',
'listfiles_name'        => 'Nomen',
'listfiles_user'        => 'Usor',
'listfiles_size'        => 'Magnitudo',
'listfiles_description' => 'Descriptio',
'listfiles_count'       => 'Emendationes',

# File description page
'filehist'                       => 'Historia fasciculi',
'filehist-help'                  => 'Ad emendationem fasciculi inspiciendum, preme in diem/tempus.',
'filehist-deleteall'             => 'delere omnes emendationes',
'filehist-deleteone'             => 'delere',
'filehist-revert'                => 'revertere',
'filehist-current'               => 'recentissima',
'filehist-datetime'              => 'Dies/Tempus',
'filehist-thumb'                 => 'Pollicisunguis',
'filehist-thumbtext'             => 'Pollicisunguis emendationis ex $1',
'filehist-nothumb'               => 'Nullus pollicisunguis',
'filehist-user'                  => 'Usor',
'filehist-dimensions'            => 'Dimensiones',
'filehist-filesize'              => 'Magnitudo fasciculi',
'filehist-comment'               => 'Sententia',
'imagelinks'                     => 'Nexus',
'linkstoimage'                   => '{{PLURAL:$1|Haec pagina ad hunc fasciculum nectit:|Paginae sequentes ad hunc fasciculum nectunt:}}',
'nolinkstoimage'                 => 'Nullae paginae ad hunc fasciculum nectunt.',
'morelinkstoimage'               => 'Videre [[Special:WhatLinksHere/$1|plures nexus]] ad hunc fasciculum.',
'redirectstofile'                => '{{PLURAL:$1|Fasciculus sequens ad hunc fasciculum redirigit:|Hae $1 fasciculi sequentes ad hunc fasciculum redirigunt:}}',
'shareduploadduplicate-linktext' => 'fasciculus alius',
'shareduploadconflict-linktext'  => 'fasciculus alius',
'noimage'                        => 'Fasciculus huius nominis non est, sed $1 potes.',
'noimage-linktext'               => 'fasciculum imponere',
'uploadnewversion-linktext'      => 'Emendationem novam huius fasciculi imponere',

# File reversion
'filerevert'                => 'Revertere $1',
'filerevert-legend'         => 'Reverti fasciculum',
'filerevert-intro'          => "Reverteris '''[[Media:$1|$1]]''' ad [emendationem $4 ex $3, $2].",
'filerevert-comment'        => 'Sententia:',
'filerevert-defaultcomment' => 'Reverti ad emendationem ex $2, $1',
'filerevert-submit'         => 'Revertere',
'filerevert-success'        => "'''[[Media:$1|$1]]''' reversum est ad [emendationem $4 ex $3, $2].",

# File deletion
'filedelete'                  => 'Delere $1',
'filedelete-legend'           => 'Fasciculum delere',
'filedelete-intro'            => "Deles '''[[Media:$1|$1]]'''.",
'filedelete-intro-old'        => "Deles fasciculi '''[[Media:$1|$1]]''' emendationem [$4 ex $3, $2].",
'filedelete-comment'          => 'Causa deletionis:',
'filedelete-submit'           => 'Delere',
'filedelete-success'          => "'''$1''' deletum est.",
'filedelete-success-old'      => "Emendatio fasciculi '''[[Media:$1|$1]]''' ex $3, $2 deletum est.",
'filedelete-nofile'           => "'''$1''' non existit.",
'filedelete-otherreason'      => 'Causa alia vel explicatio:',
'filedelete-reason-otherlist' => 'Causa alia',
'filedelete-edit-reasonlist'  => 'Causas deletionum fasciculorum recensere',

# MIME search
'mimesearch' => 'Quaerere per MIME',
'mimetype'   => 'Typus MIME:',
'download'   => 'depromere',

# Unwatched pages
'unwatchedpages' => 'Paginae incustoditae',

# List redirects
'listredirects' => 'Redirectiones',

# Unused templates
'unusedtemplates'    => 'Formulae non in usu',
'unusedtemplateswlh' => 'nexus alii',

# Random page
'randompage'         => 'Pagina fortuita',
'randompage-nopages' => 'Non est ulla pagina in spatio nominali "$1".',

# Random redirect
'randomredirect'         => 'Redirectio fortuita',
'randomredirect-nopages' => 'Non est ulla redirectio in spatio nominali "$1".',

# Statistics
'statistics'                   => 'Census',
'statistics-header-pages'      => 'Census paginarum',
'statistics-header-edits'      => 'Census recensionum',
'statistics-header-views'      => 'Census visuum',
'statistics-header-users'      => 'Census usorum',
'statistics-articles'          => 'Paginae in spatio nominali principali',
'statistics-pages'             => 'Paginae',
'statistics-pages-desc'        => 'Omnes paginae. Hic numerus includit paginas disputationum, redirectiones, etc.',
'statistics-files'             => 'Fasciculi impositi',
'statistics-edits'             => 'Recensiones paginarum factae ab initio {{grammar:genitive|{{SITENAME}}}}',
'statistics-edits-average'     => 'Recensiones per paginam',
'statistics-views-total'       => 'Visus',
'statistics-views-peredit'     => 'Visus per recensionem',
'statistics-jobqueue'          => 'Numerus [http://www.mediawiki.org/wiki/Manual:Job_queue operationum qui etiam exspectant perfacier]',
'statistics-users'             => '[[Special:ListUsers|Usores]] relati',
'statistics-users-active'      => 'Usores activi',
'statistics-users-active-desc' => 'Usores qui {{PLURAL:$1|proxima die|proximis $1 diebus}} actionem perfecerunt',
'statistics-mostpopular'       => 'Paginae plurimum visae',

'disambiguations'      => 'Paginae disambiguationis',
'disambiguationspage'  => 'Template:Discretiva',
'disambiguations-text' => "Paginae subter ad '''paginam discretivam''' nectunt.
Eae ad aptas paginas magis nectendae sunt.<br />
Pagina discretivam esse putatur si formulam adhibet ad quem [[MediaWiki:Disambiguationspage]] nectit.",

'doubleredirects'            => 'Redirectiones duplices',
'double-redirect-fixed-move' => '[[$1]] mota est et nunc redirigit ad [[$2]]',
'double-redirect-fixer'      => 'Rectificator redirectionum',

'brokenredirects'        => 'Redirectiones fractae',
'brokenredirectstext'    => 'Hae redirectiones ad paginas inexistentes nectunt.',
'brokenredirects-edit'   => '(recensere)',
'brokenredirects-delete' => '(delere)',

'withoutinterwiki'         => 'Paginae sine nexibus ad linguas alias',
'withoutinterwiki-summary' => 'Paginae sequentes non ad paginas in linguis aliis nectunt.',
'withoutinterwiki-legend'  => 'Praefixum',
'withoutinterwiki-submit'  => 'Monstrare',

'fewestrevisions' => 'Paginae minime mutatae',

# Miscellaneous special pages
'nbytes'                  => '$1 {{PLURAL:$1|octetus|octeti}}',
'ncategories'             => '$1 {{PLURAL:$1|categoria|categoriae}}',
'nlinks'                  => '$1 {{PLURAL:$1|nexus|nexus}}',
'nrevisions'              => '$1 {{PLURAL:$1|emendatio|emendationes}}',
'nviews'                  => '$1 {{PLURAL:$1|visa|visae}}',
'lonelypages'             => 'Paginae non annexae',
'uncategorizedpages'      => 'Paginae sine categoriis',
'uncategorizedcategories' => 'Categoriae sine categoriis',
'uncategorizedimages'     => 'Fasciculi sine categoriis',
'uncategorizedtemplates'  => 'Formulae sine categoriis',
'unusedcategories'        => 'Categoriae non in usu',
'unusedimages'            => 'Fasciculi non in usu',
'popularpages'            => 'Paginae saepe monstratae',
'wantedcategories'        => 'Categoriae desideratae',
'wantedpages'             => 'Paginae desideratae',
'wantedfiles'             => 'Fasciculi desiderati',
'wantedtemplates'         => 'Formulae desideratae',
'mostlinked'              => 'Paginae maxime annexae',
'mostlinkedcategories'    => 'Categoriae maxime annexae',
'mostlinkedtemplates'     => 'Formulae maxime annexae',
'mostcategories'          => 'Paginae plurimis categoriis',
'mostimages'              => 'Fasciculi maxime annexi',
'mostrevisions'           => 'Paginae plurimum mutatae',
'prefixindex'             => 'Quaerere per praefixa',
'shortpages'              => 'Paginae breves',
'longpages'               => 'Paginae longae',
'deadendpages'            => 'Paginae sine nexu',
'deadendpagestext'        => 'Paginae subter non nectunt ad alias paginas ullas in {{grammar:ablative|{{SITENAME}}}}.',
'protectedpages'          => 'Paginae protectae',
'protectedpages-indef'    => 'Solum protectiones infinitas',
'protectedpages-cascade'  => 'Solum protectiones defluentes quasi cataracta',
'protectedpagestext'      => 'Paginae sequentes protectae sunt a movendo ac recensendo',
'protectedtitles'         => 'Tituli protecti',
'protectedtitlestext'     => 'Hi tituli protecti sunt ne creentur paginae',
'listusers'               => 'Usores',
'listusers-editsonly'     => 'Monstrare solum usores qui recensuerunt',
'usereditcount'           => '$1 {{PLURAL:$1|recensio|recensiones}}',
'newpages'                => 'Paginae novae',
'newpages-username'       => 'Nomen usoris:',
'ancientpages'            => 'Paginae veterrimae',
'move'                    => 'Movere',
'movethispage'            => 'Movere hanc paginam',
'notargettitle'           => 'Nullus scopus',
'notargettext'            => 'Paginam aut usorem non notavisti.',
'pager-newer-n'           => '{{PLURAL:$1|novior 1|noviores $1}}',
'pager-older-n'           => '{{PLURAL:$1|senior 1|seniores $1}}',
'suppress'                => 'Censura',

# Book sources
'booksources'    => 'Librorum fontes',
'booksources-go' => 'Ire',

# Special:Log
'specialloguserlabel'  => 'Usor:',
'speciallogtitlelabel' => 'Titulus:',
'log'                  => 'Acta',
'all-logs-page'        => 'Acta omnia',
'alllogstext'          => 'Ostentantur omnia acta {{grammar:genitive|{{SITENAME}}}}.
Adspectum graciliorem potes facere modum indicum, nomen usoris (cave litteras maiusculas minusculasque), vel titulum paginae (cave etiam litteras maiusculas minusculasque) seligendo.',
'log-title-wildcard'   => 'Quaerere titulos qui incipiunt litteris',

# Special:AllPages
'allpages'          => 'Paginae omnes',
'alphaindexline'    => '$1 ad $2',
'nextpage'          => 'Pagina proxima ($1)',
'prevpage'          => 'Pagina superior ($1)',
'allpagesfrom'      => 'Monstrare paginas ab:',
'allpagesto'        => 'Monstrare paginas usque ad:',
'allarticles'       => 'Omnes paginae',
'allinnamespace'    => 'Omnes paginae (in spatio nominali $1)',
'allnotinnamespace' => 'Omnes paginae (quibus in spatio nominali $1 exclusis)',
'allpagesprev'      => 'Superior',
'allpagesnext'      => 'Proxima',
'allpagessubmit'    => 'Ire',
'allpagesprefix'    => 'Monstrare paginas quibus est praeverbium:',
'allpagesbadtitle'  => 'Nomen paginae datum fuit invalidum aut praverbium interlinguale vel interviciale habuit. Fortasse insunt una aut plus litterarum quae in titulis non possunt inscribier.',
'allpages-bad-ns'   => 'Non est spatium nominale "$1" apud {{grammar:accusative|{{SITENAME}}}}.',

# Special:Categories
'categories'                    => 'Categoriae',
'categoriespagetext'            => 'Categoriae subter paginas vel fasciculos continent.
[[Special:UnusedCategories|Categoriae non in usu]] non monstrantur.
Vide etiam [[Special:WantedCategories|categorias desideratas]].',
'special-categories-sort-count' => 'ordinare secundum numerum',
'special-categories-sort-abc'   => 'ordinare secundum abecedarium',

# Special:DeletedContributions
'deletedcontributions' => 'Conlationes usoris deletae',

# Special:LinkSearch
'linksearch'    => 'Quaerere nexus externos',
'linksearch-ns' => 'Spatium nominale:',
'linksearch-ok' => 'Quaerere',

# Special:ListUsers
'listusers-submit' => 'Monstrare',

# Special:Log/newusers
'newuserlogpage'              => 'Index rationum novarum creatarum',
'newuserlogpagetext'          => 'Hic est index rationum novarum creatarum.',
'newuserlog-byemail'          => 'tessera missa litteris electronicis',
'newuserlog-create-entry'     => 'Usor novus',
'newuserlog-create2-entry'    => 'creavit rationem pro $1',
'newuserlog-autocreate-entry' => 'Ratio automatice creata',

# Special:ListGroupRights
'listgrouprights'                 => 'Gregum usorum potestates',
'listgrouprights-group'           => 'Grex',
'listgrouprights-rights'          => 'Potestates',
'listgrouprights-helppage'        => 'Help:Gregum potestates',
'listgrouprights-members'         => '(index rationum)',
'listgrouprights-addgroup'        => 'Potest usores addere ad {{PLURAL:$2|gregem|greges}}: $1',
'listgrouprights-removegroup'     => 'Potest usores removere ex {{PLURAL:$2|grege|gregibus}}: $1',
'listgrouprights-addgroup-all'    => 'Potest usores addere ad omnes greges',
'listgrouprights-removegroup-all' => 'Potest usores removere ex omnibus gregibus',

# E-mail user
'emailuser'        => 'Litteras electronicas usori mittere',
'emailpage'        => 'Mittere litteras electronicas huic usori',
'emailpagetext'    => 'Forma subter nuntium ad usorem mittet.
Inscriptio electronica quam in [[Special:Preferences|praeferentiis tuis]] dedis ut "Ab" inscriptione apparebit. Hoc modo usor tibi directe respondere poterit.',
'defemailsubject'  => '{{SITENAME}} - Litterae electronicae',
'noemailtitle'     => 'Nulla inscriptio electronica',
'noemailtext'      => 'Hic usor inscriptionem electronicam ratam non dedit.',
'nowikiemailtitle' => 'Litterae electronicae non permissae',
'nowikiemailtext'  => 'Hic usor litteras electronicas ab aliis usoribus non vult.',
'email-legend'     => 'Litteras electronicas usori {{grammar:genitive|{{SITENAME}}}} mittere',
'emailfrom'        => 'Ab:',
'emailto'          => 'Ad:',
'emailsubject'     => 'Res:',
'emailmessage'     => 'Nuntium:',
'emailsend'        => 'Mittere',
'emailsent'        => 'Litterae electronicae missae sunt',
'emailsenttext'    => 'Nuntium tuum missum est.',
'emailuserfooter'  => 'Has litteras electronicas $1 ad $2 misit per "Litteras electronicas usori mittere" in {{grammar:ablative|{{SITENAME}}}}.',

# Watchlist
'watchlist'          => 'Paginae custoditae',
'mywatchlist'        => 'Paginae custoditae',
'watchlistfor'       => "(pro usore '''$1''')",
'nowatchlist'        => 'Nullas paginas custodis.',
'watchlistanontext'  => 'Necesse est $1 ad indicem paginarum custoditarum inspiciendum vel recensendum.',
'watchnologin'       => 'Conventum non est apertum',
'watchnologintext'   => '[[Special:UserLogin|Conventum aperire]] debes ut indicem paginarum custoditarum mutes.',
'addedwatch'         => 'Pagina custodita',
'addedwatchtext'     => "Pagina \"[[:\$1]]\" in [[Special:Watchlist|paginas tuas custoditas]] addita est. Mutationes posthac huic paginae et paginae disputationis ibi notabuntur, et pagina '''litteris pinguibus''' apparebit in [[Special:RecentChanges|nuper mutatorum]] indice, ut sit facilius electu.

Si paginam ex indice paginarum custoditarum removere vis, imprime \"decustodire\" ab summa pagina.",
'removedwatch'       => 'Non iam custodita',
'removedwatchtext'   => 'Pagina "[[:$1]]" ex [[Special:Watchlist|indice paginarum custoditarum]] remota est.',
'watch'              => 'Custodire',
'watchthispage'      => 'Custodire hanc paginam',
'unwatch'            => 'Decustodire',
'unwatchthispage'    => 'Abrogare custoditum',
'notanarticle'       => 'Res non est',
'notvisiblerev'      => 'Emendatio deleta est',
'watchnochange'      => 'Nullae paginarum custoditarum tuarum recensitae sunt in hoc tempore.',
'watchlist-details'  => '{{PLURAL:$1|$1 pagina|$1 paginae}} in indice paginarum custoditarum tuarum, sine paginis disputationis.',
'watchmethod-recent' => 'recensita recenta quaerens pro pagina custodita',
'watchmethod-list'   => 'paginas custoditas quaerens pro recensitis recentibus',
'watchlistcontains'  => 'Index paginarum custoditarum tuus $1 {{PLURAL:$1|paginam|paginas}} habet.',
'iteminvalidname'    => "Aerumna cum pagina '$1', nomen non est rectum...",
'wlnote'             => "Subter {{PLURAL:$1|est mutatio proxima|sunt '''$1''' mutationes proximae}} in {{PLURAL:$2|proxima hora|proximis '''$2''' horis}}.",
'wlshowlast'         => 'Monstrare proximas $1 horas $2 dies $3',

# Displayed when you click the "watch" button and it is in the process of watching
'watching'   => 'Custodiens...',
'unwatching' => 'Decustodiens...',

'enotif_impersonal_salutation' => 'Usor {{grammar:genitive|{{SITENAME}}}}',
'changed'                      => 'mutata',
'created'                      => 'creata',
'enotif_lastdiff'              => 'Vide $1 ad hanc recensionem inspiciendum.',
'enotif_anon_editor'           => 'usor ignotus $1',

# Delete
'deletepage'             => 'Delere paginam',
'confirm'                => 'Adfirmare',
'excontent'              => "contenta erant: '$1'",
'excontentauthor'        => "contenta erant: '$1' (et contributor unicus erat '[[Special:Contributions/$2|$2]]')",
'exbeforeblank'          => "contenta priusquam pagina facta vacua erant: '$1'",
'exblank'                => 'pagina erat vacua',
'delete-confirm'         => 'Delere "$1"',
'delete-legend'          => 'Delere',
'historywarning'         => 'Monitio: Pagina quam delere vis historiam habet:',
'confirmdeletetext'      => 'Paginam cum tota historia eius delebis.
Adfirma quaesumus te paginam re vera delere velle, te consequentias intellere, et actionem tuam [[{{MediaWiki:Policy-url}}|consilio]] congruere.',
'actioncomplete'         => 'Actum perfectum',
'deletedtext'            => '"<nowiki>$1</nowiki>" deletum est. Vide $2 pro indice deletionum recentum.',
'deletedarticle'         => 'delevit "[[$1]]"',
'suppressedarticle'      => 'supprimit "[[$1]]"',
'dellogpage'             => 'Index deletionum',
'dellogpagetext'         => 'Subter est index deletionum recentissimarum.',
'deletionlog'            => 'index deletionum',
'reverted'               => 'Reversum ad emendationem proximam',
'deletecomment'          => 'Causa deletionis:',
'deleteotherreason'      => 'Causa alia vel explicatio:',
'deletereasonotherlist'  => 'Causa alia',
'delete-edit-reasonlist' => 'Causas deletionum recensere',

# Rollback
'rollback'         => 'Reverti mutationes',
'rollback_short'   => 'Reverti',
'rollbacklink'     => 'reverti',
'rollbackfailed'   => 'Reversum defecit',
'cantrollback'     => 'Haec non potest reverti; conlator proximus solus auctor huius rei est.',
'alreadyrolled'    => 'Ad emendationem proximam paginae [[:$1]] ab usore [[User:$2|$2]] ([[User talk:$2|Disputatio]] | [[Special:Contributions/$2|{{int:contribslink}}]]) reverti non potest; alius paginam iam recensuit vel revertit.

Emendatio proxima ab usore [[User:$3|$3]] ([[User talk:$3|Disputatio]] | [[Special:Contributions/$3|{{int:contribslink}}]]) effecta est.',
'editcomment'      => 'Dictum recensiti erat: "<i>$1</i>".', # only shown if there is an edit comment
'revertpage'       => 'Reverti recensiones ab usore [[Special:Contributions/$2|$2]] ([[User talk:$2|Disputatio]]) ad emendationem proximam ab [[User:$1|$1]]', # Additionally available: $3: revid of the revision reverted to, $4: timestamp of the revision reverted to, $5: revid of the revision reverted from, $6: timestamp of the revision reverted from
'rollback-success' => 'Reverti recensiones ab usore $1
ad emendationem proximam ab $2.',

# Protect
'protectlogpage'            => 'Index protectionum',
'protectlogtext'            => 'Subter est index protectionum et deprotectionum paginarum. Vide [[Special:ProtectedPages|indicem paginarum nunc protectarum]].',
'protectedarticle'          => 'protegit "[[$1]]"',
'modifiedarticleprotection' => 'mutavit protectionem paginae "[[$1]]"',
'unprotectedarticle'        => 'deprotegit "[[$1]]"',
'protect-title'             => 'Mutare protectionem paginae "$1"',
'prot_1movedto2'            => 'movit [[$1]] ad [[$2]]',
'protect-legend'            => 'Protectionem adfirmare',
'protectcomment'            => 'Sententia:',
'protectexpiry'             => 'Exitus:',
'protect_expiry_invalid'    => 'Tempus post quod res exitur est invalidum.',
'protect_expiry_old'        => 'Tempus est praeteritus.',
'protect-default'           => '(semper)',
'protect-fallback'          => 'Postulat permissum "$1"',
'protect-level-sysop'       => 'Magistratus soli',
'protect-summary-cascade'   => 'defluens',
'protect-expiring'          => 'exit $3, $2 (UTC)',
'protect-expiry-indefinite' => 'infinita',
'protect-cascade'           => 'Formulas aliasque paginas hac in pagina adhibitas protegere (protectio defluens quasi cataracta)',
'protect-othertime'         => 'Exitus alius:',
'protect-othertime-op'      => 'exitus alius',
'protect-existing-expiry'   => 'Exitus: $3, $2',
'protect-otherreason'       => 'Causa alia vel explicatio:',
'protect-otherreason-op'    => 'causa alia',
'protect-edit-reasonlist'   => 'Causas protectionum recensere',
'protect-expiry-options'    => '1 horam:1 hour,1 diem:1 day,1 hebdomadem:1 week,2 hebdomades:2 weeks,1 mensem:1 month,3 menses:3 months,6 menses:6 months,1 annum:1 year,infinite:infinite', # display1:time1,display2:time2,...
'restriction-type'          => 'Permissus:',
'restriction-level'         => 'Gradus cohibitionis:',
'minimum-size'              => 'Magnitudo minima',
'maximum-size'              => 'Magnitudo maxima:',
'pagesize'                  => '(octeti)',

# Restrictions (nouns)
'restriction-edit'   => 'Recensio',
'restriction-move'   => 'Motio',
'restriction-create' => 'Creatio',
'restriction-upload' => 'Imponere',

# Restriction levels
'restriction-level-sysop'         => 'protecta',
'restriction-level-autoconfirmed' => 'semi-protecta',
'restriction-level-all'           => 'quislibet scala',

# Undelete
'undelete'                  => 'Paginas deletas inspicere',
'undeletepage'              => 'Videre et restituere paginas deletas',
'viewdeletedpage'           => 'Paginas deletas inspicere',
'undeletepagetext'          => '{{PLURAL:$1|Pagina sequens deleta est sed tabulis manens restitui potest.|Paginae $1 sequentes deletae sunt sed tabulis manentes restitui possunt.}}
Tabulae nonnumquam deletae sunt.',
'undelete-fieldset-title'   => 'Emendationes restituere',
'undeleterevisions'         => '$1 {{PLURAL:$1|emendatio servata|emendationes servatae}}',
'undeletehistory'           => 'Si paginam restituis, omnes emendationes restituentur ad historiam.
Si pagina nova cum ipso nomine post deletionem creata est, emendationes restitutae in historia priori apparebunt.',
'undelete-revision'         => 'Emendatio deleta paginae $1 (ex $5, $4) ab usore $3:',
'undeletebtn'               => 'Restituere',
'undeletelink'              => 'restituere',
'undeletereset'             => 'Reperscriptare',
'undeleteinvert'            => 'Selectionem invertere',
'undeletecomment'           => 'Sententia:',
'undeletedarticle'          => 'restituit "[[$1]]"',
'undeletedrevisions'        => '{{PLURAL:$1|1 emendatio recuperata|$1 emendationes recuperatae}}',
'undeletedrevisions-files'  => '{{PLURAL:$1|1 emendatio recuperata|$1 emendationes recuperatae}} et {{PLURAL:1 fasciculus recuperatus|$2 fasciculi recuperati}}',
'undeletedfiles'            => '{{PLURAL:$1|1 fasciculus recuperatus|$1 fasciculi recuperati}}',
'cannotundelete'            => 'Abrogatio deletionis fefellit; fortasse aliquis iam paginam restituit.',
'undelete-header'           => 'Pro paginis nuper deletis, vide [[Special:Log/delete|indicem deletionum]].',
'undelete-search-box'       => 'Quaerere inter paginas iam deletas',
'undelete-search-prefix'    => 'Monstrare paginas quibus est praeverbium:',
'undelete-search-submit'    => 'Quaerere',
'undelete-no-results'       => 'Nullae paginae inventae sunt ex his indicibus deletionum.',
'undelete-show-file-submit' => 'Sic',

# Namespace form on various pages
'namespace'      => 'Spatium nominale:',
'invert'         => 'Selectionem invertere',
'blanknamespace' => '(principale)',

# Contributions
'contributions'       => 'Conlationes usoris',
'contributions-title' => 'Conlationes usoris $1',
'mycontris'           => 'Conlationes meae',
'contribsub2'         => 'Pro $1 ($2)',
'nocontribs'          => 'Nullae mutationes inventae sunt ex his indiciis.',
'uctop'               => ' (vertex)',
'month'               => 'Ab mense (et prior):',
'year'                => 'Ab anno (et prior):',

'sp-contributions-newbies'       => 'Monstrare solum conlationes rationum novarum',
'sp-contributions-newbies-sub'   => 'Conlationes rationum novarum',
'sp-contributions-newbies-title' => 'Conlationes rationum novarum',
'sp-contributions-blocklog'      => 'Acta obstructionum',
'sp-contributions-search'        => 'Conlationes usoris quaerere',
'sp-contributions-username'      => 'Locus IP aut nomen usoris:',
'sp-contributions-submit'        => 'Quaerere',

# What links here
'whatlinkshere'            => 'Nexus ad paginam',
'whatlinkshere-title'      => 'Paginae quae ad "$1" nectunt',
'whatlinkshere-page'       => 'Pagina:',
'linkshere'                => "Paginae sequentes ad '''[[:$1]]''' nectunt:",
'nolinkshere'              => "Nullae paginae ad '''[[:$1]]''' nectunt.",
'nolinkshere-ns'           => "Nullae paginae spatii nominalis selecti ad '''[[:$1]]''' nectunt.",
'isredirect'               => 'pagina redirectionis',
'istemplate'               => 'inclusio',
'isimage'                  => 'nexus fasciculi',
'whatlinkshere-prev'       => '{{PLURAL:$1|superior|$1 superiores}}',
'whatlinkshere-next'       => '{{PLURAL:$1|proxima|proxima $1}}',
'whatlinkshere-links'      => '← nexus',
'whatlinkshere-hideredirs' => '$1 redirectiones',
'whatlinkshere-hidetrans'  => '$1 inclusiones alia in pagina',
'whatlinkshere-hidelinks'  => '$1 nexus',
'whatlinkshere-hideimages' => '$1 nexus fasciculi',
'whatlinkshere-filters'    => 'Filtra',

# Block/unblock
'blockip'                      => 'Usorem obstruere',
'blockip-legend'               => 'Usorem vel locum IP obstruere',
'blockiptext'                  => 'Forma infera utere ut quendam usorem vel locum IP obstruas ne plus scribere potest. Hoc non nisi secundum [[{{MediaWiki:Policy-url}}|consilium]] fieri potest. Rationem certam subscribe (exempli gratia titulos paginarum quas iste usor modo vandalorum recensuit).',
'ipaddress'                    => 'Locus IP:',
'ipadressorusername'           => 'Locus IP aut nomen usoris:',
'ipbexpiry'                    => 'Exitus:',
'ipbreason'                    => 'Causa:',
'ipbreasonotherlist'           => 'Causa alia',
'ipbcreateaccount'             => 'Creationem rationum obstruere',
'ipbemailban'                  => 'Litteras electronicas vetare',
'ipbsubmit'                    => 'Obstruere hunc locum',
'ipbother'                     => 'Exitus alius:',
'ipboptions'                   => '2 horas:2 hours,1 diem:1 day,3 dies:3 days,1 hebdomadem:1 week,2 hebdomades:2 weeks,1 mensem:1 month,3 menses:3 months,6 menses:6 months,1 annum:1 year,infinite:infinite', # display1:time1,display2:time2,...
'ipbotheroption'               => 'alius',
'ipbotherreason'               => 'Causa alia vel explicatio:',
'ipbwatchuser'                 => 'Paginam usoris disputationisque huius usoris custodire',
'ipballowusertalk'             => 'Sinere hunc usorem, quamquam obstructus est, suam disputationis paginam recensere',
'ipb-change-block'             => 'Obstructionem usoris modificare',
'badipaddress'                 => 'Locus IP male formatus',
'blockipsuccesssub'            => 'Locus prospere obstructus est',
'blockipsuccesstext'           => '[[Special:Contributions/$1|$1]] obstructus est.
<br />Vide [[Special:IPBlockList|indicem usorum obstructorum]] ut obstructos revideas.',
'ipb-edit-dropdown'            => 'Causas obstructionum recensere',
'ipb-unblock-addr'             => 'Deobstruere $1',
'ipb-unblock'                  => 'Deobstruere nomen usoris vel locum IP',
'ipb-blocklist-contribs'       => 'Conlationes usoris $1',
'unblockip'                    => 'Deobstruere locum IP',
'unblockiptext'                => 'Formam inferam usere ut locum IP deobstruere.',
'ipusubmit'                    => 'Deobstruere hanc locum',
'unblocked'                    => '[[User:$1|$1]] deobstructus est',
'unblocked-id'                 => 'Obstructio numeri $1 abrogata est',
'ipblocklist'                  => 'Usores locique IP obstructi',
'ipblocklist-legend'           => 'Usorem obstructum quaerere',
'ipblocklist-username'         => 'Nomen usoris vel locus IP:',
'ipblocklist-sh-userblocks'    => '$1 obstructiones rationum',
'ipblocklist-sh-tempblocks'    => '$1 obstructiones temporarias',
'ipblocklist-sh-addressblocks' => '$1 obstructiones locorum IP singulorum',
'ipblocklist-submit'           => 'Quaerere',
'blocklistline'                => '$1, $2 obstruxit $3 (exire $4)',
'infiniteblock'                => 'infinita',
'expiringblock'                => 'exit $1',
'anononlyblock'                => 'solum usores ignoti',
'createaccountblock'           => 'Creatio rationum obstructa',
'emailblock'                   => 'Litterae electronicae obstructae',
'blocklist-nousertalk'         => 'non potest paginam disputationis suam recensere',
'blocklink'                    => 'obstruere',
'unblocklink'                  => 'deobstruere',
'change-blocklink'             => 'protectionem mutare',
'contribslink'                 => 'conlationes',
'autoblocker'                  => 'Obstructus es automatice quia "[[User:$1|$1]]" nuper tuum locum IP adhibuit. Ratio data ob obstructionem usoris $1 est: "$2"',
'blocklogpage'                 => 'Index obstructionum',
'blocklog-fulllog'             => 'Index plenissimus obstructionum',
'blocklogentry'                => 'obstruxit [[$1]], exire $2 $3',
'reblock-logentry'             => 'modificavit obstructionem usoris [[$1]], exire $2 $3',
'blocklogtext'                 => 'Hic est index actorum obstructionis deobstructionisque. Loci IP qui automatice obstructi sunt non enumerantur. Vide [[Special:IPBlockList|indicem usorum locorumque IP obstructorum]] pro indice toto.',
'unblocklogentry'              => 'deobstruxit $1',
'block-log-flags-nocreate'     => 'creatio rationum obstructa',
'block-log-flags-noemail'      => 'Litterae electronicae obstructae',
'block-log-flags-nousertalk'   => 'non potest paginam disputationis suam recensere',
'ipb_expiry_invalid'           => 'Tempus exeundo invalidum fuit.',
'ipb_already_blocked'          => '"$1" iam obstructus est',
'ipb-needreblock'              => '== Iam obstructus ==
$1 iam obstructus est. Visne obstructionem modificare?',
'ip_range_invalid'             => 'Latitudo IP irrita.',
'blockme'                      => 'Usor obstructus',
'proxyblocker'                 => 'Instrumentum obstructionis moderatorum',
'proxyblocksuccess'            => 'Factum.',
'cant-block-while-blocked'     => 'Dum obstructus es, non potes usores alios obstruere.',

# Developer tools
'lockdb'              => 'Basem datorum obstruere',
'unlockdb'            => 'Basem datorum deobstruere',
'lockdbtext'          => 'Obstructio basis datorum potestatem omnium usorum suspendebit paginas recensendi et praeferentiarum earum et indicem paginarum custoditarum mutandi.
Adfirma te basem datorum obstruere velle, et te dein basem datorum deobstruendum.',
'lockconfirm'         => 'Ita, vere basem datorum obstruere volo.',
'unlockconfirm'       => 'Ita, vere basem datorum deobstruere volo.',
'lockbtn'             => 'Basem datorum obstruere',
'unlockbtn'           => 'Basem datorum deobstruere',
'locknoconfirm'       => 'Capsam non notavis.',
'lockdbsuccesssub'    => 'Basis datorum prospere obstructa est',
'unlockdbsuccesssub'  => 'Basis datorum prospere deobstructa est',
'lockdbsuccesstext'   => 'Basis datorum obstructa est.
<br />Memento eam dein [[Special:UnlockDB|deobstruere]].',
'unlockdbsuccesstext' => 'Basis datorum deobstructa est.',
'databasenotlocked'   => 'Basis datorum non obstructa est.',

# Move page
'move-page'                 => 'Movere $1',
'move-page-legend'          => 'Paginam movere',
'movepagetext'              => "Formam inferam utere ad paginam renominandum et ad historiam eius ad nomen novum movendum.
Titulus vetus paginam redirectionis ad titulum novum fiet.
Nexus ad paginam veterem non mutabuntur;
redirectiones duplices aut fractas quaerere et figere debebis.

redirectiones [[Special:DoubleRedirects|duplices]] vel [[Special:BrokenRedirects|fractas]].

Pagina '''non''' movebitur si pagina sub titulo novo iam est, nisi est vacua aut pagina redirectionis et nullam historiam habet.

'''MONITUM!'''
Haec mutatio vehemens et improvisa potest esse pro pagina populare;
adfirma te consequentias intellegere antequam procedis.",
'movepagetalktext'          => "Pagina disputationis huius paginae, si est, etiam necessario motabitur '''nisi''':

*Disputatio sub paginae novae nomine contenta habet, aut
*Capsam subter non nota.

Ergo manu necesse disputationes motare vel contribuere erit, si vis.",
'movearticle'               => 'Paginam movere:',
'movenologin'               => 'Conventum non apertum',
'movenologintext'           => 'Rationem usoris habere et [[Special:UserLogin|conventum aperire]] debes ad movendum paginam.',
'movenotallowed'            => 'Tibi non licet paginas movere.',
'movenotallowedfile'        => 'Tibi non licet fasciculos movere.',
'cant-move-user-page'       => 'Tibi non licet paginas usorum movere (solum eorum subpaginas).',
'cant-move-to-user-page'    => 'Tibi non licet paginam ad paginam usoris movere (solum ad paginae usoris subpaginam).',
'newtitle'                  => 'Ad titulum novum:',
'move-watch'                => 'Hanc paginam custodire',
'movepagebtn'               => 'Paginam movere',
'pagemovedsub'              => 'Pagina mota est',
'movepage-moved'            => '<big>\'\'\'"$1" mota est ad "$2"\'\'\'</big>', # The two titles are passed in plain text as $3 and $4 to allow additional goodies in the message.
'movepage-moved-redirect'   => 'Redirectio creata est.',
'movepage-moved-noredirect' => 'Redirectio non creata est.',
'articleexists'             => 'Pagina huius tituli iam est, aut invalidum est nomen electum.
Quaesumus, titulum alterum elige.',
'cantmove-titleprotected'   => 'Tibi non licet paginam ad hunc titulum movere, quia hic titulus protectus est ne creetur',
'talkexists'                => "'''Pagina prospere mota est, sed pagina disputationis not moveri potuit quia iam est pagina disputationis sub titulo novo. Disputationes recensendo iunge.'''",
'movedto'                   => 'mota ad',
'movetalk'                  => 'Movere etiam paginam disputationis',
'move-subpages'             => 'Movere etiam omnes subpaginas, si sunt',
'move-talk-subpages'        => 'Movere etiam omnes subpaginas paginae disputationis, si sunt',
'movepage-page-moved'       => 'Pagina $1 mota est ad $2.',
'movepage-page-unmoved'     => 'Pagina $1 ad $2 moveri non potuit.',
'1movedto2'                 => 'movit [[$1]] ad [[$2]]',
'1movedto2_redir'           => 'movit [[$1]] ad [[$2]] praeter redirectionem',
'move-redirect-suppressed'  => 'sine redirectione',
'movelogpage'               => 'Acta motionum',
'movereason'                => 'Causa:',
'revertmove'                => 'reverti',
'delete_and_move'           => 'Delere et movere',
'delete_and_move_text'      => '==Deletio necesse est==
Paginae nomen petitum "[[:$1]]" iam existit. Vin tu eam delere ut pagina illic moveatur?',
'delete_and_move_confirm'   => 'Ita, paginam delere',
'delete_and_move_reason'    => 'Deleta ut moveatur',
'immobile-source-namespace' => 'Paginae spatii nominalis "$1" moveri non possunt.',
'immobile-target-namespace' => 'Paginae in spatium nominale "$1" moveri non possunt.',
'immobile-source-page'      => 'Haec pagina moveri non potest.',
'immobile-target-page'      => 'Ad hunc titulum moveri non potest.',
'fix-double-redirects'      => 'Rectificare redirectiones ad titulum veterem',
'move-leave-redirect'       => 'Redirectionem creare ab titulo vetere ad titulum novum',

# Export
'export'            => 'Paginas exportare',
'export-submit'     => 'Exportare',
'export-addcattext' => 'Addere paginas ex categoria:',
'export-addcat'     => 'Addere',

# Namespace 8 related
'allmessages'               => 'Nuntia systematis',
'allmessagesname'           => 'Nomen',
'allmessagesdefault'        => 'Textus originalis',
'allmessagescurrent'        => 'Textus recens',
'allmessagestext'           => 'Hic est index omnium nuntiorum in MediaWiki.',
'allmessagesnotsupportedDB' => "Haec pagina non adhiberi potest, quia '''\$wgUseDatabaseMessages''' non iam agitur.",
'allmessagesfilter'         => 'Colum nominibus nuntiorum:',
'allmessagesmodified'       => 'Ea modificata sola monstrare',

# Thumbnails
'thumbnail-more' => 'Augere',
'filemissing'    => 'Fasciculus absens',

# Special:Import
'import'                     => 'Paginas importare',
'importinterwiki'            => 'Adportatio transvici',
'import-interwiki-source'    => 'Vici et pagina fons:',
'import-interwiki-submit'    => 'Importare',
'import-interwiki-namespace' => 'Spatium nominale destinatum:',
'import-upload-filename'     => 'Nomen fasciculi:',
'import-comment'             => 'Sententia:',
'importstart'                => 'Adportare paginas...',
'import-revision-count'      => '$1 {{PLURAL:$1|emendatio|emendationes}}',
'importbadinterwiki'         => 'Nexus intervicus malus',
'importsuccess'              => 'Adportatio finita!',
'xml-error-string'           => '$1 in linea $2 et columna $3 (octetus $4): $5',
'import-upload'              => 'XML imponere et importare',

# Import log
'importlogpage'                    => 'Acta adportationum',
'import-logentry-upload-detail'    => '$1 {{PLURAL:$1|emendatio|emendationes}}',
'import-logentry-interwiki'        => 'adportavit transvici $1',
'import-logentry-interwiki-detail' => '$1 {{PLURAL:$1|emendatio|emendationes}} ex $2',

# Tooltip help for the actions
'tooltip-pt-userpage'             => 'Pagina usoris mea',
'tooltip-pt-mytalk'               => 'Pagina disputationis mea',
'tooltip-pt-preferences'          => 'Praeferentiae meae',
'tooltip-pt-watchlist'            => 'Paginae quae custodis ut eorum mutationes facilius vides',
'tooltip-pt-mycontris'            => 'Index conlationum mearum',
'tooltip-pt-login'                => 'Te conventum aperire hortamur, non autem requisitum',
'tooltip-pt-anonlogin'            => 'Te conventum aperire hortamur, non autem requisitum',
'tooltip-pt-logout'               => 'Conventum concludere',
'tooltip-ca-talk'                 => 'Disputatio de hac pagina',
'tooltip-ca-edit'                 => 'Hanc paginam recensere potes. Quaesumus praevisum inspice antequam servas.',
'tooltip-ca-addsection'           => 'Huic disputationi adnotare.',
'tooltip-ca-viewsource'           => 'Haec pagina protecta est. Fontem inspicere potes.',
'tooltip-ca-history'              => 'Emendationes huius paginae veteres.',
'tooltip-ca-protect'              => 'Protegere hanc paginam',
'tooltip-ca-delete'               => 'Delere hanc paginam',
'tooltip-ca-undelete'             => 'Restituere emendationes huic paginae conlatas antequam haec pagina deleta esset',
'tooltip-ca-move'                 => 'Movere hanc paginam',
'tooltip-ca-watch'                => 'Addere hanc paginam tuis paginis custoditis',
'tooltip-ca-unwatch'              => 'Removere hanc paginam ex tuis paginis custoditis',
'tooltip-search'                  => 'Quaerere aliquid in {{grammar:ablative|{{SITENAME}}}}',
'tooltip-search-go'               => 'I ad paginam cum hoc titulo exacto, si est',
'tooltip-search-fulltext'         => 'Hunc textum in paginis quaerere',
'tooltip-p-logo'                  => 'Pagina prima',
'tooltip-n-mainpage'              => 'Ire ad paginam primam',
'tooltip-n-portal'                => 'De hoc incepto',
'tooltip-n-currentevents'         => 'Eventa novissima',
'tooltip-n-recentchanges'         => 'Index nuper mutatorum in hac vici',
'tooltip-n-randompage'            => 'Ire ad paginam fortuitam',
'tooltip-n-help'                  => 'Adiutatum de hoc vici',
'tooltip-t-whatlinkshere'         => 'Index paginarum quae hic nectunt',
'tooltip-t-recentchangeslinked'   => 'Nuper mutata in paginis quibus haec pagina nectit',
'tooltip-feed-rss'                => 'Fluxus RSS huius paginae',
'tooltip-feed-atom'               => 'Atom feed',
'tooltip-t-contributions'         => 'Videre conlationes huius usoris',
'tooltip-t-emailuser'             => 'Mittere litteras electronicas huic usori',
'tooltip-t-upload'                => 'Fasciculos imponere',
'tooltip-t-specialpages'          => 'Index paginarum specialium',
'tooltip-t-print'                 => 'Forma impressibilis huius paginae',
'tooltip-t-permalink'             => 'Nexus perpetuus ad hanc emendationem paginae',
'tooltip-ca-nstab-main'           => 'Videre paginam',
'tooltip-ca-nstab-user'           => 'Videre paginam usoris',
'tooltip-ca-nstab-special'        => 'Haec est pagina specialis. Pagina ipsa recenseri non potest.',
'tooltip-ca-nstab-project'        => 'Videre paginam inceptorum',
'tooltip-ca-nstab-image'          => 'Videre paginam fasciculi',
'tooltip-ca-nstab-mediawiki'      => 'Videre nuntium systematis',
'tooltip-ca-nstab-template'       => 'Videre formulam',
'tooltip-ca-nstab-help'           => 'Videre paginam adiutatam',
'tooltip-ca-nstab-category'       => 'Videre paginam categoriae',
'tooltip-minoredit'               => 'Indicare hanc recensionem minorem',
'tooltip-save'                    => 'Servare mutationes tuas',
'tooltip-preview'                 => 'Praevidere mutationes tuas, quaesumus hoc utere antequam servas!',
'tooltip-diff'                    => 'Monstrare mutationes textui tuas',
'tooltip-compareselectedversions' => 'Videre dissimilitudinem inter ambas emendationes selectas huius paginae',
'tooltip-watch'                   => 'Addere hanc paginam tuis paginis custoditis',
'tooltip-recreate'                => 'Recreare hanc paginam etiamsi deleta est',
'tooltip-upload'                  => 'Incipere imponere',

# Attribution
'anonymous'        => '{{PLURAL:$1|Usor ignotus|Usores ignoti}} {{grammar:genitive|{{SITENAME}}}}',
'siteuser'         => '{{SITENAME}} usor $1',
'lastmodifiedatby' => 'Ultima mutatio: $2, $1 ab $3.', # $1 date, $2 time, $3 user
'others'           => 'alii',
'siteusers'        => '{{PLURAL:$2|usor|usores}} {{grammar:genitive|{{SITENAME}}}} $1',

# Info page
'numedits'       => 'Numerus recensionum (pagina): $1',
'numtalkedits'   => 'Numerus recensionum (pagina disputationis): $1',
'numauthors'     => 'Numerus auctorum discretorum (pagina): $1',
'numtalkauthors' => 'Numerus auctorum discretorum (pagina disputationis): $1',

# Skin names
'skinname-standard'    => 'Norma',
'skinname-cologneblue' => 'Caerulus Colonia',

# Math options
'mw_math_png'    => 'Semper vertere PNG',
'mw_math_simple' => 'HTML si admodum simplex, alioqui PNG',
'mw_math_html'   => 'HTML si fieri potest, alioqui PNG',
'mw_math_source' => 'Stet ut TeX (pro navigatri texti)',
'mw_math_modern' => 'Commendatum pro navigatri recentes',
'mw_math_mathml' => 'MathML',

# Patrol log
'patrol-log-page'      => 'Acta emendationum circumitarum',
'patrol-log-auto'      => '(automatica)',
'log-show-hide-patrol' => '$1 acta emendationum circumitarum',

# Image deletion
'deletedrevision' => 'Delevit emendationem $1 veterem',

# Browsing diffs
'previousdiff' => '← Dissimilitudo senior',
'nextdiff'     => 'Dissimilitudo novior →',

# Visual comparison
'visual-comparison' => 'Comparatio visualis',

# Media information
'imagemaxsize'    => 'Terminare imagines in paginis imaginum ad:',
'thumbsize'       => 'Magnitudo pollicisunguis:',
'widthheightpage' => '$1×$2, $3 {{PLURAL:$3|pagina|paginae}}',
'file-info'       => '(magnitudo fasciculi: $1, typus MIME: $2)',
'file-info-size'  => '($1 × $2 elementa imaginalia, magnitudo fasciculi: $3, typus MIME: $4)',
'file-nohires'    => '<small>Nulla maior resolutio exstat.</small>',
'svg-long-desc'   => '(fasciculus SVG, nominale $1 × $2 elementa imaginalia, magnitudo fasciculi: $3)',
'show-big-image'  => 'Resolutio completa',

# Special:NewFiles
'newimages'        => 'Fasciculi novi',
'imagelisttext'    => "Subter est index {{PLURAL:$1|'''unius''' fasciculi|'''$1''' fasciculorum}} digestus $2.",
'newimages-legend' => 'Filtrum',
'newimages-label'  => 'Nomen fasciculi (vel pars eius):',
'showhidebots'     => '($1 automata)',
'noimages'         => 'Nullum videndum.',
'ilsubmit'         => 'Quaerere',
'bydate'           => 'ex die',

# Metadata
'metadata'          => 'Metadata',
'metadata-expand'   => 'Plura ostende',
'metadata-collapse' => 'Partim celare',

# EXIF tags
'exif-imagewidth'                => 'Amplitudo',
'exif-imagelength'               => 'Altitudo',
'exif-bitspersample'             => 'Biti per componentem',
'exif-photometricinterpretation' => 'Compositio elementorum imaginalium',
'exif-orientation'               => 'Orientatio',
'exif-samplesperpixel'           => 'Numerus componentum',
'exif-xresolution'               => 'Resolutio horizontalis',
'exif-yresolution'               => 'Resolutio verticalis',
'exif-transferfunction'          => 'Functio transferentiae',
'exif-whitepoint'                => 'Chromaticitas puncti albi',
'exif-primarychromaticities'     => 'Chromaticitates primariae',
'exif-imagedescription'          => 'Descriptio imaginis',
'exif-model'                     => 'Typus photomachinae',
'exif-artist'                    => 'Auctor',
'exif-exifversion'               => 'Emendatio Exif',
'exif-colorspace'                => 'Spatium colorimetricum',
'exif-pixelydimension'           => 'Bona amplitudo imaginis',
'exif-pixelxdimension'           => 'Bona altitudo imaginis',
'exif-usercomment'               => 'Adnota usoris',
'exif-exposuretime'              => 'Tempus expositionis',
'exif-exposuretime-format'       => '$1 sec ($2)',
'exif-fnumber'                   => 'Numerus F',
'exif-exposureprogram'           => 'Programma expositionis',
'exif-shutterspeedvalue'         => 'Celeritas foriculae',
'exif-aperturevalue'             => 'Apertura',
'exif-meteringmode'              => 'Modus mensurae',
'exif-lightsource'               => 'Fons lucis',
'exif-flash'                     => 'Organum fulminescens',
'exif-subjectarea'               => 'Area subiecti',
'exif-flashenergy'               => 'Energia organi fulminescentis',
'exif-focalplanexresolution'     => 'Resolutio horizontalis plani focalis',
'exif-focalplaneyresolution'     => 'Resolutio verticalis plani focalis',
'exif-exposureindex'             => 'Index expositionis',
'exif-sensingmethod'             => 'Methodus sensationis',
'exif-filesource'                => 'Fons fasciculi',
'exif-scenetype'                 => 'Typus scaenae',
'exif-cfapattern'                => 'exemplum CFA',
'exif-exposuremode'              => 'Modus expositionis',
'exif-contrast'                  => 'Contentio',
'exif-saturation'                => 'Saturatio',
'exif-gpslatitude'               => 'Latitudo',
'exif-gpslongitude'              => 'Longitudo',
'exif-gpsaltitude'               => 'Altitudo',
'exif-gpstimestamp'              => 'Tempus GPS (horologium atomicum)',
'exif-gpsstatus'                 => 'Status receptoris',
'exif-gpsmeasuremode'            => 'Modus mensurae',
'exif-gpsspeedref'               => 'Unitum celeritatis',
'exif-gpsspeed'                  => 'Celeritas receptoris GPS',
'exif-gpstrack'                  => 'Directio motus',
'exif-gpsimgdirection'           => 'Directio imaginis',
'exif-gpsmapdatum'               => 'Data percensionis geodaeticae adhibita',
'exif-gpsdestlatitude'           => 'Latitudo destinationis',
'exif-gpsdestlongitude'          => 'Longitudo destinationis',
'exif-gpsdatestamp'              => 'Dies GPS',
'exif-gpsdifferential'           => 'Correctio differentialis GPS',

# EXIF attributes
'exif-compression-1' => 'Incompressus',

'exif-unknowndate' => 'Dies ignota',

'exif-orientation-1' => 'Normalis', # 0th row: top; 0th column: left
'exif-orientation-3' => 'Converta 180°', # 0th row: bottom; 0th column: right

'exif-planarconfiguration-1' => 'formatio dilatata',
'exif-planarconfiguration-2' => 'formatio planaris',

'exif-componentsconfiguration-0' => 'non existit',

'exif-exposureprogram-0' => 'Infinita',

'exif-subjectdistance-value' => '$1 metra',

'exif-meteringmode-0'   => 'Ignotus',
'exif-meteringmode-1'   => 'Media',
'exif-meteringmode-2'   => 'Centrogravata mediocre',
'exif-meteringmode-3'   => 'Unipunctualis',
'exif-meteringmode-4'   => 'Multipunctualis',
'exif-meteringmode-6'   => 'Partialis',
'exif-meteringmode-255' => 'Alia',

'exif-lightsource-0'   => 'Ignota',
'exif-lightsource-1'   => 'Lumen diei',
'exif-lightsource-2'   => 'Fluorescens',
'exif-lightsource-4'   => 'Organum fulminescens',
'exif-lightsource-11'  => 'Umbra',
'exif-lightsource-24'  => 'Wolframium studiorii normalizatum per ISO',
'exif-lightsource-255' => 'Alius fons luminis',

# Flash modes
'exif-flash-fired-0'    => 'Organum fulminescens non accendit',
'exif-flash-fired-1'    => 'Organum fulminescens accendit',
'exif-flash-return-0'   => 'nullum stroboscopium functionem detectionis reddat',
'exif-flash-return-2'   => 'stroboscopium lumen detectum non reddat',
'exif-flash-return-3'   => 'stroboscopium lumen detectum reddat',
'exif-flash-mode-1'     => 'lumen organi fulminescentis necessarium',
'exif-flash-mode-2'     => 'suppressio organi fulminescentis necessaria',
'exif-flash-mode-3'     => 'Modus automaticus',
'exif-flash-function-1' => 'Nulla functio fulminescens',

'exif-focalplaneresolutionunit-2' => 'unciae',

'exif-sensingmethod-1' => 'Infinitus',

'exif-exposuremode-0' => 'Expositio automatica',

'exif-gaincontrol-0' => 'Nullum',
'exif-gaincontrol-1' => 'Augmentum demisse positivum',
'exif-gaincontrol-2' => 'Augmentum alte positivum',
'exif-gaincontrol-3' => 'Augmentum demisse negativum',
'exif-gaincontrol-4' => 'Augmentum alte negativum',

'exif-contrast-0' => 'Normalis',

'exif-saturation-0' => 'Normalis',
'exif-saturation-1' => 'Saturatio demissa',
'exif-saturation-2' => 'Saturatio alta',

'exif-sharpness-0' => 'Normalis',

'exif-subjectdistancerange-0' => 'Ignota',
'exif-subjectdistancerange-1' => 'Macro',

'exif-gpsstatus-a' => 'Mensura in progressu',
'exif-gpsstatus-v' => 'Interoperabilitas mensurae',

'exif-gpsmeasuremode-2' => 'Mensura 2-dimensionalis',
'exif-gpsmeasuremode-3' => 'Mensura 3-dimensionalis',

# Pseudotags used for GPSSpeedRef and GPSDestDistanceRef
'exif-gpsspeed-k' => 'Chiliometra per horam',
'exif-gpsspeed-m' => 'Milia per horam',
'exif-gpsspeed-n' => 'Nodi',

# Pseudotags used for GPSTrackRef, GPSImgDirectionRef and GPSDestBearingRef
'exif-gpsdirection-t' => 'Directio vera',
'exif-gpsdirection-m' => 'Directio magnetica',

# 'all' in various places, this might be different for inflected languages
'recentchangesall' => 'omnes',
'imagelistall'     => 'omnes',
'watchlistall2'    => 'omnes',
'namespacesall'    => 'omnia',
'monthsall'        => 'omnes',

# E-mail address confirmation
'confirmemail'             => 'Inscriptionem electronicam adfirmare',
'confirmemail_noemail'     => 'Non est tibi inscriptio electronica valida in [[Special:Preferences|tuis praeferentiis]] posita.',
'confirmemail_text'        => '{{SITENAME}} te postulat inscriptionem tuam electronicam adfirmare priusquam proprietatibus litterarum electronicarum fruaris. Imprime botonem subter ut nuntium adfirmationis tibi mittatur. Nuntio nexus inerit quod est scribendus in tuo navigatro interretiali ut validum adfirmes tuam inscriptionem electronicam.',
'confirmemail_send'        => 'Mittere codicem adfirmationis',
'confirmemail_sent'        => 'Missae sunt litterae electronicae adfirmationis.',
'confirmemail_sendfailed'  => 'Litteras electronicas adfirmationis non potuimus mittere.
Inspice inscriptionem tuam electronicam ut litteras prohibitas invenias.

Nuntius reddidit: $1',
'confirmemail_invalid'     => 'Codex adfirmationis invalidus. Fortasse id exitum est.',
'confirmemail_needlogin'   => 'Necesse est tibi $1 ut inscriptionem tuam electronicam adfirmes.',
'confirmemail_success'     => 'Tua inscriptio electronica adfirmata est.
Libenter [[Special:UserLogin|conventum aperias]] utarisque {{grammar:ablative|{{SITENAME}}}}.',
'confirmemail_loggedin'    => 'Inscriptio tua electronica iam adfirmata est.',
'confirmemail_error'       => 'Aliquid erravit quando adfirmationem tuam servabamus.',
'confirmemail_subject'     => '{{SITENAME}} - Adfirmatio inscriptionis electronicae',
'confirmemail_body'        => 'Aliquis (probabiliter tu, ex loco IP $1)
rationem "$2" creavit sub hac inscriptione electronica apud {{grammar:accusative|{{SITENAME}}}}.

Ut adfirmas te esse ipsum et proprietates inscriptionum electronicarum licere fieri apud {{grammar:accusative|{{SITENAME}}}}, hunc nexum aperi in tuo navigatro interretiali:

$3

Si *non* tu hoc fecisti, hunc nexum sequere
ad adfirmationem inscriptionis electronicae abrogandum:

$5

Hic codex adfirmationis exibit $4.',
'confirmemail_invalidated' => 'Adfirmatio inscriptionis electronicae abrogata est',
'invalidateemail'          => 'Adfimationem inscriptionis electronicae abrogare',

# Trackbacks
'trackbackremove' => ' ([$1 Delere])',
'trackbacklink'   => 'Retronexus',

# Delete conflict
'deletedwhileediting' => "'''Monitio:''' Haec pagina deleta est postquam inceperis eam recensere!",
'confirmrecreate'     => "Usor [[User:$1|$1]] ([[User talk:$1|disputatio]]) delevit hanc paginam postquam eam emendare inceperis cum ratione:
: ''$2''
Quaesumus, adfirma ut iterum hanc paginam crees.",
'recreate'            => 'Recreare',

# action=purge
'confirm_purge_button' => 'Licet',

# Multipage image navigation
'imgmultipageprev' => '← pagina superior',
'imgmultipagenext' => 'pagina proxima →',
'imgmultigo'       => 'I!',
'imgmultigoto'     => 'Ire ad paginam $1',

# Table pager
'ascending_abbrev'         => 'asc',
'descending_abbrev'        => 'desc',
'table_pager_next'         => 'Pagina proxima',
'table_pager_prev'         => 'Pagina superior',
'table_pager_first'        => 'Prima pagina',
'table_pager_last'         => 'Ultima pagina',
'table_pager_limit_submit' => 'Ire',
'table_pager_empty'        => 'Nullum eventum',

# Auto-summaries
'autosumm-blank'   => 'paginam vacuavit',
'autosumm-replace' => "multa contenta ex pagina removit, contenta nova: '$1'",
'autoredircomment' => 'Redirigens ad [[$1]]',
'autosumm-new'     => 'Nova pagina: $1',

# Size units
'size-bytes'     => '$1 octeti',
'size-kilobytes' => '$1 chiliocteti',
'size-megabytes' => '$1 megaocteti',
'size-gigabytes' => '$1 gigaocteti',

# Live preview
'livepreview-loading' => 'Depromens…',
'livepreview-ready'   => 'Depromens… Praesto!',

# Watchlist editor
'watchlistedit-numitems'      => 'Indice paginarum custoditarum tuo {{PLURAL:$1|est unus titulus|sunt $1 tituli}}, sine paginis disputationis.',
'watchlistedit-noitems'       => 'Indice paginarum custoditarum tuo non sunt ulli tituli.',
'watchlistedit-normal-title'  => 'Indicem paginarum custoditarum recensere',
'watchlistedit-normal-submit' => 'Removere titulos',
'watchlistedit-raw-title'     => 'Indicem paginarum custoditarum quasi textum recensere',
'watchlistedit-raw-legend'    => 'Indicem paginarum custoditarum quasi textum recensere',
'watchlistedit-raw-titles'    => 'Tituli:',

# Watchlist editing tools
'watchlisttools-view' => 'Mutationes paginarum custoditarum monstrare',
'watchlisttools-edit' => 'Indicem paginarum custoditarum inspicere vel recensere',
'watchlisttools-raw'  => 'Indicem paginarum custoditarum quasi textum recensere',

# Special:Version
'version'                       => 'Versio', # Not used as normal message but as header for the special page itself
'version-specialpages'          => 'Paginae speciales',
'version-parserhooks'           => 'Extensiones programmatis analysis lexicalis',
'version-variables'             => 'Variabilia',
'version-other'                 => 'Alia',
'version-hooks'                 => 'Extensiones',
'version-extension-functions'   => 'Functiones extensionum',
'version-parser-function-hooks' => 'Extensiones functionum programmatis analysis lexicalis',
'version-hook-name'             => 'Nomen extensionis',
'version-version'               => 'Versio',
'version-license'               => 'Permissio',
'version-software-product'      => 'Productum',
'version-software-version'      => 'Versio',

# Special:FilePath
'filepath'        => 'Fasciculorum inscriptio',
'filepath-page'   => 'Fasciculus:',
'filepath-submit' => 'Via',

# Special:FileDuplicateSearch
'fileduplicatesearch-filename' => 'Fasciculi nomen:',
'fileduplicatesearch-submit'   => 'Quaerere',
'fileduplicatesearch-info'     => '$1 × $2 elementa imaginalia<br />Magnitudo fasciculi: $3<br />Typus MIME: $4',

# Special:SpecialPages
'specialpages'                 => 'Paginae speciales',
'specialpages-group-other'     => 'Aliae paginae speciales',
'specialpages-group-login'     => 'Conventum aperire / conventum creare',
'specialpages-group-users'     => 'Usores eorumque potestates',
'specialpages-group-pages'     => 'Index paginarum',
'specialpages-group-pagetools' => 'Instrumenta paginarum',
'specialpages-group-wiki'      => 'Vici-data et instrumenta',
'specialpages-group-redirects' => 'Paginae speciales redirigentes',
'specialpages-group-spam'      => 'Instrumenta contra praeconia incommoda',

# Special:BlankPage
'blankpage' => 'Pagina vacua',

);
