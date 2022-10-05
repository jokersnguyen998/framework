<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb3c4165e2bdf0c232ac4ba152099008c
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Klthuy\\Framework\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Klthuy\\Framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb3c4165e2bdf0c232ac4ba152099008c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb3c4165e2bdf0c232ac4ba152099008c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb3c4165e2bdf0c232ac4ba152099008c::$classMap;

        }, null, ClassLoader::class);
    }
}
