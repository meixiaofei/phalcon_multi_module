<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'version'       => '1.0',
    'debug'         => true,
    'timezone'      => 'Asia/Shanghai',

    'database' => [
        'db' => [
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname'   => 'phalcon',
            'charset'  => 'utf8',
        ],
        'prefix' => ''
    ],

    'application' => [
        'appDir'        => APP_PATH . '/',
        'modelsDir'     => APP_PATH. '/common/models',
        'migrationsDir' => APP_PATH . '/migrations/',
        'cacheDir'      => BASE_PATH . '/cache/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        'baseUri'        => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
    ],

    'classPath' => [
        'App\Common\Controllers'    => APP_PATH. '/common/controllers',
        'App\Common\Plugins'        => APP_PATH. '/common/plugins',
        'App\Common\Library'        => APP_PATH. '/common/library',
        'App\Common\Services'       => APP_PATH. '/common/services',

        'App\Home'  => APP_PATH. '/modules/home',
        'App\Admin' => APP_PATH. '/modules/admin',
    ],

    'modules' => [
        'home'  => ['className' => 'App\Home\Module'],
        'admin' => ['className' => 'App\Admin\Module'],
    ],

    /**
     * if true, then we print a new line at the end of each CLI execution
     *
     * If we dont print a new line,
     * then the next command prompt will be placed directly on the left of the output
     * and it is less readable.
     *
     * You can disable this behaviour if the output of your application needs to don't have a new line at end
     */
    'printNewLine' => true
]);
