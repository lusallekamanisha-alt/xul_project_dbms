<?php
declare(strict_types=1);
require_once __DIR__ . "/../../includes/bootstrap.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Digital Library</title>
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
        .books-section {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
        }
        .section-title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #667eea;
        }
        .books-section p {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .books-section ul {
            text-align: left;
            margin-bottom: 20px;
            padding-left: 20px;
        }
        .books-section ul li {
            margin-bottom: 10px;
            line-height: 1.5;
        }
        @media (max-width: 600px) {
            nav.nav {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .section-title { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <div class="logo"><a href="<?= app_url(""); ?>" style="text-decoration:none;color:inherit;">📚 Digital Library</a></div>
                <div class="user-menu">
                    <a href="<?= app_url(""); ?>" class="btn btn-secondary">Home</a>
                    <a href="<?= app_url("public/pages/catalog.php"); ?>" class="btn btn-secondary">Catalog</a>
                    <a href="<?= app_url("public/pages/contact.php"); ?>" class="btn btn-secondary">Contact</a>
                </div>
            </nav>
        </header>
        <section class="books-section">
            <h2 class="section-title">About Digital Library</h2>
            <p>
                <strong>Background:</strong><br>
                Digital Library was founded to make knowledge accessible to everyone, everywhere. Our platform brings together a diverse collection of books, resources, and learning materials for students, professionals, and lifelong learners.
            </p>
            <p>
                <strong>Mission:</strong><br>
                To empower individuals by providing free and easy access to quality literature and educational resources.
            </p>
            <p>
                <strong>Objectives:</strong>
                <ul>
                    <li>Curate a wide range of books and resources for all interests.</li>
                    <li>Enable seamless borrowing and returning of digital books.</li>
                    <li>Support user engagement and personalized reading experiences.</li>
                    <li>Promote lifelong learning and literacy.</li>
                </ul>
            </p>
        </section>
    </div>
</body>
</html>