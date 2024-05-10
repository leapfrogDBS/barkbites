<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3348f85db3bf83520740be196dfaf3ac
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'libphonenumber\\' => 15,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'libphonenumber\\' => 
        array (
            0 => __DIR__ . '/..' . '/giggsey/libphonenumber-for-php-lite/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3348f85db3bf83520740be196dfaf3ac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3348f85db3bf83520740be196dfaf3ac::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3348f85db3bf83520740be196dfaf3ac::$classMap;

        }, null, ClassLoader::class);
    }
}
