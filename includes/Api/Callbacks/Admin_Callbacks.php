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

}