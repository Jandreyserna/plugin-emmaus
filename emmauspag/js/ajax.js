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

	var table =	$('#tabla1').DataTable({
		 language: {
			 url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
		 },
		 ajax:{
			url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/datas_estudiante.php',
			//url: ajax_var.url,
			 dataSrc:"",
		 },
		 columns:[
			 {data: "IdEstudiante"},
			 {data: "IdContacto"},
			 {data: "Nombres"},
			 {data: "Apellidos"},
			 {data: "DireccionCasa"},
			 {data: "Ciudad"},
			 {"defaultContent": "<button id='ruta' type='button' class='form btn btn-primary btn-xs '> VER MAS</button>"}
		 ],
		 order: [[0, "desc"]]
	 });

	 $("#tabla1").on("click", "#ruta", function(){

		var padre = $(this).closest("tr");
		var id = $('.sorting_1', padre).text();

		console.log(id);

		jQuery.ajax({
			type: "post",
			url: ajax_var.url,

		data: {
			'action'  : "event-vista-student",
			'id-estudiante' : id
		},
		success: function(result){
			jQuery('.contenedor-estudiantes').html(result);
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

					console.log(id);

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
			console.log('Todo ok.');
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

				console.log(id);

				jQuery.ajax({
                type: "post",
                url: ajax_var.url,

                data: {
                    'action' : ajax_var.action,
                    'nonce'  : ajax_var.nonce,
										'id'     : id
                },
                success: function(result){
                    console.log('Todo ok.');
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
                    console.log(id);
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

					 console.log(id);

					 jQuery.ajax({
									 type: "post",
									 url: ajax_var.url,

									 data: {
											 'action' : "conocer-costo",
											 'id'     : id
									 },
									 success: function(result){
											 console.log('Todo ok.');
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

					console.log(id);

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
				{"defaultContent": "<button id='rectify-note' data-toggle='modal' data-target='#rectifynota' type='button' class='form btn btn-primary btn-xs '> rectificar </button>"}
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

			console.log(id);

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
			
			/* var total = $(padre ,"td:nth-child( )").text();
			console.log(id);
			console.log(total); */

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

});
