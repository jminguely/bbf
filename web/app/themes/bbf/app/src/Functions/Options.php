<?php

namespace App\Functions;

class Options {
    public function __construct() {
        if( function_exists('acf_add_options_page') ) {
            // add parent
           $parent = acf_add_options_page(array(
               'page_title' 	=> 'Liste des membres',
               'menu_title' 	=> 'Membres',
               'icon_url'       => 'dashicons-admin-users',
               'position'       => 40,
           ));
       }
    }
}



