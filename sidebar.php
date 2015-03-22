<?php
$data            = array();
$data['dynamic'] = Timber::get_widgets( 'sidebar' );
if ( ! empty( $data ) ) {
    Timber::render( array( 'sidebar.twig' ), $data );
}
