<?php
/**
 * User: zhuyajie
 * Date: 13-7-16
 * Time: 下午9:26
 */
error_reporting( 0 );
$string =<<<MD
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="../gdb/images/archer-fish.ico" />
<meta name="keywords" content="gdb" />

<title>GDB: The GNU Project Debugger</title>

</head>

<body bgcolor="#FFFFFF" text="#000000" link="#1F00FF" alink="#FF0000"
vlink="#9900DD">

<a href="../gdb/mascot/"> <img border="0"
src="../gdb/images/archer.jpg" align="right" alt="[image of Archer
Fish]" /></a>

<center><h1>GDB: The GNU Project Debugger</h1></center>

<center>
<small>
[<a href="../gdb/bugs/">bugs</a>]
[<a href="../gdb/committee/">GDB Maintainers</a>]
[<a href="../gdb/contribute/">contributing</a>]
[<a href="../gdb/current/">current cvs</a>]
[<a href="../gdb/documentation/">documentation</a>]
[<a href="../gdb/download/">download</a>]
[<a href="../gdb/">home</a>]
[<a href="../gdb/irc/">irc</a>]
[<a href="../gdb/links/">links</a>]
[<a href="../gdb/mailing-lists/">mailing lists</a>]
[<a href="../gdb/news/">news</a>]
[<a href="../gdb/schedule/">schedule</a>]
[<a href="../gdb/song/">song</a>]
[<a href="http://sourceware.org/gdb/wiki/">wiki</a>]
</small>
</center>

<center><h2>GDB: The GNU Project Debugger</h2></center>

<!-- NB: CURRENT / LATEST refer to the trunk -->
<!-- NB: MOST RECENT refers to the branch -->

<!-- body, update above using ../gdb/index.sh -->

<h3>What is GDB?</h3>

<p>GDB, the GNU Project debugger, allows you to see what is going on
`inside' another program while it executes -- or what another program
was doing at the moment it crashed.

<p>GDB can do four main kinds of things (plus other things in support
of these) to help you catch bugs in the act:

<ul>
<li>Start your program, specifying anything that might affect its behavior.
<li>Make your program stop on specified conditions.
<li>Examine what has happened, when your program has stopped.
<li>Change things in your program, so you can experiment with
correcting the effects of one bug and go on to learn about another.
</ul>

The program being debugged can be written in Ada, C, C++, Objective-C,
Pascal (and many other languages).  Those programs might be executing
on the same machine as GDB (native) or on another machine (remote).  GDB
can run on most popular UNIX and Microsoft Windows variants.<p>

<h3>GDB version 7.6</h3>

Version <a href="../gdb/download/ANNOUNCEMENT">7.6</a> of GDB, the GNU
Debugger, is now available for <a
href="../gdb/download/">download</a>.  See the <a
href="../gdb/download/ANNOUNCEMENT">ANNOUNCEMENT</a> for details
including changes in this release.<p>

An errata list (<a
href="http://sourceware.org/cgi-bin/cvsweb.cgi/~checkout~/src/gdb/PROBLEMS?content-type=text/x-cvsweb-markup&cvsroot=src"
>PROBLEMS</a>) and <a
href="http://sourceware.org/gdb/download/onlinedocs/">documentation</a>
are also available.<p>

<h3><a href="http://www.gnu.org/philosophy/sco/sco.html">FSF's Position regarding SCO's attacks on Free Software</a></h3>

<h3>News</a></h3>

<dl>

<!-- PLEASE ADD ARTICLES TO BOTH news/index.html and index.html

<dt>Month DD, YYYY: <b>Announcement</b></dt>
<dd>
<p> The message about the announcement goes here and can spread across
several lines.  Each is proceeded by a P to make the indentation
better.
</p>
</dd>

-->

<dt>April 26th, 2013: <b>GDB 7.6 Released!</b></dt>
<dd>
<p> The latest version of GDB, version 7.6, is available for <a
href="../gdb/download/">download</a>.
<p>
Changes in this release include:
<ul>
<li> New native configurations (ARM AArch64 GNU/Linux, FreeBSD/powerpc,
     86_64/Cygwin and Tilera TILE-Gx GNU/Linux)
<li> New target configurations (ARM AArch64, ARM AArch64 GNU/Linux,
     Lynx 178 PowerPC, x86_64/Cygwin, and Tilera TILE-Gx GNU/Linux)
<li> Support for the "mini debuginfo" section, .gnu_debugdata
<li> The C++ ABI now defaults to the GNU v3 ABI
<li> More Python scripting improvements
<li> Some GDB/MI improvements
<li> New configure options, new commands, and options
<li> New remote packets
<li> A new "target record-btrace" has been added while the "target record"
     command has been renamed to "target record-full"
</ul>

See the NEWS file for a more complete and detailed list of what this
release includes.
<p>
</dd>

<dt>March 12th, 2013: <b>GDB 7.6 branch created</b></dt>
<dd>
<p> The GDB 7.6 branch (<tt>gdb_7_6-branch</tt>) has been created.
To check out a copy of the branch use:
<pre>
cvs -d :pserver:anoncvs@sourceware.org:/cvs/src co -r gdb_7_6-branch gdb
</pre>
<p>
</dd>

<dt>January 9, 2012: <b>Extensibility support using Guile</b></dt>
<dd>
<p> GDB ought to support extensibility using Guile, the GNU extensibility
package (an implementation of Scheme).  We are looking for people to
write the code to interface the two.  Please write to gdb-patches AT
sourceware DOT org if you are interested.
</p>
</dd>

<dt>September 30, 2011: <b>Release Mistakes in GDB Versions 6.0 - 7.3</b></dt>
<dd>
<p> A mistake has been detected in the release tar files for all
GDB releases from version 6.0 to version 7.3 (included). The mistake
has been corrected, and the FSF issued the following announcements:
<ul>
<li> <a href="http://www.sourceware.org/ml/gdb/2011-09/msg00135.html">
     Making up for a release mistake in GDB versions 6.0 - 6.6</a>
<li> <a href=http://www.sourceware.org/ml/gdb/2011-09/msg00136.html>
     Making up for a release mistake in GDB versions 6.7 - 7.3</a>
</ul>
<p>
</dd>

<dt>Nov 28, 2006: <b>Reversible Debugging</b></dt>
<dd>
<p> The GDB maintainers are looking for contributors interested
in <a href="news/reversible.html">reversible debugging</a>.
</p>
</dd>

</dl>

Late breaking information, such as recently added features, can be
found in the <a
href="http://sourceware.org/cgi-bin/cvsweb.cgi/~checkout~/src/gdb/NEWS?content-type=text/x-cvsweb-markup&cvsroot=src"
>NEWS</a> file in the gdb source tree.  Old announcements are in the
news <a href="../gdb/news">archive</a>.

<!-- /body, update below using ../gdb/index.sh -->

<p></p>

<center>
<small>
[<a href="../gdb/bugs/">bugs</a>]
[<a href="../gdb/committee/">GDB Maintainers</a>]
[<a href="../gdb/contribute/">contributing</a>]
[<a href="../gdb/current/">current cvs</a>]
[<a href="../gdb/documentation/">documentation</a>]
[<a href="../gdb/download/">download</a>]
[<a href="../gdb/">home</a>]
[<a href="../gdb/irc/">irc</a>]
[<a href="../gdb/links/">links</a>]
[<a href="../gdb/mailing-lists/">mailing lists</a>]
[<a href="../gdb/news/">news</a>]
[<a href="../gdb/schedule/">schedule</a>]
[<a href="../gdb/song/">song</a>]
[<a href="http://sourceware.org/gdb/wiki/">wiki</a>]
</small>
</center>

<hr />

<address>

<p>Please send FSF &amp; GNU inquiries &amp; questions to <a
href="mailto:gnu@gnu.org">gnu@gnu.org</a>.  There are also <a
href="http://www.gnu.org/home.html#ContactInfo">other ways to
contact</a> the FSF.</p>

<p>This page is maintained by <a href="../gdb/">the GDB
developers</a>.</p>

<p>Copyright Free Software Foundation, Inc., 51 Franklin St - Fifth
Floor, Boston, MA 02110-1301 USA.</p>

<p>Verbatim copying and distribution of this entire article is
permitted in any medium, provided this notice is preserved.</p>

<p>Last modified 2013-04-26.</p>
</address>

</body>
</html>
MD;


// $result = tomd($string);

// header('Content-type:text/html;charset=utf-8');
// echo "<pre>";
// echo ($result);
// echo "</pre>";

function tomd( $string ) {

	$string = preg_replace('/^\t+/m','',$string);

	$ELEMENTS = array(
		array(
			'patterns'    => 'p',
			'replacement' => function (  ) {
				$params = func_get_args();
				$p = preg_replace('/^[\t\s]+/','',$params[2]);
				return $p ? "\n\n".$p."\n" : '';
			}
		),
		array(
			'patterns'    => 'br',
			'type'        => 'void',
			'replacement' => "\n",
		),
		array(
			'patterns'    => 'h([1-6])',
			'replacement' => function () {
				$params= func_get_args();
				$hPrefix = '';
				for ( $i = 0; $i<$params[1]; $i++ ) {
					$hPrefix .= '#';
				}

				$title = strtr($params[3],array( "\r\n"=>'' ));
				$title = strtr($title,array( "\n"=>'' ));
				$title = strtr($title,array( "\t"=>'' ));
				$title = trim($title);
				return "\n\n".$hPrefix.' '. $title ."\n";
			}
		),
		array(
			"patterns"    => 'hr',
			"type"        => 'void',
			"replacement" => "\n\n* * *\n"
		),
		array(
			"patterns"    => 'a',
			"replacement" => function () {
				$params = func_get_args();
				preg_match( attrRegExp( 'href' ), $params[1], $href );
				preg_match( attrRegExp( 'title' ), $params[1], $title );

				$text = strtr($params[2],array( "\r\n"=>'' ));
				$text = strtr($text,array( "\n"=>'' ));
				$text = strtr($text,array( "\t"=>'' ));
				$text = trim($text);

				$content= strtr($params[0],array( "\r\n"=>'' ));
				$content= strtr($content,array( "\n"=>'' ));
				$content= strtr($content,array( "\t"=>'' ));
				$content = trim($content);

				return $href ? '['.$text.']'
					.'('.$href[1].($title && $title[1] ? ' "'.$title[1].'"' : '').')' : $content;
			}
		),
		array(
			"patterns"    => array( 'b', 'strong' ),
			"replacement" => function () {
				$params = func_get_args();
				return $params[2]? ' **'.$params[2].'** ' : '';
			}
		),
		array(
			"patterns"    => array( 'i', 'em' ),
			"replacement" => function () {
				$params = func_get_args();
				return $params[2] ? ' _'.$params[2].'_ ' : '';
			}
		),
		array(
			"patterns"    => 'code',
			"replacement" => function (  ) {
				$params = func_get_args();
				return $params[2] ? '`'.$params[2].'`' : '';
			}
		),
		array(
			"patterns"    => 'img',
			"type"        => 'void',
			"replacement" => function () {
				$params = func_get_args();
				preg_match( attrRegExp( 'src' ), $params[1], $src );
				preg_match( attrRegExp( 'alt' ), $params[1], $alt );
				preg_match( attrRegExp( 'title' ), $params[1], $title );

				return '!['.($alt && $alt[1] ? $alt[1] : '').']'.'('.$src[1].($title && $title[1] ? ' "'.$title[1].'"' : '').')';
			}
		),
	);

	for ( $i = 0, $len = count( $ELEMENTS ); $i<$len; $i++ ) {
		if ( is_string( $ELEMENTS[$i]['patterns'] ) ) {
			$string = replaceEls( $string, array( "tag"      => $ELEMENTS[$i]['patterns'],
												"replacement" => $ELEMENTS[$i]['replacement'],
												"type"        => $ELEMENTS[$i]['type']
										   ) );
		} else {
			for ( $j = 0, $pLen = count( $ELEMENTS[$i]['patterns'] ); $j<$pLen; $j++ ) {
				$string = replaceEls( $string, array( "tag"       => $ELEMENTS[$i]['patterns'][$j],
													"replacement" => $ELEMENTS[$i]['replacement'],
													"type"        => $ELEMENTS[$i]['type']
											   ) );
			}
		}
	}


	// Pre code blocks
	$string = preg_replace_callback( '{<pre\b[^>]*>`([\s\S\s]*?)`</pre>}i', function ( $match ) {
		$match[1] = preg_replace( '/^\t+/m', '  ', $match[1] );
		$match[1] = preg_replace( '/\n/m', "\n    ", $match[1] );
		return "\n\n    ".$match[1]."\n";
	}, $string );
	// Lists
	// Escape numbers that could trigger an ol
	// If there are more than three spaces before the code, it would be in a pre tag
	// Make sure we are escaping the period not matching any character
	$string = preg_replace( '{^(\s{0,3}\d+)\. }', '$1. ', $string );
	// Converts lists that have no child lists (of same type) first, then works it's way up
	$noChildrenRegex = '{<(ul|ol)\b[^>]*>(?:(?!<ul|<ol)[\s\S])*?</\1>}i';
	while ( preg_match( $noChildrenRegex, $string ) ) {
		$string = preg_replace_callback( $noChildrenRegex, function ( $str ) {
			return replaceLists( $str[0] );
		}, $string );
	}

	// Blockquotes
	$deepest = '{<blockquote\b[^>]*>((?:(?!<blockquote)[\s\S])*?)<\/blockquote>}i';
	while ( preg_match( $deepest, $string ) ) {
		$string = preg_replace_callback( $deepest, function ( $match ) {
			return replaceBlockquotes( $match[0] );
		}, $string );
	}


	return cleanUp( $string );
}

function replaceEls( $html, $elProperties ) {
	$pattern  = $elProperties['type']==='void'
		? '<'.$elProperties['tag'].'\b([^>]*)/?>' : '<'.$elProperties['tag'].'\b([^>]*)>([\s\S]*?)</'.$elProperties['tag'].'>';
	$regex    = '{'.$pattern.'}mi';
	if ( is_string( $elProperties['replacement'] ) ) {
		$markdown = preg_replace( $regex, $elProperties['replacement'], $html );
	} else {
		$GLOBALS['func'] = $elProperties['replacement'];
		$markdown = preg_replace_callback( $regex, function ( $match ) {
			return  $GLOBALS['func']($match[0], $match[1], $match[2], $match[3]);
		}, $html );
	}
	return $markdown;
}

function attrRegExp( $attr ) {
	return '/'.$attr.'\s*=\s*["\']?([^"\']*)["\']?'.'/i';
}

function cleanUp( $string ) {
	$string = preg_replace( '/^[\t\r\n]+|[\t\r\n]+$/', '', $string );
	$string = preg_replace( '/\n\s+\n/', "\n\n", $string );
	$string = preg_replace( '/\n{3,}/', "\n\n", $string );

	return $string;
}

function replaceBlockquotes( $html ) {
	$html = preg_replace_callback( '{<blockquote\b[^>]*>([\s\S]*?)</blockquote>}i', function ( $match ) {
		$match[1] = preg_replace( '/^\s+|\s+$/', '', $match[1] );
		$match[1] = cleanUp( $match[1] );
		$match[1] = preg_replace( '/^/m', '> ', $match[1] );
		$match[1] = preg_replace( '/^(>([ \t]{2,}>)+)/m', '>>', $match[1] );

		return $match[1];
	}, $html );

	return $html;
}

function replaceLists( $html ) {
	$html = preg_replace_callback( '{<(ul|ol)\b[^>]*>([\s\S]*?)</\1>}i', function ( $match) {
		$lis = explode( '</li>', $match[2] );
		array_splice( $lis, count( $lis )-1, 1 );
		for ( $i = 0, $len = count( $lis ); $i<$len; $i++ ) {
			if ( $lis[$i] ) {
				$GLOBALS['prefix'] = ($match[1]==='ol') ? ($i+ 1).". " : "* ";
				$lis[$i]           = preg_replace_callback( '/\s*<li[^>]*>([\s\S]*)/i', function ( $innerHTML ) {
					$innerHTML[1] = preg_replace( '/^\s+/', '', $innerHTML[1] );
					$innerHTML[1] = preg_replace( '/\n\n/', "\n\n    ", $innerHTML[1] );
					// indent nested lists
					$innerHTML[1] = preg_replace( '/\n([ ]*)+(\*|\d+\.) /', "\n$1    $2 ", $innerHTML[1] );

					return $GLOBALS['prefix'].$innerHTML[1];
				}, $lis[$i] );
			}
		}

		return implode( "\n", $lis );
	}, $html );

	return "\n\n".preg_replace( '/[ \t]+\n|\s+$/', '', $html );
}
