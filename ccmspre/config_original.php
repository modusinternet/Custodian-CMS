<?
// Domain name
$CFG["DOMAIN"] = "";
$CFG["DOMAINSECURE"] = "";

// Primary site index file global.
$CFG["INDEX"] = "index";

// Document root folder globals.
$CFG["DBH"] = NULL;
$CFG["USRDIR"] = "ccmsusr";
$CFG["LIBDIR"] = "ccmslib";
$CFG["PREDIR"] = "ccmspre";
$CFG["TPLDIR"] = "ccmstpl";

// Use the ini_set function to set value of the include_path option on your server if necessary.
// e.g.: ini_set('include_path', 'ccmsadm:ccmslib:ccmspre:ccmstpl' . ini_get('include_path'));
//ini_set('include_path', $CFG["USRDIR"] . ':' . $CFG["LIBDIR"] . ':' . $CFG["PREDIR"] . ':' . $CFG["TPLDIR"] . ':' . ini_get('include_path'));

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

// User ID COOKIE expire time.  Set in number of minutes.
// e.g.:
// $CFG["COOKIE_USER_EXPIRE"] = 20; // Just 20 minutes.
// $CFG["COOKIE_USER_EXPIRE"] = 120; // Two hours.
$CFG["COOKIE_USER_EXPIRE"] = 120;

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