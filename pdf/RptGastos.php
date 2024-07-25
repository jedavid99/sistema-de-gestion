<?php 

	include 'plantilla.php';
	


	include_once "../base_de_datos.php";
	$sentencia = $base_de_datos->query("SELECT * FROM gastos;");
	$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
	
	
	

	$pdf = new Gastos('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$totalGasto = 0;
	foreach($productos as $producto){ 
			
		$totalGasto = $totalGasto + $producto->precio;
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(15,6,$producto->codigo ,1,0,'C');
		$pdf->Cell(60,6,utf8_decode($producto->nombre),1,0,'C');
		$pdf->Cell(110,6,utf8_decode($producto->caracteristica),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($producto->cantidad),1,0,'C');
		$pdf->Cell(30,6,"$".utf8_decode(number_format( $producto->precio,2,'.',',')),1,1,'C');
		
	}

		$pdf -> SetFont('Arial', 'B', 9);
		$pdf->SetFillColor(232,232,232);
		$pdf -> Cell(185,6,'',0);
		$pdf -> Cell(50,8,'Total: $'.number_format($totalGasto,2,'.',','),1,1,'C',1);


	$pdf->Output('Historial_Gastos.pdf', 'I');
	#$pdf->Output('D');
	#$pdf->Output('F','Catalogo de Clientes');

	/**
	* Documentacion
	*$pdf->Cell(70,6,'Direccion',1,0,'C',1);
	*60->Longitud
	*6-> Alto
	*1-> Borde
	*0-> No tiene Salto de Linea, 1-> Si tiene salto de Linea
	*C-> Centrado
	*1-> Relleno (Color)
	*
	*/
?>