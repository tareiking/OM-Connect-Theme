<?php
/**
 * Implement customiser controls for OM Connect Theme
 *
 * @since  OM Connect Theme 1.0
 */
if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

function om_connect_customizer_settings( $wp_customize ) {
	// Remove some things
	$wp_customize->remove_control( 'background_color' );
	$wp_customize->get_section('colors')->title = __( 'Theme Colors' );

	$wp_customize->add_setting( 'primary_color' , array(
		'default'     => '#de6540',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'secondary_color' , array(
		'default'     => '#577582',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'link_hover_color' , array(
		'default'     => '#FFFFFF',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label'      => __( 'Links and Tab Highlight Color', 'om-connect' ),
		'section'    => 'colors',
		'settings'   => 'primary_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
		'label'      => __( 'Menu Tabs Background Color', 'om-connect' ),
		'section'    => 'colors',
		'settings'   => 'secondary_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_txt_color', array(
		'label'      => __( 'Link Hover Color', 'om-connect' ),
		'section'    => 'colors',
		'settings'   => 'link_hover_color',
	) ) );

}

add_action( 'customize_register', 'om_connect_customizer_settings' );