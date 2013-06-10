{CCMS_DB_PRELOAD:index_page}<!DOCTYPE html>
	<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
	<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
	<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
	<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<title>Custodian CMS | Modus Internet</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<!-- Mobile Specific Metas -->
	<link rel="stylesheet" href="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/css/style.css.php" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/favicon.ico" />
</head>
<body>
	<a href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}" style="text-decoration:none; border:0 none;">
		<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/hdr-940.png" title="" />
	</a>
	<h2>Welcome to your copy of Custodian CMS</h2>
	<ul>
		<li>@version
			<ul>
				<li>0.1</li>
			</ul>
		</li>
	</ul>
	<ul style="max-width:600px;">
		<li>@Copyright
			<ul>
				<li>Custodian CMS v0.1 - Content Management System (CMS)<br />
				Copyright (C) 2013 - Vincent A Hallberg, modusinternet.com</li>
				<li>This library is free software; you can redistribute it and/or modify it under the terms of the GNU Lesser General Public License as published by the Free Software Foundation; either version 2.1 of the License, or (at your option) any later version.</li>
				<li>This library is distributed in the hope that it will be useful, but	WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for more details.</li>
				<li>Visit http://www.gnu.org/copyleft/lesser.html to read; or write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA for a copy.</li>
			</ul>
		</li>
	</ul>
	<h3>Security Tip</h3>
	<p>
		The /{CCMS_LIB:_default.php;FUNC:ccms_cfgLibDir}, /{CCMS_LIB:_default.php;FUNC:ccms_cfgPreDir} and /{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir} folders are protected by .htaccess.
	</p>
<pre style="margin: 0 0 20px 0;">
&lt;FilesMatch ".(fla|htaccess|htm|html|ini|php|phps|tpl|txt)$"&gt;
	Order Allow,Deny
	Deny from all
&lt;/FilesMatch&gt;
</pre>
	<p>
		Templates in these folders can not be called directly.  If you wish to extend this protection to sub-directoies either copy the FilesMatch code from above and add it to a new .htaccess file in the appropriate directory or copy the .htaccess file from any of the already protected directories and place it inside.
	</p>
	<p>
		Templates inside the /{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir} directory can only be called using correctly formatted URI's containing browser language codes supported by the site.  Other wise the /{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/error404.php template will be thrown.  A 2-5 character language code followed by the 1-255 character long name of the dir and or page desired.
	</p>
	<ul>
		<li>e.g.:
			<ul>
				<li>abc.com/en/page1.html</li>
				<li>abc.com/en-us/apples</li>
				<li>abc.com/fr/fruit/oranges/</li>
				<li>abc.com/zh-cn/fruit/water-melons.html</li>
			</ul>
		</li>
	</ul>
	<h3>Configuration Tip</h3>
	<p>
		The template you are currently viewing is /{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/index.tpl.  You can alter the name of the template which acts as your default index file by changing the $CFG["INDEX"] variable inside your /{CCMS_LIB:_default.php;FUNC:ccms_cfgPreDir}/config.php file.
	</p>
	<ul>
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
		Once you have chosen the name of your primary index page you can either re-write the name of this template to match or create a new one and place it in the /{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir} folder.
	</p>
	<h3>Parser Tip</h3>
	<p>
		Templates can have 1 of 5 possible extensions.  .htm, .html, .php, .tpl or .txt. All templates are parsed by the Custodian CMS (CCMS) parser before returning output to the browser.<br />
		<span style="color: #ec7f27;">NOTE:</span>  The only exception is .php templates, they are pre-parsed by the PHP interpreter first and the CCMS parser second.  
	</p>
	<p>
		The CCMS parser looks for 4 possible CCMS tags when parsing templates.
	</p>
	<ul>
		<li>e.g.:
			<ul>
				<li>&#123;CCMS_DB_PRELOAD:some_index_page_filter,some_footer_filter,some_header_filter,some_twiter_feed_filter}</li>
				<li>&#123;CCMS_DB:some_index_page_filter,meta_description}</li>
				<li>&#123;CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}</li>
				<li>&#123;CCMS_TPL:header}</li>
			</ul>
		</li>
	</ul> 
	<h3>Where is the Admin System?</h3>
	<p>
		This version of CCMS does not come with an admin system, it won't be ready till the next big release.  Probably version 1.0 which is currently scheduled for release on July 1, 2013. But fortunately it is not needed to take advantage of CCMS's features, for now use a tool like phpMyAdmin to add, remove or update your database inserts.
	</p>
	<h3>Adding Content in Many Languages</h3>
	<p>
		The following are tips on how to add new languages and content to the database.  Once the new admin system is done, around July 1, 2013, this will become trivial.
	</p>
	<p>
		Add the browser language codes you want your site to support to the 'ccms_lng_charset' table and set one to default.  Check here for a full list of codes: <a href="http://www.metamodpro.com/browser-language-codes">www.metamodpro.com/browser-language-codes</a><br />
		<img alt="" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/phpadm1.png" style="border:solid 1px black;" title="" /><br />
		<img alt="" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/phpadm2.png" style="border:solid 1px black;" title="" />
	</p>
	<p>
		Add columns for each of your new language codes to the 'ccms_ins_db' table.<br />
		<img alt="" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/phpadm3.png" style="border:solid 1px black;" title="" /><br />
		<img alt="" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/phpadm4.png" style="border:solid 1px black;" title="" />
	</p>
	<p>
		Add records to the 'ccms_ins_db' table containing the 'scope', 'word' and content for each language you would like to view in your website.<br />
		<img alt="" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/phpadm5.png" style="border:solid 1px black;" title="" /><br />
		<img alt="" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/phpadm6.png" style="border:solid 1px black;" title="" />
	</p>
	<p>
		Place the CCMS_DB_PRELOAD tag at the top of your html to pre-load all the 'ccms_ins_db' records into memory that you might need for a given page.<br />
		e.g.: &#123;CCMS_DB_PRELOAD:index_page}
	</p>
	<p>
		
		Then use the CCMS_DB tag to automatically display database content in the language requested by a visitors browser, if available.  Otherwise display content based on the default language of the site.<br />
		e.g.: &#123;CCMS_DB:index_page,paragraph1}<br />
		<a id="a"></a><br />
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
		Try loading other browser language codes: <a href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/en#a">English</a>, 
		<a href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/fr#a">Français</a>, 
		<a href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/de#a">German (Standard)</a>, 
		<a href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/ja#a">日本語 (Japanese)</a>, 
		<a href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}/zh-cn#a">简体中文(Simplified Chinese)</a>
	</p>
	<p>
		Contenet specific images based on browser language codes are even easier to work with.  Each of the images below are saved on the server in 5 different languages and as you change your desired language using the links above the images below will reflect that change as well.
	</p>
	<img alt="" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/zurich-{CCMS_LIB:_default.php;FUNC:ccms_vlng}.png" style="border:solid 1px black;" title="" /><br />
	<br />
	<img alt="" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/caribbean-bungalows-{CCMS_LIB:_default.php;FUNC:ccms_vlng}.png" style="border:solid 1px black;" title="" />
	<h3>What Now?</h3>
	<p>
		Now build your website.  Remember, this is a template driven CMS which means if you want to add pages to your site you need to add templates to your server.  As you complete each page copy content into the 'ccms_ins_db' database table, add multilingual versions of content to each record and replace original content in your template with a CCMS_DB tag.  For more information, community assistance or example code visit:  <a href="http://modusinternet.com/en/products/custodian-cms.html" target="_blank">http://modusinternet.com/en/products/custodian-cms.html</a>.
	</p>
	<p style="margin-bottom:10px; text-align:right;">
		Copyright &copy; {CCMS_LIB:_default.php;FUNC:ccms_dateYear} <a href="http://modusinternet.com" title="Modus Internet : Located in Vancouver and Burnaby British Columbia we do website design, database integration, custom programming, search engine optimization (SEO) or consultation.">Modus Internet</a>. All rights reserved.
	</p>
</body>
</html>