<?php 


include_once "../base_de_datos.php";

$id = mysqli_real_escape_string($conex, $_POST["id"]);
$nombre  = mysqli_real_escape_string($conex, $_POST["nombre"]);
$apellidos = mysqli_real_escape_string($conex, $_POST['apellidos']);
$cedula = mysqli_real_escape_string($conex, $_POST['cedula']);
$usuario = mysqli_real_escape_string($conex, $_POST['usuario']);
$clave = mysqli_real_escape_string($conex, $_POST['clave']);




$proces = mysqli_query($conex,"UPDATE usuarios SET nombre='$nombre' ,apellidos='$apellidos', cedula='$cedula',usuario='$usuario',clave='$clave'  WHERE id='$id'");






if (!$proces) {

header("Location: ../admin.php?status=4");

} else {

	header("Location: ../admin.php?status=2");
}


mysqli_close($conex);

?>