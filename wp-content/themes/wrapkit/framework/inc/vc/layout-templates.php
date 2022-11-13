<?php
/**
 * Visual Composer Predefined Layouts
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

add_filter( 'vc_load_default_templates', 'wrapkit_page_title' );

if ( ! function_exists( 'wrapkit_page_title' ) ) {
	function wrapkit_page_title( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Page Title', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^7914|url^https://wrapkitwp.com/wp-content/uploads/2018/03/banner-bg2.jpg|caption^null|alt^null|title^banner-bg-min|description^null"][vc_column][ultimate_spacer height="170"][ultimate_heading main_heading="PAGE TITLE" main_heading_color="#ffffff" heading_tag="h1" sub_heading_color="rgba(255,255,255,0.8)" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:700" main_heading_style="font-weight:700;" main_heading_line_height="desktop:40px;" main_heading_margin="margin-bottom:15px;" sub_heading_line_height="desktop:24px;" main_heading_font_size="desktop:40px;"]Lorem ipsum dolor sit amet, consectetur adipiscing eli.[/ultimate_heading][ultimate_spacer height="100"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Banner 1

add_filter( 'vc_load_default_templates', 'wrapkit_banner1' );

if ( ! function_exists( 'wrapkit_banner1' ) ) {
	function wrapkit_banner1( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Banner 1 ', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][vc_row_inner content_placement="middle"][vc_column_inner width="7/12"][sd_aos_animation animation="fade-right"][ultimate_fancytext fancytext_prefix="I’m Angelina Doe, Web Designer &amp; Good at " fancytext_align="left" strings_textspeed="35" strings_backspeed="0" typewriter_cursor="off" sufpref_color="#3e4555" fancytext_tag="h1" fancytext_strings="Photoshop
HTML5
CSS3
Angular CLI
Node JS" strings_font_family="font_family:Montserrat|font_call:Montserrat|variant:700" strings_font_style="font-weight:700;" strings_font_size="desktop:36px;" strings_line_height="desktop:56px;" fancytext_color="#2cdd9b" prefsuf_font_family="font_family:Montserrat|font_call:Montserrat|variant:700" prefsuf_font_style="font-weight:700;" prefix_suffix_font_size="desktop:36px;" prefix_suffix_line_height="desktop:56px;" css_fancy_design=".vc_custom_1520460879931{margin-bottom: 0px !important;}"][sd_wrapkit_button text="Checout My Work" arrow_icon="yes" btn_align="left" custom_class="" color="#ffffff" hover="#ffffff" bg_type="gradient" grad_col_1="#2cdd9b" grad_col_2="#1dc8cc" link="url:%23|||" css=".vc_custom_1520460844296{margin-top: 30px !important;}"][/sd_aos_animation][/vc_column_inner][vc_column_inner width="5/12"][ultimate_spacer height="40"][sd_aos_animation animation="fade-up"][vc_single_image source="external_link" external_img_size="full" alignment="center" css_animation="none" css=".vc_custom_1522088700216{margin-bottom: 0px !important;}" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/img1-min-1.png"][/sd_aos_animation][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Banner 2

add_filter( 'vc_load_default_templates', 'wrapkit_banner2' );

if ( ! function_exists( 'wrapkit_banner2' ) ) {
	function wrapkit_banner2( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Banner 2 ', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row equal_height="yes" content_placement="middle"][vc_column][ultimate_spacer height="90"][vc_row_inner content_placement="middle"][vc_column_inner width="5/12"][sd_aos_animation animation="fade-right"][ultimate_fancytext fancytext_prefix=" " fancytext_align="left" strings_textspeed="35" strings_backspeed="0" typewriter_cursor="off" sufpref_color="#3e4555" fancytext_tag="h1" fancytext_strings="Angular<br /><br />
Creative<br /><br />
jQuery<br /><br />
Design" strings_font_family="font_family:Montserrat|font_call:Montserrat|variant:800" strings_font_style="font-weight:800;" strings_font_size="desktop:90px;" strings_line_height="desktop:90px;" fancytext_color="#3e4555" prefsuf_font_family="font_family:Montserrat|font_call:Montserrat|variant:800" prefsuf_font_style="font-weight:800;" prefix_suffix_font_size="desktop:90px;" prefix_suffix_line_height="desktop:90px;" css_fancy_design=".vc_custom_1520462103728{margin-bottom: 0px !important;}"][ultimate_heading heading_tag="div" sub_heading_color="#3e4555" alignment="left" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:800" sub_heading_style="font-weight:800;" sub_heading_font_size="desktop:90px;" sub_heading_line_height="desktop:90px;" sub_heading_margin="margin-bottom:30px;"]Done<span class="text-megna">.</span>[/ultimate_heading][vc_column_text]I’m John Doe, a Web &amp; Mobile App Designer, Specialized in Website Design, Illustration &amp; Mobile Application Work.[/vc_column_text][sd_wrapkit_button text="Hire Me" arrow_icon="yes" btn_align="inline" custom_class="" color="#ffffff" hover="#ffffff" bg_type="gradient" grad_col_1="#2cdd9b" grad_col_2="#1dc8cc" link="url:%23|||"][ult_buttons btn_title="Check my work" btn_link="url:%23|||" btn_align="ubtn-inline" btn_title_color="#263238" btn_bg_color="rgba(255,255,255,0.01)" btn_bg_color_hover="rgba(255,255,255,0.01)" btn_title_color_hover="#2cdd9b" icon_size="32" btn_icon_pos="ubtn-sep-icon-at-left" css_adv_btn=".vc_custom_1520462455238{margin-bottom: 0px !important;}" btn_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" btn_font_style="font-weight:500;" btn_font_size="desktop:16px;" btn_line_height="desktop:20px;"][/sd_aos_animation][/vc_column_inner][vc_column_inner width="7/12"][sd_aos_animation animation="fade-up"][vc_single_image source="external_link" external_img_size="full" alignment="center" css=".vc_custom_1522088844940{margin-bottom: 0px !important;}" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/img1-min-6.jpg"][/sd_aos_animation][/vc_column_inner][/vc_row_inner][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Banner 3

add_filter( 'vc_load_default_templates', 'wrapkit_banner3' );

if ( ! function_exists( 'wrapkit_banner3' ) ) {
	function wrapkit_banner3( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Banner 3 ', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="100"][vc_row_inner el_class="row justify-content-center "][vc_column_inner width="2/3"][sd_aos_animation animation="fade-right"][ultimate_fancytext fancytext_prefix="I’m Johanthan Doe, an Entreprenuer, Designer & Front-end Developer, Making " strings_textspeed="35" strings_backspeed="0" typewriter_cursor="off" sufpref_color="#3e4555" fancytext_strings="Web Applications<br />
Web Designing<br />
Web Development<br />
Photoshop" strings_font_family="font_family:Montserrat|font_call:Montserrat|variant:700" strings_font_style="font-weight:700;" strings_font_size="desktop:36px;" strings_line_height="desktop:50px;" fancytext_color="#2cdd9b" prefsuf_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" prefsuf_font_style="font-weight:500;" prefix_suffix_font_size="desktop:36px;" prefix_suffix_line_height="desktop:50px;" css_fancy_design=".vc_custom_1520462825745{margin-bottom: 0px !important;}"][sd_wrapkit_button text="Checkout My Work" arrow_icon="yes" btn_align="center" custom_class="" color="#ffffff" hover="#ffffff" bg_type="gradient" grad_col_1="#2cdd9b" grad_col_2="#1dc8cc" link="url:%23|||" css=".vc_custom_1520462899044{margin-top: 30px !important;}"][/sd_aos_animation][/vc_column_inner][/vc_row_inner][ultimate_spacer height="100"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Banner 4

add_filter( 'vc_load_default_templates', 'wrapkit_banner4' );

if ( ! function_exists( 'wrapkit_banner4' ) ) {
	function wrapkit_banner4( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Banner 4 ', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="30" height_on_mob_landscape="0" height_on_mob="0"][vc_row_inner][vc_column_inner width="5/12" css=".vc_custom_1517357559688{margin-bottom: -116px !important;padding-top: 1px !important;}" offset="vc_hidden-sm vc_hidden-xs"][sd_aos_animation animation="fade-up"][vc_single_image source="external_link" alignment="center" css=".vc_custom_1520463407275{margin-bottom: 0px !important;}" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/img1-min.png"][/sd_aos_animation][/vc_column_inner][vc_column_inner width="1/12"][/vc_column_inner][vc_column_inner width="1/2"][ultimate_spacer height="100" height_on_mob_landscape="50" height_on_mob="50"][sd_aos_animation animation="fade-right"][ultimate_heading main_heading="I’m Angelina Flintoff " heading_tag="h1" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" main_heading_style="font-weight:300;" main_heading_line_height="desktop:50px;"][/ultimate_heading][ultimate_fancytext fancytext_prefix="Marketing &amp; " fancytext_align="left" strings_textspeed="35" strings_backspeed="0" strings_startdelay="500" typewriter_cursor="off" sufpref_color="#3e4555" fancytext_tag="h1" fancytext_strings="SEO Expert</p>
<p>HTML5 Expert</p>
<p>CSS3 Expert" strings_font_family="font_family:Montserrat|font_call:Montserrat|variant:700" strings_font_style="font-weight:700;" strings_font_size="desktop:36px;" strings_line_height="desktop:50px;" fancytext_color="#188ef4" prefsuf_font_family="font_family:Montserrat|font_call:Montserrat|variant:700" prefsuf_font_style="font-weight:700;" prefix_suffix_font_size="desktop:36px;" prefix_suffix_line_height="desktop:50px;"][ult_buttons btn_title="Checkout My Work" btn_link="url:%23|||" btn_size="ubtn-custom" btn_padding_left="45" btn_padding_top="15" btn_title_color="#188ef4" btn_bg_color="#ffffff" btn_hover="ubtn-fade-bg" btn_bg_color_hover="#188ef4" btn_title_color_hover="#ffffff" icon="Defaults-arrow-right" icon_size="16" icon_color="#ffffff" btn_icon_pos="ubtn-sep-icon-right-rev" btn_border_style="solid" btn_color_border="#188ef4" btn_color_border_hover="#188ef4" btn_border_size="1" btn_radius="4" btn_shadow="shd-bottom" btn_shadow_color="rgba(2,0,0,0.1)" btn_shadow_color_hover="rgba(2,0,0,0.1)" btn_shadow_size="3" btn_font_size="desktop:16px;"][/sd_aos_animation][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row bg_type="bg_color" bg_color_value="#188ef4"][vc_column][ultimate_spacer height="25"][vc_row_inner][vc_column_inner width="1/2"][/vc_column_inner][vc_column_inner width="1/2"][bsf-info-box icon="Defaults-play-circle" icon_size="56" icon_color="#ffffff" title="10 Marketing Tips for your Project " read_more="box" link="url:%23|||" pos="left" el_class="sd-aio-m0 modal-personal" heading_tag="h4" title_font="font_family:Montserrat|font_call:Montserrat|variant:700" title_font_style="font-weight:700;" desc_font="font_family:Montserrat|font_call:Montserrat|variant:300" desc_font_style="font-weight:300;" title_font_line_height="desktop:26px;" title_font_color="#ffffff" desc_font_size="desktop:21px;" desc_font_line_height="desktop:26px;" desc_font_color="#ffffff" css_info_box=".vc_custom_1517357093348{margin-bottom: 0px !important;}"]05:30 By Angelina Flintoff[/bsf-info-box][ultimate_modal modal_contain="ult-youtube" modal_on="custom-selector" modal_on_selector=".modal-personal" modal_size="block" overlay_bg_opacity="80" img_size="80"]<br />
[embed]https://www.youtube.com/watch?v=cysIFx58Sa4[/embed]<br />
[/ultimate_modal][/vc_column_inner][/vc_row_inner][ultimate_spacer height="25"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Banner 5

add_filter( 'vc_load_default_templates', 'wrapkit_banner5' );

if ( ! function_exists( 'wrapkit_banner5' ) ) {
	function wrapkit_banner5( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Banner 5 ', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^12|url^https://wrapkitwp.com/wp-content/uploads/2018/03/creative-hero-min.jpg|caption^null|alt^null|title^creative-hero-min|description^null" bg_image_repeat="no-repeat" bg_image_size="initial" bg_image_posiiton="top center"][vc_column][ultimate_spacer height="190" height_on_mob_landscape="50" height_on_mob="50"][vc_row_inner el_class="row justify-content-center "][vc_column_inner width="2/3"][sd_aos_animation animation="fade-right"][ultimate_heading main_heading="Your Sales and Expenses at One Place" main_heading_color="#ffffff" heading_tag="h1" sub_heading_color="rgba(255,255,255,0.8)" main_heading_margin="margin-bottom:15px;" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" sub_heading_line_height="desktop:27px;"]Best Partner to Track your Daily Expenses and Earnings, Very Easy to Install &amp; Use. Grab It Now as its FREE for 2 Months.[/ultimate_heading][ultimate_spacer height="36"][ult_content_box box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" el_class="text-center" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|"][ult_buttons btn_title="Request a Demo" btn_link="url:%23|||" btn_align="ubtn-inline" btn_size="ubtn-custom" btn_padding_left="45" btn_padding_top="15" btn_title_color="#263238" btn_bg_color="#ffffff" btn_hover="ubtn-fade-bg" btn_bg_color_hover="#263238" btn_title_color_hover="#ffffff" icon_size="32" btn_icon_pos="ubtn-sep-icon-at-left" btn_border_style="solid" btn_border_size="0" btn_radius="60" el_class="sd-light-shadow-btn" btn_font_size="desktop:16px;" btn_line_height="desktop:20px;" css_adv_btn=".vc_custom_1516311403322{margin-right: 20px !important;margin-bottom: 10px !important;}"][ult_buttons btn_title="Take a Tour" btn_link="url:%23|||" btn_align="ubtn-inline" btn_size="ubtn-custom" btn_padding_left="45" btn_padding_top="15" btn_title_color="#ffffff" btn_bg_color="rgba(255,255,255,0.01)" btn_hover="ubtn-fade-bg" btn_bg_color_hover="#ffffff" btn_title_color_hover="#263238" icon_size="32" btn_icon_pos="ubtn-sep-icon-at-left" btn_border_style="solid" btn_color_border="#ffffff" btn_border_size="1" btn_radius="60" el_class="sd-light-shadow-btn" btn_font_size="desktop:16px;" btn_line_height="desktop:20px;" css_adv_btn=".vc_custom_1516311006233{margin-bottom: 0px !important;}"][/ult_content_box][/sd_aos_animation][/vc_column_inner][/vc_row_inner][ultimate_spacer height="790"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Banner 6

add_filter( 'vc_load_default_templates', 'wrapkit_banner6' );

if ( ! function_exists( 'wrapkit_banner6' ) ) {
	function wrapkit_banner6( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Banner 6', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^8010|url^https://wrapkitwp.com/wp-content/uploads/2018/03/img2-min.png|caption^null|alt^null|title^img2-min|description^null" bg_image_repeat="no-repeat" bg_image_size="initial" bg_image_posiiton="bottom center" el_class="bg-danger-gradiant"][vc_column][ultimate_spacer height="80"][vc_row_inner content_placement="bottom" el_class="row justify-content-center"][vc_column_inner width="2/3"][sd_aos_animation animation="fade-right"][vc_column_text css=".vc_custom_1520463966150{margin-bottom: 20px !important;}"]<span class="badge badge-warning p-10">Money Making</span>[/vc_column_text][ultimate_heading main_heading="Powerful Solution for People who believe in Quality and Ready to Rock!" main_heading_color="#ffffff" heading_tag="h1" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:700" main_heading_style="font-weight:700;" main_heading_line_height="desktop:40px;"][/ultimate_heading][/sd_aos_animation][ultimate_spacer height="40"][sd_aos_animation animation="fade-up"][vc_single_image source="external_link" alignment="center" onclick="custom_link" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/img1-min-1.jpg" css=".vc_custom_1520464378426{margin-bottom: 0px !important;}" el_class="sd-modal" link="#"][/sd_aos_animation][ultimate_modal modal_contain="ult-youtube" modal_on="custom-selector" modal_on_selector=".sd-modal" modal_size="block" modal_style="overlay-zoomin" overlay_bg_opacity="80" img_size="80"]
			[embed]https://www.youtube.com/watch?v=cysIFx58Sa4[/embed]
			[/ultimate_modal][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Banner 7

add_filter( 'vc_load_default_templates', 'wrapkit_banner7' );

if ( ! function_exists( 'wrapkit_banner7' ) ) {
	function wrapkit_banner7( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Banner 7', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^8011|url^https://wrapkitwp.com/wp-content/uploads/2018/03/img1-min-2.jpg|caption^null|alt^null|title^img1-min|description^null" bg_image_repeat="no-repeat" bg_image_posiiton="top center" el_class="bg-danger-gradiant"][vc_column][ultimate_spacer height="300"][vc_row_inner content_placement="bottom" el_class="row justify-content-center"][vc_column_inner width="2/3"][sd_aos_animation animation="fade-right"][ultimate_fancytext strings_textspeed="35" strings_backspeed="0" typewriter_cursor="off" fancytext_strings="WRAPKIT<br />
COLOR<br />
DESIGN" strings_font_family="font_family:Montserrat|font_call:Montserrat|variant:800" strings_font_style="font-weight:800;" strings_font_size="desktop:122px;tablet:80px;tablet_portrait:60px;mobile_landscape:40px;mobile:40px;" strings_line_height="desktop:130px;tablet:90px;tablet_portrait:70px;mobile_landscape:50px;mobile:50px;" fancytext_color="#ffffff" css_fancy_design=".vc_custom_1520464951763{margin-bottom: 20px !important;}"][ultimate_heading main_heading="Awesome Extra Ordinary Flexibility" main_heading_color="#ffffff" heading_tag="div" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:26px;" main_heading_font_size="desktop:21px;" margin_design_tab_text="" main_heading_margin="margin-bottom:30px;"][/ultimate_heading][ult_content_box box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" el_class="text-center" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|"][sd_wrapkit_button text="Products" arrow_icon="yes" btn_align="inline" custom_class="sd-br-60" color="#ffffff" hover="#ffffff" bg_type="gradient" grad_col_1="#ff4d7e" grad_col_2="#ff6a5b" link="url:%23|||" css=".vc_custom_1520465639694{margin-right: 20px !important;}"][ult_buttons btn_title="Intro" btn_link="url:%23|||" btn_align="ubtn-inline" btn_size="ubtn-custom" btn_width="157" btn_height="52" btn_title_color="#ffffff" btn_bg_color="rgba(224,224,224,0.01)" btn_hover="ubtn-fade-bg" btn_bg_color_hover="#ffffff" btn_title_color_hover="#263238" icon="Defaults-play" icon_size="16" icon_color="#ffffff" btn_icon_pos="ubtn-sep-icon-at-right" btn_border_style="solid" btn_color_border="#ffffff" btn_border_size="1" btn_radius="60" css_adv_btn=".vc_custom_1520465367427{margin-bottom: 0px !important;}" btn_font_family="font_family:Montserrat|font_call:Montserrat" btn_font_size="desktop:16px;" btn_line_height="desktop:20px;" el_class="sd-modal"][/ult_content_box][/sd_aos_animation][ultimate_modal modal_contain="ult-youtube" modal_on="custom-selector" modal_on_selector=".sd-modal" modal_size="block" modal_style="overlay-zoomin" overlay_bg_opacity="80" img_size="80"]
[embed]https://www.youtube.com/watch?v=cysIFx58Sa4[/embed]
[/ultimate_modal][/vc_column_inner][/vc_row_inner][ultimate_spacer height="300"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Banner 8

add_filter( 'vc_load_default_templates', 'wrapkit_banner8' );

if ( ! function_exists( 'wrapkit_banner8' ) ) {
	function wrapkit_banner8( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Banner 8', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^8012|url^https://wrapkitwp.com/wp-content/uploads/2018/03/img1-min-3.jpg|caption^null|alt^null|title^img1-min|description^null" bg_image_repeat="no-repeat" bg_image_posiiton="bottom center"][vc_column][ultimate_spacer height="80"][vc_row_inner el_class="row justify-content-center "][vc_column_inner width="2/3"][ultimate_fancytext strings_textspeed="35" strings_backspeed="0" typewriter_cursor="off" fancytext_strings="Because<br />
WrapKit<br />
Rules" strings_font_family="font_family:Montserrat|font_call:Montserrat|variant:700" strings_font_style="font-weight:700;" strings_font_size="desktop:65px;" strings_line_height="desktop:65px;" fancytext_color="#ffffff" css_fancy_design=".vc_custom_1520466326984{margin-bottom: 15px !important;}"][ultimate_heading main_heading="Awesome Extra Ordinary Flexibility" main_heading_color="#ffffff" heading_tag="h4" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" main_heading_style="font-weight:300;" main_heading_line_height="desktop:26px;" main_heading_margin="margin-bottom:20px;"][/ultimate_heading][sd_wrapkit_button text="Features" arrow_icon="yes" btn_align="center" custom_class="sd-br-60" color="#ffffff" hover="#ffffff" bg_type="gradient" grad_col_1="#ff4d7e" grad_col_2="#ff6a5b" link="url:%23|||"][ultimate_spacer height="40"][sd_aos_animation animation="fade-up"][vc_single_image source="external_link" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/banner8-min.png" css=".vc_custom_1520466226431{margin-bottom: 0px !important;}"][/sd_aos_animation][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Banner 9

add_filter( 'vc_load_default_templates', 'wrapkit_banner9' );

if ( ! function_exists( 'wrapkit_banner9' ) ) {
	function wrapkit_banner9( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Banner 9', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^8016|url^https://wrapkitwp.com/wp-content/uploads/2018/03/img1-min-4.jpg|caption^null|alt^null|title^img1-min|description^null"][vc_column][ultimate_spacer height="200"][vc_row_inner el_class="row justify-content-center "][vc_column_inner width="1/2"][sd_aos_animation animation="fade-down"][vc_column_text css=".vc_custom_1520467032776{margin-bottom: 20px !important;}"]
<p style="text-align: center;"><span class="label label-rounded label-inverse">Creating Brands</span></p>
[/vc_column_text][ultimate_heading main_heading="ONE BILLON PEOPLE USE FACEBOOK" main_heading_color="#ffffff" heading_tag="h1" sub_heading_color="rgba(255,255,255,0.8)" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:700" main_heading_style="font-weight:700;" main_heading_font_size="desktop:48px;" main_heading_line_height="desktop:50px;" margin_design_tab_text="" main_heading_margin="margin-bottom:15px;" sub_heading_margin="margin-bottom:30px;" sub_heading_line_height="desktop:24px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat"]Pellentesque vehicula eros a dui pretium ornare. Phasellus congue vel quam nec luctus.In accumsan at eros in dignissim. Cras sodales nisi nonn accumsan.[/ultimate_heading][sd_wrapkit_button text="Do you Need Help?" arrow_icon="yes" btn_align="center" custom_class="sd-br-60" color="#ffffff" hover="#ffffff" bg_type="border" bg_col="#ffffff" bg_hover_color="#ffffff" link="url:%23|||"][/sd_aos_animation][/vc_column_inner][/vc_row_inner][ultimate_spacer height="200"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// CTA 1

add_filter( 'vc_load_default_templates', 'wrapkit_cta1' );

if ( ! function_exists( 'wrapkit_cta1' ) ) {
	function wrapkit_cta1( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Call to action 1', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^417|url^https://wrapkitwp.com/wp-content/uploads/2018/03/1-min.jpg|caption^null|alt^null|title^1-min|description^null" bg_image_repeat="no-repeat" bg_img_attach="fixed" bg_image_posiiton="center top"][vc_column][ultimate_spacer height="90"][vc_row_inner el_class="row justify-content-center"][vc_column_inner width="7/12"][ultimate_heading main_heading="Become a Volunteer" main_heading_color="#ffffff" sub_heading_color="rgba(255,255,255,0.8)" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" margin_design_tab_text="" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"]Lorem ipsum dolor sit amet, consectetur adipiscelit. Nam malesu dolor sit amet, consectetur adipiscelit. consectetur adipiscelit. Nam malesu dolor.[/ultimate_heading][sd_wrapkit_button text="JOIN US NOW" arrow_icon="yes" btn_align="center" custom_class="" color="#ffffff" hover="#ffffff" bg_type="gradient" grad_col_1="#ff4d7e" grad_col_2="#ff6a5b" link="url:%23|||" css=".vc_custom_1521668168830{margin-top: 35px !important;}"][/vc_column_inner][/vc_row_inner][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// CTA 2

add_filter( 'vc_load_default_templates', 'wrapkit_cta2' );

if ( ! function_exists( 'wrapkit_cta2' ) ) {
	function wrapkit_cta2( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Call to action 2', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="90"][vc_row_inner el_class="row justify-content-center"][vc_column_inner width="7/12"][ultimate_heading main_heading="Are you happy with what we offer? Grab your wrapkit copy now!" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" main_heading_style="font-weight:300;" main_heading_line_height="desktop:36px;" margin_design_tab_text="" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"]150+ Ready to Use Sections, 25+ Pre-Build Demos, 500+ UI Elements, 2000+ Premium Plugins and Font Icons worth of $200+ and lots more[/ultimate_heading][ult_content_box box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" el_class="text-center" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|"][ultimate_spacer height="60"][sd_wrapkit_button text="Buy WrapKit" arrow_icon="" btn_align="inline" custom_class="btn-rounded" color="#ffffff" hover="#ffffff" bg_type="gradient" grad_col_1="#2cdd9b" grad_col_2="#1dc8cc" link="url:%23|||" css=".vc_custom_1521669396150{margin-right: 10px !important;}"][ult_buttons btn_title="Live Preview" btn_link="url:%23|||" btn_align="ubtn-inline" btn_size="ubtn-custom" btn_width="191" btn_height="52" btn_title_color="#3e4555" btn_bg_color="#ffffff" btn_hover="ubtn-fade-bg" btn_bg_color_hover="#3e4555" btn_title_color_hover="#ffffff" icon_size="32" btn_icon_pos="ubtn-sep-icon-at-left" btn_border_style="solid" btn_color_border="#3e4555" btn_color_border_hover="#3e4555" btn_border_size="1" btn_radius="60" btn_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" btn_font_style="font-weight:500;" btn_font_size="desktop:16px;" btn_line_height="desktop:24px;"][/ult_content_box][/vc_column_inner][/vc_row_inner][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// CTA 3

add_filter( 'vc_load_default_templates', 'wrapkit_cta3' );

if ( ! function_exists( 'wrapkit_cta3' ) ) {
	function wrapkit_cta3( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Call to action 3', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="bg_color" bg_color_value="#f4f8fa"][vc_column][ultimate_spacer height="40"][vc_row_inner][vc_column_inner width="2/3"][ultimate_heading main_heading="We are leading Manufacturing and Exporting company" heading_tag="h3" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:400" main_heading_style="font-weight:400;" main_heading_line_height="desktop:30px;" margin_design_tab_text="" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:regular" sub_heading_style="font-weight:normal;font-style:normal;" sub_heading_line_height="desktop:24px;" main_heading_margin="margin-bottom:10px;"]You will feel great using our quality products and services[/ultimate_heading][/vc_column_inner][vc_column_inner width="1/3"][sd_wrapkit_button text="Contact Us" arrow_icon="" btn_align="center" custom_class="" color="#ffffff" hover="#ffffff" bg_type="gradient" grad_col_1="#188ef4" grad_col_2="#316ce8" link="url:%23|||"][/vc_column_inner][/vc_row_inner][ultimate_spacer height="40"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// CTA 4

add_filter( 'vc_load_default_templates', 'wrapkit_cta4' );

if ( ! function_exists( 'wrapkit_cta4' ) ) {
	function wrapkit_cta4( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Call to action 4', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^434|url^https://wrapkitwp.com/wp-content/uploads/2018/03/2-min-1.jpg|caption^null|alt^null|title^2-min|description^null"][vc_column][ultimate_spacer height="40"][vc_row_inner content_placement="middle"][vc_column_inner width="2/3"][ultimate_heading main_heading="Are you looking for an Online Appointment?" main_heading_color="#ffffff" heading_tag="h3" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:30px;" margin_design_tab_text="" sub_heading_font_family="font_family:|font_call:" sub_heading_style="font-weight:normal;font-style:normal;"][/ultimate_heading][/vc_column_inner][vc_column_inner width="1/3"][sd_wrapkit_button text="Book an Appointment" arrow_icon="" btn_align="center" custom_class="" color="#3e4555" hover="#3e4555" bg_type="normal" bg_col="#ffffff" bg_hover_color="#ffffff" link="url:%23|||"][/vc_column_inner][/vc_row_inner][ultimate_spacer height="40"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// CTA 5

add_filter( 'vc_load_default_templates', 'wrapkit_cta5' );

if ( ! function_exists( 'wrapkit_cta5' ) ) {
	function wrapkit_cta5( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Call to action 5', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="90"][vc_row_inner el_class="row justify-content-center"][vc_column_inner width="7/12"][ultimate_heading main_heading="Do We Have You Convinced?" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"][/ultimate_heading][ultimate_heading main_heading="Grab WrapKit Now!" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"]150+ Ready to Use Sections, 25+ Pre-Build Demos, 500+ UI Elements, 2000+ Premium Plugins and Font Icons worth of $200+ and lots more[/ultimate_heading][sd_wrapkit_button text="Buy WrapKit Now" arrow_icon="" btn_align="center" custom_class="" color="#ffffff" hover="#ffffff" bg_type="normal" bg_col="#ff4d7e" bg_hover_color="#d73e6b" link="url:%23|||" css=".vc_custom_1521670304374{margin-top: 30px !important;}"][/vc_column_inner][/vc_row_inner][ultimate_spacer height="30"][vc_row_inner][vc_column_inner][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/vectorecity-min.jpg" css=".vc_custom_1521670382856{margin-bottom: 0px !important;}"][/vc_column_inner][/vc_row_inner][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// CTA 6

add_filter( 'vc_load_default_templates', 'wrapkit_cta6' );

if ( ! function_exists( 'wrapkit_cta6' ) ) {
	function wrapkit_cta6( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Call to action 6', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^451|url^https://wrapkitwp.com/wp-content/uploads/2018/03/6-min.jpg|caption^null|alt^null|title^6-min|description^null" bg_image_repeat="no-repeat" bg_image_size="initial" bg_image_posiiton="center center"][vc_column][ultimate_spacer height="300"][vc_row_inner el_class="row justify-content-center"][vc_column_inner width="5/12"][sd_aos_animation animation="flip-left"][ult_content_box box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding-top:60px;padding-right:40px;padding-bottom:60px;padding-left:40px;" el_class="bg-danger-gradiant" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" border="border-style:solid;|border-width:0px;border-radius:4px;"][ultimate_heading main_heading="Make your Reservation for Delicious Food" main_heading_color="#ffffff" heading_tag="h3" sub_heading_color="rgba(255,255,255,0.5)" main_heading_font_size="desktop:24px;" main_heading_line_height="desktop:30px;" margin_design_tab_text="" main_heading_margin="margin-bottom:15px;" sub_heading_line_height="desktop:24px;" el_class="sd-calafia" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" sub_heading_style="font-weight:500;"]You can relay on our amazing features list and also our customer services will be great experience for you without doubt[/ultimate_heading][sd_wrapkit_button text="Reserve Your Table" arrow_icon="yes" btn_align="center" custom_class="btn-rounded" color="#ff4d7e" hover="#bd2130" bg_type="normal" bg_col="#ffffff" bg_hover_color="#ffffff" link="url:%23|||" css=".vc_custom_1521670888886{margin-top: 30px !important;}"][/ult_content_box][/sd_aos_animation][/vc_column_inner][/vc_row_inner][ultimate_spacer height="300"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// CTA 7

add_filter( 'vc_load_default_templates', 'wrapkit_cta7' );

if ( ! function_exists( 'wrapkit_cta7' ) ) {
	function wrapkit_cta7( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Call to action 7', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^455|url^https://wrapkitwp.com/wp-content/uploads/2018/03/4-min.jpg|caption^null|alt^null|title^4-min|description^null" bg_image_repeat="no-repeat" bg_image_size="initial" bg_image_posiiton="top center" css=".vc_custom_1521671479126{background-color: #1fb1e4 !important;}"][vc_column][ultimate_spacer height="90"][vc_row_inner el_class="row justify-content-center"][vc_column_inner width="7/12"][ultimate_heading main_heading="The fast and easiest way to" main_heading_color="#ffffff" heading_tag="h3" sub_heading_color="#ffffff" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_font_size="desktop:16px;" main_heading_line_height="desktop:24px;" margin_design_tab_text="" main_heading_margin="margin-bottom:10px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" sub_heading_style="font-weight:500;" sub_heading_font_size="desktop:36px;" sub_heading_line_height="desktop:40px;"]SHOWCASE YOUR PHOTOS[/ultimate_heading][sd_wrapkit_button text="Get Free Access" arrow_icon="" btn_align="center" custom_class="btn-rounded" color="#343a40" hover="#343a40" bg_type="normal" bg_col="#ffffff" bg_hover_color="#ffffff" link="url:%23|||" css=".vc_custom_1521671558390{margin-top: 40px !important;}"][/vc_column_inner][/vc_row_inner][ultimate_spacer height="280"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// CTA 8

add_filter( 'vc_load_default_templates', 'wrapkit_cta8' );

if ( ! function_exists( 'wrapkit_cta8' ) ) {
	function wrapkit_cta8( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Call to action 8', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="image" parallax_style="vcpb-default" bg_image_new="id^463|url^https://wrapkitwp.com/wp-content/uploads/2018/03/5-min.jpg|caption^null|alt^null|title^5-min|description^null" bg_image_repeat="no-repeat" bg_image_size="initial" bg_image_posiiton="center center"][vc_column][ultimate_spacer height="170"][vc_row_inner el_class="row justify-content-center"][vc_column_inner width="5/12"][sd_aos_animation animation="flip-left"][ult_content_box box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding-top:60px;padding-right:40px;padding-bottom:60px;padding-left:40px;" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" border="border-style:solid;|border-width:0px;border-radius:4px;" bg_color="#ffffff"][ultimate_heading main_heading="Brilliant Design and Unlimited Features to Boost your Site" heading_tag="h3" main_heading_line_height="desktop:30px;" main_heading_margin="margin-bottom:15px;" sub_heading_line_height="desktop:24px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" sub_heading_style="font-weight:500;" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" margin_design_tab_text=""]You can relay on our amazing features list and also our customer services will be great experience for you without doubt[/ultimate_heading][sd_wrapkit_button text="View Other Features" arrow_icon="yes" btn_align="center" custom_class="" color="" hover="" bg_type="gradient" grad_col_1="#188ef4" grad_col_2="#316ce8" link="url:%23|||" css=".vc_custom_1521671910258{margin-top: 30px !important;}"][/ult_content_box][/sd_aos_animation][/vc_column_inner][/vc_row_inner][ultimate_spacer height="200"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// CTA 9

add_filter( 'vc_load_default_templates', 'wrapkit_cta9' );

if ( ! function_exists( 'wrapkit_cta9' ) ) {
	function wrapkit_cta9( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Call to action 9', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="90"][vc_row_inner el_class="row justify-content-center"][vc_column_inner width="7/12"][ultimate_heading main_heading="Do We Have You Convinced?" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"][/ultimate_heading][ultimate_heading main_heading="Grab WrapKit Now!" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"]150+ Ready to Use Sections, 25+ Pre-Build Demos, 500+ UI Elements, 2000+ Premium Plugins and Font Icons worth of $200+ and lots more[/ultimate_heading][sd_wrapkit_button text="Buy WrapKit" arrow_icon="yes" btn_align="center" custom_class="" color="#ffffff" hover="#ffffff" bg_type="gradient" grad_col_1="#188ef4" grad_col_2="#316ce8" link="url:%23|||" css=".vc_custom_1520273818370{margin-top: 40px !important;}"][/vc_column_inner][/vc_row_inner][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Pricing Table 1

add_filter( 'vc_load_default_templates', 'wrapkit_pricing1' );

if ( ! function_exists( 'wrapkit_pricing1' ) ) {
	function wrapkit_pricing1( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Pricing Table 1', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="90"][ultimate_heading main_heading="Simple Pricing to make your Work Effective" main_heading_line_height="desktop:36px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:regular" sub_heading_style="font-weight:normal;font-style:normal;" sub_heading_line_height="desktop:24px;"]We offer 100% satisafaction and Money back Guarantee[/ultimate_heading][ultimate_spacer height="40"][sd_pricing_table style="style1" nr_columns_4="3" show_switch="yes" monthly_text="Monthly" yearly_text="Yearly"][sd_pricing_column col_style="style1" column_title="BASIC" column_desc="For Team of 3-5 Members" column_price="28" currency="$" yearly_price="240" column_price_desc="/mo" column_yr_price_desc="/yr" show_btn="yes" column_btn_text="Choose Plan" column_animation="fade-right" btn_color="#ffffff" btn_type="gradient" btn_bg1="#1dc8cc" btn_bg2="#2cdd9b" btn_bg1_hover="#2cdd9b" btn_bg2_hover="#1dc8cc" border_style="none" column_btn_link="url:%23|||"]<br />
<ul class="list-inline">
<li>Perfect of Small Team</li>
<li>Unlimited Invoices</li>
<li>Project Management</li>
<li>&nbsp;</li>
<li>&nbsp;</li>
<li>&nbsp;</li>
</ul>
[/sd_pricing_column][sd_pricing_column col_style="style1" column_title="INTERMEDIATE" column_desc="For Team of 5-10 Members" column_price="39" currency="$" yearly_price="400" column_price_desc="/mo" column_yr_price_desc="/yr" col_featured="yes" featured_txt="Popular" show_btn="yes" column_btn_text="Choose Plan" column_animation="fade-up" btn_color="#ffffff" btn_type="gradient" btn_bg1="#ff4d7e" btn_bg2="#ff6a5b" btn_bg1_hover="#ff6a5b" btn_bg2_hover="#ff4d7e" border_style="none" column_btn_link="url:%23|||"]<br />
<ul class="list-inline">
<li>Perfect of Small Team</li>
<li>Unlimited Invoices</li>
<li>Project Management</li>
<li>Team Management</li>
<li>&nbsp;</li>
<li>&nbsp;</li>
</ul>
[/sd_pricing_column][sd_pricing_column col_style="style1" column_title="HIGH CLASS" column_desc="For Team of 10-25 Members" column_price="58" currency="$" yearly_price="600" column_price_desc="/mo" column_yr_price_desc="/yr" show_btn="yes" column_btn_text="Choose Plan" column_animation="fade-up" btn_color="#ffffff" btn_type="gradient" btn_bg1="#1dc8cc" btn_bg2="#2cdd9b" btn_bg1_hover="#2cdd9b" btn_bg2_hover="#1dc8cc" border_style="none" column_btn_link="url:%23|||"]<br />
<ul class="list-inline">
<li>Perfect of Small Team</li>
<li>Unlimited Invoices</li>
<li>Project Management</li>
<li>Time Tracking</li>
<li>Time Tracking</li>
<li>&nbsp;</li>
</ul>
[/sd_pricing_column][sd_pricing_column col_style="style1" column_title="SUPREME" column_desc="For Team of 10-25 Members" column_price="99" currency="$" yearly_price="800" column_price_desc="/mo" column_yr_price_desc="/yr" show_btn="yes" column_btn_text="Choose Plan" column_animation="fade-left" btn_color="#ffffff" btn_type="gradient" btn_bg1="#1dc8cc" btn_bg2="#2cdd9b" btn_bg1_hover="#2cdd9b" btn_bg2_hover="#1dc8cc" border_style="none" column_btn_link="url:%23|||"]<br />
<ul class="list-inline">
<li>Perfect of Small Team</li>
<li>Unlimited Invoices</li>
<li>Project Management</li>
<li>Time Tracking</li>
<li>Time Tracking</li>
<li>&nbsp;</li>
</ul>
[/sd_pricing_column][/sd_pricing_table][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Pricing Table 2

add_filter( 'vc_load_default_templates', 'wrapkit_pricing2' );

if ( ! function_exists( 'wrapkit_pricing2' ) ) {
	function wrapkit_pricing2( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Pricing Table 2', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][vc_row_inner][vc_column_inner][sd_pricing_table style="style2"][sd_pricing_column col_style="style2" column_title="REGULAR" column_desc="PLAN" column_price="0" currency="$" show_btn="yes" column_btn_text="START FOR FREE" btn_color="#2cdd9b" btn_color_hover="#ffffff" btn_type="normal" btn_bg="#ffffff" btn_bg_hover="#2cdd9b" border_style="solid" border_color="#2cdd9b" border_width="1" border_radius="60" column_btn_link="url:%23|||"]<br />
<ul class="list-inline">
<li>2 Proto types</li>
<li>6 Total Images</li>
</ul>
[/sd_pricing_column][sd_pricing_column col_style="style2" column_title="AWESOME" column_desc="PLAN" column_price="15" currency="$" col_featured="yes" featured_txt="" show_btn="yes" column_btn_text="BUY THIS PLAN" btn_color="#ffffff" btn_color_hover="#ffffff" btn_type="gradient" btn_bg1="#2cdd9b" btn_bg2="#1dc8cc" btn_bg1_hover="#1dc8cc" btn_bg2_hover="#2cdd9b" border_style="solid" border_color="#ffffff" border_width="0" border_radius="60" column_btn_link="url:%23|||"]<br />
<ul class="list-inline">
<li>2 Proto types</li>
<li>6 Total Images</li>
</ul>
[/sd_pricing_column][/sd_pricing_table][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]


CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Pricing Table 4

add_filter( 'vc_load_default_templates', 'wrapkit_pricing4' );

if ( ! function_exists( 'wrapkit_pricing4' ) ) {
	function wrapkit_pricing4( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Pricing Table 4', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="90"][ultimate_heading main_heading="Extraordinary Pricing for your Fitness" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" sub_heading_style="font-weight:500;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will<br />
be great experience for you without doubt and in no-time[/ultimate_heading][ultimate_spacer height="90"][sd_pricing_table style="style4" nr_columns_4="4"][sd_pricing_column col_style="style4" show_column_image="yes" column_title="BODY BUILDING PROGRAM" column_desc="WITH JOHNATHAN DOE" column_price="99" column_price_desc="/mo" show_btn="yes" column_btn_text="Choose Plan" column_animation="flip-left" btn_type="gradient" btn_bg1="#ff4d7e" btn_bg2="#ff6a5b" btn_bg1_hover="#ff6a5b" btn_bg2_hover="#ff4d7e" border_style="solid" border_color="#ffffff" border_width="0" border_radius="60" column_img="508" column_btn_link="url:%23|||"]
<ul class="general-listing only-li font-14 m-t-20">
<li><i class="fa fa-check-circle text-success"></i> 6 Days a Week</li>
<li><i class="fa fa-check-circle text-success"></i> Dedicated Trainer Allocated</li>
<li><i class="fa fa-check-circle text-success"></i> Diet Plan Included</li>
<li><i class="fa fa-check-circle text-success"></i> Morning and Evening Batches</li>
</ul>
[/sd_pricing_column][sd_pricing_column col_style="style4" show_column_image="yes" column_title="YOGA AND PILATES CLASS" column_desc="WITH MICHELLE ANDERSON" column_price="69" column_price_desc="/mo" show_btn="yes" column_btn_text="Choose Plan" column_animation="flip-down" btn_type="gradient" btn_bg1="#ff4d7e" btn_bg2="#ff6a5b" btn_bg1_hover="#ff6a5b" btn_bg2_hover="#ff4d7e" border_style="solid" border_color="#ffffff" border_width="0" border_radius="60" column_img="509" column_btn_link="url:%23|||"]<br />
<ul class="general-listing only-li font-14 m-t-20">
<li><i class="fa fa-check-circle text-success"></i> 6 Days a Week</li>
<li><i class="fa fa-check-circle text-success"></i> Dedicated Trainer Allocated</li>
<li><i class="fa fa-check-circle text-success"></i> Diet Plan Included</li>
<li><i class="fa fa-check-circle text-success"></i> Morning and Evening Batches</li>
</ul>
[/sd_pricing_column][sd_pricing_column col_style="style4" show_column_image="yes" column_title="KICK BOXING & KARATE" column_desc="WITH MATHEW DOE" column_price="79" column_price_desc="/mo" show_btn="yes" column_btn_text="Choose Plan" column_animation="flip-right" btn_type="gradient" btn_bg1="#ff4d7e" btn_bg2="#ff6a5b" btn_bg1_hover="#ff6a5b" btn_bg2_hover="#ff4d7e" border_style="solid" border_color="#ffffff" border_width="0" border_radius="60" column_img="507" column_btn_link="url:%23|||"]<br />
<ul class="general-listing only-li font-14 m-t-20">
<li><i class="fa fa-check-circle text-success"></i> 6 Days a Week</li>
<li><i class="fa fa-check-circle text-success"></i> Dedicated Trainer Allocated</li>
<li><i class="fa fa-check-circle text-success"></i> Diet Plan Included</li>
<li><i class="fa fa-check-circle text-success"></i> Morning and Evening Batches</li>
</ul>
[/sd_pricing_column][/sd_pricing_table][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Pricing Table 5

add_filter( 'vc_load_default_templates', 'wrapkit_pricing5' );

if ( ! function_exists( 'wrapkit_pricing5' ) ) {
	function wrapkit_pricing5( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Pricing Table 5', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="90"][ultimate_heading main_heading="Extraordinary Pricing for your Fitness" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" sub_heading_style="font-weight:500;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will<br />
be great experience for you without doubt and in no-time[/ultimate_heading][ultimate_spacer height="40"][sd_pricing_table style="style5" show_switch="yes" monthly_text="Monthly" yearly_text="Yearly"][sd_pricing_column col_style="style5" column_title="BASE PACK" column_price="$100" yearly_price="$1000" column_yr_price_desc="/yr" show_btn="yes" column_btn_text="BUY BASIC" btn_type="normal" border_style="none" col5_bg="517" column_btn_link="url:%23|||"]
<ul class="general-listing only-li">
<li>
<h5>10 IMAGES</h5>
<h6 class="subtitle">Premium images / Day</h6>
</li>
<li>
<h5>05 Videos</h5>
<h6 class="subtitle">Video Footage / Day</h6>
</li>
<li>
<h5>03 Users</h5>
<h6 class="subtitle">Can access the site</h6>
</li>
</ul>
[/sd_pricing_column][sd_pricing_column col_style="style5" column_title="PRO PACK" column_price="$200" yearly_price="$2000" column_yr_price_desc="/yr" col_featured="yes" featured_txt="" show_btn="yes" column_btn_text="BUY PRO" btn_type="normal" border_style="none" col5_bg="515" column_btn_link="url:%23|||"]
<ul class="general-listing only-li">
<li>
<h5>20 IMAGES</h5>
<h6 class="subtitle">Premium images / Day</h6>
</li>
<li>
<h5>10 Videos</h5>
<h6 class="subtitle">Video Footage / Day</h6>
</li>
<li>
<h5>05 Users</h5>
<h6 class="subtitle">Can access the site</h6>
</li>
</ul>
[/sd_pricing_column][sd_pricing_column col_style="style5" column_title="ULTRA PACK" column_price="$300" yearly_price="$3000" column_yr_price_desc="/yr" show_btn="yes" column_btn_text="BUY ULTRA" btn_type="normal" border_style="none" col5_bg="516" column_btn_link="url:%23|||"]
<ul class="general-listing only-li">
<li>
<h5>50 IMAGES</h5>
<h6 class="subtitle">Premium images / Day</h6>
</li>
<li>
<h5>25 Videos</h5>
<h6 class="subtitle">Video Footage / Day</h6>
</li>
<li>
<h5>10 Users</h5>
<h6 class="subtitle">Can access the site</h6>
</li>
</ul>
[/sd_pricing_column][/sd_pricing_table][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Pricing Table 6

add_filter( 'vc_load_default_templates', 'wrapkit_pricing6' );

if ( ! function_exists( 'wrapkit_pricing6' ) ) {
	function wrapkit_pricing6( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Pricing Table 6', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="90"][ultimate_heading main_heading="Extraordinary Pricing for your Fitness" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" sub_heading_style="font-weight:500;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will<br />
be great experience for you without doubt and in no-time[/ultimate_heading][ultimate_spacer height="40"][sd_pricing_table style="style6"][sd_pricing_column col_style="style6" column_title="Basic Plan" column_price="36" currency="$" column_price_desc="MONTHLY" col_featured="yes" featured_txt="Popular" show_btn="yes" column_btn_text="CHOOSE PLAN" btn_type="normal" border_style="none" column_btn_link="url:%23|||"]<br />
<ul class="general-listing only-li font-14 font-medium text-dark">
<li><i class="fa fa-check-circle text-info"></i> 6 Days a Week</li>
<li><i class="fa fa-check-circle text-info"></i> Dedicated Trainer Allocated</li>
<li><i class="fa fa-check-circle text-info"></i> Diet Plan Included</li>
<li><i class="fa fa-check-circle text-info"></i> Morning and Evening Batches</li>
</ul>
[/sd_pricing_column][sd_pricing_column col_style="style6" column_title="Advanced Plan" column_price="60" currency="$" column_price_desc="MONTHLY" show_btn="yes" column_btn_text="CHOOSE PLAN" btn_type="normal" border_style="none" column_btn_link="url:%23|||"]<br />
<ul class="general-listing only-li font-14 font-medium text-dark">
<li><i class="fa fa-check-circle text-info"></i> 6 Days a Week</li>
<li><i class="fa fa-check-circle text-info"></i> Dedicated Trainer Allocated</li>
<li><i class="fa fa-check-circle text-info"></i> Diet Plan Included</li>
<li><i class="fa fa-check-circle text-info"></i> Morning and Evening Batches</li>
</ul>
[/sd_pricing_column][/sd_pricing_table][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Pricing Table 7

add_filter( 'vc_load_default_templates', 'wrapkit_pricing7' );

if ( ! function_exists( 'wrapkit_pricing7' ) ) {
	function wrapkit_pricing7( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Pricing Table 7', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="90"][ultimate_heading main_heading="Extraordinary Pricing for your Fitness" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" sub_heading_style="font-weight:500;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will<br />
be great experience for you without doubt and in no-time[/ultimate_heading][ultimate_spacer height="40"][sd_pricing_table style="style7" nr_columns_4="4"][sd_pricing_column col_style="style7" column_title="Regular Plan" column_price="39" currency="$" column_price_desc="YEARLY" show_btn="yes" column_btn_text="CHOOSE PLAN" btn_type="normal" border_style="none" column_btn_link="url:%23|||"]<br />
<p class="m-t-40 m-b-20">The Regular license allows you to customize, store and even host your website using your platform</p>
[/sd_pricing_column][sd_pricing_column col_style="style7" column_title="Master Plan" column_price="49" currency="$" column_price_desc="YEARLY" show_btn="yes" column_btn_text="CHOOSE PLAN" btn_type="gradient" btn_bg1="#ff4d7e" btn_bg2="#ff6a5b" btn_bg1_hover="#ff6a5b" btn_bg2_hover="#ff4d7e" border_style="none" column_btn_link="url:%23|||"]<br />
<p class="m-t-40 m-b-20">The Master license allows you to customize, store and even host your website using your platform</p>
[/sd_pricing_column][sd_pricing_column col_style="style7" column_title="Premium Plan" column_price="69" currency="$" column_price_desc="YEARLY" show_btn="yes" column_btn_text="CHOOSE PLAN" btn_type="normal" border_style="none" column_btn_link="url:%23|||"]<br />
<p class="m-t-40 m-b-20">The Premium license allows you to customize, store and even host your website using your platform</p>
[/sd_pricing_column][/sd_pricing_table][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Team 1

add_filter( 'vc_load_default_templates', 'wrapkit_team1' );

if ( ! function_exists( 'wrapkit_team1' ) ) {
	function wrapkit_team1( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Team 1', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="bg_color" bg_color_value="#f4f8fa"][vc_column][ultimate_spacer height="90"][ultimate_heading main_heading="Extraordinary Pricing for your Fitness" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" sub_heading_style="font-weight:500;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will<br />
be great experience for you without doubt and in no-time[/ultimate_heading][ultimate_spacer height="40"][/vc_column][/vc_row][vc_row equal_height="yes" bg_type="bg_color" bg_color_value="#f4f8fa" css=".vc_custom_1521682206942{padding-bottom: 90px !important;}"][vc_column width="1/2" offset="vc_col-xs-12"][vc_row_inner equal_height="yes"][vc_column_inner width="5/12" css=".vc_custom_1521677387608{padding-right: 0px !important;}"][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/t1-min.jpg" css=".vc_custom_1521677239762{margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner width="7/12" css=".vc_custom_1521678408762{padding-left: 0px !important;background-color: #ffffff !important;}"][ult_content_box bg_color="#ffffff" box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding-right:30px;padding-left:30px;" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|"][ultimate_heading main_heading="Michael Doe" heading_tag="h5" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:22px;" margin_design_tab_text="" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will be great experience.[/ultimate_heading][ultimate_icons css_icon=".vc_custom_1521678886324{margin-top: 5px !important;margin-bottom: 0px !important;margin-left: -10px !important;}"][single_icon icon="Defaults-facebook facebook-f" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-twitter" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-linkedin" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-instagram" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][/ultimate_icons][/ult_content_box][/vc_column_inner][/vc_row_inner][ultimate_spacer height="15"][vc_row_inner equal_height="yes"][vc_column_inner width="5/12" css=".vc_custom_1521677387608{padding-right: 0px !important;}"][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/t3-min.jpg" css=".vc_custom_1521678466962{margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner width="7/12" css=".vc_custom_1521678425428{padding-left: 0px !important;background-color: #ffffff !important;}"][ult_content_box bg_color="#ffffff" box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding-right:30px;padding-left:30px;" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|"][ultimate_heading main_heading="Michael Doe" heading_tag="h5" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:22px;" margin_design_tab_text="" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will be great experience.[/ultimate_heading][ultimate_icons css_icon=".vc_custom_1521682052432{margin-top: 5px !important;margin-bottom: 0px !important;margin-left: -10px !important;}"][single_icon icon="Defaults-facebook facebook-f" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-twitter" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-linkedin" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-instagram" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][/ultimate_icons][/ult_content_box][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" offset="vc_col-xs-12"][vc_row_inner equal_height="yes"][vc_column_inner width="5/12" css=".vc_custom_1521677692012{padding-right: 0px !important;}"][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/t2-min.jpg" css=".vc_custom_1521677821282{margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner width="7/12" css=".vc_custom_1521678416710{padding-left: 0px !important;background-color: #ffffff !important;}"][ult_content_box box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding-right:30px;padding-left:30px;" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" bg_color="#ffffff"][ultimate_heading main_heading="Michael Doe" heading_tag="h5" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:22px;" margin_design_tab_text="" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will be great experience.[/ultimate_heading][ultimate_icons css_icon=".vc_custom_1521682096906{margin-top: 5px !important;margin-bottom: 0px !important;margin-left: -10px !important;}"][single_icon icon="Defaults-facebook facebook-f" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-twitter" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-linkedin" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-instagram" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][/ultimate_icons][/ult_content_box][/vc_column_inner][/vc_row_inner][ultimate_spacer height="15"][vc_row_inner equal_height="yes"][vc_column_inner width="5/12" css=".vc_custom_1521677692012{padding-right: 0px !important;}"][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/t4-min.jpg" css=".vc_custom_1521678480174{margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner width="7/12" css=".vc_custom_1521677710998{padding-left: 0px !important;background-color: #ffffff !important;}"][ult_content_box box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding-right:30px;padding-left:30px;" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" bg_color="#ffffff"][ultimate_heading main_heading="Michael Doe" heading_tag="h5" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:22px;" margin_design_tab_text="" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will be great experience.[/ultimate_heading][ultimate_icons css_icon=".vc_custom_1521682108576{margin-top: 5px !important;margin-bottom: 0px !important;margin-left: -10px !important;}"][single_icon icon="Defaults-facebook facebook-f" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-twitter" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-linkedin" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-instagram" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][/ultimate_icons][/ult_content_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Team 2

add_filter( 'vc_load_default_templates', 'wrapkit_team2' );

if ( ! function_exists( 'wrapkit_team2' ) ) {
	function wrapkit_team2( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Team 2', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row bg_type="bg_color" bg_color_value="#f4f8fa"][vc_column][ultimate_spacer height="90"][ultimate_heading main_heading="Extraordinary Pricing for your Fitness" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:36px;" main_heading_margin="margin-bottom:15px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" sub_heading_style="font-weight:500;" sub_heading_line_height="desktop:24px;"]You can relay on our amazing features list and also our customer services will<br />
be great experience for you without doubt and in no-time[/ultimate_heading][ultimate_spacer height="40"][vc_row_inner][vc_column_inner width="1/4"][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/t1-min.jpg" css=".vc_custom_1521682437240{margin-bottom: 30px !important;}"][ultimate_heading main_heading="Michael Doe" heading_tag="h5" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:22px;" margin_design_tab_text="" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;" sub_heading_font_size="desktop:13px;" sub_heading_margin="margin-bottom:20px;"]Property Specialist[/ultimate_heading][vc_column_text css=".vc_custom_1521682574770{margin-bottom: 20px !important;}"]You can relay on our amazing features list and also our customer services will be great experience.[/vc_column_text][ultimate_icons css_icon=".vc_custom_1521682610246{margin-bottom: 0px !important;}"][single_icon icon="Defaults-facebook facebook-f" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-twitter" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-linkedin" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-instagram" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][/ultimate_icons][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/t2-min.jpg" css=".vc_custom_1521682530766{margin-bottom: 30px !important;}"][ultimate_heading main_heading="Michael Doe" heading_tag="h5" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:22px;" margin_design_tab_text="" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;" sub_heading_font_size="desktop:13px;" sub_heading_margin="margin-bottom:20px;"]Property Specialist[/ultimate_heading][vc_column_text css=".vc_custom_1521682574770{margin-bottom: 20px !important;}"]You can relay on our amazing features list and also our customer services will be great experience.[/vc_column_text][ultimate_icons css_icon=".vc_custom_1521682606794{margin-bottom: 0px !important;}"][single_icon icon="Defaults-facebook facebook-f" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-twitter" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-linkedin" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-instagram" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][/ultimate_icons][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/t3-min.jpg" css=".vc_custom_1521682534474{margin-bottom: 30px !important;}"][ultimate_heading main_heading="Michael Doe" heading_tag="h5" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:22px;" margin_design_tab_text="" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;" sub_heading_font_size="desktop:13px;" sub_heading_margin="margin-bottom:20px;"]Property Specialist[/ultimate_heading][vc_column_text css=".vc_custom_1521682574770{margin-bottom: 20px !important;}"]You can relay on our amazing features list and also our customer services will be great experience.[/vc_column_text][ultimate_icons css_icon=".vc_custom_1521682620664{margin-bottom: 0px !important;}"][single_icon icon="Defaults-facebook facebook-f" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-twitter" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-linkedin" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-instagram" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][/ultimate_icons][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/t4-min.jpg" css=".vc_custom_1521682538314{margin-bottom: 30px !important;}"][ultimate_heading main_heading="Michael Doe" heading_tag="h5" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:500" main_heading_style="font-weight:500;" main_heading_line_height="desktop:22px;" margin_design_tab_text="" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;" sub_heading_line_height="desktop:24px;" sub_heading_font_size="desktop:13px;" sub_heading_margin="margin-bottom:20px;"]Property Specialist[/ultimate_heading][vc_column_text css=".vc_custom_1521682574770{margin-bottom: 20px !important;}"]You can relay on our amazing features list and also our customer services will be great experience.[/vc_column_text][ultimate_icons css_icon=".vc_custom_1521682627196{margin-bottom: 0px !important;}"][single_icon icon="Defaults-facebook facebook-f" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-twitter" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-linkedin" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][single_icon icon="Defaults-instagram" icon_size="16" icon_margin="5" icon_color="#3e4555" icon_link="url:%23|||" icon_animation="fadeIn"][/ultimate_icons][/vc_column_inner][/vc_row_inner][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Contact 1

add_filter( 'vc_load_default_templates', 'wrapkit_contact1' );

if ( ! function_exists( 'wrapkit_contact1' ) ) {
	function wrapkit_contact1( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Contact 1', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row centered="no"][vc_column][ultimate_google_map height="400px" lat="37.7749" lng="-122.4194" zoom="16" infowindow_open="off" marker_icon="default_self" top_margin="none"]Headquarters[/ultimate_google_map][ultimate_spacer height="90"][/vc_column][/vc_row][vc_row][vc_column][vc_row_inner content_placement="middle"][vc_column_inner width="2/3"][ultimate_heading main_heading="Quick Contact" heading_tag="h4" alignment="left" main_heading_line_height="desktop:26px;" margin_design_tab_text="" main_heading_margin="margin-bottom:30px;"][/ultimate_heading][contact-form-7 id="619"][/vc_column_inner][vc_column_inner width="1/3"][ult_content_box bg_color="#188ef4" box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding:40px;" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|"][ultimate_heading main_heading="WrapKit Headquarters" main_heading_color="#ffffff" sub_heading_color="rgba(255,255,255,0.8)" alignment="left" margin_design_tab_text="" sub_heading_line_height="desktop:24px;"]
<p class="text-white m-t-30 op-8">251 546 9442
info@wrappixel.com</p>
<p class="text-white op-8">601 Sherwood Ave.
San Bernandino, CA 92404</p>
[/ultimate_heading][/ult_content_box][/vc_column_inner][/vc_row_inner][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Contact 2

add_filter( 'vc_load_default_templates', 'wrapkit_contact2' );

if ( ! function_exists( 'wrapkit_contact2' ) ) {
	function wrapkit_contact2( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Contact 2', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row equal_height="yes" bg_type="image" parallax_style="vcpb-default" bg_image_new="id^702|url^https://wrapkitwp.com/wp-content/uploads/2018/03/map-min.jpg|caption^null|alt^null|title^map-min|description^null" bg_image_repeat="no-repeat" el_id="contact"][vc_column][ultimate_spacer height="300"][vc_row_inner css=".vc_custom_1519774102290{margin-bottom: -50px !important;padding-top: 1px !important;}"][vc_column_inner width="2/3" css=".vc_custom_1517521294422{padding-right: 0px !important;}"][sd_aos_animation animation="fade-up"][ult_content_box bg_color="#ffffff" box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding:40px;" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" el_class="card-shadow" responsive_margin="margin-right:15px;"][contact-form-7 id="704"][ultimate_spacer height="35" height_on_mob_landscape="30" height_on_mob="30"][/ult_content_box][/sd_aos_animation][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1522093066296{padding-left: 0px !important;background-image: url(https://wrapkitwp.com/wp-content/uploads/2018/03/footer-bg-min.jpg?id=701) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][sd_aos_animation animation="fade-up"][ult_content_box bg_type="bg_image" bg_image="7712" box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding-top:40px;padding-right:40px;padding-bottom:20px;padding-left:40px;" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" min_height="573" responsive_margin="margin-left:15px;"][ultimate_heading main_heading="ADDRESS" main_heading_color="#ffffff" heading_tag="h5" sub_heading_color="rgba(255,255,255,0.8)" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" main_heading_style="font-weight:300;" main_heading_line_height="desktop:22px;" main_heading_margin="margin-bottom:30px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;"]601 Sherwood Ave.
			San Bernandino[/ultimate_heading][ultimate_heading main_heading="CALL US" main_heading_color="#ffffff" heading_tag="h5" sub_heading_color="rgba(255,255,255,0.8)" alignment="left" main_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" main_heading_style="font-weight:300;" main_heading_line_height="desktop:22px;" main_heading_margin="margin-top:40px;margin-bottom:30px;" sub_heading_font_family="font_family:Montserrat|font_call:Montserrat|variant:300" sub_heading_style="font-weight:300;"]251 546 9442
			630 446 8851[/ultimate_heading][ultimate_spacer height="200" height_on_mob_landscape="50" height_on_mob="50"][ultimate_icons css_icon=".vc_custom_1517520720572{margin-bottom: 0px !important;}"][single_icon icon="Defaults-facebook facebook-f" icon_size="16" icon_margin="15" icon_color="#ffffff" icon_style="advanced" icon_color_bg="rgba(255,255,255,0)" icon_border_style="solid" icon_color_border="#ffffff" icon_border_size="2" icon_border_radius="500" icon_border_spacing="49" icon_link="url:%23|||"][single_icon icon="Defaults-twitter" icon_size="16" icon_margin="15" icon_color="#ffffff" icon_style="advanced" icon_color_bg="rgba(255,255,255,0.01)" icon_border_style="solid" icon_color_border="#ffffff" icon_border_size="2" icon_border_radius="500" icon_border_spacing="49" icon_link="url:%23|||"][single_icon icon="Defaults-youtube-play" icon_size="16" icon_margin="15" icon_color="#ffffff" icon_style="advanced" icon_color_bg="rgba(255,255,255,0.01)" icon_border_style="solid" icon_color_border="#ffffff" icon_border_size="2" icon_border_radius="500" icon_border_spacing="49" icon_link="url:%23|||"][/ultimate_icons][/ult_content_box][/sd_aos_animation][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Contact 3

add_filter( 'vc_load_default_templates', 'wrapkit_contact3' );

if ( ! function_exists( 'wrapkit_contact3' ) ) {
	function wrapkit_contact3( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Contact 3', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row][vc_column][ultimate_spacer height="90"][vc_row_inner][vc_column_inner width="1/2"][vc_single_image source="external_link" external_img_size="full" alignment="center" custom_src="https://wrapkitwp.com/wp-content/uploads/2018/03/2-min-2.jpg"][/vc_column_inner][vc_column_inner width="1/2"][contact-form-7 id="5"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][bsf-info-box icon_type="custom" icon_img="id^719|url^https://wrapkitwp.com/wp-content/uploads/2018/03/icon1-min-1.png|caption^null|alt^null|title^icon1-min|description^null" img_width="58" title="Address" pos="left" heading_tag="h6" title_font="font_family:Montserrat|font_call:Montserrat|variant:500" title_font_style="font-weight:500;" title_font_line_height="desktop:20px;" desc_font_line_height="desktop:24px;"]601 Sherwood Ave.

			San Bernandino[/bsf-info-box][/vc_column_inner][vc_column_inner width="1/3"][bsf-info-box icon_type="custom" icon_img="id^718|url^https://wrapkitwp.com/wp-content/uploads/2018/03/icon2-min-1.png|caption^null|alt^null|title^icon2-min|description^null" img_width="65" title="Phone" pos="left" heading_tag="h6" title_font="font_family:Montserrat|font_call:Montserrat|variant:500" title_font_style="font-weight:500;" title_font_line_height="desktop:20px;" desc_font_line_height="desktop:24px;"]251 546 9442
			
			630 446 8851[/bsf-info-box][/vc_column_inner][vc_column_inner width="1/3"][bsf-info-box icon_type="custom" icon_img="id^717|url^https://wrapkitwp.com/wp-content/uploads/2018/03/icon3-min-1.png|caption^null|alt^null|title^icon3-min|description^null" img_width="58" title="E-Mail" pos="left" heading_tag="h6" title_font="font_family:Montserrat|font_call:Montserrat|variant:500" title_font_style="font-weight:500;" title_font_line_height="desktop:20px;" desc_font_line_height="desktop:24px;"]info@wrappixel.com
			
			123@wrappixel.com[/bsf-info-box][/vc_column_inner][/vc_row_inner][ultimate_spacer height="90"][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}

// Contact 4

add_filter( 'vc_load_default_templates', 'wrapkit_contact4' );

if ( ! function_exists( 'wrapkit_contact4' ) ) {
	function wrapkit_contact4( $data ) {
    	$template               = array();
	    $template['name']       = esc_html__( 'Contact 4', 'wrapkit' );
	    $template['custom_class'] = '';
    	$template['content']    = <<<CONTENT
		[vc_row centered="no"][vc_column][vc_row_inner equal_height="yes"][vc_column_inner width="1/2" css=".vc_custom_1522094765774{background-color: #188ef4 !important;}"][ult_content_box box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" padding="padding-right:100px;padding-left:100px;" hover_box_shadow="horizontal:px|vertical:px|blur:px|spread:px|style:none|" el_class="p-n-mobile"][contact-form-7 id="704"][/ult_content_box][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1522094744856{padding-left: 0px !important;}"][ultimate_google_map height="530px" lat="37.7749" lng="-122.4194" zoom="16" infowindow_open="off" marker_icon="default_self" top_margin="none" gmap_margin="margin:0px;"]Headquarters
[/ultimate_google_map][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT;

	    array_unshift( $data, $template );
    	return $data;
	}
}