<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;

class ViewServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        'view'
    ];

    public function register()
    {

    }
}