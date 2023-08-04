<?php                    
    require "../../modelo/crud_modelo.php";
    require "../../controlador/crud_controlador.php";
    require('../../librerias/fpdf/fpdf.php');
    session_start();
    if (!isset($_SESSION["sesion"])){ 
		echo '<script> window.location = "index.php?navegacion=inicio";
                        alert("No tienes una sesión activa.");</script>'; 
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

    if ($_GET["p_id"]) {
        $idVenta = $_GET["p_id"];
        $id = $_SESSION["usuario"]["ClieCodigoPK"];
        $ventas = controladorFormularios::ctrSeleccionarCompraCliente($idVenta, $id);

        class PDF extends FPDF
        {
        // Cabecera de página
        function Header()
        {
            $this -> SetAuthor("OTAVO");
            $this -> setTitle("Factura de compra");
            // Logo
            $this->Image('../img/logo1.png',10,8,33);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this->Cell(65);
            // Título
            $this->Cell(70,10,'Factura de compra',0,1,'C');
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
        $pdf->SetFont('Arial','',14);    
        $pdf->Ln(10);
        $pdf->Cell(10, 10, 'Cantidad comprada: '.$mostrar["VentCantidadTotal"], 0, 1, '', 0);
        $pdf->Cell(10, 10, 'Valor unitario del producto: '.$mostrar["ProdPrecioVenta"], 0, 1, '', 0);
        $pdf->Cell(10, 10, 'Total: '.$mostrar["VentTotal"], 0, 1, '', 0);        
        endforeach;
        $pdf->Cell(10, 10, utf8_decode("Comunícate al número de teléfono 3222379887 para terminar el pago."), 0, 1);
        $pdf->Cell(10, 10, utf8_decode("También puedes escanear el código de Nequi y realizar el pago, especificando el código."));
        $pdf->Image('../img/qr.png',55,150,100);
        $pdf->Ln(110);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(50, 10, utf8_decode("Código QR de Nequi, especifica en el mensaje el código del producto y tú nombre completo."), 0, 0, '', 0);
        $pdf->Output();
    } elseif($_GET["p_id"]=="nuevaCompra") {            
        $id = $_SESSION["usuario"]["ClieCodigoPK"];
        $ventas = controladorFormularios::ctrSeleccionarCompraCliente(null, $id);
        

        class PDF extends FPDF
        {
        // Cabecera de página
        function Header()
        {
            $this -> SetAuthor("OTAVO");
            $this -> setTitle("Factura de compra");
            // Logo
            $this->Image('../img/logo1.png',10,8,33);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this->Cell(65);
            // Título
            $this->Cell(70,10,'Factura de compra',0,1,'C');
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
        $pdf->SetFont('Arial','',14);    
        $pdf->Ln(10);
        $pdf->Cell(10, 10, 'Cantidad comprada: '.$mostrar["VentCantidadTotal"], 0, 1, '', 0);
        $pdf->Cell(10, 10, 'Valor unitario del producto: '.$mostrar["VentTotal"], 0, 1, '', 0);
        $pdf->Cell(10, 10, 'Total: '.$mostrar["VentTotal"], 0, 1, '', 0);        
        endforeach;
        $pdf->Cell(10, 10, utf8_decode("Comunícate al número de teléfono 3222379887 para terminar el pago."), 0, 1);
        $pdf->Cell(10, 10, utf8_decode("También puedes escanear el código de Nequi y realizar el pago, especificando el código."));
        $pdf->Image('../img/qr.png',55,150,100);
        $pdf->Ln(110);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(50, 10, utf8_decode("Código QR de Nequi, especifica en el mensaje el código del producto y tú nombre completo."), 0, 0, '', 0);
        $pdf->Output();
    }
    
    
?>