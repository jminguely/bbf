<?php

namespace App\Config;

use App\PostTypes\Event;
use App\PostTypes\Gallery;

class CustomPostTypes
{
    public static function register()
    {
        add_action( 'template_redirect', ['App\Config\CustomPostTypes', 'bbf_redirect_post'] );
        add_action('manage_gallery_posts_columns', ['App\Config\CustomPostTypes', 'manage_gallery_date_column']);
        add_action('manage_event_posts_columns', ['App\Config\CustomPostTypes', 'manage_event_date_column']);
        add_action('manage_event_posts_custom_column', ['App\Config\CustomPostTypes', 'manage_event_admin_column_show_value'], 10, 2);
        add_filter('manage_edit-event_sortable_columns', ['App\Config\CustomPostTypes', 'set_custom_event_sortable_columns']);
        add_action('pre_get_posts', ['App\Config\CustomPostTypes', 'event_custom_orderby']);

        add_action('init', ['App\Config\CustomPostTypes', 'post_unregister_taxonomy']);
        add_action('init', [get_called_class(), 'types']);
    }

    public static function bbf_redirect_post() {
        $queried_post_type = get_query_var('post_type');
        if ( is_single() && 'event' ==  $queried_post_type ) {
          wp_redirect( get_permalink( get_page_by_path( 'agenda' ) ), 301 );
          exit;
        }
      }

    public static function manage_gallery_date_column($columns) {
        unset($columns['date']);

        return $columns;
    }

    public static function manage_event_date_column($columns) {
        $columns['event_date'] = 'Event Date';
        $columns['formation'] = 'Formation';
        unset($columns['date']);

        return $columns;
    }

    public static function manage_event_admin_column_show_value( $column, $post_id ) {
        if ($column == 'event_date') {
            $field = date("d.m.Y", strtotime(get_field('datetime')["event_date"]));
            echo $field;
        }
        if ($column == 'formation') {
            $field = strtoupper(get_field('formation'));
            echo '<strong>'.$field.'</strong>';
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
            $query->set( 'meta_key', 'datetime_event_date' );
            $query->set( 'orderby', 'meta_value' );
        }
    }

    public static function post_unregister_taxonomy(){
        register_taxonomy('post_tag', array());
        register_taxonomy('category', array());
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
                'has_archive' => true,
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
