## Aggiungi una voce personalizzata con comando personalizzato 

### è stato utilizzato per segnare velocemente un ordine come inserito in sda (inserito-in-sda) che possiede lo slug (wc-inserito-in-sda)

```php
/**
 * Azione personalizzata
 *
 */
add_filter( 'woocommerce_admin_order_actions', 'add_custom_order_status_actions_button', 100, 2 );
function add_custom_order_status_actions_button( $actions, $order ) {

    if ( $order->has_status( array( 'processing' ) ) ) {

        // The key slug defined for your action button
        $action_slug = 'inserito-in-sda';
         $status = $_GET['status'];
         $order_id = method_exists($the_order, 'get_id') ? $the_order->get_id() : $the_order->id;
        // Set the action button
        $actions[$action_slug] = array(
            'url'       => wp_nonce_url(admin_url('admin-ajax.php?action=woocommerce_mark_order_status&status=inserito-in-sda'.$status.'&order_id='. $order->get_id()), 'woocommerce-mark-order-status'),
							
            'name'      => __( 'SDA', 'woocommerce' ),
            'action'    => $action_slug,
        );
    }
    return $actions;
}


add_action( 'admin_head', 'add_custom_order_status_actions_button_css' );
function add_custom_order_status_actions_button_css() {
    $action_slug = "inserito-in-sda"; // The key slug defined for your action button

    echo '<style>.wc-action-button-'.$action_slug.'::after { font-family: woocommerce !important; content: "\e029" !important; }</style>';
}
```
