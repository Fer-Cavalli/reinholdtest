<?php
/**
 * Buttons part for default page
 *
 * Title:       Gallery
 * Description: Images Gallery.
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

<?php 
$gallery_media = get_field('gallery_media');
if( $gallery_media ): ?>
<section class="media media--gallery">
    <div class="container">
        <div class="media__content">
            <?php foreach( $gallery_media as $image ): ?>
                <a class="media__image" href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery">
                    <div class="image-background"><img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

            

