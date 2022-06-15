<?php
    class controladorFormularios
    {
        /*=========================================================
        =                       REGISTRO DE DATOS                 =
        =========================================================== */

        static public function ctrRegistro()
        {
            if (isset ($_POST["nombre"])) {
                $datos = array("nombre" => $_POST["nombre"], "correo" => $_POST["email"], "pass" => $_POST["pwd"]);
                //print_r($datos);

                $respuesta = modeloFormularios::mdlRegistro($datos);
                return $respuesta;
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

        static public function ctrActualizarRegistro(){
            if (isset($_POST["nuevo_nombre"]))  {
                $id_usuario = $_POST["id_usuario"];

                if($_POST["nueva_password"]!=""){
                    $password=$_POST["nueva_password"];
                } else{
                    $password=$_POST["actual_password"];
                }
                if($_POST["nuevo_nombre"]!=""){
                    $nombre=$_POST["nuevo_nombre"];
                } else{
                    $nombre=$_POST["actual_nombre"];
                }
                if($_POST["nuevo_correo"]!=""){
                    $correo=$_POST["nuevo_correo"];
                } else{
                    $correo=$_POST["actual_correo"];
                }                                

               $datos=array("nombre"=>$nombre, "correo"=>$correo,"pass"=> $password , "id"=>$id_usuario);
               /* print_r($datos); */
         
               $respuesta= modeloFormularios::mdlActualizarRegistro($datos);
               return $respuesta;
               
            }
         }

         static public function ctrBorrarRegistro(){
             if (isset($_POST["id_usuario"])) {
                $id = $_POST["id_usuario"];

                $dato = array("id" => $id);
                /* print_r($dato); */

                $respuesta= modeloFormularios::mdlBorrarRegistro($dato);
                return $respuesta;
             }
         }
    }
    
?>