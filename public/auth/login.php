<?php
declare(strict_types=1);
require_once __DIR__ . "/../../includes/auth.php";

if (current_user() !== null) {
    header("Location: " . app_url("private/dashboard.php"));
    exit;
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    if (login_user($username, $password)) {
        header("Location: " . app_url("private/dashboard.php"));
        exit;
    }
    $error = "Invalid username or password.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if ($error !== ""): ?><p class="error"><?= htmlspecialchars($error); ?></p><?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" class="btn-primary">Login</button>
        </form>
        <p><a href="<?= app_url("public/auth/register.php"); ?>">Create account</a></p>
        <p><a href="<?= app_url("public/index.php"); ?>">Back to Home</a></p>
    </div>
</body>
</html>
