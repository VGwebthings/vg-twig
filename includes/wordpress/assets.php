<?php
add_filter('style_loader_src', 'vg_remove_asset_version', 15, 1);
add_filter('script_loader_src', 'vg_remove_asset_version', 15, 1);
function vg_remove_asset_version($src)
{
    $parts = explode('?ver', $src);

    return $parts[0];
}

add_filter('script_loader_tag', function ($tag, $handle) {
    if ( ! is_admin()) {
        $asyncScripts = [];
        $deferScripts = [];
        foreach ($asyncScripts as $asyncScript) {
            if ($asyncScript === $handle) {
                return str_replace(' src', ' async="async" src', $tag);
            }
        }
        foreach ($deferScripts as $deferScript) {
            if ($deferScript === $handle) {
                return str_replace(' src', ' defer="defer" src', $tag);
            }
        }
    }

    return $tag;
}, 10, 2);
add_action('wp_enqueue_scripts', function () {
    wp_scripts()->add_data('jquery', 'group', 1);
    wp_scripts()->add_data('jquery-core', 'group', 1);
    wp_scripts()->add_data('jquery-migrate', 'group', 1);
    wp_dequeue_style('nanga');
    wp_dequeue_script('nanga');
    wp_enqueue_style('app', get_stylesheet_directory_uri() . '/build/app.css', false, null);
    /*
    if ($is_IE) {
        wp_enqueue_style('ie', get_stylesheet_directory_uri() . '/css/_ie.css', ['app']);
        $wp_styles->add_data('ie', 'conditional', 'IE');
    }
    */
    wp_enqueue_script('app', get_stylesheet_directory_uri() . '/build/app.js', ['jquery'], null, true);
    $options = [
        '_nonce'   => wp_create_nonce(),
        'endpoint' => admin_url('admin-ajax.php'),
    ];
    wp_localize_script('app', 'app', $options);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);
//add_action('wp_head', function () {
//    echo '<style>.not-ready{opacity:0;}</style>';
//});
