![Modus Internet](http://modusinternet.com/ccmstpl/img/hdr-940.png)
Custodian CMS
=========

Custodian CMS (CCMS) is still very young in its development and though it works perfectly it does not come with a setup script or admin system currently.  (Admin system will be ready in v1.0)  Fortunately CCMS is so simple neither one is really needed to take advantage of its features, for now you can use a simple text editor to update the config and a tool like phpMyAdmin to add, remove or update your database inserts.

About
-----

CCMS is a small, light weight, Open-source multilingual Content Management System (CMS), distributed for free under the GNU LGPL.

The primary purpose of CCMS is to maintain a database of multilingual content, maintained by the website administrator or any outside service of their choice, and make it easy to display the correct one using a single set of templates.  ( One website, one set of templates, may supported languages. )  The website developer sets the default language for the site, adds support for additional languages, fills the database with individually hand crafted blobs of content and inserts CCMS_DB tags throughout the HTML to automatically replace content in the language requested by visitors.  Here is an example of the database content insertion tag used in CCMS.

	{CCMS_DB:about_us_page,first_paragraph}
	{CCMS_DB:use_anywhere,form_button_submit}
	{CCMS_DB:trips_to_mexico_template,request_more_info_text1}


CCMS also provides a framework to help website developers build Search Engine Optimized (SEO)/friendly URI's and connect HTML files to external templates or librarys of custom code with the template they are currently working on using CCMS_TPL and CCMS_LIB tags.

	{CCMS_TPL:header.tpl}
	{CCMS_TPL:somedir/footer.php}
	{CCMS_TPL:products/list.html}

	{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}
	{CCMS_LIB:cms/_123.php;FUNC:XyZZy123_}
	{CCMS_LIB:test/dir/indeX_Asdf-123.php;FUNC:cfgindeX_Asdf123("arg1", "arg2")}

The word 'custodian' is defined by thefreedictionary.com as 'A person entrusted with guarding or maintaining a property; caretaker.' and this suits the definition of the Custodian CMS very well.

CCMS will not attempt to take the jobs or responsibility of actually building websites from real developers by bloating its basecode with tones of automated features. As of 2013-06-03, v0.1 was less then 100K in size, not including graphics, and the goal is to keep it as lightweight as possible.

Visit the project website at http://modusinternet.com/en/products/custodian-cms.html.

System requirements
-------------------

LAMP
* Linux
* Apache
* MySQL (version 4.1 or greater)
* PHP (version 5.3.2 or greater)

CCMS will probably run on IIS under Windows but it has not been tested yet.

Installation
------------

* Download a CCMS package from http://modusinternet.com/en/products/custodian-cms/download.html or https://github.com/modusinternet/custodian-cms/releases.
* Unpack and place the archive on your server.
* Copy and paste the SQL text found inside /ccmspre/config_original.php into your MySQL editor after setting up a new database.
* Update the settings found inside of /ccmspre/config_original.php and /ccmspre/user_whiteList_original.php as required.
* Copy and or Rename /ccmspre/config_original.php to /ccmspre/config.php and /ccmspre/user_whiteList_original.php to /ccmspre/user_whiteList.php.
* Call your domain name or domainname.com/index.php in your web browser and read the supplimental information there.
* Read the source code on the /ccmstpl/index.tpl template to help you get started and start building your own site.
* More links to information regarding installation and configuration can be found at http://modusinternet.com/en/products/custodian-cms/download.html.
