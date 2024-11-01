/***************************************************
==================== JS INDEX ======================
****************************************************
01. PreLoader Js
****************************************************/

(function ($) {
	"use strict";

	var windowOn = $(window);
	////////////////////////////////////////////////////
	// 01. PreLoader Js
	windowOn.on('load',function() {
		$("#loading").fadeOut(500);
	});

	windowOn.on('load', function () {
		setTimeout(function () {
			$(".preloader").fadeToggle();
		   }, 200);
	})


	$('select').niceSelect();

	$(".header__lang > ul > li").on('click',function(){
	    $(".header__lang ul ul").slideToggle();
	});	

	////////////////////////////////////////////////////
	// 02. Mobile Menu Js
	$('#mobile-menu').meanmenu({
		meanMenuContainer: '.mobile-menu',
		meanScreenWidth: "991",
		meanExpand: ['<i class="fal fa-plus"></i>'],
	});

	////////////////////////////////////////////////////
	// 03. Sidebar Js
	$(".offcanvas-toggle-btn").on("click", function () {
		$(".offcanvas__area").addClass("opened");
		$(".body-overlay").addClass("opened");
	});
	$(".offcanvas__close-btn").on("click", function () {
		$(".offcanvas__area").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
	// 04. Body overlay Js
	$(".body-overlay").on("click", function () {
		$(".offcanvas__area").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
	// 05. Search Js
	$(".search-toggle").on("click", function () {
		$(".search__area").addClass("opened");
	});
	$(".search-close-btn").on("click", function () {
		$(".search__area").removeClass("opened");
	});



	/* magnificPopup img view */
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	/* magnificPopup video view */
	$(".popup-video").magnificPopup({
		type: "iframe",
	});

	/* Pricing tab*/
	$("#ce-toggle").on('click', function (event) {
		$(".plan-toggle-wrap").toggleClass("active");
	})

	$("#ce-toggle").on('change', function () {
		if ($(this).is(":checked")) {
			$(".tab-content #yearly").hide();
			$(".tab-content #monthly").show();
		   } else {
			$(".tab-content #yearly").show();
			$(".tab-content #monthly").hide();
		   }
	})
	   
	


	function updateScrollProgress() {
		var scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
		var scrollTop = window.scrollY;
		var progress = (scrollTop / scrollHeight) * 100;
		document.getElementById("scroll-progress").style.top = progress + "%";
	}

	window.onload = function () {
		updateScrollProgress();
	};

	window.onscroll = function () {
		updateScrollProgress();
	};



})(jQuery);



