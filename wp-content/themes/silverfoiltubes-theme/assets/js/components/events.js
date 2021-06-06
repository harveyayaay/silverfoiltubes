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