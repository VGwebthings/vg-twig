<?php
use Timber\Helper;
use Timber\Post;
use Timber\Timber;

$context         = Timber::get_context();
$post            = new Post();
$context['post'] = $post;
if (comments_open()) {
    $context['comment_form'] = Helper::get_comment_form();
}
if (post_password_required($post->ID)) {
    Timber::render(['single-password.twig'], $context);
} else {
    Timber::render(['single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'], $context);
}
