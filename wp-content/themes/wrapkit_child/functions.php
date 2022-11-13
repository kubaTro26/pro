<?php
/**
 * Child Theme Functions
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
// Enqueue Styles

if ( ! function_exists( 'wrapkit_child_enqueue_styles' ) ) {
function wrapkit_child_enqueue_styles() {
    
		wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/style.css', array( 'bootstrap' ), '3', 'all' ); // Main Parent Stylesheet
		wp_enqueue_style( 'sd-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'stylesheet' ) );
		
		if ( is_multisite() ) {
		
			wp_enqueue_style( 'sd-custom-css-' . get_current_blog_id() , get_template_directory_uri() . '/framework/admin/admin-options/custom-styles-' . get_current_blog_id() . '.css', 'style' );
			
		} else {
			
			wp_enqueue_style( 'sd-custom-css', get_template_directory_uri() . '/framework/admin/admin-options/custom-styles.css', array( 'sd-child-style' ), '4', 'all' );
			
		}
	
	}
	add_action( 'wp_enqueue_scripts', 'wrapkit_child_enqueue_styles' );
}
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
/*
if ( is_page(1067)) {
	$api_key = "27e0fa9c-805a-4c4d-88aa-c72f983f9e74";
	 function testRejestrioApi(string $api_key) : void
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ["Authorization: $api_key"]);
        curl_setopt($curl, CURLOPT_URL, "https://rejestr.io/api/v2/org/15664");
        $json = json_decode(curl_exec($curl));
        //debug_to_console($json);
		
		$upload_dir = wp_get_upload_dir(); // set to save in the /wp-content/uploads folder
		$file_name = date('Y-m-d') . '.json';
		$save_path = $upload_dir['basedir'] . '/' . $file_name;
		
		
		 $file = fopen($save_path, "w");
		 fwrite($file, $json);
		 fclose($file);				
			
		return;
    }
}
add_action('save_post', 'export_in_json');
*/
function typed_init() {
    echo '<script>

	function change_eko() {
		var newValue1 = jQuery("#nf-field-352").val();
		jQuery( "#nf-field-402" ).val( newValue1 ).trigger( "change" );
		var newValue2 = jQuery("#nf-field-353").val();
		jQuery( "#nf-field-404" ).val( newValue2 ).trigger( "change" );
	};
	
	function change_standard() {
		var newValue1 = jQuery("#nf-field-349").val();
		jQuery( "#nf-field-366" ).val( newValue1 ).trigger( "change" );
		var newValue2 = jQuery("#nf-field-350").val();
		jQuery( "#nf-field-368" ).val( newValue2 ).trigger( "change" );
	};
	
	function change_premium() {
		var newValue1 = jQuery("#nf-field-355").val();
		jQuery( "#nf-field-438" ).val( newValue1 ).trigger( "change" );
		var newValue2 = jQuery("#nf-field-356").val();
		jQuery( "#nf-field-440" ).val( newValue2 ).trigger( "change" );
	};
	
	jQuery(document).ready(function(){
        myVarEko = setInterval("change_eko()", 500);
		myVarStandard = setInterval("change_standard()", 500);
		myVarPremium = setInterval("change_premium()", 500);
	});
	
    
	jQuery( ".btn-standard" ).click(function() {
	 clearInterval(myVarStandard);
	jQuery("#pakiety").toggleClass("ukryte");
	jQuery("#standard-form").show( "slow" );
	
	});
    
	jQuery(".btn-premium").click(function(){
		clearInterval(myVarPremium);
		jQuery("#pakiety").toggleClass("ukryte");
		jQuery("#premium-form").show( "slow" );
    
	});
	jQuery(".btn-eko").click(function(){
		clearInterval(myVarEko);
		jQuery("#pakiety").toggleClass("ukryte");
		jQuery("#eko-form").show( "slow" );
	});


</script>';
}
add_action('wp_footer', 'typed_init');
/*
add_action('wp_enqueue_scripts', 'wpcf7_recaptcha_no_refill', 15, 0);
function wpcf7_recaptcha_no_refill() {
  $service = WPCF7_RECAPTCHA::get_instance();
	if ( ! $service->is_active() ) {
		return;
	}
  wp_add_inline_script('contact-form-7', 'wpcf7.cached = 0;', 'before' );
}*/