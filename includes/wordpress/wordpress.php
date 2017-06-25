<?php
add_action('after_setup_theme', function () {
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    // add_theme_support('widgets');
    add_theme_support('woocommerce');
    load_theme_textdomain('vg', get_stylesheet_directory() . '/languages');
    register_nav_menus([
        'primary' => 'Primary Menu',
        'footer'  => 'Footer Menu',
    ]);
});
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
