<?php

namespace App\Functions;

use Timber\Timber as Timber;
use App\PostTypes\Event;

class Shortcodes extends Timber {
    public function __construct() {
        add_shortcode( 'event-list', array( $this , 'event_list' ) );
        add_shortcode( 'social-link', array( $this , 'social_link' ) );
        add_shortcode( 'members-list', array( $this , 'members_list' ) );
        add_action( 'init', array( $this , 'shortcode_ui_detection' ) );
        add_action( 'register_shortcode_ui', array( $this , 'register_custom_shortcode_ui' ) );
    }

    public static function shortcode_ui_detection() {
        if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
            add_action( 'admin_notices', 'shortcode_ui_dev_example_notices' );
        }
    }

    public static function register_custom_shortcode_ui() {
        shortcode_ui_register_for_shortcode(
            'event-list',
            array(
                'label' => "Liste d'évènements",
                'listItemImage' => 'dashicons-calendar-alt',
            )
        );

        shortcode_ui_register_for_shortcode(
            'social-link',
            array(
                'label' => "Liens sociaux",
                'listItemImage' => 'dashicons-facebook',
            )
        );

        shortcode_ui_register_for_shortcode(
            'members-list',
            array(
                'label' => "Liste des membres",
                'listItemImage' => 'dashicons-admin-users',
                'attrs' => array(
                    array(
                        'attr' => 'formation',
                        'type' => 'select',
                        'options' => array(
                            'a' => 'Formation A',
                            'b' => 'Formation B',
                        ),
                    )
                )

            )
        );
    }

    public static function event_list() {
        $today = date('Ymd', strtotime("now"));

        $data = [];
        $data['events'] = Event::query(
            array(
                'meta_key' => 'datetime_event_date',
                'orderby' => 'meta_value_num',
                'order'   => 'asc',
                'meta_query' => array(
                    array(
                        'key' => 'datetime_event_date',
                        'value' => $today,
                        'compare' => '>='
                    )
                )
            )
        );
        return Timber::compile( 'components/event/event-list.twig', $data );
    }

    public static function social_link() {
        return Timber::compile( 'components/common/social-link.twig' );
    }

    public static function members_list($atts) {
        $atts = shortcode_atts(
        array(
            'formation' => 'a'
        ), $atts, 'bartag' );

        $data = [];
        $data['members'] = get_field('members-'.$atts['formation'], 'option');
        return Timber::compile( 'components/section/section-members.twig', $data );
    }
}
