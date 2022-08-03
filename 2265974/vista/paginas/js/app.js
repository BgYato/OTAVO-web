/*-----------------------------------------------------------------------------
----------------------------- PARA DASHBOARD ----------------------------------
-------------------------------------------------------------------------------*/
function desplegar(id){
    
    content = document.getElementById('content')
    usu = document.getElementById('mostrarUsu');
    clie = document.getElementById('mostrarClie');
    icon1 = document.getElementById('rotate1');    
    icon2 = document.getElementById('rotate2');    
    icon3 = document.getElementById('rotate3');    
    icon4 = document.getElementById('rotate4'); 

    if (id=="menu") {
        cerrarTodo();
        content.style.display = 'block';
    }
    
    if (id==1) {            
        if (icon1.style.transform=='rotateZ(180deg)') {
            icon1.style.transform = 'rotateZ(360deg)';     
            usu.style.display = 'none';
        } else {
            icon1.style.transform = 'rotateZ(180deg)';
            usu.style.display = 'block';
        }
    }
    else if (id==2) {            
        if (icon2.style.transform=='rotateZ(180deg)') {
            icon2.style.transform = 'rotateZ(360deg)';     
            
        } else {
            icon2.style.transform = 'rotateZ(180deg)';
        }
    }
    else if (id==3) {            
        if (icon3.style.transform=='rotateZ(180deg)') {
            icon3.style.transform = 'rotateZ(360deg)';  
            clie.style.display = "none";
            
        } else {
            icon3.style.transform = 'rotateZ(180deg)';
            clie.style.display = "block";
        }
    } else if (id==4) {            
        if (icon4.style.transform=='rotateZ(180deg)') {
            icon4.style.transform = 'rotateZ(360deg)';     
            
        } else {
            icon4.style.transform = 'rotateZ(180deg)';
        }
    }

}

function cerrarTodo() {
    RUsu = document.getElementById("RUsu");
    UUsu = document.getElementById("UUsu");
    DUsu = document.getElementById("DUsu");   
    content = document.getElementById("content"); 
    CClie = document.getElementById("CClie");
    RClie = document.getElementById("RClie");
    DClie = document.getElementById("DClie");

    content.style.display = 'none';
    RUsu.style.display = 'none';
    UUsu.style.display = 'none';
    DUsu.style.display = 'none';    
    CClie.style.display = 'none'; 
    RClie.style.display = 'none';     
}

function gestUsu(num){
    CUsu = document.getElementById("CUsu");
    RUsu = document.getElementById("RUsu");
    UUsu = document.getElementById("UUsu");
    DUsu = document.getElementById("DUsu");    

    if (num == 1) {
        cerrarTodo();
        CUsu.style.display = 'block';                
    } else if (num == 2) {
        cerrarTodo();
        RUsu.style.display = 'block';        
    } else if (num == 3) {
        cerrarTodo();
        UUsu.style.display = 'block';        
    } else if (num == 4) {
        cerrarTodo();
        DUsu.style.display = 'block';        
    }
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
    window.location.reload();    
    cerrarTodo();
    gestClie(2);
}

function confirmDelete() {
    var respuesta = confirm("¿Estas seguro de que deseas eliminar a este usuario de nuestra base de datos?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }
}
