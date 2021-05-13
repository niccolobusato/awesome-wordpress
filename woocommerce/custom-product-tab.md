### Custom tab on product page
```php
/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab'] = array(
		'title' 	=> __( 'Your Custom Title', 'woocommerce' ),
		'priority' 	=> 15,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}
function woo_new_product_tab_content() {

	// The new tab content

	echo '<h2>Title</h2>';
	echo '<p>Description</p>';
    echo '<img src="yourimage.png" alt="Text">';	
}
```


### Another custom tab on product page
```php
/**
 * Add another custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab_2' );
function woo_new_product_tab_2( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab2'] = array(
		'title' 	=> __( 'Your Custom Title 2', 'woocommerce' ),
		'priority' 	=> 30,
		'callback' 	=> 'woo_new_product_tab_2_content'
	);

	return $tabs;

}
function woo_new_product_tab_2_content() {

	// The new tab content

	echo '<h2>Title</h2>';
	echo '<p>Description.</p>';
    echo '<img src="yourimage.jpg" alt="Text">';
	
}
```
