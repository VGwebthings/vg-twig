<?php
use Timber\Timber;
use Timber\User;

global $wp_query;
$data          = Timber::get_context();
$data['posts'] = Timber::get_posts();
if (isset($query_vars['author'])) {
    $author         = new User($wp_query->query_vars['author']);
    $data['author'] = $author;
    $data['title']  = $author->name();
}
Timber::render(['author.twig', 'archive.twig'], $data);
