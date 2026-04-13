<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define("APP_BASE_URL", "/xul_project_dbms");
define("USERS_FILE", __DIR__ . "/../private/data/users.json");

function app_url(string $path = ""): string
{
    $normalized = ltrim($path, "/");
    return APP_BASE_URL . ($normalized !== "" ? "/" . $normalized : "");
}
