<?php 

/**
* Trigger this file on Plugin uninstall
*
* 
*/

namespace Includes\Base;

class Activate {

	public static function activate(){
		
		
		// self::create_plugin_database_table();

		

		flush_rewrite_rules();

	}

	

	function create_plugin_database_table()
	{
		
			
			/* 
			require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
			dbDelta($sql); */
		
	}

}