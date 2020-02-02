<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;

$container->add(HomeController::class, function () use ($container) {
    return new HomeController(
        $container->get('view')
    );
});

$container->add(SignInController::class, function () use ($container) {
    return new SignInController(
        $container->get('view')
    );
});