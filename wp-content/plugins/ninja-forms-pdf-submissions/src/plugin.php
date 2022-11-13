<?php

require_once plugin_dir_path( __FILE__ ) . 'document.php';

require_once plugin_dir_path( __FILE__ ) . 'admin/attachment.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/submission.php';

require_once plugin_dir_path( __FILE__ ) . 'adapters/fields.php';
require_once plugin_dir_path( __FILE__ ) . 'adapters/submission.php';

require_once plugin_dir_path( __FILE__ ) . 'integrations/file-uploads.php';
require_once plugin_dir_path( __FILE__ ) . 'integrations/table-editor.php';

final class NF_PDF_Plugin
{
    private $version;
    private $url;
    private $dir;
    private $updater;
    private $integrations = array();

    public function __construct( $version, $file )
    {
        $this->version = $version;
        $this->url = plugin_dir_url( $file );
        $this->dir = plugin_dir_path( $file );

        // include the DOMPDF class
        require_once $this->dir( 'lib/dompdf/dompdf_config.inc.php' );

        new NF_PDF_Admin_Attachment();
        new NF_PDF_Admin_Submission();

        add_action( 'admin_init', array( $this, 'setup_license' ) );
        
        add_action( 'admin_init', array( $this, 'check_php_version' ) );
    }

    /*
    |--------------------------------------------------------------------------
    | Getter Methods
    |--------------------------------------------------------------------------
    */

    public function url( $url = '' )
    {
        return trailingslashit( $this->url ) . $url;
    }

    public function dir( $path = '' )
    {
        return trailingslashit( $this->dir ) . $path;
    }

    public function version()
    {
        return $this->version;
    }

    /*
    |--------------------------------------------------------------------------
    | Admin Notices
    |--------------------------------------------------------------------------
    */
    
    public function check_php_version()
    {
        if( ! class_exists( 'Ninja_Forms', false ) ) return;
        $TARGET_VERSION = '5.6.0';
        $php_ver = phpversion();
        // If we have a php version lower than 5.6.
        if( version_compare( $php_ver, $TARGET_VERSION, '<' ) ) {
            add_action( 'admin_notices', array( $this, 'php_version_notice' ) );
        }
    }
    
    public function php_version_notice()
    {
        ?>
        <div class="nf-admin-notice nf-admin-error error">
            <div class="nf-notice-logo"></div>
            <p class="nf-notice-title"><?php _e( 'PHP 5.6 is required for PDF Form Submissions', 'ninja-forms' ); ?></p>
            <p class="nf-notice-body"><?php _e( 'As of May 31st, 2017, PDF Form Submissions will be disabled if your PHP version does not meet new requirements.<br />In order to ensure the security of our users&apos; sites, we will soon be discontinuing support for PHP versions below 5.6 in our PDF Form Submissions Plugin. Please contact your host about upgrading your PHP version. We recommend that you upgrade to PHP version 7.', 'ninja-forms' ); ?></p>
        </div>
        <?php
        
        wp_enqueue_style( 'nf-admin-notices', Ninja_Forms::$url .'assets/css/admin-notices.css?nf_ver=' . Ninja_Forms::VERSION );
    }

    /*
    |--------------------------------------------------------------------------
    | Action & Filter Hooks
    |--------------------------------------------------------------------------
    */

    public function setup_license()
    {
        if ( class_exists( 'NF_Extension_Updater' ) ) {
            $this->updater = new NF_Extension_Updater( 'PDF Form Submission', $this->version(), 'Never5', $this->dir(), 'pdf_submission' );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Internal API
    |--------------------------------------------------------------------------
    */

    /**
     * Get other templates passing attributes and including the file.
     *
     * @access public
     * @param mixed $template_name
     * @param array $args (default: array())
     * @param string $template_path (default: '')
     * @param string $default_path (default: '')
     * @return string
     */
    public function get_template( $template_name, $args = array(), $template_path = '', $default_path = '' )
    {
        if ( $args && is_array($args) ) {
            extract( $args );
        }

        $template = $this->locate_template( $template_name, $template_path, $default_path );

        $level = error_reporting();
        error_reporting( 0 );
        ob_start();

        do_action( 'nf_pdf_before_template_part', $template_name, $template_path, $template, $args );

        include( $template );

        do_action( 'nf_pdf_after_template_part', $template_name, $template_path, $template, $args );

        error_reporting( $level );
        return ob_get_clean();
    }

    /**
     * Locate a template and return the path for inclusion.
     *
     * This is the load order:
     *
     *     yourtheme      /  $template_path  /  $template_name
     *     yourtheme      /  $template_name
     *     $default_path  /  $template_name
     *
     * @access public
     * @param mixed $template_name
     * @param string $template_path (default: '')
     * @param string $default_path (default: '')
     * @return string
     */
    public function locate_template( $template_name, $template_path = '', $default_path = '' )
    {
        // set a default template directory url
        if ( ! $template_path ) {
            $template_path = apply_filters( 'nf_pdf_template_url', 'ninja-forms-pdf-submissions/' );
        }
        if ( ! $default_path ) {
            $default_path = $this->dir( 'templates/' );
        }

        // Look within passed path within the theme - this is priority
        $template = locate_template(
            array(
                trailingslashit( $template_path ) . $template_name, $template_name
            )
        );

        // Get default template if we couldn't find anything in the theme
        if ( ! $template ) {
            $template = $default_path . $template_name;
        }

        // Return what we found
        return apply_filters( 'nf_pdf_locate_template', $template, $template_name, $template_path );
    }

}
