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
    <title><?= htmlspecialchars($title); ?> | Digital Library</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
    <style>
        body {
            background: #f5f7fa;
            min-height: 100vh;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        nav.nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            border-radius: 8px;
        }
        nav .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        nav .user-menu {
            display: flex;
            gap: 10px;
        }
        nav .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
            transition: all 0.2s;
        }
        nav .btn-secondary {
            background: #f0f0f0;
            color: #333;
        }
        nav .btn-secondary:hover {
            background: #e0e0e0;
        }
        .book-details-card {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
        }
        .book-details-card h1 {
            color: #667eea;
            margin-bottom: 20px;
            font-size: 2rem;
        }
        .book-info {
            margin: 20px 0;
            padding: 20px;
            background: #f8f9ff;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .book-info p {
            font-size: 1.2rem;
            margin: 10px 0;
            line-height: 1.6;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.2s;
        }
        .back-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
        }
        @media (max-width: 600px) {
            nav.nav {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="nav">
            <div class="logo"><a href="<?= app_url(""); ?>" style="text-decoration:none;color:inherit;">📚 Digital Library</a></div>
            <div class="user-menu">
                <a href="<?= app_url(""); ?>" class="btn btn-secondary">Home</a>
                <a href="<?= app_url("public/pages/catalog.php"); ?>" class="btn btn-secondary">Catalog</a>
                <a href="<?= app_url("public/pages/about.php"); ?>" class="btn btn-secondary">About</a>
                <a href="<?= app_url("public/pages/contact.php"); ?>" class="btn btn-secondary">Contact</a>
            </div>
        </nav>
        <div class="book-details-card">
            <h1>Book Details</h1>
            <div class="book-info">
                <p><strong>Title:</strong> <?= htmlspecialchars($title); ?></p>
                <?php if ($title !== "Unknown Book"): ?>
                <p><strong>Author:</strong> Available in full catalog</p>
                <p><strong>Genre:</strong> Educational</p>
                <p><strong>Status:</strong> Available for borrowing</p>
                <?php endif; ?>
            </div>
            <a href="<?= app_url("public/pages/catalog.php"); ?>" class="back-link">← Back to Catalog</a>
        </div>
    </div>
</body>
</html>