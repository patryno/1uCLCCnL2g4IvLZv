<?php

namespace App\Services;

class TokenService
{

private const TOKENS = [0 => 'tokenik', 1 => 'superDuper'];

    public function isTokenValid(string $token = null): bool
    {
        return in_array($token, self::TOKENS);
    }


}