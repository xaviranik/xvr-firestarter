<?php 

namespace XVR\Firestarter\Base;

use \XVR\Firestarter\Base\Base_Controller;

/**
 * Class Enqueue
 * @package XVR\Firestarter\Base
 */
class Enqueue extends Base_Controller {
    /**
     * Registers
     */
    public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

    /**
     * Enqueues scripts
     */
    function enqueue() {
		wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/main.css' );
		wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/main.js' );
	}
}