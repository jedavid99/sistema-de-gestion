<?php 

	
include_once "../base_de_datos.php";

$id =$_POST["id"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioVenta = $_POST["precioVenta"];
$precioDolar= $_POST["precioDolar"];
$existencia = $_POST["existencia"];
$categorias = $_REQUEST["categorias"];
$caracteristica = $_POST["caracteristica"];
$promocion = $_POST["promocion"];





 

$sentencia = $base_de_datos->prepare("UPDATE productos SET codigo = ?, descripcion = ?, precioDolar = ?, precioVenta = ?, existencia = ?  ,categorias = ?, caracteristica = ?, promocion = ?  WHERE id = ?;");
$resultado = $sentencia->execute([$codigo, $descripcion, $precioDolar, $precioVenta, $existencia ,$categorias,$caracteristica,$promocion, $id]);

if (!$resultado) {

header("Location:../inventario.php?status=8");

} else {

header("Location:../inventario.php?status=7");
}




?>