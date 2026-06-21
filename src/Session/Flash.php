<?php

declare(strict_types=1);

namespace App\Session;

final class Flash
{
    private const KEY = 'flash';
    public function success(string $message): void
    {
        $_SESSION[self::KEY] = [
            'type' => 'success',
            'message' => $message
        ];
    }
    public function get(): ?array
    {
        if (!isset($_SESSION[self::KEY])) {
            return null;
        }
        $flash = $_SESSION[self::KEY];

        unset($_SESSION[self::KEY]);

        return $flash;
    }
}
