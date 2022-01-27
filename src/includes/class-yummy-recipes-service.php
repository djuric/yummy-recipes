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

use Yummy_Recipes\Infrastructure\Yummy_Recipes_Service_Container;

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
class Yummy_Recipes_Service
{

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
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @param Yummy_Recipes_Loader $loader Instance of Yummy_Recipes_Loader class.
     *
     * @since    1.0.0
     */
    public function __construct( Yummy_Recipes_Loader $loader )
    {
        if (\defined('YUMMY_RECIPES_VERSION')) {
            $this->version = YUMMY_RECIPES_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->yummy_recipes = 'yummy-recipes';
        $this->loader = $loader;
        
        $this->init();
    }

    /**
     * Initialises all necessary updates, locale and cron jobs.
     */
    private function init(): void
    {
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run(): void
    {
        $this->loader->run();
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @return    Yummy_Recipes_Loader    Orchestrates the hooks of the plugin.
     * @since     1.0.0
     */
    public function get_loader(): Yummy_Recipes_Loader
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return    string    The version number of the plugin.
     * @since     1.0.0
     */
    public function get_version(): string
    {
        return $this->version;
    }

}
