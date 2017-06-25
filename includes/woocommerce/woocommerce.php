<?php
if ( ! class_exists('WooCommerce')) {
    return;
}
//add_action('wp_enqueue_scripts', function () {
//    global $product;
//    if (is_singular('product') && $product->is_type('variable')) {
//        wp_enqueue_script('wc-add-to-cart-variation');
//    }
//}, 100);
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
add_action('after_setup_theme', function () {
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
});
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', function () {
    echo '<div class="woocommerce-container">';
}, 10);
add_action('woocommerce_after_main_content', function () {
    echo '</div>';
}, 10);
