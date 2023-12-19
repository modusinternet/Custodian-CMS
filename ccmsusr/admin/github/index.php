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
if(($json_a["admin"]["sub"]["github"] ?? null) < 1) {
	echo "Access denied.";
	die();
}

$msg = array();

// Test to see if shell_exce() is disabled.
if(!is_callable('shell_exec') && true === stripos(ini_get('disable_functions'), 'shell_exec')) {
	// shell_exce() is disabled.
	$msg["shell_exce"]["error"] = TRUE;
} else {
	// shell_exce() is enabled.
	// Test to see if git is installed.
	$output = trim(shell_exec("git --version"));

	// test to confirm git is installed.
	if(preg_match("/^git version .*/i", $output)) {
		// git is installed.
		$msg["git"]["version"] = $output;

		$output = trim(shell_exec("git status"));
		if($output == "") {
			 $output = "not a git repository";
		}
		if(preg_match("/not a git repository/i", $output)) {
			// git has not been setup to work with a repository under this directory yet.
			$msg["git"]["status"]["error"] = $output;
		} elseif(!preg_match("/nothing to commit/i", $output)) {
			// There is something wrong with this repository, you might need to access it from the commandline and add/commit/push unresolved files first.
			$msg["git"]["status"]["warning"] = $output;

			// build and easier list of problem files to read from.
			$output = trim(shell_exec("git status --porcelain | cut -c4-"));
			$msg["git"]["status2"]["output"] = $output;
		} else {
			// All is well, looks like there is nothing to commit here.
			$msg["git"]["status"] = $output;
		}

		$output = trim(shell_exec("git config --list"));
		$msg["git"]["config"] = $output;

		if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/.gitignore")) {
			$msg["gitignore"] = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/.gitignore");
		}
	} else {
		// git is NOT installed.
		$msg["git"]["error"] = $output;
	}
}
?><!DOCTYPE html>
<html lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}">
	<head>
		<title><?= $_SERVER["SERVER_NAME"];?> | User | GitHub</title>
		{CCMS_TPL:head-meta.html}
	</head>
	<style>
		{CCMS_TPL:/_css/head-css.html}

		.tabs{
			border-bottom:1px solid var(--cl3);
			overflow:hidden
		}

		.tabs button{
			background-color:var(--cl4);
			border-radius:4px 4px 0 0;
			color:var(--cl8);
			cursor:pointer;
			float:left;
			font-family:inherit;
			font-size:inherit;
			font-weight:inherit;
			margin-right:2px;
			outline:none;
			padding:14px 16px;
			transition:0.3s;
			width: unset
		}

		.tabs button:hover, .tabs button:hover svg path{
			background-color:var(--cl3);
			color:var(--cl0)
		}

		.tabs button.active, .tabs button.active svg path{
			background-color:var(--cl3);
			color:var(--cl0)
		}

		.tabs button:hover svg path{
			background-color:var(--cl4);
			fill:var(--cl0)
		}

		.tabs button.active svg path{
			background-color:var(--cl4);
			fill:var(--cl0)
		}

		.tabs button svg path{fill:var(--cl5)}

		.tabContent{
			display:none;
			padding:20px 0px
		}

		#tab03Content>div>ul{margin-left:20px}

		#tab03Content>div>ul li{padding-left:20px}
	</style>
	<script nonce="{CCMS_LIB:_default.php;FUNC:ccms_csp_nounce}">
		let navActiveItem = ["nav-admin","nav-admin-github"];
		let navActiveSub = [];
		let navActiveW3schoolsItem = [];
	</script>
	<body>
		<main style="padding:20px 20px 20px 0">
			<h1 style="border-bottom:1px dashed var(--cl3)">Admin | GitHub</h1>
			<p>GitHub is the premier tool used by website developers and software engineers to collaborate on more than 100 million repositories and projects around the world.</p>

			<div class="tabs">
				<button class="tab active" id="tab01Title" role="tab">Status</button>
				<button class="tab" id="tab02Title" role="tab">Details</button>
				<button class="tab" id="tab03Title" role="tab">Setup</button>
			</div>




			<div id="tab01Content" class="tabContent" style="display:block">
<? if(isset($msg["shell_exce"]["error"])): ?>
				<p>Unable to call shell_exce().  Confirm your account has access to this function with your administrator before continuing.</p>
<? elseif(isset($msg["git"]["error"])): ?>
				<p>.git is either NOT installed or you do not have access to git from this account.  Confirm with your administrator before continuing.</p>
				<pre style="padding: 15px; margin: 15px 0px 20px;"><?=$msg["git"]["error"];?></pre>
<? else: ?>
				<h2>git status</h2>
<? if(isset($msg["git"]["status"]["error"])): ?>
				<p>No .git repository setup in this directory or any of it's parent directories yet.  <a class="href-to-setup" href="#setup">Click here</a> to learn more about how to set up and connect this website to your own GitHub repository.</p>
				<pre style="padding:15px;margin:15px 0px 20px">fatal: not a git repository (or any of the parent directories): .git</pre>
<? elseif(isset($msg["git"]["status"]["warning"])): ?>
				<p>There is something wrong with this repository, you might need to access it from the command-line and run add/commit/push manunally to fix it.</p>
				<pre style="padding: 15px; margin: 15px 0px 20px;"><?=$msg["git"]["status"]["warning"];?></pre>
				<p>(Easier to read file list, remember all files listed are located relative to the document root of your website.)</p>
				<pre style="padding: 15px; margin: 15px 0px 20px;"><?=$msg["git"]["status2"]["output"];?></pre>
				<p>Note: Pushing from your server to a GitHub repository is not recommended for security reasons which is why it is not an automated feature in Custodian CMS.  Use the two commands below if needed.</p>
				<p class="boxed">
					git commit -am "from server"<br>
					git push
				</p>
				<p>Note: Or, if all you want to do is overwrite a single file on your server with what's currently on the GitHub repo you can try the following command. (NOTE: You may need to navigate into the dir that contains the file you want to overwrite first.)</p>
				<p class="boxed">
					git checkout origin/master -- {filename}<br>
					git checkout -- .htaccess<br>
					git checkout origin/main -- ccmstpl/examples/index.html
				</p>
<? else: ?>
				<p>Success</p>
				<pre style="padding:15px;margin:15px 0px 20px"><code><?=$msg["git"]["status"];?></code></pre>
	<? endif ?>
<? endif ?>
			</div>




			<div id="tab02Content" class="tabContent">
				<h2>git --version</h2>
				<pre style="padding: 15px; margin: 15px 0px 20px;"><code><?=$msg["git"]["version"];?></code></pre>
				<h2>git config --list</h2>
				<pre style="padding: 15px; margin: 15px 0px 20px;"><code><?=$msg["git"]["config"];?></code></pre>
				<h2>.gitignore</h2>
<? if(isset($msg["gitignore"])): ?>
				<pre style="padding: 15px; margin: 15px 0px 20px;"><code><?=$msg["gitignore"];?></code></pre>
<? else: ?>
				<pre style="padding: 15px; margin: 15px 0px 20px;">.gitignore not found.</pre>
<? endif ?>
			</div>




			<div id="tab03Content" class="tabContent">
				<p style="margin: 15px 0px;">Listed below are the basic setup details to connect your website to a GitHub repository.  For more information about how to setup and maintain Git on your server visit <a href="https://git-scm.com/docs" target="_blank">https://git-scm.com/docs</a>.</p>
				<h2>Repository and Webserver Setup</h2>
				<ol style="margin:0 30px">
					<li>Create a new repository at GitHub. (<a href="https://github.com" target="_blank">https://github.com</a>)</li>
					<li>Add your web servers public ssh-key (id_rsa.pub) to your GitHub account under "Settings/SSH and GPG keys". (Follow instructions here to generate a new ssh-key if needed: <a href="https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/" target="_blank">https://help.github.com/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent/</a>)</li>
					<li>Add a webhook on GitHub under "Settings/Webhooks": https://<?=$CFG["DOMAIN"];?>/ccmsusr/admin/github/webhook.php</li>
					<li>Create a new website folder on your server. (You must have access to shell, ssh and git services.)</li>
				</ol>
				<h2>Copy Custondian CMS Templates to Webserver</h2>
				<p style="margin: 15px 0px;">You can download the latest master version of the Custodian CMS templates from <a href="https://github.com/modusinternet/Custodian-CMS/archive/master.zip" target="_blank">GitHub</a> directly or use the <a href="https://github.com/modusinternet/Custodian-CMS-Download" target="_blank">Custodian CMS Download</a>.  If you prefer SSH, log into your server and type the following on the command-line.</p>
				<ol style="margin:0 30px">
					<li>git clone --depth=1 https://github.com/modusinternet/Custodian-CMS.git /tmp/Custodian-CMS</li>
					<li>rm -rf /tmp/Custodian-CMS/.git</li>
					<li>shopt -s dotglob</li>
					<li>cp -r /tmp/Custodian-CMS/* /THE_PATH_TO_YOUR_WEBSITES_DOCUMMENT_ROOT</li>
					<li>rm -rf /tmp/Custodian-CMS</li>
				</ol>
				<h2>Initialize git on the Webserver</h2>
				<p style="margin: 15px 0px;">Once you've finished moving a copy of the Custodian CMS templates into place initialize git at the document root of the website and connect it to your GitHub repository.</p>
				<ol style="margin:0 30px">
					<li>Test your connection to the GitHub servers via ssh:<br>
						ssh -T git@github.com<br>
						If successful, type the following commands:</li>
					<li>git init</li>
					<li>git add .</li>
					<li>git config --global user.email "noreply@<?=$CFG["DOMAIN"];?>"</li>
					<li>git config --global user.name "YOUR_NAME"</li>
					<li>git commit -m "first commit"</li>
					<li>git remote add origin git@github.com:YOUR_ACCOUNT_ON_GITHUB/YOUR_REPO_ON_GITHUB.git</li>
					<li>git push -u origin master</li>
				</ol>
				<h2>Install Local Software</h2>
				<ol style="margin:0 30px">
					<li>Check GitHub to see if all the files on your web server have been copied over.</li>
					<li>Install GitHub Desktop (<a href="https://desktop.github.com" target="_blank">https://desktop.github.com</a>) on your PC and File/Clone Repository to somewhere on your computer.</li>
					<li>Install the Atom editor (<a href="https://atom.io" target="_blank">https://atom.io</a>) and go to "File/Add Project Folder" and select the document root folder containing the local copy of your repositories.  You should now be able to make changes using Atom, commit your changes to GitHub which will automaticaly submit them to your live website using the webhook.</li>
				</ol>
			</div>




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


							/* user_dropdown START */
							/* When the user clicks on the svg button add the 'show' class to the dropdown box below it. */
							$("#user_dropdown_btn").click(function() {
								$("#user_dropdown_list").addClass("show");
							});


							/* Hide dropdown menu on click outside */
							$(document).on("click", function(e){
								if(!$(e.target).closest("#user_dropdown_btn").length){
									$("#user_dropdown_list").removeClass("show");
								}
							});
							/* user_dropdown END */


							loadFirst("/ccmsusr/_js/jquery-validate-1.19.3.min.js", function() {
								loadFirst("/ccmsusr/_js/additional-methods-1.17.0.min.js", function() {




									document.getElementById("tab01Title").addEventListener("click", () => {
										let i, tabContent, tab;
										/* De-activate all tabs. */
										tab = document.getElementsByClassName("tab");
										for(i=0; i<tab.length; i++){
											tab[i].className = tab[i].className.replace(" active","");
										}
										/* Hide all tab content areas. */
										tabContent = document.getElementsByClassName("tabContent");
										for(i=0; i<tabContent.length; i++){
											tabContent[i].style.display = "none";
										}
										/* Activate the tab. */
										document.getElementById("tab01Title").className += " active";
										/* Display the content area for the above tab. */
										document.getElementById("tab01Content").style.display = "block";
									});


									document.getElementById("tab02Title").addEventListener("click", () => {
										let i, tabContent, tab;
										/* De-activate all tabs. */
										tab = document.getElementsByClassName("tab");
										for(i=0; i<tab.length; i++){
											tab[i].className = tab[i].className.replace(" active","");
										}
										/* Hide all tab content areas. */
										tabContent = document.getElementsByClassName("tabContent");
										for(i=0; i<tabContent.length; i++){
											tabContent[i].style.display = "none";
										}
										/* Activate the tab. */
										document.getElementById("tab02Title").className += " active";
										/* Display the content area for the above tab. */
										document.getElementById("tab02Content").style.display = "block";
									});


									document.getElementById("tab03Title").addEventListener("click", () => {
										let i, tabContent, tab;
										/* De-activate all tabs. */
										tab = document.getElementsByClassName("tab");
										for(i=0; i<tab.length; i++){
											tab[i].className = tab[i].className.replace(" active","");
										}
										/* Hide all tab content areas. */
										tabContent = document.getElementsByClassName("tabContent");
										for(i=0; i<tabContent.length; i++){
											tabContent[i].style.display = "none";
										}
										/* Activate the tab. */
										document.getElementById("tab03Title").className += " active";
										/* Display the content area for the above tab. */
										document.getElementById("tab03Content").style.display = "block";
									});




								});
							});
						});
					});
				});
			}
		</script>
	</body>
</html>
