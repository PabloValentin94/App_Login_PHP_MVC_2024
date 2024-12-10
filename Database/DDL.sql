CREATE DATABASE db_login;

USE db_login;

CREATE TABLE Cargo (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) UNIQUE NOT NULL

);

CREATE TABLE Usuario (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,

    fk_cargo INT NOT NULL,
    CONSTRAINT fk_usuario_cargo FOREIGN KEY(fk_cargo) REFERENCES Cargo(id)

);

SHOW TABLES;