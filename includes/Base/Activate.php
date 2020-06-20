<?php

namespace XVR\Firestarter\Base;

/**
 * Class Activate
 * @package XVR\Firestarter\Base
 */
class Activate {
    /**
     * Activates the plugin
     */
    public static function activate() {
		flush_rewrite_rules();
	}
}