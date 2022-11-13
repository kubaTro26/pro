<?php

namespace cnb\admin\button;

// don't load directly
defined( 'ABSPATH' ) || die( '-1' );

use cnb\admin\action\CnbAction;
use cnb\admin\api\CnbAdminCloud;
use cnb\admin\api\CnbAppRemote;
use cnb\admin\condition\CnbCondition;
use cnb\notices\CnbAdminNotices;
use cnb\notices\CnbNotice;
use cnb\utils\CnbUtils;

class CnbButtonController {

    private static function create_and_update( $closure ) {
        $nonce = filter_input( INPUT_POST, '_wpnonce_button', FILTER_SANITIZE_STRING );
        if ( isset( $_REQUEST['_wpnonce_button'] ) && wp_verify_nonce( $nonce, 'cnb-button-edit' ) ) {

            // sanitize the input
            $button     = filter_input(
                INPUT_POST,
                'button',
                FILTER_SANITIZE_STRING,
                FILTER_REQUIRE_ARRAY | FILTER_FLAG_NO_ENCODE_QUOTES );
            $actions    = filter_input(
                INPUT_POST,
                'actions',
                FILTER_SANITIZE_STRING,
                FILTER_REQUIRE_ARRAY | FILTER_FLAG_NO_ENCODE_QUOTES );
            $conditions = filter_input(
                INPUT_POST,
                'conditions',
                FILTER_SANITIZE_STRING,
                FILTER_REQUIRE_ARRAY | FILTER_FLAG_NO_ENCODE_QUOTES );

            if ( $conditions === null ) {
                $conditions = array();
            }

            /** @var CnbAction[] */
            $processed_actions = array();
            if ( is_array( $actions ) ) {
                foreach ( $actions as $action ) {
                    $processed_actions[] = CnbAction::fromObject( $action );
                }
            }

            /** @var CnbCondition[] */
            $processed_conditions = array();
            if ( is_array( $conditions ) ) {
                foreach ( $conditions as $condition ) {
                    $processed_conditions[] = CnbCondition::fromObject( $condition );
                }
            }

            $button['actions']    = $processed_actions;
            $button['conditions'] = $processed_conditions;
            $processed_button     = CnbButton::fromObject( $button );

            // processing
            $closure( $processed_button, $processed_actions, $processed_conditions );
            // end processing
        } else {
            wp_die( esc_html__( 'Invalid nonce specified' ), esc_html__( 'Error' ), array(
                'response'  => 403,
                'back_link' => true,
            ) );
        }

    }

    /**
     * This is called to update the button
     * via `call-now-button.php#cnb_create_<type>_button`
     */
    public static function create() {
        /**
         * @param $button CnbButton
         *
         * @return void
         */
        $inner = function ( $button ) {
            // Do the processing
            $cnb_cloud_notifications = array();
            $new_button              = CnbAdminCloud::cnb_create_button( $cnb_cloud_notifications, $button );

            // redirect the user to the appropriate page
            $tab          = filter_input( INPUT_POST, 'tab', FILTER_SANITIZE_STRING );
            $transient_id = 'cnb-' . wp_generate_uuid4();
            set_transient( $transient_id, $cnb_cloud_notifications, HOUR_IN_SECONDS );

            $new_button_type = null;
            $new_button_id   = null;
            if ( $new_button instanceof CnbButton ) {
                $new_button_type = strtolower( $new_button->type );
                $new_button_id   = $new_button->id;
            }

            // Create link
            $url           = admin_url( 'admin.php' );
            $redirect_link =
                add_query_arg(
                    array(
                        'page'   => 'call-now-button',
                        'action' => 'edit',
                        'type'   => $new_button_type,
                        'id'     => $new_button_id,
                        'tid'    => $transient_id,
                        'tab'    => $tab
                    ),
                    $url );
            $redirect_url  = esc_url_raw( $redirect_link );
            wp_safe_redirect( $redirect_url );
            exit;
        };
        self::create_and_update( $inner );
    }

    /**
     * This is called to update the button
     * via `call-now-button.php#cnb_update_<type>_button`
     */
    public static function update() {
        /**
         * @param $button CnbButton
         * @param $actions CnbAction[]
         * @param $conditions CnbCondition[]
         *
         * @return void
         */
        $inner = function ( $button, $actions, $conditions ) {
            // do the processing
            $result = CnbAdminCloud::cnb_update_button_and_conditions( $button, $actions, $conditions );

            // redirect the user to the appropriate page
            $tab          = filter_input( INPUT_POST, 'tab', FILTER_SANITIZE_STRING );
            $transient_id = 'cnb-' . wp_generate_uuid4();
            set_transient( $transient_id, $result, HOUR_IN_SECONDS );

            // Create link
            $url           = admin_url( 'admin.php' );
            $redirect_link =
                add_query_arg(
                    array(
                        'page'   => 'call-now-button',
                        'action' => 'edit',
                        'type'   => strtolower( $button->type ),
                        'id'     => $button->id,
                        'tid'    => $transient_id,
                        'tab'    => $tab
                    ),
                    $url );
            $redirect_url  = esc_url_raw( $redirect_link );
            wp_safe_redirect( $redirect_url );
            exit;
        };
        self::create_and_update( $inner );
    }

    /**
     * Quick action, so actually render the Notice
     * @return void
     */
    public function enable_disable() {
        $cnb_utils = new CnbUtils();
        // "enable" or "disable"
        $action         = $cnb_utils->get_query_val( 'action', null );
        $id             = $cnb_utils->get_query_val( 'id', null );
        $nonce          = $cnb_utils->get_query_val( '_wpnonce', null );
        $nonce_verified = wp_verify_nonce( $nonce, 'cnb_enable_disable_button' );
        if ( $nonce_verified ) {
            $active      = $action === 'enable';
            $action_verb = $active ? 'enable' : 'disable';
            $action_name = $action_verb . 'd';

            $button         = CnbAppRemote::cnb_remote_get_button_full( $id );
            $button->active = $active;

            $updated_button = CnbAppRemote::cnb_remote_update_button( $button );

            if ( ! is_wp_error( $updated_button ) ) {
                $notice = new CnbNotice( 'success', '<p>Button <strong>' . esc_html( $updated_button->name ) . '</strong> ' . $action_name . '.</p>', true );
            } else {
                $notice = CnbAdminCloud::cnb_admin_get_error_message( $action_verb, 'button', $updated_button );
            }
            CnbAdminNotices::get_instance()->notice( $notice );
        }
    }

    /**
     * Via the quick actions, be able to delete a Condition
     *
     * This also means we CANNOT redirect, as we're already halfway into rendering the page,
     * so we add the notification to the adminNotices handler
     *
     * @return void
     */
    public static function delete() {
        $cnb_utils      = new CnbUtils();
        $id             = $cnb_utils->get_query_val( 'id', null );
        $nonce          = $cnb_utils->get_query_val( '_wpnonce', null );
        $action         = 'cnb_delete_button';
        $nonce_verified = wp_verify_nonce( $nonce, $action );

        if ( $nonce_verified ) {
            $adminNotices            = CnbAdminNotices::get_instance();
            $cnb_cloud_notifications = array();
            $button                  = new CnbButton();
            $button->id              = $id;
            CnbAdminCloud::cnb_delete_button( $cnb_cloud_notifications, $button );
            $adminNotices->notices( $cnb_cloud_notifications );
        }
    }

    /**
     * In addition to delete(), this also handles the bulk enable/disable action.
     *
     * This is very similar to the <code>delete()</code> function above.
     *
     * This always has to come via a $_POST request (specifically, via admin-post.php),
     * so this should end in a redirect (or an error via wp_die)
     *
     * Big differences are:
     * - This handles multiple IDs, versus 1
     * - Instead of rendering the Notice, is it stored and the user redirected
     *
     * nonce name via WP_List_Table = bulk-{plural}
     * so in this case: bulk-cnb_list_buttons
     *
     * @return void
     */
    public static function handle_bulk_actions() {
        $cnb_utils      = new CnbUtils();
        $nonce          = $cnb_utils->get_post_val( '_wpnonce' );
        $action         = 'bulk-cnb_list_buttons';
        $nonce_verified = wp_verify_nonce( $nonce, $action );

        if ( $nonce_verified ) {
            $buttonIds      = filter_input( INPUT_POST, 'cnb_list_button', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY );
            $current_action = filter_input( INPUT_POST, 'bulk-action', FILTER_SANITIZE_STRING );

            switch ( $current_action ) {
                case 'enable':
                case 'disable':
                    $cnb_cloud_notifications = array();
                    foreach ( $buttonIds as $buttonId ) {
                        $button         = CnbAppRemote::cnb_remote_get_button_full( $buttonId );
                        $button->active = $current_action === 'enable';
                        CnbAdminCloud::cnb_update_button( $cnb_cloud_notifications, $button );
                    }
                    $action_name = $current_action . 'd';

                    // Create notice for link (and yes - we ignore the content of $cnb_cloud_notifications here, we just use it to count)
                    $notice = new CnbNotice( 'success', '<p>' . count( $cnb_cloud_notifications ) . ' Buttons ' . $action_name . '.</p>' );
                    break;
                case 'delete':
                    foreach ( $buttonIds as $buttonId ) {
                        $button     = new CnbButton();
                        $button->id = $buttonId;
                        CnbAppRemote::cnb_remote_delete_button( $button );
                    }
                    $notice = new CnbNotice( 'success', '<p>' . count( $buttonIds ) . ' Button(s) deleted.</p>' );
                    break;
                default:
                    $notice = null;
            }
            $transient_id = null;
            if ( $notice ) {
                $transient_id = 'cnb-' . wp_generate_uuid4();
                set_transient( $transient_id, array( $notice ), HOUR_IN_SECONDS );
            }

            // Create link
            $url           = admin_url( 'admin.php' );
            $redirect_link =
                add_query_arg(
                    array(
                        'page' => 'call-now-button',
                        'tid'  => $transient_id
                    ),
                    $url );
            $redirect_url  = esc_url_raw( $redirect_link );
            wp_safe_redirect( $redirect_url );
        } else {
            wp_die(
                esc_html__( 'Invalid nonce specified' ),
                esc_html__( 'Error' ),
                array(
                    'response'  => 403,
                    'back_link' => true,
                )
            );
        }
    }
}
