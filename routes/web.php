<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;
use App\Controllers\Auth\SignOutController;
use App\Controllers\Dashboard\DashboardController;
use App\Middleware\RedirectIfGuest;
use App\Middleware\RedirectIfAuthenticated;

$app->get('/', HomeController::class)->setName('home');

$app->group('/auth', function ($route) {
    $route->group('', function ($route) {
        $route->get('/signin', SignInController::class . ":index")
            ->setName('auth.signin');

        $route->post('/signin', SignInController::class . ":action");
    })->add(RedirectIfAuthenticated::class);

    $route->get('/signout', SignOutController::class)->setName('auth.signout');
});

$app->get('/dashboard', DashboardController::class)
    ->setName('dashboard')
    ->add(RedirectIfGuest::class);