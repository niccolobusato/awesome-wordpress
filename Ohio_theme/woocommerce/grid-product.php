<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $iteration, $grid_type;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}


$masonry_layout = OhioOptions::get_global( 'woocommerce_masonry_layout', true );

$li_class = '';
if ( $masonry_layout ) {
	$li_class .= ' masonry-block grid-item';
}


$double_width = OhioOptions::get_local( 'product_style_in_grid' );

if ($double_width == "2col") {
    $li_class .= " double_width";
}
$wrap_classes = [];

$hover_effect = OhioOptions::get_global( 'shop_item_hover_type' );
$parallax_class = "";

switch ($hover_effect) {
    case 'type2':
        $wrap_classes[] = 'hover-color-overlay';
        break;
    case 'type3':
        $wrap_classes[] = 'hover-greyscale';
        break;
    case 'type4':
        break;
    default:
        $wrap_classes[] = 'hover-scale-img';
        break;
}

$show_price = OhioOptions::get_global( 'woocommerce_shop_price_visibility' );
$show_category = OhioOptions::get_global( 'woocommerce_shop_category_visibility' );
$use_boxed_layout = OhioOptions::get_global( 'product_items_boxed_style' );
if ( $use_boxed_layout ) {
	$wrap_classes[] = 'product-item-boxed';
}
$masonry_layout = false;
$_anim_attrs = '';
$masonry_layout = OhioOptions::get_global( 'woocommerce_masonry_layout', true );
if ( $masonry_layout ) {
	$animation_type = OhioOptions::get( 'page_animation_type', 'default' );
	$animation_effect = OhioOptions::get( 'page_animation_effect', 'fade-up' );
	$animation_once = OhioOptions::get( 'page_animation_once' );
	$columns_num = OhioOptions::get_global( 'woocommerce_products_on_page', 24 );

	$products_in_row = OhioOptions::get_global( 'woocommerce_products_in_row' );

	if ( is_string( $products_in_row ) ) {
	    $products_in_row = json_decode( $products_in_row );
	}

	if( $products_in_row == NULL ){
	    $products_in_row = (object) array(
	        "large" => "3",
	        "medium" => "2",
	        "small" => "2"
	    );
	}

    if ( in_array( $animation_type, array( 'sync', 'async' ) ) ) {
		OhioHelper::add_required_script( 'aos' );

		if (!$animation_once) {
			$_anim_attrs .= ' data-aos-once=true';
		}
		$_anim_attrs .= ' data-aos=' . $animation_effect . '';
		if ( $animation_type == 'async' ) {
			$columns_num = (int) substr( $products_in_row->large, 0, 1 );
			if ( $columns_num <= 0 ) { $columns_num = 1; }
			$_delay = ( 400 / $columns_num ) * ( $iteration % $columns_num );
			$_delay = (int) $_delay - ( $_delay % 50 );
			$_anim_attrs .= ' data-aos-delay=' . $_delay . '';
		}
	}
}

$photos_count = OhioOptions::get_global( 'woocommerce_product_images_count', 2 );
$text_align = OhioOptions::get_global( 'woocommerce_text_alignment', 'left' );
$quickview_btn = OhioOptions::get_global( 'woocommerce_quickview_button', true );

$wrap_classes[] = 'text-' . $text_align;

?>

<li <?php post_class( $li_class ); ?> data-product-item="true" data-lazy-item="" data-lazy-scope="products" <?php echo esc_html( $_anim_attrs ); ?>>
	<div class="product-item product-item-grid <?php echo implode( ' ', $wrap_classes ); ?>"> <!-- product-item-boxed -->
		<div class="product-item-thumbnail">

			<!-- Lightbox trigger -->
			<?php if ( $quickview_btn || is_null($quickview_btn) ): ?>
				<div class="btn-lightbox btn-round btn-round-outline btn-round-small btn-round-outline quickview-link" tabindex="1" data-product-id="<?php echo esc_attr($product->get_id()) ?>">
					<i class="ion ion-md-expand"></i>
				</div>
			<?php endif; ?>

			<!-- CTA buttons -->
			<div class="product-buttons">
				<div class="product-buttons-item">
					<?php
						$classes = '';
						if (! $product->managing_stock() && ! $product->is_in_stock())
						$classes = 'out-of-stock';
						echo apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s product_type_%s single_add_to_cart_button btn-loading-disabled btn btn-small %s">%s</a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->get_id() ),
						esc_attr( $product->get_sku() ),
						$product->is_purchasable() ? 'add_to_cart_button' : '',
						esc_attr( $product->get_type() ),
						$classes,
						esc_html( $product->add_to_cart_text() )
					),
					$product );
					?>

					<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
					<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
					<input type="hidden" name="variation_id" class="variation_id" value="0" />

				</div>

				<?php if ( function_exists( 'YITH_WCWL' ) ) {
					echo do_shortcode( '<div class="product-buttons-item">[yith_wcwl_add_to_wishlist]</div>' );
				}?>
			</div>

			<?php woocommerce_show_product_loop_sale_flash(); ?>

			<div class="slider" data-cursor-class="cursor-link dark-color">
				<?php if ($hover_effect == 'type4'): ?>
					<div class="parallax-holder main-img">
						<a class="parallax" href="<?php echo esc_url( get_post_permalink() ); ?>">
							<?php echo woocommerce_get_product_thumbnail();?>
						</a>
					</div>
	                <?php
	                $attachment_ids = $product->get_gallery_image_ids();
	                $i = 1;
	                foreach ( $attachment_ids as $attachment_id ) {
	                    $i++;
	                    if($i > $photos_count) {
	                        break;
	                    } ?>
	                    <div class="parallax-holder">
							<a class="parallax" href="<?php echo esc_url( get_post_permalink() ); ?>">
								<?php echo wp_get_attachment_image( $attachment_id, 'woocommerce_thumbnail' ); ?>
							</a>
	                    </div>
						<?php
					}
					?>
				<?php else:  ?>
					<a class="<?php echo esc_attr( $parallax_class ); ?>" href="<?php echo esc_url( get_post_permalink() ); ?>">
						<?php echo woocommerce_get_product_thumbnail();?>
					</a>
	                <?php
	                $attachment_ids = $product->get_gallery_image_ids();
	                $i = 1;
	                foreach ( $attachment_ids as $attachment_id ) {
	                    $i++;
	                    if($i > $photos_count) {
	                        break;
	                    } ?>
						<a class="<?php echo esc_attr( $parallax_class ); ?>" href="<?php echo esc_url( get_post_permalink() ); ?>">
							<?php echo wp_get_attachment_image( $attachment_id, 'woocommerce_thumbnail' ); ?>
						</a>
						<?php
					}
					?>
				<?php endif; ?>
			</div>
		</div>

		<?php
		/**
		* woocommerce_after_shop_loop_item hook.
		*
		* @hooked woocommerce_template_loop_product_link_close - 5
		* @hooked woocommerce_template_loop_add_to_cart - 10
		*/
		?>
		<div class="product-item-details">
			<h3 class="product-item-title">
				<a href="<?php echo esc_url( get_post_permalink() ); ?>" class="color-dark">
					<?php echo esc_attr( get_post( $product->get_id() )->post_title ); ?>
				</a>
			</h3>
            
			<?php if ( $show_category ) : ?>
				<div class="product-item-category category-holder">
				<?php
					$categories = explode(', ', wc_get_product_category_list( $product->get_id() ) );
					$categories = array_filter( $categories );
					$i = 0;
					if ( !empty( $categories ) ) :
						foreach ( $categories as $category ):
				?>
					<?php echo preg_replace('/(<a)(.+\/a>)/i', '${1} class="category" ${2}', $category);?>
				<?php
						endforeach;
					endif;
				?>
				</div>
			<?php endif; ?>
			<p class="product-item-title2">
				<strong>Codice rif.</strong>
				<?php $skup = $product->get_sku();
				  echo $skup;?><br>
			</p>
			

			<?php if ( $show_price ) : ?>
				<div class="product-item-price">
					<?php echo wp_kses($product->get_price_html(), 'default'); ?>
				</div>
			<?php endif; ?>
			<p class="product-item-title2">
				<strong>Costruttore:</strong>
				<?php $costruttore = $product->get_attribute('costruttore');
				  echo $costruttore;?><br>
				<strong>Anno:</strong>
				<?php $anno = $product->get_attribute('anno');
				  echo $anno;?><br>
				<strong>Alimentazione:</strong>
				<?php $alimentazione = $product->get_attribute('alimentazione');
				  echo $alimentazione;?><br>
				<strong>Tipologia:</strong>
				<?php $tipologia = $product->get_attribute('tipologia');
				  echo $tipologia;?><br>
				<strong>Portata:</strong>
				<?php $portata = $product->get_attribute('portata');
				  echo $portata;?><br>
				<strong>Sollevamento:</strong>
				<?php $sollevamento = $product->get_attribute('sollevamento');
				  echo $sollevamento;?><br>
			</p>
		</div>
	</div>
</li>
