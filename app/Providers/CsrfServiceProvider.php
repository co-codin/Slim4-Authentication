<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Csrf\Guard;

class CsrfServiceProvider extends AbstractServiceProvider
{
    protected $responseFactory;

    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    protected $provides = [
        'csrf'
    ];

    public function register()
    {
        $this->getContainer()->add('csrf', function () {
           return new Guard($this->responseFactory);
        });
    }
}