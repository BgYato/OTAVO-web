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

	<!--=====================================
	=           latest Fontawesome       =
	======================================-->
	<script src="https://kit.fontawesome.com/8e45885b17.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<!--=====================================
	=   			ICON					 =
	======================================= -->

	<link rel="shortcut icon" href="./public/img/icon_logo.ico" type="image/x-icon">	

	<!--<?php if (isset($_GET["navegacion"])): ?>	

	<?php if ($_GET["navegacion"]=="registro"): ?>	
		<link rel="shortcut icon" href="./public/img/icon_web.ico" type="image/x-icon">

	<?php elseif ($_GET["navegacion"]=="inicio"): ?>	
		<link rel="shortcut icon" href="./public/img/icon_js.ico" type="image/x-icon">	

	<?php elseif ($_GET["navegacion"]=="ingreso"): ?>	
		<link rel="shortcut icon" href="./public/img/icon_html.ico" type="image/x-icon">
	<?php endif?>
	<?php else: ?>
		<link rel="shortcut icon" href="./public/img/icon_smile.ico" type="image/x-icon">	
	<?php endif?>-->
	
</head>
<body class="body_principal">

	<!--=====================================
	=           	BOTONERA		       =
	======================================-->		

	<div class="container-fluid botonera-color">
		<div class="container text-white">
				<a href="index.php?navegacion=inicio" class="text-reset text-uppercase botonera-texto">
					<img src="./public/img/logo1.png" id="logotipo">
					<h3>Otavo</h3>
				</a>
				<ul class="nav d-flex nav-pills botonera-ul justify-content-end">
					<?php if(isset($_GET["navegacion"])): ?>					

					<!--Botón de inicio cuando se ingresa con variable $_GET-->
					<?php if ($_GET["navegacion"]=="inicio"): ?>					
						<li class="nav-item">
							<a class="nav-link active bg-dark" href="index.php?navegacion=inicio">Inicio</a>		
						</li>					 
					<?php else: ?>
						<li class="nav-item">
							<a class="nav-link " href="index.php?navegacion=inicio">Inicio</a>		
						</li>	
					<?php endif?>							
					

					<!--Botón de salir cuando se ingresa con variable $_GET-->
					<?php if ($_GET["navegacion"]=="catalogo"): ?>					
						<li class="nav-item">
							<a class="nav-link active bg-dark" href="index.php?navegacion=catalogo">Catalogo</a>		
						</li>					 
					<?php else: ?>
						<li class="nav-item">
							<a class="nav-link " href="index.php?navegacion=catalogo">Catalogo</a>		
						</li>	
					<?php endif?>																

					<!--Botón de salir cuando se ingresa con variable $_GET-->
					<?php if ($_GET["navegacion"]=="cuenta"): ?>					
						<li class="nav-item">
							<a class="nav-link active bg-dark" href="index.php?navegacion=cuenta">Cuenta</a>		
						</li>					 
					<?php else: ?>
						<li class="nav-item">
							<a class="nav-link " href="index.php?navegacion=cuenta">Cuenta</a>		
						</li>	
					<?php endif?>

					<!--Botón de salir cuando se clickea "Contact" con variable $_GET-->									
						<li class="nav-item">
							<a class="nav-link" href="index.php?navegacion=acercaDe">Acerca de</a>		
						</li>					 										

					<!--Botón de salir cuando se administra con variable $_GET-->
					<?php if ($_GET["navegacion"]=="dashboard"): ?>					
						<li class="nav-item">
							<a class="nav-link active bg-dark" href="index.php?navegacion=dashboard">Administrador</a>		
						</li>					 
					<?php else: ?>
						<li class="nav-item">
							<a class="nav-link " href="index.php?navegacion=dashboard">Administrador</a>		
						</li>	
					<?php endif?>

					<?php else:?>					
					<li class="nav-item">
						<a class="nav-link active bg-dark" href="index.php?navegacion=inicio">Inicio</a>					
					</li>					
					<li class="nav-item">
						<a class="nav-link " href="index.php?navegacion=catalogo">Catalogo</a>					
					</li>
					<li class="nav-item">
						<a class="nav-link " href="index.php?navegacion=cuenta">Cuenta</a>					
					</li>
					<li class="nav-item">
						<a class="nav-link " href="index.php?navegacion=acercaDe">Acerca de</a>					
					</li>
					<li class="nav-item">
						<a class="nav-link " href="index.php?navegacion=dashboard">Administrador</a>					
					</li>
				<?php endif?>

			</ul>
		</div>
	</div>
	
	

	<!--=====================================
	=           	contenido	       =
	======================================-->
	
	<div class="container-fluid">
		<div class="container py-5">

			<?php 
				if (isset($_GET["navegacion"])){
					if ($_GET["navegacion"] == "registro" ||
						$_GET["navegacion"] == "ingreso" ||
						$_GET["navegacion"] == "inicio" ||												
						$_GET["navegacion"] == "exito" ||																		
						$_GET["navegacion"] == "acercaDe" ||						
						$_GET["navegacion"] == "salir") 
					{
						include "paginas/".$_GET["navegacion"].".php";
					} 
						elseif ($_GET["navegacion"] == "cuenta" ||
								$_GET["navegacion"] == "dashboard") 
						{ /* MODULO 1 */
							include "paginas/modulo1/".$_GET["navegacion"].".php";							
						}
						elseif ($_GET["navegacion"] == "catalogo") 
						{ /* MODULO 3 */
							include "paginas/modulo3/".$_GET["navegacion"].".php";
						} 
						elseif ($_GET["navegacion"] == "comprar") 
						{ /* MODULO 4 */
							include "paginas/modulo4/".$_GET["navegacion"].".php";							
						}
					else {
						include "paginas/error404.php";
					}
				}
				else{
					include "paginas/inicio.php";					
				}				
			?>			
		</div>
	</div>

	<footer>
		<div class="bg-dark text-white py-4 px-3" id="footer">
			<nav class="row">
				<!-- logo -->
				<a href="index.php?navegacion=inicio" class="col-4 text-reset text-uppercase d-flex align-items-center">
					<img src="./public/img/logo1.png" alt="Logo Otavo" class="mr-2 footer-logo" >
					OTAVO
				</a>
				<!-- menu -->
				<ul class="col-2 list-unstyled">
					<li class="font-weight-bold text-uppercase">Recursos</li>
					<li><a href="" class="text-reset">Link 1</a></li>
					<li><a href="" class="text-reset">Link 2</a></li>
					<li><a href="" class="text-reset">Link 3</a></li>
				</ul>
				<!-- menu -->
				<ul class="col-2 list-unstyled">
					<li class="font-weight-bold text-uppercase">Links</li>
					<li><a href="" class="text-reset">Link 1</a></li>
					<li><a href="" class="text-reset">Link 2</a></li>
					<li><a href="" class="text-reset">Link 3</a></li>
				</ul>
			
				<!-- contactos -->				
				<ul class="col-2 list-unstyled">
					<li class="font-weight-bold text-uppercase">Contactos</li>
					<li class="d-flex justify-content-between">
						<!-- Facebook -->
						<a href="www.facebook.com" class="text-reset">
							<i class="fa-brands fa-facebook"></i>
						</a>
						<!-- Instagram -->
						<a href="www.instagram.com" class="text-reset">
							<i class="fa-brands fa-instagram"></i>
						</a>
						<!-- Whatsapp -->
						<a href="www.whatsapp.com" class="text-reset">
							<i class="fa-brands fa-whatsapp"></i>
						</a>
						<!-- Youtube -->
						<a href="www.youtube.com" target="_blank" class="text-reset">
							<i class="fa-brands fa-youtube"></i>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</footer>
</body>
</html>