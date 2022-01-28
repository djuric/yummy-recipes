<?php
/**
 * General block setup.
 * 
 * @since      1.0.0
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Includes
 */

namespace Yummy_Recipes\Includes;

use Yummy_Recipes\Blocks\Yummy_Recipes_Recipe_Search_Block;

/**
 * Block editor.
 */
class Yummy_Recipes_Block_Editor {

	/**
	 * Instance of the Yummy_Recipes_Loader class.
	 * 
	 * @var Yummy_Recipes_Loader
	 */
	private $yummy_recipes_loader;

	/**
	 * Instance of the Yummy_Recipes_Recipe_Search_Block class.
	 * 
	 * @var Yummy_Recipes_Recipe_Search_Block
	 */
	private $yummy_recipes_recipe_search_block;

	/**
	 * Initialize block editor.
	 * 
	 * @param Yummy_Recipes_Loader              $loader Instance of Yummy_Recipes_Loader class.
	 * @param Yummy_Recipes_Recipe_Search_Block $recipe_search_block Instance of Yummy_Recipes_Recipe_Search_Block class.
	 */
	public function __construct( Yummy_Recipes_Loader $loader, Yummy_Recipes_Recipe_Search_Block $recipe_search_block ) {
		$this->loader                            = $loader;
		$this->yummy_recipes_recipe_search_block = $recipe_search_block;
	}

	/**
	 * Include editor scripts and styles.
	 */
	public function block_editor_assets(): void {

		wp_enqueue_script( 'yummy-recipes-block-script', YUMMY_RECIPES_PLUGIN_URL . 'block-editor/dist/index.js', array( 'wp-blocks', 'wp-editor' ), YUMMY_RECIPES_VERSION, true );

		wp_enqueue_style( 'yummy-recipes-block-style', YUMMY_RECIPES_PLUGIN_URL . 'block-editor/dist/editor.css', array(), YUMMY_RECIPES_VERSION );
	}

	/**
	 * Register post meta for saving and displaying in REST API.
	 */
	public function register_post_meta(): void {
		register_meta(
			'post',
			'rating',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'number',
			) 
		);

		register_meta(
			'post',
			'cooking_time',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'number',
			) 
		);
	}

	/**
	 * Load dynamic file of the block if exists
	 */
	public function register_dynamic_blocks() {
		$this->loader->add_action( 'init', $this->yummy_recipes_recipe_search_block, 'register' );
	}
}
