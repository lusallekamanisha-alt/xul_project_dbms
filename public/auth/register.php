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
        $success = "Registration successful! You can now login.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Digital Library</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }
        
        .auth-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            margin: 20px;
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .auth-logo {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        
        .auth-title {
            font-size: 2rem;
            color: #333;
            margin-bottom: 10px;
        }
        
        .auth-subtitle {
            color: #666;
            font-size: 0.9rem;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 50px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.2);
        }
        
        .error-message {
            background: #ffe0e0;
            color: #d63031;
            padding: 12px 20px;
            border-radius: 50px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            border-left: 4px solid #d63031;
        }
        
        .success-message {
            background: #e0ffe0;
            color: #27ae60;
            padding: 12px 20px;
            border-radius: 50px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            border-left: 4px solid #27ae60;
        }
        
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }
        
        .auth-links {
            text-align: center;
            margin-top: 25px;
        }
        
        .auth-links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .auth-links a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        
        .auth-links p {
            margin: 10px 0;
            color: #666;
        }
        
        .nav-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .nav-links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .nav-links a:hover {
            color: #764ba2;
        }
        
        @media (max-width: 480px) {
            .auth-container {
                padding: 25px;
                margin: 10px;
            }
            
            .auth-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <div class="auth-logo">📚</div>
            <div class="auth-title">Join Our Library</div>
            <div class="auth-subtitle">Create your account to start reading</div>
        </div>
        
        <div class="nav-links">
            <a href="<?= app_url(""); ?>">Home</a>
            <span style="color:#667eea;">|</span>
            <a href="<?= app_url("public/pages/catalog.php"); ?>">Catalog</a>
            <span style="color:#667eea;">|</span>
            <a href="<?= app_url("public/auth/login.php"); ?>">Login</a>
        </div>
        
        <?php if ($error !== ""): ?>
            <div class="error-message">
                <?= htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <?php if ($success !== ""): ?>
            <div class="success-message">
                <?= htmlspecialchars($success); ?>
            </div>
        <?php endif; ?>
        
        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
            </div>
            
            <button type="submit" class="btn-submit">Create Account</button>
        </form>
        
        <div class="auth-links">
            <p>Already have an account? <a href="<?= app_url("public/auth/login.php"); ?>">Login here</a></p>
            <p><a href="<?= app_url(""); ?>">← Back to Home</a></p>
        </div>
    </div>
</body>
</html>