<?php
/**
 * The template for displaying the galeries
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Timber\Timber;
use App\PostTypes\Page;
use App\PostTypes\Gallery;

$context = Timber::get_context();

$page = new Page();

$context['page'] = $page;

$context['title'] = $page->displayed_title ? $page->displayed_title : $page->title;

$context['galleries'] = Gallery::all();

Timber::render(['page-photos.twig'], $context);
