<?php 
include_once "base_de_datos.php";
if (isset($_GET['id_eliminar']))
		$id_eliminar=$_GET['id_eliminar'];
	//Conexion a base de datos
	
include_once "base_de_datos.php";
	//sentencia sql
		 $sql2= "delete from otros7 where id = '$id_eliminar'";
	//Ejecutar sentencia SQL	 
		 $resul=mysqli_query($conex,$sql2);
		 


		 if (!$resul) {

	echo "no se pudo eliminar el producto";
	
} else {

	echo '<script>';
	 echo 'alert("producto eliminado");';
	 echo 'window.location.href="../otros.php";'; 
	 echo '</script>';
}




 ?>