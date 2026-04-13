<?php
declare(strict_types=1);
require_once __DIR__ . "/../../includes/bootstrap.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
</head>
<body>
    <div class="container">
        <h1>Book Catalog</h1>
        <p>Explore featured books in the digital library.</p>
        <div style="display:flex;gap:10px;justify-content:center;flex-wrap:wrap;">
            <a class="btn btn-secondary" href="<?= app_url("public/pages/book.php?title=Digital%20Design"); ?>">Digital Design</a>
            <a class="btn btn-secondary" href="<?= app_url("public/pages/book.php?title=Physics"); ?>">Physics</a>
            <a class="btn btn-secondary" href="<?= app_url("public/pages/book.php?title=Math"); ?>">Math</a>
        </div>
        <p style="margin-top:15px;"><a href="<?= app_url("public/index.php"); ?>">Back to Home</a></p>
    </div>
</body>
</html>
