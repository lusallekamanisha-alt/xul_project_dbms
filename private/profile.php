<?php
declare(strict_types=1);
require_once __DIR__ . "/../includes/auth.php";
require_auth();
$user = current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Digital Library</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
        
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .user-menu {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }
        
        .btn-secondary {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 3rem;
            color: white;
        }
        
        .profile-name {
            font-size: 2rem;
            color: #333;
            margin-bottom: 5px;
        }
        
        .profile-role {
            color: #667eea;
            font-weight: 500;
        }
        
        .profile-info {
            background: #f8f9ff;
            border-radius: 15px;
            padding: 25px;
            margin: 20px 0;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: #555;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-value {
            color: #333;
            font-weight: 500;
        }
        
        .profile-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                text-align: center;
            }
            
            .info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
            
            .profile-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <div class="logo"><a href="<?= app_url(""); ?>" style="text-decoration:none;color:inherit;">📚 Digital Library</a></div>
                <div class="user-menu">
                    <a href="<?= app_url("private/dashboard.php"); ?>" class="btn btn-secondary">Dashboard</a>
                    <a href="<?= app_url("public/pages/catalog.php"); ?>" class="btn btn-secondary">Catalog</a>
                    <a href="<?= app_url("public/auth/logout.php"); ?>" class="btn btn-primary">Sign Out</a>
                </div>
            </nav>
        </header>
        
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">👤</div>
                <div class="profile-name"><?= htmlspecialchars((string)$user["username"]); ?></div>
                <div class="profile-role">Library Member</div>
            </div>
            
            <div class="profile-info">
                <div class="info-item">
                    <span class="info-label">📧 Email</span>
                    <span class="info-value"><?= htmlspecialchars((string)$user["email"]); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">👤 Username</span>
                    <span class="info-value"><?= htmlspecialchars((string)$user["username"]); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">📚 Books Borrowed</span>
                    <span class="info-value">0</span>
                </div>
                <div class="info-item">
                    <span class="info-label">⭐ Member Since</span>
                    <span class="info-value"><?= date("F Y"); ?></span>
                </div>
            </div>
            
            <div class="profile-actions">
                <a href="<?= app_url("private/dashboard.php"); ?>" class="btn btn-secondary">Back to Dashboard</a>
                <a href="<?= app_url("public/pages/catalog.php"); ?>" class="btn btn-primary">Browse Catalog</a>
            </div>
        </div>
    </div>
</body>
</html>