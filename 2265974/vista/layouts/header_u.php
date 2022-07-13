<body class="body_principal">

<!--=====================================
=           	BOTONERA		       =
======================================-->		

<div class="container-fluid botonera-color">
    <div class="container text-white">
            <div class="d-flex">
                <a href="index.php?navegacion=inicio" class="text-reset text-uppercase botonera-texto">
                    <img src="./public/img/logo1.png" id="logotipo">
                    <h3>Otavo</h3>
                </a>
            </div>
            <div class="d-flex justify-content-end">
            <ul class="nav nav-pills botonera-ul">
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
</div>

<div class="container-fluid">
    <div class="container py-5">