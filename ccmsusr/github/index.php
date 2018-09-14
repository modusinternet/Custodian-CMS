<?php
header("Content-Type: text/html; charset=UTF-8");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if($_SERVER["SCRIPT_NAME"] != "/ccmsusr/index.php") {
	echo "This script can NOT be called directly.";
	die();
}
?><!DOCTYPE html>
<html id="no-fouc" lang="en" style="opacity: 0;">
	<head>
		<meta charset="utf-8">
		<title>GitHub</title>
		<meta name="description" content="" />
		{CCMS_TPL:header-head.html}
		<script>
			var navActiveArray = ["github"];
		</script>
	</head>
	<body>
		<div id="wrapper">
			{CCMS_TPL:header-body.php}

			<div id="page-wrapper">
				<div class="row">
					<div class="col-md-12">
						<h1 class="page-header">GitHub</h1>
						<div class="panel panel-default">
							<div class="panel-body">
								Listed below are the basic setup details to connect your website to a GitHub repository.  For more information about how to setup and maintain Git on your server visit <a href="https://git-scm.com/docs" target="_blank">https://git-scm.com/docs</a>.
							</div>
							<div class="panel-footer">
								<pre style="padding: unset; margin: unset; border: unset;">
- create a new website folder on your server (must have access to ssh and git services)
- ssh into it and type 'git clone git@github.com:modusinternet/Custodian-CMS.git' to pull down the repository
- create a new repository at GitHub
- add your web servers public ssh-key to your new repo on GitHub under 'Settings/Deploy keys'
- from the command line on your server type the following
git init
git add --all
git config --global user.email "noreply@YOUR_DOMAIN.com"
git config --global user.name "Pushed from the server to repo."
- test your connection to the GitHub servers via ssh
ssh -T git@github.com
- if successful, type the following commands
git commit -m "first commit"
git remote add origin git@github.com:YOUR_ACCOUNT_ON_GITHUB/YOUR_REPO_ON_GITHUB.git
git push -u origin master
- eventually, check on GitHub to see if all the files on your web server have been copied
- add a webhook on GitHub under 'Settings/Webhooks' to 'https://YOUR_DOMAIN/ccmsusr/github/webhook.php'
- connect to your new repo on GitHub via GitHub Desktop
- connect to your new repo on GitHub via Atom</pre>
							</div>
						</div>
						<?
						// Test to see if shell_exce() is enabled.
						if(is_callable('shell_exec') && false === stripos(ini_get('disable_functions'), 'shell_exec')) {
							// shell_exce() is enabled next test to see if git is installed.

							$output = shell_exec("git --version");
							if(preg_match("/^git version .*/i", $output)) {
								// git is installed.
								echo "<h2>git --version</h2>";
								echo "<pre>$output</pre>";
								$output = shell_exec("git config --list");
								echo "<h2>git config --list</h2>";
								echo "<pre>$output</pre>";

								/*
								$output = shell_exec("ssh -T git@github.com");
								echo "<h2>ssh -T git@github.com</h2>";
								echo "<pre>$output</pre>";
								*/

								$output = shell_exec("git status");
								if(preg_match("/Untracked files .*/i", $output)) {
									// there are files on the server which need to be uploaded to the repo.
									$warning = "There are files on the server which need to be uploaded to the repo.";
								}
							} else {
								// git is NOT installed.
								$danger = "git is NOT installed.";
							}
						} else {
							// shell_exce() is NOT enabled so output and error.
							$danger = "shell_exce() is NOT enabled so output and error.";
						}
						?>
						<? if($danger): ?>
							<br><div class="panel panel-danger">
								<div class="panel-heading">
									Error
								</div>
								<div class="panel-body">
									<p><?=$danger;?></p>
								</div>
							</div>
						<? elseif($warning): ?>
							<br><div class="panel panel-warning">
								<div class="panel-heading">
									Warning
								</div>
								<div class="panel-body">
									<p><?=$warning;?></p>

									<pre style="padding: unset; margin: unset; border: unset;">ssh commands to be added later:

git add --all
git commit -m "From server"
git push -u origin master</pre>






								</div>
							</div>
							<h2>git status</h2>
							<? $output = shell_exec("git status"); echo "<pre>$output</pre>"; ?>
						<? else: ?>
							<h2>git status</h2>
							<? $output = shell_exec("git status"); echo "<pre>$output</pre>"; ?>
						<? endif ?>

					</div>
				</div>
			</div>
		</div>

		<script>
			function loadFirst(e,t){var a=document.createElement("script");a.async = true;a.readyState?a.onreadystatechange=function(){("loaded"==a.readyState||"complete"==a.readyState)&&(a.onreadystatechange=null,t())}:a.onload=function(){t()},a.src=e,document.body.appendChild(a)}

			var cb = function() {
				var l = document.createElement('link'); l.rel = 'stylesheet';
				l.href = "/ccmsusr/_css/bootstrap-3.3.7.min.css";
				var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);

				var l = document.createElement('link'); l.rel = 'stylesheet';
				l.href = "/ccmsusr/_css/metisMenu-2.4.0.min.css";
				var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);

				var l = document.createElement('link'); l.rel = 'stylesheet';
				l.href = "/ccmsusr/_css/custodiancms.css";
				/*l.href = "/ccmsusr/_css/custodiancms.min.css";*/
				var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);

				var l = document.createElement('link'); l.rel = 'stylesheet';
				l.href = "/ccmsusr/_css/font-awesome-4.7.0.min.css";
				var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);
			};

			var raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;
			if (raf) raf(cb);
			else window.addEventListener('load', cb);

			function loadJSResources() {
				loadFirst("/ccmsusr/_js/jquery-2.2.0.min.js", function() { /* JQuery is loaded */
					loadFirst("/ccmsusr/_js/bootstrap-3.3.7.min.js", function() { /* Bootstrap is loaded */
						loadFirst("/ccmsusr/_js/metisMenu-2.4.0.min.js", function() { /* MetisMenu JavaScript */
							/*loadFirst("/ccmsusr/_js/custodiancms.js", function() { /* CustodianCMS JavaScript */
							loadFirst("/ccmsusr/_js/custodiancms.min.js", function() { /* CustodianCMS JavaScript */

								navActiveArray.forEach(function(s) {$("#"+s).addClass("active");});

								// Load MetisMenu
								$('#side-menu').metisMenu();

								// Fade in web page.
								$("#no-fouc").delay(200).animate({"opacity": "1"}, 500);

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
