<?php
/**
 * Buttons part for default page
 *
 * Title:       Paragraph
 * Description: Paragraph.
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
 <?php echo ($text_paragraph = get_field('text_paragraph'))? '
    <section class="paragraph">
        <div class="container">
            <div class="paragraph__content">
                '.$text_paragraph.'
            </div>
        </div>
    </section>
 ':''; ?>

            

