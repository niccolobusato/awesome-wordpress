/**
 * CUSTOM CSS - User Role
 */
 
add_action('admin_head', 'my_custom_fonts'); // admin_head is a hook my_custom_fonts is a function we are adding it to the hook
 
function my_custom_fonts() {
	if( current_user_can('administrator') ) {
 			 echo '<style>
  					#nientediniente {display:none!important;}
  					</style>';}
	else {
    		echo '<style>
				
  					</style>';
}}
