<?php 

		
include_once "../base_de_datos.php";

$id =  $_POST["id"];
$codigo = $_POST["codigo"];
$nombre  =  $_POST["nombre"];
$estado =  $_POST['estado'];
$caracteristica  = $_POST['caracteristica'];
$cantidad   =  $_POST["cantidad"];
$precio  =  $_POST["precio"];





$sentencia = $base_de_datos->prepare("UPDATE gastos SET codigo = ?, nombre = ?, estado = ?, caracteristica = ?, cantidad = ?  ,precio = ? WHERE id = ?;");
$resultado = $sentencia->execute([$codigo, $nombre, $estado, $caracteristica, $cantidad ,$precio,$id]);

if (!$resultado) {

header("Location: ../gastos.php?status=9");

} else {

	header("Location: ../gastos.php?status=8");
}


mysqli_close($conex);

?>

 					

