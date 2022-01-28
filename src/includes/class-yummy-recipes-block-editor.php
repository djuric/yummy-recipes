<?php
/**
 * General block setup.
 * 
 * @since      1.0.0
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Includes
 */

/**
 * Block editor.
 */
class Yummy_Recipes_Block_Editor {

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
}
