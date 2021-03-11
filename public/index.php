<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$isDevMode = true;

$kernel = new Kernel($isDevMode);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
