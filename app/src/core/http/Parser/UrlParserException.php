<?php

namespace App\core\http\Parser;

use Exception;

class UrlParserException extends Exception
{
    public function __construct(string $message, string $urlValue)
    {
        $message .= " Url value: $urlValue";

        parent::__construct($message);
    }
}