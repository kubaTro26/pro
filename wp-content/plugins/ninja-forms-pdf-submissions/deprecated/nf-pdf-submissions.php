<?php

if ( class_exists( 'NF_PDF_Submission' ) ) return;

require plugin_dir_path( __FILE__  ) . 'classes/class-nf-pdf-submission.php';
require plugin_dir_path( __FILE__  ) . 'classes/class-nf-pdf-activation.php';
require plugin_dir_path( __FILE__  ) . 'classes/class-nf-pdf-integration.php';

// load templating functions
include plugin_dir_path( __FILE__  ) . 'include/pdf-templating.php';

global $NF_PDF_Submission, $NF_PDF_Integration;
$NF_PDF_Submission  = new NF_PDF_Submission( __FILE__ );
$NF_PDF_Integration = new NF_PDF_Integration( __FILE__ );

load_plugin_textdomain( 'nf-pdf', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

// setup any activation functions
$NF_PDF_Activation = new NF_PDF_Activation( __FILE__ );
register_activation_hook( __FILE__, 'ninja_forms_activation' );

/**
 *    Setup the plugin database upgrader
 */
function ninja_forms_pdf_updater() {
    require 'classes/class-nf-pdf-upgrade-manager.php';
    require 'classes/class-nf-pdf-upgrade-notifications.php';
}

add_action( 'admin_init', 'ninja_forms_pdf_updater' );

/**
 *    Setup the updater & license page
 */
function ninja_forms_pdf_submission_setup_license() {
    if ( class_exists( 'NF_Extension_Updater' ) ) {
        $NF_Extension_Updater = new NF_Extension_Updater( NF_PDFSUBMISSION_PRODUCT_NAME, NF_PDFSUBMISSION_VERSION, NF_PDFSUBMISSION_AUTHOR, __FILE__, 'pdf_submission' );
    }
}

add_action( 'admin_init', 'ninja_forms_pdf_submission_setup_license' );
