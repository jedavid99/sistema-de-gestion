 <?php 

include_once "../base_de_datos.php";


$admin = $_POST["admin"];
$clave = $_POST["clave"];
$nombre = $_POST["nombre"];





$regist = "INSERT INTO administrador7 (nombre,admin,clave) VALUES ('$nombre','$admin','$clave')";

// verificar atributos del usuario
$verificar_usuario = mysqli_query($conex,"SELECT * FROM administrador7 WHERE admin = '$admin'");

if (mysqli_num_rows($verificar_usuario) > 0){
	header("Location: ../admin.php?status=11");

	exit;
}

// verificar atributos del usuario





$proces = mysqli_query($conex,$regist);


if (!$proces) {

header("Location: ../admin.php?status=10");
	
} else {

header("Location: ../admin.php?status=9");
}


mysqli_close($conex);

?>