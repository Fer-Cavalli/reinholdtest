<?php
/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}
if(is_woocommerce_activated()):
	function mytheme_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		//add_theme_support( 'wc-product-gallery-slider' );
	}
	add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

	add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
		return array(
		'width' => 400,
		'height' => 400,
		'crop' => 1,
		);
	} );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close' );
	add_action('woocommerce_after_shop_loop_item_a','woocommerce_template_loop_product_link_close',5);

	remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
	add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',5);
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
	remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);
	remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
	remove_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display');
	add_action('woocommerce_shop_loop_item_title','woocommerce_template_single_excerpt',12);	
	add_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display',11);

	add_action( 'woocommerce_single_product_summary', function() { ?>
		<button class="select_size-color js-accordion-open">Select Size / Color</button>
	<?php }, 10);

	add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' ); 
	function woocommerce_add_to_cart_button_text_single() {
		return __( 'Add to shopping bag', 'woocommerce' ); 
	}
endif;