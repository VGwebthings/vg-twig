<?php /* Template Name: Home */
use Timber\Post;
use Timber\Timber;

$context         = Timber::get_context();
$post            = new Post();
$context['post'] = $post;
Timber::render(['template-home.twig'], $context);
