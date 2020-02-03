<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;
use App\Controllers\Auth\SignOutController;
use App\Controllers\Dashboard\DashboardController;

$app->get('/', HomeController::class)->setName('home');

$app->get('/auth/signin', SignInController::class . ":index")->setName('auth.signin');
$app->post('/auth/signin', SignInController::class . ":action");

$app->get('/auth/signout', SignOutController::class)->setName('auth.signout');

$app->get('/dashboard', DashboardController::class)->setName('dashboard');