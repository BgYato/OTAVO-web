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
-- Base de datos: `otavo_db`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `C_ADMINISTRADOR` (`c_AdmiIdentificacion` VARCHAR(20), `c_AdmiTipoIdentificacion` VARCHAR(15), `c_AdmiNombre` VARCHAR(50), `c_AdmiApellido` VARCHAR(50), `c_AdmiCelular` VARCHAR(20), `c_AdmiDireccion` VARCHAR(50))   INSERT INTO ADMINISTRADOR( AdmiIdentificacion, AdmiTipoIdentificacion, AdmiNombre, AdmiApellido, AdmiCelular, AdmiDireccion ) VALUES (c_AdmiIdentificacion, c_AdmiTipoIdentificacion, c_AdmiNombre, c_AdmiApellido, c_AdmiCelular, c_AdmiDireccion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_CLIENTE` (`c_ClieIdentificacion` VARCHAR(20), `c_ClieTipoIdentificacion` VARCHAR(15), `c_ClieNombre` VARCHAR(50), `c_ClieApellido` VARCHAR(50), `c_ClieCelular` VARCHAR(20), `c_ClieDireccion` VARCHAR(50), `c_UsuaCodigoFK` INT)   INSERT INTO CLIENTE(ClieIdentificacion, ClieTipoIdentificacion, ClieNombre, ClieApellido, ClieCelular, ClieDireccion, UsuaCodigoFK) 
VALUES (c_ClieIdentificacion, c_ClieTipoIdentificacion, c_ClieNombre, c_ClieApellido, c_ClieCelular, c_ClieDireccion, c_UsuaCodigoFK)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_DETALLE_VENTA` (`c_DeveSubtotal` INT, `c_DeveCantidadPorProducto` INT)   INSERT INTO DETALLE_VENTA(DeveSubtotal, DeveCantidadPorProducto) VALUES (c_DeveSubtotal, c_DeveCantidadPorProducto)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_PRODUCTO` (`c_ProdNombre` VARCHAR(50), `c_ProdPrecioVenta` INTEGER, `c_ProdCantidadStock` INTEGER, `c_ProdUnidadMedida` VARCHAR(50), `c_ProdDescripcion` TEXT)   INSERT INTO PRODUCTO(ProdNombre, ProdPrecioVenta, ProdCantidadStock, ProdUnidadMedida, ProdDescripcion ) VALUES (c_ProdNombre, c_ProdPrecioVenta, c_ProdCantidadStock, c_ProdUnidadMedida, c_ProdDescripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_USUARIO` (`c_nombre` VARCHAR(50), `c_correo` VARCHAR(50), `c_password` VARCHAR(50))   INSERT INTO USUARIO(nombre, correo, password) VALUES (c_nombre, c_correo, c_password)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `C_VENTA` (`c_VentFecha` DATE, `c_VentTotal` INT, `c_VentCantidadTotal` INT)   INSERT INTO VENTA(VentFecha, VentTotal, VentCantidadTotal) VALUES (c_VentFecha, c_VentTotal, c_VentCantidadTotal)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_ADMINISTRADOR` (`d_AdmiCodigoPK` INT)   DELETE FROM ADMINISTRADOR WHERE AdmiCodigoPK = d_AdmiCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_CLIENTE` (`d_ClieCodigoPK` INT)   DELETE FROM CLIENTE WHERE ClieCodigoPK = d_ClieCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_DETALLE_VENTA` (`d_DeveCodigoPK` INT)   DELETE FROM DETALLE_VENTA WHERE DeveCodigoPK = d_DeveCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_PRODUCTO` (`d_ProdCodigoPK` INT)   DELETE FROM PRODUCTO WHERE ProdCodigoPK = d_ProdCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_USUARIO` (`d_id_usuario` INT)   DELETE FROM usuario WHERE id_usuario = d_id_usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `D_VENTA` (`d_VentCodigoPK` INT)   DELETE FROM VENTA WHERE VentCodigoPK = d_VentCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R1_CLIENTE` (`r1_cliente_id` INT)   SELECT * FROM CLIENTE WHERE ClieCodigoPK = r1_cliente_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R1_PRODUCTO` (`id` INT)   SELECT * FROM PRODUCTO WHERE ProdCodigoPK = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R1_USUARIO` (`r1_id_usuario` INT)   SELECT * FROM USUARIO WHERE id_usuario = r1_id_usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RU_USUARIO` (`ru_correo` VARCHAR(50))   SELECT * FROM USUARIO WHERE ru_correo = correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_ADMINISTRADOR` ()   SELECT * FROM ADMINISTRADOR$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_CLIENTE` ()   SELECT * FROM CLIENTE$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_CLIENTE_USUARIO` (`idFK` INT)   SELECT c.ClieCodigoPK, c.ClieIdentificacion as Identificacion, c.ClieTipoIdentificacion as TipoDoc, c.ClieNombre, c.ClieApellido, c.ClieCelular as Celular, c.ClieDireccion as Direccion, c.UsuaCodigoFK,
u.id_usuario, u.nombre, u.password as Contraseña, u.correo, u.tipoUsua
FROM CLIENTE AS c INNER JOIN USUARIO AS u WHERE c.UsuaCodigoFK = idFK AND u.id_usuario = idFK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_DETALLE_VENTA` ()   SELECT * FROM DETALLE_VENTA$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_ID_USUARIO` ()   SELECT MAX(id_usuario) FROM usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_PRODUCTO` ()   SELECT * FROM PRODUCTO$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_USUARIO` ()   SELECT * FROM USUARIO$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `R_VENTA` ()   SELECT * FROM VENTA$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_ADMINISTRADOR` (`u_AdmiCodigoPK` INT, `u_AdmiIdentificacion` VARCHAR(20), `u_AdmiTipoIdentificacion` VARCHAR(15), `u_AdmiNombre` VARCHAR(50), `u_AdmiApellido` VARCHAR(50), `u_AdmiCelular` VARCHAR(20), `u_AdmiDireccion` VARCHAR(50))   UPDATE U_ADMINISTRADOR SET AdmiCodigoPK=u_AdmiCodigoPK, AdmiIdentificacion=u_AdmiIdentificacion, AdmiTipoIdentificacion=u_AdmiTipoIdentificacion, AdmiNombre=u_AdmiNombre, AdmiApellido=u_AdmiApellido, AdmiCelular=u_AdmiCelular, AdmiDireccion=u_AdmiDireccion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_CLIENTE` (`u_ClieNombre` VARCHAR(50), `u_ClieApellido` VARCHAR(50), `u_ClieTipoIdentificacion` VARCHAR(15), `u_ClieIdentificacion` VARCHAR(20), `u_ClieCelular` VARCHAR(20), `u_ClieDireccion` VARCHAR(50), `u_UsuaCodigoFK` INT)   UPDATE CLIENTE 
SET ClieNombre=u_ClieNombre, ClieApellido=u_ClieApellido, ClietipoIdentificacion=u_ClieTipoIdentificacion, ClieIdentificacion=u_ClieIdentificacion, ClieCelular=u_ClieCelular, ClieDireccion=u_ClieDireccion
WHERE UsuaCodigoFK=u_UsuaCodigoFK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_DETALLE_VENTA` (`u_DeveCodigoPK` INT, `u_DeveSubtotal` INT, `u_DeveCantidadPorProducto` INT)   UPDATE U_DETALLE_VENTA SET DeveCodigoPK=u_DeveCodigoPK, DeveSubtotal=u_DeveSubtotal, DeveCantidadPorProducto=u_DeveCantidadPorProducto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_PRODUCTO` (`u_ProdCodigoPK` INT, `u_ProdNombre` VARCHAR(50), `u_ProdPrecioVenta` INT, `u_ProdCantidadStock` INT, `u_ProdUnidadMedida` VARCHAR(50), `u_ProdDescripcion` TEXT)   UPDATE PRODUCTO 
SET ProdNombre=u_ProdNombre, ProdPrecioVenta=u_ProdPrecioVenta, ProdCantidadStock=u_ProdCantidadStock, ProdUnidadMedida=u_ProdUnidadMedida, ProdDescripcion=u_ProdDescripcion
WHERE ProdCodigoPK=u_ProdCodigoPK$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_USUARIO` (`u_nombre` VARCHAR(50), `u_correo` VARCHAR(50), `u_password` VARCHAR(50), `u_tipoUsua` VARCHAR(20), `u_id_usuario` INT)   UPDATE usuario SET nombre=u_nombre, correo=u_correo, password=u_password, tipoUsua=u_tipoUsua WHERE id_usuario = u_id_usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `U_VENTA` (`u_VentCodigoPK` INT, `u_VentFecha` DATE, `u_VentTotal` INT, `u_VentCantidadTotal` INT)   UPDATE U_VENTA SET VentCodigoPK=u_VentCodigoPK, VentFecha=u_VentFecha, VentTotal=u_VentTotal, VentCantidadTotal=u_VentCantidadTotal$$

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
  `ClieTipoIdentificacion` varchar(30) NOT NULL,
  `ClieNombre` varchar(50) NOT NULL,
  `ClieApellido` varchar(50) NOT NULL,
  `ClieCelular` varchar(20) NOT NULL,
  `ClieDireccion` varchar(50) NOT NULL,
  `UsuaCodigoFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ClieCodigoPK`, `ClieIdentificacion`, `ClieTipoIdentificacion`, `ClieNombre`, `ClieApellido`, `ClieCelular`, `ClieDireccion`, `UsuaCodigoFK`) VALUES
(9, '1231234431', 'CC', 'Andres Felipe', 'Muñoz', '3222379887', 'N/A', 14),
(21, '1023881574', 'TI', 'Astrid Karina', 'Parra Arciniegas', '3224552208', 'cll 71 sur #18', 27),
(22, '1014478353', 'TI', 'Luis Eduardo', 'Yate Otavo', '3222379887', 'Cll 71 sur #18 a', 28),
(23, '1014478353', 'TI', 'Daniela', 'Parada', '3222379887', 'Cll 71 sur #18 a', 29),
(24, '1014478353', 'TI', 'Andres Felipe', 'Yate Muñoz', '3222379887', 'Cll 71 sur #18 a', 34);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `datos_cliente_usuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `datos_cliente_usuario` (
`ClieCodigoPK` int(11)
,`ClieIdentificacion` varchar(20)
,`ClieTipoIdentificacion` varchar(30)
,`ClieNombre` varchar(50)
,`ClieApellido` varchar(50)
,`ClieCelular` varchar(20)
,`ClieDireccion` varchar(50)
,`UsuaCodigoFK` int(11)
,`id_usuario` int(11)
,`nombre` varchar(50)
,`password` varchar(50)
,`correo` varchar(50)
,`tipoUsua` int(10)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `datos_cliente_venta`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `datos_cliente_venta` (
`ClieCodigoPK` int(11)
,`ClieIdentificacion` varchar(20)
,`ClieTipoIdentificacion` varchar(30)
,`ClieNombre` varchar(50)
,`ClieApellido` varchar(50)
,`ClieCelular` varchar(20)
,`ClieDireccion` varchar(50)
,`UsuaCodigoFK` int(11)
,`VentCodigoPK` int(11)
,`VentFecha` date
,`VentTotal` int(11)
,`VentCantidadTotal` int(11)
,`ClieCodigoFK` int(11)
,`AdmiCodigoFK` int(11)
);

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
(3, 'BOLSO GUARDA CASCO', 12333, 12, 'kilogramos', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(4, 'BOLSO GUARDA CASCO', 12333, 32, '12 kilogramos', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(5, 'BOLSO GUARDA CASCO', 12333, 32, '12 litros', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(7, 'BOLSO GUARDA CASCOS', 32000, 16, '10 litros', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(8, 'BOLSO GUARDA CASCOS', 40000, 10, '19 litros', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipoUsua` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `password`, `correo`, `tipoUsua`) VALUES
(4, 'BgYato', 'andresfyate2005', 'andresfyatem@gmail.com', 1),
(5, 'Peaceful', 'andresYate2005', 'yatwandres@gmail.com', 0),
(6, 'Diana', 'dianamunoz', 'danacarola08@hotmail.com', 0),
(7, 'Jose ', 'yeyo09', 'yeyootavo@gmail.com', 0),
(8, 'Danna', 'dannayate03', 'dannasxd@gmail.com', 0),
(9, 'Nipson', 'nipson123', 'nipson@gmail.com', 0),
(10, 'Peaceful', 'andresyate05', 'yatwandres@gmail.com', 0),
(11, 'BgYato', 'andresFelipeYate', 'yatwandres@gmail.com', 0),
(12, 'Dannas', 'dannayate05', 'dannayate@gmail.com', 0),
(13, 'Peaceful', 'soyelmejor', 'asd@gmail.com', 0),
(14, 'Peaceful', 'asd', 'yeyo@gmail.com', 0),
(15, 'Yeyo', 'asdd', 'yeyo@gmail.com', 0),
(16, 'Yeyo', 'asda', 'yeyo@gmail.com', 0),
(27, 'karina_chan22', 'Na850422', 'karinaarciniegas22@gmail.com', 0),
(28, 'Viernes', '1234', 'viernes@gmail.com', 1),
(29, 'Danni_XD', 'daniela', 'daniela@gmail.com', 0),
(34, 'Peaceful', 'andresyate', 'yatwandres@gmail.com', 0);

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

-- --------------------------------------------------------

--
-- Estructura para la vista `datos_cliente_usuario`
--
DROP TABLE IF EXISTS `datos_cliente_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `datos_cliente_usuario`  AS SELECT `c`.`ClieCodigoPK` AS `ClieCodigoPK`, `c`.`ClieIdentificacion` AS `ClieIdentificacion`, `c`.`ClieTipoIdentificacion` AS `ClieTipoIdentificacion`, `c`.`ClieNombre` AS `ClieNombre`, `c`.`ClieApellido` AS `ClieApellido`, `c`.`ClieCelular` AS `ClieCelular`, `c`.`ClieDireccion` AS `ClieDireccion`, `c`.`UsuaCodigoFK` AS `UsuaCodigoFK`, `u`.`id_usuario` AS `id_usuario`, `u`.`nombre` AS `nombre`, `u`.`password` AS `password`, `u`.`correo` AS `correo`, `u`.`tipoUsua` AS `tipoUsua` FROM (`cliente` `c` join `usuario` `u`) WHERE `u`.`id_usuario` = `c`.`UsuaCodigoFK``UsuaCodigoFK`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `datos_cliente_venta`
--
DROP TABLE IF EXISTS `datos_cliente_venta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `datos_cliente_venta`  AS SELECT `c`.`ClieCodigoPK` AS `ClieCodigoPK`, `c`.`ClieIdentificacion` AS `ClieIdentificacion`, `c`.`ClieTipoIdentificacion` AS `ClieTipoIdentificacion`, `c`.`ClieNombre` AS `ClieNombre`, `c`.`ClieApellido` AS `ClieApellido`, `c`.`ClieCelular` AS `ClieCelular`, `c`.`ClieDireccion` AS `ClieDireccion`, `c`.`UsuaCodigoFK` AS `UsuaCodigoFK`, `v`.`VentCodigoPK` AS `VentCodigoPK`, `v`.`VentFecha` AS `VentFecha`, `v`.`VentTotal` AS `VentTotal`, `v`.`VentCantidadTotal` AS `VentCantidadTotal`, `v`.`ClieCodigoFK` AS `ClieCodigoFK`, `v`.`AdmiCodigoFK` AS `AdmiCodigoFK` FROM (`cliente` `c` left join `venta` `v` on(`c`.`ClieCodigoPK` = `v`.`ClieCodigoFK`))  ;

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
  MODIFY `ClieCodigoPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `DeveCodigoPK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ProdCodigoPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
