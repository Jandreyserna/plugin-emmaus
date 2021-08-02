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

				$('#tabla1').DataTable({
		 language: {
			 url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
		 }
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

			 $('#certificado-table').DataTable({
					 language: {
						 url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
				 }
			 });

		 //----------------------------------------------------------//
		 //-------BOTON DE INFO COMPLETA DE ESTUDIANTE CON AJAX------//
		 //----------------------------------------------------------//

	      $("#estudiantes").on("click", ".info-student", function(){

					var padre = $(this).closest("tr");
					var id = $('.sorting_1', padre).text();

					console.log(id);

					jQuery.ajax({
	                type: "post",
	                url: ajax_var.url,

	                data: {
	                    'action' : 'event-list-student',
											'id'     : id
	                },
	                success: function(result){
	                    jQuery('.contenedor-search').html(result);
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

});
