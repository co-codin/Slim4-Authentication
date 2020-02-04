<?php

namespace App\Providers;

use Slim\Csrf\Guard;
use Psr\Http\Message\ResponseFactoryInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;

class CsrfServiceProvider extends AbstractServiceProvider
{
    protected $responseFactory;

    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $provides = [
        'csrf'
    ];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function register()
    {
        $this->getContainer()->share('csrf', function () {
            return new Guard($this->responseFactory);
        });
    }
}
