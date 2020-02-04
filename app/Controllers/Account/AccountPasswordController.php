<?php

namespace App\Controllers\Account;

use Exception;
use Slim\Csrf\Guard;
use Slim\Views\Twig;
use Slim\Flash\Messages;
use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface;
use Slim\Interfaces\RouteParserInterface;
use Psr\Http\Message\ServerRequestInterface;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class AccountPasswordController extends Controller
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

    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->view->render($response, 'pages/account/password.twig');
    }

    public function action(ServerRequestInterface $request, ResponseInterface $response)
    {

        $this->flash->addMessage('status', 'Password updated!');

        return $response->withHeader('Location', $this->routeParser->urlFor('account.password'));
    }
}