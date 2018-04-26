<?php
/**
 * The template for displaying the home page
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Timber\Timber;
use App\PostTypes\Page;
use App\PostTypes\Post;
use App\PostTypes\Event;

$context = Timber::get_context();
$page = new Page();

$context['page'] = $page;

$context['title'] = $page->displayed_title;
$context['content'] = $page->content;

$context['posts'] = Post::query(
    array(
        'orderby' => 'date',
        'order'   => 'DESC',
        'posts_per_page' => '3'
        )
    );

$context['events'] = array();

$today = date('Ymd', strtotime("now"));

$context['events']['a'] = Event::query(
    array(
        'meta_key' => 'event_date',
        'orderby' => 'meta_key',
        'order'   => 'desc',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'formation',
                'value' => 'a',
                'compare' => 'in'
            ),
            array(
                'key' => 'event_date',
                'value' => $today,
                'compare' => '>='
            )
        ),
        'posts_per_page' => '2'
        )
    );

    $context['events']['b'] = Event::query(
        array(
            'meta_key' => 'event_date',
            'orderby' => 'meta_key',
            'order'   => 'desc',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'formation',
                    'value' => 'b',
                    'compare' => 'in'
                ),
                array(
                    'key' => 'event_date',
                    'value' => $today,
                    'compare' => '>='
                )
            ),
            'posts_per_page' => '2'
            )
        );

Timber::render(['front-page.twig'], $context);
