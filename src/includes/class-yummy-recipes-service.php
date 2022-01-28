<?php
/**
 * The file that defines the core plugin class.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.0.0
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Includes
 */

namespace Yummy_Recipes\Includes;

use Yummy_Recipes\Admin\Yummy_Recipes_Admin;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current version of the plugin.
 *
 * @since      1.0.0
 * @package    Yummy_Recipes
 * @subpackage Yummy_Recipes/Includes
 * @author     Zarko
 */
class Yummy_Recipes_Service {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Yummy_Recipes_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version
	 */
	protected $version;

	/**
	 * The admin-specific functionality of the plugin.
	 * 
	 * @since    1.0.0
	 * @access   protected
	 * @var      Yummy_Recipes_Admin $admin The admin-specific functionality of the plugin.
	 */
	protected $admin;

	/**
	 * REST API functionality.
	 * 
	 * @since    1.0.0
	 * @access   protected
	 * @var      Yummy_Recipes_Rest_Api $rest_api REST API functionality.
	 */
	protected $rest_api;

	/**
	 * Block editor setup.
	 * 
	 * @since    1.0.0
	 * @access   protected
	 * @var      Yummy_Recipes_Block_Editor $block_editor Block editor setup.
	 */
	protected $block_editor;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @param Yummy_Recipes_Loader       $loader Instance of Yummy_Recipes_Loader class.
	 * @param Yummy_Recipes_Admin        $admin Instance of Yummy_Recipes_Admin class.
	 * @param Yummy_Recipes_Rest_Api     $rest_api Instance of Yummy_Recipes_Rest_Api class.
	 * @param Yummy_Recipes_Block_Editor $block_editor Instance of Yummy_Recipes_Block_Editor class.
	 *
	 * @since    1.0.0
	 */
	public function __construct( Yummy_Recipes_Loader $loader, Yummy_Recipes_Admin $admin, Yummy_Recipes_Rest_Api $rest_api, Yummy_Recipes_Block_Editor $block_editor ) {
		if ( \defined( 'YUMMY_RECIPES_VERSION' ) ) {
			$this->version = YUMMY_RECIPES_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		
		$this->loader       = $loader;
		$this->rest_api     = $rest_api;
		$this->admin        = $admin;
		$this->block_editor = $block_editor;
		
		$this->init();
	}

	/**
	 * Initialises all necessary updates, locale and cron jobs.
	 */
	private function init(): void {
		$this->define_admin_hooks();
		$this->set_block_editor();
		$this->set_rest_api();
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run(): void {
		$this->loader->run();
	}

	/**
	 * Admin related hooks.
	 */
	public function define_admin_hooks(): void {
		$this->loader->add_action( 'init', $this->admin, 'register_post_type' );
	}

	/**
	 * Block editor setup.
	 */
	public function set_block_editor(): void { 
		$this->block_editor->register_post_meta();
		$this->block_editor->register_dynamic_blocks();
		$this->loader->add_action( 'enqueue_block_editor_assets', $this->block_editor, 'block_editor_assets' );
	}

	/**
	 * REST API setup.
	 */
	public function set_rest_api(): void {
		$this->loader->add_action( 'rest_api_init', $this->rest_api, 'include_featured_image_url' );
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    Yummy_Recipes_Loader    Orchestrates the hooks of the plugin.
	 * @since     1.0.0
	 */
	public function get_loader(): Yummy_Recipes_Loader {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 * @since     1.0.0
	 */
	public function get_version(): string {
		return $this->version;
	}

}
