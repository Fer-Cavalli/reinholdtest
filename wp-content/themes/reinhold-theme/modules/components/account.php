<?php if(is_woocommerce_activated()): ?>
<div class="site-account">
  <?php if ( is_user_logged_in() ) { ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account"><?php get_template_part('images/avatar'); ?></a>
    <?php /* <a href="<?php echo wp_logout_url( home_url( '/' ) ) ?>">Logout</a> */ ?>
  <?php } else { ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account"><?php get_template_part('images/avatar'); ?></a>
  <?php } ?>
</div>
<?php endif; ?>
