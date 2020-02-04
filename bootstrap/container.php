<?php

use App\Providers\CsrfServiceProvider;
use App\Providers\ViewServiceProvider;
use App\Providers\FlashServiceProvider;
use App\Providers\MiddlewareServiceProvider;

$container->addServiceProvider(
    new ViewServiceProvider(
        $app->getRouteCollector()->getRouteParser()
    )
);

$container->addServiceProvider(
    new FlashServiceProvider()
);

$container->addServiceProvider(
    new CsrfServiceProvider(
        $app->getResponseFactory()
    )
);

$container->addServiceProvider(
    new MiddlewareServiceProvider(
        $app->getRouteCollector()->getRouteParser()
    )
);
