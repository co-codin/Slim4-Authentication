<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;
use App\Controllers\Auth\SignOutController;
use App\Controllers\Dashboard\DashboardController;
use App\Middleware\RedirectIfGuest;
use App\Middleware\RedirectIfAuthenticated;
use App\Controllers\Auth\SignUpController;
use App\Controllers\Account\AccountController;
use App\Controllers\Account\AccountPasswordController;

$app->get('/', HomeController::class)->setName('home');

$app->group('/auth', function ($route) {
    $route->group('', function ($route) {
        $route->get('/signin', SignInController::class . ":index")
            ->setName('auth.signin');
        $route->post('/signin', SignInController::class . ":action");

        $route->get('/signup', SignUpController::class . ":index")
            ->setName('auth.signup');
        $route->post('/signup', SignUpController::class . ":action");

    })->add(RedirectIfAuthenticated::class);

    $route->post('/signout', SignOutController::class)->setName('auth.signout');
});

$app->group('', function ($route) {
    $route->get('/account', AccountController::class . ':index')->setName('account');
    $route->post('/account', AccountController::class . ':action');

    $route->get('/account/password', AccountPasswordController::class . ':index')->setName('account.password');
    $route->post('/account/password', AccountPasswordController::class . ':action');

    $route->get('/dashboard', DashboardController::class)->setName('dashboard');
})->add(RedirectIfGuest::class);