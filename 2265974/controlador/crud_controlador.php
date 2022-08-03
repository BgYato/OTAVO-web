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

        static public function ctrSeleccionarRegistroClienteUsuario($datoCliente_u){
            $respuesta = modeloFormularios::mdlSeleccionarRegistroClienteUsuario($datoCliente_u);
            return $respuesta;
        }        

        /*=========================================================
        =                  ACTUALIZACIÓN DE DATOS                 =
        =========================================================== */

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

        static public function ctrActualizarClienteUsuario(){
            if (isset($_POST["actualizarClienteForm"])) {
                $id = $_POST["id"];                
                if ($_POST["u_pwdUsuario"]!="") {
                    $pwd = $_POST["u_pwdUsuario"];
                } else {
                    $pwd=$_POST["pwdAntigua"];
                }
                if ($_POST["u_tipoDoc"]!=$_POST["tipoDocAntiguo"]) {
                    $tipoDoc = $_POST["u_tipoDoc"];
                } else {
                    $tipoDoc = $_POST["tipoDocAntiguo"];
                }
                if ($_POST["u_tipoUsua"]!=$_POST["tipoUsuaAntiguo"]) {
                    $tipoUsua = $_POST["u_tipoUsua"];
                } else {
                    $tipoUsua = $_POST["tipoUsuaAntiguo"];
                }

                $datos_actualizarCliente = array("nombre"=>$_POST["u_nombreUsuario"], "correo"=>$_POST["u_correoUsuario"], "pwd"=>$pwd, "tipoUsua"=>$tipoUsua, 
                    "nombreCliente"=>$_POST["u_nombreCliente"], "apellidoCliente"=>$_POST["u_apellidoCliente"], "tipoDoc"=>$tipoDoc,
                    "numDoc"=>$_POST["u_numDoc"], "numTel"=>$_POST["u_numTel"], "direccion"=>$_POST["u_direccion"], "id"=>$id);
                    
                $respuesta = modeloFormularios::mdlActualizarClienteUsuario($datos_actualizarCliente);                
                return $respuesta;
            }
        }

        /*=========================================================
        =                    ELIMINACIÓN DE DATOS                 =
        =========================================================== */

        static public function ctrBorrarRegistro(){
             if (isset($_POST["id_usuario"])) {
                $dato = $_POST["id_usuario"];
                
                /* print_r($dato); */

                $respuesta= modeloFormularios::mdlBorrarRegistro($dato);
                return $respuesta;
            }
        }

        static public function ctrBorrarRegistroCliente(){
            if (isset($_POST["confirmarEliminar"])) {
                $id = array('id' => $_POST["idClie"], 'idFK' => $_POST["idUsua"]);                

                $respuesta = modeloFormularios::mdlBorrarRegistroCliente($id);
                return $respuesta;
            }
        }

        /*=========================================================
        =                          LOGIN                          =
        =========================================================== */

        public function ctrIngreso(){
            if(isset($_POST["usuario"])){
                if($_POST["usuario"]==""|| $_POST["pwd"] == ""){
                    echo'<div class="alert-danger">No digitaste ningún correo o contraseña valido, vuelve a intentarlo</div';
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
                        alert("Iniciaste sesión correctamente, serás redirigido a la página principal");
                        </script>';
                    } else {                                            
                       echo'<script>
                       if (window.history.replaceState){
                       window.history.replaceState(null, null, window.location.href);
                       }
                       </script>';
                       echo'<div class="m-4 alert alert-danger"><i class="fa-solid fa-circle-exclamation text-weigth-bold mr-2"></i> <strong>Iniciar sesión;</strong> error al ingresar al sistema, el correo o la contraseña son incorrectos</div>';
                    } 
                }
            }
        }

    }
?>