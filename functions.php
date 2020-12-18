<?php
	add_theme_support('post-thumbnails');
	add_theme_support('menus');

	require_once get_template_directory() . '/customizer.php';
	
	if(!function_exists('theme_setup')) {
		function theme_setup() {
		    $menus_name = ['essentials-links','navbar-top','portfolio-accounts','social-media','your-links'];
		    foreach ($menus_name as $menu) {
		    	$menu_name   = $menu;
			    $menu_exists = wp_get_nav_menu_object($menu_name);

			    if(!$menu_exists) {
			        $menu_id = wp_create_nav_menu($menu_name);
			        if($menu_name == 'navbar-top') {
			        	wp_update_nav_menu_item($menu_id, 0, array(
				          'menu-item-title'   =>  __('Home', 'my-theme'),
				          'menu-item-classes' => 'home',
				          'menu-item-url'     => home_url( '/' ), 
				          'menu-item-status'  => 'publish'
				        ));
			        }
			    }
		    }
		}
	}
	add_action('after_setup_theme', 'theme_setup');