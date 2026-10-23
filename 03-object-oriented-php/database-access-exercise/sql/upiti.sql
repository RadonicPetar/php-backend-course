CREATE DATABASE webshop_db CHARACTER set utf8mb4 collate utf8mb4_general_ci;

create user if not EXISTS 'webshopdb' IDENTIFIED by 'Test123!';

GRANT ALL PRIVILEGES on webshop_db.* to 'webshopdb';

FLUSH PRIVILEGES;

use webshop_db;

CREATE TABLE kategorije(

    id INT AUTO_INCREMENT PRIMARY KEY,

    naziv VARCHAR(100) NOT NULL,

    opis TEXT,

    aktivna BOOLEAN DEFAULT TRUE
);

CREATE TABLE proizvodi(

    id INT AUTO_INCREMENT PRIMARY KEY,

    naziv VARCHAR(100) NOT NULL,

    kolicina INT NOT NULL,

    cijena DECIMAL(10,2) NOT NULL,

    kategorijaid INT NOT NULL,

    FOREIGN KEY(kategorijaid)
    REFERENCES kategorije(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
);

INSERT INTO kategorije
(naziv,opis,aktivna)
VALUES
('Računala','IT oprema',1),
('Mobiteli','Pametni telefoni',1),
('Računala', 'Stolna i prijenosna računala', 1),
('Mobiteli', 'Pametni telefoni i dodaci', 1),
('Periferija', 'Tipkovnice, miševi, monitori i ostala oprema', 1);

INSERT INTO proizvodi
(naziv, kolicina, cijena, kategorijaid)
VALUES
('Laptop Lenovo IdeaPad', 10, 799.99, 1),
('Laptop HP ProBook', 7, 899.99, 1),
('Gaming PC Ryzen 5', 4, 1199.99, 1),
('Mini PC Intel NUC', 6, 649.99, 1),
('Monitor Dell 24', 12, 189.99, 3),
('Monitor LG 27', 8, 249.99, 3),
('Tipkovnica Logitech', 20, 39.99, 3),
('Miš Logitech MX', 15, 79.99, 3),
('USB-C Hub', 18, 29.99, 3),
('iPhone 14', 5, 899.99, 2),
('Samsung Galaxy S23', 6, 849.99, 2),
('Xiaomi Redmi Note', 11, 249.99, 2),
('Punjač USB-C', 25, 19.99, 2),
('Slušalice Bluetooth', 14, 59.99, 2),
('Tablet Samsung A9', 9, 299.99, 2);
