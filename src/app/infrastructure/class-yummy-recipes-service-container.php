<?php
/**
 * The Yummy_Recipes_Service_Container class handles initialisation of all services in the plugin.
 *
 * @since      1.0.0
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Infrastructure
 */

namespace Yummy_Recipes\Infrastructure;

use Yummy_Recipes\Includes\Yummy_Recipes_Loader;
use Yummy_Recipes\Includes\Yummy_Recipes_Service;
use Yummy_Recipes\Includes\Yummy_Recipes_Block_Editor;
use Yummy_Recipes\Includes\Yummy_Recipes_Rest_Api;
use Yummy_Recipes\Admin\Yummy_Recipes_Admin;
use Yummy_Recipes\Blocks\Yummy_Recipes_Recipe_Search_Block;

/**
 * Initialise all needed services.
 *
 * Services are called over Service Container:
 * - to prevent reinitialisation if service is already initialised
 * - to setup dependencies so you don't have to worry about them when you need some service that has it's own dependencies
 * - to make access to the services much easier and faster
 *
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Infrastructure
 * @author     Zarko
 */
final class Yummy_Recipes_Service_Container {

	/**
	 * Instance of the Yummy_Recipes_Service_Container class.
	 *
	 * @var  Yummy_Recipes_Service_Container
	 */
	protected static $instance;

	/**
	 * Instance of the Yummy_Recipes_Service class.
	 * 
	 * @var Yummy_Recipes_Service
	 */
	private $yummy_recipes_service;

	/**
	 * Instance of the Yummy_Recipes_Loader class.
	 * 
	 * @var Yummy_Recipes_Loader
	 */
	private $yummy_recipes_loader;

	/**
	 * Instance of the Yummy_Recipes_Admin class.
	 * 
	 * @var Yummy_Recipes_Admin
	 */
	private $yummy_recipes_admin;

	/**
	 * Instance of the Yummy_Recipes_Rest_Api class.
	 * 
	 * @var Yummy_Recipes_Rest_Api
	 */
	private $yummy_rest_api;

	/**
	 * Instance of the Yummy_Recipes_Block_Editor class.
	 *
	 * @var Yummy_Recipes_Block_Editor
	 */
	private $yummy_recipes_block_editor;

	/**
	 * Instance of the Yummy_Recipes_Recipe_Search_Block class.
	 *
	 * @var Yummy_Recipes_Recipe_Search_Block
	 */
	private $yummy_recipes_recipe_search_block;

	/**
	 * Protected constructor to prevent creating a new instance directly.
	 */
	protected function __construct() {  }

	/**
	 * Get service container instance
	 *
	 * @return Yummy_Recipes_Service_Container
	 *
	 * @since    1.0.0
	 */
	public static function get_instance(): Yummy_Recipes_Service_Container {
		if ( ! self::$instance ) {
			self::$instance = new Yummy_Recipes_Service_Container();
		}
		return self::$instance;
	}

	/**
	 * Creates and returns new Yummy_Recipes_Loader object.
	 *
	 * @return Yummy_Recipes_Loader
	 *
	 * @since    1.0.0
	 */
	public function yummy_recipes_loader(): Yummy_Recipes_Loader {
		if ( null === $this->yummy_recipes_loader ) {
			$this->yummy_recipes_loader = new Yummy_Recipes_Loader();
		}
		return $this->yummy_recipes_loader;
	}

	/**
	 * Creates and returns new Yummy_Recipes_Service object.
	 *
	 * @return Yummy_Recipes_Service
	 *
	 * @since    1.0.0
	 */
	public function yummy_recipes_service(): Yummy_Recipes_Service {
		if ( null === $this->yummy_recipes_service ) {
			$this->yummy_recipes_service = new Yummy_Recipes_Service(
				$this->yummy_recipes_loader(),
				$this->yummy_recipes_admin(),
				$this->yummy_recipes_rest_api(),
				$this->yummy_recipes_block_editor()
			);
		}
		return $this->yummy_recipes_service;
	}

	/**
	 * Creates and returns new Yummy_Recipes_Admin object.
	 *
	 * @return Yummy_Recipes_Admin
	 *
	 * @since    1.0.0
	 */
	public function yummy_recipes_admin(): Yummy_Recipes_Admin {
		if ( null === $this->yummy_recipes_admin ) {
			$this->yummy_recipes_admin = new Yummy_Recipes_Admin();
		}
		return $this->yummy_recipes_admin;
	}

	/**
	 * Creates and returns new Yummy_Recipes_Rest_Api object.
	 *
	 * @return Yummy_Recipes_Rest_Api
	 *
	 * @since    1.0.0
	 */
	public function yummy_recipes_rest_api(): Yummy_Recipes_Rest_Api {
		if ( null === $this->yummy_rest_api ) {
			$this->yummy_rest_api = new Yummy_Recipes_Rest_Api();
		}
		return $this->yummy_rest_api;
	}

	/**
	 * Creates and returns new Yummy_Recipes_Block_Editor object.
	 *
	 * @return Yummy_Recipes_Block_Editor
	 *
	 * @since    1.0.0
	 */
	public function yummy_recipes_block_editor(): Yummy_Recipes_Block_Editor {
		if ( null === $this->yummy_recipes_block_editor ) {
			$this->yummy_recipes_block_editor = new Yummy_Recipes_Block_Editor(
				$this->yummy_recipes_loader(),
				$this->yummy_recipes_recipe_search_block()
			);
		}
		return $this->yummy_recipes_block_editor;
	}

	/**
	 * Creates and returns new Yummy_Recipes_Recipe_Search_Block object.
	 *
	 * @return Yummy_Recipes_Recipe_Search_Block
	 *
	 * @since    1.0.0
	 */
	public function yummy_recipes_recipe_search_block(): Yummy_Recipes_Recipe_Search_Block {
		if ( null === $this->yummy_recipes_recipe_search_block ) {
			$this->yummy_recipes_recipe_search_block = new Yummy_Recipes_Recipe_Search_Block();
		}
		return $this->yummy_recipes_recipe_search_block;
	}

}
