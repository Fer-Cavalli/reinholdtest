<?php 
global $product;
$parameters = '';
 if($product_id = $product->get_id()):
    $parameters = 'field_values="product_name='.get_the_title($product_id).'&product_url='.get_the_permalink($product_id).'"';
 endif; 
 
if ($form_id = get_field('drop_form','options')): ?> 
    <section class="form_block popup <?php echo($product_id)? 'form_block--products':''; ?>">
        <button class="close_popup"></button>
        <div class="container">
            <div class="formBox">
                <?php echo do_shortcode('[gravityform id="'.$form_id.'" title="false" description="false" ajax="true" '.$parameters.']');?>
            </div> 
            <?php echo ($product_id) ? do_shortcode('[products ids="'.$product_id.'"]') : '';  ?>
        </div>
    </section>
<?php endif; ?>