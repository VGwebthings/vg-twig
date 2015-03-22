<?php
if ( ! class_exists( 'Timber' ) ) {
    return;
}
//$start               = TimberHelper::start_timer();
$context               = Timber::get_context();
$context['posts']      = Timber::get_posts();
$context['pagination'] = get_the_posts_pagination( array(
    'prev_text'          => __( 'Previous page', 'vg' ),
    'next_text'          => __( 'Next page', 'vg' ),
    'before_page_number' => __( 'Page', 'vg' ) . ' ',
) );
$templates             = array( 'index.twig' );
if ( is_home() ) {
    array_unshift( $templates, 'home.twig' );
}
Timber::render( $templates, $context, $context['opcode'] );
//var_dump( TimberHelper::stop_timer( $start ) );
