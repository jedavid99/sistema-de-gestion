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
	<title>INFINITO 7 GASTO DE LA EMPRESA</title>
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
$sentencia = $base_de_datos->query("SELECT * FROM gastos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>








<!--agrgar producto-->



<div class="modal fade " id="agregarproducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
  

	  <h5 class="modal-title labelp" id="exampleModalLabel">Agregar gastos</h5>
        <button type="button"class="cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

		
       

      <div class="modal-body"> 

	  <form method="post" action="local/registro_local.php" >
									<label class="modal-text">Código</label>
			<input  type="text"  class="txt form-control input-sm"  name="codigo">	
				<label class="modal-text" >Nombre </label>
			<input  type="text"  class="txt form-control input-sm"  name="nombre">					
			<label class="modal-text">Cantidad o capacidad </label>
			<input type="text"  class="txt form-control input-sm" name="cantidad">
			
			<label class="modal-text">Descripción</label>
			<textarea   name="caracteristica" rows="3" cols="48" class="txt tarea form-control input-sm"></textarea>
			<label class="modal-text">Estado del producto</label>
		
			<input type="text"  class="txt tarea form-control input-sm"  name="estado">
			<label class="modal-text">Precio</label>
			<input  type="text"  class="txt tarea form-control input-sm"  name="precio">
											
											<div class= "text-center">
											<button  class="btn registrar btn-secondary" name="guardar">Registrar</button>
											</div>

																</form>
  
      </div>
             
    </div>
  </div>
</div>




<div class="modal fade" id="permisos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="local/eliminar-local.php" method="post">
	  <input class="txt form-control input-sm" type="text" hidden="" id="idg" name="id">
	  <label class="modal-text">Admin:</label>
	  <input class="form-control input-sm txt"  type="text" name="admin" placeholder="Admin">
				<label class="modal-text">clave:</label>
		
			

			<input class="form-control input-sm txt"  type="password" name="clave" placeholder="Clave">
				
			<p align="center"><input type="submit" class="btn registrar btn-primary" name="guardar"value="Ingresar"></p>
			</form>
      </div>
     
    </div>
  </div>
</div>






<!-- modal modificar gastos -->


	<div class="modal fade " id="ventana" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
  

	  <h5 class="modal-title labelp" id="exampleModalLabel">Actualizar productos</h5>
        <button type="button"class="cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

		
       

      <div class="modal-body"> 

				      	<form action="local/modifica-prod.php" method="post">
				<input class="form-control input-sm txt" type="text" hidden="" id="idpr" name="id"value="idpr ">
				<label class="modal-text">Codigo:</label>
				<input class="form-control input-sm txt" readonly="" type="text" id="codigo" name="codigo"value="codigo " placeholder="codigo">
				<label class="modal-text">Nombre:</label>
				<input class="form-control input-sm txt" type="text" id="nombre" name="nombre" value="nombre" placeholder="nombre">
				<label class="modal-text">Estado del producto:</label>
				<input class="form-control input-sm txt" type="text" id="estado" name="estado" value="estado" placeholder="estado">
				<label class="modal-text">Cantidad o capacidad:</label>
				
				<input class="form-control input-sm Txt" type="text" id="cantidad" name="cantidad" value="cantidad" placeholder="cantidad">

				<label class="modal-text">Caracterristica:</label>
				
				<textarea class="form-control tarea input-sm txt" type="text" id="caracterristica" name="caracteristica" value="caracterristica" placeholder="caracterristica"></textarea>
				<label class="modal-text">Precio: </label>
				<input class="form-control input-sm txt" type="text" id="precio" name="precio" value="precio" placeholder="precio" >
				
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


		
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__tab-bar">
				
				</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						
						
						
								
									<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Producto registrado correctamente
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> Algo salió mal mientras se realizaba el registro
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>Codigo existente, Ingresar otro codigo o verifivar codigo en el listado
						</div>
					<?php
				}
			}
		?>		
						
								

							
</div>

								


</div>
							
<div class=" text-center">
							

							<button href="#agregarproducto"  data-toggle="modal" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary">
							<i class="zmdi zmdi-balance"></i>	
																	</button>
							
							
							
													</div>
															
					
							<div class="table container">
									
        <div class="row">
                <div class="col-lg-12">		
               <a class="btn btn-info" target=”_blank” href="pdf/RptGastos.php"><i class="zmdi zmdi-file"></i></a>	
<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "7"){
					?>
					<div class="alert alert-primary">
							<strong>Correcto:</strong> producto eliminado exitosamente
						</div>
					<?php
				}else if($_GET["status"] === "8"){
					?>
					<div class="alert alert-success">
							<strong>Correcto:</strong> producto modificado exitosamente
						</div>
					<?php
				}else if($_GET["status"] === "9"){
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> El producto no se pudo modificar
						</div>
					<?php
				}else if($_GET["status"] === "10"){
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> producto no eliminado
						</div>
					<?php
				

				}
			}
		?>
			<div class="table-responsive">
		<table id="example"  class="table tablas table-bordered mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width">
     	 <thead class="success">
                <tr>
                    
                    <th>Código</th>
                    <th >Nombre</th>
                    <th> <center>Caracterristica</center></th>
                    <th>Estado</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Eliminar</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalGasto = 0;
                foreach($productos as $producto){ 


$datos=$producto->id."||".
	  $producto->codigo."||".
	    $producto->nombre."||".
     $producto->estado."||".
     $producto->caracteristica."||". 
     $producto->cantidad."||".  
   $producto->precio;
$totalGasto = $totalGasto + $producto->precio;

					?>
                <tr>
                    
                    <td ><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->nombre ?></td>
                  <td>
                  <textarea readonly="" id="caracteristicaV" placeholder="<?php echo $producto->caracteristica ?>" values ="" name="caracteristica" rows="3" cols="48" class="tarea tareatab input-sm"></textarea>	
                  </td>
					<td><?php echo $producto->estado?></td>
                    
               	<td><?php echo $producto->cantidad ?></td>
					<td><?php echo number_format( $producto->precio,3,'.',','); ?> BS</td>
                 	
                    
                  <td> <p align="center"><a class="btn btn-danger <?php if ($_SESSION['rol']== 'estandar'){ echo 'disabled'; }?>"   href="<?php echo "local/eliminar-local.php?id=" . $producto->id?> "><i class="zmdi zmdi-delete" ></p></a></td>
			
            	  <td><p align="center"><a  href="#ventana " class="btn btn-secondary <?php if ($_SESSION['rol']== 'estandar'){ echo 'disabled'; }?>" data-toggle="modal" onclick="agregarlocal('<?php echo $datos ?>')"><i class="zmdi zmdi-edit"></i></p></a></td>
                   
                </tr>

                <?php } ?>

            </tbody>
<tfoot>
	

<tr>
	<td colspan="5"><h2 class="tittles">Total</td>
	<td  > </h2><h3><?php echo number_format($totalGasto,3,'.','.'); ?> BS</h3></td>

</tr>


</tfoot>

           
        </table>
		</div>	
	</div>
	</div>	
			
				</div>
			</div>
		</div>
						</div>
					</div>
				</div>
			</div>

	
	
		
<script src="vendor/bootstrap.bundle.min.js.descarga"></script>

 <script  src="datatables/datatables.min.js"></script> 
 <script src="vendor/bootstrap.bundle.min.js.descarga"></script>
       


		<section class="full-width" style="margin: 30px 0;">
		
	</section>
	
	
</body>

</html>