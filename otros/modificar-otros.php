<?php 

include_once "base_de_datos.php";
	

$id = mysqli_real_escape_string($conex, $_POST["id"]);
$nombre  = mysqli_real_escape_string($conex, $_POST["nombre"]);

$caracterristica  = mysqli_real_escape_string($conex, $_POST['caracterristica']);
$cantidad   = mysqli_real_escape_string($conex, $_POST["cantidad"]);

$precio  = mysqli_real_escape_string($conex, $_POST["precio"]);


  $proces = mysqli_query($conex,"UPDATE otros7 SET  nombre='$nombre',caracterristica='$caracterristica' ,cantidad='$cantidad' ,precio='$precio' WHERE id='$id'");

if (!$proces) {

echo '<script>';
	 echo 'alert("modificacion fallidad");';
	 echo 'window.location.href="../otros.php";';
	 echo '</script>';

} else {

	echo '<script>';
	 echo 'alert("modificacion  exitoso");';
	echo 'window.location.href="../otros.php";';
	 echo '</script>';
}


mysqli_close($conex);

?>