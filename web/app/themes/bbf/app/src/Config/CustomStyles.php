<?php

namespace App\Config;

class CustomStyles {
    public function __construct() {
        add_filter('mce_buttons', array($this , 'remove_default_format_select'));
        add_filter('mce_buttons_2', array($this , 'add_style_select_buttons'));
        add_filter('tiny_mce_before_init', array($this , 'my_custom_styles'));
        add_action('admin_init', array($this , 'wpdocs_theme_add_editor_styles'));
    }

    public static function wpdocs_theme_add_editor_styles() {
        add_editor_style('custom-editor-style.css');
    }

    public static function add_style_select_buttons( $buttons ) {
        array_unshift( $buttons, 'styleselect' );
        return $buttons;
    }

    public static function remove_default_format_select( $buttons ) {
        $remove = array( 'formatselect' );

        return array_diff( $buttons, $remove );
     }

    //add custom styles to the WordPress editor
    public static function my_custom_styles( $init_array ) {
        $init_array['style_formats_merge'] = true;

        $style_formats = array(
            array(
                'title' => 'Semi-opacité',
                'inline' => 'span',
                'classes' => 'half-opacity'
            )

        );
        $init_array['style_formats'] = json_encode( $style_formats );

        return $init_array;
    }
}
