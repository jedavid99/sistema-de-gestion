<?php 


include_once "base_de_datos.php";


$categorias = $_POST["categorias"];
$regist = "INSERT INTO clase (categorias) VALUES ('$categorias')";
$categorias = mysqli_query($conex,"SELECT * FROM clase WHERE categorias = '$categorias'");

if (mysqli_num_rows($categorias) > 0){
	echo '<script>
alert("categorias ya exitente"); window.history.go(-1); </script>';

	exit;
}





$sentencia = mysqli_query($conex, $regist);
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

