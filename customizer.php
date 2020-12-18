<?php
	// Customize
	function tpw_customize_register($wp_customize) {
		$wp_customize->add_section(
			'footer',
			array(
				'title' 	=> __('Footer', 'odin'),
				'priority' 	=> 201,
			)
		);
		$wp_customize->add_setting( 'about' );
		$wp_customize->add_control(
			'about',
			array(
				'label' 	=> __('About', 'odin'),
				'section' 	=> 'footer',
			)
		);

		$menus = ['1','2','3','4','5'];
		foreach ($menus as $menu) {
			$wp_customize->add_setting( 'ps_logo_' . $menu );
			$wp_customize->add_control(
				new WP_Customize_Media_Control(
					$wp_customize,
					'ps_logo_' . $menu,
					array(
						'label'     => __( 'Partner or Sponsors ' . $menu, 'odin' ),
						'section'   => 'footer',
						'mime_type' => 'image',
					)
				)
			);
		}

		$wp_customize->add_section(
			'theme',
			array(
				'title' 	=> __('Theme', 'odin'),
				'priority' 	=> 201,
			)
		);
		$wp_customize->add_setting( 'logo' );
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'logo',
				array(
					'label'     => __( 'Logo', 'odin' ),
					'section'   => 'theme',
					'mime_type' => 'image',
				)
			)
		);
		$wp_customize->add_setting( 'display_name' );
		$wp_customize->add_control(
			'display_name',
			array(
				'label' 	=> __('Display name', 'odin'),
				'section' 	=> 'theme',
			)
		);
		$wp_customize->add_setting( 'text_alert' );
		$wp_customize->add_control(
			'text_alert',
			array(
				'label' 	=> __('Alert text', 'odin'),
				'section' 	=> 'theme',
			)
		);
		$wp_customize->add_setting( 'primary_color' );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'primary_color',
				array(
					'label' 	=> __('Primary color', 'odin'),
					'section' 	=> 'theme',
					'mime_type' => 'color'
				)
			)
		);

		$wp_customize->add_section(
			'navbar',
			array(
				'title' 	=> __('Navbar', 'odin'),
				'priority' 	=> 201,
			)
		);
		$wp_customize->add_setting( 'button_text' );
		$wp_customize->add_control(
			'button_text',
			array(
				'label' 	=> __('Button Text', 'odin'),
				'section' 	=> 'navbar',
			)
		);
		$wp_customize->add_setting( 'button_url' );
		$wp_customize->add_control(
			'button_url',
			array(
				'label' 	=> __('Button URL', 'odin'),
				'section' 	=> 'navbar',
			)
		);
	}
	add_action('customize_register', 'tpw_customize_register');