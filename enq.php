<?php
    /* REGISTER THE SCRIPTS */
//register the libraries
	function reg_scripts()
	{
		wp_register_script('bgt_pop_bgt_pop_editscript', plugins_url('js/edit.js', __FILE__));
		wp_register_script('bgt_pop_pickerscript', plugins_url('js/colorpicker.js', __FILE__));
		wp_register_script('bgt_pop_popupscript', plugins_url('js/popup.js', __FILE__));
		wp_register_script('bgt_pop_sqcommon', plugins_url('js/common.js', __FILE__));
		wp_register_script('bgt_pop_lightcase', plugins_url('js/lc/lc.js', __FILE__));
		wp_register_script('bgt_pop_base64code', plugins_url('js/base64.js', __FILE__));
	}
	
	add_action('admin_init', 'reg_scripts');
	
	
	//wp_register_script('flash_player', plugins_url('js/flp.js', __FILE__));

//load scripts for default page, create and edit and others	
	function bgt_pop_load_scripts_default()
	{
		if (is_admin())
		{
			wp_enqueue_script('jquery');
			wp_enqueue_script('tiny_mce');
			wp_enqueue_script('bgt_pop_sqcommon');
			wp_enqueue_script('bgt_pop_editscript');//jquery-ui-core
			wp_enqueue_script('jquery-ui-resizable');
			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('bgt_pop_lightcase');
			wp_enqueue_script('bgt_pop_base64code');
			wp_enqueue_script('thickbox');
			//wp_enqueue_script('flash_player');

		}
	}

//load script for widget page	
	function bgt_pop_load_scripts_widget()
	{
		if (is_admin())
		{
			wp_enqueue_script('jquery');
			wp_enqueue_script('tiny_mce');
			wp_enqueue_script('bgt_pop_sqcommon');
			wp_enqueue_script('widgetscript');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-resizable');
			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script('bgt_pop_lightcase');
			wp_enqueue_script('bgt_pop_pickerscript');
			wp_enqueue_script('bgt_pop_base64code');
			wp_enqueue_script('thickbox');
	
		}
	}	
	
//load script for popup page	
	function bgt_pop_load_scripts_popup()
	{
		if (is_admin())
		{
			wp_enqueue_script('jquery');
			wp_enqueue_script('tiny_mce');
			wp_enqueue_script('bgt_pop_sqcommon');
			wp_enqueue_script('bgt_pop_popupscript');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-resizable');
			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script('bgt_pop_lightcase');
			wp_enqueue_script('bgt_pop_pickerscript');
			wp_enqueue_script('bgt_pop_base64code');
			wp_enqueue_script('thickbox');
	
		}
	}	


	//including the custom stylesheet
	add_action('admin_init', 'bgt_pop_add_style_sheet');

	
	function bgt_pop_add_style_sheet()
	{
		wp_register_style('editstyle', plugins_url('css/style.css', __FILE__));
		
		
		wp_register_style('popupstyle', plugins_url('css/popup.css', __FILE__));
		
		wp_register_style('pickerstyle', plugins_url('css/colorpicker.css', __FILE__));
		
		wp_register_style('commonstyle', plugins_url('css/common.css', __FILE__));
		
		wp_register_style('lcstyle', plugins_url('js/lc/css/lc.css', __FILE__));//light case        

	}
    
    
    
    	//load stylesheet for default page (within the plugin)
	function bgt_pop_enqueue_custom_styles()
	{
		wp_enqueue_style('editstyle');
		wp_enqueue_style('lcstyle');
		wp_enqueue_style('commonstyle');

	}
	
	//load stylesheet for popup page
	function bgt_pop_enqueue_popup_styles()
	{
		wp_enqueue_style('popupstyle');
		wp_enqueue_style('lcstyle');
		wp_enqueue_style('pickerstyle');
		wp_enqueue_style('commonstyle');
	
	}   
