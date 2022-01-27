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
final class Yummy_Recipes_Service_Container
{
    /**
     * Instance of the Yummy_Recipes_Service_Container class.
     *
     * @var  Yummy_Recipes_Service_Container
     */
    protected static $instance;

    /**
     * @var Yummy_Recipes_Service
     */
    private $yummy_recipes_service;

    /**
     * @var Yummy_Recipes_Loader
     */
    private $yummy_recipes_loader;

    protected function __construct()
    {
    }

    /**
     * Get service container instance
     *
     * @return Yummy_Recipes_Service_Container
     *
     * @since    1.0.0
     */
    public static function get_instance(): Yummy_Recipes_Service_Container
    {
        if (!self::$instance) {
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
    public function yummy_recipes_loader(): Yummy_Recipes_Loader
    {
        if (null === $this->yummy_recipes_loader) {
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
    public function yummy_recipes_service(): Yummy_Recipes_Service
    {
        if (null === $this->yummy_recipes_service) {
            $this->yummy_recipes_service = new Yummy_Recipes_Service(
                $this->yummy_recipes_loader()
            );
        }
        return $this->yummy_recipes_service;
    }

}