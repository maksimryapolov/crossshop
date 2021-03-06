<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfaf050e8006074cb28b5cc3431f136ec
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'C' => 
        array (
            'Components\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Components\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application/components',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfaf050e8006074cb28b5cc3431f136ec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfaf050e8006074cb28b5cc3431f136ec::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
