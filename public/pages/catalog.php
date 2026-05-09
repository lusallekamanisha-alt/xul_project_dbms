<?php
declare(strict_types=1);
require_once __DIR__ . "/../../includes/bootstrap.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalog | Digital Library</title>
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
        .catalog-header {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        .catalog-header h1 {
            color: #667eea;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .search-container {
            margin: 20px 0;
        }
        .search-box {
            width: 90%;
            max-width: 400px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        .search-box:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .book-card {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            text-align: center;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.15);
        }
        .book-emoji {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        .book-card h3 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
        .book-card .btn {
            display: inline-block;
            padding: 8px 20px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: #fff;
            text-decoration: none;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.2s;
            margin-top: 10px;
        }
        .book-card .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        .back-home {
            text-align: center;
            margin-top: 30px;
        }
        .back-home a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .back-home a:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            nav.nav {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .book-grid {
                grid-template-columns: 1fr;
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
                <a href="<?= app_url("public/pages/about.php"); ?>" class="btn btn-secondary">About</a>
                <a href="<?= app_url("public/pages/contact.php"); ?>" class="btn btn-secondary">Contact</a>
            </div>
        </nav>
        
        <div class="catalog-header">
            <h1>Book Catalog</h1>
            <p>Explore our collection of books and resources</p>
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Search books by title or author..." id="search-box">
            </div>
        </div>
        
        <div class="book-grid">
            <div class="book-card">
                <div class="book-emoji">💻</div>
                <h3>Digital Design</h3>
                <p>Learn modern digital design principles</p>
                <a href="<?= app_url("public/pages/book.php?title=Digital%20Design"); ?>" class="btn">View Details</a>
            </div>
            
            <div class="book-card">
                <div class="book-emoji">⚛️</div>
                <h3>Physics</h3>
                <p>Explore the fundamental laws of physics</p>
                <a href="<?= app_url("public/pages/book.php?title=Physics"); ?>" class="btn">View Details</a>
            </div>
            
            <div class="book-card">
                <div class="book-emoji">📐</div>
                <h3>Mathematics</h3>
                <p>Master mathematical concepts and theories</p>
                <a href="<?= app_url("public/pages/book.php?title=Math"); ?>" class="btn">View Details</a>
            </div>
        </div>
        
        <div class="back-home">
            <a href="<?= app_url(""); ?>">← Back to Home</a>
        </div>
    </div>
</body>
</html>