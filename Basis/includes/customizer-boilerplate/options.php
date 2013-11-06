<?php

/**
 * Get Theme Customizer Fields
 *
 * @package		Theme_Customizer_Boilerplate
 * @copyright	Copyright (c) 2013, Slobodan Manic
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 * @author		Slobodan Manic
 *
 * @since		Theme_Customizer_Boilerplate 1.0
 */


/**
 * Helper function that holds array of theme options.
 *
 * @return	array	$options	Array of theme options
 * @uses	thsp_get_theme_customizer_fields()	defined in customizer/helpers.php
 */
function thsp_cbp_get_fields() {

	/*
	 * Using helper function to get default required capability
	 */
	$thsp_cbp_capability = thsp_cbp_capability();
	
	$options = array(

		// Section ID
		'analytics_section' => array(
		
			/*
			 * We're checking if this is an existing section
			 * or a new one that needs to be registered
			 */
			'existing_section' => false,
			/*
			 * Section related arguments
			 * Codex - http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
			 */
			'args' => array(
				'title' => __( 'Analytics', 'my_theme_textdomain' ),
				'description' => __( 'Add Analytics Code', 'my_theme_textdomain' ),
				'priority' => 2
			),
			
			/* 
			 * This array contains all the fields that need to be
			 * added to this section
			 */
			'fields' => array(

				//Analytics field
				'basis_analytics_code' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Analytics Code', 'my_theme_textdomain' ),
						'type' => 'textarea', // Textarea control
						'priority' => 7
					)
				)

			),
			
		),

		// Section ID
		'background_section' => array(
		
			/*
			 * We're checking if this is an existing section
			 * or a new one that needs to be registered
			 */
			'existing_section' => false,
			/*
			 * Section related arguments
			 * Codex - http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
			 */
			'args' => array(
				'title' => __( 'Background Images', 'my_theme_textdomain' ),
				'description' => __( 'Each page will randomly load one of your background images.', 'my_theme_textdomain' ),
				'priority' => 1
			),
			
			/* 
			 * This array contains all the fields that need to be
			 * added to this section
			 */
			'fields' => array(

				// BG Image 1
				'background_1' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Background Image 1', 'my_theme_textdomain' ),
						'type' => 'image', // Image upload field control
						'priority' => 6
					)
				),

				// BG Image 2
				'background_2' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Background Image 2', 'my_theme_textdomain' ),
						'type' => 'image', // Image upload field control
						'priority' => 6
					)
				),

				// BG Image 3
				'background_3' => array(
					'setting_args' => array(
						'default' => '',
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'Background Image 3', 'my_theme_textdomain' ),
						'type' => 'image', // Image upload field control
						'priority' => 6
					)
				),

			),
			
		),

		/*
		 * Add fields to an existing Customizer section
		 */
		'colors' => array(
			'existing_section' => true,
			'fields' => array(

				/*
				 * ==============
				 * ==============
				 * Checkbox field
				 * ==============
				 * ==============
				 */
				'new_checkbox_field_colors' => array(
					'setting_args' => array(
						'default' => true,
						'type' => 'option',
						'capability' => $thsp_cbp_capability,
						'transport' => 'refresh',
					),					
					'control_args' => array(
						'label' => __( 'New color field label', 'my_theme_textdomain' ),
						'type' => 'color', // Checkbox field control
						'priority' => 1
					)
				)	
						
			)
		)

	);
	
	/* 
	 * 'thsp_cbp_options_array' filter hook will allow you to 
	 * add/remove some of these options from a child theme
	 */
	return apply_filters( 'thsp_cbp_options_array', $options );
	
}