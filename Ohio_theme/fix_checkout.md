# Coupon in posizione corretta

codice da inserire in funcion.php del tema

sposta il box di inseriemento del codice coupon in alto.

```php
add_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 25 );
 
remove_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
```


da inserire nel css per aggiungere il margine mancante sotto al box coupon

```css
.woocommerce-form-coupon-toggle {margin-bottom:20px;}
```
