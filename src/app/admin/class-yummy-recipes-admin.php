<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Includes
 */

namespace Yummy_Recipes\Admin;

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Admin
 * @author     Zarko
 */
class Yummy_Recipes_Admin {

	/**
	 * Register necessary post types for this plugin .
	 *
	 * @since   1.0.0
	 */
	public function register_post_type(): void { 
		register_post_type(
			YUMMY_RECIPES_POST_TYPE,
			array(
				'labels'       => array(
					'name'          => __( 'Recipes', 'yummy-recipes' ),
					'singular_name' => __( 'Recipe', 'yummy-recipes' ),
					'add_new_item'  => __( 'Add Recipe', 'yummy-recipes' ),
					'edit_item'     => __( 'Edit Recipe', 'yummy-recipes' ),
					'new_item'      => __( 'New Recipe', 'yummy-recipes' ),
					'all_items'     => __( 'All Recipes', 'yummy-recipes' ),
					'search_items'  => __( 'Search Recipes', 'yummy-recipes' ),
				),
				'public'       => true,
				'menu_icon'    => 'dashicons-food',
				'show_in_rest' => true,
				'rewrite'      => array(
					'slug' => 'recipe',
				),
				'supports'     => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ),
				'template'     => array(
					array( 'yummy-recipes/recipe' ),
				),
			)
		);

	}
}
