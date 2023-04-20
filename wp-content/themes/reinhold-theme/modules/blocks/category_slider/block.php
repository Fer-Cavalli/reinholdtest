<?php
/**
 * Buttons part for default page
 *
 * Title:       Category Slider
 * Description: A slider of categories.
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
 
<section id='<?php echo $block['id']; ?>' class='slider slider--category'>
    <div class="container">
        <?php echo ($slider_title = get_field('slider_title'))? '<h3 class="slider__title site__title">'.$slider_title.'</h3>':''; ?>    
        <?php $topics = get_field('slider_categories');
        if( count($topics) >= 5 ):?> 
            <div class="slider__cont" data-flickity='{ "cellAlign": "left", "draggable": false, "wrapAround": true, "pageDots": false, "autoPlay": true }'>
                <?php foreach ($topics as $topic): 
                    $thumbnail_id = get_term_meta( $topic->term_id, 'thumbnail_id', true ); 
                    $image = wp_get_attachment_url( $thumbnail_id ); ?>
                    <div class="slider__item">
                        <div class="slider__item__cont">
                            <a href="<?php echo get_term_link($topic) ?>">
                            <?php echo ($thumbnail_id)? '<div class="slider__item__image"><div class="image-background"><img src="'.$image.'" alt="'.$topic->name.'" /></div></div>':''; ?>
                                <div class="slider__item__title h4"><?php echo esc_html( $topic->name ); ?></div>
                            </a>
                        </div>
                    </div>
                <?php endforeach;?>    
            </div>
        <?php else: ?>
            <div class="slider__cont slider__cont--flex">
                <?php foreach ($topics as $topic): 
                    $thumbnail_id = get_term_meta( $topic->term_id, 'thumbnail_id', true ); 
                    $image = wp_get_attachment_url( $thumbnail_id ); ?>
                    <div class="slider__item">
                        <div class="slider__item__cont">
                            <a href="<?php echo get_term_link($topic) ?>">
                            <?php echo ($thumbnail_id)? '<div class="slider__item__image"><div class="image-background"><img src="'.$image.'" alt="'.$topic->name.'" /></div></div>':''; ?>
                                <div class="slider__item__title h4"><?php echo esc_html( $topic->name ); ?></div>
                            </a>
                        </div>
                    </div>
                <?php endforeach;?>    
            </div>
        <?php endif;?>
    </div>
</section>
