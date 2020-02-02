<?php

namespace App\Controllers\Auth;

use Slim\Flash\Messages;
use Slim\Interfaces\RouteParserInterface;
use Slim\Views\Twig;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class SignInController
{
    protected $view;

    protected $flash;

    protected $routeParser;

    public function __construct(Twig $view, Messages $flash, RouteParserInterface $routeParser)
    {
        $this->view = $view;
        $this->flash = $flash;
        $this->routeParser = $routeParser;
    }

    public function index($request, $response)
    {
        return $this->view->render($response, 'pages/auth/signin.twig');
    }

    public function action($request, $response)
    {
        $data = $request->getParsedBody();

        if (!$user = Sentinel::authenticate($data)) {
            $this->flash->addMessage('status', 'Could not sign you in.');

            return $response->withHeader(
                'Location', $this->routeParser->urlFor('auth.signin')
            );
        }

        return $response->withHeader(
          'Location', $this->routeParser->urlFor('home')
        );
    }
}