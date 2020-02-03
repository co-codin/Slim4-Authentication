<?php

namespace App\Views;

use Slim\Csrf\Guard;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class CsrfExtension extends AbstractExtension
{
    protected $csrf;

    public function __construct(Guard $csrf)
    {
        $this->csrf = $csrf;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'csrf';
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('csrf', [$this, 'csrf']),
        ];
    }

    public function csrf()
    {
        return '
            <input type="hidden" name="' . $this->csrf->getTokenNameKey() . '" value="' . $this->csrf->getTokenName() . '">
            <input type="hidden" name="' . $this->csrf->getTokenValueKey() . '" value="' . $this->csrf->getTokenValue() . '">
        ';
    }
}
