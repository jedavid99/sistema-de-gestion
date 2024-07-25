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
	<title>INFINITO 7 Administrador</title>
	<link rel="icon" type="image/png" href="images/icons/logo.jpg"/>

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/modal-admi.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/modificacion.css">

	<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main2.js" ></script>
	<script src="js/fucion.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/traduccion.js"></script>
	<script src="js/jquery-3.3.1.js"></script> 
</head>
<body> 






	 <?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM usuarios;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>



	






<!--modal modificacion de usuarios-->

	<div class="modal fade " id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
	<div class="modal-header">
  


	<button type="button"class="cerrar" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>

      <div class="modal-body"> 

				      	<form action="admin/modficar-usario.php" method="post">
				<input class="txt" type="text" hidden="" id="idusu" name="id">
				<label class="modal-text">Nombre:</label>
				<input class="form-control txt input-sm" type="text" id="nombreu" name="nombre"  placeholder="nombre">
				<label class="modal-text">Apellidos:</label>
				<input class="form-control txt input-sm" type="text" id="apelu" name="apellidos"  placeholder="apellido">
				<label class="modal-text">Cedula:</label>
				<input class="form-control txt input-sm" type="text" id="cedulau" name="cedula"  placeholder="cedula">
				<label class="modal-text">Clave:</label>
				<input class="form-control txt input-sm" type="text" id="claveu" name="clave"  placeholder="clave">
				<label class="modal-text">Usuario:</label>
				<input class="form-control txt input-sm" type="text" id="usuariou" name="usuario"  placeholder="usuario">




<p align="center"><input type="submit" name="actualizar" id="actualizaradmin" class="btn registrar btn-secondary" value="Actualizar"></p>
        



</form>
  
      </div>
             
    </div>
  </div>
</div>
	<!-- Notifications area -->
	
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
							           <a href="#"  data-toggle="modal" data-target="#loginadmin" >
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
		
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			
			
				
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						
							
							
		
		
						<br>		<br>	<br>
				<div class="table-responsive">
		<table id="tablausu"  class="table table-bordered mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width" style="width:100%">
      <?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Usuario eliminado correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-warning">
							<strong>Usuario:</strong> Modificado exitosamente 
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El usuario no pudo ser eliminado, intentelo nuevamente 
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong> Modificacion del usuario fallida, intentelo nuevamente 
						</div>
					<?php
				}
			}
		?>		
            <thead class="success">
            	<th colspan="8"><center><h5 class="tittles">Usuarios  </h5></center></th>
                <tr>
                    
                    <th>Nombre</th>
                    <th >Apellidos</th>
                    <th>Cedula</th>
					<th >Usuario</th>
					<th >rol</th>
                    <th>Clave</th>
                    <th>Elimiar</th>

					<th>Actualizar</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $producto){

$usuarm=$producto->id."||".
      $producto->nombre."||".
      $producto->apellidos."||".
       $producto->cedula."||".
       $producto->clave."||".
       $producto->usuario;
       
    
                 ?>
                <tr>
                    
                    <td><?php echo $producto->nombre?></td>
                    <td><?php echo $producto->apellidos ?></td>
                    <td><?php echo $producto->cedula ?></td>
					<td><?php echo $producto->usuario ?></td>
					<td><?php echo $producto->rol ?></td>
                    <td><?php echo $producto->clave ?></td>
                   <td><p align="center"><a  class="btn btn-danger" href="<?php echo "admin/elimina_usuario.php?id=" . $producto->id?>"><i class="zmdi zmdi-delete"></i></a> </p> </td>
					<td><p align="center"><a  class="btn btn-secondary"  href="#modificar"  data-toggle="modal"  onclick="usuariosdatos('<?php echo $usuarm ?>')"><i class="zmdi zmdi-edit"></i></a> </p> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
				
	
	
	

			
		
					</div>
								</div>



<br><br>




							</div>
						
					</div>
				</div>
			</div>
		</div>
	

						
						



						</div>
								

								
						

		
			
			
			
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop"> 
					
					
			
		</div>
		
 <script type="text/javascript" src="datatables/datatables.min.js"></script> 
 <script src="vendor/bootstrap.bundle.min.js.descarga"></script>
       
</body>

</html>