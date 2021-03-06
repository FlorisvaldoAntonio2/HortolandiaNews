<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e90c4e4febbea1f2de9306528a27fcd
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e90c4e4febbea1f2de9306528a27fcd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e90c4e4febbea1f2de9306528a27fcd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0e90c4e4febbea1f2de9306528a27fcd::$classMap;

        }, null, ClassLoader::class);
    }
}
