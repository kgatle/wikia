<?php
/** Novial (Novial)
 *
 * @addtogroup Language
 *
 * @author nov.wikipedia.org sysops
 * @author Malafaya
 * @author SPQRobin
 */

$messages = array(
# Dates
'sunday'       => 'sundie',
'monday'       => 'lundie',
'tuesday'      => 'mardie',
'wednesday'    => 'merkurdie',
'thursday'     => 'jodie',
'friday'       => 'venerdie',
'saturday'     => 'saturdie',
'january'      => 'januare',
'february'     => 'februare',
'march'        => 'marte',
'april'        => 'aprile',
'may_long'     => 'maye',
'june'         => 'june',
'july'         => 'julie',
'august'       => 'auguste',
'september'    => 'septembre',
'october'      => 'oktobre',
'november'     => 'novembre',
'december'     => 'desembre',
'march-gen'    => 'marte',
'april-gen'    => 'aprile',
'may-gen'      => 'maye',
'august-gen'   => 'auguste',
'october-gen'  => 'oktobre',
'december-gen' => 'desembre',
'may'          => 'maye',

# Bits of text used by many pages
'categories'      => 'Kategories',
'pagecategories'  => '{{PLURAL:$1|Kategorie|Kategories}}',
'category_header' => 'Artikles in kategorie "$1"',

'about'          => 'Pri',
'article'        => 'Pagine de kontenaje',
'newwindow'      => '(aperta in novi fenestre)',
'cancel'         => 'Nihilisa',
'qbspecialpages' => 'Spesial pagines',
'moredotdotdot'  => 'Plu...',
'mypage'         => 'Men pagine',
'mytalk'         => 'Men parla-pagine',
'anontalk'       => 'Parlo por disi IP',
'navigation'     => 'Navigatione',
'and'            => 'e',

'returnto'         => 'Rivada a $1.',
'tagline'          => 'Fro {{SITENAME}}',
'help'             => 'Helpo',
'search'           => 'Sercha',
'searchbutton'     => 'Sercha',
'searcharticle'    => 'Vada',
'history'          => 'Historie del pagine',
'history_short'    => 'Historie',
'info_short'       => 'Informatione',
'printableversion' => 'Printindi versione',
'permalink'        => 'Permananti linke',
'edit'             => 'Modifika',
'editthispage'     => 'Modifika disi pagine',
'delete'           => 'Ekarta',
'deletethispage'   => 'Ekarta disi pagine',
'protect'          => 'Protekte',
'protectthispage'  => 'Protekte disi pagine',
'talkpage'         => 'Diskuse disi pagine',
'talkpagelinktext' => 'Diskusione',
'specialpage'      => 'Spesial Pagine',
'articlepage'      => 'Regarda pagine de kontenaje',
'talk'             => 'Diskusione',
'toolbox'          => 'Utensiles',
'userpage'         => 'Vida useren pagine',
'imagepage'        => 'Regarda imajal pagine',
'mediawikipage'    => 'Regarda mesajal pagine',
'templatepage'     => 'Vida shablonal pagine',
'categorypage'     => 'Regarda kategorial pagine',
'otherlanguages'   => 'Altri lingues',
'lastmodifiedat'   => 'Disi pagine blid lastim modifika: $2 ye $1.', # $1 date, $2 time

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite'     => 'Pri {{SITENAME}}',
'aboutpage'     => 'Project:Pri',
'currentevents' => 'Nuni eventes',
'edithelp'      => 'Help pri modifiko de pagines',
'helppage'      => 'Help:Kontenaje',
'mainpage'      => 'Chefi pagine',
'portal'        => 'Li komun chambre',
'sitesupport'   => 'Donationes',

'badaccess' => 'Permisione erore',

'youhavenewmessages'      => 'Vu have $1 ($2).',
'newmessageslink'         => 'novi mesajes',
'newmessagesdifflink'     => 'lasti chanjo',
'youhavenewmessagesmulti' => 'Vu have novi mesajes pri $1',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main'      => 'Artikle',
'nstab-user'      => 'Useren pagine',
'nstab-special'   => 'Spesial',
'nstab-project'   => 'Projetal pagine',
'nstab-mediawiki' => 'Mesaje',
'nstab-template'  => 'Shablone',
'nstab-help'      => 'Helpo-pagine',
'nstab-category'  => 'Kategorie',

# General errors
'error'        => 'Erore',
'badtitle'     => 'Mali title',
'badtitletext' => 'Li pregati pagine esed non-valid, vakui, o non-korektim linkat inter-lingue o inter-wiki title. Lu povud kontena un o plusi karakteres kel on non pove usa in titles.',

# Login and logout pages
'logouttitle'                => 'Useren eksignato',
'logouttext'                 => '<strong>Vu es nun eksignatat.</strong><br />
Vu pove kontinua usa {{SITENAME}} anonimim, o vu pove riensignata
kom li sami o altri usere.',
'loginpagetitle'             => 'Useren ensignato',
'yourname'                   => 'Usere-nome:',
'yourpassword'               => 'Pasa-vorde:',
'remembermypassword'         => 'Memora men pasa-vorde (kun kuke)',
'login'                      => 'Ensignata',
'loginprompt'                => 'Vu mus lasa cookies de ensignata en {{SITENAME}}.',
'userlogin'                  => 'Ensignata / krea usere-registre',
'logout'                     => 'Eksignata',
'userlogout'                 => 'Eksignata',
'notloggedin'                => 'Non ensignatat',
'nologin'                    => 'Ob vu non have registre? $1.',
'nologinlink'                => 'Krea usere-registre',
'gotaccountlink'             => 'Ensignata',
'loginerror'                 => 'Erore de ensignato',
'loginsuccesstitle'          => 'Ensignato suksesosi',
'loginsuccess'               => "'''Vu es nun ensignatat a {{SITENAME}} nomisat \"\$1\".'''",
'mailmypassword'             => 'E-posta men pasa-vorde',
'acct_creation_throttle_hit' => 'Vu ha ja krea $1 registres. Regretindim vu non pove krea plusu.',
'accountcreated'             => 'Registre kreat',
'accountcreatedtext'         => 'Li usere-registre por $1 ha bli krea.',

# Edit page toolbar
'bold_sample'  => 'Diki texte',
'image_sample' => 'Exemple.jpg',

# Edit pages
'summary'               => 'Resume',
'minoredit'             => 'Dise es mikri modifiko',
'watchthis'             => 'Observa disi pagine',
'savearticle'           => 'Spara pagine',
'showpreview'           => 'Montra previdatu',
'showdiff'              => 'Montra chanjos',
'blockedoriginalsource' => "Li fonte de '''$1''' bli montra subu:",
'loginreqtitle'         => 'Ensignato Postulat',
'loginreqlink'          => 'ensignata',
'accmailtitle'          => 'Pasa-vorde sendat.',
'accmailtext'           => 'Li pasa-vorde por "$1" ha bli senda a $2.',
'yourtext'              => 'Vun texte',

# History pages
'currentrev'          => 'Nuni revisione',
'currentrevisionlink' => 'Nuni revisione',
'histfirst'           => 'Maxim frui',
'histlast'            => 'Maxim resenti',

# Revision feed
'history-feed-title'       => 'Historie de revisiones',
'history-feed-description' => 'Historie de revisiones de disi pagine sur li wiki',
'history-feed-empty'       => 'Li petit pagine non exista.
Forsan lu ha bli ekarta fro li wiki, o rinomat.
Proba [[Special:Search|sercho sur li wiki]] por relatet pagines.',

# Diffs
'compareselectedversions' => 'Kompara selektet versiones',

# Search results
'searchresults'         => 'Resultes de sercho',
'searchsubtitle'        => "Vu serchad '''[[:$1]]'''",
'searchsubtitleinvalid' => "Vu serchad '''$1'''",
'prevn'                 => 'lasti $1',
'nextn'                 => 'sekuenti $1',
'viewprevnext'          => 'Vida ($1) ($2) ($3).',
'powersearch'           => 'Sercha',

# Preferences page
'preferences'       => 'Preferos',
'mypreferences'     => 'Men preferos',
'prefsnologin'      => 'Non ensignatat',
'prefsnologintext'  => 'Vu mus es [[Special:Userlogin|ensignatat]] por determina useren preferos.',
'prefs-rc'          => 'Resenti chanjos',
'searchresultshead' => 'Sercha',

# Recent changes
'recentchanges'   => 'Resenti chanjos',
'rcshowhideminor' => '$1 minori modifikos',
'rcshowhideanons' => '$1 anonimi useres',
'rcshowhidemine'  => '$1 men modifikos',
'rclinks'         => 'Montra lasti $1 chanjes in lasti $2 dies<br />$3',
'hist'            => 'hist',
'hide'            => 'Kasha',
'show'            => 'Montra',

# Recent changes linked
'recentchangeslinked' => 'Afini chanjos',

# Upload
'upload'            => 'Enporta',
'uploadnologin'     => 'Non ensignatat',
'filedesc'          => 'Resume',
'fileuploadsummary' => 'Resume:',
'watchthisupload'   => 'Observa disi pagine',

# Image list
'ilsubmit'              => 'Sercha',
'byname'                => 'segun nome',
'bydate'                => 'segun date',
'imagelinks'            => 'Linkes',
'imagelist_name'        => 'Nome',
'imagelist_user'        => 'Usere',
'imagelist_size'        => 'Grandeso (bites)',
'imagelist_description' => 'Deskriptione',
'imagelist_search_for'  => 'Sercha imaje nome:',

# Random page
'randompage' => 'Arbitriari pagine',

'brokenredirects'     => 'Rupteti ri-adresos',
'brokenredirectstext' => 'Li sekuenti ri-adresos linka a non-existanti pagines:',

'fewestrevisions' => 'Artikles kun minim multi revisiones',

# Miscellaneous special pages
'ncategories'             => '$1 {{PLURAL:$1|kategorie|kategories}}',
'lonelypages'             => 'Pagines kel non bli kupla',
'lonelypagestext'         => 'Disi pagines non es kuplat fro altri pagines in {{SITENAME}}.',
'uncategorizedpages'      => 'Pagines sin kategorie',
'uncategorizedcategories' => 'Kategories sin kategorie',
'uncategorizedimages'     => 'Imajes sin kategorie',
'popularpages'            => 'Popular pagines',
'mostcategories'          => 'Artikles kun maxim multi kategories',
'mostrevisions'           => 'Artikles kun maxim multi revisiones',
'allpages'                => 'Omni pagines',
'shortpages'              => 'Kurti pagines',
'longpages'               => 'Longi pagines',
'deadendpages'            => 'Pagines sin kuplures',
'listusers'               => 'Liste de useres',
'specialpages'            => 'Spesial pagines',
'newpages'                => 'Novi pagines',
'ancientpages'            => 'Maxim ansieni pagines',
'move'                    => 'Mova',
'movethispage'            => 'Mova (rinomisa) disi pagine',

# Book sources
'booksources'               => 'Libral fontes',
'booksources-search-legend' => 'Sercha libral fontes',
'booksources-go'            => 'Vada',

'categoriespagetext' => 'Li sekuenti kategories exista in li wiki.',
'groups'             => 'Usere grupes',
'alphaindexline'     => '$1 a $2',
'version'            => 'Versione',

# Special:Log
'specialloguserlabel' => 'Usere:',

# Special:Allpages
'allarticles'       => 'Omni artikles',
'allinnamespace'    => 'Omni pagines ($1 nome-spatie)',
'allnotinnamespace' => 'Omni pagines (non in $1 nome-spatie)',
'allpagesprev'      => 'Antei',
'allpagesnext'      => 'Sekuenti',
'allpagessubmit'    => 'Vada',

# Watchlist
'watchlist'       => 'Men liste de observos',
'mywatchlist'     => 'Men liste de observos',
'nowatchlist'     => 'Vu have nuli koses in vun liste de observos.',
'watchnologin'    => 'Non ensignatat',
'addedwatch'      => 'Adit a observa-liste',
'addedwatchtext'  => "Li pagine \"[[:\$1]]\" ha bli adi a vun [[Special:Watchlist|observa-liste]].
Futuri chanjos a disi pagine e lun asosiati Parla-pagine sal bli lista tilok, e li pagine sal apari '''diki''' in li [[Special:Recentchanges|liste de resenti chanjos]] por ke on trova lu plu fasilim.

Si vu voli plu tardim ekarta li pagine fro vun observa-liste, klikta \"Desobserva\" in li lateral kolumne.",
'watch'           => 'Observa',
'watchthispage'   => 'Observa disi pagine',
'unwatch'         => 'Desobserva',
'unwatchthispage' => 'Des-observa disi pagine',

'changed'            => 'chanjati',
'enotif_lastvisited' => 'Regarda $1 por vida omni chanjes depos vun lasti visite.',

# Delete/protect/revert
'confirm'             => 'Konfirma',
'excontent'           => "kontenaje esed: '$1'",
'excontentauthor'     => "kontenaje esed: '$1' (e li soli kontribuere esed '[[Special:Contributions/$2|$2]]')",
'exblank'             => 'pagine esed vakui',
'actioncomplete'      => 'Akto kompleti',
'deletedarticle'      => 'ekartad "[[$1]]"',
'dellogpage'          => 'Loge de ekartos',
'dellogpagetext'      => 'Subu es liste del maxim resenti ekartos.',
'deletionlog'         => 'registre de ekartos',
'deletecomment'       => 'Resone de ekarto',
'revertpage'          => 'Riverted modifikos da [[Special:Contributions/$2|$2]] ([[User talk:$2|Talk]]); restaurad lasti versione da [[User:$1|$1]]', # Additional available: $3: revid of the revision reverted to, $4: timestamp of the revision reverted to, $5: revid of the revision reverted from, $6: timestamp of the revision reverted from
'confirmprotect'      => 'Konfirma protektione',
'protect-level-sysop' => 'Sisopes nur',

# Namespace form on various pages
'blanknamespace' => '(Chefi)',

# Contributions
'contributions' => 'Useren kontributiones',
'mycontris'     => 'Men kontributiones',

'sp-contributions-newbies' => 'Montra kontributiones nur de novi useres',
'sp-contributions-search'  => 'Sercha kontributiones',
'sp-contributions-submit'  => 'Sercha',

# What links here
'whatlinkshere' => 'Tum kel kupla hir',

# Block/unblock
'contribslink' => 'Kontributiones',

# Move page
'movearticle'             => 'Mova pagine',
'movenologin'             => 'Non ensignatat',
'move-watch'              => 'Observa disi pagine',
'movedto'                 => 'movat a',
'1movedto2'               => '[[$1]] movat a [[$2]]',
'1movedto2_redir'         => '[[$1]] movat a [[$2]] via ri-adreso',
'delete_and_move'         => 'Ekarta e mova',
'delete_and_move_confirm' => 'Yes, ekarta li pagine',
'delete_and_move_reason'  => 'Ekartat por fa spatie por movo',

# Namespace 8 related
'allmessages'         => 'Sisteme mesajes',
'allmessagesname'     => 'Nome',
'allmessagesdefault'  => 'Non-spesifikati texte',
'allmessagescurrent'  => 'Nuni texte',
'allmessagestext'     => 'Dise es liste de sistemen mesajes obtenabli in li MediaWiki nomal spatie.',
'allmessagesmodified' => 'Montra nur modifikates',

# Tooltip help for the actions
'tooltip-pt-logout' => 'Eksignata',

# Info page
'infosubtitle' => 'Informatione pri pagine',

# EXIF tags
'exif-imagewidth'       => 'Larjeso',
'exif-imagelength'      => 'Alteso',
'exif-imagedescription' => 'Title de imaje',
'exif-imageuniqueid'    => 'Unik imaje ID',

# 'all' in various places, this might be different for inflected languages
'imagelistall' => 'omnes',

# AJAX search
'searchcontaining' => "Sercha artikles kel kontena ''$1''.",
'searchnamed'      => "Sercha artikles nomat ''$1''.",
'articletitles'    => "Artikles kel starta kun ''$1''",

# Auto-summaries
'autosumm-replace' => "Remplasant pagine kun '$1'",
'autoredircomment' => 'Ri-adresant a [[$1]]',
'autosumm-new'     => 'Novi pagine: $1',

);
