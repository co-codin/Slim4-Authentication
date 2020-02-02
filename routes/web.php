<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;
use App\Controllers\Auth\SignOutController;

$app->get('/', HomeController::class)->setName('home');

$app->get('/auth/signin', SignInController::class . ":index")->setName('auth.signin');
$app->post('/auth/signin', SignInController::class . ":action");

$app->get('/auth/signout', SignOutController::class)->setName('auth.signout');