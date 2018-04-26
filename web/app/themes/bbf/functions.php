<?php

use Timber\Timber;

// Timber::$cache = true;

// add_shortcode( 'bartag',  'baztag_func' );

// function baztag_func( $atts ) {
//     return Timber::compile( 'components/common/social-link.twig' );
// }

Timber::$dirname = [
    'views',
    'views/templates',
];

require_once('app/bootstrap.php');
