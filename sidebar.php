<?php
use Timber\Timber;

$data            = [];
$data['dynamic'] = Timber::get_widgets('sidebar');
if ( ! empty($data)) {
    Timber::render(['sidebar.twig'], $data);
}
