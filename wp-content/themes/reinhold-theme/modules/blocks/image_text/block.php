<?php
/**
 * Buttons part for default page
 *
 * Title:       Image/text Banner
 * Description: Two Column Banner.
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
 
<section id='<?php echo $block['id']; ?>' class='banner banner--imagetext'>
    <div class="container">
        <div class="banner__content">
            <div class="banner__column">
                <div class="banner__image">
                    <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => get_field('banner_imagetext_image')) ); ?></div>
                </div>
            </div>
            <div class="banner__column">
                <div class="banner__data">
                    <?php echo ($banner_imagetext_title = get_field('banner_imagetext_title'))? '<h3 class="banner__title h3">'.$banner_imagetext_title.'</h3>':''; ?>
                    <?php echo ($banner_imagetext_text = get_field('banner_imagetext_text'))? '<div class="banner__text">'.$banner_imagetext_text.'</div>':''; ?>
                </div>
            </div>
        </div>      
    </div>
</section>
