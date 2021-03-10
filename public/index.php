<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';

$isDevMode = true;

// Error reporting
if (!$isDevMode) {
    error_reporting(E_ALL);
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

// Request/Response handling
$kernel = new Kernel();
$request = Request::createFromGlobals();
$response = $kernel->handle($request, !$isDevMode);
$response->send();