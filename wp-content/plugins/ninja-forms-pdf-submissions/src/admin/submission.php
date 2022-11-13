<?php

final class NF_PDF_Admin_Submission
{
    public function __construct()
    {
        add_filter( 'post_row_actions', array( $this, 'download_link' ), 10, 2 );

        // handle exporting PDFs from view submission page
        if( isset( $_REQUEST[ 'ninja_forms_export_subs_to_pdf' ] ) AND $_REQUEST['ninja_forms_export_subs_to_pdf'] != '' ) {
            add_action( 'admin_init', array( $this, 'bulk_export_pdf' ) );
        }
    }

    /**
     * Add PDF download link on the view form submission page
     */
    public function download_link( $actions, $post )
    {
        if( 'nf_sub' != $post->post_type ) return $actions;

        // create download link
        $args = array('ninja_forms_export_subs_to_pdf' => 1, 'sub_id' => $post->ID );
        $pdf_download_link = add_query_arg( $args, admin_url() );

        // turn on the output buffer
        ob_start();
        ?>
        <span class="export"><a href="<?php echo $pdf_download_link;?>" class="ninja-forms-export-sub-pdf"><?php _e( 'Export to PDF', 'nf-pdf' ); ?></a></span>
        <?php
        $action = ob_get_clean();

        // return the new html with the rest of the $row_actions array
        $actions['export_pdf'] = $action;

        return $actions;
    }

    /**
     * Bulk export the PDFs
     */
    public function bulk_export_pdf( ) {

        // make sure we have the right data
        if( ! isset( $_REQUEST['sub_id'] ) || ! $_REQUEST['sub_id'] ) return;

        $sub_id = absint( $_REQUEST['sub_id'] );

        $sub = Ninja_Forms()->form()->get_sub( $sub_id );
        $form_id = $sub->get_form_id();

        $title = Ninja_Forms()->form( $form_id )->get()->get_setting( 'title' );
        $fields =  Ninja_Forms()->form( $form_id )->get_fields();
        $fields = new NF_PDF_Adapter_Submission( $fields, $form_id, $sub );
        $args = array( 'form_ID' => $form_id );

        $document = new NF_PDF_Document( $title, $fields, $args, $sub_id );

        $content = $document->export();

        $name = apply_filters( 'ninja_forms_submission_pdf_name', 'ninja-forms-submission-' . $sub_id, $sub_id );

        header( "Content-type: application/pdf" );
        header( "Content-Disposition: attachment; filename=" . sanitize_title( $name ) . ".pdf"  );
        header( "Pragma: no-cache" );
        header( "Expires: 0" );

        echo $content;

        die();
    }
}
