jQuery(document).ready(function ($) {


	//----------------------------------------------------//
	//-------------tabla cursos con ajax-----------------//
	//---------------------------------------------------//

	$('#tabla-cursos').DataTable({
			language: {
 			url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
			}
	});



//--------------------------------------------------------//
//-------------tabla estudiantes-cursos con ajax-----------------//
//--------------------------------------------------------//

	$('#tabla1').DataTable({
		language: {
			url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
		},
		ajax:{
			url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/datas_estudiante.php',
			dataSrc:"",
		},
		columns:[
			{data: "IdEstudiante"},
			{data: "IdContacto"},
			{data: "Nombres"},
			{data: "Apellidos"},
			{data: "DireccionCasa"},
			{data: "Ciudad"},
			{"defaultContent": "<button id='ruta' type='button' class='form btn btn-primary btn-xs '>Más...</button>"}
		],
		order: [[0, "desc"]]
	});

	$("#tabla1").on("click", "#ruta", function(){

		var padre = $(this).closest("tr");
		var id = $('.sorting_1', padre).text();

		jQuery.ajax({
			type: "post",
			url: ajax_var.url,
			data: {
				'action' : "event-vista-student",
				'id-estudiante' : id
			},
			success: function(result){
				jQuery('.contenedor-estudiantes').html(result);
				$(".formm").on("click", "#formulario", function(){
					if ( $('form.formm .contenedor-fkm')[0] ) {
						const numContainers = $('form.formm .contenedor-fkm').length + 1;
						let container = $('form.formm .contenedor-fkm').first().html();
						
						// Reemplazo de los names de los fields.
						container = container.replace(/curso1/g, `curso${numContainers}`);
						container = container.replace(/curso1/g, `curso${numContainers}`);
		
						$('form.formm .modal-footer').before('<div class="contenedor-fkm">' + container + '</div>');
					}
				});	
			}
		});
	});


	 
	 //--------------------------------------------------------//
	 //-------------tabla estudiantes con ajax-----------------//
	 //--------------------------------------------------------//

	 	$('#estudiantes').DataTable({
	 		language: {
	 			url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
	 		}
	 	});

		 //----------------------------------------------------//
		 //-------------tabla Certificados con ajax-----------------//
		 //---------------------------------------------------//

		$('#courses-table').DataTable({
			language: {
				url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
			},
			ajax:{
				url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/courses.php',
				dataSrc:"",
				},
			columns:[
				{data: "IdCursoRealizado"},
				{data: "estudianteN"},
				{data: "estudianteA"},
				{data: "Material"},
				{data: "Porcentaje"},
				{data: "FechaTerminacion"},
				{"defaultContent": "<button id='register-course' type='button' class='form btn btn-primary btn-xs '>Registrar</button>"}
				],
				order: [[0, "desc"]]
		});

		 //----------------------------------------------------------//
		 //-------BOTON DE INFO COMPLETA DE ESTUDIANTE CON AJAX------//
		 //----------------------------------------------------------//

	    $("#courses-table").on("click", "#register-course", function(){

			var padre = $(this).closest("tr");
			var id = $('.sorting_1', padre).text();
			jQuery.ajax({
	            type: "post",
	            url: ajax_var.url,
	            data: {
	                'action' : 'event-list-tow-students',
					'id-course'     : id
	            },
	            success: function(result){
	                jQuery('.container-course').html(result);
	            }
			});
	    });

	//-----------------------------------------------------------------//
	 //-------Boton cargar la vista de calificar un curso en grupo-----//
	 //----------------------------------------------------------------//

		$("#calificar").click(function(){
			jQuery.ajax({
				url:'../wp-content/plugins/plugin-emmaus/emmauspag/vistas/cursos/notas.php',
			
				success: function(result){
					jQuery('.container-table').html(result);
				}
			});
		});


		//--------------------------------------------//
		//-------BOTON DE INFO COMPLETA CON AJAX------//
		//--------------------------------------------//

		$("#tabla1").on("click", ".info_complete", function(){

			var padre = $(this).closest("tr");
			var id = $('.sorting_1', padre).text();

			jQuery.ajax({
				type: "post",
				url: ajax_var.url,

				data: {
					'action' : ajax_var.action,
					'nonce'  : ajax_var.nonce,
					'id'     : id
					},
				success: function(result){
					jQuery('.contenedor-search').html(result);
				}
			});
		});

			//--------------------------------------------//
		  //---BOTON DE ACTUALIZAR COMPLETA CON AJAX----//
		  //--------------------------------------------//

		$("#tabla1").on("click", ".actualizar-estudiantes", function(){

			var padre = $(this).closest("tr");
			var id = $('.sorting_1', padre).text();

			jQuery.ajax({
            	type: "post",
                url: ajax_var.url,
                data: {
                    'action' : 'event_list2',
					'nonce'  : ajax_var.nonce,
					'id' 		 : id

                },
                success: function(result){
                jQuery('.contenedor-search').html(result);
                }
			});
      	});

			//--------------------------------------------//
			//-------BOTON DE costo de curso CON AJAX------//
			//--------------------------------------------//

		$("#tabla-cursos").on("click", ".costo-curso", function(){

			var padre = $(this).closest("tr");
			var id = $('.sorting_1', padre).text();
			jQuery.ajax({
				type: "post",
				url: ajax_var.url,
				data: {
					'action' : "conocer-costo",
					'id'     : id
				},
				success: function(result){
					jQuery('.mostrar-costo').html(result);
					}
				});
		});

/*
				CURSOS QUE NO TIENEN NOTAS DE LA VISTA NOTAS
*/				 

		$('#table-notes').DataTable({
			language: {
				url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
			},
			ajax:{
				url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/calificar.php',
				dataSrc:""
			},
			columns:[
				{data: "IdCursoRealizado"},
				{data: "Nombres"},
				{data: "Apellidos"},
				{data: "material"},
				{data: "Porcentaje"},
				{data: "DireccionCasa"},
				{data: "Ciudad"},
				{"defaultContent": "<button id='register-note' data-toggle='modal' data-target='#añadirnota' type='button' class='form btn btn-primary btn-xs '> calificar </button>"}
			],
			order: [[0, "desc"]]
		});
/*
				BOTON DE TABLA DE LA VISTA NOTAS, PARA REGISTRAR NOTAS A LOS QUE NO TIENEN 
*/	

		$("#table-notes").on("click", "#register-note", function(){

			var padre = $(this).closest("tr");
			var id = $('.sorting_1', padre).text();

			jQuery.ajax({
				url: ajax_var.url,
	        	type: "post",
            	data: {
					'action' : "event-list-modal-notes",
					'id-course' : id
	              	},
            	success: function(result){
                  	jQuery('.modal-content').html(result);
                	}
				});
	    });
/*
				CURSOS QUE PERDIERON LA NOTA PARA PODER CAMBIAR NOTA CUANDO REPITAN EL CURSO 
				EN LA VISTA PERDIDOS
*/	

		$('#table-lost').DataTable({
			language: {
				url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
			},
			ajax:{
				url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/rectificar.php',
				dataSrc:""
			},
			columns:[
				{data: "IdCursoRealizado"},
				{data: "Nombres"},
				{data: "Apellidos"},
				{data: "material"},
				{data: "Porcentaje"},
				{data: "DireccionCasa"},
				{data: "Ciudad"},
				{"defaultContent": "<button id='rectify-note' data-toggle='modal' data-target='#rectifynota' type='button' class='form btn btn-primary btn-xs '>Re calificar</button>"}
			],
			order: [[0, "desc"]]
		});

/*
				BOTON DE TABLA DE LA VISTA perdidos, PARA ACTUALIZAR NOTAS A LOS QUE
				PERDIERON CURSOS
*/	

		$("#table-lost").on("click", "#rectify-note", function(){

			var padre = $(this).closest("tr");
			var id = $('.sorting_1', padre).text();

			jQuery.ajax({
				url: ajax_var.url,
				type: "post",
				data: {
					'action' : "event-list-modal-notes",
					'id-course' : id
				},
				success: function(result){
				jQuery('.modal-content').html(result);
				}
			});
		});

/*
				CURSOS QUE ESTAN LISTOS PARA IMPRIMIR
*/	

		$('#table-print').DataTable({
			language: {
			url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
			},
			ajax:{
				url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/imprimir.php',
				dataSrc:""
			},
			columns:[
				{data: "IdCursoRealizado"},
				{data: "Nombres"},
				{data: "Apellidos"},
				{data: "material"},
				{data: "Porcentaje"},
				{data: "DireccionCasa"},
				{data: "Ciudad"},
				{"defaultContent": "<button id='print-note' type='button' class='form btn btn-primary btn-xs '> imprimir </button>"}
			],
			order: [[0, "desc"]]
		});

/*
		BOTON DE TABLA DE LA VISTA impresiones/imprimir, PARA cusos hechos (perdidos o ganados) uno por uno
*/	

		$("#table-print").on("click", "#print-note", function(){

			var padre = $(this).closest("tr");
			var id = $('.sorting_1', padre).text();

			jQuery.ajax({
				url: ajax_var.url,
				type: "post",
				data: {
					'action' : "event-list-doc-imprimir",
					'id-course' : id
				},
				success: function(result){
				jQuery('.result').html(result);
				}
			});
		});
/*
		Tabla de Diplomas
*/	

	$('#table-diplomas').DataTable({
		language: {
		url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
		},
		ajax:{
			url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/diplomas_render.php',
			dataSrc:""
		},
		columns:[
			{data: "IdDiploma"},
			{data: "Curso"},
			{data: "Programa"},
			{data: "Nombres"},
			{data: "Apellidos"},
			{data: "Porcentaje"},
			{data: "FechaTerminacion"},
			{"defaultContent": "<button id='print-note' type='button' class='form btn btn-primary btn-xs '> imprimir </button>"}
		],
		order: [[0, "desc"]]
	});

/*
		BOTON DE TABLA DE LA VISTA Diplomas, PARA Diplomas Hechos, uno por uno
*/	

	$("#table-diplomas").on("click", "#print-note", function(){

		var padre = $(this).closest("tr");
		var id = $('.sorting_1', padre).text();

		jQuery.ajax({
			url: ajax_var.url,
			type: "post",
			data: {
				'action' : "event-list-diploma-imprimir",
				'id' : id
			},
			success: function(result){
			jQuery('.result').html(result);
			}
		});
	});

//-----------------------------------------------------//
//____TABLA DE INVENTARIO EN LA VISTA DE INVENTARIOS___//
//-----------------------------------------------------//

	$('#table-inventario').DataTable({
		language: {
		url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
		},
		ajax:{
			url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/inventario_render.php',
			dataSrc:""
		},
		columns:[
			{data: "IdMaterial"},
			{data: "TituloMaterial"},
			{data: "inventario"},
			{data: "stock"},
			{"defaultContent": "<button id='modal-stock' data-toggle='modal' data-target='#modalStock' type='button' class='form btn btn-primary btn-xs '><span class='dashicons dashicons-image-rotate'></span> </button>"},
			{"defaultContent": "<button id='modal-stock-2' data-toggle='modal' data-target='#modalStock-2' type='button' class='form btn btn-secundary btn-xs '><span class='dashicons dashicons-image-rotate'></span></button>"}
		],
		
	});

//-----------------------------------------------------//
//____BOTON DE ACTUALIZAR INVENTARIO___________________//
//-----------------------------------------------------//

	$("#table-inventario").on("click", "#modal-stock", function(){

		var padre = $(this).closest('tr');
		var id = $('.sorting_1', padre).text();
		
		jQuery.ajax({
			url: ajax_var.url,
			type: "post",
			data: {
				'action' : "event-list-inventario",
				'id' : id
			},
			success: function(result){
			jQuery('.modal-content').html(result);
		
			}
		});
	});
//-----------------------------------------------------//
//____BOTON DE ACTUALIZAR STOCK _______________________//
//-----------------------------------------------------//
	$("#table-inventario").on("click", "#modal-stock-2", function(){

		var padre = $(this).closest('tr');
		var id = $('.sorting_1', padre).text();
		
		jQuery.ajax({
			url: ajax_var.url,
			type: "post",
			data: {
				'action' : "event-list-inventario-stock",
				'id' : id
			},
			success: function(result){
			jQuery('.modal-content').html(result);
		
			}
		});
	});

//-----------------------------------------------------//
//____BOTON DE COMPRAS DE LA VISTA FACTURAS____________//
//-----------------------------------------------------//

	$("#compras").click(function(){
		jQuery.ajax({
			url: ajax_var.url,
			type: "post",
			data: {
				'action' : "event-list-factura-compras",
			},
			success: function(result){
			jQuery('.contenedor-facturas').html(result);
		
			}
		});
	});



//-----------------------------------------------------//
//____BOTON DE VENTAS DE LA VISTA FACTURAS____________//
//-----------------------------------------------------//

	$("#ventas").click(function(){
		jQuery.ajax({
			url: ajax_var.url,
			type: "post",
			data: {
				'action' : "event-list-factura-ventas",
			},
			success: function(result){
			jQuery('.contenedor-facturas').html(result);
		
			}
		});
	});

//--------------------------------------------------------------//
//____TABLA DE FACTURAS DE VENTAS EN LA VISTA DE FACTURACION___//
//-------------------------------------------------------------//

	$('#table-ventas').DataTable({
		language: {
		url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
		},
		ajax:{
			url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/ventas_render.php',
			dataSrc:""
		},
		columns:[
			{data: "IdFactura"},
			{data: "FechaFactura"},
			{data: "IdPromotor"},
			{data: "Nombre"},
			{data: "PrecioTotal"},
			{data: "Saldo"},
			{data: "Encargado"},
			],	
	});

/* funcion ajax de select de facturacion  de ventas  */

	$("#ventas-select").change(function(){
		
		var valor = $(this, 'option').val();
		jQuery.ajax({
			url: ajax_var.url,
			type: "post",
			data: {
				'id' : valor,
				'action' : "event-list-factura-ventas-select",
			},
			success: function(result){
			jQuery('#contenedor-formulario-ventas').html(result);
				/* funcion ajax de input de valor unitario de facturacion  de ventas  */
				$("#ValorU").change(function(){
						
					var valor = $(this).val();
					var cant = $('#Cant').val();
					jQuery.ajax({
						url: ajax_var.url,
						type: "post",
						data: {
							'ValorU' : valor,
							'cantidad' : cant, 
							'action' : "event-list-factura-ventas-select",
						},
						success: function(result){
							jQuery('.valor-total').html(result);
								
						}
					});
				});
				$("#Cant").change(function(){
						
					var valor = $(this).val();
					var cant = $('#ValorU').val();
					jQuery.ajax({
						url: ajax_var.url,
						type: "post",
						data: {
							'valor' : valor,
							'Cant' : cant, 
							'action' : "event-list-factura-ventas-select",
						},
						success: function(result){
							jQuery('.valor-total').html(result);
								
						}
					});
				});
			}
		});
	});

	/* copia funcion  */
	/* funcion ajax de input de valor unitario de facturacion  de ventas  */
	$("#ValorU").change(function(){
						
		var valor = $(this).val();
		var cant = $('#Cant').val();
		jQuery.ajax({
			url: ajax_var.url,
			type: "post",
			data: {
				'ValorU' : valor,
				'cantidad' : cant, 
				'action' : "event-list-factura-ventas-select",
			},
			success: function(result){
				jQuery('.valor-total').html(result);
					
			}
		});
	});

	/* funcion aax de input de CAntidad de facturacion ventas vista ventas */
	$("#Cant").change(function(){
						
		var valor = $(this).val();
		var cant = $('#ValorU').val();
		jQuery.ajax({
			url: ajax_var.url,
			type: "post",
			data: {
				'valor' : valor,
				'Cant' : cant, 
				'action' : "event-list-factura-ventas-select",
			},
			success: function(result){
				jQuery('.valor-total').html(result);
					
			}
		});
	});

/* boton de enviar informacion a la tabla de la lista de facturas vista facturacion ventas */

	$("#enviar-lista").click(function(){
		
		var id_material = $("#ventas-select").val();
		var cant = $("#Cant").val();
		var valor = $('#ValorU').val();
		var total = $("#ValorT").val();
		var material = $("#Titulo").val();
		
		var htmlInsert = '<tr>' +
		'<th scope="row">'+id_material+'</th>' + 
		'<td>'+material+'</td>'+
		'<td>'+cant+'</td>' +
		'<td>'+valor+'</td>'+
		'<td>0%</td>'+
		'<td>'+total+'</td>' + 
		'<td><button type ="button" class="btn btn-light" id="eliminar-lista"><span class="dashicons dashicons-trash"></span></button></td>'+
		'</tr>';
		$('.cuerpo-lista').append(htmlInsert);
		$("#eliminar-lista").click(function(){
			$(this).closest('tr').remove();
		});
	});


});
