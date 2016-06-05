<?php
use Timber\Timber;

$templates = ['archive.twig', 'index.twig'];
$data      = Timber::get_context();
if (is_day()) {
    $data['title'] = get_the_date('D M Y');
} elseif (is_month()) {
    $data['title'] = get_the_date('M Y');
} elseif (is_year()) {
    $data['title'] = get_the_date('Y');
} elseif (is_tag()) {
    $data['title'] = single_tag_title('', false);
} elseif (is_category()) {
    $data['title'] = single_cat_title('', false);
    array_unshift($templates, 'archive-' . get_query_var('cat') . '.twig');
} elseif (is_post_type_archive()) {
    $data['title'] = post_type_archive_title('', false);
    array_unshift($templates, 'archive-' . get_post_type() . '.twig');
}
$data['posts'] = Timber::get_posts();
Timber::render($templates, $data);
