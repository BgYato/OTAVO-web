use otavo_db;


#TABLA DE USUARIOS
create table usuario(
id_usuario int primary key auto_increment,
nombre varchar(50) not null,
password varchar(50) not null,
correo varchar(50) not null,
tipoUsua varchar(20) not null default 'cliente'
);

drop table usuario;

#TABLA DE PRODUCTO
CREATE TABLE PRODUCTO(
ProdCodigoPK Integer Auto_Increment PRIMARY KEY Not Null,
ProdNombre Varchar(50) Not Null,
ProdPrecioVenta Integer Not Null,
ProdCantidadStock Integer Not Null,
ProdUnidadMedida Varchar(50) Not Null ,
ProdDescripcion Text Not Null);
DESCRIBE PRODUCTO;

#TABLA DE CLIENTE
CREATE TABLE CLIENTE(
ClieCodigoPK Integer Auto_Increment PRIMARY KEY Not Null,
ClieIdentificacion Varchar(20) Not Null,
ClieTipoIdentificacion Varchar(15) Not Null,
ClieNombre Varchar(50) Not Null,
ClieApellido Varchar(50) Not Null,
ClieCelular Varchar(20) Not Null,
ClieDireccion Varchar(50) Not Null,
UsuaCodigoFK Integer Not Null,
CONSTRAINT usu_cli foreign key(UsuaCodigoFK) references usuario(id_usuario));
DESCRIBE CLIENTE;

#TABLA DE ADMINISTRADOR
CREATE TABLE ADMINISTRADOR(
AdmiCodigoPK Integer Auto_Increment PRIMARY KEY Not Null,
AdmiIdentificacion Varchar(20) Not Null,
AdmiTipoIdentificacion Varchar(15) Not Null,
AdmiNombre Varchar(50) Not  Null,
AdmiApellido Varchar(50) Not Null,
AdmiCelular Varchar(20) Not Null,
AdmiDireccion Varchar(50) Not Null,
UsuaCodigoFK Integer Not Null,
CONSTRAINT usu_adm foreign key(UsuaCodigoFK) references usuario(id_usuario));
DESCRIBE ADMINISTRADOR;

#TABLA DE VENTA
CREATE TABLE VENTA(
VentCodigoPK Integer Auto_Increment PRIMARY KEY Not Null,
VentFecha Date Not Null,
VentTotal Integer Not Null,
VentCantidadTotal Integer Not Null,
ClieCodigoFK Integer Not null, 
AdmiCodigoFK Integer Not Null,
CONSTRAINT cli_ven foreign key(ClieCodigoFK) references CLIENTE(ClieCodigoPK),
CONSTRAINT adm_ven foreign key(AdmiCodigoFK) references ADMINISTRADOR(AdmiCodigoPK)
);


DESCRIBE VENTA;

#TABLA DE DETALLE_VENTA
CREATE TABLE DETALLE_VENTA(
DeveCodigoPK Integer Auto_Increment  PRIMARY KEY Not Null,
DeveSubtotal Integer Not Null,
DeveCantidadPorProducto Integer Not Null, 
VentCodigoFK Integer Not Null,
ProdCodigoFK Integer Not Null,
CONSTRAINT vent_det foreign key(VentCodigoFK) references VENTA(VentCodigoPK),
CONSTRAINT prod_det foreign key(ProdCodigoFK) references PRODUCTO(ProdCodigoPK)
);
DESCRIBE DETALLE_VENTA;

#=============================================================================================================================================================================================
#CREANDO LOS CALL EN LA TABLA USUARIO

#CREANDO LOS PRODECIMIENTOS ALMACENADOS PARA CREAR
CREATE PROCEDURE C_USUARIO(c_nombre varchar(50), c_correo varchar(50), c_password varchar(50))
INSERT INTO USUARIO(nombre, correo, password) VALUES (c_nombre, c_correo, c_password);


#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA CONSULTAR
CREATE PROCEDURE R_USUARIO() 
SELECT * FROM USUARIO;

CALL R_USUARIO;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ACTUALIZAR
CREATE PROCEDURE U_USUARIO(u_nombre varchar(50), u_correo varchar(50), u_password varchar(50), u_id_usuario int)
UPDATE usuario SET nombre=u_nombre, correo=u_correo, password=u_password WHERE id_usuario = u_id_usuario;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ELIMINAR DATOS
CREATE PROCEDURE D_USUARIO(d_id_usuario int)
DELETE FROM usuario WHERE id_usuario = d_id_usuario;

#=============================================================================================================================================================================================
#CREANDO LOS CALL EN LA TABLA administrador

#CREANDO LOS PRODECIMIENTOS ALMACENADOS PARA CREAR
CREATE PROCEDURE C_ADMINISTRADOR( c_AdmiIdentificacion varchar(20), c_AdmiTipoIdentificacion varchar(15), c_AdmiNombre varchar(50), c_AdmiApellido varchar(50), c_AdmiCelular varchar(20), c_AdmiDireccion varchar(50))
INSERT INTO ADMINISTRADOR( AdmiIdentificacion, AdmiTipoIdentificacion, AdmiNombre, AdmiApellido, AdmiCelular, AdmiDireccion ) VALUES (c_AdmiIdentificacion, c_AdmiTipoIdentificacion, c_AdmiNombre, c_AdmiApellido, c_AdmiCelular, c_AdmiDireccion);

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA CONSULTAR
CREATE PROCEDURE R_ADMINISTRADOR() 
SELECT * FROM ADMINISTRADOR;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ACTUALIZAR
CREATE PROCEDURE U_ADMINISTRADOR(u_AdmiCodigoPK int, u_AdmiIdentificacion varchar(20), u_AdmiTipoIdentificacion varchar(15), u_AdmiNombre varchar(50), u_AdmiApellido varchar(50), u_AdmiCelular varchar(20), u_AdmiDireccion varchar(50))
UPDATE U_ADMINISTRADOR SET AdmiCodigoPK=u_AdmiCodigoPK, AdmiIdentificacion=u_AdmiIdentificacion, AdmiTipoIdentificacion=u_AdmiTipoIdentificacion, AdmiNombre=u_AdmiNombre, AdmiApellido=u_AdmiApellido, AdmiCelular=u_AdmiCelular, AdmiDireccion=u_AdmiDireccion;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ELIMINAR DATOS
CREATE PROCEDURE D_ADMINISTRADOR(d_AdmiCodigoPK int)
DELETE FROM ADMINISTRADOR WHERE AdmiCodigoPK = d_AdmiCodigoPK;

#=============================================================================================================================================================================================
#CREANDO LOS CALL EN LA TABLA PRODUCTO

#CREANDO LOS PRODECIMIENTOS ALMACENADOS PARA CREAR
CREATE PROCEDURE C_PRODUCTO(c_ProdNombre Varchar(50), c_ProdPrecioVenta Integer, c_ProdCantidadStock Integer, c_ProdUnidadMedida Varchar(50), c_ProdDescripcion Text)
INSERT INTO PRODUCTO(ProdNombre, ProdPrecioVenta, ProdCantidadStock, ProdUnidadMedida, ProdDescripcion ) VALUES (c_ProdNombre, c_ProdPrecioVenta, c_ProdCantidadStock, c_ProdUnidadMedida, c_ProdDescripcion);

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA CONSULTAR
CREATE PROCEDURE R_PRODUCTO() 
SELECT * FROM PRODUCTO;

CALL R_PRODUCTO;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ACTUALIZAR
CREATE PROCEDURE U_PRODUCTO(u_ProdCodigoPK int, u_ProdNombre Varchar(50), u_ProdPrecioVenta int, u_ProdCantidadStock int, u_ProdUnidadMedida varchar(50), u_ProdDescripcion Text)
UPDATE U_PRODUCTO SET ProdCodigoPK=u_ProdCodigoPK, ProdNombre=u_ProdNombre, ProdPrecioVenta=u_ProdPrecioVenta, ProdCantidadStock=u_ProdCantidadStock, ProdUnidadMedida=u_ProdUnidadMedida, ProdDescripcion=u_ProdDescripcion;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ELIMINAR DATOS
CREATE PROCEDURE D_PRODUCTO(d_ProdCodigoPK int)
DELETE FROM PRODUCTO WHERE ProdCodigoPK = d_ProdCodigoPK;

CALL D_PRODUCTO(1);

#=============================================================================================================================================================================================
#CREANDO LOS CALL EN LA TABLA cliente

#CREANDO LOS PRODECIMIENTOS ALMACENADOS PARA CREAR
CREATE PROCEDURE C_CLIENTE(c_ClieIdentificacion Varchar(20), c_ClieTipoIdentificacion Varchar(15), c_ClieNombre Varchar(50), c_ClieApellido Varchar(50), c_ClieCelular Varchar(20), c_ClieDireccion int)
INSERT INTO CLIENTE(ClieIdentificacion, ClieTipoIdentificacion, ClieNombre, ClieApellido, ClieCelular, ClieDireccion ) VALUES (c_ClieIdentificacion, c_ClieTipoIdentificacion, c_ClieNombre, c_ClieApellido, c_ClieCelular, c_ClieDireccion);

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA CONSULTAR
CREATE PROCEDURE R_CLIENTE() 
SELECT * FROM CLIENTE;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ACTUALIZAR
CREATE PROCEDURE U_CLIENTE(u_ClieCodigoPK int, u_ClieIdentificacion Varchar(20), u_ClieTipoIdentificacion Varchar(15), u_ClieNombre Varchar(50), u_ClieApellido Varchar(50), u_ClieCelular Varchar(20),ClieDireccion Varchar(50))
UPDATE U_CLIENTE SET ClieCodigoPK=u_ClieCodigoPK, ClieIdentificacion=u_ClieIdentificacion, ClieTipoIdentificacion=u_ClieTipoIdentificacion, ClieNombre=u_ClieNombre, ClieApellido=u_ClieApellido, ClieCelular=u_ClieCelular, ClieDireccion=ClieDireccion ;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ELIMINAR DATOS
CREATE PROCEDURE D_CLIENTE(d_ClieCodigoPK int)
DELETE FROM CLIENTE WHERE ClieCodigoPK = d_ClieCodigoPK;

#=============================================================================================================================================================================================
#CREANDO LOS CALL EN LA TABLA venta

#CREANDO LOS PRODECIMIENTOS ALMACENADOS PARA CREAR
CREATE PROCEDURE C_VENTA(c_VentFecha Date, c_VentTotal Int, c_VentCantidadTotal Int)
INSERT INTO VENTA(VentFecha, VentTotal, VentCantidadTotal) VALUES (c_VentFecha, c_VentTotal, c_VentCantidadTotal);

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA CONSULTAR
CREATE PROCEDURE R_VENTA() 
SELECT * FROM VENTA;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ACTUALIZAR
CREATE PROCEDURE U_VENTA(u_VentCodigoPK int, u_VentFecha Date, u_VentTotal Int, u_VentCantidadTotal Int)
UPDATE U_VENTA SET VentCodigoPK=u_VentCodigoPK, VentFecha=u_VentFecha, VentTotal=u_VentTotal, VentCantidadTotal=u_VentCantidadTotal;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ELIMINAR DATOS
CREATE PROCEDURE D_VENTA(d_VentCodigoPK int)
DELETE FROM VENTA WHERE VentCodigoPK = d_VentCodigoPK;

#=============================================================================================================================================================================================
#CREANDO LOS CALL EN LA TABLA detalle de venta

#CREANDO LOS PRODECIMIENTOS ALMACENADOS PARA CREAR
CREATE PROCEDURE C_DETALLE_VENTA( c_DeveSubtotal Int, c_DeveCantidadPorProducto Int)
INSERT INTO DETALLE_VENTA(DeveSubtotal, DeveCantidadPorProducto) VALUES (c_DeveSubtotal, c_DeveCantidadPorProducto);

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA CONSULTAR
CREATE PROCEDURE R_DETALLE_VENTA() 
SELECT * FROM DETALLE_VENTA;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ACTUALIZAR
CREATE PROCEDURE U_DETALLE_VENTA(u_DeveCodigoPK int, u_DeveSubtotal int, u_DeveCantidadPorProducto Int)
UPDATE U_DETALLE_VENTA SET DeveCodigoPK=u_DeveCodigoPK, DeveSubtotal=u_DeveSubtotal, DeveCantidadPorProducto=u_DeveCantidadPorProducto;

#CREANDO LOS PROCEDIMIENTOS ALMACENADOS PARA ELIMINAR DATOS
CREATE PROCEDURE D_DETALLE_VENTA(d_DeveCodigoPK int)
DELETE FROM DETALLE_VENTA WHERE DeveCodigoPK = d_DeveCodigoPK;

