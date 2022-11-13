<?php
/**
 * Plugin Name: Ninja Forms - PDF Form Submissions
 * Plugin URI: https://ninjaforms.com/extensions/pdf-form-submissions/
 * Description: Automatically convert form submissions into PDFs. View PDFs in backend or attach to form email.
 * Version: 3.0.5
 * Author: Ninja Forms
 * Author URI: http://ninjaforms.com
 * License: GPLv2
 */

/*
	Copyright 2015 Ninja Forms

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if( version_compare( get_option( 'ninja_forms_version', '0.0.0' ), '3', '<' ) || get_option( 'ninja_forms_load_deprecated', FALSE ) ) {

    // set up a few constants we'll need for the extension & the updater
    define( 'NF_PDFSUBMISSION_PRODUCT_NAME', 'PDF Form Submission' );
    define( 'NF_PDFSUBMISSION_VERSION', '3.0.5' );
    define( 'NF_PDFSUBMISSION_AUTHOR', 'Patrick Rauland' );
    define( 'NF_PDFSUBMISSION_PLUGIN_FILE', __FILE__ );

    include plugin_dir_path( __FILE__ ) . 'deprecated/nf-pdf-submissions.php';

} else {

    if( ! function_exists( 'NF_PDF_Submission' ) ) {
        function NF_PDF()
        {
            static $instance;
            if( ! isset( $instance ) ) {
                require_once plugin_dir_path(__FILE__) . 'src/plugin.php';
                $instance = new NF_PDF_Plugin('3.0.5', __FILE__);
            }
            return $instance;
        }
    }
    NF_PDF();
}

/*
|--------------------------------------------------------------------------
| Filter Flags [TESTING]
|--------------------------------------------------------------------------
*/
//add_filter( 'ninja_forms_submission_pdf_fetch_date', '__return_true' );
//add_filter( 'ninja_forms_submission_pdf_fetch_sequential_number', '__return_true' );
//add_filter( 'ninja_forms_pdf_field_value_wpautop', '__return_false' );
//function custom_pdf_name( $name, $sub_id ) {
//    return 'my-awesome-contact-form-' . $sub_id;
//}
//add_filter( 'ninja_forms_submission_pdf_name', 'custom_pdf_name', 20, 2 );
