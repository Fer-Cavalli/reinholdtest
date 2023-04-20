<?php
/**
 * Buttons part for default page
 *
 * Title:       Designers
 * Description: Designers Grid.
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

 do_action( 'palermo_pre_render_block', $block ); ?>
 
<section id='<?php echo $block['id']; ?>' class='grid grid--designers'>
    <div class="container">
        <?php 
        $designers_title = get_field('designers_title');
        (!$designers_title)? $designers_title = get_field('designers_title','options'):'';
        echo ($designers_title)? '<h3 class="grid__title site__title">'.$designers_title.'</h3>':''; 
        $featured_posts = get_field('designers_grid');
        if( $featured_posts ): ?>
            <div class="grid__cont">
                <?php foreach( $featured_posts as $designer ): ?>
                   <?php get_template_part('modules/blocks/designers/item',null,['designer' => $designer]); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>        
    </div>
</section>
