<?php
/**
 * Plugin Name: Meta Box Show Hide
 * Plugin URI: https://metabox.io/plugins/meta-box-show-hide/
 * Description: Easily show/hide meta boxes by various conditions using JavaScript.
 * Version: 1.1.0
 * Author: MetaBox.io
 * Author URI: https://metabox.io
 * License: GPL2+
 *
 * @package    Meta Box
 * @subpackage Meta Box Show Hide
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'MB_Show_Hide' ) ) {

	/**
	 * This class controls toggling meta boxes via JS
	 * All meta boxes are included, but the job of showing/hiding them are handled via JS
	 */
	class MB_Show_Hide {
		/**
		 * Add hooks when class is loaded
		 */
		public function __construct() {
			add_action( 'rwmb_before', array( $this, 'js_data' ) );
			add_action( 'rwmb_enqueue_scripts', array( $this, 'enqueue' ) );
		}

		/**
		 * Output data for Javascript in data-show, data-hide attributes
		 * Data is output as a .mb-show-hide inside the meta box
		 * JS will read this data and process
		 *
		 * @param RW_Meta_Box $obj The meta box object.
		 */
		public function js_data( RW_Meta_Box $obj ) {
			$meta_box   = $obj->meta_box;
			$conditions = array( 'show', 'hide' );
			$data       = '';

			foreach ( $conditions as $condition ) {
				if ( empty( $meta_box[ $condition ] ) ) {
					continue;
				}

				// Remove empty rules.
				$rules = array_filter( $meta_box[ $condition ] );
				if ( 1 === count( $rules ) && isset( $rules['relation'] ) ) {
					continue;
				}

				$data .= ' data-' . $condition . '="' . esc_attr( wp_json_encode( $rules ) ) . '"';
			}

			if ( $data ) {
				// Use <script> tag to prevent browser render, thus improves performance.
				echo '<script type="text/html" class="mb-show-hide"' . $data . '></script>';
			}
		}

		/**
		 * Enqueue plugin scripts
		 */
		public function enqueue() {
			list( , $url ) = RWMB_Loader::get_path( dirname( __FILE__ ) );
			wp_enqueue_script( 'mb-show-hide', $url . 'show-hide.js', array( 'jquery', 'underscore' ), '1.0.2', true );

			$post_id = $this->get_post_id();
			$parent  = null;
			if ( $post_id ) {
				$post   = get_post( $post_id );
				$parent = $post->post_parent;
			}
			$data = array(
				'template'    => $this->get_template( $post_id ),
				'post_format' => get_post_format( $post_id ),
				'parent'      => $parent,
			);

			wp_localize_script( 'mb-show-hide', 'MBShowHideData', $data );
		}

		public function get_post_id() {
			$post_id = null;
			if ( isset( $_GET['post'] ) ) {
				$post_id = intval( $_GET['post'] );
			} elseif ( isset( $_POST['post_ID'] ) ) {
				$post_id = intval( $_POST['post_ID'] );
			}
			return $post_id;
		}

		public function get_template( $post_id ) {
			return get_post_meta( $post_id, '_wp_page_template', true );
		}
	}

	new MB_Show_Hide();
}