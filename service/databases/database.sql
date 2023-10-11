-- Assuming this is some metadata, left it as is
-- Active: 1697027731257@@127.0.0.1@3306
drop DATABASE IF EXISTS alphawave;
CREATE DATABASE alphawave;
USE alphawave;

CREATE TABLE user(
    idUser INT(5) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50), 
    prenom VARCHAR(50),
    email VARCHAR(100),
    tel VARCHAR(50),
    cp VARCHAR(50), 
    ville VARCHAR(50),
    password VARCHAR(50),
    image VARCHAR(100),
    PRIMARY KEY (idUser)
);

CREATE TABLE admin (
    idAdmin INT(5) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    login VARCHAR(50),
    password VARCHAR(50),
    image VARCHAR(100),
    PRIMARY KEY (idAdmin)
);

CREATE TABLE produit(
    idProduit INT(5) NOT NULL AUTO_INCREMENT,
    intitule VARCHAR(50),
    description VARCHAR(100),
    prix DECIMAL(10,2),
    image VARCHAR(100),
    idUser INT(5),
    PRIMARY KEY (idProduit),
    FOREIGN KEY (idUser) REFERENCES user(idUser)
);


INSERT INTO user(nom, prenom, email, tel, cp, ville, password, image) VALUES 
('Durand', 'Jean', 'jean.durand@example.com', '0102030405', '75000', 'Paris', 'password123', 'image_jean.jpg'),
('Martin', 'Sophie', 'sophie.martin@example.com', '0102030406', '75001', 'Paris', 'password124', 'image_sophie.jpg'),
('Dupont', 'Paul', 'paul.dupont@example.com', '0102030407', '75002', 'Paris', 'password125', 'image_paul.jpg'),
('Leroy', 'Emma', 'emma.leroy@example.com', '0102030408', '75003', 'Paris', 'password126', 'image_emma.jpg'),
('Bertrand', 'Lucas', 'lucas.bertrand@example.com', '0102030409', '75004', 'Paris', 'password127', 'image_lucas.jpg'),
('Roux', 'Clara', 'clara.roux@example.com', '0102030410', '75005', 'Paris', 'password128', 'image_clara.jpg'),
('Moreau', 'Hugo', 'hugo.moreau@example.com', '0102030411', '75006', 'Paris', 'password129', 'image_hugo.jpg'),
('Simon', 'Chloé', 'chloe.simon@example.com', '0102030412', '75007', 'Paris', 'password130', 'image_chloe.jpg'),
('Garnier', 'Thomas', 'thomas.garnier@example.com', '0102030413', '75008', 'Paris', 'password131', 'image_thomas.jpg'),
('Perez', 'Camille', 'camille.perez@example.com', '0102030414', '75009', 'Paris', 'password132', 'image_camille.jpg');

INSERT INTO admin(nom, prenom, login, password, image) VALUES 
('Admin', 'Alice', 'admin_alice', 'adminpass1', 'admin_alice.jpg'),
('Admin', 'Bob', 'admin_bob', 'adminpass2', 'admin_bob.jpg');

INSERT INTO produit(intitule, description, prix, image, idUser) VALUES 
('PC Gamer 1', 'Puissant PC pour les jeux', 1200.00, 'pc1.jpg', 1),
('PC Gamer 2', 'PC avec graphiques avancés', 1500.00, 'pc2.jpg', 2),
('PC Bureau 1', 'PC pour travail de bureau', 800.00, 'pc3.jpg', 3),
('PC Bureau 2', 'PC économique pour bureau', 600.00, 'pc4.jpg', 4),
('PC Portable 1', 'Portable pour voyages', 900.00, 'pc5.jpg', 5),
('PC Portable 2', 'Portable léger', 950.00, 'pc6.jpg', 6),
('PC Gamer 3', 'PC pour professionnels du jeu', 1600.00, 'pc7.jpg', 7),
('PC Bureau 3', 'PC multitâche', 700.00, 'pc8.jpg', 8),
('PC Portable 3', 'Portable avec grand écran', 1000.00, 'pc9.jpg', 9),
('PC Gamer 4', 'PC avec VR', 1700.00, 'pc10.jpg', 10),
('PC Bureau 4', 'PC avec stockage SSD', 750.00, 'pc11.jpg', 1),
('PC Portable 4', 'Portable avec bonne autonomie', 980.00, 'pc12.jpg', 2),
('PC Gamer 5', 'PC avec RTX 3080', 1800.00, 'pc13.jpg', 3),
('PC Bureau 5', 'PC silencieux', 780.00, 'pc14.jpg', 4),
('PC Portable 5', 'Portable 2 en 1', 1050.00, 'pc15.jpg', 5),
('PC Gamer 6', 'PC pour streaming', 1650.00, 'pc16.jpg', 6),
('PC Bureau 6', 'PC pour édition vidéo', 820.00, 'pc17.jpg', 7),
('PC Portable 6', 'Portable pour dessin', 1020.00, 'pc18.jpg', 8),
('PC Gamer 7', 'PC pour compétition', 1750.00, 'pc19.jpg', 9),
('PC Bureau 7', 'PC pour serveur', 850.00, 'pc20.jpg', 10);
