<?php

require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

function getEntityManager(): EntityManager
{
    $paths = array(__DIR__ . '/src/Entities');
    $isDevMode = true;

    $dbParams = array(
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__ . '/db.sqlite'
    );

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
    $entityManager = EntityManager::create($dbParams, $config);

    return $entityManager;
}
