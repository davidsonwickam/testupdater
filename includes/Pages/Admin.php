<?php 

/**
* Trigger this file on Plugin uninstall
*
* @package 
*/

namespace Includes\Pages;

use \Includes\Base\BaseController;

class Admin extends BaseController {

	public function register() {
		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
		// add_action( 'init', array( $this, 'mt_settings_page' ) );


		add_action('admin_init', array($this, 'register_global_settings'));
        // add_action('woafx_options_page_content', array($this, 'add_global_options_section'));
        add_action('admin_footer', array($this, 'add_global_apply_button'));
        add_action('wp_ajax_woafx_apply_global_options', array($this, 'apply_global_options'));

	}

	public function add_admin_pages() {
		
		add_submenu_page(
			'edit.php?post_type=job',
			__( 'Global Option', 'menu-test' ),
			__( 'Global Option', 'menu-test' ),
			'manage_options',
			'globaloption',
			array( $this,'add_global_options_section')
		);
	
	}


	
	public function register_global_settings() {
        register_setting('woafx_options_group', 'woafx_global_option_1');
        register_setting('woafx_options_group', 'woafx_global_option_2');
        // Add more global options as needed
    }

    public function add_global_options_section() {
		
        ?>
        <h2><?php _e('Global Options', 'woafx-global-options'); ?></h2>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php _e('Global Option 1', 'woafx-global-options'); ?></th>
                <td>
                    <input type="text" name="woafx_global_option_1" value="<?php echo esc_attr(get_option('woafx_global_option_1')); ?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e('Global Option 2', 'woafx-global-options'); ?></th>
                <td>
                    <input type="text" name="woafx_global_option_2" value="<?php echo esc_attr(get_option('woafx_global_option_2')); ?>" />
                </td>
            </tr>
            <!-- Add more global options as needed -->
        </table>
        <?php
    }

    public function add_global_apply_button() {
        $screen = get_current_screen();
        if ($screen->id !== 'toplevel_page_woafx-options') {
            return;
        }
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.wrap h1').after('<button id="woafx-global-apply" class="button button-primary"><?php _e('Apply Global Options', 'woafx-global-options'); ?></button>');
                
                $('#woafx-global-apply').on('click', function(e) {
                    e.preventDefault();
                    var data = {
                        'action': 'woafx_apply_global_options',
                        'nonce': '<?php echo wp_create_nonce('woafx_global_options_nonce'); ?>'
                    };
                    $.post(ajaxurl, data, function(response) {
                        alert(response.data);
                    });
                });
            });
        </script>
        <?php
    }

    public function apply_global_options() {
        check_ajax_referer('woafx_global_options_nonce', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error('You do not have permission to perform this action.');
        }

        // Apply global options logic here
        $global_option_1 = get_option('woafx_global_option_1');
        $global_option_2 = get_option('woafx_global_option_2');

        // Example: Apply global options to all posts
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );
        $posts = get_posts($args);

        foreach ($posts as $post) {
            update_post_meta($post->ID, 'woafx_global_option_1', $global_option_1);
            update_post_meta($post->ID, 'woafx_global_option_2', $global_option_2);
        }

        wp_send_json_success('Global options applied successfully.');
    }
}