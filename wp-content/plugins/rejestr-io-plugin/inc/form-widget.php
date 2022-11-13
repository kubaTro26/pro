<?php

    /**
     * Widget Class
     */

    class RejestrIoWidget extends WP_Widget {

        /* Constructor */

        function __construct() {
            parent::__construct(
                'rejestr_io_widget',
                __('Rejestr IO Form', 'rejestr_io_form'),
                [
                    'description' => 'Displays the form'
                ]
            );
        }


        /* Main method */

        function widget($args, $instance) {

            extract( $args );

            if (! empty( $instance['title'] ) )
                $title = apply_filters('widget_title', $instance['title'] ); 

            /* Before widget*/
            echo $args['before_widget'];

            /* Content of the widget */
            if($title)
                echo $args['before_title'] . $title . $args['after_title'];
            
            ?>

            <form method="post" id="rejestrio-form">
                <input type="text" name="NIP" id="NIP_field">
                <button type="submit" name="submit_REJESTR_IO_FORM" value="Check"><?php _e('Szukaj', 'wordpress') ?></button>
            </form>


            <?php

            /* After widget*/
            echo $args['after_widget'];

            
        }

        function form( $instance ) {
            $defaults = [
                'title' => 'Wyszukaj podmiot'
            ];

            $instance = wp_parse_args( (array)$instance, $defaults );

            ?>

                <!-- Widget Title -->
                <p>
                    <label for="title">Tytuł</label>
                    <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>">
                </p>

            <?php

        }


        /* Instance update */

        function update( $new_instance, $old_instance ): array {
            
            $instance = $old_instance;

            $instance['title'] = strip_tags($new_instance['title']);

            return $instance;
        }
    }

    /**
     * Register the widget
     */
    function rio_load_widget(){
        register_widget(  'RejestrIoWidget' );
    }

    add_action( 'widgets_init', 'rio_load_widget' );