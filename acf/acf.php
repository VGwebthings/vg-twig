<?php
add_action('acf/init', function () {
    acf_update_setting('google_api_key', '[KEY]');
});
