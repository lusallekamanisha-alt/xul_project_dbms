<?php
declare(strict_types=1);

require_once __DIR__ . "/bootstrap.php";

function get_users(): array
{
    if (!is_file(USERS_FILE)) {
        return [];
    }

    $json = file_get_contents(USERS_FILE);
    if ($json === false || trim($json) === "") {
        return [];
    }

    $users = json_decode($json, true);
    return is_array($users) ? $users : [];
}

function save_users(array $users): void
{
    $dir = dirname(USERS_FILE);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    file_put_contents(USERS_FILE, json_encode($users, JSON_PRETTY_PRINT));
}

function find_user(string $username): ?array
{
    foreach (get_users() as $user) {
        if (($user["username"] ?? "") === $username) {
            return $user;
        }
    }
    return null;
}

function register_user(string $username, string $email, string $password): ?string
{
    $username = trim($username);
    $email = trim($email);

    if ($username === "" || $email === "" || $password === "") {
        return "All fields are required.";
    }
    if (find_user($username) !== null) {
        return "Username already exists.";
    }

    $users = get_users();
    $users[] = [
        "username" => $username,
        "email" => $email,
        "password_hash" => password_hash($password, PASSWORD_DEFAULT),
    ];
    save_users($users);
    return null;
}

function login_user(string $username, string $password): bool
{
    $user = find_user(trim($username));
    if ($user === null) {
        return false;
    }
    if (!password_verify($password, $user["password_hash"] ?? "")) {
        return false;
    }

    $_SESSION["auth_user"] = $user["username"];
    return true;
}

function logout_user(): void
{
    unset($_SESSION["auth_user"]);
}

function current_user(): ?array
{
    $username = $_SESSION["auth_user"] ?? null;
    if (!is_string($username) || $username === "") {
        return null;
    }
    return find_user($username);
}

function require_auth(): void
{
    if (current_user() !== null) {
        return;
    }
    header("Location: " . app_url("public/auth/login.php"));
    exit;
}
