/*-----------------------------------------------------------------------------
----------------------------- PARA DASHBOARD ----------------------------------
-------------------------------------------------------------------------------*/
btn = document.getElementById('btn-back');

function closeAll() {          
    us = document.getElementById('1');    
    pr = document.getElementById('2');
    ve = document.getElementById('3');
    cl = document.getElementById('4');
    btn.style.display = 'none';
    us.style.display = 'none';
    pr.style.display = 'none';  
    ve.style.display = 'none';
    cl.style.display = 'none';    
    block = document.getElementById('block');
    block.style.display = 'block';
}

function showTable() {
    tabla = document.getElementById("tabla-oculta");
        
    if (tabla.style.display == 'block') {
        tabla.style.display = "none";
    } else {
        tabla.style.display = "block";
    }
}

function mostrarEle(id) {        
    btn = document.getElementById('btn-back');    
    us = document.getElementById('1');    
    pr = document.getElementById('2');
    ve = document.getElementById('3');
    cl = document.getElementById('4');
    block = document.getElementById('block');      

    if (id == 1) {
        if ((pr.style.display == "block") || (ve.style.display == "block") || (cl.style.display == "block")) {
            alert("Ya hay un modulo en pantalla, por favor, seleccione la opción 'Cerrar el panel.'");            
        } else {
            document.getElementById(id).style.display = 'block';

            btn.style.display = 'block';
            block.style.display = 'none';
        }                
    } 

    if (id == 2) {
        if ((us.style.display=="block") || (ve.style.display=="block") || (cl.style.display=="block")) { 
            alert("Ya hay un modulo en pantalla, por favor, seleccione la opción 'Cerrar el panel.'")
        } else {
            document.getElementById(id).style.display = 'block';            
            btn.style.display = 'block';   
            block.style.display = 'none';
        }
    }

    if (id == 3) {
        if ((us.style.display=="block") || (pr.style.display=="block") || (cl.style.display=="block")) { 
            alert("Ya hay un modulo en pantalla, por favor, seleccione la opción 'Cerrar el panel.'")
        } else {
            document.getElementById(id).style.display = 'block';            
            btn.style.display = 'block';   
            block.style.display = 'none';
        }
    }

    if (id == 4) {
        if ((us.style.display=="block") || (pr.style.display=="block") || (ve.style.display=="block")) { 
            alert("Ya hay un modulo en pantalla, por favor, seleccione la opción 'Cerrar el panel.'")
        } else {
            document.getElementById(id).style.display = 'block';            
            btn.style.display = 'block';   
            block.style.display = 'none';
        }
    }
}        

function desplegar(id){
    
    content = document.getElementById('content')
    usu = document.getElementById('mostrarUsu');
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
            
        } else {
            icon3.style.transform = 'rotateZ(180deg)';
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
    CUsu = document.getElementById("CUsu");
    RUsu = document.getElementById("RUsu");
    UUsu = document.getElementById("UUsu");
    DUsu = document.getElementById("DUsu");   
    content = document.getElementById("content");

    content.style.display = 'none';
    CUsu.style.display = 'none';
    RUsu.style.display = 'none';
    UUsu.style.display = 'none';
    DUsu.style.display = 'none';
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
function intento() {
    form = document.getElementById("mostrar");
    form.style.display="block";
}
/* ---------------------------------------------------------------------------------------
---------------------------------- PARA CUENTA PHP ---------------------------------------
------------------------------------------------------------------------------------------ */

