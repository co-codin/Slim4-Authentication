<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Slim\Flash\Messages;

class FlashServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        'flash'
    ];

    public function register()
    {
        $container = $this->getContainer();

        $container->add('flash', function () {
            return new Messages();
        });
    }
}