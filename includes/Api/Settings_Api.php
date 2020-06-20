<?php


namespace XVR\Firestarter\Api;


/**
 * Class Settings_Api
 * @package XVR\Firestarter\Api
 */
class Settings_Api {

    /**
     * @var array
     */
    public $admin_pages = [];

    /**
     *  Registers
     */
    public function register() {
        if ( ! empty( $this->admin_pages ) ) {
            add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
        }
    }

    /**
     * @param array $pages
     * @return $this
     */
    public function add_pages(array $pages ) {
        $this->admin_pages = $pages;
        return $this;
    }

    /**
     * Adds all admin pages
     */
    public function add_admin_menu() {
        foreach ( $this->admin_pages as $page ) {
            add_menu_page( $page['title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
        }
    }
}