<?php

$app->get('/', function ($request, $response, $args) use ($container) {
    return $container->get('view')->render($response, 'pages/home/index.twig');
});