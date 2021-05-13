### Aggiunge "mancano ancora" banner per spedizione gratuita
```php
add_action( 'woocommerce_before_cart', 'bbloomer_free_shipping_cart_notice' );
  
function bbloomer_free_shipping_cart_notice() {
  
   $min_amount = 97; //change this to your free shipping threshold
   
   $current = WC()->cart->subtotal;
  
   if ( $current < $min_amount ) {
      $added_text = 'Ottieni la spedizione, gratuita aggiungi altri ' . wc_price( $min_amount - $current ) . ' al tuo carrello!';
      $return_to = wc_get_page_permalink( 'shop' );
      $notice = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), 'Continua lo Shopping', $added_text );
      wc_print_notice( $notice, 'notice' );
   }
  
}
```
