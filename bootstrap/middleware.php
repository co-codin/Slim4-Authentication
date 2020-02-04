<?php

$app->add(new \App\Middleware\FlashOldFormData(
    $container->get('flash')
));

$app->add('csrf');