<?php

namespace App\Functions;

use Timber\Timber as Timber;
use App\PostTypes\Event;

class Shortcodes extends Timber {
    public function __construct() {
        add_shortcode( 'event-list', array( $this , 'event_list' ) );
        add_shortcode( 'social-link', array( $this , 'social_link' ) );
    }

    public static function event_list() {
        $today = date('Ymd', strtotime("now"));

        $data = [];
        $data['events'] = Event::query(
            array(
                'meta_key' => 'event_date',
                'orderby' => 'meta_key',
                'order'   => 'desc',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
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
}
