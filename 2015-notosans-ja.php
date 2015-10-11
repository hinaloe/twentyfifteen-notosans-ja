<?php

/*
Plugin Name: Twentyfifteen Noto Sans Japanese
Plugin URI: https://blog.hinaloe.net/
Description: The font of TwentyFifteen is changed to a Japanese Gothic font.
Version: 0.0.1
Author: Hinaloe
Author URI: https://hinaloe.net/
Text Domain: twentyfifteen-notosans-ja
Domain Path: /languages
*/


function twentyfifteen_fonts_ja_url() {
	return plugins_url( 'noto-sans-japanese.css', __FILE__ );
}

function twentyfifteen_enque_ja_css() {
	if ( wp_style_is( 'twentyfifteen-fonts' ) ) {
		wp_deregister_style( 'twentyfifteen-fonts' );
		wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_ja_url(), array(), null );
	} else if ( wp_style_is( 'twentyfifteen-fonts', 'registered' ) ) {
		wp_deregister_style( 'twentyfifteen-fonts' );
		wp_register_style( 'twentyfifteen-fonts', twentyfifteen_fonts_ja_url(), array(), null );
	} else {
		wp_register_style( 'twentyfifteen-fonts', twentyfifteen_fonts_ja_url(), array(), null );
	}
}

add_action( 'wp_enqueue_scripts', 'twentyfifteen_enque_ja_css' );
