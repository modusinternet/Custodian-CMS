<?php
// Domain name
$CFG["DOMAIN"] = "";

// Primary indexes for /ccmstpl/ and /ccmsusr/ sections of the site.
$CFG["INDEX"] = "index";
$CFG["USRINDEX"] = "_dashboard/";

// Document root folder globals.
$CFG["DBH"] = NULL;
$CFG["LIBDIR"] = "ccmslib";
$CFG["PREDIR"] = "ccmspre";
$CFG["TPLDIR"] = "ccmstpl";
$CFG["USRDIR"] = "ccmsusr";

// Database globals.
$CFG["DB_HOST"] = "";
$CFG["DB_USERNAME"] = "";
$CFG["DB_PASSWORD"] = "";
$CFG["DB_NAME"] = "";

// HTML Minify.
// This code will not break pre, code or textarea tagged content.
// WARNING: Make sure your actual HTML templates do not contain any commented // code because minification means all whitespaces will be removed and the carriage return at the end of your comment will also be removed, making everything that comes after that a commented comment aswell.
// $CFG["HTML_MIN"] = 0; // off
// $CFG["HTML_MIN"] = 1; // on (Default)
$CFG["HTML_MIN"] = 1;

// Display debug info for failed SQL calls.  (Requires $CFG["DEBUG"] to also be enabled.)
// e.g.:
// $CFG["DEBUG_SQL"] = 0; // off
// $CFG["DEBUG_SQL"] = 1; // on
$CFG["DEBUG_SQL"] = 0;

// This is for deep PHP debugging error messages.
// e.g.:
// $CFG["DEBUG_ERROR_REPORTING"] = 0; // off
// $CFG["DEBUG_ERROR_REPORTING"] = 1; // on
$CFG["DEBUG_ERROR_REPORTING"] = 0;

// COOKIE based SESSION expire time.  Set in number of minutes.
// e.g.:
// $CFG["COOKIE_SESSION_EXPIRE"] = 30; // 30 minutes.
// $CFG["COOKIE_SESSION_EXPIRE"] = 180; // 3 hours.
$CFG["COOKIE_SESSION_EXPIRE"] = 120;

// When emails are sent by the server what email address do you want them to be sent from.
$CFG["EMAIL_FROM"] = "";

// When emails are sent by the server what email address do you want them to be sent from.
$CFG["EMAIL_BOUNCES_RETURNED_TO"] = "";

// To enable Google Custom Search Engine in your error pages enter your CustomSearchControl code here.
// To get one for your site visit http://www.google.com/cse/
$CFG["GOOGLE_CUSTOM_SEARCH_ENGINE_CODE"] = "";

// To add Google reCaptcha to your web forms enter your recaptcha keys here.
// https://www.google.com/recaptcha/admin/create
$CFG["GOOGLE_RECAPTCHA_PUBLICKEY"] = ""; // Site key
$CFG["GOOGLE_RECAPTCHA_PRIVATEKEY"] = ""; // Secret key

// To add Google Credentials so that you can embed things like maps to your site add your key here.
// https://console.cloud.google.com
$CFG["GOOGLE_CREDENTIALS_KEY"] = "";
