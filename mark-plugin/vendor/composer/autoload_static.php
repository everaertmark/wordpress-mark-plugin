<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbde6ecb4e4d868d51e3f96760e3320df
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbde6ecb4e4d868d51e3f96760e3320df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbde6ecb4e4d868d51e3f96760e3320df::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
