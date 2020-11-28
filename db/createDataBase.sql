CREATE DATABASE store;

USE store;

CREATE TABLE usuario(
	idu INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30),
    ape_pat VARCHAR(30),
    apa_mat VARCHAR(30),
    fecha_nac DATE,
    email VARCHAR(30) NOT NULL,
    telefono VARCHAR(20),
    pwd VARCHAR(100) NOT NULL,
    tipo BIT NOT NULL,
    PRIMARY KEY(idu)
)engine='InnoDB' default charset=latin1;

CREATE TABLE domicilio(
	idd INT(11) NOT NULL AUTO_INCREMENT,
    idu INT(11) NOT NULL,
	calle VARCHAR(50),
    num_ext VARCHAR(10),
    num_int VARCHAR(10),
    codigopostal INT(11),
    colonia VARCHAR(50),
    ciudad VARCHAR(30),
    estado VARCHAR(30),
    PRIMARY KEY(idd)
)engine='InnoDB' default charset=latin1;

CREATE TABLE producto(
	idp INT(11) NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(30) NOT NULL,
    descripcion TEXT,
    precio FLOAT NOT NULL, 
    existencia INT(11) NOT NULL,
    categoria VARCHAR(30),
    calificacion FLOAT,
    imagen VARCHAR(80),
    PRIMARY KEY(idp)
)engine='InnoDB' default charset=latin1;

CREATE TABLE compra(
	idc INT(11) NOT NULL AUTO_INCREMENT,
    idu INT(11) NOT NULL,    
    monto FLOAT NOT NULL,
    articulos INT(11) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    PRIMARY KEY(idc)
)engine='InnoDB' default charset=latin1;

CREATE TABLE procompra(
	idc INT(11) NOT NULL,
    idp INT(11) NOT NULL,
    cantidad INT(11) NOT NULL,
    precio FLOAT NOT NULL
)engine='InnoDB' default charset=latin1;

CREATE TABLE carrito(
    idu INT(11) NOT NULL,
    idp INT(11) NOT NULL,
    cantidad INT(11) NOT NULL,
    precio FLOAT NOT NULL
)engine='InnoDB' default charset=latin1;

CREATE TABLE mensaje(
	idm INT(11) NOT NULL AUTO_INCREMENT,
    idu INT(11) NOT NULL,
    mgs TEXT NOT NULL,
    fecha_hora DATETIME NOT NULL,
    state BIT NOT NULL,
    PRIMARY KEY(idm)
)engine='InnoDB' default charset=latin1;

