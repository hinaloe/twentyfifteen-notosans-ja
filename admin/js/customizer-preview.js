( function( $ ) {

	wp.customize( 'tf_font_weight[normal]', function( value ) {
		value.bind( function( to ) {
			$( 'body,button,input,select,textarea,.main-navigation .menu-item-description,.post-navigation .meta-nav,blockquote strong,blockquote b,.image-navigation .nav-previous:not(:empty) + .nav-next:not(:empty):before,.comment-navigation .nav-previous:not(:empty) + .nav-next:not(:empty):before,.site-description' ).css( 'font-weight', to );
		} );
	} );
	wp.customize( 'tf_font_weight[bold]', function( value ) {
		value.bind( function( to ) {
			$( 'h1,h2,h3,h4,h5,h6,b,strong,th,button,input[type=button],input[type=reset],input[type=submit],.post-password-form label,.main-navigation .current-menu-item > a,.main-navigation .current-menu-ancestor > a,.post-navigation,.pagination .current,.image-navigation,.comment-navigation,.site-title,.widget_calendar caption,.widget_calendar tbody a,.widget_rss .rsswidget ,.sticky-post,.comment-list .reply a,.comment-form label,.no-comments,.widecolumn label,.widecolumn .mu_register label,dt' ).css( 'font-weight', to );
		} );
	} );
} )( jQuery );
