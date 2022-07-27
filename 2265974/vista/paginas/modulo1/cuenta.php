<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script languague="javascript">
        /* Mostrar "INGRESO" */
        function mostrarIngreso() {
            div = document.getElementById('flotante-ingreso');
            div2 = document.getElementById('flotante-registro');
            div3 = document.getElementById('contenido-activo');

            if (div.style.display=="") {
                alert("Ya tienes el formulario de ingreso activo, por favor, complete los campos.")
            } else {
                div.style.display = '';
                div2.style.display = 'none';
                div3.style.display = 'none';
            }
        }

        function cerrarIngreso() {
            div = document.getElementById('flotante-ingreso');
            div.style.display = 'none';            
        }

        /* Mostrar "REGISTRO" */

        function mostrarRegistro() {
            div = document.getElementById('flotante-registro');
            div2 = document.getElementById('flotante-ingreso');
            div3 = document.getElementById('contenido-activo');

            if (div.style.display=="") {
                alert("Ya tienes el formulario de registro activo, por favor, complete los campos.")
            } else {
                div.style.display = '';
                div2.style.display = 'none';
                div3.style.display = 'none';
            }
        }

        function cerrarRegistro() {
            div = document.getElementById('flotante-registro');
            div.style.display = 'none';
        }
    </script>
</head>
<body class="body-vista">
    <!-- Header -->    
        <header class="header">
			<div class="container">
				<!-- NavBar -->
				<nav class="row text-white justify-content-between align-items-center text-uppercase pt-5">
					<!-- logo -->
					<a href="#" class="col-auto text-reset">						
                    <i class="fa-solid fa-user"></i>
						CUENTA
					</a>
					<!-- anclas -->
					<div class="col-auto">
						<a href="javascript:mostrarRegistro();" class="text-reset pr-3">Registrar</a>
						<a href="javascript:mostrarIngreso();" class="text-reset pr-3">Ingresar</a>												
					</div>
				</nav>	                                                      
			</div>
		</header>

    <!-- Contenido activo -->    
    <div class="container-fluid" id="contenido-activo">
        <div class="row">
            <div class="col text-center text-uppercase py-4 ">
                <h3>Tu cuenta</h3>
                <p class="py-2">
                    No has iniciado sesión en nuestra página, hazlo ahora seleccionando el boton "Ingresar" o
                    crea tu cuenta con el botón "Registrar"
                </p>                                                   
            </div>
        </div>
        <div class="d-flex justify-content-center">
        
            <ul class="nav nav-pills text-dark cuenta__botonera_1">
                    <li class="nav-item icon_1">                        
                        <a href="javascript:mostrarIngreso();" class="nav-link text-reset" id="ingreso">
                        <i class="fa-solid fa-arrow-right-to-bracket icono"></i>                        
                            Ingresar                            
                        </a>
                    </li>

                    <li class="nav-item icon_2">
                        <a href="javascript:mostrarRegistro();" class="nav-link text-reset" id="registro">
                        <i class="fa-solid fa-user-plus icono"></i>                        
                            Registrar
                        </a>
                    </li>
                </ul>       
        </div>
        <?php
            $registro = controladorFormularios::ctrRegistro();

            if ($registro == "ok") {
                echo ' <script>
                        if (window.history.replaceState) {
                            window.history.replaceState ( null, null, window.location.href );
                        }
                        </script>';
                echo '<div class="alert alert-success"> El usuario ha sido registrado </div>';
            }
        ?>

    </div>

    <!-- Contenido oculto ((INGRESO)) -->
        <div class="row" id="flotante-ingreso" style="display:none;">        
            <div class="col-sm-3">
                <i class="fa-solid fa-arrow-right-to-bracket icono1 mt-4 mr-5"></i>
            </div>
        <div class="col-sm-7 py-4">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp" name="usuario" required>
                        <div id="emailHelp" class="form-text">¿Has olvidado tu correo? Intentaremos ayudarte <a href="_blank">acá</a>.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Recordarme en este equipo.</label>
                    </div>
                    <?php
                        $ingresar = new controladorFormularios;
                        $ingresar -> ctrIngreso();
                    ?>
                    <button type="submit" class="btn btn-primary">Enviar</button>                    
                </form>
        </div>
    </div>
        </div>
        </div>

    <!-- Contenido oculto ((REGISTRO)) -->
    <div class="row "id="flotante-registro" style="display: none;">
        <div class="col-sm-3">
        <i class="fa-solid fa-user icono2"></i>
        </div>
        <div class="col-sm-7">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nombre">Tu nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="John no sé" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="correo">Correo eléctronico</label>
                    <input type="email" class="form-control" id="correo" placeholder="andres@example.com" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd">Pon tu contraseña</label>
                    <input type="password" class="form-control" id="pwd" placeholder="*********" name="pwd">                    
                </div>                                
                <button type="submit" class="btn bg-dark boton col-sm-12">Enviar</button>
            </form>
        </div>
    </div>

    <!-- RELLENO -->

    <div class="cuenta__relleno"></div>
    <div class="cuenta__relleno"></div>    
</body>
</html>