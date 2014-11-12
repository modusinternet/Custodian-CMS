<?php
// Use the ini_set function to set value of the include_path option on your server if necessary.
// e.g.: ini_set('include_path', 'ccmslib:ccmspre:ccmstpl:ccmsusr' . ini_get('include_path'));
//ini_set('include_path', $CFG["LIBDIR"] . ':' . $CFG["PREDIR"] . ':' . $CFG["TPLDIR"] . ':' . $CFG["USRDIR"] . ':' . ini_get('include_path'));

$CFG = array();
$CLEAN = array();
$ccms_whitelist = array();
$user_whitelist = array();

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

if($CFG["DEBUG"] == 1 && $CFG["DEBUG_ERROR_REPORTING"] == 1) error_reporting(E_ALL);

/*
	HTML Purifier is a standards-compliant HTML filter library written in PHP. HTML Purifier will
	not only remove all malicious code (better known as XSS) with a thoroughly audited, secure yet
	permissive whitelist, it will also make sure your documents are standards compliant.
	http://htmlpurifier.org/

	This library is not required by nor a part of Custodian CMS; thus not enabled by default.
	It is however bundled with Custodian CMS because it is a fantastic tool and will be used
	in the near future as the basecode and plug-ins designed to work with Custodian CMS
	continue to be developed.
*/
//require_once $CFG["PREDIR"] . '/htmlpurifier/HTMLPurifier.standalone.php';
//$purifier = new HTMLPurifier();
//$clean_html = $purifier->purify($dirty_html);

require_once $CFG["PREDIR"] . '/user_whitelist.php';
require_once $CFG["PREDIR"] . '/index.php';

if($CFG["DEBUG"] == 1) {
	echo "<span style=\"color:red;\">\$_SERVER=[<pre>";
	print_r($_SERVER);
	echo "</pre>]</span><br />\n";
	echo "<span style=\"color:red;\">\$_REQUEST=[<pre>";
	print_r($_REQUEST);
	echo "</pre>]</span><br />\n";
}
// This creats a initial connection to MySQL so that we can use the
// mysql_real_escape_string() where ever we want later.
CCMS_dbFirstConnect();

CCMS_filter($_SERVER + $_REQUEST, $ccms_whitelist);
USER_filter($_SERVER + $_REQUEST, $user_whitelist);
if($CFG["DEBUG"] == 1) {
	echo "<span style=\"color:green;\">\$CLEAN=[<pre>";
	print_r($CLEAN);
	echo "</pre>]</span><br />\n";
}

// Necessary to solve a problem on GoDaddy servers when running sites found in sub folders of existing sites.
if($_SERVER["REAL_DOCUMENT_ROOT"]) {
	$_SERVER["DOCUMENT_ROOT"] = $_SERVER["REAL_DOCUMENT_ROOT"];
}

CCMS_go();
?>