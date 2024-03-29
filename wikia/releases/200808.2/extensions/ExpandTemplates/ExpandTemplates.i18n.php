<?php
/**
 * Internationalisation file for ExpandTemplates extension.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	'expandtemplates'                  => 'Expand templates',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|Expands templates, parser functions and variables]] to show expanded wikitext and preview rendered page',
	'expand_templates_intro'           => 'This special page takes some text and expands
all templates in it recursively. It also expands parser functions like
<nowiki>{{</nowiki>#if:...}}, and variables like
<nowiki>{{</nowiki>CURRENTDAY}}&mdash;in fact pretty much everything in double-braces.
It does this by calling the relevant parser stage from MediaWiki itself.',
	'expand_templates_title'           => 'Context title, for {{PAGENAME}} etc.:',
	'expand_templates_input'           => 'Input text:',
	'expand_templates_output'          => 'Result',
	'expand_templates_xml_output'      => 'XML output',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Remove comments',
	'expand_templates_generate_xml'    => 'Show XML parse tree',
	'expand_templates_preview'         => 'Preview',
);

$messages['af'] = array(
	'expandtemplates'                  => 'Brei sjablone uit',
);

/** Aragonese (Aragonés)
 * @author Juanpabl
 */
$messages['an'] = array(
	'expandtemplates'                  => 'Espandir plantillas',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|Estendilla as plantillas, funzions de parseyo y bariables]] ta amostrar o wikitesto estendillato y prebeyer a pachina',
	'expand_templates_intro'           => 'Ista pachina espezial prene bel testo y espande recursibament todas as plantillas que bi ha en el. Tamién espande as funzions parser como <nowiki>{{</nowiki>#if:...}}, y as bariables como <nowiki>{{</nowiki>CURRENTDAY}}&mdash; en cheneral tot o que sía entre dobles claus.
Isto lo fa clamando ta o parser correspondient dende o propio MediaWiki.',
	'expand_templates_title'           => 'Títol ta contestualizar ({{PAGENAME}} etz.):',
	'expand_templates_input'           => 'Testo ta espandir:',
	'expand_templates_output'          => 'Resultau',
	'expand_templates_xml_output'      => 'salida XML',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Borrar comentarios',
	'expand_templates_generate_xml'    => "Amostrar l'árbol de parseyo XML",
	'expand_templates_preview'         => 'Prebeyer',
);

/** Arabic (العربية)
 * @author Meno25
 * @author Mido
 */
$messages['ar'] = array(
	'expandtemplates'                  => 'فرد القوالب',
	'expandtemplates-desc'             => 'يفرد القوالب، دوال البارسر والمتغيرات لعرض نص الويكي الممدد ورؤية الصفحة الناتجة',
	'expand_templates_intro'           => 'تتعامل هذه الصفحة الخاصة مع نصوص الويكي وتقوم بفرد كل القوالب الموجودة به. وتقوم أيضا بفرد دوال القوالب مثل <nowiki>{{</nowiki>#if:...}}, و المتغيرات مثل <nowiki>{{</nowiki>يوم}}-- و تقوم التعامل مع كل ما بين الأقواس المزدوجة. و تقوم بفعل هذا عن طريق استدعاء المعالج المناسب من الميدياويكي.',
	'expand_templates_title'           => 'عنوان صفحة هذا النص، لأجل معالجة {{PAGENAME}} إلخ.:',
	'expand_templates_input'           => 'النص المدخل (الأصلي)',
	'expand_templates_output'          => 'النتيجة',
	'expand_templates_xml_output'      => 'خرج XML',
	'expand_templates_ok'              => 'موافق',
	'expand_templates_remove_comments' => 'إزالة التعليقات',
	'expand_templates_generate_xml'    => 'اعرض شجرة XML parse',
	'expand_templates_preview'         => 'عرض',
);

/** Asturian (Asturianu)
 * @author Esbardu
 */
$messages['ast'] = array(
	'expandtemplates'                  => 'Esparder plantíes',
	'expand_templates_intro'           => "Esta páxina especial ellabora un testu espardiendo toles
plantíes de forma recursiva. Tamién esparde les funciones d'análisis sintáuticu
como <nowiki>{{</nowiki>#if:...}}, y variables como
<nowiki>{{</nowiki>CURRENTDAY}}, en realidá cuasi tolo qu'heba ente llaves dobles. Funciona
llamando a les funciones afechisques d'análisis sintáuticu de MediaWiki.",
	'expand_templates_title'           => 'Títulu del contestu, pa {{PAGENAME}}, etc.:',
	'expand_templates_input'           => "Testu d'entrada:",
	'expand_templates_output'          => 'Resultáu',
	'expand_templates_xml_output'      => 'Salida XML',
	'expand_templates_ok'              => 'Dir',
	'expand_templates_remove_comments' => 'Eliminar comentarios',
	'expand_templates_generate_xml'    => "Amosar l'árbole d'análisis sintáuticu XML",
	'expand_templates_preview'         => 'Previsualizar',
);

$messages['bcl'] = array(
	'expand_templates_output'          => 'Resulta',
	'expand_templates_remove_comments' => 'Tanggalon an mga komento',
	'expand_templates_preview'         => 'Patânaw',
);

/** Bulgarian (Български)
 * @author Spiritia
 * @author Borislav
 */
$messages['bg'] = array(
	'expandtemplates'                  => 'Разгръщане на шаблони',
	'expand_templates_input'           => 'Входящ текст:',
	'expand_templates_output'          => 'Резултат',
	'expand_templates_ok'              => 'ОК',
	'expand_templates_remove_comments' => 'Премахване на коментари',
	'expand_templates_preview'         => 'Преглед',
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Zaheen
 */
$messages['bn'] = array(
	'expandtemplates'                  => 'টেম্পলেট সম্প্রসারণ',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|টেম্পলেট, পার্সার ফাংশন এবং ভ্যারিয়েবল সপ্রসারণ করে]] সম্প্রসারিত উইকিটেক্সট দেখুন এবং উপস্থাপিত পাতাটি প্রাকদর্শন করুন',
	'expand_templates_intro'           => 'এই বিশেষ পাতাটি কিছু টেক্সট গ্রহণ করে এবং এর ভেতরের সব টেম্পলেট পুনরাবৃত্ত উপায়ে সপ্রসারিত করে। এছাড়াও এটি It also expands parser functions like
<nowiki>{{</nowiki>#if:...}}-এর মত পার্সার ফাংশন, <nowiki>{{</nowiki>CURRENTDAY}-এর মত ভ্যারিয়েবল &mdash;মোটকথা দ্বিতীয় বন্ধনীর মধ্যে অবস্থিত সবকিছুকেই সম্প্রসারিত করতে পারে।
এটি সংশ্লিষ্ট পার্সার পর্যায় থেকে স্বয়ং মিডিয়াউইকিকে কল করে এই কাজটি করে থাকে।',
	'expand_templates_title'           => 'প্রাতিবেশিক শিরোনাম, {{PAGENAME}}, ইত্যাদির জন্য:',
	'expand_templates_input'           => 'ইনপুটকৃত লেখা:',
	'expand_templates_output'          => 'ফলাফল',
	'expand_templates_xml_output'      => 'XML আউটপুট',
	'expand_templates_ok'              => 'ঠিক আছে',
	'expand_templates_remove_comments' => 'মন্তব্য মুছে ফেলো',
	'expand_templates_generate_xml'    => 'XML পার্স বৃক্ষ দেখাও',
	'expand_templates_preview'         => 'প্রাকদর্শন',
);

/** Breton (Brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'expand_templates_output'          => "Disoc'h :",
	'expand_templates_ok'              => 'Mat eo',
	'expand_templates_remove_comments' => 'Lemel an notennoù kuit',
	'expand_templates_preview'         => 'Rakwelet',
);

/** Catalan (Català)
 * @author SMP
 */
$messages['ca'] = array(
	'expandtemplates'                  => 'Expansió de plantilles',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|Expandeix plantilles, funcions i variables]] per a mostrar-vos la sintaxi expandida i previsualitzar el resultat que es mostrarà a les pàgines',
	'expand_templates_intro'           => 'Aquesta pàgina especial permet provar plantilles, amb expansions recursives. Les funcions i les variables predefinides, com ara <nowiki>{{</nowiki>#if:...}} o <nowiki>{{</nowiki>CURRENTDAY}}, també són substituïdes.',
	'expand_templates_title'           => 'Títol per contextualitzar ({{PAGENAME}}, etc):',
	'expand_templates_input'           => 'El vostre text:',
	'expand_templates_output'          => 'Resultat:',
	'expand_templates_remove_comments' => 'Elimina els comentaris',
	'expand_templates_preview'         => 'Previsualitza',
);

/** Chechen (Нохчийн)
 * @author SPQRobin
 */
$messages['ce'] = array(
	'expand_templates_remove_comments' => 'Комментариш дIаяккха',
);

$messages['co'] = array(
	'expand_templates_output'          => 'Risultatu',
);

/** Czech (Česky)
 * @author Li-sung
 * @author Matěj Grabovský
 * @author Danny B.
 */
$messages['cs'] = array(
	'expandtemplates'                  => 'Substituce šablon',
	'expandtemplates-desc'             => 'Rozbaluje šablony, funkce syntaktického analyzátoru a proměnné; zobrazuje rozbalený wikitext a náhled stránky, jak se zobrazí',
	'expand_templates_intro'           => 'Pomocí této speciální stránky můžete nechat v textu substituovat všechny šablony a funkce parseru jako <code><nowiki>{{</nowiki>#if:…...}}</code> či proměnné jako <code><nowiki>{{</nowiki>CURRENTDAY}} – tzn. prakticky všechno v dvojitých složených závorkách. K tomu se používají přímo odpovídající funkce parseru MediaWiki.',
	'expand_templates_title'           => 'Název stránky kvůli kontextu pro <code>{{PAGENAME}}</code> apod.:',
	'expand_templates_input'           => 'Vstupní text:',
	'expand_templates_output'          => 'Výstup',
	'expand_templates_xml_output'      => 'Výstup XML',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Odstranit komentáře',
	'expand_templates_generate_xml'    => 'Zobrazit syntaktický strom v XML',
	'expand_templates_preview'         => 'Náhled',
);

/** German (Deutsch)
 * @author Raimond Spekking
 */
$messages['de'] = array(
	'expandtemplates'                  => 'Vorlagen expandieren',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|Expandiert Vorlagen, Parser-Funktionen und Variablen]] zu vollständigem Wikitext und zeigt die gerenderte Vorschau',
	'expand_templates_intro'           => 'In diese Spezialseite kann Text eingegeben werden und alle Vorlagen in ihr werden rekursiv expandiert. Auch Parserfunkionen wie <nowiki>{{</nowiki>#if:...}} und Variablen wie <nowiki>{{</nowiki>CURRENTDAY}} werden ausgewertet - faktisch alles was in doppelten geschweiften Klammern enthalten ist. Dies geschieht durch den Aufruf der jeweiligen Parser-Phasen in MediaWiki.',
	'expand_templates_title'           => 'Kontexttitel, für {{PAGENAME}} etc.:',
	'expand_templates_input'           => 'Eingabefeld:',
	'expand_templates_output'          => 'Ergebnis',
	'expand_templates_xml_output'      => 'XML-Ausgabe',
	'expand_templates_ok'              => 'Ausführen',
	'expand_templates_remove_comments' => 'Kommentare entfernen',
	'expand_templates_generate_xml'    => 'Zeige XML Parser-Baum',
	'expand_templates_preview'         => 'Vorschau',
);

/** Greek (Ελληνικά)
 * @author ZaDiak
 * @author Consta
 */
$messages['el'] = array(
	'expandtemplates'         => 'Επέκτεινε τα πρότυπα',
	'expand_templates_output' => 'Αποτέλεσμα',
	'expand_templates_ok'     => 'ΟΚ',
);

$messages['eo'] = array(
	'expand_templates_remove_comments' => 'Forigu komentojn',
	'expand_templates_preview'         => 'Antaŭrigardo',
);

$messages['es'] = array(
	'expandtemplates'                  => 'Sustituidor de plantillas',
	'expand_templates_input'           => 'Texto a expandir:',
	'expand_templates_output'          => 'Resultado:',
	'expand_templates_remove_comments' => 'Eliminar comentarios',
	'expand_templates_preview'         => 'Previsualización',
);

$messages['ext'] = array(
	'expand_templates_preview'         => 'Previsoreal',
);

/** فارسی (فارسی)
 * @author Huji
 */
$messages['fa'] = array(
	'expandtemplates'                  => 'بسط‌دادن الگوها',
	'expandtemplates-desc'             => 'الگوها، دستورهای تجزیه‌کننده و متغیرها را گسترش می‌دهد تا متن نهایی را نمایش دهد و صفحه را به پیش‌نمایش در آورد',
	'expand_templates_intro'           => 'این صفحهٔ ویژه متنی را دریافت کرده و تمام الگوهای به‌کاررفته در آن را به طور بازگشتی بسط می‌دهد. همچنین تابع‌های تجزیه چون <nowiki>{{</nowiki>#if:...}} و متغیرهایی چون  <nowiki>{{</nowiki>CURRENTDAY}} را هم بسط می‌دهد — در واقع تقریباً هرچه را که داخل دوآکولاد باشد. این کار با صدازدن مرحلهٔ تجزیهٔ مربوط در خود مدیاویکی صورت می‌گیرد.',
	'expand_templates_title'           => 'عنوان موضوع، برای {{PAGENAME}} و غیره:',
	'expand_templates_input'           => 'متن ورودی:',
	'expand_templates_output'          => 'نتیجه',
	'expand_templates_xml_output'      => 'خروجی XML',
	'expand_templates_ok'              => 'تایید',
	'expand_templates_remove_comments' => 'حذف توضیحات',
	'expand_templates_generate_xml'    => 'نمایش درخت تجزیهٔ XML',
	'expand_templates_preview'         => 'پیش‌نمایش',

);

/** Finnish (Suomi)
 * @author Nike
 * @author Crt
 */
$messages['fi'] = array(
	'expandtemplates'                  => 'Mallineiden laajennus',
	'expand_templates_intro'           => 'Tämä toimintosivu ottaa syötteekseen tekstiä ja laajentaa kaikki mallineet rekursiivisesti sekä jäsenninfunktiot, kuten <nowiki>{{</nowiki>#if:...}}, ja -muuttujat, kuten <nowiki>{{</nowiki>CURRENTDAY}} &mdash; toisin sanoen melkein kaiken, joka on kaksoisaaltosulkeiden sisällä.',
	'expand_templates_title'           => 'Otsikko (esimerkiksi muuttujaa {{PAGENAME}} varten)',
	'expand_templates_input'           => 'Teksti',
	'expand_templates_output'          => 'Tulos',
	'expand_templates_xml_output'      => 'XML-tuloste',
	'expand_templates_ok'              => 'Laajenna',
	'expand_templates_remove_comments' => 'Poista kommentit',
	'expand_templates_generate_xml'    => 'Näytä XML-jäsennyspuu',
	'expand_templates_preview'         => 'Esikatselu',
);

$messages['fo'] = array(
	'expand_templates_output'          => 'Úrslit',
	'expand_templates_ok'              => 'Í lagi',
	'expand_templates_preview'         => 'Forskoðan',
);

/** French (Français)
 * @author Grondin
 * @author Sherbrooke
 */
$messages['fr'] = array(
	'expandtemplates'                  => 'Expansion des modèles',
	'expandtemplates-desc'             => 'Augmente les modèles, les fonctions parseurs et les variables pour visionner les textes wikis étendus et prévisualise les pages ainsi rendues.',
	'expand_templates_intro'           => 'Cette page permet de tester l’expansion de modèles,
qui sont développés recursivement. Les fonctions et les variables prédéfinies,
telles que <nowiki>{{</nowiki>#if:...}} et <nowiki>{{</nowiki>CURRENTDAY}} sont aussi développées.',
	'expand_templates_title'           => 'Titre de l’article, utile par exemple si le modèle utilise {{PAGENAME}} :',
	'expand_templates_input'           => 'Entrez votre texte ici :',
	'expand_templates_output'          => 'Résultat',
	'expand_templates_xml_output'      => 'Sortie XML',
	'expand_templates_ok'              => 'Accepter',
	'expand_templates_remove_comments' => 'Supprimer les commentaires.',
	'expand_templates_generate_xml'    => "Voir l'arborescence XML",
	'expand_templates_preview'         => 'Prévisualisation',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'expandtemplates'                  => 'Èxpension des modèlos',
	'expandtemplates-desc'             => 'Ôgmente los modèlos, les fonccions d’analisa et les variâbles por visionar los tèxtes vouiquis ètendus et prèvisualise les pâges rendues d’ense.',
	'expand_templates_intro'           => 'Ceta pâge pèrmèt d’èprovar l’èxpension de modèlos,
que sont dèvelopâs rècursivament. Les fonccions et les variâbles prèdèfenies,
tâles que <nowiki>{{</nowiki>#if:...}} et <nowiki>{{</nowiki>CURRENTDAY}}, sont asse-ben dèvelopâs.',
	'expand_templates_title'           => 'Titro de l’articllo, utilo per ègzemplo se lo modèlo utilise {{PAGENAME}} :',
	'expand_templates_input'           => 'Entrâd voutron tèxte ique :',
	'expand_templates_output'          => 'Rèsultat',
	'expand_templates_xml_output'      => 'Sortia XML',
	'expand_templates_ok'              => 'D’acôrd',
	'expand_templates_remove_comments' => 'Suprimar los comentèros.',
	'expand_templates_generate_xml'    => 'Afichiér l’arborèscence XML.',
	'expand_templates_preview'         => 'Prèvisualisacion',
);

/** Galician (Galego)
 * @author Xosé
 * @author Alma
 */
$messages['gl'] = array(
	'expandtemplates'                  => 'Ampliar modelos',
	'expand_templates_title'           => 'Título do contexto, para {{PAGENAME}} etc.:',
	'expand_templates_input'           => 'Texto de entrada:',
	'expand_templates_output'          => 'Resultado',
	'expand_templates_xml_output'      => 'saída XML',
	'expand_templates_ok'              => 'De acordo',
	'expand_templates_remove_comments' => 'Eliminar os comentarios',
	'expand_templates_preview'         => 'Vista previa',
);

/** Gujarati (ગુજરાતી) */
$messages['gu'] = array(
	'expand_templates_output' => 'પરિણામ:',
	'expand_templates_ok'     => 'મંજૂર',
);

$messages['he'] = array(
	'expandtemplates'                  => 'פריסת תבניות',
	'expand_templates_intro'           => 'דף זה מקבל כמות מסוימת של טקסט ופורס ומפרש את כל התבניות שבתוכו באופן רקורסיבי. בנוסף, הוא פורס הוראות פירוש כגון <nowiki>{{</nowiki>#תנאי:...}}, ומשתנים כגון <nowiki>{{</nowiki>יום נוכחי}}, ולמעשה פחות או יותר כל דבר בסוגריים מסולסלות כפולות. הוא עושה זאת באמצעות קריאה לפונקציות הפענוח המתאימות מתוך תוכנת מדיה־ויקי עצמה.',
	'expand_templates_title'           => 'כותרת ההקשר לפענוח, בשביל משתנים כגון {{שם הדף}} וכדומה:',
	'expand_templates_input'           => 'טקסט:',
	'expand_templates_output'          => 'תוצאה',
	'expand_templates_xml_output'      => 'פלט XML',
	'expand_templates_ok'              => 'פריסת תבניות',
	'expand_templates_remove_comments' => 'הסרת הערות',
	'expand_templates_generate_xml'    => 'הצגת עץ הפענוח של XML',
	'expand_templates_preview'         => 'תצוגה מקדימה',
);

/** Croatian (Hrvatski)
 * @author SpeedyGonsales
 * @author Dnik
 */
$messages['hr'] = array(
	'expandtemplates'                  => 'Prikaz sadržaja predložaka',
	'expand_templates_intro'           => 'Ova posebna stranica omogućuje unos wikiteksta i prikazuje njegov rezultat,
uključujući i (rekurzivno, tj. potpuno) sve uključene predloške u wikitekstu.
Prikazuje i rezultate funkcija kao <nowiki>{{</nowiki>#if:...}} i varijabli
kao <nowiki>{{</nowiki>CURRENTDAY}}. Funkcionira pozivanjem parsera same MedijeWiki.',
	'expand_templates_title'           => 'Kontekstni naslov stranice, za {{PAGENAME}} i sl.:',
	'expand_templates_input'           => 'Ulazni tekst:',
	'expand_templates_output'          => 'Rezultat',
	'expand_templates_xml_output'      => 'XML kod',
	'expand_templates_ok'              => 'Prikaži',
	'expand_templates_remove_comments' => 'Ukloni komentare',
	'expand_templates_generate_xml'    => 'Prikaži XML stablo',
	'expand_templates_preview'         => 'Vidi kako će izgledati',
);

/** Upper Sorbian (Hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'expandtemplates'                  => 'Předłohi ekspandować',
	'expandtemplates-desc'             => 'Rozšěrja předłohi, parserowe funkcije a wariable, zo by so rozšěrjeny wikitekst pokazał a wobličena strona zwobrazniła',
	'expand_templates_intro'           => 'Na tutej specialnej stronje móžeš tekst zapodać a wšitke do njeje zapřijate předłohi so rekursiwnje ekspanduja. Tež funkcije parsera kaž <nowiki>{{</nowiki>#if:...}} a wariable kaž <nowiki>{{</nowiki>CURRENTDAY}} so wuhódnočeja – faktisce wšo, štož steji mjezy dwójnymaj wopušatymaj spinkomaj. To so přez zawołanje jednotliwych fazow parsera software MediaWiki stawa.',
	'expand_templates_title'           => 'Kontekstowy titul, za {{PAGENAME}} atd.:',
	'expand_templates_input'           => 'Tekst zapodać:',
	'expand_templates_output'          => 'Wuslědk',
	'expand_templates_xml_output'      => 'Wudaće XML',
	'expand_templates_ok'              => 'Wuwjesć',
	'expand_templates_remove_comments' => 'Komentary wotstronić',
	'expand_templates_generate_xml'    => 'Analyzowy štom XML pokazać',
	'expand_templates_preview'         => 'Přehlad',
);

/** Hungarian (Magyar)
 * @author KossuthRad
 * @author Bdanee
 */
$messages['hu'] = array(
	'expandtemplates'                  => 'Sablonok kibontása',
	'expand_templates_intro'           => 'Ez a speciális lap a bevitt szövegekben megkeresi a sablonokat és rekurzívan kibontja őket.
Kibontja az elemző függvényeket (pl. <nowiki>{{</nowiki>#if:...}}), és a változókat (pl. <nowiki>{{</nowiki>CURRENTDAY}}) is – mindent, ami a kettős kapcsos zárójelek között van.',
	'expand_templates_title'           => 'Szöveg címe, például &#123;&#123;PAGENAME}} sablonhoz:',
	'expand_templates_input'           => 'Vizsgálandó szöveg',
	'expand_templates_output'          => 'Eredmény',
	'expand_templates_xml_output'      => 'XML kimenet',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Megjegyzések eltávolítása',
	'expand_templates_generate_xml'    => 'XML elemzési fa mutatása',
	'expand_templates_preview'         => 'Előnézet',
);

$messages['hy'] = array(
	'expandtemplates'                  => 'Կաղապարների ընդարձակում',
);

$messages['id'] = array(
	'expandtemplates'                  => 'Pengembangan templat',
	'expand_templates_intro'           => 'Halaman istimewa ini menerima teks dan mengembangkan semua templat di dalamnya secara rekursif. Halaman ini juga menerjemahkan semua fungsi parser seperti <nowiki>{{</nowiki>#if:...}}, dan variabel seperti <nowiki>{{</nowiki>CURRENTDAY}}&mdash;bahkan bisa dibilang segala sesuatu yang berada di antara dua tanda kurung. Ini dilakukan dengan memanggil tahapan parser yang sesuai dari MediaWiki.',
	'expand_templates_title'           => 'Judul konteks, untuk {{PAGENAME}} dll.:',
	'expand_templates_input'           => 'Teks sumber:',
	'expand_templates_output'          => 'Hasil',
	'expand_templates_ok'              => 'Jalankan',
	'expand_templates_remove_comments' => 'Buang komentar',
);

/** Icelandic (Íslenska)
 * @author S.Örvarr.S
 */
$messages['is'] = array(
	'expand_templates_input'           => 'Inntakstexti:',
	'expand_templates_output'          => 'Útkoma',
	'expand_templates_xml_output'      => 'XML-úttak',
	'expand_templates_ok'              => 'Í lagi',
	'expand_templates_remove_comments' => 'Fjarlægja athugasemdir',
	'expand_templates_preview'         => 'Forskoða',
);

/** Italian (Italiano)
 * @author BrokenArrow
 * @author .anaconda
 */
$messages['it'] = array(
	'expandtemplates'                  => 'Espansione dei template',
	'expandtemplates-desc'             => "[[Special:ExpandTemplates|Espande i template, le funzioni del parser e le variabili]] per mostrare il wikitesto espanso e visualizzare un'anteprima della pagina nella sua forma finale",
	'expand_templates_intro'           => 'Questa pagina speciale elabora un testo espandendo tutti i template presenti. Calcola inoltre il risultato delle funzioni supportate dal parser come <nowiki>{{</nowiki>#if:...}} e delle variabili di sistema quali <nowiki>{{</nowiki>CURRENTDAY}}, ovvero praticamente tutto ciò che si trova tra doppie parentesi graffe. Funziona richiamando le opportune funzioni del parser di MediaWiki.',
	'expand_templates_title'           => 'Contesto (per {{PAGENAME}} ecc.):',
	'expand_templates_input'           => 'Testo da espandere:',
	'expand_templates_output'          => 'Risultato',
	'expand_templates_xml_output'      => 'Output in formato XML',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Ignora i commenti',
	'expand_templates_generate_xml'    => 'Mostra albero sintattico XML',
	'expand_templates_preview'         => 'Anteprima',
);

/** Japanese (日本語)
 * @author JtFuruhata
 */
$messages['ja'] = array(
	'expandtemplates'                  => 'テンプレートを展開',
	'expandtemplates-desc'             => 'ウィキ構文を展開し、ページプレビューを行う{{ns:special}}ページ [[{{ns:special}}:ExpandTemplates|テンプレート、パーサー関数、変数の展開]]',
	'expand_templates_intro'           => '指定したウィキ構文に含まれている全てのテンプレートを再帰的に展開します。
<nowiki>{{</nowiki>#if:...}} のようなパーサー関数や、<nowiki>{{</nowiki>CURRENTDAY}} のような変数など、<nowiki>{{</nowiki> ～ }} で囲まれているものも展開されます。
これは、MediaWiki 自身の適切な構文解釈段階で呼び出されます。',
	'expand_templates_title'           => '{{PAGENAME}} 等に使用するページ名: ',
	'expand_templates_input'           => '展開するテキスト',
	'expand_templates_output'          => '展開結果',
	'expand_templates_xml_output'      => 'XML出力',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'コメントを除去',
	'expand_templates_generate_xml'    => 'XML構文解釈ツリーを表示',
	'expand_templates_preview'         => 'プレビュー',
);

/** Jutish (Jysk)
 * @author Huslåke
 */
$messages['jut'] = array(
	'expand_templates_title'           => 'Context titel, før {{SITENAME}}:',
	'expand_templates_input'           => 'Input skrevselenger:',
	'expand_templates_output'          => 'Resultåt',
	'expand_templates_xml_output'      => 'XML output',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Slet kommentår',
	'expand_templates_generate_xml'    => 'Se XML parse træ',
	'expand_templates_preview'         => 'Førhåndsvesnenge',
);

$messages['kk-arab'] = array(
	'expandtemplates'                  => 'ۇلگىلەردى ۇلعايتۋ',
	'expand_templates_intro'           => 'وسى قۇرال ارنايى بەتى الدەبىر ٴماتىندى الادى دا,
بۇنىڭ ىشىندەگى بارلىق كىرىكتەلگەن ۇلگىلەردى مەيلىنشە ۇلعايتادى.
مىنا <nowiki>{{#if:...}} سىيياقتى جوڭدەتۋ فۋنكتسىييالارىن دا, جانە {{CURRENTDAY}}
سىيياقتى اينامالىلارىن دا ۇلعايتادى (ناقتى ايتقاندا, قوس قابات ساداق جاقشالار اراسىنداعى بارلىعىن).
بۇنى ٴوز MediaWiki باعدارلاماسىنان قاتىستى جوڭدەتۋ ساتىن شاقىرىپ ىستەلىنەدى.',
	'expand_templates_title'           => 'ٴماتىن ارالىق اتاۋى ({{PAGENAME}} ت.ب. بەتتەر ٴۇشىن):',
	'expand_templates_input'           => 'كىرىس ٴماتىنى:',
	'expand_templates_output'          => 'ناتىيجەسى',
	'expand_templates_xml_output'      => 'XML شىعارۋى',
	'expand_templates_ok'              => 'جارايدى',
	'expand_templates_remove_comments' => 'ماندەمەلەرىن الاستاتىپ?',
	'expand_templates_generate_xml'    => 'XML وڭدەتۋ بۇتاقتارىن كورسەت',
	'expand_templates_preview'         => 'قاراپ شىعۋ',
);

$messages['kk-cyrl'] = array(
	'expandtemplates'                  => 'Үлгілерді ұлғайту',
	'expand_templates_intro'           => 'Осы құрал арнайы беті әлдебір мәтінді алады да,
бұның ішіндегі барлық кіріктелген үлгілерді мейлінше ұлғайтады.
Мына <nowiki>{{</nowiki>#if:...}} сияқты жөңдету функцияларын да, және <nowiki>{{</nowiki>CURRENTDAY}}
сияқты айнамалыларын да ұлғайтады (нақты айтқанда, қос қабат садақ жақшалар арасындағы барлығын).
Бұны өз MediaWiki бағдарламасынан қатысты жөңдету сатын шақырып істелінеді.',
	'expand_templates_title'           => 'Мәтін аралық атауы ({{PAGENAME}} т.б. беттер үшін):',
	'expand_templates_input'           => 'Кіріс мәтіні:',
	'expand_templates_output'          => 'Нәтижесі',
	'expand_templates_xml_output'      => 'XML шығаруы',
	'expand_templates_ok'              => 'Жарайды',
	'expand_templates_remove_comments' => 'Мәндемелерін аластатып?',
	'expand_templates_generate_xml'    => 'XML өңдету бұтақтарын көрсет',
	'expand_templates_preview'         => 'Қарап шығу',
);

$messages['kk-latn'] = array(
	'expandtemplates'                  => 'Ülgilerdi ulğaýtw',
	'expand_templates_intro'           => 'Osı qural arnaýı beti äldebir mätindi aladı da,
bunıñ işindegi barlıq kiriktelgen ülgilerdi meýlinşe ulğaýtadı.
Mına <nowiki>{{</nowiki>#if:...}} sïyaqtı jöñdetw fwnkcïyaların da, jäne <nowiki>{{</nowiki>CURRENTDAY}}
sïyaqtı aýnamalıların da ulğaýtadı (naqtı aýtqanda, qos qabat sadaq jaqşalar arasındağı barlığın).
Bunı öz MediaWiki bağdarlamasınan qatıstı jöñdetw satın şaqırıp istelinedi.',
	'expand_templates_title'           => 'Mätin aralıq atawı ({{PAGENAME}} t.b. better üşin):',
	'expand_templates_input'           => 'Kiris mätini:',
	'expand_templates_output'          => 'Nätïjesi',
	'expand_templates_xml_output'      => 'XML şığarwı',
	'expand_templates_ok'              => 'Jaraýdı',
	'expand_templates_remove_comments' => 'Mändemelerin alastatıp?',
	'expand_templates_generate_xml'    => 'XML öñdetw butaqtarın körset',
	'expand_templates_preview'         => 'Qarap şığw',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Chhorran
 */
$messages['km'] = array(
	'expandtemplates'                  => 'ពង្រីក គំរូខ្នាត នានា',
	'expand_templates_output'          => 'លទ្ធផល',
	'expand_templates_ok'              => 'យល់ព្រម',
	'expand_templates_remove_comments' => 'ដកចេញ វិចារនានា',
	'expand_templates_preview'         => 'មើលមុន',
);

$messages['ko'] = array(
	'expandtemplates'                  => '틀 확장',
);

$messages['ksh'] = array(
	'expandtemplates'                  => 'Schablone üvverpröfe',
	'expand_templates_intro'           => 'Hee kanns de en Schablon usprobeere. Do jiss ene Oprof en, un dann kriss De dä
komplett opjelös, och all die ennedren widder opjerofe Schablone, Parameter, Funktione, speziell Name,
un esu, bes nix mieh üvverich es, wat mer noch oplöse künnt. Wann jet en <nowiki>{{ â€¦ }} Klammere
üvverbliet, dann wor et unbekannt. Do passeet jenau et selve wie söns em Wiki och, nor dat De hee tirek ze
sinn kriss wat erus kütt.',
	'expand_templates_title'           => 'Dä Siggetitel, also wat för {{PAGENAME}} uew. enjeföllt weed:',
	'expand_templates_input'           => 'Wat De üvverpröfe wells:',
	'expand_templates_output'          => 'Wat erus kütt es',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'De ennere Kommentare fottlooße',
);

$messages['la'] = array(
	'expandtemplates'                  => 'Formulas resolvere',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'expandtemplates'                  => 'Schablounen expandéieren',
	'expand_templates_title'           => 'Titel vun der Säit, dëst kann nëtzlech si wa(nn) {{PAGENAME}} benotzt gëtt:',
	'expand_templates_input'           => 'Gitt ären Text hei an:',
	'expand_templates_output'          => 'Resultat',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Bemierkunge läschen',
	'expand_templates_preview'         => 'Kucken ouni ofzespäicheren',
);

/** Limburgish (Limburgs)
 * @author Ooswesthoesbes
 * @author Matthias
 */
$messages['li'] = array(
	'expandtemplates'                  => 'Sjablone plekke',
	'expandtemplates-desc'             => "Substitueert sjablone, parserfunctions, variabele en toent wikiteksti en 'n controleversioe van 'n pagina",
	'expand_templates_intro'           => "Dees speciaal pazjena laes de ingegaeve teks in en plektj (mitte functie subst) recursief alle sjablone in de teks. 't Plek ouch alle parserfuncties wie <nowiki>{{</nowiki>#if:...}} en variabele wie <nowiki>{{</nowiki>CURRENTDAY}} - vriejwaal al tösse dóbbel accolades.
Hiej veur waere de relevante functies van de MediaWiki-parser gebroek.",
	'expand_templates_title'           => 'Contekstitel, veur {{PAGENAME}}, etc:',
	'expand_templates_input'           => 'Inlaajteks:',
	'expand_templates_output'          => 'Rezultaot',
	'expand_templates_xml_output'      => 'XML-oetveur',
	'expand_templates_ok'              => 'ok',
	'expand_templates_remove_comments' => 'Wis opmerkinge',
	'expand_templates_generate_xml'    => 'XML-parserboum bekieke',
	'expand_templates_preview'         => 'Veurvertoeaning',
);

$messages['lo'] = array(
	'expandtemplates'                  => 'ຂະຫຍາຍແມ່ແບບ',
);

/** Lithuanian (Lietuvių)
 * @author Matasg
 */
$messages['lt'] = array(
	'expand_templates_output'          => 'Rezultatas',
	'expand_templates_ok'              => 'Gerai',
	'expand_templates_remove_comments' => 'Pašalinti komentarus',
	'expand_templates_preview'         => 'Peržiūra',
);

$messages['nan'] = array(
	'expandtemplates'                  => 'Khok-chhiong pang-bô͘',
	'expand_templates_input'           => 'Su-ji̍p bûn-jī:',
	'expand_templates_output'          => 'Kiat-kó:',
	'expand_templates_remove_comments' => 'Comments the̍h tiāu',
);

/** Low German (Plattdüütsch)
 * @author Slomox
 */
$messages['nds'] = array(
	'expand_templates_preview' => 'Vörschau',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'expandtemplates'                  => 'Sjablonen substitueren',
	'expandtemplates-desc'             => 'Substitueert sjablonen, parserfuncties en variabelen en toont wikitekst en een controleversie van een pagina',
	'expand_templates_intro'           => 'Deze speciale pagina leest de ingegeven tekst in en
substitueert recursief alle sjablonen in de tekst.
Het substitueert ook alle parserfuncties zoals <nowiki>{{</nowiki>#if:...}} en
variabelen als <nowiki>{{</nowiki>CURRENTDAY}} — vrijwel alles tussen dubbele accolades.
Hiervoor worden de relevante functies van de MediaWiki-parser gebruikt.',
	'expand_templates_title'           => 'Contexttitel, voor {{PAGENAME}}, enzovoort:',
	'expand_templates_input'           => 'Invoertekst:',
	'expand_templates_output'          => 'Resultaat',
	'expand_templates_xml_output'      => 'XML-uitvoer',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Verwijder opmerkingen',
	'expand_templates_generate_xml'    => 'XML-parserboom bekijken',
	'expand_templates_preview'         => 'Voorvertoning',
);

/** Norwegian (‪Norsk (bokmål)‬)
 * @author Jon Harald Søby
 */
$messages['no'] = array(
	'expandtemplates'                  => 'Utvid maler',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|Utvider maler, parserfunksjoner og variabler]] for å vise resultatråteksten og forhåndsvise siden slik den blir',
	'expand_templates_intro'           => 'Denne siden tar en tekst og utvider alle maler brukt i teksten. Den utvider også alle funksjoner som <nowiki>{{</nowiki>#if:…}}, og variabler som <nowiki>{{</nowiki>CURRENTDAY}}. <!--It does this by calling the relevant parser stage from MediaWiki itself.-->',
	'expand_templates_title'           => 'Konteksttittel, for {{PAGENAME}}, etc.:',
	'expand_templates_input'           => 'Skriv inn tekst:',
	'expand_templates_output'          => 'Resultat',
	'expand_templates_xml_output'      => 'XML-resultat',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Fjern kommentarer',
	'expand_templates_generate_xml'    => 'Vis parsetre som XML',
	'expand_templates_preview'         => 'Forhåndsvisning',
);

/** Northern Sotho (Sesotho sa Leboa)
 * @author Mohau
 */
$messages['nso'] = array(
	'expand_templates_output' => 'Phetho',
);

/** Occitan (Occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'expandtemplates'                  => 'Espandiment dels modèls',
	'expandtemplates-desc'             => 'Augmenta los modèls, las foncions parsairs e las variablas per visionar los tèxtes wikis espandits e previsualiza las paginas atal rendudas.',
	'expand_templates_intro'           => 'Aquesta pagina permet de testar l’espandiment de modèls, que son desvolopats recursivament. Las foncions e las variablas predefinidas, coma <nowiki>{{</nowiki>#if:...}} e <nowiki>{{</nowiki>CURRENTDAY}} tanben son desvolopadas.',
	'expand_templates_title'           => 'Títol de l’article, util per exemple se lo modèl utiliza {{PAGENAME}} :',
	'expand_templates_input'           => 'Picatz vòstre tèxt aicí :',
	'expand_templates_output'          => 'Visualizatz lo resultat :',
	'expand_templates_xml_output'      => 'Sortida XML',
	'expand_templates_ok'              => "D'acòrdi",
	'expand_templates_remove_comments' => 'Suprimir los comentaris.',
	'expand_templates_generate_xml'    => "Veire l'arborescéncia XML",
	'expand_templates_preview'         => 'Previsualizacion',
);

/** Polish (Polski)
 * @author Derbeth
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'expandtemplates'                  => 'Rozwijanie szablonów',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|Rozwija szablony, funkcje analizatora składni oraz zmienne]] by pokazać rozwiniętą składnię wiki oraz podgląd zinterpretowanej strony',
	'expand_templates_intro'           => 'Ta strona specjalna pobiera tekst i rozwija w nim rekursywnie wszystkie szablony. Rozwija także [[Wikipedia:Funkcje parsera|funkcje parsera]] takie jak <nowiki>{{</nowiki>#if...}} i zmienne jak <nowiki>{{</nowiki>CURRENTDAY}} &ndash; w zasadzie prawie wszystko w podwójnych nawiasach klamrowych. Robi się to przez wezwanie odpowiedniego przebiegu (etapu) parsera z samego MediaWiki.',
	'expand_templates_title'           => 'Tytuł kontekstu, dla komunikatów typu {{PAGENAME}} itp.:',
	'expand_templates_input'           => 'Tekst wejściowy:',
	'expand_templates_output'          => 'Rezultat',
	'expand_templates_xml_output'      => 'wynik w formacie XML',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Usuń komentarze',
	'expand_templates_generate_xml'    => 'Pokaż drzewo analizatora składni w formacie XML',
	'expand_templates_preview'         => 'Podgląd',
);

/* Piedmontese (Bèrto 'd Sèra) */
$messages['pms'] = array(
	'expandtemplates'                  => 'Anàlisi djë stamp',
	'expand_templates_intro'           => 'Sta pàgina special-sì a pija dël test e a-i fa n\'anàlisi arcorsiva ëd tuti jë stamp ch\'a l\'ha andrinta.
A l\'analisa ëdcò le fonsion anterpretà coma
<nowiki>{{</nowiki>#if:...}}, e le variabij coma
<nowiki>{{</nowiki>CURRENTDAY}}&mdash;visadì bele che tut lòn ch\'a-i é antra dobie grafe.
Sòn a lo fa ën ciamand l\'anterprete dal programa MediaWiki.',
	'expand_templates_title'           => 'Tìtol ëd contest për {{PAGENAME}} e via fòrt:',
	'expand_templates_input'           => 'Test da analisé:',
	'expand_templates_output'          => 'Arzultà',
	'expand_templates_ok'              => 'Bin parèj',
	'expand_templates_remove_comments' => 'Gava via ij coment',
	'expand_templates_preview'         => 'Preuva',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'expandtemplates'          => 'کينډۍ غځول',
	'expand_templates_input'   => 'ځايونکی متن:',
	'expand_templates_output'  => 'پايله',
	'expand_templates_ok'      => 'ښه/هو',
	'expand_templates_preview' => 'مخکتنه',
);

/** Portuguese (Português)
 * @author Malafaya
 */
$messages['pt'] = array(
	'expandtemplates'                  => 'Expandir pré-definições',
	'expandtemplates-desc'             => 'Expande predefinições, funções do analisador "parser" e variáveis para mostrar texto wiki expandido e prever o aspecto da página',
	'expand_templates_intro'           => 'Esta página especial pega em algum texto e expande todas as pré-definições nele existentes recursivamente. Também expande funções do analisador (parser) como <nowiki>{{</nowiki>#if:...}}, e variáveis como <nowiki>{{</nowiki>CURRENTDAY}}&mdash;de facto, tudo entre chavetas duplas. Isto é feito através da chamada ao estágio do analisador (parser) relevante do próprio MediaWiki.',
	'expand_templates_title'           => 'Título de contexto para {{PAGENAME}} etc.:',
	'expand_templates_input'           => 'Texto de entrada:',
	'expand_templates_output'          => 'Resultado',
	'expand_templates_xml_output'      => 'Resultado XML',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Remover comentários',
	'expand_templates_generate_xml'    => 'Mostrar árvore de análise (parse) do XML',
	'expand_templates_preview'         => 'Previsão',
);

/** Quechua (Runa Simi)
 * @author AlimanRuna
 */
$messages['qu'] = array(
	'expandtemplates'                  => "Plantillakunata mast'ariy",
	'expand_templates_input'           => 'Yaykuchina qillqa:',
	'expand_templates_output'          => 'Lluqsiynin:',
	'expand_templates_remove_comments' => 'Willapusqakunata qichuy',
	'expand_templates_preview'         => 'Ñawpaqta qhawallay',
);

/** Russian (Русский)
 * @author .:Ajvol:.
 */
$messages['ru'] = array(
	'expandtemplates'                  => 'Развёртка шаблонов',
	'expandtemplates-desc'             => 'Раскрывает шаблоны, функции парсера и переменные, чтобы показать развёрнутый вики-текст и просмотреть отрисованную страницу',
	'expand_templates_intro'           => 'Эта служебная страница преобразует текст, рекурсивно разворачивая все шаблоны в нём.
Также развёртке подвергаются все функции парсера (например, <nowiki>{{</nowiki>#if:...}} и переменные (<nowiki>{{</nowiki>CURRENTDAY}} и т.&nbsp;п.) — в общем, всё внутри двойных фигурных скобок.
Это производится корректным образом, с вызовом соответствующего обработчика MediaWiki.',
	'expand_templates_title'           => 'Заголовок страницы для {{PAGENAME}} и т.&nbsp;п.:',
	'expand_templates_input'           => 'Входной текст:',
	'expand_templates_output'          => 'Результат',
	'expand_templates_xml_output'      => 'XML вывод',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Удалить комментарии',
	'expand_templates_generate_xml'    => 'Показать дерево разбора XML',
	'expand_templates_preview'         => 'Предпросмотр',
);

/** Yakut (Саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'expandtemplates'                  => 'Халыыптары тэнитии',
	'expandtemplates-desc'             => 'Халыыптар тэнитиллиилэрэ',
	'expand_templates_intro'           => 'Бу аналлаах сирэй тиэкиһи уларытарытарыгар туох баар халыыптары тэнитэн көрдөрөр.
Парсер функциялара эмиэ тэнитиллэллэр (холобур, <nowiki>{{</nowiki>#if:...}} уонна переменнайдар (<nowiki>{{</nowiki>CURRENTDAY}} уо.&nbsp;д.&nbsp;а.) — уопсайынан, хос фигурнай скобка иһигэр баар барыта.
Бу дьайыы сыыһата суох, MediaWiki көмөтүнэн оҥоһуллар.',
	'expand_templates_title'           => '{{PAGENAME}} сирэй аата уонна да атын сибидиэнньэлэр:',
	'expand_templates_input'           => 'Киирэр сурук:',
	'expand_templates_output'          => 'Түмүк',
	'expand_templates_xml_output'      => 'XML тахсыыта',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Ырытыылары сот',
	'expand_templates_generate_xml'    => 'XML-ы мас курдук көрдөр',
	'expand_templates_preview'         => 'Инники көрүү',
);

/** Slovak (Slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'expandtemplates'                  => 'Substituovať šablóny',
	'expandtemplates-desc'             => 'Rozbaľuje šablóny, funkcie syntaktického analyzátora a premenné; zobrazuje rozbalený wikitext a náhľad stránky ako sa zobrazí',
	'expand_templates_intro'           => 'Táto špeciálna stránka prijme na
vstup text a rekurzívne substituuje všetky šablóny,
ktoré sú v ňom použité. Tiež expanduje funkcie
syntaktického analyzátora ako <nowiki>{{</nowiki>#if:...}}
a premenné ako <nowiki>{{</nowiki>CURRENTDAY}}—v podstate
takmer všetko v zložených zátvorkách. Robí to pomocou
volania relevantnej fázy syntaktického analyzátora
samotného MediaWiki.',
	'expand_templates_title'           => 'Názov kontextu pre {{PAGENAME}} atď.:',
	'expand_templates_input'           => 'Vstupný text:',
	'expand_templates_output'          => 'Výsledok',
	'expand_templates_xml_output'      => 'XML výstup',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Odstrániť komentáre',
	'expand_templates_generate_xml'    => 'Zobraziť strom XML',
	'expand_templates_preview'         => 'Náhľad',
);

$messages['sq'] = array(
	'expand_templates_input'           => 'Teksti me stampa:',
	'expand_templates_intro'           => 'Kjo faqe speciale merr tekstin me stampa dhe të tregon se si do të duket teksti pasi të jenë stamposur të tëra. Kjo faqe gjithashtu tregon parapamjen e funksioneve dhe fjalëve magjike si p.sh. <nowiki>{{</nowiki>#if:...}} dhe <nowiki>{{</nowiki>CURRENTDAY}}.',
	'expand_templates_ok'              => 'Shko',
	'expand_templates_output'          => 'Parapamja',
	'expand_templates_remove_comments' => 'Hiq komentet',
	'expand_templates_title'           => 'Titulli i faqes për rrethanën, si <nowiki>{{</nowiki>PAGENAME}} etj.:',
	'expandtemplates'                  => 'Parapamje stampash',
);

/** ћирилица (ћирилица)
 * @author Sasa Stefanovic
 */
$messages['sr-ec'] = array(
	'expandtemplates'                  => 'Замена шаблона',
	'expand_templates_intro'           => 'Ова посебна страница узима неки текст и мења све шаблоне у њему рекурзивно.
Такође мења функције парсера као што је <nowiki>{{</nowiki>#if:...}}, и променљиве као што је
<nowiki>{{</nowiki>ТРЕНУТНИДАН}}&mdash;заправо практично све што се налази између витичастих заграда.
До овога долази тако што се зове одговарајуће стање парсера из самог МедијаВикија.',
	'expand_templates_title'           => 'Назив контекста; за <nowiki>{{</nowiki>СТРАНИЦА}} итд.:',
	'expand_templates_input'           => 'Унос:',
	'expand_templates_output'          => 'Резултат',
	'expand_templates_ok'              => 'У реду',
	'expand_templates_remove_comments' => 'Уклони коментаре',
	'expand_templates_preview'         => 'Приказ',
);

$messages['sr-el'] = array(
	'expandtemplates'                  => 'Zamena šablona',
	'expand_templates_intro'           => 'Ova posebna stranica uzima neki tekst i menja sve šablone u njemu rekurzivno.
Takođe menja funkcije parsera kao što je <nowiki>{{</nowiki>#if:...}}, i promenljive kao što je
<nowiki>{{</nowiki>TRENUTNIDAN}}&mdash;zapravo praktično sve što se nalazi između vitičastih zagrada.
Do ovoga dolazi tako što se zove odgovarajuće stanje parsera iz samog MedijaVikija.',
	'expand_templates_title'           => 'Naziv konteksta; za <nowiki>{{</nowiki>STRANICA}} itd.:',
	'expand_templates_input'           => 'Unos:',
	'expand_templates_output'          => 'Rezultat',
	'expand_templates_ok'              => 'U redu',
	'expand_templates_remove_comments' => 'Ukloni komentare',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'expandtemplates'                  => 'Foarloagen expandierje',
	'expand_templates_intro'           => "In disse Spezialsiede kon Text ienroat wäide un aal Foarloagen in hier wäide rekursiv expandierd. Uk Parserfunktione as <nowiki>{{</nowiki>#if:...}} un Variabelen as <nowiki>{{</nowiki>CURRENTDAY}} wäide benutsed - faktisk alles wät twiske dubbelde swoangene Klammere '''{{}}''' stoant. Dit geböärt truch dän Aproup fon apstuunse Parser-Phasen in MediaWiki.",
	'expand_templates_title'           => 'Kontexttittel, foar {{PAGENAME}} etc.:',
	'expand_templates_input'           => 'Iengoawefäild:',
	'expand_templates_output'          => 'Resultoat',
	'expand_templates_xml_output'      => 'XML-Uutgoawe',
	'expand_templates_ok'              => 'Uutfiere',
	'expand_templates_remove_comments' => 'Kommentoare wächhoalje',
	'expand_templates_generate_xml'    => 'Wies XML Parser-Boom',
	'expand_templates_preview'         => 'Foarschau',
);

$messages['su'] = array(
	'expandtemplates'                  => 'Mekarkeun citakan',
	'expand_templates_output'          => 'Hasil:',
	'expand_templates_ok'              => 'Heug',
);

/** Swedish (Svenska)
 * @author Lejonel
 */
$messages['sv'] = array(
	'expandtemplates'                  => 'Expandera mallar',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|Expanderar]] mallar, parserfunktioner och variabler till wikikod och förhandsvisar den sida som renderas',
	'expand_templates_intro'           => 'Den här specialsidan tar en text och expanderar rekursivt alla mallar som används. Även parserfunktioner (som <nowiki>{{</nowiki>#if:...}}), variabler som <nowiki>{{</nowiki>CURRENTDAY}} och annan kod med dubbla klammerparenteser expanderas.',
	'expand_templates_title'           => 'Sidans titel, används för t.ex. {{PAGENAME}}:',
	'expand_templates_input'           => 'Text som ska expanderas:',
	'expand_templates_output'          => 'Expanderad kod',
	'expand_templates_xml_output'      => 'XML-kod',
	'expand_templates_ok'              => 'Expandera',
	'expand_templates_remove_comments' => 'Ta bort kommentarer',
	'expand_templates_generate_xml'    => 'Visa parseträd som XML',
	'expand_templates_preview'         => 'Förhandsvisning',
);

/** Telugu (తెలుగు)
 * @author Veeven
 * @author Chaduvari
 * @author Mpradeep
 */
$messages['te'] = array(
	'expandtemplates'                  => 'మూసలను విస్తరించు',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|మూసలు, పార్సరు ఫంక్షన్లు, చరరాశులను విస్తరించి]] వాటిలోని వికీటెక్స్టును, అవి రెండరు చేసే పేజీని చూపిస్తుంది',
	'expand_templates_intro'           => 'ఈ ప్రత్యేక పేజీ మీరిచ్చిన మూసలను పూర్తిగా విస్తరించి, చూపిస్తుంది. ఇది <nowiki>{{</nowiki>#if:...}} వంటి పార్సరు ఫంక్షన్లను, <nowiki>{{</nowiki>CURRENTDAY}} వంటి చరరాశులను(వేరియబుల్) కూడా విస్తరిస్తుంది &mdash; నిజానికి జమిలి(మీసాల) బ్రాకెట్లలో ఉన్న ప్రతీదాన్నీ ఇది విస్తరిస్తుంది. మీడియావికీ నుండి సంబంధిత పార్సరు స్టేజిని పిలిచి ఇది ఈ పనిని సాధిస్తుంది.',
	'expand_templates_title'           => '{{PAGENAME}} మొదలగు వాటి కొరకు సందర్భ శీర్షిక:',
	'expand_templates_input'           => 'ఇన్&zwnj;పుట్ పాఠ్యం:',
	'expand_templates_output'          => 'ఫలితం',
	'expand_templates_xml_output'      => 'XML ఔట్&zwnj;పుట్',
	'expand_templates_ok'              => 'సరే',
	'expand_templates_remove_comments' => 'వ్యాఖ్యలను తొలగించు',
	'expand_templates_generate_xml'    => 'XML పార్స్ ట్రీని చూపించు',
	'expand_templates_preview'         => 'మునుజూపు',
);

/** Tajik (Тоҷикӣ)
 * @author Ibrahim
 */
$messages['tg'] = array(
	'expand_templates_input'   => 'Матни вурудӣ:',
	'expand_templates_output'  => 'Натиҷа',
	'expand_templates_ok'      => 'Таъйид',
	'expand_templates_preview' => 'Пешнамоиш',
);

/** Tonga (faka-Tonga)
 * @author SPQRobin
 */
$messages['to'] = array(
	'expandtemplates' => 'Fakalahiange ʻa e ngaahi sīpinga',
);

/** Turkish (Türkçe)
 * @author Erkan Yilmaz
 * @author Karduelis
 */
$messages['tr'] = array(
	'expand_templates_input'           => 'Giriş metni:',
	'expand_templates_output'          => 'Sonuç',
	'expand_templates_xml_output'      => 'XML üretim',
	'expand_templates_ok'              => 'Tamam',
	'expand_templates_remove_comments' => 'Yorumları sil',
	'expand_templates_preview'         => 'Ön izleme',
);

/** Vietnamese (Tiếng Việt)
 * @author Vinhtantran
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'expandtemplates'                  => 'Bung tiêu bản',
	'expandtemplates-desc'             => '[[Special:ExpandTemplates|Mở rộng các tiêu bản, hàm cú pháp, và biến]] thành mã wiki cuối cùng và hiển thị trang dùng mã này',
	'expand_templates_intro'           => 'Trang đặc biệt này sẽ nhận vào một đoạn văn bản và bung tất cả các tiêu bản trong nó ra một cách đệ quy cho đến hết. Nó cũng bung cả những hàm cú pháp như <nowiki>{{</nowiki>#if:…}}, và những biến số như <nowiki>{{</nowiki>CURRENTDAY}}&nbsp;– thực ra cũng là các dữ liệu bình thường đặt trong ngoặc móc. Nó thực hiện điều này bằng cách gọi tầng dịch cú pháp từ chính MediaWiki.',
	'expand_templates_title'           => 'Tựa đề, đối với {{PAGENAME}}, v.v.:',
	'expand_templates_input'           => 'Văn bản nhập:',
	'expand_templates_output'          => 'Kết quả',
	'expand_templates_xml_output'      => 'Xuất XML',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => 'Bỏ các chú thích',
	'expand_templates_generate_xml'    => 'Xem cây phân tích XML',
	'expand_templates_preview'         => 'Xem thử',
);

/** Volapük (Volapük)
 * @author Smeira
 */
$messages['vo'] = array(
	'expandtemplates'                  => 'stäänükön samafomotis',
	'expand_templates_intro'           => 'Pad patik at sumon vödemi e stäänükon samafomotis onik valik okvokölo. Stäänükon i programasekätis soäs <nowiki>{{</nowiki>#if:...}} e vödis soäs <nowiki>{{</nowiki>CURRENTDAY}}... e valikosi vü els <nowiki>{{ }}</nowiki>.
Dunon atosi medä vokon programadili tefik se el MediaWiki it.',
	'expand_templates_title'           => 'Yumedatiäd, pro {{PAGENAME}} e r.:',
	'expand_templates_input'           => 'Penolös vödem:',
	'expand_templates_output'          => 'Seks',
	'expand_templates_xml_output'      => 'Seks fomätü XML',
	'expand_templates_ok'              => 'Baiced',
	'expand_templates_remove_comments' => 'Moükön küpetis',
	'expand_templates_generate_xml'    => 'Jonön bimi: XML',
	'expand_templates_preview'         => 'Büologed',
);

$messages['yue'] = array(
	'expandtemplates'                  => '展開模',
	'expand_templates_intro'           => '呢個特別頁係用於將一啲文字中嘅模展開，包括響個模度引用嘅模。同時亦都展開解譯器函數好似<nowiki>{{</nowiki>#if:...}}，以及一啲變數好似<nowiki>{{</nowiki>CURRENTDAY}}&mdash;實際上，幾乎所有響雙括弧中嘅內容都會被展開。呢個特別頁係通過使用MediaWiki嘅相關解釋階段嘅功能完成嘅。',
	'expand_templates_title'           => '內容標題，用於 {{PAGENAME}} 等頁面：',
	'expand_templates_input'           => '輸入文字：',
	'expand_templates_output'          => '結果：',
	'expand_templates_ok'              => 'OK',
	'expand_templates_remove_comments' => '拎走注釋',
	'expand_templates_preview'         => '預覽',
);

$messages['zh-hans'] = array(
	'expandtemplates'                  => '展开模板',
	'expand_templates_intro'           => '本特殊页面用于将一些文字中的模板展开，包括模板中引用的模板。同时也展开解释器函数如<nowiki>{{</nowiki>#if:...}}，以及变量如<nowiki>{{</nowiki>CURRENTDAY}}&mdash;实际上，几乎所有在双括号中的内容都被展开。本特殊页面是通过调用MediaWiki的相关解释阶段的功能完成的。',
	'expand_templates_title'           => '上下文标题，用于 {{PAGENAME}} 等页面：',
	'expand_templates_input'           => '输入文字：',
	'expand_templates_output'          => '结果：',
	'expand_templates_ok'              => '确定',
	'expand_templates_remove_comments' => '移除注释',
	'expand_templates_preview'         => '预览',
);

$messages['zh-hant'] = array(
	'expandtemplates'                  => '展開模板',
	'expand_templates_intro'           => '本特殊頁面用於將一些文字中的模版展開，包括模版中引用的模版。同時也展開解譯器函數如<nowiki>{{</nowiki>#if:...}}，以及變數如<nowiki>{{</nowiki>CURRENTDAY}}&mdash;實際上，幾乎所有在雙括弧中的內容都被展開。本特殊頁面是通過使用MediaWiki的相關解釋階段的功能完成的。',
	'expand_templates_title'           => '上下文標題，用於 {{PAGENAME}} 等頁面：',
	'expand_templates_input'           => '輸入文字：',
	'expand_templates_output'          => '結果：',
	'expand_templates_ok'              => '確定',
	'expand_templates_remove_comments' => '移除注釋',
	'expand_templates_preview'         => '預覽',
);

