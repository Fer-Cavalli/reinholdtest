<?php
/**
 * ACF Blocks Integration.
 *
 * This component adds an easy to use ACF Blocks integration.
 *
 * @package    WordPress
 * @subpackage defaultTheme
 * @since      defaultTheme 1.0
 */

defined( 'ABSPATH' ) || die();

/**
 * The class that sets up ACF blocks to be built using a single PHP file.
 *
 * ACF blocks should be built in the /modules/blocks/ directory of the theme.
 */

 function register_theme_blocks() {
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}
		$blockspath = get_template_directory(). '/modules/blocks/*/block.php';
		$blocks = glob( $blockspath  );

		$blockspath_hero = get_template_directory(). '/modules/hero/*/block.php';
		$blocks_hero = glob( $blockspath_hero  );

		$blocks = array_merge( $blocks, $blocks_hero );

		global $customblocks;

		if ( ! empty( $blocks ) ) {

			foreach ( $blocks as $block ) {
				
				preg_match( '/\/([A-Za-z0-9-_]+?)\/block\.php$/', $block, $matches );

				// if folder starts with _ dont add this block
				if ( $matches[0][1] == '_' )  continue; 

				$block_name = ! empty( $matches ) && ! empty( $matches[1] ) ? $matches[1] : null;
				$block_data = get_file_data(
					$block,
					array(
						'title'       => 'Title',
						'description' => 'Description',
						'category'    => 'Category',
						'icon'        => 'Icon',
						'keywords'    => 'Keywords',
						'post_types'  => 'Post Types',
						'multiple'    => 'Multiple',
						'active'      => 'Active',
						'cssdeps'     => 'CSS Deps',
						'jsdeps'      => 'JS Deps',
						'InnerBlocks' => 'InnerBlocks',
						'mode'        => 'Mode',
						'parent'      => 'Parent',
					)
				);

				if ( 'true' === $block_data['active'] || true === $block_data['active'] ) {
					$block_settings = array(
						'name'            => sanitize_title( $block_data['title'] ),
						'title'           => $block_data['title'],
						'description'     => $block_data['description'],
						'render_template' => $block,
						'category'        => $block_data['category'],
						'icon'            => $block_data['icon'],
						'mode'            => 'auto',
						'keywords'        => array_filter( explode( ',', $block_data['keywords'] ) ),
						'supports'        => array( 'align' => false ),
						'enqueue_assets'  => function() use ( $block_name, $block_data ) {
							$main_css_directory = get_template_directory() . '/acf-blocks/' . $block_name . '/dist/style.css';
							$main_css = get_template_directory_uri() . '/acf-blocks/' . $block_name . '/dist/style.css';
							$editor_css_directory = get_template_directory() . '/acf-blocks/' . $block_name . '/dist/editor.css';
							$editor_css = get_template_directory_uri() . '/acf-blocks/' . $block_name . '/dist/editor.css';
							$main_js_directory = get_template_directory() . '/js/dist/' . $block_name . '.js';
							$main_js = get_template_directory_uri() . '/js/dist/' . $block_name . '.js';

							$css_deps = array_filter( array_merge( array( 'theme-styles' ), explode( ',', $block_data['cssdeps'] ) ) );
							$js_deps = array_filter( array_merge( array( 'jquery' ), explode( ',', $block_data['jsdeps'] ) ) );

							if ( file_exists( $main_css_directory ) && ! is_admin() ) {
								wp_enqueue_style( $block_name . '-style', $main_css, $css_deps, filemtime( $main_css_directory ) );
							}
							if ( file_exists( $editor_css_directory ) && is_admin() ) {
								wp_enqueue_style( $block_name . '-editor-style', $editor_css, array( 'editor-styles' ), filemtime( $editor_css_directory ) );
							}
							if ( file_exists( $main_js_directory ) && ! is_admin() ) {
								wp_enqueue_script( $block_name . '-script', $main_js, $js_deps, filemtime( $main_js_directory ), false );
							}
						},
					);

					if ( ! empty( $block_data['post_types'] ) && 'all' !== $block_data['post_types'] ) {
						$block_settings['post_types'] = explode( ',', $block_data['post_types'] );
					}

					if ( 'true' === $block_data['InnerBlocks'] ) {
						$block_settings['supports']['jsx'] = true;
						$block_settings['mode']            = 'preview';
					}

					if ( ! empty( $block_data['mode'] ) ) {
						$block_settings['mode'] = $block_data['mode'];
					}

					if ( 'false' === $block_data['multiple'] ) {
						$block_settings['supports']['multiple'] = false;
					}

					if ( ! empty( $block_data['parent'] ) ) {
						$block_settings['parent'] = explode( ',', $block_data['parent'] );
					}

					if ( $block_settings["category"] == "palermo_hero")
						$block_settings["name"] = "hero--".$block_settings["name"];

					$customblocks[] = "acf/".$block_settings["name"];

					$preview = [
						//'mode' => 'preview',
						'data' => array(
							'_is_preview'   => 'true'
						),
						'example'         => array(
							'attributes' => array(
								'mode' => '_is_preview',
							),
						),
					];
					$block_settings = array_merge( $block_settings, $preview);

					acf_register_block_type( $block_settings );
				}
			}
		}
	}

/**
 * Add a block category for all Palermo ACF blocks.
 *
 */
add_filter( 'block_categories', function( $categories, $post ) {
    return array_merge(
           $categories,
           array(
				array(
                   'slug'  => 'palermo_hero',
                   'title' => get_option('blogname')." Hero",
               ),
               array(
                   'slug'  => 'palermo',
                   'title' => get_option('blogname')." Content",
               ),
			   
           )
    );
}, 10, 2 );
register_theme_blocks();




/**
 * Exclude default WP themes from the site
 *
 *  Run wp.blocks.getBlockTypes() in the console to get a list of all available blocks
 */
add_filter( 'allowed_block_types', 'palermo_allowed_block_types' );
function palermo_allowed_block_types( $allowed_blocks ) { 
    global $customblocks;
    $ret =  array(
        //'core/paragraph',
        //'core/image',
        //'core/heading',  
        //'core/subhead',
        //'core/list',
		//'core/html',
		//'core/shortcode'		
    );
	$ret = array_merge( $ret, $customblocks );
    return $ret; 
}

/**
 * Add sites css to the editor for previews
 *
 */
function palermo_block_editor_styles() {
    wp_enqueue_style('palermo-editor-styles', get_theme_file_uri( '/css/editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'palermo_block_editor_styles' );




/*
Wrap default wp blocks in a container
*/

add_filter( 'render_block', 'wrap_classic_block', 10, 2 );
function wrap_classic_block( $block_content, $block ) {
    
    if ( 
        substr($block['blockName'], 0, 3) != 'acf' AND
        $block['blockName'] != ''
    ) {
       	$blockclass = explode('/', $block['blockName']); 
       	$columnclass = 'col';
       	if ( isset($block['attrs']['wideContainer']) AND $block['attrs']['wideContainer'] == 1 ) $columnclass = 'col wide';

        $block_content_return = '<div class="container '.$blockclass[1].' default_block "><div class="row"><div class="'.$columnclass.'">';
		$block_content_return .= $block_content;
		$block_content_return .= '</div></div></div>';

		return $block_content_return;
    }
    return $block_content;
}







add_action( 'palermo_pre_render_block', 'pre_render_block_cb', 10, 1 );
function pre_render_block_cb( $block ) {


 	if( isset( $block['data']['_is_preview'] ) ) { 
 
    $name = explode('/', $block['name']);
    if ( is_admin() AND file_exists( get_template_directory().'/modules/blocks/'.$name[1].'/preview.jpg' ) ) {
		?>
		<figure>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/modules/blocks/<?php echo $name[1]; ?>/preview.jpg" >
		</figure>
		<style>
			.block-editor-iframe__body .acf-block-preview>*{
				display: none !important;
			}
			.block-editor-iframe__body .acf-block-preview>figure{
				display: block !important;
			}
		</style>
		<?php 
	
    	} 
		return '';
	} 
}





