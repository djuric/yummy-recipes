<?php
/**
 * Customize REST API responses.
 * 
 * @since      1.0.0
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Includes
 */

namespace Yummy_Recipes\Includes;

/**
 * REST API main plugin class.
 */
class Yummy_Recipes_Rest_Api {

	/**
	 * Register featured image URL in REST API response.
	 */
	public function include_featured_image_url(): void {
		register_rest_field(
			YUMMY_RECIPES_POST_TYPE,
			'featured_image_url',
			array(
				'get_callback' => function ( $post_data ) {
					$image = wp_get_attachment_image_src( $post_data['featured_media'], 'medium' );
					return $image ? $image[0] : null;
				},
			)
		);
	}
}
