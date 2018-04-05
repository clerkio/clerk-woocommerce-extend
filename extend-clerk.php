<?php
/**
 * Plugin Name: Extend Clerk
 * Plugin URI: https://clerk.io/
 * Description: Extend the Clerk.io WooCommerce plugin
 * Version: 1.0.0
 * Author: Clerk.io
 * Author URI: https://clerk.io
 * License: MIT
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Add additional attributes to clerk product synchronization
 *
 * The filter received the product array and the WooCommerce product
 *
 * @param array $productArray
 * @param WC_Product $product
 * @return array
 */
function addClerkProductAttributes($productArray, $product) {
    //Add a custom slug attribute
    $productArray['slug'] = $product->get_slug();

    //Add stock status
    $productArray['stock_status'] = $product->get_stock_status();

    return $productArray;
}
add_filter('clerk_product_array', 'addClerkProductAttributes', 10, 3);
