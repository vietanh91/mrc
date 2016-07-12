<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit09765687674ffbf6e6a54c0ab689b29e
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '65fec9ebcfbb3cbb4fd0d519687aea01' => __DIR__ . '/..' . '/danielstjules/stringy/src/Create.php',
        '72579e7bd17821bb1321b87411366eae' => __DIR__ . '/..' . '/illuminate/support/helpers.php',
        '2eb1590845dce749c82a83ee08c4f89d' => __DIR__ . '/../..' . '/app/Support/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WeDevs\\ORM\\' => 11,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Translation\\' => 30,
            'Stringy\\' => 8,
        ),
        'R' => 
        array (
            'RVN\\' => 4,
        ),
        'I' => 
        array (
            'Illuminate\\Support\\' => 19,
            'Illuminate\\Database\\' => 20,
            'Illuminate\\Contracts\\' => 21,
            'Illuminate\\Container\\' => 21,
        ),
        'C' => 
        array (
            'Carbon\\' => 7,
        ),
        'A' => 
        array (
            'Aura\\Session\\_Config\\' => 21,
            'Aura\\Session\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WeDevs\\ORM\\' => 
        array (
            0 => __DIR__ . '/..' . '/tareq1988/wp-eloquent/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Stringy\\' => 
        array (
            0 => __DIR__ . '/..' . '/danielstjules/stringy/src',
        ),
        'RVN\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Illuminate\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/support',
        ),
        'Illuminate\\Database\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/database',
        ),
        'Illuminate\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/contracts',
        ),
        'Illuminate\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/container',
        ),
        'Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon',
        ),
        'Aura\\Session\\_Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/session/config',
        ),
        'Aura\\Session\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/session/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'V' => 
        array (
            'Valitron' => 
            array (
                0 => __DIR__ . '/..' . '/vlucas/valitron/src',
            ),
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Inflector\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/inflector/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Sailthru_Client' => __DIR__ . '/..' . '/sailthru/sailthru-php5-client/sailthru/Sailthru_Client.php',
        'Sailthru_Client_Exception' => __DIR__ . '/..' . '/sailthru/sailthru-php5-client/sailthru/Sailthru_Client_Exception.php',
        'Sailthru_Util' => __DIR__ . '/..' . '/sailthru/sailthru-php5-client/sailthru/Sailthru_Util.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit09765687674ffbf6e6a54c0ab689b29e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit09765687674ffbf6e6a54c0ab689b29e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit09765687674ffbf6e6a54c0ab689b29e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit09765687674ffbf6e6a54c0ab689b29e::$classMap;

        }, null, ClassLoader::class);
    }
}