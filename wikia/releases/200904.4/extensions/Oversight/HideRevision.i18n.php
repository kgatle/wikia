<?php

/**
 * Internationalisation file for the Oversight extension
 */

$messages = array();

/** English
 * @author Brion Vibber
 */
$messages['en'] = array(
	'hiderevision'           => 'Permanently hide revisions',
	'hiderevision-desc'      => 'Hide individual revisions from all users for legal reasons, etc.',
	'group-oversight'        => 'Oversighters',
	'group-oversight-member' => 'oversight',
	'grouppage-oversight'    => '{{ns:project}}:Oversight',
	'right-oversight'        => 'View a previously hidden revision',
	'right-hiderevision'     => 'Review and restore revisions hidden from sysops',

	// Empty form
	'hiderevision-prompt'   => 'Revision number to remove:',
	'hiderevision-continue' => 'Continue',

	// Confirmation form
	'hiderevision-text'   => "This should '''only''' be used for the following cases:
* Inappropriate personal information
*: ''home addresses and telephone numbers, social security numbers, etc''

'''Abuse of this system will result in loss of privileges.'''

Removed items will not be visible to anyone through the web site, but the deletions are logged and can be restored manually by a database administrator if you make a mistake.",
	'hiderevision-reason' => 'Reason (will be logged privately):',
	'hiderevision-submit' => 'Hide this data permanently',

	// Tab displayed to allowed users on old revision display
	'hiderevision-tab' => 'Hide revision',
	// Displayed on Users contributions
	'hiderevision-link' => 'Hidden user contributions',

	// Status & errors on action
	'hiderevision-norevisions'    => 'No revisions specified to delete.',
	'hiderevision-noreason'       => 'You must decribe the reason for this removal.',
	'hiderevision-status'         => 'Revision $1: $2',
	'hiderevision-success'        => 'Archived and deleted successfully.',
	'hiderevision-error-missing'  => 'Not found in database.',
	'hiderevision-error-current'  => 'Cannot delete the latest edit to a page.
Revert this change first.',
	'hiderevision-error-delete'   => 'Could not archive; was it previously deleted?',
	'hiderevision-archive-status' => 'Deleted revision from $1: $2',
	'oversight-nodiff' => 'Unable to track changes as there is currently no previous revision for the page. Either:
*The page was deleted
*This hidden revision was the first revision',

	// Logging
	'oversight-log-hiderev' => 'removed an edit from $1',

	// Oversight review page
	'oversight'            => 'Oversight',
	'oversight-view'       => 'details',
	'oversight-difference' => '(Difference from previous remaining revision)',
	'oversight-prev'       => 'Last previous revision',
	'oversight-hidden'     => 'Hidden revision',
	'oversight-header'     => 'Below is a list of revisions recently permanently hidden from public view.
Releasing this information can result in permanent loss of Oversight privileges.',
	'oversight-legend'     => 'Search revision hiding log',
	'oversight-oversighter' => 'Oversighter:',
	'oversight-offender'   => 'Offender:',
);

/** Message documentation (Message documentation)
 * @author Aotake
 * @author Darth Kule
 * @author Jon Harald Søby
 * @author Kwj2772
 * @author Meno25
 */
$messages['qqq'] = array(
	'hiderevision-desc' => 'Short description of the Oversight extension, shown on [[Special:Version]].',
	'group-oversight-member' => 'A user in the group "Oversight". Translate it as "Oversighter".

{{Identical|Oversight}}',
	'right-oversight' => '{{doc-right}}',
	'right-hiderevision' => '{{doc-right}}',
	'hiderevision-link' => 'Used in [[Special:Contributions]], only visible to Oversight.',
	'hiderevision-error-current' => '{{Identical|Delete}}
{{Identical|Revert}}',
	'hiderevision-archive-status' => '$1 = revision timestamp
$2 = revision status',
	'oversight' => 'Oversight extension. The name of the page [[Special:Oversight]], used in the list of special pages and at the top of Special:Oversight.

{{Identical|Oversight}}',
	'oversight-view' => 'It means "view source"
----
{{Identical|Details}}',
	'oversight-oversighter' => "Option of fieldset in Special:Oversight. ''Overisight'' is the user who has hidden revision",
	'oversight-offender' => "Option of fieldset in Special:Oversight. ''Offender'' is the author of the hidden revision",
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 */
$messages['af'] = array(
	'hiderevision-continue' => 'Gaan voort',
	'hiderevision-error-missing' => 'Nie in databasis gevind nie.',
	'oversight-view' => 'details',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'hiderevision' => 'Amagar bersions ta cutio',
	'hiderevision-desc' => 'Amagar as bersions endibiduals ta toz os usuarios por razons legals, etz.',
	'group-oversight' => 'Superbisors',
	'group-oversight-member' => 'Superbisor',
	'grouppage-oversight' => '{{ns:project}}:Superbisión',
	'right-oversight' => 'Amostrar una bersión prebiament amagata',
	'right-hiderevision' => 'Rebisar y recuperar bersions amagatas ta os Almenistradors',
	'hiderevision-prompt' => 'Numero de bersión á borrar:',
	'hiderevision-continue' => 'Continar',
	'hiderevision-text' => "'''Nomás''' d'ha de fer serbir esto en os casos siguients:
* Informazión personal inapropiata
*: ''adrezas particulars, numeros de telefono, numeros de seguridat sozial, etc''

'''Si abusa d'este sistema puede perder os suyos dreitos.'''

Os elementos borratos no serán bisibles ta dengún en o sitio web, pero os borraus serán rechistratos y si s'entiboca, un almenistrador d'a base de datos puede recuperar-los.",
	'hiderevision-reason' => 'Razón (se rechistrará pribadament)',
	'hiderevision-submit' => 'Amagar estos datos ta cutio',
	'hiderevision-tab' => 'Amagar bersión',
	'hiderevision-norevisions' => "No s'han endicato as bersions que s'han de borrar.",
	'hiderevision-noreason' => 'Ha de describir a razón ta iste borrau.',
	'hiderevision-status' => 'Bersión $1: $2',
	'hiderevision-success' => 'Archibato y borrato esitosament.',
	'hiderevision-error-missing' => "No s'ha trobato en a base de datos.",
	'hiderevision-error-current' => "No se puede borrar a zaguera edizión d'una pachina.
Desfaiga en primeras o zaguer cambio.",
	'hiderevision-error-delete' => "No s'ha puesto archibar; s'eba borrato dinantes?",
	'hiderevision-archive-status' => "S'ha borrato a bersión de $1: $2",
	'oversight-nodiff' => "No podié seguir os cambios pues no bi ha autualment garra bersión anterior ta ista pachina.
Puestar que:
* A pachina s'aiga borrato
* Esta bersión amagata sía a primer bersión",
	'oversight-log-hiderev' => 'borrata una edizión de $1',
	'oversight' => 'Superbisión',
	'oversight-view' => 'detalles',
	'oversight-difference' => '(Esferenzias dende a bersión anterior autual)',
	'oversight-prev' => 'Zaguera bersión anterior',
	'oversight-hidden' => 'Bersión amagata',
	'oversight-header' => "En o cobaixo bi ye una lista de bersions que han estato amagatas de traza permanent fa poco tiempo. Si fa publica esta informazión podría perder de traza permanent os dreitos d'superbisión",
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'hiderevision' => 'إخفاء المراجعات بشكل دائم',
	'hiderevision-desc' => 'إخفاء مراجعات منفردة من كل المستخدمين لأسباب قانونية، إلى آخره.',
	'group-oversight' => 'نظار',
	'group-oversight-member' => 'ناظر',
	'grouppage-oversight' => '{{ns:project}}:أوفرسايت',
	'right-oversight' => 'رؤية مراجعة مخفية سابقة',
	'right-hiderevision' => 'مراجعة واسترجاع المراجعات المخفية عن مديري النظام',
	'hiderevision-prompt' => 'رقم المراجعة للإزالة:',
	'hiderevision-continue' => 'استمر',
	'hiderevision-text' => "هذا يجب أن يستخدم '''فقط''' في الحالات التالية:
* معلومات شخصية غير ملائمة
*: ''عناوين المنازل وأرقام الهواتف، أرقام التأمين الاجتماعي، إلى آخره''

'''إساءة استخدام هذا النظام سينتج عنه فقد الصلاحيات.'''

المدخلات المزالة لن تكون مرئية لأي شخص عبر موقع الويب،
لكن عمليات الحذف ستسجل ويمكن استرجاعها يدويا بواسطة إداري قاعدة بيانات لو ارتكبت خطأ.",
	'hiderevision-reason' => 'السبب (سيسجل سرا):',
	'hiderevision-submit' => 'إخفاء هذه البيانات بشكل دائم',
	'hiderevision-tab' => 'إخفاء المراجعة',
	'hiderevision-link' => 'مساهمات المستخدم المخفية',
	'hiderevision-norevisions' => 'لا مراجعات محددة للحذف.',
	'hiderevision-noreason' => 'يجب أن تصف السبب لهذه الإزالة.',
	'hiderevision-status' => 'المراجعة $1: $2',
	'hiderevision-success' => 'تمت الأرشفة والحذف بنجاح.',
	'hiderevision-error-missing' => 'غير موجود في قاعدة البيانات.',
	'hiderevision-error-current' => 'لا يمكن حذف آخر تعديل لصفحة.
استرجع هذا التغيير أولا.',
	'hiderevision-error-delete' => 'لم يمكن الأرشفة؛ هل تم حذفها سابقا؟',
	'hiderevision-archive-status' => 'المراجعة المحذوفة من $1: $2',
	'oversight-nodiff' => 'غير قادر على تتبع التغييرات حيث أنه لا توجد مراجعة سابقة للصفحة. إما:
*الصفحة تم حذفها
*هذه المراجعة المخفية كانت المراجعة الأولى',
	'oversight-log-hiderev' => 'أزال تعديلا من $1',
	'oversight' => 'أوفرسايت',
	'oversight-view' => 'التفاصيل',
	'oversight-difference' => '(الفرق من المراجعة المتبقية السابقة)',
	'oversight-prev' => 'آخر مراجعة سابقة',
	'oversight-hidden' => 'مراجعة مخفية',
	'oversight-header' => 'بالأسفل قائمة بالمراجعات التي تم إخفاؤها بشكل دائم حديثا عن العامة.
إفشاء هذه المعلومات يمكن أن ينتج عنه فقد دائم لصلاحيات الأوفرسايت.',
	'oversight-legend' => 'بحث في سجل إخفاء المراجعات',
	'oversight-oversighter' => 'ناظر:',
	'oversight-offender' => 'مسيء:',
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Ghaly
 * @author Meno25
 * @author Ramsis II
 */
$messages['arz'] = array(
	'hiderevision' => 'خبى المراجعات على طول.',
	'hiderevision-desc' => 'خبى المراجعات الفردية عن كل اليوزرز لاسباب قانونية، الخ.',
	'group-oversight' => 'اوڤرسايترز',
	'group-oversight-member' => 'اوڤرسايتر',
	'grouppage-oversight' => '{{ns:project}}:اوڤرسايت',
	'right-oversight' => 'عرض مراجعة سابقة متخبية',
	'right-hiderevision' => 'مراجعة و ترجيع المراجعات المتخبية عن السيسوبات',
	'hiderevision-prompt' => 'رقم المراجعة للمسح:',
	'hiderevision-continue' => 'استمر',
	'hiderevision-text' => "دا لازم يستعمل '''بس''' فى الحالات دي:
* معلومات شخصية مش مناسبة
*: ''عناوين البيت و ارقام التليفونات, ارقام التامين الاجتماعي, الخ''

'''اساءة استعمال النظام دا حيأدى لفقدانك للمزايا.'''

الحاجات اللى اتشالت مش ح تكون متشافة لاى حد على موقع الويب, بس الحاجات اللى اتمسحت دى ح تتسجل وممكن تترجع تانى   يدوى عن طريق  إداريين قاعدة البيانات لو عملت حاجة غلط .",
	'hiderevision-reason' => 'السبب (حيتسجل فى السجل السري):',
	'hiderevision-submit' => 'خبى البيانات دى على طول.',
	'hiderevision-tab' => 'إخفاء المراجعة',
	'hiderevision-link' => 'تعديلات اليوزر المتخبيه',
	'hiderevision-norevisions' => 'مافيش مراجعات متحددة علشان تتمسح.',
	'hiderevision-noreason' => 'لازم تقول السبب بتاع المسح دا.',
	'hiderevision-status' => 'النسخة $1: $2',
	'hiderevision-success' => 'اتأرشفت و اتمسحت بنجاح.',
	'hiderevision-error-missing' => 'ماتلقاش فى قاعدة البيانات.',
	'hiderevision-error-current' => 'مش ممكن مسح اخر تعديل للصفحة.
ارجع فى التغيير دا الاول.',
	'hiderevision-error-delete' => 'ماتارشيفتش;هى اتمسحت قبل كدا؟',
	'hiderevision-archive-status' => 'المراجعة الممسوحة من $1: $2',
	'oversight-nodiff' => 'مش قادرين نتتبع التغييرات علشان مافيش مراجعات قديمة للصفحة.ودا بسبب:
*الصفحة دى اتمسحت
*أو المراجعة المتخبية دى كانت اول مراجعة',
	'oversight-log-hiderev' => 'شال تعديل واحد من $1',
	'oversight' => 'اوڤرسايت',
	'oversight-view' => 'التفاصيل',
	'oversight-difference' => '(الفرق من المراجعة المتبقية اللى فاتت)',
	'oversight-prev' => 'اخر مراجعه فاتت',
	'oversight-hidden' => 'مراجعة متخبية',
	'oversight-header' => 'تحت فى لستة بالتغييرات اللى اتخبت قريب و على طول من العرض العمومي.
تطليع المعلومات دى بره ممكن يتسبب فى سحب صلاحيات الاوفرسايت منك و على طول.',
	'oversight-legend' => 'دور فى سجل تخبية المراجعات',
	'oversight-oversighter' => 'ناظر:',
	'oversight-offender' => 'مسىء:',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$messages['ast'] = array(
	'hiderevision' => 'Revisiones escondíes permanentemente',
	'hiderevision-desc' => 'Oculta revisiones individuales a tolos usuarios por motivos llegales, etc.',
	'group-oversight' => 'Güeyadores',
	'group-oversight-member' => 'güeyador',
	'grouppage-oversight' => '{{ns:project}}:Güeyador',
	'right-oversight' => 'Ver una revisión ocultada previamente',
	'right-hiderevision' => 'Revisar y restaurar revisiones ocultes a los alministradores',
	'hiderevision-prompt' => 'Númberu de revisión pa eliminar:',
	'hiderevision-continue' => 'Continuar',
	'hiderevision-text' => "Esto habría usase '''namái''' nos siguientes casos:
* Información personal non apropiada
*: ''direiciones y númberos de teléfonu del domiciliu, númberos de seguridá sociales, etc''

'''L'abusu d'esti sistema llevará a la perda de privilexos.'''

Los elementos eliminaos nun van ser visibles por naide nel sitiu web,
pero los esborraos queden rexistraos y si t'enquivoques puen ser restauraos
manualmente por un alministrador de la base de datos.",
	'hiderevision-reason' => 'Motivu (rexistraráse de forma privada):',
	'hiderevision-submit' => 'Esconder permanentemente estos datos',
	'hiderevision-tab' => 'Esconder revisión',
	'hiderevision-norevisions' => "Nun s'especificaron revisiones pa esborrar.",
	'hiderevision-noreason' => "Has describir el motivu d'esta eliminación.",
	'hiderevision-status' => 'Revisión $1: $2',
	'hiderevision-success' => 'Archivada y esborrada con ésitu.',
	'hiderevision-error-missing' => 'Non atopada na base de datos.',
	'hiderevision-error-current' => "Nun se pue esborrar la cabera edición d'una páxina. Revierti primero esti cambéu.",
	'hiderevision-error-delete' => 'Nun se pudo archivar; ¿taría yá esborrada previamente?',
	'hiderevision-archive-status' => 'Revisión esborrada de $1: $2',
	'oversight-nodiff' => 'Nun se pudieron deteutar cambeos yá que nestos momentos nun hai revisiones previes de la páxina.
*La páxina foi esborrada; o
*Esta revisión escondida yera la primer revisión',
	'oversight-log-hiderev' => 'eliminó una edición de $1',
	'oversight' => 'Supervisión',
	'oversight-view' => 'detalles',
	'oversight-difference' => '(Diferencia ente les revisiones previes restantes)',
	'oversight-prev' => 'Cabera revisión previa',
	'oversight-hidden' => 'Revisión escondida',
	'oversight-header' => 'Embaxo amuésase una llista de les revisiones escondíes recién permanentemente de la vista pública.
Esparder esta información pue llevar a la perda permanente de privilexos de supervisión.',
	'oversight-legend' => 'Buscar el rexistru de les revisiones ocultes',
);

/** Kotava (Kotava)
 * @author Wikimistusik
 */
$messages['avk'] = array(
	'right-hiderevision' => 'Tolwira va betaks palseyen gan ristusik numu dimsulara',
);

/** Southern Balochi (بلوچی مکرانی)
 * @author Mostafadaneshvar
 */
$messages['bcc'] = array(
	'hiderevision' => 'اصلاحات پنهاین دایمی',
	'hiderevision-desc' => 'په قانونی دلایل پناهین اصلاحات یکیء چه کلی کابران پناه کن،غیره',
	'group-oversight' => 'اشتباه کننده یان',
	'group-oversight-member' => 'اشتباه',
	'grouppage-oversight' => '{{ns:project}}:اشتباه',
	'right-oversight' => 'دیستن یک پیشگین اصلاح پناهین',
	'right-hiderevision' => 'بازبینی و بازسازی اصلاحات چه مدیران پناهین',
	'hiderevision-prompt' => 'عدد بازبینی به حذف:',
	'hiderevision-continue' => 'ادامه',
	'hiderevision-reason' => 'دلیل(خصوصی ذخیره بیت):',
	'hiderevision-submit' => 'دایم ای دیتا پناه کن',
	'hiderevision-tab' => 'بازبینی پناه کن',
	'hiderevision-norevisions' => 'هچ بازبینی په حذف مشخص نه بیتت.',
	'hiderevision-noreason' => 'شما بایدن دلیلی په ای حذف  بیان کنیت.',
	'hiderevision-status' => 'بازبینی $1: $2',
	'hiderevision-success' => 'گون موفقیت آرشیو و حذف بوت',
	'hiderevision-error-missing' => 'ته دیتابیس درگیزگ نه بیت.',
	'hiderevision-error-current' => 'نه تونیت آهری اصلاح یک صفحه ایء حذف کنت.
ای تغییرات اول برگردینت.',
	'hiderevision-error-delete' => 'نه تونیت آرشیو کنت; آیا پیش تر حذف بوتت؟',
	'hiderevision-archive-status' => 'بزور بازبینیء چه $1: $2',
	'oversight-log-hiderev' => 'یک اصلاحی چه $1 بزور',
	'oversight' => 'اشتباه',
	'oversight-view' => 'جزییات',
	'oversight-difference' => '(تفاوت چه پیشگین نسخه منتگین)',
	'oversight-prev' => 'اهری پیشگین بازبینی',
	'oversight-hidden' => 'پناهین بازبینی',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 */
$messages['be-tarask'] = array(
	'hiderevision' => 'Схаваць вэрсіі назаўсёды',
	'hiderevision-desc' => 'Хавае асобныя вэрсіі ад усіх удзельнікаў па юрыдычных прычынах і г.д.',
	'group-oversight' => 'Рэвізоры',
	'group-oversight-member' => 'рэвізор',
	'grouppage-oversight' => '{{ns:project}}:Рэвізоры',
	'right-oversight' => 'Прагляд раней схаваных вэрсіяў',
	'right-hiderevision' => 'Прагляд і аднаўленьне вэрсіяў, схаваных ад адміністратараў',
	'hiderevision-prompt' => 'Нумар вэрсіі для выдаленьня:',
	'hiderevision-continue' => 'Працягваць',
	'hiderevision-text' => "Гэтая функцыя можа выкарыстоўвацца '''выключна''' ў наступных выпадках:
* Абвяшчэньне асабістай інфармацыі
*: ''хатнія адрасы і тэлефонныя нумары, нумар сацыяльнага забесьпячэньня і г.д.''

'''Злоўжываньне гэтай функцыяй прывядзе да пазбаўленьня правоў рэвізора.'''

Схаваныя элемэнты ня будуць адлюстроўвацца на старонках сайта, але будуць рэгістравацца і могуць быць адноўленыя адміністратарам базы зьвестак, калі Вы выпадкова зробіце памылку.",
	'hiderevision-reason' => 'Прычына (будзе запісаная ў закрыты журнал):',
	'hiderevision-submit' => 'Схаваць гэтыя зьвесткі назаўсёды',
	'hiderevision-tab' => 'Схаваць гэтую вэрсію',
	'hiderevision-link' => 'Схаваны ўнёсак удзельніка',
	'hiderevision-norevisions' => 'Вэрсіі для выдаленьня ня вызначаныя',
	'hiderevision-noreason' => 'Вам неабходна пазначыць прычыну гэтага выдаленьня.',
	'hiderevision-status' => 'Вэрсія $1: $2',
	'hiderevision-success' => 'Пасьпяхова заархівавана і выдалена.',
	'hiderevision-error-missing' => 'Ня знойдзена ў базе зьвестак.',
	'hiderevision-error-current' => 'Немагчыма выдаліць апошнюю вэрсію старонкі.
Спачатку адкаціце гэтыя зьмены.',
	'hiderevision-error-delete' => 'Немагчыма заархіваваць; магчыма ўжо адбылася выдаленьне?',
	'hiderevision-archive-status' => 'Выдалена вэрсія старонкі $1: $2',
	'oversight-nodiff' => 'Немагчыма вызначыць зьмены з-за адсутнасьці папярэдняй вэрсіі старонкі. Магчыма:
* Старонка была выдалена
* Схаваная вэрсія была першай',
	'oversight-log-hiderev' => 'выдаленая вэрсія старонкі $1',
	'oversight' => 'Журнал схаваных вэрсіяў',
	'oversight-view' => 'падрабязнасьці',
	'oversight-difference' => '(Адрозьненьні з папярэдняй пакінутай вэрсіяй)',
	'oversight-prev' => 'Апошняя папярэдняя вэрсія',
	'oversight-hidden' => 'Схаваная вэрсія',
	'oversight-header' => 'Ніжэй пададзены сьпіс вэрсіяў, якія былі нядаўна схаваныя ад публічнага прагляду.
Распаўсюджаньне гэтай інфармацыі можа прывесьці да пазбаўленьня правоў рэвізора.',
	'oversight-legend' => 'Пошук вэрсыяў у журнале хаваньняў',
	'oversight-oversighter' => 'Рэвізор:',
	'oversight-offender' => 'Парушальнік:',
);

/** Bulgarian (Български)
 * @author Borislav
 * @author DCLXVI
 */
$messages['bg'] = array(
	'hiderevision' => 'Постоянно скриване на версии',
	'hiderevision-desc' => 'Добавя възможност за скриване на отделни версии',
	'group-oversight' => 'Ревизори',
	'group-oversight-member' => 'Ревизор',
	'grouppage-oversight' => '{{ns:project}}:Ревизори',
	'right-oversight' => 'Преглеждане на предишни скрити версии',
	'right-hiderevision' => 'преглед и възстановяване на версии, скрити от администраторите',
	'hiderevision-prompt' => 'Номер на версия за премахване:',
	'hiderevision-continue' => 'Продължаване',
	'hiderevision-text' => "Тази страница следва да се използва '''само''' при следните случаи:
* Неподходяща лична информация
*: ''домашни адреси и телефонни номера, номера на социални осигуровки и др.''

'''Злоупотребите ще доведат до загуба на правата.'''

Премахнатите записи няма да бъдат видими за никой на сайта, но изтриванията се записват и в случай на грешка могат да бъдат възстановени на ръка от администраторите на базите с данни.",
	'hiderevision-reason' => 'Причина (ще бъде записана в скрит дневник):',
	'hiderevision-submit' => 'Постоянно скриване на информацията',
	'hiderevision-tab' => 'Скриване на редакцията',
	'hiderevision-norevisions' => 'Не са посочени редакции за изтриване.',
	'hiderevision-noreason' => 'Необходимо е да се посочи причина за това премахване.',
	'hiderevision-status' => 'Редакция $1: $2',
	'hiderevision-success' => 'Архивирано и изтрито успешно.',
	'hiderevision-error-missing' => 'Не е намерена в базата от данни.',
	'hiderevision-error-current' => 'Последната редакция на страницата не може да бъде изтрита. Необходимо е първо да бъде върната.',
	'hiderevision-error-delete' => 'Не можа да бъде архивирана. Да не е била вече изтрита?',
	'hiderevision-archive-status' => 'Изтрита версия от $1: $2',
	'oversight-nodiff' => 'Невъзможно е да се проследят промените, тъй като в момента няма предишна версия на тази страница. Възможни причини:
*страницата е била изтрита
*тази скрита версия е първата версия на страницата',
	'oversight-log-hiderev' => 'премахната редакция от $1',
	'oversight-view' => 'детайли',
	'oversight-prev' => 'Последна предишна версия',
	'oversight-hidden' => 'Скрита редакция',
	'oversight-header' => 'По-долу е посочен списък на версии, които наскоро са били перманентно премахнати от публичния архив.
Изнасянето на тази информация може да доведе до отнемане на правата за достъп до този инструмент.',
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Zaheen
 */
$messages['bn'] = array(
	'hiderevision' => 'স্থায়ীভাবে সংশোধনগুলি লুকিয়ে রাখা হোক',
	'hiderevision-desc' => 'আইনগত কারণ, ইতাদির জন্য ব্যক্তিগত সংশোধনগুলি সব ব্যবহারকারীর কাছ থেকে আড়াল করা হোক।',
	'right-oversight' => 'পূর্ববর্তী লুকায়িত পর্যালোচনা দেখাও',
	'hiderevision-prompt' => 'যে সংশোধনটি সরিয়ে নিতে হবে তার ক্রমসংখ্যা:',
	'hiderevision-continue' => 'অগ্রসর হোন',
	'hiderevision-text' => "এটি '''শুধুমাত্র''' নিচের ক্ষেত্রগুলিতে ব্যবহার করা যাবে:
* অনুপযোগী ব্যক্তিগত তথ্য
*: ''বাসার ঠিকানা এবং টেলিফোন নম্বর, সোশাল সিকিউরিটি নম্বর, ইত্যাদি''

'''এই ব্যবস্থার অপব্যবহার করলে আপনার সুযোগসুবিধা হারাতে পারেন।'''

মুছে ফেলা আইটেমগুলি এই ওয়েবসাইটের মাধ্যমে আর কেউ দেখতে পাবে না, কিন্তু মুছে ফেলার ঘটনাগুলি লগ করা আছে এবং আপনি কোন ভুল করলে একজন ডাটাবেজ প্রশাসক নিজ হাতে সেগুলি ফিরিয়ে আনতে পারবেন।",
	'hiderevision-reason' => 'কারণ (গোপনে লগ করা হবে):',
	'hiderevision-submit' => 'এই উপাত্ত স্থায়ীভাবে লুকানো হোক',
	'hiderevision-tab' => 'সংশোধন লুকানো হোক',
	'hiderevision-norevisions' => 'মুছে ফেলার জন্য কোন সংশোধন নির্দিষ্ট করা হয়নি।',
	'hiderevision-noreason' => 'অবশ্যই আপনাকে মুছে ফেলার কারণ বর্ণনা করতে হবে।',
	'hiderevision-status' => 'সংশোধন $1: $2',
	'hiderevision-success' => 'সফলভাবে আর্কাইভ করা হয়েছে ও মুছে ফেলা হয়েছে।',
	'hiderevision-error-missing' => 'ডাটাবেজে পাওয়া যায়নি।',
	'hiderevision-error-current' => 'কোন পাতার সর্বশেষ সম্পাদনা মুছে ফেলা যাবে না। এই পরিবর্তনটি আগে বাতিল করুন।',
	'hiderevision-error-delete' => 'আর্কাইভ করা যায়নি; এটা কি আগে মুছে ফেলা হয়েছিল?',
	'hiderevision-archive-status' => '$1 থেকে এই সংশোধনটি মুছে ফেলা হয়েছে: $2',
	'oversight-log-hiderev' => '$1 থেকে একটি সম্পাদনা মুছে ফেলা হয়েছে',
	'oversight' => 'ওভারসাইট',
	'oversight-view' => 'বিস্তারিত',
	'oversight-difference' => '(পূর্ববর্তী বাকী পোর্যালোচনা থেকে ভিন্ন)',
	'oversight-prev' => 'সর্বশেষ পূর্ববর্তী পর্যালোচনা',
	'oversight-hidden' => 'লুকায়িত সংশোধন',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'hiderevision-continue' => "Kenderc'hel",
);

/** Bosnian (Bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'hiderevision' => 'Sakrivanje revizija zauvijek',
	'hiderevision-desc' => 'Sakrij pojedinačne revizije od svih korisnika iz normalnih razloga i sl.',
	'group-oversight' => 'Nadzornici',
	'group-oversight-member' => 'nadzornik',
	'grouppage-oversight' => '{{ns:project}}:Nadzor',
	'right-oversight' => 'Pregled ranije sakrivene revizije',
	'right-hiderevision' => 'Pregledavanje i vraćanje revizija sakrivenih od administratora',
	'hiderevision-prompt' => 'Broj revizije koja se uklanja:',
	'hiderevision-continue' => 'Nastavi',
	'hiderevision-text' => "Ovo bi trebalo koristiti '''samo''' u slijedećim slučajevima:
* Nepodobni lični podaci
*: ''kućne adrese, telefonski brojevi, brojevi računa, matični brojevi i sl.''

'''Zloupotreba ovog sistema će uzrokovati gubitak privilegija.'''

Uklonjene stavke neće biti vidljive niko preko web stranice, ali sva brisanja su zapisana i mogu se vratiti ručno od strane administratora baze, ukoliko pogriješite.",
	'hiderevision-reason' => 'Razlog (biće zapisan u zapisnik):',
	'hiderevision-submit' => 'Sakrij ove podatke stalno',
	'hiderevision-tab' => 'Sakrij reviziju',
	'hiderevision-link' => 'Sakriveni korisnički doprinosi',
	'hiderevision-norevisions' => 'Nijedna revizija nije odabrana za brisanje.',
	'hiderevision-noreason' => 'Morate opisati razlog za ovo uklanjanje.',
	'hiderevision-status' => 'Revizija $1: $2',
	'hiderevision-success' => 'Uspješno arhivirano i obrisano.',
	'hiderevision-error-missing' => 'Nije pronađena u bazi podataka.',
	'hiderevision-error-current' => 'Ne može se obrisati posljednja izmjena stranice.
Vratite najprije ovu promjenu.',
	'hiderevision-error-delete' => 'Nije moguće arhivirati, da nije ranije obrisano?',
	'hiderevision-archive-status' => 'Obrisana revizija od $1: $2',
	'oversight-nodiff' => 'Nije moguće pratiti promjene pošto trenutno nema ranije revizije stranice. Ili je:
*stranica obrisana ili je
*ova sakrivena revizija ujedno bila i prva revizija',
	'oversight-log-hiderev' => 'uklonjena izmjena iz $1',
	'oversight' => 'Nadzor',
	'oversight-view' => 'detalji',
	'oversight-difference' => '(Razlika od ranije preostale revizije)',
	'oversight-prev' => 'Zadnja prethodna revizija',
	'oversight-hidden' => 'Skrivena revizija',
	'oversight-header' => 'Ispod je spisak revizija koje su nedavno zauvijek sakrivene od javnog pregleda.
Otkrivanje ovih informacija može rezultirati stalnim gubitkom privilegija nazdornika.',
	'oversight-legend' => 'Pretraži zapis sakrivanja revizija',
	'oversight-oversighter' => 'Nadzornik:',
	'oversight-offender' => 'Napasnik:',
);

/** Catalan (Català)
 * @author Aleator
 * @author Iradigalesc
 * @author Paucabot
 * @author SMP
 * @author Toniher
 */
$messages['ca'] = array(
	'hiderevision' => 'Oculta aquestes revisions permanentment',
	'hiderevision-desc' => 'Amaga revisions individuals de tots els usuaris per raons legals, etc.',
	'right-oversight' => 'Vegeu una revisió prèviament amagada',
	'right-hiderevision' => 'Revisar i restaurar les versions amagades als administradors',
	'hiderevision-prompt' => 'Número de la revisió a suprimir:',
	'hiderevision-continue' => 'Continua',
	'hiderevision-reason' => 'Motiu (es registrarà de forma privada):',
	'hiderevision-submit' => 'Amaga aquestes dades permanentment',
	'hiderevision-tab' => 'Amaga la revisió',
	'hiderevision-norevisions' => 'NO heu especificat cap revisió per esborrar.',
	'hiderevision-noreason' => "Descriviu la raó de l'eliminació.",
	'hiderevision-status' => 'Revisió $1: $2',
	'hiderevision-success' => 'Arxivada i esborrada correctament.',
	'hiderevision-error-missing' => "No s'ha trobat a la base de dades.",
	'hiderevision-error-delete' => "No s'ha pogut arxivar. S'havia esborrat ja prèviament?",
	'hiderevision-archive-status' => 'Revisió eliminada de $1: $2',
	'oversight-log-hiderev' => 'esborrada una edició de $1',
	'oversight-view' => 'detalls',
	'oversight-prev' => 'Darrera revisió anterior',
	'oversight-hidden' => 'Revisió oculta',
);

/** Corsican (Corsu) */
$messages['co'] = array(
	'hiderevision' => 'Piattà e revisione di manera permanente',
	'hiderevision-continue' => 'Cuntinuà',
	'hiderevision-status' => 'Revisione $1: $2',
);

/** Czech (Česky)
 * @author Danny B.
 * @author Li-sung
 * @author Matěj Grabovský
 * @author Mormegil
 * @author Sp5uhe
 */
$messages['cs'] = array(
	'hiderevision' => 'Natrvalo skrýt revize',
	'hiderevision-desc' => 'Skrytí jednotlivých revizí před všemi uživateli (z právních důvodů apod.)',
	'group-oversight' => 'Dozorci',
	'group-oversight-member' => 'dozorce',
	'grouppage-oversight' => '{{ns:project}}:Dozorci',
	'right-oversight' => 'Zobrazování dříve skryté revize',
	'right-hiderevision' => 'Prohlížení a obnovování revizí skrytých před správci',
	'hiderevision-prompt' => 'Číslo revize, která se má odstranit:',
	'hiderevision-continue' => 'Pokračovat',
	'hiderevision-text' => "Tato funkce by se měla využívat '''pouze''' v následujících případech:
* Nevhodné osobní informace
*: ''domácí adresy a telefonní čísla, rodná čísla apod.''

'''Zneužití tohoto systému povede k odebrání práv.'''

Odstraněné položky nebude moci prostřednictvím webové stránky vidět nikdo, ale o mazáních se vede záznam a v případě chyby je může správce databáze ručně vrátit.",
	'hiderevision-reason' => 'Důvod (bude zaznamenán neveřejně):',
	'hiderevision-submit' => 'Natrvalo skrýt tyto údaje',
	'hiderevision-tab' => 'Skrýt revizi',
	'hiderevision-link' => 'Skryté příspěvky uživatele',
	'hiderevision-norevisions' => 'Nebyly uvedeny revize, které se mají skrýt.',
	'hiderevision-noreason' => 'Musíte uvést důvod odstranění.',
	'hiderevision-status' => 'Revize $1: $2',
	'hiderevision-success' => 'Úspěšně archivováno a smazáno.',
	'hiderevision-error-missing' => 'Nenalezeno v databázi.',
	'hiderevision-error-current' => 'Nelze smazat poslední úpravu stránky. Nejprve tuto změnu vraťte.',
	'hiderevision-error-delete' => 'Nebylo možno archivovat; bylo už předtím smazáno.',
	'hiderevision-archive-status' => 'Smazané revize počínaje od $1: $2',
	'oversight-nodiff' => 'Není možné porovnat změny, neboť momentálně neexistuje předchozí revize stránky. Buď
* stránka byla smazána nebo
* tato skrytá revize byla první revize',
	'oversight-log-hiderev' => 'odstraňuje editaci stránky $1',
	'oversight' => 'Dozor',
	'oversight-view' => 'podrobnosti',
	'oversight-difference' => '(Rozdíl oproti předchozí zbývající revizi)',
	'oversight-prev' => 'Poslední předešlá revize',
	'oversight-hidden' => 'Skrytá revize',
	'oversight-header' => 'Níže je seznam revizí, které byly nedávno trvale skryty z veřejné historie. Šíření těchto informací může mít za důsledek trvalou ztrátu práv dozorce (oversight).',
	'oversight-legend' => 'Hledat v záznamu skrývání revizí',
	'oversight-oversighter' => 'Dozorce:',
	'oversight-offender' => 'Provinilec:',
);

/** Danish (Dansk)
 * @author Jan Friberg
 */
$messages['da'] = array(
	'right-hiderevision' => 'Gense og gendan versioner skjult for administratorer',
);

/** German (Deutsch)
 * @author Heuler06
 * @author Metalhead64
 * @author Purodha
 * @author Raimond Spekking
 */
$messages['de'] = array(
	'hiderevision' => 'Versionen dauerhaft entfernen',
	'hiderevision-desc' => 'Verbirgt aus juristischen Gründen einzelne Versionen vor allen Benutzern',
	'group-oversight' => 'Oversighter',
	'group-oversight-member' => 'Oversighter',
	'grouppage-oversight' => '{{ns:project}}:Oversight',
	'right-oversight' => 'Ansehen einer zuvor verborgenen Version',
	'right-hiderevision' => 'Ansehen und Wiederherstellen von Versionen, die auch vor Administratoren verborgen sind',
	'hiderevision-prompt' => 'Zu entfernende Versionsnummer:',
	'hiderevision-continue' => 'Weiter',
	'hiderevision-text' => "Dies darf '''ausschließlich''' in den folgenden Fällen geschehen:
* Persönliche Informationen:
*: ''Realname, Adresse, Telefonnummer und ähnlicher privater Details''

'''Der Missbrauch dieses Systems zieht den Verlust dieser Rechte nach sich!'''

Entfernte Versionen sind durch Niemanden mehr über die Website einzusehen.
Sie werden aber protokolliert und können bei einem Fehler durch einen Datenbankadministrator wiederhergestellt werden",
	'hiderevision-reason' => 'Grund (wird unsichtbar protokolliert):',
	'hiderevision-submit' => 'Entferne diese Version dauerhaft',
	'hiderevision-tab' => 'Entferne Versionen',
	'hiderevision-link' => 'Versteckte Benutzerbeiträge',
	'hiderevision-norevisions' => 'Es wurde keine Version zum Entfernen angegeben.',
	'hiderevision-noreason' => 'Du musst einen Grund für die Entfernung angeben.',
	'hiderevision-status' => 'Version $1: $2',
	'hiderevision-success' => 'Erfolgreich archiviert und entfernt.',
	'hiderevision-error-missing' => 'In der Datenbank nicht gefunden.',
	'hiderevision-error-current' => 'Die letzte Bearbeitung einer Seite kann nicht entfernt werden. Setze die Bearbeitung erst zurück.',
	'hiderevision-error-delete' => 'Archivierung nicht möglich. Wurde sie zuvor gelöscht?',
	'hiderevision-archive-status' => 'Gelöschte Versionen von $1: $2',
	'oversight-nodiff' => 'Es ist kein Versionsvergleich möglich, da es gegenwärtig keine frühere Version dieser Seite gibt. Mögliche Gründe:
*Die Seite wurde gelöscht
*Die entfernte Version war die erste Version',
	'oversight-log-hiderev' => 'entfernte eine Version von „$1“',
	'oversight' => 'Oversight',
	'oversight-view' => 'Details',
	'oversight-difference' => '(Unterschied zur vorhergehenden, verbleibenden Version)',
	'oversight-prev' => 'Letzte vorhergehende Version',
	'oversight-hidden' => 'Entfernte Version',
	'oversight-header' => 'Es folgt die Liste der dauerhaft für die öffentliche Einsicht entfernten Versionen. Die Veröffentlichung dieser Informationen kann den dauerhaften Entzug der Oversight-Rechte bedeuten.',
	'oversight-legend' => 'Logbuch durchsuchen',
	'oversight-oversighter' => 'Oversight-Berechtigter:',
	'oversight-offender' => 'Benutzer:',
);

/** German (formal address) (Deutsch (Sie-Form))
 * @author Raimond Spekking
 */
$messages['de-formal'] = array(
	'hiderevision-noreason' => 'Sie müssen einen Grund für die Entfernung angeben.',
	'hiderevision-error-current' => 'Die letzte Bearbeitung einer Seite kann nicht entfernt werden. Setzen Sie die Bearbeitung erst zurück.',
);

/** Greek (Ελληνικά)
 * @author Badseed
 * @author Consta
 * @author ZaDiak
 */
$messages['el'] = array(
	'right-oversight' => 'Δείτε μια προηγουμένως κρυφή έκδοση',
	'hiderevision-prompt' => 'Αριθμός έκδοσης προς αφαίρεση:',
	'hiderevision-continue' => 'Συνέχεια',
	'hiderevision-tab' => 'Απόκρυψη της έκδοσης',
	'hiderevision-link' => 'Κρυφές επεξεργασίες χρήστη',
	'hiderevision-status' => 'Έκδοση $1: $2',
	'hiderevision-error-missing' => 'Δεν βρέθηκε στην βάση δεδομένων.',
	'oversight-view' => 'λεπτομέρειες',
	'oversight-prev' => 'Τελευταία προηγούμενη έκδοση',
	'oversight-hidden' => 'Κρυφή έκδοση',
);

/** Esperanto (Esperanto)
 * @author Yekrats
 */
$messages['eo'] = array(
	'hiderevision' => 'Porĉiame kaŝi versiojn',
	'hiderevision-desc' => 'Kaŝi individuajn versiojn de ĉiuj uzantoj por leĝaj kialoj, ktp.',
	'group-oversight' => 'Kontrolantoj',
	'group-oversight-member' => 'Kontrolado',
	'grouppage-oversight' => '{{ns:project}}:Kontrolado',
	'right-oversight' => 'Rigardi antaŭe kaŝitan version',
	'right-hiderevision' => 'Kontroli kaj malforigi versiojn kaŝitajn de administrantoj',
	'hiderevision-prompt' => 'Nombro de versio por forigi:',
	'hiderevision-continue' => 'Daŭrigi',
	'hiderevision-text' => "Ĉi tiu ago '''nur''' estu uzata por la jenaj kazoj:
* Netaŭga persona informo
*: ''hejmaj adresoj kaj nombroj de telefono, personaj ŝtataj nombroj de identigo, ktp''

'''Misuzo de ĉi tiu sistemo kaŭzos perdon de privilegioj.'''

Forigitaĵoj ne estos videbla al iu ajn per la retejo, sed la forigoj estas skribita en la protokolo kaj povas esti restarigita de datumbaza administranto se eraro estas farita.",
	'hiderevision-reason' => 'Kialo (estos protokolita private)',
	'hiderevision-submit' => 'Kaŝi ĉi tiujn datenojn ĉiam',
	'hiderevision-tab' => 'Kaŝi version',
	'hiderevision-link' => 'Kaŝitaj kontribuoj de uzanto',
	'hiderevision-norevisions' => 'Neniuj versioj specifigita por forigo.',
	'hiderevision-noreason' => 'Vi nepre priskribu la kialon por ĉi tiu forigo.',
	'hiderevision-status' => 'Versio $1: $2',
	'hiderevision-success' => 'Arkivita kaj forigita sukcese.',
	'hiderevision-error-missing' => 'Ne trovita en datumbazo.',
	'hiderevision-error-current' => 'Ne povas forigi la lastan redakton de paĝo.
Malfaru ĉi tiun ŝanĝon antaŭe.',
	'hiderevision-error-delete' => 'Ne povas aldoni al arkivo. Ĉu ĝi estis antaŭe forigita?',
	'hiderevision-archive-status' => 'Forigis version de $1: $2',
	'oversight-nodiff' => 'Ne eblas sekvi ŝanĝojn ĉar estas nun neniu antaŭa versio por la paĝo. Aŭ:
* La paĝo estis forigita
* Ĉi tiu kaŝita versio estis la unua versio',
	'oversight-log-hiderev' => 'forigis redakton de $1',
	'oversight' => 'Kontrolado',
	'oversight-view' => 'detaloj',
	'oversight-difference' => '(Diferenco de la antaŭa lasta versio)',
	'oversight-prev' => 'Lasta antaŭa versio',
	'oversight-hidden' => 'Kaŝita versio',
	'oversight-header' => 'Jen listo de versioj laste daŭre kaŝitaj de publika vido.
Dono de ĉi tiu informo eble povus rezulti en daŭra malgajno de Kontrolanto-rajtoj.',
	'oversight-legend' => 'Serĉi protokolon pri revizia kaŝado',
	'oversight-oversighter' => 'Zorganto:',
	'oversight-offender' => 'Ofendanto:',
);

/** Spanish (Español)
 * @author Aleator
 * @author Imre
 * @author Remember the dot
 * @author Sanbec
 * @author Titoxd
 */
$messages['es'] = array(
	'hiderevision' => 'Esconder revisiones permanentemente',
	'hiderevision-desc' => 'Esconde revisiones individuales de todos los usuarios para motivos legales etc.',
	'group-oversight' => 'Oversighters',
	'group-oversight-member' => 'supervisor',
	'grouppage-oversight' => '{{ns:project}}:Supervisión',
	'right-oversight' => 'Ver una revisión anteriormente escondida',
	'right-hiderevision' => 'Revisar y restaurar revisiones ocultadas por los administradores',
	'hiderevision-prompt' => 'Número de revisión a ocultar:',
	'hiderevision-continue' => 'Seguir',
	'hiderevision-text' => "Esto '''sólo''' se debería usar en los siguientes casos:
* Información personal no apropiada
*: ''domilicios, números de teléfono, documentos de identidad, etc.''

'''El abuso de este sistema llevará consigo la pérdida de privilegios.'''

Los elementos eliminados no serán visibles por nadie en todo el sitio web, pero los borrados quedan registrados y podrían ser restaurados manualmente por un administrador de la base de datos si cometieras un error.",
	'hiderevision-reason' => 'Motivo (será registrado privadamente):',
	'hiderevision-submit' => 'Esconder estos datos permanentemente',
	'hiderevision-tab' => 'Esconder revisión',
	'hiderevision-link' => 'Contribuciones ocultas de usuario',
	'hiderevision-norevisions' => 'No se han especificado revisiones para borrar.',
	'hiderevision-noreason' => 'Debes describir el motivo de esta eliminación.',
	'hiderevision-status' => 'Revisión $1: $2',
	'hiderevision-success' => 'Se archivó y se borró con éxito.',
	'hiderevision-error-missing' => 'No encontrado en la base de datos.',
	'hiderevision-error-current' => 'No se puede borrar la última edición de una página.
Revierte antes el cambio.',
	'hiderevision-error-delete' => 'No se pudo archivar; ¿fue borrada anteriormente?',
	'hiderevision-archive-status' => 'Revisión borrada de $1: $2',
	'oversight-nodiff' => 'Fue imposible seguir las modificaciones ya que no existe actualmente una revisión anterior de esta página. Puede que:
*La página fuera borrada
*Esta revisión oculta fuera la primera.',
	'oversight-log-hiderev' => 'eliminada una edición de $1',
	'oversight' => 'Supervisión',
	'oversight-view' => 'detalles',
	'oversight-difference' => '(Diferencia de revisión anterior restante)',
	'oversight-prev' => 'Última revisión anterior',
	'oversight-hidden' => 'Revisión escondida',
	'oversight-header' => 'Debajo hay una lista de revisiones ocultas permanentemente a la vista pública.
Hacer pública esta información puede provocar la pérdida definitiva de los privilegios de supervisión.',
	'oversight-legend' => 'Registro de búsqueda de revisiones ocultas',
	'oversight-oversighter' => 'Supervisor:',
	'oversight-offender' => 'Contraventor:',
);

/** Basque (Euskara) */
$messages['eu'] = array(
	'hiderevision' => 'Berrikuspenak mugagabe ezkutatu',
	'hiderevision-prompt' => 'Ezabatzeko berrikuspen zenbakia:',
	'hiderevision-continue' => 'Jarraitu',
	'hiderevision-text' => "Hau hurrengo kasuetan erabili beharko litzateke '''soilik''':
* Informazio pertsonal ezegokia
*: ''etxeko helbide eta telefono zenbakiak, segurtasun sozialeko zenbakiak, eta abar''

'''Sistema hau gaizki erabiltzeak pribilegioak galtzea suposatu dezake.'''

Ezabatutakoak ezin izango inork ikusi, baina akats bat eginez gero ezabaketak gordeta daude eta eskuz leheneratu ditzake datu-basearen administratzaile batek.",
	'hiderevision-reason' => 'Arrazoia (modu pribatuan gordeko da):',
	'hiderevision-submit' => 'Datu hauek mugagabe ezkutatu',
	'hiderevision-tab' => 'Berrikuspena ezkutatu',
	'hiderevision-norevisions' => 'Ez da berrikuspenik zehaztu ezabatzeko.',
	'hiderevision-noreason' => 'Ezabaketa hau burutzeko arraozoia zehaztu beharra daukazu.',
	'hiderevision-status' => '$1 berrikuspena: $2',
	'hiderevision-success' => 'Artxibatu eta ezabatu egin da.',
	'hiderevision-error-missing' => 'Ez da datu-basean aurkitu.',
	'hiderevision-error-current' => 'Ezin da orrialdean egindako azken aldaketa ezabatu. Aldaketa hau desegin lehenago.',
	'hiderevision-error-delete' => 'Ezin izan da artxibatu; lehenago ezabatu egin da?',
	'hiderevision-archive-status' => '$1(e)tik berrikuspena ezabatu da: $2',
	'oversight-log-hiderev' => '$1(e)tik aldaketa bat ezabatu da',
	'oversight' => 'Oharkabetasuna',
	'oversight-view' => 'xehetasunak',
);

/** Persian (فارسی)
 * @author Huji
 */
$messages['fa'] = array(
	'hiderevision' => 'پنهان کردن همیشگی نسخه‌ها',
	'hiderevision-desc' => 'پنهان کردن نسخه‌های خاص از تمام کاربرها به دلایل قانونی و غیره',
	'group-oversight' => 'ناظران',
	'group-oversight-member' => 'ناظر',
	'grouppage-oversight' => '{{ns:project}}:ناظر',
	'right-oversight' => 'مشاهدهٔ نسخه‌ای که قبلاً پنهان شده',
	'right-hiderevision' => 'بازبینی و احیای نسخه‌هایی که از مدیران پنهان شده‌است',
	'hiderevision-prompt' => 'شماره نسخه‌ای که حذف می‌شود:',
	'hiderevision-continue' => 'ادامه',
	'hiderevision-text' => "این قابلیت '''فقط''' در موارد زیر باید استفاده شود:
* اطلاعات شخصی نامناسب
*: ''نشانی منزل و شماره تلفن، غیره''

'''سوء استفاده از این امکانات ممکن است به از دست دادن اختیارات منجر شود.'''

مواردی که حذف می‌شوند توسط هیچ کاربر در وبگاه قابل دیدن نخواهند بود،
اما این موارد در سیاهه مربوط به آن ثبت می‌شوند و اگر اشتباهی صورت بگیرد
توسط مدیر پایگاه داده قابل برگشت خواهد بود.",
	'hiderevision-reason' => 'دلیل (به طور خصوصی ثبت می‌شود):',
	'hiderevision-submit' => 'پنهان کردن همیشگی این اطلاعات',
	'hiderevision-tab' => 'پنهان کردن نسخه',
	'hiderevision-link' => 'ویرایش‌های پنهان شدهٔ کاربر',
	'hiderevision-norevisions' => 'نسخه‌ای برای حذف مشخص نشده بود.',
	'hiderevision-noreason' => 'باید دلیل این حذف را توضیح دهید.',
	'hiderevision-status' => 'نسخه $1: $2',
	'hiderevision-success' => 'با موفقیت بایگانی و حذف شد.',
	'hiderevision-error-missing' => 'در پایگاه داده پیدا نشد.',
	'hiderevision-error-current' => 'آخرین ویرایش یک صفحه را نمی‌توان حذف کرد. ابتدا آخرین تغییر را واگردانی کنید.',
	'hiderevision-error-delete' => 'امکان بایگانی کردن وجود نداشت؛ آیا قبلاً حذف شده‌است؟',
	'hiderevision-archive-status' => 'نسخه‌ای از $1 را حذف کرد: $2',
	'oversight-nodiff' => 'امکان ردیابی تغییرات وجود ندارد چرا که این صفحه در حال حاضر نسخهٔ قدیمی‌تری ندارد. احتمالاً:
*صفحه حذف شده‌است
*نسخهٔ پنهان شده اولین نسخهٔ صفحه بوده‌است',
	'oversight-log-hiderev' => 'نسخه‌ای از $1 را حذف کرد',
	'oversight' => 'ناظر',
	'oversight-view' => 'بیشتر',
	'oversight-difference' => '(تفاوت از آخرین نسخه باقی مانده قبلی)',
	'oversight-prev' => 'آخرین نسخه قبلی',
	'oversight-hidden' => 'نسخهٔ پنهان شده',
	'oversight-header' => 'در زیر فهرستی از نسخه‌هایی که به تازگی از دید عموم برای همیشه حذف شده‌اند را می‌بینید.
منتشر کردن این اطلاعات می‌تواند به از دست دادن همیشگی اختیارات شما بینجامد.',
	'oversight-legend' => 'جستجو در سیاهه پنهان‌سازی نسخه‌ها',
	'oversight-oversighter' => 'ناظر:',
	'oversight-offender' => 'متخلف:',
);

/** Finnish (Suomi)
 * @author Agony
 * @author Cimon Avaro
 * @author Crt
 * @author Nike
 */
$messages['fi'] = array(
	'hiderevision' => 'Versioiden pysyvä piilottaminen',
	'hiderevision-desc' => 'Mahdollistaa yksittäisten muokkausversioiden piilottamisen käyttäjiltä esimerkiksi lakisyistä.',
	'group-oversight' => 'häivyttäjät',
	'group-oversight-member' => 'häivyttäjä',
	'grouppage-oversight' => '{{ns:project}}:Häivytysoikeudet',
	'right-oversight' => 'Nähdä häivytetty versio',
	'right-hiderevision' => 'Tarkastella ja palauttaa ylläpitäjiltä piilotettuja versioita',
	'hiderevision-prompt' => 'Poistettava versionumero',
	'hiderevision-continue' => 'Jatka',
	'hiderevision-text' => "Tätä toimintoa tulisi käyttää '''vain''' seuraavissa tapauksissa:
* Sopimattomat henkilötiedot
*: ''esim. kotiosoitteet, puhelinnumerot ja henkilötunnukset.''

'''Tämän järjestelmän väärinkäyttö johtaa käyttöoikeuksien menetykseen.'''

Poistetut kohteet eivät näy kenellekään web-sivuston kautta, mutta kaikki poistot kirjataan ja tietokannan ylläpitäjä voi manuaalisesti palauttaa vahingossa poistetut kohteet.",
	'hiderevision-reason' => 'Syy (kirjataan yksityisesti)',
	'hiderevision-submit' => 'Piilota pysyvästi nämä tiedot',
	'hiderevision-tab' => 'Piilota versio',
	'hiderevision-link' => 'Piilotetut muokkaukset',
	'hiderevision-norevisions' => 'Poistettavaa versiota ei ole määritetty.',
	'hiderevision-noreason' => 'Poistosyy on määritettävä.',
	'hiderevision-status' => 'Versio $1: $2',
	'hiderevision-success' => 'Arkistoitu ja poistettu onnistuneesti.',
	'hiderevision-error-missing' => 'Ei löydy tietokannasta.',
	'hiderevision-error-current' => 'Sivun viimeisintä muokkausta ei voi poistaa. Palauta muutos ensin.',
	'hiderevision-error-delete' => 'Arkistointi epäonnistui. Kenties se on jo aiemmin poistettu?',
	'hiderevision-archive-status' => 'Poistettu versio $1: $2',
	'oversight-nodiff' => 'Muutostenseuranta ei ollut mahdollista koska sivulla ei ole aikaisempaa versiota. Mahdollisia syitä:
* Sivu on poistettu tai
* Häivytetty versio oli sivun ensimmäinen versio',
	'oversight-log-hiderev' => 'poisti muokkauksen sivulta $1',
	'oversight' => 'Häivytys',
	'oversight-view' => 'tiedot',
	'oversight-difference' => '(Ero edelliseen jäljelle jääneeseen versioon)',
	'oversight-prev' => 'Viimeisin edellinen versio',
	'oversight-hidden' => 'Piilotettu versio',
	'oversight-header' => 'Alla on lista pysyvästi piilotetuista versioista, jotka eivät näy julkisesti. Näiden tietojen julkaiseminen voi johtaa tämän työkalun käyttöoikeuksien menetykseen.',
	'oversight-legend' => 'Etsi häivytyslokista',
	'oversight-oversighter' => 'Häivyttäjä:',
	'oversight-offender' => 'Käyttäjä:',
);

/** Faroese (Føroyskt)
 * @author Spacebirdy
 */
$messages['fo'] = array(
	'oversight' => 'Yvirlit',
);

/** French (Français)
 * @author Grondin
 * @author IAlex
 * @author Meithal
 * @author Sherbrooke
 * @author Urhixidur
 */
$messages['fr'] = array(
	'hiderevision' => 'Cacher définitivement les révisions',
	'hiderevision-desc' => 'Masque les modifications individuelles de tous les utilisateurs pour des motifs légaux, etc.',
	'group-oversight' => 'Superviseurs',
	'group-oversight-member' => 'Superviseur',
	'grouppage-oversight' => '{{ns:project}}:Superviseur',
	'right-oversight' => 'Voir les révisions cachées par supervision',
	'right-hiderevision' => 'Examiner et restaurer les revisions masquées aux administrateurs',
	'hiderevision-prompt' => 'Numéro d’édition à supprimer :',
	'hiderevision-continue' => 'Continuer',
	'hiderevision-text' => "Cette fonctionnalité doit être utilisée '''uniquement''' pour les cas suivants :
* Information personnelle inappropriée,
*: ''Adresse personnelle et numéro de téléphone, numéro de sécurité sociale, etc...''

''' L'abus de cette fonctionnalité impliquera la perte de ces privilèges.'''

Les articles effacés ne sont plus visibles dans ce système, mais ces suppressions sont journalisées et peuvent être restaurées manuellement par un administrateur ayant l'accès direct sur la base de données si vous avez fait une erreur.",
	'hiderevision-reason' => 'Motif (sera enregistré séparément) :',
	'hiderevision-submit' => 'Cacher cette révision de manière permanente',
	'hiderevision-tab' => 'Cacher la modification',
	'hiderevision-link' => "Contributions cachées de l'utilisateur",
	'hiderevision-norevisions' => 'Aucune modification indiquée à supprimer.',
	'hiderevision-noreason' => 'Vous devez indiquer la raison précise de cette suppression.',
	'hiderevision-status' => 'Modification $1 : $2',
	'hiderevision-success' => 'Archivé et supprimé avec succès.',
	'hiderevision-error-missing' => 'Non trouvé dans la base de données.',
	'hiderevision-error-current' => 'Ne peut supprimer la dernière révision dans une page. Faites une annulation d’édition auparavant.',
	'hiderevision-error-delete' => 'Ne peut être archivé ; la page aurait-elle été supprimée ?',
	'hiderevision-archive-status' => 'Modification supprimée de $1 : $2',
	'oversight-nodiff' => 'Impossible de détecter des changements tant que ne se trouve aucune révision antérieure pour la page. Les raisons peuvent être les suivantes :
*La page a été supprimée,
*La révision cachée était la toute première de la page',
	'oversight-log-hiderev' => 'a supprimé une édition de $1',
	'oversight' => 'Supervision',
	'oversight-view' => 'détails',
	'oversight-difference' => '(Différence par rapport à la révision précédente)',
	'oversight-prev' => 'Dernière révision précédente',
	'oversight-hidden' => 'Révision cachée',
	'oversight-header' => 'Ci-dessous figure la liste des révisions cachées de manière permanente au public. La divulgation de cette information peut avoir comme conséquence la déchéance des privilèges de {{MediaWiki:Oversight}}.',
	'oversight-legend' => 'Journal des recherches des versions cachées',
	'oversight-oversighter' => 'Superviseur :',
	'oversight-offender' => 'Diffamateur :',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'hiderevision' => 'Cachiér por de bon les vèrsions',
	'hiderevision-desc' => 'Mâsque les modificacions endividuèles de tôs los utilisators por des rêsons lègâles, etc.',
	'hiderevision-prompt' => 'Numerô de vèrsion a suprimar :',
	'hiderevision-continue' => 'Continuar',
	'hiderevision-text' => "Ceta fonccionalitât dêt étre utilisâ '''ren que''' por los câs siuvents :
* Enformacions a sè que vont pas avouéc :
*: ''Adrèce a sè et numerô de tèlèfone, numerô de sècuritât sociâla, etc...''

'''L’abus de ceta fonccionalitât arat coment consèquence la pèrta de celos privilèjos.'''

Los articllos èfaciês sont pas més visiblos dens ceti sistèmo, mas celes suprèssions sont jornalisâs et pôvont étre rèstorâs manuèlament per un administrator èyent l’accès drêt sur la bâsa de balyês se vos éd fêt una èrror.",
	'hiderevision-reason' => 'Rêson (serat enregistrâ sèparament) :',
	'hiderevision-submit' => 'Cachiér ceta balyê de maniére durâbla',
	'hiderevision-tab' => 'Cachiér la vèrsion',
	'hiderevision-norevisions' => 'Niona vèrsion endicâ a suprimar.',
	'hiderevision-noreason' => 'Vos dête endicar la rêson prècisa de ceta suprèssion.',
	'hiderevision-status' => 'Vèrsion $1 : $2',
	'hiderevision-success' => 'Arch·ivâ et suprimâ avouéc reusséta.',
	'hiderevision-error-missing' => 'Pas trovâ dens la bâsa de balyês.',
	'hiderevision-error-current' => 'Pôt pas suprimar la dèrriére vèrsion dens una pâge. Féte una anulacion d’èdicion dês devant.',
	'hiderevision-error-delete' => 'Pôt pas étre arch·ivâ ; la pâge arêt-el étâ suprimâ ?',
	'hiderevision-archive-status' => 'Vèrsion suprimâ de $1 : $2',
	'oversight-nodiff' => 'Empossiblo de dècelar des changements tant que sè trove gins de vèrsion prècèdenta por la pâge. Les rêsons pôvont étre les siuventes :
*La pâge at étâ suprimâ.
*La vèrsion cachiê ére la tota premiére de la pâge.',
	'oversight-log-hiderev' => 'at suprimâ una èdicion de $1',
	'oversight' => 'Survelyér',
	'oversight-view' => 'dètalys',
	'oversight-difference' => '(Difèrence per rapôrt a la vèrsion prècèdenta)',
	'oversight-prev' => 'Dèrriére vèrsion prècèdenta',
	'oversight-hidden' => 'Vèrsion cachiê',
	'oversight-header' => 'Ce-desot, figure la lista de les vèrsions cachiês de maniére durâbla u publico. La publecacion de ceta enformacion pôt avêr coment consèquence la pèrta des privilèjos de survelyence.',
);

/** Friulian (Furlan)
 * @author Klenje
 */
$messages['fur'] = array(
	'hiderevision-status' => 'Revision $1: $2',
	'oversight-view' => 'detais',
);

/** Irish (Gaeilge)
 * @author Alison
 */
$messages['ga'] = array(
	'hiderevision-continue' => 'Lean',
	'hiderevision-tab' => 'Folagh leasú',
	'hiderevision-status' => 'Leasú $1: $2',
	'hiderevision-archive-status' => 'Leasú scriosta as $1: $2',
);

/** Galician (Galego)
 * @author Alma
 * @author Toliño
 * @author Xosé
 */
$messages['gl'] = array(
	'hiderevision' => 'Agochar revisións permanentemente',
	'hiderevision-desc' => 'Agocha as revisións individuais da vista dos demais usuarios por motivos legais, etc.',
	'group-oversight' => 'Supervisores',
	'group-oversight-member' => 'Supervisor',
	'grouppage-oversight' => '{{ns:project}}:Supervisor',
	'right-oversight' => 'Ver unha revisión agochada previa',
	'right-hiderevision' => 'Revisar e restaurar as revisións agochadas dos administradores',
	'hiderevision-prompt' => 'Número de revisión a eliminar:',
	'hiderevision-continue' => 'Continuar',
	'hiderevision-text' => "Isto debe ser usado '''só''' para os seguintes casos:
* Información persoal inapropiada
*:''Enderezos e números de teléfono, números de seguridade social, etcétera''

'''O uso indebido deste sistema terá como resultado a pérdida de privilexios.'''

Os elementos eliminados non serán visíbeis para calquera persoa a través da páxina web,
pero as supresións son rexistradas e poden ser restauradas de forma manual por un
administrador das bases de datos no caso de que vostede cometa un erro.",
	'hiderevision-reason' => 'Motivo (rexistrarase de maneira privada):',
	'hiderevision-submit' => 'Agochar estes datos permanentemente',
	'hiderevision-tab' => 'Agochar revisión',
	'hiderevision-link' => 'Contribucións agochadas do usuario',
	'hiderevision-norevisions' => 'Non se especificaron revisións para eliminar.',
	'hiderevision-noreason' => 'Debe describir o motivo para esta eliminación.',
	'hiderevision-status' => 'Revisión $1: $2',
	'hiderevision-success' => 'Arquivada e eliminada sen problemas.',
	'hiderevision-error-missing' => 'Non se atopou na base de datos.',
	'hiderevision-error-current' => 'Non se puido eliminar a última edición dunha páxina. Desfaga esta modificación primeiro.',
	'hiderevision-error-delete' => 'Non se puido arquivar; foi eliminada con anterioridade?',
	'hiderevision-archive-status' => 'Revisión eliminada de "$1": $2',
	'oversight-nodiff' => 'Foi imposíbel seguir as modificacións xa que non existe actualmente unha revisión anterior desta páxina. Pode que:
*Se eliminase a páxina
*Esta revisión agochada sexa a primeira revisión',
	'oversight-log-hiderev' => 'eliminouse unha edición de $1',
	'oversight' => 'Supervisión',
	'oversight-view' => 'detalles',
	'oversight-difference' => '(Diferenza das anteriores pendentes de revisión)',
	'oversight-prev' => 'Última revisión anterior',
	'oversight-hidden' => 'Revisión agochada',
	'oversight-header' => 'Embaixo amósase unha listaxe recente das revisións ocultas permanentemente á opinión pública.
Á liberación desta información pode resultar na perda permanente dos privilexios de Supervisión.',
	'oversight-legend' => 'Rexistro de procura de revisións agochadas',
	'oversight-oversighter' => 'Supervisor:',
	'oversight-offender' => 'Delincuente:',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'group-oversight-member' => 'παρόραμα',
	'oversight' => 'παρόραμα',
	'oversight-view' => 'λεπτομέρειαι',
	'oversight-oversighter' => 'Παρόραμα:',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'hiderevision' => 'Versione fir immer useneh',
	'hiderevision-desc' => 'Verbirgt us juristische Grind einzelni Versione vor allene Benutzern',
	'group-oversight' => 'Oversighter',
	'group-oversight-member' => 'Oversighter',
	'grouppage-oversight' => '{{ns:project}}:Oversight',
	'right-oversight' => 'E Version aaluege, wu bis jetz verborge gsi sich',
	'right-hiderevision' => 'Versione aaluege un widerherstelle, wu au vor Ammanne verborge si',
	'hiderevision-prompt' => 'Versionsnummere wu sott usegnuh wäre:',
	'hiderevision-continue' => 'Wyter',
	'hiderevision-text' => "Des derf '''ussschliessli numme''' in dääne Fäll gschäh:
* Persenligi Informatione:
*: ''Realname, Adräss, Telifonnummere un ähnlige private Detail''

'''Dr Missbruuch vu däm Syschtem zieht dr Verluscht vu däne Rächt noch sich!'''

Versione, wu usegnuh wore sin, chenne vu niemerem meh iber d Website aagluegt wäre. Si wäre aber protokolliert un chenne bi me Fähler dur e Datebankadministrator widerhärgstellt wäre",
	'hiderevision-reason' => 'Grund (wird uusichtbar protokolliert):',
	'hiderevision-submit' => 'Nimm die Version fir immer use',
	'hiderevision-tab' => 'Version useneh',
	'hiderevision-link' => 'Versteckti Benutzerbyyträg',
	'hiderevision-norevisions' => 'S isch kei Version aagee wore zum Useneh.',
	'hiderevision-noreason' => 'Du muesch e Grund aagee fir s Useneh.',
	'hiderevision-status' => 'Version $1: $2',
	'hiderevision-success' => 'Mit Erfolg archiviert un usegnuh.',
	'hiderevision-error-missing' => 'Nit gfunde in dr Datebank.',
	'hiderevision-error-current' => 'Di letscht Bearbeitig vun ere Syte cha nit usegnuh wäre. Setz d Bearbeitig zerscht zruck.',
	'hiderevision-error-delete' => 'D Archivierung isch nit megli. Isch si glescht wore?',
	'hiderevision-archive-status' => 'Gleschti Versione vu $1: $2',
	'oversight-nodiff' => 'S isch kei Versionsverglych megli, wel s im Momänt kei friejeri Version vu däre Syte git. Megligi Grind:
*D Syte isch glescht wore
*D Version, wu usegnuh woren isch, isch di erscht gsi',
	'oversight-log-hiderev' => 'het e Version vu „$1“ usegnuh',
	'oversight' => 'Oversight',
	'oversight-view' => 'Detail',
	'oversight-difference' => '(Unterschid zue dr vorige Version wu blybt)',
	'oversight-prev' => 'Letschti vorigi Version',
	'oversight-hidden' => 'Version wu usegnuh isch',
	'oversight-header' => 'Do chunnt e Lischt mit dr Versione, wu fir immer usegnuh wore sin zum effentli aaluege. D Vereffentlichung vu däne Informatione cha bedyte, ass eim fir immer d Oversight-Rächt ewäggnuh wäre.',
	'oversight-legend' => 'Logbuech dursueche',
	'oversight-oversighter' => 'Oversight-Berächtigter:',
	'oversight-offender' => 'Benutzer:',
);

/** Hebrew (עברית)
 * @author Rotem Liss
 */
$messages['he'] = array(
	'hiderevision' => 'מחיקת גרסאות לצמיתות',
	'hiderevision-desc' => 'הסתרת גרסאות מסוימות מכל המשתמשים, מסיבות חוקיות וכדומה',
	'group-oversight' => 'מסתירים',
	'group-oversight-member' => 'מסתיר',
	'grouppage-oversight' => '{{ns:project}}:מסתיר',
	'right-oversight' => 'צפייה בגרסה שהוסתרה',
	'right-hiderevision' => 'בדיקה ושחזור של גרסאות המוסתרות ממפעילי המערכת',
	'hiderevision-prompt' => 'מספר גרסה למחיקה:',
	'hiderevision-continue' => 'המשך',
	'hiderevision-text' => "יש להשתמש באפשרות זו '''אך ורק''' במקרים הבאים:
* פרסום מידע אישי
*: '''כתובות, מספרי טלפון וכדומה'''

'''שימוש לרעה במערכת יגרום לאובדן הסמכויות.'''

הפריטים שהוסרו לא יהיו גלויים לאיש דרך האתר עצמו, אבל נשמר יומן של המחיקות ומנהל מסד הנתונים יכול לשחזר אותן ידנית אם תתבצע טעות.",
	'hiderevision-reason' => 'סיבה (תיכתב ביומן פרטי):',
	'hiderevision-submit' => 'מחיקת המידע הזה לצמיתות',
	'hiderevision-tab' => 'הסתרת גרסאות',
	'hiderevision-link' => 'תרומות משתמש מוסתרות',
	'hiderevision-norevisions' => 'לא נבחרו גרסאות למחיקה.',
	'hiderevision-noreason' => 'עליכם לכתוב את הסיבה להסרה זו.',
	'hiderevision-status' => 'גרסה $1: $2',
	'hiderevision-success' => 'נמחקה בהצלחה.',
	'hiderevision-error-missing' => 'לא נמצאה במסד הנתונים.',
	'hiderevision-error-current' => 'לא ניתן למחוק את הגרסה האחרונה בדף. ראשית יש לשחזר את השינוי.',
	'hiderevision-error-delete' => 'לא ניתן למחוק; אולי הגרסה כבר נמחקה.',
	'hiderevision-archive-status' => 'נמחקה גרסה של $1: $2',
	'oversight-nodiff' => 'לא ניתן לעקוב אחרי השינויים כיוון שאין כרגע שום גרסה קודמת לדף זה. ייתכן ש:
* הדף נמחק
* הגרסה שהוסתרה הייתה הגרסה האחרונה',
	'oversight-log-hiderev' => 'הסיר עריכה מהדף $1',
	'oversight' => 'צפייה בגרסאות שהוסתרו',
	'oversight-view' => 'פרטים',
	'oversight-difference' => '(שינויים מהגרסה הקודמת שנשארה)',
	'oversight-prev' => 'הגרסה הקודמת',
	'oversight-hidden' => 'גרסה מוסתרת',
	'oversight-header' => 'להלן רשימת גרסאות שנמחקו לאחרונה לצמיתות מתצוגה ציבורית.
שחרור מידע זה לציבור עלול לגרום להסרה לצמיתות של ההרשאות.',
	'oversight-legend' => 'חיפוש ביומן הסתרת הגרסאות',
	'oversight-oversighter' => 'מסתיר הגרסה:',
	'oversight-offender' => 'מחבר הגרסה:',
);

/** Hindi (हिन्दी)
 * @author Kaustubh
 * @author Shyam
 */
$messages['hi'] = array(
	'hiderevision' => 'अवतरण हमेशा के लिये छुपायें',
	'hiderevision-desc' => 'कानूनी कारणोंसे हर अवतरण सदस्योंसे हमेशा के लिये छुपायें।',
	'group-oversight' => 'ओवरसाईट अधिकारी',
	'group-oversight-member' => 'ओवरसाईट',
	'grouppage-oversight' => '{{ns:project}}:ओवरसाईट',
	'right-oversight' => 'पहले छुपाया हुआ अवतरण देखें',
	'right-hiderevision' => 'छुपायें हुए अवतरण देखें और पुनर्स्थापित करें',
	'hiderevision-prompt' => 'हटाने योग्य अवतरण का क्रमांक:',
	'hiderevision-continue' => 'कन्टिन्यू',
	'hiderevision-text' => "यह '''केवल''' निम्न स्थितियों में उपयोगी है:
*अनुपयुक्त व्यक्तिगत सूचना
*: '''गृह पता और दूरभाष क्रमांक, सामाजिक सुरक्षा क्रमांक, इत्यादि'''

'''इस तंत्र के बारे में अपशब्द कहने पर विशेषाधिकार छीन लिए जायेंगे।'''

वेब साईट के जरिये किसी को भी हटाये गए अंश दिखाई नहीं देंगे, लेकिन यदि आपने कोई गलती कर दी हो तो, निकाले गए अंश अभिलेखित हो जाते हैं और डेटाबेस प्रशासक उन्हें प्रतिस्थापित कर सकता है।",
	'hiderevision-reason' => 'कारण (यह अलग रखा जायेगा):',
	'hiderevision-submit' => 'यह डाटा हमेशाके लिये छुपायें',
	'hiderevision-tab' => 'अवतरण छुपायें',
	'hiderevision-norevisions' => 'हटाने योग्य अवतरण का क्रमांक दिया नहीं हैं।',
	'hiderevision-noreason' => 'हटाने का कारण देना अनिवार्य हैं।',
	'hiderevision-status' => 'अवतरण $1: $2',
	'hiderevision-success' => 'आर्चिव्ह करके हटा दिया।',
	'hiderevision-error-missing' => 'डाटाबेसमें मिला नहीं।',
	'hiderevision-error-current' => 'इस पन्ने में हाल में हुए बदलाव हटा नहीं सकते.
पहले इन्हें पूर्ववत करें।',
	'hiderevision-error-delete' => 'आर्चिव्ह करू शकत नाही; क्या यह पन्ना पहले हटाया था?',
	'hiderevision-archive-status' => '$1 से अवतरण हटा दिये: $2',
	'oversight-nodiff' => 'इस पन्ने के पुराने अवतरण नहीं हैं, इसलिये फर्क नहीं देख सकते। कारण:
*यह पन्ना पहले से हटाया गया हैं या फिर
*छुपाया हुआ अवतरण इस पन्ने का पहला अवतरण हैं',
	'oversight-log-hiderev' => '$1 से एक बदलाव हटाया',
	'oversight' => 'ओवरसाईट',
	'oversight-view' => 'अधिक ज़ानकारी',
	'oversight-difference' => '(बचे हुए पुराने अवतरणोंमें फर्क)',
	'oversight-prev' => 'आखिरी पुराना अवतरण',
	'oversight-hidden' => 'छुपाया हुआ अवतरण',
	'oversight-header' => 'नीचे हाल में हमेशा के लिये छुपायें गयें अवतरणोंकी सूची हैं।
अगर इसे रिलिज कर दिया तो ओवरसाईट अधिकार हमेशा के लिये निकाल दिये जायेंगे।',
);

/** Croatian (Hrvatski)
 * @author Dalibor Bosits
 * @author Dnik
 * @author SpeedyGonsales
 * @author Suradnik13
 */
$messages['hr'] = array(
	'hiderevision' => 'Trajno sakrij uređivanja',
	'hiderevision-desc' => 'Sakrijte pojedine inačice od svih korisnika zbog pravnih razloga ili sl.',
	'group-oversight' => 'Nadzornici',
	'group-oversight-member' => 'Nadzornik',
	'grouppage-oversight' => '{{ns:project}}:Nadzor',
	'right-oversight' => 'Gledanje prethodno skrivenih izmjena',
	'right-hiderevision' => 'Pregledavanje i vraćanje izmjena skrivenih od administratora',
	'hiderevision-prompt' => 'Oznaka (broj) uređivanja koju sakrivate:',
	'hiderevision-continue' => 'Nastavi',
	'hiderevision-text' => "Ovaj alat treba biti uporabljen '''samo''' u slijedećim slučajevima:
* Navođenje osobnih informacija
*: ''kućne adrese i telefonski brojevi, JMBG itd''

'''Zloporaba ovog alata povlači gubitak prava.'''

Uklonjene promjene neće biti vidljive nikome putem web preglednika,
ali uklanjanje se evidentira i može biti vraćeno ručno ukoliko
učinite pogrešku.",
	'hiderevision-reason' => 'Razlog (bit će pohranjen u evidenciji nedostupnoj suradnicima):',
	'hiderevision-submit' => 'Trajno sakrij',
	'hiderevision-tab' => 'Sakrij uređivanje',
	'hiderevision-link' => 'Skriveni suradnikovi doprinosi',
	'hiderevision-norevisions' => 'Niste naveli uređivanja koje želite ukloniti.',
	'hiderevision-noreason' => 'Morate navesti razlog uklanjanja/skrivanja uređivanja.',
	'hiderevision-status' => 'Uređivanje $1: $2',
	'hiderevision-success' => 'Uspješno arhivirano i obrisano.',
	'hiderevision-error-missing' => 'Nije nađeno u bazi podataka.',
	'hiderevision-error-current' => "Ne mogu obrisati posljednje uređivanje stranice. Prvo uklonite tu promjenu (''revert'').",
	'hiderevision-error-delete' => 'Ne mogu arhivirati; promjena je možda prethodno obrisana?',
	'hiderevision-archive-status' => 'Obrisana uređivanja $1: $2',
	'oversight-nodiff' => 'Nemoguće praćenje promjena jer nema prethodnih promjena stranice. Ili je:
*stranica obrisana
*ova skrivena promjena je prva promjena',
	'oversight-log-hiderev' => 'uklonjeno uređivanje $1',
	'oversight' => 'Nadzor',
	'oversight-view' => 'potankosti',
	'oversight-difference' => '(razlike prema prethodnim promjenama)',
	'oversight-prev' => 'Posljednje prethodno uređivanje',
	'oversight-hidden' => 'Skriveno uređivanje',
	'oversight-header' => 'Slijedi popis uređivanja nedavno trajno skrivenih od javnosti.
Objavljivanje ove informacije može prouzročiti trajan gubitak prava nadzora.',
	'oversight-legend' => 'Pretraživanje evidencije sakrivanja izmjena',
	'oversight-oversighter' => 'Nadzornik:',
	'oversight-offender' => 'Prekršitelj:',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'hiderevision' => 'Wersije na přeco schować',
	'hiderevision-desc' => 'Chowa jednotliwe wersije z prawniskich přičinow atd. před wšěmi wužiwarjemi',
	'group-oversight' => 'Dohladowarjo',
	'group-oversight-member' => 'Dohladowanje',
	'grouppage-oversight' => '{{ns:project}}:Dohladowanje',
	'right-oversight' => 'Prjedy schowanu wersiju wobhladać',
	'right-hiderevision' => 'Wersije, kotrež su před administratorami schowane, přepruwować a wobnowić',
	'hiderevision-prompt' => 'Wersijowe čisło, kotrež ma so wotstronić:',
	'hiderevision-continue' => 'Dale',
	'hiderevision-text' => "To smě '''jeničce''' w slědowacych padach wužić;
* Wosobinske informacije:
*: ''woprawdźite mjeno, adresa, telefonowe čisło a podobne priwatne podrobnosće''

'''Znjewužiwanje tutoho systema zawinuje zhubjenje tutych prawow!'''

Wušmórnjene zapiski hižo njejsu za nikoho přez websydło widźeć.  Ale wušmórnjenja protokoluja so a hodźa so manuelnje wot administratora datoweje banki wobnowić, jeli činiš zmylk.",
	'hiderevision-reason' => 'Přičina (protokoluje so skradźu)',
	'hiderevision-submit' => 'Tute daty na stajnje schować',
	'hiderevision-tab' => 'Wersiju schować',
	'hiderevision-link' => 'Schowane wužiwarske přinoški',
	'hiderevision-norevisions' => 'Žane wersije za wušmórnjenje podate.',
	'hiderevision-noreason' => 'Dyrbiš přičinu za wotstronjenje podać.',
	'hiderevision-status' => 'Wersija $1: $2',
	'hiderevision-success' => 'Wuspěšnje archiwowany a zničeny.',
	'hiderevision-error-missing' => 'W datowej bance njenamakany.',
	'hiderevision-error-current' => 'Poslednja změna njehodźi so wušmórnyć. Staj tutu změnu wróćo.',
	'hiderevision-error-delete' => 'Njemóžno do archiwa přewjesć – bu wersija do toho wušmórnjena?',
	'hiderevision-archive-status' => 'Wušmórnjena wersija z $1: $2',
	'oversight-nodiff' => 'Njeje přirunanje wersijow móžno, dokelž prjedawša wersija njeje. Móžnej přičinje:
*Strona bu zničena
*Schowana wersija běše přenja wersija',
	'oversight-log-hiderev' => 'změna wot $1 bu wotstronjena.',
	'oversight' => 'Oversight',
	'oversight-view' => 'podrobnosće',
	'oversight-difference' => '(Rozdźěl wot předchadneje zwostawaceje wersije)',
	'oversight-prev' => 'Poslednja předchadna wersija',
	'oversight-hidden' => 'Schowana wersija',
	'oversight-header' => 'Slěduje lisćina wersijow na stajnje schowanych za zjawnosć. Wozjewjenje tutych informacijow móže k stajnemu zhubjenju prawow za Oversight wjesć.',
	'oversight-legend' => 'Protokol za schowanje wersijow přepytać',
	'oversight-oversighter' => 'Dohladowar:',
	'oversight-offender' => 'Njedušnik:',
);

/** Hungarian (Magyar)
 * @author Dani
 * @author KossuthRad
 */
$messages['hu'] = array(
	'hiderevision' => 'Állandó rejtett átdolgozások',
	'hiderevision-desc' => 'Adott változatok eltüntetése az összes felhasználó elől, például jogi okokból.',
	'group-oversight' => 'adatvédelmi biztosok',
	'group-oversight-member' => 'adatvédelmi biztos',
	'grouppage-oversight' => '{{ns:project}}:Adatvédelmi biztosok',
	'right-oversight' => 'korábban elrejtett változatok megtekintése',
	'right-hiderevision' => 'az adminisztrátorok elől elrejtett változatok megtekintése és helyreállítása',
	'hiderevision-prompt' => 'Eltávolítandó változat:',
	'hiderevision-continue' => 'Folytatódik',
	'hiderevision-text' => "Ez az eszköz '''csak''' az alábbi esetekben használható:
* nem ide illő személyi információk
*: ''otthoni címek, telefonszámok és társadalombiztosítási számok stb.''

'''A helytelen használat a jogosultság elvesztését jelentheti.'''

Az eltávolított elemek nem lesznek láthatóak a weboldalon keresztül,
de a törlések naplózva lesznek, és helyreállíthatja őket egy
adatbázis-adminisztrátor, ha hibát vétesz.",
	'hiderevision-reason' => 'Ok (titkosan lesz naplózva):',
	'hiderevision-submit' => 'Adat eltávolítása véglegesen',
	'hiderevision-tab' => 'Rejtett átdolgozás',
	'hiderevision-norevisions' => 'Nincsenek megadva az eltávolítandó változatok.',
	'hiderevision-noreason' => 'Indokolnod kell a törléshez/ eltávolításhoz.',
	'hiderevision-status' => 'Átdolgozott kiadás $1: $2',
	'hiderevision-success' => 'Sikeresen archiválva és törölve.',
	'hiderevision-error-missing' => 'Nem található az adatbázisban.',
	'hiderevision-error-current' => 'A lap utolsó szerkesztése nem törölhető. Vond vissza először.',
	'hiderevision-error-delete' => 'Nem archiválható; korábban törölve volt?',
	'hiderevision-archive-status' => '$1 $2 változatának eltávolítása',
	'oversight-nodiff' => 'Nem lehet nyomon követni a változásokat, mivel jelenleg nincs korábbi változata a lapnak.
*Az oldalt törölték, vagy
*ez a rejtett változat volt az első változat',
	'oversight-log-hiderev' => '$1 egyik változatának eltávolítása',
	'oversight' => 'Felügyelet',
	'oversight-view' => 'részletek',
	'oversight-difference' => '(Különbség az előző verziótól)',
	'oversight-prev' => 'Legfrissebb előző átdolgozás',
	'oversight-hidden' => 'Rejtett változat',
	'oversight-header' => 'Alább találhatóak meg a nyilvánosság elől legutóbb elrejtett változatok.
Ezen információk kiadása az adatvédelmi biztosi jogosultség végleges elvesztését is jelentheti.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'hiderevision' => 'Celar versiones permanentemente',
	'hiderevision-desc' => 'Render versiones individual invisibile a tote le usatores pro motivos legal, etc.',
	'group-oversight' => 'Supervisores',
	'group-oversight-member' => 'Supervisor',
	'grouppage-oversight' => '{{ns:project}}:Supervisor',
	'right-oversight' => 'Vider un version anteriormente celate',
	'right-hiderevision' => 'Revider e restaurar versiones invisibile al administratores',
	'hiderevision-prompt' => 'Numero del version a deler:',
	'hiderevision-continue' => 'Continuar',
	'hiderevision-text' => "Isto debe '''solmente''' esser usate pro le sequente motivos:
* Informationes personal inappropriate
*: ''adresses de domicilio e numeros de telephono, numeros de identification personal, etc.''

'''Le abuso de iste systema resultara in le perdita de privilegios.'''

Le entratas delite non essera visibile a alcuno via le sito web, ma le deletiones essera registrate e pote esser restaurate manualmente per un administrator del base de datos si tu face un error.",
	'hiderevision-reason' => 'Motivo (essera registrate privatemente):',
	'hiderevision-submit' => 'Celar iste datos permanentemente',
	'hiderevision-tab' => 'Celar version',
	'hiderevision-link' => 'Contributiones celate de usatores',
	'hiderevision-norevisions' => 'Nulle versiones specificate a deler.',
	'hiderevision-noreason' => 'Tu debe indicar le motivo de iste deletion.',
	'hiderevision-status' => 'Version $1: $2',
	'hiderevision-success' => 'Archivate e delite con successo.',
	'hiderevision-error-missing' => 'Non trovate in le base de datos.',
	'hiderevision-error-current' => 'Non pote deler le ultime modification de un pagina.
Reverte primo iste modification.',
	'hiderevision-error-delete' => 'Non pote archivar lo; esque illo haberea anteriormente essite delite?',
	'hiderevision-archive-status' => 'Deleva version de $1: $2',
	'oversight-nodiff' => 'Non pote traciar le modificationes proque il non existe un version precedente de iste pagina. Causas possibile:
*Le pagina esseva delite
*Iste version celate esseva le prime version',
	'oversight-log-hiderev' => 'deleva un modification de $1',
	'oversight' => 'Supervision',
	'oversight-view' => 'detalios',
	'oversight-difference' => '(Differentia del previe version remanente)',
	'oversight-prev' => 'Ultime version precedente',
	'oversight-hidden' => 'Version celate',
	'oversight-header' => 'Infra es un lista de versiones recentemente celate permanentemente del publico.
Le divulgation de iste informationes pote resultar in le perdita permanente del privilegios supervisorial.',
	'oversight-legend' => 'Cercar in registro de celamento de versiones',
	'oversight-oversighter' => 'Supervisor:',
	'oversight-offender' => 'Transgressor:',
);

/** Indonesian (Bahasa Indonesia)
 * @author Borgx
 * @author Irwangatot
 * @author Meursault2004
 * @author Rex
 */
$messages['id'] = array(
	'hiderevision' => 'Sembunyikan revisi',
	'hiderevision-desc' => 'Menyembunyikan revisi-revisi tertentu dari semua pengguna (termasuk Opsis) atas dasar alasan hukum, dan lain-lain.',
	'group-oversight' => 'Pengawas suntingan',
	'group-oversight-member' => 'Pengawas suntingan',
	'grouppage-oversight' => '{{ns:project}}:Pengawas suntingan',
	'right-oversight' => 'Lihat revisi yang telah disembunyikan',
	'right-hiderevision' => 'Tinjau dan kembalikan revisi-revisi yang disembunyikan terhadap Opsis',
	'hiderevision-prompt' => 'Nomor revisi untuk dihilangkan:',
	'hiderevision-continue' => 'Lanjutkan',
	'hiderevision-text' => "Ini hanya diproses '''hanya''' dalam kasus:
* Informasi pribadi
*: ''alamat rumah, nomor telepon, dll''

'''Penggunaan secara tidak benar dapat berakibat hilangnya hak.'''

Item yang dihilangkan tidak akan dapat dilihat oleh siapapun melalui situs web,
tetapi penghapusan akan dicatat dan dapat dikembalikan secara manual oleh seorang
administrator basis data jika Anda membuat kesalahan.",
	'hiderevision-reason' => 'Alasan:',
	'hiderevision-submit' => 'Sembunyikan data secara permanen',
	'hiderevision-tab' => 'Sembunyikan revisi',
	'hiderevision-norevisions' => 'Tidak ada revisi untuk dihapus.',
	'hiderevision-noreason' => 'Anda harus menyatakan alasan penghapusan.',
	'hiderevision-status' => 'Revisi $1: $2',
	'hiderevision-success' => 'Revisi telah disembunyikan.',
	'hiderevision-error-missing' => 'Tidak ditemukan dalam basis data.',
	'hiderevision-error-current' => 'Tidak bisa memproses penghapusan. Kembalikan perubahan ini dahulu.',
	'hiderevision-error-delete' => 'Tidak bisa memproses penghapusan. Sudah dihapus?',
	'hiderevision-archive-status' => 'Revisi dihapus dari $1: $2',
	'oversight-nodiff' => 'Tidak dapat melacak perubahan karena tidak ada revisi terdahulu untuk halaman dimaksud. Hal ini dapat terjadi karena:
*Halaman telah dihapus
*Revisi yang disembunyikan merupakan revisi pertama',
	'oversight-log-hiderev' => 'menghapus sebuah suntingan dari $1',
	'oversight' => 'Pengawas suntingan',
	'oversight-view' => 'rincian',
	'oversight-difference' => '(Perbedaan dari revisi terdahulu yang ada)',
	'oversight-prev' => 'revisi terdahulu terakhir',
	'oversight-hidden' => 'Revisi disembunyikan',
	'oversight-header' => 'Di bawah ini adalah daftar revisi yang disembunyikan secara permanen dari umum.
Menyebarkan informasi ini dapat berakibat kepada hilangnya hak pengawas.',
	'oversight-legend' => 'Cari log penyembunyian revisi',
);

/** Ido (Ido)
 * @author Malafaya
 */
$messages['io'] = array(
	'oversight-view' => 'detali',
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 */
$messages['is'] = array(
	'hiderevision-continue' => 'Halda áfram',
	'hiderevision-noreason' => 'Þú verður að skilgreina ástæðu fyrir eyðingu.',
	'hiderevision-error-missing' => 'Ekki fundið í skráasafni.',
	'oversight-view' => 'smáatriði',
);

/** Italian (Italiano)
 * @author BrokenArrow
 * @author Cruccone
 * @author Darth Kule
 */
$messages['it'] = array(
	'hiderevision' => 'Oscuramento permanente di una revisione',
	'hiderevision-desc' => 'Rende invisibili a tutti gli utenti singole revisioni delle pagine (per motivi legali, ecc.)',
	'group-oversight' => 'Oversighter',
	'group-oversight-member' => 'oversight',
	'grouppage-oversight' => '{{ns:project}}:Oversight',
	'right-oversight' => 'Visualizza una revisione precedentemente nascosta',
	'right-hiderevision' => 'Rivede e recupera versioni nascoste',
	'hiderevision-prompt' => 'Numero della revisione da oscurare:',
	'hiderevision-continue' => 'Continua',
	'hiderevision-text' => "Questa funzione deve essere usata '''unicamente''' nei seguenti casi:
* Dati personali non appropriati
*: ''indirizzi postali, numeri di telefono, codici fiscali, ecc.''

'''Qualunque abuso del sistema comporterà la rimozione dei relativi privilegi.'''

Gli elementi oscurati sono invisibili per chiunque sul sito, ma
esiste un registro delle revisioni oscurate e la possibilità di
un ripristino manuale da parte di un amministratore del database
in caso di errori.",
	'hiderevision-reason' => 'Motivo (per il registro riservato):',
	'hiderevision-submit' => 'Oscura i dati in modo permanente',
	'hiderevision-tab' => 'Oscura revisione',
	'hiderevision-link' => 'Contributi utente oscurati',
	'hiderevision-norevisions' => 'Non è stata indicata alcuna revisione da oscurare.',
	'hiderevision-noreason' => "È necessario indicare il motivo dell'oscuramento.",
	'hiderevision-status' => 'Revisione $1: $2',
	'hiderevision-success' => 'Archiviazione e oscuramento completati.',
	'hiderevision-error-missing' => 'Non presente nel database.',
	'hiderevision-error-current' => "Impossibile oscurare l'ultima modifica di una pagina. Annullare la modifica prima di procedere all'oscuramento.",
	'hiderevision-error-delete' => "Impossibile archiviare; c'erano delle cancellazioni precedenti?",
	'hiderevision-archive-status' => 'Revisione oscurata di $1: $2',
	'oversight-nodiff' => 'Impossibile mostrare le modifiche in quanto non sono presenti revisioni precedenti della pagina. Possibili cause:
*La pagina è stata cancellata
*Questa revisione oscurata era la prima per la pagina',
	'oversight-log-hiderev' => 'ha oscurato una modifica di $1',
	'oversight' => 'Oversight',
	'oversight-view' => 'dettagli',
	'oversight-difference' => '(Differenza rispetto alla versione precedente rimasta)',
	'oversight-prev' => 'Ultima revisione precedente',
	'oversight-hidden' => 'Revisione oscurata',
	'oversight-header' => 'Qui di seguito viene presentata una lista delle revisioni oscurate in modo permanente ai visitatori del sito.
La divulgazione di tali informazioni può dar luogo alla rimozione permanente dei diritti di oversight.',
	'oversight-legend' => 'Cerca i log delle revisioni nascoste',
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fievarsty
 * @author JtFuruhata
 * @author Kahusi
 * @author Marine-Blue
 */
$messages['ja'] = array(
	'hiderevision' => '永久的な版の秘匿',
	'hiderevision-desc' => '法律上の理由などにより特定版を全利用者から閲覧不可能にする',
	'group-oversight' => 'Oversight',
	'group-oversight-member' => 'Oversight',
	'grouppage-oversight' => '{{ns:project}}:Oversight',
	'right-oversight' => '秘匿前の版を閲覧する',
	'right-hiderevision' => '管理者から秘匿された版の閲覧・復帰',
	'hiderevision-prompt' => '秘匿する特定版ID:',
	'hiderevision-continue' => '続ける',
	'hiderevision-text' => "これは、'''以下の場合に限って'''使用すべきです：
* 不適切な個人情報
*: ''個人の住所や電話番号、社会保障番号、その他''

'''このシステムを悪用したり乱用したりすると、その権限を失う事になります。'''

消去されたアイテムはウェブサイト上では誰も見る事が出来ません。但し、消去はログ化されている為、貴方が間違って消去した場合に、データベース管理者により手動で復帰する事が出来ます。",
	'hiderevision-reason' => '理由(内密にログ化されます):',
	'hiderevision-submit' => '永久にこのデータを秘匿する',
	'hiderevision-tab' => '版の秘匿',
	'hiderevision-link' => '利用者の秘匿された投稿履歴',
	'hiderevision-norevisions' => '削除する版が指定されていません。',
	'hiderevision-noreason' => '消去する理由を記して下さい。',
	'hiderevision-status' => '特定版ID $1: $2',
	'hiderevision-success' => 'アーカイブ化と削除に成功しました。',
	'hiderevision-error-missing' => 'データベースに存在しませんでした。',
	'hiderevision-error-current' => 'ページの最新版は削除することができません。先にこの版を差し戻してください。',
	'hiderevision-error-delete' => 'アーカイブ化できませんでした。その版は過去に削除されていませんか?',
	'hiderevision-archive-status' => '$1 の削除版: $2',
	'oversight-nodiff' => 'このページには現時点より前の版がないため、変更履歴を遡ることができません。以下の理由が考えられます:
*このページは既に削除されている
*この秘匿された版は最初の版である',
	'oversight-log-hiderev' => '―― $1の編集を消去',
	'oversight' => '秘匿版の閲覧',
	'oversight-view' => '詳細',
	'oversight-difference' => '（残存している前の版との差分）',
	'oversight-prev' => '残存している前の版',
	'oversight-hidden' => '秘匿された版',
	'oversight-header' => '下記は、最近非公開となった版の一覧です。ここで得られた情報を漏洩した場合、この閲覧権限を永久に失う事となるでしょう。',
	'oversight-legend' => '版の秘匿記録の検索',
	'oversight-oversighter' => '秘匿者:',
	'oversight-offender' => '投稿者:',
);

/** Jutish (Jysk)
 * @author Huslåke
 * @author Ælsån
 */
$messages['jut'] = array(
	'group-oversight' => 'Åversigter',
	'group-oversight-member' => 'Åversigt',
	'grouppage-oversight' => '{{ns:project}}:Åversigt',
	'hiderevision-prompt' => 'Reviisje nåmer til slette:',
	'hiderevision-continue' => 'Kontinuær',
	'hiderevision-status' => 'Reviisje $1: $2',
	'hiderevision-error-missing' => 'Ekke fonden i database.',
	'hiderevision-archive-status' => 'Slettet reviisje der $1: $2',
	'oversight-nodiff' => 'Kan æ ændrenger ekke träkke sins er har ekke ælder reviisje før dette pæge. Du:
*Æ pæge er slettet
*Dette verlårn reviisje hvás æ erste reviisje',
	'oversight-log-hiderev' => 'hålde en redigærenge der $1',
	'oversight' => 'Åversigt',
	'oversight-view' => 'dætajer',
	'oversight-difference' => '(Ændrenge der førge stillende reviisje)',
	'oversight-prev' => 'Læste ældste reviisje',
	'oversight-hidden' => 'Verlårn reviisje',
	'oversight-header' => 'Under er æ liste der reviisje resentleg permantleg verlårn an publikum.
Riiliisenge dette informåsje ken ræsultærn in permanent liis der Åversigt priiviilesje.',
);

/** Javanese (Basa Jawa)
 * @author Meursault2004
 * @author Pras
 */
$messages['jv'] = array(
	'hiderevision' => 'Delikna révisi sacara permanèn',
	'hiderevision-desc' => 'Ndelikaké révisi-révisi individu saka kabèh panganggo kanggo alesan hukum lan liya-liyané.',
	'group-oversight' => 'Oversighters (Para pambusak révisi)',
	'group-oversight-member' => 'Oversight (Pambusak révisi)',
	'grouppage-oversight' => '{{ns:project}}:Oversight (Pambusak révisi)',
	'right-oversight' => 'Ndeleng révisi sing sadurungé didelikaké',
	'right-hiderevision' => 'Ndeleng lan mbalèkaké révisi-révisi sing didelikaké saka para opsis',
	'hiderevision-prompt' => 'Nomer révisi sing kudu diilangi:',
	'hiderevision-continue' => 'Banjurna',
	'hiderevision-text' => "Iki '''namung''' bisa dienggo ing kasus-kasus kaya ta:
* Informasi pribadi
*: ''alamat omah lan nomer tilpun, nomer pribadi liyané''

'''Panganggonan fasilitas iki minangka ora bener bisa mituwasaké panjenengan kèlangan hak.'''

Item sing diilangi ora bakal bisa dideleng sapa-sapa menèh liwat situs wèb iki, nanging pambusakan iki dicathet lan bisa dibalèkaké sacara manual déning administrator database yèn panjenengan luput.",
	'hiderevision-reason' => 'Alesan (bakal dilebokna log sacara pribadi):',
	'hiderevision-submit' => 'Delikna data iki sacara permanèn',
	'hiderevision-tab' => 'Delikna révisi',
	'hiderevision-norevisions' => 'Ora ana révisi kanggo dibusak.',
	'hiderevision-noreason' => 'Panjenengan kudu nulis alesan pambusakané.',
	'hiderevision-status' => 'Révisi $1: $2',
	'hiderevision-success' => 'Révisi wis dibusak lan diarsipaké.',
	'hiderevision-error-missing' => 'Ora bisa ditemokaké ing basis data.',
	'hiderevision-error-current' => 'Ora bisa mbusak suntingan pungkasan ing sawijining kaca.
Balèkna suntingan iki dhisik.',
	'hiderevision-error-delete' => 'Ora bisa ngarsipaké; apa sadurungé dibusak?',
	'hiderevision-archive-status' => 'Révisi kabusak saka $1: $2',
	'oversight-nodiff' => 'Ora bisa ngrunut ulang owah-owahan amerga ora ana révisi sadurungé kanggo kaca iki. Bab iki dumadi amerga:
*Kacané wis dibusak
*Révisi sing didelikaké iki, iku révisi kapisan',
	'oversight-log-hiderev' => 'mbusak suntingan saka $1',
	'oversight' => 'Log pambusakan révisi sacara permanèn',
	'oversight-view' => 'détail',
	'oversight-difference' => '(Prabédan saka révisi sadurungé sing ana)',
	'oversight-prev' => 'Révisi pungkasan sadurungé',
	'oversight-hidden' => 'Révisi sing didelikaké',
	'oversight-header' => "Ing ngisor iki kapacak daftar révisi sing wis didelikaké sacara permanèn saka umum.
Nyebaraké informasi iki bisa ngakibataké hak pangawas (''oversight'') panjenengan dijabel.",
	'oversight-legend' => 'Nggolèki log pandhelikan révisi',
	'oversight-oversighter' => "Pangawas (''Oversighter'')",
	'oversight-offender' => 'Panglanggar',
);

/** Kazakh (Arabic script) (‫قازاقشا (تٴوتە)‬)
 * @author AlefZet
 */
$messages['kk-arab'] = array(
	'hiderevision' => 'تۇزەتۋلەردى تۇراقتى جاسىرۋ',
	'hiderevision-desc' => 'زاڭدى تالاپتار جانە تاعى سولاي سەبەپتەرىمەن جەكە تۇزەتۋلەردى جاسىرۋ.',
	'group-oversight' => 'انىقتاۋشىلار',
	'group-oversight-member' => 'انىقتاۋشى',
	'grouppage-oversight' => '{{ns:project}}:انىقتاۋشىلار',
	'right-oversight' => 'الدىندا جاسىرىلعان تۇزەتۋدى كورۋ',
	'right-hiderevision' => 'اكىمشىلەردەن جاسىرىلعان تۇزەتۋلەردى شولىپ شىعۋ جانە قالپىنا كەلتىرۋ',
	'hiderevision-prompt' => 'جويىلاتىن تۇزەتۋ ٴومىرى:',
	'hiderevision-continue' => 'جالعاستىر',
	'hiderevision-text' => "بۇل ''تەك''' كەلەسى جاعدايلار بولسا قولدانىلۋ ٴجون:
* لايىقسىز جەكە دەرەكتەر
*: ''ٴۇي مەكەنجايى جانە تەلەفون نومىرلەرى, جەكە الەۋمەتتىك كودتارى, ت.ب.''

'''وسى جۇيەنىڭ قىزمەتىنە قىييانات كورسەتۋى رۇقساتتار وشىرىلۋىنە كەلتىرەدى.'''

الاستالعان دانالار توراپ بويىنشا اركىمگەدە كورىنبەيدى, دەگەنمەن, جويۋلار جۋرنالعا جازىلىپ الىنادى جانە قاتەلىك جاساساڭىز, دەرەكقور اكىمشىسى بۇنى قولمەن قالپىنا كەلتىرۋى مۇمكىن.",
	'hiderevision-reason' => 'سەبەبى (جەكەشە جازىلىپ الىنادى):',
	'hiderevision-submit' => 'بۇل دەرەكتى تۇراقتى جاسىر',
	'hiderevision-tab' => 'تۇزەتۋدى جاسىر',
	'hiderevision-norevisions' => 'ەش تۇزەتۋ جويۋعا بەلگىلەنبەگەن.',
	'hiderevision-noreason' => 'بۇل جويۋ سەبەبىن جازىپ بەرۋىڭىز ٴتىيىستى.',
	'hiderevision-status' => '$1 تۇزەتۋى: $2',
	'hiderevision-success' => 'ٴساتتى مۇراعاتالدى جانە جويىلدى.',
	'hiderevision-error-missing' => 'دەرەكقوردا تابىلمادى.',
	'hiderevision-error-current' => 'بەتتىڭ سوڭعى وڭدەمەسى جويىلمايدى.
الدىنان بۇل وزگەرىستەن قايتارىڭىز.',
	'hiderevision-error-delete' => 'مۇراعاتتالىنبادى; بۇل الدىنان جويىلعان با?',
	'hiderevision-archive-status' => '$1 كەزىندەگى تۇزەتۋ جويىلدى: $2',
	'oversight-nodiff' => 'وزگەرىستەر اڭىستالىنبايدى, ويتكەنى وسى ارادا بۇل بەتتىڭ اعىمدا ەش الدىڭعى تۇزەتۋى جوق. سەبەبى:
* نە بەت جويىلعان
* نە جاسىرىلعان تۇزەتۋ ەڭ العاشقىسى بولدى',
	'oversight-log-hiderev' => '$1 كەزىندەگى وڭدەمە جويىلدى',
	'oversight' => 'انىقتاۋ',
	'oversight-view' => 'ەگجەي-تەگجەيلەرى',
	'oversight-difference' => '(قالعان الدىڭعى تۇزەتۋمەن ايىرماشىلىق)',
	'oversight-prev' => 'سوڭعى الدىڭعى تۇزەتۋ',
	'oversight-hidden' => 'جاسىرىلعان تۇزەتۋ',
	'oversight-header' => 'تومەندە بارشا كورۋىنەن تۇراقتى جاسىرىلعان تۇزەتۋ ٴتىزىمى كەلتىرىلەدى.
بۇل مالىمەت بارشاعا اشىلۋى انىقتاۋشى رۇقساتتارى تۇراقتى وشىرىلۋىنە كەلتىرۋ مۇمكىن.',
);

/** Kazakh (Cyrillic) (Қазақша (Cyrillic))
 * @author AlefZet
 */
$messages['kk-cyrl'] = array(
	'hiderevision' => 'Түзетулерді тұрақты жасыру',
	'hiderevision-desc' => 'Заңды талаптар және тағы солай себептерімен жеке түзетулерді жасыру.',
	'group-oversight' => 'Анықтаушылар',
	'group-oversight-member' => 'анықтаушы',
	'grouppage-oversight' => '{{ns:project}}:Анықтаушылар',
	'right-oversight' => 'Алдында жасырылған түзетуді көру',
	'right-hiderevision' => 'Әкімшілерден жасырылған түзетулерді шолып шығу және қалпына келтіру',
	'hiderevision-prompt' => 'Жойылатын түзету өмірі:',
	'hiderevision-continue' => 'Жалғастыр',
	'hiderevision-text' => "Бұл ''тек''' келесі жағдайлар болса қолданылу жөн:
* Лайықсыз жеке деректер
*: ''үй мекенжайы және телефон нөмірлері, жеке әлеуметтік кодтары, т.б.''

'''Осы жүйенің қызметіне қиянат көрсетуі рұқсаттар өшірілуіне келтіреді.'''

Аласталған даналар торап бойынша әркімгеде көрінбейді, дегенмен, жоюлар журналға жазылып алынады және қателік жасасаңыз, дерекқор әкімшісі бұны қолмен қалпына келтіруі мүмкін.",
	'hiderevision-reason' => 'Себебі (жекеше жазылып алынады):',
	'hiderevision-submit' => 'Бұл деректі тұрақты жасыр',
	'hiderevision-tab' => 'Түзетуді жасыр',
	'hiderevision-norevisions' => 'Еш түзету жоюға белгіленбеген.',
	'hiderevision-noreason' => 'Бұл жою себебін жазып беруіңіз тиісті.',
	'hiderevision-status' => '$1 түзетуі: $2',
	'hiderevision-success' => 'Сәтті мұрағаталды және жойылды.',
	'hiderevision-error-missing' => 'Дерекқорда табылмады.',
	'hiderevision-error-current' => 'Беттің соңғы өңдемесі жойылмайды.
Алдынан бұл өзгерістен қайтарыңыз.',
	'hiderevision-error-delete' => 'Мұрағатталынбады; бұл алдынан жойылған ба?',
	'hiderevision-archive-status' => '$1 кезіндегі түзету жойылды: $2',
	'oversight-nodiff' => 'Өзгерістер аңысталынбайды, өйткені осы арада бұл беттің ағымда еш алдыңғы түзетуі жоқ. Себебі:
* Не бет жойылған
* Не жасырылған түзету ең алғашқысы болды',
	'oversight-log-hiderev' => '$1 кезіндегі өңдеме жойылды',
	'oversight' => 'Анықтау',
	'oversight-view' => 'егжей-тегжейлері',
	'oversight-difference' => '(Қалған алдыңғы түзетумен айырмашылық)',
	'oversight-prev' => 'Соңғы алдыңғы түзету',
	'oversight-hidden' => 'Жасырылған түзету',
	'oversight-header' => 'Төменде барша көруінен тұрақты жасырылған түзету тізімі келтіріледі.
Бұл мәлімет баршаға ашылуы Анықтаушы рұқсаттары тұрақты өшірілуіне келтіру мүмкін.',
);

/** Kazakh (Latin) (Қазақша (Latin))
 * @author AlefZet
 */
$messages['kk-latn'] = array(
	'hiderevision' => 'Tüzetwlerdi turaqtı jasırw',
	'hiderevision-desc' => 'Zañdı talaptar jäne tağı solaý sebepterimen jeke tüzetwlerdi jasırw.',
	'group-oversight' => 'Anıqtawşılar',
	'group-oversight-member' => 'anıqtawşı',
	'grouppage-oversight' => '{{ns:project}}:Anıqtawşılar',
	'right-oversight' => 'Aldında jasırılğan tüzetwdi körw',
	'right-hiderevision' => 'Äkimşilerden jasırılğan tüzetwlerdi şolıp şığw jäne qalpına keltirw',
	'hiderevision-prompt' => 'Joýılatın tüzetw ömiri:',
	'hiderevision-continue' => 'Jalğastır',
	'hiderevision-text' => "Bul ''tek''' kelesi jağdaýlar bolsa qoldanılw jön:
* Laýıqsız jeke derekter
*: ''üý mekenjaýı jäne telefon nömirleri, jeke älewmettik kodtarı, t.b.''

'''Osı jüýeniñ qızmetine qïyanat körsetwi ruqsattar öşirilwine keltiredi.'''

Alastalğan danalar torap boýınşa ärkimgede körinbeýdi, degenmen, joywlar jwrnalğa jazılıp alınadı jäne qatelik jasasañız, derekqor äkimşisi bunı qolmen qalpına keltirwi mümkin.",
	'hiderevision-reason' => 'Sebebi (jekeşe jazılıp alınadı):',
	'hiderevision-submit' => 'Bul derekti turaqtı jasır',
	'hiderevision-tab' => 'Tüzetwdi jasır',
	'hiderevision-norevisions' => 'Eş tüzetw joywğa belgilenbegen.',
	'hiderevision-noreason' => 'Bul joyw sebebin jazıp berwiñiz tïisti.',
	'hiderevision-status' => '$1 tüzetwi: $2',
	'hiderevision-success' => 'Sätti murağataldı jäne joýıldı.',
	'hiderevision-error-missing' => 'Derekqorda tabılmadı.',
	'hiderevision-error-current' => 'Bettiñ soñğı öñdemesi joýılmaýdı.
Aldınan bul özgeristen qaýtarıñız.',
	'hiderevision-error-delete' => 'Murağattalınbadı; bul aldınan joýılğan ba?',
	'hiderevision-archive-status' => '$1 kezindegi tüzetw joýıldı: $2',
	'oversight-nodiff' => 'Özgerister añıstalınbaýdı, öýtkeni osı arada bul bettiñ ağımda eş aldıñğı tüzetwi joq. Sebebi:
* Ne bet joýılğan
* Ne jasırılğan tüzetw eñ alğaşqısı boldı',
	'oversight-log-hiderev' => '$1 kezindegi öñdeme joýıldı',
	'oversight' => 'Anıqtaw',
	'oversight-view' => 'egjeý-tegjeýleri',
	'oversight-difference' => '(Qalğan aldıñğı tüzetwmen aýırmaşılıq)',
	'oversight-prev' => 'Soñğı aldıñğı tüzetw',
	'oversight-hidden' => 'Jasırılğan tüzetw',
	'oversight-header' => 'Tömende barşa körwinen turaqtı jasırılğan tüzetw tizimi keltiriledi.
Bul mälimet barşağa aşılwı Anıqtawşı ruqsattarı turaqtı öşirilwine keltirw mümkin.',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 * @author Lovekhmer
 * @author T-Rithy
 * @author Thearith
 * @author គីមស៊្រុន
 */
$messages['km'] = array(
	'hiderevision' => 'បិទបាំង​កំណែ​ជា​អចិន្ត្រៃយ៍',
	'hiderevision-desc' => 'បិទបាំង បំលាស់ប្តូរ ជាបុគ្គល ពី​ គ្រប់អ្នកប្រើប្រាស់ ដោយហេតុផល ស្របច្បាប់, ល ។',
	'hiderevision-prompt' => 'លេខ​កំណែប្រែ​ត្រូវ​ដកចេញ ៖',
	'hiderevision-continue' => 'បន្ត',
	'hiderevision-reason' => 'ហេតុផល (នឹងត្រូវបាន ពិនិត្យចូល ជាឯកជន)៖',
	'hiderevision-submit' => 'បិទបាំង​ទិន្នន័យ​នេះ​ជា​អចិន្ត្រៃយ៍',
	'hiderevision-tab' => 'លាក់ការពិនិត្យឡើងវិញ',
	'hiderevision-norevisions' => 'មិនមានកំណែប្រែណាខ្លះទេ បានបញ្ជាក់ថានឹងលុប ។',
	'hiderevision-noreason' => 'អ្នកត្រូវពិពណ៌នា ហេតុផល ចំពោះការដកចេញ នេះ ។',
	'hiderevision-status' => 'បំលាស់ប្តូរ $1​ ៖ $2',
	'hiderevision-success' => 'បានដាក់ ជាបណ្ណសារ និង បានលុបចេញ​ ដោយជោគជ័យ ។',
	'hiderevision-error-missing' => 'រកមិនឃើញ ក្នុង មូលដ្ឋានទិន្នន័យ',
	'hiderevision-error-current' => 'មិនអាចលុបកំណែប្រែចុងក្រោយបំផុតចំពោះទំព័រនេះបានទេ។ ជាដំបូងចូរត្រឡប់ការផ្លាស់ប្តូរនេះឱ្យដូចដើមវិញ។',
	'hiderevision-error-delete' => 'មិនអាចប្រមូលផ្តុំបានទេ។ តើវាត្រូវបានគេលុបពីមុនដែឬទេ?',
	'hiderevision-archive-status' => 'បានលុបកំណែប្រែពី$1: $2',
	'oversight-log-hiderev' => 'បានដកចេញ កំណែប្រែ ពី $1',
	'oversight' => 'Oversight',
	'oversight-view' => 'សេចក្តីលំអិត',
	'oversight-hidden' => 'កំណែប្រែដែលត្រូវបានលាក់',
);

/** Korean (한국어)
 * @author Albamhandae
 * @author Kwj2772
 * @author Pi.C.Noizecehx
 */
$messages['ko'] = array(
	'hiderevision' => '영구히 특정 판을 숨기기',
	'hiderevision-desc' => '법적인 이유 등으로 인하여 특정 판을 숨김',
	'group-oversight' => '오버사이트',
	'group-oversight-member' => '오버사이트',
	'grouppage-oversight' => '{{ns:project}}:오버사이트',
	'right-oversight' => '이전에 숨겨진 판을 보기',
	'right-hiderevision' => '관리자도 보지 못하도록 숨겨진 판의 확인 및 복구',
	'hiderevision-prompt' => '제거할 판의 번호:',
	'hiderevision-continue' => '계속',
	'hiderevision-text' => "이 기능은 '''다음 경우에만''' 사용되어야 합니다.
* 개인 정보를 제거할 때
*: 집 주소, 전화번호, 주민등록번호 등

'''이 기능을 남용할 경우 권한이 해제될 수 있습니다.'''

삭제된 편집은 웹 사이트를 통해 아무에게도 보여지지 않을 것입니다. 하지만 삭제된 편집은 실수를 했을 때 데이터베이스 관리자에 의해 수동으로 복구될 수 있습니다.",
	'hiderevision-reason' => '이유 (비공개적으로 기록될 것입니다):',
	'hiderevision-submit' => '이 데이터를 영구히 숨기기',
	'hiderevision-tab' => '이 판을 숨기기',
	'hiderevision-link' => '숨겨진 사용자 기여',
	'hiderevision-norevisions' => '삭제할 판이 제시되지 않았습니다.',
	'hiderevision-noreason' => '숨기는 이유를 반드시 입력해야 합니다.',
	'hiderevision-status' => '$1판: $2',
	'hiderevision-success' => '문서가 성공적으로 삭제되어 보존되었습니다.',
	'hiderevision-error-missing' => '데이터베이스에서 찾을 수 없습니다.',
	'hiderevision-error-current' => '이 문서의 마지막 편집을 삭제할 수 없습니다.
이 편집을 먼저 되돌리십시오.',
	'hiderevision-archive-status' => '삭제된 판의 $1 버전: $2',
	'oversight-nodiff' => '이 문서의 이전 판이 없기 때문에 차이를 보여 줄 수 없습니다. 아마도:
*문서가 삭제되었거나,
*숨겨진 판이 문서의 첫 판일 수 있습니다.',
	'oversight-log-hiderev' => '이(가) $1에서의 편집을 숨김',
	'oversight' => '오버사이트',
	'oversight-view' => '내용 보기',
	'oversight-difference' => '(이전의 존재하는 판과의 차이)',
	'oversight-prev' => '바로 이전 판',
	'oversight-hidden' => '숨겨진 판',
	'oversight-header' => '아래 목록은 최근에 영구히 숨겨진 판의 목록입니다.
이 정보를 공개할 경우 오버사이트 권한이 영구히 박탈될 수 있습니다.',
	'oversight-legend' => '특정 판 숨기기 기록 찾기',
	'oversight-offender' => '편집자:',
);

/** Ripoarisch (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'hiderevision' => 'Versione op Dor versteche',
	'hiderevision-desc' => 'Verstich bestemmpte Versione, zem Beispill met verkeehte udder unjenehme päsönlesche Enfomazione.',
	'group-oversight' => 'Sigge-Versione-Verstechere',
	'group-oversight-member' => 'Sigge-Versione-Verstecher',
	'grouppage-oversight' => '{{ns:project}}:Sigge-Versione-Verstecher',
	'right-oversight' => 'Sigge ier verstoche Versione beloore',
	'right-hiderevision' => 'Versione vun Sigge beloore un zeröck holle, di sujaa för de Wiki-Köbesse verstoche sin',
	'hiderevision-prompt' => 'Nommer fun dä Version zom Versteche:',
	'hiderevision-continue' => 'Wigger',
	'hiderevision-text' => "Dat sullt nur en dä Fälle jemaat wäde:
* Päsönlijje Infomazjone sin verkeeht udder nit för de Öffentleschkeit,
*: Adresse fun Wunnunge, Telefonnummere, Kontodate, un esu wigger

'''Wä dat Rääsch zom Versteiche ze mißbruch, dä kritt et afjenomme.'''

Verstoche Saache sin denoh nit mieh em Web ze sin,
ävver dat Versteiche shteit em Logboch, un mer kann
et widder retuur maache, falls De enne Fäähler määß.
Dat moß ene Datebank-Köbes maache.",
	'hiderevision-reason' => 'Dä Jrund (weed unseeschba faßjehallde):',
	'hiderevision-submit' => 'Donn di Version versteche',
	'hiderevision-tab' => 'Version Versteche',
	'hiderevision-link' => 'Verstoche Beidrääsch',
	'hiderevision-norevisions' => 'Kein Version zom Versteche aanjejovve',
	'hiderevision-noreason' => 'Do moß ene Jrond för et Versteche aanjevve',
	'hiderevision-status' => 'Version $1: $2',
	'hiderevision-success' => 'Verstoche: arscheveet un fottjenomme.',
	'hiderevision-error-missing' => 'Nit en de Datebank jefonge.',
	'hiderevision-error-current' => 'De Version fum letzte Beärbeide kam_mer nit versteche.
Donn di Änderung et eets zeröck nämme, wann dat esu rechtesch es.',
	'hiderevision-error-delete' => 'Dat Arschiveere hät nit jeflupp. Woh di Version zefür fottjeschmeßse?',
	'hiderevision-archive-status' => 'Fottjeschmeße Version fum $1: $2',
	'oversight-nodiff' => 'Mer künne kein Änderunge eruß krijje, weil mer kein vörijje Version
fun dä Sigg han. Entweder
* de Sigg es fottjeschmesse, udder
* de verstoche Version wohr de eetste Version fun dä Sigg',
	'oversight-log-hiderev' => 'Han en Version fun „$1“ verstoche',
	'oversight' => 'Sigge ier Versione Versteche',
	'oversight-view' => 'Einzelheite',
	'oversight-difference' => '(Ongerscheed zwesche dä hee un de letzte Version, di noch ze sinn es)',
	'oversight-prev' => 'De letzte Version doför',
	'oversight-hidden' => 'Verstoche Version',
	'oversight-header' => 'He kütt en Leß met Versione, di zeläz op Dor för de Öffentleschkeit
verstoche wode sin.
Wä di Enfomazione wigger jitt, weed dat Rääsch se aanzeloore,
un wat domet zosamme hängk, flöck quitt.',
	'oversight-legend' => 'Sök em Logboch fum Versione Versteche',
	'oversight-oversighter' => 'Sigge-Versione-Verstecher:',
	'oversight-offender' => 'Metmaacher:',
);

/** Latin (Latina)
 * @author UV
 */
$messages['la'] = array(
	'right-hiderevision' => 'Emendationes magistratus celatas inspicere vel restituere',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'hiderevision' => 'Versioune definitiv verstoppen',
	'hiderevision-desc' => 'Eenzel Versioune fir all Benotzer aus legalen an aneren Uursaachen definitiv verstoppen',
	'group-oversight' => 'Artikel-Kontrolleren',
	'group-oversight-member' => 'Artikel-Kontroller',
	'grouppage-oversight' => '{{ns:project}}:Artikel-Kontroller',
	'right-oversight' => 'Eng virdru verstoppte Versioun weisen',
	'right-hiderevision' => 'Virun den Administrateure verstoppte Versiounen nokucken a restauréieren',
	'hiderevision-prompt' => 'Versiounsnummer déi geläscht gi soll:',
	'hiderevision-continue' => 'Weider',
	'hiderevision-reason' => 'Grond (gëtt verstoppt ofgespäichert)',
	'hiderevision-submit' => 'Dës Daten definitv verstoppen',
	'hiderevision-tab' => 'Verstopp Versiounen',
	'hiderevision-link' => 'Verstoppte Benotzer-Kontributiounen',
	'hiderevision-norevisions' => 'Keng Versioun uginn déi soll geläscht ginn.',
	'hiderevision-noreason' => 'Dir musst de Grond fir dës Läschung uginn.',
	'hiderevision-status' => 'Versioun $1: $2',
	'hiderevision-success' => 'Archivéiert a geläscht.',
	'hiderevision-error-missing' => 'Net an der Datebank fonnt.',
	'hiderevision-error-current' => "Déi läscht Ännerung vun enger Säit kann net geläscht ginn.
Annulléiert dës Ännerung d'éischt.",
	'hiderevision-error-delete' => "Kann net archivéiert ginn. Gouf d'Säit virdru geläscht?",
	'hiderevision-archive-status' => 'Geläschte Versioune vun $1: $2',
	'oversight-nodiff' => "Et as onméiglech d'Ännernungen ze vergläichen well et keng vireg Versioun fir dës Säit gëtt. Entweder:
*D'Säit gouf geläscht
*Dës verstoppte Versioun war déi éischt Versioun",
	'oversight-log-hiderev' => 'En Ännerung vum $1 geläscht.',
	'oversight' => 'Iwwersiicht',
	'oversight-view' => 'Detailer',
	'oversight-difference' => '(Ënnerscheed zu der viregter läschter Versioun)',
	'oversight-prev' => 'Lescht vireg Versioun',
	'oversight-hidden' => 'Verstoppte Versioun',
	'oversight-header' => "Hei ass eng Lëscht vun de Versiounen déi permanent virun der Ëffentlechkeet verstoppt goufen.
Verbreedung vun dësen Informatiounen kann zum definitve Verloscht vun den ''Oversight''-Rechter féieren.",
	'oversight-legend' => 'Lëscht vun de Recherchen vu verstoppte Versiounen',
	'oversight-oversighter' => 'Artikel-Kontroller:',
);

/** Limburgish (Limburgs)
 * @author Matthias
 * @author Ooswesthoesbes
 */
$messages['li'] = array(
	'hiderevision' => 'Versies permanent verberge',
	'hiderevision-desc' => 'Verberg bewerkinge veur alle gebroekers om juridische redene, etc.',
	'group-oversight' => 'Toezichhaojers',
	'group-oversight-member' => 'Toezichhaojer',
	'grouppage-oversight' => '{{ns:project}}:Euverzich',
	'right-oversight' => 'Verbórge versies bekieke',
	'right-hiderevision' => 'Verborge versies bekijke en terugplaatse',
	'hiderevision-prompt' => 'Te verwijdere versienummer:',
	'hiderevision-continue' => 'Doorguuen',
	'hiderevision-text' => "Dit deent '''allein''' gebroek te waere in de volgende gevalle:
* Ontoelaotbare perseunlike informatie
*: ''woonadresse en telefoonnommers, sofinommers, enzovoort''

'''Misbroek van dit systeem wörd betref mit 't intrekke van rech.'''

Verwiederde versies zeen neet veur edereen zichbaar via de website,
meh verwiederde objecte waere in logbeuk biegehaje en kinnen handjmaotig
trökgezat waere door databasebeheerders es geer 'n fout maak.",
	'hiderevision-reason' => 'Ree (wordt discreet opgeslage):',
	'hiderevision-submit' => 'Deze gegaeves permanent verberge',
	'hiderevision-tab' => 'Verberg versie',
	'hiderevision-norevisions' => "d'r Zeen gein te wisse versies opgegaeve.",
	'hiderevision-noreason' => "Doe mós 'n ree opgaeve veur 't wisse.",
	'hiderevision-status' => 'Versie $1: $2',
	'hiderevision-success' => 'Archiveren en verwijderen geslaagd.',
	'hiderevision-error-missing' => 'Niet gevonden in database.',
	'hiderevision-error-current' => 'De laatste bewerkin van een pagina kan niet verwijderd worden. Draai de bewerking eerst terug.',
	'hiderevision-error-delete' => 'Archiveren mislukt; waren de gegevens al verwijderd?',
	'hiderevision-archive-status' => 'Verwijder versie van $1: $2',
	'oversight-nodiff' => 'Neet in staat om de wijziginge weer te gaeve omdat er gein eerdere versie van de pagina aanwezig is, omdat:
*De pagina waar gewis
*Deze verborge versie de eerste versie waar',
	'oversight-log-hiderev' => "wiste 'n bewerking oet $1",
	'oversight' => 'Oversight',
	'oversight-view' => 'details',
	'oversight-difference' => '(Versjille met vorge zichtbare versie)',
	'oversight-prev' => 'Letste vorge versie',
	'oversight-hidden' => 'Verborge versie',
	'oversight-header' => "Hie onder steit 'n lijst met versies die permanent verborge zien veur idderein. 't Vriegaeve van deze informatie kan tot gevolg höbbe dat Oversightrechte worde ingenaeme.",
);

/** Lithuanian (Lietuvių)
 * @author Matasg
 */
$messages['lt'] = array(
	'hiderevision-continue' => 'Tęsti',
	'hiderevision-error-missing' => 'Nerasta duomenų bazėje',
	'oversight-view' => 'detalės',
);

/** Latvian (Latviešu)
 * @author Xil
 */
$messages['lv'] = array(
	'hiderevision-continue' => 'Turpināt',
);

/** Moksha (Мокшень)
 * @author Kranch
 */
$messages['mdf'] = array(
	'right-hiderevision' => 'Ваномс ди мърдафтомс верзиетне кяшфт системонь вятикснень эзда',
);

/** Macedonian (Македонски)
 * @author Brest
 */
$messages['mk'] = array(
	'oversight-view' => 'детали',
	'oversight-difference' => '(Разлика од претходно останатата ревизија)',
	'oversight-hidden' => 'Скриена ревизија',
);

/** Malayalam (മലയാളം)
 * @author Shijualex
 */
$messages['ml'] = array(
	'hiderevision' => 'മാറ്റങ്ങള്‍ സ്ഥിരമായി മറയ്ക്കുക',
	'group-oversight' => 'മേല്‍നോട്ടക്കാര്‍',
	'group-oversight-member' => 'മേല്‍നോട്ടം',
	'grouppage-oversight' => '{{ns:project}}:മേല്‍നോട്ടം',
	'right-oversight' => 'മുന്‍പ് മറക്കപ്പെട്ട ഒരു പതിപ്പ് കാണുക',
	'hiderevision-prompt' => 'ഒഴിവാക്കാനുള്ള പതിപ്പിന്റെ ഐഡി',
	'hiderevision-continue' => 'തുടരുക',
	'hiderevision-reason' => 'കാരണം (സ്വകാര്യമായി സൂക്ഷിക്കും):',
	'hiderevision-submit' => 'ഈ ഡാറ്റ സ്ഥിരമായി മറയ്ക്കുക',
	'hiderevision-tab' => 'പതിപ്പ് മറയ്ക്കുക',
	'hiderevision-norevisions' => 'മായ്ക്കുവാന്‍ വേണ്ടി പതിപ്പുകളൊന്നും തിരഞ്ഞെടുത്തിട്ടില്ല.',
	'hiderevision-noreason' => 'ഇതു ഒഴിവാക്കുന്നതിനു സാധുവായ ഒരു കാരണം രേഖപ്പെടുത്തേണ്ടതാണ്‌.',
	'hiderevision-status' => 'പതിപ്പ് $1: $2',
	'hiderevision-success' => 'വിയകരമായി പത്തായത്തിലാക്കുകയും മായ്ക്കുകയും ചെയ്തിരിക്കുന്നു.',
	'hiderevision-error-missing' => 'ഡാറ്റാബേസില്‍ കണ്ടില്ല.',
	'hiderevision-error-current' => 'ഒരു താളിന്റെ ഏറ്റവും അവസാനത്തെ തിരുത്തല്‍ മായ്ക്കുവാന്‍ പറ്റില്ല. ഈ മാറ്റം ആദ്യം തിരസ്ക്കരിക്കുക.',
	'hiderevision-error-delete' => 'പത്തായത്തിലാക്കാന്‍ പറ്റിയില്ല; അതു മുന്‍പ് മായ്ക്കപ്പെട്ടതാണോ?',
	'hiderevision-archive-status' => '$1-ല്‍ നിന്നു മായ്ക്കപ്പെട്ട പതിപ്പ്: $2',
	'oversight-nodiff' => 'താളിനു നിലവില്‍ മുന്‍പതിപ്പ് ഇല്ലാത്തതിനാല്‍ മാറ്റങ്ങള്‍ നിരീക്ഷിക്കാന്‍ പറ്റിയില്ല. ഇതിനു താഴെ പറയുന്നവയില്‍ ഒന്നായിരിക്കാം കാരണം: 
*താള്‍ മായ്ക്കപ്പെട്ടിരിക്കാം
*ഈ മറയ്ക്കപ്പെട്ട പതിപ്പായിരിക്കാം ആദ്യത്തെ പതിപ്പ്',
	'oversight-log-hiderev' => '$1-ല്‍ നിന്നു ഒരു തിരുത്തല്‍ ഒഴിവാക്കിയിരിക്കുന്നു',
	'oversight' => 'മേല്‍നോട്ടം',
	'oversight-view' => 'വിശദാംശങ്ങള്‍',
	'oversight-difference' => 'ബാക്കിയുള്ള മുന്‍പതിപ്പുമായുള്ള വ്യത്യാസം',
	'oversight-prev' => 'അവസാനത്തെ മുന്‍പതിപ്പ്',
	'oversight-hidden' => 'മറഞ്ഞിരിക്കുന്ന പതിപ്പ്',
	'oversight-header' => 'സമീപ കാലത്ത് പൊതുജനങ്ങളുടെ കാഴ്ചയില്‍ നിന്നു മറയ്ക്കപ്പെട്ട പതിപ്പുകളുടെ പട്ടികയാണു താഴെ.
ഈ വിവരം പുറത്താക്കുന്നതു മേല്‍നോട്ട അവകാശങ്ങള്‍ സ്ഥിരമായി നഷ്ടമാകുന്നതിനു കാരണമാകും.',
);

/** Marathi (मराठी)
 * @author Kaustubh
 */
$messages['mr'] = array(
	'hiderevision' => 'आवृत्त्या कायमस्वरूपी लपवा',
	'hiderevision-desc' => 'कायदेशीर बाबींसाठी सदस्यांपासून प्रत्येक आवृत्ती कायमस्वरूपी लपवा.',
	'group-oversight' => 'झापडबंद अधिकारी',
	'group-oversight-member' => 'झापडबंद',
	'grouppage-oversight' => '{{ns:project}}:झापडबंद',
	'right-oversight' => 'पूर्वी लपविलेली आवृत्ती पहा',
	'right-hiderevision' => 'लपविलेल्या आवृत्त्या पहा व पुनर्स्थापित करा',
	'hiderevision-prompt' => 'वगळण्यासाठीच्या आवृत्तीचा क्रमांक:',
	'hiderevision-continue' => 'पुढे चालू',
	'hiderevision-text' => "हे '''फक्त''' खालील वेळीच वापरले पाहिजे:
* अयोग्य वैयक्तिक माहिती
*: ''घरचा पत्ता व दूरध्वनी क्रमांक, इ''

'''या उपकरणाचा अयोग्य वापर केल्यास अधिकार काढून घेतले जातील.'''

वगळलेली पाने या संकेतस्थळावर कुणीही पाहू शकणार नाहीत, पण
वगळल्याची नोंद केली जाईल व जर तुमच्याकडून चूक झाली तर डाटाबेस प्रबंधकांना ती पुन्हा 
आणता येतील.",
	'hiderevision-reason' => 'कारण (हे गोपनीयरित्या नोंदले जाईल):',
	'hiderevision-submit' => 'हा डाटा कायमस्वरूपी लपवा',
	'hiderevision-tab' => 'आवृत्ती लपवा',
	'hiderevision-norevisions' => 'वगळण्यासाठी आवृत्त्या निवडलेल्या नाहीत.',
	'hiderevision-noreason' => 'तुम्ही वगळण्यासाठीचे कारण देणे आवश्यक आहे.',
	'hiderevision-status' => 'आवृत्ती $1: $2',
	'hiderevision-success' => 'वगळले गेले आहे.',
	'hiderevision-error-missing' => 'डाटाबेस मध्ये सापडले नाही.',
	'hiderevision-error-current' => 'या पानाचे नवीनतम संपादन वगळू शकत नाही. पहिल्यांदा हे बदल उलटवा.',
	'hiderevision-error-delete' => 'आर्चिव्ह करू शकत नाही; हे पान आधी वगळले होते का?',
	'hiderevision-archive-status' => '$1 पासूनच्या आवृत्त्या वगळल्या: $2',
	'oversight-nodiff' => 'या पानाच्या जुन्या आवृत्त्या नाहीत, त्यामुळे बदल तपासू शकत नाही. कारण:
*हे पान अगोदरच वगळले आहे किंवा
*लपविलेली आवृत्ती ही या पानाची पहिलीच आवृत्ती आहे',
	'oversight-log-hiderev' => '$1 कडचे एक संपादन वगळले',
	'oversight' => 'झापडबंद',
	'oversight-view' => 'अधिक माहिती',
	'oversight-difference' => '(उरलेल्या जुन्या आवृत्त्यांमधील फरक)',
	'oversight-prev' => 'शेवटची आधीची आवृत्ती',
	'oversight-hidden' => 'लपविलेली आवृत्ती',
	'oversight-header' => 'खाली अलिकडील काळात कायमस्वरूपी लपविलेल्या आवृत्त्यांची यादी आहे.
ही माहिती उघड केल्यास झापडबंद अधिकार कायमस्वरूपी काढून घेतले जातील.',
);

/** Malay (Bahasa Melayu)
 * @author Aviator
 */
$messages['ms'] = array(
	'hiderevision' => 'Menyembunyikan semakan tertentu selama-lamanya',
	'hiderevision-desc' => 'Menyembunyikan semakan-semakan tertentu daripada semua pengguna atas sebab undang-undang dan sebagainya.',
	'group-oversight' => 'Pengawal',
	'group-oversight-member' => 'Pengawal',
	'grouppage-oversight' => 'Pengawal',
	'right-oversight' => 'Melihat semakan yang telah disembunyikan',
	'right-hiderevision' => 'Memeriksa dan memulihkan semakan yang terselindung daripada pandangan Penyelia',
	'hiderevision-prompt' => 'Nombor semakan yang ingin dibuang:',
	'hiderevision-continue' => 'Sambung',
	'hiderevision-text' => "Sila gunakan alat ini untuk kes-kes berikut '''sahaja''':
* Pendedahan maklumat peribadi
*: ''alamat kediaman, nombor telefon, dan sebagainya''

'''Penyalahgunaan alat ini boleh menyebabkan jawatan anda ditarik balik.'''

Item-item yang telah dibuang tidak boleh dilihat oleh sesiapa melalui tapak web ini. Walau bagaimanapun, semua tindakan akan disimpan dalam log dan boleh dipulihkan secara manual oleh seorang pentadbir pangkalan data sekiranya anda melakukan kesilapan.",
	'hiderevision-reason' => 'Sebab (dimasukkan dalam log rahsia):',
	'hiderevision-submit' => 'Sembunyikan data ini selama-lamanya',
	'hiderevision-tab' => 'Sembunyi semakan',
	'hiderevision-link' => 'Sumbangan pengguna yang dirahsiakan',
	'hiderevision-norevisions' => 'Tiada semakan dinyatakan.',
	'hiderevision-noreason' => 'Anda hendaklah menyatakan sebab.',
	'hiderevision-status' => 'Semakan $1: $2',
	'hiderevision-success' => 'Semakan tersebut berjaya diarkibkan dan dihapuskan.',
	'hiderevision-error-missing' => 'Tiada dalam pangkalan data.',
	'hiderevision-error-current' => 'Suntingan terakhir tidak boleh dihapuskan. Sila batalkan suntingan itu terlebih dahulu.',
	'hiderevision-error-delete' => 'Semakan tersebut tidak dapat diarkibkan. Adakah ia sudah dihapuskan?',
	'hiderevision-archive-status' => 'membuang sebuah suntingan daripada $1: $2',
	'oversight-nodiff' => 'Tidak dapat menjejak perubahan kerana tiada semakan sebelumnya. Sama ada:
* Laman tersebut telah dihapuskan
* Semakan tersembunyi ini adalah semakan pertama',
	'oversight-log-hiderev' => 'membuang sebuah suntingan daripada $1',
	'oversight' => 'Sembunyi semakan',
	'oversight-view' => 'butiran',
	'oversight-difference' => '(Perbezaan dengan semakan sebelumnya)',
	'oversight-prev' => 'Semakan sebelumnya',
	'oversight-hidden' => 'Semakan rahsia',
	'oversight-header' => 'Yang berikut ialah senarai terkini bagi semakan yang dirahsiakan daripada pandangan orang ramai.
Pendedahan maklumat ini boleh mengakibatkan jawatan pengawal ditarik balik.',
	'oversight-legend' => 'Cari dalam log penyembunyian semakan',
	'oversight-oversighter' => 'Penyembunyi:',
	'oversight-offender' => 'Pesalah:',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'hiderevision' => 'Versionen duurhaft versteken',
	'hiderevision-desc' => 'Enkelte Versionen ut Rechtsgrünn etc. vör all Brukers duurhaft versteken',
	'group-oversight' => 'Oversighters',
	'group-oversight-member' => 'Oversight',
	'grouppage-oversight' => '{{ns:project}}:Oversight',
	'right-oversight' => 'Ankieken vun en versteken Version',
	'right-hiderevision' => 'Ankieken un wedderhalen vun Versionen, de ok för Administraters versteken sünd',
	'hiderevision-prompt' => 'Versionsnummer, de wegdaan warrn schall:',
	'hiderevision-continue' => 'Wieder',
	'hiderevision-reason' => 'Grund (warrt nich sichtbor in’t Logbook opnahmen):',
	'hiderevision-submit' => 'Disse Daten duurhaft versteken',
	'hiderevision-tab' => 'Version versteken',
	'hiderevision-link' => 'Versteken Brukerbidrääg',
	'hiderevision-norevisions' => 'Keen Versionen to löschen angeven.',
	'hiderevision-noreason' => 'Du musst för dat Rutnehmen en Grund angeven.',
	'hiderevision-status' => 'Version $1: $2',
	'hiderevision-success' => 'In’t Archiv schuven un wegsmieten utföhrt.',
	'hiderevision-error-missing' => 'Nich funnen in’e Datenbank.',
	'hiderevision-error-current' => 'De lest Ännern vun en Sied kann nich wegsmeten warrn. Dreih de Ännern eerst trüch.',
	'hiderevision-error-delete' => 'In’t Archiv schuven güng nich. Is de Sied wegsmeten worrn?',
	'hiderevision-archive-status' => 'Wegdaan Version vun $1: $2',
	'oversight-log-hiderev' => 'en Ännern vun $1 rutnahmen',
	'oversight' => 'Oversight',
	'oversight-view' => 'Details',
	'oversight-difference' => '(Ünnerscheed to de vörige nablevene Version)',
	'oversight-prev' => 'Leste vörige Version',
	'oversight-hidden' => 'Versteken Version',
	'oversight-legend' => 'Logbook för versteken Versionen dörsöken',
	'oversight-oversighter' => 'Oversighter:',
	'oversight-offender' => 'Öveldader:',
);

/** Nedersaksisch (Nedersaksisch)
 * @author Servien
 */
$messages['nds-nl'] = array(
	'right-hiderevision' => 'Verbörgen versies bekieken en weerummeplaosen',
	'hiderevision-reason' => 'Rejen:',
	'hiderevision-noreason' => 'Beschrief eers de rejen waorumme disse pagina vort mut.',
);

/** Nepali (नेपाली) */
$messages['ne'] = array(
	'hiderevision-tab' => 'संस्करण लुकाउनुहोस्',
	'hiderevision-noreason' => 'तपाईंले यो हटाउनको कारण उल्लेख गर्नुपर्छ।',
	'hiderevision-error-missing' => 'डेटाबेसमा भेट्टाइएन।',
	'oversight-log-hiderev' => '$1 बाट एक संपादन हटाइयो',
	'oversight-view' => 'विस्तारमा',
);

/** Dutch (Nederlands)
 * @author Meursault2004
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'hiderevision' => 'Versies permanent verbergen',
	'hiderevision-desc' => 'Verberg bewerkingen voor alle gebruikers om juridische redenen, etc.',
	'group-oversight' => 'toezichthouders',
	'group-oversight-member' => 'toezichthouder',
	'grouppage-oversight' => '{{ns:project}}:Oversight',
	'right-oversight' => 'Verborgen versies bekijken',
	'right-hiderevision' => 'Verborgen versies bekijken en terugplaatsen',
	'hiderevision-prompt' => 'Te verwijderen versienummer:',
	'hiderevision-continue' => 'Doorgaan',
	'hiderevision-text' => "Dit dient '''alleen''' gebruikt te worden in de volgende gevallen:
* Ontoelaatbare persoonlijke informatie
*: ''woonadressen en telefoonnummers, sofinummers, enzovoort''

'''Misbruik van dit systeem wordt betreft met het intrekken van rechten.'''

Verwijderde versies zijn niet voor iedereen zichtbaar via de website,
maar verwijderde objecten worden in logboeken bijgehouden en kunnen handmatig
teruggezet worden door databasebeheerders als u een fout maakt.",
	'hiderevision-reason' => 'Reden (wordt discreet opgeslagen):',
	'hiderevision-submit' => 'Deze gegevens permanent verbergen',
	'hiderevision-tab' => 'Versie verbergen',
	'hiderevision-link' => 'Verborgen gebruikersbijdragen',
	'hiderevision-norevisions' => 'Er zijn geen te verwijderen versies opgegeven.',
	'hiderevision-noreason' => 'U moet een reden opgeven voor het verwijderen.',
	'hiderevision-status' => 'Versie $1: $2',
	'hiderevision-success' => 'Archiveren en verwijderen uitgevoerd.',
	'hiderevision-error-missing' => 'Niet gevonden in database.',
	'hiderevision-error-current' => 'De laatste bewerkin van een pagina kan niet verwijderd worden. Draai de bewerking eerst terug.',
	'hiderevision-error-delete' => 'Archiveren mislukt; waren de gegevens al verwijderd?',
	'hiderevision-archive-status' => 'Verwijderde versie van $1: $2',
	'oversight-nodiff' => 'Niet in staat om de wijzigingen weer te geven omdat er geen eerdere versie van de pagina aanwezig is, omdat:
*De pagina was verwijderd
*Deze verborgen versie de eerste versie was',
	'oversight-log-hiderev' => 'verwijderde een bewerking uit $1',
	'oversight' => 'Oversight',
	'oversight-view' => 'details',
	'oversight-difference' => '(Verschillen met vorige zichtbare versie)',
	'oversight-prev' => 'Laatste vorige versie',
	'oversight-hidden' => 'Verborgen versie',
	'oversight-header' => 'Hieronder staat een lijst met versies die permanent verborgen zijn voor iedereen.
Het vrijgeven van deze informatie kan tot gevolg hebben dat Oversightrechten worden ingenomen.',
	'oversight-legend' => 'Logboek verborgen versies doorzoeken',
	'oversight-oversighter' => 'Oversightgebruiker:',
	'oversight-offender' => 'Dader:',
);

/** Norwegian Nynorsk (‪Norsk (nynorsk)‬)
 * @author Eirik
 * @author Harald Khan
 */
$messages['nn'] = array(
	'hiderevision' => 'Fjern versjonar av sider permanent',
	'hiderevision-desc' => 'Fjern individuelle versjonar av sider for alle brukarane, til dømes av juridiske grunnar.',
	'group-oversight' => 'Versjonsfjernarar',
	'group-oversight-member' => 'Versjonsfjernar',
	'grouppage-oversight' => '{{ns:project}}:Versjonsfjerning',
	'right-oversight' => 'Syna tidlegare gøymde versjonar',
	'right-hiderevision' => 'Skoda og attoppretta versjonar gøymde for administratorar',
	'hiderevision-prompt' => 'Nummeret på versjonen som skal fjernast:',
	'hiderevision-continue' => 'Hald fram',
	'hiderevision-text' => "Denne funksjonen bør '''berre''' brukast i slike tilfelle:
* Upassande personleg informasjon
*: ''Heimeadresser og telefonnummer, personnummer osb.''

'''Misbruk av dette systemet vil føre til at du mistar retten til å bruke det.'''

Versjonar av sider som vert fjerna vil ikkje vere tilgjengelege for nokon via nettsida, men slettingane vert logga og kan attopprettast manuelt av ein databaseadministrator dersom du gjer ein feil.",
	'hiderevision-reason' => 'Grunn (vert logga privat):',
	'hiderevision-submit' => 'Fjern denne informasjonen permanent',
	'hiderevision-tab' => 'Fjern versjonen',
	'hiderevision-link' => 'Gøymde brukarbidrag',
	'hiderevision-norevisions' => 'Ingen versjonar er merka for fjerning.',
	'hiderevision-noreason' => 'Du må gje ein grunn for denne fjerninga.',
	'hiderevision-status' => 'Versjon $1: $2',
	'hiderevision-success' => 'Versjonen vart arkivert og fjerna.',
	'hiderevision-error-missing' => 'Ikkje funne i databasen.',
	'hiderevision-error-current' => 'Kan ikkje slette den siste endringa på ei side. Rull attende denne endringa fyrst.',
	'hiderevision-error-delete' => 'Kunne ikkje arkivere, er endringa sletta tidlegare?',
	'hiderevision-archive-status' => 'Sletta versjon frå $1: $2',
	'oversight-nodiff' => 'Kunne ikkje spora endringar sidan det ikkje finst tidlegare versjonar av sida. Anten:
*Er sida sletta
*Eller den fjerna versjonen var den fyrste versjonen',
	'oversight-log-hiderev' => 'fjerna ei endring frå $1',
	'oversight' => 'Versjonsfjerning',
	'oversight-view' => 'detaljar',
	'oversight-difference' => '(Skilnad frå tidlegare attverande versjon)',
	'oversight-prev' => 'Siste tidlegare versjon',
	'oversight-hidden' => 'Fjerna versjon',
	'oversight-header' => 'Dette er ei liste over dei siste versjonane av sider som permanent er fjerna frå offentleg innsyn. Å gje denne informasjonen vidare kan gjere til at du permanent mistar retten til versjonsfjerning.',
	'oversight-legend' => 'Søk i versjonsfjerningsloggen',
	'oversight-oversighter' => 'Versjonsfjernar:',
	'oversight-offender' => 'Skuldig:',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Harald Khan
 * @author Jon Harald Søby
 * @author Laaknor
 */
$messages['no'] = array(
	'hiderevision' => 'Fjern revisjoner permanent',
	'hiderevision-desc' => 'Skjul enkeltrevisjoner fra alle brukere av juridiske grunner, etc.',
	'group-oversight' => 'Revisjonsslettere',
	'group-oversight-member' => 'Revisjonssletter',
	'grouppage-oversight' => '{{ns:project}}:Oversight',
	'right-oversight' => 'Vise tidligere slettede revisjoner',
	'right-hiderevision' => 'Se og gjenopprette skjulte siderevisjoner',
	'hiderevision-prompt' => 'Nummer på revisjonen som skal fjernes:',
	'hiderevision-continue' => 'Fortsett',
	'hiderevision-text' => "Dette burde '''kun''' brukes i følgende saker:
* Upassende personlig informasjon
*: ''hjemmeadresser og telefonnumre, personnumre o.l.''

'''Misbruk av dette systemet vil føre til at du mister rettighetene.'''

Revisjoner som fjernes vil ikke være tilgjengelige for noen via nettsiden, men slettingene logges og kan gjenopprettes manuelt av en databaseadministrator dersom du gjør en feil.",
	'hiderevision-reason' => 'Grunn (logges privat):',
	'hiderevision-submit' => 'Skjul denne informasjonen permanent',
	'hiderevision-tab' => 'Skjul revisjon',
	'hiderevision-link' => 'Skjulte brukerbidrag',
	'hiderevision-norevisions' => 'Ingen revisjoner merket for sletting.',
	'hiderevision-noreason' => 'Du må angi en grunn for denne slettingen.',
	'hiderevision-status' => 'Revisjon $1: $2',
	'hiderevision-success' => 'Arkivert og slettet.',
	'hiderevision-error-missing' => 'Ikke funnet i databasen.',
	'hiderevision-error-current' => 'Kan ikke slette siste redigering på en side. Tilbakestill endringen først.',
	'hiderevision-error-delete' => 'Kunne ikke arkivere; har den blitt slettet tidligere?',
	'hiderevision-archive-status' => 'Slettet revisjon fra $1: $2',
	'oversight-nodiff' => 'Kunne ikke spore endringer siden det ikke er noen foregående revisjon av siden. Enten:
*Ble siden slettet
*Eller så var den skjulte revisjonen den første',
	'oversight-log-hiderev' => 'fjernet en redigering fra $1',
	'oversight' => 'Revisjonssletting',
	'oversight-view' => 'detaljer',
	'oversight-difference' => '(Forskjell fra forrige gjenværende revisjon)',
	'oversight-prev' => 'Siste forrige revisjon',
	'oversight-hidden' => 'Skjult revisjon',
	'oversight-header' => 'Nedenfor er en liste over revisjoner som nylig er blitt skjult fra offentligheten. Å frigi denne informasjonen kan føre til permanent tap av revisjonsslettingsrettigheter.',
	'oversight-legend' => 'Søk i revisjonsfjerningsloggen',
	'oversight-oversighter' => 'Revisjonssletter:',
	'oversight-offender' => 'Synder:',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'hiderevision' => 'Amagar definitivament las revisions',
	'hiderevision-desc' => 'Amaga las modificacions individualas de totes los utilizaires per de motius legals, etc.',
	'group-oversight' => 'Supervisors',
	'group-oversight-member' => 'Supervisor',
	'grouppage-oversight' => '{{ns:project}}:Supervisor',
	'right-oversight' => 'Veire las revisions precedentament amagadas',
	'right-hiderevision' => 'Examinar e restablir las revisions amagadas als administrators',
	'hiderevision-prompt' => 'Numèro d’edicion de suprimir :',
	'hiderevision-continue' => 'Contunhar',
	'hiderevision-text' => "Aquesta foncionalitat deu èsser utilizada '''unicament''' pels cases seguents : * Entresenha personala inapropriada, *: ''Adreça personala e numèro de telèfon, numèro de seguretat sociala, etc...'' ''' L'abús d'aquesta foncionalitat implicarà la pèrda d'aquestes privilègis.''' Los articles escafats son pas mai visibles dins aqueste sistèma, mas aquestas supressions son jornalizadas e pòdon èsser restauradas manualament per un administrator qu'a un accès dirècte sus la banca de donadas se avètz facha una error.",
	'hiderevision-reason' => 'Motiu (serà enregistrat separadament) :',
	'hiderevision-submit' => "Amagar aquesta donada d'un biais permanent",
	'hiderevision-tab' => 'Amagar la modificacion',
	'hiderevision-link' => "Contribucions amagadas de l'utilizaire",
	'hiderevision-norevisions' => 'Cap de modificacion indicada de suprimir.',
	'hiderevision-noreason' => "Vos cal indicar la rason precisa d'aquesta supression.",
	'hiderevision-status' => 'Modificacion $1 : $2',
	'hiderevision-success' => 'Archivat e suprimit amb succès.',
	'hiderevision-error-missing' => 'Pas trobat dins la banca de donadas.',
	'hiderevision-error-current' => "Se pòt pas suprimir la darrièra revision dins una pagina. Fasètz una anullacion d'edicion de per abans.",
	'hiderevision-error-delete' => 'Aquesta pagina pòt pas èsser archivada ; Ja es estat suprimida ?',
	'hiderevision-archive-status' => 'Modificacion suprimida de $1 : $2',
	'oversight-nodiff' => 'Impossible de detectar de cambiaments tant que se tròba pas cap de revision anteriora per la pagina. Las rasons pòdon èsser las seguentas : *La pagina es estada suprimida, *La revision amagada èra la tota primièra de la pagina',
	'oversight-log-hiderev' => 'a suprimit una edicion de $1',
	'oversight' => 'Susvelhar',
	'oversight-view' => 'detalhs',
	'oversight-difference' => '(Diferéncia per rapòrt a la revision precedenta)',
	'oversight-prev' => 'Darrièra revision precedenta',
	'oversight-hidden' => 'Revision amagada',
	'oversight-header' => "Çaijós, figura la lista de las revisions amagadas de biais permanent al public. La divulgacion d'aquesta entresenha pòt aver coma consequéncia la descasença dels privilègis d’Oversight.",
	'oversight-legend' => 'Jornal de las recèrcas de las versions amagadas',
	'oversight-oversighter' => 'Supervisor :',
	'oversight-offender' => 'Difamator :',
);

/** Pangasinan (Pangasinan) */
$messages['pag'] = array(
	'hiderevision-tab' => 'Iyatol so binalo',
	'hiderevision-error-missing' => 'Aga naanap ed database.',
);

/** Pampanga (Kapampangan)
 * @author Katimawan2005
 */
$messages['pam'] = array(
	'right-hiderevision' => 'Surian la ampong isubli deng pamagbayung makasalikut kareng Sysop',
	'hiderevision-continue' => 'Deng ambag da reng talagamit a mebura',
	'hiderevision-noreason' => 'Kaylangan mung isplica ing sangkan nung bakit lalako me ini.',
);

/** Polish (Polski)
 * @author Beau
 * @author Derbeth
 * @author Leinad
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'hiderevision' => 'Trwałe ukrywanie wersji',
	'hiderevision-desc' => 'Pozwala ukryć pojedyncze zmiany przed wszystkimi użytkownikami np. ze względów prawnych.',
	'group-oversight' => 'Rewizorzy',
	'group-oversight-member' => 'rewizor',
	'grouppage-oversight' => '{{ns:project}}:Rewizorzy',
	'right-oversight' => 'Podgląd ukrytych wersji',
	'right-hiderevision' => 'Podgląd i odtwarzanie wersji ukrytych przed Administratorami',
	'hiderevision-prompt' => 'Numer wersji do usunięcia:',
	'hiderevision-continue' => 'Kontynuuj',
	'hiderevision-text' => "Funkcja powinna być użyta '''jedynie''' w następujących przypadkach:
* Zamieszczenie danych osobowych podlegających ochronie
*: ''adres domowy, numer telefonu, numer PESEL itp.''

'''Nadużywanie tej funkcji będzie skutkowało utratą uprawnień.'''

Usunięte elementy nie będą widoczne dla nikogo na stronach serwisu. Wszystkie usunięcia są rejestrowane, a usuwane dane mogą zostać ręcznie odtworzone przez administratorów bazy danych jeśli usunięcie było omyłkowe.",
	'hiderevision-reason' => 'Powód (nie będzie widoczny publicznie):',
	'hiderevision-submit' => 'Trwale ukryj te dane',
	'hiderevision-tab' => 'Ukryj tę wersję',
	'hiderevision-link' => 'Ukryty wkład użytkownika',
	'hiderevision-norevisions' => 'Nie określono wersji do usunięcia',
	'hiderevision-noreason' => 'Musisz wpisać powód usunięcia.',
	'hiderevision-status' => 'Wersja $1: $2',
	'hiderevision-success' => 'Pomyślnie zarchiwizowane i usunięte.',
	'hiderevision-error-missing' => 'Nie znaleziono w bazie danych.',
	'hiderevision-error-current' => 'Nie można usunąć ostatniej edycji strony.
Najpierw wycofaj ostatnią edycję.',
	'hiderevision-error-delete' => 'Nie można zarchiwizować. Czy wcześniej została usunięta?',
	'hiderevision-archive-status' => 'Usunięto wersję z $1: $2',
	'oversight-nodiff' => 'Nie można śledzić zmian, ponieważ brak wcześniejszych wersji tej strony. Prawdopodobnie:
*Strona została usunięta
*Ta ukryta wersja była pierwszą wersją',
	'oversight-log-hiderev' => 'usunął edycję z $1',
	'oversight' => 'Rejestr ukrywania',
	'oversight-view' => 'szczegóły',
	'oversight-difference' => '(Różnica z poprzednią wersją, która pozostała)',
	'oversight-prev' => 'Ostatnia z poprzednich wersji',
	'oversight-hidden' => 'Wersja ukryta',
	'oversight-header' => 'Poniżej znajduje się lista ukrytych, w ostatnim czasie, trwale przed dostępem publicznym wersji.
Ujawnianie tych informacji może skutkować stałą utratą uprawnień Rewizora.',
	'oversight-legend' => 'Szukaj ukrytych wersji w rejestrze',
	'oversight-oversighter' => 'Rewizor:',
	'oversight-offender' => 'Autor usuniętej edycji:',
);

/** Piedmontese (Piemontèis)
 * @author Bèrto 'd Sèra
 */
$messages['pms'] = array(
	'hiderevision' => 'Stërmé le revision na vira për tute',
	'hiderevision-prompt' => 'Nùmer ëd revision da gavé:',
	'hiderevision-continue' => 'Tiré anans',
	'hiderevision-text' => "Sòn a dovéia dovresse '''mach''' an cas che a-i sia:
* dj'anformassion personaj nen aproprià
*: ''adrësse ëd ca e nùmer ëd teléfono, còdes fiscaj e via fòrt''
'''A dovré sta fonsion-sì fòra via un a va ancontra a dle consegoense aministrative.''' Lòn ch'as gava via a resta gava da tut ël sit, ma jë scancelament a resto ant ij registr e a peulo esse pijait andré a man da n'aministratore dla base dat, s'a-i fusso dj'eror.",
	'hiderevision-reason' => 'Rason (a resta ant ij registr an forma privà):',
	'hiderevision-submit' => 'Stërmé sti dat-sì na vira për tute',
	'hiderevision-tab' => 'Stërmé la revision',
	'hiderevision-norevisions' => "A l'é pa sërnusse gnun-a revision da scancelé.",
	'hiderevision-noreason' => "A venta buté la rason ch'as ëscancela sossì.",
	'hiderevision-status' => 'Revision $1: $2',
	'hiderevision-success' => 'Archiviassion e scancelament andait a bonfin.',
	'hiderevision-error-missing' => 'Pa trovà ant la base dat.',
	'hiderevision-error-current' => "As peul pa scancelesse la version corenta. Anans che fe sòn ch'a buta corenta n'àotra version.",
	'hiderevision-error-delete' => "A l'é pa podusse archivié; ch'a sia stait scancelà anans d'ës moment-sì?",
	'hiderevision-archive-status' => 'Scancelà le revision da $1: $2',
	'oversight-nodiff' => "As peulo pa trové ij cambiament për via che al moment a-i é gnun-a revision pì veja dë sta pàgina. Dle doe l'un-a:
*la pàgina a l'é staita scancelà
*sta revision stërmà a l'era la prima",
	'oversight-log-hiderev' => 'gavà e modificà da $1',
	'oversight' => 'Gafada',
	'oversight-view' => 'detaj',
	'oversight-difference' => "(Diferense da 'nt le revision veje ch'a resto)",
	'oversight-prev' => 'Ùltima revision veja',
	'oversight-hidden' => 'Revision stërmà',
	'oversight-header' => "Ambelessì sota a-i é na lista dle revision stërmà ch'a l'é nen vàire. Publiché st'anformassion-sì a peul ëmné a perde ël drit ëd dovré ël sistema ëd coression dle gafade.",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'hiderevision-submit' => 'د تل لپاره همدا مالومات پټول',
	'oversight-view' => 'تفصيل',
);

/** Portuguese (Português)
 * @author 555
 * @author Lijealso
 * @author Malafaya
 * @author Sir Lestaty de Lioncourt
 */
$messages['pt'] = array(
	'hiderevision' => 'Ocultar revisões permanentemente',
	'hiderevision-desc' => 'Esconde, de todos os utilizadores, revisões individuais por razões legais, etc.',
	'group-oversight' => 'Supervisores',
	'group-oversight-member' => 'Supervisor',
	'grouppage-oversight' => '{{ns:project}}:Supervisão',
	'right-oversight' => 'Ver uma revisão previamente ocultada',
	'right-hiderevision' => 'Rever e restaurar revisões ocultadas dos Sysops',
	'hiderevision-prompt' => 'Número da revisão (edição) a ser removida:',
	'hiderevision-continue' => 'Avançar',
	'hiderevision-text' => "Isto deverá ser utilizado '''apenas''' nos seguintes casos:
* Informações pessoais inadequadas
*: ''endereços residenciais e números de telefone, número do seguro social, etc''

'''Abusos com este recurso poderão resultar na perda dos privilégios de acesso.'''

Os itens removidos não estarão mais visíveis a todos neste sítio,
mas estarão registados e poderão ser restaurados manualmente
por administrador da base de dados, caso você tenha cometido um engano.",
	'hiderevision-reason' => 'Motivo (será registado privadamente):',
	'hiderevision-submit' => 'Ocultar estes dados permanentemente',
	'hiderevision-tab' => 'Ocultar revisões',
	'hiderevision-link' => 'Contribuições de utilizador ocultadas',
	'hiderevision-norevisions' => 'Não foram especificadas revisões a serem ocultadas.',
	'hiderevision-noreason' => 'É necessário descrever o motivo para esta remoção.',
	'hiderevision-status' => 'Revisão $1: $2',
	'hiderevision-success' => 'Arquivado e apagado com sucesso.',
	'hiderevision-error-missing' => 'Não foi localizada na base de dados.',
	'hiderevision-error-current' => 'Não é possível ocultar a edição mais recente de uma página. Reverta a alteração primeiro.',
	'hiderevision-error-delete' => 'Não é possível arquivar; não teria sido eliminada antes da tentativa?',
	'hiderevision-archive-status' => 'Revisão ocultada de $1: $2',
	'oversight-nodiff' => 'Não foi possível verificar as alterações, uma vez que não há edições anteriores para esta página. Motivos possíveis:
*A página foi eliminada
*Esta edição oculta era a primeira edição da página',
	'oversight-log-hiderev' => 'removida uma edição de $1',
	'oversight' => 'Supervisão',
	'oversight-view' => 'detalhes',
	'oversight-difference' => '(Diferenças entre as edições anteriores restantes)',
	'oversight-prev' => 'Última edição anterior',
	'oversight-hidden' => 'Edição oculta',
	'oversight-header' => 'Listagem de edições permanentemente ocultas de serem vistas publicamente.
Liberar tais dados poderá resultar na perda em definitivo dos privilégios de oversight.',
	'oversight-legend' => 'Pesquisar registro de revisões ocultas',
	'oversight-oversighter' => 'Supervisor:',
	'oversight-offender' => 'Ofensor:',
);

/** Quechua (Runa Simi)
 * @author AlimanRuna
 */
$messages['qu'] = array(
	'right-hiderevision' => 'Kamachiqkunamanta pakasqa musuqchasqakunata qhawaspa paqarichiy',
	'oversight-difference' => "(ñawpaqllan kakuqraq llamk'apusqamanta wakin kay)",
	'oversight-prev' => "Kay p'anqap kunan kachkayninpa ñawpaqllan llamk'apusqa",
	'oversight-hidden' => "Pakasqa llamk'apusqa",
);

/** Romani (Romani)
 * @author Desiphral
 */
$messages['rmy'] = array(
	'hiderevision-submit' => 'Garav o paruvipen',
);

/** Romanian (Română)
 * @author KlaudiuMihaila
 */
$messages['ro'] = array(
	'oversight-view' => 'detalii',
);

/** Russian (Русский)
 * @author Ahonc
 * @author Ferrer
 * @author HalanTul
 * @author Silence
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'hiderevision' => 'Скрыть правку',
	'hiderevision-desc' => 'Скрывает отдельные правки от всех участников, используется по судебно-юридическим причинам и т. п.',
	'group-oversight' => 'Ревизоры',
	'group-oversight-member' => 'ревизор',
	'grouppage-oversight' => '{{ns:project}}:Ревизоры',
	'right-oversight' => 'просмотр ранее скрытой правки',
	'right-hiderevision' => 'просмотр и восстановление скрытых от администраторов правок',
	'hiderevision-prompt' => 'Номер правки, которую требуется скрыть:',
	'hiderevision-continue' => 'Продолжить',
	'hiderevision-text' => "Данная страница должна использоваться '''только''' в следующих случаях:
* разглашение личной информации 
*: ''домашние адреса, номера телефонов, паспортов, и т. п.''.

'''Злоупотребление данной системой повлечёт за собой лишение прав ревизора.'''

Скрытые версии страниц не будут никому видны на веб-сайте, но они записываются в журнал и могут быть вручную восстановлены администратором базы данных, если вы случайно сделаете ошибку.",
	'hiderevision-reason' => 'Причина (будет записана в закрытый журнал):',
	'hiderevision-submit' => 'Скрыть данные',
	'hiderevision-tab' => 'Скрыть правку',
	'hiderevision-link' => 'Скрытый вклад участника',
	'hiderevision-norevisions' => 'Не были указаны версии, которые следует скрыть.',
	'hiderevision-noreason' => 'Вы должны написать причину сокрытия.',
	'hiderevision-status' => 'Версия №$1: $2',
	'hiderevision-success' => 'Успешно заархивирована и скрыта.',
	'hiderevision-error-missing' => 'Не найдена в базе данных.',
	'hiderevision-error-current' => 'Невозможно скрыть текущую версию страницы.
Сначала откатите изменения.',
	'hiderevision-error-delete' => 'Невозможно заархивировать. Проверьте, не была ли версия удалена ранее.',
	'hiderevision-archive-status' => 'Удалена версия со страницы $1: $2',
	'oversight-nodiff' => 'Невозможно определить изменения из-за недоступности предыдущей версии страницы. Возможно:
*Данная страница была удалена
*Скрытая версия была первой',
	'oversight-log-hiderev' => 'скрыта правка со страницы $1',
	'oversight' => 'Скрытие правок',
	'oversight-view' => 'подробнее',
	'oversight-difference' => '(Разница с предыдущей неудалённой версией)',
	'oversight-prev' => 'Предыдущая версия',
	'oversight-hidden' => 'Скрытая версия',
	'oversight-header' => 'Ниже приведены правки, которые недавно были скрыты.
Распространение данной информации может повлечь лишение прав ревизора.',
	'oversight-legend' => 'Поиск по журналу сокрытия правок',
	'oversight-oversighter' => 'Ревизор:',
	'oversight-offender' => 'Нарушитель:',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'hiderevision' => 'Торумнарын куруук кистээ',
	'hiderevision-desc' => 'Сирэй сорох торумнарын кыттааччылартан барытыттан кистиир, суут-сокуон ирдэбилинэн иҥин туһаныллар.',
	'group-oversight' => 'Ревизия ыытааччылар/ревизордар',
	'group-oversight-member' => 'Ревизор',
	'grouppage-oversight' => '{{ns:project}}:Ревизордар',
	'hiderevision-prompt' => 'Кистэниэхтээх торум нүөмэрэ:',
	'hiderevision-continue' => 'Салгыы',
	'hiderevision-text' => "Бу сирэй киһи ''дьиҥнээх аата, дьиэтин аадырыһа, төлөппүөнүн, пааспарын нүөмэрдэрэ уонна да атын сиһилии сибидиэнньэлэр'' бэриллэр '''буоллахтарына эрэ''' туттуллуон сөп.

'''Бу систиэмэни сыыһа туттуу быраап быһыытыгар тиэрдэр.'''

Сирэй кистэммит торумнара MediaWiki интерфейсынан көрдөрүллүөхтэрэ суоҕа, ол гынан баран аналлаах сурунаалга суруллаллар, уонна алҕас туох эмит сыыһаны оҥордоххуна администраатар ону туһанан көннөрүөн сөп.",
	'hiderevision-reason' => 'Төрүөтэ (сабыылаах сурунаалга суруллуо):',
	'hiderevision-submit' => 'Сибидиэнньэлэри кистээ',
	'hiderevision-tab' => 'Торуму көрдөрүмэ',
	'hiderevision-norevisions' => 'Көрдөрүллүө суохтаах сирэйдэр ыйыллыбатахтар.',
	'hiderevision-noreason' => 'Кистиир төрүөккүн суруйуохтааххын.',
	'hiderevision-status' => '$1 нүөмэрдээх торум: $2',
	'hiderevision-success' => 'Архыыптанна уонна кистэннэ.',
	'hiderevision-error-missing' => 'Билэ киэбигэр көстүбэтэт.',
	'hiderevision-error-current' => 'Сирэй бу торумун сотор табыллыбата. Бастаан урукку торумугар төннөр.',
	'hiderevision-error-delete' => 'Архыыптанар кыаҕа суох; баҕар бу иннинэ сотуллубута буолаарай?',
	'hiderevision-archive-status' => '$1 сирэй торума сотулунна: $2',
	'oversight-nodiff' => 'Сирэй бу иннинээҕи торума тахсыбакка уларыйыылар кыайан көрдөрүллүбэтилэр.
Баҕар:
*Сирэй сотуллубута буолуо
*Кистэниллибит торум бастакы буолуо',
	'oversight-log-hiderev' => 'мантан $1 көннөрүү кистэммит',
	'oversight' => 'Торумнары кистээһин сурунаала',
	'oversight-view' => 'сиһилии',
	'oversight-difference' => '(бу иннинээҕи сотуллубатах торумтан уратыта)',
	'oversight-prev' => 'Бу иннинээҕи торум',
	'oversight-hidden' => 'Кистэммит торум',
	'oversight-header' => 'Манна соторутааҕыта кистэммит торумнар көрдөрүлүннүлэр.
Бу сибидиэнньэлэри тарҕатыы ырытааччы быраабын быһыыга тиэрдиэн сөп.',
	'oversight-legend' => 'Уларытыыны кистиир сурунаалга көрдөөһүн',
);

/** Sicilian (Sicilianu)
 * @author Melos
 * @author Santu
 */
$messages['scn'] = array(
	'hiderevision' => 'Ammucciata pi sempri di li rivisioni',
	'hiderevision-desc' => "Ammuccia a tutti l'utenti rivisioni ùnichi di li pàggini (pi mutivi di liggi, eccettra)",
	'group-oversight' => 'Oversighters',
	'group-oversight-member' => 'oversight',
	'grouppage-oversight' => '{{ns:project}}:Oversight',
	'right-oversight' => "Fà taliari na rivisioni ca s'avìa ammucciatu prima",
	'right-hiderevision' => "Talìa n'àutra vota e riprìstina virsioni ammucciati",
	'hiderevision-prompt' => "Nùmmiru di li rivisioni d'ammucciari:",
	'hiderevision-continue' => 'Cuntìnua',
	'hiderevision-text' => "Sta funzioni s'hà usari '''sulamenti''' nta sti casi: 
* Dati pirsunali non apprupriati
*: ''ndirizzi pustali, nùmmiri di tilèfunu, còdici fiscali, ecc.''

'''Tutti l'abbusi dû sistema porta a la livata di li privileggi.'''

L'elimenti ammucciati li ponnu taliari tutti ntô situ, ma
c'è nu riggistru di li rivisioni ammucciati e la pussibbilitati di
nu riprìstinu manuali ca pù fari n'amministraturi dû database
ntô casu di erruri.",
	'hiderevision-reason' => 'Mutivu (pô riggistru arisirvatu):',
	'hiderevision-submit' => 'Ammuccia li dati pi sempri',
	'hiderevision-tab' => 'Ammuccia rivisioni',
	'hiderevision-link' => 'Cuntribbuti utenti ammucciati',
	'hiderevision-norevisions' => "Non vinni ammustrata nudda rivizioni d'ammucciari.",
	'hiderevision-noreason' => "E' nicissariu ammustrari lu mutivi di l'ammucciatina.",
	'hiderevision-status' => 'Rivisioni $1: $2',
	'hiderevision-success' => 'Archiviazzioni e ammucciatini cumplitati.',
	'hiderevision-error-missing' => 'Non attruvatu ntô database.',
	'hiderevision-error-current' => "Mpussìbbili ammucciari l'ùrtima mudìfica di na pàggina. Scancillari la mudìfica prima di jiri avanti p'ammucciari.",
	'hiderevision-error-delete' => "Nun si pò archiviari; apprima c'èranu scancillazzioni?",
	'hiderevision-archive-status' => 'Rivisioni ammucciata di $1: $2',
	'oversight-nodiff' => "Mpussìbbili ammustrari li mudìfichi pirchì apprima non ci sunnu rivisioni dâ pàggina. Pò èssiri ca:
*La pàggina fu scancillata
*St'ammucciata di rivisioni era la prima pi la pàggina",
	'oversight-log-hiderev' => 'Ammucciau na mudìfica di $1',
	'oversight' => 'Oversight',
	'oversight-view' => 'dittagghi',
	'oversight-difference' => "(Diffirenzi 'n cunfruntu a la virsioni c'avìa aristata prima)",
	'oversight-prev' => 'Ùrtima rivisioni di prima',
	'oversight-hidden' => 'Rivisioni ammucciata',
	'oversight-header' => 'Ccà di sècutu veni ammustrata na lista dî rivizioni ammucciati pi sempri a li visitaturi dû situ.
Lu spàrgiri ssi nfurmazzioni pò fari livari pi sempri li diritti di oversight.',
	'oversight-legend' => 'Cerca li log di li rivisioni ammucciati',
	'oversight-oversighter' => 'Oversighter:',
	'oversight-offender' => 'Riatu:',
);

/** Sinhala (සිංහල)
 * @author නන්දිමිතුරු
 */
$messages['si'] = array(
	'hiderevision-prompt' => 'ගෙන යා යුතු සංශෝධන අංකය:',
	'hiderevision-continue' => 'කරගෙන යන්න',
	'hiderevision-submit' => 'මෙම දත්ත ස්ථීර වශයෙන් සඟවන්න',
	'hiderevision-tab' => 'සංශෝධනය සඟවන්න',
	'oversight' => 'ප්‍රමාද දෝෂය',
	'oversight-view' => 'විස්තර',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'hiderevision' => 'Natrvalo skryť revízie',
	'hiderevision-desc' => 'Skrýva jednotlivé určené revízie všetkým používateľom (z právnych dôvodov atď.)',
	'group-oversight' => 'Dozorcovia',
	'group-oversight-member' => 'Dozorca',
	'grouppage-oversight' => '{{ns:project}}:Dozorcovia',
	'right-oversight' => 'Zobraziť predtým skrytú revíziu',
	'right-hiderevision' => 'Kontrolovať a obnovovať revízie skryté správcom',
	'hiderevision-prompt' => 'Číslo revízie, ktorá sa má odstrániť:',
	'hiderevision-continue' => 'Pokračovať',
	'hiderevision-text' => "Táto funkcia by sa mala využívať '''výlučne''' v nasledovných prípadoch:
* Nevhodné osobné informácie
*: ''domáce adresy a telefónne čísla, čísla sociálneho poistenia atď.''

'''Zneužitie tohto systému bude potrestané odňatím privilégií.'''

Odstránené položky nebudú viditeľné nikomu prostredníctvom webstránky,
ale o mazaniach sa vedie záznam a je možné ich obnoviť ručne
administrátorom databázy v prípade, že spravíte chybu.",
	'hiderevision-reason' => 'Dôvod (bude privátne zaznamenaný):',
	'hiderevision-submit' => 'Natrvalo skryť tieto údaje',
	'hiderevision-tab' => 'Skryť revíziu',
	'hiderevision-link' => 'Skryté príspevky používateľa',
	'hiderevision-norevisions' => 'Neboli uvedené revízie, ktoré majú byť skryté.',
	'hiderevision-noreason' => 'Musíte uviesť dôvod odstránenia.',
	'hiderevision-status' => 'Revízia $1: $2',
	'hiderevision-success' => 'Úspešne archivované a zmazané.',
	'hiderevision-error-missing' => 'Nenájdené v databáze.',
	'hiderevision-error-current' => 'Nebolo možné zmazať poslednú úpravu stránky. Najprv túto zmenu vráťte.',
	'hiderevision-error-delete' => 'Nebolo možné archivovať; bolo už predtým zmazané?',
	'hiderevision-archive-status' => 'Zmazané revízie počínajúc $1: $2',
	'oversight-nodiff' => 'Nie je možné sledovať zmeny, lebo momentálne neexistuje predošlá revízia stránky. Buď
* stránka bola zmazaná, alebo
* táto skrytá revízia bola prvá revízia',
	'oversight-log-hiderev' => 'Odstránená úprava z $1',
	'oversight' => 'Dozor',
	'oversight-view' => 'podrobnosti',
	'oversight-difference' => '(Rozdiel s predchádzajúcou zostávajúcou revíziou)',
	'oversight-prev' => 'Posledná predošlá revízia',
	'oversight-hidden' => 'Skrytá revízia',
	'oversight-header' => 'Dolu je zoznam revízií, ktoré boli nedávno permanentne skryté pohľadu verejnosti. Šírenie týchto informácií môže mať za dôsledok permanentnú stratu práv Dozrcu (oversight).',
	'oversight-legend' => 'Hľadať v zázname skrývania revízií',
	'oversight-oversighter' => 'Dozorca:',
	'oversight-offender' => 'Previnilec:',
);

/** Samoan (Gagana Samoa)
 * @author MF-Warburg
 */
$messages['sm'] = array(
	'hiderevision-continue' => 'Tumau',
);

/** Serbian (Српски / Srpski) */
$messages['sr'] = array(
	'hiderevision' => 'Трајно сакриј ревизије',
	'hiderevision-prompt' => 'Број ревизије за уклањање:',
	'hiderevision-continue' => 'Настави',
	'hiderevision-text' => "Ова опција треба да се користи '''само''' у следећим случајевима:

* Неумесне личне информације
*: ''кућне адресе, бројеви телефона, матични бројеви и сл.''

'''Злоупотреба овог система ће довести до губитка ових привилегија.'''

Уклоњене ставке неће бити видљиве никоме преко сајта, али се брисања записују
и администратори базе података их могу ручно вратити ако направите грешку.",
	'hiderevision-reason' => 'Разлог (биће записан приватно)::',
	'hiderevision-submit' => 'Сакриј ове податке заувек',
	'hiderevision-tab' => 'Сакриј ревизију',
	'hiderevision-norevisions' => 'Није назначена ниједна ревизија за брисање.',
	'hiderevision-noreason' => 'Морате дати разлог за ово уклањање.',
	'hiderevision-status' => 'Ревизија $1: $2',
	'hiderevision-success' => 'Успешно архивирање и брисање.',
	'hiderevision-error-missing' => 'Није пронађено у бази података.',
	'hiderevision-error-current' => 'Не могу да обришем најскорију измену на страници. Прво вратите измену.',
	'hiderevision-error-delete' => 'Не могу да архивирам; да ли је претходно обрисана?',
	'hiderevision-archive-status' => 'Обрисана ревизија из $1: $2',
	'oversight-log-hiderev' => 'уклоњена измена из $1',
	'oversight' => 'Пропуст',
	'oversight-view' => 'детаљи',
);

/** Serbian Cyrillic ekavian (ћирилица)
 * @author Millosh
 */
$messages['sr-ec'] = array(
	'hiderevision' => 'Трајно сакриј ревизије',
	'hiderevision-desc' => 'Сакриј појединачне верзије од свих сарадника због легалних разлога и сл.',
	'group-oversight' => 'оверсајтови',
	'group-oversight-member' => 'оверсајт',
	'grouppage-oversight' => '{{ns:project}}:Оверсајт',
	'right-oversight' => 'Прегледај претходно сакривене верзије.',
	'right-hiderevision' => 'Преглед и враћање измена сакривених од сисопа.',
	'hiderevision-prompt' => 'Број ревизије за уклањање:',
	'hiderevision-continue' => 'Настави',
	'hiderevision-text' => "Ова опција треба да се користи '''само''' у следећим случајевима:

* Неумесне личне информације
*: ''кућне адресе, бројеви телефона, матични бројеви и сл.''

'''Злоупотреба овог система ће довести до губитка ових привилегија.'''

Уклоњене ставке неће бити видљиве никоме преко сајта, али се брисања записују
и администратори базе података их могу ручно вратити ако направите грешку.",
	'hiderevision-reason' => 'Разлог (биће записан приватно)::',
	'hiderevision-submit' => 'Сакриј ове податке заувек',
	'hiderevision-tab' => 'Сакриј ревизију',
	'hiderevision-norevisions' => 'Није назначена ниједна ревизија за брисање.',
	'hiderevision-noreason' => 'Морате дати разлог за ово уклањање.',
	'hiderevision-status' => 'Ревизија $1: $2',
	'hiderevision-success' => 'Успешно архивирање и брисање.',
	'hiderevision-error-missing' => 'Није пронађено у бази података.',
	'hiderevision-error-current' => 'Не могу да обришем најскорију измену на страници. Прво вратите измену.',
	'hiderevision-error-delete' => 'Не могу да архивирам; да ли је претходно обрисана?',
	'hiderevision-archive-status' => 'Обрисана ревизија из $1: $2',
	'oversight-nodiff' => 'Нисам у могућности да пратим измене пошто не тренутно не постоје претходне верзије стране. Могући разлози:
* страна је обрисана или
* сакривена верзија је била прва верзија.',
	'oversight-log-hiderev' => 'уклоњена измена из $1',
	'oversight' => 'Пропуст',
	'oversight-view' => 'детаљи',
	'oversight-difference' => '(Разлике између претходних верзија које су остале.)',
	'oversight-prev' => 'Последња претходна верзија.',
	'oversight-hidden' => 'Сакривене верзије.',
	'oversight-header' => 'Испод се налази списак верзија претходно сакривених од јавности. Ако откријеш ове податке можеш заувек изгубити оверсајт права.',
);

/** latinica (latinica)
 * @author Sasa Stefanovic
 */
$messages['sr-el'] = array(
	'hiderevision' => 'Trajno sakrij revizije',
	'hiderevision-prompt' => 'Broj revizije za uklanjanje:',
	'hiderevision-continue' => 'Nastavi',
	'hiderevision-text' => "Ova opcija treba da se koristi '''samo''' u sledećim slučajevima:

* Neumesne lične informacije
*: ''kućne adrese, brojevi telefona, matični brojevi i sl.''

'''Zloupotreba ovog sistema će dovesti do gubitka ovih privilegija.'''

Uklonjene stavke neće biti vidljive nikome preko sajta, ali se brisanja zapisuju
i administratori baze podataka ih mogu ručno vratiti ako napravite grešku.",
	'hiderevision-reason' => 'Razlog (biće zapisan privatno)::',
	'hiderevision-submit' => 'Sakrij ove podatke zauvek',
	'hiderevision-tab' => 'Sakrij reviziju',
	'hiderevision-norevisions' => 'Nije naznačena nijedna revizija za brisanje.',
	'hiderevision-noreason' => 'Morate dati razlog za ovo uklanjanje.',
	'hiderevision-status' => 'Revizija $1: $2',
	'hiderevision-success' => 'Uspešno arhiviranje i brisanje.',
	'hiderevision-error-missing' => 'Nije pronađeno u bazi podataka.',
	'hiderevision-error-current' => 'Ne mogu da obrišem najskoriju izmenu na stranici. Prvo vratite izmenu.',
	'hiderevision-error-delete' => 'Ne mogu da arhiviram; da li je prethodno obrisana?',
	'hiderevision-archive-status' => 'Obrisana revizija iz $1: $2',
	'oversight-log-hiderev' => 'uklonjena izmena iz $1',
	'oversight' => 'Propust',
	'oversight-view' => 'detalji',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'hiderevision' => 'Versione duurhaft wächhoalje',
	'hiderevision-prompt' => 'Wäch tou hoaljende Versionsnummer:',
	'hiderevision-continue' => 'Fääre',
	'hiderevision-text' => "Dit duur '''bloot''' in do foulgjende Falle geböäre:
* Persöönelke Informatione:
*: ''Realname, Adresse, Telefonnummer un äänelke privoate Details''

'''Die Misbruuk fon dit System lukt dän Ferljus fon disse Gjuchte ätter sik!'''

Wächhoalde Versione sunt truch neemens moor uur ju Website ientoukiekjen.
Jo wäide oawers protokollierd un konnen bie n Failer truch n Doatenboankadministrator wier häärstoald wäide.",
	'hiderevision-reason' => 'Gruund (wäd uunsichtboar protokollierd):',
	'hiderevision-submit' => 'Hoal disse Texte duurhaft wäch',
	'hiderevision-tab' => 'Hoal Versione wäch',
	'hiderevision-norevisions' => 'Der wuude neen Version ounroat toun Wächhoaljen.',
	'hiderevision-noreason' => 'Jie mouten n Gruund foar dät Wächhoaljen ounreeke.',
	'hiderevision-status' => 'Version $1: $2',
	'hiderevision-success' => 'Mäd Ärfoulch archivierd un wächhoald.',
	'hiderevision-error-missing' => 'In ju Doatenboank nit fuunen.',
	'hiderevision-error-current' => 'Ju lääste Beoarbaidenge fon ne Siede kon nit wächhoald wäide. Sät ju Beoarbaidenge eerste tourääch.',
	'hiderevision-error-delete' => 'Archivierenge nit muugelk. Wuude ju al eer löösd?',
	'hiderevision-archive-status' => 'Läskede Versione fon $1: $2',
	'oversight-nodiff' => 'Der is neen Versionsfergliek muugelk, deer et apstuuns neen fröiere Version fon disse Siede rakt.
Muugelke Gruunde:
*Ju Siede wuude läsked
*Ju wächhoalde Version waas ju eerste Version',
	'oversight-log-hiderev' => 'Hoalde ne Beoarbaidenge fon $1 wäch',
	'oversight' => 'Fersjoon',
	'oversight-view' => 'Details',
	'oversight-difference' => '(Unnerscheed tou ju foarige ferblieuwene Version)',
	'oversight-prev' => 'Lääste foarige Version',
	'oversight-hidden' => 'Wächhoalde Version',
	'oversight-header' => 'Hierunner foulget ne Lieste fon do duurhaft wächhoalde Versione. Ju Bekoandmoakenge fon disse Informatione kon dän duurhafte Ferljus fon do Oversight-Gjuchte betjuude.',
);

/** Sundanese (Basa Sunda)
 * @author Kandar
 */
$messages['su'] = array(
	'hiderevision-continue' => 'Teruskeun',
	'hiderevision-reason' => 'Alesan (bakal asup log pribadi):',
	'hiderevision-noreason' => 'Anjeun kudu méré alesan ngahapus.',
	'hiderevision-status' => 'Révisi $1: $2',
	'hiderevision-success' => 'Anggeus diarsipkeun & disumputkeun.',
	'hiderevision-error-missing' => 'Teu kapanggih di pangkalan data.',
	'hiderevision-archive-status' => 'Révisi dihapus ti $1: $2',
	'oversight-log-hiderev' => 'ngahapus hiji éditan ti $1',
	'oversight-hidden' => 'Révisi nyumput',
);

/** Swedish (Svenska)
 * @author Boivie
 * @author Jon Harald Søby
 * @author Lejonel
 * @author M.M.S.
 * @author Najami
 */
$messages['sv'] = array(
	'hiderevision' => 'Dölj sidversioner permanent',
	'hiderevision-desc' => 'Döljer enskilda sidversioner från alla användare, t.ex. av juridiska skäl',
	'group-oversight' => 'Censorer',
	'group-oversight-member' => 'censor',
	'grouppage-oversight' => '{{ns:project}}:Censur',
	'right-oversight' => 'Visa tidigare dolda versioner',
	'right-hiderevision' => 'Se och återställa sidversioner som dolts för administratörer',
	'hiderevision-prompt' => 'Nummer för sidversionen som ska tas bort:',
	'hiderevision-continue' => 'Fortsätt',
	'hiderevision-text' => "Detta ska '''endast''' användas i följande fall:
* Olämplig personlig information
*: ''hemadresser, telefonnummer, personnummer, och liknande''

'''Missbruk av det här systemet leder till att rättigheterna tas bort.'''

Borttagna objekt kommer inte att vara synliga för någon genom webbplatsen, men raderingarna loggförs och kan återställas manuellt av databasadministratörer ifall du gör något misstag.",
	'hiderevision-reason' => 'Anledning (sparas i en privat logg):',
	'hiderevision-submit' => 'Dölj informationen permanent',
	'hiderevision-tab' => 'Dölj version',
	'hiderevision-link' => 'Dolda användarbidrag',
	'hiderevision-norevisions' => 'Ingen sidversion har angivits.',
	'hiderevision-noreason' => 'Du måste ange en anledning för den här raderingen.',
	'hiderevision-status' => 'Sidversion $1: $2',
	'hiderevision-success' => 'Arkivering och radering lyckades.',
	'hiderevision-error-missing' => 'Hittades inte i databasen.',
	'hiderevision-error-current' => 'Kan inte radera den sista versionen av en sida. Återställ den senaste ändringen först.',
	'hiderevision-error-delete' => 'Kunde inte arkivera; har versionen raderats tidigare?',
	'hiderevision-archive-status' => 'Raderade version av $1: $2',
	'oversight-nodiff' => 'Ändringarna kunde inte hittas eftersom det inte finns någon tidigare version av sidan. Anledningar till det kan vara:
* Sidan har raderats
* Den dolda versionen var den första sidversionen',
	'oversight-log-hiderev' => 'tog bort en version av $1',
	'oversight' => 'Censur',
	'oversight-view' => 'detaljer',
	'oversight-difference' => '(Skillnad mot föregående synliga version)',
	'oversight-prev' => 'Senaste tidigare version',
	'oversight-hidden' => 'Dold version',
	'oversight-header' => 'Här nedanför visas en lista över sidversioner som nyligen dolts permanent från allmän visning.
Användare som sprider den här informationen vidare kan få sina censorrättigheter permanent borttagna.',
	'oversight-legend' => 'Sök i versionsborttagningsloggen',
	'oversight-oversighter' => 'Censor:',
	'oversight-offender' => 'Syndare:',
);

/** Silesian (Ślůnski)
 * @author Lajsikonik
 */
$messages['szl'] = array(
	'right-hiderevision' => 'Přyglůndańy i uodtwařańy sprowjyń schrůńůnych před admińistratorami',
);

/** Telugu (తెలుగు)
 * @author Chaduvari
 * @author Veeven
 */
$messages['te'] = array(
	'hiderevision' => 'కూర్పులను శాశ్వతంగా దాచు',
	'hiderevision-desc' => 'చట్టబద్ధమైన, మొదలగు కారణాల వల్ల అందరు వాడుకర్ల నుండి వ్యక్తిగత కూర్పులను దాచు',
	'right-hiderevision' => 'నిర్వాహకులకు కనబడకుండా ఉన్న కూర్పులను సమీక్షించి పౌనస్థాపించు',
	'hiderevision-prompt' => 'తొలగించాల్సిన కూర్పు సంఖ్య:',
	'hiderevision-continue' => 'కొనసాగించు',
	'hiderevision-reason' => 'కారణం (అంతరంగికంగా లాగ్ చేస్తాం):',
	'hiderevision-submit' => 'ఈ డాటాని శాశ్వతంగా దాచు',
	'hiderevision-tab' => 'కూర్పుని దాచు',
	'hiderevision-norevisions' => 'తొలగించడానికి కూర్పులేమీ ఇవ్వలేదు.',
	'hiderevision-noreason' => 'ఈ తొలగింపుకి మీరు తప్పనిసరిగా కారణం వివరించాలి.',
	'hiderevision-status' => 'కూర్పు $1: $2',
	'hiderevision-error-missing' => 'డాటాబేసులో కనబడలేదు.',
	'hiderevision-error-current' => 'ఈ పేజీకి జరిగిన చిట్ట చివరి మార్పుని తొలగించలేము. ఈ మార్పుని మొదట తిరగ్గొట్టండి.',
	'hiderevision-archive-status' => '$1 నుండి తొలగించిన కూర్పు: $2',
	'oversight-log-hiderev' => '$1 నుండి ఓ మార్పుని తొలగించాం',
	'oversight-view' => 'వివరాలు',
	'oversight-difference' => '(గతంలో ఉన్న కూర్పు నుండి తేడా)',
	'oversight-prev' => 'చివరి గత కూర్పు',
	'oversight-hidden' => 'దాచిన కూర్పు',
);

/** Tetum (Tetun)
 * @author MF-Warburg
 */
$messages['tet'] = array(
	'group-oversight' => "Oversight-na'in sira",
	'group-oversight-member' => "Oversight-na'in",
	'grouppage-oversight' => '{{ns:project}}:Oversight',
	'hiderevision-prompt' => "Sura versaun nian ne'ebé hakarak halakon:",
	'hiderevision-tab' => 'Subar versaun',
	'hiderevision-norevisions' => "Versaun lá'os ba halakon",
	'hiderevision-status' => 'Versaun $1: $2',
	'hiderevision-error-current' => 'La bele subar versaun foun pájina nian. Ulun filak pájina.',
	'oversight-log-hiderev' => 'subar edita husi $1',
	'oversight' => 'Oversight',
	'oversight-view' => 'barak liu',
	'oversight-hidden' => 'Versaun nasubar tiha ona',
);

/** Tajik (Cyrillic) (Тоҷикӣ (Cyrillic))
 * @author Ibrahim
 */
$messages['tg-cyrl'] = array(
	'hiderevision' => 'Бо ҳамешагӣ пинҳон кардани нусхаҳо',
	'hiderevision-desc' => 'Пинҳон кардани нусхаҳои хос аз тамоми корбарон ба далели қонунӣ ва ғайра.',
	'group-oversight' => 'Нозирон',
	'group-oversight-member' => 'Нозир',
	'grouppage-oversight' => '{{ns:project}}:Назорат',
	'right-oversight' => 'Дидани нусхаҳои қаблан пинҳонбуда',
	'right-hiderevision' => 'Баррасӣ ва барқароркунии нусхаҳои пинҳони аз мудирон',
	'hiderevision-prompt' => 'Шумораи нусхаҳое, ки ҳазф мешаванд:',
	'hiderevision-continue' => 'Идома',
	'hiderevision-text' => "Ин қобилият '''фақат''' дар мавориди зер бояд истифода шавад:
* Иттилооти шахсии номуносиб
*: ''нишонии манзил ва шумораи телефон, ва ғайра''

'''Сӯистифода аз имконот мумкин ба аз даст додани ихтиёрот оварда расонад.'''

Мавориде, ки ҳазф мешаванд тавассути ҳеҷ корбар дар сомона қобили дидан нахоҳад буд,
аммо ин маворид дар гузориши марбут ба он сабт мешаванд ва агар иштибоҳе сурат бигирад, тавассути мудирони пойгоҳи дода қобили баргашт хоҳад буд.",
	'hiderevision-reason' => 'Далел (ба таври хусусӣ сабт мешавад):',
	'hiderevision-submit' => 'Пинҳон кардан ин дода бо ҳамешагӣ',
	'hiderevision-tab' => 'Пинҳон кардани нусха',
	'hiderevision-link' => 'Ҳиссагузориҳои корбари пинҳонӣ',
	'hiderevision-norevisions' => 'Нусхае барои ҳазф мушаххас нашуда буд.',
	'hiderevision-noreason' => 'Шумо бояд далели ин ҳазфро тавзеҳ диҳед.',
	'hiderevision-status' => 'Нусха $1: $2',
	'hiderevision-success' => 'Бо муваффақият бойгонӣ ва ҳазф шуд.',
	'hiderevision-error-missing' => 'Дар пойгоҳи дода пайдо нашуд.',
	'hiderevision-error-current' => 'Охирин вироиши як саҳифаро наметавон ҳазф кард. Ибтидо охирин тағйиротро вогардонӣ кунед.',
	'hiderevision-error-delete' => 'Имкони бойгонӣ кардан вуҷуд надошт; оё қаблан ҳазф шудааст?',
	'hiderevision-archive-status' => 'Нусхае аз $1ро ҳазф кард: $2',
	'oversight-nodiff' => 'Имкони дунбол кардани тағйирот вуҷуд надорад, чунки ин саҳифа дар ҳоли ҳозир нусхаи кӯҳнатерро надорад. 
Эҳтимолан:
*Саҳифа ҳазф шудааст
*Нусхаи пинҳоншуда аввалин нусхаи саҳифа будааст',
	'oversight-log-hiderev' => 'нусхае аз $1ро ҳазф кард',
	'oversight' => 'Назар',
	'oversight-view' => 'бештар',
	'oversight-difference' => '(Тафовут аз қаблан нусхаи боқимонда)',
	'oversight-prev' => 'Охирин нусхаи қаблӣ',
	'oversight-hidden' => 'Нусхаи пинҳоншуда',
	'oversight-header' => 'Дар зер феҳристе аз нусхаҳои, ки ба тозагӣ аз диди умум барои ҳамеша пинҳон шударо мебинед. Мунташир кардани ин иттилоот метавонад ба натиҷаи аз даст додани ҳамешагии ихтиёроти шумо оварда расонад.',
	'oversight-oversighter' => 'Нозир:',
	'oversight-offender' => 'Мутахалиф:',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'hiderevision' => 'Pamalagiang itago ang mga pagbabago',
	'hiderevision-desc' => 'Itago ang bawat mga pagbabago mula sa lahat ng mga tagagamit dahil sa mga kadahilanang legal, atbp.',
	'group-oversight' => 'Mga tagapagingat-tago',
	'group-oversight-member' => 'tagapagingat-tago',
	'grouppage-oversight' => '{{ns:project}}:Tagapagingat-tago',
	'right-oversight' => 'Tingnan ang isang dating nakatagong pagbabago',
	'right-hiderevision' => "Suriing muli at ibalik ang mga pagbabagong nakatago mula sa mga ''sysop''",
	'hiderevision-prompt' => 'Ang tatanggaling bilang ng pagbabago:',
	'hiderevision-continue' => 'Magpatuloy',
	'hiderevision-text' => "Dapat na gamitin '''lamang''' ito sa sumusunod na mga pagkakataon:
* Hindi naaangkop na mga kabatirang pansarili
*: ''mga adres ng tirahan at mga bilang na pangtelepono, mga bilang na pangkaseguruhang panlipunan, atbp''

Magdurulot ng pagkawala ng mga karapatan ang pangaabuso sa sistemang ito.'''

Hindi makikita ninuman ang mga tinanggal na mga bagay sa pamamagitan ng websayt, subalit nakatala ang mga pagbura at maibabalik sa kaparaanang kinakamay ng isang tagapangasiwa ng kalipunan ng dato kung sakaling magkamali ka.",
	'hiderevision-reason' => 'Dahilan (itatala bilang pribado):',
	'hiderevision-submit' => 'Pamalagiang itago ang datong ito',
	'hiderevision-tab' => 'Itago ang pagbabago',
	'hiderevision-link' => 'Nakatagong mga ambag ng tagagamit',
	'hiderevision-norevisions' => 'Walang tinukoy na mga pagbabagong buburahin.',
	'hiderevision-noreason' => 'Kailangan mong ilarawan ang dahilan para sa pagtatanggal na ito.',
	'hiderevision-status' => 'Pagbabagong $1: $2',
	'hiderevision-success' => 'Matagumpay na nasinop (naarkibo) at nabura.',
	'hiderevision-error-missing' => 'Hindi natagpuan sa kalipunan ng dato.',
	'hiderevision-error-current' => 'Hindi mabura ang pinakahuling pagbabago sa isang pahina.
Ibalik muna ang pagbabagong ito.',
	'hiderevision-error-delete' => 'Hindi masinop o mailagay sa arkibo: nabura na ba ito dati?',
	'hiderevision-archive-status' => 'Binurang pagbabago mula sa $1: $2',
	'oversight-nodiff' => 'Hindi mabalikan ang bakas ng mga pagbabago dahil sa kasalukuyang walang dating pagbabago para sa pahina. Maaaring:
*Nabura na ang pahina
*Ang nakatagong pagbabagong ito ang unang pagbabago',
	'oversight-log-hiderev' => 'tinanggal ang isang pagbabago mula sa $1',
	'oversight' => 'Tagapagingat-tago',
	'oversight-view' => 'Mga detalye',
	'oversight-difference' => '(Pagkakaiba mula sa dating natitirang pagbabago)',
	'oversight-prev' => 'Huling dati nang pagbabago',
	'oversight-hidden' => 'Nakatagong pagbabago',
	'oversight-header' => 'Nasa ibaba ang isang talaan ng mga pagbabago na kamakailang pampamalagiang nakatago mula sa pagtanaw ng madla/publiko,
Magreresulta/Hahantong ang paglalabas ng kabatirang (impormasyon) ito sa pagkawala ng mga karapatang pangtagapagingat-tago.',
	'oversight-legend' => 'Maghanap sa talaan ng mga pagtatago ng pagbabago',
	'oversight-oversighter' => 'Tagapagingat-tago:',
	'oversight-offender' => 'Ang nagkamali:',
);

/** Turkish (Türkçe)
 * @author Karduelis
 * @author Runningfridgesrule
 */
$messages['tr'] = array(
	'hiderevision-continue' => 'Devam',
	'hiderevision-submit' => 'Bilgiyi süresizce gizle',
	'hiderevision-error-missing' => 'Veritabanında bulunamadı',
	'hiderevision-error-delete' => 'Arşivlenilemedi; daha önce silindi mi?',
	'oversight-view' => 'detaylar',
);

/** Ukrainian (Українська)
 * @author AS
 * @author Ahonc
 * @author Aleksandrit
 */
$messages['uk'] = array(
	'hiderevision' => 'Приховати версії',
	'hiderevision-desc' => 'Приховує окремі версії сторінок від користувачів, використовується із судово-юридичних причин тощо.',
	'group-oversight' => 'Ревізори',
	'group-oversight-member' => 'ревізор',
	'grouppage-oversight' => '{{ns:project}}:Ревізори',
	'right-oversight' => 'Перегляд прихованих версій',
	'right-hiderevision' => 'Перегляд і відновлення версій, прихованих від адміністраторів',
	'hiderevision-prompt' => 'Номер версії, яку потрібно приховати',
	'hiderevision-continue' => 'Продовжити',
	'hiderevision-text' => "Ця сторінка повинна використовуватися '''тільки''' у випадках:
* розголошення особистої інформації
*: розголошення ''домашніх адрес, телефонних номерів номера, паспортних даних'' тощо.

'''Зловживання цією системою призведе до позбавлення прав.'''

Приховані версії сторінок не буде видно через інтерфейс MediaWiki, але вони записуються до журналу і можуть бути відновлені адміністратором бази даних, якщо ви зробите помилку.",
	'hiderevision-reason' => 'Причина (буде записана в закритий журнал):',
	'hiderevision-submit' => 'Приховати ці дані',
	'hiderevision-tab' => 'Приховати версію',
	'hiderevision-link' => 'Прихований внесок користувача',
	'hiderevision-norevisions' => 'Не були зазначені версії для приховування.',
	'hiderevision-noreason' => 'Ви повинні написати причину приховування.',
	'hiderevision-status' => 'Версія №$1: $2',
	'hiderevision-success' => 'Успішно заархівована і прихована.',
	'hiderevision-error-missing' => 'Не знайдена в базі даних.',
	'hiderevision-error-current' => 'Неможливо вилучити поточну версію сторінки.
Спочатку відкотіть зміни.',
	'hiderevision-error-delete' => 'Неможливо заархівувати. Перевірте, чи не була версія вилучена раніше.',
	'hiderevision-archive-status' => 'Вилучена версія зі сторінки $1: $2',
	'oversight-nodiff' => 'Неможливо визначити зміни через недоступність попередньої версії сторінки. Можливо:
* Ця сторінка була вилучена
* Прихована версія була першою',
	'oversight-log-hiderev' => 'приховане редагування зі сторінки $1',
	'oversight' => 'Журнал приховування версій',
	'oversight-view' => 'докладніше',
	'oversight-difference' => '(Різниця з попередньою невилученою версією)',
	'oversight-prev' => 'Попередня версія',
	'oversight-hidden' => 'Прихована версія',
	'oversight-header' => 'Нижче наведені версії, які нещодавно були приховані.
Розповсюдження цієї інформації може спричинити позбавлення прав ревізора.',
	'oversight-legend' => 'Пошук по журналі приховання редагувань',
	'oversight-oversighter' => 'Ревізор:',
	'oversight-offender' => 'Порушник:',
);

/** Vèneto (Vèneto)
 * @author Candalua
 */
$messages['vec'] = array(
	'hiderevision' => 'Oscuramento permanente de na revision',
	'hiderevision-desc' => 'Rende invisibili a tuti i utenti singole revision de le pagine (par motivi legali, ecc.)',
	'group-oversight' => 'Supervisori',
	'group-oversight-member' => 'Supervision',
	'grouppage-oversight' => '{{ns:project}}:Supervision',
	'right-oversight' => 'Varda na revision sconta in precedensa',
	'right-hiderevision' => 'Rivarda e recupera version sconte',
	'hiderevision-prompt' => 'Nùmaro de la revision da oscurar:',
	'hiderevision-continue' => 'Continua',
	'hiderevision-text' => "Sta funzion la gà da èssar doparà '''unicamente''' nei seguenti casi:
* Dati personali mìa apropriati
*: ''indirizi postali, nùmari de telefono, codici fiscali, ecc.''

'''Qualunque abuso del sistema el conportarà la rimozion dei relativi privilegi.'''

I elementi oscurài i xe invisibili par chiunque sul sito, ma
esiste un registro de le revision oscurà e la possibilità de
un ripristino manuale da parte de un aministrador del database
in caso de erori.",
	'hiderevision-reason' => 'Motivo (par el registro riservà):',
	'hiderevision-submit' => 'Oscura i dati in modo permanente',
	'hiderevision-tab' => 'Oscura revision',
	'hiderevision-link' => 'Contributi utente sconti',
	'hiderevision-norevisions' => 'No xe stà indicà nissuna revision da oscurar.',
	'hiderevision-noreason' => "Bisogna indicar el motivo de l'oscuramento.",
	'hiderevision-status' => 'Revision $1: $2',
	'hiderevision-success' => 'Archiviazion e oscuramento conpletài.',
	'hiderevision-error-missing' => 'Mìa catà nel database.',
	'hiderevision-error-current' => "No se pol oscurar l'ultima modifica de na pagina. Te ghè da anular la modifica prima de 'ndar vanti co l'oscuramento.",
	'hiderevision-error-delete' => "No se riesse ad archiviar; gh'èra forsi dele scancelassion precedenti?",
	'hiderevision-archive-status' => 'Revision oscurà de $1: $2',
	'oversight-nodiff' => 'No se pode mostrar le modifiche in quanto no ghe xe revision precedenti de la pagina. Podarìa èssar parché:
*La pagina la xe stà scancelà
*Sta revisione oscurà la xera la prima par la pagina',
	'oversight-log-hiderev' => 'gà oscurà na modifica de $1',
	'oversight' => 'Supervision',
	'oversight-view' => 'detagli',
	'oversight-difference' => '(Difarensa rispeto a la version precedente restà)',
	'oversight-prev' => 'Ultima revision precedente',
	'oversight-hidden' => 'Revisione oscurà',
	'oversight-header' => 'Qua de seguito vien presentà na lista de le revision oscurà in modo permanente ai visitatori del sito.
La divulgazion di ste informassion la pol conportar la rimozion permanente dei diriti de supervisor.',
	'oversight-legend' => 'Serca i registri de le revision sconte',
	'oversight-oversighter' => 'Supervisor:',
	'oversight-offender' => 'Trasgressor:',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'hiderevision' => 'Giấu phiên bản',
	'hiderevision-desc' => 'Giấu những phiên bản để cho tất cả mọi người dùng không xem được, vì lý do luật pháp, v.v.',
	'group-oversight' => 'Giám sát viên',
	'group-oversight-member' => 'Giám sát viên',
	'grouppage-oversight' => '{{ns:project}}:Giám sát viên',
	'right-oversight' => 'Xem phiên bản ẩn',
	'right-hiderevision' => 'Xem lại và phục hồi phiên bản mà Sysop không thấy',
	'hiderevision-prompt' => 'Số phiên bản để giấu:',
	'hiderevision-continue' => 'Tiếp',
	'hiderevision-text' => "'''Chỉ''' được xài chức năng này trong những trường hợp có:

* Thông tin cá nhân không thích hợp
*: ''địa chỉ và số điện thoại nhà, số an sinh xã hội, v.v.''

'''Nếu lạm dụng chức năng này, bạn sẽ bị mất quyền truy cập nó.'''

Không ai có thể dùng website để xem phiên bản sau khi nó được giấu, nhưng phiên bản sẽ được ghi vào nhật ký và người quản lý cơ sỡ dữ liệu có thể khôi phục bằng tay nếu bạn giấu nhầm.",
	'hiderevision-reason' => 'Lý do (cho nhật ký giữ kín):',
	'hiderevision-submit' => 'Giấu dữ liệu để khó khôi phục',
	'hiderevision-tab' => 'Giấu phiên bản',
	'hiderevision-link' => 'Đóng góp ẩn của người dùng',
	'hiderevision-norevisions' => 'Bạn chưa chọn phiên bản để giấu.',
	'hiderevision-noreason' => 'Bạn cần phải đưa vào lý do giấu phiên bản.',
	'hiderevision-status' => 'Phiên bản $1: $2',
	'hiderevision-success' => 'Dữ liệu được lưu trữ và giấu thành công.',
	'hiderevision-error-missing' => 'Không tìm được phiên bản trong cơ sỡ dữ liệu.',
	'hiderevision-error-current' => 'Không có thể giấu phiên bản hiện hành của trang. Hãy lùi lại sửa đổi này trước.',
	'hiderevision-error-delete' => 'Không có thể lưu trữ phiên bản; có phải nó đã được giấu không?',
	'hiderevision-archive-status' => 'Giấu phiên bản khỏi $1: $2',
	'oversight-nodiff' => 'Không có thể so sánh các thay đổi tại vì trang này không có phiên bản về trước. Có thể là:

*Trang bị xóa
*Bản giấu này là phiên bản đầu tiên của trang',
	'oversight-log-hiderev' => 'giấu sửa đổi khỏi $1',
	'oversight' => 'Giám sát viên',
	'oversight-view' => 'chi tiết',
	'oversight-difference' => '(Khác biệt với bản cuối cùng còn lại)',
	'oversight-prev' => 'Phiên bản trước',
	'oversight-hidden' => 'Phiên bản giấu',
	'oversight-header' => 'Đây là các phiên bản bị giấu luôn khỏi các độc giả.
Nếu đưa ra thông tin này, bạn sẽ mất vĩnh viễn quyền giám sát.',
	'oversight-legend' => 'Tìm kiếm trong nhật trình giấu phiên bản',
	'oversight-oversighter' => 'Giám sát viên:',
	'oversight-offender' => 'Người phạm lỗi:',
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'hiderevision' => 'Klänedön krütamis laidüpio',
	'hiderevision-prompt' => 'Dientifakot fomama moükabik:',
	'hiderevision-continue' => 'Fövön',
	'hiderevision-reason' => 'Kod (polisedon kläniko):',
	'hiderevision-submit' => 'Klänedön nünis at laidüpio',
	'hiderevision-tab' => 'Klänedön revidi',
	'hiderevision-norevisions' => 'Fomams nonik pevälons ad pamoükön.',
	'hiderevision-noreason' => 'Mutol bepenön kodi moükama at.',
	'hiderevision-status' => 'Fomam $1: $2',
	'hiderevision-success' => 'Pepladon ini ragiv e pemoükon benosekiko.',
	'hiderevision-archive-status' => 'Pemoükon fomam se $1: $2',
	'oversight-log-hiderev' => 'emoükon redakami se $1',
	'oversight-view' => 'pats',
	'oversight-hidden' => 'Fomam peklänedöl',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'hiderevision-status' => 'רעוויזיע $1: $2',
);

/** Yue (粵語)
 * @author Shinjiman
 */
$messages['yue'] = array(
	'hiderevision' => '永久收埋修訂',
	'hiderevision-desc' => '收埋所有用戶因法律原因等嘅個別修訂',
	'group-oversight' => '監督者',
	'group-oversight-member' => '監督',
	'grouppage-oversight' => '{{ns:project}}:監督',
	'right-oversight' => '睇一個之前隱藏過嘅修訂',
	'right-hiderevision' => '去檢討同恢復由操作員隱藏嘅修訂',
	'hiderevision-prompt' => '要拎走嘅修訂號:',
	'hiderevision-continue' => '繼續',
	'hiderevision-text' => "呢樣嘢'''只係'''應該可幾響下面嘅情況之下去用:
* 唔合適嘅個人資料
*: ''屋企嘅地址同電話號碼、社區保安號等''

'''濫用呢個系統將會無咗呢度嘢嘅權限。'''

任何人都唔會響個網站度見到拎走咗嘅項目，
但係嗰啲刪除都會記錄落來，如果你先前做錯咗嘅話，
係可以由數據庫管理員做手動回復，攞番之前啲資料。",
	'hiderevision-reason' => '原因 (會私人噉記低):',
	'hiderevision-submit' => '永久收埋呢樣資料',
	'hiderevision-tab' => '收埋修訂',
	'hiderevision-norevisions' => '無指定一個修訂去刪除。',
	'hiderevision-noreason' => '你一定要講出一個原因去刪除。',
	'hiderevision-status' => '修訂 $1: $2',
	'hiderevision-success' => '已經成功歸檔同刪除咗。',
	'hiderevision-error-missing' => '響數據庫度搵唔到。',
	'hiderevision-error-current' => '唔可以響嗰版度刪除最新嘅編輯。請先將呢個修改打回頭。',
	'hiderevision-error-delete' => '唔可以歸檔；係咪之前已經刪除咗？',
	'hiderevision-archive-status' => '已經由$1度刪除咗修訂: $2',
	'oversight-nodiff' => '唔能夠追蹤更改，因為響嗰版而家無先前嘅修訂。一係:
*嗰一版已經刪除咗，又或者
*呢個收埋咗嘅版本係第一個修訂',
	'oversight-log-hiderev' => '已經響$1度拎走咗一個編輯',
	'oversight' => '監督',
	'oversight-view' => '細節',
	'oversight-difference' => '(由之前剩底修訂嘅差異)',
	'oversight-prev' => '上一個之前嘅修訂',
	'oversight-hidden' => '收埋修訂',
	'oversight-header' => '下面係一個之前永久收埋，唔畀公眾睇嘅修訂清單。
發放呢啲資料可以導致永久損失監督嘅權限。',
	'oversight-legend' => '搵修訂隱藏日誌',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Alex S.H. Lin
 * @author Gzdavidwong
 */
$messages['zh-hans'] = array(
	'hiderevision' => '永久隐藏修订版本',
	'hiderevision-desc' => '隐藏所有用户因法律原因等之个别修订',
	'group-oversight' => '监督者',
	'group-oversight-member' => '监督',
	'grouppage-oversight' => '{{ns:project}}:监督',
	'right-oversight' => '查看一个之前隐藏过之修订',
	'right-hiderevision' => '去检讨和恢复由操作员隐藏之修订',
	'hiderevision-prompt' => '要隐藏的修订版本号码:',
	'hiderevision-continue' => '继续',
	'hiderevision-text' => "'''注意！'''本工具'''只能'''在以下情况才能使用：
* 这个修订版本含有不适当的个人隐私资讯。
*: ''例如一个人的住处地址、电话号码、身分证号码等等…''

'''滥用此工具，最终将会失去使用此工具的特殊权限！'''

删除这个项目，将会使这个网站上何任人都无法看到此项目,
如果您误删了修订版本，必须请管理员从资料库中手动恢复。",
	'hiderevision-reason' => '理由 (这个记录将不会公开):',
	'hiderevision-submit' => '永久隐藏这项资料',
	'hiderevision-tab' => '隐藏此修订',
	'hiderevision-link' => '隐藏用户贡献',
	'hiderevision-norevisions' => '没有指定的修订版本被删除',
	'hiderevision-noreason' => '您必须说明隐藏这个修订版本的理由。',
	'hiderevision-status' => '修订版本 $1: $2',
	'hiderevision-success' => '已经完成隐藏与记录此操作',
	'hiderevision-error-missing' => '资料库找不到这个修订版本。',
	'hiderevision-error-current' => '本页为该页面的最新版本，无法隐藏。请先恢复这个页面之前的编辑。',
	'hiderevision-error-delete' => '无法记录此操作。可能之前已经被删除。',
	'hiderevision-archive-status' => '已删除的修订版本。从 $1: $2',
	'oversight-nodiff' => '无法与过去之前的版本做差异比较，可能是因为：
*这个页面已经被删除。
*隐藏的页面为最先建立的版本。',
	'oversight-log-hiderev' => '隐藏 $1 中的一个修订版本',
	'oversight-view' => '内容',
	'oversight-difference' => '(与之前存在之修订版本的差异)',
	'oversight-prev' => '最后一个之前的修订版本',
	'oversight-hidden' => '隐藏修订',
	'oversight-header' => '以下列示的是已经永久隐藏的修订版本。请注意！泄漏这些讯息将会永远丧失{{int:Oversight}}权限！',
	'oversight-legend' => '搜寻修订隐藏日志',
);

/** Traditional Chinese (‪中文(繁體)‬)
 * @author Alex S.H. Lin
 * @author Wrightbus
 */
$messages['zh-hant'] = array(
	'hiderevision' => '永久隱藏修訂版本',
	'hiderevision-desc' => '隱藏所有用戶因法律原因等之個別修訂',
	'group-oversight' => '監督者',
	'group-oversight-member' => '監督',
	'grouppage-oversight' => '{{ns:project}}:監督',
	'right-oversight' => '查看一個之前隱藏過之修訂',
	'right-hiderevision' => '去檢討和恢復由操作員隱藏之修訂',
	'hiderevision-prompt' => '要隱藏的修訂版本號碼:',
	'hiderevision-continue' => '繼續',
	'hiderevision-text' => "'''注意！'''本工具'''只能'''在以下情況才能使用：
* 這個修訂版本含有不適當的個人隱私資訊。
*: ''例如一個人的住處地址、電話號碼、身分證號碼等等…''

'''濫用此工具，最終將會失去使用此工具的特殊權限！'''

刪除這個項目，將會使這個網站上何任人都無法看到此項目,
如果您誤刪了修訂版本，必須請管理員從資料庫中手動恢復。",
	'hiderevision-reason' => '理由 (這個記錄將不會公開):',
	'hiderevision-submit' => '永久隱藏這項資料',
	'hiderevision-tab' => '隱藏此修訂',
	'hiderevision-link' => '隱藏用戶貢獻',
	'hiderevision-norevisions' => '沒有指定的修訂版本被刪除',
	'hiderevision-noreason' => '您必須說明隱藏這個修訂版本的理由。',
	'hiderevision-status' => '修訂版本 $1: $2',
	'hiderevision-success' => '已經完成隱藏與記錄此操作',
	'hiderevision-error-missing' => '資料庫找不到這個修訂版本。',
	'hiderevision-error-current' => '本頁為該頁面的最新版本，無法隱藏。請先恢復這個頁面之前的編輯。',
	'hiderevision-error-delete' => '無法記錄此操作。可能之前已經被刪除。',
	'hiderevision-archive-status' => '已刪除的修訂版本。從 $1: $2',
	'oversight-nodiff' => '無法與過去之前的版本做差異比較，可能是因為：
*此頁面已經被刪除。
*隱藏的頁面為最先建立的版本。',
	'oversight-log-hiderev' => '隱藏 $1 中的一個修訂版本',
	'oversight' => '監督',
	'oversight-view' => '內容',
	'oversight-difference' => '(與之前存在之修訂版本的差異)',
	'oversight-prev' => '最後一個之前的修訂版本',
	'oversight-hidden' => '隱藏修訂',
	'oversight-header' => '以下列示的是已經永久隱藏的修訂版本。請注意！洩漏這些訊息將會永遠喪失{{int:Oversight}}權限！',
	'oversight-legend' => '搜尋修訂隱藏日誌',
	'oversight-oversighter' => '監督者:',
);

