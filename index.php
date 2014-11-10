<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Scheme\SchemeKernel;

$request = Request::createFromGlobals();

$kernel = new SchemeKernel();
$response = $kernel->handle($request);

$response->send();