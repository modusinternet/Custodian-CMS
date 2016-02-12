<?php
function ccms_cfgDomain() {
	global $CFG;
	echo $CFG["DOMAIN"];
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

function ccms_cfgUsrDir() {
	global $CFG;
	echo $CFG["USRDIR"];
}

function ccms_dateYear() {
	echo date("Y");
}

function ccms_lng() {
	global $CLEAN;
	echo $CLEAN["ccms_lng"];
}

function ccms_lng_dir() {
	global $CFG;
	echo $CFG["CCMS_LNG_DIR"];
}

function ccms_printrClean() {
	global $CLEAN;
	echo "<br />\$CLEAN=[<pre>";
	print_r($CLEAN);
	echo "</pre>]\n";
}

function ccms_version() {
	global $CFG;
	echo $CFG["VERSION"];
}

function ccms_release_date() {
	global $CFG;
	echo $CFG["RELEASE_DATE"];
}

function ccms_tpl() {
	global $CLEAN;
	echo $CLEAN["ccms_tpl"];
}

function ccms_login_nav() {
	global $CFG, $CLEAN;
	$qry = $CFG["DBH"]->prepare("SELECT b.alias FROM `ccms_session` AS a INNER JOIN `ccms_user` AS b On b.id = a.user_id WHERE a.code = :code AND a.ip = :ip AND b.status = '1' LIMIT 1;");
	$qry->execute(array(':code' => $CLEAN["SESSION"]["code"], ':ip' => $_SERVER["REMOTE_ADDR"]));
	$row = $qry->fetch(PDO::FETCH_ASSOC);
	if($row == true) {
		echo $CLEAN["CCMS_DB_Preload_Content"]["all"]["login2"][$CLEAN["ccms_lng"]]["content"] . ": <a href='/" . $CLEAN["ccms_lng"] . "/user/'>" . $row["alias"] . "</a> (<a href='/" . $CLEAN["ccms_lng"] . "/user/?logout=1'>" . $CLEAN["CCMS_DB_Preload_Content"]["all"]["login3"][$CLEAN["ccms_lng"]]["content"] . "</a>)";
	} else {
		echo "<a href='/" . $CLEAN["ccms_lng"] . "/user/'>" . $CLEAN["CCMS_DB_Preload_Content"]["all"]["login1"][$CLEAN["ccms_lng"]]["content"] . "</a>";
	}
}

function _phpinfo() {
	return phpinfo();
}

function ccms_badIPCheck($ip) {
	global $CFG;
	$qry = $CFG["DBH"]->prepare("SELECT * FROM ccms_blacklist;");
	$qry->execute();
	$qry->setFetchMode(PDO::FETCH_ASSOC);
	while($row = $qry->fetch()) {
		if($row["id"] == 1) {
			$badIPAddressData = $row["data"];
		} elseif($row["id"] == 2) {
			$badWordData = $row["data"];
		}
	}
	$found = 0;
	$pos = false;
	$ip_array = explode("|", $badIPAddressData);
	foreach($ip_array as $the_ip) {
		$pos = @strpos(strtoupper($ip), strtoupper($the_ip));
		if($pos !== false) {
			$found = 1;
			break;
		}
	}
	if($found == 1) {
		return false;
	} else {
		return true;
	}
}

function bad_word_check($sentence) {
	global $CFG;
	$qry = $CFG["DBH"]->prepare("SELECT * FROM ccms_blacklist;");
	$qry->execute();
	$qry->setFetchMode(PDO::FETCH_ASSOC);
	while($row = $qry->fetch()) {
		if($row["id"] == 1) {
			$badIPAddressData = $row["data"];
		} elseif($row["id"] == 2) {
			$badWordData = $row["data"];
		}
	}
	$found = 0;
	$pos = false;
	$word_array = explode("|", $badWordData);
	foreach($word_array as $the_word) {
		$pos = @strpos(strtoupper($sentence), strtoupper($the_word));
		if($pos !== false) {
			$found = 1;
			break;
		}
	}
	if($found == 1) {
		return false;
	} else {
		return true;
	}
}
