<?php 

	//if uninstall not called from WordPress exit
	if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
		exit ();
	//drop the background and buttons tables
	global $wpdb;
	
	$buttons = $wpdb->get_blog_prefix().'bgt_pop_cta_buttons';

	
	//dropping the tables
	$wpdb->query("DROP TABLE IF EXISTS $buttons");
	delete_option( base64_decode('c3FfYWN0aXZhdGlvbl9zdGF0dXM=') );	
