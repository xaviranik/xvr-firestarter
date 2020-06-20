<?php 

namespace XVR\Firestarter\Pages;

use \XVR\Firestarter\Base\BaseController;

/**
* Admin Page handler class
*/
class Admin extends BaseController
{
	public function register() {
		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
	}

	public function add_admin_pages() {
		add_menu_page( 'Firestarter Plugin', 'Firestarter', 'manage_options', 'firestarter_plugin', array( $this, 'admin_index' ), 'dashicons-store', 110 );
	}

	public function admin_index() {
		require_once $this->plugin_path . 'templates/admin.php';
	}
}