<?php

declare(strict_types=1);

namespace App\core\http\Request;

use App\core\http\Url;

class FactoryFromGlobals
{
    public function make(): Request
    {
        return new Request(
            new Url($this->getUrlValue()),
            $_POST,
            $_GET,
            [],
            $_COOKIE
        );
    }

    private function getUrlValue(): string
    {
        $scheme = !empty($_SERVER['HTTPS']) ? 'https' : 'http';

        return $scheme . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }
}
