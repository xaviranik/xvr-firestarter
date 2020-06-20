<?php 

namespace XVR\Firestarter\Pages;

use XVR\Firestarter\Api\Settings_Api;
use \XVR\Firestarter\Base\Base_Controller;

/**
* Admin Page handler class
*/
class Admin extends Base_Controller {

    /**
     * @var Settings_Api
     */
    public $settings;
    /**
     * @var array[]
     */
    private $pages = [];
    /**
     * @var array[]
     */
    private $sub_pages = [];

    /**
     * Admin constructor.
     */
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

        $this->sub_pages = array(
            [
                'parent_slug' => 'firestarter_plugin',
                'title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'firestarter_cpt',
                'callback' => function() { echo '<h1>CPT Manager</h1>'; }
            ],
            [
                'parent_slug' => 'firestarter_plugin',
                'title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'firestarter_taxonomies',
                'callback' => function() { echo '<h1>Taxonomies Manager</h1>'; }
            ],
            [
                'parent_slug' => 'firestarter_plugin',
                'title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'firestarter_widgets',
                'callback' => function() { echo '<h1>Widgets Manager</h1>'; }
            ],
        );
    }

    /**
     * Registers
     */
    public function register() {
		$this->settings->add_pages( $this->pages )->with_sub_page( 'Dashboard' )->add_sub_pages( $this->sub_pages )->register();
	}
}