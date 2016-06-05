<?php
use Timber\Timber;

$timberContext = $GLOBALS['timberContext'];
if ( ! isset($timberContext)) {
    throw new \Exception('Timber context not set in footer.');
}
$timberContext['content'] = ob_get_contents();
ob_end_clean();
$templates = ['page-plugin.twig'];
Timber::render($templates, $timberContext);
