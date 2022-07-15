<div class="d-flex "> <!-- VISTA BARRA LATERAL, NAVBAR Y MENU -->
    <div id="sidebar-container" class="bg-primary"> <!-- SIDE BAR -->
        <div class="logo row">
            <h4 class="text-light h4-titulo font-weight-bold col-sm-8">OTAVO DASHBOARD</h4>
        </div>
        <div class="menu">
            <a href="index.php?navegacion=dashboard" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-bars"></i> Menu 
            </a>            
            <a href="#" onclick="desplegar(1); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-user"></i> 
                    Usuarios 
                <i class="fa-solid fa-angle-down float-right" id="rotate1"></i>
            </a>
                <ul style="display: none;" id="mostrarUsu">
                    <li>
                        <a href="#" onclick="gestClie(1); return false" class="d-block text-light p-2"> Crear usuario</a>
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
            <ul style="display: none;" id="mostrarClie">
                    <li>
                        <a href="#" onclick="gestClie(1); return false" class="d-block text-light p-2"> Crear cliente</a>
                    </li>
                    <li>
                        <a href="#" onclick="gestClie(2); return false" class="d-block text-light p-2"> Consultar cliente</a>
                    </li>                    
                </ul>
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

        <div id="content" class="content" style="display: block;"> <!-- MENU -->
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
                                        <h6 class="text-muted">Último ID registrado</h6>
                                        <h3 class="font-weight-bold">
                                            No. 
                                            <?php 
                                                $condicion = "usuario";
                                                $consultar =  controladorFormularios::ctrSeleccionarID($condicion);
                                                print_r ($consultar[0]);
                                            ?>
                                        </h3>
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
            <?php include "vista/paginas/modulo1/layout/uusu.php"; ?>
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
                                <?php foreach ($usuario as $key=>$mostrar): ?>                           
                                <tr class="border-bottom">
                                    <th><?php echo $mostrar["id_usuario"] ?></th>
                                    <td><?php echo $mostrar["nombre"] ?></td>
                                    <td><?php echo $mostrar["correo"] ?></td>
                                    <td><?php echo $mostrar["password"] ?></td>
                                    <td><?php echo $mostrar["tipoUsua"] ?></td>
                                    <td class="d-flex">                                       
                                        <a href="index.php?navegacion=dashboard&id_u=<?php echo $mostrar['id_usuario']; ?>" class="btn btn-danger w-100 ml-2 cta">Eliminar</a>                                        
                                    </td>
                                </tr>                                                      
                            </tbody>
                            <?php endforeach ?>
                        </table>                        
                        <?php 
                            $registro = Controladorformularios::ctrBorrarRegistro();              
                            if($registro == "ok"){                        
                                echo'<script>
                                    window.location="index.php?navegacion=dashboard";

                                    if ('.$registro.' == "ok"){
                                        window.history.replaceState(null, null, window.location.href);
                                        
                                        content = document.getElementById("content");
                                        DUsu = document.getElementById("DUsu");

                                        content.style.display = "none";
                                        DUsu.style.display = "block";
                                    }                            
                                </script>';

                                echo'<div class="alert alert-danger">El usuario ha sido borrado con exito</div>';
                            }                                        
                            if (isset($_GET["id_u"])){
                                $dato=$_GET["id_u"];
                                $usuario_d=controladorFormularios::ctrSeleccionarRegistro($dato);
                                /* print_r($usuario); */       
                                
                                echo'<script>
                                    if ( window.history.replaceState ){
                                        window.history.replaceState( null, null, window.location.href);
                                    }
                                    content = document.getElementById("content");
                                    DUsu = document.getElementById("DUsu");

                                    content.style.display = "none";
                                    DUsu.style.display = "block";
                                </script>';

                                echo '                        
                                <div class="container">
                                <div class="card mt-4">
                                <div class="card-header">
                                    <h6 class="text-danger font-weight-bold">¡ATENCIÓN!</h6>
                                </div>
                                <div class="card-body">
                                    Estás a punto de borrar al usuario <strong>'.$usuario_d["nombre"].'</strong> (<strong>'.$usuario_d["id_usuario"].'</strong>) de forma permanente en la base de datos, si realmente quieres continuar, presiona el siguiente botón.   
                                    <form action="" method="POST">
                                        <input type="hidden" name="id_usuario" value="'.$usuario_d["id_usuario"].'">
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
        </div>
    
        <!-- ============================================================================= -->

        <!--==================================================================================
        ===================================MODULO PRODUCTO===================================
        ===================================================================================-->
        <div class="content" id="MClie" style="display: block;"> <!-- CREAR CLIENTE -->
            <?php require "vista/paginas/modulo1/layout/m_clie.php"; ?>
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
      data: [3, 7, 5, 8],
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