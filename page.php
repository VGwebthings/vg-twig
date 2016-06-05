<?php
use Timber\Post;
use Timber\Timber;

$context         = Timber::get_context();
$post            = new Post();
$context['post'] = $post;
Timber::render(['page-' . $post->post_name . '.twig', 'page.twig'], $context);
