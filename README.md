![Custodian CMS Logo and Redirect Link](http://modusinternet.com/ccmstpl/img/ccms-logo-banner-large-en.png)
Custodian CMS
=========

The word 'Custodian' is defined by thefreedictionary.com as 'A person entrusted with guarding or maintaining a property; caretaker' and this suits the definition of the Custodian CMS very well.

Custodian CMS (CCMS) is a good caretaker to build your site upon because:
<ol>
	<li>It combines the best of practice security techniques like hot linking, cross site scripting, remote code execution and MySQL injection protection into multiple areas of the system.  The .htaccess file is aprox 275 lines of deeply scrutinised code that is constantly being improved.  Other .htaccess files found throughout it's structure provide additional layers of protection.</li>
	<li>It opperates under a clearly defined URI structure that is optimal for Search Engines.</li>
	<li>It provides an easy process and structure for developers to segregate HTML from programming code so that its easier for junior developers and maintainers to work with after development.</li>
	<li>It provides the simplest method in existence to solve the issues of constructing multilingual websites using a single set of templates, on a single domain, containing an unlimited number of languages.</li>
	<li>It makes things easy for the website visitor by figuring out all their language preference automatically.</li>
	<li>It gets out of the way of developers to build sites the way they want, with the tools/plugins/frameworks they want, using the themes they want.</li>
</ol>

Though CCMS does not come with setup scripts or an admin system currently (Admin system will be ready in v1.0) fortunately CCMS is so simple neither one is required to make use of this amazing tool.  For now use a simple text editor to update the config and a tool like phpMyAdmin to add, remove or update your database inserts.

About
-----

CCMS is a small, light weight, multilingual, Content Management System distributed for free under the GNU LGPL.

The primary purpose of CCMS is to maintain a database of multilingual content and make it easy to display the correct one using a single set of templates.  One website, one set of templates, may languages.  The website developer sets the default language for the site, adds support for additional languages, fills the database with individually hand crafted blobs of content and inserts CCMS_DB tags throughout the HTML to automatically replace content in the language requested by visitors.  Here is an example of the database content insertion tag used in CCMS.

	{CCMS_DB:about_us_page,first_paragraph}
	{CCMS_DB:use_anywhere,form_button_submit}
	{CCMS_DB:trips_to_mexico_template,request_more_info_text1}


CCMS also provides a framework to help website developers build Search Engine Optimized (SEO)/friendly URIs and insert one template into another (CCMS_TPL tags) or librarys of custom code with the template they are currently working on (CCMS_LIB tags).

	{CCMS_TPL:header.tpl}
	{CCMS_TPL:somedir/footer.php}
	{CCMS_TPL:products/list.html}

	{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}
	{CCMS_LIB:cms/_123.php;FUNC:XyZZy123_}
	{CCMS_LIB:test/dir/indeX_Asdf-123.php;FUNC:cfgindeX_Asdf123("arg1", "arg2")}



Visit the project website at http://modusinternet.com/en/products/custodian-cms.html.

System requirements
-------------------

LAMP
* Linux
* Apache
* MySQL (version 4.1 or greater)
* PHP (version 5.3.2 or greater)

(CCMS will probably run on IIS but ya never know.  If someone would like to test it and let me know I'd appreciate it.)

Installation
------------

* Download a CCMS package from https://github.com/modusinternet/custodian-cms/releases or http://modusinternet.com/en/products/custodian-cms/download.html.
* Unpack and place the archive on your server.
* Import ccms-db-setup.sql into your MySQL editor after setting up a new database.
* Update the settings found inside of /ccmspre/config_original.php and /ccmspre/user_whiteList_original.php as required.
* Copy and or Rename /ccmspre/config_original.php to /ccmspre/config.php and /ccmspre/user_whiteList_original.php to /ccmspre/user_whiteList.php.
* Open a browser and call your test environment and read the supplimental information there.
* More links to information regarding installation and configuration can be found at http://modusinternet.com/en/products/custodian-cms/download.html.
