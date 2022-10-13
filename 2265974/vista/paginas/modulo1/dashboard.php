<?php 
    if (!isset($_SESSION["sesion"]) || $_SESSION["sesion"]!=1){ 
		echo '<script> window.location = "index.php?navegacion=inicio";
                        alert("No tienes los permisos para acceder a esta página.");</script>'; 
		    return;
	}

    /* Preparación de las consultas */
    $consultarCliente = controladorFormularios::consultasUltimoCliente();
    $consultarCompra = controladorFormularios::consultasUltimaCompra()
 ?>
<button onclick="cerrarInfo('cerrarError');" id="btnOcultoError" style="display: none;">ocultar</button>

<div class="d-flex "> <!-- VISTA BARRA LATERAL, NAVBAR Y MENU -->
    <div id="sidebar-container" class="bg-primary"> <!-- SIDE BAR -->
        <div class="logo row">
            <h4 class="text-light h4-titulo font-weight-bold col-sm-8">OTAVO DASHBOARD</h4>
        </div>
        <div class="menu">
            <a href="" onclick="cerrarTodo(); return false" class="text-light p-3 bg-danger" style="display: none;" id="cerrarTodo">
                <i class="lead mr-2 fa-solid fa-xmark"></i> Cerrar la vista actual. 
            </a>  
            <a href="index.php?navegacion=dashboard" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-bars"></i> Menu 
            </a>            
            <a href="#" onclick="desplegar(3); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-user-tag"></i> 
                    Clientes 
                <i class="fa-solid fa-angle-down float-right" id="rotate3"></i>
            </a>
                <ul style="display: none;" id="mostrarClie">
                    <li>
                        <a href="#" onclick="abrirModulo('cliente', 'CClie');" class="d-block text-light p-2"> Crear cliente</a>
                    </li>
                    <li>
                        <a href="#" onclick="abrirModulo('cliente', 'RClie');" class="d-block text-light p-2"> Consultar cliente</a>
                    </li>                    
                </ul>
            <a href="#" onclick="desplegar(2); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-basket-shopping"></i> 
                    Productos 
                <i class="fa-solid fa-angle-down float-right" id="rotate2"></i>
            </a>   
                <ul style="display: none;" id="mostrarProd">
                    <li>
                        <a href="#" onclick="abrirModulo('producto', 'CProd'); return false" class="d-block text-light p-2"> Crear un producto</a>
                    </li>
                    <li>
                        <a href="#" onclick="abrirModulo('producto', 'RProd'); return false" class="d-block text-light p-2"> Consultar producto</a>
                    </li>                    
                </ul>         
            <a href="#" onclick="desplegar(4); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-arrow-trend-up"></i> 
                    Ventas 
                <i class="fa-solid fa-angle-down float-right" id="rotate4"></i>
            </a>            
            <a href="#" onclick="desplegar(5); return false" class="d-block text-light p-3">
                <i class="fa-solid fa-envelope mr-2 lead"></i>
                    Mensajes entrantes                
            </a>
            <a href="#" onclick="desplegar(6); return false" class="d-block text-light p-3">
                <i class="fa-sharp fa-solid fa-ticket lead mr-2"></i>
                    Tickets de soporte
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
                    <?php echo $_SESSION["usuario"]["ClieNombre"];?>
                </a>            
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Cuenta</a>
                <a class="dropdown-item" href="index.php?navegacion=inicio">Volver inicio</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?navegacion=salir">Salir</a>
                </div>
            </li>        
            </ul>        
            </div>
            </div>
        </nav>

        <div id="content" class="content" style="display: block;"> <!-- MENU -->
            <section class="py-3">
                <div class="container">
                    <!--------------------------------------------------------------
                    ------------------------- PHP -> CONTROLADOR Y MODELO ----------
                    ---------------------------------------------------------------->
                    <?php 
                        $responderTicket = controladorFormularios::ctrResponderTicket();
                        if ($responderTicket=="ok") {
                            echo '<div class="alert alert-success p-2"><strong>Enviar una respuesta: </strong>el mensaje se ha enviado correctamente, el usuario lo podrá ver.</div>';
                        } elseif ($responderTicket=="no") {
                            echo '<div class="alert alert-danger p-2"><strong>Enviar una respuesta: </strong>ha ocurrido un error en el servidor, intentalo de nuevo.</div>';
                        }
                    ?>
                    
                    <div class="row">
                        <div class="col-lg-9">
                            <h1 class="font-weight-bold bm-0">Bienvenido <?php echo $_SESSION["usuario"]["ClieNombre"]." ".$_SESSION["usuario"]["ClieApellido"]?></h1>
                            <p class="lead text-muted">Revisa la última información</p>
                        </div>
                        <div class="col-lg-3 d-flex mt-4">
                            <a href="public/pdf/reporteVentas.php" target="_blank"><button class="align-self-center btn btn-primary w-100 mt-4">Generar reporte</button></a>                            
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
                                        <h6 class="text-muted">Productos vendidos</h6>
                                        <h3 class="font-weight-bold">...</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Productos creados</h6>
                                        <h3 class="font-weight-bold">...</h3>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-flex stat my-3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Ingresos mensuales</h6>
                                        <h3 class="font-weight-bold">...</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 d-flex stat my-3 ml-3">
                                    <div class="mx-auto ">
                                        <h6 class="text-muted">Último usuario registrado:</h6>
                                        <h3 class="font-weight-bold"><?php echo $consultarCliente[0] ?></h3>
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
                                    <h6 class="font-weight-bold mb-0">Registros mensuales</h6>
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
                                            <h6 class="d-inline-block mb 0"><?php echo $consultarCompra["nombre"]; ?></h6><!-- <span class="badge 
                                            badge-success ml-2"> 10% descuento</span> -->
                                            <small class="d-block text-muted"><?php echo $consultarCompra["precio"]; ?> COP</small>
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
        ===================================MODULO CLIENTE===================================
        ===================================================================================-->
        <div class="content" id="MClie" style="display: none;"> <!-- CREAR CLIENTE -->
            <?php require "vista/paginas/modulo1/layout/m_clie.php"; ?>
        </div>        

        <!-- ============================================================================= -->

        <!--==================================================================================
        ===================================MODULO PRODUCTO===================================
        ===================================================================================-->
        <div class="content" id="MProd" style="display: none;"> <!-- CREAR PRODUCTO -->
            <?php require "vista/paginas/modulo1/layout/m_prod.php"; ?>
        </div>
        <!-- ============================================================================= -->

        <div class="content" id="contacto" style="display: none;">
            <?php
                $contacto = controladorFormularios::ctrSeleccionarContacto();
            ?>
            <div class="container-fluid">
                <table class="table table-dark table-borderless mt-4 text-center table-hover table-striped" id="tablaClientes">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>                                                            
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <?php foreach ($contacto as $key => $mostrar): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $mostrar["idMensaje"]; ?></td>
                            <td><?php echo $mostrar["nombre"]; ?></td>                            
                            <td><?php echo $mostrar["correo"]; ?></td>                                
                            <td><a href="#" onclick="abrirInfoCompra('<?php echo $mostrar['idMensaje']; ?>');" class="btn btn-dark w-100 h-100">Ver detalles</a></td>
                        </tr>                            
                        <tr id="<?php echo $mostrar["idMensaje"]; ?>" style="display: none; width:100%;">
                            <td colspan="1"><strong>Mensaje recibido;</strong></td>
                            <td colspan="3"><?php echo $mostrar["mensaje"]; ?></td>                            
                        </tr>                        
                    </tbody>                          
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <div class="content" id="ticket" style="display: none;">
            <?php $ticket = controladorFormularios::ctrSeleccionarRegistroTicket(); ?>
            <div class="container mt-3">       
                <?php foreach($ticket as $key => $mostrar): ?>
                <div class="bg-dark mb-4" id="ticket<?php echo $mostrar["idTicket"]?>" style="display: none;">
                    <div class="container text-white p-4" id="cerrarExito">
                        <span class="font-weight-bold float-right btnCerrarInfo"><a href="#" onclick="cerrarTicket(<?php echo $mostrar['idTicket']?>);" id="btnOculto">x</a></span>
                        <strong>Código del ticket: </strong><?php echo $mostrar["idTicket"]; ?> <br>
                        <strong>Nombre del usuario: </strong><?php echo $mostrar["nombre"]; ?> <br>
                        <strong>Correo del usuario: </strong><?php echo $mostrar["correo"]; ?> <br>
                        <strong>Situación: </strong><?php echo $mostrar["situacion"]; ?> <br>
                        <strong>Mensaje: </strong>
                        <div class="p-2 m-2 bg-secondary">
                            <?php echo $mostrar["mensaje"]; ?> <br>
                        </div>
                        <strong><?php if ($mostrar["respuesta"]==null) {
                           echo 'Respuesta: ';
                           echo '<form method="post">
                           <textarea class="form-control bg-dark mt-2 text-white" placeholder="Redacta el mensaje para el usuario" required name="respuesta"></textarea>
                           <input type="hidden" name="idTicket" value="'.$mostrar["idTicket"].'">
                            <button type="submit" class="btn btn-labeled btn-success" name="responderTicket">
                            <span class="btn-label"><i class="fa fa-check"></i></span>Responder</button>
                            <button type="button" class="btn btn-labeled btn-danger">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>Eliminar</button>                        
                            </form>';
                        } else {
                            echo 'Ya has dejado una respuesta al cliente.';
                            echo '<form method="post">
                            <textarea class="form-control bg-dark mt-2 text-white" placeholder="Redacta el mensaje para el usuario" disabled name="respuesta">'.$mostrar["respuesta"].'</textarea>
                             </form>';

                        }?></strong> <br>                        
                    </div>
                </div>
                <?php endforeach ?>
                <table class="table table-dark table-hover">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <?php foreach ($ticket as $key => $mostrar):?>
                    <tbody>
                    <tr>
                        <td><?php echo $mostrar["idTicket"]; ?></td>
                        <td><?php echo $mostrar["nombre"]; ?></td>
                        <td><?php echo $mostrar["correo"]; ?></td>
                        <td><a href="#" onclick="abrirTicket(<?php echo $mostrar['idTicket'] ?>); return false" class="btn btn-info mr-2">Ver mensaje</a></td>

                    </tr>                    
                    </tbody>
                    <?php endforeach ?>
                </table>
            </div>
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
      data: [4, 4, 0.5, <?php echo 1; ?>],
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