<?php

declare(strict_types=1);

namespace App\Route;

use Closure;

final class Route
{
    public function __construct(
        private readonly string $path,
        private readonly string $method,
        private readonly array|Closure $handler,
    ) {
    }
    public static function get(string $path, array|Closure $handler): self
    {
        return new self($path, 'GET', $handler);
    }
    public static function post(string $path, array|Closure $handler): self
    {
        return new self($path, 'POST', $handler);
    }
    public function getPath(): string
    {
        return $this->path;
    }
    public function getMethod(): string
    {
        return $this->method;
    }
    public function getHandler(): array|Closure
    {
        return $this->handler;
    }
}
