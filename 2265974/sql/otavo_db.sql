-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2022 a las 03:59:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: otavo_db
--

DELIMITER $$
--
-- Procedimientos
--
CREATE PROCEDURE C_ADMINISTRADOR (c_AdmiIdentificacion VARCHAR(20), c_AdmiTipoIdentificacion VARCHAR(15), c_AdmiNombre VARCHAR(50), c_AdmiApellido VARCHAR(50), c_AdmiCelular VARCHAR(20), c_AdmiDireccion VARCHAR(50))   INSERT INTO administrador( AdmiIdentificacion, AdmiTipoIdentificacion, AdmiNombre, AdmiApellido, AdmiCelular, AdmiDireccion ) VALUES (c_AdmiIdentificacion, c_AdmiTipoIdentificacion, c_AdmiNombre, c_AdmiApellido, c_AdmiCelular, c_AdmiDireccion);

CREATE PROCEDURE C_CLIENTE (c_ClieIdentificacion VARCHAR(20), c_ClieTipoIdentificacion VARCHAR(15), c_ClieNombre VARCHAR(50), c_ClieApellido VARCHAR(50), c_ClieCelular VARCHAR(20), c_ClieDireccion VARCHAR(50), c_UsuaCodigoFK INT)   INSERT INTO cliente(ClieIdentificacion, ClieTipoIdentificacion, ClieNombre, ClieApellido, ClieCelular, ClieDireccion, UsuaCodigoFK) 
VALUES (c_ClieIdentificacion, c_ClieTipoIdentificacion, c_ClieNombre, c_ClieApellido, c_ClieCelular, c_ClieDireccion, c_UsuaCodigoFK);

CREATE PROCEDURE C_USUARIO (c_nombre VARCHAR(50), c_correo VARCHAR(50), c_password VARCHAR(50))   INSERT INTO usuario(nombre, correo, password) VALUES (c_nombre, c_correo, c_password);

CREATE PROCEDURE D_ADMINISTRADOR (d_AdmiCodigoPK INT)   DELETE FROM ADMINISTRADOR WHERE AdmiCodigoPK = d_AdmiCodigoPK;

CREATE PROCEDURE D_CLIENTE (d_ClieCodigoPK INT)   DELETE FROM cliente WHERE ClieCodigoPK = d_ClieCodigoPK;

CREATE PROCEDURE D_DETALLE_VENTA (d_DeveCodigoPK INT)   DELETE FROM detalle_venta WHERE DeveCodigoPK = d_DeveCodigoPK;

CREATE PROCEDURE D_PRODUCTO (d_ProdCodigoPK INT)   DELETE FROM producto WHERE ProdCodigoPK = d_ProdCodigoPK;

CREATE PROCEDURE D_USUARIO (d_id_usuario INT)   DELETE FROM usuario WHERE id_usuario = d_id_usuario;

CREATE PROCEDURE D_VENTA (d_VentCodigoPK INT)   DELETE FROM VENTA WHERE VentCodigoPK = d_VentCodigoPK;

CREATE PROCEDURE R1_CLIENTE (r1_cliente_id INT)   SELECT * FROM cliente WHERE ClieCodigoPK = r1_cliente_id;

CREATE PROCEDURE R1_PRODUCTO (id INT)   SELECT * FROM producto WHERE ProdCodigoPK = id;

CREATE PROCEDURE R1_USUARIO (r1_id_usuario INT)   SELECT * FROM usuario WHERE id_usuario = r1_id_usuario;

CREATE PROCEDURE RU_USUARIO (ru_correo VARCHAR(50))   SELECT * FROM usuario WHERE ru_correo = correo;

CREATE PROCEDURE R_ADMINISTRADOR ()   SELECT * FROM administrador;

CREATE PROCEDURE R_CLIENTE_USUARIO (idFK INT)   SELECT c.ClieCodigoPK, c.ClieIdentificacion as Identificacion, c.ClieTipoIdentificacion as TipoDoc, c.ClieNombre, c.ClieApellido, c.ClieCelular as Celular, c.ClieDireccion as Direccion, c.UsuaCodigoFK,
u.id_usuario, u.nombre, u.password as Contraseña, u.correo, u.tipoUsua
FROM cliente AS c INNER JOIN usuario AS u WHERE c.UsuaCodigoFK = idFK AND u.id_usuario = idFK;

CREATE PROCEDURE R_DETALLE_VENTA ()   SELECT * FROM detalle_venta;

CREATE PROCEDURE R_ID_USUARIO ()   SELECT MAX(id_usuario) FROM usuario;

CREATE PROCEDURE R_PRODUCTO ()   SELECT * FROM producto;

CREATE PROCEDURE R_USUARIO ()   SELECT * FROM usuario;

CREATE PROCEDURE R_VENTA ()   SELECT * FROM venta;

CREATE PROCEDURE U_ADMINISTRADOR (u_AdmiCodigoPK INT, u_AdmiIdentificacion VARCHAR(20), u_AdmiTipoIdentificacion VARCHAR(15), u_AdmiNombre VARCHAR(50), u_AdmiApellido VARCHAR(50), u_AdmiCelular VARCHAR(20), u_AdmiDireccion VARCHAR(50))   UPDATE administrador SET AdmiCodigoPK=u_AdmiCodigoPK, AdmiIdentificacion=u_AdmiIdentificacion, AdmiTipoIdentificacion=u_AdmiTipoIdentificacion, AdmiNombre=u_AdmiNombre, AdmiApellido=u_AdmiApellido, AdmiCelular=u_AdmiCelular, AdmiDireccion=u_AdmiDireccion;

CREATE PROCEDURE U_CLIENTE (u_ClieNombre VARCHAR(50), u_ClieApellido VARCHAR(50), u_ClieTipoIdentificacion VARCHAR(15), u_ClieIdentificacion VARCHAR(20), u_ClieCelular VARCHAR(20), u_ClieDireccion VARCHAR(50), u_UsuaCodigoFK INT)   UPDATE cliente 
SET ClieNombre=u_ClieNombre, ClieApellido=u_ClieApellido, ClietipoIdentificacion=u_ClieTipoIdentificacion, ClieIdentificacion=u_ClieIdentificacion, ClieCelular=u_ClieCelular, ClieDireccion=u_ClieDireccion
WHERE UsuaCodigoFK=u_UsuaCodigoFK;

CREATE PROCEDURE U_DETALLE_VENTA (u_DeveCodigoPK INT, u_DeveSubtotal INT, u_DeveCantidadPorProducto INT)   UPDATE detalle_venta SET DeveCodigoPK=u_DeveCodigoPK, DeveSubtotal=u_DeveSubtotal, DeveCantidadPorProducto=u_DeveCantidadPorProducto;

CREATE PROCEDURE U_USUARIO (u_nombre VARCHAR(50), u_correo VARCHAR(50), u_password VARCHAR(50), u_tipoUsua VARCHAR(20), u_id_usuario INT)   UPDATE usuario SET nombre=u_nombre, correo=u_correo, password=u_password, tipoUsua=u_tipoUsua WHERE id_usuario = u_id_usuario;

CREATE PROCEDURE U_VENTA (u_VentCodigoPK INT, u_VentFecha DATE, u_VentTotal INT, u_VentCantidadTotal INT)   UPDATE venta SET VentCodigoPK=u_VentCodigoPK, VentFecha=u_VentFecha, VentTotal=u_VentTotal, VentCantidadTotal=u_VentCantidadTotal;

CREATE PROCEDURE R_CLIENTE ()   SELECT * FROM cliente;

DELIMITER $$

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE administrador (
  AdmiCodigoPK int(11) NOT NULL,
  AdmiIdentificacion varchar(20) NOT NULL,
  AdmiTipoIdentificacion varchar(15) NOT NULL,
  AdmiNombre varchar(50) NOT NULL,
  AdmiApellido varchar(50) NOT NULL,
  AdmiCelular varchar(20) NOT NULL,
  AdmiDireccion varchar(50) NOT NULL,
  UsuaCodigoFK int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE cliente (
  ClieCodigoPK int(11) NOT NULL,
  ClieIdentificacion varchar(20) NOT NULL,
  ClieTipoIdentificacion varchar(30) NOT NULL,
  ClieNombre varchar(50) NOT NULL,
  ClieApellido varchar(50) NOT NULL,
  ClieCelular varchar(20) NOT NULL,
  ClieDireccion varchar(50) NOT NULL,
  UsuaCodigoFK int(11) NOT NULL
);

--
-- Volcado de datos para la tabla cliente
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla detalle_venta
--

CREATE TABLE detalle_venta (
  DeveCodigoPK int(11),
  DeveSubtotal int(11) NOT NULL,
  DeveCantidadPorProducto int(11) NOT NULL,
  VentCodigoFK int(11) NOT NULL,
  ProdCodigoFK int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla producto
--

CREATE TABLE producto (
  ProdCodigoPK int(11) NOT NULL,
  ProdNombre varchar(50) NOT NULL,
  ProdPrecioVenta int(11) NOT NULL,
  ProdCantidadStock int(11) NOT NULL,
  ProdUnidadMedida varchar(50) NOT NULL,
  ProdDescripcion text NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla usuario
--

CREATE TABLE usuario (
  id_usuario int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  correo varchar(50) NOT NULL,
  tipoUsua int(10) NOT NULL DEFAULT 0
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla venta
--

CREATE TABLE venta (
  VentCodigoPK int(11) NOT NULL,
  VentFecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  VentTotal int(11) NOT NULL,
  VentCantidadTotal int(11) NOT NULL,
  ClieCodigoFK int(11) NOT NULL,
  AdmiCodigoFK int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura para la vista datos_cliente_usuario
--
CREATE VIEW datos_cliente_usuario  AS SELECT c.ClieCodigoPK AS ClieCodigoPK, c.ClieIdentificacion AS ClieIdentificacion, c.ClieTipoIdentificacion AS ClieTipoIdentificacion, c.ClieNombre AS ClieNombre, c.ClieApellido AS ClieApellido, c.ClieCelular AS ClieCelular, c.ClieDireccion AS ClieDireccion, c.UsuaCodigoFK AS UsuaCodigoFK, u.id_usuario AS id_usuario, u.nombre AS nombre, u.password AS password, u.correo AS correo, u.tipoUsua AS tipoUsua FROM (cliente c join usuario u) WHERE u.id_usuario = c.UsuaCodigoFK;


-- --------------------------------------------------------

--
-- Estructura para la vista datos_cliente_venta
--

CREATE VIEW datos_cliente_venta  AS SELECT c.ClieCodigoPK AS ClieCodigoPK, c.ClieIdentificacion AS ClieIdentificacion, c.ClieTipoIdentificacion AS ClieTipoIdentificacion, c.ClieNombre AS ClieNombre, c.ClieApellido AS ClieApellido, c.ClieCelular AS ClieCelular, c.ClieDireccion AS ClieDireccion, c.UsuaCodigoFK AS UsuaCodigoFK, v.VentCodigoPK AS VentCodigoPK, v.VentFecha AS VentFecha, v.VentTotal AS VentTotal, v.VentCantidadTotal AS VentCantidadTotal, v.ClieCodigoFK AS ClieCodigoFK, v.AdmiCodigoFK AS AdmiCodigoFK FROM (cliente c left join venta v on(c.ClieCodigoPK = v.ClieCodigoFK))  ;

--
-- Índices para tablas volcadas
--

ALTER TABLE administrador
  ADD PRIMARY KEY (AdmiCodigoPK),
  ADD KEY usu_adm (UsuaCodigoFK);

ALTER TABLE cliente
  ADD PRIMARY KEY (ClieCodigoPK),
  ADD KEY usu_cli (UsuaCodigoFK);

ALTER TABLE detalle_venta
  ADD PRIMARY KEY (DeveCodigoPK),
  ADD KEY vent_det (VentCodigoFK),
  ADD KEY prod_det (ProdCodigoFK);

ALTER TABLE producto
  ADD PRIMARY KEY (ProdCodigoPK);

ALTER TABLE usuario
  ADD PRIMARY KEY (id_usuario);

ALTER TABLE venta
  ADD PRIMARY KEY (VentCodigoPK),
  ADD KEY cli_ven (ClieCodigoFK),
  ADD KEY adm_ven (AdmiCodigoFK);

--
-- AUTO_INCREMENT de las tablas volcadas
--


ALTER TABLE administrador
  MODIFY AdmiCodigoPK int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE cliente
  MODIFY ClieCodigoPK int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE detalle_venta
  MODIFY DeveCodigoPK int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE producto
  MODIFY ProdCodigoPK int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE usuario
  MODIFY id_usuario int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE venta
  MODIFY VentCodigoPK int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

ALTER TABLE administrador
  ADD CONSTRAINT usu_adm FOREIGN KEY (UsuaCodigoFK) REFERENCES usuario (id_usuario);

ALTER TABLE cliente
  ADD CONSTRAINT usu_cli FOREIGN KEY (UsuaCodigoFK) REFERENCES usuario (id_usuario);

ALTER TABLE detalle_venta
  ADD CONSTRAINT prod_det FOREIGN KEY (ProdCodigoFK) REFERENCES producto (ProdCodigoPK),
  ADD CONSTRAINT vent_det FOREIGN KEY (VentCodigoFK) REFERENCES venta (VentCodigoPK);

ALTER TABLE venta
  ADD CONSTRAINT adm_ven FOREIGN KEY (AdmiCodigoFK) REFERENCES administrador (AdmiCodigoPK),
  ADD CONSTRAINT cli_ven FOREIGN KEY (ClieCodigoFK) REFERENCES cliente (ClieCodigoPK);

CREATE PROCEDURE DESACTIVAR_USUARIO(id int)
UPDATE usuario SET tipoUsua = "3" WHERE id_usuario = id;

CREATE PROCEDURE C_VENTA(c_VentTotal int, c_VentCantidadTotal int, c_ClieCodigoFK int, c_AdmiCodigoFK int)
INSERT INTO venta (VentTotal, VentCantidadTotal, ClieCodigoFK, AdmiCodigoFK) 
VALUES (c_VentTotal, c_VentCantidadTotal, c_ClieCodigoFK, c_AdmiCodigoFK);

CREATE PROCEDURE C_DETALLE_VENTA(c_DeveSubtotal int, c_DeveCantidadPorProducto int, c_VentCodigoFK int, c_ProdCodigoFK int)
INSERT INTO detalle_venta (DeveSubtotal, DeveCantidadPorProducto, VentCodigoFK, ProdCodigoFK)
VALUES (c_DeveSubtotal, c_DeveCantidadPorProducto, c_VentCodigoFK, c_ProdCodigoFK);

CREATE PROCEDURE R_MAX_VENT_PK(id int)
SELECT MAX(VentCodigoPK) FROM venta WHERE ClieCodigoFK = id;

CREATE PROCEDURE CALCULO_EXISTENCIAS(comprado int, idProd int)
UPDATE producto SET ProdCantidadStock = comprado WHERE ProdCodigoPK = idProd;


CREATE TABLE contacto (
  idMensaje INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  correo VARCHAR(20) NOT NULL,
  mensaje TEXT NOT NULL
);

CREATE PROCEDURE C_CONTACTO(c_nombre varchar(50), c_correo varchar(20), c_mensaje text)
INSERT INTO contacto(nombre, correo, mensaje) 
VALUES (c_nombre, c_correo, c_mensaje);

CREATE PROCEDURE R_CONTACTO()
SELECT * FROM contacto;

CREATE PROCEDURE U_CONTACTO(u_nombre varchar(50), u_correo varchar(20), u_mensaje text, u_id int)
UPDATE contacto SET nombre = u_nombre, correo = u_correo, mensaje = u_mensaje WHERE idMensaje = u_id;

CREATE PROCEDURE D_CONTACTO(id int)
DELETE FROM contacto WHERE idMensaje = id;

/* --------------------------------------------------------------------------------
-----------------------------------------------------------------------------------
----------------------------------------------------------------------------------- */
/* ARREGLO DE LA TABLA PRODUCTO */
ALTER TABLE producto
DROP ProdDescripcion,
DROP ProdUnidadMedida;

ALTER TABLE producto 
ADD ProdImagen LONGBLOB NULL DEFAULT NULL, 
ADD ProdTalla VARCHAR(10) NOT NULL AFTER ProdImagen, 
ADD ProdCategoria VARCHAR(30) NOT NULL AFTER ProdTalla, 
ADD ProdAlto INT(10) NOT NULL AFTER ProdCategoria, 
ADD ProdAncho INT(10) NOT NULL AFTER ProdAlto, 
ADD ProdFondo INT(10) NOT NULL AFTER ProdAncho, 
ADD ProdSintetico VARCHAR(30) NOT NULL AFTER ProdFondo, 
ADD ProdForro VARCHAR(30) NOT NULL AFTER ProdSintetico;

CREATE PROCEDURE C_PRODUCTO (c_ProdNombre VARCHAR(50), c_ProdPrecioVenta INTEGER, c_ProdCantidadStock INTEGER, c_ProdImagen longblob, c_ProdTalla varchar(10), c_ProdCategoria varchar(30), c_ProdAlto INTEGER, c_ProdAncho INTEGER, c_ProdFondo INTEGER, c_ProdSintetico varchar(30), c_ProdForro varchar(30))   
INSERT INTO producto(ProdNombre, ProdPrecioVenta, ProdCantidadStock, ProdImagen, ProdTalla, ProdCategoria, ProdAlto, ProdAncho, ProdFondo, ProdSintetico, ProdForro)
VALUES (c_ProdNombre, c_ProdPrecioVenta, c_ProdCantidadStock, c_ProdImagen, c_ProdTalla, c_ProdCategoria, c_ProdAlto, c_ProdAncho, c_ProdFondo, c_ProdSintetico, c_ProdForro);

CREATE PROCEDURE U_PRODUCTO (u_ProdNombre VARCHAR(50), u_ProdPrecioVenta INTEGER, u_ProdCantidadStock INTEGER, u_ProdTalla varchar(10), u_ProdCategoria varchar(30), u_ProdAlto INTEGER, u_ProdAncho INTEGER, u_ProdFondo INTEGER, u_ProdSintetico varchar(30), u_ProdForro varchar(30), u_ProdCodigoPK int)
UPDATE producto 
SET ProdNombre=u_ProdNombre, ProdPrecioVenta=u_ProdPrecioVenta, ProdCantidadStock=u_ProdCantidadStock, ProdTalla=u_ProdTalla, ProdCategoria=u_ProdCategoria, ProdAlto=u_ProdAlto, ProdAncho=u_ProdAncho, ProdFondo=u_ProdFondo, ProdSintetico=u_ProdSintetico, ProdForro=u_ProdForro
WHERE ProdCodigoPK=u_ProdCodigoPK;

/* Arreglo de la vista de ventas-cliente */

CREATE PROCEDURE R_VENTAS_CLIENTE(idClie int)
SELECT * FROM venta v
INNER JOIN detalle_venta de ON v.VentCodigoPK = de.VentCodigoFK
INNER JOIN producto p ON de.ProdCodigoFK = p.ProdCodigoPK WHERE v.ClieCodigoFK = idClie;

/* CREACIÓN DEL APARTADO DE TICKET; TABLA, RELACION Y PROCEDIMIENTOS */

CREATE TABLE ticket (
  idTicket INTEGER AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(30) not NULL,
  correo VARCHAR(30) NOT NULL,
  situacion VARCHAR(30) NOT NULL,
  mensaje TEXT NOT NULL,
  idUsuaFK int not NULL
);

ALTER TABLE ticket
ADD respuesta TEXT NULL AFTER mensaje;

ALTER TABLE ticket
ADD CONSTRAINT usu_tic FOREIGN KEY (idUsuaFK) REFERENCES usuario (id_usuario);

CREATE PROCEDURE C_TICKET(c_nombre VARCHAR(30), c_correo varchar(30), c_situacion varchar(30), c_mensaje text, c_id int)
INSERT INTO ticket(nombre, correo, situacion, mensaje, idUsuaFK) VALUES (c_nombre, c_correo, c_situacion, c_mensaje, c_id);

CREATE PROCEDURE R_TICKET()
SELECT * FROM ticket;

CREATE PROCEDURE R1_TICKET(id int)
SELECT * FROM ticket WHERE idUsuaFK = id;

CREATE PROCEDURE D_TICKET(id int)
DELETE FROM ticket WHERE idTicket = id;

CREATE PROCEDURE U_TICKET_RESPUESTA(u_respuesta text, id int)
UPDATE ticket SET respuesta=u_respuesta WHERE idTicket=id;

/* CREACIÓN DE LOS PROCEDIMIENTOS PARA LOS REPORTES ALMACENADOS */

/* los datos recogidos deben llevar estos parametros 'AA-MM-DD HH-MM-SS' */
CREATE PROCEDURE VENTA_MES(fecha_actual varchar(20), fecha_maxima varchar(20))
SELECT * FROM cliente c INNER JOIN venta v on c.ClieCodigoPK = v.ClieCodigoFK
INNER JOIN detalle_venta de ON v.VentCodigoPK = de.VentCodigoFK
INNER JOIN producto p ON de.ProdCodigoFK = p.ProdCodigoPK WHERE v.VentFecha > fecha_actual AND v.VentFecha < fecha_maxima;

CREATE PROCEDURE TOTAL_VENTA_MES(fecha_actual varchar(20), fecha_maxima varchar(20))
SELECT COUNT(VentCodigoPK) FROM venta v WHERE v.VentFecha > fecha_actual AND v.VentFecha < fecha_maxima;

CREATE PROCEDURE MAX_VENTA(id int)
SELECT MAX(VentCodigoPK) FROM venta WHERE ClieCodigoFK = id;

CREATE PROCEDURE MAX_VENTA_CLIENTE(idVenta int, idClie int)
SELECT MAX(v.VentCodigoPK) AS VentCodigoPK, v.VentFecha, v.VentTotal, v.VentCantidadTotal, p.ProdNombre, p.ProdPrecioVenta, c.ClieNombre, c.ClieApellido
FROM cliente c 
INNER JOIN venta v on c.ClieCodigoPK = v.ClieCodigoFK
INNER JOIN detalle_venta de ON v.VentCodigoPK = idVenta
INNER JOIN producto p ON de.ProdCodigoFK = p.ProdCodigoPK WHERE v.ClieCodigoFK = idClie;
