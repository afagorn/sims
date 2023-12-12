<?php

declare(strict_types=1);

namespace App\core\http\Url;

class QueryList
{
    /**
     * @var Query[]
     */
    private array $items;

    /**
     * @param Query[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return Query[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
