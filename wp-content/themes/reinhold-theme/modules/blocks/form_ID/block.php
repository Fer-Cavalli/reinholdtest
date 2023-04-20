<?php
/**
 * Buttons part for default page
 *
 * Title:       Form ID
 * Description: Form ID
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
 $parameters = '';
 if($product_id = $_GET['product_id']):
    $parameters = 'field_values="product_name='.get_the_title($product_id).'&product_url='.get_the_permalink($product_id).'"';
 endif; ?>
 
<?php if ($form_id = get_field('form_id')): ?> 
    <section class="form_block <?php echo($product_id)? 'form_block--products':''; ?>">
        <div class="container">
            <div class="formBox" ><?php echo do_shortcode('[gravityform id="'.$form_id.'" title="false" description="false" ajax="true" '.$parameters.']'); ?></div>
                <?php echo ($product_id)? do_shortcode('[products ids="'.$product_id.'"]') : '';  ?>
            </div>
        </section>
    <?php endif; ?>