
<div class="d-flex">
    <div id="sidebar-container" class="bg-primary">
        <div class="logo">
            <h4 class="text-light h4-titulo font-weight-bold">OTAVO DASHBOARD</h4>
        </div>
        <div class="menu">
            <a href="#" onclick="" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-bars"></i> Menu 
            </a>            
            <a href="#" onclick="desplegar(1); return false" class="d-block text-light p-3">
                <i class="mr-2 lead fa-solid fa-user"></i> 
                    Usuarios 
                <i class="fa-solid fa-angle-down float-right" id="rotate1"></i>
            </a>
                <ul style="display: none;" id="mostrarUsu">
                    <li>
                        <a href="" class="d-block text-light p-2"> Hola</a>
                    </li>
                    <li>
                        <a href="" class="d-block text-light p-2"> Hola</a>
                    </li>
                    <li>
                        <a href="" class="d-block text-light p-2"> Hola</a>
                    </li>
                    <li>
                        <a href="" class="d-block text-light p-2"> Hola</a>
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


 <div class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">    
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
</div>
</div>