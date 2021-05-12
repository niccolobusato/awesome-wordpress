# Aggiungi icona utente con link a "mio-account" sull'header del sito



il file dovrà chiamarsi esattamente: " ```menu_user.php``` "

dovrà essere inserito in (parts/elements/menu_user.php)

```php
<div class="cuser-menu">
	<a href="https://sitename.com/mio-account/" class="cart btn-round btn-round-light dark-mode-reset">
		<i class="ion">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 16" height="16" width="16">
  			<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
			</svg>
		</i>
	</a>
</div>
```

# Mostralo 
per essere visualizzato deve essere dichiarato in ```menu_optional.php``` che si trova in (parts/elements/menu_optional.php)

```php
<li>
	<?php get_template_part( 'parts/elements/menu_user' ); ?>
</li>
```

qui il file completo:

```php
<?php
	$have_woocomerce = function_exists( 'WC' );
	$have_woocomerce_wl = function_exists( 'YITH_WCWL' );
	$have_wpml = function_exists( 'icl_get_languages' );
	$search_position = OhioOptions::get( 'page_header_search_position', 'standard' );
	$wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
	$cart_visible = OhioOptions::get_global( 'woocommerce_cart_icon', true );
	$header_style = OhioOptions::get_global( 'page_header_menu_style', 'style1' );
	$header_button = OhioOptions::get_global( 'custom_button_for_header', false );
?>

<?php if (( $have_wpml && $wpml_show_in_header ) || $have_woocomerce || $have_woocomerce_wl || $header_button || $search_position == "standard" ) : ?>

<ul class="menu-optional">
	<li class="btn-optional-holder">
		<?php get_template_part( 'parts/elements/menu_button' ); ?>
	</li>
	<?php if ( $search_position == "standard" ) : ?>
		<li>
			<?php get_template_part( 'parts/elements/search' );?>
		</li>
	<?php endif; ?>
	<?php if ( $have_woocomerce ) : ?>
		<?php if ( $cart_visible ) : ?>
			<?php if ($have_woocomerce_wl) : ?>
				<li>
					<a class="btn-round btn-round-light dark-mode-reset favorites-global wishlist" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url('user' . '/' . get_current_user_id())); ?>">
						<i class="icon ion ion-md-heart-empty"></i>
					</a>
				</li>
			<?php endif; ?>
		<li>
			<?php get_template_part( 'parts/elements/menu_user' ); ?>
		</li>
		<li>
			<?php get_template_part( 'parts/elements/menu_cart' ); ?>
		</li>
		<?php endif; ?>
	<?php endif; ?>
</ul>
<?php endif; ?>
```


# CSS

aggiungere lo stile per mostrarlo correttamente sul css globale:
```css
.cuser-menu {margin-left:8px;}
```
