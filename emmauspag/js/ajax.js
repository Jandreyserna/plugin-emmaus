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
						$("#form-updata-student").on("click", ".update_student", function(){

							var dato1 = $("input[name=IdContacto]").val() ;
							var dato2 = $("input[name=DocIdentidad]").val();
							var dato3 = $("input[name=Nombres]").val();
							var dato4 = $("input[name=Apellidos]").val();
							var dato5 = $("input[name=FechaNacimiento]").val();
							var dato6 = $("input[name=Ocupacion]").val();
							var dato7 = $("input[name=DireccionCasa]").val();
							var dato8 = $("input[name=Telefono]").val();
							var dato9 = $("input[name=Celular]").val();
							var dato10 = $("input[name=Escolaridad]").val();
							var dato11 = $("input[name=CorreoElectronico]").val();
							var dato12 = $("input[name=Ciudad]").val();
							var dato13 = $("input[name=Iglesia]").val();
							var dato14 = $("input[name=EstadoCivil").val();
							var dato15 = $("input[name=Barrio]").val();
							var datos = [dato1,dato2,dato3,dato4,dato5,dato6,dato7,dato8,dato9,dato10,dato11,dato12,dato13,dato14,dato15];

							jQuery.ajax({
										type: "post",
										url: ajax_var.url,
										data:{
											'action' : 'event_list3',
											'nonce'  : ajax_var.nonce,
											'datos' : datos
										},
										success: function(result){
												console.log('llegue');
												console.log('tomo DATOS');
												jQuery('.contenedor-search').html(result);
										}

							});
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
