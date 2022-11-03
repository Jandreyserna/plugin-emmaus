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
			{"defaultContent": "<div class='container' style='display: flex;'>"+
									"<div class='col'>"+
										"<button id='update-note-diploma' data-toggle='modal' data-target='#updateNoteDiploma' class='boton-hover' type='button'>"+
											"<span></span>"+
											"<span></span>"+
											"<span></span>"+
											"<span></span>"+
											"<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAStJREFUSEu1lf0RATEQxX8qQQWoABWgAkqgAjpABaiADlABOqAS5pGYXLgPkduZ/HFzyb63L7svFUqOSsn5KQLQB3pA06wiZ968szZ3gBVQ86qMAjADpibxDVgAB+D8q6Tf2IyBuUk0Mcl/zZsqkWTZm78DYBec2Rz0K7gCVeBv5paYC6Bu2QLS3L/Y4EJcgDUwjMlerFwAdUgDaIV0S1qJLsA95V6C5fEriAWQyBNbItnJCbgYW0ncQYxLtkO6AUa+RLZNNQv1QOHtHL2HNOagWfaJOfIBQq1Ccsh5FV1jjM+PPLMTq2WOXJnmmObt7iHpKrs+OgOobmkD2mdt5at/5T046iyZX1ZIc0mk9+IjirxO6i4tsZaVKNTnshbZeaalFwEI7NjXsdIBHg00OhlQ1YTKAAAAAElFTkSuQmCC'/>"+	
										"</button>"+
									"</div>"+
									"<div class='col'>"+
										"<button id='print-note' class='boton-hover' type='button'>"+
											"<span></span>"+
											"<span></span>"+
											"<span></span>"+
											"<span></span>"+
											"<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMtJREFUSEvVlWENwjAQhb8pQALgABzgAAs4wAI4QMKk4GCTAA5wALmES8pl69orJWM/m977+q59t4bKX1NZnxjgmQkf1JoFYKqN6tTt4L8AF2APrDIvWLffgBY460JoX8SPTmFbJoCTLIaAB7AAtkDvBG2ADhAnawuIvoYBoM2JHvZDJ3QwO8BYF7/moBjgnUXJDn4GyB0Vow40B7a3qYCw7q7TICzevWO+NIRcgIgfgKsNmj15ai6Kx3Xq1HD/D6oBUoWj+6YusBjyAkqyMBlM3PP1AAAAAElFTkSuQmCC'/>"+	
										"</button>"+
									"</div>"+
								"</div>"
			}
		],
		order: [[0, "desc"]]
	});

/* 
	Update Nota de diplomado 
*/

	$('#table-diplomas').on("click", "#update-note-diploma", function(){
		var padre = $(this).closest('tr');
		var id = $('.sorting_1', padre).text();
		
		jQuery.ajax({
			url: ajax_var.url,
			type: "post",
			data: {
				'action' : "event-list-update-diplomado",
				'id' : id
			},
			success: function(result){
			jQuery('.modal-content').html(result);
			}
		});
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

/* funcion de select de facturacion  de ventas  */

	$("#ventas-select").change(function(){
		
		var valor = $(this, 'option').val().split('-');
		let costo = valor[0];
		let id = valor[1];
		let titulo = valor[2];
		let html = '<input type="hidden" name="Titulo" id= "Titulo" value ="'+titulo+'">' +
					'<div class="mb-1 valor" style="display:flex">' +
		  				'<label for="ValorU" style="width : 24%">Valor Unidad</label>' +
		  			   	'<input type="number" name="ValorU" id="ValorU" Value ="'+costo+'">' +  
					'</div>' +
					'<div class="mb-1 valor" style="display:flex">' +
		  			 	'<label for="Cant" style="width : 24%">Cantidad</label>' +
		  			 	'<input type="number" name="Cant" id="Cant" Value ="1">' +
					'</div>' +
					'<div class="mb-1 valor" style="display:flex">' +
		  			 	'<label for="Desc" style="width : 24%">Descuento (%)</label>' +
		  			 	'<input type="number" name="Desc" id="Desc" Value ="0">' +
					'</div>' +
					'<div class="mb-1 valor-total valor" style="display:flex">' +
		  			 	'<label for="ValorT" style="width : 24%">Valor Total</label>' +
		  			 	'<input type="number" name="ValorT" id="ValorT" Value ="'+costo+'">' +
					'</div>';
		$('#Titulo').remove();
		$('.valor').remove();
		$('#contenedor-formulario-ventas').append(html);

		/* cambio de input de factura de ventas valor unitario */
		$('#ValorU').change(function(){
			let valor = $(this).val();
			let cant = $('#Cant').val();
			let desc = $('#Desc').val();
			let html = '';
			let total = valor * cant ;
			if(desc > 0 && desc <= 100){
				desc = desc / 100;
				let valorMenos = total * desc;
				total = total - valorMenos;
				html = '<input type="number" name="ValorT" id="ValorT" Value ="'+total+'">';
			} else{
				html = '<input type="number" name="ValorT" id="ValorT" Value ="'+total+'">';
			}
			$('#ValorT').remove();
			$('.valor-total').append(html);
	
		
		});
		/* cambio de input de factura de ventas cantidad*/
		$('#Cant').change(function(){
			let cant = $(this).val();
			let valor = $('#ValorU').val();
			let desc = $('#Desc').val();
			let html = '';
			let total = valor * cant ;
			if(desc > 0 && desc <= 100){
				desc = desc / 100;
				let valorMenos = total * desc;
				total = total - valorMenos;
				html = '<input type="number" name="ValorT" id="ValorT" Value ="'+total+'">';
			} else{
				html = '<input type="number" name="ValorT" id="ValorT" Value ="'+total+'">';
			}
			$('#ValorT').remove();
			$('.valor-total').append(html);
		});

		/* CAMBIO EN EL DESCUENTO */
		$('#Desc').change(function(){
			let desc = $(this).val();
			let valor = $('#ValorU').val();
			let cant = $('#Cant').val();
			let html = '';
			let total = valor * cant ;
			if(desc > 0 && desc <= 100){
				desc = desc / 100;
				let valorMenos = total * desc;
				total = total - valorMenos;
				html = '<input type="number" name="ValorT" id="ValorT" Value ="'+total+'">';
			} else{
				html = '<input type="number" name="ValorT" id="ValorT" Value ="'+total+'">';
			}
			$('#ValorT').remove();
			$('.valor-total').append(html);
		});

	});


/* boton de enviar informacion a la tabla de la lista de facturas vista facturacion ventas */

	$("#enviar-lista").click(function(){
		
		var id_material = $("#ventas-select").val().split('-');
		var cant = $("#Cant").val();
		var valor = $('#ValorU').val();
		var total = $("#ValorT").val();
		var material = $("#Titulo").val();
		let desc = $('#Desc').val();
		/* datos para completar el formulario */
		let tabla = document.getElementsByTagName('td');
		let descuentoFactura = $('#descFactura').val();
		let totalFactura = $('#valFactura').val();
		let porcentaje = (total * descuentoFactura)/100;
		let total2 = total - porcentaje;
		totalFactura = Number(totalFactura) + Number(total2);
		let sinPorcentaje = $('#sinPorcentaje').val();
		sinPorcentaje = Number(sinPorcentaje) + Number(total);
		let tamaño = tabla.length / 6;
		let tamaño2 = tabla.length / 6;
	 	tamaño = tamaño + 1;
		var html2 ='<input type="hidden" name="IdMaterial-'+tamaño+'" value="'+id_material[1]+'"></input>'+
					'<input type="hidden" name="Titulo-'+tamaño+'" value="'+material+'"></input>'+
					'<input type="hidden" name="Cantidad-'+tamaño+'" value="'+cant+'"></input>'+
					'<input type="hidden" name="ValorU-'+tamaño+'" value="'+valor+'"></input>'+
					'<input type="hidden" name="Descuento-'+tamaño+'" value="'+desc+'"></input>'+
					'<input type="hidden" id="total" name="Total-'+tamaño+'" value="'+total+'"></input>';
		
		var htmlInsert = '<tr id="'+id_material[1]+'">' +
		'<td scope="row" >'+id_material[1]+'</td>' + 
		'<td>'+material+'</td>'+
		'<td>'+cant+'</td>' +
		'<td>'+valor+'</td>'+
		'<td>'+desc+'%</td>'+
		'<td>'+total+'</td>' + 
		'</tr>';
		var html3 = '<div class="valFactura">'+
						'<label for="valFactura">Valor Factura: </label>'+
						'<input type="number" name="valFactura" id="valFactura" min="0" value="'+totalFactura+'">'+
					'</div>';
		var html4 = '<input type="hidden" name ="porcentaje" id="sinPorcentaje" value="'+sinPorcentaje+'">';

		var html5 =	'<input type="hidden" name ="descuentoFactura" id="descuentoFactura" value="'+descuentoFactura+'">'+
					'<input type="hidden" name ="totalFactura" id="totalFactura" value="'+totalFactura+'">'+
					'<input type="hidden" name ="totalsinporcentaje" id="totalsinporcentaje" value="'+sinPorcentaje+'">';
		let bandera = 0;
		for(let x = 1; x <= tamaño2 ; x++){
			
			if(tabla.length != 0 && tabla[(6* x ) - 6].innerText == id_material[1]){
				bandera = 1;
				
			}
		}
		if(bandera == 0){
			$('#totalsinporcentaje').remove();
			$('#totalFactura').remove();
			$('#descuentoFactura').remove();
			$('.valFactura').remove();
			$('#sinPorcentaje').remove();
			$('.totalsinporcentaje').append(html4);
			$('.totales').append(html3);
			$('.cuerpo-lista').append(htmlInsert);
			$('.resto').append(html2);
			$('.valoresGeneral').append(html5);
		}
			
	});

	$("#eliminar-lista").click(function(){
		let valorEliminar= $('#identificador').val();
		let valoresTabla = document.getElementsByTagName('td');
		let tamaño = valoresTabla.length/ 6;
		let valortotal = $('#totalsinporcentaje').val();
		let descuento = $('#descuentoFactura').val();
		let total = $('#totalFactura').val();
		let des = 0;
		if(valorEliminar.length != 0 && valoresTabla.length != 0){
			for(let x = 1; x <= tamaño ; x++){
				if(valoresTabla[(6* x ) - 6].innerText == valorEliminar){
					let valoractual = valoresTabla[(6 * x)-1].innerText;
					$("#"+valorEliminar).remove();
					valortotal = valortotal - Number(valoractual);
					des = (valortotal * descuento) / 100;
					total = valortotal - des;
					var html = '<input type="hidden" name ="porcentaje" id="sinPorcentaje" value="'+valortotal+'">';
					var html2 = '<div class="valFactura">'+
									'<label for="valFactura">Valor Factura: </label>'+
									'<input type="number" name="valFactura" id="valFactura" min="0" value="'+total+'">'+
								'</div>';
					var html3 =	'<input type="hidden" name ="descuentoFactura" id="descuentoFactura" value="'+descuento+'">'+
								'<input type="hidden" name ="totalFactura" id="totalFactura" value="'+total+'">'+
								'<input type="hidden" name ="totalsinporcentaje" id="totalsinporcentaje" value="'+valortotal+'">';
					$('#totalsinporcentaje').remove();
					$('#totalFactura').remove();
					$('#descuentoFactura').remove();
					$('#sinPorcentaje').remove();
					$('.valFactura').remove();
					$('.valoresGeneral').append(html3);
					$('.totales').append(html2);
					$('.totalsinporcentaje').append(html);
				}
			}
		}
		
	});

	$('#descFactura').change(function(){
		let descuentoFactura = $('#descFactura').val();
		let totalAnterior = $('#sinPorcentaje').val();
		let porcentaje = (totalAnterior * descuentoFactura)/100;
		let total = totalAnterior - porcentaje;
		var html = '<input type="hidden" name ="porcentaje" id="sinPorcentaje" value="'+totalAnterior+'">';
		var html2 = '<div class="valFactura">'+
						'<label for="valFactura">Valor Factura: </label>'+
						'<input type="number" name="valFactura" id="valFactura" min="0" value="'+total+'">'+
					'</div>';
		var html3 =	'<input type="hidden" name ="descuentoFactura" id="descuentoFactura" value="'+descuentoFactura+'">'+
					'<input type="hidden" name ="totalFactura" id="totalFactura" value="'+total+'">'+
					'<input type="hidden" name ="totalsinporcentaje" id="totalsinporcentaje" value="'+totalAnterior+'">';
		$('#totalsinporcentaje').remove();
		$('#totalFactura').remove();
		$('#descuentoFactura').remove();
		$('#sinPorcentaje').remove();
		$('.valFactura').remove();
		$('.valoresGeneral').append(html3);
		$('.totales').append(html2);
		$('.totalsinporcentaje').append(html);
		

	});

	/* tabla de facturas */
	$('#table-facturas').DataTable({
		language: {
			url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
		},
		ajax:{
			url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/facturas.php',
			dataSrc:"",
		},
		columns:[
			{data: "IdFactura"},
			{data: "Vendedor"},
			{data: "Comprador"},
			{data: "Fecha"},
			{data: "Precio"},
			{data: "Tipo"},
			{data: "Deuda"},
			{"defaultContent": "<button id='ruta' type='button' class='form btn btn-primary btn-xs '>Más...</button>"}
		],
		order: [[0, "desc"]]
	});

});
