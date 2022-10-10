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
            if (isset ($_POST["crearProductoForm"])) {
                
                if ($_POST["nombreProd"]=="BG") {
                    $nombre = "Bolso guarda casco";
                } elseif ($_POST["nombreProd"]=="BM") {
                    $nombre = "Bolso maleto";
                }

                if ($_FILES["imagenProd"] == null) {
                    $imagen = '<img src="public/img/404img.jpg">';
                } else {                    
                    $nombreImagen = $_FILES["imagenProd"]["name"];
                    $tipoImagen = $_FILES["imagenProd"]["type"];                    
                    $temp = $_FILES["imagenProd"]["tmp_name"];
                }
                
                $nombreProd = $nombre." ".$_POST["modeloProd"];

                $producto = array("nombre" => $nombreProd, "precio" => $_POST["precioProd"], "cantidad" => $_POST["cantidadProd"],  "talla" => $_POST["tallaProd"],
                                 "categoria" => $_POST["categoriaProd"], "ancho" => $_POST["anchoProd"], "alto" => $_POST["altoProd"], "fondo" => $_POST["fondoProd"],
                                "sintetico" => $_POST["sintetico"], "forro" => $_POST["forro"], "nombreImagen" => $nombreImagen, "tipoImagen" => $tipoImagen, "temp" => $temp);
                /* print_r($producto); */

                $resultado = modeloFormularios::mdlRegistroProd($producto);
                return $resultado;
            }
        }

        static public function ctrValidarCompra(){
            if (isset($_POST["validarCompra"])) {    
                $total = $_POST["precioVenta"] * $_POST["cantidadCompra"];                
                $existencias = $_POST["cantidadStock"] - $_POST["cantidadCompra"];
                $idAdmi = 1;                
                $datos = array("idProd" => $_POST["idProd"], "idClie" => $_SESSION["usuario"]["ClieCodigoPK"], "cantidad" => $_POST["cantidadCompra"],
                                "total" => $total, "admi" => $idAdmi, "cantidadStock" => $existencias);
                $respuesta = modeloFormularios::mdlValidarCompra($datos);
                return $respuesta;
            }
        }

        static public function ctrRegistrarContacto(){
            if (isset($_POST["crearContacto"])) {
                $datos = array("nombre"=>$_POST["nombre"], "correo"=>$_POST["correo"], "mensaje"=>$_POST["mensaje"]);
                
                $respuesta = modeloFormularios::mdlRegistrarContacto($datos);
                return $respuesta;
            }
        }

        static public function ctrCrearTicket(){
            if (isset($_POST["crearTicket"])) {
                if ($_POST["situacion"]=="cuenta") {
                    $situacion = "Problema con la cuenta";
                } elseif ($_POST["situacion"]=="compra") {
                    $situacion = "Problema con una compra";
                } elseif ($_POST["situacion"]=="bug") {
                    $situacion = "Bug con la página";
                } elseif ($_POST["situacion"]=="otro") {
                    $situacion = "Otro tipo de problema";
                }

                $datos = array("id"=>$_POST["idUsua"], "nombre"=>$_POST["nombre"], "correo"=>$_POST["correo"], "situacion"=>$situacion, "mensaje"=>$_POST["mensaje"]);
                
                $respuesta = modeloFormularios::mdlCrearTicket($datos);
                return $respuesta;
            }
        }

        /*=========================================================
        =                       CONSULTA DE DATOS                 =
        =========================================================== */

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

        static public function ctrSeleccionarRegistroProducto($datoProducto){
            $respuesta = modeloFormularios::mdlSeleccionarRegistroProducto($datoProducto);
            return $respuesta;
        }

        static public function ctrSeleccionarComprasCliente(){            
            $idClie = $_SESSION["usuario"]["ClieCodigoPK"];
            $respuesta = modeloFormularios::mdlSeleccionarComprasCliente($idClie);
            return $respuesta;
        }

        static public function ctrSeleccionarContacto(){
            $respuesta = modeloFormularios::mdlSeleccionarContacto();
            return $respuesta;
        }
        static public function ctrSeleccionarTicket($id){
            $respuesta = modeloFormularios::mdlSeleccionarTicket($id);
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
            if (isset($_POST["actualizarClientePropio"])) {
                $id = $_POST["id"];                
                if ($_POST["u_pwdUsuario"]!="") {
                    $pwd = $_POST["u_pwdUsuario"];
                } else {
                    $pwd=$_POST["pwdAntigua"];
                }                                
                if ($_POST["validarPwd"]==$_SESSION["usuario"]["Contraseña"]) {
                    $datos_actualizarCliente = array("nombre"=>$_POST["u_nombreUsuario"], "correo"=>$_POST["u_correoUsuario"], "pwd"=>$pwd, "tipoUsua"=>$_SESSION["usuario"]["tipoUsua"], 
                    "nombreCliente"=>$_POST["u_nombreCliente"], "apellidoCliente"=>$_POST["u_apellidoCliente"], "tipoDoc"=>$_SESSION["usuario"]["TipoDoc"],
                    "numDoc"=>$_POST["numDoc"], "numTel"=>$_POST["u_numTel"], "direccion"=>$_POST["u_direccion"], "id"=>$id);

                    $respuesta = modeloFormularios::mdlActualizarClienteUsuario($datos_actualizarCliente);                
                    return $respuesta;
                } else {
                    return "incorrecto";
                }                
            }
        }

        static public function ctrActualizarProducto(){
            if (isset($_POST["actualizarProducto"])) {
                $datosActualizar = array("nombre"=>$_POST["u_nombreProd"], "precio"=>$_POST["u_precioProd"],
                    "cantidad"=>$_POST["u_cantidadProd"], "unidad"=>$_POST["u_unidadProd"],
                    "medida"=>$_POST["u_medidaProd"], "descripcion"=>$_POST["u_descProd"], "id"=>$_POST["id"]);

                /* print_r($datosActualizar); */

                $respuesta = modeloFormularios::mdlActualizarProducto($datosActualizar);
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

        static public function ctrBorrarRegistroProducto(){
            if (isset($_POST["confirmarEliminarProducto"])) {                
                $id = $_POST["idProd"];
                $respuesta = modeloFormularios::mdlBorrarRegistroProducto($id);
                return $respuesta;
            }
        }

        /*=========================================================
        =                          LOGIN                          =
        =========================================================== */

        public function ctrIngreso(){
            if(isset($_POST["usuario"])){
                if($_POST["usuario"]=="" || $_POST["pwd"] == ""){
                    echo'<div class="m-4 alert alert-danger"><i class="fa-solid fa-circle-exclamation text-weigth-bold mr-2"></i> <strong>Iniciar sesión;</strong> error al ingresar al sistema, los campos están vacios.</div>';
                }
                else{
                    $usuario = $_POST["usuario"];
                    $respuesta = modeloFormularios::mdlIngreso($usuario);
                    $cliente = modeloFormularios::mdlSeleccionarRegistroClienteUsuario($respuesta["id_usuario"]);
                     if($respuesta && $respuesta["correo"]==$_POST["usuario"] && $respuesta["password"]==$_POST["pwd"]) /* || */
                    {
                        $_SESSION["sesion"] = $respuesta["tipoUsua"];
                        $_SESSION["usuario"] = $cliente; /* Se envia todo los datos del usuario que tenga dicha sesión */
                        
                        if ($_SESSION["sesion"]==1) {
                            echo'<script>
                            if (window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location="index.php?navegacion=dashboard"
                            </script>';    
                        } elseif ($_SESSION["sesion"]==0) {
                            echo'<script>
                            if (window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location="index.php?navegacion=cuenta"                            
                            </script>';                            
                        } elseif ($_SESSION["sesion"]==3) {
                            session_destroy();
                            echo '<script>
                            window.location="index.php?navegacion=cuenta";                            
                            alert("Tu cuenta se encuentra actualmente desactivada, por favor, comunicate con el soporte en caso de que quieras re-activarla.");
                            </script>';
                        }                      
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
        
        static public function ctrDesactivarCliente($id){
            $respuesta = modeloFormularios::mdlDesactivarCliente($id);
            return $respuesta;
        }

    }
?>