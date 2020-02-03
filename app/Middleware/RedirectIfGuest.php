<?php

namespace App\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RedirectIfGuest
{
    public function __invoke(RequestInterface $request, RequestHandlerInterface $handler)
    {
        die('works');
    }
}