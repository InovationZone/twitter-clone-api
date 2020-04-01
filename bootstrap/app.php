<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\DatabasePresenceVerifier;
use Illuminate\Validation\Factory;

require_once 'eloquent.php';

$container = new Container();

//request
$request = Request::capture();
$container->instance('Illuminate\Http\Request', $request);

//response
$response = new Symfony\Component\HttpFoundation\JsonResponse();
$container->instance('Symfony\Component\HttpFoundation\JsonResponse', $response);

//validator
$loader = new FileLoader(new Filesystem, 'lang');
$translator = new Translator($loader, 'en');
$presence = new DatabasePresenceVerifier($capsule->getDatabaseManager());
$validation = new Factory($translator, new Container);
$validation->setPresenceVerifier($presence);
$container->instance('Illuminate\Validation\Factory', $validation);

//routes
$events = new Dispatcher($container);
$router = new Router($events, $container);

require_once __DIR__ . '/../routes/api.php';

$response = $router->dispatch($request);
$response->send();