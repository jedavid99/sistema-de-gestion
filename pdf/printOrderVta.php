<?php 

	include_once "base_de_datos.php";
	$id = $_GET["id"];

	

$query = "SELECT ventas.id,  ventas.fecha, ventas.total

FROM ventas

WHERE id = $id ";
	$resultado = $connect->query($query);


		require 'fpdf/fpdf.php';

	
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',14);
		$row = $resultado->fetch_assoc();
		$pdf->SetFont('Arial','',9);
		//$pdf->MultiCell(50,50,'',1,1);
	
		$pdf->Cell(50,6,'Folio: '.$row['total'],0,0,'L');
		$pdf->Cell(92);
	
			$pdf->Cell(50,6,utf8_decode('Tipo Orden: Consignación'),0,1,'R');

	
			$pdf->Cell(50,6,utf8_decode('Tipo Orden: Venta'),0,1,'R');
	
		//$pdf->Cell(50,6,'Tipo Orden:'.$row['tipo_orden'],1,1,'L');
		$pdf->Cell(112,6,'Nombre del Cliente:',0,0,'L');
		$pdf->Cell(40,6,'Fecha:',0,0,'R');

		$pdf->Cell(30,6,utf8_decode('Código Cliente:'),0,1,'L');
		$pdf->Cell(112);
		$pdf->Cell(50,6,utf8_decode('Fecha Liquidación:'),0,1,'R');
		$pdf->Ln(4);
		

		$pdf->SetFillColor(229, 229, 229);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(8,6,'#',1,0,'C',1);
		$pdf->Cell(30,6,'Cod. Producto',1,0,'C',1);
		$pdf->Cell(90,6,utf8_decode('Descripción'),1,0,'C',1);
		$pdf->Cell(25,6,'Precio Uni',1,0,'C',1);
		$pdf->Cell(17,6,'Cantidad',1,0,'C',1);
		$pdf->Cell(25,6,'Total',1,1,'C',1);


		$queryA = "SELECT ventas.id,  ventas.fecha, ventas.total
        productos.id, productos.descricion 
		FROM ventas
		INNER JOIN productos
		ON productos_vendidos.id_producto = productos.id_productos
		WHERE id = $id ";
		$res = $connect->query($queryA);
		
		$x = 1;
		$sum = 0;
		while($rowA = $res->fetch_assoc()) {
	

			//$sum = $sum + $rowA['cantidad'];
			$pdf->SetFont('Arial','',8);
			$pdf->Cell(8,6,$x,1,0,'C');
			$pdf->Cell(30,6,'codigo',1,0,'C');
			$pdf->Cell(90,6,utf8_decode('nombre'),1,0,'C');
			$pdf->Cell(25,6,'$'.'precio',1,0,'C');
			$pdf->Cell(17,6,'cantidad',1,0,'C');
			$pdf->Cell(25,6,'$'.number_format($rowA['total']),1,1,'R');
			$x++;
		 

		/*$pdf->Cell(128);
		$pdf->SetFont('Arial','',8);
		$pdf->SetFillColor(229, 229, 229);
		$pdf->Cell(67,6,'TOTAL PRODUCTOS: '.$sum,1,1,'R',1);
		$pdf->Cell(128);
		$pdf->Cell(67,6,'TOTAL: $'.number_format($row['total'],2,'.',','),1,1,'R',1);
		$pdf->Cell(128);
		$pdf->Cell(67,6,'SALDO POR LIQUIDAR: $'.number_format($row['saldo'],2,'.',','),1,1,'R',1);*/

		$pdf->Cell(128);
		$pdf->SetFont('Arial','',8);
		$pdf->SetFillColor(229, 229, 229);
		$pdf->Cell(42,6,'TOTAL PRODUCTOS: ',1,0,'R',1);
		$pdf->Cell(25,6,'#'.number_format($rowA['total']),1,1,'R',1);
		$pdf->Cell(128);
		$pdf->Cell(42,6,'TOTAL:',1,0,'R',1);
		$pdf->Cell(25,6,'$',1,1,'R',1);
		$pdf->Cell(128);
		$pdf->Cell(42,6,'SALDO POR LIQUIDAR',1,0,'R',1);
		$pdf->Cell(25,6,'$',1,1,'R',1);
	}
		$pdf->SetY(-89);
		$pdf->SetX(100);
		$pdf->Cell(50,6,'',1,0);
		$pdf->Cell(50,6,'',1,1);
		$pdf->SetX(100);
		$pdf->Cell(50,6,'',1,0);
		$pdf->Cell(50,6,'',1,1);
		$pdf->SetX(100);
		$pdf->Cell(50,6,'',1,0);
		$pdf->Cell(50,6,'',1,1);
		$pdf->SetX(100);
		$pdf->Cell(50,6,'',1,0);
		$pdf->Cell(50,6,'',1,1);
		$pdf->Ln(2);
		$pdf->SetFont('Arial','I', 6);
		$pdf->MultiCell(190,6,utf8_decode('Debe(mos) y Pagare(mos) incondicionalmente por este Documento el día: ___________________________ a la orden de: ___________________________________________________, la cantidad de: _________________________________________________________________________, Valor que recibi(mos) a mi (nuestra) entera satisfacion. Este documento esta sujeto a la condición de que, al no pagarsea su vencimiento, sera(n) exigible(s), si no fuere puntualmente cubierto el valor que este documento expresa, pagaré(mos) ademas sin que por ello se considere prorrogando el plazo fijado para el cumplimiento de esta obligación.'),1,1,'L',false);
		$pdf->Cell(60,12,'',0);
		$pdf->Cell(70,18,'Acepto(mos): _____________________________________________',1,0);

	
		$pdf->Output('Folio'.$row['id'].'_Orden.pdf','I')

?>