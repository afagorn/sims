<?php

declare(strict_types=1);

namespace App\core\http\Url;

use DomainException;

class Url
{
    private string $scheme;
    private string $host;
    private ?int $port = null;
    private ?string $path = null;
    private ?QueryList $queryList = null;

    public function __construct(
        string $scheme,
        string $host,
        ?int $port = null,
        ?string $path = null,
        ?QueryList $queryList = null
    )
    {
        $this->setScheme($scheme);
        $this->setHost($host);

        if (!is_null($port)) {
            $this->setPort($port);
        }

        if (!is_null($path)) {
            $this->setPath($path);
        }

        if (!is_null($queryList)) {
            $this->setQueryList($queryList);
        }
    }

    private function setScheme(string $scheme): void
    {
        if (!preg_match('/^[a-zA-Z]{2,}$/', $scheme)) {
            throw new DomainException(
                "Схема Url должна быть не меньше двух символов и состоять только из латиницы. Получено $scheme"
            );
        }

        $this->scheme = $scheme;
    }

    private function setHost(string $host): void
    {
        if (!preg_match('/^[a-zA-Z0-9-]+(.[a-zA-Z0-9-]+)*.[a-zA-Z]{2,}$/', $host)) {
            throw new DomainException("Передан неправильный хост для Url. Получено $host");
        }

        $this->host = $host;
    }

    private function setPort(int $port): void
    {
        if ($port <= 0 || $port > 65535) {
            throw new DomainException("Передан неправильный порт для Url. Получение $port");
        }

        $this->port = $port;
    }

    public function setPath(string $path): void
    {
        if (!preg_match('/^\/[a-zA-Z0-9\/_-]+$/', $path)) {
            throw new DomainException("Передан неправильный путь для Url");
        }

        $this->path = $path;
    }

    public function setQueryList(QueryList $queryList): void
    {
        $this->queryList = $queryList;
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function getQueryList(): ?QueryList
    {
        return $this->queryList;
    }
}
