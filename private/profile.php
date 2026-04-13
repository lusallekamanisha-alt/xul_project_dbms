<?php
declare(strict_types=1);
require_once __DIR__ . "/../includes/auth.php";
require_auth();
$user = current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <p><strong>Username:</strong> <?= htmlspecialchars((string)$user["username"]); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars((string)$user["email"]); ?></p>

        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
            <a class="btn btn-secondary" href="<?= app_url("private/dashboard.php"); ?>">Dashboard</a>
            <a class="btn btn-secondary" href="<?= app_url("public/pages/catalog.php"); ?>">Catalog</a>
            <a class="btn btn-primary" href="<?= app_url("public/auth/logout.php"); ?>">Logout</a>
        </div>
    </div>
</body>
</html>
