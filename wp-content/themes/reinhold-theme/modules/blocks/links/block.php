<?php
/**
 * Buttons part for default page
 *
 * Title:       Links
 * Description: List of Links.
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
 
<section id='<?php echo $block['id']; ?>' class='menus menus--links'>
    <div class="container">
        <?php echo ($links_title = get_field('links_title'))? '<h3 class="menus__title site__title h3">'.$links_title.'</h3>':''; ?>
        <?php if( $links_list = get_field('links_list')):?>
            <div class="menus__content">
                <?php foreach( $links_list as $item ): ?>
                    <div class="menus__item">
                        <?php if( $link = $item['link'] ): ?>
                            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
