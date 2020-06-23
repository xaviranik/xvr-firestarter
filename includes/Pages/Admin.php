<?php 

namespace XVR\Firestarter\Pages;

use XVR\Firestarter\Api\Callbacks\Admin_Callbacks;
use XVR\Firestarter\Api\Callbacks\Input_Callbacks;
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
     * @var Admin_Callbacks
     */
    private $callbacks;
	/**
	 * @var Input_Callbacks
	 */
	private $input_callbacks;

	/**
     * Registers
     */
    public function register() {
        $this->settings = new Settings_Api();

        $this->callbacks = new Admin_Callbacks();
        $this->input_callbacks = new Input_Callbacks();

        $this->set_pages();
        $this->set_sub_pages();

        $this->set_settings();
        $this->set_sections();
        $this->set_fields();

        $this->settings->add_pages( $this->pages )->with_sub_page( 'Dashboard' )->add_sub_pages( $this->sub_pages )->register();
	}

    /**
     * Sets pages
     */
	public function set_pages() {
        $this->pages = [
            [
                'title' => 'Firestarter Plugin',
                'menu_title' => 'Firestarter',
                'capability' => 'manage_options',
                'menu_slug' => 'firestarter_plugin',
                'callback' => [ $this->callbacks, 'admin_dashboard' ],
                'icon_url' => 'dashicons-store',
                'position' => 110,
            ]
        ];
    }

    /**
     * Sets sub pages
     */
    public function set_sub_pages() {
        $this->sub_pages = array(
            [
                'parent_slug' => 'firestarter_plugin',
                'title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'firestarter_cpt',
                'callback' => [ $this->callbacks, 'admin_cpt_manager' ]
            ],
            [
                'parent_slug' => 'firestarter_plugin',
                'title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'firestarter_taxonomies',
                'callback' => [ $this->callbacks, 'admin_taxonomy_manager' ]
            ],
            [
                'parent_slug' => 'firestarter_plugin',
                'title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'firestarter_widgets',
                'callback' => [ $this->callbacks, 'admin_widget_manager' ]
            ],
        );
    }

    public function set_settings() {

    	$args = [];

    	foreach ( $this->managers as $manager => $title ) {
    		$args[] = [
                'option_group' => 'xvr_firestarter_settings_group',
                'option_name' => $manager,
                'callback' => [ $this->input_callbacks,  'checkbox_sanitize'],
           ];
	    }

        $this->settings->set_settings( $args );
    }

    public function set_sections() {
        $args = [
            [
                'id' => 'xvr_firestarter_admin_index',
                'title' => 'Settings Manager',
                'callback' => [ $this->callbacks,  'xvr_firestarter_admin_section'],
                'page' => 'firestarter_plugin',
            ]
        ];

        $this->settings->set_sections( $args );
    }

    public function set_fields() {
    	$args = [];

    	foreach ( $this->managers as $manager => $title ) {
    		$args[] = [
                'id' => $manager,
                'title' => $title,
                'callback' => [ $this->input_callbacks,  'checkbox_field'],
                'page' => 'firestarter_plugin',
                'section' => 'xvr_firestarter_admin_index',
                'args' => [
                    'label_for' => $manager,
                ],
            ];
	    }

        $this->settings->set_fields( $args );
    }
}