<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9542bd0822cda5b0597e5e2a72a553fd
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bhaktaraz\\RSSGenerator\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bhaktaraz\\RSSGenerator\\' => 
        array (
            0 => __DIR__ . '/..' . '/bhaktaraz/php-rss-generator/Source/Bhaktaraz/RSSGenerator',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9542bd0822cda5b0597e5e2a72a553fd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9542bd0822cda5b0597e5e2a72a553fd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9542bd0822cda5b0597e5e2a72a553fd::$classMap;

        }, null, ClassLoader::class);
    }
}
