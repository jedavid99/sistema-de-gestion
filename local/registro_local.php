<?php 



include_once "../base_de_datos.php";

$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$estado = $_POST["estado"];
$caracteristica = $_POST["caracteristica"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];




include_once "../base_de_datos.php";

$verificar_codigo = mysqli_query($conex,"SELECT * FROM gastos WHERE codigo = '$codigo'");

if (mysqli_num_rows($verificar_codigo) > 0){
	header("Location: ../gastos.php?status=5");

exit;

}

$sentencia = $base_de_datos->prepare("INSERT INTO gastos(codigo, nombre, estado,caracteristica, cantidad,precio) VALUES (?, ?, ?, ?, ?,?);");
$resultado = $sentencia->execute([$codigo, $nombre, $estado, $caracteristica, $cantidad ,$precio]);










if($resultado === TRUE){
	header("Location:../gastos.php?status=1");
	exit;
}
header("Location:../gastos.php?status=5");


?>