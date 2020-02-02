<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\SignInController;


$app->get('/', HomeController::class);

$app->get('/auth/signin', SignInController::class . ":index");