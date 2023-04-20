<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Palermo
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function palermo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'palermo_pingback_header' );

/* Remove SVG on theme head */
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/* remove wp version from code */
add_filter('the_generator','killVersion');
function killVersion() { return ''; }
remove_action('wp_head', 'wp_generator');


add_action('wp_head',           function(){ the_field('analytics', 'option'); });
add_action('wp_body_open',      function(){ the_field('analytics_body', 'option'); });
add_action('wp_footer',         function(){ the_field('analytics_footer', 'option'); });