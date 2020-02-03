<?php

namespace App\Middleware;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Flash\Messages;
use Slim\Interfaces\RouteParserInterface;

class RedirectIfGuest
{
    protected $flash;

    protected $routeParser;

    public function __construct(Messages $flash, RouteParserInterface $routeParser)
    {
        $this->flash = $flash;
        $this->routeParser = $routeParser;
    }

    public function __invoke(RequestInterface $request, RequestHandlerInterface $handler)
    {
        $response = $handler->handle($request);

        if (Sentinel::guest()) {
            $this->flash->addMessage('status', 'Please sign in before continuing');

            $response = $response->withHeader(
                'Location',
                $this->routeParser->urlFor('auth.signin') .
                '?' .
                http_build_query(['redirect' => $request->getUri()->getPath()])
            );
        }

        return $response;
    }
}