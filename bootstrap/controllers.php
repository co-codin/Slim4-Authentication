<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;
use App\Controllers\Auth\SignOutController;

$container->add(HomeController::class, function () use ($container) {
    return new HomeController(
        $container->get('view')
    );
});

$container->add(SignInController::class, function () use ($app, $container) {
    return new SignInController(
        $container->get('view'),
        $container->get('flash'),
        $app->getRouteCollector()->getRouteParser()
    );
});

$container->add(SignOutController::class, function () use ($app) {
    return new SignOutController(
        $app->getRouteCollector()->getRouteParser()
    );
});