<?php 


include_once "../base_de_datos.php";
$id = mysqli_real_escape_string($conex, $_POST["id"]);
$nombre  = mysqli_real_escape_string($conex, $_POST["nombre"]);
$admin = mysqli_real_escape_string($conex, $_POST['admin']);
$clave = mysqli_real_escape_string($conex, $_POST['clave']);







$proces = mysqli_query($conex,"UPDATE administrador7 SET nombre='$nombre' ,admin='$admin', clave='$clave' WHERE id='$id'");


if (!$proces) {

header("Location: ../admin.php?status=6");

} else {

	header("Location: ../admin.php?status=5");
}


mysqli_close($conex);

?>



