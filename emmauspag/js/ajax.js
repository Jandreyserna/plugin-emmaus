jQuery(document).ready(function ($) {

	// $('.dataTables_filterinput[type="search"]').css(
	//      {'width':'350px','display':'inline-block'}
	//   );

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
			url: '../wp-content/plugins/plugin-emmaus/emmauspag/modelos/datas_estudiante.php',
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
		 ]
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
				 ]
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
		url:'../wp-content/plugins/plugin-emmaus/emmauspag/vistas/notas.php',

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

				$('#table-notes').DataTable({
					language: {
						url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
					},
					ajax:{
					   url: '../wp-content/plugins/plugin-emmaus/emmauspag/js/render-table/calificar.php',
						dataSrc:"",
					},
					columns:[
						{data: "IdCursoRealizado"},
						{data: "Nombres"},
						{data: "Apellidos"},
						{data: "material"},
						{data: "Porcentaje"},
						{data: "DireccionCasa"},
						{data: "Ciudad"},
						{"defaultContent": "<button id='ruta' type='button' class='form btn btn-primary btn-xs '> calificar </button>"}
					]
				});

});
