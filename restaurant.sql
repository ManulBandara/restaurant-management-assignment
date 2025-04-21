CREATE DATABASE restaurant;
USE restaurant;

CREATE TABLE concessions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255) NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE orders (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    send_to_kitchen_time DATETIME NOT NULL,
    status ENUM('Pending', 'In-Progress', 'Completed') DEFAULT 'Pending',
    total_cost DECIMAL(8,2) DEFAULT 0,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE order_concessions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id BIGINT UNSIGNED NOT NULL,
    concession_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (concession_id) REFERENCES concessions(id) ON DELETE CASCADE
);

INSERT INTO concessions (name, description, image, price, created_at, updated_at) VALUES
('Burger', 'Yummy beef burger', 'concessions/burger.jpg', 9.99, NOW(), NOW()),
('Pizza', 'Cheesy pizza', 'concessions/pizza.jpg', 12.99, NOW(), NOW()),
('Ice Cream', 'Sweet vanilla ice cream', 'concessions/icecream.jpg', 4.99, NOW(), NOW());