<?php                    
    require "../../modelo/crud_modelo.php";
    require "../../controlador/crud_controlador.php";
    require('../../librerias/fpdf/fpdf.php');
    session_start();
    if (!isset($_SESSION["sesion"]) || $_SESSION["sesion"]!=1){ 
		echo '<script> window.location = "index.php?navegacion=inicio";
                        alert("No tienes los permisos para acceder a esta página.");</script>'; 
		    return;
	}
    date_default_timezone_set('America/Bogota');    
    
    $fecha_actual = date('m-d-Y', time());  
    $hora = date('h:i:s', time());
    $mes = date('m', time());
    $año = date('y', time());    
    $mes_actual = "20".$año."-".$mes."-01 00:00:00";
    $mes_maximo = "20".$año."-".($mes+1)."-01 00:00:00";
    $datos = array("mes_actual" => $mes_actual, "mes_maximo" => $mes_maximo);
    $ventas = controladorFormularios::ctrSeleccionarVentaMes($datos);    
    

    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        $this -> SetAuthor("OTAVO");
        $this -> setTitle("Reporte de ventas");
        // Logo
        $this->Image('../img/logo1.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(65);
        // Título
        $this->Cell(70,10,'Ventas semanales - OTAVO',0,1,'C');
        // Salto de línea
        $this->Ln(20);
        $this->SetFont('Arial','',14);
        $this -> Cell(0, 15, "Nombre: ".$_SESSION["usuario"]["ClieNombre"]." ".$_SESSION["usuario"]["ClieApellido"], 0, 1, '');
        $this -> Cell(0, 0,  "Fecha: ".date('m-d-y', time())." | ".date('h:i:s', time()), 0, 1, '');        
        $this->Ln(10);
        $this -> Cell(20, 10, utf8_decode("Código"), 1, 0, 'C', 0);
        $this -> Cell(80, 10, "Producto", 1, 0, 'C', 0);
        $this -> Cell(40, 10, "Valor", 1, 0, 'C', 0);
        $this -> Cell(57, 10, "Fecha", 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        $this->Image('../img/logo1.png',10,280,10);
        // (Eje X, Eje Y, Texto, border, salto de linea, justificado, )        
        // Posición: a 1,5 cm del final
        $this->SetY(-16);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
    }
    

    $pdf = new PDF();
    $pdf->aliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',16);    
    foreach ($ventas as $key => $mostrar):        
        $pdf -> Cell(20, 10, $mostrar["VentCodigoPK"], 1, 0, 'C', 0);
        $pdf -> Cell(80, 10, $mostrar["ProdNombre"], 1, 0, 'C', 0);
        $pdf -> Cell(40, 10, $mostrar["VentTotal"], 1, 0, 'C', 0);
        $pdf -> Cell(57, 10, $mostrar["VentFecha"], 1, 1, 'C', 0);
    endforeach;
    $pdf->Output();
?>