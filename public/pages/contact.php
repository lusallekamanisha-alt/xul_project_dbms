<?php
declare(strict_types=1);
require_once __DIR__ . "/../../includes/bootstrap.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Digital Library</title>
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
        .contact-section {
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
        .contact-info {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9ff;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .contact-info ul {
            list-style: none;
            padding: 0;
        }
        .contact-info ul li {
            margin-bottom: 15px;
            line-height: 1.6;
            font-size: 1.1rem;
        }
        .contact-info a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        .contact-form {
            margin-top: 30px;
        }
        .contact-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            margin-bottom: 20px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .contact-form textarea {
            resize: vertical;
            min-height: 120px;
        }
        .btn-primary {
            padding: 12px 30px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
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
                    <a href="<?= app_url("public/pages/about.php"); ?>" class="btn btn-secondary">About</a>
                </div>
            </nav>
        </header>
        <section class="contact-section">
            <h2 class="section-title">Contact Us</h2>
            <p>Have questions, feedback, or need support? Reach out to us!</p>
            
            <div class="contact-info">
                <ul>
                    <li>📧 Email: <a href="mailto:support@digitallibrary.com">support@digitallibrary.com</a></li>
                    <li>📱 Phone: 0960767133</li>
                    <li>📍 Address: 123 Library Lane, Booktown, BK 12345</li>
                </ul>
            </div>
            
            <div class="contact-form">
                <form action="#" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    
                    <button type="submit" class="btn-primary">Send Message</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>