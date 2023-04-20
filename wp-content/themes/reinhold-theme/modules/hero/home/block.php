<?php
/**
 * Buttons part for default page
 *
 * Title:       Home
 * Description: Hero Home
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
 
<section id='<?php echo $block['id']; ?>' class='hero hero--home'>
    <div class="container">
        <div class="hero__image">
            <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => get_field('hero_home_image')) ); ?></div>
        </div>
        <div class="hero__content">
            <div class="hero__cont">
                <?php echo ($hero_home_title = get_field('hero_home_title'))? '<h1 class="hero__title h3">'.$hero_home_title.'</h1>':''; ?>
                <?php if( $link = get_field('hero_home_link')): ?>
                    <a class="hero__link h5" href="<?php echo $link['url']; ?>" target="<?php echo ($link['target'] == '_blank')? '_blank':'_self'; ?>"><?php echo $link['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
