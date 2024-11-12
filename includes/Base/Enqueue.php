<?php 

/**
* Trigger this file on Plugin uninstall
*
* 
*/

namespace Includes\Base;

use \Includes\Base\BaseController;

class Enqueue extends BaseController{

	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueAdmin'));
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueuePage'));
		add_action( 'wp_head', array($this, 'wpHead'));	
	}

	public function enqueueAdmin(){
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle-admin', $this->plugin_url . '/assets/css/pluginStyleAdmin.css', 99);
		
	}

	public function enqueuePage(){
		// http://wordpress.test/wp-content/uploads/guesty-data/guesty-listing
	   
	   
		
	//    wp_enqueue_script( 'react-script', $this->plugin_url . 'build/index.js', array( 'wp-element' ), '1.0.0', true );


		// wp_enqueue_style( 'react-css', $this->plugin_url . '/build/index.css', 99 );

	}

	public function wpHead(){
		
		
	}

}