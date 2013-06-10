<?
function ccms_cfgDomain() {
	global $CFG;
	echo $CFG["DOMAIN"];
}

function ccms_cfgAdmDir() {
	global $CFG;
	echo $CFG["ADMDIR"];
}

function ccms_cfgLibDir() {
	global $CFG;
	echo $CFG["LIBDIR"];
}

function ccms_cfgPreDir() {
	global $CFG;
	echo $CFG["PREDIR"];
}

function ccms_cfgTplDir() {
	global $CFG;
	echo $CFG["TPLDIR"];
}

function ccms_dateYear() {
	echo date("Y");
}

function ccms_printrClean() {
	global $CLEAN;
	echo "<br />\$CLEAN=[<pre>";
	print_r($CLEAN);
	echo "</pre>]\n";
}

function ccms_tpl() {
	global $CLEAN;
	echo $CLEAN["ccms_tpl"];
}

function ccms_vlng() {
	global $CLEAN;
	echo $CLEAN["ccms_vlng"];
}
?>