<?php 

session_start();

$usuario = $_SESSION ;
if ($usuario == null || $usuario=''){
	header("location:index.php");

	 die();
	  }
session_destroy();
header("location:index.php");








 ?>