<?php

declare(strict_types=1);

namespace App\core\http\Request;

use App\core\http\Url\Url;

class Request
{
    public function __construct(
        private readonly Url $url,
        private readonly array $post,
        private readonly array $get,
        private readonly array $header,
        private readonly array $cookie = []
    )
    {
    }


}
