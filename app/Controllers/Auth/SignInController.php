<?php

namespace App\Controllers\Auth;

use Slim\Views\Twig;

class SignInController
{
    protected $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function index($request, $response)
    {
        return $this->view->render($response, 'pages/auth/signin.twig');
    }
}