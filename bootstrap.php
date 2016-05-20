<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

function GetEntityManager()
{
    $paths     = [__DIR__.'/src/Entity'];
    $isDevMode = true;

    // the connection configuration
    $dbParams = [
        'driver'   => 'pdo_mysql',
        'user'     => 'root',
        'password' => '',
        'dbname'   => 'graphql-demo',
    ];

    $config        = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
    $entityManager = EntityManager::create($dbParams, $config);

    return $entityManager;
}
