<?php
// Domain name
$CFG["DOMAIN"] = "";

// Primary indexes for /ccmstpl/ and /ccmsusr/ sections of the site.
$CFG["INDEX"] = "index";
$CFG["USRINDEX"] = "dashboard/";


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
$CFG["COOKIE_SESSION_EXPIRE"] = 60;

// When emails are sent by the server what email address do you want them to be sent from.
$CFG["EMAIL_FROM"] = "";

// When emails are sent by the server what email address do you want them to be sent from.
$CFG["EMAIL_BOUNCES_RETURNED_TO"] = "";

// To enable Google Custom Search Engine in your error pages enter your CustomSearchControl code here.
// To get one for your site visit http://www.google.com/cse/
$CFG["GOOGLE_CUSTOM_SEARCH_ENGINE_CODE"] = "";

// https://www.google.com/recaptcha/admin/create
$CFG["RECAPTCHA_PUBLICKEY"] = ""; // Site key
$CFG["RECAPTCHA_PRIVATEKEY"] = ""; // Secret key

