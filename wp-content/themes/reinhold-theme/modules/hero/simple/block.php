<?php
/**
 * Simple Hero
 *
 * Title:       Hero Simple
 * Description: Simple hero
 * Category:    palermo_hero
 * Icon:        align-full-width
 * Keywords:    hero
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * CSS Deps:
 * JS Deps:
 *
 * @package Palermo
 * @subpackage defaultTheme
 * @since defaultTheme  1.0
 */

 do_action( 'palermo_pre_render_block', $block );
 ?>
<section class="hero hero--simple hero--inner">
  <?php if(get_field('hero_simple_image')): ?>
    <div class="hero__image">
        <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => get_field('hero_simple_image')) ); ?></div>
    </div>
  <?php endif; ?>
  <div class="container">
    <div class="hero_content">
      <?php echo ($hero_simple_title = get_field('hero_simple_title'))? '<div class="hero__title site__title h3">'.$hero_simple_title.'</div>':''; ?>
    </div>
  </div>  
</section>