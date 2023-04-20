<?php
/**
 * Buttons part for default page
 *
 * Title:       Locations
 * Description: Locations List.
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
 
<section id='<?php echo $block['id']; ?>' class='banner banner--locations'>
    <div class="container">
        <?php echo ($locations_title = get_field('locations_title'))? '<h3 class="banner__title site__title h3">'.$locations_title.'</h3>':''; ?>
        <?php if( $locations = get_field('locations')):?>
            <div class="banner__content">
                <?php foreach( $locations as $item ): ?>
                    <div class="banner__item">
                        <div class="banner__column">
                            <div class="banner__item__image">
                                <div class="image-background"><?php get_template_part('modules/components/image',NULL,array('image' => $item['image']) ); ?></div>
                            </div>
                        </div>
                        <div class="banner__column">
                            <?php echo ($item['title'])? '<h4 class="banner__item__title h4">'.$item['title'].'</h4>':''; ?>
                            <?php echo ($item['address'])? '<div class="banner__item__text">'.$item['address'].'</div>':''; ?>
                            <?php if( $view_map = $item['view_map'] ): ?>
                                <a class="banner__item__map" href="<?php echo $view_map['url']; ?>" target="<?php echo $view_map['target']; ?>"><?php echo $view_map['title']; ?></a>
                            <?php endif;
                            if( $phone = $item['phone'] ): ?>
                                <a class="banner__item__phone" href="<?php echo $phone['url']; ?>" target="<?php echo $phone['target']; ?>"><?php echo $phone['title']; ?></a>
                            <?php endif; 
                            
                            if(!empty($item['hours'])):?>

                            <div class="dropdown">
                                <button class="banner__item__store js-dropdown-open"><?php echo in_array(date('w'), [0, 6]) ? 'Close Today' : ''.$item['store_hours'].''; ?></button>
                                <div class="banner__item__cont">
                                    <?php 
                                    foreach( $item['hours'] as $item ): ?>
                                        <div class="banner__item__content">
                                            <?php echo ($item['day'])? '<div class="banner__item__day">'.$item['day'].'</div>':''; ?>
                                            <?php echo ($item['hour'])? '<div class="banner__item__hour">'.$item['hour'].'</div>':''; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            
                            </div>
                            <?php endif; ?>

                            

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>