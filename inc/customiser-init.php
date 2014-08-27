<?php
/**
 * Implement customiser controls for OM Connect Theme
 *
 * @since  OM Connect Theme 1.0
 */
if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

function om_connect_customizer_settings( $wp_customize ) {

	// Site logo customiser settings
	$wp_customize->add_setting(
		'om_sitelogo_font',
		array(
			'default'   => 'Montserrat',
			'transport' => 'refresh'
		)
	);

	$wp_customize->add_control(
		'om_sitelogo_font',
		array(
			'section'  => 'title_tagline',
			'label'    => 'Site header font',
			'type'     => 'select',
			'choices'  => array(
				'Montserrat' => 'Montserrat',
				'Yesteryear' => 'Yesteryear',
				'Pacifico' => 'Pacifico',
				'Satisfy' => 'Satisfy',
				'Handlee' => 'Handlee',
				'Lobster' => 'Lobster',
			)
		)
	);

	$wp_customize->add_setting( 'om_sitelogo_color' , array(
		'default'     => '#ffffff',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'om_sitelogo_color', array(
		'label'      => __( 'Site title color', 'om-connect' ),
		'section'    => 'title_tagline',
		'settings'   => 'om_sitelogo_color',
	) ) );

	// Theme Colors
	$wp_customize->get_section('colors')->title = __( 'Theme Colors' );

	$wp_customize->add_setting( 'link_color' , array(
		'default'     => '#de6540',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'tab_bg_color' , array(
		'default'     => '#577582',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'link_hover_color' , array(
		'default'     => '#FFFFFF',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'      => __( 'Link and Menu Highlight Color', 'om-connect' ),
		'section'    => 'colors',
		'settings'   => 'link_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tab_bg_color', array(
		'label'      => __( 'Menu Tabs Background Color', 'om-connect' ),
		'section'    => 'colors',
		'settings'   => 'tab_bg_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
		'label'      => __( 'Link Hover Color', 'om-connect' ),
		'section'    => 'colors',
		'settings'   => 'link_hover_color',
	) ) );

}

add_action( 'customize_register', 'om_connect_customizer_settings' );