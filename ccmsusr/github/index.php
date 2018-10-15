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

				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#status" aria-controls="status" role="tab" data-toggle="tab">Status</a></li>
					<li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
					<li role="presentation"><a href="#setup" aria-controls="setup" role="tab" data-toggle="tab">Setup</a></li>
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
									// there are changes on the server which need to be synchronized with your GitHub repo.
									$warning = "There are changes on the server which need to be synchronized with your GitHub repo.  If you have shell-level access to the account on your server running this website, you may use the following ssh calls from the command line to push changes up to your GitHub repository.";
								}
							} else {
								// git is NOT installed.
								$danger = 'git is NOT installed.  <a href="#setup">Click here</a> to learn more about how to set up and connect this website to your own GitHub repository.';
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
									<p class="boxed"><?=$danger;?></p>
								</div>
							</div>
						<? elseif($warning): ?>
							<br><div class="panel panel-warning">
								<div class="panel-heading">
									Warning
								</div>
								<div class="panel-body">
									<p class="boxed"><?=$warning;?></p>
									<p class="boxed">git add .<br>
										git commit -m "from server"<br>
										git push -u origin master</p>
									<p>Note: Pushing from your server to a repo is generally not recommended for security reasons which is why it is not offered here as a standard feature.</p>
								</div>
							</div>
							<h2>git status</h2>
							<? $output = shell_exec("git status"); echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">$output</pre>"; ?>
							(Easier to read; remember all files listed are located relative to the document root of your website.)
							<? $output = shell_exec("git status --porcelain | cut -c4-"); echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">$output</pre>"; ?>
						<? else: ?>
							<h2>git status</h2>
							<? $output = shell_exec("git status"); echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">$output</pre>"; ?>
						<? endif ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="details">
						<?
						$output = shell_exec("git --version");
						if(preg_match("/^git version .*/i", $output)) {
							// git is installed.

							echo "<h2>git --version</h2>";
							echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">$output</pre>";

							$output = shell_exec("git config --list");
							echo "<h2>git config --list</h2>";
							echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">$output</pre>";

							echo "<h2>/.gitignore</h2>";
							echo "<pre style=\"padding: 15px; margin: 15px 0px 20px;\">";
							if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/.gitignore")) {
								echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/.gitignore");
							} else {
								echo ".gitignore not found";
							}
							echo "</pre>";
						} else {
							// git is NOT installed.
							echo "<h2>git --version</h2>";
							echo "<p class=\"boxed\">git is NOT installed.</p>";
						}
						?>
					</div>
					<div role="tabpanel" class="tab-pane" id="setup">
						<p style="margin: 15px 0px;">Listed below are the basic setup details to connect your website to a GitHub repository.  For more information about how to setup and maintain Git on your server visit <a href="https://git-scm.com/docs" target="_blank">https://git-scm.com/docs</a>.</p>
						<h2>Repository and Webserver Setup</h2>
						<ol class="boxed">
							<li>Create a new repository at GitHub. (<a href="https://github.com" target="_blank">https://github.com</a>)</li>
							<li>Add your web servers public ssh-key (id_rsa.pub) to your new repo on GitHub under 'Settings/Deploy keys', with 'Allow write access' checked. (Follow instructions here to generate a new ssh-key if needed: <a href="https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/" target="_blank">https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/</a>)</li>
							<li>Add a webhook on GitHub under 'Settings/Webhooks' to 'https://YOUR_DOMAIN/ccmsusr/github/webhook.php'.<br>
								(Note: Ignor the 404 error on first attempt to connect.)</li>
							<li>Create a new website folder on your server. (You must have access to shell, ssh and git services.)</li>
						</ol>
						<h2>Copy Custondian CMS Templates to Webserver</h2>
						<p style="margin: 15px 0px;">SSH into your server and type the following on the command-line if you have not already downloaded a copy of the Custodian-CMS repository templates</p>
						<ol class="boxed">
							<li>git clone --depth=1 https://github.com/modusinternet/Custodian-CMS.git /tmp/Custodian-CMS</li>
							<li>rm -rf /tmp/Custodian-CMS/.git</li>
							<li>shopt -s dotglob</li>
							<li>cp -r /tmp/Custodian-CMS/* /THE_PATH_TO_YOUR_WEBSITES_DOCUMMENT_ROOT</li>
							<li>rm -rf /tmp/Custodian-CMS</li>
						</ol>
						<h2>Initialize git on the Webserver</h2>
						<p style="margin: 15px 0px;">Once you've finished moving a copy of the Custodian CMS templates into place by either the method described above or using the <a href="https://github.com/modusinternet/Custodian-CMS-Installer" target="_blank">Custodian CMS Installer</a> you need to Initialize git at the document root of the website and connect it to your GitHub repository.</p>
						<ol class="boxed">
							<li>git init</li>
							<li>git add --all</li>
							<li>git config --global user.email "noreply@YOUR_DOMAIN.com"</li>
							<li>git config --global user.name "YOUR_NAME"</li>
							<li>Test your connection to the GitHub servers via ssh:<br>
							ssh -T git@github.com</li>
							<li>If successful, type the following commands:<br>
							git commit -m "first commit"<br>
							git remote add origin<br>
							git@github.com:YOUR_ACCOUNT_ON_GITHUB/YOUR_REPO_ON_GITHUB.git<br>
							git push -u origin master</li>
						</ol>
						<h2>Install Local Software</h2>
						<ol class="boxed">
							<li>Check GitHub to see if all the files on your web server have been copied over.</li>
							<li>Install GitHub Desktop (<a href="https://desktop.github.com" target="_blank">https://desktop.github.com</a>) on your PC and connect to your repositories on GitHub.  Tell GitHub Desktop where you want a copy of your repo on GitHub to be downloaded locally.</li>
							<li>Install the Atom editor (<a href="https://atom.io" target="_blank">https://atom.io</a>) and go to File/Add Project Folder and select the document root folder containing the local copy of your repositories.</li>
						</ol>
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
				/* l.href = "/ccmsusr/_css/custodiancms.css"; */
				l.href = "/ccmsusr/_css/custodiancms.min.css";
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
