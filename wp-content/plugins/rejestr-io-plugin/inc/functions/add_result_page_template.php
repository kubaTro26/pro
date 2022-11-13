<?php

    add_filter( 'page_template', 'wpa3396_page_template' );
    function wpa3396_page_template( $page_template )
    {
        if ( is_page( 'wyszukiwanie' ) ) {
            $page_template = PLUGIN_TEMPLATES_DIR. '/result_page.php';
        }
        return $page_template;
    }