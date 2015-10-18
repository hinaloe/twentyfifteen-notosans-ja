<?php
if ( ! function_exists( 'add_action' ) ) {
	exit;
}

function tfnsj_editor_style() {
	if ( ( $weights = get_option( 'tf_font_weight' ) ) && is_array( $weights ) ) {
		add_editor_style( array( plugins_url( 'editor-style-gen.php?' . http_build_query( $weights ) , __FILE__ ) ) );
	}

}

add_action( 'admin_init', 'tfnsj_editor_style' );
