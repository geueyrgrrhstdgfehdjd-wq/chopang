CREATE DATABASE IF NOT EXISTS shop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE shop;
CREATE TABLE products(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(255) NOT NULL,price DECIMAL(10,2) NOT NULL DEFAULT 0,image VARCHAR(500) NULL,status VARCHAR(100) DEFAULT 'พร้อมขาย',unlimited_stock TINYINT(1) DEFAULT 1);
INSERT INTO products(name,price,status,unlimited_stock) VALUES ('สินค้าเริ่มต้น',0,'ติดต่อแอดมิน',1);
