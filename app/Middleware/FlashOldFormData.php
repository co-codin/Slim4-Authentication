<?php

namespace App\Middleware;

use Slim\Flash\Messages;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FlashOldFormData
{
    protected $flash;

    public function __construct(Messages $flash)
    {
        $this->flash = $flash;
    }

    public function __invoke(RequestHandlerInterface $request, ResponseInterface $response)
    {
        $this->flash->addMessage('old', $request->getParsedBody());

        return $handler->handle($request);
    }
}