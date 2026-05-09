<?php
declare(strict_types=1);

define('DB_HOST', 'localhost');
define('DB_NAME', 'xul_db');
define('DB_USER', 'root');
define('DB_PASS', '');

define('BASE_URL', '/xul_project_dbms/');

session_start();

function app_url(string $path = ''): string
{
    return BASE_URL . ltrim($path, '/');
}