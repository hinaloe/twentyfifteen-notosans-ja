<?php

/*
Plugin Name: Twentyfifteen Noto Sans Japanese
Plugin URI: https://hinaloe.net/portfolio/twentyfifteen-noto-sans-jp
Description: The font of TwentyFifteen is changed to a Japanese Gothic font.
Version: 0.2.1
Author: Hinaloe
Author URI: https://hinaloe.net/
Text Domain: twentyfifteen-noto-sans-jp
*/
if ( ! function_exists( 'add_action' ) ) {
	exit;
}

require_once( dirname( __FILE__ ) . '/admin/customizer.php' );
if ( is_admin() ) {
	require_once( dirname( __FILE__ ) . '/admin/editor-style.php' );
}

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
	function twentyfifteen_fonts_url() {
		return twentyfifteen_fonts_ja_url();
	}
endif;

function twentyfifteen_fonts_ja_url() {
	return plugins_url( 'noto-sans-japanese.css', __FILE__ );
}

/**
 * Generate plugin stylesheet
 *
 * @param bool $important for editor.
 *
 * @return bool|string
 */
function tfnsj_font_weight_genearate_css( $important = false ) {
	if ( $weights = get_option( 'tf_font_weight' ) ) {
		$css       = '';
		$important = $important ? '!important' : '';
		if ( isset( $weights['normal'] ) ) {
			$w = filter_var( $weights['normal'], FILTER_VALIDATE_INT );
			$css .= <<<CSS
body,
button,
input,
select,
textarea,

.main-navigation .menu-item-description,
.post-navigation .meta-nav,
blockquote strong,
blockquote b,
.image-navigation .nav-previous:not(:empty) + .nav-next:not(:empty):before,
.comment-navigation .nav-previous:not(:empty) + .nav-next:not(:empty):before,
.site-description {
	font-weight: ${w} ${important}
}


::-webkit-input-placeholder {
	font-weight: ${w}
}
:-moz-placeholder {
	font-weight: ${w}
}

:-ms-input-placeholder {
	font-weight: ${w}
}
CSS;
		}
		if ( isset( $weights['bold'] ) ) {
			$w = filter_var( $weights['bold'], FILTER_VALIDATE_INT );
			$css .= <<<CSS
h1,
h2,
h3,
h4,
h5,
h6,
b,
strong,
th,
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.post-password-form label,
.main-navigation .current-menu-item > a,
.main-navigation .current-menu-ancestor > a,
.post-navigation,
.pagination .current,
.image-navigation,
.comment-navigation,
.site-title,
.widget_calendar caption,
.widget_calendar tbody a,
.widget_rss .rsswidget ,
.sticky-post,
.comment-list .reply a,
.comment-form label,
.no-comments,
.widecolumn label,
.widecolumn .mu_register label,
dt {
	font-weight: ${w} ${important}
}
CSS;

		}

		return $css;
	}

	return false;
}

/**
 * Add plugin inline style
 */
function tfnsj_font_weight_css() {
	$css = tfnsj_font_weight_genearate_css();
	if ( $css ) {
		wp_add_inline_style( 'twentyfifteen-style', $css );
	}
}

/**
 * Load plugin textdomain.
 */
function tfnsj_load_textdomain() {
	load_plugin_textdomain( 'twentyfifteen-noto-sans-jp' );
}

add_action( 'wp_enqueue_scripts', 'tfnsj_font_weight_css', 11 );
add_action( 'plugins_loaded', 'tfnsj_load_textdomain' );
