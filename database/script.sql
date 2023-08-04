CREATE DATABASE aula_pdo;
USE aula_pdo;

CREATE TABLE users (
    cd INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(60),
    email VARCHAR(100),
    password VARCHAR(60)
);