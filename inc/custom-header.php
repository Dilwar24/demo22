<?php
/**
 * Custom header implementation
 */

function roofing_services_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'roofing_services_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1200,
		'height'             => 50,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'roofing_services_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'roofing_services_custom_header_setup' );

if ( ! function_exists( 'roofing_services_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see roofing_services_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'roofing_services_header_style' );
function roofing_services_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .menu-section {
			background-image:url('".esc_url(get_header_image())."');
			background-position: bottom center;
		}";
	   	wp_add_inline_style( 'roofing-services-basic-style', $custom_css );
	endif;
}
endif; // roofing_services_header_style