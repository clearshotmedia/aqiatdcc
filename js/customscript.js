jQuery( document ).ready( function( $ ) {
	

	

	// Toggle navigation
	$( '.nav-toggle' ).on( 'click', function(){	
		$( this ).add( '.site-nav' ).toggleClass( 'active' );
		$( this ).add( '.shrink' ).toggleClass( 'active' );
		$( 'body' ).toggleClass( 'lock-screen' );
	} );
	
	//window.onscroll = function() {scrollFunction()};

//jQuery time
	 
/*function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("masthead").classList.add('shrink');
  } else {
    document.getElementById("masthead").classList.remove('shrink');
  }
}*/
	
	
		
		
	



	// Resize videos after their container
	var vidSelector = ".post iframe, .post object, .post video, .widget-content iframe, .widget-content object, .widget-content iframe";	
	var resizeVideo = function(sSel) {
		$( sSel ).each(function() {
			var $video = $(this),
				$container = $video.parent(),
				iTargetWidth = $container.width();

			if ( !$video.attr("data-origwidth") ) {
				$video.attr("data-origwidth", $video.attr("width"));
				$video.attr("data-origheight", $video.attr("height"));
			}

			var ratio = iTargetWidth / $video.attr("data-origwidth");

			$video.css("width", iTargetWidth + "px");
			$video.css("height", ( $video.attr("data-origheight") * ratio ) + "px");
		});
	};

	resizeVideo( vidSelector );

	$( window ).resize( function() {
		resizeVideo( vidSelector );
	} );
	
	
	
	
	
	// If the website has a custom logo, adjust the site-nav top
	// padding to make sure it is consistent with image dimensions
	if ( $( 'body').hasClass( 'wp-custom-logo' ) ) {

		var headerHeight = $( '.site-header' ).outerHeight();
		$( '.site-nav' ).css( 'padding-top', headerHeight + 'px' );

		$( window ).resize( function() {
			var headerHeight = $( '.site-header' ).outerHeight();
			$( '.site-nav' ).css( 'padding-top', headerHeight + 'px' );
		} );

	}

	
	// Intercept the Jetpack Load More button when it's reinserted
	$( document ).bind( 'DOMNodeInserted', function( e ) {
		var $target = $( e.target );
		if ( $target.is( '#infinite-handle' ) ) {
			$target.hide();
		}
	} );
	
	
	// Triggers re-layout on Jetpack infinite scroll
	infinite_count = 0;
    $( document.body ).on( 'post-load', function() {

        infinite_count = infinite_count + 1;
		
		// Target the new items and hide them
		var $selector = $( '#infinite-view-' + infinite_count ),
        	$elements = $selector.find( '.post-preview' );
			
		$elements.hide();

		// When images are loaded, show them again
        $elements.imagesLoaded().done( function(){
            $container.append( $elements );
			$elements.show();
			$container.masonry( 'appended', $elements );
			
			// Prepare for fade-in animation on scroll
			$elements.each( function( index ) {
				if ( $( this ).offset().top < ( $( window ).height() + $( window ).scrollTop() ) ) {
					$( this ).addClass( 'jetpack-fade-in' );
				} else {
					$( this ).addClass( 'will-spot' ).removeClass( 'spotted' );
				}
				
			} );
			
			setTimeout( function() { 
				masonryInit();
			}, 500 ); 
			
			// Show the load more button again
			$( '#infinite-handle' ).fadeIn();
			
        });

    });
	
});