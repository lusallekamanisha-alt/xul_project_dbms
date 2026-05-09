-- Initialization SQL for xul_project
-- Creates database, users table, and sample data

CREATE DATABASE IF NOT EXISTS xul_db
  DEFAULT CHARACTER SET = utf8mb4
  DEFAULT COLLATE = utf8mb4_unicode_ci;

USE xul_db;

-- users table for authentication/profile
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- example pages table (optional)
CREATE TABLE IF NOT EXISTS pages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(100) NOT NULL UNIQUE,
  title VARCHAR(200) NOT NULL,
  content TEXT,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- books/catalog table
CREATE TABLE IF NOT EXISTS books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255),
  isbn VARCHAR(20) UNIQUE,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- sessions table for server-side auth/session tracking
CREATE TABLE IF NOT EXISTS sessions (
  id VARCHAR(128) PRIMARY KEY,
  user_id INT NOT NULL,
  data TEXT,
  expires_at DATETIME,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert sample user: replace `TO_BE_REPLACED_BY_HASH` with a bcrypt hash
INSERT INTO users (username, email, password_hash)
VALUES ('admin', 'admin@example.com', 'TO_BE_REPLACED_BY_HASH')
ON DUPLICATE KEY UPDATE email = VALUES(email);

-- Insert sample pages
INSERT INTO pages (slug, title, content)
VALUES
  ('about', 'About', 'About page content'),
  ('contact', 'Contact', 'Contact page content')
ON DUPLICATE KEY UPDATE title = VALUES(title);

-- End of init.sql
