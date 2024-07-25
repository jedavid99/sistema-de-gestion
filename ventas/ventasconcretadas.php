<?php

include_once "../base_de_datos.php";
$factura = $_POST["factura"];
$fecha = date("Y-m-d");
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$estatud= $_POST["estatud"];
$categoria = $_POST["categoria"];
$precioVenta = $_POST["precioVenta"];
$cantidad = $_POST["cantidad"];
$total = $_POST["total"];



$sentencia = $base_de_datos->prepare("INSERT INTO ventasfinal(factura, fecha, codigo ,nombre, estatud,categoria,precioVenta,cantidad,total) VALUES (?, ?, ?, ?, ?,?,?,?,?);");
$resultado = $sentencia->execute([$factura, $fecha, $codigo, $nombre, $estatud ,$categoria, $precioVenta ,$cantidad,$total]);










if($resultado === TRUE){
	header("Location:../ventas.php");
	exit;
}
header("Location:../ventas.php");


?>

