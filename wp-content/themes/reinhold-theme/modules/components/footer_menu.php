<?php if( have_rows('footer_menu','option') ):?>
	<div class="footer_menu">
		<?php while ( have_rows('footer_menu','option') ) : the_row();
			$item = get_sub_field('item');?>
			<div class="footer_menu__item">
				<?php if($item):?>
					<a class="footer_menu__item--text" href="<?php echo $item['url']; ?>" target="<?php echo $item['target']; ?>"><?php echo $item['title']; ?></a>
				<?php endif;?>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>