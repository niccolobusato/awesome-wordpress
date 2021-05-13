# Quando si seleziona il pagamento alla consegna nascondi gli altri metodi di pagamento 

Per abilitare il metodo "contrassegno" è necessario utilizzare un metodo di spedizione. 

"COD" sta a significare "Cash on delivery" ovvero "pagamento alla consegna".
"BACS" sta a significare "Bonifico"


Configurato per disattivare:
Paypal - Stripe - Bonifico


```php 
add_filter( 'woocommerce_available_payment_gateways', 'appartment_gateway_disable_shipping' );
  
function appartment_gateway_disable_shipping( $available_gateways ) {
     
   if ( ! is_admin() ) {
        
      $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
        
      $chosen_shipping = $chosen_methods[0];
        
      if ( isset( $available_gateways['cod'] ) && 0 === strpos( $chosen_shipping, 'flat_rate' ) ) {
         unset( $available_gateways['paypal'] );
	 unset( $available_gateways['stripe'] );
	 unset( $available_gateways['bacs'] );
      }
        
   }
     
   return $available_gateways;
     
}
```
