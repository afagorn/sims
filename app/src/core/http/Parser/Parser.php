<?php

namespace App\core\http\Parser;

class Parser
{
    //или сделать это сервисом? И сделать просто исключение UrlExceprion???

    public function parse(string $value): Url
    {
        $parsedData = parse_url($value);

        if (!$parsedData) {

        }

            if (empty($parsedData['scheme'])) {
                throw new UrlParserException("Scheme not found.", $this->value);
            }

        if (empty($parsedData['host'])) {
            throw new UrlParserException("Host not found.", $this->value);
        }

        $this->scheme = $parsedData['scheme'];
        $this->path = $parsedData['path'];

        $this->path = '';
    }
}