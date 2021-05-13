### rimuove alcune voci dal form di checkout
```php
//
//
add_filter( 'woocommerce_checkout_fields' , 'custom_mod_checkout_fields' );
function custom_mod_checkout_fields( $fields ) {
unset($fields['billing']['billing_company']); // Azienda
unset($fields['order']['order_comments']); // Commenti ordine
return $fields;
}
```
