<?php
/**
 * Simple Hero
 *
 * Title:       Contact
 * Description: Hero with Contact Data
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
<section class="hero hero--contact">
  <div class="container">
    <div class="hero__content">
      <div class="hero__column">
        <?php echo ($title_contact = get_field('title_contact'))? '<h1 class="hero__title h3">'.$title_contact.'</h1>':''; ?>
      </div>
      <div class="hero__column">
        <?php if($chat_icon = get_field('chat_icon','option')): ?>
        <div class="hero__item">
          <div class="hero__item__image">
              <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => $chat_icon) ); ?></div>
          </div>
          <?php echo ($chat_text = get_field('chat_text','option'))? '<div class="hero__item__text h4">'.$chat_text.'</div>':''; ?>
        </div>
        <?php endif; ?>
        <?php if($jewlery_icon = get_field('jewlery_icon','option')): ?>
        <div class="hero__item">
          <div class="hero__item__image">
              <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => $jewlery_icon) ); ?></div>
          </div>
          <?php echo ($jewlery_text = get_field('jewlery_text','option'))? '<div class="hero__item__text h4">'.$jewlery_text.'</div>':''; ?>
        </div>
        <?php endif; ?>
        <?php if($phone_icon = get_field('phone_icon','option')): ?>
          <div class="hero__item">
            <div class="hero__item__image">
                <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => $phone_icon) ); ?></div>
            </div>
            <?php if($phone_text = get_field('phone_text','option')): ?>
              <a class="hero__item__text h4" href="<?php echo $phone_text['url']; ?>" target="<?php echo ($phone_text['target'] == '_blank')? '_blank':'_self'; ?>"><?php echo $phone_text['title']; ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if($appointment_icon = get_field('appointment_icon','option')): ?>
          <div class="hero__item">
            <div class="hero__item__image">
                <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => $appointment_icon) ); ?></div>
            </div>
            <?php if($appointment_text = get_field('appointment_text','option')): ?>
              <a class="hero__item__text h4" href="<?php echo $appointment_text['url']; ?>" target="<?php echo ($appointment_text['target'] == '_blank')? '_blank':'_self'; ?>"><?php echo $appointment_text['title']; ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if($order_icon = get_field('order_icon','option')): ?>
        <div class="hero__item">
          <div class="hero__item__image">
              <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => $order_icon) ); ?></div>
          </div>
          <?php echo ($order_text = get_field('order_text','option'))? '<div class="hero__item__text h4">'.$order_text.'</div>':''; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>  
</section>