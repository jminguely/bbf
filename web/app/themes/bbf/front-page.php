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

$context = Timber::get_context();
$page = new Page();

$context['page'] = $page;

$context['title'] = $page->title;
$context['content'] = $page->content;

$context['posts'] = Post::query(
    array(
        'orderby' => 'date',
        'order'   => 'DESC',
        'posts_per_page' => '3'
        )
    );

Timber::render(['front-page.twig'], $context);
