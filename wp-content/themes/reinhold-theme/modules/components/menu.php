<?php if( have_rows('menu','option') ):?>
	<div class="site-menu">
		<?php while ( have_rows('menu','option') ) : the_row(); ?>
			<div class="site-menu__item">
				<?php 
				$first_level = get_sub_field('first_level');
				$first_level_only_text = get_sub_field('first_level_only_text');
				if($first_level):
					if( $first_level ): ?>
						<a class="site-menu__first-level" href="<?php echo $first_level['url']; ?>"><?php echo $first_level['title']; ?></a>						
					<?php endif;
				elseif($first_level_only_text):
					echo ($first_level_only_text)? '<div tabindex="0" class="site-menu__first-level site-menu__first-level--text">'.$first_level_only_text.'</div>':''; 
				endif;
				if( have_rows('submenu') ):?>
					<button class="site-menu__first-level__btn"></button>
					<div class="submenu">
					<?php while ( have_rows('submenu') ) : the_row();?>
						<?php if( $link = get_sub_field('link') ): ?>
						<a class="submenu__item" href="<?php echo $link = get_sub_field('link')['url']; ?>" target="<?php echo $link = get_sub_field('link')['target']; ?>">
							<p class="submenu__title"><?php echo $link = get_sub_field('link')['title']; ?></p>
						</a>
						<?php endif; ?>
					<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
