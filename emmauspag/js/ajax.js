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
										// $("#form-updata-student").on("click", ".update_student", function(){
										//
										// 		var dato1 = jQuery("input[name=IdContacto]").val();
										//     var dato2 = jQuery("input[name=DocIdentidad]").val();
										//     var dato3 = jQuery("input[name=Nombres]").val();
										//     var dato4 = jQuery("input[name=Apellidos]").val();
										//     var dato5 = jQuery("input[name=FechaNacimiento]").val();
										//     var dato6 = jQuery("input[name=Ocupacion]").val();
										//     var dato7 = jQuery("input[name=DireccionCasa]").val();
										//     var dato8 = jQuery("input[name=Telefono]").val();
										//     var dato9 = jQuery("input[name=Celular]").val();
										//     var dato10 =jQuery("input[name=Escolaridad]").val();
										//     var dato11 = jQuery("input[name=CorreoElectronico]").val();
										//     var dato12 = jQuery("input[name=Ciudad]").val();
										//     var dato13 = jQuery("input[name=Iglesia]").val();
										//     var dato14 = jQuery("input[name=EstadoCivil").val();
										//     var dato15 = jQuery("input[name=Barrio]").val();
										//     var datos = [dato1,dato2,dato3,dato4,dato5,dato6,dato7,dato8,dato9,dato10,dato11,dato12,dato13,dato14,dato15];
										//
										//     console.log(datos);
										//
										//     jQuery.ajax({
										//           type: "post",
										//           url: '',
										//           data:{
										//             'action' : 'event_list3',
										//             'datos' : datos
										//           },
										//           success: function(result){
										//               console.log('llegue');
										//               console.log('tomo DATOS');
										//               jQuery('.contenedor-search').html(result);
										//           }
										//
										//     });
										// });
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
