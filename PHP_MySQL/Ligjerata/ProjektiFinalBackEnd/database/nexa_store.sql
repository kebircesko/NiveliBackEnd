-- Importojeni kete file ne phpMyAdmin. Krijon databazen, tabelat dhe te dhenat demo.
CREATE DATABASE IF NOT EXISTS nexa_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE nexa_store;

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS support_messages;
DROP TABLE IF EXISTS support_conversations;
DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('customer','admin') NOT NULL DEFAULT 'customer',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE support_conversations (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NULL,
  session_token VARCHAR(64) NOT NULL UNIQUE,
  customer_name VARCHAR(100) NOT NULL,
  customer_email VARCHAR(150) NOT NULL,
  status ENUM('open','closed') NOT NULL DEFAULT 'open',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_support_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
  INDEX idx_support_updated (updated_at),
  INDEX idx_support_status (status)
) ENGINE=InnoDB;

CREATE TABLE support_messages (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  conversation_id INT UNSIGNED NOT NULL,
  sender ENUM('customer','admin','bot') NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_support_conversation FOREIGN KEY (conversation_id) REFERENCES support_conversations(id) ON DELETE CASCADE,
  INDEX idx_support_message_conversation (conversation_id, id)
) ENGINE=InnoDB;

CREATE TABLE categories (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE products (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category_id INT UNSIGNED NOT NULL,
  name VARCHAR(150) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  old_price DECIMAL(10,2) NULL,
  stock INT UNSIGNED NOT NULL DEFAULT 0,
  image VARCHAR(255) NULL,
  is_featured TINYINT(1) NOT NULL DEFAULT 0,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_products_category FOREIGN KEY (category_id) REFERENCES categories(id)
) ENGINE=InnoDB;

CREATE TABLE orders (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NULL,
  customer_name VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL,
  phone VARCHAR(40) NOT NULL,
  address TEXT NOT NULL,
  total DECIMAL(10,2) NOT NULL,
  status ENUM('pending','processing','completed','cancelled') NOT NULL DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE order_items (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  order_id INT UNSIGNED NOT NULL,
  product_id INT UNSIGNED NOT NULL,
  product_name VARCHAR(150) NOT NULL,
  quantity INT UNSIGNED NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  CONSTRAINT fk_items_order FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
  CONSTRAINT fk_items_product FOREIGN KEY (product_id) REFERENCES products(id)
) ENGINE=InnoDB;

CREATE TABLE messages (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO users (name,email,password,role) VALUES
('Nexa Admin','admin@nexa.test','$2y$10$ELadHIGBQzXOQBqCnOCV3uFgqtiYxruPEEmONPMLHjAHxEEKI.uhW','admin');

INSERT INTO categories (name) VALUES ('Audio'),('Aksesore'),('Wearables');

INSERT INTO products (category_id,name,description,price,old_price,stock,image,is_featured,is_active) VALUES
(1,'Nexa Flow Headphones','Kufje wireless me anulim aktiv të zhurmës, tingull të balancuar dhe deri në 30 orë bateri. Të rehatshme për punë, udhëtim dhe muzikë.',129.90,159.90,18,'headphones.svg',1,1),
(1,'Nexa Pocket Speaker','Altoparlant kompakt Bluetooth me bas të pasur, mbrojtje nga uji IPX6 dhe bateri që zgjat deri në 14 orë.',59.90,NULL,25,'speaker.svg',1,1),
(2,'Nexa Keys Mini','Tastierë mekanike 75% me lidhje wireless, ndriçim të butë dhe taste të qeta për një hapësirë pune moderne.',89.90,109.90,12,'keyboard.svg',1,1),
(2,'Nexa Arc Mouse','Mouse ergonomik me sensor preciz, klikime pa zhurmë dhe lidhje me tri pajisje njëkohësisht.',44.90,NULL,4,'mouse.svg',0,1),
(3,'Nexa Pulse Watch','Orë inteligjente me ekran AMOLED, monitorim të aktivitetit dhe gjumit, GPS dhe bateri deri në 7 ditë.',149.90,179.90,9,'watch.svg',1,1),
(2,'Nexa Dock 7-in-1','Hub USB-C prej alumini me HDMI 4K, lexues karte, USB 3.0 dhe karikim të shpejtë 100W.',69.90,NULL,15,'dock.svg',0,1);

INSERT INTO orders (user_id,customer_name,email,phone,address,total,status) VALUES
(NULL,'Arta Berisha','arta@example.com','044 222 333','Prishtinë, Kosovë',132.90,'processing'),
(NULL,'Luan Krasniqi','luan@example.com','045 111 222','Pejë, Kosovë',89.90,'completed');
INSERT INTO order_items (order_id,product_id,product_name,quantity,price) VALUES
(1,1,'Nexa Flow Headphones',1,129.90),(2,3,'Nexa Keys Mini',1,89.90);
