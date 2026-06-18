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
        private readonly array $post
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

        $post = $_POST ?? [];

        return new self(
            uri: $uri,
            method: $method,
            path: $path,
            post: $post
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
    public function getPost(): array
    {
        return $this->post;
    }
    public function input(string $name): ?string
    {
        if (isset($this->post[$name])) {
            return $this->post[$name];
        }
        return null;
    }
}
