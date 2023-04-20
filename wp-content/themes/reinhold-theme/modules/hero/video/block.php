<?php
/**
 * Simple Hero
 *
 * Title:       Video
 * Description: Hero with Video
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
<section class="hero hero--video">
  <div class="container">
    <div class="hero__content">
      <div class="hero__video">
        <?php $hero_video = get_field('hero_video');?>
          <video playsinline autoplay muted loop preload="auto">
            <source src="<?php echo $hero_video ?>" data-src="<?php echo $hero_video ?>" type="video/mp4">
          </video>
      </div>
      <div class="hero__data">  
        <?php 
        echo ($title = get_field('title_video'))? '<h1 class="hero__title h1">'.$title.'</h1>':'';
        echo ($text = get_field('text_video'))? '<div class="hero__text h2">'.$text.'</div>':'';
        ?>
      </div>
    </div>
  </div>  
</section>