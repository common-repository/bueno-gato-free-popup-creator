<?php							 
	function bgt_pop_sq_bgt_on_act(){
		bgt_pop_add_buttons_to_db();
		bgt_pop_add_sq_widget_popup_table();
	};


/**********************************DB FUNCTIONS*****************************************/

	
	//INSERTING BUTTONS TO DB**************************************
	function bgt_pop_add_buttons_to_db()
	{
		global $wpdb;		
		try 
		{
			bgt_pop_create_button_table($wpdb->prefix);
			bgt_pop_insert_button_to_table($wpdb->prefix.'bgt_pop_cta_buttons');
		} catch (Exception $e)
		{
			var_dump($e);
		}
	}
	
	//create a table to store the buttons
	function bgt_pop_create_button_table($prefix)
	{
		$myquery = 'CREATE TABLE IF NOT EXISTS '.$prefix.'bgt_pop_cta_buttons(
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(50),
		`height` int(11),
		`width` int(11),
		PRIMARY KEY(`id`),
		UNIQUE (`name`)
		);';
	
		global $wpdb;
		$wpdb->query($myquery); 
	}
	
	//get the buttons and insert to the db
	function bgt_pop_insert_button_to_table($table)
	{
		$buttons_folder = plugin_dir_path(__FILE__).'themes/buttons';
		$buttons = scandir($buttons_folder);
		global $wpdb;
	
		for ($i=0; $i<count($buttons); $i++)
		{
		if (stripos($buttons[$i], ".png") !== false)
		{
		//get the info of the image
			$image_info = getimagesize($buttons_folder.'/'.$buttons[$i]);
			//insert the button info into db
		$myquery = 'INSERT IGNORE INTO '.$table."(name, width, height) VALUES ('$buttons[$i]', '$image_info[0]', '$image_info[1]')";
		$wpdb->query($myquery);
		}
		}
	
	}
	//END INSERTING BUTTONS TO DB**************************************	
	function bgt_pop_wp_editor_fontsize_filter( $options ) {
		array_shift( $options );
		array_unshift( $options, 'fontsizeselect');
		array_unshift( $options, 'formatselect');
		return $options;
	}
	add_filter('mce_buttons_2', 'bgt_pop_wp_editor_fontsize_filter');
	
	
	

	//CREATE A TABLE FOR STORING POPUP
	function bgt_pop_create_sq_popup_table($prefix)
	{
		$myquery = 'CREATE TABLE IF NOT EXISTS '.$prefix.'bgt_pop_sq_popup_code(
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`popup_id` VARCHAR(50),		
		`name` VARCHAR(255),
		`code` text,
		`css_url` text,
		PRIMARY KEY(`id`),
		UNIQUE (`popup_id`)		
		);';	
		global $wpdb;
		$wpdb->query($myquery);
	}
	
	
	//CREATE A TABLE FOR STORING POPUP OPTIONS
	function bgt_pop_create_sq_popup_option_table($prefix)
	{
		//display_area (on total site or on specific post/category)
		$myquery = 'CREATE TABLE IF NOT EXISTS '.$prefix.'bgt_pop_sq_popup_option(
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`popup_id` VARCHAR(50),
		`appear_position` VARCHAR(255),
		`appear_behavior` VARCHAR(255),
		`background_color` VARCHAR(255),
		`display_area` VARCHAR(255), 
		`background_cover` VARCHAR(255),
		`delay` int(11),
		`status` VARCHAR(255),
		`frequency` VARCHAR(255),
		PRIMARY KEY(`id`)
		);';	
		global $wpdb;
		$wpdb->query($myquery);
	}	
	//ACTUALLY CREATE THE TABLE OF WIDGET AND POPUP
	function bgt_pop_add_sq_widget_popup_table()
	{
		global $wpdb;
	
		try
		{
			bgt_pop_create_sq_popup_table($wpdb->prefix);
			bgt_pop_create_sq_popup_option_table($wpdb->prefix);			
		} catch (Exception $e)
		{
			var_dump($e);
		}
	}
