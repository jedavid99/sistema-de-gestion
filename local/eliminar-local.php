
<?php 
if (isset($_GET['id']))
		$id_eliminar=$_GET['id'];
	//Conexion a base de datos
		
	include_once "../base_de_datos.php";
	//sentencia sql
		 $sql= "delete from gastos where id = '$id_eliminar'";
	//Ejecutar sentencia SQL	 
		 $resultado=mysqli_query($conex,$sql);
		 


		 if (!$resultado) {

	header("Location: ../gastos.php?status=10");
	
} else {

header("Location: ../gastos.php?status=7");
}




 ?>