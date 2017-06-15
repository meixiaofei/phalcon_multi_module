<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * to avoid the namespace
 * register models to the root because of the phql use the model
 */
$loader->registerDirs(
    [
        $config->application->modelsDir,
    ]
);

/**
 * register classPath
 */
$loader->registerNamespaces($config->classPath->toArray());

$loader->register();