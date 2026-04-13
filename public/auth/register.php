<?php
declare(strict_types=1);
require_once __DIR__ . "/../../includes/auth.php";

$error = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = (string)($_POST["username"] ?? "");
    $email = (string)($_POST["email"] ?? "");
    $password = (string)($_POST["password"] ?? "");
    $error = register_user($username, $email, $password) ?? "";
    if ($error === "") {
        $success = "Registration successful. You can now login.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <?php if ($error !== ""): ?><p class="error"><?= htmlspecialchars($error); ?></p><?php endif; ?>
        <?php if ($success !== ""): ?><p class="success"><?= htmlspecialchars($success); ?></p><?php endif; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" class="btn-primary">Register</button>
        </form>
        <p><a href="<?= app_url("public/auth/login.php"); ?>">Go to login</a></p>
        <p><a href="<?= app_url("public/index.php"); ?>">Back to Home</a></p>
    </div>
</body>
</html>
