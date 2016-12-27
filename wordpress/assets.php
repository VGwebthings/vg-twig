<?php
add_filter('style_loader_src', 'vg_remove_asset_version', 15, 1);
add_filter('script_loader_src', 'vg_remove_asset_version', 15, 1);
function vg_remove_asset_version($src)
{
    $parts = explode('?ver', $src);

    return $parts[0];
}

add_action('wp_enqueue_scripts', function () {
    wp_scripts()->add_data('jquery', 'group', 1);
    wp_scripts()->add_data('jquery-core', 'group', 1);
    wp_scripts()->add_data('jquery-migrate', 'group', 1);
    wp_dequeue_style('nanga');
    wp_dequeue_script('nanga');
    wp_enqueue_style('app', get_stylesheet_directory_uri() . '/build/app.css', false, null);
    wp_enqueue_script('app', get_stylesheet_directory_uri() . '/build/app.js', ['jquery'], null, true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);
