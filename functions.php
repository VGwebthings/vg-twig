<?php
if ( ! class_exists('Timber')) {
    return;
}
// require 'vendor/autoload.php';

require 'app/routes.php';
require 'includes/helpers.php';

require 'classes/Site.php';

require 'wordpress/assets.php';
require 'wordpress/rewrites.php';
require 'wordpress/wordpress.php';
