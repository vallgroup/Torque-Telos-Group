jQuery( document ).ready( function( $ ) {

	// Determine article height according to image height

	var bWidth = $( window ).width();

	$('.home #primary article, .archive #primary article').each( function( index ) {
		var imgWidth = $( this ).data( 'imgwidth' );
		var imgHeight = $( this ).data( 'imgheight' );
		var newImgHeight = imgHeight / imgWidth * bWidth;
		$( this ).height( newImgHeight );
		if( bWidth > imgWidth ) {
			$( this ).addClass( 'imgcover' );
		} else {
			$( this ).removeClass( 'imgcover' );
		}
	});

	/*  Moving infinity link inside blockquote */
	jQuery.fn.outerHTML = function() {
    	return $( 'cite' ).append( this.eq(0).clone() ).html();
	};
	$( '.format-quote a.infinity' ).outerHTML();

	/* Gallery caption */
	$( 'dl.gallery-item' ).hover(
		function () {
			$( this ).find( '.gallery-caption' ).removeClass( 'hide' ).addClass( 'show' );
		},
		function () {
			$( this ).find( '.gallery-caption' ).removeClass( 'show' ).addClass( 'hide' );
		}
	);

	/* Menu */
	var $masthead = $( '#masthead' ),
	    timeout = false;

	$.fn.smallMenu = function() {
		$masthead.find( '.site-navigation' ).removeClass( 'main-navigation' ).addClass( 'main-small-navigation' );
		$masthead.find( '.site-navigation h1' ).removeClass( 'assistive-text' ).addClass( 'menu-toggle' );

		$( '.menu-toggle' ).unbind( 'click' ).click( function() {
			$masthead.find( '.main-menu' ).toggle();
			$( this ).toggleClass( 'toggled-on' );
		} );
	};

	// Determine menu style when loading
	var logoWidth = $( '#anchor hgroup' ).outerWidth( true );
	var navWidth = $( '#anchor nav' ).outerWidth( true );
	var anchorWidth = $( '#anchor' ).width();
	//if( ( ( logoWidth + navWidth ) > ( anchorWidth - 10 ) ) ) {
	if( ( ( logoWidth + navWidth ) > ( anchorWidth - 186 ) ) ) {
		$.fn.smallMenu();
	}

	// Determine menu style when resized
	$( window ).resize( function() {
		var logoWidth = $( '#anchor hgroup' ).outerWidth( true );
		var anchorWidth = $( '#anchor' ).width();

		//if( ( ( logoWidth + navWidth ) > ( anchorWidth - 10 ) ) ) {
		if( ( ( logoWidth + navWidth ) > ( anchorWidth - 186 ) ) ) {
			$.fn.smallMenu();
		} else {
		 	$masthead.find( '.site-navigation' ).removeClass( 'main-small-navigation' ).addClass( 'main-navigation' );
			$masthead.find( '.site-navigation h1' ).removeClass( 'menu-toggle' ).addClass( 'assistive-text' );
		 	$masthead.find( '.main-menu' ).removeAttr( 'style' );
		}
	} );

	// fixed nav position
	$( document ).scroll( function() {
		// if has not activated (has no attribute "data-top"
		if ( ! $( '.site-nav' ).attr( 'data-top' ) ) {
			// if already fixed, then do nothing
			if ( $( '.site-nav' ).hasClass( 'fixed' ) ) return;
			// remember top position
	 		var offset = $( '.site-nav' ).offset()
	 		$( '.site-nav' ).attr( 'data-top', offset.top );
		}

		if ( $( '.site-nav' ).attr( 'data-top' ) <= $( this ).scrollTop() ) {
			$( '.site-nav' ).addClass( 'fixed' );
		} else {
			$( '.site-nav' ).removeClass( 'fixed' );
		}
	 });

	// up down keypress navigation
	$( window ).keydown( function( e ) {
		if ( ( e.keyCode == 40 || e.keyCode == 38 ) && $( 'body' ).is( '.home, .archive' ) ) {

			e.preventDefault(); //prevent default arrow key behavior

			var target;

			if ( e.keyCode == 40 ) { //down arrow
				$target = $( '.active' ).next( '.hentry' );
			} else if ( e.keyCode == 38 ) { //up arrow
				$target = $( '.active' ).prev( '.hentry' );
			}

			if ( ! $target.length ) { return; }
			$( '.active' ).removeClass( 'active' );
			$target.addClass( 'active' );

			//scroll element into view
			$( 'html, body' ).clearQueue().animate({ scrollTop: $target.offset().top + -$( '.site-nav' ).outerHeight() }, 500 );
		}
	});

	// up down arrow click navigation
	$( '.scroll' ).on( 'click', function() {
		var target;

		if ( $( this ).attr( 'id' ) == 'down' ) {
			$target = $( '.active' ).next( '.hentry' );
		} else if ( $( this ).attr( 'id' ) == 'up' ) {
			$target = $( '.active' ).prev( '.hentry' );
		}

		if ( ! $target.length ) { return; }

		$( '.active' ).removeClass( 'active' );
		$target.addClass( 'active' );

		//scroll element into view
		$( 'html, body' ).clearQueue().animate({ scrollTop: $target.offset().top + -$( '.site-nav' ).outerHeight() }, 500 );

	});

	// up down navigation when window scrolled
	$( window ).scroll( function() {
		$( '.hentry' ).removeClass( 'active' );
	 	var winTop = $( this ).scrollTop();
	 	var $divs = $( '.hentry' );
	 	var top = $.grep( $divs, function( item ) {
	 		return $( item ).position().top-10 <= winTop;
	 	});
	 	$( top ).last().addClass( 'active' );
	});

});