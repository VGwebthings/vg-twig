<?php
//Routes::map('experiments', function ($params) {
//    if ( ! current_user_can('manage_options')) {
//        wp_redirect(home_url());
//        exit;
//    }
//    var_dump($params);
//    Routes::load('template-experiments.php', $params, false, 200);
//});
Routes::map('webmail', function ($params) {
    wp_redirect('https://apps.rackspace.com/');
    exit;
});
