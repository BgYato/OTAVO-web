<?php
    class controladorFormularios
    {
        /*=========================================================
        =                       REGISTRO DE DATOS                 =
        =========================================================== */

        static public function ctrRegistro()
        {
            if (isset ($_POST["nombre"])) {
                $datos = array("nombre" => $_POST["nombre"], "correo" => $_POST["correo"], "pass" => $_POST["pwd"]);
                /* print_r($datos); */

                $respuesta = modeloFormularios::mdlRegistro($datos);
                return $respuesta;
            }
        }

        static public function ctrRegistroCliente()
        {
            if (isset ($_POST["registroCliente"])) {
                $datosCliente = array('nombreUsuario' => $_POST["nombreUsuario"],
                                       'correoUsuario' => $_POST["correoUsuario"],
                                       'pwdUsuario' => $_POST["pwdUsuario"],
                                       'nombreCliente' => $_POST["nombreCliente"],
                                       'apellidoCliente' => $_POST["apellidoCliente"],
                                       'tipoDoc' => $_POST["tipoDoc"],
                                       'numDoc' => $_POST["numDoc"],
                                       'numTel' => $_POST["numTel"],
                                       'direccionCliente' => $_POST["direccionCliente"],
                                    );
                /* print_r($datosClientes); */
                $registroCliente = modeloFormularios::mdlRegistroCliente($datosCliente);                
                return $registroCliente;
            }
        }

        static public function ctrRegistroProd()
        {
            if (isset ($_POST["name"])) {
                $producto = array("nombre" => $_POST["name"], "precio" => $_POST["precio"], "cantidad" => $_POST["cantidad"], 
                "unidad" => $_POST["unidad"], "descripcion" => $_POST["descripcion"]);
                /* print_r($producto); */

                $resultado = modeloFormularios::mdlRegistroProd($producto);
                return $resultado;
            }
        }

        /*CONSULTAR*/
        static public function ctrSeleccionarRegistro($dato){
            $respuesta=modeloFormularios::mdlSeleccionarRegistro($dato);
            return $respuesta;                                
        }

        static public function ctrSeleccionarRegistroCliente($datoCliente_r){
            $respuesta = modeloFormularios::mdlSeleccionarRegistroCliente($datoCliente_r);
            return $respuesta;
        }

        static public function ctrSeleccionarID($condicion){
            $consulta = modeloFormularios::mdlSeleccionarID($condicion);            
            return $consulta;
        }

        static public function ctrActualizarRegistro(){
            if (isset($_POST["nuevo_nombre"]))  {
                $id_usuario = $_POST["u_id_usuario"];

                if($_POST["nueva_password"]!=""){
                    $password=$_POST["nueva_password"];
                } else{
                    $password=$_POST["actual_password"];
                }                              

               $datos_actualizar = array("nombre_u"=>$_POST["nuevo_nombre"], "correo_u"=>$_POST["nuevo_correo"],"pass_u"=> $password , "id_u"=>$id_usuario);
               /* print_r($datos); */
         
               $respuesta= modeloFormularios::mdlActualizarRegistro($datos_actualizar);
               return $respuesta;
               
            }
         }

        static public function ctrBorrarRegistro(){
             if (isset($_POST["id_usuario"])) {
                $dato = $_POST["id_usuario"];
                
                /* print_r($dato); */

                $respuesta= modeloFormularios::mdlBorrarRegistro($dato);
                return $respuesta;
             }
        }

        static public function ctrBorrarRegistroCliente(){
            if (isset($_POST["selEliminarCliente"])) {
                $seleccion = $_POST["selEliminarCliente"];                
                if ($seleccion=="Cl") {
                    $datoID = array('idCliente' => $_POST["idClie"], 'seleccion' => "Cl");
                    $respuesta = modeloFormularios::mdlBorrarRegistroCliente($datoID);
                    return $respuesta;
                } elseif ($seleccion=="ClUs") {                    
                    $datoID = array('idCliente' => $_POST["idClie"], 'idUsuario' => $_POST["idUsua"], 'seleccion' => "ClUs");
                    $respuesta = modeloFormularios::mdlBorrarRegistroCliente($datoID);
                    return $respuesta;
                }                                                
            }
        }
        public function ctrIngreso(){
            if(isset($_POST["usuario"])){
                if($_POST["usuario"]==""|| $_POST["pwd"] == ""){
                    echo'<div class="alert-danger">No se registro correo o contraseña</div';
                }
                else{
                    $usuario=$_POST["usuario"];
                    $respuesta = modeloFormularios::mdlIngreso($usuario);
                    if($respuesta["correo"]==$_POST["usuario"] && $respuesta["password"]==$_POST["pwd"]) /* || */
                    {
                        echo'<script>
                        if (window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location="index.php?navegacion=inicio"
                        </script>';
                    } else {
                       echo'<script>
                       if (window.history.replaceState){
                       window.history.replaceState(null, null, window.location.href);
                       }
                       </script>';
                       echo'<div class="alert alert-danger">Error al ingresar al sistema, el mail o la contraseña son incorrectos</div>';
                    }                    
                }
            }
        }

    }
?>