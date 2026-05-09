<?php
declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';

function find_user(string $username): ?array
{
    $stmt = db()->prepare("
        SELECT *
        FROM users
        WHERE username = :username
        LIMIT 1
    ");

    $stmt->execute([
        'username' => trim($username)
    ]);

    $user = $stmt->fetch();

    return $user ?: null;
}

function register_user(
    string $username,
    string $email,
    string $password
): ?string {

    $username = trim($username);
    $email = trim($email);

    if ($username === '' || $email === '' || $password === '') {
        return 'All fields are required.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Invalid email address.';
    }

    if (find_user($username)) {
        return 'Username already exists.';
    }

    $stmt = db()->prepare("
        SELECT id
        FROM users
        WHERE email = :email
        LIMIT 1
    ");

    $stmt->execute([
        'email' => $email
    ]);

    if ($stmt->fetch()) {
        return 'Email already exists.';
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = db()->prepare("
        INSERT INTO users (
            username,
            email,
            password_hash
        )
        VALUES (
            :username,
            :email,
            :password_hash
        )
    ");

    $stmt->execute([
        'username' => $username,
        'email' => $email,
        'password_hash' => $passwordHash
    ]);

    return null;
}

function login_user(string $username, string $password): bool
{
    $user = find_user($username);

    if (!$user) {
        return false;
    }

    if (!password_verify($password, $user['password_hash'])) {
        return false;
    }

    $_SESSION['auth_user_id'] = $user['id'];

    return true;
}

function current_user(): ?array
{
    $userId = $_SESSION['auth_user_id'] ?? null;

    if (!$userId) {
        return null;
    }

    $stmt = db()->prepare("
        SELECT *
        FROM users
        WHERE id = :id
        LIMIT 1
    ");

    $stmt->execute([
        'id' => $userId
    ]);

    $user = $stmt->fetch();

    return $user ?: null;
}

function logout_user(): void
{
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {

        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    session_destroy();
}

function require_auth(): void
{
    if (current_user()) {
        return;
    }

    header('Location: ' . app_url('public/auth/login.php'));
    exit;
}