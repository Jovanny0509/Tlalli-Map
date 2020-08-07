/*Tabla entidades federativas*/
CREATE TABLE entidades(
	idEntidad INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    entidad VARCHAR(100)
);

/*Tabla usuarios*/
CREATE TABLE usuarios(
	idUsuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(50),
    contrasenia VARCHAR(100),
    nombre VARCHAR(100),
    apaterno VARCHAR(100),
    amaterno VARCHAR(100),
    fechaNac DATE,
    idEntidad INT,
    FOREIGN KEY(idEntidad) REFERENCES entidades(idEntidad)
);

/*Tabla rutas*/
CREATE TABLE rutas(
	idRuta INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100),
    descripcion VARCHAR(250)
);

INSERT INTO tlallimap.rutas(nombre,descripcion) VALUES('México-Tenochtitlan','En esta ruta encontrarás los vestigios de la antigua civilización mexica.');
INSERT INTO tlallimap.rutas(nombre,descripcion) VALUES('Nueva España','En esta ruta encontrarás parte de nuestra herencia española después de la Conquista');
INSERT INTO tlallimap.lugares(nombre,descripcion,latitud,longitud) VALUES('Chalchihuitl-Madero','Pertenecía al Templo del Sol, se encuentra incrustado en la pared del edificio',19.433538,-99.137229);
INSERT INTO tlallimap.lugares(nombre,descripcion,latitud,longitud) VALUES('Piedra calendárica','Significa 13-Ozomatli(13 Simio), está al interior de la tienda Bershka',19.433661 ,-99.137198);
INSERT INTO tlallimap.lugares(nombre,descripcion,latitud,longitud) VALUES('Heladería Santa Clara','Ingresa a la heladería y escanea el marcador',19.43356,-99.137454);
INSERT INTO tlallimap.lugares(nombre,descripcion,latitud,longitud) VALUES('Piezas arqueológicas de la Catedral Metropolitana','La Catedral oculta muchas piezas prehispánicas sueltas del templo que hay bajo su suelo',19.433784 ,-99.133435);
UPDATE `tlallimap`.`lugares` SET `idRuta` = '1' WHERE (`idLugar` = '1');
UPDATE `tlallimap`.`lugares` SET `idRuta` = '1' WHERE (`idLugar` = '2');
UPDATE `tlallimap`.`lugares` SET `idRuta` = '1' WHERE (`idLugar` = '3');
UPDATE `tlallimap`.`lugares` SET `idRuta` = '1' WHERE (`idLugar` = '4');
/*Tabla lugares*/
CREATE TABLE lugares(
	idLugar INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100),
    descripcion VARCHAR(250),
    latitud DECIMAL(9,7),
    longitud DECIMAL(9,7),
    idRuta INT,
    recurso VARCHAR(300),
    FOREIGN KEY(idRuta) REFERENCES rutas(idRuta)
);

/*Tabla Items*/
CREATE TABLE items(
	idItem INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idLugar INT,
    descripcion VARCHAR(200),
    statusItem ENUM('0','1'),
    FOREIGN KEY(idLugar) REFERENCES lugares(idLugar)
);

/*Tabla usuarioHasRutas*/ 
CREATE TABLE usuarioHasRutas(
	idUsuario INT NOT NULL,
    idRuta INT NOT NULL,
    status ENUM('0','1'),
    FOREIGN KEY(idUsuario) REFERENCES usuarios(idUsuario),
    FOREIGN KEY(idRuta) REFERENCES rutas(idRuta)
);

/*Tabla usuarioHasRutas*/ 
CREATE TABLE usuarioHasLugares(
	idUsuario INT NOT NULL,
    idLugar INT NOT NULL,
    statusVisita ENUM('0','1'),
    FOREIGN KEY(idUsuario) REFERENCES usuarios(idUsuario),
    FOREIGN KEY(idLugar) REFERENCES lugares(idLugar)
);
ALTER TABLE usuarioHasLugares ADD COLUMN idRuta INT NOT NULL;
ALTER TABLE usuarioHasLugares RENAME COLUMN status to statusVisita;

INSERT INTO usuarioHasLugares(idUsuario, idRuta, idLugar,statusVisita) VALUES(1,1,1,'0');
INSERT INTO usuarioHasLugares(idUsuario, idRuta, idLugar,statusVisita) VALUES(1,1,2,'0');
INSERT INTO usuarioHasLugares(idUsuario, idRuta, idLugar,statusVisita) VALUES(1,1,3,'0');
INSERT INTO usuarioHasLugares(idUsuario, idRuta, idLugar,statusVisita) VALUES(1,1,4,'0');

INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(33,'Soy Extranjero/');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(1,'Aguascalientes');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(2,'Baja Califoria Norte');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(3,'Baja California Sur');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(4,'Campeche');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(5,'Chiapas');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(6,'Chihuahua');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(7,'Ciudad de México');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(8,'Coahuila');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(9,'Colima');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(10,'Durango');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(11,'Estado de México');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(12,'Guanajuato');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(13,'Guerrero');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(14,'Hidalgo');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(15,'Jalisco');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(16,'Michoacán');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(17,'Morelos');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(18,'Nayarit');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(19,'Nuevo León');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(20,'Oaxaca');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(21,'Puebla');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(22,'Querétaro');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(23,'Quintana Roo');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(24,'San Luis Potosí');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(25,'Sinaloa');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(26,'Sonora');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(27,'Tabasco');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(28,'Tamaulipas');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(29,'Tlaxcala');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(30,'Veracruz');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(31,'Yucatán');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(32,'Zacatecas');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(33,'África');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(34,'Asia');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(35,'Europa');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(36,'Norteamérica');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(37,'Centroamérica');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(38,'Sudamérica');
INSERT INTO tlallimap.entidades(idEntidad, entidad) VALUES(39,'Oceanía');

ALTER TABLE tlallimap.lugares add column audio varchar(250);
ALTER TABLE tlallimap.lugares add column texto varchar(250);

