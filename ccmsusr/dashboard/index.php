<?php
header("Content-Type:text/html; charset=UTF-8");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if($_SERVER["SCRIPT_NAME"] != "/ccmsusr/index.php") {
	echo "This script can NOT be called directly.";
	exit;
}
?><!DOCTYPE html>
<html lang="{CCMS_LIB:_default.php;FUNC:ccms_lng}">
	<head>
		<title><?= $CFG["DOMAIN"];?> | User | Dashboard</title>
		{CCMS_TPL:head-meta.html}
	</head>
	<style>
		{CCMS_TPL:/_css/head-css.html}

		p{margin:0 0 20px}

		.blacklistIpAddress{
			font-size:.8em;
			color:var(--cl11);
			cursor:pointer
		}

		.cssGrid-Dashboard-01{
			display:grid;
			grid-gap:1em;
			/*
			grid-template-areas:
				"c1"
				"c2"
			*/
		}

		.ccms_security_logs_button {
			width: 16px;
			height: 16px;
			border: none;
			cursor: pointer;
			background-image: url(data:image/png;base64,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);
			background-repeat: no-repeat;
			background-color: transparent;
		}

		.ccms_security_logs_delete_button {
			background-position: 0 -80px;
			width: 16px;
			height: 16px;
		}








		.modal{
			background-color:var(--cl0);
			border:1px solid var(--cl2-tran);
			border-radius:6px;
			box-shadow:2px 2px 5px 0px rgba(0,0,0,.2);
			margin-bottom:20px
		}

		.modal>div{padding:10px 20px}

		.modal>div:first-child{
			background-color:var(--cl4);
			border-radius:6px 6px 0 0;
			color:var(--cl0)
		}

		.table{
			display:table;
			width:100%
		}

		.tableCell,.tableHead{
			display:table-cell;
			border:1px solid #f3f3f3;
			padding:.5em
		}

		.tableHead{
			background:#e8e8e8;
			color:black;
			font-family:"Open Sans",sans-serif;
			font-size:larger;
			text-align:center;
			text-transform:capitalize
		}

		.tableRow{display:table-row}

		.tableRow:nth-child(odd){background-color:#f9f9f9}

		#ccms_news_items{padding-left:30px}
		#ccms_news_items li{margin-bottom:10px}

		/* 824px or larger. Pixel Xl Landscape resolution is 411 x 823. */
		/* 875px or larger. Pixel Xl Landscape resolution is 411 x 823. */
		@media only screen and (min-width: 875px){
			.cssGrid-Dashboard-01{
				grid-template-areas:
					"c1 c2"
			}
		}
	</style>
	<script nonce="{CCMS_LIB:_default.php;FUNC:ccms_csp_nounce}">
		let navActiveItem = ["nav-dashboard"];
		let navActiveSub = [];
	</script>
	<body>
		<main style="padding:20px 20px 20px 0">
			<h1 style="border-bottom:1px dashed var(--cl3)">Dashboard</h1>
			<p>This section is still under development, but if you come across any unresolved issues please let us know at: <a class="oj" href="mailto:info@custodiancms.org?subject=unresolved+issue+report">info@custodiancms.org</a></p>

			<div class="modal">
				<div>Security Logs
					<svg id="ccms_security_logs_reload" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width:28px;position:relative;float:right;top:5px;cursor:pointer">
						<title>Reload</title>
						<path fill="#fff" d="M19.91,15.51H15.38a1,1,0,0,0,0,2h2.4A8,8,0,0,1,4,12a1,1,0,0,0-2,0,10,10,0,0,0,16.88,7.23V21a1,1,0,0,0,2,0V16.5A1,1,0,0,0,19.91,15.51ZM15,12a3,3,0,1,0-3,3A3,3,0,0,0,15,12Zm-4,0a1,1,0,1,1,1,1A1,1,0,0,1,11,12ZM12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1h4.5a1,1,0,0,0,0-2H6.22A8,8,0,0,1,20,12a1,1,0,0,0,2,0A10,10,0,0,0,12,2Z"/></svg>
				</div>
				<div>
					<p>List of sessions and or form calls, found in the 'ccms_log' table, that failed.<?php if($CFG["LOG_EVENTS"] === 0){echo '<br><span class="blacklistIpAddress">Currently disabled in config. Only old logs displayed below for now, if any.</span>';}?></p>
					<div id="ccms_security_logs"></div>
				</div>
			</div>

			<div class="cssGrid-Dashboard-01">
				<div class="modal">
					<div>System Info</div>
					<div>
						<p>Server Name: <?= $_SERVER["SERVER_NAME"];?></p>
						<p>Document Root: <?=$_SERVER["DOCUMENT_ROOT"];?></p>
						<p>System Address: <?= $_SERVER["SERVER_ADDR"];?></p>
						<p>Web Server: <?php $a = explode(" ",$_SERVER["SERVER_SOFTWARE"]);echo $a[0];?></p>
						<p>PHP Version: <?= phpversion();?></p>
						<p>PHP Memory Limit: <?= ini_get("memory_limit");?></p>
						<p>MySQL Version: <?= $CFG["DBH"]->getAttribute(PDO::ATTR_SERVER_VERSION);?></p>
						<p>COOKIE_SESSION_EXPIRE: <?= $CFG["COOKIE_SESSION_EXPIRE"];?></p>
						<p>HTML_MIN: <?= $CFG["HTML_MIN"];?></p>
						<p>CACHE: <?= $CFG["CACHE"];?></p>
						<p>CACHE_EXPIRE: <?= $CFG["CACHE_EXPIRE"];?></p>
						<p>LOG_EVENTS: <?= $CFG["LOG_EVENTS"];?></p>
						<p>EMAIL_FROM: <?= $CFG["EMAIL_FROM"];?></p>
						<p>EMAIL_BOUNCES_RETURNED_TO: <?= $CFG["EMAIL_BOUNCES_RETURNED_TO"];?></p>
					</div>
				</div>

				<div class="modal">
					<div>News From CustodianCMS.org
						<svg id="ccms_news_reload" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width:28px;position:relative;float:right;top:5px;cursor:pointer">
							<title>Reload</title>
							<path fill="#fff" d="M19.91,15.51H15.38a1,1,0,0,0,0,2h2.4A8,8,0,0,1,4,12a1,1,0,0,0-2,0,10,10,0,0,0,16.88,7.23V21a1,1,0,0,0,2,0V16.5A1,1,0,0,0,19.91,15.51ZM15,12a3,3,0,1,0-3,3A3,3,0,0,0,15,12Zm-4,0a1,1,0,1,1,1,1A1,1,0,0,1,11,12ZM12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1h4.5a1,1,0,0,0,0-2H6.22A8,8,0,0,1,20,12a1,1,0,0,0,2,0A10,10,0,0,0,12,2Z"/></svg>
					</div>
					<div id="ccms_news_items">
						<p>Nothing to see at the moment.</p>
					</div>
				</div>
			</div>

			<div class="modal">
				<div>License Info</div>
				<div>
					@Version
					<p style="margin-left:20px;">
						{CCMS_LIB:_default.php;FUNC:ccms_version} (Release Date: {CCMS_LIB:_default.php;FUNC:ccms_release_date})
					</p>
					@Copyright
					<p style="margin-left:20px;">
						&copy; {CCMS_LIB:_default.php;FUNC:ccms_dateYear} assigned by Vincent Hallberg of <a class='oj' href="https://custodiancms.org" rel="noopener" target="_blank">custodiancms.org</a> and <a class='oj' href="https://modusinternet.com" rel="noopener" target="_blank">modusinternet.com</a>
					</p>
					<span style="margin:0 20px">License (MIT)</span>
					<p>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:</p>
					<p>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.</p>
					<p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.</p>
				</div>
			</div>


			<ul>
				<li>HTML Minify</li>
				<li>Templates in Database Cache</li>
				<li>Clear Cache</li>
				<li>Backup/Restore</li>
				<li>Password Recovery attempts currently in the ccms_password_recovery table</li>
			</ul>


			{CCMS_TPL:/footer.html}
		</main>

		{CCMS_TPL:/body-head.php}

		<script nonce="{CCMS_LIB:_default.php;FUNC:ccms_csp_nounce}">
			{CCMS_TPL:/_js/footer-1.php}

			var l=document.createElement("link");l.rel="stylesheet";
			l.href = "/ccmsusr/_css/custodiancms.css";
			var h=document.getElementsByTagName("head")[0];h.parentNode.insertBefore(l,h);

			var l=document.createElement("link");l.rel="stylesheet";
			l.href = "/ccmsusr/_css/metisMenu-3.0.6.min.css";
			var h=document.getElementsByTagName("head")[0];h.parentNode.insertBefore(l,h);

			function loadJSResources() {
				loadFirst("/ccmsusr/_js/jquery-3.6.0.min.js", function() {
					loadFirst("/ccmsusr/_js/metisMenu-3.0.7.min.js", function() {
						loadFirst("/ccmsusr/_js/custodiancms.js", function() {
							loadFirst("/ccmsusr/_js/jquery-validate-1.19.3.min.js", function() {


								/* user_dropdown START */
								/* When the user clicks on the svg button add the 'show' class to the dropdown box below it. */
								$("#user_dropdown_btn").click(function() {
									$("#user_dropdown_list").addClass("show");
								});

								/* Hide dropdown menu on click outside */
								$(document).on("click", function(e){
									if(!$(e.target).closest("#user_dropdown_btn").length){
										$("#user_dropdown_list").removeClass("show");
									}
								});
								/* user_dropdown END */












							});
						});
					});
				});
			}

			const cachedFetch = (url, options) => {
				let expiry = 5 * 60; // 5 min default
				if(typeof options === 'number') {
					expiry = options;
					options = undefined;
				} else if(typeof options === 'object') {
					// Don't set it to 0 seconds
					expiry = options.seconds || expiry;
				}
				let cached = localStorage.getItem(url);
				let whenCached = localStorage.getItem(url + ':ts');
				if(cached !== null && whenCached !== null) {
					let age = (Date.now() - whenCached) / 1000;
					if(cached[0].errorMsg !== null || age > expiry) {
						// Clean up the old key
						localStorage.removeItem(url);
						localStorage.removeItem(url + ':ts');
					} else {
						let response = new Response(new Blob([cached]));
						return Promise.resolve(response);
					}
				}

				return fetch(url + "?token=" + Math.random() + "&ajax_flag=1", options).then(response => {
					if(response.status === 200) {
						response.clone().text().then(content => {
							localStorage.setItem(url, content);
							localStorage.setItem(url+':ts', Date.now());
						});
					}
					return response;
				});
			}


			// (URL to call, Max expire time after saved in localhost) 3600 = seconds is equivalent to 1 hour
			cachedFetch('https://custodiancms.org/cross-origin-resources/news.php', 3600)
				.then(r => r.text())
				.then(content => {
					document.getElementById("ccms_news_items").innerHTML = content;
			});

			document.getElementById("ccms_news_reload").addEventListener("click", () => {
				const url = "https://custodiancms.org/cross-origin-resources/news.php";
				localStorage.removeItem(url);
				localStorage.removeItem(url + ":ts");
				// 3600 = seconds is equivalent to 1 hour
				cachedFetch(url, 3600)
					.then(r => r.text())
					.then(content => {
						document.getElementById("ccms_news_items").innerHTML = content;
				});
			});


			function securityLogTable(data) {
				document.getElementById("ccms_security_logs").innerHTML = "";

				if(data === null) {
					document.getElementById("ccms_security_logs").innerHTML = '<p class="blacklistIpAddress">Nothing to see at the moment.</p>';
					return;
				}

				if(data[0].errorMsg) {
					document.getElementById("ccms_security_logs").innerHTML = "<p>" + data[0].errorMsg + "</p>";
					return;
				}

				var mainContainer = document.getElementById("ccms_security_logs");

				// Get values for the table headers.
				// ie: {'ID', 'Date', 'IP' , 'URL','Log'}
				var tablecolumns = [];
				for(var i = 0; i < data.length; i++) {
					for(var key in data[i]) {
						if(tablecolumns.indexOf(key) === -1) {
							tablecolumns.push(key);
						}
					}
				}

				var divTable = document.createElement("div");
				divTable.className = 'table';

				var divTableHeaderRow = document.createElement("div");
				divTableHeaderRow.className = 'tableRow';
				divTable.appendChild(divTableHeaderRow);

				for(var i = 0; i < tablecolumns.length; i++) {
					//console.log(tablecolumns[i]);
					var div = document.createElement("div");
					div.className = 'tableCell tableHead';
					div.innerHTML = tablecolumns[i];
					divTableHeaderRow.appendChild(div);
				}

				// Add one more empty div at the end of the header to contain stuff like a delete or edit button.
				var div = document.createElement("div");
				div.className = 'tableCell tableHead';
				div.innerHTML = "";
				divTableHeaderRow.appendChild(div);

				for(var i = 0; i < data.length; i++) {
					var divTableRow = document.createElement("div");
					divTableRow.setAttribute("class", "tableRow");
					divTableRow.setAttribute("id", "sec-log-row-id-" + data[i].id);

					const date = new Date(data[i].date*1000);
					// Year
					var year = date.getFullYear();
					// Month
					var month = date.getMonth();
					// Day
					var day = date.getDate();
					// Hours
					var hours = date.getHours();
					// Minutes
					var minutes = "0" + date.getMinutes();
					// Seconds
					var seconds = "0" + date.getSeconds();
					// Display date time in MM-dd-yyyy h:m:s format
					const convdataTime = year+'-'+month+1+'-'+day+'<br>'+hours+':'+minutes.substr(-2)+':'+seconds.substr(-2);

					divTableRow.innerHTML = '<div class="tableCell">'+ data[i].id
					+ '</div><div class="tableCell">' + convdataTime
					+ '</div><div class="tableCell">' + data[i].ip
					+ '<br><span class="blacklistIpAddress" data-ip="' + data[i].ip
					+ '">(Blacklist)</span></div><div class="tableCell" style="line-break:anywhere;min-width:300px">' + data[i].url
					+ '</div><div class="tableCell" style="width:100%">' + data[i].log
					+ '</div><div class="tableCell" style="text-align:center"><button class="ccms_security_logs_button ccms_security_logs_delete_button" data-id="' + data[i].id
					+ '" title="Delete"></button></div>';

					divTable.appendChild(divTableRow);
				}

				mainContainer.appendChild(divTable);

				var delBut = document.getElementsByClassName('ccms_security_logs_delete_button');
				for(var i = 0; i < delBut.length; i++){
					const id = delBut[i].getAttribute('data-id');
					delBut[i].onclick = function(){
						let url = "/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/dashboard/logs_delete.php";
						fetch(url + "?token=" + Math.random() + "&ajax_flag=1&id=" + id)
							.then(x => x.text())
							.then(y => {
								if(y === "0") { // success
									console.log(id + " deleted");
									document.getElementById("sec-log-row-id-" + id).outerHTML = "";
								} else if(y === "1") { // already deleted
									console.log(id + " already deleted");
									document.getElementById("sec-log-row-id-" + id).outerHTML = "";
								} else if(y === '[{"errorMsg":"Session Error"}]') {
									document.getElementById("ccms_security_logs").innerHTML = "<p>Session Error</p>";
								} else {
									alert(y);
								}
							}
						);
					}
				}

				var blacklistBut = document.getElementsByClassName('blacklistIpAddress');
				for(var i = 0; i < blacklistBut.length; i++){
					const ip = blacklistBut[i].getAttribute('data-ip');
					blacklistBut[i].onclick = function(){
						let url = "/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/dashboard/addIpAddressToBlacklist.php";
						fetch(url + "?token=" + Math.random() + "&ajax_flag=1&ip=" + ip)
							.then(x => x.text())
							.then(y => {
								if(y === "0") { // already blocked
									console.log(ip + " already blocked");
									alert(ip + " already blocked");
								} else if(y === "1") { // success
									console.log(ip + " blocked");
									alert(ip + " blocked");
								} else if(y === '[{"errorMsg":"Session Error"}]') {
									console.log("Session Error");
									document.getElementById("ccms_security_logs").innerHTML = "<p>Session Error</p>";
								} else {
									console.log(y);
									alert(y);
								}
							}
						);
					}
				}
			}

			// (URL to call, Max expire time after saved in localhost) 3600 = seconds is equivalent to 1 hour
			//cachedFetch('/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/dashboard/logs.php', 3600)
			cachedFetch('/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/dashboard/logs.php')
				.then(r => r.json())
				.then(content => {
					securityLogTable(content);
				}
			);

			document.getElementById("ccms_security_logs_reload").addEventListener("click", () => {
				const url = "/{CCMS_LIB:_default.php;FUNC:ccms_lng}/user/dashboard/logs.php";
				localStorage.removeItem(url);
				localStorage.removeItem(url + ":ts");
				//document.getElementById("ccms_security_logs").innerHTML = "";
				// 3600 = seconds is equivalent to 1 hour
				//cachedFetch(url, 3600)
				cachedFetch(url)
					.then(r => r.json())
					.then(content => {
						securityLogTable(content);
					}
				);
			});

			// Combined with fetch's options object but called with a custom name
			//let init = {
			//	mode: 'same-origin',
			//	seconds: 3 * 60 // 3 minutes
			//}
			//cachedFetch('https://httpbin.org/get', init)
			//	.then(r => r.json())
			//	.then(info => {
			//		console.log('3) ********** Your origin is ' + info.origin)
			//	}
			//)

			//cachedFetch('https://httpbin.org/image/png')
			// .then(r => r.blob())
			// .then(image => {
			//   console.log('Image is ' + image.size + ' bytes')
			// }
			//)

		</script>
	</body>
</html>
