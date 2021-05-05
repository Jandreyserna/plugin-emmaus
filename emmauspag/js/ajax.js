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

	          var tabla = $('#tabla1').DataTable({
             language: {
               url:'../wp-content/plugins/plugin-emmaus/emmauspag/js/Spanish.json'
             }
           });


    // }

      $("#tabla1").on("click", ".info_complete", function(){
        var data = $('#tabla1').row( $(this).parent("tr") ).data();
        console.log(data);
      });

  // console.log(tabla.row);
    // listar();
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
