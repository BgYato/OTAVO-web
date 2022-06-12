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
    }
    
?>