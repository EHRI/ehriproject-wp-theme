<?php
/**
 * Understrap Theme Customizer
 *
 * @package ehriproject
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'ehriproject_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function ehriproject_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'ehriproject_customize_register' );

if ( ! function_exists( 'ehriproject_theme_customize_register' ) ) {
	function ehriproject_theme_customize_register( $wp_customize ) {
        $wp_customize->add_section(
            'ehriproject_theme_header_options',
            array(
                'title' => __( 'Theme Header Settings' ),
                'capability' => 'edit_theme_options',
                'description' => __( 'EHRI theme header settings' ),
                'priority' => 170,
            )
        );

        $wp_customize->add_setting(
            'ehriproject_plausible_domain',
            array(
                'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'ehriproject_plausible_domain',
                array(
                    'label' => __( 'Plausible Analytics domain', 'ehri' ),
                    'description' => __( 'Set the domain for adding a Plausible Analytics tracking script', 'ehri' ),
                    'section' => 'ehriproject_theme_header_options',
                    'settings' => 'ehriproject_plausible_domain',
                    'type' => 'input',
                    'priority' => '10',
                )

            )
        );

        $wp_customize->add_section(
			'ehriproject_theme_social_options',
			array(
				'title' => __( 'Theme Social Media Settings' ),
				'capability' => 'edit_theme_options',
				'description' => __( 'EHRI theme social settings' ),
				'priority' => 170,
			)
		);

        $wp_customize->add_setting(
            'ehriproject_twitter_url',
            array(
                'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'ehriproject_twitter_url',
                array(
                    'label' => __( 'Twitter URL', 'ehriproject' ),
                    'description' => __( 'Set the Twitter/X follow URL', 'ehriproject' ),
                    'section' => 'ehriproject_theme_social_options',
                    'settings' => 'ehriproject_twitter_url',
                    'type' => 'input',
                    'priority' => '10',
                )

            )
        );

        $wp_customize->add_setting(
            'ehriproject_bluesky_url',
            array(
                'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'ehriproject_bluesky_url',
                array(
                    'label' => __( 'Bluesky URL', 'ehriproject' ),
                    'description' => __( 'Set the Bluesky follow URL', 'ehriproject' ),
                    'section' => 'ehriproject_theme_social_options',
                    'settings' => 'ehriproject_bluesky_url',
                    'type' => 'input',
                    'priority' => '10',
                )

            )
        );

        $wp_customize->add_setting(
			'ehriproject_linkedin_url',
			array(
				'default' => '',
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
			)
		);

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'ehriproject_linkedin_url',
                array(
                    'label' => __( 'Linkedin URL', 'ehriproject' ),
                    'description' => __( 'Set the LinkedIn follow URL', 'ehriproject' ),
                    'section' => 'ehriproject_theme_social_options',
                    'settings' => 'ehriproject_linkedin_url',
                    'type' => 'input',
                    'priority' => '10',
                )

            )
        );

        $wp_customize->add_setting(
            'ehriproject_facebook_url',
            array(
                'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
            )
        );

        $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ehriproject_facebook_url',
				array(
					'label' => __( 'Facebook URL', 'ehriproject' ),
					'description' => __( 'Set the Facebook follow URL', 'ehriproject' ),
					'section' => 'ehriproject_theme_social_options',
					'settings' => 'ehriproject_facebook_url',
					'type' => 'input',
					'priority' => '10',
				)

			)
		);

		$wp_customize->add_section(
			'ehriproject_theme_footer_options',
			array(
				'title' => __( 'Theme Footer Settings' ),
				'capability' => 'edit_theme_options',
				'description' => __( 'EHRI theme footer settings' ),
				'priority' => 171,
			)
		);

		$wp_customize->add_setting(
			'ehriproject_mailinglist_url',
			array(
				'default' => '',
				'type' => 'theme_mod',
				'capability' => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ehriproject_mailinglist_url',
				array(
					'label' => __( 'Mailing List URL', 'ehri' ),
					'description' => __( 'Set the URL for signing up to the mailing list', 'ehri' ),
					'section' => 'ehriproject_theme_footer_options',
					'settings' => 'ehri_mailinglist_url',
					'type' => 'input',
					'priority' => '10',
				)

			)
		);
	}
}

add_action( 'customize_register', 'ehriproject_theme_customize_register' );
