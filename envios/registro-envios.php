<?php 




include_once "../base_de_datos.php"; 

$numerof = $_POST["numerof"];
$codigo = $_POST["codigop"];
$nombre = $_POST["nombre"];
$promocion = $_POST["promocion"];
$categorias = $_POST["categorias"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];
$numeroguia = $_POST["numeroguia"];
$fecha = date("Y-m-d");




$regist = "INSERT INTO envios (codigo,nombre,promocion,categorias,precio,cantidad,numeroguia,fecha) VALUES ('$codigo','$nombre','$promocion','$categorias','$precio','$cantidad','$numeroguia' ,'$fecha')";

$sentencia = $base_de_datos->prepare("INSERT INTO envios(numerof,codigo, nombre, promocion, categorias, precio,cantidad,numeroguia,fecha) VALUES (?,?, ?, ?, ?, ?,?,?,?);");
$resultado = $sentencia->execute([$numerof,$codigo, $nombre, $promocion, $categorias, $precio ,$cantidad, $numeroguia ,$fecha]);



if (!$resultado) {
	header("Location:../envios.php?status=2");

}else {
header("Location:../envios.php?status=1");
}








?>