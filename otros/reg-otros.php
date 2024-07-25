<?php 




include_once "base_de_datos.php";


$codigo = $_POST["codigo"];
$categorias = $_POST["categorias"];
$nombre = $_POST["nombre"];

$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];




$regist = "INSERT INTO otros7 (codigo,categorias,nombre,cantidad,precio) VALUES ('$codigo','$categorias','$nombre','$cantidad','$precio')";




$sentencia = mysqli_query($conex,$regist);
if (!$sentencia) {
	echo '<script>';
	 echo 'alert("producto no registrado");';
	 	 echo 'window.location.href="../otros.php";'; 

	 echo '</script>';

}else {

echo '<script>';
	 echo 'alert("registro exitoso");';
		 echo 'window.location.href="../otros.php";'; 

	 echo '</script>';
}


mysqli_close($conex);










 ?>