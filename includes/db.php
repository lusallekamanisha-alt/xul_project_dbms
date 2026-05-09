<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

function db(bool $withDatabase = true): PDO
{
    static $connections = [];

    $key = $withDatabase ? 'with_db' : 'without_db';

    if (!isset($connections[$key])) {

        $dsn = $withDatabase
            ? "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4"
            : "mysql:host=" . DB_HOST . ";charset=utf8mb4";

        $connections[$key] = new PDO(
            $dsn,
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }

    return $connections[$key];
}