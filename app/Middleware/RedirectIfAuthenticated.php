<?php

namespace App\Middleware;

use Slim\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class RedirectIfAuthenticated
{
    public function __invoke(RequestInterface $request, RequestHandlerInterface $handler)
    {
        if (!Sentinel::guest()) {
            $response = new Response();

            return $response->withHeader('Location', '/');
        }

        return $handler->handle($request);
    }
}