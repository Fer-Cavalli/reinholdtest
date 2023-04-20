<?php
/**
 * Buttons part for default page
 *
 * Title:       Image
 * Description: Image.
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
<section class="media media--image">
    <div class="container">
        <div class="media__content">
            <div class="media__image">
                <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => get_field('image_media')) ); ?></div>
            </div>
        </div>
    </div>
</section>

            

