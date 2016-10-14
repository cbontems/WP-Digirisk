window.digirisk.gallery = {};

window.digirisk.gallery.init = function() {
	window.digirisk.gallery.event();
};

window.digirisk.gallery.event = function() {
	jQuery( document ).on( 'keyup', window.digirisk.gallery.keyup );
	jQuery( document ).on( 'click', '.wpeo-gallery', function( event ) { event.preventDefault(); return false; } );
	jQuery( document ).on( 'click', '.wpeo-gallery .prev', window.digirisk.gallery.prev );
	jQuery( document ).on( 'click', '.wpeo-gallery .next', window.digirisk.gallery.next );
	jQuery( document ).on( 'click', '.wpeo-gallery .set-as-thumbnail', window.digirisk.gallery.set_thumbnail );
	jQuery( document ).on( 'click', '.wpeo-gallery .close', window.digirisk.gallery.close );
};

window.digirisk.gallery.keyup = function( event ) {
	if ( event.keyCode == 37 ) {
		jQuery( '.wpeo-gallery .prev' ).click();
	}
	else if ( event.keyCode == 39 ) {
		jQuery( '.wpeo-gallery .next' ).click();
	}
	else if ( event.keyCode == 27 ) {
		jQuery( '.wpeo-gallery .close' ).click();
	}
};

window.digirisk.gallery.open = function( element ) {
	element.find( '.wpeo-gallery' ).show();
};

window.digirisk.gallery.prev = function( event ) {
	event.preventDefault();
	if ( jQuery( this ).closest( 'div' ).find( '.image-list li.current').prev().length <= 0 ) {
		jQuery( this ).closest( 'div' ).find( '.image-list li.current' ).toggleClass( 'current hidden' );
		jQuery( this ).closest( 'div' ).find( '.image-list li:last' ).toggleClass( 'hidden current' );
	}
	else {
		jQuery( this ).closest( 'div' ).find( '.image-list li.current' ).toggleClass( 'current hidden' ).prev().toggleClass( 'hidden current' );
	}
};

window.digirisk.gallery.next = function( event ) {
	event.preventDefault();

	if ( jQuery( this ).closest( 'div' ).find( '.image-list li.current').next().length <= 0 ) {
		jQuery( this ).closest( 'div' ).find( '.image-list li.current' ).toggleClass( 'current hidden' );
		jQuery( this ).closest( 'div' ).find( '.image-list li:first' ).toggleClass( 'hidden current' );
	}
	else {
		jQuery( this ).closest( 'div' ).find( '.image-list li.current' ).toggleClass( 'current hidden' ).next().toggleClass( 'hidden current' );
	}
};

window.digirisk.gallery.set_thumbnail = function( event ) {
	var data = {
		action: 'eo_set_thumbnail',
		element_id: jQuery( this ).closest( 'div' ).data( 'id' ),
		thumbnail_id: jQuery( this ).closest( 'div' ).find( 'li.current' ).data( 'id' ),
	};

	jQuery.post( window.ajaxurl, data, function( response ) {
      jQuery( 'span.wpeo-upload-media[data-id="'+ window.file_management.element_id + '"]' ).find( '.wp-post-image' ).replaceWith( response.data.template );
	} );
};

window.digirisk.gallery.close = function( event ) {
	jQuery( '.wpeo-gallery' ).hide();
};

// var wpeo_gallery = {
// 	$: undefined,
// 	event: function( $ ) {
// 		wpeo_gallery.$ = $;
//
// 		wpeo_gallery.$( document ).on( 'keyup', function( event ) { wpeo_gallery.keyup( event, wpeo_gallery.$( this ) ); } );
// 		wpeo_gallery.$( document ).on( 'click', '.wpeo-gallery', function( event ) { event.preventDefault(); return false; } );
// 		wpeo_gallery.$( document ).on( 'click', '.wpeo-gallery .prev', function( event ) { wpeo_gallery.prev( event, wpeo_gallery.$( this ) ); } );
// 		wpeo_gallery.$( document ).on( 'click', '.wpeo-gallery .next', function( event ) { wpeo_gallery.next( event, wpeo_gallery.$( this ) ); } );
// 		wpeo_gallery.$( document ).on( 'click', '.wpeo-gallery .set-as-thumbnail', function( event ) { wpeo_gallery.set_thumbnail( event, wpeo_gallery.$( this ) ); } );
// 		wpeo_gallery.$( document ).on( 'click', '.wpeo-gallery .close', function( event ) { wpeo_gallery.close( event ); } );
//
// 	},
//
// 	keyup: function( event, element ) {
// 		if ( event.keyCode == 37 ) {
// 			wpeo_gallery.$( '.wpeo-gallery .prev' ).click();
// 		}
// 		else if ( event.keyCode == 39 ) {
// 			wpeo_gallery.$( '.wpeo-gallery .next' ).click();
// 		}
// 		else if ( event.keyCode == 27 ) {
// 			wpeo_gallery.$( '.wpeo-gallery .close' ).click();
// 		}
// 	},
//
