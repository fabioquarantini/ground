<?php

/*  ==========================================================================
	
	1 - Redirect after theme activation
	2 - Register preview script
	3 - Customize register
	
	==========================================================================  */


/*  ==========================================================================
	1 - Redirect to option after theme activation
	==========================================================================  */

function ground_theme_activation() {
	
	if (is_admin() && isset($_GET['activated']) && 'themes.php' == $GLOBALS['pagenow']) {
		wp_redirect(admin_url('customize.php'));
		exit;
	}

}

add_action( 'after_setup_theme', 'ground_theme_activation' );


/*  ==========================================================================
	2 - Register preview script
	==========================================================================  */

function ground_customize_preview_js() {

	wp_register_script( 'ground-customizer', MY_THEME_FOLDER . '/js/theme-customizer.js', array(  'jquery','customize-preview'  ), '1.0', false );
	wp_enqueue_script( 'ground-customizer' );

}

add_action( 'customize_preview_init', 'ground_customize_preview_js' );


/*  ==========================================================================
	3 - Customize register
	==========================================================================  */

function ground_register_customize_fields( $wp_customize ) {
	
	/* Analytics */
	
	$wp_customize->add_section('analytics_section',
		array(
			'title'					=> __('Analytics', 'groundtheme'),								// The title of the section for display in the menu
			'description'			=> __('Google analytics code', 'groundtheme'),					// A short description about this section
			'priority'				=> '130',														// The sequence or order of sections displayed in the menu, the lower the number, the higher it will display
		)
	);
	

	$wp_customize->add_setting( 'analytics_option',
		array(
			'default'				=> 'UA-XXXXX-X',												// The default value of the input setting field
			'theme-supports'		=> '',															// Check whether the current theme supports the given theme feature, if not, this setting is no longer available
			'type'					=> 'option',													// Define a setting’s type, either theme_mod or option, the default is theme_mod.
			'capability'			=> '',															// Default is "edit_theme_options"
			'sanitize_callback'		=> '',															// The callback function that sanitizes data input
			'sanitize_js_callback'	=> '',															// The callback function that sanitizes data used for Javascript.
			'transport'				=> 'postMessage',												// The way data will be transported, can be either refresh or postMessage. Default is "refresh"
		)
	);


	$wp_customize->add_control( 'analytics_option',
		array(
			'label'					=> __('Insert analytics "UA-XXXXX-X" code', 'groundtheme'),		// The label of setting.
			'settings'				=> '',															// The name of the setting option that is handled. If leaving blank, the value of above id will be used. Default is id property
			'section'				=> 'analytics_section',											// The section that the setting belongs to.
			'type'					=> 'text',														// The type of setting option will be rendered (text, checkbox, radio, select, dropdown-pages). Default is "text"
			'choices'				=> '',															// List of setting options for the radio and select types. This is optional, depending on type's value
			'priority'				=> '',															// Lower numbers correspond with earlier execution. Default is 10.
		)
	);
	
	
	/* Favicon */
	
	$wp_customize->add_section('favicon_section', array(
		'title' => __('Favicon', 'groundtheme'),
		'description' => __('Favicon', 'groundtheme'),
		'priority' => '140',
	));
	
		
	$wp_customize->add_setting( 'favicon_option', array(
		'default' => '',
		'theme-supports' => '',
		'type' => 'option',
		'capability' => '',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
		'transport' => '',
	));
	
				
	$wp_customize->add_control( 'favicon_option', array(
		'label' => __('Insert favicon url', 'groundtheme'),
		'settings' => '',
		'section' => 'favicon_section',
		'type' => 'text',
		'choices' => '',
		'priority' => '',
	));
	
	
	/* Maintenance mode */
	
	$wp_customize->add_section('maintenance_section', array(
		'title' => __('Maintenance mode', 'groundtheme'),
		'description' => __('Maintenance mode', 'groundtheme'),
		'priority' => '150',
	));
	
		
	$wp_customize->add_setting( 'maintenance_option', array(
		'default' => '',
		'theme-supports' => '',
		'type' => 'option',
		'capability' => '',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
		'transport' => '',
	));
	
				
	$wp_customize->add_control( 'maintenance_option', array(
		'label' => __('Activate maintenance mode', 'groundtheme'),
		'settings' => '',
		'section' => 'maintenance_section',
		'type' => 'checkbox',
		'choices' => '',
		'priority' => '',
	));


	/* Content width */
	
	$wp_customize->add_section('content_width', array(
		'title' => __('Content width', 'groundtheme'),
		'description' => __('Content width', 'groundtheme'),
		'priority' => '160',
	));
	
		
	$wp_customize->add_setting( 'maintenance_option', array(
		'default' => '',
		'theme-supports' => '',
		'type' => 'option',
		'capability' => '',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
		'transport' => '',
	));
	
				
	$wp_customize->add_control( 'maintenance_option', array(
		'label' => __('Set the maximum allowed width', 'groundtheme'),
		'settings' => '',
		'section' => 'content_width',
		'type' => 'text',
		'choices' => '',
		'priority' => '',
	));
	
	
	/* Default options for live preview */
	
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	
}

add_action( 'customize_register', 'ground_register_customize_fields' );

?>