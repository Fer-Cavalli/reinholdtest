<?php
/**
 * Buttons part for default page
 *
 * Title:       Two Columns Banners
 * Description: Two columns Banners.
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
 
<section class='banner banner--two-columns'>
    <div class="container">
        <div class="banner__content">
            <div class="banner__column">
                <?php 
                $news_page_url = get_field('news_page_url','option');
                $left_banner_type = get_field('left_banner_type');
                if($left_banner_type == 'manual'): ?>
                    <?php echo ($left_banner_uppertitle = get_field('left_banner_uppertitle'))? '<h3 class="banner__uppertitle h3">'.$left_banner_uppertitle.'</h3>':''; ?>
                    <div class="banner__item">
                        <div class="banner__image">
                            <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => get_field('left_banner_image')) ); ?></div>
                        </div>
                        <div class="banner__data">
                            <?php echo ($left_banner_title = get_field('left_banner_title'))? '<h4 class="banner__title h3">'.$left_banner_title.'</h4>':''; ?>
                            <?php echo ($left_banner_text = get_field('left_banner_text'))? '<div class="banner__text">'.$left_banner_text.'</div>':''; ?>
                            <?php if( $left_banner_link = get_field('left_banner_link')): ?>
                                <a class="banner__link" href="<?php echo $left_banner_link['url']; ?>" target="<?php echo ($left_banner_link['target'] == '_blank')? '_blank':'_self'; ?>"><?php echo $left_banner_link['title']; ?> ></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php elseif($left_banner_type == 'post_item'):
                    $left_banner_post = get_field('left_banner_post'); ?>
                    <?php echo ($left_banner_uppertitle = get_field('left_banner_uppertitle'))? '
                        <h3 class="banner__uppertitle h3">'.$left_banner_uppertitle.'<a href="'.$news_page_url.'">See All News ></a></h3>
                    ':''; ?>
                    <div class="banner__item">
                        <?php echo (has_post_thumbnail($left_banner_post))? '
                            <div class="banner__image">
                                <div class="image-background"><img src="'.get_the_post_thumbnail_url($left_banner_post).'" alt="'.get_the_title($left_banner_post).'" /></div>
                            </div>
                        ':''; ?>
                        <div class="banner__data">
                            <h3 class="banner__title h3"><?php echo get_the_title($left_banner_post); ?></h3>
                            <?php echo ($left_banner_text = get_field('left_banner_text'))? '<div class="banner__text">'.$left_banner_text.'</div>':''; ?>
                            <a class="banner__link" href="<?php echo get_the_permalink($left_banner_post); ?>">Learn More ></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="banner__column">
                <?php $right_banner_type = get_field('right_banner_type');
                if($right_banner_type == 'manual'): ?>
                    <?php echo ($right_banner_uppertitle = get_field('right_banner_uppertitle'))? '<h3 class="banner__uppertitle h3">'.$right_banner_uppertitle.'</h3>':''; ?>
                    <div class="banner__item">
                        <div class="banner__image">
                            <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => get_field('right_banner_image')) ); ?></div>
                        </div>
                        <div class="banner__data">
                            <?php echo ($right_banner_title = get_field('right_banner_title'))? '<h4 class="banner__title h3">'.$right_banner_title.'</h4>':''; ?>
                            <?php echo ($right_banner_text = get_field('right_banner_text'))? '<div class="banner__text">'.$right_banner_text.'</div>':''; ?>
                            <?php if( $right_banner_link = get_field('right_banner_link')): ?>
                                <a class="banner__link" href="<?php echo $right_banner_link['url']; ?>" target="<?php echo ($right_banner_link['target'] == '_blank')? '_blank':'_self'; ?>"><?php echo $right_banner_link['title']; ?> ></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php elseif($right_banner_type == 'post_item'):
                    $right_banner_post = get_field('right_banner_post'); ?>
                    <?php echo ($right_banner_uppertitle = get_field('right_banner_uppertitle'))? '
                        <h3 class="banner__uppertitle h3">'.$right_banner_uppertitle.'<a href="'.$news_page_url.'">See All News ></a></h3>
                    ':''; ?>
                    <div class="banner__item">
                        <?php echo (has_post_thumbnail($right_banner_post))? '
                            <div class="banner__image">
                                <div class="image-background"><img src="'.get_the_post_thumbnail_url($right_banner_post).'" alt="'.get_the_title($right_banner_post).'" /></div>
                            </div>
                        ':''; ?>
                        <div class="banner__data">
                            <h3 class="banner__title h3"><?php echo get_the_title($right_banner_post); ?></h3>
                            <?php echo ($right_banner_text = get_field('right_banner_text'))? '<div class="banner__text">'.$right_banner_text.'</div>':''; ?>
                            <a class="banner__link" href="<?php echo get_the_permalink($right_banner_post); ?>">Learn More ></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
