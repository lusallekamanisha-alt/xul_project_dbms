<?php
declare(strict_types=1);
require_once __DIR__ . "/../../includes/bootstrap.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <p>Email: <a href="mailto:support@digitallibrary.com">support@digitallibrary.com</a></p>
        <p>Phone: 0960767133</p>
        <p>Address: 123 Library Lane, Booktown</p>
        <p><a href="<?= app_url("public/index.php"); ?>">Back to Home</a></p>
    </div>
</body>
</html>
