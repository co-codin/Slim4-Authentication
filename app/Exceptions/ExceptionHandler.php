<?php

namespace App\Exceptions;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Flash\Messages;
use Slim\Psr7\Factory\ResponseFactory;

class ExceptionHandler
{
    protected $flash;

    protected $responseFactory;

    public function __construct(Messages $flash, ResponseFactory $responseFactory)
    {
        $this->flash = $flash;
        $this->responseFactory = $responseFactory;
    }

    public function __invoke(ServerRequestInterface $request, \Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            $this->flash->addMessage('errors', $exception->getErrors());

            return $this->responseFactory
                ->createResponse()
                ->withHeader('Location', $exception->getPath());
        }

        throw $exception;
    }
}