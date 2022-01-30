<?php
/**
 * Dynamic part of the search recipe block.
 *
 * @since      1.0.0
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Blocks
 */

namespace Yummy_Recipes\Blocks;

/**
 * Class that handles the dynamic part of the search recipe block.
 */
class Yummy_Recipes_Recipe_Search_Block {

	/**
	 * Register block type
	 */
	public function register(): void {
		register_block_type(
			'yummy-recipes/recipe-search',
			array(
				'render_callback' => array( $this, 'render' ),
			)
		);
	}

	/**
	 * Register block assets.
	 */
	public function register_assets(): void {
		if ( ! has_block( 'yummy-recipes/recipe-search' ) ) {
			return;
		}
		
		$path = YUMMY_RECIPES_PLUGIN_URL . 'frontend/build/static';

		wp_enqueue_script( 'recipe-search-script', $path . '/js/main.js', array(), '1.0', true );
		wp_enqueue_style( 'recipe-search-style', $path . '/css/main.css', array(), '1.0', 'all' );

		wp_localize_script(
			'recipe-search-script',
			'yummy_recipes',
			array(
				'ajax_url' => get_rest_url( null, 'wp/v2/' ),
			)
		);
	}
	
	/**
	 * Render the block.
	 */
	public function render(): string {
		return '<div id="yummy_recipes_search"></div>';
	}
} 
