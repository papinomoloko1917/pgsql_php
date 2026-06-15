<?php

declare(strict_types=1);

namespace App\Request;

use Uri\Rfc3986\Uri;

class Request
{
    public function __construct(
        private readonly string $uri,
        private readonly string $method,
        private readonly string $path,
    ) {
    }
    public static function createFromGlobals()
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        $parsedUri = Uri::parse($uri);

        $rawPath = $parsedUri->getPath() ?? '/';

        $rawPath = rtrim($rawPath, '/');
        if ($rawPath === '') {
            $path = '/';
        }

        $path = $rawPath ?: '/';

        return new self(
            uri: $uri,
            method: $method,
            path: $path
        );
    }
    public function getPath(): string
    {
        return $this->path;
    }
    public function getMethod(): string
    {
        return $this->method;
    }
    public function getUri(): string
    {
        return $this->uri;
    }
}
