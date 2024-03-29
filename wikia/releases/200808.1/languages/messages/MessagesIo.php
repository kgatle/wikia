<?php
/** Ido (Ido)
 *
 * @addtogroup Language
 *
 * @author Albonio
 * @author Artomo
 * @author SPQRobin
 * @author Malafaya
 * @author Lakaoso
 * @author לערי ריינהארט
 * @author Siebrand
 * @author Jon Harald Søby
 */

$namespaceNames = array(
	NS_MEDIA          => 'Media',
	NS_SPECIAL        => 'Specala',
	NS_MAIN           => '',
	NS_TALK           => 'Debato',
	NS_USER           => 'Uzanto',
	NS_USER_TALK      => 'Uzanto_Debato',
	# NS_PROJECT set by \$wgMetaNamespace
	NS_PROJECT_TALK   => '$1_Debato',
	NS_IMAGE          => 'Imajo',
	NS_IMAGE_TALK     => 'Imajo_Debato',
	NS_MEDIAWIKI      => 'MediaWiki',
	NS_MEDIAWIKI_TALK => 'MediaWiki_Debato',
	NS_TEMPLATE       => 'Shablono',
	NS_TEMPLATE_TALK  => 'Shablono_Debato',
	NS_HELP           => 'Helpo',
	NS_HELP_TALK      => 'Helpo_Debato',
	NS_CATEGORY       => 'Kategorio',
	NS_CATEGORY_TALK  => 'Kategorio_Debato',
);

$messages = array(
# User preference toggles
'tog-underline'            => 'Sub-strekizez ligili:',
'tog-justify'              => 'Adjustigez paragrafi',
'tog-hideminor'            => 'Celez mikra redaktaji de recenta chanji',
'tog-showtoolbar'          => 'Montrez redaktilo (bezonas JavaScript)',
'tog-editondblclick'       => 'Redaktez pagini kande on klikus dufoye (bezonas JavaScript)',
'tog-rememberpassword'     => 'Memorez mea pas-vorto en ica komputoro',
'tog-editwidth'            => 'Redakto-spaco havas ampla larjeso',
'tog-enotifwatchlistpages' => 'Sendez a me mesajo kande paginon me surveyas chanjesas',
'tog-enotifusertalkpages'  => 'Sendez a me mesajo kande mea diskuto-pagino changesas',
'tog-enotifminoredits'     => 'Sendez a me mesajo mem por mikra chanji',
'tog-shownumberswatching'  => 'Montrez nombro di spektant uzeri',

'underline-always' => 'Sempre',
'underline-never'  => 'Nulatempe',

'skinpreview' => '(Pre-videz)',

# Dates
'sunday'        => 'sundio',
'monday'        => 'lundio',
'tuesday'       => 'mardio',
'wednesday'     => 'merkurdio',
'thursday'      => 'jovdio',
'friday'        => 'venerdio',
'saturday'      => 'saturdio',
'sun'           => 'sun',
'mon'           => 'lun',
'tue'           => 'mar',
'wed'           => 'mer',
'thu'           => 'jov',
'fri'           => 'ven',
'sat'           => 'sat',
'january'       => 'januaro',
'february'      => 'februaro',
'march'         => 'marto',
'april'         => 'aprilo',
'may_long'      => 'mayo',
'june'          => 'junio',
'july'          => 'julio',
'august'        => 'agosto',
'september'     => 'septembro',
'october'       => 'oktobro',
'november'      => 'novembro',
'december'      => 'decembro',
'january-gen'   => 'di januaro',
'february-gen'  => 'di februaro',
'march-gen'     => 'di marto',
'april-gen'     => 'di aprilo',
'may-gen'       => 'di mayo',
'june-gen'      => 'di junio',
'july-gen'      => 'di julio',
'august-gen'    => 'di agosto',
'september-gen' => 'di septembro',
'october-gen'   => 'di oktobro',
'november-gen'  => 'di novembro',
'december-gen'  => 'di decembro',
'jan'           => 'jan',
'feb'           => 'feb',
'mar'           => 'mar',
'apr'           => 'apr',
'may'           => 'may',
'jun'           => 'jun',
'jul'           => 'jul',
'aug'           => 'ago',
'sep'           => 'sep',
'oct'           => 'okt',
'nov'           => 'nov',
'dec'           => 'dec',

# Bits of text used by many pages
'categories'      => 'Kategorii',
'pagecategories'  => '{{PLURAL:$1|Kategorio|Kategorii}}',
'category_header' => 'Artikli en kategorio "$1"',
'subcategories'   => 'Subkategorii',
'category-empty'  => "''Nuntempe existas nula pagini en ita kategorio.''",

'mainpagetext' => "<big>'''MediaWiki instalesis sucese.'''</big>",

'about'          => 'Pri',
'article'        => 'artiklo',
'newwindow'      => '(aparos en nova panelo)',
'cancel'         => 'Anular',
'qbfind'         => 'Trovez',
'qbedit'         => 'Editar',
'qbpageoptions'  => 'Ica pagino',
'qbpageinfo'     => 'Kuntexto',
'qbmyoptions'    => 'Mea pagini',
'qbspecialpages' => 'Specala pagini',
'moredotdotdot'  => 'Plus...',
'mypage'         => 'Mea pagino',
'mytalk'         => 'Mea diskuti',
'anontalk'       => 'Diskuto relatant ad ica IP',
'navigation'     => 'Navigado',
'and'            => 'ed',

'errorpagetitle'    => 'Eroro',
'returnto'          => 'Retrovenar a la pagino di $1.',
'tagline'           => 'De {{SITENAME}}',
'help'              => 'Helpo',
'search'            => 'Serchez',
'searchbutton'      => 'Serchez',
'go'                => 'Irar',
'searcharticle'     => 'Irez',
'history'           => 'Paginala historio',
'history_short'     => 'Versionaro',
'info_short'        => 'Informajo',
'printableversion'  => 'Imprimebla versiono',
'permalink'         => 'Permananta ligilo',
'print'             => 'Imprimar',
'edit'              => 'Chanjez',
'editthispage'      => 'Redaktar ca pagino',
'delete'            => 'Efacar',
'deletethispage'    => 'Efacar ica pagino',
'undelete_short'    => 'Restaurar {{PLURAL:$1|1 redakto|$1 redakti}}',
'protect'           => 'Protektar',
'protectthispage'   => 'Protektar ica pagino',
'unprotect'         => 'Desprotektar',
'unprotectthispage' => 'Desprotektar ica pagino',
'newpage'           => 'Nova pagino',
'talkpage'          => 'Debatar pri ca pagino',
'talkpagelinktext'  => 'Diskutez',
'specialpage'       => 'Specala pagino',
'personaltools'     => 'Personala utensili',
'postcomment'       => 'komentez',
'articlepage'       => 'Regardar artiklo',
'talk'              => 'Diskuto',
'views'             => 'Nombro di vizitinti',
'toolbox'           => 'Utensili',
'userpage'          => 'Vidar pagino di uzanto',
'projectpage'       => 'Vidar projeto-pagino',
'imagepage'         => 'Vidar pagino di imajo',
'viewtalkpage'      => 'Vidar debatado',
'otherlanguages'    => 'Altra lingui',
'redirectedfrom'    => '(Ridirektita de $1)',
'lastmodifiedat'    => 'La pagino modifikesis ye $2, $1.', # $1 date, $2 time
'viewcount'         => 'Ica pagino acesita {{PLURAL:$1|1 foyo|$1 foyi}}.',
'protectedpage'     => 'Protektita pagino',
'jumpto'            => 'Irez ad:',
'jumptonavigation'  => 'pilotado',
'jumptosearch'      => 'serchez',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite'         => 'Pri {{SITENAME}}',
'aboutpage'         => 'Project:Pri',
'bugreports'        => 'Informajo pri erori',
'bugreportspage'    => 'Project:Informajo pri erori',
'copyright'         => 'La kontenajo esas disponebla sub $1.',
'currentevents'     => 'Aktualaji',
'currentevents-url' => 'Project:Aktualaji',
'disclaimers'       => 'Legala averto',
'disclaimerpage'    => 'Project:Generala des-agnosko',
'edithelp'          => 'Helpo pri redaktado',
'edithelppage'      => 'Help:Redaktado',
'helppage'          => 'Help:Helpo',
'mainpage'          => 'Frontispico',
'policy-url'        => 'Project:Sistemo di agado',
'portal'            => 'Komuneso-portalo',
'portal-url'        => 'Project:Komuneso-portalo',
'privacy'           => 'Sistemo di agado pri privateso',
'privacypage'       => 'Project:Sistemo di agado pri privateso',
'sitesupport'       => 'Donacaji',
'sitesupport-url'   => 'Project:Donacaji',

'badaccess'        => 'Eroro permisal',
'badaccess-group0' => 'Vu ne permisesas agar quale vu demandas.',
'badaccess-group1' => "L' ago quan vu demandabas es limitizita al uzeri en grupo $1.",
'badaccess-group2' => "L' ago quan vu demandabas es limitizita al uzeri en un ek la grupi $1.",
'badaccess-groups' => "L' ago quan vu demandabas es limitizita al uzeri en un ek la grupi $1.",

'retrievedfrom'           => 'Obtenita de "$1"',
'youhavenewmessages'      => 'Vu havas $1 ($2).',
'newmessageslink'         => 'nova mesaji',
'newmessagesdifflink'     => 'finala chanjo',
'youhavenewmessagesmulti' => 'Vu havas nova mesaji ye $1',
'editsection'             => 'chanjez',
'editold'                 => 'redaktar',
'editsectionhint'         => 'Chanjez segmento: $1',
'toc'                     => 'Indexo',
'showtoc'                 => 'montrar',
'hidetoc'                 => 'celar',
'thisisdeleted'           => 'Ka vidar o restaurar $1?',
'viewdeleted'             => 'Vidar $1?',
'restorelink'             => '{{PLURAL:$1|1 redakto efacita|$1 redakti efacita}}',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main'      => 'Pagino',
'nstab-user'      => 'Uzanto-pagino',
'nstab-special'   => 'Specala',
'nstab-project'   => 'Projeto pagino',
'nstab-image'     => 'Imajo',
'nstab-mediawiki' => 'Mesajo',
'nstab-template'  => 'Modelo',
'nstab-help'      => 'Helpo',
'nstab-category'  => 'Kategorio',

# Main script and global functions
'nosuchaction'      => 'Ne esas tala ago',
'nosuchspecialpage' => 'Ne existas tala specala pagino',
'nospecialpagetext' => "<big>'''Vu demandis specala pagino qua ne existas.'''</big>

A list of valid special pages can be found at [[Special:Specialpages]].<!-- please translate -->",

# General errors
'error'              => 'Eroro',
'databaseerror'      => 'Datumarala eroro',
'noconnect'          => 'Pardonez! La wiki havas ula teknikala desfacilaji ed ne povas konektar kun la datumaro. <br />
$1',
'nodb'               => 'Onu ne povas selektar datumaro $1',
'cachederror'        => "Co esas kopiuro registragita ye la ''cache'' di la solicitita pagino, ed ol povus ne esar aktuala.",
'readonly'           => 'Datumaro esas blokusita',
'enterlockreason'    => 'Explikez la motivo por la blokusado, inkluzante 
evaluo pri kande eventos la desblokuso',
'internalerror'      => 'Interna eroro',
'internalerror_info' => 'Interna eroro: $1',
'filecopyerror'      => 'Onu ne povis kopiar la arkivo "$1" a "$2".',
'filerenameerror'    => 'Onu ne povas rinomizar la arkivo "$1" ad "$2".',
'filedeleteerror'    => 'Onu ne povis efacar la arkivo "$1".',
'filenotfound'       => 'Onu ne povas trovar la arkivo "$1".',
'unexpected'         => 'Nevartita valoro: "$1"="$2".',
'formerror'          => 'Eroro: Onu ne povis sendar la kontenajo di la formularo',
'badarticleerror'    => 'Ica ago ne povas facesar en ca pagino.',
'cannotdelete'       => 'Ne es posibla efacar la pagino od arkivo. (Forsan, ulu ja efacis ol.)',
'badtitle'           => 'Nekorekta titulo',
'badtitletext'       => 'La solicitita pagino esas nevalida, vakua od esas
nekorekta interlinguale od interwikale ligilo.',
'perfdisabled'       => 'Pardonez! Ica traito desaktivigesis temporale pro olu lentigas la datumaro til facar {{SITENAME}} neuzebla.',
'perfcached'         => 'La sequanta datumi esas kashizita* e li povus ne aktualigesar nuntempe.',
'viewsource'         => 'Vidar *font-kodo',
'viewsourcefor'      => 'de $1',
'viewsourcetext'     => 'Vu povas vidar ed kopiar la fonto-kodexo di ta pagino:',

# Login and logout pages
'logouttitle'                => 'Ekiro',
'logouttext'                 => '<strong>Vu esas nun ek {{SITENAME}}.</strong><br />
Vu povas durar uzante {{SITENAME}} anonimale, o vu povas enirar altrafoye kom la sama o diferenta uzanto.',
'welcomecreation'            => '<h2>Bonveno, $1!</h2><p>Vua konto kreesis.
Voluntez, ne obliviez chanjor vua preferaji.',
'loginpagetitle'             => 'Registragar / Enirar',
'yourname'                   => 'Vua uzantonomo:',
'yourpassword'               => 'Vua kontrolajo:',
'yourpasswordagain'          => 'Riskribez la pasovorto:',
'remembermypassword'         => 'Memorez mea kontrolajo inter sesioni',
'loginproblem'               => '<b>Esis problemo kun vua eniro.</b><br />Probez altrafoye!',
'login'                      => 'Enirar',
'loginprompt'                => "Vu mustas permisar ''cookies'' por enirar a {{SITENAME}}.",
'userlogin'                  => 'Enirar',
'logout'                     => 'Ekirar',
'userlogout'                 => 'Ekirez',
'notloggedin'                => 'Sesiono ne esas iniciata',
'nologin'                    => 'Ka vu ne havas konto? $1.',
'nologinlink'                => 'Kreez konto',
'createaccount'              => 'Krear nova konto',
'gotaccount'                 => 'Ka vu ja havas konto? $1.',
'gotaccountlink'             => 'Enirar',
'createaccountmail'          => 'per elek-posto',
'badretype'                  => 'La pasovorti vu donis ne esas sama.',
'userexists'                 => 'La uzantonomo, quan vu skribis, ja selektesis antee.<br> Voluntez, elektez ula diferanta uzantonomo.',
'youremail'                  => 'Vua e-adreso:',
'yourrealname'               => 'Vua reala nomo:',
'yourlanguage'               => 'Linguo:',
'yournick'                   => 'Vua uzantonomo (por signati):',
'email'                      => 'Elek-posto',
'loginerror'                 => 'Eroro enirante',
'nocookieslogin'             => "{{SITENAME}} uzas ''cookies'' por la registrago dil uzanti. Vu havas la ''cookies'' desaktivigita. Voluntez aktivigar oli e probez altrafoye.",
'noname'                     => 'Vu ne donis valida uzeronomo.',
'loginsuccesstitle'          => 'Eniro sucesoza',
'loginsuccess'               => "'''Vu eniris a {{SITENAME}} kom \"\$1\".'''",
'nosuchuser'                 => 'Ne existas uzero "$1".
Kontrolez posibla erori od uzez la formularo infre por krear nova uzerokonto.',
'nosuchusershort'            => 'Esas nula uzero "<nowiki>$1</nowiki>". Kontrolez la espelado.',
'wrongpassword'              => 'La skribita pasovorto esis nekorekta. Voluntez probar itere.',
'passwordtooshort'           => 'Vua Pasovorto es ne-valida o tro kurta. Ol mustas kontenar $1 literi od nombri ed mustas esar diferanta kam vua uzantonomo.',
'mailmypassword'             => 'Sendez a me nova pasovorto per e-posto.',
'passwordremindertitle'      => 'Pasovorto-memorilo por {{SITENAME}}',
'noemail'                    => 'Ne esas e-adreso konservita por la uzanto "$1".',
'passwordsent'               => 'Nova pasovorto sendesis a la e-adreso registragita por "$1".
Voluntez enirar altrafoye pos recevar ol.',
'mailerror'                  => 'Eroro sendante posto: $1',
'acct_creation_throttle_hit' => 'Vu ja kreis $1 konti. Vu ne plus povas facar.',
'loginlanguagelabel'         => 'Linguo: $1',

# Edit page toolbar
'bold_sample'     => 'Dika literi',
'bold_tip'        => 'Dika literi',
'italic_sample'   => 'Kursiva literi',
'italic_tip'      => 'Kursiva literi',
'link_sample'     => 'Titulo dil ligilo',
'link_tip'        => 'Interna ligilo',
'extlink_sample'  => 'http://www.exemplo.com Titulo dil ligilo',
'extlink_tip'     => 'Extera ligilo (memorez adjuntar la prefixo "http://")',
'headline_sample' => 'Texto dil titulo',
'headline_tip'    => 'Titulo di duesma nivelo',
'math_sample'     => 'Insertez formulo hike',
'math_tip'        => 'Formulo matematika (LaTeX)',
'nowiki_sample'   => 'Insertar senformizita texto hike',
'nowiki_tip'      => 'Ignorez formatigo wikial',
'image_sample'    => 'Exemplo.jpg',
'image_tip'       => 'Imajo enkorpigita',
'media_sample'    => 'Exemplo.ogg',
'sig_tip'         => "Vua signaturo kun 'timestamp'",
'hr_tip'          => 'Horizontala lineo (ne trouzez ol)',

# Edit pages
'summary'            => 'Rezumo',
'subject'            => 'Temo / Titulo',
'minoredit'          => 'Ico esas mikra chanjo',
'watchthis'          => 'Surveyez ica artiklo',
'savearticle'        => 'Registragar pagino',
'preview'            => 'Previdar',
'showpreview'        => 'Previdar',
'showdiff'           => 'Montrez chanji',
'blockedtitle'       => 'La uzanto esas blokusita',
'whitelistedittitle' => 'On mustas enskribar por redaktar',
'whitelistedittext'  => 'Vu mustas $1 por redaktar pagini.',
'whitelistreadtitle' => 'On mustas enskribar por lektar',
'whitelistreadtext'  => 'Vu mustas [[Special:Userlogin|enirar]] por lektar artikli.',
'whitelistacctitle'  => 'Vu ne havas permiso por krear konto',
'whitelistacctext'   => 'Por darfar krear konti en ica Wiki, vu mustas [[Special:Userlogin|enirar]] e havar la necesa permisi.',
'loginreqtitle'      => 'Eniro esas postulata',
'loginreqlink'       => 'enirar',
'accmailtitle'       => 'Kontrolajo sendita.',
'accmailtext'        => "La kontrolajo por '$1' sendesis a $2.",
'newarticle'         => '(nova)',
'newarticletext'     => "Vu sequis ligilo a pagino qua ne existas ankore.
Por krear ica pagino, voluntez startar skribar en la infra buxo.
(regardez la [[{{MediaWiki:Helppage}}|helpo]] por plusa informo).
Se vu esas hike erore, kliktez sur la butono por retrovenar en vua ''browser''.",
'noarticletext'      => 'Nuntempe ne esas texto en ica pagino. Vu povas [[Special:Search/{{PAGENAME}}|serchar ica titulo]] en altra pagini o [{{fullurl:{{FULLPAGENAME}}|action=edit}} redaktar ica pagino].',
'usercsspreview'     => "'''Memorez ke vu nur previdas vua uzanto-css. Ol ne registragesis ankore!'''",
'userjspreview'      => "'''Memorez ke vu nur previdas vua javascript di uzanto. Ol ne registragesis ankore!'''",
'updated'            => '(Aktualigita)',
'note'               => '<strong>Noto:</strong>',
'previewnote'        => '<strong>Atencez ke ico esas nur prevido ed ol ne registragesis ankore!</strong>',
'editing'            => 'Editante $1',
'editconflict'       => 'Konflikto di edito: $1',
'explainconflict'    => 'Ulu chanjis ica pagino depos vu editeskis ol. La supra texto-areo kontenas la texto dil pagino quale ol existas aktuale. Vua chanji montresas en la infra texto-areo. Vu devas atachar vua chanji en la existanta texto. <b>Nur</b> la texto en la supra texto-areo registragesos kande vu presez sur "Registragar".',
'yourtext'           => 'Vua texto',
'storedversion'      => 'Gardita versiono',
'editingold'         => '<strong>EGARDEZ: Vu redaktas anciena versiono di ca pagino.<br> Se vu gardus ol, la chanji facita pos ita revizo perdesos.</strong>',
'yourdiff'           => 'Diferi',
'copyrightwarning'   => "Voluntez memorar ke omna kontributi a {{SITENAME}} esas sub la $2 (Videz $1 por detali).
Se vu ne deziras ke altri modifikez vua artikli od oli distributesez libere, lore voluntez ne skribar oli hike.<br />
Publikigante vua skribajo hike, vu asertas ke olu skribesis da vu ipsa o kopiesis de libera fonto.
<strong>NE SENDEZ ARTIKLI KUN ''COPYRIGHT'' SEN PERMISO!</strong>",
'template-protected' => '(protektita)',

# History pages
'nohistory'       => 'Ne esas redakto-historio por ica pagino.',
'revnotfound'     => 'Versiono ne trovita',
'revnotfoundtext' => "L' anciena versiono di la pagino, quan vu demandis, ne povis trovesar. <br>Voluntez kontrolar la URL quan vu uzis por acesar a ca pagino.",
'loadhist'        => 'Kargante la versionaro dil pagino',
'currentrev'      => 'Nuna versiono',
'revisionasof'    => 'Versiono ye $1',
'cur'             => 'nuna',
'next'            => 'sequanta',
'last'            => 'lasta',
'page_first'      => 'unesma',
'page_last'       => 'finala',
'histlegend'      => "Selektez la versioni por komparar e lore presez la butono infre.<br> 
:nuna = diferi kun l' aktuala versiono, 
:lasta = diferi kun l' antea versiono, 
:m = mikra edito.",
'historyempty'    => '(vakua)',

# Revision deletion
'rev-delundel' => 'montrar/celar',

# Diffs
'difference'              => '(Diferi inter versioni)',
'lineno'                  => 'Lineo $1:',
'compareselectedversions' => 'Komparar selektita versioni',
'editundo'                => 'des-facez',

# Search results
'searchresults'     => 'Rezultaji dil sercho',
'searchresulttext'  => 'Por plusa informo pri quale serchar en {{SITENAME}}, videz [[{{MediaWiki:Helppage}}|help]].',
'noexactmatch'      => "'''Es nula pagino titulizita \"\$1\".''' Vu darfas [[:\$1|krear ica pagino]].",
'titlematches'      => 'Koincidi de titulo di artiklo',
'notitlematches'    => 'No esas koincidi en la tituli dil artikli',
'textmatches'       => 'Koincidi de texto di artiklo',
'notextmatches'     => 'Nula paginala texto fitas',
'prevn'             => 'antea $1',
'nextn'             => 'sequanta $1',
'viewprevnext'      => 'Vidar ($1) ($2) ($3).',
'showingresults'    => "Montrante infre {{PLURAL:$1|'''1''' rezulto|'''$1''' rezulti}}, qui komencas kun numero #'''$2'''.",
'showingresultsnum' => "Montrante infre {{PLURAL:$3|'''1''' rezulto|'''$3''' rezulti}}, qui komencas kun numero #'''$2'''.",
'nonefound'         => 'La nesucesoza sercho ofte produktesas pro serchar vorti tro komuna quale "havar" e "di", qui ne esas indexizita, o pro serchar plu kam un vorto (En la rezulto aparos nur la pagini qui kontenas omna vorti serchata).',
'powersearch'       => 'Sercho',
'powersearchtext'   => 'Serchar en nomari: <br> $1<br> $2 ridirektili-listo <br> Serchar $3 $9',
'searchdisabled'    => 'La sercho en la kompleta texto desaktivigesis temporale pro superkargo dil servanto. Ni esperas riaktivigar ol pos facar ula proxima aktualigi. Dum ica tempo, vu povas serchar per Google.',

# Preferences page
'preferences'        => 'Preferaji',
'mypreferences'      => 'Mea preferaji',
'prefsnologin'       => 'Vu ne eniris',
'prefsnologintext'   => 'Vu mustas [[Special:Userlogin|enirir]] por establisar la preferaji.',
'prefsreset'         => 'La preferaji riestablisesis da la depozeyo.',
'qbsettings'         => 'Preferaji pri "Quickbar"',
'qbsettings-none'    => 'Nula',
'changepassword'     => 'Chanjar pasovorto',
'skin'               => 'Pelo',
'math'               => 'Quale montrar la formuli',
'dateformat'         => 'Formo di dato',
'datedefault'        => 'Sen prefero',
'datetime'           => 'Dato e tempo',
'math_bad_tmpdir'    => 'Onu ne povas skribar o krear la tempala matematikala arkivaro',
'math_bad_output'    => 'Onu ne povas skribar o krear la arkivaro por la matematiko',
'prefs-personal'     => 'Personala informo',
'prefs-rc'           => 'Recenta chanji e prizento di esbosuri',
'prefs-misc'         => 'Mixaji',
'saveprefs'          => 'Registragar',
'resetprefs'         => 'Riestablisar preferaji',
'oldpassword'        => 'Anciena pasovorto',
'newpassword'        => 'Nova pasovorto',
'retypenew'          => 'Riskribez la nova pasovorto',
'textboxsize'        => 'Grandeso dil areo por texto',
'rows'               => 'Linei:',
'columns'            => 'Kolumni',
'searchresultshead'  => 'Preferaji di la rezultaji dil sercho',
'contextlines'       => 'Linei por montrar singlarezulte',
'contextchars'       => 'Tipi di kuntexto ye singla lineo',
'recentchangescount' => 'Quanto di tituli en la recenta chanji:',
'savedprefs'         => 'Vua preferaji registragesis.',
'timezonetext'       => 'Vua lokala tempo diferas de tempo dil servanto (UTC).',
'localtime'          => 'Lokala tempo',
'timezoneoffset'     => 'Difero',
'servertime'         => 'La kloko en la servanto esas',
'guesstimezone'      => 'Obtenar la kloko dil &quot;browser&quot;',
'defaultns'          => 'Serchar en la spaco-nomi omise:',
'files'              => 'Arkivi',

# Groups
'group'            => 'Grupo:',
'group-bureaucrat' => 'Burokrati',
'group-all'        => '(omna)',

'group-bureaucrat-member' => 'Burokrato',

'grouppage-sysop'      => '{{ns:project}}:Administranti',
'grouppage-bureaucrat' => '{{ns:project}}:Burokrati',

# User rights log
'rightsnone' => '(nula)',

# Recent changes
'nchanges'          => '$1 {{PLURAL:$1|chanjo|chanji}}',
'recentchanges'     => 'Recenta chanji',
'recentchangestext' => 'Regardez la maxim recenta chanji en Wiki per ica pagino.',
'rcnote'            => "Infre esas la lasta {{PLURAL:$1|'''1''' chanjo|'''$1''' chanji}} dum la lasta {{PLURAL:$2|dio|'''$2''' dii}} ($3).",
'rclistfrom'        => 'Montrar nova chanji startante de $1',
'rcshowhideminor'   => '$1 mikra redakti',
'rcshowhidebots'    => '$1 roboti',
'rcshowhideliu'     => '$1 enirinta uzanti',
'rcshowhideanons'   => '$1 anonima uzanti',
'rcshowhidemine'    => '$1 mea redakti',
'rclinks'           => 'Montrar la lasta $1 chanji dum la lasta $2 dii<br />$3',
'diff'              => 'dif',
'hist'              => 'vers',
'hide'              => 'Celar',
'show'              => 'Montrar',
'minoreditletter'   => 'm',
'newpageletter'     => 'N',
'boteditletter'     => 'r',

# Recent changes linked
'recentchangeslinked' => 'Relatata chanji',

# Upload
'upload'            => 'Adkargar arkivo',
'uploadbtn'         => 'Adkargar arkivo',
'reupload'          => 'Ri-adkargar',
'reuploaddesc'      => 'Retrovenar al adkargo-formularo.',
'uploadnologin'     => 'Vu ne eniris',
'uploadnologintext' => 'Vu mustas [[Special:Userlogin|enirir]] por adkargar arkivi.',
'uploaderror'       => 'Eroro dum adkargo',
'uploadlog'         => 'Adkargo-log',
'uploadlogpagetext' => 'Infre esas listo di la plu recenta adkargaji.',
'filename'          => 'Arkivo-nomo',
'filedesc'          => 'Titulo',
'fileuploadsummary' => 'Rezumo:',
'filestatus'        => "Stando di ''copyright''",
'filesource'        => 'Fonto',
'uploadedfiles'     => 'Adkargita arkivi',
'ignorewarning'     => 'Ignorar la averto e gardar la arkivo irgakaze.',
'badfilename'       => 'La imajo-nomo chanjesis a "$1".',
'fileexists'        => 'Arkivo kun ica nomo ja existas. Volutez kontrolar <strong><tt>$1</tt></strong> se vu ne esas certa pri chanjar olu.',
'successfulupload'  => 'Adcharjo sucesoza',
'uploadwarning'     => 'Averto pri la adkargo di arkivo',
'savefile'          => 'Registragar arkivo',
'uploadedimage'     => 'adkargita "[[$1]]"',
'uploaddisabled'    => 'Pardonez, la adkargo esas desaktiva.',

# Image list
'imagelist'                 => 'Listo di imaji',
'imagelisttext'             => "Infre esas listo di '''$1''' {{PLURAL:$1|imajo|imaji}} rangizita $2.",
'getimagelist'              => 'obtenante la listo di imaji',
'ilsubmit'                  => 'Serchar',
'showlast'                  => 'Montrar la lasta $1 imaji klasifikata $2.',
'byname'                    => 'per nomo',
'bydate'                    => 'per dato',
'bysize'                    => 'per grandeso',
'imgdelete'                 => 'efac',
'imgdesc'                   => 'desk',
'imgfile'                   => 'arkivo',
'filehist'                  => 'Historio dil arkivo',
'filehist-help'             => 'Klikez sur la dato/horo por vidar arkivo quale ol aparis ye ta tempo.',
'filehist-datetime'         => 'Dato/Horo',
'filehist-user'             => 'Uzero',
'filehist-dimensions'       => 'Dimensioni',
'filehist-filesize'         => 'Grandeso dil arkivo',
'imagelinks'                => 'Ligilo al imajo',
'linkstoimage'              => 'Ca pagini ligas al imajo:',
'nolinkstoimage'            => 'Nula pagino ligas a ca pagino.',
'uploadnewversion-linktext' => 'Adkargez nova versiono dil arkivo',
'imagelist_date'            => 'Dato',
'imagelist_name'            => 'Nomo',
'imagelist_user'            => 'Uzanto',

# File deletion
'filedelete-submit'           => 'Efacar',
'filedelete-otherreason'      => 'Altra/adjuntita motivo:',
'filedelete-reason-otherlist' => 'Altra motivo',

# Unused templates
'unusedtemplateswlh' => 'altra ligili',

# Random page
'randompage' => 'Pagino hazarde',

# Statistics
'statistics' => 'Statistiko',
'sitestats'  => 'Statistiki di {{SITENAME}}',
'userstats'  => 'Statistiki di uzanto',

'disambiguations' => 'Pagini di desambiguizo',

'doubleredirects' => 'Duopla ridirektili',

'brokenredirects'     => 'Ridirektili nekorekta',
'brokenredirectstext' => 'La sequanta ridirektili ligas a ne-existanta artiklo:',

'withoutinterwiki-submit' => 'Montrar',

# Miscellaneous special pages
'ncategories'      => '$1 {{PLURAL:$1|kategorio|kategorii}}',
'nlinks'           => '$1 {{PLURAL:$1|ligilo|ligili}}',
'nviews'           => '$1 {{PLURAL:$1|vizito|viziti}}',
'lonelypages'      => 'Pagini sen ligili',
'unusedimages'     => 'Neuzata imaji',
'popularpages'     => 'Populara pagini',
'wantedpages'      => 'Dezirata pagini',
'allpages'         => 'Omna pagini',
'shortpages'       => 'Kurta pagini',
'longpages'        => 'Longa pagini',
'deadendpages'     => 'Pagini sen ekiraji',
'listusers'        => 'Uzanto-listo',
'specialpages'     => 'Specala pagini',
'spheading'        => 'Speciala pagini por omni',
'newpages'         => 'Nova pagini',
'ancientpages'     => 'Maxim anciena artikli',
'intl'             => 'Interlinguala ligili',
'move'             => 'Movez',
'movethispage'     => 'Rinomizar ica pagino',
'unusedimagestext' => 'Voluntez egardez ke altra ret-situi povus ligar a arkivo per direta URL, e do ol povus esar enlistizita hike malgre olu havas aktiva uzo.',
'notargettitle'    => 'Ne esas vakua pagino',
'notargettext'     => 'Vu ne definis en qua pagino agar ica funciono.',

# Book sources
'booksources'    => 'Fonti di libri',
'booksources-go' => 'Irar',

'alphaindexline' => '$1 til $2',
'version'        => 'Versiono',

# Special:Log
'specialloguserlabel'  => 'Uzero:',
'speciallogtitlelabel' => 'Titulo:',
'log-search-submit'    => 'Irar',

# Special:Allpages
'nextpage'          => 'Sequanta pagino ($1)',
'allarticles'       => 'Omna pagini',
'allinnamespace'    => 'Omna pagini (nomaro $1)',
'allnotinnamespace' => 'Omna pagini (ne in nomaro $1)',
'allpagessubmit'    => 'Irez',
'allpages-bad-ns'   => '{{SITENAME}} ne havas nomaro "$1".',

# E-mail user
'mailnologin'     => 'Ne sendar adreso',
'mailnologintext' => 'Vu mustas [[Special:Userlogin|enirir]] e havar valida e-adreso en vua [[Special:Preferences|preferaji]] por sendar e-posto ad altra uzanti.',
'emailuser'       => 'Sendar e-posto a ca uzanto',
'emailpage'       => 'E-posto ad uzanto',
'defemailsubject' => 'E-posto di {{SITENAME}}',
'noemailtitle'    => 'Ne esas e-adreso',
'emailfrom'       => 'De',
'emailto'         => 'Ad',
'emailsubject'    => 'Temo',
'emailmessage'    => 'Sendajo',
'emailsend'       => 'Sendar',
'emailsent'       => 'E-posto sendita',
'emailsenttext'   => 'Vua e-posto sendesis',

# Watchlist
'watchlist'            => 'Mea surveyaji',
'mywatchlist'          => 'Mea surveyaji',
'nowatchlist'          => 'Vu ne havas objekti en vua listo di surveyaji.',
'watchnologin'         => 'Vu ne startis sesiono',
'watchnologintext'     => 'Vu mustas [[Special:Userlogin|enirir]] por modifikar vua surveyaji.',
'addedwatch'           => 'Adjuntita a la listo de surveyaji',
'addedwatchtext'       => "La pagino \"<nowiki>\$1</nowiki>\" atachesis a vua [[Special:Watchlist|listo de surveyaji]]. Futura chanji di ica pagino ed olua relatata debato-pagini montresos ibe, ed la pagino aparos per '''dika literi''' en la [[Special:Recentchanges|listo de recenta chanji]] por faciligar sua trovebleso.

<p> Se vu volas efacar la pagino de vua listo de surveyaji pose, presez \"Ne plus surveyar\" en la selektaro.",
'watch'                => 'Surveyar',
'watchthispage'        => 'Surveyar ica pagino',
'unwatch'              => 'Ne plus surveyar',
'unwatchthispage'      => 'Ne plus surveyar',
'notanarticle'         => 'Ne esas artiklo',
'watchnochange'        => 'Nula artikli ek vua listo di surveyaji redaktesis dum la tempo montrata.',
'watchmethod-recent'   => 'serchante recenta chanji en la listo di surveyaji',
'watchmethod-list'     => 'serchante recenta redakti en la listo di surveyaji',
'watchlistcontains'    => 'Vua listo di surveyaji kontenas $1 {{PLURAL:$1|pagino|pagini}}.',
'iteminvalidname'      => "Problemo en la artiklo '$1', nevalida nomo...",
'wlnote'               => "Infre esas la lasta {{PLURAL:$1|chanjo|'''$1''' chanji}} dum la lasta {{PLURAL:$2|horo|'''$2''' hori}}.",
'wlshowlast'           => 'Montrar la lasta $1 hori $2 dii $3.',
'watchlist-hide-own'   => 'Celez chanji da me',
'watchlist-hide-minor' => 'Celez mikra chanji',

'enotif_newpagetext' => 'Ico esas nula pagino.',

# Delete/protect/revert
'deletepage'            => 'Efacar pagino',
'confirm'               => 'Konfirmar',
'excontent'             => "La kontenajo esis: '$1'",
'exbeforeblank'         => "La kontenajo ante efaco esis: '$1'",
'exblank'               => 'La pagino esis vakua',
'delete-legend'         => 'Efacar',
'historywarning'        => 'Egardez: La pagino, quan vu efaceskas, havas versionaro:',
'actioncomplete'        => 'Ago kompletigita',
'deletedtext'           => '"<nowiki>$1</nowiki>" efacesis.
Videz $2 por obtenar registro di recenta efaci.',
'deletedarticle'        => 'efacita "$1"',
'dellogpagetext'        => 'Infre esas listo di la plu recenta efaci.',
'deletionlog'           => 'registro di efaciti',
'reverted'              => 'Rekuperita ad antea versiono',
'deletecomment'         => 'Motivo por la efaco',
'deleteotherreason'     => 'Altra/adjuntita motivo:',
'deletereasonotherlist' => 'Altra motivo',
'rollback'              => 'Desfacar redakto',
'rollback_short'        => 'Desfacar',
'rollbackfailed'        => 'Desfaco ne sucesis',
'cantrollback'          => 'Ne esas posibla desfacar la edito. La lasta kontributanto esas la nura autoro di ica pagino.',
'alreadyrolled'         => 'Onu ne povas desfacar la lasta chanjo di [[$1]]
da [[User:$2|$2]] ([[User talk:$2|Talk]]); ulu pluse ja editis o desfacis ica pagino.

Lasta edito esis da [[User:$3|$3]] ([[User talk:$3|Talk]]).',
'editcomment'           => 'La rezumo di la edito esis: "<i>$1</i>".', # only shown if there is an edit comment
'revertpage'            => 'Rekuperita redakti da [[Special:Contributions/$2|$2]] ([[User talk:$2|Debato]]); rekuperita la lasta redakto di [[User:$1|$1]]', # Additional available: $3: revid of the revision reverted to, $4: timestamp of the revision reverted to, $5: revid of the revision reverted from, $6: timestamp of the revision reverted from
'unprotectedarticle'    => 'desprotektita [[$1]]',
'protectsub'            => '(Protektante "$1")',
'confirmprotect'        => 'Konfirmar protekto',
'protectcomment'        => 'Motivo por la protekto',
'unprotectsub'          => '(Desprotektante "$1")',

# Restrictions (nouns)
'restriction-edit' => 'Redaktar',

# Undelete
'undelete'               => 'Restaurar efacita artiklo',
'undeletepage'           => 'Vidar e restaurar efacita pagini',
'undeletepagetext'       => 'La sequanta pagini efacesis ma li ankore esas en la arkivo ed esas restaurebla. La arkivo povas netigesar periodale.',
'undeleterevisions'      => '$1 {{PLURAL:$1|revizo|revizi}} konservita',
'undeletebtn'            => 'Restaurar',
'undeletedarticle'       => 'Restaurita "$1"',
'undelete-search-submit' => 'Serchar',

# Namespace form on various pages
'namespace'      => 'Nomaro:',
'blanknamespace' => '(Chefa)',

# Contributions
'contributions' => 'Kontributadi dil uzanto',
'mycontris'     => 'Mea adportado',
'contribsub2'   => 'Pro $1 ($2)',
'nocontribs'    => 'Ne trovesis chanji qui fitez ita kriterii.',
'ucnote'        => 'Sube esas la lasta <b>$1</b> chanji da ca uzanto dum la lasta <b>$2</b> dii.',
'uclinks'       => 'Vidar la lasta $1 chanji; vidar la lasta $2 dii.',
'uctop'         => ' (lasta modifiko)',

# What links here
'whatlinkshere'       => 'Quo ligas hike',
'whatlinkshere-title' => 'Pagini qui ligas ad $1',
'whatlinkshere-page'  => 'Pagino:',
'linklistsub'         => '(Listo di ligili)',
'linkshere'           => "Ca pagini esas ligilizita ad '''[[:$1]]''':",
'nolinkshere'         => "Nula pagino ligas ad '''[[:$1]]'''.",
'isredirect'          => 'ridirektanta pagino',
'whatlinkshere-links' => '← ligili',

# Block/unblock
'blockip'            => 'Blokusado di IP-adresi',
'ipaddress'          => 'IP-adreso / uzantonomo',
'ipbexpiry'          => 'Expiro',
'ipbreason'          => 'Motivo',
'ipbreasonotherlist' => 'Altra motivo',
'ipbsubmit'          => 'Blokusar ica uzanto',
'ipbotheroption'     => 'altra',
'ipbotherreason'     => 'Altra/adjuntita motivo:',
'badipaddress'       => 'IP-adreso ne esas valida',
'blockipsuccesssub'  => 'Blokusado sucesis',
'blockipsuccesstext' => '[[Special:Contributions/$1|$1]] blokusesis.<br />
Videz [[Special:Ipblocklist|IP-blokuslisto]] por revizor blokusadi.',
'unblockip'          => 'Desblokusar uzanto',
'unblockiptext'      => 'Uzez la sequanta formularo por restaurar la skribo-aceso ad IP-adreso qua blokusesis antee.',
'ipusubmit'          => 'Desblokusar ica IP-adreso',
'ipblocklist'        => 'Listo di blokusita IP-adresi ed uzantonomi',
'ipblocklist-submit' => 'Serchar',
'blocklistline'      => '$1, $2 blokusas $3 (expiras $4)',
'blocklink'          => 'blokusar',
'unblocklink'        => 'Desblokusar',
'contribslink'       => 'kontributaji',
'autoblocker'        => 'Autoblokusita nam vu havas la sama IP-adreso kam "[[User:$1|$1]]". Motivo: "$2"',
'blocklogentry'      => 'blokusis [[$1]] dum periodo de $2 $3',
'unblocklogentry'    => 'Desblokusita "$1"',
'ipb_expiry_invalid' => 'Nevalida expiro-tempo.',
'ip_range_invalid'   => 'Nevalida IP-rango.',
'proxyblocksuccess'  => 'Facita.',

# Developer tools
'lockdb'              => 'Blokusar datumaro',
'unlockdb'            => 'Desblokusar datumaro',
'lockconfirm'         => 'Yes, me reale volas blokusar la datumaro.',
'unlockconfirm'       => 'Yes, me volas blokusar la datumaro.',
'lockbtn'             => 'Blokusar datumaro',
'unlockbtn'           => 'Desblokusar datumaro',
'locknoconfirm'       => 'Vu ne pulsis la buxeto por konfirmo.',
'lockdbsuccesssub'    => 'Datumaro blokusita sucese',
'unlockdbsuccesssub'  => 'La desblokuso facesis sucese',
'lockdbsuccesstext'   => 'La datumaro blokusesis.<br> 
Memorez [[Special:Unlockdb|efacar la blokuso]] kande vua mantenado finos.',
'unlockdbsuccesstext' => 'La datumaro desblokusesis.',

# Move page
'movepage'         => 'Rinomizar pagino',
'movepagetext'     => "Uzante ica formularo onu povas rinomizar pagino, movante olua omna versionaro ad la nova titulo.
La antea titulo konvertesos a ridirektilo a la nova titulo.
La ligili a la antea titulo dil pagino ne chanjesos.
Voluntez certigar ke ne esas duopla o ruptota ridirektili.
Vu responsas ke la ligili duros direktante a la pagino korespondanta.

Memorez ke la pagino '''ne''' rinomizesos se ja existus pagino kun la nova titulo, eceptuante ke la pagino esas vakua o ridirektilo sen versionaro.
Ico signifikas ke vu povos rinomizar pagino a olua originala titulo se eroras skribante la nova titulo, ma ne povos riskribar existanta pagino.

'''EGARDEZ!'''
Ica povas esar drastika chanjo e ne-esperinda por populara pagino.
Voluntez certigar ke vu komprenas la konsequi qui eventos ante durar adavane.",
'movearticle'      => 'Movar pagino',
'movenologin'      => 'Sesiono ne iniciata',
'movenologintext'  => 'Vu mustas esar registragita uzanto ed [[Special:Userlogin|enirir]] por rinomizar pagino.',
'newtitle'         => 'a nova titulo',
'movepagebtn'      => 'Movar pagino',
'pagemovedsub'     => 'Rinomizita sucese',
'articleexists'    => 'Pagino kun sama nomo ja existas od la nomo
qua vu selektis ne esas valida.
Voluntez selektar altra nomo.',
'movedto'          => 'rinomizita ad',
'movetalk'         => 'Rinomizar la debato-pagino se to esas aplikebla.',
'talkpagemoved'    => 'Anke la korespondanta debato-pagino movesis.',
'talkpagenotmoved' => 'La korespondanta debato-pagino <strong>ne</strong> movesis.',
'1movedto2'        => '[[$1]] movita a [[$2]]',
'movereason'       => 'Motivo:',

# Export
'export'        => 'Exportacar pagini',
'exportcuronly' => 'On inkluzas nur la nuna revizo, ne la kompleta versionaro',
'export-addcat' => 'Adjuntar',

# Namespace 8 related
'allmessages'     => 'Omna sistemo-mesaji',
'allmessagesname' => 'Nomo',
'allmessagestext' => 'Ico esas listo de omna sistemo-mesaji disponebla en la MediaWiki: namespace.',

# Thumbnails
'thumbnail-more'  => 'Grandigez',
'thumbnail_error' => 'Ne sucesas krear thumbnail: $1',

# Special:Import
'import'                => 'Importacar pagini',
'importtext'            => 'Voluntez exportacar l\' arkivo de la fonto-wiki uzante la utensilo "Special:Export", registragar ol a vua disko ed adkargar ol hike.',
'importfailed'          => 'La importaco faliis: $1',
'importnotext'          => 'Vakua o sentexta',
'importsuccess'         => 'Importaco sucesoza!',
'importhistoryconflict' => 'Existas versionaro konfliktiva (Ica pagino povus importacesir antee)',

# Tooltip help for the actions
'tooltip-pt-userpage'             => 'Mea uzanto-pagino',
'tooltip-pt-mytalk'               => 'Mea diskuto-pagino',
'tooltip-pt-preferences'          => 'Mea preferaji',
'tooltip-pt-watchlist'            => 'Listo di pagini quin vu kontrolas',
'tooltip-pt-mycontris'            => 'Listo di mea kontributaji',
'tooltip-pt-login'                => 'Vu darfas enirar uzante vua pas-vorto, ma lo ne esas preskriptata.',
'tooltip-pt-logout'               => 'Ekirez',
'tooltip-ca-talk'                 => 'Diskuto pri la pagino di kontenajo',
'tooltip-ca-edit'                 => 'Vu darfas chanjar ta pagino. Voluntez pre-vidar chanji ante rezervar oli.',
'tooltip-ca-protect'              => 'Protektez ica pagino',
'tooltip-ca-delete'               => 'Efacez ica pagino',
'tooltip-ca-move'                 => 'Movez pagino',
'tooltip-search'                  => 'Serchez en {{SITENAME}}',
'tooltip-p-logo'                  => 'Frontispico',
'tooltip-n-mainpage'              => 'Vizitez la Frontispico',
'tooltip-n-portal'                => 'Pri la projeto, quon vu facus, ube trovus utilaji',
'tooltip-n-recentchanges'         => 'Listo di recenta chanji en la wiki.',
'tooltip-n-randompage'            => 'Adkargez pagino hazarde',
'tooltip-n-help'                  => 'La loko por trovar ulo.',
'tooltip-t-whatlinkshere'         => 'Montrez omna wiki pagini qui ligas ad hike',
'tooltip-t-contributions'         => 'Videz kontributaji di ta uzero',
'tooltip-t-emailuser'             => 'Sendez mesajo al uzanto',
'tooltip-t-upload'                => 'Adkargez arkivi',
'tooltip-t-specialpages'          => 'Montrez listo di omna specala pagini',
'tooltip-ca-nstab-user'           => 'Videz la pagino dil uzero',
'tooltip-minoredit'               => 'Reperar ica chanjo kom mikra',
'tooltip-save'                    => 'Registrigez chanji',
'tooltip-preview'                 => 'Previdar vua chanji. Voluntez uzor ico ante registragar!',
'tooltip-diff'                    => 'Montrez la chanji a la texto quin vu facis',
'tooltip-compareselectedversions' => 'Vidar la diferaji inter la du selektita versioni di ca pagino.',
'tooltip-watch'                   => 'Adjuntar ica pagino a vua listo di surveyaji',
'tooltip-upload'                  => 'Adkargar imaji od altra arkivi',

# Metadata
'notacceptable' => 'La servanto di {{SITENAME}} ne povas provizar datumi en formato quan vua kliento povas komprenar.',

# Attribution
'anonymous'     => 'Anonima uzanti di {{SITENAME}}',
'siteuser'      => 'Uzanto che {{SITENAME}} $1',
'othercontribs' => 'Bazizita en la laboro da $1.',
'siteusers'     => 'Uzanti che {{SITENAME}} $1',

# Spam protection
'spamprotectiontitle'    => 'Filtrilo kontre spamo',
'subcategorycount'       => 'Esas {{PLURAL:$1|1 subkategorio|$1 subkategorii}} en ica kategorio.',
'categoryarticlecount'   => 'Esas {{PLURAL:$1|una pagino|$1 pagini}} en ica kategorio.',
'listingcontinuesabbrev' => 'seq.',

# Patrol log
'patrol-log-auto' => '(automata)',

# Media information
'widthheightpage' => '$1×$2, $3 pagini',

# Special:Newimages
'showhidebots' => '($1 bot-i)',

# EXIF tags
'exif-artist'              => 'Autoro',
'exif-exposuretime-format' => '$1 sek ($2)',
'exif-gpslatitude'         => 'Latitudo',
'exif-gpslongitude'        => 'Longitudo',
'exif-gpsaltitude'         => 'Altitudo',

'exif-orientation-1' => 'Normala', # 0th row: top; 0th column: left

'exif-exposureprogram-1' => 'Manuala',

'exif-subjectdistance-value' => '$1 metri',

'exif-meteringmode-1'   => 'Mez-valoro',
'exif-meteringmode-255' => 'Altra',

'exif-sensingmethod-1' => 'Nedefinita',

'exif-gaincontrol-0' => 'Nula',

'exif-contrast-0' => 'Normala',

'exif-saturation-0' => 'Normala',

'exif-sharpness-0' => 'Normala',

# Pseudotags used for GPSSpeedRef and GPSDestDistanceRef
'exif-gpsspeed-k' => 'Kilometri per horo',
'exif-gpsspeed-m' => 'Milii per horo',

# 'all' in various places, this might be different for inflected languages
'recentchangesall' => 'omna',
'imagelistall'     => 'omna',
'watchlistall2'    => 'omna',
'namespacesall'    => 'omna',
'monthsall'        => 'omna',

# E-mail address confirmation
'confirmemail_needlogin' => 'Vu mustas $1 pro konfirmar vua adreso di e-posto.',

# Multipage image navigation
'imgmultipageprev' => '← antea pagino',
'imgmultipagenext' => 'sequanta pagino →',
'imgmultigo'       => 'Irez!',

# Table pager
'ascending_abbrev'         => 'aces',
'descending_abbrev'        => 'decen',
'table_pager_next'         => 'Sequanta pagino',
'table_pager_prev'         => 'Antea pagino',
'table_pager_first'        => 'Unesma pagino',
'table_pager_last'         => 'Lasta pagino',
'table_pager_limit_submit' => 'Irar',

# Auto-summaries
'autosumm-new' => 'Nova pagino: $1',

# Watchlist editor
'watchlistedit-raw-titles' => 'Tituli:',

# Special:Version
'version-specialpages'     => 'Specala pagini',
'version-other'            => 'Altra',
'version-version'          => 'Versiono',
'version-software-version' => 'Versiono',

# Special:Filepath
'filepath-page' => 'Arkivo:',

);
