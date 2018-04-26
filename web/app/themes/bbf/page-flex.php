<?php
/**
 * The template for displaying all flex pages.
 *
 * Template Name: Page flexible
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

$context['title'] = $page->displayed_title;
$context['content'] = $page->content;

Timber::render(['flexible-page.twig'], $context);
