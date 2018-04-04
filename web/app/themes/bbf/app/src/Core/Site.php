<?php

namespace App\Core;

use Timber\Site as TimberSite;
use Timber\Helper as TimberHelper;
use App\Core\Menu;

class Site extends TimberSite
{
    public function __construct()
    {
        add_filter('get_twig', [$this, 'addToTwig']);
        add_filter('timber_context', [$this, 'addToContext']);
        add_action('admin_menu', [$this, 'disable_comments_admin_menu']);
        add_action('init', [$this, 'disable_comments_admin_bar']);
        // add_filter( 'show_admin_bar' , [$this, 'my_function_admin_bar']);
        add_action('get_header', [$this, 'remove_admin_login_header']);

        parent::__construct();
    }

    public function my_function_admin_bar(){ return false; }

    public function remove_admin_login_header() {
        echo 'ya';exit;
        remove_action('wp_head', '_admin_bar_bump_cb');
    }

    public function disable_comments_admin_menu() {
        remove_menu_page('edit-comments.php');
        remove_menu_page('edit.php');
    }

    public function disable_comments_admin_bar() {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    }

    public function addToContext($data)
    {
        $data['is_home'] = is_home();
        $data['is_front_page'] = is_front_page();
        $data['is_logged_in'] = is_user_logged_in();

        // Get the page title, and prefix it with ' | ' if it exists (for use in html title)
        $data['wp_title'] = wp_title('|', false, 'right');

        // In Timber, you can use TimberMenu() to make a standard Wordpress menu available to the
        // Twig template as an object you can loop through. And once the menu becomes available to
        // the context, you can get items from it in a way that is a little smoother and more
        // versatile than Wordpress's wp_nav_menu. (You need never again rely on a
        // crazy "Walker Function!")
        $data['menu'] = new Menu('main-nav');
        $data['footer_menu'] = new Menu('footer-nav');

        return $data;
    }

    public function addToTwig($twig)
    {
        // this is where you can add your own functions to twig
        // $twig->addExtension(new Twig_Extension_StringLoader());
        // $twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));

        return $twig;
    }
}
