

// actualizar gastos

function agregarlocal(datos){


d=datos.split('||');
$('#idpr').val(d[0]);
$('#codigo').val(d[1]);
$('#nombre').val(d[2]);
$('#estado').val(d[3]);
$('#caracterristica').val(d[4]);
$('#cantidad').val(d[5]);
$('#precio').val(d[6]);
}



// actualizar admin
function admindatos(admin){


a=admin.split('||');
$('#idadmin').val(a[0]);
$('#nombre').val(a[1]);
$('#admin').val(a[2]);
$('#clave').val(a[3]);

}



// actualizar usuario
function usuariosdatos(usuarm){


u=usuarm.split('||');
$('#idusu').val(u[0]);
$('#nombreu').val(u[1]);
$('#apelu').val(u[2]);
$('#cedulau').val(u[3]);
$('#claveu').val(u[4]);
$('#usuariou').val(u[5]);

}






// actualizar inventario
function agregartota(datos){


p=datos.split('||');
$('#idt').val(p[0]);
$('#codigot').val(p[1]);
$('#nombret').val(p[2]);
$('#caracterristicat').val(p[3]);
$('#cantidadt').val(p[4]);
$('#preciot').val(p[5]);
$('#preciocentat').val(p[6]);
$('#categoriat').val(p[7]);
$('#promociont').val(p[8]);
$('#imagen').val(p[9]);

}

//agregar envios
function envios(envios){


e=envios.split('||');
$('#numerof').val(e[0]);
$('#codigop').val(e[1]);
$('#nombrep').val(e[2]);
$('#promocione').val(e[3]);
$('#categoria').val(e[4]);
$('#precioneto').val(e[5]);


}



	//agregar ventas 
function agregaventas(ventas){

v=ventas.split('||');

$('#facturav').val(v[0]);
$('#fechav').val(v[1]);
$('#codigov').val(v[2]);
$('#nombrev').val(v[3]);
$('#estatudv').val(v[4]);
$('#categoriav').val(v[5]);
$('#precioVentav').val(v[6]);
$('#cantidadv').val(v[7]);
}



function eliminarProductos(elimp){


	e=elimp.split('||');
	$('#ide').val(e[0]);

	
	}



	function eliminarGastos(elgas){


		g=elgas.split('||');
		$('#idg').val(g[0]);
	
		
		}
	
	
