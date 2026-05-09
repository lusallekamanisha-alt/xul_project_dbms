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
    <title>Dashboard | Digital Library</title>
    <link rel="stylesheet" href="<?= app_url("public/assets/css/style.css"); ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
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

        .search-container {
            position: relative;
            flex-grow: 1;
            max-width: 400px;
        }

        .search-box {
            width: 100%;
            padding: 12px 50px 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 50px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .search-box:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
        }

        .search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-50%) scale(1.1);
        }

        .user-menu {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .welcome-text {
            color: #667eea;
            font-weight: 500;
            margin-right: 10px;
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

        .categories {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .categories h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.5rem;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .category-card {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .category-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .books-section {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 1.5rem;
            color: #333;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .book-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .book-cover {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            position: relative;
            overflow: hidden;
        }

        .book-cover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.2) 50%, transparent 70%);
            transform: translateX(-100%);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .book-info h3 {
            font-size: 1.2rem;
            margin-bottom: 8px;
            color: #333;
        }

        .book-author {
            color: #666;
            margin-bottom: 10px;
            font-style: italic;
        }

        .book-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .stars {
            color: #ffc107;
        }

        .book-actions {
            display: flex;
            gap: 10px;
        }

        .btn-small {
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        .fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fab:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.6);
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: 10px;
        }

        .available {
            background: #e8f5e8;
            color: #2e7d32;
        }

        .borrowed {
            background: #fff3e0;
            color: #f57c00;
        }

        .reserved {
            background: #e3f2fd;
            color: #1976d2;
        }

        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                text-align: center;
            }

            .search-container {
                order: 1;
                max-width: 100%;
            }

            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .books-grid {
                grid-template-columns: 1fr;
            }

            .section-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <div class="logo"><a href="<?= app_url(""); ?>" style="text-decoration:none;color:inherit;">📚 Digital Library</a></div>
                <div class="search-container">
                    <input type="text" class="search-box" placeholder="Search books, authors, genres...">
                    <button class="search-btn">🔍</button>
                </div>
                <div class="user-menu">
                    <span class="welcome-text">Welcome, <?= htmlspecialchars((string)$user["username"]); ?></span>
                    <a href="<?= app_url("public/pages/catalog.php"); ?>" class="btn btn-secondary">Catalog</a>
                    <a href="<?= app_url("private/profile.php"); ?>" class="btn btn-secondary">Profile</a>
                    <a href="<?= app_url("public/auth/logout.php"); ?>" class="btn btn-primary">Sign Out</a>
                </div>
            </nav>
        </header>

        <section class="categories">
            <h2>Browse Categories</h2>
            <div class="category-grid">
                <a href="<?= app_url("public/pages/catalog.php"); ?>" class="category-card">
                    <div class="category-icon">📖</div>
                    <div>Fiction</div>
                </a>
                <a href="<?= app_url("public/pages/catalog.php"); ?>" class="category-card">
                    <div class="category-icon">🔬</div>
                    <div>Science</div>
                </a>
                <a href="<?= app_url("public/pages/catalog.php"); ?>" class="category-card">
                    <div class="category-icon">📚</div>
                    <div>History</div>
                </a>
                <a href="<?= app_url("public/pages/catalog.php"); ?>" class="category-card">
                    <div class="category-icon">💼</div>
                    <div>Business</div>
                </a>
                <a href="<?= app_url("public/pages/catalog.php"); ?>" class="category-card">
                    <div class="category-icon">🎨</div>
                    <div>Art</div>
                </a>
                <a href="<?= app_url("public/pages/catalog.php"); ?>" class="category-card">
                    <div class="category-icon">🏥</div>
                    <div>Health</div>
                </a>
            </div>
        </section>

        <section class="books-section">
            <div class="section-header">
                <h2 class="section-title">Programming</h2>
                <a href="<?= app_url("public/pages/catalog.php"); ?>" class="btn btn-secondary btn-small">View All</a>
            </div>
            <div class="books-grid">
                <div class="book-card">
                    <div class="book-cover">📖</div>
                    <div class="book-info">
                        <h3>Digital Design</h3>
                        <p class="book-author">by F. Scott Fitzgerald</p>
                        <div class="book-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span>(4.5)</span>
                            <span class="status-badge available">Available</span>
                        </div>
                        <div class="book-actions">
                            <a href="<?= app_url("public/pages/book.php?title=Digital%20Design"); ?>" class="btn btn-primary btn-small">Borrow</a>
                            <button class="btn btn-secondary btn-small">Preview</button>
                        </div>
                    </div>
                </div>
                <div class="book-card">
                    <div class="book-cover">🔬</div>
                    <div class="book-info">
                        <h3>Physics</h3>
                        <p class="book-author">by Stephen Hawking</p>
                        <div class="book-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span>(4.7)</span>
                            <span class="status-badge borrowed">Borrowed</span>
                        </div>
                        <div class="book-actions">
                            <button class="btn btn-secondary btn-small">Reserve</button>
                            <button class="btn btn-secondary btn-small">Preview</button>
                        </div>
                    </div>
                </div>
                <div class="book-card">
                    <div class="book-cover">💼</div>
                    <div class="book-info">
                        <h3>Math</h3>
                        <p class="book-author">by Napoleon Hill</p>
                        <div class="book-rating">
                            <span class="stars">⭐⭐⭐⭐</span>
                            <span>(4.2)</span>
                            <span class="status-badge available">Available</span>
                        </div>
                        <div class="book-actions">
                            <a href="<?= app_url("public/pages/book.php?title=Math"); ?>" class="btn btn-primary btn-small">Borrow</a>
                            <button class="btn btn-secondary btn-small">Preview</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <button class="fab" title="Add to Reading List">+</button>
    </div>

    <script>
        // Search functionality
        document.querySelector('.search-box').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const searchTerm = this.value;
                if (searchTerm.trim()) {
                    window.location.href = '<?= app_url("public/pages/catalog.php"); ?>?search=' + encodeURIComponent(searchTerm);
                }
            }
        });

        document.querySelector('.search-btn').addEventListener('click', function() {
            const searchTerm = document.querySelector('.search-box').value;
            if (searchTerm.trim()) {
                window.location.href = '<?= app_url("public/pages/catalog.php"); ?>?search=' + encodeURIComponent(searchTerm);
            }
        });

        // Book card interactions
        document.querySelectorAll('.book-card').forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('button') && !e.target.closest('a')) {
                    const title = this.querySelector('h3').textContent;
                    window.location.href = '<?= app_url("public/pages/book.php"); ?>?title=' + encodeURIComponent(title);
                }
            });
        });

        // FAB interaction
        document.querySelector('.fab').addEventListener('click', function() {
            alert('Add to Reading List feature coming soon!');
        });
    </script>
</body>
</html>