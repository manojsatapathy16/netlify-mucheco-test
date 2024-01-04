<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19d74db424afa1e44fb7d84c0269e2bf
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit19d74db424afa1e44fb7d84c0269e2bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit19d74db424afa1e44fb7d84c0269e2bf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit19d74db424afa1e44fb7d84c0269e2bf::$classMap;

        }, null, ClassLoader::class);
    }
}