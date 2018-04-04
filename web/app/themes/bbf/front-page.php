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

$context = Timber::get_context();
$page = new Page();

$context['post'] = $page;

$context['title'] = $page->title;
$context['content'] = $page->content;

Timber::render(['front-page.twig'], $context);
