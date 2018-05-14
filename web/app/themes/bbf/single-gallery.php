<?php

/**
 * The Template for displaying a single gallery
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Timber\Timber;
use App\PostTypes\Gallery;

$context = Timber::get_context();
$gallery = new Gallery();

$context['gallery'] = $gallery;

$context['title'] = $gallery->title;
$context['content'] = $gallery->content;

Timber::render(['single-gallery.twig'], $context);
