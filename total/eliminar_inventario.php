
<?php 
if (isset($_GET['id']))
		$id_eliminar=$_GET['id'];
	//Conexion a base de datos
		
	include_once "../base_de_datos.php";
	//sentencia sql
		 $sql= "delete from productos where id = '$id_eliminar'";
	//Ejecutar sentencia SQL	 
		 $resultado=mysqli_query($conex,$sql);
		 


		 if (!$resultado) {

	header("Location: ../inventario.php?status=6");
	
} else {

header("Location: ../inventario.php?status=10");
}




 ?>