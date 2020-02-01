<?php

$container->addServiceProvider(
    new \App\Providers\ViewServiceProvider(
        $app->getRouteCollector()->getRouteParser()
    )
);