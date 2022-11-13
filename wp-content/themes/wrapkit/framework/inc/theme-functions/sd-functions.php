<?php
/**
 * Theme SD Functions
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

// Use html5 markup
add_theme_support( 'html5' );

// Add title tag
add_theme_support( "title-tag" );

// Add feed links to header
add_theme_support( 'automatic-feed-links' );
	
// Add post formats WP 3.1+
add_theme_support( 'post-formats', array(
	'video',
	'audio',
	'gallery',
) );
// Add theme logo WP 4.5+
add_theme_support( 'custom-logo', array(
    'height'      => 21,
    'width'       => 197,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );

// Theme Menus
require_once( WRAPKIT_FRAMEWORK_INC . 'theme-functions/menus.php' );
	
// Theme Sidebars
require_once( WRAPKIT_FRAMEWORK_INC . 'theme-functions/sidebars.php' );
	
// Custom TinyMce Styles
require_once( WRAPKIT_FRAMEWORK_INC . 'theme-functions/tinymce-styles.php' );

// Pagination
require_once( WRAPKIT_FRAMEWORK_INC . 'theme-functions/pagination.php' );
	
// Custom Comments Callback
require_once( WRAPKIT_FRAMEWORK_INC . 'theme-functions/comments.php' );

// Font Awesome Fonts Array
require_once( WRAPKIT_FRAMEWORK_INC . 'theme-functions/font-awesome.php' );

// Extend Demo Importer
require_once( WRAPKIT_FRAMEWORK_INC . 'theme-functions/extend-demo-importer.php' );

// WooCommerce Functions
if ( class_exists( 'WooCommerce' ) ) {
	require_once( WRAPKIT_FRAMEWORK_INC . 'theme-functions/woocommerce.php' );
}
if ( ! function_exists( 'wrapkit_is_woo' ) ) {
	function wrapkit_is_woo() {
		if ( class_exists( 'WooCommerce' ) ) { 
			return true; 
		} else {
			return false;
		}
	}
}
// Add support for WP 2.9+ post thumbnails
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 189, 189, true ); // default Post Thumbnail dimensions
	add_image_size( 'wrapkit-blog-thumbs', 730, 446, true ); // blog thumbs
	add_image_size( 'wrapkit-full-blog-thumbs', 1140, 600, true ); // blog thumbs
	add_image_size( 'wrapkit-latest-blog', 150, 100, true ); // latest blog thumbs
	add_image_size( 'wrapkit-latest-blog-widget', 60, 60, true ); // latest blog widget thumbs
	add_image_size( 'wrapkit-carousel', 360, 240, true ); // carousel thumbs
	add_image_size( 'wrapkit-blog-full-layout', 650, 450, true ); // blog full width layout
	add_image_size( 'wrapkit-test-style1', 540, 330, true ); // testimonial style 1
	add_image_size( 'wrapkit-blog-style2', 350, 275, true ); // blog style 2
	add_image_size( 'wrapkit_event_thumb', 350, 204, true ); // event thumb
	
}

// Adds a `js` class to the root `<html>` element when JavaScript is detected
if ( ! function_exists( 'wrapkit_js_detect' ) ) {
	function wrapkit_js_detect() {
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}
	add_action( 'wp_head', 'wrapkit_js_detect', 0 );
}
if ( ! function_exists( 'wrapkit_body_class' ) ) {
	
	add_filter( 'body_class', 'wrapkit_body_class' );
	
	function wrapkit_body_class( $classes ) {

		$is_transp_header = '';

		if ( wrapkit_is_woo() && is_shop() ) {
			$shop_id          = get_option( 'woocommerce_shop_page_id' );
			$sd_transp_header = rwmb_meta( 'sd_transparent_header', 'type=checkbox', $shop_id );
			$is_transp_header = ( $sd_transp_header == '1' ) ? 'sd-is-transp' : '';
		}

		$classes[] = $is_transp_header;

		return $classes;
	}
}
// Add rel PrettyPhoto to images in post
if ( ! function_exists( 'wrapkit_rel_prettyphoto' ) ) {
	function wrapkit_rel_prettyphoto( $content ) {
		global $post;
	
		$sd_post_id = ( isset( $post->ID ) ? get_the_ID() : NULL );
		$pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
		$replacement = '<a$1href=$2$3.$4$5 rel="PrettyPhoto[' . $sd_post_id . ']"$6>';
		$content = preg_replace( $pattern, $replacement, $content );

		return $content;
	}
	add_filter( 'the_content', 'wrapkit_rel_prettyphoto' );
}
// Add editor style
if ( ! function_exists( 'wrapkit_add_editor_styles' ) ) {
	function wrapkit_add_editor_styles() {
    	add_editor_style( 'editor-styles.css' );
	}
	
	add_action( 'init', 'wrapkit_add_editor_styles' );
}

// Custom Youtube Embed
if ( ! function_exists( 'wrapkit_customize_youtube' ) ) {
	function wrapkit_customize_youtube( $html, $url, $args ) {
 
	/* Modify video parameters. */
		if ( strstr( $html,'youtube.com/embed/' ) ) {
			$html = str_replace( '?feature=oembed', '?feature=oembed&amp;hd=1;rel=0;showinfo=0&amp;controls=2&amp;theme=light&amp;modestbranding=1', $html );
		}
	
    	return $html;
	}
	
	add_filter( 'oembed_result', 'wrapkit_customize_youtube', 10, 3 );
}
	
// Filter tag clould output so that it can be styled by CSS
if ( ! function_exists( 'wrapkit_style_tag_cloud' ) ) {	
	function wrapkit_style_tag_cloud( $tags ) {
	    $tags = preg_replace_callback( "|(class='tag-link-[0-9]+)('.*?)(style='font-size: )([0-9]+)(pt;')|",
        create_function(
            '$match',
            '$low=1; $high=5; $sz=($match[4]-8.0)/(22-8)*($high-$low)+$low; return "{$match[1]} tagsz-{$sz}{$match[2]}";'
        ),
        $tags );
    	return $tags;
	}
 	add_action( 'wp_tag_cloud', 'wrapkit_style_tag_cloud' );
}
 
	
// Remove width and height from featured images
if ( ! function_exists( 'wrapkit_remove_width_height' ) ) {
	function wrapkit_remove_width_height( $html ) {
		if ( get_post_type( get_the_ID() ) !== 'product' ) {
			$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
		}
		return $html;
	}
	add_filter( 'post_thumbnail_html', 'wrapkit_remove_width_height', 10 );
}
 
// Excerpt limit

if ( ! function_exists( 'wrapkit_excerpt_length' ) ) {	
	function wrapkit_excerpt_length( $length ) {
		
		global $post;
		
		return 10;

	}
	add_filter( 'excerpt_length', 'wrapkit_excerpt_length', 999 );
}
// Create excerpt
if ( ! function_exists( 'wrapkit_excerpt' ) ) {
	function wrapkit_excerpt( $args = array() ) {
	
		$defaults = array(
			'output'        => '',
			'length'        => '30',
		);
		
		$args = wp_parse_args( $args, $defaults );
	
		extract( $args );
	
		$excerpt = intval( $length );
	
		if ( empty( $length ) || '0' == $length || false == $length ) {
			return;
		}
	
		$post         = get_post();
		$post_id      = $post->ID;
		$post_content = $post->post_content;
		$post_excerpt = $post->post_excerpt;
	
		if ( $post_excerpt ) {
			$post_excerpt = apply_filters( 'the_content', $post_excerpt );
		}
	
		if ( $post_excerpt ) :
	
			$output = $post_excerpt;
	
		else :
	
			if ( '9999' == $length ) {
				return apply_filters( 'the_content', get_the_content( '', '&hellip;' ) );
			}
	
			if ( '-1' == $length ) {
				return apply_filters( 'the_content', $post_content );
			}
	
			if ( strpos( $post_content, '[vc_column_text]' ) ) {
				
				$pattern = '{\[vc_column_text.*?\](.*?)\[/vc_column_text\]}is';
				
				preg_match( $pattern, $post_content, $match );
				
				if ( isset( $match[1] ) ) {
					$excerpt = strip_shortcodes( $match[1] );
					$excerpt = wp_trim_words( $excerpt, $length );
				} else {
					$content = strip_shortcodes( $post_content );
					$excerpt = wp_trim_words( $content, $length);
				}
			}
	
			else {
				$content = strip_shortcodes( $post_content );
				$excerpt = wp_trim_words( $content, $length );
			}
	
			if ( $excerpt ) {
				$sd_post_type = get_post_type();
				if ( $sd_post_type == 'tribe_events' ) {
					$output .= '<p class="m-t-20">'. $excerpt .'</p>';
				} else {
					$output .= '<p class="m-t-20 m-b-30">'. $excerpt .'</p>';
				}
			}
	
		endif;
	
		return $output;
	
	}
}
if ( ! function_exists( 'wrapkit_more' ) ) {	
	function wrapkit_more() {
		global $post;

		return '<p class="sd-more-p"><a class="font-13" href="'. get_permalink( get_the_ID() ) . '#more-' . get_the_ID() . '">' . esc_html__( 'Continue Reading', 'wrapkit' ) . '</a></p>';

	}
}
// Get post author
if ( ! function_exists( 'wrapkit_post_author' ) ) {	
	function wrapkit_post_author( ) {
		
		$autor_email  = get_the_author_meta( 'email' );
		$author_id    = get_the_author_meta( 'ID' );
		$author_posts = esc_url( get_author_posts_url( $author_id ) );

		
		return '<span class="sd-post-author">' . get_avatar( $autor_email, '40' ) . esc_html_x( 'By', 'by author', 'wrapkit' ) . ' <a href="' . $author_posts . '" title="' . esc_attr__( 'All posts by author', 'wrapkit' ) . '">' . get_the_author() . '</a></span>';
	}
}
// Change "more" text
if ( ! function_exists( 'wrapkit_new_excerpt_more' ) ) {	
	function wrapkit_new_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'wrapkit_new_excerpt_more');
}

if ( ! function_exists( 'wrapkit_more_text' ) ) {
	function wrapkit_more_text( $excerpt ) {
		global $post;
		if ( ! get_post_type( $post ) == 'staff' ) {
			$excerpt .= '<a class="sd-more" href="' . get_permalink( get_the_ID() ) . '" title="' . esc_attr( 'Read More', 'wrapkit' ) . '">' . esc_html__( 'Read More', 'wrapkit' ) . '</a>';		
		}
		return $excerpt;
	}
		add_filter('the_excerpt', 'wrapkit_more_text');
}
// WP title for home
if ( ! function_exists ( 'wrapkit_wp_title_for_home' ) ) {
	function wrapkit_wp_title_for_home( $title ) {
	  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
		return esc_html__( 'Home', 'wrapkit' ) . ' | ' . get_bloginfo( 'description' );
	  }
	  return $title;
	}
	add_filter( 'wp_title', 'wrapkit_wp_title_for_home' );
}
// add styles to WP safe list
add_filter( 'safe_style_css', function( $styles ) {
	$styles[] = 'display';
	$styles[] = 'position';
	$styles[] = 'left';
	return $styles;
} );
// Disable Revolution Slider Update Notice
if ( function_exists( 'set_revslider_as_theme' ) ) {
	function wrapkit_set_revslider_as_theme() {
		set_revslider_as_theme();
	}
	add_action( 'init', 'wrapkit_set_revslider_as_theme' );
}
// Disable Ultimate VC Addons Notice
if( class_exists( 'Ultimate_VC_Addons' ) ) {
	define('ULTIMATE_NO_EDIT_PAGE_NOTICE', true);	
	define('ULTIMATE_NO_PLUGIN_PAGE_NOTICE', true);
}
if ( ! function_exists( 'wrapkit_hide_uva' ) ) {
	function wrapkit_hide_uva() {
		echo '<style type="text/css">.update-nag,
		.rs-update-notice-wrap,
		.vc_license-activation-notice {
			display: none !important;	
		}
		</style>';
	}
	add_action('admin_head', 'wrapkit_hide_uva' );
}
?>
<?php
// Top Bar Text
if ( ! function_exists( 'wrapkit_top_bar_text' ) ) {
	function wrapkit_top_bar_text() { ?>
		<div class="sd-header-left-options">
			<span class="sd-top-text">
				<?php
					global $wrapkit_data;
					
					echo  wp_kses( $wrapkit_data['sd_top_bar_text'], array(
						'i' => array(
							'class' => array(),
						),
						'a' => array(
							'href' => array(),
							'title' => array(),
						),
						'span' => array(
							'style' => array(),
						),
						'strong' => array(),
					) ); 
				?>
			</span>
		</div>
		<!-- sd-header-left-options -->	
<?php
	}
}
?>
<?php 
// Social Icons
if ( ! function_exists( 'wrapkit_social' ) ) {
	function wrapkit_social( $wrap = 1, $nav_item = 'nav-item', $nav_link = 'nav-link' ) {
		global $wrapkit_data;
		
		$sd_social_icons = isset( $wrapkit_data['sd_social_icons'] ) ? $wrapkit_data['sd_social_icons'] : array();
		
?>
			<?php 
				foreach ( $sd_social_icons as $sd_font_class => $sd_url ) {
					if ( $sd_url ) { ?>
						<?php if ( $wrap ) : ?>
							<li class="<?php echo $nav_item; ?> sd-si-li">
						<?php endif; ?>
							<a class="<?php echo $nav_link; ?> sd-header-<?php if ( $sd_font_class == 'email' ) { echo 'email'; } else { echo esc_attr( $sd_font_class ); } ?>" href="<?php if ( $sd_font_class == 'email' ) { $sd_email = sanitize_email( $sd_url ); echo 'mailto:' . antispambot( $sd_email, 1 ); } else { echo esc_url( $sd_url ); } ?>" title="<?php echo esc_attr( $sd_font_class ); ?>" target="_blank">
								<i class="fa fa-<?php if ( $sd_font_class == 'email' ) { echo 'envelope-o'; } else { echo esc_attr( $sd_font_class ); } ?>"></i>
							</a>
						<?php if ( $wrap ) : ?>
							</li>
						<?php endif; ?>
			<?php
					}
				} 
			?>
<?php
	}
}
?>
<?php 
// Contact Icons
if ( ! function_exists( 'wrapkit_contact_icons' ) ) {
	function wrapkit_contact_icons() {
		
		global $wrapkit_data;
		
		$sd_top_bar_email = isset( $wrapkit_data['sd_top_bar_email'] ) ? sanitize_email( $wrapkit_data['sd_top_bar_email'] ) : NULL;
		$sd_top_bar_phone = isset( $wrapkit_data['sd_top_bar_phone'] ) ? $wrapkit_data['sd_top_bar_phone'] : NULL;
?>
		<div class="sd-top-contact clearfix">
			<span class="sd-top-email"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo antispambot( $sd_top_bar_email, 1 ); ?>" title="<?php esc_attr_e( 'Email Us', 'wrapkit' ); ?>"><?php echo antispambot( $sd_top_bar_email ); ?></a></span>
			<span class="sd-top-phone"><i class="fa fa-phone"></i> <a href="tel:<?php echo esc_html( rawurlencode( $sd_top_bar_phone ) ); ?>" title="<?php esc_attr_e( 'Call:', 'wrapkit' ); ?><?php echo esc_html( $sd_top_bar_phone ); ?>"><?php echo esc_html( $sd_top_bar_phone ); ?></a></span>
		</div>
		<!-- sd-top-contact -->
<?php
	}
}
?>
<?php 
// Header extra button 1
if ( ! function_exists( 'wrapkit_header_extra_button1' ) ) {
	function wrapkit_header_extra_button1() {
		
		global $wrapkit_data;
		
		$sd_header_button1_text   = ! empty( $wrapkit_data['header_button1_text'] ) ? $wrapkit_data['header_button1_text'] : NULL;
		$sd_header_button1_url    = isset( $wrapkit_data['header_button1_url'] ) ? $wrapkit_data['header_button1_text'] : NULL;
		$sd_header_button1_target = ( ! empty( $wrapkit_data['header_button1_target'] ) ? $wrapkit_data['header_button1_text'] : '' );

?>
	<div class="sd-extra-buttons">
		<?php if ( ! empty( $sd_header_button_text ) ) : ?>
		<a class="sd-extra-button sd-link-trans" href="<?php echo esc_url( $sd_header_button_url ); ?>" title="<?php echo esc_attr( $sd_header_button_text ); ?>" <?php if ( $sd_header_button_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_header_button_text ); ?>
		</a>
		<?php endif; ?>
		
		<?php if ( ! empty( $sd_header_button2_text ) ) : ?>
		<a class="sd-extra-button2 sd-opacity-trans" href="<?php echo esc_url( $sd_header_button2_url ); ?>" title="<?php echo esc_attr( $sd_header_button2_text ); ?>" <?php if ( $sd_header_button2_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_header_button2_text ); ?>
			<?php if ( ! empty( $sd_header_button2_meta ) ) : ?>
				<span class="sd-button-meta"><?php echo esc_html( $sd_header_button2_meta ); ?></span>
			<?php endif; ?>
		</a>
		<?php endif; ?>
		
	</div>
	<!-- sd-extra-buttons -->
<?php
	}
}
?>
<?php 
// Contact E-Mail and Phone
if ( ! function_exists( 'wrapkit_contact_email_phone' ) ) {
	function wrapkit_contact_email_phone( $email = '1', $phone = '1' ) {
		
		global $wrapkit_data;
		
		$email_data = sanitize_email( isset( $wrapkit_data['header_email'] ) ? $wrapkit_data['header_email'] : NULL );
		$phone_data = isset( $wrapkit_data['header_phone'] ) ? $wrapkit_data['header_phone'] : NULL;
?>
		<div class="sd-header-contact clearfix">
			<?php if ( ! empty( $email_data ) && $email == '1' ) : ?>
				<span class="sd-header-email"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo antispambot( $email_data, 1 ); ?>" title="<?php esc_attr_e( 'Email Us', 'wrapkit' ); ?>"><?php echo antispambot( $email_data ); ?></a></span>
			<?php endif; ?>
			
			<?php if ( ! empty( $phone_data ) && $phone == '1' ) : ?>
				<span class="sd-header-phone"><i class="fa fa-phone"></i> <a href="tel:<?php echo esc_html( rawurlencode( $phone_data ) ); ?>" title="<?php esc_attr_e( 'Call:', 'wrapkit' ); ?><?php echo esc_html( $phone_data ); ?>"><?php echo esc_html( $phone_data ); ?></a></span>
			<?php endif; ?>
		</div>
		<!-- sd-top-contact -->
<?php
	}
}
?>
<?php
if ( ! function_exists( 'sd_change_logo_class' ) ) {
	function sd_change_logo_class( $html ) {

		$html = str_replace( 'custom-logo-link', 'navbar-brand sd-logo', $html );

		return $html;
	}
	add_filter( 'get_custom_logo', 'sd_change_logo_class' );
}
// Theme Logo
if ( ! function_exists( 'wrapkit_theme_logo' ) ) {
	function wrapkit_theme_logo() {
		
?>
	<?php the_custom_logo(); ?>
	<?php if ( ! has_custom_logo() ) : ?>
		<a class="sd-logo-text navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php echo get_bloginfo( 'name' );	?> </a>
	<?php endif; ?>
<?php
	}
}
?>
<?php
// Default favicon
if ( ! function_exists( 'wrapkit_default_favicon' ) ) {
	function wrapkit_default_favicon() {
?>
	<?php if ( ! has_site_icon()  && ! is_customize_preview() ) : ?>
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/framework/images/favicon.png">
	<?php endif; ?>
<?php
	}
	add_action( 'wp_head',    'wrapkit_default_favicon', 99 );
	add_action( 'login_head', 'wrapkit_default_favicon', 99 );
}
?>