<?php

namespace App\Providers;

use App\Middleware\RedirectIfGuest;
use League\Container\ServiceProvider\AbstractServiceProvider;

class MiddlewareServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        RedirectIfGuest::class
    ];

    public function register()
    {
        $container = $this->getContainer();

        $container->add(RedirectIfGuest::class, function () {
            return new RedirectIfGuest();
        });
    }
}