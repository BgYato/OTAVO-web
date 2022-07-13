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
        
        static public function mdlRegistroCliente($datosCliente)
        {
            $stmt = conexion::conectar() -> prepare("CALL C_USUARIO(:nombre, :correo, :pass)");
            $stmt -> bindParam(":nombre",$datosCliente["nombreUsuario"], PDO::PARAM_STR);
            $stmt -> bindParam(":correo",$datosCliente["correoUsuario"], PDO::PARAM_STR);   
            $stmt -> bindParam(":pass",$datosCliente["pwdUsuario"], PDO::PARAM_STR);
            
            if ($stmt -> execute()) {
                $idus = conexion::conectar() -> prepare("CALL R_ID_USUARIO();");
                if ($idus -> execute()) {
                    $idUsua = $idus->fetch();

                    $stcl = conexion::conectar() -> prepare("CALL C_CLIENTE(:identificacion, :tipoDoc, :nombreClie, :apellidoClie, :clieCelular, :clieDireccion, :usuaCodigo);");
                    $stcl -> bindParam(":identificacion",$datosCliente["numDoc"], PDO::PARAM_STR);
                    $stcl -> bindParam(":tipoDoc",$datosCliente["tipoDoc"], PDO::PARAM_STR);                                        
                    $stcl -> bindParam(":nombreClie",$datosCliente["nombreCliente"], PDO::PARAM_STR);
                    $stcl -> bindParam(":apellidoClie",$datosCliente["apellidoCliente"], PDO::PARAM_STR);
                    $stcl -> bindParam(":clieCelular",$datosCliente["numTel"], PDO::PARAM_STR);
                    $stcl -> bindParam(":clieDireccion",$datosCliente["direccionCliente"], PDO::PARAM_STR);
                    $stcl -> bindParam(":usuaCodigo",$idUsua[0], PDO::PARAM_INT);
                    
                    if ($stcl -> execute()) {
                        return "registrado";
                    } else {
                        print_r(conexion::conectar()->errorInfo());
                    }
                }                                
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

        static public function mdlSeleccionarRegistroCliente($datoCliente_r){
            if ($datoCliente_r==null) {
                $stmt = conexion::conectar()->prepare("CALL R_CLIENTE()");
                $stmt -> execute();
                return $stmt->fetchAll();
            } else {
                $stmt = conexion::conectar()->prepare("CALL R1_CLIENTE(:id_cliente)");
                $stmt -> bindParam(":id_cliente", $datoCliente_r, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt->fetch();
            }
        }

        static public function mdlSeleccionarID($condicion){
            if ($condicion=="usuario") {
                $idus = conexion::conectar() -> prepare("CALL R_ID_USUARIO()");
                $idus->execute();
                return $idus->fetch();                
            } else {
                print_r(conexion::conectar()->errorInfo());
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
        static public function mdlBorrarRegistroCliente($datoID){
            if ($datoID["seleccion"]=='Cl') {
                $id = $datoID["idCliente"];
                $stmt = conexion::conectar()->prepare("CALL D_CLIENTE(:id)");
                $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
                if ($stmt -> execute()) {
                    return "ok";
                }
            } elseif ($datoID["seleccion"]=='ClUs') {
                echo "Hola 2";
            }
        }
    }
    
?>