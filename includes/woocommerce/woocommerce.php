<?php
if ( ! class_exists('WooCommerce')) {
    return;
}
add_action('wp_enqueue_scripts', function () {
    global $product;
    if (is_singular('product') && $product->is_type('variable')) {
        wp_enqueue_script('wc-add-to-cart-variation');
    }
}, 100);
