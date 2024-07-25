<?php 


session_start();

$usuario = $_SESSION ;
$rol = $_SESSION;
if ($usuario == null || $usuario=''){
	
	
	header("Location: index.php");
	



}



 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INFINITO 7</title>
	<link rel="icon" type="image/png" href="images/icons/logo.jpg"/>
	<link rel="stylesheet" type="text/css" href="css/modal-admi.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/modal-admi.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/modificacion.css">
	
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main2.js" ></script>


</head>
<body>

	 <?php 
	//Conexion a base de datos

	include_once "base_de_datos.php";
	//sentencia sql
		
	
		$usuarios=mysqli_query($conex, "select * from usuarios order by id desc");
	$envios=mysqli_query($conex, "select * from envios order by id desc");
	 $gastos=mysqli_query($conex, "select * from gastos order by id desc");
	 $inventario=mysqli_query($conex, "select * from productos order by id desc");
	 $ventas=mysqli_query($conex, "select * from ventasfinal order by id desc");
		

	 ?>

	

	<!-- navBar -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
				
					<li  class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Salir</div>
					</li>
					<li class=" text-center text-condensedLight noLink" ><H6>Nombre: <?php echo $_SESSION['nombre']; ?></H6> <small></small></li>
					<li class="noLink">
						
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- navLateral -->
		<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> control del inventario
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					
				</div>
				
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<a href="home.php"><img src="images/Infinito Png.png" alt="Avatar" class="img-responsive"></a>
			</div>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="home.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Inicio
							</div>
						</a>
					</li>



				
			          	
							  
							<?php	
					if ($_SESSION['rol']== 'admin'){   
					echo '<li class="full-width divider-menu-h"></li><li class="full-width">
						    <a href="#!" class="full-width btn-subMenu">
							  <div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							  </div>
							<div class="navLateral-body-cr hide-on-tablet">
								Administrador
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						    </a>
						      <ul class="full-width menu-principal sub-menu-options">
							       <li class="full-width">
								   <a href="admin.php" >
									     <div class="navLateral-body-cl">
									        <i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>
									     </div>
									  <div class="navLateral-body-cr hide-on-tablet">
										administrar usuarios
									  </div>
								   </a>
							    </li>
						      </ul>
					    </li>';
					 }else{

					 }
					?> 
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Categorias
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="gastos.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-balance"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										  Gastos
									</div>
								</a>
							</li>

					<li class="full-width">
						<a href="inventario.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								inventario 
							</div>
						</a>
					</li>
							<li class="full-width">
								<a href="ventas.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-card"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Ventas
									</div>
								</a>
							</li>
							

			<li class="full-width">
						<a href="envios.php" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-truck"></i>	
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Envios
							</div>
						</a>
					</li>

							
						</ul>
					</li>

					
					<li class="full-width">
						
					</li>
					
					
				</ul>
			</nav>
		</div>
	</section>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<br><section class="full-width header-well">
			
			
			<div class="full-width header-well-text">
				
				<img class="img-responsive-logo" src="images/Infinito Png.png">
			</div>
		</section>
		<section class="full-width text-center" style="padding: 40px 0;">

			<h3 class="text-center tittles">Totalizacion</h3>
			
	
		
	<br>
	
			<article class="full-width tile">
				<div class="tile-text">
				<div class="icon-body">
							<i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>	
							</div> <?php if ($_SESSION['rol']== 'admin'){ echo '<a href="admin.php" >'; }else{

}?>   <span class="text-condensedLight">
						<?php echo mysqli_num_rows($usuarios) ?><br>
						<small class="text-center tittles">usuarios</small>
					</span></a>
				</div>
				
			</article>
		
			<article class="full-width tile">
				<div class="tile-text" >
				<div class="icon-body">
							<i class="zmdi zmdi-card"></i>	
							</div><a href="ventas.php"><span class="text-condensedLight">
					<?php echo mysqli_num_rows($ventas) ?><br>
						<small class="text-center tittles">Ventas</small>
					</span></a>
				</div>
				
			</article>
		
	

<article class="full-width tile">
				<div class="tile-text">
				<div class="icon-body">
							<i class="zmdi zmdi-balance"></i>	
							</div><a href="gastos.php"><span class="text-condensedLight">
					<?php echo mysqli_num_rows($gastos) ?><br>
						<small class="text-center tittles">Gastos</small>
					</span></a>
				</div>
				
			</article>

			
			
			
			<article class="full-width tile">
				<div class="tile-text">
				<div class="icon-body">
							<i class="zmdi zmdi-truck"></i>	
							</div><a href="envios.php"><span class="text-condensedLight"><span class="text-condensedLight">
						<?php echo mysqli_num_rows($envios) ?><br>
						<small class="text-center tittles">Envios</small>
					</span></a>
				</div>
				
			</article>


			<article class="full-width tile">
				<div class="tile-text">
				<div class="icon-body">
							<i class="zmdi zmdi-store"></i>	
							</div><a href="inventario.php"><span class="text-condensedLight"><span >
						<?php echo mysqli_num_rows($inventario) ?><br>
						<small class="text-center tittles">Inventario</small>
					</span></a>
				</div>
				
			</article>
		</section>
			
	</div>
	
		<script src="vendor/bootstrap.bundle.min.js.descarga"></script>
       
		<section class="full-width" style="margin: 30px 0;">
			
			
		</section>
			
	
	
		

</body>

	
</html>