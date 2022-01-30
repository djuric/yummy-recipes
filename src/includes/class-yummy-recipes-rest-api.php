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
					$image = wp_get_attachment_image_src( $post_data['featured_media'], 'yummy-recipes-thumbnail' );
					return $image ? $image[0] : YUMMY_RECIPES_PLUGIN_URL . 'assets/images/no-image.png';
				},
			)
		);
	}

	/**
	 * Shorten and strip tags of the excerpt.
	 * 
	 * @param array  $data The REST API response data.
	 * @param object $post The post object.
	 * @param string $context The context of the response.
	 */
	public function trim_excerpt( $data, $post, $context ): \WP_REST_Response {
		$excerpt                           = wp_strip_all_tags( $data->data['excerpt']['rendered'] );
		$data->data['excerpt']['rendered'] = substr( $excerpt, 0, strpos( wordwrap( $excerpt, 100 ), "\n" ) );
		return $data;
	}
}
