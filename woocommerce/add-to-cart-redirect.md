### Do not re-add products to cart when refresh the page
```php
// Do not re-add products to cart when refresh the page
add_action( 'woocommerce_add_to_cart_redirect', 'theme_slug_child_variation_link' );
function theme_slug_child_variation_link() {
    if( isset( $_SERVER[ 'HTTP_REFERER' ] ) ) {
        return $_SERVER[ 'HTTP_REFERER' ];
    }

}
```
