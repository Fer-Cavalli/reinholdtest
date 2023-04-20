<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Palermo
 */

get_header(); ?>

	<section class="error-404 not-found">
		<header class="page-header">
			<?php echo ($error404 = get_field('error404', 'options'))? '<h1 class="page-title">'.$error404.'</h1>':''; ?>
		</header><!-- .page-header -->
	</section><!-- .error-404 -->
<?php get_footer();