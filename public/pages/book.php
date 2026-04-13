<?php
declare(strict_types=1);
require_once __DIR__ . "/../../includes/bootstrap.php";
$title = trim((string)($_GET["title"] ?? "Unknown Book"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
</head>
<body>
    <div class="container">
        <h1>Book Details</h1>
        <p><strong>Title:</strong> <?= htmlspecialchars($title); ?></p>
        <p><a href="<?= app_url("public/pages/catalog.php"); ?>">Back to Catalog</a></p>
    </div>
</body>
</html>
