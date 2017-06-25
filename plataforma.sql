
CREATE DATABASE objetos_aprendizaje;

USE objetos_aprendizaje;

CREATE TABLE maestro(id_maestro INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(500) NOT NULL, apellido_paterno VARCHAR(500) NOT NULL,
apellido_materno VARCHAR(500) NOT NULL, e_mail VARCHAR(400) NOT NULL, PASSWORD VARCHAR(400) NOT NULL,no_control VARCHAR(250) NOT NULL,fecha_alta DATE, 
fecha_modifica DATE, STATUS INT(2),
nivel INT(5));

CREATE TABLE alumno(id_alumno INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(500) NOT NULL, apellido_paterno VARCHAR(500) NOT NULL,
apellido_materno VARCHAR(500) NOT NULL, e_mail VARCHAR(400) NOT NULL, PASSWORD VARCHAR(400) NOT NULL,matricula VARCHAR(400) NOT NULL, fecha_alta DATE, 
fecha_modifica DATE,STATUS INT(2));

CREATE TABLE curso(id_curso INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, nombre VARCHAR(400), tipo VARCHAR(400), STATUS INT(2),
fecha_alta DATE, fecha_modifica DATE,id_maestro INT(11) NOT NULL,
FOREIGN KEY(id_maestro) REFERENCES maestro(id_maestro));

CREATE TABLE objeto_aprendizaje(id_objeto_aprendizaje INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(500) NOT NULL, 
tipo VARCHAR(500) NOT NULL,STATUS INT(2),descargas INT(11),fecha_alta DATE,fecha_modifica DATE,id_maestro INT(11) NOT NULL, id_curso INT(11) NOT NULL, 
FOREIGN KEY(id_maestro) REFERENCES maestro(id_maestro), FOREIGN KEY(id_curso) REFERENCES curso(id_curso));

/* //////////////////////////////////////  */

/*
create table maestro_curso(id_maestro_curso int(11) not null auto_increment primary key, id_maestro int(11) not null,id_curso int(11) not null, fecha_alta datetime, fecha_modifica datetime,
foreign key(id_maestro) references maestro(id_maestro), foreign key(id_curso) references curso(id_curso));
*/

CREATE TABLE curso_alumno(id_curso_alumno INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,id_curso INT(11) NOT NULL, id_alumno INT(11) NOT NULL,fecha_registro DATETIME,
FOREIGN KEY(id_curso) REFERENCES curso(id_curso), FOREIGN KEY(id_alumno) REFERENCES alumno(id_alumno));

CREATE TABLE objeto_aprendizaje_alumno(id_objeto_aprendizaje_alumno INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,id_objeto_aprendizaje INT(11) NOT NULL, id_alumno INT(11) NOT NULL,
path varchar(200),
FOREIGN KEY(id_objeto_aprendizaje) REFERENCES objeto_aprendizaje(id_objeto_aprendizaje), FOREIGN KEY(id_alumno) REFERENCES alumno(id_alumno));

CREATE TABLE maestro_alumno(id_maestro_alumno INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,id_maestro INT(11) NOT NULL, id_alumno INT(11) NOT NULL,
fecha_baja DATETIME, FOREIGN KEY(id_maestro) REFERENCES maestro(id_maestro), FOREIGN KEY(id_alumno) REFERENCES alumno(id_alumno));

/* ////////////////////////////////////// */

INSERT INTO maestro(nombre,apellido_paterno,apellido_materno,e_mail,PASSWORD,no_control,fecha_alta,fecha_modifica,STATUS, nivel)
VALUES('Mario','Cuevas','Sánchez','mariocuevas88@gmail.com',MD5('12345'),'54321',NOW(),NOW(),1,0);
