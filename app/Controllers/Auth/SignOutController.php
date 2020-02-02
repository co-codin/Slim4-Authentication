<?php

namespace App\Controllers\Auth;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Slim\Interfaces\RouteParserInterface;

class SignOutController
{
    protected $routeParser;

    public function __construct(RouteParserInterface $routeParser)
    {
        $this->routeParser = $routeParser;
    }

    public function __invoke($request, $response)
    {
        Sentinel::logout();

        return $response->withHeader('Location', $this->routeParser->urlFor('home'));
    }
}