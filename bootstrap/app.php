<?php

use Slim\Factory\AppFactory;
use League\Container\Container;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();

AppFactory::setContainer($container);

$app = AppFactory::create();

$container->addServiceProvider(new \App\Providers\ViewServiceProvider());

require_once __DIR__ . '/container.php';

require_once __DIR__ . '/../routes/web.php';