/* Use this file for any scripts of your own. */

jQuery(document).ready(function($) {

	// Inside of this function, $() will work as an alias for jQuery()
	// and other libraries also using $ will not be accessible under this shortcut

	// Basic FitVids Test
	$("main").fitVids();

	//Toggle for Responsive Menu
	$( '.menu-toggle' ).on( 'click', function() {
				$('.main-nav').toggleClass( 'toggled-on' );
			} );

});