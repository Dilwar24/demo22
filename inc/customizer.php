<?php
/**
 * Roofing Services: Customizer
 *
 * @subpackage Roofing Services
 * @since 1.0
 */

use WPTRT\Customize\Section\Roofing_Services_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Roofing_Services_Button::class );

	$manager->add_section(
		new Roofing_Services_Button( $manager, 'roofing_services_pro', [
			'title'      => __( 'Roofing Services Pro', 'roofing-services' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'roofing-services' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/roofing-services-wordpress-theme/', 'roofing-services')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'roofing-services-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'roofing-services-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function roofing_services_customize_register( $wp_customize ) {

	$wp_customize->add_setting('roofing_services_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('roofing_services_logo_padding',array(
		'label' => __('Logo Margin','roofing-services'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('roofing_services_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'roofing_services_sanitize_float'
	));
	$wp_customize->add_control('roofing_services_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','roofing-services'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('roofing_services_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'roofing_services_sanitize_float'
	));
	$wp_customize->add_control('roofing_services_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','roofing-services'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('roofing_services_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'roofing_services_sanitize_float'
	));
	$wp_customize->add_control('roofing_services_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','roofing-services'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('roofing_services_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'roofing_services_sanitize_float'
 	));
 	$wp_customize->add_control('roofing_services_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','roofing-services'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('roofing_services_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'roofing_services_sanitize_checkbox'
	));
	$wp_customize->add_control('roofing_services_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','roofing-services'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('roofing_services_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'roofing_services_sanitize_checkbox'
	));
	$wp_customize->add_control('roofing_services_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','roofing-services'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_panel( 'roofing_services_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'roofing-services' ),
		'description' => __( 'Description of what this panel does.', 'roofing-services' ),
	) );

	$wp_customize->add_section( 'roofing_services_theme_options_section', array(
    	'title'      => __( 'General Settings', 'roofing-services' ),
		'priority'   => 30,
		'panel' => 'roofing_services_panel_id'
	) );

	$wp_customize->add_setting('roofing_services_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'roofing_services_sanitize_choices'
	));
	$wp_customize->add_control('roofing_services_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','roofing-services'),
		'section' => 'roofing_services_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','roofing-services'),
		   'Right Sidebar' => __('Right Sidebar','roofing-services'),
		   'One Column' => __('One Column','roofing-services'),
		   'Three Columns' => __('Three Columns','roofing-services'),
		   'Four Columns' => __('Four Columns','roofing-services'),
		   'Grid Layout' => __('Grid Layout','roofing-services')
		),
	));

	$wp_customize->add_setting('roofing_services_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'roofing_services_sanitize_choices'
	));
	$wp_customize->add_control('roofing_services_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','roofing-services'),
        'section' => 'roofing_services_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','roofing-services'),
            'Right Sidebar' => __('Right Sidebar','roofing-services'),
            'One Column' => __('One Column','roofing-services')
        ),
	));

	$wp_customize->add_setting('roofing_services_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'roofing_services_sanitize_choices'
	));
	$wp_customize->add_control('roofing_services_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','roofing-services'),
        'section' => 'roofing_services_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','roofing-services'),
            'Right Sidebar' => __('Right Sidebar','roofing-services'),
            'One Column' => __('One Column','roofing-services')
        ),
	));

	$wp_customize->add_setting('roofing_services_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'roofing_services_sanitize_choices'
	));
	$wp_customize->add_control('roofing_services_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','roofing-services'),
        'section' => 'roofing_services_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','roofing-services'),
            'Right Sidebar' => __('Right Sidebar','roofing-services'),
            'One Column' => __('One Column','roofing-services'),
		   	'Three Columns' => __('Three Columns','roofing-services'),
		   	'Four Columns' => __('Four Columns','roofing-services'),
            'Grid Layout' => __('Grid Layout','roofing-services')
        ),
	));

	//Header
	$wp_customize->add_section( 'roofing_services_header_section' , array(
    	'title'    => __( 'Header', 'roofing-services' ),
		'priority' => null,
		'panel' => 'roofing_services_panel_id'
	) );

	$wp_customize->add_setting('roofing_services_phone_number',array(
    	'default' => '',
    	'sanitize_callback'	=> 'roofing_services_sanitize_phone_number'
	));
	$wp_customize->add_control('roofing_services_phone_number',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','roofing-services'),
	   	'section' => 'roofing_services_header_section',
	));

	$wp_customize->add_setting('roofing_services_email',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('roofing_services_email',array(
	   	'type' => 'text',
	   	'label' => __('Add Email Address','roofing-services'),
	   	'section' => 'roofing_services_header_section',
	));

	$wp_customize->add_setting('roofing_services_facebook_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('roofing_services_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','roofing-services'),
	   	'section' => 'roofing_services_header_section',
	));

	$wp_customize->add_setting('roofing_services_twitter_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('roofing_services_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','roofing-services'),
	   	'section' => 'roofing_services_header_section',
	));

	$wp_customize->add_setting('roofing_services_instagram_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('roofing_services_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','roofing-services'),
	   	'section' => 'roofing_services_header_section',
	));

	$wp_customize->add_setting('roofing_services_linkedin_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('roofing_services_linkedin_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Linkedin URL','roofing-services'),
	   	'section' => 'roofing_services_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'roofing_services_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'roofing-services' ),
		'priority' => null,
		'panel' => 'roofing_services_panel_id'
	) );

	$wp_customize->add_setting('roofing_services_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'roofing_services_sanitize_checkbox'
	));
	$wp_customize->add_control('roofing_services_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','roofing-services'),
	   	'section' => 'roofing_services_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'roofing_services_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'roofing_services_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'roofing_services_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'roofing-services' ),
			'description'=> __('Image size (1400px x 600px)','roofing-services'),
			'section' => 'roofing_services_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//About Section
	$wp_customize->add_section('roofing_services_about_section',array(
		'title'	=> __('About Section','roofing-services'),
		'description'=> __('This section will appear below the slider.','roofing-services'),
		'panel' => 'roofing_services_panel_id',
	));

    $wp_customize->add_setting('roofing_services_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('roofing_services_section_title',array(
		'label'	=> __('Section Title','roofing-services'),
		'section' => 'roofing_services_about_section',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'roofing_services_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'roofing_services_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'roofing_services_about_page', array(
		'label' => __('Select About Page', 'roofing-services' ),
		'section' => 'roofing_services_about_section',
		'type' => 'dropdown-pages'
	));

    $wp_customize->add_setting('roofing_services_experience_years',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('roofing_services_experience_years',array(
		'label'	=> __('Experience Years','roofing-services'),
		'section' => 'roofing_services_about_section',
		'type' => 'text'
	));

	//Footer
    $wp_customize->add_section( 'roofing_services_footer', array(
    	'title'  => __( 'Footer Text', 'roofing-services' ),
		'priority' => null,
		'panel' => 'roofing_services_panel_id'
	) );

	$wp_customize->add_setting('roofing_services_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'roofing_services_sanitize_checkbox'
    ));
    $wp_customize->add_control('roofing_services_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','roofing-services'),
       'section' => 'roofing_services_footer'
    ));

    $wp_customize->add_setting('roofing_services_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('roofing_services_footer_copy',array(
		'label'	=> __('Footer Text','roofing-services'),
		'section' => 'roofing_services_footer',
		'setting' => 'roofing_services_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'roofing_services_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'roofing_services_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'roofing_services_customize_register' );

function roofing_services_customize_partial_blogname() {
	bloginfo( 'name' );
}

function roofing_services_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function roofing_services_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function roofing_services_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}