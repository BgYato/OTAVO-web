<?php

    require_once "conexion.php";

    class modeloFormularios
    {
        /*=========================================================
        =                       REGISTRO DE DATOS                 =
        =========================================================== */
        static public function mdlRegistro($datos)
        {                        
            $stmt = conexion::conectar() -> prepare("CALL C_USUARIO(:nombre, :correo, :pass)");
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

        static public function mdlSeleccionarRegistro($dato){
            if($dato==null){
                $stmt=conexion::conectar()->prepare("call R_USUARIO()");
                $stmt->execute();
                return $stmt->fetchAll();
            }
            else{
                $stmt=conexion::conectar()->prepare("call R1_USUARIO(:id)");
                $stmt->bindParam(":id",$dato,PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch();
            }        
        }

        static public function mdlActualizarRegistro($datos_actualizar){
            $stmt=conexion::conectar()->prepare("CALL U_USUARIO(:nombre, :correo, :pass, :id)");
        
            $stmt->bindParam(":nombre",$datos_actualizar["nombre_u"],PDO::PARAM_STR);
            $stmt->bindParam(":correo",$datos_actualizar["correo_u"],PDO::PARAM_STR);
            $stmt->bindParam(":pass",$datos_actualizar["pass_u"],PDO::PARAM_STR);
            $stmt->bindParam(":id",$datos_actualizar["id_u"],PDO::PARAM_INT);
        
            if($stmt->execute()){
                return "actualizado";
            }else{
                print_r(conexion::conectar()->errorInfo());
            }	
        }

        static public function mdlBorrarRegistro($dato){
            /* print_r($dato); */
            $stmt=conexion::conectar()->prepare("CALL D_USUARIO(:id)");

            $stmt->bindParam(":id",$dato,PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }
    }
    
?>