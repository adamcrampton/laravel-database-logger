<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e8db080611784448a5b00cb52c1836c
{
    public static $files = array (
        '03e773cbcc84e96ada128aee99661fb4' => __DIR__ . '/../..' . '/app/Helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tests\\' => 6,
        ),
        'A' => 
        array (
            'AdamCrampton\\LaravelDatabaseLogger\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'AdamCrampton\\LaravelDatabaseLogger\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1e8db080611784448a5b00cb52c1836c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1e8db080611784448a5b00cb52c1836c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
