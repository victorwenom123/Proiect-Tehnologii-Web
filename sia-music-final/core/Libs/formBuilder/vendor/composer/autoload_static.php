<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79528adbd9c2b3d8d4f7129f9d1fafcb
{
    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'DF' => 
            array (
                0 => __DIR__ . '/..' . '/dekyfin/php-array-forms/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit79528adbd9c2b3d8d4f7129f9d1fafcb::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit79528adbd9c2b3d8d4f7129f9d1fafcb::$classMap;

        }, null, ClassLoader::class);
    }
}
