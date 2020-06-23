<?php


namespace XVR\Firestarter\Api\Callbacks;


class Input_Callbacks {

	public function checkbox_sanitize( $input ) {
		return isset( $input );
	}

	public function checkbox_field( $args ) {
		$name = $args['label_for'];
		$classes = isset( $args['class'] ) ? $args['class'] : '';
		$is_checked = get_option( $name );

		echo '<input '. ( $is_checked ? 'checked' : '' ) .' type="checkbox" name="' . $name . '" value="1" class="' . $classes . '">';
	}

}