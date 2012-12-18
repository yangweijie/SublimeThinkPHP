
// Copyright (C) 2006 Google Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
// http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
/**
* @fileoverview
* some functions for browser-side pretty printing of code contained in html.
*
* <p>
* For a fairly comprehensive set of languages see the
* <a href="http://google-code-prettify.googlecode.com/svn/trunk/README.html#langs">README</a>
* file that came with this source. At a minimum, the lexer should work on a
* number of languages including C and friends, Java, Python, Bash, SQL, HTML,
* XML, CSS, Javascript, and Makefiles. It works passably on Ruby, PHP and Awk
* and a subset of Perl, but, because of commenting conventions, doesn't work on
* Smalltalk, Lisp-like, or CAML-like languages without an explicit lang class.
* <p>
* Usage: <ol>
* <li> include this source file in an html page via
* {@code <script type="text/javascript" src="/path/to/prettify.js"></script>}
* <li> define style rules. See the example page for examples.
* <li> mark the {@code <pre>} and {@code <code>} tags in your source with
* {@code class=prettyprint.}
* You can also use the (html deprecated) {@code <xmp>} tag, but the pretty
* printer needs to do more substantial DOM manipulations to support that, so
* some css styles may not be preserved.
* </ol>
* That's it. I wanted to keep the API as simple as possible, so there's no
* need to specify which language the code is in, but if you wish, you can add
* another class to the {@code <pre>} or {@code <code>} element to specify the
* language, as in {@code <pre class="prettyprint lang-java">}. Any class that
* starts with "lang-" followed by a file extension, specifies the file type.
* See the "lang-*.js" files in this directory for code that implements
* per-language file handlers.
* <p>
* Change log:<br>
* cbeust, 2006/08/22
* <blockquote>
* Java annotations (start with "@") are now captured as literals ("lit")
* </blockquote>
* @requires console
*/
// JSLint declarations
/*global console, document, navigator, setTimeout, window, define */
/**
* Split {@code prettyPrint} into multiple timeouts so as not to interfere with
* UI events.
* If set to {@code false}, {@code prettyPrint()} is synchronous.
*/
window['PR_SHOULD_USE_CONTINUATION'] = true;
/**
* Find all the {@code <pre>} and {@code <code>} tags in the DOM with
* {@code class=prettyprint} and prettify them.
*
* @param {Function?} opt_whenDone if specified, called when the last entry
* has been finished.
*/
var prettyPrintOne;
/**
* Pretty print a chunk of code.
*
* @param {string} sourceCodeHtml code as html
* @return {string} code as html, but prettier
*/
var prettyPrint;
(function () {
var win = window;
// Keyword lists for various languages.
// We use things that coerce to strings to make them compact when minified
// and to defeat aggressive optimizers that fold large string constants.
var FLOW_CONTROL_KEYWORDS = ["break,continue,do,else,for,if,return,while"];
var C_KEYWORDS = [FLOW_CONTROL_KEYWORDS,"auto,case,char,const,default," +
"double,enum,extern,float,goto,int,long,register,short,signed,sizeof," +
"static,struct,switch,typedef,union,unsigned,void,volatile"];
var COMMON_KEYWORDS = [C_KEYWORDS,"catch,class,delete,false,import," +
"new,operator,private,protected,public,this,throw,true,try,typeof"];
var CPP_KEYWORDS = [COMMON_KEYWORDS,"alignof,align_union,asm,axiom,bool," +
"concept,concept_map,const_cast,constexpr,decltype," +
"dynamic_cast,explicit,export,friend,inline,late_check," +
"mutable,namespace,nullptr,reinterpret_cast,static_assert,static_cast," +
"template,typeid,typename,using,virtual,where"];
var JAVA_KEYWORDS = [COMMON_KEYWORDS,
"abstract,boolean,byte,extends,final,finally,implements,import," +
"instanceof,null,native,package,strictfp,super,synchronized,throws," +
"transient"];
var CSHARP_KEYWORDS = [JAVA_KEYWORDS,
"as,base,by,checked,decimal,delegate,descending,dynamic,event," +
"fixed,foreach,from,group,implicit,in,interface,internal,into,is,let," +
"lock,object,out,override,orderby,params,partial,readonly,ref,sbyte," +
"sealed,stackalloc,string,select,uint,ulong,unchecked,unsafe,ushort," +
"var,virtual,where"];
var COFFEE_KEYWORDS = "all,and,by,catch,class,else,extends,false,finally," +
"for,if,in,is,isnt,loop,new,no,not,null,of,off,on,or,return,super,then," +
"throw,true,try,unless,until,when,while,yes";
var JSCRIPT_KEYWORDS = [COMMON_KEYWORDS,
"debugger,eval,export,function,get,null,set,undefined,var,with," +
"Infinity,NaN"];
var PERL_KEYWORDS = "caller,delete,die,do,dump,elsif,eval,exit,foreach,for," +
"goto,if,import,last,local,my,next,no,our,print,package,redo,require," +
"sub,undef,unless,until,use,wantarray,while,BEGIN,END";
var PYTHON_KEYWORDS = [FLOW_CONTROL_KEYWORDS, "and,as,assert,class,def,del," +
"elif,except,exec,finally,from,global,import,in,is,lambda," +
"nonlocal,not,or,pass,print,raise,try,with,yield," +
"False,True,None"];
var RUBY_KEYWORDS = [FLOW_CONTROL_KEYWORDS, "alias,and,begin,case,class," +
"def,defined,elsif,end,ensure,false,in,module,next,nil,not,or,redo," +
"rescue,retry,self,super,then,true,undef,unless,until,when,yield," +
"BEGIN,END"];
var SH_KEYWORDS = [FLOW_CONTROL_KEYWORDS, "case,done,elif,esac,eval,fi," +
"function,in,local,set,then,until"];
var ALL_KEYWORDS = [
CPP_KEYWORDS, CSHARP_KEYWORDS, JSCRIPT_KEYWORDS, PERL_KEYWORDS +
PYTHON_KEYWORDS, RUBY_KEYWORDS, SH_KEYWORDS];
var C_TYPES = /^(DIR|FILE|vector|(de|priority_)?queue|list|stack|(const_)?iterator|(multi)?(set|map)|bitset|u?(int|float)\d*)\b/;
// token style names. correspond to css classes
/**
* token style for a string literal
* @const
*/
var PR_STRING = 'str';
/**
* token style for a keyword
* @const
*/
var PR_KEYWORD = 'kwd';
/**
* token style for a comment
* @const
*/
var PR_COMMENT = 'com';
/**
* token style for a type
* @const
*/
var PR_TYPE = 'typ';
/**
* token style for a literal value. e.g. 1, null, true.
* @const
*/
var PR_LITERAL = 'lit';
/**
* token style for a punctuation string.
* @const
*/
var PR_PUNCTUATION = 'pun';
/**
* token style for plain text.
* @const
*/
var PR_PLAIN = 'pln';
/**
* token style for an sgml tag.
* @const
*/
var PR_TAG = 'tag';
/**
* token style for a markup declaration such as a DOCTYPE.
* @const
*/
var PR_DECLARATION = 'dec';
/**
* token style for embedded source.
* @const
*/
var PR_SOURCE = 'src';
/**
* token style for an sgml attribute name.
* @const
*/
var PR_ATTRIB_NAME = 'atn';
/**
* token style for an sgml attribute value.
* @const
*/
var PR_ATTRIB_VALUE = 'atv';
/**
* A class that indicates a section of markup that is not code, e.g. to allow
* embedding of line numbers within code listings.
* @const
*/
var PR_NOCODE = 'nocode';
/**
* A set of tokens that can precede a regular expression literal in
* javascript
* http://web.archive.org/web/20070717142515/http://www.mozilla.org/js/language/js20/rationale/syntax.html
* has the full list, but I've removed ones that might be problematic when
* seen in languages that don't support regular expression literals.
*
* <p>Specifically, I've removed any keywords that can't precede a regexp
* literal in a syntactically legal javascript program, and I've removed the
* "in" keyword since it's not a keyword in many languages, and might be used
* as a count of inches.
*
* <p>The link above does not accurately describe EcmaScript rules since
* it fails to distinguish between (a=++/b/i) and (a++/b/i) but it works
* very well in practice.
*
* @private
* @const
*/
