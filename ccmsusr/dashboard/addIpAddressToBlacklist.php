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

if($CLEAN["ip"] == "") {
	$errorMsg['ip'] = "No IP provided.";
} elseif($CLEAN["ip"] == "MINLEN") {
	$errorMsg['ip'] = "This field must be between 7 to 15 characters";
} elseif($CLEAN["ip"] == "MAXLEN") {
	$errorMsg['ip'] = "This field must be between 7 to 15 characters";
} elseif($CLEAN["ip"] == "INVAL") {
	$errorMsg['ip'] = "'Name' field contains invalid characters.  ( > < & # )  You have used characters in this field which are either not supported by this field or we do not permitted on this system.";
}

if(!isset($errorMsg['ip'])) {
	// no problems
	//$qry = $CFG["DBH"]->prepare("DELETE FROM `ccms_log` WHERE `id` = :id LIMIT 1;");
	$qry = $CFG["DBH"]->prepare("SELECT * FROM `ccms_blacklist` WHERE `id` = 1;");
	$qry->execute();
	$row = $qry->fetch(PDO::FETCH_ASSOC);

	if(isset($row["data"])) {
		if(strstr($row["data"], $CLEAN["ip"])) {
			echo "0"; // already found
		} else {
			$qry = $CFG["DBH"]->prepare("UPDATE `ccms_blacklist` SET `data` = :data WHERE `id` = 1;");
			$qry->execute(array(':data' => $row["data"] . "|" . $CLEAN["ip"]));
			echo "1"; // success
		}
	} else {
		echo "Record no. 1, of the ccms_blacklist table, does not appear to have a 'data' column.";
	}
	exit;
}
echo $errorMsg['ip'];
