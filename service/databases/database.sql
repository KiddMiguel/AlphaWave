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
