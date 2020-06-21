<?php


namespace XVR\Firestarter\Api\Callbacks;


use XVR\Firestarter\Base\Base_Controller;

class Admin_Callbacks extends Base_Controller {

    /**
     * @return template
     */
    public function admin_dashboard() {
        return require_once( "$this->plugin_path/templates/dashboard.php");
    }

    /**
     * @return template
     */
    public function admin_cpt_manager() {
        return require_once( "$this->plugin_path/templates/cpt_manager.php");
    }

    /**
     * @return template
     */
    public function admin_taxonomy_manager() {
        return require_once( "$this->plugin_path/templates/taxonomy_manager.php");
    }

    /**
     * @return template
     */
    public function admin_widget_manager() {
        return require_once( "$this->plugin_path/templates/widget_manager.php");
    }

    public function xvr_firestarter_option_group( $input ) {
        return $input;
    }

    public function xvr_firestarter_admin_section() {
        echo 'Check this section';
    }

    public function xvr_firestarter_text_example() {
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write something...">';
    }

}