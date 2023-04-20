<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );?>
<section class="hero hero--simple">
	<div class="container">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<div class="hero__title site__title h3"><?php woocommerce_page_title(); ?></div>
		<?php endif;
		/**
		 * Hook: woocommerce_before_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
		?>
		<?php
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		do_action( 'woocommerce_archive_description' );
		?>
	</div>
</section>
<secton class="shop__archive" >
	<div class="container">

		<div class="shop__archive__filters">
			<div class="filters" id="filters">
				<?php
					/**
					 * Hook: woocommerce_sidebar.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					//do_action( 'woocommerce_sidebar' );
				?>
				<?php echo do_shortcode('[yith_wcan_filters slug="default-preset"]'); ?>

			</div>
			<?php
			if ( woocommerce_product_loop() ) {
				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			} ?>
		</div>
		
		<?php $count = wc_get_loop_prop( 'total' ); ?>
		<div class="shop__archive__content shop__archive__content--<?php echo $count; ?>">
			<?php
			if ( woocommerce_product_loop() ) {

				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
			?>
		</div>
		<div class="back-to-top__cont">
			<a class="back-to-top" href="#filters">Back To Top</a>
		</div>
		<?php $term = get_queried_object(); ?>
		<?php if($posts = get_field('featured_designers', $term)): ?>
		<?php if( !empty($posts) ): ?>
			<div class="grid grid--designers">
				<div class="container">
					<?php echo ($designers_title = get_field('designers_title', 'options'))? '<h3 class="grid__title site__title">'.$designers_title.'</h3>':''; ?>
					<div class="grid__cont">
						<?php foreach( $posts as $designer ): ?>
							<?php get_template_part('modules/blocks/designers/item',null,['designer' => $designer->ID]); ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>     
	</div>  
</section> 

<?php get_footer( 'shop' ); ?>