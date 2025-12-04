CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    price INT
);

INSERT INTO products (name, price) VALUES
('iPhone 14', 350000),
('Samsung S23', 280000),
('Xiaomi Mi 13', 180000),
('HP Laptop', 320000),
('MacBook Air', 540000),
('AirPods Pro', 120000),
('Logitech Mouse', 15000),
('Sony WH-1000XM5', 200000),
('Monitor LG', 90000),
('Keyboard MSI', 30000);
