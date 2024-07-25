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
	<title>INFINITO 7 VENTAS </title>
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
	<script src="vendor/fecha/js/jscal2.js"></script>
<script src="vendor/fecha/js/lang/es.js"></script>

<link rel="stylesheet" type="text/css" href="vendor/fecha/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="vendor/fecha/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="vendor/fecha/css/steel/steel.css" />
	
</head>
<body>



<?php  


if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>




<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos.promocion , '..', productos.categorias , '..', productos.precioVenta ,'..', productos.precioDolar , '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>






<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>
<?php
include_once "base_de_datos.php";
$sentenciav = $base_de_datos->query("SELECT * FROM ventasfinal;");
$productosv = $sentenciav->fetchAll(PDO::FETCH_OBJ);

?>


<!-- envios -->

<div class="modal fade " id="Envios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
  

	  <h5 class="modal-title labelp" id="exampleModalLabel">Buscar productos</h5>
        <button type="button"class="cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body"> 

				      	<form action="envios/registro-envios.php" method="post">

	
	

				<input class="txt form-control input-sm " type="text" hidden="" id="ide" name="id"value="idpr ">
<label class="modal-text">Numero de factura</label>
				<input  class="txt form-control input-sm" type="text" id="numerof" name="numerof"  placeholder="numero de factura">
<label class="modal-text">Codigo del producto</label>
				<input  class="txt form-control input-sm" type="text" id="codigop" name="codigop"  placeholder="codigo del producto">
<label class="modal-text">Nombre del producto</label>
				<input  class="txt form-control input-sm" type="text" id="nombrep" name="nombre"  placeholder="nombre del producto">
				
			<label class="modal-text">Estado de la promoción</label>
				<input  class="txt form-control input-sm" type="text "id="promocione" name="promocion" placeholder="promocion activa">
				<label class="modal-text">Categorias</label>
				<input  class="txt form-control input-sm" type="text "id="categoria" name="categorias" placeholder="categorias">
			
	<label class="modal-text">Precio unico</label>
				<input  class="txt form-control input-sm" type="text" id="precioneto" name="precio" placeholder="precion ventas">
			<label class="modal-text">Cantidad por envio</label>
				<input  class="txt form-control input-sm" type="text" id="cantidade" name="cantidad" placeholder="cantidad">

				<label class="modal-text">Numero de guia</label>

                <input  class="txt form-control input-sm" type="text"  name="numeroguia" placeholder="Numero de guia">
					
<label class="modal-text">Fecha del envio</label>
	<input  class=" input-sm" name="fecha" type="text" id="fecha" placeholder="fecha del envio" size="20" readonly  />
<input  name="btnfecha" class="fechabtn  btn-secondary" id="btnfecha" type="button" value="..." />

<script type="text/javascript" >
    var calendario = Calendar.setup({
        onSelect: function(calendario) { calendario.hide() },
        showTime: true });
        calendario.manageFields("btnfecha", "fecha", "%d/%m/%Y");
</script>
				
		
			

				<p align="center"><input type="submit" name="actualizar"  class="btn registrar btn-primary" value="Registrar"></p>


</div>




        
 


</form>
 
      </div>
             
    </div>
  </div>
</div>



<!-- ventas -->

<div class="modal fade"  id="ventas"tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
<div class="modal-content "><div class="modal-header ">
        <h5 class="modal-title labelp" id="exampleModalLabel">Buscar productos</h5>
        <button type="button"class="cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body"> 


	
				      	<form action="ventas/ventasconcretadas.php" method="post">

	
			
				<label class="modal-text">Numero de facturas</label>
				<input readonly="" class="txt form-control input-sm" type="text" id="facturav" name="factura"  placeholder="numero de factura">
					<label class="modal-text">Fecha de la venta</label>
				<input readonly="" class="txt form-control input-sm" type="text" id="fechav" name="fecha" placeholder="fecha de la venta">
			<label class="modal-text">Codigo </label>
				<input readonly="" class="txt form-control input-sm" type="text "id="codigov" name="codigo" placeholder="codigo del prducto">
			<label class="modal-text">Nombre</label>
				<input readonly="" class="txt form-control input-sm" type="text "id="nombrev" name="nombre" placeholder="nombre del producto">
				
	<label class="modal-text">Estatud</label>
				<input readonly="" class="txt form-control input-sm" type="text" id="estatudv" name="estatud" placeholder=" estatud">
				
<label class="modal-text">Categorias</label>
				<input readonly="" class="txt form-control input-sm" type="text" id="categoriav" name="categoria" placeholder="categorias">
				<label class="modal-text">Precio del producto</label>
				<input readonly="" class="txt form-control input-sm" type="text" id="precioVentav" name="precioVenta" placeholder="precioVenta">
				
<label class="modal-text">Cantidad vendida</label>

				<input readonly="" class="txt form-control input-sm" type="text" id="cantidadv" name="cantidad" placeholder="cantidad vendida ">
				
		<label class="modal-text">Total Unico </label>
		<input  class="txt form-control input-sm" type="text" id="totalv" name="total" placeholder="total unico de la venta ">
		
			

		<p align="center"><input type="submit" name="actualizar" id="actualizaradmin" class="btn registrar btn-primary" value="Registrar"></p>


</div>




        
 


</form>
 
      </div>
             
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content "><div class="modal-header ">
        <h5 class="modal-title labelp" id="exampleModalLabel">Buscar productos</h5>
        <button type="button"class="cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<div class="modal-body"> 
		<div class="table-responsive">
	<table id="tabla" class="tabla-buscar text-center table-sm mdl-data-table table-bordered ">
			<thead >
				<tr >
					
					<th class="text-center">Código</th>
					<th class="text-center">Producto</th>
					
					<th class="text-center">venta</th>
					<th>Existencia</th>
					
				</tr>
			</thead>
			<tbody >
				<?php foreach($productos as $producto){ ?>
				<tr >
					
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->existencia ?></td>
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
		</div>
    </div>
  </div>
</div>
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
		<section class="full-width header-well">
			
			
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">agregar venta</a>
				<a href="#tabListAdmin" class="mdl-tabs__tab">listado de ventas</a>
			</div>
			
			
<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Procesar ventas 
							</div>
							<div class="full-width panel-content">

	
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto está agotado
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br>
		<form method="post" action="carrito/agregarAlCarrito.php">
			<label  class="labelp"  for="codigo">Código de barras:</label>
			<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
		</form>
		<br><br>
	
<div class="table-responsive">
		<table class="table table-bordered mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width ">
			<thead>
				<tr>
					<th>Id</th>
					<th>Código</th>
					<th>Descripción</th>
					
					<th>Venta</th>
					<th>Dolar</th>
					<th>Cantidad</th>
					<th>Promoicion</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->total;
					?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo number_format($producto->precioVenta ,3,',','.');  ?> bs</td>
					<td><?php echo number_format($producto->precioDolar ,1,',','.');?> $</td>
					<td><?php echo $producto->cantidad?></td>
					<td><?php echo $producto->promocion ?></td>
					<td><?php echo number_format($producto->total,3,',','.')?></td>
					<td><a class="btn btn-danger" href="<?php echo "carrito/quitarDelCarrito.php?indice=" . $indice?>"><i class="zmdi zmdi-delete"></i></a></td>
					
					
				</tr>
				<?php } ?>
			</tbody>
			
		</table>
</div>
		<table class="table  table-bordered mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width">
			
<tr><th><h3>Total </h3></th></tr>
			<tr>
				<td><h2><?php echo number_format($granTotal ,3,'.',',');   ?> BS</h2></td>
				
			</tr>
		</table>
		<form action="ventas/terminarVenta.php" method="POST">
		<div class="text-center">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">

			<button type="submit" class="btn btn-primary">Vender</button>

			<a href="ventas/cancelarVenta.php" class="btn btn-secondary">Cancelar venta</a>

			<button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
 Buscar codigo
</button>
</div>
		</form>
					
		
	</div>
									
						</div>
					</div>
				</div>
			</div>
		<div class="mdl-tabs__panel" id="tabListAdmin">
		<div class="table-responsive">
		<div class="table container">
	
        <div class="row ">
		
		
    
<table id="example"  class="table-bordered mdl-data-table table-sm mdl-js-data-table mdl-shadow--2dp full-width" >
			<thead><th colspan="9"><center><h5 class="tittles">Ventas por concretar </h5></center></th>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th><center>Productos vendidos</center></th>
					<th>Total</th>
					<th>Eliminar</th>
					<th>Reporte</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ 


					?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nombre</th>
									<th>Estatud</th>
									<th>Categorias</th>
									<th>PrecioVenta</th>
							
									<th>Cantidad</th>
									<th>total unico</th>
									<th>Concretar la ventas</th>

								</tr>
							</thead>
							<tbody>
								<?php $totalinico= 0;
								foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados);
$ventas= $venta->id."||".
    
	 $venta->fecha."||".
	 $producto[0]."||".
     $producto[1]."||".
     $producto[2]."||".
     $producto[3]."||".
     $producto[4]."||".
     $producto[6]."||".
    
      $totalinico;

      
   $totalinico =  $producto[6] * $producto[4];
								?>
								
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
                                     <td><?php echo $producto[3] ?></td>
                                     <td><?php echo number_format($producto[4] ,3,',','.');   ?> bs</td>
                                     <td><?php echo $producto[6] ?></td>
                                     
                                       <td><?php echo number_format($totalinico,3,'.',',');  ?> bs</td>
                                         
										<td><a class="btn btn-primary"  href="#ventas"  data-toggle="modal" onclick="agregaventas('<?php echo $ventas ?>')"><i class="zmdi zmdi-card"></i></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "ventas/eliminarVenta.php?id=".$venta->id?>"><i class="zmdi zmdi-delete"></i></a></td>
					<td><a class="btn btn-secondary" target=”_blank” href="<?php echo "pdf/printOrderVta.php?id=".$venta->id?>"><i class="zmdi zmdi-file"></i></a></td>


					
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
					
		</div>



</div>

</div>
		<div class="table container table-responsive">
       

		
        <div class="row  ">
		
		
	<table id="tablaventasf" class="table-bordered mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width">
      
            <thead class="success">
            	<th colspan="10"><center><h5 class="tittles">Ventas concretadas  </h5></center></th>
                <tr>
                    
                    <th>Numero de factura</th>
                    <th>Fecha</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Estatud</th>
                    <th><center>Categorias</center> </th>
                    <th>PrecioVenta</th>
                    
                   <th>Cantidad</th>
                   <th>Total</th>
                   <th>Envios</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($productosv as $productov){

$envios=$productov->factura ."||".
     	
     	$productov->codigo."||".
     	$productov->nombre."||".
    	$productov->estatud."||".
    	 $productov->categoria."||".
     	$productov->precioVenta."||".
      	$productov->cantidad;
     


                 ?>
                <tr>
                    
                    <td><?php echo $productov->factura ?></td>
                    <td><?php echo $productov->fecha ?>
                    	
                    </td>
                    <td><?php echo $productov->codigo ?></td>
                    <td><?php echo $productov->nombre ?></td>
                    <td><?php echo $productov->estatud ?></td>
                    <td><?php echo $productov->categoria ?> </td>
                    <td><?php echo number_format($productov->precioVenta ,3,',','.'); ?></td>
                  
                 	<td><?php echo $productov->cantidad ?></td>
                    <td><?php echo number_format($productov->total,3,',','.'); ?></td>
                    <td><a class="btn btn-info" href="#Envios"  data-toggle="modal" onclick="envios('<?php echo $envios ?>')" ><i class="zmdi zmdi-truck"></i></a></td>
                  
                </tr>
                <?php } ?>
            </tbody>
        </table>
		
		</div>

	
</div>
</div>
</div>
</div>



<script type="text/javascript" src="datatables/datatables.min.js"></script> 
<script src="vendor/bootstrap.bundle.min.js.descarga"></script>
       
	</section>
</body>
</html>