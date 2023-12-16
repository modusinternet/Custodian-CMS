<?php
header("Content-Type: text/html; charset=UTF-8");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if($_SERVER["SCRIPT_NAME"] != "/ccmsusr/index.php") {
	echo "This script can NOT be called directly.";
	die();
}

/* Confirm privilages to access this page. */
$json_a = json_decode($_SESSION["PRIV"], true);
if(($json_a["admin"]["sub"]["user_privileges"] ?? null) < 1) {
	echo "Access denied.";
	die();
}

?><!DOCTYPE html>
<html lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}">
	<head>
		<title><?= $_SERVER["SERVER_NAME"];?> | User | Admin | User Privileges</title>
		{CCMS_TPL:head-meta.html}
	</head>
	<style>
		{CCMS_TPL:/_css/head-css.html}
	</style>
	<script nonce="{CCMS_LIB:_default.php;FUNC:ccms_csp_nounce}">
		let navActiveItem = ["nav-admin","nav-admin-user_privileges"];
		let navActiveSub = [];
		let navActiveW3schoolsItem = [];
	</script>
	<body>
		<main style="padding:20px 20px 20px 0">
			<h1 style="border-bottom:1px dashed var(--cl3)">Admin | User Privileges</h1>
			<p>This section is still under development, but if you come across any unresolved issues please let us know at: <a class="ccms_a" href="mailto:info@custodiancms.org?subject=unresolved+issue+report">info@custodiancms.org</a></p>



			{CCMS_TPL:/footer.html}
		</main>

		{CCMS_TPL:/body-head.php}
		<script nonce="{CCMS_LIB:_default.php;FUNC:ccms_csp_nounce}">
			{CCMS_TPL:/_js/footer-1.php}

			/*
			Argument details for ccms_build_js_link() and example_build_js_link() function calls:
			arg1 = (1 = append AWS link), (empty = do not append AWS link)
			arg2 = (1 = append language code to link), (empty = do not append language code to link)	In other words, send it through the parser first like a normal template. ie: https://yourdomain.com/en/somefile.css, adding the 'en' will push this template through the parser first before outputting it to the browser.
			arg3 = a variable found in the config file that represents a partial pathway to the style sheet, not including and details about AWS, language code, or language direction)
			arg4 = (1 = append language direction to link), (empty = do not append language direction to link)
			arg5 = Version number, this is very helpful when trying to update files like css and js that don't get called by serviceWorker after they are stored. (empty = do not append '?v=some_number' to the URL.)

			Argument details for example_build_js_sri() function calls:
			arg1 = 1 = build sri code based on version stored on AWS.  empty = build sri code based on version stored on our own server.
			arg2 = a variable found in the config file that represents a partial pathway to the style sheet. (Not including details about AWS, language code, or language direction)
			*/
			{CCMS_LIB:_default.php;FUNC:ccms_build_css_link("","","CSS-02","","")}
			{CCMS_LIB:_default.php;FUNC:ccms_build_css_link("","","metisCSS","","")}

			function loadJSResources() {
				loadFirst("{CCMS_LIB:_default.php;FUNC:ccms_build_js_link("","","JQUERY","","")}", function() {
					loadFirst("/ccmsusr/_js/metisMenu-3.0.7.min.js", function() {
						loadFirst("/ccmsusr/_js/custodiancms.js", function() {
							loadFirst("/ccmsusr/_js/jquery-validate-1.19.3.min.js", function() {
								loadFirst("/ccmsusr/_js/additional-methods-1.17.0.min.js", function() {




								});
							});
						});
					});
				});
			}
		</script>
	</body>
</html>
