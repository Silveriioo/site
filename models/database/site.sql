CREATE DATABASE site;

CREATE TABLE site.usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR
(355) NOT NULL,
    tag INT NOT NULL,
    email VARCHAR
(355) NOT NULL,
    senha VARCHAR
(355) NOT NULL
);

CREATE TABLE site.registros (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    site VARCHAR
(255) NOT NULL,
    usuario VARCHAR
(255) NOT NULL,
    senha VARCHAR
(355) NOT NULL,
    FOREIGN KEY
(usuario_id) REFERENCES site.usuarios
(id)
);


SELECT *
FROM site.usuarios;