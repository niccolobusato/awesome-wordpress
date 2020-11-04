/**
 * CUSTOM CSS
 */
 
add_action('admin_head', 'my_custom_fonts'); // admin_head is a hook my_custom_fonts is a function we are adding it to the hook

function my_custom_fonts() {
  echo '<style>
    
    add style here!!
    
  </style>';
}
