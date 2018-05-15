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
}
