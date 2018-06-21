<?php

/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Timber\Timber;
use App\PostTypes\Post;

$context = Timber::get_context();
$post = new Post();

$context['post'] = $post;

$context['title'] = $post->title;

$context['content'] = $post->content;

$context['posts'] = Post::query([
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order'   => 'desc',
        'post__not_in' => array($post->ID),
    ]);

Timber::render(['single-post.twig'], $context);
