<?php

namespace App\Config;

class Images {
    public static function register() {
        add_action( 'after_setup_theme', function () {
            add_image_size('gallery-thumbnail', 700, 440, true);
            add_image_size('logo', 200, 100);
            add_image_size('logo_2x', 400, 200);
            add_image_size('cover', 2000);
        });
    }
}
