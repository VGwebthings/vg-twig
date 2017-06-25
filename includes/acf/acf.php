<?php
if ( ! function_exists('acf_add_options_page')) {
    return;
}
if (defined('GOOGLE_API_KEY')) {
    add_action('acf/init', function () {
        acf_update_setting('google_api_key', GOOGLE_API_KEY);
    });
}
acf_add_options_page([
    'capability' => 'edit_pages',
    'menu_slug'  => 'vg-settings',
    'menu_title' => __('Settings', 'nanga'),
    'page_title' => __('Settings', 'nanga'),
    'position'   => false,
    'redirect'   => false,
]);
