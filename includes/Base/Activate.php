<?php

namespace XVR\Firestarter\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}