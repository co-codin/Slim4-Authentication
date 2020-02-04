<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;
use App\Controllers\Auth\SignOutController;
use App\Controllers\Dashboard\DashboardController;
use App\Controllers\Auth\SignUpController;
use App\Controllers\Account\AccountController;

$container->add(HomeController::class, function () use ($container) {
    return new HomeController(
        $container->get('view')
    );
});

$container->add(DashboardController::class, function () use ($container) {
    return new DashboardController(
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

$container->add(SignUpController::class, function () use ($app, $container) {
    return new SignUpController(
        $container->get('view'),
        $container->get('flash'),
        $app->getRouteCollector()->getRouteParser()
    );
});

$container->add(AccountController::class, function () use ($app, $container) {
    return new AccountController(
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

