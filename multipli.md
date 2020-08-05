<?php
// check that cart items quantities totals are in multiples of 6
add_action( 'woocommerce_check_cart_items', 'woocommerce_check_cart_quantities' );
function woocommerce_check_cart_quantities() {
  	$multiples = 6;
	$total_products = 0;
	foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
		$total_products += $values['quantity'];
	}
	if ( ( $total_products % $multiples ) > 0 )
		wc_add_notice( sprintf( __('You need to buy in quantities of %s products', 'woocommerce'), $multiples ), 'error' );
}

// Limit cart items with a certain shipping class to be purchased in multiple only
add_action( 'woocommerce_check_cart_items', 'woocommerce_check_cart_quantities_for_class' );
function woocommerce_check_cart_quantities_for_class() {
  	$multiples = 6;
  	$class = 'bottle';
	$total_products = 0;
	foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
		$product = get_product( $values['product_id'] );
		if ( $product->get_shipping_class() == $class ) {
			$total_products += $values['quantity'];
		}
	}
	if ( ( $total_products % $multiples ) > 0 )
		wc_add_notice( sprintf( __('You need to purchase bottles in quantities of %s', 'woocommerce'), $multiples ), 'error' );
}
?>
