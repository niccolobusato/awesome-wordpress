/** 
 * test
 **/

    function exclude_specific_tag( $q ) {
    if (is_shop() || is_product_category()) {
        $tax_query = (array) $q->get( 'tax_query' );
        $tax_query[] = array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => array( 'outlet' ), // tag name to hide ''
            'operator' => 'NOT IN'
        );
        $q->set( 'tax_query', $tax_query );
    }
}
add_action( 'woocommerce_product_query', 'exclude_specific_tag' );
