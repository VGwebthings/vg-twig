<?php
add_action('acf/init', function () {
    acf_update_setting('google_api_key', '[KEY]');
});
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Settings',
        'menu_title' => 'Settings',
        'menu_slug'  => 'vg-settings',
        'redirect'   => false,
        'position'   => false,
    ]);
}
