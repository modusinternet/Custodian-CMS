<?php
header("Content-Type:text/html; charset=UTF-8");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if($_SERVER["SCRIPT_NAME"] != "/ccmsusr/index.php") {
	echo "This script can NOT be called directly.";
	exit;
}
?><!DOCTYPE html>
<html lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}">
	<head>
		<title><?= $CFG["DOMAIN"];?> | User | Dashboard</title>
		{CCMS_TPL:head-meta.html}
	</head>
	<style>
		{CCMS_TPL:/_css/head-css.html}




		/* VARIABLES */
:root {
  --coal: #3A3A3A;
  --apple: #FF4D3A;
}

/* DEFAULT PROPERTIES */
/*
*, *::before, *::after {
  box-sizing: border-box;
  font: 500 16pt Lato;
  color: #7A7A7A;
  transition: 0.3s all;
  cursor: default;
}
*/

/* CONTAINER PROPERTIES */
/*
body {
  margin: 0;
  padding: 0;
  height: 100vh;
}

nav {
  height: 60px;
  background: var(--coal);
}
*/

#menu-ctn {
	position: absolute;
	top: 20px;
  height: 40px;
	right: 20px;
	cursor: pointer;
}

/*a{cursor:pointer}*/

#menu-cnt {
  /*
	transform: translate(16px, -10px) scale(0.7);
  background: #FFF;
  padding: 20px;
  box-shadow: 1px 2px 1px var(--coal);
  display: none;
	*/

  display: none;
	position: fixed;
top: 80px;
left: 0px;
height: 80%;
overflow: scroll;
}

/* ELEMENT PROPERTIES */
.menu-bars {
  height: 4px;
  width: 30px;
  list-style: none;
  background: var(--cl4);
  margin: 0 7px;
  position: relative;
  top: 18px;
  transition: 0.4s all ease-in;
}

.crossed {
  background: var(--cl1);
}

.dropped {
  display: block!important;


  transition: 0.4s all ease-in;
}

.menu-bars::before, .menu-bars::after {
  content: '';
  position: absolute;
  height: 4px;
  width: 30px;
  list-style: none;
  background: var(--cl4);
}

.menu-bars::before {
  transform: translateY(-10px);
}

.menu-bars::after {
  transform: translateY(10px);
}

.crossed::before {
  animation: rotate-top-bar 0.4s forwards;
}

.crossed::after {
  animation: rotate-bottom-bar 0.4s forwards;
}

.hamburger::before {
  animation: rotate-top-bar-2 0.4s reverse;
}

.hamburger::after {
  animation: rotate-bottom-bar-2 0.4s reverse;
}

/* ANIMATION KEYFRAMES */
@keyframes rotate-top-bar {
  40% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(0) rotate(45deg);
  }
}

@keyframes rotate-bottom-bar {
  40% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(0) rotate(-45deg);
  }
}

@keyframes rotate-top-bar-2 {
  40% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(0) rotate(45deg);
  }
}

@keyframes rotate-bottom-bar-2 {
  40% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(0) rotate(-45deg);
  }
}


	</style>
	<script nonce="{CCMS_LIB:_default.php;FUNC:ccms_csp_nounce}">
		let navActiveItem = ["nav-dashboard"];
		let navActiveSub = [];
	</script>
	<body>
		<main style="">


			<h1>Dashboard</h1>
			<p>This section of the Custodian CMS admin is currently under development.</p>
			<ul>
				<li>Security Alerts</li>
				<li>Access Logs</li>
				<li>System Info</li>
				<li>HTML Minify</li>
				<li>Cache Rendered Templates in Database</li>
				<li>Clear Cache</li>
				<li>About Custodian CMS</li>
				<li>News</li>
				<li>Content Changes/Updates</li>
				<li>Backup/Restore</li>
				<li>Password Recovery attempts currently in the ccms_password_recovery table</li>
				<li></li>
				<li></li>
				<li></li>

				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec ligula id nisl fringilla finibus. Vestibulum rhoncus, felis at fringilla ullamcorper, ante mi tincidunt nunc, ac ultrices odio odio vitae lorem. Morbi quis elit id urna efficitur aliquam ut et sapien. Fusce porttitor vel ligula faucibus tempor. Pellentesque tincidunt imperdiet enim, id lobortis ipsum tempus id. In facilisis elementum dictum. Donec suscipit ornare tortor, sed volutpat mauris volutpat at. Pellentesque porttitor ut augue at ultrices. Proin egestas semper lorem quis suscipit. Vivamus eget magna tincidunt, semper sem eu, molestie quam. Praesent nisl velit, ultricies ac malesuada id, dapibus in dui. Mauris luctus velit non mi condimentum rhoncus. Nullam sit amet aliquet turpis, id malesuada nulla. Ut sit amet nisl nec ante commodo eleifend.



		</main>

		{CCMS_TPL:/body-head.php}

		<script nonce="{CCMS_LIB:_default.php;FUNC:ccms_csp_nounce}">
			{CCMS_TPL:/_js/footer-1.php}

			var l=document.createElement("link");l.rel="stylesheet";
			l.href = "/ccmsusr/_css/custodiancms.css";
			var h=document.getElementsByTagName("head")[0];h.parentNode.insertBefore(l,h);

			var l=document.createElement("link");l.rel="stylesheet";
			l.href = "/ccmsusr/_css/metisMenu-3.0.6.min.css";
			var h=document.getElementsByTagName("head")[0];h.parentNode.insertBefore(l,h);

			function loadJSResources() {
				loadFirst("/ccmsusr/_js/jquery-3.6.0.min.js", function() {
					loadFirst("/ccmsusr/_js/metisMenu-3.0.7.min.js", function() {
						loadFirst("/ccmsusr/_js/custodiancms.js", function() {
							loadFirst("/ccmsusr/_js/jquery-validate-1.19.3.min.js", function() {






$(() => {
	const menu = $('#menu-ctn'),
	bars = $('.menu-bars'),
	content = $('#menu-cnt');

	let firstClick = true,
	menuClosed = true;

	let handleMenu = event => {
		if(!firstClick) {
			bars.toggleClass('crossed hamburger');
		} else {
			bars.addClass('crossed');
			firstClick = false;
		}

		menuClosed = !menuClosed;
		content.toggleClass('dropped');
		event.stopPropagation();
	};

	menu.on('click', event => {
		handleMenu(event);
	});

	$('body').not('#menu-cnt, #menu-ctn').on('click', event => {
		if(!menuClosed) handleMenu(event);
	});

	$('#menu-cnt, #menu-ctn').on('click', event => event.stopPropagation());
});






							});
						});
					});
				});
			}
		</script>
	</body>
</html>
