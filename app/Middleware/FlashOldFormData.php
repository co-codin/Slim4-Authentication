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

    public function __invoke(RequestInterface $request, RequestHandlerInterface $handler)
    {
        $this->flash->addMessage('old', $request->getParsedBody());

        return $handler->handle($request);
    }
}
