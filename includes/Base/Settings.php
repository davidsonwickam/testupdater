<?php 

/**
* Trigger this file on Plugin uninstall
*
* @package 
*/

namespace Includes\Base;

use \Includes\Base\BaseController;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class Settings extends BaseController {

	public function register(){
		
		// add_filter('single_template', array($this, 'load_custom_post_type_template'));
		add_filter( 'template_include', array($this, 'load_custom_post_type_template'));
			
		

	}

	public function load_custom_post_type_template($template) {

		global $getThisTemplates;

		echo get_post_type( get_the_ID() ) ;
		if (get_post_type( get_the_ID() === "job"))
		{
			// echo  get_post_meta(get_the_ID(),  'location' , true );
		
			ob_start();
			
			include($getThisTemplates['single-custom-item.template']);
			// include($getThisTemplates['pagination/pagination.template']);
			
			$output = ob_get_clean();
			echo $output;
			return;
		}

		return $template;
     /*    global $post;
		global $getThisTemplates;
		// print_r(WOA_PLUGIN_PATH);
		// exit;
        if ($post->post_type == 'job') {
            $single_template = WOA_PLUGIN_PATH . '/templates/single-custom-item.template.php';
			// echo "fasdfasd";
        }

        return $single_template; */
    }
}