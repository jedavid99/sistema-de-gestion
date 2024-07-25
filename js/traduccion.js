$(document).ready(function() {    
    $('#example').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "<img src=images/icons/cancel.png height=80 width=80>Producto no encontrado",
                "info": "",
                "infoEmpty": "",
                "infoFiltered": "",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        //para usar los botones   
      responsive: "true",
        dom: 'frtilp',       
       

       
    });     
});
$(document).ready(function() {    
    $('#tabla').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ ",
                "zeroRecords": "<img src=images/icons/cancel.png height=80 width=80>Producto en el inventario no encontrado",
                "info": " ",
                "infoEmpty": "",
                "infoFiltered": "",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        //para usar los botones   
        	responsive: "false",   
        dom: 'frtip',       
              
    });     
});

$(document).ready(function() {    
    $('#tablausu').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ ",
                "zeroRecords": "Usuario no encontrado <img src=images/icons/usuario.png height=80 width=80>",
                "info": " ",
                "infoEmpty": "",
                "infoFiltered": "",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
            responsive: "false",   
        dom: 'frtip',       
              
    });     
});
$(document).ready(function() {    
    $('#tablaadmi').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ ",
                "zeroRecords": "Aministrador no encontrado <img src=images/icons/administrador.png height=80 width=80>",
                "info": " ",
                "infoEmpty": "",
                "infoFiltered": "",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
            responsive: "false",   
        dom: 'frtip',       
              
    });     
});




$(document).ready(function() {    
    $('#tablaventasf').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ ",
                "zeroRecords": "Producto no encontrado <img src=images/icons/cancel.png height=80 width=80>",
                "info": " ",
                "infoEmpty": "",
                "infoFiltered": "",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
            responsive: "false",   
        dom: 'frtip',       
              
    });     
});