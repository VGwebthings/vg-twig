<?php
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
//add_filter('wpml_hide_management_column', '__return_false');
add_action('admin_head', function () {
    echo '<style>#wp-admin-bar-WPML_ALS > div:first-child:before{content:"\\f326";}#wp-admin-bar-WPML_ALS img{display:none!important;}</style>';
});
function vg_language_switcher()
{
    $languages = apply_filters('wpml_active_languages', null, ['skip_missing' => 0]);
    if ( ! empty($languages)) {
        echo '<div class="language-switcher">';
        foreach ($languages as $language) {
            if ($language['active']) {
                echo '<span>' . $language['native_name'] . '</span>';
            }
        }
        echo '<ul class="languages">';
        foreach ($languages as $language) {
            if ( ! $language['active']) {
                echo '<li><a href="' . $language['url'] . '">' . $language['native_name'] . '</a></li>';
            }
        }
        echo '</ul>';
        echo '</div>';
    }
}
