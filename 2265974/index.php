<?php 
	session_start();

	require_once "controlador/plantilla_controlador.php";
	require_once "controlador/crud_controlador.php";
	require_once "modelo/crud_modelo.php";	

	$plantilla = new controladorPlantilla();
	$plantilla -> ctrTraerPlantilla();
 ?>