<?php

if ( ! function_exists( 'add_action' ) ) {
	exit;
}

/**
 * Class TfNsJ_Admin_Style
 */
class TfNsJ_Admin_Style {

	/**
	 * @var static $instance instance.
	 */
	private static $instance;

	/**
	 * TfNsJ_Admin_Style constructor.
	 */
	private function __construct() {
		add_action( 'tiny_mce_before_init', array( $this, 'mce_before_init' ) );
	}

	/**
	 * Initialize Admin.
	 *
	 * @return static
	 */
	public static function init() {
		if ( is_null( static::$instance ) ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Filter before TinyMce init.
	 *
	 * @param array $mce_init mce config.
	 *
	 * @return array
	 */
	public function mce_before_init( $mce_init ) {
		$css = tfnsj_font_weight_genearate_css( true );
		if ( $css ) {
			$css = esc_js( $css );
			if ( isset( $mce_init['content_style'] ) ) {
				$mce_init['content_style'] .= $css;
			} else {
				$mce_init['content_style'] = $css;
			}
		}

		return $mce_init;
	}
}

add_action( 'admin_init', array( 'TfNsJ_Admin_Style', 'init' ) );
