<div class="contenido-1"></div>
<div class="container">
    <?php 
        $validar = controladorFormularios::ctrValidarCompra();   
        if ($validar=="ok") {
            echo '<h3><center>Producto comprado con exito.</center></h3>
            <center><i class="fa-solid fa-thumbs-up icono1"></i></center>
            <center><p class="mt-2">Puedes comprobar el estado de tu compra accediendo a tu cuenta > Mis compras.</p></center>
            <div class="cuenta__relleno"></div>';
        } else {
            echo '<div id="mensaje_exito-error" style="display: block;"><h3><center>Al parecer hay un error.</center></h3>
            <center><i class="fa-solid fa-thumbs-down icono1" style="color: red;"></i></center>
            <center><p class="mt-2">No se ha comprado ningún producto o hubo un error, intenta de nuevo, si el error persiste abre un ticket de soporte.</p></center>
            <div class="cuenta__relleno"></div></div>';

            echo '<script>setTimeout(() => {                
                window.location.href = "index.php?navegacion=catalogo";
            }, 5000);</script>';
        }             
    ?>        
</div>