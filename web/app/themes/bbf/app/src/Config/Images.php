<?php

namespace App\Config;

class Images {
    public static function register() {
        add_action( 'after_setup_theme', function () {
            add_image_size('gallery-thumbnail', 920, 640, true);
            add_image_size('logo', 400, 200);
            add_image_size('cover', 2000);
        });
    }
}
