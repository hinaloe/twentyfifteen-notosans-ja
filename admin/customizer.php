<?php
if ( ! function_exists( 'add_action' ) ) {
	exit;
}
function tfnsj_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'fonts', array(
		'title' => __( 'Font', 'twentyfifteen-noto-sans-jp' ),
		'description' => __( 'Adjust font', 'twentyfifteen-noto-sans-jp' ),
		'priority' => 45,
		'capability' => 'edit_theme_options',

	) );

	$wp_customize->add_setting( 'tf_font_weight[normal]', array(
		'type' => 'option',
		'sanitize_callback' => 'tfnsj_font_sanitize_weight',
		'transport' => 'postMessage',
		'default' => '400',
	));

	$wp_customize->add_control( 'tf_font_weight[normal]', array(
		'label' => __( 'Font Weight', 'twentyfifteen-noto-sans-jp' ),
		'type' => 'select',
		'description' => __( 'Weight of normal font', 'twentyfifteen-noto-sans-jp' ),
		'choices' => tfnsj_fontweight_list(),
		'section' => 'fonts',
		'priority' => 1,
	));

	$wp_customize->add_setting( 'tf_font_weight[bold]', array(
		'type' => 'option',
		'sanitize_callback' => 'tfnsj_font_sanitize_weight',
		'transport' => 'postMessage',
		'default' => '700',
	));

	$wp_customize->add_control( 'tf_font_weight[bold]', array(
		'label' => __( 'Font Weight (bold)', 'twentyfifteen-noto-sans-jp' ),
		'type' => 'select',
		'description' => __( 'Weight of bold font', 'twentyfifteen-noto-sans-jp' ),
		'choices' => tfnsj_fontweight_list(),
		'section' => 'fonts',
		'priority' => 2,

	));

}

add_action( 'customize_register', 'tfnsj_customize_register', 11 );


function tfnsj_customize_preview_js() {
	wp_enqueue_script( 'tfnsj_css_preview', plugins_url( 'js/customizer-preview.js', __FILE__ ), array( 'customize-preview', 'jquery' ) );
}
add_action( 'customize_preview_init', 'tfnsj_customize_preview_js' );

function tfnsj_fontweight_list() {
	$weights = array(
		'100',
		'200',
		'300',
		'400',
		'500',
		'700',
		'900',
	);
	$weights_options = array();

	foreach ( $weights as $weight ) {
		$weights_options[ $weight ] = $weight;
	}
	return $weights_options;
}

function tfnsj_font_sanitize_weight( $input ) {
	if ( in_array( $input, array( '100', '200', '300', '400', '500', '700', '900' ) ) ) {
		return $input;
	} else {
		return 400;
	}
}
