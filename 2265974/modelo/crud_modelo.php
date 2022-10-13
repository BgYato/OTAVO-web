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
            
            $stmt = conexion::conectar() -> prepare("CALL C_USUARIO(:nombre, :correo, :pass)"); /* clase - metodo */
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
            $stpr = conexion::conectar() -> prepare("CALL C_PRODUCTO(:ProdNombre, :ProdPrecioVenta, :ProdCantidadStock, :ProdImagen, :ProdTalla, :ProdCategoria, :ProdAlto, :ProdAncho, :ProdFondo, :ProdSintetico, :ProdForro)");
            $stpr -> bindParam(":ProdNombre",$producto["nombre"], PDO::PARAM_STR);
            $stpr -> bindParam(":ProdPrecioVenta",$producto["precio"], PDO::PARAM_INT);
            $stpr -> bindParam(":ProdCantidadStock", $producto["cantidad"], PDO::PARAM_INT);
            $stpr -> bindParam(":ProdImagen", $producto["nombreImagen"], PDO::PARAM_STR);
            $stpr -> bindParam(":ProdTalla", $producto["talla"], PDO::PARAM_STR);
            $stpr -> bindParam(":ProdCategoria", $producto["categoria"], PDO::PARAM_STR);
            $stpr -> bindParam(":ProdAlto", $producto["alto"], PDO::PARAM_INT);
            $stpr -> bindParam(":ProdAncho", $producto["ancho"], PDO::PARAM_INT);
            $stpr -> bindParam(":ProdFondo", $producto["fondo"], PDO::PARAM_INT);
            $stpr -> bindParam(":ProdSintetico", $producto["sintetico"], PDO::PARAM_STR);
            $stpr -> bindParam(":ProdForro", $producto["forro"], PDO::PARAM_STR);
            
            
            if ($stpr -> execute()) {
                move_uploaded_file($producto["temp"], "public/img/uploads/".$producto["nombreImagen"]);
                return "ok";
            }
        }

        static public function mdlValidarCompra($datos){
            $stmt = conexion::conectar() -> prepare("CALL C_VENTA(:total, :cantidad, :idClie, :idAdmi)");
            $stmt -> bindParam(":total", $datos["total"], PDO::PARAM_INT);
            $stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
            $stmt -> bindParam(":idClie", $datos["idClie"], PDO::PARAM_INT);
            $stmt -> bindParam(":idAdmi", $datos["admi"], PDO::PARAM_INT);

            if ($stmt -> execute()) {
                $id = conexion::conectar() -> prepare("CALL R_MAX_VENT_PK(:id)");
                $id -> bindParam(":id", $datos["idClie"], PDO::PARAM_INT);
                $id -> execute();
                $idVenta = $id->fetch();

                $stlt = conexion::conectar() -> prepare("CALL C_DETALLE_VENTA(:Subtotal, :CantidadProducto, :VentaFK, :ProductoFK)");
                $stlt -> bindParam(":Subtotal", $datos["total"], PDO::PARAM_INT);
                $stlt -> bindParam(":CantidadProducto", $datos["cantidad"], PDO::PARAM_INT);
                $stlt -> bindParam(":VentaFK", $idVenta[0], PDO::PARAM_INT);
                $stlt -> bindParam(":ProductoFK", $datos["idProd"], PDO::PARAM_INT);

                if ($stlt -> execute()) {
                    $stat = conexion::conectar() -> prepare("CALL CALCULO_EXISTENCIAS(:comprado, :idProd)");
                    $stat -> bindParam(":comprado", $datos["cantidadStock"], PDO::PARAM_INT);
                    $stat -> bindParam(":idProd", $datos["idProd"], PDO::PARAM_INT);

                    if ($stat -> execute()) {
                        return "ok";
                    }
                }
                
            }
        }

        static public function mdlRegistrarContacto($datos){
            $stmt = conexion::conectar() -> prepare("CALL C_CONTACTO(:nombre, :correo, :mensaje)");

            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $stmt -> bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);

            if ($stmt -> execute()) {
                return "ok";
            } else {
                return "no";
            }
        }

        static public function mdlCrearTicket($datos){
            $stmt = conexion::conectar() -> prepare("CALL C_TICKET(:nombre, :correo, :situacion, :mensaje, :id)");
            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $stmt -> bindParam(":situacion", $datos["situacion"], PDO::PARAM_STR);
            $stmt -> bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if ($stmt -> execute()) {
                return "ok"; 
            } else {
                return "no";
            }
        }

        /*=========================================================
        =                       CONSULTA DE DATOS                 =
        =========================================================== */

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

        static public function mdlSeleccionarRegistroClienteUsuario($datoCliente_u){
            $stmt = conexion::conectar() -> prepare("CALL R_CLIENTE_USUARIO(:idFK)");
            $stmt -> bindParam(":idFK", $datoCliente_u, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt->fetch();
        }

        static public function mdlSeleccionarRegistroProducto($datoProducto){
            if ($datoProducto==null) {
                $stmt = conexion::conectar() -> prepare("CALL R_PRODUCTO()");
                $stmt -> execute();
                return $stmt -> fetchAll();
            } else {
                $stmt = conexion::conectar()->prepare("CALL R1_PRODUCTO(:id_producto)");
                $stmt -> bindParam(":id_producto", $datoProducto, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt->fetch();
            }
        }

        static public function mdlSeleccionarComprasCliente($idClie){
            $stmt = conexion::conectar() -> prepare("CALL R_VENTAS_CLIENTE(:id)");
            $stmt -> bindParam(":id", $idClie, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return $stmt -> fetchAll();
            }
        }

        static public function mdlSeleccionarContacto(){
            $stmt = conexion::conectar() -> prepare("CALL R_CONTACTO()");
            $stmt -> execute();
            return $stmt->fetchAll();
        }

        static public function mdlSeleccionarTicket($id){
            if ($id==null) {
                $stmt = conexion::conectar()->prepare("CALL R_TICKET()");
                $stmt -> execute();
                return $stmt->fetchAll();
            } else {
                $stmt = conexion::conectar()->prepare("CALL R1_TICKET(:id)");
                $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt->fetchAll();
            }
        }

        static public function mdlSeleccionarVentaMes($datos){
            $stmt = conexion::conectar() -> prepare("CALL VENTA_MES(:mes_actual, :mes_maximo)");
            $stmt -> bindParam(":mes_actual", $datos["mes_actual"], PDO::PARAM_STR);
            $stmt -> bindParam(":mes_maximo", $datos["mes_maximo"], PDO::PARAM_STR);

            if ($stmt -> execute()) {
                return $stmt->fetchAll();
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }

        static public function mdlSeleccionarVentaTotalMes($datos){
            $stmt = conexion::conectar() -> prepare("CALL TOTAL_VENTA_MES(:mes_actual, :mes_maximo)");
            $stmt -> bindParam(":mes_actual", $datos["mes_actual"], PDO::PARAM_STR);
            $stmt -> bindParam(":mes_maximo", $datos["mes_maximo"], PDO::PARAM_STR);

            if ($stmt -> execute()) {
                return $stmt->fetch();
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }

        static public function mdlSeleccionarCompraCliente($idVenta, $idCliente){            
            if ($idVenta==null) {
                $stmt = conexion::conectar() -> prepare("CALL MAX_VENTA(:id)");
                $stmt -> bindParam(":id", $idCliente, PDO::PARAM_INT);                   
                if ($stmt -> execute()) {
                    $idVentaMax = $stmt->fetch();
                    $stml = conexion::conectar()->prepare("CALL MAX_VENTA_CLIENTE(:idVenta, :idCliente)");
                    $stml -> bindParam(":idVenta", $idVentaMax[0], PDO::PARAM_INT);
                    $stml -> bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
                    
                    $stml -> execute();                                        
                    return $stml ->fetchAll();
                } else {
                    print_r(conexion::conectar()->errorInfo());
                }
            } else {
                $stml = conexion::conectar()->prepare("CALL MAX_VENTA_CLIENTE(:idVenta, :idCliente)");
                $stml -> bindParam(":idVenta", $idVenta, PDO::PARAM_INT);
                $stml -> bindParam(":idCliente", $idCliente, PDO::PARAM_INT);

                if ($stml -> execute()) {
                    return $stml ->fetchAll();                    
                } else {
                    print_r(conexion::conectar()->errorInfo());
                }
            }
        }

        static public function mdlSeleccionarRegistroTicket(){
            $stmt = conexion::conectar() -> prepare("CALL R_TICKET()");
            if ($stmt->execute()) {
                return $stmt->fetchAll();
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }

        /*=========================================================
        =                       ACTUALIZAR DATOS                 =
        =========================================================== */

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

        static public function mdlActualizarClienteUsuario($datos_actualizarCliente){
            $stmt = conexion::conectar()->prepare("CALL U_USUARIO(:nombre, :correo, :password, :tipoUsua, :id)");

            $stmt->bindParam(":nombre",$datos_actualizarCliente["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":correo",$datos_actualizarCliente["correo"],PDO::PARAM_STR);
            $stmt->bindParam(":password",$datos_actualizarCliente["pwd"],PDO::PARAM_STR);
            $stmt->bindParam(":tipoUsua",$datos_actualizarCliente["tipoUsua"],PDO::PARAM_INT);
            $stmt->bindParam(":id",$datos_actualizarCliente["id"],PDO::PARAM_INT);           

            if ($stmt->execute()) {
                $stul = conexion::conectar()->prepare("CALL U_CLIENTE(:nombre, :apellido, :tipoDoc, :numDoc, :numTel, :direccion, :idFK)");

                $stul -> bindParam(":nombre", $datos_actualizarCliente["nombreCliente"], PDO::PARAM_STR);
                $stul->bindParam(":apellido", $datos_actualizarCliente["apellidoCliente"], PDO::PARAM_STR);
                $stul->bindParam(":tipoDoc", $datos_actualizarCliente["tipoDoc"], PDO::PARAM_STR);
                $stul->bindParam(":numDoc", $datos_actualizarCliente["numDoc"], PDO::PARAM_STR);
                $stul->bindParam(":numTel", $datos_actualizarCliente["numTel"], PDO::PARAM_STR);
                $stul->bindParam(":direccion", $datos_actualizarCliente["direccion"], PDO::PARAM_STR);
                $stul->bindParam(":idFK", $datos_actualizarCliente["id"], PDO::PARAM_INT);
                
                if ($stul->execute()) {
                    return "ok";                    
                }
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }

        static public function mdlActualizarProducto($datosActualizar){
            $stmt = conexion::conectar() -> prepare("CALL U_PRODUCTO(:ProdNombre, :ProdPrecioVenta, :ProdCantidadStock, :ProdTalla, :ProdCategoria, :ProdAlto, :ProdAncho, :ProdFondo, :ProdSintetico, :ProdForro, :ProdCodigoPK)");
            
            $stmt -> bindParam(":ProdCodigoPK", $datosActualizar["id"], PDO::PARAM_INT);
            $stmt -> bindParam(":ProdNombre", $datosActualizar["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":ProdPrecioVenta", $datosActualizar["precio"], PDO::PARAM_STR);
            $stmt -> bindParam(":ProdCantidadStock", $datosActualizar["cantidad"], PDO::PARAM_STR);
            $stmt -> bindParam(":ProdTalla", $datosActualizar["talla"], PDO::PARAM_STR);
            $stmt -> bindParam(":ProdCategoria", $datosActualizar["categoria"], PDO::PARAM_STR);
            $stmt -> bindParam(":ProdAlto", $datosActualizar["alto"], PDO::PARAM_STR);
            $stmt -> bindParam(":ProdAncho", $datosActualizar["ancho"], PDO::PARAM_STR);
            $stmt -> bindParam(":ProdFondo", $datosActualizar["fondo"], PDO::PARAM_STR);
            $stmt -> bindParam(":ProdSintetico", $datosActualizar["sintetico"], PDO::PARAM_STR);
            $stmt -> bindParam(":ProdForro", $datosActualizar["forro"], PDO::PARAM_STR);                        

            if ($stmt->execute()) {
                return "ok";
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }

        static public function mdlResponderTicket($datos){
            $stmt = conexion::conectar() -> prepare("CALL U_TICKET_RESPUESTA(:respuesta, :id)");
            $stmt -> bindParam(":respuesta", $datos["respuesta"], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
            if ($stmt -> execute()) {
                return "ok";
            } else {
                return "no";
            }
        }

        /*=========================================================
        =                       BORRAR DATOS                 =
        =========================================================== */

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
        static public function mdlBorrarRegistroCliente($id){            
            $stmt = conexion::conectar()->prepare("CALL D_CLIENTE(:id)");
            $stmt -> bindParam(":id", $id["id"], PDO::PARAM_INT);
            if ($stmt -> execute()) {
                $stcl = conexion::conectar()->prepare("CALL D_USUARIO(:idUsua)");
                $stcl -> bindParam(":idUsua", $id["idFK"], PDO::PARAM_INT);

                if ($stcl->execute()) {
                    return "ok";
                }
            }          
        }

        static public function mdlBorrarRegistroProducto($id){
            $stmt = conexion::conectar()->prepare("CALL D_PRODUCTO(:id)");
            $stmt -> bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            }
        }

        /*=========================================================
        =                          LOGIN                          =
        =========================================================== */
        static public function mdlIngreso ($usuario){
            $stmt = conexion::conectar()->prepare("CALL RU_USUARIO(:correo)");
            $stmt->bindParam(":correo", $usuario, PDO::PARAM_STR); /* string = letras || int = integer = 1,2,3 */
            $stmt->execute(); 
            if ($stmt == null) {
                print_r(conexion::conectar()->errorInfo());
                return "no";
            } else {
                return $stmt -> fetch();                
            }
        }
        
        static public function mdlDesactivarCliente($id){
            $stmt = conexion::conectar()->prepare("CALL DESACTIVAR_USUARIO(:id)");
            $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
            if ($stmt -> execute()) {
                return "desactivado";
            }
        }

        /*----------------------------------------------------------------------------------------------------------------------------------
        ---------------------------------------- CONSULTAS SIN PROCEDIMIENTOS ALMACENADOS -------------------------------------------------- 
        ------------------------------------------------------------------------------------------------------------------------------------*/

        static public function mdlConsultarUltimoCliente(){
            $stmt = conexion::conectar()->prepare("SELECT MAX(nombre) FROM usuario;");
            if ($stmt -> execute()) {
                return $stmt->fetch();
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }

        static public function mdlConsultarUltimaCompra(){
            $stmt = conexion::conectar()->prepare("SELECT MAX(v.VentCodigoPK), p.ProdNombre AS nombre, p.ProdPrecioVenta AS precio FROM venta v INNER JOIN detalle_venta de ON v.VentCodigoPK = de.VentCodigoFK INNER JOIN producto p ON de.ProdCodigoFK = p.ProdCodigoPK;");
            if ($stmt -> execute()) {
                return $stmt->fetch();
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }

        static public function mdlConsultarCompraCliente($id){
            $stmt = conexion::conectar()->prepare("SELECT MAX(v.VentCodigoPK), p.ProdNombre AS nombre, p.ProdPrecioVenta AS precio FROM cliente c INNER JOIN venta v ON v.ClieCodigoFK = c.ClieCodigoPK INNER JOIN detalle_venta de ON v.VentCodigoPK = de.VentCodigoFK INNER JOIN producto p ON de.ProdCodigoFK = p.ProdCodigoPK WHERE v.ClieCodigoFK = :id;");
            $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
            if ($stmt -> execute()) {
                return $stmt->fetch();
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        }
    }
    
?>