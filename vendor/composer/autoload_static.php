<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb6ba8236d3a4fe42cbcf42d7b71cc263
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SpotifyWebAPI\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SpotifyWebAPI\\' => 
        array (
            0 => __DIR__ . '/..' . '/jwilsson/spotify-web-api-php/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb6ba8236d3a4fe42cbcf42d7b71cc263::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb6ba8236d3a4fe42cbcf42d7b71cc263::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb6ba8236d3a4fe42cbcf42d7b71cc263::$classMap;

        }, null, ClassLoader::class);
    }
}
