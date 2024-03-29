/* 
  JavaScript file for enhanced recentchanges
 */
 
/*
  * Add the CSS to hide parts that should be collapsed
  *
  * We do this with JS so everything will be expanded by default
  * if JS is disabled
 */
appendCSS('.mw-changeslist-hidden {'+
	'	display:none;'+
	'}'+
	'div.mw-changeslist-expanded {'+
	'	display:block;'+
	'}'+
	'span.mw-changeslist-expanded {'+
	'	display:inline !important;'+
	'	visibility:visible !important;'+
	'}'
);

/*
 * Switch an RC line between hidden/shown
 * @param int idNumber : the id number of the RC group
*/ 
function toggleVisibility(idNumber) {
	var openarrow = document.getElementById("mw-rc-openarrow-"+idNumber);
	var closearrow = document.getElementById("mw-rc-closearrow-"+idNumber);
	var subentries = document.getElementById("mw-rc-subentries-"+idNumber);
	if (openarrow.className == 'mw-changeslist-expanded changes-list-entry') {
		openarrow.className = 'mw-changeslist-hidden changes-list-entry';
		closearrow.className = 'mw-changeslist-expanded changes-list-entry';
		subentries.className = 'mw-changeslist-expanded changes-list-entry';
	} else {
		openarrow.className = 'mw-changeslist-expanded changes-list-entry';
		closearrow.className = 'mw-changeslist-hidden changes-list-entry';
		subentries.className = 'mw-changeslist-hidden changes-list-entry';
	}
}
