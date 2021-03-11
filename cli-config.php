<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;
use DI\ContainerBuilder;

require_once __DIR__ . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions(__DIR__ . '/config/services.php');
$container = $containerBuilder->build();

return ConsoleRunner::createHelperSet($container->get(EntityManager::class));
