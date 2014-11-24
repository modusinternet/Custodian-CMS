<?php
// benchmark start
//$time_start = microtime(true);

// Use the ini_set function to set value of the include_path option on your server if necessary.
// e.g.: ini_set('include_path', 'ccmslib:ccmspre:ccmstpl:ccmsusr' . ini_get('include_path'));
//ini_set('include_path', $CFG["LIBDIR"] . ':' . $CFG["PREDIR"] . ':' . $CFG["TPLDIR"] . ':' . $CFG["USRDIR"] . ':' . ini_get('include_path'));

$CFG = array();
$CLEAN = array();
$ccms_whitelist = array();
$user_whitelist = array();

$CFG["VERSION"] = "0.5";
$CFG["RELEASE_DATE"] = "Nov 23, 2014";

if(file_exists('setup.php')) {
	require_once "setup.php";
	die();
}

require_once "ccmspre/config.php";

ob_start("ob_gzhandler");

// Testing to see if we should be displaying debug information or not.
if($CFG["DEBUG"] == 1 && ($CFG["DEBUGIPSONLY"] == "" || stristr($CFG["DEBUGIPSONLY"], $_SERVER["REMOTE_ADDR"]) !== FALSE)) {
	echo "Debug enabled.  Your IP is [" . $_SERVER["REMOTE_ADDR"] . "]<br />\n";
	echo "\$CFG[\"DEBUGIPSONLY\"] = [";
	if($CFG["DEBUGIPSONLY"] == "") {
		echo "<b>Any IP Address</b>";
	} else {
		echo $CFG["DEBUGIPSONLY"];
	}
	echo "]<br />\n";
}

require_once $CFG["PREDIR"] . '/user_whitelist.php';
require_once $CFG["PREDIR"] . '/index.php';

// This creats a persistent connection to MySQL.
CCMS_DB_First_Connect();

CCMS_Filter($_SERVER + $_REQUEST, $ccms_whitelist);

CCMS_User_Filter($_SERVER + $_REQUEST, $user_whitelist);

// Necessary to solve a problem on GoDaddy servers when running sites found in sub folders of existing sites.
if($_SERVER["REAL_DOCUMENT_ROOT"]) {
	$_SERVER["DOCUMENT_ROOT"] = $_SERVER["REAL_DOCUMENT_ROOT"];
}

CCMS_Main();
?>