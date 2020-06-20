<?php

namespace XVR\Firestarter\Base;

/**
 * Class Deactivate
 * @package XVR\Firestarter\Base
 */
class Deactivate {
    /**
     * Deactivates the plugin
     */
    public static function deactivate() {
		flush_rewrite_rules();
	}
}