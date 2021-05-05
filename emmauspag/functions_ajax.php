<?php

######################################################
#####OBTENER LOS DATOS DE UN ID EN BASE DE DATOS######
######################################################


function info_complete(){
     if (!empty($_POST['id'])){
        $modelo = new modelo('estudiantes');
        $datos = $modelo->consulta_dato($_POST['id']);
        // echo "<pre>POST: ";
        // print_r( $datos);
        // echo "</pre>";
    }

    wp_die();
}

######################################################
#####formulario para ACTUALIZAR estudiante ###########
######################################################

function form_update(){
  if (!empty($_POST['id'])){
     $modelo = new modelo('estudiantes');


      $datos = $modelo->consulta_dato($_POST['id']);

     ?>
     <form class="update_estudent" action="" method="post">
       <input type="hidden" name="boton" value="estudiantes"/>
       <?php
       for ($i=0; $i < sizeof($datos); $i++) { ?>
       <input   type="text" name="dato"  placeholder="Digite los NOMBRES"/>
        <?php } ?>
       <input  id="Enviar" type="submit" value="consultar"/>
     </form>

<?php

   }

   wp_die();
}
