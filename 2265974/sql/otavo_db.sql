-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2022 a las 22:33:52
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `otavo_db`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `C_ADMINISTRADOR` (`c_AdmiIdentificacion` VARCHAR(20), `c_AdmiTipoIdentificacion` VARCHAR(15), `c_AdmiNombre` VARCHAR(50), `c_AdmiApellido` VARCHAR(50), `c_AdmiCelular` VARCHAR(20), `c_AdmiDireccion` VARCHAR(50))  INSERT INTO ADMINISTRADOR( AdmiIdentificacion, AdmiTipoIdentificacion, AdmiNombre, AdmiApellido, AdmiCelular, AdmiDireccion ) VALUES (c_AdmiIdentificacion, c_AdmiTipoIdentificacion, c_AdmiNombre, c_AdmiApellido, c_AdmiCelular, c_AdmiDireccion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_CLIENTE` (`c_ClieIdentificacion` VARCHAR(20), `c_ClieTipoIdentificacion` VARCHAR(15), `c_ClieNombre` VARCHAR(50), `c_ClieApellido` VARCHAR(50), `c_ClieCelular` VARCHAR(20), `c_ClieDireccion` INT)  INSERT INTO CLIENTE(ClieIdentificacion, ClieTipoIdentificacion, ClieNombre, ClieApellido, ClieCelular, ClieDireccion ) VALUES (c_ClieIdentificacion, c_ClieTipoIdentificacion, c_ClieNombre, c_ClieApellido, c_ClieCelular, c_ClieDireccion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_DETALLE_VENTA` (`c_DeveSubtotal` INT, `c_DeveCantidadPorProducto` INT)  INSERT INTO DETALLE_VENTA(DeveSubtotal, DeveCantidadPorProducto) VALUES (c_DeveSubtotal, c_DeveCantidadPorProducto)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_PRODUCTO` (`c_ProdNombre` VARCHAR(50), `c_ProdPrecioVenta` INTEGER, `c_ProdCantidadStock` INTEGER, `c_ProdUnidadMedida` VARCHAR(50), `c_ProdDescripcion` TEXT)  INSERT INTO PRODUCTO(ProdNombre, ProdPrecioVenta, ProdCantidadStock, ProdUnidadMedida, ProdDescripcion ) VALUES (c_ProdNombre, c_ProdPrecioVenta, c_ProdCantidadStock, c_ProdUnidadMedida, c_ProdDescripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_USUARIO` (`c_nombre` VARCHAR(50), `c_correo` VARCHAR(50), `c_password` VARCHAR(50))  INSERT INTO USUARIO(nombre, correo, password) VALUES (c_nombre, c_correo, c_password)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_VENTA` (`c_VentFecha` DATE, `c_VentTotal` INT, `c_VentCantidadTotal` INT)  INSERT INTO VENTA(VentFecha, VentTotal, VentCantidadTotal) VALUES (c_VentFecha, c_VentTotal, c_VentCantidadTotal)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_ADMINISTRADOR` (`d_AdmiCodigoPK` INT)  DELETE FROM ADMINISTRADOR WHERE AdmiCodigoPK = d_AdmiCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_CLIENTE` (`d_ClieCodigoPK` INT)  DELETE FROM CLIENTE WHERE ClieCodigoPK = d_ClieCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_DETALLE_VENTA` (`d_DeveCodigoPK` INT)  DELETE FROM DETALLE_VENTA WHERE DeveCodigoPK = d_DeveCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_PRODUCTO` (`d_ProdCodigoPK` INT)  DELETE FROM PRODUCTO WHERE ProdCodigoPK = d_ProdCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_USUARIO` (`d_id_usuario` INT)  DELETE FROM usuario WHERE id_usuario = d_id_usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_VENTA` (`d_VentCodigoPK` INT)  DELETE FROM VENTA WHERE VentCodigoPK = d_VentCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R1_USUARIO` (`r1_id_usuario` INT)  SELECT * FROM usuario WHERE id_usuario = r1_id_usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_ADMINISTRADOR` ()  SELECT * FROM ADMINISTRADOR$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_CLIENTE` ()  SELECT * FROM CLIENTE$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_DETALLE_VENTA` ()  SELECT * FROM DETALLE_VENTA$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_PRODUCTO` ()  SELECT * FROM PRODUCTO$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_USUARIO` ()  SELECT * FROM USUARIO$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_VENTA` ()  SELECT * FROM VENTA$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_ADMINISTRADOR` (`u_AdmiCodigoPK` INT, `u_AdmiIdentificacion` VARCHAR(20), `u_AdmiTipoIdentificacion` VARCHAR(15), `u_AdmiNombre` VARCHAR(50), `u_AdmiApellido` VARCHAR(50), `u_AdmiCelular` VARCHAR(20), `u_AdmiDireccion` VARCHAR(50))  UPDATE U_ADMINISTRADOR SET AdmiCodigoPK=u_AdmiCodigoPK, AdmiIdentificacion=u_AdmiIdentificacion, AdmiTipoIdentificacion=u_AdmiTipoIdentificacion, AdmiNombre=u_AdmiNombre, AdmiApellido=u_AdmiApellido, AdmiCelular=u_AdmiCelular, AdmiDireccion=u_AdmiDireccion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_CLIENTE` (`u_ClieCodigoPK` INT, `u_ClieIdentificacion` VARCHAR(20), `u_ClieTipoIdentificacion` VARCHAR(15), `u_ClieNombre` VARCHAR(50), `u_ClieApellido` VARCHAR(50), `u_ClieCelular` VARCHAR(20), `ClieDireccion` VARCHAR(50))  UPDATE U_CLIENTE SET ClieCodigoPK=u_ClieCodigoPK, ClieIdentificacion=u_ClieIdentificacion, ClieTipoIdentificacion=u_ClieTipoIdentificacion, ClieNombre=u_ClieNombre, ClieApellido=u_ClieApellido, ClieCelular=u_ClieCelular, ClieDireccion=ClieDireccion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_DETALLE_VENTA` (`u_DeveCodigoPK` INT, `u_DeveSubtotal` INT, `u_DeveCantidadPorProducto` INT)  UPDATE U_DETALLE_VENTA SET DeveCodigoPK=u_DeveCodigoPK, DeveSubtotal=u_DeveSubtotal, DeveCantidadPorProducto=u_DeveCantidadPorProducto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_PRODUCTO` (`u_ProdCodigoPK` INT, `u_ProdNombre` VARCHAR(50), `u_ProdPrecioVenta` INT, `u_ProdCantidadStock` INT, `u_ProdUnidadMedida` VARCHAR(50), `u_ProdDescripcion` TEXT)  UPDATE U_PRODUCTO SET ProdCodigoPK=u_ProdCodigoPK, ProdNombre=u_ProdNombre, ProdPrecioVenta=u_ProdPrecioVenta, ProdCantidadStock=u_ProdCantidadStock, ProdUnidadMedida=u_ProdUnidadMedida, ProdDescripcion=u_ProdDescripcion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_USUARIO` (`u_nombre` VARCHAR(50), `u_correo` VARCHAR(50), `u_password` VARCHAR(50), `u_id_usuario` INT)  UPDATE usuario SET nombre=u_nombre, correo=u_correo, password=u_password WHERE id_usuario = u_id_usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_VENTA` (`u_VentCodigoPK` INT, `u_VentFecha` DATE, `u_VentTotal` INT, `u_VentCantidadTotal` INT)  UPDATE U_VENTA SET VentCodigoPK=u_VentCodigoPK, VentFecha=u_VentFecha, VentTotal=u_VentTotal, VentCantidadTotal=u_VentCantidadTotal$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `AdmiCodigoPK` int(11) NOT NULL,
  `AdmiIdentificacion` varchar(20) NOT NULL,
  `AdmiTipoIdentificacion` varchar(15) NOT NULL,
  `AdmiNombre` varchar(50) NOT NULL,
  `AdmiApellido` varchar(50) NOT NULL,
  `AdmiCelular` varchar(20) NOT NULL,
  `AdmiDireccion` varchar(50) NOT NULL,
  `UsuaCodigoFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ClieCodigoPK` int(11) NOT NULL,
  `ClieIdentificacion` varchar(20) NOT NULL,
  `ClieTipoIdentificacion` varchar(15) NOT NULL,
  `ClieNombre` varchar(50) NOT NULL,
  `ClieApellido` varchar(50) NOT NULL,
  `ClieCelular` varchar(20) NOT NULL,
  `ClieDireccion` varchar(50) NOT NULL,
  `UsuaCodigoFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `DeveCodigoPK` int(11) NOT NULL,
  `DeveSubtotal` int(11) NOT NULL,
  `DeveCantidadPorProducto` int(11) NOT NULL,
  `VentCodigoFK` int(11) NOT NULL,
  `ProdCodigoFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ProdCodigoPK` int(11) NOT NULL,
  `ProdNombre` varchar(50) NOT NULL,
  `ProdPrecioVenta` int(11) NOT NULL,
  `ProdCantidadStock` int(11) NOT NULL,
  `ProdUnidadMedida` varchar(50) NOT NULL,
  `ProdDescripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ProdCodigoPK`, `ProdNombre`, `ProdPrecioVenta`, `ProdCantidadStock`, `ProdUnidadMedida`, `ProdDescripcion`) VALUES
(2, 'Bolso', 25000, 18, 'kg', 'Bolso guardacascos vital para la seguridad de nuestros clientes :D'),
(3, 'hombreras', 75000, 35, 'kg', 'van en los hombros ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipoUsua` varchar(20) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `password`, `correo`, `tipoUsua`) VALUES
(5, 'asdYate', 'asd@gmail.com', 'asd@email.com', 'cliente'),
(7, 'asd', 'asd@gmail.com', 'asd123', 'cliente'),
(8, 'asd', 'asd@gmail.com', 'asdAndres', 'cliente'),
(9, 'asd', 'asd@gmail.com', 'asdAndres', 'cliente'),
(10, 'Betulia', '123ABC', 'betulia@email.com', 'cliente'),
(11, 'laura', 'laura@gmail.com', 'laura123', 'cliente'),
(12, 'Carlos', 'mamanRique@gmail.com', 'soyCarlosUwU', 'cliente'),
(13, 'carlos', 'yate', 'mamanrique@email.com', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `VentCodigoPK` int(11) NOT NULL,
  `VentFecha` date NOT NULL,
  `VentTotal` int(11) NOT NULL,
  `VentCantidadTotal` int(11) NOT NULL,
  `ClieCodigoFK` int(11) NOT NULL,
  `AdmiCodigoFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`AdmiCodigoPK`),
  ADD KEY `usu_adm` (`UsuaCodigoFK`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ClieCodigoPK`),
  ADD KEY `usu_cli` (`UsuaCodigoFK`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`DeveCodigoPK`),
  ADD KEY `vent_det` (`VentCodigoFK`),
  ADD KEY `prod_det` (`ProdCodigoFK`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ProdCodigoPK`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`VentCodigoPK`),
  ADD KEY `cli_ven` (`ClieCodigoFK`),
  ADD KEY `adm_ven` (`AdmiCodigoFK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `AdmiCodigoPK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ClieCodigoPK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `DeveCodigoPK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ProdCodigoPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `VentCodigoPK` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `usu_adm` FOREIGN KEY (`UsuaCodigoFK`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `usu_cli` FOREIGN KEY (`UsuaCodigoFK`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `prod_det` FOREIGN KEY (`ProdCodigoFK`) REFERENCES `producto` (`ProdCodigoPK`),
  ADD CONSTRAINT `vent_det` FOREIGN KEY (`VentCodigoFK`) REFERENCES `venta` (`VentCodigoPK`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `adm_ven` FOREIGN KEY (`AdmiCodigoFK`) REFERENCES `administrador` (`AdmiCodigoPK`),
  ADD CONSTRAINT `cli_ven` FOREIGN KEY (`ClieCodigoFK`) REFERENCES `cliente` (`ClieCodigoPK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- CREACIÓN DEL PROCEDIMIENTO ALMACENADO PARA IDENTIFICAR CORREOS ELECTRONICOS

CREATE PROCEDURE RU_USUARIO(ru_correo varchar(50))
SELECT * FROM USUARIO WHERE ru_correo = correo;

SELECT * FROM CLIENTE;  
 
--
-- Estructura para la vista `datos_cliente_usuario`
--

CREATE VIEW datos_cliente_usuario AS
SELECT * FROM usuario AS u RIGHT JOIN cliente AS c ON u.id_usuario = c.UsuaCodigoFK;
#----------------
CREATE VIEW datos_cliente_venta AS;
SELECT * FROM cliente AS c LEFT JOIN venta AS v ON c.ClieCodigoPK = v.ClieCodigoFK;

SELECT * FROM datos_cliente_venta;
SELECT * FROM datos_cliente_usuario;

--
-- ESTRUCTURA PARA LA CONSULTA MULTITABLA `datos_cliente_usuario`
--
CREATE PROCEDURE R_CLIENTE_USUARIO(idFK int)
SELECT c.ClieCodigoPK, c.ClieIdentificacion as Identificacion, c.ClieTipoIdentificacion as TipoDoc, c.ClieNombre, c.ClieApellido, c.ClieCelular as Celular, c.ClieDireccion as Direccion, c.UsuaCodigoFK,
u.id_usuario, u.nombre, u.password as Contraseña, u.correo, u.tipoUsua
FROM CLIENTE AS c INNER JOIN USUARIO AS u WHERE c.UsuaCodigoFK = idFK AND u.id_usuario = idFK;

DROP PROCEDURE `R_CLIENTE_USUARIO`;

SELECT * FROM usuario;
CALL `R_CLIENTE_USUARIO`(27);

SELECT CONCAT(c.ClieNombre, " " , c.ClieApellido) Nombre, v.VentFecha Fecha, v.VentTotal Total, p.ProdNombre Producto
FROM ((CLIENTE c INNER JOIN VENTA v ON c.ClieCodigoPK = v.ClieCodigoFK) INNER JOIN DETALLE_VENTA dv ON v.VentCodigoPK = dv.VentCodigoFK)
INNER JOIN PRODUCTO p ON p.ProdCodigoPK = dv.ProdCodigoFK;



#CREACIÓN DEL PROCEDIMIENTO PARA ACTUALIZAR LA TABLA DE USUARIO

CREATE PROCEDURE U_USUARIO(u_nombre VARCHAR(50), u_correo VARCHAR(50), u_password VARCHAR(50), u_tipoUsua VARCHAR(20), u_id_usuario INT)
UPDATE usuario SET nombre=u_nombre, correo=u_correo, password=u_password, tipoUsua=u_tipoUsua WHERE id_usuario = u_id_usuario;

DROP PROCEDURE U_USUARIO;

CREATE PROCEDURE U_CLIENTE
(u_ClieNombre VARCHAR(50), u_ClieApellido VARCHAR(50), u_ClieTipoIdentificacion VARCHAR(15), u_ClieIdentificacion VARCHAR(20), u_ClieCelular VARCHAR(20), u_ClieDireccion VARCHAR(50), u_UsuaCodigoFK int)
UPDATE CLIENTE 
SET ClieNombre=u_ClieNombre, ClieApellido=u_ClieApellido, ClietipoIdentificacion=u_ClieTipoIdentificacion, ClieIdentificacion=u_ClieIdentificacion, ClieCelular=u_ClieCelular, ClieDireccion=u_ClieDireccion
WHERE UsuaCodigoFK=u_UsuaCodigoFK;

DROP PROCEDURE U_CLIENTE;

SELECT * FROM CLIENTE;
SELECT * FROM producto;

CALL U_CLIENTE("Andres", "Yate", "CC", "1231241341", "32223213", "calle 16", 17);

CREATE PROCEDURE R1_PRODUCTO(id int)
SELECT * FROM PRODUCTO WHERE ProdCodigoPK = id;

CREATE PROCEDURE U_PRODUCTO (u_ProdCodigoPK INT, u_ProdNombre VARCHAR(50), u_ProdPrecioVenta INT, u_ProdCantidadStock INT, u_ProdUnidadMedida VARCHAR(50), u_ProdDescripcion TEXT)  
UPDATE PRODUCTO 
SET ProdNombre=u_ProdNombre, ProdPrecioVenta=u_ProdPrecioVenta, ProdCantidadStock=u_ProdCantidadStock, ProdUnidadMedida=u_ProdUnidadMedida, ProdDescripcion=u_ProdDescripcion
WHERE ProdCodigoPK=u_ProdCodigoPK;

DROP PROCEDURE U_PRODUCTO;

#CALL U_PRODUCTO(:id, :nombre, :precio, :cantidad, :unidad, :desc)
CALL U_PRODUCTO(2, "Bolso Aaa", 20000, 12, "kg", "AAABBB");
SELECT * FROM PRODUCTO;

SELECT * FROM CLIENTE;