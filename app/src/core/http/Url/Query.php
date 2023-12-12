<?php

declare(strict_types=1);

namespace App\core\http\Url;

use DomainException;

class Query
{
    private string $key;
    private string $value;

    public function __construct(
        string $key,
        string $value
    )
    {
        $this->setKey($key);
        $this->setValue($value);
    }

    private function setKey(string $key): void
    {
        if (empty($key)) {
            throw new DomainException("Передан ключ для Query");
        }

        $this->key = $key;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
