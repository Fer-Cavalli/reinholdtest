<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<section id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<section class="product__single">
		<div class="container">
		<?php woocommerce_breadcrumb(); ?>
			<div class="product__single__top">
				<div class="product__single__top__left">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>
				
				<div class="product__single__top__right">
					<h2 class="product_title"><?php the_title(); ?></h2>
					<?php $designers = get_field('designers');
					if($designers):?>
						<h4 class="product__designer"><?php echo get_the_title($designers); ?></h4> 
					<?php endif;?>
					
					<?php 
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );
					?>
					<div class="product__description">
						<h4 class="product__description__title h6"><strong>Description & Details</strong></h4>
						<?php the_content(); ?>

						<div class="read_more">
							<div class="products_details">Products Details</div>

							<!-- <div class="products_details__cont">
								<span class="title_left">Product Title</span>
								<span class="title_right"><?php the_title(); ?></span>
							</div>
							<div class="products_details__cont">
								<span class="title_left">Description</span>
								<span class="title_right"><?php the_content(); ?></span>
							</div> -->
							<div class="products_details__cont">
								<span class="title_left">SKU</span>
								<span class="title_right"><?php echo $product->get_sku(); ?></span>
							</div>
							<div class="products_details__cont">
								<span class="title_left">Materials</span>
								<?php $product = wc_get_product();
								$customsattributes = $product->get_attribute( 'materials' );?>
								<span class="title_right"><?php echo "" . $customsattributes . "";?></span>
							</div>
							<?php if ($product_get_dimensions = $product->get_dimensions()):?>
								<div class="products_details__cont">
									<span class="title_left">Dimensions</span>
									<span class="title_right"><?php echo $product_get_dimensions; ?></span>
								</div>
							<?php endif;?>
							<div class="products_details__cont">
								<span class="title_left">Gemstones</span>
								<?php $product = wc_get_product();
								$customsattributes = $product->get_attribute( 'Gemstones' );?>
								<span class="title_right"><?php echo "" . $customsattributes . "";?></span>
							</div>
						</div>

						<ul class="product__description__links">
							<?php if( $link = get_field('order_by_phone', 'options')): ?>
								<li><a class="order_by_phone" href="<?php echo $link['url']; ?>" target="<?php echo ($link['target'] == '_blank')? '_blank':'_self'; ?>"><?php echo $link['title']; ?></a></li>
							<?php endif; 
							$title_contact = get_field('title_contact', 'options');
							$url_contact  = get_field('url_contact', 'options');
							if($title_contact && $url_contact): ?>
								<a href="<?php echo add_query_arg('product_id', get_the_ID(), $url_contact); ?>" target="_blank"><li><?php echo $title_contact; ?></li></a>
							<?php endif; 
							if( $link = get_field('book_an_appointmen', 'options')): ?>
								<li><a class="book_an_appointmen" href="<?php echo $link['url']; ?>" target="<?php echo ($link['target'] == '_blank')? '_blank':'_self'; ?>"><?php echo $link['title']; ?></a></li>
							<?php endif; ?>
							<?php echo ($drop_a_hint = get_field('drop_a_hint', 'options'))? '<li>'.'<button class="js-open-popup">'.$drop_a_hint.'</button>'.'</li>':''; ?>
						</ul>
						<?php if( $product->get_sku() )
							echo '<span class="sku_wrapper">REF. '. $product->get_sku() .'</span>';?>

					<?php if($designers):?>
						<div class="designer__box">
							<p class="designer__box__uppertitle"><strong>Designer Profile </strong></p>
							<h4 class="designer__box__title"><?php echo get_the_title($designers); ?></h4>
							<?php echo (has_post_thumbnail($designers))? '<a  href="'.get_the_permalink($designers).'" class="designer__box__image"><div class="image-background"><img src="'.get_the_post_thumbnail_url($designers).'" alt="'.get_the_title($designers).'" /></div></a>':''; ?>
							<?php echo ($designer_short_bio = get_field('designer_short_bio',$designers))? '<div class="designer__box__bio">'.$designer_short_bio.'</div>':''; ?>
							<a href="<?php echo get_the_permalink($designers); ?>">See More Work ></a>
						</div>
					<?php endif;?>
					</div>				
				</div>
				<?php get_template_part('modules/components/form_drop');?>
			</div>

			<div class="product__single__bottom">
				<?php
				/**
				 * Hook: woocommerce_after_single_product_summary.
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				do_action( 'woocommerce_after_single_product_summary' );
				?>
			</div>
		</div>
	</section>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>