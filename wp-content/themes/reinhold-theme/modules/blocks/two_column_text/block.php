<?php
/**
 * Buttons part for default page
 *
 * Title:       Two Column Text
 * Description: Two Column Text
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
<section class="two_column_text">
    <div class="container">
        <div class="two_column_text__cont">
            <div class="two_column_text__cont__content">
                <?php echo ($left_column_title = get_field('left_column_title'))? '<h3 class="two_column_text_title">'.$left_column_title.'</h3>':''; ?>
                <?php echo ($left_column_text = get_field('left_column_text'))? '<div class="two_column_text_description">'.$left_column_text.'</div>':''; ?>
                <?php if( $link_form = get_field('link_form') ): ?>
                    <a  class="button" href="<?php echo $link_form['url']; ?>" target="<?php echo $link_form['target']; ?>"><?php echo $link_form['title']; ?></a>
                <?php endif; ?>
            </div>
            <div class="two_column_text__cont__content">
                <?php echo ($right_column_title = get_field('right_column_title'))? '<h3 class="two_column_text_title">'.$right_column_title.'</h3>':''; ?>
                <?php echo ($right_column_text = get_field ('right_column_text'))? '<div class="two_column_text_description">'.$right_column_text.'</div>':''; ?>
            </div>
        </div>
    </div>
</section>