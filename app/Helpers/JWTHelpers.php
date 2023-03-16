<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHelpers
{
    private static $key = 'iniadlahcontohsecretkey123';

    public static function encode($id = null, $username = null, $role = null)
    {
        $payload = [
            'id' => $id, // Id username login
            'username' => $username, // Username login
            'role' => $role, // Role user login
            'iat' => time(), // Time created token
            'exp' => time() + (3 * 60 * 60), // Time expired token 3 hour
        ];

        // Create token jwt
        $token = JWT::encode($payload, self::$key, 'HS256');

        return $token;
    }

    public static function decode($token = null)
    {
        // Decode token jwt
        $tokenDecoded = JWT::decode($token, new Key(self::$key, 'HS256'));

        return $tokenDecoded;
    }
}
