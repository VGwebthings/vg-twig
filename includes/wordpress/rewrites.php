<?php
add_filter('author_rewrite_rules', function ($rules) {
    return [];
});
add_filter('comments_rewrite_rules', function ($rules) {
    return [];
});
add_filter('date_rewrite_rules', function ($rules) {
    return [];
});
add_filter('search_rewrite_rules', function ($rules) {
    return [];
});
add_filter('rewrite_rules_array', function ($rules) {
    foreach ($rules as $rule => $rewrite) {
        /*
        if (preg_match('/.*category_name=/', $rewrite)) {
            unset($rules[$rule]);
        }
        if (preg_match('/.*tag=/', $rewrite)) {
            unset($rules[$rule]);
        }
        */
        if (preg_match('/.*post_format=/', $rewrite)) {
            unset($rules[$rule]);
        }
        if (preg_match('/.*tb=1/', $rewrite)) {
            unset($rules[$rule]);
        }
        if (preg_match('/.*cpage=/', $rewrite)) {
            unset($rules[$rule]);
        }
        if (preg_match('/.*attachment=/', $rewrite)) {
            unset($rules[$rule]);
        }
    }

    return $rules;
});

remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
add_filter('rewrite_rules_array', function ($rules) {
    foreach ($rules as $rule => $rewrite) {
        if (preg_match('/.*embed=/', $rewrite)) {
            unset($rules[$rule]);
        }
    }

    return $rules;
});
