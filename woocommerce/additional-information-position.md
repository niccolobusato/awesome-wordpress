### Move additional information from product tab under add to cart button 
```php
// Remove additional information tab
add_filter( 'woocommerce_product_tabs', 'remove_additional_information_tab', 100, 1 );
function remove_additional_information_tab( $tabs ) {
    unset($tabs['additional_information']);

    return $tabs;
}

// Add "additional information" after add to cart
add_action( 'woocommerce_single_product_summary', 'additional_info_under_add_to_cart', 35 );
function additional_info_under_add_to_cart() {
    global $product;

    if ( $product && ( $product->has_attributes() || apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
        wc_display_product_attributes( $product );
    }
}
```
