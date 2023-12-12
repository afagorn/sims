<?php

declare(strict_types=1);

namespace App\core;

use App\core\http\Url\Url;

class Router
{
    public function __construct(
        private readonly array $itemList
    )
    {
    }

    public function handle(Url $url)
    {
        $url->path = '';
    }
}
