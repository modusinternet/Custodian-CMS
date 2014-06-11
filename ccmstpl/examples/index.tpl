{CCMS_DB_PRELOAD:index_page}<!DOCTYPE html>
	<!--[if lt IE 7 ]><html class="ie ie6" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if IE 7 ]><html class="ie ie7" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if IE 8 ]><html class="ie ie8" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if (gte IE 9)|!(IE)]><!--><html lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Custodian CMS by Modus Internet</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="keywords" content="Content Managment System, Multilingual Content, Custodian CMS, Modus Internet, Vincent Hallberg," />
		<meta name="author" content="Custodian CCMS developed by Vincent Hallberg of Modus Internet, modusinternet.com, in Port Coquitlam, British Columbia, Canada." />
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/img/favicon.ico" />
	</head>
	<body>
		<a href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}" style="text-decoration:none; border:0 none;">
			<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/img/hdr-940.png" title="" />
		</a>
		<h2>Welcome</h2>
		<p>
			Congradualtions and welcome to your new copy of Custodian CMS (CCMS).
		</p>
		<ul class="oj">
			<li>@version
				<ul>
					<li>0.3 (Released: June 10, 2014)</li>
				</ul>
			</li>
		</ul>
		<ul class="oj" style="max-width: 830px;">
			<li>@Copyright
				<ul>
					<li>Custodian CMS v0.3 - Content Management System (CMS)<br />
					Copyright (C) {CCMS_LIB:_default.php;FUNC:ccms_dateYear} - Vincent A Hallberg of modusinternet.com</li>
					<li>This library is free software; you can redistribute it and/or modify it under the terms of the GNU Lesser General Public License as published by the Free Software Foundation; either version 2.1 of the License, or (at your option) any later version.</li>
					<li>This library is distributed in the hope that it will be useful, but	WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for more details.</li>
					<li>Visit http://www.gnu.org/copyleft/lesser.html to read; or write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA for a copy.</li>
				</ul>
			</li>
		</ul>
		<h3>Info</h3>
		<p>
			CCMS is not a WYSIWYG system or set of pre-built templates for building quick and dirty blogs.  It is a tool for real website developers and people that would like to learn to build their own website build secure, portable, multilingual, SEOed websites without all the foundation work.
		</p>
		<ul class="circle">
			<li>CCMS is primarily designed to supports multilingual content based on the UTF-8 character set.  The only challenge with that is making sure to remember </li>
			<li>CCMS uses .htaccess files around the site to help keep things organized and secure.</li>
			<li>CCMS enforces SEO friendly URI practices to help keep all content, regardless of language, on one site with one set of templates.</li>
			<li>CCMS is able to detect the language preferences of your visitors and render content, as it becomes available, in the appropriate character set.  This means you can add additional languages and begin translating your content at any point, durring or after your development.  You don't need a second website address or set of templates to support additional languages either.  Traditionally you build a website in your primary language first and a second site or set of templates to support any additional languages later.  Not with CCMS, just build your site once and go live when you are ready.  Later you can extend your language support and add translated versions of your exsisting content without shutting down or interupting anything.</li>
			<li>In CCMS you do not do your programming directly inside your HTML templates, allthough you could if you really wanted to by naming your template with a .php extention, you refer to chunks of programming code found in the <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgLibDir}/</span> folder like this:  <span class="oj">&#123;CCMS_LIB:_default.php;FUNC:name_of_some_function}</span>  Using this method helps keep your HTML templates clean easy to read.</li>
			<li>CCMS automatically submits caching headers out with anything requested from your site in order to help reduce the amount of calls/overhead your server has to respond to.</li>
		</ul>
		<h3>Configuration</h3>
		<p>
			The templates you are reading now can be found in <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/</span> and the <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/index.tpl</span> file is currently configured in your <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgPreDir}/config.php</span> file to be your default template, the first template CCMS parses when nothing else is specified.  For the purposes of this demonstration there is only one template, besides a few error templates, found in the <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/</span> directory which you can read and overwrite when you are ready.  All other resources related to what you see here now are located in the <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/</span> directory.  When you are ready you can delete this folder and all of its contents as-well.
		</p>
		<h3>Where is the Admin System?</h3>
		<p>
			CCMS does not come with an admin system yet, it won't be ready till the next big release.  Probably version 1.0 which is currently scheduled for release on Dec 1, 2014. Fortunately its not needed to take advantage of CCMS's features, for now use a tool like phpMyAdmin to add, remove or update your database inserts.
		</p>
		<h3>Adding Content in Many Languages</h3>
		<p>
			The following is a guide on how to add new languages and content to the database using phpMyAdmin.  Once the new admin system is ready this will become trivial.
		</p>
		<p>
			Add browser language codes you want your site to support to the <span class="oj">ccms_lng_charset</span> table and set atleast one of them to be the default.  Check here for a full list of codes: <a href="http://www.metamodpro.com/browser-language-codes" target="_blank">http://www.metamodpro.com/browser-language-codes</a>
		</p>
		<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/img/phpadm1.png" style="border:solid 1px black;" title="" /><br />
		<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/img/phpadm2.png" style="border:solid 1px black;" title="" />
		<p>
			Add columns for each of your new language codes to the <span class="oj">ccms_ins_db</span> table.
		</p>
		<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/img/phpadm3.png" style="border:solid 1px black;" title="" /><br />
		<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/img/phpadm4.png" style="border:solid 1px black;" title="" />
		<p>
			Add records to the <span class="oj">ccms_ins_db</span> table containing the <span class="oj">scope</span>, <span class="oj">word</span> and content for each language you would like to view in your website.
		</p>
		<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/img/phpadm5.png" style="border:solid 1px black;" title="" /><br />
		<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/img/phpadm6.png" style="border:solid 1px black;" title="" />
		<p>
			Place the <span class="oj">CCMS_DB_PRELOAD</span> tag at the top of your html to preload all the <span class="oj">ccms_ins_db</span> records into memory that you might need for a given page.<br />
			<span class="oj">e.g.: &#123;CCMS_DB_PRELOAD:index_page}</span>
		</p>
		<p>
			Then use the <span class="oj">CCMS_DB</span> tag to automatically display database content in the language requested by a visitors browser, if available.  Otherwise display content based on the default language of the site.<br />
			<span class="oj">e.g.: &#123;CCMS_DB:index_page,paragraph1}</span><br />
			<a id="a"></a>
		</p>
		<h3>Multilingual Examples/Testing Area</h3><br />
		<p>
			<span style="border:dotted 1px black; margin:5px; padding:5px;">
				{CCMS_DB:index_page,pangram1}
			</span><br />
			<br />
			<span style="border:dotted 1px black; margin:5px; padding:5px;">
				{CCMS_DB:index_page,pangram2}
			</span><br />
			<br />
			<span style="border:dotted 1px black; margin:5px; padding:5px;">
				{CCMS_DB:index_page,pangram3}
			</span><br />
			<br />
			<span style="border:dotted 1px black; margin:5px; padding:5px;">
				{CCMS_DB:index_page,pangram4}
			</span><br />
			<br />
			Try loading other browser language codes:
			<a class="tapTarget" href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/en/#a" onclick="delLngCookie()">English</a>
			<a class="tapTarget" href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/fr/#a" onclick="delLngCookie()">Français</a>
			<a class="tapTarget" href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/de/#a" onclick="delLngCookie()">German (Standard)</a>
			<a class="tapTarget" href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/ja/#a" onclick="delLngCookie()">日本語 (Japanese)</a>
			<a class="tapTarget" href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/zh-cn/#a" onclick="delLngCookie()">简体中文(Simplified Chinese)</a>
		</p>
		<p>
			Content specific images based on browser language codes are even easier to work with.  Each of the images below are saved on the server in 5 different languages and as you change your desired language using the links above the images below will reflect that change.
		</p>
		<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/img/text-on-graphic-{CCMS_LIB:_default.php;FUNC:ccms_lng}.png" style="border:solid 1px black; margin-bottom: 100px;" title="" />
		<h3>Configuration Tip</h3>
		<p>
			The template you are currently viewing is <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/index.tpl</span> which leads off to others using this call <span class="oj">&#123;CCMS_TPL:examples/index.tpl}</span>.  You can alter the name of the template which acts as your default index file by changing the <span class="oj">$CFG["INDEX"]</span> variable inside your <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgPreDir}/config.php</span> file.
		</p>
		<ul class="oj">
			<li>e.g.:
				<ul>
					<li>$CFG["INDEX"] = "index2"</li>
					<li>$CFG["INDEX"] = "indexalt"</li>
					<li>$CFG["INDEX"] = "default"</li>
					<li>$CFG["INDEX"] = "main"</li>
				</ul>
			</li>
		</ul>
		<p>
			Once you have chosen the name of your primary index page you can either re-write the name of this template to match or create a new one and place it in the <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}</span> folder.
		</p>
		<p>
			<span class="oj">NOTE:</span>  : You do not need to specify the extension of the file in the config, CCMS will attempt to figure this out on it's own.  Here is the list of extensions it will look for and in order of sequential importance. (<span class="oj">.php, .htm, .html, .tpl, .txt, .xml, .xsl</span>)  In the case of the .php extension the template is parsed by PHP first and then CCMS last.  In the case of all other extensions they are only parsed using the CCMS parser.  Excluding files with the .php extension all other files are searched for and parsed purely based on an alphanumerical list.
		</p>
		<h3>Security Tip</h3>
		<p>
			The <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgLibDir}</span>, <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgPreDir}</span> and <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}</span> folders are protected by .htaccess.
		</p>
		<pre class="oj">
	&lt;FilesMatch ".(fla|htaccess|htm|html|ini|php|phps|tpl|txt|xml|xsl)$"&gt;
		Order Allow,Deny
		Deny from all
	&lt;/FilesMatch&gt;
		</pre>
		<p>
			Templates in these folders can not be called directly.  If you wish to extend this protection to sub-directories either copy the FilesMatch code from above and add it to a new .htaccess file in the appropriate directory or copy the .htaccess file from any of the already protected directories and place it inside.
		</p>
		<p>
			Templates inside the <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/</span> folder can only be called using correctly formatted URI's containing browser language codes supported by the site.  Other wise the <span class="oj">/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/error404.php</span> template will be thrown.  A 2-5 character language code followed by the <span class="oj">1-1024</span> character long name of the dir and or page desired.
		</p>
		<ul class="oj">
			<li>e.g.:
				<ul>
					<li>abc.com/en/page1.html</li>
					<li>abc.com/en-us/apples</li>
					<li>abc.com/fr/fruit/oranges/</li>
					<li>abc.com/zh-cn/fruit/water-melons.html</li>
				</ul>
			</li>
		</ul>
		<h3>Parser Tip</h3>
		<p>
			Templates can have 1 of 7 possible extensions.  <span class="oj">.htm, .html, .php, .tpl, .txt, .xml or .xsl</span>. All templates are parsed by the CCMS parser before returning output to the browser.<br />
			<span class="oj">NOTE:</span>  The only exception is <span class="oj">.php</span> templates, they are parsed by the PHP parser first and the CCMS parser second.
		</p>
		<p>
			The CCMS parser looks for 4 possible CCMS tags when parsing templates.
		</p>
		<ul class="oj">
			<li>e.g.:
				<ul>
					<li>&#123;CCMS_DB_PRELOAD:some_index_page_filter,some_footer_filter,some_header_filter,some_twiter_feed_filter}</li>
					<li>&#123;CCMS_DB:some_index_page_filter,meta_description}</li>
					<li>&#123;CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}</li>
					<li>&#123;CCMS_TPL:header}</li>
				</ul>
			</li>
		</ul>
		<h3>What Now?</h3>
		<p>
			Now build your website.  Remember, this is a template driven CMS which means if you want to add pages to your site you need to add templates to your server.  As you complete each page copy content into the <span class="oj">ccms_ins_db</span> database table, add multilingual versions of content to each record and replace original content in your template with a <span class="oj">CCMS_DB tag</span>.  For more information, community assistance or example code visit:  <a href="http://modusinternet.com/en/products/custodian-cms.html" target="_blank">http://modusinternet.com/en/products/custodian-cms.html</a>.
		</p>
		<p style="margin-bottom:10px; text-align:right;">
			Copyright &copy; {CCMS_LIB:_default.php;FUNC:ccms_dateYear} <a href="http://modusinternet.com" target="_blank" title="Modus Internet : Located in Port Coquitlam, British Columbia we can help you with your website design, custom programming, database integration, search engine optimization (SEO) and/or consultation.">Modus Internet</a>. All rights reserved.
		</p>
		<script type="text/javascript">
			/*
			This feature helps clear out a cached cookie so that a new one can be written in
			place when changing your language.
			*/
			function delLngCookie() {
				document.cookie = "ccms_lng=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
			}

			/*
			This code is used to underline the active language in our 'Multilingual Examples/Testing Area'
			based on URI comparisons.
			*/
			var pageurl = location.href;
			var links = document.getElementsByTagName("A");
			for(var i=0; i<links.length; i++) {
				if(pageurl == links[i].href) {
					links[i].style.textDecoration = "underline";
				}
			}

			/*
			This code is used to call a stylesheet from the server using JavaScript after the page is
			loaded to speed up the page render.
			*/
			var headID = document.getElementsByTagName("head")[0];
			var cssNode = document.createElement('link');
			cssNode.type = 'text/css';
			cssNode.rel = 'stylesheet';
			cssNode.href = '/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/examples/css/style.css';
			headID.appendChild(cssNode);
		</script>
	</body>
</html>