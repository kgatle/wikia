<?php
/**
 * Split off some of the internal bits from Skin.php. These functions are used
 * for primarily page content: links, embedded images, table of contents. Links
 * are also used in the skin. For the moment, Skin is a descendent class of
 * Linker.  In the future, it should probably be further split so that every
 * other bit of the wiki doesn't have to go loading up Skin to get at it.
 *
 * @ingroup Skins
 */
class Linker {

	/**
	 * Flags for userToolLinks()
	 */
	const TOOL_LINKS_NOBLOCK = 1;

	function __construct() {}

	/**
	 * @deprecated
	 */
	function postParseLinkColour( $s = null ) {
		wfDeprecated( __METHOD__ );
		return null;
	}

	/**
	 * Get the appropriate HTML attributes to add to the "a" element of an ex-
	 * ternal link, as created by [wikisyntax].
	 *
	 * @param string $title  The (unescaped) title text for the link
	 * @param string $unused Unused
	 * @param string $class  The contents of the class attribute; if an empty
	 *   string is passed, which is the default value, defaults to 'external'.
	 */
	function getExternalLinkAttributes( $title, $unused = null, $class='' ) {
		return $this->getLinkAttributesInternal( $title, $class, 'external' );
	}

	/**
	 * Get the appropriate HTML attributes to add to the "a" element of an in-
	 * terwiki link.
	 *
	 * @param string $title  The title text for the link, URL-encoded (???) but
	 *   not HTML-escaped
	 * @param string $unused Unused
	 * @param string $class  The contents of the class attribute; if an empty
	 *   string is passed, which is the default value, defaults to 'external'.
	 */
	function getInterwikiLinkAttributes( $title, $unused = null, $class='' ) {
		global $wgContLang;

		# FIXME: We have a whole bunch of handling here that doesn't happen in
		# getExternalLinkAttributes, why?
		$title = urldecode( $title );
		$title = $wgContLang->checkTitleEncoding( $title );
		$title = preg_replace( '/[\\x00-\\x1f]/', ' ', $title );

		return $this->getLinkAttributesInternal( $title, $class, 'external' );
	}

	/**
	 * Get the appropriate HTML attributes to add to the "a" element of an in-
	 * ternal link.
	 *
	 * @param string $title  The title text for the link, URL-encoded (???) but
	 *   not HTML-escaped
	 * @param string $unused Unused
	 * @param string $class  The contents of the class attribute, default none
	 */
	function getInternalLinkAttributes( $title, $unused = null, $class='' ) {
		$title = urldecode( $title );
		$title = str_replace( '_', ' ', $title );
		return $this->getLinkAttributesInternal( $title, $class );
	}

	/**
	 * Get the appropriate HTML attributes to add to the "a" element of an in-
	 * ternal link, given the Title object for the page we want to link to.
	 *
	 * @param Title  $nt     The Title object
	 * @param string $unused Unused
	 * @param string $class  The contents of the class attribute, default none
	 * @param mixed  $title  Optional (unescaped) string to use in the title
	 *   attribute; if false, default to the name of the page we're linking to
	 */
	function getInternalLinkAttributesObj( $nt, $unused = null, $class = '', $title = false ) {
		if( $title === false ) {
			$title = $nt->getPrefixedText();
		}
		return $this->getLinkAttributesInternal( $title, $class );
	}

	/**
	 * Common code for getLinkAttributesX functions
	 */
	private function getLinkAttributesInternal( $title, $class, $classDefault = false ) {
		global $wgWysiwygParserEnabled;
		$title = htmlspecialchars( $title );
		if( $class === '' and $classDefault !== false ) {
			# FIXME: Parameter defaults the hard way!  We should just have
			# $class = 'external' or whatever as the default in the externally-
			# exposed functions, not $class = ''.
			$class = $classDefault;
		}
		$class = htmlspecialchars( $class );
		$r = '';
		if( $class !== '' ) {
			$r .= " class=\"$class\"";
		}
		//Wysiwyg: don't add title when parsing in wysiwyg mode
		if (empty($wgWysiwygParserEnabled)) {
			$r .= " title=\"$title\"";
		}
		return $r;
	}

	/**
	 * Return the CSS colour of a known link
	 *
	 * @param Title $t
	 * @param integer $threshold user defined threshold
	 * @return string CSS class
	 */
	function getLinkColour( $t, $threshold ) {
		$colour = '';
		if ( $t->isRedirect() ) {
			# Page is a redirect
			$colour = 'mw-redirect';
		} elseif ( $threshold > 0 &&
			   $t->exists() && $t->getLength() < $threshold &&
			   MWNamespace::isContent( $t->getNamespace() ) ) {
			# Page is a stub
			$colour = 'stub';
		}
		return $colour;
	}

	/**
	 * This function returns an HTML link to the given target.  It serves a few
	 * purposes:
	 *   1) If $target is a Title, the correct URL to link to will be figured
	 *      out automatically.
	 *   2) It automatically adds the usual classes for various types of link
	 *      targets: "new" for red links, "stub" for short articles, etc.
	 *   3) It escapes all attribute values safely so there's no risk of XSS.
	 *   4) It provides a default tooltip if the target is a Title (the page
	 *      name of the target).
	 * link() replaces the old functions in the makeLink() family.
	 *
	 * @param $target        Title  Can currently only be a Title, but this may
	 *   change to support Images, literal URLs, etc.
	 * @param $text          string The HTML contents of the <a> element, i.e.,
	 *   the link text.  This is raw HTML and will not be escaped.  If null,
	 *   defaults to the prefixed text of the Title; or if the Title is just a
	 *   fragment, the contents of the fragment.
	 * @param $customAttribs array  A key => value array of extra HTML attri-
	 *   butes, such as title and class.  (href is ignored.)  Classes will be
	 *   merged with the default classes, while other attributes will replace
	 *   default attributes.  All passed attribute values will be HTML-escaped.
	 *   A false attribute value means to suppress that attribute.
	 * @param $query         array  The query string to append to the URL
	 *   you're linking to, in key => value array form.  Query keys and values
	 *   will be URL-encoded.
	 * @param $options       mixed  String or array of strings:
	 *     'known': Page is known to exist, so don't check if it does.
	 *     'broken': Page is known not to exist, so don't check if it does.
	 *     'noclasses': Don't add any classes automatically (includes "new",
	 *       "stub", "mw-redirect", "extiw").  Only use the class attribute
	 *       provided, if any, so you get a simple blue link with no funny i-
	 *       cons.
	 *     'forcearticlepath': Use the article path always, even with a querystring.
	 *       Has compatibility issues on some setups, so avoid wherever possible.
	 * @return string HTML <a> attribute
	 */
	public function link( $target, $text = null, $customAttribs = array(), $query = array(), $options = array() ) {
		wfProfileIn( __METHOD__ );
		if( !$target instanceof Title ) {
			return "<!-- ERROR -->$text";
		}
		$options = (array)$options;

		$ret = null;
		if( !wfRunHooks( 'LinkBegin', array( $this, $target, &$text,
		&$customAttribs, &$query, &$options, &$ret ) ) ) {
			wfProfileOut( __METHOD__ );
			return $ret;
		}

		# Normalize the Title if it's a special page
		$target = $this->normaliseSpecialPage( $target );

		# If we don't know whether the page exists, let's find out.
		wfProfileIn( __METHOD__ . '-checkPageExistence' );
		if( !in_array( 'known', $options ) and !in_array( 'broken', $options ) ) {
			if( $target->isKnown() ) {
				$options []= 'known';
			} else {
				$options []= 'broken';
			}
		}
		wfProfileOut( __METHOD__ . '-checkPageExistence' );

		$oldquery = array();
		if( in_array( "forcearticlepath", $options ) && $query ){
			$oldquery = $query;
			$query = array();
		}

		# Note: we want the href attribute first, for prettiness.
		$attribs = array( 'href' => $this->linkUrl( $target, $query, $options ) );
		if( in_array( 'forcearticlepath', $options ) && $oldquery ){
			$attribs['href'] = wfAppendQuery( $attribs['href'], wfArrayToCgi( $oldquery ) );
		}

		$attribs = array_merge(
			$attribs,
			$this->linkAttribs( $target, $customAttribs, $options )
		);
		if( is_null( $text ) ) {
			$text = $this->linkText( $target );
		}

		$ret = null;
		if( wfRunHooks( 'LinkEnd', array( $this, $target, $options, &$text, &$attribs, &$ret ) ) ) {
			$ret = Xml::openElement( 'a', $attribs ) . $text . Xml::closeElement( 'a' );
		}

		wfProfileOut( __METHOD__ );
		return $ret;
	}

	private function linkUrl( $target, $query, $options ) {
		wfProfileIn( __METHOD__ );
		# We don't want to include fragments for broken links, because they
		# generally make no sense.
		if( in_array( 'broken', $options ) and $target->mFragment !== '' ) {
			$target = clone $target;
			$target->mFragment = '';
		}

		# If it's a broken link, add the appropriate query pieces, unless
		# there's already an action specified, or unless 'edit' makes no sense
		# (i.e., for a nonexistent special page).
		if( in_array( 'broken', $options ) and empty( $query['action'] )
		and $target->getNamespace() != NS_SPECIAL ) {
			$query['action'] = 'edit';
			$query['redlink'] = '1';
		}
		$ret = $target->getLinkUrl( $query );
		wfProfileOut( __METHOD__ );
		return $ret;
	}

	private function linkAttribs( $target, $attribs, $options ) {
		wfProfileIn( __METHOD__ );
		global $wgUser;
		$defaults = array();

		if( !in_array( 'noclasses', $options ) ) {
			wfProfileIn( __METHOD__ . '-getClasses' );
			# Now build the classes.
			$classes = array();

			if( in_array( 'broken', $options ) ) {
				$classes[] = 'new';
			}

			if( $target->isExternal() ) {
				$classes[] = 'extiw';
			}

			# Note that redirects never count as stubs here.
			if ( $target->isRedirect() ) {
				$classes[] = 'mw-redirect';
			} elseif( $target->isContentPage() ) {
				# Check for stub.
				$threshold = $wgUser->getOption( 'stubthreshold' );
				if( $threshold > 0 and $target->exists() and $target->getLength() < $threshold ) {
					$classes[] = 'stub';
				}
			}
			if( $classes != array() ) {
				$defaults['class'] = implode( ' ', $classes );
			}
			wfProfileOut( __METHOD__ . '-getClasses' );
		}

		# Get a default title attribute.
		if( in_array( 'known', $options ) ) {
			$defaults['title'] = $target->getPrefixedText();
		} else {
			$defaults['title'] = wfMsg( 'red-link-title', $target->getPrefixedText() );
		}

		# Finally, merge the custom attribs with the default ones, and iterate
		# over that, deleting all "false" attributes.
		$ret = array();
		$merged = Sanitizer::mergeAttributes( $defaults, $attribs );
		foreach( $merged as $key => $val ) {
			# A false value suppresses the attribute, and we don't want the
			# href attribute to be overridden.
			if( $key != 'href' and $val !== false ) {
				$ret[$key] = $val;
			}
		}
		wfProfileOut( __METHOD__ );
		return $ret;
	}

	private function linkText( $target ) {
		# We might be passed a non-Title by make*LinkObj().  Fail gracefully.
		if( !$target instanceof Title ) {
			return '';
		}

		# If the target is just a fragment, with no title, we return the frag-
		# ment text.  Otherwise, we return the title text itself.
		if( $target->getPrefixedText() === '' and $target->getFragment() !== '' ) {
			return htmlspecialchars( $target->getFragment() );
		}
		return htmlspecialchars( $target->getPrefixedText() );
	}

	/**
	 * @deprecated Use link()
	 *
	 * This function is a shortcut to makeLinkObj(Title::newFromText($title),...). Do not call
	 * it if you already have a title object handy. See makeLinkObj for further documentation.
	 *
	 * @param $title String: the text of the title
	 * @param $text  String: link text
	 * @param $query String: optional query part
	 * @param $trail String: optional trail. Alphabetic characters at the start of this string will
	 *                      be included in the link text. Other characters will be appended after
	 *                      the end of the link.
	 */
	function makeLink( $title, $text = '', $query = '', $trail = '' ) {
		wfProfileIn( __METHOD__ );
	 	$nt = Title::newFromText( $title );
		if ( $nt instanceof Title ) {
			$result = $this->makeLinkObj( $nt, $text, $query, $trail );
		} else {
			wfDebug( 'Invalid title passed to Linker::makeLink(): "'.$title."\"\n" );
			$result = $text == "" ? $title : $text;
		}

		wfProfileOut( __METHOD__ );
		return $result;
	}

	/**
	 * @deprecated Use link()
	 *
	 * This function is a shortcut to makeKnownLinkObj(Title::newFromText($title),...). Do not call
	 * it if you already have a title object handy. See makeKnownLinkObj for further documentation.
	 *
	 * @param $title String: the text of the title
	 * @param $text  String: link text
	 * @param $query String: optional query part
	 * @param $trail String: optional trail. Alphabetic characters at the start of this string will
	 *                      be included in the link text. Other characters will be appended after
	 *                      the end of the link.
	 */
	function makeKnownLink( $title, $text = '', $query = '', $trail = '', $prefix = '',$aprops = '') {
		$nt = Title::newFromText( $title );
		if ( $nt instanceof Title ) {
			return $this->makeKnownLinkObj( $nt, $text, $query, $trail, $prefix , $aprops );
		} else {
			wfDebug( 'Invalid title passed to Linker::makeKnownLink(): "'.$title."\"\n" );
			return $text == '' ? $title : $text;
		}
	}

	/**
	 * @deprecated Use link()
	 *
	 * This function is a shortcut to makeBrokenLinkObj(Title::newFromText($title),...). Do not call
	 * it if you already have a title object handy. See makeBrokenLinkObj for further documentation.
	 *
	 * @param string $title The text of the title
	 * @param string $text Link text
	 * @param string $query Optional query part
	 * @param string $trail Optional trail. Alphabetic characters at the start of this string will
	 *                      be included in the link text. Other characters will be appended after
	 *                      the end of the link.
	 */
	function makeBrokenLink( $title, $text = '', $query = '', $trail = '' ) {
		$nt = Title::newFromText( $title );
		if ( $nt instanceof Title ) {
			return $this->makeBrokenLinkObj( $nt, $text, $query, $trail );
		} else {
			wfDebug( 'Invalid title passed to Linker::makeBrokenLink(): "'.$title."\"\n" );
			return $text == '' ? $title : $text;
		}
	}

	/**
	 * @deprecated Use link()
	 *
	 * This function is a shortcut to makeStubLinkObj(Title::newFromText($title),...). Do not call
	 * it if you already have a title object handy. See makeStubLinkObj for further documentation.
	 *
	 * @param $title String: the text of the title
	 * @param $text  String: link text
	 * @param $query String: optional query part
	 * @param $trail String: optional trail. Alphabetic characters at the start of this string will
	 *                      be included in the link text. Other characters will be appended after
	 *                      the end of the link.
	 */
	function makeStubLink( $title, $text = '', $query = '', $trail = '' ) {
		wfDeprecated( __METHOD__ );
		$nt = Title::newFromText( $title );
		if ( $nt instanceof Title ) {
			return $this->makeStubLinkObj( $nt, $text, $query, $trail );
		} else {
			wfDebug( 'Invalid title passed to Linker::makeStubLink(): "'.$title."\"\n" );
			return $text == '' ? $title : $text;
		}
	}

	/**
	 * @deprecated Use link()
	 *
	 * Make a link for a title which may or may not be in the database. If you need to
	 * call this lots of times, pre-fill the link cache with a LinkBatch, otherwise each
	 * call to this will result in a DB query.
	 *
	 * @param $nt     Title: the title object to make the link from, e.g. from
	 *                      Title::newFromText.
	 * @param $text  String: link text
	 * @param $query String: optional query part
	 * @param $trail String: optional trail. Alphabetic characters at the start of this string will
	 *                      be included in the link text. Other characters will be appended after
	 *                      the end of the link.
	 * @param $prefix String: optional prefix. As trail, only before instead of after.
	 */
	function makeLinkObj( $nt, $text= '', $query = '', $trail = '', $prefix = '' ) {
		global $wgUser;
		wfProfileIn( __METHOD__ );

		$query = wfCgiToArray( $query );
		list( $inside, $trail ) = Linker::splitTrail( $trail );
		if( $text === '' ) {
			$text = $this->linkText( $nt );
		}

		/* Wikia change begin - @author: Marooned, Inez */
		/* Wysiwyg: get refId from passed text */
		$attribs = array();
		global $wgWysiwygParserEnabled;
		if(!empty($wgWysiwygParserEnabled) && $nt->isExternal()) {
			$attribs['refid'] = Wysiwyg_GetRefId($text, true);
		}
		/* Wikia change end */

		/* Wikia change begin - @author: unknown, Inez */
		if($nt->isExternal()) {
			$iwclass = strtolower($nt->getInterwiki());
			if(in_array($iwclass, array('w', 'wikia', 'wikicities'))) {
				$iwclass = 'w';
				$iw_temp = split(':', strtolower($nt->getText()));
				if(!empty($iw_temp[0])) {
					if ('c' == $iw_temp[0]) {
						if (!empty($iw_temp[1])) {
							$iwclass .= " wikia-{$iw_temp[1]}";
						}
					}
				}
			}
			$attribs['class'] = "interwiki-{$iwclass}";
		}
		/* Wikia change end */

		$ret = $this->link( $nt, "$prefix$text$inside", $attribs, $query ) . $trail;

		wfProfileOut( __METHOD__ );
		return $ret;
	}

	/**
	 * @deprecated Use link()
	 *
	 * Make a link for a title which definitely exists. This is faster than makeLinkObj because
	 * it doesn't have to do a database query. It's also valid for interwiki titles and special
	 * pages.
	 *
	 * @param $nt Title object of target page
	 * @param $text   String: text to replace the title
	 * @param $query  String: link target
	 * @param $trail  String: text after link
	 * @param $prefix String: text before link text
	 * @param $aprops String: extra attributes to the a-element
	 * @param $style  String: style to apply - if empty, use getInternalLinkAttributesObj instead
	 * @return the a-element
	 */
	function makeKnownLinkObj( $title, $text = '', $query = '', $trail = '', $prefix = '' , $aprops = '', $style = '' ) {
		wfProfileIn( __METHOD__ );

		if ( $text == '' ) {
			$text = $this->linkText( $title );
		}
		$attribs = Sanitizer::mergeAttributes(
			Sanitizer::decodeTagAttributes( $aprops ),
			Sanitizer::decodeTagAttributes( $style )
		);
		$query = wfCgiToArray( $query );
		list( $inside, $trail ) = Linker::splitTrail( $trail );

		/* Wikia change begin - @author: Marooned, Inez */
		/* Wysiwyg: get refId from passed wikitext */
		global $wgWysiwygParserEnabled;
		if(!empty($wgWysiwygParserEnabled)) {
			$attribs['refid'] = Wysiwyg_GetRefId($text, true);
		}
		/* Wikia change end */

		$ret = $this->link( $title, "$prefix$text$inside", $attribs, $query,
			array( 'known', 'noclasses' ) ) . $trail;

		wfProfileOut( __METHOD__ );
		return $ret;
	}

	/**
	 * @deprecated Use link()
	 *
	 * Make a red link to the edit page of a given title.
	 *
	 * @param $nt Title object of the target page
	 * @param $text  String: Link text
	 * @param $query String: Optional query part
	 * @param $trail String: Optional trail. Alphabetic characters at the start of this string will
	 *                      be included in the link text. Other characters will be appended after
	 *                      the end of the link.
	 */
	function makeBrokenLinkObj( $title, $text = '', $query = '', $trail = '', $prefix = '' ) {
		wfProfileIn( __METHOD__ );

global $wgWikiaEnableSharedHelpExt;
if ($wgWikiaEnableSharedHelpExt && (NS_HELP == $title->getNamespace()) && SharedHelpArticleExists($title)) return $this->makeKnownLinkObj($title, $text, $query, $trail, $prefix);

		list( $inside, $trail ) = Linker::splitTrail( $trail );
		if( $text === '' ) {
			$text = $this->linkText( $title );
		}
		$nt = $this->normaliseSpecialPage( $title );

		$attribs = array('rel' => 'nofollow');
		global $wgWysiwygParserEnabled; //Wysiwyg: get refId from wikitext and add it to the HTML
		if (!empty($wgWysiwygParserEnabled)) {
			$attribs['refid'] = Wysiwyg_GetRefId($text, true);
		}

		$ret = $this->link( $title, "$prefix$text$inside", $attribs,
			wfCgiToArray( $query ), 'broken' ) . $trail;

		wfProfileOut( __METHOD__ );
		return $ret;
	}

	/**
	 * @deprecated Use link()
	 *
	 * Make a brown link to a short article.
	 *
	 * @param $nt Title object of the target page
	 * @param $text  String: link text
	 * @param $query String: optional query part
	 * @param $trail String: optional trail. Alphabetic characters at the start of this string will
	 *                      be included in the link text. Other characters will be appended after
	 *                      the end of the link.
	 */
	function makeStubLinkObj( $nt, $text = '', $query = '', $trail = '', $prefix = '' ) {
		wfDeprecated( __METHOD__ );
		return $this->makeColouredLinkObj( $nt, 'stub', $text, $query, $trail, $prefix );
	}

	/**
	 * @deprecated Use link()
	 *
	 * Make a coloured link.
	 *
	 * @param $nt Title object of the target page
	 * @param $colour Integer: colour of the link
	 * @param $text   String:  link text
	 * @param $query  String:  optional query part
	 * @param $trail  String:  optional trail. Alphabetic characters at the start of this string will
	 *                      be included in the link text. Other characters will be appended after
	 *                      the end of the link.
	 */
	function makeColouredLinkObj( $nt, $colour, $text = '', $query = '', $trail = '', $prefix = '' ) {
		if($colour != ''){
			$style = $this->getInternalLinkAttributesObj( $nt, $text, $colour );
		} else $style = '';
		return $this->makeKnownLinkObj( $nt, $text, $query, $trail, $prefix, '', $style );
	}

	/**
	 * Generate either a normal exists-style link or a stub link, depending
	 * on the given page size.
	 *
 	 * @param $size Integer
 	 * @param $nt Title object.
 	 * @param $text String
 	 * @param $query String
 	 * @param $trail String
 	 * @param $prefix String
 	 * @return string HTML of link
	 */
	function makeSizeLinkObj( $size, $nt, $text = '', $query = '', $trail = '', $prefix = '' ) {
		global $wgUser;
		$threshold = intval( $wgUser->getOption( 'stubthreshold' ) );
		$colour = ( $size < $threshold ) ? 'stub' : '';
		return $this->makeColouredLinkObj( $nt, $colour, $text, $query, $trail, $prefix );
	}

	/**
	 * Make appropriate markup for a link to the current article. This is currently rendered
	 * as the bold link text. The calling sequence is the same as the other make*LinkObj functions,
	 * despite $query not being used.
	 */
	function makeSelfLinkObj( $nt, $text = '', $query = '', $trail = '', $prefix = '' ) {
		if ( '' == $text ) {
			$text = htmlspecialchars( $nt->getPrefixedText() );
		}
		list( $inside, $trail ) = Linker::splitTrail( $trail );
		return "<strong class=\"selflink\">{$prefix}{$text}{$inside}</strong>{$trail}";
	}

	function normaliseSpecialPage( Title $title ) {
		if ( $title->getNamespace() == NS_SPECIAL ) {
			list( $name, $subpage ) = SpecialPage::resolveAliasWithSubpage( $title->getDBkey() );
			if ( !$name ) return $title;
			$ret = SpecialPage::getTitleFor( $name, $subpage );
			$ret->mFragment = $title->getFragment();
			return $ret;
		} else {
			return $title;
		}
	}

	/** @todo document */
	function fnamePart( $url ) {
		$basename = strrchr( $url, '/' );
		if ( false === $basename ) {
			$basename = $url;
		} else {
			$basename = substr( $basename, 1 );
		}
		return $basename;
	}

	/** Obsolete alias */
	function makeImage( $url, $alt = '' ) {
		wfDeprecated( __METHOD__ );
		return $this->makeExternalImage( $url, $alt );
	}

	/** @todo document */
	function makeExternalImage( $url, $alt = '' ) {
		global $wgWysiwygParserEnabled;
		//Wysiwyg: get refId from wikitext
		if (!empty($wgWysiwygParserEnabled)) {
			$refId = Wysiwyg_GetRefId($url, true);
		}
		if ( '' == $alt ) {
			$alt = $this->fnamePart( $url );
		}
		$img = '';
		$success = wfRunHooks('LinkerMakeExternalImage', array( &$url, &$alt, &$img ) );
		if(!$success) {
			wfDebug("Hook LinkerMakeExternalImage changed the output of external image with url {$url} and alt text {$alt} to {$img}", true);
			return $img;
		}
		$params = array(
			'src' => $url,
			'alt' => $alt );
		//Wysiwyg: pass refId to image params - it will be used to build HTML
		if ($wgWysiwygParserEnabled) {
			$params['refid'] = $refId;
		}
		return Xml::element( 'img', $params);
	}

	/**
	 * Creates the HTML source for images
	 * @deprecated use makeImageLink2
	 *
	 * @param object $title
	 * @param string $label label text
	 * @param string $alt alt text
	 * @param string $align horizontal alignment: none, left, center, right)
	 * @param array $handlerParams Parameters to be passed to the media handler
	 * @param boolean $framed shows image in original size in a frame
	 * @param boolean $thumb shows image as thumbnail in a frame
	 * @param string $manualthumb image name for the manual thumbnail
	 * @param string $valign vertical alignment: baseline, sub, super, top, text-top, middle, bottom, text-bottom
	 * @param string $time, timestamp of the file, set as false for current
	 * @return string
	 */
	function makeImageLinkObj( $title, $label, $alt, $align = '', $handlerParams = array(), $framed = false,
	  $thumb = false, $manualthumb = '', $valign = '', $time = false )
	{
		$frameParams = array( 'alt' => $alt, 'caption' => $label );
		if ( $align ) {
			$frameParams['align'] = $align;
		}
		if ( $framed ) {
			$frameParams['framed'] = true;
		}
		if ( $thumb ) {
			$frameParams['thumbnail'] = true;
		}
		if ( $manualthumb ) {
			$frameParams['manualthumb'] = $manualthumb;
		}
		if ( $valign ) {
			$frameParams['valign'] = $valign;
		}
		$file = wfFindFile( $title, $time );
		return $this->makeImageLink2( $title, $file, $frameParams, $handlerParams, $time );
	}

	/**
	 * Given parameters derived from [[Image:Foo|options...]], generate the
	 * HTML that that syntax inserts in the page.
	 *
	 * @param Title $title Title object
	 * @param File $file File object, or false if it doesn't exist
	 *
	 * @param array $frameParams Associative array of parameters external to the media handler.
	 *     Boolean parameters are indicated by presence or absence, the value is arbitrary and
	 *     will often be false.
	 *          thumbnail       If present, downscale and frame
	 *          manualthumb     Image name to use as a thumbnail, instead of automatic scaling
	 *          framed          Shows image in original size in a frame
	 *          frameless       Downscale but don't frame
	 *          upright         If present, tweak default sizes for portrait orientation
	 *          upright_factor  Fudge factor for "upright" tweak (default 0.75)
	 *          border          If present, show a border around the image
	 *          align           Horizontal alignment (left, right, center, none)
	 *          valign          Vertical alignment (baseline, sub, super, top, text-top, middle,
	 *                          bottom, text-bottom)
	 *          alt             Alternate text for image (i.e. alt attribute). Plain text.
	 *          caption         HTML for image caption.
	 *          link-url        URL to link to
	 *          link-title      Title object to link to
	 *          no-link         Boolean, suppress description link
	 *
	 * @param array $handlerParams Associative array of media handler parameters, to be passed
	 *       to transform(). Typical keys are "width" and "page".
	 * @param string $time, timestamp of the file, set as false for current
	 * @param string $query, query params for desc url
	 * @return string HTML for an image, with links, wrappers, etc.
	 */
	function makeImageLink2( Title $title, $file, $frameParams = array(), $handlerParams = array(), $time = false, $query = "" ) {
		$res = null;
		if( !wfRunHooks( 'ImageBeforeProduceHTML', array( &$this, &$title,
		&$file, &$frameParams, &$handlerParams, &$time, &$res ) ) ) {
			return $res;
		}

		global $wgContLang, $wgUser, $wgThumbLimits, $wgThumbUpright, $wgWysiwygParserEnabled, $wgWysiwygMetaData;
		//Wysiwyg: add proper URL to file to metadata array when file exists
		if (!empty($wgWysiwygParserEnabled) && isset($frameParams['refid']) && $file) {
			$wgWysiwygMetaData[$frameParams['refid']]['url'] = $file->getFullUrl();
		}
		if ( $file && !$file->allowInlineDisplay() ) {
			wfDebug( __METHOD__.': '.$title->getPrefixedDBkey()." does not allow inline display\n" );
			return $this->link( $title );
		}

		// Shortcuts
		$fp =& $frameParams;
		$hp =& $handlerParams;

		// Clean up parameters
		$page = isset( $hp['page'] ) ? $hp['page'] : false;
		if ( !isset( $fp['align'] ) ) $fp['align'] = '';
		if ( !isset( $fp['alt'] ) ) $fp['alt'] = '';
		# Backward compatibility, title used to always be equal to alt text
		if ( !isset( $fp['title'] ) ) $fp['title'] = $fp['alt'];

		$prefix = $postfix = '';

		if ( 'center' == $fp['align'] ) {
			$prefix  = '<div class="center">';
			$postfix = '</div>';
			$fp['align']   = 'none';
		}
		if ( $file && !isset( $hp['width'] ) ) {
			$hp['width'] = $file->getWidth( $page );

			if( isset( $fp['thumbnail'] ) || isset( $fp['framed'] ) || isset( $fp['frameless'] ) || !$hp['width'] ) {
				$wopt = $wgUser->getOption( 'thumbsize' );

				if( !isset( $wgThumbLimits[$wopt] ) ) {
					 $wopt = User::getDefaultOption( 'thumbsize' );
				}

				// Reduce width for upright images when parameter 'upright' is used
				if ( isset( $fp['upright'] ) && $fp['upright'] == 0 ) {
					$fp['upright'] = $wgThumbUpright;
				}
				// Use width which is smaller: real image width or user preference width
				// For caching health: If width scaled down due to upright parameter, round to full __0 pixel to avoid the creation of a lot of odd thumbs
				$prefWidth = isset( $fp['upright'] ) ?
					round( $wgThumbLimits[$wopt] * $fp['upright'], -1 ) :
					$wgThumbLimits[$wopt];
				if ( $hp['width'] <= 0 || $prefWidth < $hp['width'] ) {
					$hp['width'] = $prefWidth;
				}
			}
		}

		if ( isset( $fp['thumbnail'] ) || isset( $fp['manualthumb'] ) || isset( $fp['framed'] ) ) {
			# Create a thumbnail. Alignment depends on language
			# writing direction, # right aligned for left-to-right-
			# languages ("Western languages"), left-aligned
			# for right-to-left-languages ("Semitic languages")
			#
			# If  thumbnail width has not been provided, it is set
			# to the default user option as specified in Language*.php
			if ( $fp['align'] == '' ) {
				$fp['align'] = $wgContLang->isRTL() ? 'left' : 'right';
			}
			return $prefix.$this->makeThumbLink2( $title, $file, $fp, $hp, $time, $query ).$postfix;
		}

		if ( $file && isset( $fp['frameless'] ) ) {
			$srcWidth = $file->getWidth( $page );
			# For "frameless" option: do not present an image bigger than the source (for bitmap-style images)
			# This is the same behaviour as the "thumb" option does it already.
			if ( $srcWidth && !$file->mustRender() && $hp['width'] > $srcWidth ) {
				$hp['width'] = $srcWidth;
			}
		}

		if ( $file && $hp['width'] ) {
			# Create a resized image, without the additional thumbnail features
			$thumb = $file->transform( $hp );
		} else {
			$thumb = false;
		}

		$refId = '';
		if ( !$thumb ) {
			$txt = '';
			//Wysiwyg: add refId to proper place according to align element (thanks to that refId will be added to the parent HTML element of image snippet)
			if (!empty($wgWysiwygParserEnabled) && isset($fp['refid'])) {
				if ($fp['align'] == '') {
					$txt = "\x1{$fp['refid']}\x1";
				} else {
					$refId = " refid=\"{$fp['refid']}\"";
				}
			}
			$s = $this->makeBrokenImageLinkObj( $title, $txt, '', '', '', $time==true );
		} else {
			$params = array(
				'alt' => $fp['alt'],
				'title' => $fp['title'],
				'valign' => isset( $fp['valign'] ) ? $fp['valign'] : false ,
				'img-class' => isset( $fp['border'] ) ? 'thumbborder' : false );
			if ( !empty( $fp['link-url'] ) ) {
				$params['custom-url-link'] = $fp['link-url'];
			} elseif ( !empty( $fp['link-title'] ) ) {
				$params['custom-title-link'] = $fp['link-title'];
			} elseif ( !empty( $fp['no-link'] ) ) {
				// No link
			} else {
				$params['desc-link'] = true;
				$params['desc-query'] = $query;
			}

			/* Wikia change begin - @author: Marooned, Inez */
			/* Wysiwyg: add refId to proper place according to align element - thanks to that refId will be added to the parent HTML element of image snippet */
			if(!empty($wgWysiwygParserEnabled) && isset($fp['refid'])) {
				if($fp['align'] == '') {
					$params['refid'] = $fp['refid'];
				} else {
					$refId = " refid=\"{$fp['refid']}\"";
				}
			}
			/* Wikia change end */

			$s = $thumb->toHtml( $params );
		}
		if ( '' != $fp['align'] ) {
			$s = "<div$refId class=\"float{$fp['align']}\">{$s}</div>";
		}
		return str_replace("\n", ' ', $prefix.$s.$postfix);
	}

	/**
	 * Make HTML for a thumbnail including image, border and caption
	 * @param Title $title
	 * @param File $file File object or false if it doesn't exist
	 */
	function makeThumbLinkObj( Title $title, $file, $label = '', $alt, $align = 'right', $params = array(), $framed=false , $manualthumb = "" ) {
		$frameParams = array(
			'alt' => $alt,
			'caption' => $label,
			'align' => $align
		);
		if ( $framed ) $frameParams['framed'] = true;
		if ( $manualthumb ) $frameParams['manualthumb'] = $manualthumb;
		return $this->makeThumbLink2( $title, $file, $frameParams, $params );
	}

	function makeThumbLink2( Title $title, $file, $frameParams = array(), $handlerParams = array(), $time = false, $query = "" ) {
		global $wgStylePath, $wgContLang, $wgWysiwygParserEnabled;
		$exists = $file && $file->exists();

		# Shortcuts
		$fp =& $frameParams;
		$hp =& $handlerParams;

		$page = isset( $hp['page'] ) ? $hp['page'] : false;
		if ( !isset( $fp['align'] ) ) $fp['align'] = 'right';
		if ( !isset( $fp['alt'] ) ) $fp['alt'] = '';
		# Backward compatibility, title used to always be equal to alt text
		if ( !isset( $fp['title'] ) ) $fp['title'] = $fp['alt'];
		if ( !isset( $fp['caption'] ) ) $fp['caption'] = '';

		if ( empty( $hp['width'] ) ) {
			// Reduce width for upright images when parameter 'upright' is used
			$hp['width'] = isset( $fp['upright'] ) ? 130 : 180;
		}
		$thumb = false;

		if ( !$exists ) {
			$outerWidth = $hp['width'] + 2;
		} else {
			if ( isset( $fp['manualthumb'] ) ) {
				# Use manually specified thumbnail
				$manual_title = Title::makeTitleSafe( NS_FILE, $fp['manualthumb'] );
				if( $manual_title ) {
					$manual_img = wfFindFile( $manual_title );
					if ( $manual_img ) {
						$thumb = $manual_img->getUnscaledThumb();
					} else {
						$exists = false;
					}
				}
			} elseif ( isset( $fp['framed'] ) ) {
				// Use image dimensions, don't scale
				$thumb = $file->getUnscaledThumb( $page );
			} else {
				# Do not present an image bigger than the source, for bitmap-style images
				# This is a hack to maintain compatibility with arbitrary pre-1.10 behaviour
				$srcWidth = $file->getWidth( $page );
				if ( $srcWidth && !$file->mustRender() && $hp['width'] > $srcWidth ) {
					$hp['width'] = $srcWidth;
				}
				$thumb = $file->transform( $hp );
			}

			if ( $thumb ) {
				$outerWidth = $thumb->getWidth() + 2;
			} else {
				$outerWidth = $hp['width'] + 2;
			}
		}

		if( $page ) {
			$query = $query ? '&page=' . urlencode( $page ) : 'page=' . urlencode( $page );
		}
		$url = $title->getLocalURL( $query );

		$more = htmlspecialchars( wfMsg( 'thumbnail-more' ) );

		$refId = '';
		//Wysiwyg: add refId to HTML is it was passed as an image parameter
		if (!empty($wgWysiwygParserEnabled) && isset($fp['refid'])) {
			$refId = " refid=\"{$fp['refid']}\"";
		}
		$s = "<div$refId class=\"thumb t{$fp['align']}\"><div class=\"thumbinner\" style=\"width:{$outerWidth}px;\">";
		if( !$exists ) {
			$s .= $this->makeBrokenImageLinkObj( $title, '', '', '', '', $time==true );
			$zoomicon = '';
		} elseif ( !$thumb ) {
			$s .= htmlspecialchars( wfMsg( 'thumbnail_error', '' ) );
			$zoomicon = '';
		} else {
			$s .= $thumb->toHtml( array(
				'alt' => $fp['alt'],
				'title' => $fp['title'],
				'img-class' => 'thumbimage',
				'desc-link' => true,
				'desc-query' => $query ) );
			if ( isset( $fp['framed'] ) ) {
				$zoomicon="";
			} else {
				$zoomicon =  '<div class="magnify">'.
					'<a href="'.$url.'" class="internal" title="'.$more.'">'.
					'<img src="'.$wgStylePath.'/common/images/magnify-clip.png" ' .
					'width="15" height="11" alt="" /></a></div>';
			}
		}
		$s .= '  <div class="thumbcaption">'.$zoomicon.$fp['caption']."</div></div></div>";
		return str_replace("\n", ' ', $s);
	}

	/**
	 * Make a "broken" link to an image
	 *
	 * @param Title $title Image title
	 * @param string $text Link label
	 * @param string $query Query string
	 * @param string $trail Link trail
	 * @param string $prefix Link prefix
	 * @param bool $time, a file of a certain timestamp was requested
	 * @return string
	 */
	public function makeBrokenImageLinkObj( $title, $text = '', $query = '', $trail = '', $prefix = '', $time = false ) {
		global $wgEnableUploads, $wgWysiwygParserEnabled;
		if( $title instanceof Title ) {
			wfProfileIn( __METHOD__ );
			$currentExists = $time ? ( wfFindFile( $title ) != false ) : false;
			if( $wgEnableUploads && !$currentExists ) {
				$refId = '';
				//Wysiwyg: get refId from wikitext
				if (!empty($wgWysiwygParserEnabled)) {
					$refId = Wysiwyg_GetRefId($text);
				}
				$upload = SpecialPage::getTitleFor( 'Upload' );
				if( $text == '' )
					$text = htmlspecialchars( $title->getPrefixedText() );
				$redir = RepoGroup::singleton()->getLocalRepo()->checkRedirect( $title );
				if( $redir ) {
					return $this->makeKnownLinkObj( $title, $text, $query, $trail, $prefix );
				}
				$q = 'wpDestFile=' . $title->getPartialUrl();
				if( $query != '' )
					$q .= '&' . $query;
				list( $inside, $trail ) = self::splitTrail( $trail );
				$style = $this->getInternalLinkAttributesObj( $title, $text, 'new' );
				$nofollow = ' rel="nofollow"';
				wfProfileOut( __METHOD__ );
				return '<a href="' . $upload->escapeLocalUrl( $q ) . '"'
					. $style . $refId . $nofollow . '>' . $prefix . $text . $inside . '</a>' . $trail;
			} else {
				wfProfileOut( __METHOD__ );
				return $this->makeKnownLinkObj( $title, $text, $query, $trail, $prefix );
			}
		} else {
			return "<!-- ERROR -->{$prefix}{$text}{$trail}";
		}
	}

	/** @deprecated use Linker::makeMediaLinkObj() */
	function makeMediaLink( $name, $unused = '', $text = '', $time = false ) {
		$nt = Title::makeTitleSafe( NS_FILE, $name );
		return $this->makeMediaLinkObj( $nt, $text, $time );
	}

	/**
	 * Create a direct link to a given uploaded file.
	 *
	 * @param $title Title object.
	 * @param $text String: pre-sanitized HTML
	 * @param $time string: time image was created
	 * @return string HTML
	 *
	 * @public
	 * @todo Handle invalid or missing images better.
	 */
	function makeMediaLinkObj( $title, $text = '', $time = false ) {
		global $wgWysiwygParserEnabled;
		$refId = '';
		//Wysiwyg: get refId from wikitext
		if (!empty($wgWysiwygParserEnabled)) {
			$refId = Wysiwyg_GetRefId($text);
		}
		if( is_null( $title ) ) {
			### HOTFIX. Instead of breaking, return empty string.
			return $text;
		} else {
			$img  = wfFindFile( $title, $time );
			if( $img ) {
				$url  = $img->getURL();
				$class = 'internal';
				$nofollow = '';
			} else {
				$upload = SpecialPage::getTitleFor( 'Upload' );
				$url = $upload->getLocalUrl( 'wpDestFile=' . urlencode( $title->getDBkey() ) );
				$class = 'new';
				$nofollow = ' rel="nofollow"';
			}
			$alt = htmlspecialchars( $title->getText() );
			if( $text == '' ) {
				$text = $alt;
			}
			$u = htmlspecialchars( $url );
			return "<a href=\"{$u}\" class=\"$class\" title=\"{$alt}\"{$refId}{$nofollow}>{$text}</a>";
		}
	}

	/** @todo document */
	function specialLink( $name, $key = '' ) {
		global $wgContLang;

		if ( '' == $key ) { $key = strtolower( $name ); }
		$pn = $wgContLang->ucfirst( $name );
		return $this->makeKnownLink( $wgContLang->specialPage( $pn ),
		  wfMsg( $key ) );
	}

	/** @todo document */
	function makeExternalLink( $url, $text, $escape = true, $linktype = '', $attribs = array() ) {
		$attribsText = $this->getExternalLinkAttributes( $url, $text, 'external ' . $linktype );
		if ( $attribs ) {
			$attribsText .= Xml::expandAttributes( $attribs );
		}
		$url = htmlspecialchars( $url );
		if( $escape ) {
			$text = htmlspecialchars( $text );
		}
		$link = '';
		$success = wfRunHooks('LinkerMakeExternalLink', array( &$url, &$text, &$link ) );
		if(!$success) {
			wfDebug("Hook LinkerMakeExternalLink changed the output of link with url {$url} and text {$text} to {$link}", true);
			return $link;
		}

		/* Wikia change begin - @author: Marooned, Inez Korczyński */
		/* Wysiwyg: get refId from wikitext and add it to HTML */
		global $wgWysiwygParserEnabled;
		if(!empty($wgWysiwygParserEnabled)) {
			$attribsText .= Wysiwyg_GetRefId($text);
		}
		/* Wikia change end */

		return '<a href="'.$url.'"'.$attribsText.'>'.$text.'</a>';
	}

	/**
	 * Make user link (or user contributions for unregistered users)
	 * @param $userId   Integer: user id in database.
	 * @param $userText String: user name in database
	 * @return string HTML fragment
	 * @private
	 */
	function userLink( $userId, $userText ) {
		if( $userId == 0 ) {
			$page = SpecialPage::getTitleFor( 'Contributions', $userText );
		} else {
			$page = Title::makeTitle( NS_USER, $userText );
		}
		return $this->link( $page, htmlspecialchars( $userText ), array( 'class' => 'mw-userlink' ) );
	}

	/**
	 * Generate standard user tool links (talk, contributions, block link, etc.)
	 *
	 * @param int $userId User identifier
	 * @param string $userText User name or IP address
	 * @param bool $redContribsWhenNoEdits Should the contributions link be red if the user has no edits?
	 * @param int $flags Customisation flags (e.g. self::TOOL_LINKS_NOBLOCK)
	 * @param int $edits, user edit count (optional, for performance)
	 * @return string
	 */
	public function userToolLinks( $userId, $userText, $redContribsWhenNoEdits = false, $flags = 0, $edits=null ) {
		global $wgUser, $wgDisableAnonTalk, $wgSysopUserBans;
		$talkable = !( $wgDisableAnonTalk && 0 == $userId );
		$blockable = ( $wgSysopUserBans || 0 == $userId ) && !$flags & self::TOOL_LINKS_NOBLOCK;

		$items = array();
		if( $talkable ) {
			$items[] = $this->userTalkLink( $userId, $userText );
		}
		if( $userId ) {
			// check if the user has an edit
			$attribs = array();
			if( $redContribsWhenNoEdits ) {
				$count = !is_null($edits) ? $edits : User::edits( $userId );
				if( $count == 0 ) {
					$attribs['class'] = 'new';
				}
			}
			$contribsPage = SpecialPage::getTitleFor( 'Contributions', $userText );

			$items[] = $this->link( $contribsPage, wfMsgHtml( 'contribslink' ), $attribs );
		}
		if( $blockable && $wgUser->isAllowed( 'block' ) ) {
			$items[] = $this->blockLink( $userId, $userText );
		}

		if( $items ) {
			return ' <span class="mw-usertoollinks">(' . implode( ' | ', $items ) . ')</span>';
		} else {
			return '';
		}
	}

	/**
	 * Alias for userToolLinks( $userId, $userText, true );
	 * @param int $userId User identifier
	 * @param string $userText User name or IP address
	 * @param int $edits, user edit count (optional, for performance)
	 */
	public function userToolLinksRedContribs( $userId, $userText, $edits=null ) {
		return $this->userToolLinks( $userId, $userText, true, 0, $edits );
	}


	/**
	 * @param $userId Integer: user id in database.
	 * @param $userText String: user name in database.
	 * @return string HTML fragment with user talk link
	 * @private
	 */
	function userTalkLink( $userId, $userText ) {
		$userTalkPage = Title::makeTitle( NS_USER_TALK, $userText );
		$userTalkLink = $this->link( $userTalkPage, wfMsgHtml( 'talkpagelinktext' ) );
		return $userTalkLink;
	}

	/**
	 * @param $userId Integer: userid
	 * @param $userText String: user name in database.
	 * @return string HTML fragment with block link
	 * @private
	 */
	function blockLink( $userId, $userText ) {
		$blockPage = SpecialPage::getTitleFor( 'Blockip', $userText );
		$blockLink = $this->link( $blockPage, wfMsgHtml( 'blocklink' ) );
		return $blockLink;
	}

	/**
	 * Generate a user link if the current user is allowed to view it
	 * @param $rev Revision object.
	 * @param $isPublic, bool, show only if all users can see it
	 * @return string HTML
	 */
	function revUserLink( $rev, $isPublic = false ) {
		if( $rev->isDeleted( Revision::DELETED_USER ) && $isPublic ) {
			$link = wfMsgHtml( 'rev-deleted-user' );
		} else if( $rev->userCan( Revision::DELETED_USER ) ) {
			$link = $this->userLink( $rev->getUser( Revision::FOR_THIS_USER ),
				$rev->getUserText( Revision::FOR_THIS_USER ) );
		} else {
			$link = wfMsgHtml( 'rev-deleted-user' );
		}
		if( $rev->isDeleted( Revision::DELETED_USER ) ) {
			return '<span class="history-deleted">' . $link . '</span>';
		}
		return $link;
	}

	/**
	 * Generate a user tool link cluster if the current user is allowed to view it
	 * @param $rev Revision object.
	 * @param $isPublic, bool, show only if all users can see it
	 * @return string HTML
	 */
	function revUserTools( $rev, $isPublic = false ) {
		if( $rev->isDeleted( Revision::DELETED_USER ) && $isPublic ) {
			$link = wfMsgHtml( 'rev-deleted-user' );
		} else if( $rev->userCan( Revision::DELETED_USER ) ) {
			$userId = $rev->getUser( Revision::FOR_THIS_USER );
			$userText = $rev->getUserText( Revision::FOR_THIS_USER );
			$link = $this->userLink( $userId, $userText ) .
				' ' . $this->userToolLinks( $userId, $userText );
		} else {
			$link = wfMsgHtml( 'rev-deleted-user' );
		}
		if( $rev->isDeleted( Revision::DELETED_USER ) ) {
			return ' <span class="history-deleted">' . $link . '</span>';
		}
		return $link;
	}

	/**
	 * This function is called by all recent changes variants, by the page history,
	 * and by the user contributions list. It is responsible for formatting edit
	 * comments. It escapes any HTML in the comment, but adds some CSS to format
	 * auto-generated comments (from section editing) and formats [[wikilinks]].
	 *
	 * @author Erik Moeller <moeller@scireview.de>
	 *
	 * Note: there's not always a title to pass to this function.
	 * Since you can't set a default parameter for a reference, I've turned it
	 * temporarily to a value pass. Should be adjusted further. --brion
	 *
	 * @param string $comment
	 * @param mixed $title Title object (to generate link to the section in autocomment) or null
	 * @param bool $local Whether section links should refer to local page
	 */
	function formatComment($comment, $title = NULL, $local = false) {
		wfProfileIn( __METHOD__ );

		# Sanitize text a bit:
		$comment = str_replace( "\n", " ", $comment );
		# Allow HTML entities (for bug 13815)
		$comment = Sanitizer::escapeHtmlAllowEntities( $comment );

		# Render autocomments and make links:
		$comment = $this->formatAutoComments( $comment, $title, $local );
		$comment = $this->formatLinksInComment( $comment );

		wfProfileOut( __METHOD__ );
		return $comment;
	}

	/**
	 * The pattern for autogen comments is / * foo * /, which makes for
	 * some nasty regex.
	 * We look for all comments, match any text before and after the comment,
	 * add a separator where needed and format the comment itself with CSS
	 * Called by Linker::formatComment.
	 *
	 * @param string $comment Comment text
	 * @param object $title An optional title object used to links to sections
	 * @return string $comment formatted comment
	 *
	 * @todo Document the $local parameter.
	 */
	private function formatAutocomments( $comment, $title = null, $local = false ) {
		// Bah!
		$this->autocommentTitle = $title;
		$this->autocommentLocal = $local;
		$comment = preg_replace_callback(
			'!(.*)/\*\s*(.*?)\s*\*/(.*)!',
			array( $this, 'formatAutocommentsCallback' ),
			$comment );
		unset( $this->autocommentTitle );
		unset( $this->autocommentLocal );
		return $comment;
	}

	private function formatAutocommentsCallback( $match ) {
		$title = $this->autocommentTitle;
		$local = $this->autocommentLocal;

		$pre=$match[1];
		$auto=$match[2];
		$post=$match[3];
		$link='';
		if( $title ) {
			$section = $auto;

			# Generate a valid anchor name from the section title.
			# Hackish, but should generally work - we strip wiki
			# syntax, including the magic [[: that is used to
			# "link rather than show" in case of images and
			# interlanguage links.
			$section = str_replace( '[[:', '', $section );
			$section = str_replace( '[[', '', $section );
			$section = str_replace( ']]', '', $section );
			if ( $local ) {
				$sectionTitle = Title::newFromText( '#' . $section );
			} else {
				$sectionTitle = Title::makeTitleSafe( $title->getNamespace(),
					$title->getDBkey(), $section );
			}
			if ( $sectionTitle ) {
				$link = $this->link( $sectionTitle,
					wfMsgForContent( 'sectionlink' ), array(), array(),
					'noclasses' );
			} else {
				$link = '';
			}
		}
		$auto = "$link$auto";
		if( $pre ) {
			# written summary $presep autocomment (summary /* section */)
			$auto = wfMsgExt( 'autocomment-prefix', array( 'escapenoentities', 'content' ) ) . $auto;
		}
		if( $post ) {
			# autocomment $postsep written summary (/* section */ summary)
			$auto .= wfMsgExt( 'colon-separator', array( 'escapenoentities', 'content' ) );
		}
		$auto = '<span class="autocomment">' . $auto . '</span>';
		$comment = $pre . $auto . $post;
		return $comment;
	}

	/**
	 * Formats wiki links and media links in text; all other wiki formatting
	 * is ignored
	 *
	 * @fixme doesn't handle sub-links as in image thumb texts like the main parser
	 * @param string $comment Text to format links in
	 * @return string
	 */
	public function formatLinksInComment( $comment ) {
		return preg_replace_callback(
			'/\[\[:?(.*?)(\|(.*?))*\]\]([^[]*)/',
			array( $this, 'formatLinksInCommentCallback' ),
			$comment );
	}

	protected function formatLinksInCommentCallback( $match ) {
		global $wgContLang;

		$medians = '(?:' . preg_quote( MWNamespace::getCanonicalName( NS_MEDIA ), '/' ) . '|';
		$medians .= preg_quote( $wgContLang->getNsText( NS_MEDIA ), '/' ) . '):';

		$comment = $match[0];

		# fix up urlencoded title texts (copied from Parser::replaceInternalLinks)
		if( strpos( $match[1], '%' ) !== false ) {
			$match[1] = str_replace( array('<', '>'), array('&lt;', '&gt;'), urldecode($match[1]) );
		}

		# Handle link renaming [[foo|text]] will show link as "text"
		if( "" != $match[3] ) {
			$text = $match[3];
		} else {
			$text = $match[1];
		}
		$submatch = array();
		if( preg_match( '/^' . $medians . '(.*)$/i', $match[1], $submatch ) ) {
			# Media link; trail not supported.
			$linkRegexp = '/\[\[(.*?)\]\]/';
			$thelink = $this->makeMediaLink( $submatch[1], "", $text );
		} else {
			# Other kind of link
			if( preg_match( $wgContLang->linkTrail(), $match[4], $submatch ) ) {
				$trail = $submatch[1];
			} else {
				$trail = "";
			}
			$linkRegexp = '/\[\[(.*?)\]\]' . preg_quote( $trail, '/' ) . '/';
			if (isset($match[1][0]) && $match[1][0] == ':')
				$match[1] = substr($match[1], 1);
			$thelink = $this->makeLink( $match[1], $text, "", $trail );
		}
		$comment = preg_replace( $linkRegexp, StringUtils::escapeRegexReplacement( $thelink ), $comment, 1 );

		return $comment;
	}

	/**
	 * Wrap a comment in standard punctuation and formatting if
	 * it's non-empty, otherwise return empty string.
	 *
	 * @param string $comment
	 * @param mixed $title Title object (to generate link to section in autocomment) or null
	 * @param bool $local Whether section links should refer to local page
	 *
	 * @return string
	 */
	function commentBlock( $comment, $title = NULL, $local = false ) {
		// '*' used to be the comment inserted by the software way back
		// in antiquity in case none was provided, here for backwards
		// compatability, acc. to brion -ævar
		if( $comment == '' || $comment == '*' ) {
			return '';
		} else {
			$formatted = $this->formatComment( $comment, $title, $local );
			return " <span class=\"comment\">($formatted)</span>";
		}
	}

	/**
	 * Wrap and format the given revision's comment block, if the current
	 * user is allowed to view it.
	 *
	 * @param Revision $rev
	 * @param bool $local Whether section links should refer to local page
	 * @param $isPublic, show only if all users can see it
	 * @return string HTML
	 */
	function revComment( Revision $rev, $local = false, $isPublic = false ) {
		if( $rev->isDeleted( Revision::DELETED_COMMENT ) && $isPublic ) {
			$block = " <span class=\"comment\">" . wfMsgHtml( 'rev-deleted-comment' ) . "</span>";
		} else if( $rev->userCan( Revision::DELETED_COMMENT ) ) {
			$block = $this->commentBlock( $rev->getComment( Revision::FOR_THIS_USER ),
				$rev->getTitle(), $local );
		} else {
			$block = " <span class=\"comment\">" . wfMsgHtml( 'rev-deleted-comment' ) . "</span>";
		}
		if( $rev->isDeleted( Revision::DELETED_COMMENT ) ) {
			return " <span class=\"history-deleted\">$block</span>";
		}
		return $block;
	}

	public function formatRevisionSize( $size ) {
		if ( $size == 0 ) {
			$stxt = wfMsgExt( 'historyempty', 'parsemag' );
		} else {
			global $wgLang;
			$stxt = wfMsgExt( 'nbytes', 'parsemag', $wgLang->formatNum( $size ) );
			$stxt = "($stxt)";
		}
		$stxt = htmlspecialchars( $stxt );
		return "<span class=\"history-size\">$stxt</span>";
	}

	/** @todo document */
	function tocIndent() {
		return "\n<ul>";
	}

	/** @todo document */
	function tocUnindent($level) {
		return "</li>\n" . str_repeat( "</ul>\n</li>\n", $level>0 ? $level : 0 );
	}

	/**
	 * parameter level defines if we are on an indentation level
	 */
	function tocLine( $anchor, $tocline, $tocnumber, $level ) {
		return "\n<li class=\"toclevel-$level\"><a href=\"#" .
			$anchor . '"><span class="tocnumber">' .
			$tocnumber . '</span> <span class="toctext">' .
			$tocline . '</span></a>';
	}

	/** @todo document */
	function tocLineEnd() {
		return "</li>\n";
 	}

	/** @todo document */
	function tocList($toc) {
		global $wgJsMimeType;
		$title = wfMsgHtml('toc') ;
		return
		   '<table id="toc" class="toc" summary="' . $title .'"><tr><td>'
		 . '<div id="toctitle"><h2>' . $title . "</h2></div>\n"
		 . $toc
		 # no trailing newline, script should not be wrapped in a
		 # paragraph
		 . "</ul>\n</td></tr></table>"
		 . '<script type="' . $wgJsMimeType . '">'
		/* Wikia change begin - @author: macbre */
		/* Fixes for #2643 and #3730 */
		 . 'if (!window.onloadFuncts) var onloadFuncts = [];'
		 . 'onloadFuncts[onloadFuncts.length] = function() {'
		 . ' if (window.showTocToggle) {'
		 . '  window.tocShowText = "' . Xml::escapeJsString( wfMsg('showtoc') ) . '";'
		 . '  window.tocHideText = "' . Xml::escapeJsString( wfMsg('hidetoc') ) . '";'
		 . '  showTocToggle();'
		 . '}};'
		/* Wikia change end */
		 . "</script>\n";
	}

	/**
	 * Used to generate section edit links that point to "other" pages
	 * (sections that are really part of included pages).
	 *
	 * @param $title Title string.
	 * @param $section Integer: section number.
	 */
	public function editSectionLinkForOther( $title, $section ) {
		wfDeprecated( __METHOD__ );
		$title = Title::newFromText( $title );
		return $this->doEditSectionLink( $title, $section );
	}

	/**
	 * @param $nt Title object.
	 * @param $section Integer: section number.
	 * @param $hint Link String: title, or default if omitted or empty
	 */
	public function editSectionLink( Title $nt, $section, $hint = '' ) {
		wfDeprecated( __METHOD__ );
		if( $hint === '' ) {
			# No way to pass an actual empty $hint here!  The new interface al-
			# lows this, so we have to do this for compatibility.
			$hint = null;
		}
		return $this->doEditSectionLink( $nt, $section, $hint );
	}

	/**
	 * Create a section edit link.  This supersedes editSectionLink() and
	 * editSectionLinkForOther().
	 *
	 * @param $nt      Title  The title being linked to (may not be the same as
	 *   $wgTitle, if the section is included from a template)
	 * @param $section string The designation of the section being pointed to,
	 *   to be included in the link, like "&section=$section"
	 * @param $tooltip string The tooltip to use for the link: will be escaped
	 *   and wrapped in the 'editsectionhint' message
	 * @return         string HTML to use for edit link
	 */
	public function doEditSectionLink( Title $nt, $section, $tooltip = null ) {
		/* Wikia change begin - @author: uknkown */
		/* Ad rel="nofollow" attribute to edit section links */
		$attribs = array('rel' => 'nofollow');
		/* Wikia change end */
		if( !is_null( $tooltip ) ) {
			$attribs['title'] = wfMsg( 'editsectionhint', $tooltip );
		}
		$link = $this->link( $nt, wfMsg('editsection'),
			$attribs,
			array( 'action' => 'edit', 'section' => $section ),
			array( 'noclasses', 'known' )
		);

		# Run the old hook.  This takes up half of the function . . . hopefully
		# we can rid of it someday.
		$attribs = '';
		if( $tooltip ) {
			$attribs = wfMsgHtml( 'editsectionhint', htmlspecialchars( $tooltip ) );
			$attribs = " title=\"$attribs\"";
		}
		$result = null;
		wfRunHooks( 'EditSectionLink', array( &$this, $nt, $section, $attribs, $link, &$result ) );
		if( !is_null( $result ) ) {
			# For reverse compatibility, add the brackets *after* the hook is
			# run, and even add them to hook-provided text.  (This is the main
			# reason that the EditSectionLink hook is deprecated in favor of
			# DoEditSectionLink: it can't change the brackets or the span.)
			$result = wfMsgHtml( 'editsection-brackets', $result );
			return "<span class=\"editsection\">$result</span>";
		}

		# Add the brackets and the span, and *then* run the nice new hook, with
		# clean and non-redundant arguments.
		$result = wfMsgHtml( 'editsection-brackets', $link );
		$result = "<span class=\"editsection\">$result</span>";

		wfRunHooks( 'DoEditSectionLink', array( $this, $nt, $section, $tooltip, &$result ) );
		return $result;
	}

	/**
	 * Create a headline for content
	 *
	 * @param int    $level   The level of the headline (1-6)
	 * @param string $attribs Any attributes for the headline, starting with a space and ending with '>'
	 *                        This *must* be at least '>' for no attribs
	 * @param string $anchor  The anchor to give the headline (the bit after the #)
	 * @param string $text    The text of the header
	 * @param string $link    HTML to add for the section edit link
	 * @param mixed  $legacyAnchor A second, optional anchor to give for
	 *   backward compatibility (false to omit)
	 *
	 * @return string HTML headline
	 */
	public function makeHeadline( $level, $attribs, $anchor, $text, $link, $legacyAnchor = false ) {
		$ret = "<a name=\"$anchor\" id=\"$anchor\"></a>"
			. "<h$level$attribs"
			. $link
			. " <span class=\"mw-headline\">$text</span>"
			. "</h$level>";
		if ( $legacyAnchor !== false ) {
			$ret = "<a name=\"$legacyAnchor\" id=\"$legacyAnchor\"></a>$ret";
		}
		return $ret;
	}

	/**
	 * Split a link trail, return the "inside" portion and the remainder of the trail
	 * as a two-element array
	 *
	 * @static
	 */
	static function splitTrail( $trail ) {
		static $regex = false;
		if ( $regex === false ) {
			global $wgContLang;
			$regex = $wgContLang->linkTrail();
		}
		$inside = '';
		if ( '' != $trail ) {
			$m = array();
			if ( preg_match( $regex, $trail, $m ) ) {
				$inside = $m[1];
				$trail = $m[2];
			}
		}
		return array( $inside, $trail );
	}

	/**
	 * Generate a rollback link for a given revision.  Currently it's the
	 * caller's responsibility to ensure that the revision is the top one. If
	 * it's not, of course, the user will get an error message.
	 *
	 * If the calling page is called with the parameter &bot=1, all rollback
	 * links also get that parameter. It causes the edit itself and the rollback
	 * to be marked as "bot" edits. Bot edits are hidden by default from recent
	 * changes, so this allows sysops to combat a busy vandal without bothering
	 * other users.
	 *
	 * @param Revision $rev
	 */
	function generateRollback( $rev ) {
		return '<span class="mw-rollback-link">['
			. $this->buildRollbackLink( $rev )
			. ']</span>';
	}

	/**
	 * Build a raw rollback link, useful for collections of "tool" links
	 *
	 * @param Revision $rev
	 * @return string
	 */
	public function buildRollbackLink( $rev ) {
		global $wgRequest, $wgUser;
		$title = $rev->getTitle();
		$query = array(
			'action' => 'rollback',
			'from' => $rev->getUserText()
		);
		if( $wgRequest->getBool( 'bot' ) ) {
			$query['bot'] = '1';
			$query['hidediff'] = '1'; // bug 15999
		}
		$query['token'] = $wgUser->editToken( array( $title->getPrefixedText(),
			$rev->getUserText() ) );
		return $this->link( $title, wfMsgHtml( 'rollbacklink' ),
			array( 'title' => wfMsg( 'tooltip-rollback' ) ),
			$query,	array( 'known', 'noclasses' ) );
	}

	/**
	 * Returns HTML for the "templates used on this page" list.
	 *
	 * @param array $templates Array of templates from Article::getUsedTemplate
	 * or similar
	 * @param bool $preview Whether this is for a preview
	 * @param bool $section Whether this is for a section edit
	 * @return string HTML output
	 */
	public function formatTemplates( $templates, $preview = false, $section = false ) {
		wfProfileIn( __METHOD__ );

		$outText = '';
		if ( count( $templates ) > 0 ) {
			# Do a batch existence check
			$batch = new LinkBatch;
			foreach( $templates as $title ) {
				$batch->addObj( $title );
			}
			$batch->execute();

			# Construct the HTML
			$outText = '<div class="mw-templatesUsedExplanation">';
			if ( $preview ) {
				$outText .= wfMsgExt( 'templatesusedpreview', array( 'parse' ) );
			} elseif ( $section ) {
				$outText .= wfMsgExt( 'templatesusedsection', array( 'parse' ) );
			} else {
				$outText .= wfMsgExt( 'templatesused', array( 'parse' ) );
			}
			$outText .= "</div><ul>\n";

			usort( $templates, array( 'Title', 'compare' ) );
			foreach ( $templates as $titleObj ) {
				$r = $titleObj->getRestrictions( 'edit' );
				if ( in_array( 'sysop', $r ) ) {
					$protected = wfMsgExt( 'template-protected', array( 'parseinline' ) );
				} elseif ( in_array( 'autoconfirmed', $r ) ) {
					$protected = wfMsgExt( 'template-semiprotected', array( 'parseinline' ) );
				} else {
					$protected = '';
				}
				if( $titleObj->quickUserCan( 'edit' ) ) {
					$editLink = $this->makeLinkObj( $titleObj, wfMsg('editlink'), 'action=edit' );
				} else {
					$editLink = $this->makeLinkObj( $titleObj, wfMsg('viewsourcelink'), 'action=edit' );
				}
				$outText .= '<li>' . $this->link( $titleObj ) . ' (' . $editLink . ') ' . $protected . '</li>';
			}
			$outText .= '</ul>';
		}
		wfProfileOut( __METHOD__  );
		return $outText;
	}

	/**
	 * Returns HTML for the "hidden categories on this page" list.
	 *
	 * @param array $hiddencats Array of hidden categories from Article::getHiddenCategories
	 * or similar
	 * @return string HTML output
	 */
	public function formatHiddenCategories( $hiddencats ) {
		global $wgLang;
		wfProfileIn( __METHOD__ );

		$outText = '';
		if ( count( $hiddencats ) > 0 ) {
			# Construct the HTML
			$outText = '<div class="mw-hiddenCategoriesExplanation">';
			$outText .= wfMsgExt( 'hiddencategories', array( 'parse' ), $wgLang->formatnum( count( $hiddencats ) ) );
			$outText .= "</div><ul>\n";

			foreach ( $hiddencats as $titleObj ) {
				$outText .= '<li>' . $this->link( $titleObj, null, array(), array(), 'known' ) . "</li>\n"; # If it's hidden, it must exist - no need to check with a LinkBatch
			}
			$outText .= '</ul>';
		}
		wfProfileOut( __METHOD__  );
		return $outText;
	}

	/**
	 * Format a size in bytes for output, using an appropriate
	 * unit (B, KB, MB or GB) according to the magnitude in question
	 *
	 * @param $size Size to format
	 * @return string
	 */
	public function formatSize( $size ) {
		global $wgLang;
		return htmlspecialchars( $wgLang->formatSize( $size ) );
	}

	/**
	 * @deprecated Returns raw bits of HTML, use titleAttrib() and accesskey()
	 */
	public function tooltipAndAccesskey( $name ) {
		# FIXME: If Sanitizer::expandAttributes() treated "false" as "output
		# no attribute" instead of "output '' as value for attribute", this
		# would be three lines.
		$attribs = array(
			'title' => $this->titleAttrib( $name, 'withaccess' ),
			'accesskey' => $this->accesskey( $name )
		);
		if ( $attribs['title'] === false ) {
			unset( $attribs['title'] );
		}
		if ( $attribs['accesskey'] === false ) {
			unset( $attribs['accesskey'] );
		}
		return Xml::expandAttributes( $attribs );
	}

	/** @deprecated Returns raw bits of HTML, use titleAttrib() */
	public function tooltip( $name, $options = null ) {
		# FIXME: If Sanitizer::expandAttributes() treated "false" as "output
		# no attribute" instead of "output '' as value for attribute", this
		# would be two lines.
		$tooltip = $this->titleAttrib( $name, $options );
		if ( $tooltip === false ) {
			return '';
		}
		return Xml::expandAttributes( array(
			'title' => $this->titleAttrib( $name, $options )
		) );
	}

	/**
	 * Given the id of an interface element, constructs the appropriate title
	 * attribute from the system messages.  (Note, this is usually the id but
	 * isn't always, because sometimes the accesskey needs to go on a different
	 * element than the id, for reverse-compatibility, etc.)
	 *
	 * @param string $name    Id of the element, minus prefixes.
	 * @param mixed  $options null or the string 'withaccess' to add an access-
	 *   key hint
	 * @return string Contents of the title attribute (which you must HTML-
	 *   escape), or false for no title attribute
	 */
	public function titleAttrib( $name, $options = null ) {
		wfProfileIn( __METHOD__ );

		$tooltip = wfMsg( "tooltip-$name" );
		# Compatibility: formerly some tooltips had [alt-.] hardcoded
		$tooltip = preg_replace( "/ ?\[alt-.\]$/", '', $tooltip );

		# Message equal to '-' means suppress it.
		if ( wfEmptyMsg( "tooltip-$name", $tooltip ) || $tooltip == '-' ) {
			$tooltip = false;
		}

		if ( $options == 'withaccess' ) {
			$accesskey = $this->accesskey( $name );
			if( $accesskey !== false ) {
				if ( $tooltip === false || $tooltip === '' ) {
					$tooltip = "[$accesskey]";
				} else {
					$tooltip .= " [$accesskey]";
				}
			}
		}

		wfProfileOut( __METHOD__ );
		return $tooltip;
	}

	/**
	 * Given the id of an interface element, constructs the appropriate
	 * accesskey attribute from the system messages.  (Note, this is usually
	 * the id but isn't always, because sometimes the accesskey needs to go on
	 * a different element than the id, for reverse-compatibility, etc.)
	 *
	 * @param string $name    Id of the element, minus prefixes.
	 * @return string Contents of the accesskey attribute (which you must HTML-
	 *   escape), or false for no accesskey attribute
	 */
	public function accesskey( $name ) {
		wfProfileIn( __METHOD__ );

		$accesskey = wfMsg( "accesskey-$name" );

		# FIXME: Per standard MW behavior, a value of '-' means to suppress the
		# attribute, but this is broken for accesskey: that might be a useful
		# value.
		if( $accesskey != ''
		&& $accesskey != '-'
		&& !wfEmptyMsg( "accesskey-$name", $accesskey ) ) {
			wfProfileOut( __METHOD__ );
			return $accesskey;
		}

		wfProfileOut( __METHOD__ );
		return false;
	}
}
