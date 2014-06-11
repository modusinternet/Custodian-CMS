<?
// Domain name
$CFG["DOMAIN"] = "";
$CFG["DOMAINSECURE"] = "";

// Primary site index file global.
$CFG["INDEX"] = "index";

// Document root folder globals.
$CFG["DBH"] = NULL;
$CFG["ADMDIR"] = "ccmsadm";
$CFG["LIBDIR"] = "ccmslib";
$CFG["PREDIR"] = "ccmspre";
$CFG["TPLDIR"] = "ccmstpl";

// This variable is the base fallback for sites that have not configured their default
// language settings using the admin yet.  In other words, if the default language settings
// are not found in the database then these base settings will be used instead.  To
// find all the codes possible check here, http://www.metamodpro.com/browser-language-codes
// e.g.:
// $CFG["DEFAULT_SITE_CHAR_SET"] = "en";    // English
// $CFG["DEFAULT_SITE_CHAR_SET"] = "fr";    // French
// $CFG["DEFAULT_SITE_CHAR_SET"] = "ja";    // Japanese
// $CFG["DEFAULT_SITE_CHAR_SET"] = "zh-cn"; // Chinese (PRC)
$CFG["DEFAULT_SITE_CHAR_SET"] = "en";

// Database globals.
$CFG["DB_HOST"] = "";
$CFG["DB_USERNAME"] = "";
$CFG["DB_PASSWORD"] = "";
$CFG["DB_NAME"] = "";

// Here is a small SQL statement you can use to help create the tables and populate them with
// the tables initially required to get things started.
/*

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `ccms_ins_db` (
  `id` int(11) NOT NULL auto_increment,
  `status` tinyint(1) NOT NULL default '0',
  `access` tinyint(1) NOT NULL default '0' COMMENT '0=www side 1=admin side',
  `scope` varchar(255) NOT NULL,
  `word` varchar(255) NOT NULL,
  `de` text NOT NULL,
  `en` text NOT NULL,
  `fr` text NOT NULL,
  `ja` text NOT NULL,
  `zh-cn` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `CCMS_insDBPreload_idx` (`status`,`access`,`scope`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `ccms_ins_db` (`id`, `status`, `access`, `scope`, `word`, `de`, `en`, `fr`, `ja`, `zh-cn`) VALUES
(1, 1, 0, 'index_page', 'pangram1', 'Der schnelle braune Fuchs springt über den faulen Hund.', 'The quick brown fox jumps over the lazy dog.', 'Le brun rapide le renard saute sur le chien paresseux.', '速い茶色のキツネは怠け者の犬を跳び越えます.', '那只敏捷的棕毛狐狸跃过那只懒狗.'),
(2, 1, 0, 'index_page', 'pangram2', 'Wenn Zombies ankommen, schnell Richter Pat faxen.', 'When zombies arrive, quickly fax judge Pat.', 'Quand les zombies arrivent, faxent rapidement le juge Pat.', 'ゾンビが到着するとき、速くパット裁判官にファクスで送ってください。', '僵尸到达时,快速传真法官英保通™技术。'),
(3, 1, 0, 'index_page', 'pangram3', 'Jede gute Kuh, Fuchs, Eichhörnchen, und Zebra mögen über glückliche Hunde springen.', 'Every good cow, fox, squirrel, and zebra likes to jump over happy dogs.', 'Chaque bonne vache, renard, l''écureuil et le zèbre aiment sauter sur des chiens heureux.', 'すべての良い雌牛、キツネ、リスと、シマウマが幸せな犬を跳び越えることを好みます。', '每个好的母牛、狐狸、鼠笼式,和斑马喜欢跳过快乐狗。'),
(4, 1, 0, 'index_page', 'pangram4', 'Packen(Dichten) Sie meinen Kasten mit fünf Dutzend Alkohol-Krügen ein(ab).', 'Pack my box with five dozen liquor jugs.', 'Entassez ma boîte de cinq douzaines de cruches d''alcool.', '５ダースの酒水差しで私の箱を満たしてください。', '包我”框中有五个十几个酒瓶。');

CREATE TABLE IF NOT EXISTS `ccms_lng_charset` (
  `id` int(11) NOT NULL auto_increment,
  `lngDesc` varchar(63) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `lng` varchar(5) NOT NULL,
  `default` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `ccms_lng_charset` (`id`, `lngDesc`, `status`, `lng`, `default`) VALUES
(1, 'German (Standard)', 1, 'de', 0),
(2, 'English', 1, 'en', 1),
(3, 'Français', 1, 'fr', 0),
(4, '日本語 (Japanese)', 1, 'ja', 0),
(5, '简体中文(Simplified Chinese)', 1, 'zh-cn', 0);

CREATE TABLE IF NOT EXISTS `ccms_visitor_id` (
  `id` int(11) NOT NULL auto_increment,
  `sid` varchar(32) NOT NULL,
  `expire` bigint(20) NOT NULL default '0',
  `parm1` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `visitorsID` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

*/

// Display debug info for failed SQL calls.  (Requires $CFG["DEBUG"] to also be enabled.)
// e.g.:
// $CFG["DEBUG_SQL"] = 0; // off
// $CFG["DEBUG_SQL"] = 1; // on
$CFG["DEBUG_SQL"] = 0;

// Visitor ID COOKIE expire time.  Set in number of days.
// e.g.:
// $CFG["COOKIE_VISITOR_EXPIRE"] = 182; // Half a year.
// $CFG["COOKIE_VISITOR_EXPIRE"] = 365; // One full year.
$CFG["COOKIE_VISITOR_EXPIRE"] = 365;

// Admin ID COOKIE expire time.  Set in number of minutes.
// e.g.:
// $CFG["COOKIE_ADMIN_EXPIRE"] = 20; // Just 20 minutes.
// $CFG["COOKIE_ADMIN_EXPIRE"] = 120; // Two hours.
$CFG["COOKIE_ADMIN_EXPIRE"] = 120;

// When emails are sent by the server what email address do you want them to be sent from.
$CFG["EMAIL_FROM"] = "";

// When emails are sent by the server what email address do you want them to be sent from.
$CFG["EMAIL_BOUNCES_RETURNED_TO"] = "";

// General site debugging starts with this setting.
// e.g.:
// $CFG["DEBUG"] = 0; // off
// $CFG["DEBUG"] = 1; // on
$CFG["DEBUG"] = 0;

// If you have enabled debugin above and if you only want to display debug output to certian ip addresses
// for security reasons indicate them below.  To add multipule ip address seperat with spaces.
// e.g.:
// $CFG["DEBUGIPSONLY"] = "11.11.11.11 222.222.222.222";
$CFG["DEBUGIPSONLY"] = "";

// This is for deep PHP debugging error messages.  DEBUG must be enabled to work.
// e.g.:
// $CFG["DEBUG_ERROR_REPORTING"] = 0; // off
// $CFG["DEBUG_ERROR_REPORTING"] = 1; // on
$CFG["DEBUG_ERROR_REPORTING"] = 0;

// To enable Google Custom Search Engine in your error pages enter your CustomSearchControl code here.
// To get one for your site visit http://www.google.com/cse/
$CFG["GOOGLE_CUSTOM_SEARCH_ENGINE_CODE"] = "";
?>