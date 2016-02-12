<?php
header("Content-Type: text/html; charset=UTF-8");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?><!DOCTYPE html>
<html id="no-fouc" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}" style="opacity: 0;">
	<head>
		<meta charset="utf-8">
		<title>Content Manager</title>
		<meta name="description" content="" />
		{CCMS_TPL:header-head.html}
		<script>
			var navActiveArray = ["content_manager"];
		</script>
	</head>
	<body>
		<div id="wrapper">
			{CCMS_TPL:header-body.php}


			<div id="page-wrapper">
				<div class="row">
					<div class="col-md-12">
						<h1 class="page-header">Content Manager</h1>
						<div class="panel panel-danger">
							<div class="panel-heading">
								Notice
							</div>
							<div class="panel-body">
								<p>This section of the Custodian CMS admin is currently under development.</p>
							</div>
						</div>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec ligula id nisl fringilla finibus. Vestibulum rhoncus, felis at fringilla ullamcorper, ante mi tincidunt nunc, ac ultrices odio odio vitae lorem. Morbi quis elit id urna efficitur aliquam ut et sapien. Fusce porttitor vel ligula faucibus tempor. Pellentesque tincidunt imperdiet enim, id lobortis ipsum tempus id. In facilisis elementum dictum. Donec suscipit ornare tortor, sed volutpat mauris volutpat at. Pellentesque porttitor ut augue at ultrices. Proin egestas semper lorem quis suscipit. Vivamus eget magna tincidunt, semper sem eu, molestie quam. Praesent nisl velit, ultricies ac malesuada id, dapibus in dui. Mauris luctus velit non mi condimentum rhoncus. Nullam sit amet aliquet turpis, id malesuada nulla. Ut sit amet nisl nec ante commodo eleifend.


					</div>
				</div>
			</div>
		</div>


		<script>
			function loadFirst(e,t){var a=document.createElement("script");a.async = true;a.readyState?a.onreadystatechange=function(){("loaded"==a.readyState||"complete"==a.readyState)&&(a.onreadystatechange=null,t())}:a.onload=function(){t()},a.src=e,document.body.appendChild(a)}

			var cb = function() {
				var l = document.createElement('link'); l.rel = 'stylesheet';
				l.href = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css';
				var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);

				var l = document.createElement('link'); l.rel = 'stylesheet';
				l.href = '//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.4.0/metisMenu.min.css';
				var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);

				var l = document.createElement('link'); l.rel = 'stylesheet';
				//l.href = '/{CCMS_LIB:_default.php;FUNC:ccms_cfgUsrDir}/_css/custodiancms.css';
				l.href = '/{CCMS_LIB:_default.php;FUNC:ccms_cfgUsrDir}/_css/custodiancms.min.css';
				var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);

				var l = document.createElement('link'); l.rel = 'stylesheet';
				l.href = '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css';
				var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);

				var l = document.createElement('link'); l.rel = 'stylesheet';
				l.href = '//fonts.googleapis.com/css?family=Open+Sans:300';
				var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);
			};
			var raf = {CCMS_TPL:browser.php}
			if (raf) raf(cb);
			else window.addEventListener('load', cb);

			function loadJSResources() {
				loadFirst("//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js", function(){ // JQuery is loaded
					loadFirst("//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js", function(){ // Bootstrap is loaded
						loadFirst("//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.4.0/metisMenu.min.js", function(){ // MetisMenu JavaScript
							//loadFirst("/{CCMS_LIB:_default.php;FUNC:ccms_cfgUsrDir}/_js/custodiancms.js", function(){ // CustodianCMS JavaScript
							loadFirst("/{CCMS_LIB:_default.php;FUNC:ccms_cfgUsrDir}/_js/custodiancms.min.js", function(){ // CustodianCMS JavaScript

								navActiveArray.forEach(function(s) {
									$("#"+s).addClass("active");
								});

								// Load MetisMenu
								$('#side-menu').metisMenu();

								// Fade in web page.
								$("#no-fouc").delay(250).animate({"opacity": "1"}, 250);

								$("#menu-toggle").click(function(e) {
									e.preventDefault();
									$("#wrapper").toggleClass("toggled");
									$("#wrapper.toggled").find("#sidebar-wrapper").find(".collapse").collapse("hide");
									$("#sidebar-wrapper").toggle();
								});


							});
						});
					});
				});
			}

			if (window.addEventListener)
				window.addEventListener("load", loadJSResources, false);
			else if (window.attachEvent)
				window.attachEvent("onload", loadJSResources);
			else window.onload = loadJSResources;
		</script>
	</body>
</html>
