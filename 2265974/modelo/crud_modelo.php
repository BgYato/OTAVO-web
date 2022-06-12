<?php

    require_once "conexion.php";

    class modeloFormularios
    {
        /*=========================================================
        =                       REGISTRO DE DATOS                 =
        =========================================================== */
        static public function mdlRegistro($datos)
        {
            //VERIFICACIÓN DE LOS DATOS PARA EVITAR QUE SE REPITAN        
            $verificar_nombre = mysqli_query($base, "SELECT * FROM usuario WHERE nombre = '$nombre'")

            $stmt = conexion::conectar() -> prepare("CALL C_USUARIO(:nombre, :pass, :correo)");
            $stmt -> bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":pass",$datos["pass"], PDO::PARAM_STR);
            $stmt -> bindParam(":correo",$datos["correo"], PDO::PARAM_STR);

            if ($stmt -> execute()) {
                return "ok";
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }    
        
        static public function mdlRegistroProd($producto)
        {
            $stpr = conexion::conectar() -> prepare("CALL C_PRODUCTO(:ProdNombre, :ProdPrecioVenta, :ProdCantidadStock, :ProdUnidadMedida, :ProdDescripcion)");
            $stpr -> bindParam(":ProdNombre",$producto["nombre"], PDO::PARAM_STR);
            $stpr -> bindParam(":ProdPrecioVenta",$producto["precio"], PDO::PARAM_STR);
            $stpr -> bindParam(":ProdCantidadStock",$producto["cantidad"], PDO::PARAM_STR);
            $stpr -> bindParam(":ProdUnidadMedida",$producto["unidad"], PDO::PARAM_STR);
            $stpr -> bindParam(":ProdDescripcion",$producto["descripcion"], PDO::PARAM_STR);
            
            if ($stpr -> execute()) {
                return "ok";
            }
        }
    }
    
?>