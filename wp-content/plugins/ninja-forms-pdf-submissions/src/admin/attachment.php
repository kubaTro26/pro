<?php if ( ! defined( 'ABSPATH' ) ) exit;

class NF_PDF_Admin_Attachment
{

    public function __construct()
    {
        add_filter( 'ninja_forms_action_email_settings',   array( $this, 'email_settings' ), 10, 1 );
        add_filter( 'ninja_forms_action_email_attachments', array( $this, 'attach_files'  ), 10, 3 );
    }

    /**
     * Add advanced email setting to attach a PDF.
     *
     * @param array $settings
     *
     * @return array $settings
     */
    public function email_settings( $settings )
    {
        $settings[ 'attach_pdf' ] = array(
            'name'        => 'attach_pdf',
            'type'        => 'toggle',
            'label'       => __( 'Attach PDF', 'ninja-forms-uploads' ),
            'width'       => 'one-half',
            'group'       => 'advanced',
        );

        return $settings;
    }

    /**
     * Attach the PDF to the email.
     *
     * @param array $attachments
     * @param array $data
     * @param array $settings
     *
     * @return array
     */
    public function attach_files( $attachments, $data, $settings )
    {

        if( isset( $settings[ 'attach_pdf' ] ) && 1 == $settings[ 'attach_pdf' ] ) {

            $title = $data[ 'settings' ][ 'title' ];
            $fields =  new NF_PDF_Adapter_Fields( $data[ 'fields' ], $data[ 'form_id' ] );
            $args = array( 'form_ID' => $data[ 'form_id' ] );
            $sub_id = ( isset( $data[ 'actions' ][ 'save' ] ) ) ? $data[ 'actions' ][ 'save' ][ 'sub_id' ] : null;

            $document = new NF_PDF_Document( $title, $fields, $args, $sub_id );

            $content = $document->export();

            // Append file path.
            $attachments[] = $this->create_temp_file( $content, $sub_id );
        }

        return $attachments;
    }

    public function create_temp_file( $content, $sub_id ) {

        // create temporary file
        $path = tempnam( get_temp_dir(), 'Sub' );
        $temp_file = fopen( $path, 'r+' );

        // write to temp file
        fwrite( $temp_file, $content );
        fclose( $temp_file );

        // find the directory we will be using for the final file
        $path = pathinfo( $path );
        $dir = $path['dirname'];
        $basename = $path['basename'];

        // create name for file
        $new_name = apply_filters( 'ninja_forms_submission_pdf_name', 'ninja-forms-submission-' . $sub_id, $sub_id );

        // remove a file if it already exists
        if ( file_exists( $dir.'/'.$new_name.'.pdf' ) ) {
            unlink( $dir.'/'.$new_name.'.pdf' );
        }

        // move file
        rename( $dir.'/'.$basename, $dir.'/'.$new_name.'.pdf' );
        $new_file = $dir.'/'.$new_name.'.pdf';

        return $new_file;
    }
}
