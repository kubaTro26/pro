<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// class already exists abort abort!
if ( class_exists( 'NF_PDF_Integration' ) ) {
	return;
}

/*
 * Ninja Forms - PDF Integration
 *
 * Make sure that PDF Form Submissions works great with other plugins.
 *
 * @author Patrick Rauland
 * @since 1.3.3
 */

class NF_PDF_Integration {

	/**
	 * Construct
	 *
	 * @since 1.3.3
	 *
	 * @param string $file
	 */
	public function __construct( $file ) {
		add_filter( 'ninja_forms_pdf_pre_user_value', array( $this, 'file_uploads' ), 10 );
	}

	/**
	 * Init the extension settings
	 *
	 * @since  1.3.3
	 * @return string
	 */
	public function file_uploads( $field_value ) {

		// check to make sure it's an array. File upload values are always arrays
		if ( is_array( $field_value ) ) {

			$new_values = array();

			$values = array_values( $field_value );

			foreach ( $values as $value ) {

				// check to make sure the file_url key exists
				if ( is_array( $value ) && array_key_exists( 'file_url', $value ) && $value['file_url'] ) {

					// set the value of the field in the pdf equal to the file url.
					$new_values[] = esc_url( $value['file_url'] );

				}
			}

			if ( count( $new_values ) > 0 ) {
				// implode new values into $field_value
				$field_value = implode( ', ', $new_values );
			}

		}

		return $field_value;
	}

}
