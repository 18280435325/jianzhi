<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit892666ec5a4830b9333e294bdea3b72f
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Medoo\\' => 6,
        ),
        'C' => 
        array (
            'Config\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Medoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/catfan/medoo/src',
        ),
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Base' => __DIR__ . '/../..' . '/app/Base.php',
        'App\\Job' => __DIR__ . '/../..' . '/app/Job.php',
        'Medoo\\Medoo' => __DIR__ . '/..' . '/catfan/medoo/src/Medoo.php',
        'Medoo\\Raw' => __DIR__ . '/..' . '/catfan/medoo/src/Medoo.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit892666ec5a4830b9333e294bdea3b72f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit892666ec5a4830b9333e294bdea3b72f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit892666ec5a4830b9333e294bdea3b72f::$classMap;

        }, null, ClassLoader::class);
    }
}
