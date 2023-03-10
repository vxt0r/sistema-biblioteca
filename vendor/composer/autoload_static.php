<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd5597c72d30b342931df4cc61a9b1547
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd5597c72d30b342931df4cc61a9b1547::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd5597c72d30b342931df4cc61a9b1547::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd5597c72d30b342931df4cc61a9b1547::$classMap;

        }, null, ClassLoader::class);
    }
}