{CCMS_DB_PRELOAD:page,page-3}<!DOCTYPE html>
	<!--[if lt IE 7 ]><html class="ie ie6" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if IE 7 ]><html class="ie ie7" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if IE 8 ]><html class="ie ie8" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if (gte IE 9)|!(IE)]><!--><html lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Custodian CMS v0.3 - {CCMS_DB:page,title}3</title>
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
		<p>
			<a class="tapTarget" href="/en/examples/page-3.html" onclick="delLngCookie()">English</a>
			<a class="tapTarget" href="/fr/examples/page-3.html" onclick="delLngCookie()">Français</a>
			<a class="tapTarget" href="/de/examples/page-3.html" onclick="delLngCookie()">German (Standard)</a>
			<a class="tapTarget" href="/ja/examples/page-3.html" onclick="delLngCookie()">日本語 (Japanese)</a>
			<a class="tapTarget" href="/zh-cn/examples/page-3.html" onclick="delLngCookie()">简体中文(Simplified Chinese)</a>
		</p>
		<p>
			<a class="tapTarget" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/examples/page-1.html">{CCMS_DB:page,page-num}1</a>
			<a class="tapTarget" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/examples/page-2.html">{CCMS_DB:page,page-num}2</a>
			<a class="tapTarget" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/examples/page-3.html">{CCMS_DB:page,page-num}3</a>
		</p>
		<h2>{CCMS_DB:page,page-num}3</h2>
		<p>
			{CCMS_DB:page-3,para1}
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
				return;
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