CREATE DATABASE interativa;
USE testando;

CREATE TABLE login ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, usuario VARCHAR(50), senha VARCHAR(50), ativo BOOLEAN DEFAULT TRUE);
INSERT INTO login(usuario, senha, ativo) VALUES('interativa', '7c4a8d09ca3762af61e59520943dc26494f8941b', true);

CREATE TABLE categoria (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, categoria VARCHAR(60), ativo BOOLEAN DEFAULT TRUE);
INSERT INTO categoria (categoria) VALUES ('almoço');

CREATE TABLE receita (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, id_categoria INT NOT NULL, receita VARCHAR(60), ativo BOOLEAN DEFAULT TRUE);
INSERT INTO receita (id_categoria, receita) VALUES(1, 'Arroz Refolgado');