DROP DATABASE IF EXISTS ueluelik;
CREATE DATABASE ueluelik;
USE ueluelik;

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario(
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(50) NOT NULL,
	username varchar(15) NOT NULL UNIQUE,
	correo varchar(30) NOT NULL UNIQUE,
	password varchar(100) NOT NULL,
	tipo INT NOT NULL
	#edad INT NOT NULL,
	#sexo varchar(10) NOT NULL,
	#pais varchar(20) NOT NULL
);

INSERT INTO usuario ( nombre,username,correo,password,tipo)  VALUES('Goreti Romero Ochoa','goretti','gorettiocho@gmail.com',MD5('1234'),1);

DROP TABLE IF EXISTS receta;
CREATE TABLE receta(
	id_receta INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	nombre TEXT NOT NULL,
	preparacion TEXT NOT NULL,
	comentario TEXT NOT NULL,
	FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario)
);
#SERA UNA CADENA QUE INCLUYA LA CANTIDAD Y EL TIPO DE MEDIDA que se concatenara
DROP TABLE IF EXISTS ingrediente;
CREATE TABLE ingrediente(
	id_ingrediente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_receta INT NOT NULL,
	nombre varchar(30) NOT NULL,
	cantidad varchar(20) NOT NULL, 
	FOREIGN KEY(id_receta) REFERENCES receta(id_receta)
);

DROP TABLE IF EXISTS noticia;
CREATE TABLE noticia(
	id_noticia INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	titulo TEXT NOT NULL,
	descripcion TEXT NOT NULL,
	FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario)
);

DROP TABLE IF EXISTS valoracion;
CREATE TABLE valoracion(
	id_valoracion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_receta INT NOT NULL,
	id_usuario INT NOT NULL,
	comentario TEXT NOT NULL,
	FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario),
	FOREIGN KEY(id_receta) REFERENCES receta(id_receta)
);