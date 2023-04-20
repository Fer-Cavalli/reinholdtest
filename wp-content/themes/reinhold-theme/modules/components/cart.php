<?php if(is_woocommerce_activated()): ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>cart" class="site-cart" title="View Cart">
  <?php get_template_part('images/cart'); ?>
  <?php
  global $woocommerce;
  /*$cart_subtotal = $woocommerce->cart->get_cart_subtotal();
  echo $cart_subtotal;*/ ?>
</a>
<?php endif; ?>
