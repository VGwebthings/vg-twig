<?php
if ( ! class_exists('SitePress')) {
    return;
}
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
