CREATE DATABASE noticias;

USE noticias;

CREATE TABLE user(
    id INT AUTO_INCREMENT,
    login VARCHAR(30) NOT NULL UNIQUE,
    pass VARCHAR(30) NOT NULL,
    adm BOOLEAN DEFAULT 0,
    data_cadastro DATETIME DEFAULT (now()),
    PRIMARY KEY (id)
);

INSERT INTO user (id, login, pass, adm ) VALUES (null,'flor','1234',1);
INSERT INTO user (id, login, pass, adm ) VALUES (null,'dani','1234',0);

CREATE TABLE noticia(
    id INT AUTO_INCREMENT,
    titulo VARCHAR(30) NOT NULL,
    conteudo LONGTEXT NOT NULL,
    data_cadastro DATETIME DEFAULT (now()),
    nome_img VARCHAR(50) NOT NULL,
    cod_categoria INT,
    PRIMARY KEY (id),
    FOREIGN KEY (cod_categoria)
    REFERENCES categoria(id)
);

CREATE TABLE categoria(
    id INT AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO categoria VALUES(null,"Esporte");
INSERT INTO categoria VALUES(null,"Lazer");
INSERT INTO categoria VALUES(null,"Ciências");
INSERT INTO categoria VALUES(null,"Culinaria");
INSERT INTO categoria VALUES(null,"Política");

