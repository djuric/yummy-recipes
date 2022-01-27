<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit181c3def2a978e9e8e5a76a458fc709b
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'VariableAnalysis\\' => 17,
        ),
        'D' => 
        array (
            'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 55,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'VariableAnalysis\\' => 
        array (
            0 => __DIR__ . '/..' . '/sirbrillig/phpcs-variable-analysis/VariableAnalysis',
        ),
        'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 
        array (
            0 => __DIR__ . '/..' . '/dealerdirect/phpcodesniffer-composer-installer/src',
        ),
    );

    public static $classMap = array (
        'Yummy_Recipes\\Includes\\Yummy_Recipes_Loader' => __DIR__ . '/../..' . '/src/includes/class-yummy-recipes-loader.php',
        'Yummy_Recipes\\Includes\\Yummy_Recipes_Service' => __DIR__ . '/../..' . '/src/includes/class-yummy-recipes-service.php',
        'Yummy_Recipes\\Infrastructure\\Yummy_Recipes_Service_Container' => __DIR__ . '/../..' . '/src/app/infrastructure/class-yummy-recipes-service-container.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit181c3def2a978e9e8e5a76a458fc709b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit181c3def2a978e9e8e5a76a458fc709b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit181c3def2a978e9e8e5a76a458fc709b::$classMap;

        }, null, ClassLoader::class);
    }
}
