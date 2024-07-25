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
<title>INFINITO 7 INVENTARIO </title>
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
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>


	<!--registrar productos-->


<div class="modal fade" id="regitrarmercacnia" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
	<div class="modal-header">
  

  <h5 class="modal-title labelp" id="exampleModalLabel">Agregar productos</h5>
	<button type="button"class="cerrar" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
      
 
      <div class="modal-body"> 

	  <form method="post" action="total/inventario_reg.php" enctype="multipart/form-data" >
								
							<label class="modal-text" >Código</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" >

		<label class="modal-text">Nombre</label>
		<input required id="descripcion" name="descripcion" required cols="30" rows="5" class="txt form-control input-sm">
		<label class="modal-text">Descripción</label>
		<textarea id="caracteristicaV" name="caracteristica" required rows="3" cols="48" class="tarea txt form-control input-sm"></textarea>

		<label class="modal-text" >Venta</label>
		<input class="mdl-textfield__input form-control input-sm" name="precioVenta" required type="text"  >

		<label  class="modal-text" >Dolar</label>
		<input class="txt form-control input-sm" required  name="precioDolar" required type="text" >

		<label class="modal-text" >Stock</label>
		<input class="txt form-control input-sm" name="existencia" required  type="text"  >
			
				<label class="modal-text">Categoria</label>
				<select required class="txt form-control input-sm"  name="categorias">
				<option value="A">Seleccionar categoria</option>
	<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM categorias;");
$categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

				 <?php foreach($categorias as $categoria){
					?>


					<option value="<?php echo $categoria->id_categorias ?>"><?php echo $categoria->categorias ?></option>
				<?php } ?>
			</select>
			<label class="modal-text">Estado de la promoción</label>
				<select required class="txt form-control input-sm" id="categorias" name="promocion">
				<option value="A">Seleccionar preferencia</option>
				
			     <option value="promocion activa">promocionar</option>
			     <option value="N/P">N/Promocionar</option>
				
			</select>
				
			
	
<br>
<label  class="modal-text">Imagen del producto </label>
                         <input type="file"  required class="fotos" name="foto">

<div class="text-center">

									
				<input type="submit" class="btn registrar btn-secondary" name="crearventas" value="Agregar">
				</div>					
				</form>
  
      </div>
             
    </div>
  </div>
</div>

<!-- permisos admin  -->
<div class="modal fade" id="permisos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="total/eliminar_inventario.php" method="post">
	  <input class="txt form-control input-sm" type="text" hidden="" id="ide" name="id">
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
	 



	 

<!-- modal modificar inventario  -->
	 	<div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
	<div class="modal-header">
  

  <h5 class="modal-title labelp" id="exampleModalLabel">Actualizar productos</h5>
	<button type="button"class="cerrar" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
      
 
      <div class="modal-body"> 

				      	<form action="total/modificar-inventario.php" method="post" enctype="multipart/form-data">
				<input class="txt form-control input-sm" type="text" hidden="" id="idt" name="id" value="idpr ">
				<label class="modal-text">Codigo:</label>
				<input class="txt form-control input-sm" type="text" id="codigot" readonly="" name="codigo" placeholder="codigo">
				<label class="modal-text">Nombre:</label>
				<input class="txt form-control input-sm" type="text" id="nombret" name="descripcion"placeholder="nombre">
				<label class="modal-text">Descripción:</label>
				
          
				<textarea class="txt tarea form-control input-sm" type="text" id="caracterristicat" name="caracteristica"  placeholder="caracterristica"></textarea>
<label class="modal-text">Stock:</label>
					<input class="txt form-control input-sm" type="text" id="cantidadt" name="existencia" placeholder="cantidad">
				
				<label class="modal-text">Venta</label>
			
				<input class="txt form-control input-sm" type="text" id="preciot" name="precioVenta"  placeholder="precio de venta">
<label class="modal-text">Dolar:</label>
				<input class="txt form-control input-sm" type="text" id="preciocentat" name="precioDolar" placeholder="precio de dolar" >
<label class="modal-text">Categoria:</label>
				<select class=" txt form-control input-sm" id="categoriat"  name="categorias">
				<option value="A">Seleccionar categoria</option>
					<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM categorias;");
$categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

				 <?php foreach($categorias as $categoria){
					?>


					<option value="<?php echo $categoria->categorias ?>"><?php echo $categoria->categorias ?></option>
				<?php } ?>
			</select>

			<label class="modal-text">Estado de la promoción:</label>
				<select class=" txt form-control input-sm" id="promociont" name="promocion">
				<option value="A">Seleccionar preferencia</option>
				
			     <option value="promocion activa">promocionar</option>
			     <option value="N/P">N/Promocionar</option>
				
				 
			</select>

				
 

<p align="center"><input type="submit" name="actualizar"  class="btn registrar btn-primary" value="Registrar"></p>

        



</form>
  
      </div>
             
    </div>
  </div>
</div>


	 	


<!-- modal categorias  -->

<div class="modal fade" id="categoria"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="total/nuevacate.php" method="post">
	 
	
	  <input class="txt form-control input-sm" type="text"  name="categorias" placeholder="categorias">
			
		
			

		
				
			<input type="submit" class="btn registrar btn-primary" name="guardar"value="Ingresar">
			</form>
      </div>
     
    </div>
  </div>
</div>

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
								   <a class="disabled" href="admin.php" >
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
					<div class="table-responsive">
				
							
						
					<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Registro del producto exitoso
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong> Fallo el registro
						</div>
					<?php
				}else if($_GET["status"] === "6"){
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> El Código ingesado ya  existe, verifique el Código e intetelo de nuevo
						</div>
					<?php
				}
			}
		?>
		
<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "11"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Registro de catergorias exitosa
						</div>
					<?php
				}if($_GET["status"] === "12"){
					?>
						<div class="alert alert-info">
							<strong>Error</strong> Fallo el registro
						</div>
					<?php
				}
			 }
		?>			
       
				
                <div class="col-lg-12 ">
				<div class="text-center">
							

							<button href="#regitrarmercacnia"  data-toggle="modal" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary">
							<i class="zmdi zmdi-store"></i>	
																	</button>
							
							
							<button class=" mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--coloredbtn btn-secondary" href="#categoria"  data-toggle="modal"  id="btnAgregaVenta">C+</button>
							<a class="btn btn-info" target=”_blank” href="pdf/RptProductos.php"><i class="zmdi zmdi-file"></i></a>	
													</div>
													
                	<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "7"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Modificacion exitosa 
						</div>
					<?php
				}else if($_GET["status"] === "8"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong> Modificacion fallida
						</div>
					<?php
				}else if($_GET["status"] === "9"){
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> producto eliminado
						</div>
					<?php
				}else if($_GET["status"] === "10"){
					?>
					<div class="alert alert-success">
							<strong>¡Correcto!</strong> producto eliminado
						</div>
					<?php
			    }
			 }
		?>			
		<div class="">
		<table id="example" class="table-lg tabla-productos mdl-data-table table-bordered">
		
            <thead class="success">
                <tr>
                   
                    <th><div class="text-center">Código</div></th>
                    <th ><div class="text-center">Nombre</div></th>
                    <th><div class="text-center">Dolar</div></th>
                     <th><div class="text-center">venta</div></th>
                    <th><div class="text-center">Stock</div></th>
                   <th><div class="text-center">Fotos</div></th>
				   <th><div class="text-center">Descripción</div></th>  
                    <th><div class="text-center">Categorias</div></th>
                   <th><div class="text-center">Promoción</div></th>
                    <th><div class="text-center">Eliminar</th>
                    <th><div class="text-center">Modificar</div></th>
                  
                    

                </tr>
            </thead>
			
            <tbody>
                <?php foreach($productos as $producto){

		$dtos=$producto->id."||".
      	$producto->codigo."||".
       	$producto->descripcion."||".
       	$producto->caracteristica."||".
       	$producto->existencia."||". 
       	$producto->precioVenta."||".
     	$producto->precioDolar."||".
     	$producto->categorias."||".  
      	$producto->promocion ."||".
      	$producto->foto ; 
    
                 ?>


                <tr>
                    
                    <td><?php echo $producto->codigo ?></td>
                    <td><?php echo $producto->descripcion ?>
                    	
                    </td>
                    <td><?php echo number_format($producto->precioDolar,2,',','.');  ?> $</td>
                    <td><?php echo number_format($producto->precioVenta,3,'.',','); ?> bs </td>
                    <td><?php echo $producto->existencia ?></td>
                    
					<td><a  href="<?php echo "foto.php?id=" . $producto->id?> "><?php echo "<img src='total/".$producto->foto."'width='150' height='150'>"?></a>
                    	
						</td>
					<td>
                  	<textarea readonly=""  placeholder="<?php echo $producto->caracteristica ?>" rows="5" cols="40" class=" tarea tareatab input-sm "></textarea>
                    </td>

                    
                    <td><?php echo $producto->categorias ?></td>
                 	<td><?php echo $producto->promocion ?></td>
                   
                    <td><p align="center"><a class="btn btn-danger <?php if ($_SESSION['rol']== 'estandar'){ echo 'disabled'; }?>"   href="<?php echo "total/eliminar_inventario.php?id=" . $producto->id?> " ><i class="zmdi zmdi-delete"></i></p></a></td>
                    
					<td><p align="center"><a  href="#ventana " class="btn btn-secondary <?php if ($_SESSION['rol']== 'estandar'){ echo 'disabled'; }?>" data-toggle="modal"  onclick="agregartota('<?php echo $dtos ?>')"><i class="zmdi zmdi-edit"></i></p></a></td>
			
                   
                </tr>
                <?php } ?>
            </tbody>
        </table>
				
	</div>
	<div>

	</div>	
			
					</div>	


		
    
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
	
		<script src="vendor/bootstrap.bundle.min.js.descarga"></script>
       
   
 
</body>
</html>