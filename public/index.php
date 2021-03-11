<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$environment = 'development';

$kernel = new Kernel($environment);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
