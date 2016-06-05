<?php
if ( ! class_exists('Timber')) {
    return;
}
use Timber\Timber;

$context          = Timber::get_context();
$context['posts'] = Timber::get_posts();
$templates        = ['index.twig'];
if (is_home()) {
    array_unshift($templates, 'home.twig');
}
Timber::render($templates, $context);

/*

is_404() ---------------------------------------------------------------------------------------------------> 404.php
is_search() ------------------------------------------------------------------------------------------------> search.php
is_front_page() --------------------------------------------------------------------------------------------> front-page.php
is_home() --------------------------------------------------------------------------------------------------> home.php

is_attachment() ---------> {mime_type}.php ------------> attachment.php ----------------\
is_single() -------------> single-{post_type}.php -----> single-{post_type}-{slug}.php --> single.php -----\
is_page() ---------------> page-{slug}.php ------------> page-{id}.php ------------------> page.php --------> singular.php

is_post_type_archive() --> archive-{post_type}.php ------------------------------------------------------\
is_tax() ----------------> taxonomy-{tax}-{slug}.php --> taxonomy-{tax}.php -------------> taxonomy.php --\
is_category() -----------> category-{slug}.php --------> category-{id}.php --------------> category.php ---\
is_tag() ----------------> tag-{slug}.php -------------> tag-{id}.php -------------------> tag.php ---------> archive.php
is_author() -------------> author-{nicename}.php ------> author-{id}.php ----------------> author.php -----/
is_date() ---------------> date.php ----------------------------------------------------------------------/
is_archive() --------------------------------------------------------------------------------------------/

*/
