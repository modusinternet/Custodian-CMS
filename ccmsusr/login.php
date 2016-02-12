<?php
header("Content-Type:text/html; charset=UTF-8");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$message = NULL;

// This line scrubs out all the sessions that are expired.
$qry = $CFG["DBH"]->prepare("DELETE FROM `ccms_session` WHERE `exp` < :first;");
$qry->execute(array(':first' => $CLEAN["SESSION"]["first"]));

if($CLEAN["logout"] == "1") {
	// log out
	$qry = $CFG["DBH"]->prepare("UPDATE `ccms_session` SET `user_id` = NULL WHERE `code` = :code LIMIT 1;");
	$qry->execute(array(':code' => $CLEAN["SESSION"]["code"]));
	$message = "Logout Successful";
} elseif($CLEAN["login"] == "1") {
	// Login credentials posted, test them.
	if(!ccms_badIPCheck($_SERVER["REMOTE_ADDR"])) {
		$message = "There is a problem with your login, your IP Address is currently being blocked.  Please contact the website administrators directly by either phone or email if you feel this message is in error for more information.";
	} elseif($CLEAN["loginEmail"] == "") {
		$message = "'Email' field missing content.";
	} elseif($CLEAN["loginEmail"] == "MAXLEN") {
		$message = "'Email' field exceeded its maximum number of 255 character.";
	} elseif($CLEAN["loginEmail"] == "INVAL") {
		$message = "'Email' field either contains invalid characters or an invalid email address!";

	} elseif($CLEAN["loginPassword"] == "") {
		$message = "'Password' field missing content.";
	} elseif($CLEAN["loginPassword"] == "MINLEN") {
		$message = "'Password' field is too short, must be a minimum of 8 characters.";
	} elseif($CLEAN["loginPassword"] == "INVAL") {
		$message = "Something is wrong with your password, it came up as INVALID when testing is with with an open (.+) expression.";
	}

	if($message == "") {
		$qry = $CFG["DBH"]->prepare("SELECT * FROM `ccms_user` WHERE `email` = :loginEmail && `status` = 1 LIMIT 1;");
		$qry->execute(array(':loginEmail' => $CLEAN["loginEmail"]));
		$row = $qry->fetch(PDO::FETCH_ASSOC);
		if($row) {
			// An active user with the same email address WAS found in the database.
			if($row["hash"] == crypt($CLEAN["loginPassword"], $row["hash"])) {
				// The submitted password matches the hashed password stored on the server.

				// Rehash the password and replace original password hash on the server to make even more secure.
				// See https://alias.io/2010/01/store-passwords-safely-with-php-and-mysql/ for more details.
				$cost = 10;
				$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
				$salt = sprintf("$2a$%02d$", $cost) . $salt;
				$hash = crypt($CLEAN["loginPassword"], $salt);
				$qry = $CFG["DBH"]->prepare("UPDATE `ccms_user` SET `hash` = :hash WHERE `id` = :id LIMIT 1;");
				$qry->execute(array(':hash' => $hash, ':id' => $row["id"]));

				$qry = $CFG["DBH"]->prepare("UPDATE `ccms_session` SET `user_id` = :id, `fail` = 0 WHERE `code` = :code LIMIT 1;");
				$qry->execute(array(':id' => $row["id"], ':code' => $CLEAN["SESSION"]["code"]));

				header("Location: /" . $CLEAN["ccms_lng"] . "/user/");
				die();
			} else {
				// Password failed so we increment the fail field by 1, once it reaches 5 the login page wont
				// even be available to the user anymore till their session expires.
				$CLEAN["SESSION"]["fail"] = $CLEAN["SESSION"]["fail"] + 1;
				$qry = $CFG["DBH"]->prepare("UPDATE `ccms_session` SET `fail` = :fail WHERE `code` = :code LIMIT 1;");
				$qry->execute(array(':fail' => $CLEAN["SESSION"]["fail"], ':code' => $CLEAN["SESSION"]["code"]));
				if($CLEAN["SESSION"]["fail"] >= 5) {
					// Maximum number of fails for this session have been reached.  Do not accept anymore tries till this session record expires.
					header("Location: /");
					die();
				} else {
					$message = "Password failed, please try again.";
				}
			}
		} else {
			// An active user with the same email address WAS NOT found in the database.
			$message = "Login failed, please try again.";
		}
	}
} elseif($CLEAN["SESSION"]["fail"] >= 5) {
	// If the users session record indicates that they have attempted to login 5 or more times and failed; do not
	// show this page at all.  Simply redirect them base to the homepage for this site immediatly.
	header("Location: /");
	die();
}
?><!DOCTYPE html>
<html id="no-fouc" lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}" style="opacity: 0;">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="description" content="" />
		{CCMS_TPL:header-head.html}
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
<?php if(isset($message) && $message != ""): ?>
					<div class="alert alert-danger" style="margin-bottom: 0; margin-top: 20px;">
						<?php echo $message; ?>
					</div>
<?php endif ?>
					<div class="login-panel panel panel-default" style="margin-top: 20px;">
						<div class="panel-heading">
							<h3 class="panel-title">Login - Session Expired</h3>
						</div>
						<div class="panel-body">

							<form action="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/" id="loginForm" method="post">
								<input type="hidden" name="login" value="1">
								<div id="login-status" style="color:#ec7f27; font-weight:bold;"></div>
								<div class="form-group">
									<label for="loginEmail">Email Address</label>
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-at"></i></div>
										<input class="form-control" id="loginEmail" name="loginEmail" placeholder="Email" type="email">
									</div>
								</div>
								<div class="form-group">
									<label for="loginPassword">Password</label>
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-key"></i></div>
										<input class="form-control" id="loginPassword" name="loginPassword" placeholder="Password" type="password">
									</div>
								</div>
								<button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
							</form>

						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-4 col-md-offset-4">
					<a href="//{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}">
						<i class="fa fa-caret-square-o-left"></i> Return
					</a>
					<a href="#" id="loginHelpLink" onclick="$('#loginHelpDiv').css('display', 'block'); $('#loginHelpDiv').scrollView();" style="float: right;">
						Login Help <i class="fa fa-caret-square-o-right"></i>
					</a>
				</div>
			</div>
			<div class="row" id="loginHelpDiv" style="display: none;">
				<div class="col-md-4 col-md-offset-4">


					<div class="panel panel-yellow">
                        <div class="panel-heading">
                            Password Recovery
                        </div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                        </div>
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
						loadFirst("//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js", function(){ // jquery.validate.js is loaded
							loadFirst("//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.min.js", function(){ // additional-methods.js is loaded
								//loadFirst("/{CCMS_LIB:_default.php;FUNC:ccms_cfgUsrDir}/_js/custodiancms.js", function(){ // CustodianCMS JavaScript is loaded
								loadFirst("/{CCMS_LIB:_default.php;FUNC:ccms_cfgUsrDir}/_js/custodiancms.min.js", function(){ // CustodianCMS JavaScript is loaded

									// Fade in web page.
									$("#no-fouc").delay(250).animate({"opacity": "1"}, 250);

									$.validator.addMethod(
										"regex",
										function(value, element, regexp) {
											var re = new RegExp(regexp);
											return this.optional(element) || re.test(value);
										},
										"Please check your input."
									);

									$("#loginForm").validate({
										rules: {
											loginEmail: {
												required: true,
												email: true,
												maxlength: 255
											},
											loginPassword: {
												required: true,
												minlength: 8,
												//regex: "^[^\<\>\&\#]+$"
											}
										},
										messages: {
											loginEmail: {
												required: "Please enter a valid email address.",
												maxlength: "Please try to keep your email address to 255 characters or less."
											},
											loginPassword: {
												required: "Please enter your password.",
												minlength: "Passwords must be at least 8 characters in length.",
												regex: "The following characters are not permited in this field. &gt; &lt; &amp; &#35; Please remove before submitting."
											}
										}
									});











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
