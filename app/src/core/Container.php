<?php

declare(strict_types=1);

namespace App\core;

class Container
{
    public function __construct(
        private readonly array $itemList
    )
    {
    }
}
