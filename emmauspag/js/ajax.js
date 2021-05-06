jQuery(document).ready(function ($) {

    // VALIDO SI EL ELEMENTO EXISTE
    // if ($(".form-search-estudiantes")[0]){

        // $(".form-search-estudiantes input[type='search']").on("input", function() {
        //
        //     // LIMITAR LOS CARACTERES EJEMPLO: !##$%^&*(*)p_()
        //     console.log( this.value );
        //
        //     jQuery.ajax({
        //         type: "post",
        //         url: ajax_var.url,
        //         // data: "action=" + ajax_var.action + "&nonce=" + ajax_var.nonce,
        //
        //         data: {
        //             'action' : ajax_var.action,
        //             'nonce'  : ajax_var.nonce,
        //             'nombre' : this.value
        //         },
        //
        //
        //         success: function(result){
        //             console.log('Todo ok.');
        //             jQuery('.contenedor-search').html(result);
        //         }
        //     });
        //
        // });
    // }

//--------------------------------------------//
//-------------tabla con ajax-----------------//
//--------------------------------------------//

		var tabla = $('#tabla1').DataTable({
		 language: {
			 url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
		 }
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


});

  // var listar = function(){
  //   var tabla = $('#tabla1').DataTable({
  //     columns:[
  //       {"data":"IdEstudiante"},
  //       {"data":"Idcontacto"},
  //       {"data":"Nombre1"},
  //       {"data":"Apellido1"}
  //     ],
  //     language: {
  //       url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
  //     }
  //   });
  //
  // }
