<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Palermo
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<section class="hero hero--simple">
				<div class="container">
					<div class="hero_content">
					<div class="hero__title site__title h3"><?php the_title(); ?></div>
					</div>
				</div>  
			</section>
			<?php if ( has_post_thumbnail()): ?>
				<section class="hero hero--post">
					<div class="container">
						<div class="hero_content">
							<div class="hero__image">
								<div class="image-background"><?php the_post_thumbnail(); ?></div>
							</div>
						</div>
					</div>  
				</section>
			<?php endif; 
			
			the_content();

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
