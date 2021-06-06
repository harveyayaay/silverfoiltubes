$(window).load(function(){
	searchFilter();
});

function searchFilter(){
	$(document).on('click', '.button-search', function(){
		$('#search-filter').toggleClass('active');
	});
	$(document).on('click', '.button-close-search', function(){
		$('#search-filter').toggleClass('active');
	});

	var $pageHeight = $(window).height(),
			$searchHeaderHeight = $('#search-filter .search-header').outerHeight();
	$('#search-filter .output-wrapper').css({
		'max-height': $pageHeight - ( $searchHeaderHeight + 40 )
	});
	$('#search-filter .search-loader').hide();

	$("#search-input").bind("change paste keyup", function() {
	  var s = $(this).val();
	  $.ajax({
			url : site_ajax_object.ajaxurl,
			type : 'POST',
			dataType: 'json',
			data : {
				action : 'request_search',
				s : s
			},
			beforeSend: function(){
				$('#search-filter .search-loader').fadeIn();
	  		$('#search-filter .search-message').hide();
	  		$('#search-filter .output-wrapper').empty();
			},
			success: function(response) {
				setTimeout(function(){
					$('#search-filter .search-loader').hide();
					setTimeout(function(){
						$('#search-filter .output-wrapper').html(response.content);
					}, 300);
				}, 300);
			}
		});
	});
}
$(window).load(function(){
	// Global Variables
	var $pageHeight = $(window).height(),
			$pageWidth = $(window).width(),
			$headerHeight = $('header#header').outerHeight(),
			$footerHeight = $('footer#footer').outerHeight(),
			$quickNavigation = $('nav#quickLinks').outerHeight();
	mainContainer($pageHeight, $headerHeight, $footerHeight, $quickNavigation);
	mobileMenu();
	loader();
	backToTop($quickNavigation);
});

function mainContainer( $pageHeight = 0, $headerHeight = 0, $footerHeight = 0, $quickNavigation = 0 ){
	// $('#main').css({
	// 	'min-height': $pageHeight + $headerHeight,
	// 	'margin-bottom' : $quickNavigation,
	// 	'padding-bottom': $footerHeight,
	// 	'padding-top': $headerHeight
	// });
	// $('#mobile-menu').css({
	// 	'padding-top': $headerHeight
	// });
	// $(window).on('resize', function(){
	// 	setTimeout(function(){
	// 		$('#main').css({
	// 			'min-height': $pageHeight + $headerHeight,
	// 			'margin-bottom' : $quickNavigation,
	// 			'padding-bottom': $footerHeight,
	// 			'padding-top': $headerHeight
	// 		});
	// 		$('#mobile-menu').css({
	// 			'padding-top': $headerHeight
	// 		});
	// 	});
	// });
}

function mobileMenu(){
	$(document).on('click', '.button-mobile', function(){
		$(this).toggleClass('active');
		$('#main').toggleClass('menu-open');
		$('#mobile-menu').toggleClass('active');
		$('#aside-backdrop').toggleClass('active');
	});
	$(document).on('click', '#aside-backdrop', function(){
		$(this).toggleClass('active');
		$('#main').toggleClass('menu-open');
		$('#mobile-menu').toggleClass('active');
		$('.button-mobile').toggleClass('active');
	});
	$(document).on('click', '#mobile-menu .mobile ul li.menu-item-has-children a', function(e){
		e.preventDefault();
		var text = $(this).text();
		$('#mobile-menu .mobile ul li').removeClass('active');
		$(this).parent().addClass('active').find('> .sub-menu').addClass('active').find('> .bck-menu .text').text(text);
	});
	if( $('#mobile-menu .mobile ul li').hasClass('menu-item-has-children') ) {
		$('#mobile-menu .mobile ul li.menu-item-has-children > .sub-menu').prepend('<li class="bck-menu"><i class="fal fa-angle-left"></i><span class="text">Back</span></li>')
	}
	$(document).on('click', '#mobile-menu .bck-menu', function(e){
		$(this).parent().removeClass('active');
	});
}

function loader(){
	$('#loader-overlay').fadeOut(200);
}

function backToTop( $quickNavigation = 0 ){
	$('#backToTop').hide();
		
	$('#backToTop').css({
		'bottom' : $quickNavigation + 35
	});

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#backToTop').fadeIn();
		} else {
			$('#backToTop').fadeOut();
		}
	});
	
	$(document).on('click', '#backToTop a', function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
}
//# sourceMappingURL=main.js.map
