Nascondi alcune zone della pagina di inserimento prodotto per semplificare la gestione back-end

si applica via css

```php
/**
 * CUSTOM CSS
 */
 
add_action('admin_head', 'my_custom_fonts'); // admin_head is a hook my_custom_fonts is a function we are adding it to the hook

function my_custom_fonts() {
  echo '<style>
    

	div.composer-switch{display:none;}
	li.shipping_options.shipping_tab, li.linked_product_options.linked_product_tab, li.advanced_options.advanced_tab, li.c4d-woo-bundle-tab-title {display:none!important;}
	 div#wp-content-wrap { display:none;}
	 div#tagsdiv-product_tag { display:none;}
    div#c4d-woo-vs-color {display:none;}
  </style>';
}
```
