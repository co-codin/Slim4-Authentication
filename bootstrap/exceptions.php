<?php

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$errorMiddleware->setDefaultErrorHandler(
    new \App\Exceptions\ExceptionHandler(
        $container->get('flash'),
        $app->getResponseFactory()
    )
);