<?php

namespace XVR\Firestarter\Base;

use \XVR\Firestarter\Base\Base_Controller;

/**
 * Class Settings_Links
 * @package XVR\Firestarter\Base
 */
class Settings_Links extends Base_Controller {
    /**
     * Registers
     */
    public function register() {
		add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
	}

    /**
     * @param $links
     * @return mixed
     */
    public function settings_link($links ) {
		$settings_link = '<a href="settings.php?page=firestarter_plugin">Settings</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}