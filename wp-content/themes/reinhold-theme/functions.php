<?php
/**
 * Palermo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Palermo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function palermo_setup() {

	load_theme_textdomain( 'palermo', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// Image Sizes
	add_image_size( 'full-width', 3000, 2000 );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'palermo_setup' );

/**
 * Enqueue scripts and styles.
 */
function palermo_scripts() {
	wp_enqueue_style( 'palermo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'palermo-style', 'rtl', 'replace' );
	wp_enqueue_script( 'flickity','https://npmcdn.com/flickity@2/dist/flickity.pkgd.js', '', '', true );	
	wp_enqueue_script( 'jquery','https://code.jquery.com/jquery-3.6.0.min.js', '', '', false );
	wp_enqueue_script( 'fancybox','https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', '', '', true );
	wp_enqueue_style( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css');
	wp_enqueue_script( 'theme-functions',get_template_directory_uri() . '/js/theme.min.js', '', '', true );
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v6.3.0/css/all.css');

}
add_action( 'wp_enqueue_scripts', 'palermo_scripts' );

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_script('js-readmore','//cdn.jsdelivr.net/npm/readmore-js@2.2.1/readmore.min.js', array('jquery'), '',true);
},99);


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/admin.php';
require get_template_directory() . '/inc/theme.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/posttypes.php';
require get_template_directory() . '/inc/blocks.php';
require get_template_directory() . '/inc/woocommerce.php';