
<?php  
include_once "../base_de_datos.php";
if (isset($_GET['id']))
		$id=$_GET['id'];
	//Conexion a base de datos
	
include_once "../base_de_datos.php";
	//sentencia sql
		 $sql= "delete from usuarios where id = '$id'";
	//Ejecutar sentencia SQL	 
		 $resultado=mysqli_query($conex,$sql);
		 


		 if (!$resultado) {

	header("Location: ../admin.php?status=3");
	
} else {

header("Location: ../admin.php?status=1");
}




 ?>