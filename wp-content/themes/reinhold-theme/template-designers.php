<?php /* Template Name: Designers */ ?>
<?php get_header(); 


$query = new WP_Query(array(
  'post_type' => 'designer', 
  'posts_per_page' => -1, 
  'orderby'   => 'title',
  'order' => 'ASC',
  'post_status' => 'publish'
)); 
if($query->have_posts()): ?>
    <section class='grid grid--designers'>
        <div class="container"> 
            <h3 class="hero__title site__title">Designers</h3>
            <div class="grid__cont">
                <?php while($query->have_posts() ): $query->the_post(); 
                $postID = get_the_ID();?>
                    <a href="<?php echo get_the_permalink($postID); ?>" class="grid__item">
                        <div class="grid__item__image">
                            <div class="image-background">
                                <?php echo get_the_post_thumbnail($postID, 'medium'); ?>
                                <div class="image_hover image-background"><?php get_template_part('modules/components/image',NULL,array('image' => get_field('image_hover', $postID)) ); ?></div>
                            </div>
                        </div>
                        <div class="grid__item__title h4"><?php echo get_the_title($postID); ?></div>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; 
get_footer(); ?>