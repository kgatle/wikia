<?php

/**
 * CategorySelect
 *
 * A CategorySelect extension for MediaWiki
 * Provides an interface for managing categories in article without editing whole article
 *
 * @author Maciej Błaszkowski (Marooned) <marooned at wikia-inc.com>
 * @date 2009-01-13
 * @copyright Copyright (C) 2009 Maciej Błaszkowski, Wikia Inc.
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @package MediaWiki
 *
 * To activate this functionality, place this file in your extensions/
 * subdirectory, and add the following line to LocalSettings.php:
 *     require_once("$IP/extensions/wikia/CategorySelect/CategorySelect.php");
 */

if (!defined('MEDIAWIKI')) {
	echo "This is MediaWiki extension named CategorySelect.\n";
	exit(1) ;
}

$wgExtensionCredits['other'][] = array(
	'name' => 'CategorySelect',
	'author' => '[http://www.wikia.com/wiki/User:Marooned Maciej Błaszkowski (Marooned)]',
	'description' => 'Provides an interface for managing categories in article without editing whole article.'
);

$wgExtensionFunctions[] = 'CategorySelectInit';
$wgExtensionMessagesFiles['CategorySelect'] = dirname(__FILE__) . '/CategorySelect.i18n.php';
$wgAjaxExportList[] = 'CategorySelectAjaxGetCategories';

/**
 * Initialize hooks
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectInit() {
	global $wgHooks, $wgCategorySelectEnabled, $wgAutoloadClasses;
	$wgAutoloadClasses['CategorySelect'] = 'extensions/wikia/CategorySelect/CategorySelect_body.php';
//	$wgHooks['OutputPageBeforeHTML'][] = 'CategorySelectOutput';
	$wgHooks['EditPageAfterGetContent'][] = 'CategorySelectReplaceContent';
	$wgHooks['EditPage::CategoryBox'][] = 'CategorySelectCategoryBox';
	$wgHooks['EditPage::importFormData::finished'][] = 'CategorySelectImportFormData';
	$wgHooks['EditPage::showEditForm:fields'][] = 'CategorySelectAddFormFields';
	$wgHooks['EditForm::MultiEdit:Form'][] = 'CategorySelectDisplayCategoryBox';
	$wgHooks['getCategoryLinks'][] = 'CategorySelectGetCategoryLinks';
	wfLoadExtensionMessages('CategorySelect');
}

/**
 * Get categories via AJAX that are matching typed text [for suggestion dropdown]
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectAjaxGetCategories() {
	global $wgRequest;
	$cat = $wgRequest->getText('query');

	$dbr = wfGetDB(DB_SLAVE);
	$res = $dbr->select(
		'category',
		'cat_title',
		'cat_title LIKE "%' . $dbr->escapeLike($cat) . '%"',
		__METHOD__,
		array('LIMIT' => '10')
	);

	$categories = '';
	while($row = $dbr->fetchObject($res)) {
		$categories .= $row->cat_title . "\n";
	}

	$ar = new AjaxResponse($categories);
	$ar->setCacheDuration(60 * 20);

	return $ar;
}

/**
 * Replace content of edited article [with cutted out categories]
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectReplaceContent($text) {
	$data = CategorySelect::SelectCategoryAPIgetData($text);
	$text = $data['wikitext'];
	return true;
}

/**
 * Remove hidden category box
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectCategoryBox($text) {
	$text = '';
	return true;
}

/**
 * Get categories via AJAX
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
//function CategorySelectAjaxGetCategoriesXYZ($titleName) {
//	$result = array('error' => null, 'wikitext' => null, 'categories' => null);
//	$title = Title::newFromText($titleName);
//	if($title->exists()) {
//		$rev = Revision::newFromTitle($title);
//		$wikitext = $rev->getText();
//		$data = CategorySelect::SelectCategoryAPIgetData($wikitext);
//		$result = array_merge($results, $data);
//	} else {
//		$result['error'] = wfMsg('');
//	}
//	$ar = new AjaxResponse(Wikia::json_encode($results));
//	$ar->setCacheDuration(60 * 20);
//	return $ar;
//}

/**
 * Test function - display CS above article in view mode
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectOutput($out, $text) {
	global $wgOut, $wgExtensionsPath, $wgStyleVersion, $wgTitle, $wgCategorySelectMetaData;

	if (!is_array($wgCategorySelectMetaData)) {
		$rev = Revision::newFromTitle($wgTitle);
		if (!is_null($rev)) {
			$wikitext = $rev->getText();
			CategorySelect::SelectCategoryAPIgetData($wikitext);
		}
	}

	$html = CategorySelectGenerateHTML();
	$wgOut->addHTML($html);

	return true;
}

/**
 * Change format of categories metadata
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectChangeFormat($categories, $from, $to) {
	if ($from == 'json') {
		$categories = Wikia::json_decode($categories, true);
	}

	if ($to == 'wiki') {
		$categoriesStr = '';
		foreach($categories as $c) {
			$catTmp = '[[' . $c['namespace'] . ':' . $c['category'] . ($c['sortkey'] == '' ? '' : ('|' . $c['sortkey'])) . ']]';
			if ($c['outerTag'] != '') {
				$catTmp = '<' . $c['outerTag'] . '>' . $catTmp . '</' . $c['outerTag'] . '>';
			}
			$categoriesStr .= $catTmp . "\n";
		}
		return "\n" . $categoriesStr;
	} elseif ($to == 'array') {
		return $categories;
	}

	if ($from == 'array' && $to == 'json') {
		return Wikia::json_encode($categories);
	}
}

/**
 * Add hidden field with category metadata
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectAddFormFields($editPage, $wgOut) {
	global $wgCategorySelectMetaData;
	$categories = '';
	if (!empty($wgCategorySelectMetaData)) {
		$categories = htmlspecialchars(CategorySelectChangeFormat($wgCategorySelectMetaData['categories'], 'array', 'json'));
	}
	$wgOut->addHTML("<input type=\"hidden\" value=\"$categories\" name=\"wpCategorySelectWikitext\" id=\"wpCategorySelectWikitext\" />");
	$wgOut->addHTML('<input type="hidden" value="wiki" id="wpCategorySelectSourceType" name="wpCategorySelectSourceType" />');
	return true;
}

/**
 * Concatenate categories on EditPage POST
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectImportFormData($editPage, $request) {
	if ($request->wasPosted()) {
		$sourceType = $request->getVal('wpCategorySelectSourceType');
		if ($sourceType == 'wiki') {
			$categories = $editPage->safeUnicodeInput($request, 'csWikitext');
		} else {	//json
			$categories = $editPage->safeUnicodeInput($request, 'wpCategorySelectWikitext');
			$categories = CategorySelectChangeFormat($categories, 'json', 'wiki');
		}

		if ($editPage->preview) {
			CategorySelect::SelectCategoryAPIgetData($categories);
		} else {	//saving article
			$editPage->textbox1 .= "\n" . $categories;
		}
	}
	return true;
}


/**
 * Display category box
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectDisplayCategoryBox($rows, $cols, $ew, $textbox) {
	global $wgCategorySelectMetaData, $wgRequest, $wgOut;

	$action = $wgRequest->getVal('action', 'view');
	if ($action != 'view' && $action != 'purge') {
		if (!is_array($wgCategorySelectMetaData)) {
			global $wgTitle;
			$rev = Revision::newFromTitle($wgTitle);
			if (!is_null($rev)) {
				$wikitext = $rev->getText();
				CategorySelect::SelectCategoryAPIgetData($wikitext);
			}
		}

		$wgOut->addHTML( CategorySelectGenerateHTML('editform') );
	}
	return true;
}

/**
 * Remove regular category list under article
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectGetCategoryLinks($categoryLinks) {
	global $wgRequest;

	$action = $wgRequest->getVal('action', 'view');
	//remove it for edit page
	if ($action == 'edit' || $action == 'submit') {
		$categoryLinks = '';
		return false;
	}
	return true;
}

/**
 * Add required JS & CSS and return HTML
 *
 * @author Maciej Błaszkowski <marooned at wikia-inc.com>
 */
function CategorySelectGenerateHTML($formId = '') {
	global $wgOut, $wgExtensionsPath, $wgStyleVersion, $wgCategorySelectMetaData;

	$wgOut->addScript("<script type=\"text/javascript\">var formId = '$formId';</script>");
	$wgOut->addScript("<script type=\"text/javascript\" src=\"$wgExtensionsPath/wikia/CategorySelect/CategorySelect.js?$wgStyleVersion\"></script>");
	$wgOut->addScript("<link rel=\"stylesheet\" type=\"text/css\" href=\"$wgExtensionsPath/wikia/CategorySelect/CategorySelect.css?$wgStyleVersion\" />");

	$categories = is_null($wgCategorySelectMetaData) ? '' : CategorySelectChangeFormat($wgCategorySelectMetaData['categories'], 'array', 'wiki');

	$result = '
	<script type="text/javascript">document.write(\'<style type="text/css">#csWikitextContainer {display: none}</style>\');</script>
	<div id="csMainContainer">
		<div id="csItemsContainer">
			<input id="csCategoryInput" type="text" style="display: none" />
			<div id="csSuggestContainer"></div>
		</div>
		<div id="csWikitextContainer"><textarea id="csWikitext" name="csWikitext">' . $categories . '</textarea></div>
		<div id="csCodeView"><a href="#" onclick="toggleCodeView(); return false;" onfocus="this.blur()" tabindex="-1">' . wfMsg('categoryselect-code-view') . '</a></div>
		<div class="clearfix"></div>
	</div>
	';

	return $result;
}