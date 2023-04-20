		</div><!-- #primary -->
	</div><!-- #content -->


	<footer class="site-footer">
	<div class="container">
			<div class="site-footer__cont">
				<div class="site-footer__container">
					<div class="site-footer__column">
						<?php get_template_part('modules/components/site-logo'); ?>
						<?php get_template_part('modules/components/footer_menu'); ?>

					</div>
					<div class="site-footer__column">
						<div class="left__column">
							<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
							<?php get_template_part('modules/components/socials'); ?>
						</div>
						<?php if($favicon = get_field('favicon','option')): ?>
							<div class="right__column">
								<img src="<?php echo $favicon['url']; ?>" alt="Reinhold" />
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
