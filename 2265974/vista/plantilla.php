<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>OTAVO </title>

	<!--=====================================
	=           Plugins de CSS         =
	======================================-->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="vista/paginas/css/estilos_adm.css">
	<link rel="stylesheet" href="vista/paginas/css/estilos.css">	

	<!--=====================================
	=           Plugins de JS         =
	======================================-->

	<script src="vista/paginas/js/app.js"></script>
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	<!-- CHART JS -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>

	<!--=====================================
	=           latest Fontawesome       =
	======================================-->
	<script src="https://kit.fontawesome.com/8e45885b17.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<!--=====================================
	=   			ICON					 =
	======================================= -->

	<link rel="shortcut icon" href="./public/img/icon_logo.ico" type="image/x-icon">		
	
</head>
	<!--=====================================
	=           	contenido	       =
	======================================-->	
			<?php 
				if (isset($_GET["navegacion"])){
					if ($_GET["navegacion"] == "registro" ||
						$_GET["navegacion"] == "ingreso" ||
						$_GET["navegacion"] == "inicio" ||												
						$_GET["navegacion"] == "exito" ||																		
						$_GET["navegacion"] == "acercaDe" ||						
						$_GET["navegacion"] == "salir") 
					{
						include "layouts/header_u.php";
						include "paginas/".$_GET["navegacion"].".php";
						include "layouts/footer_u.php";
					} 
						elseif ($_GET["navegacion"] == "cuenta") 
						{ /* MODULO 1 */
							include "layouts/header_u.php";
							include "paginas/modulo1/".$_GET["navegacion"].".php";							
							include "layouts/footer_u.php";
						}
						elseif ($_GET["navegacion"] == "catalogo") 
						{ /* MODULO 3 */
							include "layouts/header_u.php";
							include "paginas/modulo3/".$_GET["navegacion"].".php";
							include "layouts/footer_u.php";
						} 
						elseif ($_GET["navegacion"] == "comprar") 
						{ /* MODULO 4 */
							include "layouts/header_u.php";
							include "paginas/modulo4/".$_GET["navegacion"].".php";							
							include "layouts/footer_u.php";
						}
						elseif ($_GET["navegacion"] == "dashboard") {
							include "layouts/header_a.php";
							include "paginas/modulo1/".$_GET["navegacion"].".php";
							include "layouts/footer_a.php";
						}
					else {
						include "paginas/error404.php";
					}
				}
				else{
					include "layouts/header_u.php";
					include "paginas/inicio.php";	
					include "layouts/footer_u.php";				
				}				
			?>				
</body>
</html>