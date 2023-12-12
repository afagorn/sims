<?php

declare(strict_types=1);

namespace Tests\core\http\Url;

class UrlFake
{
    public const SCHEME = 'http';
    public const HOST = 'example.com';
    public const PORT = ':80';
    public const PORT_PARSED = 80;
    public const PATH = '/blog/article';
    public const QUERY = '?id=100&page=1';
    public const TEMPLATE = '%s://%s%s%s%s';

    public static function asString(): string
    {
        return sprintf(
            self::TEMPLATE,
            self::SCHEME,
            self::HOST,
            self::PORT,
            self::PATH,
            self::QUERY
        );
    }
}
