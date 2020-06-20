<?php 

namespace XVR\Firestarter\Pages;

use XVR\Firestarter\Api\Settings_Api;
use \XVR\Firestarter\Base\Base_Controller;

/**
* Admin Page handler class
*/
class Admin extends Base_Controller {

    public $settings;
    private $pages = [];

    public function __construct() {
        $this->settings = new Settings_Api();

        $this->pages = [
            [
                'title' => 'Firestarter Plugin',
                'menu_title' => 'Firestarter',
                'capability' => 'manage_options',
                'menu_slug' => 'firestarter_plugin',
                'callback' => function () { echo '<h1>Hello World</h1>'; },
                'icon_url' => 'dashicons-store',
                'position' => 110,
            ]
        ];
    }

    /**
     * Registers
     */
    public function register() {
		$this->settings->add_pages( $this->pages )->register();
	}
}