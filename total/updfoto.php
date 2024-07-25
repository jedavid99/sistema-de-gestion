<?php 

	
include_once "../base_de_datos.php";

$id =$_REQUEST["id"];

$imagen=$_FILES['foto'] ['name'];

$archivo=$_FILES['foto'] ['tmp_name'];

$ruta="foto";

$ruta=$ruta."/".$imagen;

move_uploaded_file($archivo,$ruta);


 

$sentencia = $base_de_datos->prepare("UPDATE productos SET foto = ? WHERE id = ?;");
$resultado = $sentencia->execute([$ruta,$id]);

if (!$resultado) {

header("Location:../inventario.php?status=8");

} else {

header("Location:../inventario.php?status=7");
}




?>