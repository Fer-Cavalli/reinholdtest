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
		<section class="hero hero--simple">
			<div class="container">
				<?php if($view_all = get_field('view_all', 'option')): ?>
					<a class="view_all" href="<?php echo $view_all['url']; ?>" target="<?php echo $view_all['target']; ?>"><?php echo $view_all['title']; ?></a>
				<?php endif; ?>
				<h1 class="hero__title site__title h3">Designer Profile: <?php the_title(); ?></h1>
			</div>
		</section>
		<section class="banner banner--designer">
			<div class="container">
				<div class="banner__content">
					<div class="banner__column">
						<div class="banner__image">
							<div class="image-background"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large');?>" alt="<?php echo get_the_title();?>" /></div>
						</div>
					</div>
					<div class="banner__column">
						<?php echo ($designer_biography = get_field('designer_biography'))? '<div class="banner__text">'.$designer_biography.'</div>':''; ?>
					</div>
				</div>
			</div>
		</section>

		<?php $images = get_field('designer_gallery');
		if( $images ): ?>
			<section class="grid grid--gallery">
				<div class="container">
					<div class="grid__content">
					<?php foreach( $images as $image ): ?>
						<div class="grid__item">
							<div class="image-background"><img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
		

		

	</main><!-- #main -->

<?php

get_footer();
