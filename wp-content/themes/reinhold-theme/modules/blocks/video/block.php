<?php
/**
 * Buttons part for default page
 *
 * Title:       Video
 * Description: Video Block.
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

$video_url = get_field('video_url');
?>

<section class="media media--video">
    <div class="container">
        <div class="media__content">
            <a href="<?php echo $video_url ?>" data-fancybox class="media__item js-hidden">
                <?php if($image_video = get_field('image_video')):?>
                    <div class="media__image">
                        <div class="image-background">
                        <?php get_template_part('modules/components/image',NULL,array('image' => $image_video)); ?>
                        </div>
                    </div>
                <?php endif; ?>   
                <div class="media__data">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" role="img" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" width="32" height="32" fill="black"/>
                    <path d="M23.3293 16.1464L12.7195 22.2719L12.7195 10.0208L23.3293 16.1464Z" fill="white"/>
                    </svg>
                    <?php echo ($title_video = get_field('title_video'))? '<h3 class="media__title">'.$title_video.'</h3>':''; ?>
                </div> 
            </a>
        </div>
    </div>
</section>

            

