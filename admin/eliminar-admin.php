<?php 

include_once "../base_de_datos.php";
if (isset($_GET['id']))
		$id=$_GET['id'];
	//Conexion a base de datos
	

	//sentencia sql
		 $sql2= "delete from administrador7 where id = '$id'";
	//Ejecutar sentencia SQL	 
		 $resul=mysqli_query($conex,$sql2);
		 


		 if (!$resul) {

header("Location: ../admin.php?status=8");
} else {

	
header("Location: ../admin.php?status=7");
}




 ?>