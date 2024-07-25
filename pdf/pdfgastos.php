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
   
$this->Cell(68,8,'Gastos',30 ,28,50);
    // Salto de línea
    $this->Ln();
    $this->SetFont('Times','',12);
    $this->Cell(80);
$this->Cell(68,8,'Inversiones Infinito 7 C.A.',30 ,28,50);
$this->Cell(50,4,'RIF: J-40601299-8',50,50,50);

$this->MultiCell(100,6,utf8_decode('Av. Bolívar Edificio Oliveira Local N° 5, Sector El Carmen, Mariara, Edo. Carabobo.
Teléfono 0412-5054490/ 04145949168'),0,'J',0);

$this->SetFont('Times','B',12);
  $this->Ln(20);
$this->Cell(8);
 
 $this->SetTextColor(20,0,50);


$this->Cell(20,10,'Codigo',1,0,'C',0);
$this->Cell(40,10,'Nombre',1,0,'C');
$this->Cell(50,10,'Caracteristica',1,0,'C',0);
$this->Cell(20,10,'Estado ',1,'C',0,0);
$this->Cell(20,10,'Precio',1,0,'C',0);
$this->Cell(20,10,'Cantidad',1,1,'C',0);


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


require ('../base_de_datos.php');
$sentencia = $base_de_datos->query("SELECT * FROM gastos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

  	
$totalGasto = 0;
  foreach($productos as $producto){ 


$pdf->Ln(0);
  	$pdf->Cell(8);
$pdf->SetFont('Arial','',8);

 $pdf->SetTextColor(0,0,8);

$pdf->Cell(20,10,utf8_decode($producto->codigo),1,0,'C',0);

$pdf->Cell(40,10,utf8_decode($producto->nombre),1,0,'C',0);
$pdf->SetFont('Arial','',8);
$pdf->cell(50,10,utf8_decode($producto->caracteristica),1,0,'A',0);

$pdf->Cell(20,10,$producto->estado ,1,0,'C',0);
$pdf->Cell(20,10,number_format($producto->precio,2,',','.'),0,0,'C',0);
$pdf->Cell(20,10,$producto->cantidad,1,1,'C',0);
$totalGasto = $totalGasto + $producto->precio;


}
$pdf -> Cell(30,6,'Total: $'.number_format($totalGasto),0,0,'L',0);
 $pdf->Cell(138);
$pdf->multiCell(20,10,'total cantidad',1,'J',0);

$pdf->Output();


?>