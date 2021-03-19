Cambiare la scritta di aggiunta al carrello su tutte le pagine e sostituirla con una icona via css e php

da inserire in funcion.php del tema:
```php
// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( '', 'woocommerce' ); 
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( '', 'woocommerce' );
}
```

da inserire nel css globale:
```css
.single_add_to_cart_button:before, .add_to_cart_button:before {
    display: inline-block;
    font-family: FontAwesome;
    content: "\f290";
    font-weight: 300;
}
```
