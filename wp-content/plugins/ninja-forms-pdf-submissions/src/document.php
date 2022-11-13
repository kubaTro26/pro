<?php

final class NF_PDF_Document
{
    protected $title;
    protected $fields;
    protected $data;
    protected $submission;

    public function __construct( $title = '', $fields = array(), $data = array(), $sub_ID = null )
    {
        $this->title = $title;
        $this->fields = $fields;
        $this->data = $data;

        if( $sub_ID ){
            $this->data[ 'sub_ID' ] = $sub_ID;
            $this->submission = Ninja_Forms()->form()->get_sub( $sub_ID );
        } else {
            $this->data[ 'sub_ID' ] = null;
        }
    }

    public function export()
    {

	    $args = array_merge( array(
		    'title'    => $this->title,
		    'table'    => $this->create_table(),
		    'fields'   => $this->fields,
		    'css_path' => NF_PDF()->locate_template( 'pdf.css' )
	    ), $this->data );

        $html = NF_PDF()->get_template( 'pdf.php', $args );

        $basepath = NF_PDF()->dir( 'templates/' );

        $dompdf = new DOMPDF();
        $dompdf->set_base_path( $basepath );
        $dompdf->load_html( $html );
        $dompdf->render();
        return $dompdf->output();
    }

    protected function create_table()
    {
        ob_start(); // open buffer

        echo "<table>";

        // before looping through the fields let's add the date to the results
        // default is off but can be turned on via a filter
        if ( $this->submission && apply_filters( 'ninja_forms_submission_pdf_fetch_date', false, $this->submission->get_id() ) ) {
            echo "<tr>";
            echo "<td>" . __( 'Date Submitted', 'nf-pdf' ) . "</td>";
            echo "<td>" . $this->submission->get_sub_date() . "</td>";
            echo "</tr>\n";
        }

        // we should also add the option to add the sequential number to the form
        // default is off but can be turned on via a filter
        if ( $this->submission && apply_filters( 'ninja_forms_submission_pdf_fetch_sequential_number', false, $this->submission->get_id() ) ) {
            echo "<tr>";
            echo "<td>" . __( 'Form Submission ID', 'nf-pdf' ) . "</td>";
            echo "<td>" . $this->submission->get_seq_num() . "</td>";
            echo "</tr>\n";
        }

        $hidden_field_types = apply_filters( 'nf_sub_hidden_field_types', array() );

        // allow user to filter fields that are used in document via nf_sub_document_fields
        $fields = apply_filters( 'nf_sub_document_fields', $this->fields );

        foreach ( $fields as $field ) {

            if( in_array( $field[ 'type' ], array_values( $hidden_field_types ) ) ) continue;

            if( isset( $field[ 'admin_label' ] ) && $field[ 'admin_label' ] ) {
                $field_label = $field[ 'admin_label' ];
            } else {
                $field_label = $field[ 'label' ];
            }

            $field_value = ( isset( $field[ 'value' ] ) ) ? $field[ 'value' ] : null;

            $field_value = apply_filters( 'ninja_forms_pdf_pre_user_value', $field_value, array() );

            // if the user submitted value is an array we need to make it pretty
            if ( is_array( $field_value ) ) {
                $field_value = implode( ", ", $field_value );
            }

            $field_value = apply_filters( 'ninja_forms_pdf_field_value', html_entity_decode( $field_value ), $field_value, $field );

            if ( apply_filters( 'ninja_forms_pdf_field_value_wpautop', true, $field_value, $field ) ) {
                $field_value = wpautop( $field_value );
            }

            echo "<tr>";
            echo "<td>" . $field_label . "</td>";
            echo "<td>" . $field_value . "</td>";
            echo "</tr>\n";
        }

        echo "</table>";

        return ob_get_clean();
    }
}
