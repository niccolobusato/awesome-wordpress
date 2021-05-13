Aggiunge classe "OUT-OF-STOCK" su body tag solo per i prodotti "SOLD OUT"


```php
add_filter('body_class', 'SE_314220_custom_outofstock_class');

 function SE_314220_custom_outofstock_class ($classes) {

  global $post;
  if($post->post_type !="product")
    return $classes;
  $product = wc_get_product( $post->ID );
  if (! $product->is_in_stock() ) 
    $classes[] = 'OUT-OF-STOCK';
  return $classes;
}
```
