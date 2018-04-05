<?php

namespace App\Config;

use App\PostTypes\Event;
use App\PostTypes\Gallery;

class CustomPostTypes
{
    public static function register()
    {
        add_action('manage_event_posts_columns', ['App\Config\CustomPostTypes', 'add_new_event_column']);
        add_action('manage_event_posts_custom_column', ['App\Config\CustomPostTypes', 'add_new_event_admin_column_show_value'], 10, 2);
        add_filter( 'manage_edit-event_sortable_columns', ['App\Config\CustomPostTypes', 'set_custom_event_sortable_columns'] );
        add_action( 'pre_get_posts', ['App\Config\CustomPostTypes', 'event_custom_orderby'] );

        add_action('init', ['App\Config\CustomPostTypes', 'ev_unregister_taxonomy']);

        add_action('init', [get_called_class(), 'types']);
    }

    public static function ev_unregister_taxonomy(){
        register_taxonomy('post_tag', array());
        register_taxonomy('category', array());
    }


    public function add_new_event_column($columns) {
        $columns['event_date'] = 'Event Date';

        return $columns;
    }

    public static function add_new_event_admin_column_show_value( $column, $post_id ) {
        if ($column == 'event_date') {
            $evdate = get_field('date');
            echo $evdate;
        }
    }

    /* Make the column sortable */
    public static function set_custom_event_sortable_columns( $columns ) {
        $columns['event_date'] = 'event_date';

        return $columns;
    }

    public static function event_custom_orderby( $query ) {
        if ( ! is_admin() )
        return;

        $orderby = $query->get('orderby');

        if ( 'event_date' == $orderby ) {
            $query->set( 'meta_key', 'date' );
            $query->set( 'orderby', 'meta_value' );
        }
    }



    public static function types()
    {
        //Event
        register_post_type(
            Event::postType(),
            [
                'labels' => [
                    'name' => __('Évènements', 'bbf'),
                    'singular_name' => __('Évènement', 'bbf')
                ],
                'menu_icon'  => 'dashicons-calendar-alt',
                'public' => true,
                'has_archive' => false,
                'supports' => [
                    'title'
                ],
                'rewrite' => [
                    'slug' => 'event',
                ],
                'show_in_nav_menus' => true,
            ]
        );

        //Gallery
        register_post_type(
            Gallery::postType(),
            [
                'labels' => [
                    'name' => __('Galeries', 'bbf'),
                    'singular_name' => __('Galerie', 'bbf')
                ],
                'menu_icon'  => 'dashicons-format-gallery',
                'public' => true,
                'has_archive' => false,
                'supports' => [
                    'title',
                    'thumbnail'

                ],
                'rewrite' => [
                    'slug' => 'gallery',
                ],
                'show_in_nav_menus' => true,
            ]
        );
    }
}
