<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;
use App\Controllers\Auth\SignOutController;
use App\Controllers\Dashboard\DashboardController;
use App\Middleware\RedirectIfGuest;
use App\Middleware\RedirectIfAuthenticated;

$app->get('/', HomeController::class)->setName('home');

$app->get('/auth/signin', SignInController::class . ":index")
    ->setName('auth.signin')
    ->add(RedirectIfAuthenticated::class);

$app->post('/auth/signin', SignInController::class . ":action")
    ->add(RedirectIfAuthenticated::class);

$app->get('/auth/signout', SignOutController::class)->setName('auth.signout');

$app->get('/dashboard', DashboardController::class)
    ->setName('dashboard')
    ->add(RedirectIfGuest::class);