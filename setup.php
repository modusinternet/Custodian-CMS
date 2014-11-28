<?php
header("Content-Type: text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(!($_SERVER["SCRIPT_NAME"] == "/index.php")) {
	echo "This script can not be called directly.";
	die();
}

@include "ccmspre/config.php";
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Custodian CMS v<?php echo $CFG["VERSION"];?></title>
		<meta name="author" content="Custodian CMS, developed by Vincent Hallberg of Modus Internet (modusinternet.com).  Port Coquitlam, British Columbia, Canada." />
		<meta name="description" content="Welcome to Custodian CMS, a multilingual, template and content management system.  Write one template, using one domain, on one server and support multipule languages." />
		<meta name="keywords" content="custodian CMS, content managment system, multilingual, multipule languages, modus internet" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- Favicons -->
		<link rel="shortcut icon" href="/ccmstpl/examples/img/icons/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/ccmstpl/examples/img/icons/favicon.ico" type="image/x-icon">

		<!-- App Screen / Icons -->
		<!--
		Specifying a Webpage Icon for Web Clip
			Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html
		-->
		<link rel="apple-touch-icon" href="/ccmstpl/examples/img/icons/sptouch-icon-iphone.min.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/ccmstpl/examples/img/icons/touch-icon-ipad.min.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/ccmstpl/examples/img/icons/touch-icon-iphone-retina.min.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/ccmstpl/examples/img/icons/touch-icon-ipad-retina.min.png">

		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="/ccmstpl/examples/img/icons/ipad-landscape.min.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="/ccmstpl/examples/img/icons/ipad-portrait.min.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="/ccmstpl/examples/img/icons/iphone.min.png" media="screen and (max-device-width: 320px)">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries.
		WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:300&amp;amp;subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese">
		<style type="text/css">
			html, body, div, span, h2, p, a, img, ol, ul, li { border: 0px; color: rgb(102, 102, 102); font: 16px/1.7 'Open Sans'; margin: 0px; -webkit-font-smoothing: antialiased; }
			body { background: #fff; padding: 20px; }
			a, a:visited { border: 0px none; color: rgb(236, 127, 39); text-decoration: none; outline: 0px; }
			img { margin-bottom: 10px; }
			.scale { max-width: 100%; height: auto; }
			h2 { color: rgb(134, 177, 53); font-size: 200%; margin: 25px 0 10px; }
			ul, ol { margin-bottom: 20px; }
			ul { list-style: none; }
			ul.circle { list-style: circle outside; }
			.oj { color: rgb(236, 127, 39); }
			.fail { font-size: 150%; }
			.pass { font-size: 150%; color: rgb(134, 177, 53); }
		</style>
	</head>
	<body>
		<a href="#" style="text-decoration: none; border: 0 none;">
			<img alt="Custodian CMS Banner.  Easy gears no spilled beers." class="scale" title="Custodian CMS Banner.  Easy gears no spilled beers." src="/ccmstpl/examples/img/ccms-logo-banner-large-en.png" />
		</a><br />
		@Version
		<p style="margin-left: 20px;">
			<?php echo $CFG["VERSION"];?> (Release Date: <?php echo $CFG["RELEASE_DATE"];?>)
		</p><br />
		@Copyright (&copy;) <?php echo date("Y");?>
		<p style="margin-left: 20px;">
			<a href="http://modusinternet.com" target="_blank" title="Modus Internet : Located in Port Coquitlam, British Columbia we can help you with your website design, custom programming, database integration, search engine optimization (SEO) and/or consultation.">Modus Internet</a>, all rights reserved.<br />
			<br />
			This library is free software; you can redistribute it and/or modify it under the terms of the GNU Lesser General Public License as published by the Free Software Foundation; either version 2.1 of the License, or (at your option) any later version.<br />
			<br />
			This library is distributed in the hope that it will be useful, but	WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for more details.<br />
			<br />
			Visit <a href="http://www.gnu.org/copyleft/lesser.html" target="_blank">http://www.gnu.org/copyleft/lesser.html</a> to read; or write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA for a copy.
		</p>
		<h2>Custodian CMS Setup Instructions</h2>
		<p>
			In order to fully activate your new templates you need to manually complete the following steps.
		</p>
		<ol>
			<li>Make a copy of <span class="oj">/ccmspre/config_original.php</span> and name it <span class="oj">/ccmspre/config.php</span>.</li>
			<li>Make a copy of <span class="oj">/ccmspre/user_whitelist_original.php</span> and name it <span class="oj">/ccmspre/user_whitelist.php</span>.</li>
			<li>Update <span class="oj">/ccmspre/config.php</span> with your domain name and database settings.</li>
			<li>Import the contents of the <span class="oj">/ccms-db-setup.sql</span> file into your database.</li>
			<li>Delete or rename the <span class="oj">/setup.php</span> file and reload this page.</li>
		</ol>
		<p>
			For more information or documentation about Custodian CMS <a href="http://modusinternet.com/en/products/custodian-cms.html" target="_blank">click here</a>.
		</p>
		<h2>Setup Tests</h2>
		<ul class="circle">
			<li><?php

echo 'Test for minimum <span class="oj">PHP version</span> compliance (v5.3.2+): ';
if(version_compare(phpversion(), '5.3.2', '>=')) {
    echo '<span class="pass">Pass</span>';
	$CFG["phpvflag"] = 1;
} else {
	echo '<span class="fail oj">Fail </span>(v' . phpversion() . ')';
	$CFG["phpvflag"] = 0;
}

			?></li>
			<li><?php

echo 'Test for the existence of <span class="oj">/ccmspre/config.php</span>: ';
if(file_exists("ccmspre/config.php")) {
	echo '<span class="pass">Pass</span>';
	$CFG["dbflag"] = 1;
} else {
	echo '<span class="fail oj">Fail</span>';
	$CFG["dbflag"] = 0;
}

			?></li>
			<li><?php

echo 'Test for the existence of <span class="oj">/ccmspre/user_whitelist.php</span>: '.(file_exists("ccmspre/user_whitelist.php") ? '<span class="pass">Pass</span>' : '<span class="fail oj">Fail</span>');

			?></li>
			<li><?php

echo 'Test for the existence of a <span class="oj">domain name</span> inside <span class="oj">/ccmspre/config.php</span>: ';
if($CFG["dbflag"] == 0) {
	echo '<span class="fail oj">Not Tested</span>';
} else {
	if($CFG["DOMAIN"]) {
		echo '<span class="pass">Pass</span>';
	} else {
		echo '<span class="fail oj">Fail</span>';
		$CFG["dbflag"] = 0;
	}
}

			?></li>
			<li><?php

echo 'Test for the existence of <span class="oj">database settings</span> inside <span class="oj">/ccmspre/config.php</span>: ';
if($CFG["dbflag"] == 0) {
	echo '<span class="fail oj">Not Tested</span>';
} else {
	if($CFG["DB_HOST"] && $CFG["DB_USERNAME"] && $CFG["DB_PASSWORD"] && $CFG["DB_NAME"]) {
		echo '<span class="pass">Pass</span>';
	} else {
		echo '<span class="fail oj">Fail</span>';
		$CFG["dbflag"] = 0;
	}
}

			?></li>
			<li><?php

echo 'Test for the ability to <span class="oj">connect</span> to your database: ';
if($CFG["dbflag"] == 0) {
	echo '<span class="fail oj">Not Tested</span>';
} else {
	$host		= $CFG["DB_HOST"];
	$dbname		= $CFG["DB_NAME"];
	$user		= $CFG["DB_USERNAME"];
	$pass		= $CFG["DB_PASSWORD"];
	try {
		$CFG["DBH"] = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, array(PDO::ATTR_PERSISTENT => true));
		// Sets encoding UTF-8
		$CFG["DBH"]->exec("SET CHARACTER SET utf8");
		$CFG["DBH"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo '<span class="pass">Pass</span>';
	} catch(PDOException $e) {
		echo '<span class="fail oj">Fail</span> ';
		echo "( Error: " . $e->getCode() . ' '. $e->getMessage() . ")";
		$CFG["dbflag"] = 0;
	}
}

			?></li>
			<li><?php

echo 'Test for minimum <span class="oj">MySQL version</span> compliance (v4.1+): ';
if($CFG["dbflag"] == 0) {
	echo '<span class="fail oj">Not Tested</span>';
} else {
	$val = $CFG["DBH"]->getAttribute(constant("PDO::ATTR_SERVER_VERSION"));
	$valArray = explode("-", $val);
	if($valArray[0] >= 4.1) {
		echo '<span class="pass">Pass</span>';
	} else {
		echo '<span class="fail oj">Fail </span><span style="font-size: 100%;">Fail </span>(v' . $valArray[0] . ')';
		$CFG["dbflag"] = 0;
	}
}

			?></li>
			<li><?php

			echo 'Test for the existence of <span class="oj">pre-populated content</span> within your database: ';
if($CFG["dbflag"] == 0) {
	echo '<span class="fail oj">Not Tested</span>';
} else {
	try {
		$nRows = @$CFG["DBH"]->query('select count(*) from `ccms_lng_charset`')->fetchColumn();
		if($nRows > 0) {
			echo '<span class="pass">Pass</span>';
		} else {
			echo '<span class="fail oj">Fail </span>(ccms_lng_charset table appears to be empty.)';
			$CFG["dbflag"] = 0;
		}
	} catch(Exception $e) {
		echo '<span class="fail oj">Fail </span>(ccms_lng_charset table appears to be missing.)';
		$CFG["dbflag"] = 0;
	}
}

			?></li>
		</ul>
		<p><?php if($CFG["phpvflag"] && $CFG["dbflag"]): ?>
			<span style="color: rgb(134, 177, 53);">Congratulations, you have passed all the minimum requirements necessary to run Custodian CMS properly on your server.  You need to delete or rename the /setup.php template now to continue.</span>
		<?php else: ?>
			<span class="oj">Setup has failed, it appears you still have a couple steps to complete.</span>
		<?php endif ?></p>
		<p style="margin:10px 0; text-align: right;">
			Copyright &copy; <?php echo date("Y");?> <a href="http://modusinternet.com" target="_blank" title="Modus Internet : Located in Port Coquitlam, British Columbia we can help you with your website design, custom programming, database integration, search engine optimization (SEO) and/or consultation.">Modus Internet</a>, all rights reserved.
		</p>
	</body>
</html>