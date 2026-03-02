-- Base de datos
CREATE DATABASE IF NOT EXISTS crudphp1;
USE crudphp1;

-- Tabla persona usando CHAR en lugar de VARCHAR
CREATE TABLE IF NOT EXISTS persona (
    id        INT(11)   NOT NULL AUTO_INCREMENT,
    nombre    CHAR(50)  NOT NULL,
    apellido  CHAR(50)  NOT NULL,
    dni       CHAR(8)   NOT NULL,
    fecha_nac DATE      NOT NULL,
    correo    CHAR(100) NOT NULL,
    PRIMARY KEY (id)
);
