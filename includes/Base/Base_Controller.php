<?php 

namespace XVR\Firestarter\Base;

/**
 * Class Base_Controller
 * @package XVR\Firestarter\Base
 */
class Base_Controller {
    /**
     * @var string
     */
    public $plugin_path;

    /**
     * @var string
     */
    public $plugin_url;

    /**
     * @var string
     */
    public $plugin;

    /**
     * Base_Controller constructor.
     */
    public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/xvr-firestarter.php';
	}
}