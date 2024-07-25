<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   $this->Image('../images/ccccc.jpg',40,30,50);
    // Arial bold 15
    $this->SetFont('Times','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
   
$this->Cell(50,8,'ventas',30 ,28,50);
    // Salto de línea
    $this->Ln();
    $this->SetFont('Times','',12);
    $this->Cell(80);
$this->Cell(68,8,'Inversiones Infinito 7 C.A.',30 ,28,50);
$this->Cell(50,4,'RIF: J-40601299-8',50,50,50);

$this->MultiCell(100,6,utf8_decode('Av. Bolívar Edificio Oliveira Local N°5, Sector El Carmen, Mariara, Edo. Carabobo.
Teléfono 0412-5054490/ 04145949168'),0,'J',0);

$this->SetFont('Times','B',12);
  $this->Ln(20);
$this->Cell(8);
 
 $this->SetTextColor(20,0,50);


$this->Cell(10,6,utf8_decode('id'),1,'J',0,0);

$this->Cell(30,6,'fecha',1,0,'C',0);
$this->Cell(100,6,' Produtos',1,1,'C',0);

}













// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}


include_once "../base_de_datos.php";


$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT( productos.codigo, '..',  productos.descripcion, '..', productos.promocion , '..', productos.categorias , '..', productos.precioVenta , '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();



foreach($ventas as $venta){


$pdf->Ln(0);
    $pdf->Cell(8);
$pdf->SetFont('Arial','',7);




$pdf->Cell(10,12,utf8_decode($venta->id),1,0,'C',0);

$pdf->Cell(30,12,utf8_decode($venta->fecha),1,1,'C',0);



 foreach(explode("__", $venta->productos) as $productosConcatenados){ 
                $producto = explode("..", $productosConcatenados); 



  	
$pdf->SetFont('Arial','',8);

$pdf->Cell(8);
 $pdf->SetTextColor(0,0,8);

  $pdf->Cell(40);
$pdf->multiCell(30,10,utf8_decode($producto[1]),1,'C',0);
$pdf->Cell(48);
$pdf->Cell(30,10,utf8_decode($producto[2]),1,'L',0);

//$pdf->cell(20,10,$producto[3],1,0,'L',0);

//$pdf->Cell(20,10,$producto[4],1,0,'L',0);
//$pdf->Cell(20,10,$producto[5],1,0,'L',0);
//$pdf->Cell(20,10,$venta->total,1,0,'L',0);


}
}

$pdf->Output();


?>


 
  