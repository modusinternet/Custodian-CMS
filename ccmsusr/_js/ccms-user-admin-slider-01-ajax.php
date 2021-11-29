<?php
header("Content-Type:text/html; charset=UTF-8");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!strstr($_SERVER["HTTP_REFERER"], $CFG["DOMAIN"])) {
	exit("Invalid submission, your POST does not appeared to have been submitted from the " . $CFG["DOMAIN"] . " website.");
}

/*
if (!ccms_badIPCheck($_SERVER["REMOTE_ADDR"])) {
    exit("There is a problem with your message, it can not be posted using this form from your current IP Address.  Please contact the website administrators directly by either phone or email if you feel this message is in error for more information.");
}
*/

if(isset($_SESSION['EXPIRED']) == "1") {
	// Session expired

	$error = "Session Expried";
} elseif(ccms_badIPCheck($_SERVER["REMOTE_ADDR"])) {
	$error = "There is a problem with your login, your IP Address is currently being blocked.  Please contact the website administrators directly if you feel this message is in error.";
} elseif ($CLEAN["ccms_ins_db_id"] == "") {
	$error = "Database record missing.";
} elseif ($CLEAN["ccms_ins_db_id"] == "MINLEN") {
	$error = "Database record must be between 1-2147483647.";
} elseif ($CLEAN["ccms_ins_db_id"] == "MAXLEN") {
	$error = "Database record must be between 1-2147483647.";
} elseif ($CLEAN["ccms_ins_db_id"] == "INVAL") {
	$error = "Database record contains invalid characters.  ( > < & # )  You have used characters in this field which are either not supported by this field or we do not permitted on this system.";
}

if(!$error) {
	try{
		$qry = $CFG["DBH"]->prepare("SELECT * FROM `ccms_ins_db` WHERE `id` = :ccms_ins_db_id AND `status` = 1 AND `access` = 0;");
		$qry->execute(array(':ccms_ins_db_id' => $CLEAN["ccms_ins_db_id"]));

		//$CFG["DBH"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo "Error!: " . $e->getCode() . '<br>\n'. $e->getMessage();
		die();
	}

	$qry->setFetchMode(PDO::FETCH_ASSOC);
	while($row = $qry->fetch()) {
		if($row[$CLEAN["ccms_lng"]] == "") {
			// There is NOT content available in the requested language.  Supply the request with content from the default language instead.
			echo str_replace("{CCMS", "{ CCMS", $row[$CFG["DEFAULT_SITE_CHAR_SET"]]);
		} else {
			// There IS content available in the requested language.
			echo str_replace("{CCMS", "{ CCMS", $row[$CLEAN["ccms_lng"]]);
		}
	}
} else {
	echo $error;
}
