<?php
/**
 * The template for displaying the galeries
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Timber\Timber;
use App\PostTypes\Gallery;

$context = Timber::get_context();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 0;

$args = array(
    'post_type'         => 'gallery',
    'posts_per_page'    => 10,
    'paged'             => $paged
);

$context['galleries'] = Gallery::query($args);
$context['pagination'] = Timber::get_pagination();

Timber::render(['archive-gallery.twig'], $context);
