<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbf518b27471209b85c3258f8aa337a93
{
    public static $files = array (
        '634ed4b902be02cb2de1f850ad1959ad' => __DIR__ . '/../..' . '/registration.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Aiello1\\Antonio\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Aiello1\\Antonio\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbf518b27471209b85c3258f8aa337a93::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbf518b27471209b85c3258f8aa337a93::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
