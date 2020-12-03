CREATE DATABASE store;

USE store;

CREATE TABLE usuario(
	idu INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30),
    ape_pat VARCHAR(30),
    ape_mat VARCHAR(30),
    fecha DATE,
    email VARCHAR(30) NOT NULL,
    telefono VARCHAR(20),
    pwd VARCHAR(100) NOT NULL,
    tipo BIT NOT NULL,
    gustos VARCHAR(250),
    PRIMARY KEY(idu)
)engine='InnoDB' default charset=latin1;

CREATE TABLE domicilio(
    idu INT(11) NOT NULL,
	calle VARCHAR(50),
    n_ext VARCHAR(10),
    n_int VARCHAR(10),
    cp INT(11),
    colonia VARCHAR(50),
    ciudad VARCHAR(30),
    estado VARCHAR(30)
)engine='InnoDB' default charset=latin1;

CREATE TABLE producto(
	idp INT(11) NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
    descripcion TEXT,
    precio DOUBLE NOT NULL, 
    existencia INT(11) NOT NULL,
    idca INT(11) NOT NULL,
    calificacion DOUBLE,
    imagen VARCHAR(250),
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

CREATE TABLE contiene(
	idc INT(11) NOT NULL,
    idp INT(11) NOT NULL,
    cantidad INT(11) NOT NULL
)engine='InnoDB' default charset=latin1;

CREATE TABLE carrito(
    idu INT(11) NOT NULL,
    idp INT(11) NOT NULL,
    cantidad INT(11) NOT NULL
)engine='InnoDB' default charset=latin1;

CREATE TABLE mensaje(
	idm INT(11) NOT NULL AUTO_INCREMENT,
    idu INT(11) NOT NULL,
    mgs TEXT NOT NULL,
    fecha_hora DATETIME NOT NULL,
    state BIT NOT NULL,
    PRIMARY KEY(idm)
)engine='InnoDB' default charset=latin1;

CREATE TABLE califica(
	idu INT(11) NOT NULL,
    idp INT(11) NOT NULL,
    calf INT(11) NOT NULL
)engine='InnoDB' default charset=latin1;

CREATE TABLE comenta(
	idu INT(11) NOT NULL,
    idp INT(11) NOT NULL,
    comentario TEXT NOT NULL
)engine='InnoDB' default charset=latin1;

CREATE TABLE categoria(
	idca INT(11) NOT NULL AUTO_INCREMENT,
    categoria VARCHAR(50),
    PRIMARY KEY(idca)
)engine='InnoDB' default charset=latin1;