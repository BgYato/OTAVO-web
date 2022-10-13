/*-----------------------------------------------------------------------------
----------------------------- PARA DASHBOARD ----------------------------------
-------------------------------------------------------------------------------*/
function desplegar(id){
    content = document.getElementById('content')    
    clie = document.getElementById('mostrarClie');
    prod = document.getElementById('mostrarProd');       
    icon2 = document.getElementById('rotate2');    
    icon3 = document.getElementById('rotate3');    
    icon4 = document.getElementById('rotate4'); 
    MProd = document.getElementById('MProd');
    MClie = document.getElementById('MClie');

    if (id=="menu") {
        cerrarTodo();
        content.style.display = 'block';
    }    
    else if (id==2) {            
        if (icon2.style.transform=='rotateZ(180deg)') {
            icon2.style.transform = 'rotateZ(360deg)';                 
            desplegar("menu");
            prod.style.display = 'none';                           
        } else {
            icon2.style.transform = 'rotateZ(180deg)';
            MProd.style.display = "block";
            prod.style.display = 'block';                        
        }
    }
    else if (id==3) {            
        if (icon3.style.transform=='rotateZ(180deg)') {
            icon3.style.transform = 'rotateZ(360deg)';  
            cerrarTodo();
            clie.style.display = "none";
            document.getElementById('content').display = "block";
            alert("Cerrado");
        } else {
            icon3.style.transform = 'rotateZ(180deg)';
            MClie.display = "block";
            clie.style.display = "block";
        }
    } else if (id==4) {            
        if (icon4.style.transform=='rotateZ(180deg)') {
            icon4.style.transform = 'rotateZ(360deg)';     
            alert("Cerrado");
        } else {
            icon4.style.transform = 'rotateZ(180deg)';
        }
    } else if (id==5) {            
        if (document.getElementById('contacto').style.display=="block") {
            cerrarTodo();
            document.getElementById('contacto').style.display="none";
        } else {
            cerrarTodo();
            document.getElementById('contacto').style.display="block";            
        }
    }
    else if (id==6) {            
        if (document.getElementById('ticket').style.display=="block") {
            desplegar("menu");
            document.getElementById('ticket').style.display="none";
        } else {
            cerrarTodo();
            document.getElementById('ticket').style.display="block";            
        }
    }

}

function cerrarTodo() {    
    content = document.getElementById("content"); 
    CClie = document.getElementById("CClie");
    RClie = document.getElementById("RClie");    
    CProd = document.getElementById("CProd");    

    content.style.display = 'none';    
    
    CClie.style.display = 'none'; 
    RClie.style.display = 'none';    

    document.getElementById('MProd').style.display = "none";
    document.getElementById('MClie').style.display = "none";
    document.getElementById('CProd').style.display = "none";
    document.getElementById('RProd').style.display = "none";
}

function gestClie(num){
    MClie = document.getElementById("MClie");
    if (num==1) {
        MClie.style.display = "block";
        abrirGestClie(1);
    } else if (num==2) {
        MClie.style.display = "block";
        abrirGestClie(2);
    } else if (num==3) {
        MClie.style.display = "block";
        abrirGestClie(3);
    } else if (num==4) {
        MClie.style.display = "block";
        abrirGestClie(4);
    }
}

function abrirGestClie(id) {
    CClie = document.getElementById("CClie");
    RClie = document.getElementById("RClie");    
    UClie = document.getElementById("UClie");    
    DClie = document.getElementById("DClie");    
    if (id==1) {
        cerrarTodo();
        CClie.style.display = "block";
    } else if (id==2) {
        cerrarTodo();
        RClie.style.display = "block";
    } else if (id==3) {
        cerrarTodo();  
        UClie.style.display = "block";      
    } else if (id==4) {
        cerrarTodo();
        DClie.style.display = "block";
    }
}

function intento() {
    form = document.getElementById("mostrar");
    form.style.display="block";
}

function cerrarTablaCliente(){    
    window.history.replaceState(null, null, "index.php?navegacion=dashboard");
    window.location.href="index.php?navegacion=dashboard";
    abrirModulo('cliente', 'RClie1');
}

function confirmDelete() {
    var respuesta = confirm("¿Estas seguro de que deseas eliminar a este usuario de nuestra base de datos?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }
}

/* DASHBOARD 2.0 */

function abrirModulo(condicion, crud) {
    if (condicion=='producto') {        
        cerrarTodo();
        document.getElementById('MProd').style.display = "block";
        document.getElementById(`${crud}`).style.display = "block";
    }
    if (condicion=='cliente') {   
        if (crud=='RClie1') {
            document.getElementById('content').style.display = "none";
            document.getElementById('MClie').style.display = "block";
            document.getElementById('RClie').style.display = "block";    
        } else {
        cerrarTodo();
        /* ACOMODAR LA FUNCION PARA QUE LOS ID QUE APAREZCAN UNICAMENTE SI VIENEN DE UN METODO GET (ACTUALIZAR, LEER, BORRAR) SE MUESTREN 
        MEDIANTE UN IF, QUE ABRA LA CAJA Y NO CIERRE LAS DEMÁS CAJAS SINO SALDRÁ TREMENDO ERROR */        
        document.getElementById('MClie').style.display="block";
        document.getElementById(`${crud}`).style.display = "block";
    }
    }
}

function cerrarInfo(caja) {    
    document.getElementById(`${caja}`).style.display = "none";
}

function confirmarVenta(){
    document.getElementById('btnVenta').style.display = "none";
    document.getElementById('terminarVenta').style.display = "block";
}

function cuentaTab(tabulacion){    
    if (document.getElementById(`${tabulacion}`).style.display=="block") {        
        document.getElementById('formulario__mensaje-cuenta').classList.add('formulario__mensaje-activo');
        setTimeout(() => {
			document.getElementById('formulario__mensaje-cuenta').classList.remove('formulario__mensaje-activo');			
		}, 5000);
    } else {    
        cerrarTab();
        document.getElementById(`${tabulacion}`).style.display = "block";
    }
}

function cerrarTab() {
    document.getElementById('datos').style.display = "none";
    document.getElementById('compras').style.display = "none";
    document.getElementById('configuracion').style.display = "none";
    document.getElementById('actualizacion').style.display = "none";
    document.getElementById('ticket').style.display = "none";
}

function confirmarDesactivar(){
    document.getElementById('btnAbrirConfirmar').disabled = true;
    document.getElementById('textoConfirmar').style.display = "block";
}

function abrirInfoCompra(id){    
    if (document.getElementById(`${id}`).style.display=="none") {
        document.getElementById(`${id}`).style.display = "";
    } else {
        document.getElementById(`${id}`).style.display = "none";
    }
}

function cerrarTabAcerca() {
    document.getElementById('vision').style.display = "none";
    document.getElementById('mision').style.display = "none";
    document.getElementById('valores').style.display = "none";
    document.getElementById('direccion').style.display = "none";
    document.getElementById('contactenos').style.display = "none";    
}

function acercaTab(condicion){
    cerrarTabAcerca();
    document.getElementById('relleno').style.display = "none";
    document.getElementById(`${condicion}`).style.display = "block";
}

function cerrarInfoCompra(id){    
    document.getElementById(`${id}`).style.display="none";
}

function abrirTicket(id){
    document.getElementById(`ticket${id}`).style.display = "block";
} function cerrarTicket(id) {
    document.getElementById(`ticket${id}`).style.display = "none";
}