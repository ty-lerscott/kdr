(function( $ ) {
	var KAPPADELTARHO = {
		menu: function(){
			$('.menu .mobile-toggle').on('click', function(e){
				$(this).parent().toggleClass('active');
				$('header').toggleClass('active');
			});
		}
	};
	$(document).ready(function(){
		KAPPADELTARHO.menu();
	});

	// $(document).ready( function() {

	// 	var run_isotope = function(){
	// 		// init Isotope
	// 		var $grid = $('.grid').isotope({
	// 			itemSelector: '.grid-item',
	// 			masonry: {
	// 				columnWidth: 215,
	// 				isFitWidth: true,
	// 				gutter: 11
	// 			}
	// 		});
	//
	// 		$grid.imagesLoaded().progress( function() {
	// 			$grid.isotope('layout');
	// 		});
	//
	// 		var reorderElements = function(){
	// 			if(window.innerWidth>=680 && window.innerWidth <= 960){
	// 				$('figure:nth-of-type(18)').css({'top':'0px', 'left':'452px'});
	// 				$('figure:nth-of-type(17)').css({'top':'663px'});
	// 			}
	// 		};
	//
	// 		var resizeGridContainer = function (){
	// 			if(window.innerWidth <= 480){
	// 				$grid.width(280);
	// 			}
	// 		};
	//
	// 		reorderElements();
	// 		resizeGridContainer();
	// 		$(window).smartresize(function(){
	// 			reorderElements();
	// 			resizeGridContainer();
	// 		});
	// 	}
	// 	function mobile_menu(){
	// 		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	// 			$('header .menu .sub-menu').css({'top':'60px'});
	// 		}
	// 	};
	//
	//
	// 	mobile_menu();
	// 	run_isotope();
	// });

} )( jQuery );
