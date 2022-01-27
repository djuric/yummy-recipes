<?php
/**
 * Bootstrap the plugin files.
 *
 * @since             1.0.0
 * @package           Yummy_Recipes
 *
 * @wordpress-plugin
 * Plugin Name:       Yummy Recipes
 * Description:       Create and search for the yummy recipes.
 * Version:           1.0.0
 * Author:            Zarko
 * Author URI:        https://zarko.dev
 * Text Domain:       yummy-recipes
 * Domain Path:       /languages
 */

use Yummy_Recipes\Infrastructure\Yummy_Recipes_Service_Container;

if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Current SemVer plugin version and paths.
 */
define( 'YUMMY_RECIPES_VERSION', '1.0.0' );
define( 'YUMMY_RECIPES_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'YUMMY_RECIPES_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require YUMMY_RECIPES_PLUGIN_DIR . 'vendor/autoload.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
$plugin = Yummy_Recipes_Service_Container::get_instance()->yummy_recipes_service();
$plugin->run();