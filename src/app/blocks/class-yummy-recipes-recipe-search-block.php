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
	 * Render the block.
	 */
	public function render(): string {
		return '<p>Search recipe block<p>';
	}
} 
