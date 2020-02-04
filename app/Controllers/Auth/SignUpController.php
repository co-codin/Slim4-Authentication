<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Flash\Messages;
use Slim\Interfaces\RouteParserInterface;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Slim\Views\Twig;

class SignUpController extends Controller
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
        return $this->view->render($response, 'pages/auth/signup.twig');
    }

    public function action(ServerRequestInterface $request, ResponseInterface $response)
    {
        $data = $this->validate($request, [
            'email' => ['required', 'email' ],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'password' => ['required']
        ]);

        try {
            $user = Sentinel::register($data, true);

            Sentinel::authenticate($user);
        } catch (\Exception $e) {
            $this->flash->addMessage('status', 'Something went wrong');

            return $response->withHeader(
                'Location', $this->routeParser->urlFor('auth.signup')
            );
        }

        return $response;
    }
}