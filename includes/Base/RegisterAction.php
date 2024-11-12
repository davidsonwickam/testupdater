<?php 

/**
* Trigger this file on Plugin uninstall
*
*
*/

namespace Includes\Base;

use \Includes\Base\BaseController;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class RegisterAction extends BaseController{

	function register() {
		
		// A SAMPLE FILTER
	
		
		add_action('init', [$this , 'jpt_register_jobs_post_type']);
		add_action('init',[$this , 'jpt_register_job_category_taxonomy']);
		
	}
	

    
/**
	 * Register the "Jobs" custom post type.
	 */
	function jpt_register_jobs_post_type() {
		$labels = array(
			'name'                  => _x('Jobs', 'Post type general name', 'jobs-post-type'),
			'singular_name'         => _x('Job', 'Post type singular name', 'jobs-post-type'),
			'menu_name'             => _x('Jobs', 'Admin Menu text', 'jobs-post-type'),
			'name_admin_bar'        => _x('Job', 'Add New on Toolbar', 'jobs-post-type'),
			'add_new'               => __('Add New', 'jobs-post-type'),
			'add_new_item'          => __('Add New Job', 'jobs-post-type'),
			'new_item'              => __('New Job', 'jobs-post-type'),
			'edit_item'             => __('Edit Job', 'jobs-post-type'),
			'view_item'             => __('View Job', 'jobs-post-type'),
			'all_items'             => __('All Jobs', 'jobs-post-type'),
			'search_items'          => __('Search Jobs', 'jobs-post-type'),
			'parent_item_colon'     => __('Parent Jobs:', 'jobs-post-type'),
			'not_found'             => __('No jobs found.', 'jobs-post-type'),
			'not_found_in_trash'    => __('No jobs found in Trash.', 'jobs-post-type'),
			'featured_image'        => _x('Job Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'jobs-post-type'),
			'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'jobs-post-type'),
			'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'jobs-post-type'),
			'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'jobs-post-type'),
			'archives'              => _x('Job archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'jobs-post-type'),
			'insert_into_item'      => _x('Insert into job', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'jobs-post-type'),
			'uploaded_to_this_item' => _x('Uploaded to this job', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'jobs-post-type'),
			'filter_items_list'     => _x('Filter jobs list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'jobs-post-type'),
			'items_list_navigation' => _x('Jobs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'jobs-post-type'),
			'items_list'            => _x('Jobs list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'jobs-post-type'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'jobs'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'author', 'thumbnail', 'excerpt', 'comments'),
			'show_in_rest'       => true,
		);

        
		register_post_type('job', $args);
	}
	
    
        
    /**
     * Register the "Job Category" taxonomy.
     */
    function jpt_register_job_category_taxonomy() {
        $labels = array(
            'name'                       => _x('Job Categories', 'taxonomy general name', 'jobs-post-type'),
            'singular_name'              => _x('Job Category', 'taxonomy singular name', 'jobs-post-type'),
            'search_items'               => __('Search Job Categories', 'jobs-post-type'),
            'popular_items'              => __('Popular Job Categories', 'jobs-post-type'),
            'all_items'                  => __('All Job Categories', 'jobs-post-type'),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __('Edit Job Category', 'jobs-post-type'),
            'update_item'                => __('Update Job Category', 'jobs-post-type'),
            'add_new_item'               => __('Add New Job Category', 'jobs-post-type'),
            'new_item_name'              => __('New Job Category Name', 'jobs-post-type'),
            'separate_items_with_commas' => __('Separate job categories with commas', 'jobs-post-type'),
            'add_or_remove_items'        => __('Add or remove job categories', 'jobs-post-type'),
            'choose_from_most_used'      => __('Choose from the most used job categories', 'jobs-post-type'),
            'not_found'                  => __('No job categories found.', 'jobs-post-type'),
            'menu_name'                  => __('Job Categories', 'jobs-post-type'),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array('slug' => 'job-category'),
            'show_in_rest'          => true,
        );

        register_taxonomy('job_category', 'job', $args);
    }

	
}
