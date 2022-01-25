/* Loading Screen START */
window.setTimeout(function(){
	document.getElementById("loading_svg").style.opacity="0";
	window.setTimeout(function(){
		document.getElementById("loading_svg").style.display="none";
	},500);
},500);
window.setTimeout(function(){
	document.getElementsByTagName("main")[0].style.opacity="1";
},250);
/* Loading Screen END */


/* metisMenu START */
$(() => {
	const menu = $('#menu-ctn'),
	bars = $('.menu-bars'),
	content = $('#menu-cnt');
	let firstClick = true,
	menuClosed = true;
	let handleMenu = event => {
		if(!firstClick) {
			bars.toggleClass('crossed hamburger');
		} else {
			bars.addClass('crossed');
			firstClick = false;
		}
		menuClosed = !menuClosed;
		content.toggleClass('dropped');
		event.stopPropagation();
	};
	menu.on('click', event => {
		handleMenu(event);
	});
	$('body').not('#menu-cnt, #menu-ctn').on('click', event => {
		if(!menuClosed) handleMenu(event);
	});
	$('#menu-cnt, #menu-ctn').on('click', event => event.stopPropagation());
});

$("#menu1").metisMenu();
navActiveSub.forEach(function(nl){$("#"+nl).addClass("mm-active");});
navActiveSub.forEach(function(nl){$("#"+nl+">a").attr("aria-expanded","true");});
navActiveSub.forEach(function(nl){$("#"+nl+">a").addClass("active");});
navActiveSub.forEach(function(nl){$("#"+nl+">ul").addClass("mm-show");});
navActiveItem.forEach(function(nl){$("#"+nl+">a").addClass("active");});
/* metisMenu END */










/* ===== metisMenu load ===== */
/* Loads the correct sidebar on window load, collapses the sidebar on window resize. Sets the min-height of #page-wrapper to window size. */
///*
function showHideNav() {
	topOffset = 50;
	width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
	if (width < 768) {
		$('div.navbar-collapse').addClass('collapse');
		topOffset = 100; // 2-row-menu
	} else {
		$('div.navbar-collapse').removeClass('collapse');
	}

	height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
	height = height - topOffset;
	if (height < 1) height = 1;
	if (height > topOffset) {
		$("#page-wrapper").css("min-height", (height) + "px");
	}
}

$(function(){$(window).bind("load resize",function(){showHideNav();})});
showHideNav();
//*/
/* ===== metisMenu load Close ===== */










/* =========== open: scroll to ID value on page ============== */
$.fn.scrollView = function () {
	return this.each(function () {
		$('html, body').animate({
			scrollTop: $(this).offset().top
		}, 1000);
	});
}
// use it like:  $('#your-div').scrollView();
/* =========== close: scroll to ID value on page ============== */
