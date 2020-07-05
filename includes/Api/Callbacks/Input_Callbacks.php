<?php


namespace XVR\Firestarter\Api\Callbacks;

use XVR\Firestarter\Base\Base_Controller;

/**
 * Input Callbacks class
 */
class Input_Callbacks extends Base_Controller {

	/**
	 * Checkbox sanitize
	 *
	 * @param $input
	 * @return array
	 */
	public function checkbox_sanitize( $input ) {
		$output = [];

		foreach ( $this->managers as $key => $manager) {
			$output[ $key ] = isset( $input[ $key ] );
		}

		error_log(print_r($output, true));

		return $output;
	}

	/**
	 * Checkbox Field Input
	 *
	 * @param array $args
	 * @return void
	 */
	public function checkbox_field( $args ) {
		$name = $args['label_for'];
		$classes = isset( $args['class'] ) ? $args['class'] : 'checkbox';
		$option_name = $args['option_name'];
		$checkbox = get_option( $option_name );

		$is_checked = ( isset( $checkbox[ $name ] ) ? ( $checkbox[ $name ] ? true : false ) : false );

		echo '<input '. ( $is_checked ? 'checked' : '' ) .' type="checkbox" name="' . $option_name . '[' . $name . ']' . '" value="1" class="' . $classes . '">';
	}

}