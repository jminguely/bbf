<?php

namespace App;

use App\Core\Site;
use App\Config\ThemeSupport;
use App\Config\CustomPostTypes;
use App\Config\CustomTaxonomies;
use App\Config\Menus;
use App\Config\Images;
use App\Functions\Assets;
use App\Functions\Shortcodes;

require_once('autoload.php');

/**
 * ------------------
 * Core
 * ------------------
 */

// Set up the default Timber context & extend Twig for the site
new Site;

/**
 * ------------------
 * Config
 * ------------------
 */

// Register support of certain theme features
ThemeSupport::register();

// Register any custom post types
CustomPostTypes::register();

// Register any custom taxonomies
CustomTaxonomies::register();

// Register WordPress menus
Menus::register();

// Register WordPress images sizes
Images::register();

new Shortcodes;

/**
 * ------------------
 * Functions
 * ------------------
 */

// Enqueue assets
Assets::load();
