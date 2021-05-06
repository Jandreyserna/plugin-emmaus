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
        // echo "</pre>";?>
        <div class="titulo text-center">
          <h2><?= $datos[0]['Nombre1'].' '.$datos[0]['Nombre2'].' '.$datos[0]['Apellido1'].' '.$datos[0]['Apellido2']; ?>
        </h2>
          <h3><?= $datos[0]['IdEstudiante']  ?></h3>
        </div>
        <table>
          <thead>
            <tr>
              <th scope='col'>PROMOTOR</th>
              <th scope='col'>DOCUMENTO</th>
              <th scope='col'>NACIMIENTO</th>
              <th scope='col'>OCUPACIÓN</th>
              <th scope='col'>DIRECCIÓN</th>
              <th scope='col'>TELEFONO</th>
              <th scope='col'>CELULAR</th>
              <th scope='col'>ESCOLARIDAD</th>
              <th scope='col'>EMAIL</th>
              <th scope='col'>CIUDAD</th>
              <th scope='col'>IGLESIA</th>
              <th scope='col'>ESTADO CIVIL</th>
              <th scope='col'>BARRIO</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $datos[0]['IdContacto']  ?></td>
              <td><?= $datos[0]['DocIdentidad']  ?></td>
              <td><?= $datos[0]['FechaNacimiento']  ?></td>
              <td><?= $datos[0]['Ocupacion']  ?></td>
              <td><?= $datos[0]['DireccionCasa']  ?></td>
              <td><?= $datos[0]['Telefono']  ?></td>
              <td><?= $datos[0]['Celular']  ?></td>
              <td><?= $datos[0]['Escolaridad']  ?></td>
              <td><?= $datos[0]['CorreoElectronico']  ?></td>
              <td><?= $datos[0]['Ciudad']  ?></td>
              <td><?= $datos[0]['Iglesia']  ?></td>
              <td><?= $datos[0]['EstadoCivil']  ?></td>
              <td><?= $datos[0]['Barrio']  ?></td>
            </tr>
          </tbody>
        </table>
<?php
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
        // print_r($datos[0]);
     ?>
     <form class="update_estudent" action="" method="post">
       <input type="hidden" name="boton" value="estudiantes"/>
       <label >promotor</label>
       <input   type="text" name="IdContacto"  placeholder="<?= $datos[0]['IdContacto'] ?>"/>
       <label >Documento</label>
       <input   type="text" name="DocIdentidad"  placeholder="<?= $datos[0]['DocIdentidad'] ?>"/>
       <label >Nombres</label>
       <input   type="text" name="Nombres"  placeholder="<?= $datos[0]['Nombre1'] ?>"/>
       <label >Apellidos</label>
       <input   type="text" name="Apellidos"  placeholder="<?= $datos[0]['Apellido1'] ?>"/>
       <label >Nacimiento</label>
       <input   type="text" name="FechaNacimiento"  placeholder="<?= $datos[0]['FechaNacimiento'] ?>"/>
       <label >Ocupacion</label>
       <input   type="text" name="Ocupacion"  placeholder="<?= $datos[0]['Ocupacion'] ?>"/>
       <label >Direccion</label>
       <input   type="text" name="DireccionCasa"  placeholder="<?= $datos[0]['DireccionCasa'] ?>"/>
       <label >Telefono</label>
       <input   type="text" name="Telefono"  placeholder="<?= $datos[0]['Telefono'] ?>"/>
       <label >Celular</label>
       <input   type="text" name="Celular"  placeholder="<?= $datos[0]['Celular'] ?>"/>
       <label >Escolaridad</label>
       <input   type="text" name="Escolaridad"  placeholder="<?= $datos[0]['Escolaridad'] ?>"/>
       <label >Email</label>
       <input   type="text" name="CorreoElectronico"  placeholder="<?= $datos[0]['CorreoElectronico'] ?>"/>
       <label >Ciudad</label>
       <input   type="text" name="Ciudad"  placeholder="<?= $datos[0]['Ciudad'] ?>"/>
       <label >Iglesia</label>
       <input   type="text" name="Iglesia"  placeholder="<?= $datos[0]['Iglesia'] ?>"/>
       <label >Estado Civil</label>
       <input   type="text" name="EstadoCivil"  placeholder="<?= $datos[0]['EstadoCivil'] ?>"/>
       <label >Barrio</label>
       <input   type="text" name="Barrio"  placeholder="<?= $datos[0]['Barrio'] ?>"/>
       <button  class="btn-outline-success" type="button" name="button-update-student">actualizar</button>
     </form>

<?php

   }

   wp_die();
}
