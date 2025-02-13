jQuery(document).ready( function($) {

    jQuery.post( 
      PixelPerfect_data.ajax_url,
      { 'action': 'fetch_PixelPerfect_ajax' },
      function( response ) {
          console.log(response);
        } 
      )
} );
