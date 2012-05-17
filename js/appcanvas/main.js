;(function(window, $, undefined){

	var $window = $(window),
		$navbarCollapse = $('.navbar.navbar-fixed-top').find('.nav-collapse');

	$navbarCollapse.css({ maxHeight:Math.floor($window.height() * 0.75) + 'px' });

}(window, jQuery));
