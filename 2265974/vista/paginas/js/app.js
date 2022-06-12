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

/* ---------------------------------------------------------------------------------------
---------------------------------- PARA CUENTA PHP ---------------------------------------
------------------------------------------------------------------------------------------ */


