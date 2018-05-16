<?php
/**
 * The template for displaying all pages
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Timber\Timber;
use App\PostTypes\Page;

$context = Timber::get_context();

$page = new Page();

$context['page'] = $page;

$context['title'] = $page->displayed_title ? $page->displayed_title : $page->title;

Timber::render(['page-'.$page->slug.'.twig', 'page.twig'], $context);
