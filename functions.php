<?php
if ( ! class_exists('Timber')) {
    return;
}
require 'vendor/autoload.php';

require 'app/routes.php';
require 'includes/helpers.php';

require 'classes/Site.php';

require 'wordpress/assets.php';
require 'wordpress/dashboard.php';
require 'wordpress/rewrites.php';
require 'wordpress/wordpress.php';

require 'acf/acf.php';
require 'gravity-forms/gravity-forms.php';
require 'wpml/wpml.php';
