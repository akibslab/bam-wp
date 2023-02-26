(function ($) {
	"use strict";

	// Sticky Menu
	$(window).on("scroll", function () {
		var scroll = $(window).scrollTop();
		if (scroll < 650) {
			$(".site-header").removeClass("sticky");
		} else {
			$(".site-header").addClass("sticky");
		}
	});

	// header language
	$(".header_lang > ul > li").on("click", function () {
		$(".header_lang ul ul").slideToggle();
	});

	// mobile menu open
	$(".mobile_menubar a").on("click", function () {
		$(".mobile_menu").toggleClass("open");
		$(".site-header").toggleClass("mobile-menu");
	});

	// mobile menu dropdown
	$(".mobile_menu li.has-dropdown").on("click", function () {
		$(this).toggleClass("angle-up");
		$(".mobile_menu li.has-dropdown ul.sub-menu").slideToggle();
	});

	$(document).ready(function () {
		var width = $(window).width();
		if (width < "768") {
			// project carousel
			if ($(".project_items").length > 0) {
				$(".project_items").slick({
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					arrows: false,
					// centerMode: true,
					// variableWidth: true,
				});
			}

			// project grid carousel
			if ($(".grid_carousel_inner").length > 0) {
				$(".grid_carousel_inner").slick({
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					arrows: false,
				});
			}

			// team carousel
			if ($(".team-carousel").length > 0) {
				$(".team-carousel").slick({
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					arrows: false,
				});
			}

			// expertise image carousel
			if ($(".expertise_content_inner .image-carousel").length > 0) {
				$(".expertise_content_inner .image-carousel").slick({
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					arrows: false,
				});
			}

			// project details image carousel
			if ($(".project_details_content .images").length > 0) {
				$(".project_details_content .images").slick({
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					arrows: false,
				});
			}

			// footer click
			$(".footer_menu li.footer_title").on("click", function () {
				$(this).toggleClass("open");
				$(this).children().slideToggle();
			});
		}
	});

	// One Page Nav
	$("#nav").onePageNav({
		currentClass: "current",
		hangeHash: false,
		scrollSpeed: 750,
		scrollThreshold: 0.5,
		easing: "swing",
	});

	$(".smooth-scroll")
		// Remove links that don't actually link to anything
		.not('[href="#"]')
		.not('[href="#0"]')
		.click(function (event) {
			// On-page links
			if (
				location.pathname.replace(/^\//, "") ==
					this.pathname.replace(/^\//, "") &&
				location.hostname == this.hostname
			) {
				// Figure out element to scroll to
				var target = $(this.hash);
				target = target.length
					? target
					: $("[name=" + this.hash.slice(1) + "]");
				// Does a scroll target exist?
				if (target.length) {
					// Only prevent default if animation is actually gonna happen
					event.preventDefault();
					$("html, body").animate(
						{
							scrollTop: target.offset().top - 100,
						},
						1000,
						function () {
							// Callback after animation
							// Must change focus!
							var $target = $(target);
							$target.focus();
							if ($target.is(":focus")) {
								// Checking if the target was focused
								return false;
							} else {
								$target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
								$target.focus(); // Set focus again
							}
						}
					);
				}
			}
		});

	jQuery(document).ready(function ($) {
		// load project
		var ppp = 3; // Post per page
		var pageNumber = 1;

		function load_projects() {
			pageNumber++;
			var str =
				"&pageNumber=" + pageNumber + "&ppp=" + ppp + "&action=more_post_ajax";
			$.ajax({
				type: "POST",
				dataType: "html",
				url: ajax_projects.ajaxurl,
				data: str,
				success: function (data) {
					var $data = $(data);
					if ($data.length) {
						$("#ajax-projects").append($data);
						//$("#more_projects").attr("disabled",false); // Uncomment this if you want to disable the button once all posts are loaded
						$("#more_projects").hide(); // This will hide the button once all posts have been loaded
					} else {
						$("#more_projects").attr("disabled", true);
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				},
			});
			return false;
		}

		$("#more_projects").on("click", function () {
			// When btn is pressed.
			$("#more_projects").attr("disabled", true); // Disable the button, temp.
			load_projects();
			$(this).insertAfter("#ajax-projects"); // Move the 'Load More' button to the end of the the newly added posts.
		});
	});
})(jQuery);
