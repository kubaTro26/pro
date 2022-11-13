<?php

final class NF_PDF_Adapter_Submission extends NF_PDF_Adapter_Fields
{
    protected $fields;
    protected $submission;

    public function __construct( $fields, $form_id, $submission )
    {
        parent::__construct( $fields, $form_id );
        $this->submission = $submission;
    }

    /*
    |--------------------------------------------------------------------------
    | ArrayAccess
    |--------------------------------------------------------------------------
    */

    public function offsetExists( $offset )
    {
        if( isset( $this->fields[ $offset ] ) ) return true;
        return $this->offsetMaybeCreate( $offset );
    }

    public function offsetGet( $offset )
    {
        if( isset( $this->fields[ $offset ] ) ) return $this->fields[ $offset ];
        return $this->offsetMaybeCreate( $offset );
    }

    protected function offsetMaybeCreate( $offset )
    {
        foreach( $this->fields as $field ){
            if( $offset != $field->get_setting( 'key' ) ) continue;
            return $this->fields[ $offset ] = array(
                'type' => $field->get_setting( 'type' ),
                'label' => $field->get_setting( 'label' ),
                'admin_label' => $field->get_setting( 'admin_label' ),
                'value' => $this->submission->get_field_value( $field->get_id() )
            );
        }
        return false;
    }

    /*
    |--------------------------------------------------------------------------
    | Iterator
    |--------------------------------------------------------------------------
    */

    public function current() {
        $field = current( $this->fields );

        return array(
            'type' => $field->get_setting( 'type' ),
            'label' => $field->get_setting( 'label' ),
            'admin_label' => $field->get_setting( 'admin_label' ),
            'value' => $this->submission->get_field_value( $field->get_id() )
        );
    }
}
