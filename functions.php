<?php
if ( ! class_exists('Timber')) {
    return;
}
require_once 'vendor/autoload.php';

require_once 'app/routes.php';
require_once 'includes/helpers.php';
require_once 'includes/analytics.php';

require_once 'includes/wordpress/assets.php';
require_once 'includes/wordpress/dashboard.php';
require_once 'includes/wordpress/mailer.php';
require_once 'includes/wordpress/rewrites.php';
require_once 'includes/wordpress/wordpress.php';

require_once 'includes/acf/acf.php';
require_once 'includes/gravity-forms/gravity-forms.php';
require_once 'includes/nanga/nanga.php';
require_once 'includes/woocommerce/woocommerce.php';
require_once 'includes/wpml/wpml.php';

require_once 'classes/Site.php';
$app = new App();
