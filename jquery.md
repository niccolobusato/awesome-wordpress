# jquery 

### Replace placeholder with jquery 
(probably your theme will forces you tu use "$j" instead
```js
$('#this_is_your_id').attr('placeholder','Your New Text');
```

### move description before image on single product page
(probably your theme will forces you tu use "$j" instead
```js
jQuery( function($) {
  mobile = $(window).width();
  if ( mobile <= 480 ){
    jQuery( "div.woocommerce-product-details__short-description" ).insertBefore( ".woocommerce-product-gallery" );
  }
} );
```

### applica css in funzione dello stato del carrello
```js
add_action( 'wp_footer', 'x_hide_cart' );
function x_hide_cart(){
	if ( WC()->cart->get_cart_contents_count() == 0 ) {
		?>
		<style type="text/css">div.top_bar_right{display: none !important;}</style>
		<?php
	}
}
```
