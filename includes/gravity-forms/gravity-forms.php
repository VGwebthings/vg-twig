<?php
if ( ! class_exists('GFForms')) {
    return;
}
//add_filter('gform_confirmation_anchor', '__return_false');
//add_filter('gform_enable_shortcode_notification_message', '__return_false');
//add_filter('gform_init_scripts_footer', '__return_true');
//add_filter('gform_cdata_open', function ($content = '') {
//    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
//
//    return $content;
//});
//add_filter('gform_cdata_close', function ($content = '') {
//    $content = ' }, false );';
//
//    return $content;
//});
//add_action('wp_ajax_nopriv_vg_get_form', 'vg_get_form');
//add_action('wp_ajax_vg_get_form', 'vg_get_form');
//function vg_get_form()
//{
//    $formId = isset($_GET['form_id']) ? absint($_GET['form_id']) : 0;
//    gravity_form($formId, false, false, false, false, true);
//    wp_die();
//}
