<?php $designer = $args['designer']; ?>
<a href="<?php echo get_the_permalink($designer); ?>" class="grid__item">
    <div class="grid__item__image">
        <div class="image-background">
            <?php echo get_the_post_thumbnail($designer, 'medium'); ?>
            <div class="image_hover image-background"><?php get_template_part('modules/components/image',NULL,array('image' => get_field('image_hover', $designer)) ); ?></div>
        </div>
    </div>
    <div class="grid__item__title h4"><?php echo get_the_title($designer); ?></div>
</a>