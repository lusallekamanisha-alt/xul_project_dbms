<?php
declare(strict_types=1);
require_once __DIR__ . "/../../includes/bootstrap.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
</head>
<body>
    <div class="container">
        <h1>About Digital Library</h1>
        <p>Digital Library was created to make quality knowledge accessible to everyone.</p>
        <ul style="text-align:left;display:inline-block;">
            <li>Wide range of books and resources</li>
            <li>Easy borrowing and return workflows</li>
            <li>Support for lifelong learning</li>
        </ul>
        <p><a href="<?= app_url("public/index.php"); ?>">Back to Home</a></p>
    </div>
</body>
</html>
