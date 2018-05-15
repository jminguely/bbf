<?php
/**
 * The template for displaying the agenda
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Timber\Timber;
use App\PostTypes\Page;
use App\PostTypes\Event;

$context = Timber::get_context();
$page = new Page();

$context['page'] = $page;

$context['title'] = $page->displayed_title ? $page->displayed_title : $page->title;

$context['events'] = array();

$today = date('Ymd', strtotime("now"));

$context['events']['a'] = Event::query(
    array(
        'meta_key' => 'datetime_event_date',
        'orderby' => 'meta_value_num',
        'order'   => 'asc',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'formation',
                'value' => 'a',
                'compare' => 'in'
            ),
            array(
                'key' => 'datetime_event_date',
                'value' => $today,
                'compare' => '>='
            )
        )
        )
    );
    
    $context['events']['b'] = Event::query(
        array(
            'meta_key' => 'datetime_event_date',
            'orderby' => 'meta_value_num',
            'order'   => 'asc',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'formation',
                    'value' => 'b',
                    'compare' => 'in'
                ),
                array(
                    'key' => 'datetime_event_date',
                    'value' => $today,
                    'compare' => '>='
                )
            )
            )
        );

Timber::render(['page-agenda.twig'], $context);
