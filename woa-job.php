<?php 
/**
* @package Custom Post Type Plugin
*/
/*
Plugin Name: WOA - Build Jobs Custom Post Type Plugin
Plugin URI: https://example.com
Description: WOA - Build Jobs Custom Post Type Plugin
Version: 0.0.16
Author: 
License: GPL2
Author URI : https://example.com
*/


define( 'WOA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WOA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
    echo
        require 'vendor/yahnis-elsts/plugin-update-checker/plugin-update-checker.php';

        $myUpdateChecker = PucFactory::buildUpdateChecker(
            'https://github.com/yourusername/your-plugin-repo/',
            __FILE__,
            'github-updater-plugin'
        );

        $myUpdateChecker->setBranch('main');

        $myUpdateChecker->setAuthentication('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');

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ){
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

Includes\Base\Activate::activate();
function activate_woa_jobplugin(){
	Includes\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_woa_jobplugin' );

// Initialize Deactivation, The code that runs during plugin deactivation
function deactivate_woa_jobplugin(){
	Includes\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_woa_jobplugin' );

// Include the Init folder, Initialize all the core classes of the plugin
if ( class_exists( 'Includes\\Init' ) ) {
	global $getThisTemplates;
	
	Includes\Init::load_template();
	Includes\Init::register_services();
}


	
		
