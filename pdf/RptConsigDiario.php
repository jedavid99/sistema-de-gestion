<?php 

	include 'plantilla.php';
	include '../base_de_datos.php';


	$fecha = date('d/m/Y');


	$sentenciav = $base_de_datos->query("SELECT * FROM ventasfinal;");
	$productosv = $sentenciav->fetchAll(PDO::FETCH_OBJ);


	$pdf = new ConsigDiario('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	foreach($productosv as $productov){
	$totalGasto = 0;
	

		//$totalGasto = $totalGasto + $row['total'];
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(15,6,$productov->factura,1,0,'C');
		$pdf->Cell(20,6,$productov->fecha,1,0,'C');
		$pdf->Cell(15,6, $productov->codigo,1,0,'C');
		$pdf->Cell(60,6,$productov->nombre,1,0,'C');
		
		
			# code...
			$pdf->Cell(25,6,$productov->estatud,1,0,'C');
	
			$pdf->SetFont('Arial','',7);
			
	
		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(35,6,$productov->categoria,1,0,'C');
		$pdf->Cell(25,6,number_format($productov->precioVenta ,3,',','.'),1,0,'C');
		$pdf->Cell(20,6, $productov->cantidad ,1,0,'C');
		$pdf->Cell(30,6,number_format($productov->total,3,',','.'),1,1,'C');
		
		
		
	

	



 }
	$pdf->Output(utf8_decode('Consignaciones Diarias.pdf'), 'I');
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