<?php
/*
Plugin Name: Gravity Forms Slider Field Add-On
Plugin URI: http://www.gfrangeslider.com/
Plugin Author: Bhagwant Banger
Version: 1.0.0
Description: A highly interactive and customisable range slider field for gravity forms.
*/
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'BBGF_SLIDER_ADDON_VERSION', '1.0' );

add_action( 'gform_loaded', array( 'BBGF_Slider_AddOn_Bootstrap', 'load' ), 5 );

class BBGF_Slider_AddOn_Bootstrap {
    public static function load() {

        if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
            return;
        }

        require_once( 'class-bb_gfslideraddon.php' );

        GFAddOn::register( 'BBGFSliderAddOn' );
    }
}
