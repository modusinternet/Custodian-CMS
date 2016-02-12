<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
				<div class="navbar-header" style="width: 100%;">
					<button class="btn btn-default btn-xs" data-toggle="button" id="menu-toggle" style="padding: 8px 10px; position: absolute; left: 250px; top: 7px;" title="Navigation Toggle" type="button">
						<i class="fa fa-exchange fa-fw" style="font-size: 1.6em;"></i>
					</button>
					<button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<ul class="nav navbar-top-links" style="float: right;">
						<li class="dropdown">
							<a class="dropdown-toggle line-height-1-4" data-toggle="dropdown" href="#">
								<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li id="user_profile">
									<a href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/user_profile/"><i class="fa fa-user fa-fw"></i> User Profile</a>
								</li>
								<li>
									<a href="//{CCMS_LIB:_default.php;FUNC:ccms_cfgDomain}"><i class="fa fa-home fa-fw"></i> To Homepage</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/login.html?logout=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
								</li>
							</ul>
						</li>
					</ul>
					<a class="navbar-brand line-height-1-4" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/" style="padding: 3px 0 0 0;">
						<img alt="Custodian CMS Banner.  Easy gears no spilled beers." src="/{CCMS_LIB:_default.php;FUNC:ccms_cfgUsrDir}/_img/ccms-logo-banner-large-en.png" style="height: 45px;" title="Custodian CMS Banner.  Easy gears no spilled beers.">
					</a>
				</div>


				<div id="sidebar-wrapper">
					<div class="navbar-default sidebar" role="navigation">
						<div class="sidebar-nav navbar-collapse">
							<ul class="nav" id="side-menu">
								<li>
									<a class="line-height-1-4" id="dashboard" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/dashboard/">
										<i class="fa fa-dashboard fa-fw"></i>
										Dashboard
									</a>
								</li>
								<li id="admin">
									<a class="line-height-1-4" id="admin_nav" href="#">
										<i class="fa fa-cogs fa-fw"></i>
										Admin
										<span class="fa arrow"></span>
									</a>
									<ul class="nav nav-second-level">
										<li>
											<a class="line-height-1-4" id="admin_users_and_user_privileges" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/admin/users_and_user_privileges/">
												<i class="fa fa-user fa-fw"></i>
												Users &amp; User Privileges
											</a>
										</li>
										<li>
											<a class="line-height-1-4" id="admin_language_support" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/admin/language_support/">
												<i class="fa fa-language fa-fw"></i>
												Language Support
											</a>
										</li>
										<li>
											<a class="line-height-1-4" id="admin_blacklist_settings" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/admin/blacklist_settings/">
												<i class="fa fa-shield fa-fw"></i>
												Blacklist Settings
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a class="line-height-1-4" id="content_manager" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/content_manager/">
										<i class="fa fa-pencil-square-o fa-fw"></i>
										Content Manager
									</a>
								</li>
								<li>
									<a class="line-height-1-4" id="group_lists" href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/group_lists/">
										<i class="fa fa-picture-o fa-fw"></i>
										Group Lists
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
