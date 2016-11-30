(function( $ ) {
	$(document).ready( function() {
		$('figcaption').each(function (index){
			$(this).on('click',function (){
				var image_url = $(this).attr('data-src');
				console.log(image_url);
			});
		});
	});

} )( jQuery );