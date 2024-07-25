<?php 

	include 'plantilla.php';
	


	include_once "../base_de_datos.php";
	$sentencia = $base_de_datos->query("SELECT * FROM productos;");
	$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
	


	$pdf = new Productos('L','mm','legal');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$totalventas = 0;
	
	foreach($productos as $producto) {
		$totalventas = $totalventas + $producto->precioVenta;
		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(15,6,$producto->codigo ,1,0,'C');
		$pdf->Cell(60,6,utf8_decode($producto->descripcion),1,0,'C');
		$pdf->Cell(100,6,utf8_decode($producto->caracteristica),1,0,'C');
		$pdf->Cell(25,6,'$ '.utf8_decode(number_format($producto->precioDolar ,2,',','.')),1,0,'C');
		$pdf->Cell(30,6,'BS '.utf8_decode(number_format($producto->precioVenta ,3,'.',',')),1,0,'C');
		$pdf->Cell(15,6,utf8_decode($producto->existencia),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($producto->categorias),1,0,'C');
		 $pdf->Cell(30,6,utf8_decode($producto->promocion),1,1,'C');
		 
	
		
		
	}
		$pdf -> SetFont('Arial', 'B', 8);
		$pdf->SetFillColor(232,232,232);
		$pdf -> Cell(200,6,'',0);
		$pdf -> Cell(30,8,'Total: BS '.number_format($totalventas,2,'.',','),1,0,'L',1);
		
	
	$pdf->Output(utf8_decode('Productos.pdf'), 'I');
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