<?php 
session_start();


$errors = array();

if (isset($_POST['usuario']) and isset($_POST['clave'])) {
	# code...
	include('base_de_datos.php');
	$usuario = mysqli_real_escape_string($conex,$_POST['usuario']);
	$contrasena = mysqli_real_escape_string($conex,$_POST['clave']);

	$query = 'SELECT * FROM usuarios WHERE usuario="'.$usuario.'" ';
	$res = $conex->query($query);

	if ($row = mysqli_fetch_array($res)) {
		# code...
		if ($row["clave"] == $contrasena) {
			# code...
			$_SESSION["usuario"] = $row['usuario'];
			$_SESSION["clave"] = $row['clave'];
			$_SESSION["nombre"]= $row['nombre'];
			//$_SESSION["e-mail"]=$row['correo'];
			$_SESSION["id"]=$row['id'];
			$_SESSION["rol"]=$row['rol'];

			header('Location: home.php');
		}else{

			header('Location: index.php?status=6');

		}

	}else{
		header('Location: index.php?status=5');
	}
	mysqli_free_result($res);

}else{
	header('Location: index.php');
}



mysqli_close($connect);

?>
