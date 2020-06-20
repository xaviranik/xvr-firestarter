<?php 

namespace XVR\Firestarter\Pages;

use \XVR\Firestarter\Base\Base_Controller;

/**
* Admin Page handler class
*/
class Admin extends Base_Controller {
    /**
     * Registers
     */
    public function register() {
		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
	}

    /**
     * Adds admin page
     */
    public function add_admin_pages() {
		add_menu_page( 'Firestarter Plugin', 'Firestarter', 'manage_options', 'firestarter_plugin', array( $this, 'admin_index' ), 'dashicons-store', 110 );
	}

    /**
     * Admin page template
     */
    public function admin_index() {
		require_once $this->plugin_path . 'templates/settings.php';
	}
}