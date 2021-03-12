<?php

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

return [
    // ORM Entities
    EntityManager::class => function () {
        $paths = array(__DIR__ . '/../src/Entities');
        $dbParams = array(
            'driver'   => 'pdo_sqlite',
            'path'     => __DIR__ . '/../db.sqlite'
        );
        $config = Setup::createAnnotationMetadataConfiguration($paths, true, null, null, false);

        return EntityManager::create($dbParams, $config);
    },

    // Populated Request
    Request::class => function () {
        return Request::createFromGlobals();
    },

    // Twig Templates
    Environment::class => function () {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        return new Environment($loader, [
            'cache' => __DIR__ . '/../var/cache',
            'auto_reload' => true
        ]);
    },

];
