<!DOCTYPE html>
	<!--[if lt IE 7 ]><html class="ie ie6" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if IE 7 ]><html class="ie ie7" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if IE 8 ]><html class="ie ie8" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if (gte IE 9)|!(IE)]><!--><html lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Parsing ERROR | <?=$CFG["DOMAIN"];?></title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- Favicons -->
		<link rel="shortcut icon" href="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/icons/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/icons/favicon.ico" type="image/x-icon">

		<!--
		HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries.
		WARNING: Respond.js doesn't work if you view the page via file://
		-->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			/*
			Critical CSS for Above Fold Content generated using tool/method found here:
				http://addyosmani.com/blog/detecting-critical-above-the-fold-css-with-paul-kinlan-video/
			*/
			html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video { margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; }
			body { line-height: 24px; color: rgb(102, 102, 102); font-style: normal; font-variant: normal; font-weight: normal; font-size: 16px; font-family: 'Open Sans'; padding: 20px; -webkit-font-smoothing: antialiased; background: rgb(255, 255, 255); }
			a, a:visited { border: 0px none; color: rgb(236, 127, 39); text-decoration-line: none; outline: 0px; }
			img { margin-bottom: 10px; }
			.scale { max-width: 100%; height: auto; }
			p { margin: 0px 0px 10px; }
			p a, p a:visited { line-height: inherit; }
			h1, h2, h3, h4, h5, h6 { color: rgb(134, 177, 53); font-weight: normal; margin: 25px 0px 10px; }
			h3 { font-size: 28px; line-height: 34px; margin: 40px 0px 8px; }
			table { border-collapse: collapse; border-spacing: 0px; }
			.gssb_c { border: 0px; position: absolute; z-index: 5000; }
			.gssb_c > tbody > tr, .gssb_c > tbody > tr > td, .gssb_d, .gssb_d > tbody > tr, .gssb_d > tbody > tr > td, .gssb_e, .gssb_e > tbody > tr, .gssb_e > tbody > tr > td { padding: 0px; margin: 0px; border: 0px; }
			.gssb_f { visibility: hidden; white-space: nowrap; }
			.gssb_e { border-width: 1px; border-style: solid; border-color: rgb(217, 217, 217) rgb(204, 204, 204) rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 2px 4px; cursor: default; border: 0px; }
		</style>
	</head>
	<body>
		<a href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}" style="text-decoration: none; border: 0 none;">
			<img alt="Custodian CMS Banner.  Easy gears no spilled beers." class="scale" title="Custodian CMS Banner.  Easy gears no spilled beers." src="data:image/png;base64,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" />
		</a>
		<p>
			Current Location:
			/ <a href="http://<?=$CFG["DOMAIN"];?>">Homepage</a>
			/ <span style="border-bottom:1px dotted #ec7f27;">Parsing ERROR</span>
		</p>
		<div style="float:left; width:300px;">
			<h3 style="margin-top:0px;">Parsing ERROR:</h3>
			<p style="color:red;"><?=htmlspecialchars($_SERVER["REQUEST_URI"]);?> not found.</p>
			<p style="border:1px dotted red; font:12px/21px HelveticaNeue, 'Helvetica Neue', Helvetica, Arial, sans-serif !important; padding:7px;">
				<span style="font-weight:bold">NOTE: <abbr style="border-bottom:1px dotted black; cursor:help;" title="In computing, a Uniform Resource Identifier (URI) is a string of characters used to identify a name or a resource on the Internet.  You can generally see the content of a URI in the navigation bar at the top of your browser after you clicked on any link.">URI</abbr>'s on this site are parsed based on a 2-5 character language code first.<br />
				For example:</span><br />
				<br />
				abc.com/en<br />
				abc.com/en-us/<br />
				abc.com/fr/<br />
				abc.com/zh-cn<br />
				<br />
				<span style="font-weight:bold;">Followed by the 1-255 character long name of the dir and or page desired.<br />
				For example:</span><br />
				<br />
				abc.com/en/page1.html<br />
				abc.com/en-us/apples<br />
				abc.com/fr/fruit/oranges/<br />
				abc.com/zh-cn/fruit/water-melons.html
			</p>
		</div>
		<div style="float:left; margin-left:20px; width:600px;">
			<h3 style="margin-top:0px;">Search Options</h3>
			<p>
				<?=$CFG["DOMAIN"];?> Alternate Language Search Results<br />
				<br />
<?
// Trim off anything before the first / and save in $lng.
$lng = htmlspecialchars(preg_replace('/^\/([\pL\pN-]*)\/?(.*)\z/i', '${1}', $_SERVER['REDIRECT_URL']));
// Trim off everything after the first / and save in $tmp.
$tpl = htmlspecialchars(preg_replace('/^\/([\pL\pN-]*)\/?(.*)\z/i', '${2}', $_SERVER['REDIRECT_URL']));
// Replace any occurence of / in $tmp with a space instead and save for use with Google Search.
$tpl2 = htmlspecialchars(preg_replace('/[\/*]/i', ' ', $tpl));
$tpl2 = htmlspecialchars(preg_replace('/(\.html|\.htm)/i', '', $tpl2));
if($tpl == ""){
	// This fixes URI calls that look like 'mydomain.com/asdf' for the code below because there was only 1 variable after the domain name.
	$tpl = $lng;
	$lng = "";
}
$qry = $CFG["DBH"]->prepare("SELECT lng FROM `ccms_lng_charset` WHERE `status` = 1 ORDER BY lng ASC;");
if($qry->execute()) {
	while($row = $qry->fetch()) {
		echo "\t\t\t<a href=\"/" . $row["lng"] . "/" . $tpl . "\">" . $CFG["DOMAIN"] . "/" . $row["lng"] . "/" . $tpl . "</a><br />\n";
	}
}
?>
		</p>
		<?if($CFG["GOOGLE_CUSTOM_SEARCH_ENGINE_CODE"] != ""):?>
<p>
			Google Search Results<br />
			<br />
<!-- http://www.google.com/cse/ -->
<!-- The following code comes from http://www.binaryturf.com/add-related-posts-widget-google-cse-retain-engage-visitors/ -->
<div id="cse" style="width:100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script>
google.load('search', '1', {language : '<?=$lng;?>'});
google.setOnLoadCallback(function(){
// Replace the codded variable with your own from http://www.google.com/cse/
var customSearchControl = new google.search.CustomSearchControl('<?=$CFG["GOOGLE_CUSTOM_SEARCH_ENGINE_CODE"];?>');
customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
customSearchControl.draw('cse');
customSearchControl.execute('<?=$lng . " " . $tpl2;?>');
}, true);
</script>
			<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />
		</p>
<?else:?>
		<p>
			Google Search Results / Custom Search Engine (CSE)<br />
			<br />
			To add automatically generated Google search results to this page visit <a href="http://www.google.com/cse/">google.com/cse/</a> and setup a new CSE code.  Copy the code (e.g.: 010508916976745981301:bdscggyxyle) into the $CFG["GOOGLE_CUSTOM_SEARCH_ENGINE_CODE"] variable in your config file and your done.
		</p>
<?endif;?>
		</div>
		<div style="clear:both;"></div>
		<p style="margin-bottom:10px;">
			Copyright &copy; {CCMS_LIB:_default.php;FUNC:ccms_dateYear} <a href="http://modusinternet.com" title="Modus Internet : Located in Vancouver and Burnaby British Columbia we do website design, database integration, custom programming, search engine optimization (SEO) or consultation.">Modus Internet</a>. All rights reserved.
		</p>
		<script>
			/*
			Load all CSS first and JS files for your site here.  This has nothing at all to do with CCMS and you can choose to not use if you wish but it can help emensly when optimising your sites with asynchronous downloads.  Test it with Google PageSpeed Insights, https://developers.google.com/speed/pagespeed/insights/.
			*/
			window.onload = function(){
				function loadjscssfile(filename, filetype) {
					if(filetype == "js") {
						var cssNode = document.createElement('script');
						cssNode.setAttribute("type", "text/javascript");
						cssNode.setAttribute("src", filename);
					} else if(filetype == "css") {
						var cssNode = document.createElement("link");
						cssNode.setAttribute("rel", "stylesheet");
						cssNode.setAttribute("type", "text/css");
						cssNode.setAttribute("href", filename);
					}
					if(typeof cssNode != "undefined")
						document.getElementsByTagName("head")[0].appendChild(cssNode);
				}

				loadjscssfile("/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/css/style.css", "css");
				loadjscssfile("//fonts.googleapis.com/css?family=Open+Sans:300&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese", "css");
			};
		</script>
	</body>
</html>









