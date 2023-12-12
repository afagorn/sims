<?php

namespace Tests\core\http\Url;

use App\core\http\Url\Query;
use App\core\http\Url\QueryList;
use App\core\http\Url\Url;
use DomainException;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function testSuccessMinimum(): void
    {
        $url = new Url(UrlFake::SCHEME, host: UrlFake::HOST);

        $this->assertSame(UrlFake::SCHEME, $url->getScheme());
        $this->assertSame(UrlFake::HOST, $url->getHost());

        $this->assertNull($url->getPort());
        $this->assertNull($url->getPath());
        $this->assertNull($url->getQueryList());
    }

    public function testSuccessFull(): void
    {
        $queryList = new QueryList([
            new Query('key1', 'value1'),
            new Query('key2', 'value2'),
        ]);

        $url = new Url(
            scheme: UrlFake::SCHEME,
            host: UrlFake::HOST,
            port: UrlFake::PORT_PARSED,
            path: UrlFake::PATH,
            queryList: $queryList
        );

        $this->assertSame(UrlFake::SCHEME, $url->getScheme());
        $this->assertSame(UrlFake::HOST, $url->getHost());
        $this->assertSame(UrlFake::PORT_PARSED, $url->getPort());
        $this->assertSame(UrlFake::PATH, $url->getPath());
        $this->assertSame($queryList, $url->getQueryList());
    }

    public function testWrongScheme(): void
    {
        $this->expectException(DomainException::class);

        new Url(
            scheme: 'http1',
            host: UrlFake::HOST
        );
    }

    public function testWrongHost(): void
    {
        $this->expectException(DomainException::class);

        new Url(
            scheme: UrlFake::SCHEME,
            host: '.example.1'
        );
    }

    public function testWrongPort()
    {
        $this->expectException(DomainException::class);

        new Url(
            scheme: UrlFake::SCHEME,
            host: UrlFake::HOST,
            port: 0
        );
    }

    public function testWrongPath()
    {
        $this->expectException(DomainException::class);

        new Url(
            scheme: UrlFake::SCHEME,
            host: UrlFake::HOST,
            path: 'wrong_path'
        );
    }
}
