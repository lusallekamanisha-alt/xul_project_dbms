<?php
declare(strict_types=1);
require_once __DIR__ . "/../includes/auth.php";

$user = current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Digital Library</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
</head>
<body style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container" style="max-width:700px;padding:60px 20px;">
        <h1>Welcome to Digital Library</h1>
        <p>Discover, borrow, and enjoy thousands of books online.</p>

        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
            <a class="btn btn-secondary" href="<?= app_url("public/pages/about.php"); ?>">About</a>
            <a class="btn btn-secondary" href="<?= app_url("public/pages/contact.php"); ?>">Contact</a>
            <a class="btn btn-secondary" href="<?= app_url("public/pages/catalog.php"); ?>">Catalog</a>
        </div>

        <div style="margin-top:20px;display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
            <?php if ($user !== null): ?>
                <a class="btn btn-primary" href="<?= app_url("private/dashboard.php"); ?>">Go to Dashboard</a>
                <a class="btn btn-secondary" href="<?= app_url("private/profile.php"); ?>">Profile</a>
                <a class="btn btn-secondary" href="<?= app_url("public/auth/logout.php"); ?>">Logout</a>
            <?php else: ?>
                <a class="btn btn-primary" href="<?= app_url("public/auth/login.php"); ?>">Login</a>
                <a class="btn btn-secondary" href="<?= app_url("public/auth/register.php"); ?>">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
