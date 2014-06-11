<!DOCTYPE html>
	<!--[if lt IE 7 ]><html class="ie ie6" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if IE 7 ]><html class="ie ie7" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if IE 8 ]><html class="ie ie8" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <![endif]-->
	<!--[if (gte IE 9)|!(IE)]><!--><html lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>400 ERROR | <?=$CFG["DOMAIN"];?></title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<!-- Mobile Specific Metas -->
		<link rel="stylesheet" href="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/css/style.css" />
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/favicon.ico" />
	</head>
	<body>
		<a href="http://{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}" style="text-decoration:none; border:0 none;">
			<img alt="" class="scale" src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgTplDir}/img/hdr-940.png" title="" />
		</a>
		<p>
			Current Location:
			/ <a href="http://<?=$CFG["DOMAIN"];?>">Homepage</a>
			/ <span style="border-bottom:1px dotted #ec7f27;">404 ERROR</span>
		</p>
		<div style="float:left; width:300px;">
			<h3 style="margin-top:0px;">400 ERROR:</h3>
			<p style="color:red;"><?=htmlspecialchars($_SERVER["REQUEST_URI"]);?> not found.  The request cannot be fulfilled due to bad syntax.</p>
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
			<p><?=$CFG["DOMAIN"];?> Alternate Language Search Results<br />
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
?></p>
<?if($CFG["GOOGLE_CUSTOM_SEARCH_ENGINE_CODE"] != ""):?>
		<p>
			Google Search Results<br />
			<br />
<!-- http://www.google.com/cse/ -->
<!-- The following code comes from http://www.binaryturf.com/add-related-posts-widget-google-cse-retain-engage-visitors/ -->
<div id="cse" style="width:100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
google.load('search', '1', {language : '<?=$lng;?>'});
google.setOnLoadCallback(function(){
// Replace the codded variable with your own from http://www.google.com/cse/
var customSearchControl = new google.search.CustomSearchControl('<?=$CFG["GOOGLE_CUSTOM_SEARCH_ENGINE_CODE"];?>');
customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
customSearchControl.draw('cse');
customSearchControl.execute('<?=$lng . " " . $tpl2;?>');
}, true);
//]]>
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
	</body>
</html>