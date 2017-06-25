<?php
if (defined('WP_ENV') && 'production' === WP_ENV) {
    add_filter('style_loader_src', 'vg_remove_asset_version', 15, 1);
    add_filter('script_loader_src', 'vg_remove_asset_version', 15, 1);
    function vg_remove_asset_version($src)
    {
        $parts = explode('?ver', $src);

        return $parts[0];
    }
}
//add_filter('script_loader_tag', function ($tag, $handle) {
//    if ( ! is_admin()) {
//        $asyncScripts = [];
//        $deferScripts = [];
//        foreach ($asyncScripts as $asyncScript) {
//            if ($asyncScript === $handle) {
//                return str_replace(' src', ' async="async" src', $tag);
//            }
//        }
//        foreach ($deferScripts as $deferScript) {
//            if ($deferScript === $handle) {
//                return str_replace(' src', ' defer="defer" src', $tag);
//            }
//        }
//    }
//
//    return $tag;
//}, 10, 2);
//add_filter('wp_resource_hints', function ($hints, $type) {
//    /*
//    if ('prerender' === $type) {
//        $hints[] = 'https://cdnjs.cloudflare.com';
//    }
//    */
//    if ('dns-prefetch' === $type) {
//        $hints[] = '//cdn.jsdelivr.net';
//        $hints[] = '//cdnjs.cloudflare.com';
//    }
//
//    return $hints;
//}, 10, 2);
add_action('wp_enqueue_scripts', function () {
    $cacheBuster = '1.0.0';
    // remove_action('wp_head', 'wp_print_scripts');
    // remove_action('wp_head', 'wp_print_head_scripts', 9);
    // remove_action('wp_head', 'wp_enqueue_scripts', 1);
    wp_scripts()->add_data('jquery', 'group', 1);
    wp_scripts()->add_data('jquery-core', 'group', 1);
    wp_scripts()->add_data('jquery-migrate', 'group', 1);
    // wp_dequeue_style('nanga');
    // wp_dequeue_script('nanga');
    wp_enqueue_style('app', get_stylesheet_directory_uri() . '/build/app.css', false, $cacheBuster);
    // wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/build/modernizr-bundle.js', [], $cacheBuster, true);
    // wp_enqueue_script('app', get_stylesheet_directory_uri() . '/build/app.js', ['jquery'], $cacheBuster, true);
    wp_enqueue_script('app', get_stylesheet_directory_uri() . '/build/app.js', [], $cacheBuster, true);
    $options = [
        '_nonce'   => wp_create_nonce(),
        'endpoint' => admin_url('admin-ajax.php'),
    ];
    // wp_localize_script('app', 'app', $options);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);
//add_action('wp_enqueue_scripts', function () {
//    if (defined('WP_ENV') && 'development' === WP_ENV) {
//        wp_enqueue_script('html-inspector', 'http://cdnjs.cloudflare.com/ajax/libs/html-inspector/0.8.2/html-inspector.js', [], null, true);
//    }
//}, 100);
//add_action('wp_footer', function () {
//    if (defined('WP_ENV') && 'development' === WP_ENV) {
//        echo '<script>HTMLInspector.inspect({ domRoot: "body", excludeRules: ["inline-event-handlers", "script-placement", "unused-classes"], excludeElements: ["svg", "iframe", "form", "input", "textarea", "font"] });</script>';
//    }
//}, 101);
