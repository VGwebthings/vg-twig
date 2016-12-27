<?php
add_action('after_setup_theme', function () {
    //add_theme_support('nanga-analytics');
    //add_theme_support('nanga-asset-cachebusting');
    //add_theme_support('nanga-cdn-assets');
    //add_theme_support('nanga-debug-assets');
    //add_theme_support('nanga-deploy');
    //add_theme_support('nanga-disable-categories');
    //add_theme_support('nanga-disable-posts');
    //add_theme_support('nanga-disable-revisions');
    //add_theme_support('nanga-disable-tags');
    //add_theme_support('nanga-js-to-footer');
    //add_theme_support('nanga-mobile-check');
    //add_theme_support('nanga-modernizr');
    //add_theme_support('nanga-sanity');
    //add_theme_support('nanga-settings');
    //add_theme_support('nanga-sidebar');
    //add_theme_support('nanga-support-request');
    //add_theme_support('nanga-white-label-login');
    //add_theme_support('woocommerce');
    add_theme_support('nanga-disable-comments');
    load_theme_textdomain('vg', get_stylesheet_directory() . '/languages');
});
if (current_theme_supports('nanga-sidebar')) {
    add_action('widgets_init', function () {
        register_sidebar([
            'name'          => 'Sidebar',
            'id'            => 'sidebar',
            'before_widget' => '<aside class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5>',
        ]);
    });
}
