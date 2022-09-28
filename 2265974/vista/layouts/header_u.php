<body class="body_principal">

<!--=====================================
=           	BOTONERA		       =
======================================-->		

<div class="container-fluid botonera-color mb-5">
    <div class="container text-white">
            <div class="d-flex w-100">
                <a href="index.php?navegacion=inicio" class="text-reset text-uppercase botonera-texto mt-2" >
                    <img src="./public/img/logo1.png" id="logotipo">
                    <h3>Otavo</h3>
                </a>               
            </div>            
            <div class="d-flex justify-content-end">
            <ul class="nav nav-pills botonera-ul botonera-media">
                <a href="#" style="display: block;" id="iconoAbrirLista" onclick="mediaBotonera('abrir'); return false"><i class="fa-solid fa-bars nav-item lead"></i></a>
            </ul>
            <ul class="nav nav-pills botonera-ul botonera-media">
                <a href="" style="display: none;" id="iconoCerrarLista" onclick="mediaBotonera('cerrar'); return false"><h5>X</h5></a>
            </ul>            
            <ul class="nav nav-pills botonera-ul botonera-superior">
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


                <?php if (isset($_SESSION["sesion"])): ?>
                    <?php if ($_SESSION["sesion"]==0): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?navegacion=salir">Salir</a>		
                        </li>
                    <?php elseif ($_SESSION["sesion"]==1): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?navegacion=dashboard">Administrador</a>		
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?navegacion=salir">Salir</a>		
                    </li>                                    				                 
                    <?php endif ?>
                <?php endif ?>    

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
            <?php endif?>

        </ul>
            </div>
            <div class="lista-media" id="lista-media" style="display: none;">
                <div class="d-flex justify-content-center">
                    <ul class="w-100 text-center lista-media-ul">
                        <li class="py-3"><a href="index.php?navegacion=inicio">Inicio</a> </li> <div class="dropdown-divider"></div>
                        <li class="py-3"><a href="index.php?navegacion=catalogo">Catalogo</a> </li> <div class="dropdown-divider"></div>
                        <li class="py-3"><a href="index.php?navegacion=cuenta">Cuenta</a> </li> <div class="dropdown-divider"></div>
                        <li class="py-3"><a href="index.php?navegacion=acercaDe">Acerca de</a></li> <div class="dropdown-divider"></div>
                        <?php if(isset($_SESSION["sesion"])): ?>
                            <?php if($_SESSION["sesion"]==1): ?>
                            <li class="py-3"><a href="index.php?navegacion=dashboard">Administrador</a></li> <div class="dropdown-divider"></div>
                            <?php endif; ?>
                            <?php if($_SESSION["sesion"]): ?>
                                <li class="py-3"><a href="index.php?navegacion=salir">Salir</a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container py-5">