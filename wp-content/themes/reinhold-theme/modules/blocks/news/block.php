<?php
/**
 * Buttons part for default page
 *
 * Title:       News And Events
 * Description: News And Events List.
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
<?php 
  $query = new WP_Query(array(
    'post_type' => 'post', 
    'posts_per_page' => -1, 
    'order' => 'ASC',
    'orderby' => 'menu_order' ,
    'post_status' => 'publish'
)); ?>

<?php if($query->have_posts()):  ?>
<section class="grid grid--news">
    <div class="container">
        <div class="grid__content">
            <?php while($query->have_posts() ): $query->the_post(); ?>
                <a href="<?php the_permalink();?>" class="grid__item">
                    <div class="grid__image">
                        <div class="image-background"><?php echo get_the_post_thumbnail(); ?></div>
                    </div>
                    <h3 class="grid__title h4"><?php the_title(); ?></h3>
                    <h4 class="grid__date h4"><?php echo get_the_date(); ?></h4>
                    <p>Read Whole Story ></p>
                </a>
            <?php endwhile;?>
        </div>
    </div>
</section>
<?php wp_reset_postdata(); endif; ?>
            

