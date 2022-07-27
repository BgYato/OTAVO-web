<?php
    class conexion
    {
        static public function conectar()
        {
            try 
            {
                $base = new PDO("mysql:host=localhost;dbname=otavo_db","root","");
                $base -> exec("set names utf8");
                return $base;                                              
            } catch(Exception $e){            
                die ("Error: ".$e->GetMessage());                
            }
            finally {
                $base = null;
            }
        }
    }
?>
