<?php
        include_once 'popup.php';
		include_once 'enq.php';
		include_once 'mainui.php';
        include_once 'code/common.php';
	//add background and buttons to db


	//add jquery
	add_action('init', 'bgt_pop_widget_init_sidebar');
	function bgt_pop_widget_init_sidebar() {
		if (!is_admin()) {
			wp_enqueue_script('jquery');
		}
	}	
		
/**************************************FIX KITCHEN SINK PROBLEM OF THE EDITOR****************************************************/        
	function bgt_pop_unhide_kitchensink( $args )
	{
		$args['wordpress_adv_hidden'] = false;
		return $args;
	}
	
	add_filter( 'tiny_mce_before_init', 'bgt_pop_unhide_kitchensink' );
	
/**************************************END FIX KITCHEN SINK PROBLEM OF THE EDITOR****************************************************/                

	//add the menu to dashboard
	add_action('admin_menu', 'bgt_pop_register_pro_squeezers');
	function bgt_pop_register_pro_squeezers()
	{
		$main_page = add_menu_page('Bueno Gato Popup', 'Bueno Gato Popup', 'manage_options', 'bgt_pop_pro_sqz_set', 'bgt_pop_main_squeezers_cb', plugins_url("themes/common/gato.png", __FILE__));

		
		$popup_create = add_submenu_page('bgt_pop_pro_sqz_set', 'Create Popup', 'Create Popup', 'manage_options', 'bgt_pop_sub_squeezers_popup_create', 'bgt_pop_sub_squeezers_popup_create_cb');

		$popup_manage = add_submenu_page('bgt_pop_pro_sqz_set', 'Manage Popup', 'Manage Popup', 'manage_options', 'bgt_pop_sub_squeezers_popup_manage', 'bgt_pop_sub_squeezers_popup_manage_cb');
		
		$settings_page = add_submenu_page('bgt_pop_pro_sqz_set', 'Settings', 'Settings', 'manage_options', 'bgt_pop_sub_squeezers_set', 'bgt_pop_sub_squeezers_settings_cb');
		
		
		add_action( 'admin_print_styles-' . $main_page, 'bgt_pop_enqueue_custom_styles' );
		add_action( 'admin_print_styles-' . $settings_page, 'bgt_pop_enqueue_custom_styles' );
		
		add_action( 'admin_print_styles-' . $popup_create, 'bgt_pop_enqueue_popup_styles' );
		add_action( 'admin_print_styles-' . $popup_manage, 'bgt_pop_enqueue_popup_styles' );
		
		add_action( 'admin_print_styles-' . $main_page, 'bgt_pop_load_scripts_default' );
		add_action( 'admin_print_styles-' . $settings_page, 'bgt_pop_load_scripts_default' );
		
		add_action( 'admin_print_styles-' . $popup_create, 'bgt_pop_load_scripts_popup' );
		add_action( 'admin_print_styles-' . $popup_manage, 'bgt_pop_load_scripts_popup' );	
	}