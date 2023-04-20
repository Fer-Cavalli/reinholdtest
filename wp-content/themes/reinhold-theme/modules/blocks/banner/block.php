<?php
/**
 * Buttons part for default page
 *
 * Title:       Banner
 * Description: Promotional Banner.
 * Category:    palermo
 * Icon:        align-full-width
 * Keywords:    example
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
 
<section id='<?php echo $block['id']; ?>' class='banner banner--promo'>
    <div class="container">
        <div class="banner__content">
            <div class="banner__image">
                <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => get_field('banner_image')) ); ?></div>
            </div>
            <div class="banner__cont">
                <div>
                    <?php echo ($banner_uppertitle = get_field('banner_uppertitle'))? '<h4 class="banner__uppertitle h5">'.$banner_uppertitle.'</h4>':''; ?>    
                    <?php echo ($banner_title = get_field('banner_title'))? '<h3 class="banner__title h2">'.$banner_title.'</h3>':''; ?>
                    <?php echo ($banner_text = get_field('banner_text'))? '<div class="banner__text h4">'.$banner_text.'</div>':''; ?>
                    <?php if( $link = get_field('banner_link')): ?>
                        <a class="banner__link" href="<?php echo $link['url']; ?>" target="<?php echo ($link['target'] == '_blank')? '_blank':'_self'; ?>"><?php echo $link['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
