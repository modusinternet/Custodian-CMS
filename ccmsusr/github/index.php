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
				<h1 class="page-header">GitHub</h1>
				<p>GitHub is the premier tool used by website and software engineers to collaborate and synchronize more than 85 million repositories and projects around the world.  Basically, if your work involves distributing anything through the internet or collaborating with anyone other than yourself, you need to consider setting up an account on GitHub.</p>
				<p>Click here to learn more about how to set up and connect this website to your own GitHub repo now.</p>

				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#status" aria-controls="status" role="tab" data-toggle="tab">Status</a></li>
					<li role="presentation"><a href="#setup" aria-controls="setup" role="tab" data-toggle="tab">Setup</a></li>
					<li role="presentation"><a href="#other" aria-controls="other" role="tab" data-toggle="tab">Other</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="status">

						<?
						// Test to see if shell_exce() is enabled.
						if(is_callable('shell_exec') && false === stripos(ini_get('disable_functions'), 'shell_exec')) {
							// shell_exce() is enabled next test to see if git is installed.

							$output = shell_exec("git --version");
							if(preg_match("/^git version .*/i", $output)) {
								// git is installed.

								$output = shell_exec("git status");
								if(!preg_match("/nothing to commit/i", $output)) {
									// there are changes on the server which need to be synchronized with the repo.
									$warning = "There are changes on the server which need to be synchronized with the repo.";
								}
							} else {
								// git is NOT installed.
								$danger = "git is NOT installed.";
							}
						} else {
							// shell_exce() is NOT enabled so output and error.
							$danger = "shell_exce() is NOT enabled so setup and maintenance of a local git repo or connecting to GitHub via /ccmsuser/github/webhook.php will be impossible.  Contact your server admin and confirm that the PHP function shell_exce() is enabled.";
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
									<pre style="padding: 15px; margin: 15px 0px 20px;">ssh commands to be added later:

git add --all
git commit -m "from server"
git push -u origin master</pre>






								</div>
							</div>
							<h2>git status</h2>
							<? $output = shell_exec("git status"); echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">$output</pre>"; ?>
						<? else: ?>
							<h2>git status</h2>
							<? $output = shell_exec("git status"); echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">$output</pre>"; ?>
						<? endif ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="setup">
						<p style="margin: 15px 0px;">Listed below are the basic setup details to connect your website to a GitHub repository.  For more information about how to setup and maintain Git on your server visit <a href="https://git-scm.com/docs" target="_blank">https://git-scm.com/docs</a>.</p>
					<pre style="padding: 15px; margin: 15px 0px 20px;">
- create a new repository at GitHub (https://github.com/)

- add your web servers public ssh-key (id_rsa.pub) to your new repo on GitHub under 'Settings/Deploy keys',
with 'Allow write access' checked (follow instructions here to generate a new ssh-key if needed:
https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/)

- add a webhook on GitHub under 'Settings/Webhooks' to
'https://YOUR_DOMAIN/ccmsusr/github/webhook.php' (ignor 404 error on first attempt to connect)

- create a new website folder on your server (you must have access to shell, ssh and git services)

- ssh into your server and type the folloing commands:
git clone --depth=1 https://github.com/modusinternet/Custodian-CMS.git /tmp/Custodian-CMS
rm -rf /tmp/Custodian-CMS/.git
shopt -s dotglob
cp -r /tmp/Custodian-CMS/* /home/YOUR_ACCOUNT/YOUR_WEB_FOLDER
rm -rf /tmp/Custodian-CMS
git init
git add --all
git config --global user.email ""
git config --global user.name ""

- test your connection to the GitHub servers via ssh
ssh -T git@github.com

- if successful, type the following commands:
git commit -m "first commit"
git remote add origin git@github.com:YOUR_ACCOUNT_ON_GITHUB/YOUR_REPO_ON_GITHUB.git
git push -u origin master

- eventually, check on GitHub to see if all the files on your web server have been copied

- connect to your new repo on GitHub via GitHub Desktop: https://desktop.github.com/

- connect to your new repo on GitHub via Atom: https://atom.io/</pre>
					</div>
					<div role="tabpanel" class="tab-pane" id="other">
						<?
						$output = shell_exec("git --version");
						if(preg_match("/^git version .*/i", $output)) {
							// git is installed.

							echo "<h2>git --version</h2>";
							echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">$output</pre>";

							$output = shell_exec("git config --list");
							echo "<h2>git config --list</h2>";
							echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">$output</pre>";
						} else {
							// git is NOT installed.
							echo "<h2>git --version</h2>";
							echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">git is NOT installed.</pre>";
						}
						?>
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
