<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';

error_reporting(E_ALL);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$kernel = new Kernel();
$request = Request::createFromGlobals();
$response = $kernel->handle($request, false);
$response->send();