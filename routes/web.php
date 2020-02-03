<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;
use App\Controllers\Auth\SignOutController;
use App\Controllers\Dashboard\DashboardController;
use App\Middleware\RedirectIfGuest;

$app->get('/', HomeController::class)->setName('home');

$app->get('/auth/signin', SignInController::class . ":index")->setName('auth.signin');
$app->post('/auth/signin', SignInController::class . ":action");

$app->get('/auth/signout', SignOutController::class)->setName('auth.signout');

$app->get('/dashboard', DashboardController::class)
    ->setName('dashboard')
    ->add(RedirectIfGuest::class);