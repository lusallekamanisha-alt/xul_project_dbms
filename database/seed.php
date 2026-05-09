<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/bootstrap.php';

$users = [
    [
        'username' => 'admin',
        'email' => 'admin@example.com',
        'password' => 'password123'
    ],
    [
        'username' => 'salle',
        'email' => 'sallekamanisha@gmail.com',
        'password' => 'kamanisha'
    ],
    [
        'username' => 'steven',
        'email' => 'steven@gmail.com',
        'password' => '1234'
    ]
];

foreach ($users as $user) {

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
        ON DUPLICATE KEY UPDATE
            email = VALUES(email),
            password_hash = VALUES(password_hash)
    ");

    $stmt->execute([
        'username' => trim($user['username']),
        'email' => trim($user['email']),
        'password_hash' => password_hash(
            $user['password'],
            PASSWORD_DEFAULT
        )
    ]);
}

echo "Database seeded successfully.";