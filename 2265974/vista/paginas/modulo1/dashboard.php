<div class="d-flex "> <!-- VISTA BARRA LATERAL, NAVBAR Y MENU -->
    <div id="sidebar-container" class="bg-primary"> <!-- SIDE BAR -->
        <div class="logo">
            <h4 class="text-light h4-titulo font-weight-bold">OTAVO DASHBOARD</h4>
        </div>
        <div class="menu">
            <a href="#" onclick="desplegar('menu'); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-bars"></i> Menu 
            </a>            
            <a href="#" onclick="desplegar(1); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-user"></i> 
                    Usuarios 
                <i class="fa-solid fa-angle-down float-right" id="rotate1"></i>
            </a>
                <ul style="display: none;" id="mostrarUsu">
                    <li>
                        <a href="#" onclick="gestUsu(1); return false" class="d-block text-light p-2"> Crear usuario</a>
                    </li>
                    <li>
                        <a href="#" onclick="gestUsu(2); return false" class="d-block text-light p-2"> Consultar usuario</a>
                    </li>
                    <li>
                        <a href="#" onclick="gestUsu(3); return false" class="d-block text-light p-2"> Actualizar usuario</a>
                    </li>
                    <li>
                        <a href="#" onclick="gestUsu(4); return false" class="d-block text-light p-2"> Eliminar usuario</a>
                    </li>
                </ul>
            <a href="#" onclick="desplegar(2); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-basket-shopping"></i> 
                    Productos 
                <i class="fa-solid fa-angle-down float-right" id="rotate2"></i>
            </a>
            <a href="#" onclick="desplegar(3); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-user-tag"></i> 
                    Clientes 
                <i class="fa-solid fa-angle-down float-right" id="rotate3"></i>
            </a>
            <a href="#" onclick="desplegar(4); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-arrow-trend-up"></i> 
                    Ventas 
                <i class="fa-solid fa-angle-down float-right" id="rotate4"></i>
            </a>
            <a href="#" onclick="" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-gear"></i> Configuración
            </a>
        </div>
    </div>

    <div class="w-100"> <!-- NAV BAR Y MENU -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"> <!-- NAV BAR -->
            <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                                
            </button>

            <form class="form-inline position-relative my-2 d-inline-block">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn position-absolute btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">        
            <li class="nav-item dropdown">            
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="public/img/imagen_3.png" class="img-fluid rounded-circule mr-2 avatar">
                    Andres Yate
                </a>            
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Cuenta</a>
                <a class="dropdown-item" href="index.php?navegacion=inicio">Volver inicio</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Salir</a>
                </div>
            </li>        
            </ul>        
            </div>
            </div>
        </nav>

        <div id="content" style="display: block;"> <!-- MENU -->
            <section class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <h1 class="font-weight-bold bm-0">Bienvenido Andres</h1>
                            <p class="lead text-muted">Revisa la última información</p>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <button class="align-self-center btn btn-primary w-100">Descargar reporte</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-mix">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Ingresos mensuales</h6>
                                        <h3 class="font-weight-bold">NULL</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Ingresos mensuales</h6>
                                        <h3 class="font-weight-bold">NULL</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Ingresos mensuales</h6>
                                        <h3 class="font-weight-bold">NULL</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Ingresos mensuales</h6>
                                        <h3 class="font-weight-bold">NULL</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 my-3">
                            <div class="card rounded-0">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold mb-0">Número de usuarios de paga</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 my-3">
                            <div class="card grounded-0">
                                <div class="card-header bg-light">
                                    <h6 class="font-weight-bold mb-0">Ventas recientes</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex border-bottom py-2">
                                        <div>

                                        </div>
                                        <div>
                                            <h6 class="d-inline-block mb 0">$null</h6><span class="badge 
                                            badge-success ml-2"> 10% descuento</span>
                                            <small class="d-block text-muted">Bolso guardacasco</small>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100">Ver todo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!--==================================================================================
        ===================================MODULO USUARIOS ===================================
        ===================================================================================-->

        <div class="content" id="CUsu" style="display: none;"> <!-- CREAR USUARIO -->
            <div class="container">
                <div class="row ml-4">                    
                    <div class="col-lg-8 my-3">
                        <form method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre del usuario</label>
                            <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Ingresa el nombre de usuario">                            
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo del usuario</label>
                            <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" placeholder="Ingresa el correo de usuario">                            
                        </div>
                        <div class="form-group">
                            <label for="pwd">Contraseña</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Contraseña para el usuario">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Crear</button>
                        </form>

                        <?php 
                            $registro= Controladorformularios::ctrRegistro();              
                            if($registro == "ok"){
                            echo'<script>
                                if ( window.history.replaceState ){
                                    window.history.replaceStae( null, null, window.location.href);
                                }

                                </script>';
                                echo'<div class="alert alert-success">El usuario ha sido registrado</div>';
                                }
                        ?>
                    </div>     
                    <div class="col-lg-4 my-3">
                        <i class="fa-solid fa-user icon mt-4 ml-4"></i>
                    </div>               
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-danger font-weight-bold mb-0">AVISO IMPORTANTE</h6>
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $usuario=controladorFormularios::ctrSeleccionarRegistro(null);
            #print_r($usuario);
        ?>
        
        <div class="content" id="RUsu" style="display: none;"> <!-- CONSULTAR USUARIO -->
            <div class="container">
                <div class="row ml-4">                    
                    <div class="col-lg-10 my-3">
                    <table class="table">
                        <thead class="thead bg-primary text-white">
                            <tr>
                            <th scope="col" class="font-weight-bold">ID</th>
                            <th scope="col" class="font-weight-bold">NOMBRE</th>
                            <th scope="col" class="font-weight-bold">CORREO</th>
                            <th scope="col" class="font-weight-bold">CONTRASEÑA</th>
                            <th scope="col" class="font-weight-bold">ESTADO</th>
                            <th scope="col" class="font-weight-bold">HERRAMIENTAS</th>
                            </tr>
                        </thead>                        
                        <tbody> 
                            <?php foreach ($usuario as $key=>$value): ?>                           
                            <tr class="border-bottom">
                                <th><?php echo $value["id_usuario"] ?></th>
                                <th><?php echo $value["nombre"] ?></th>
                                <td><?php echo $value["correo"] ?></td>
                                <td><?php echo $value["password"] ?></td>
                                <td><?php echo $value["tipoUsua"] ?></td>
                                <td class="d-flex">
                                    <button class="btn btn-success w-100 ml-2">Seleccionar</button>
                                </td>
                            </tr>                                                      
                        </tbody>
                        <?php endforeach ?>
                    </table>                    
                    </div>     
                    <div class="col-lg-2 my-3">
                        <i class="fa-solid fa-magnifying-glass icon1 float-right"></i>
                    </div>               
                </div>                
            </div>
        </div>

        <div class="content" id="UUsu" style="display: none;"> <!-- ACTUALIZAR USUARIO -->
            <div class="container">
                <div class="row ml-4">                    
                    <div class="col-lg-8 my-3">
                        <table class="table">
                            <thead class="thead bg-primary text-white">
                                <tr>
                                <th scope="col" class="font-weight-bold">ID</th>
                                <th scope="col" class="font-weight-bold">NOMBRE</th>
                                <th scope="col" class="font-weight-bold">CORREO</th>
                                <th scope="col" class="font-weight-bold">CONTRASEÑA</th>
                                <th scope="col" class="font-weight-bold">ESTADO</th>
                                <th scope="col" class="font-weight-bold">HERRAMIENTAS</th>
                                </tr>
                            </thead>                        
                            <tbody> 
                                <?php foreach ($usuario as $key=>$value): ?>                           
                                <tr class="border-bottom">
                                    <th><?php echo $value["id_usuario"] ?></th>
                                    <td><?php echo $value["nombre"] ?></td>
                                    <td><?php echo $value["correo"] ?></td>
                                    <td><?php echo $value["password"] ?></td>
                                    <td><?php echo $value["tipoUsua"] ?></td>
                                    <td class="d-flex">
                                        <a href="index.php?navegacion=dashboard&id=<?php echo $value['id_usuario']; ?>" class="btn btn-danger w-100 ml-2 cta">Actualizar</a>
                                    </td>
                                </tr>                                                      
                            </tbody>
                            <?php endforeach ?>
                        </table>               
                    </div>     
                    <div class="col-lg-4 my-3">
                    <i class="fa-solid fa-pen icon ml-4"></i>
                    </div>                                                                      
                </div>               

                <?php 
                    $registro = Controladorformularios::ctrActualizarRegistro();              
                    if($registro == "ok"){                        
                        echo'<script>
                            if ( window.history.replaceState ){
                                window.history.replaceStae( null, null, window.location.href);
                            }
                        </script>';
                        echo'<div class="alert alert-success">El usuario ha sido actualizado con exito</div>';
                    }

                    if (isset($_GET["id"])){
                        $dato=$_GET["id"];
                        $usuario=controladorFormularios::ctrSeleccionarRegistro($dato);
                        #print_r($usuario);

                        echo '
                        <div class="row ml-4">
                                <div class="col-lg-9 m-y">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="font-weight-bold"> Usuario seleccionado '.$usuario["nombre"].'</h6>
                                        </div>
                                        <div class="card-body">
                                        <div>                
                                            <form method="POST" action="index.php?navegacion=dashboard">                                    
                                                <div class="form-group">
                                                    <label for="correo">Nombre del usuario</label>
                                                    <input type="text" class="form-control" id="correo" name="nuevo_nombre" aria-describedby="emailHelp" value="'.$usuario["nombre"].'">                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="correo">Correo del usuario</label>
                                                    <input type="email" class="form-control" id="correo" name="nuevo_correo" aria-describedby="emailHelp" value="'.$usuario["correo"].'">                            
                                                </div>
                                                <div class="form-group">
                                                    <label for="pwd">Contraseña</label>
                                                    <input type="password" class="form-control" id="pwd" name="nueva_password" placeholder="Contraseña nueva">
                                                </div>
                                                <input type="hidden" class="form-control" id="actual_nombre" value="'.$usuario["nombre"].'">
                                                <input type="hidden" class="form-control" id="actual_correo" value="'.$usuario["correo"].'">
                                                <input type="hidden" class="form-control" id="actual_password" value="'.$usuario["password"].'">
                                                <input type="hidden" class="form-control" name="id_usuario" value="'.$usuario["id_usuario"].'">
                                                <div class="card mt-4">
                                                    <div class="card-header">
                                                        <h6 class="text-danger font-weight-bold mb-0">AVISO IMPORTANTE</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>Lorem ipsum dolor sit amet.</p>
                                                    </div>
                                                </div>     

                                                <button type="submit" class="mt-4 btn btn-primary w-100">Actualizar</button>                                   
                                            </form>                                        
                                        </div>                                        
                                        </div> 
                                    </div>                
                                </div>
                            </div>                         
                        ';
                    }
                    ?>                                                    
            </div>
        </div>

        <div class="content" id="DUsu" style="display: none;"> <!-- ELIMINAR USUARIO -->
            <div class="container">
                <div class="row ml-4">                    
                    <div class=" my-3">
                    <table class="table">
                            <thead class="thead bg-primary text-white">
                                <tr>
                                <th scope="col" class="font-weight-bold">ID</th>
                                <th scope="col" class="font-weight-bold">NOMBRE</th>
                                <th scope="col" class="font-weight-bold">CORREO</th>
                                <th scope="col" class="font-weight-bold">CONTRASEÑA</th>
                                <th scope="col" class="font-weight-bold">ESTADO</th>
                                <th scope="col" class="font-weight-bold">HERRAMIENTAS</th>
                                </tr>
                            </thead>                        
                            <tbody> 
                                <?php foreach ($usuario as $key=>$value): ?>                           
                                <tr class="border-bottom">
                                    <th><?php echo $value["id_usuario"] ?></th>
                                    <td><?php echo $value["nombre"] ?></td>
                                    <td><?php echo $value["correo"] ?></td>
                                    <td><?php echo $value["password"] ?></td>
                                    <td><?php echo $value["tipoUsua"] ?></td>
                                    <td class="d-flex">
                                        <a href="index.php?navegacion=dashboard&id_u=<?php echo $value['id_usuario']; ?>" class="btn btn-danger w-100 ml-2 cta">Eliminar</a>
                                    </td>
                                </tr>                                                      
                            </tbody>
                            <?php endforeach ?>
                        </table>                        
                        <?php 
                    $registro = Controladorformularios::ctrBorrarRegistro();              
                    if($registro == "ok"){                        
                        echo'<script>
                            if ( window.history.replaceState ){
                                window.history.replaceStae( null, null, window.location.href);
                            }
                        </script>';
                        echo'<div class="alert alert-danger">El usuario ha sido borrado con exito</div>';
                    }                    
                    ?>
                    <?php
                    if (isset($_GET["id_u"])){
                        $dato=$_GET["id_u"];
                        $usuario=controladorFormularios::ctrSeleccionarRegistro($dato);
                        /* print_r($usuario); */       
                        
                        echo '
                        <div class="container">
                        <div class="card mt-4">
                        <div class="card-header">
                            <h6 class="text-danger font-weight-bold">¡ATENCIÓN!</h6>
                        </div>
                        <div class="card-body">
                             Estás a punto de borrar al usuario <strong>'.$usuario["nombre"].'</strong> (<strong>'.$usuario["id_usuario"].'</strong>) de forma permanente en la base de datos, si realmente quieres continuar, presiona el siguiente botón.   
                             <form method="POST">
                                 <input type="hidden" name="id_usuario" value="'.$usuario["id_usuario"].'">
                                 <button type="submit" class="btn btn-danger w-100">Sí, eliminar</button>
                             </form>
                        </div>
                        </div>                 
                        </div>       
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- ============================================================================= -->
    </div>
</div>


<script> /* TABLA DE CHART JS  */
  const labels = [
    'MAR 2022',
    'ABR 2022',
    'MAY 2022',
    'JUN 2022'    
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Nuevos usuarios',
      backgroundColor: ['#12C9E5', '#12C9E5', '#12C9E5', '#111B54'],
      maxBarThickness: 30,
      borderColor: 'rgb(255, 99, 132)',
      data: [9, 7, 5, 8],
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>