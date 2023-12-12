<?php

declare(strict_types=1);

namespace App;

use App\core\http\Request\Request;
use App\core\Router;

class Application
{
    public function __construct(
        private Router $router
    )
    {
    }

    public function run(Request $request): void
    {

    }
}
