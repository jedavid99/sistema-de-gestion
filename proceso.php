 <?php 




include_once "base_de_datos.php";
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$clave = $_POST["clave"];
$cedula = $_POST["cedula"];
$usuario = $_POST["usuario"];
$usrol = $_POST["rol"];


$regist = "INSERT INTO usuarios (nombre,apellidos,cedula,usuario,clave,rol) VALUES ('$nombre','$apellidos','$cedula','$usuario','$clave','$usrol')";

// verificar atributos del usuario
$verificar_usuario = mysqli_query($conex,"SELECT * FROM usuarios WHERE usuario = '$usuario'");

if (mysqli_num_rows($verificar_usuario) > 0){
	header("Location: registro.php?status=5");

exit;

}

// verificar atributos del usuario





$proces = mysqli_query($conex,$regist);


if (!$proces) {

	header("Location: registro.php?status=6");
	
} else {

	header("Location: registro.php?status=1");
	
	 
}


mysqli_close($conex);

?>