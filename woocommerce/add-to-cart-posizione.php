remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20); 
add_action('woocommerce_after_add_to_cart_form', 'woocommerce_template_single_excerpt');
