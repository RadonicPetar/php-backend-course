CREATE DATABASE trgovina CHARACTER set utf8mb4 COLLATE utf8mb4_general_ci;
USE trgovina;

CREATE TABLE kategorija (
    kategorijaId INT AUTO_INCREMENT PRIMARY KEY,
    naziv VARCHAR(50),
    opis VARCHAR(100)
);

CREATE TABLE proizvod (
    proizvodId INT AUTO_INCREMENT PRIMARY KEY,
    naziv VARCHAR(50),
    kolicina INT,
    cijena DECIMAL(10,2),
    kategorijaId INT,
    FOREIGN KEY (kategorijaId) REFERENCES kategorija(kategorijaId)
        ON DELETE SET NULL
        ON UPDATE SET NULL
);

CREATE TABLE izbrisani (
    brisaniId INT AUTO_INCREMENT PRIMARY KEY,
    zapisId INT,
    tip VARCHAR(50),
    datum_vrijeme_brisanja DATETIME
);

CREATE TABLE azurirani (
    azuriraniId INT AUTO_INCREMENT PRIMARY KEY,
    zapisId INT,
    tip VARCHAR(50),
    datum_vrijeme_azuriranja DATETIME
);

INSERT INTO kategorija (naziv, opis) VALUES
('Elektronika', 'Uređaji'),
('Hrana', 'Prehrambeni proizvodi'),
('Odjeća', 'Odjevni artikli'),
('Namještaj', 'Za kuću'),
('Sport', 'Sportska oprema');


INSERT INTO proizvod (naziv, kolicina, cijena, kategorijaId) VALUES
('Laptop', 10, 1200, 1),
('Mobitel', 20, 800, 1),
('TV', 5, 1500, 1),

('Kruh', 50, 2, 2),
('Mlijeko', 30, 1.5, 2),
('Sir', 25, 5, 2),

('Majica', 40, 20, 3),
('Hlače', 30, 35, 3),
('Jakna', 10, 100, 3),

('Stol', 5, 200, 4),
('Stolica', 15, 50, 4),
('Ormar', 3, 500, 4),

('Lopta', 25, 15, 5),
('Reket', 10, 60, 5),
('Tenisice', 20, 120, 5);