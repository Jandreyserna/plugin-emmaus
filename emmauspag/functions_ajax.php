<?php

######################################################
#####OBTENER LOS DATOS DE UN ID EN BASE DE DATOS######
######################################################


function info_complete(){
     if (!empty($_POST['id'])){
        $modelo = new modelo('estudiantes');
        $datos = $modelo->consulta_dato($_POST['id']);
?>
        <div class="titulo text-center">
          <h2><?= $datos[0]['Nombres'].' '.$datos[0]['Apellidos'].' '; ?>
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
     ?>
     <form id="form-updata-student"  method="post">
       <input type="hidden" name="update" value="entre"/>
       <input type="hidden" name="IdEstudent" value="<?= $_POST['id']  ?>"/>
       <label for="update1">promotor</label>
       <input id="update1"  type="text" name="IdContacto"  placeholder="<?= $datos[0]['IdContacto'] ?>"/>
       <label for="update2">Documento</label>
       <input  id="update2" type="text" name="DocIdentidad"  placeholder="<?= $datos[0]['DocIdentidad'] ?>"/>
       <label for="update3">Nombres</label>
       <input  id="update3" type="text" name="Nombres"  placeholder="<?= $datos[0]['Nombres'] ?>"/>
       <label for="update4">Apellidos</label>
       <input  id="update4" type="text" name="Apellidos"  placeholder="<?= $datos[0]['Apellidos'] ?>"/>
       <label for="update5">Nacimiento</label>
       <input  id="update5" type="date" name="FechaNacimiento"  placeholder="<?= $datos[0]['FechaNacimiento'] ?>"/>
       <label for="update6">Ocupacion</label>
       <input  id="update6" type="text" name="Ocupacion"  placeholder="<?= $datos[0]['Ocupacion'] ?>"/>
       <label for="update7">Direccion</label>
       <input  id="update7" type="text" name="DireccionCasa"  placeholder="<?= $datos[0]['DireccionCasa'] ?>"/>
       <label for="update8">Telefono</label>
       <input  id="update8" type="text" name="Telefono"  placeholder="<?= $datos[0]['Telefono'] ?>"/>
       <label for="update9">Celular</label>
       <input  id="update9" type="text" name="Celular"  placeholder="<?= $datos[0]['Celular'] ?>"/>
       <label for="update10">Escolaridad</label>
       <input  id="update10" type="text" name="Escolaridad"  placeholder="<?= $datos[0]['Escolaridad'] ?>"/>
       <label for="update11">Email</label>
       <input  id="update11" type="text" name="CorreoElectronico"  placeholder="<?= $datos[0]['CorreoElectronico'] ?>"/>
       <label for="update12">Ciudad</label>
       <input  id="update12" type="text" name="Ciudad"  placeholder="<?= $datos[0]['Ciudad'] ?>"/>
       <label for="update13">Iglesia</label>
       <input  id="update13" type="text" name="Iglesia"  placeholder="<?= $datos[0]['Iglesia'] ?>"/>
       <label for="update14">Estado Civil</label>
       <input  id="update14" type="text" name="EstadoCivil"  placeholder="<?= $datos[0]['EstadoCivil'] ?>"/>
       <label for="update15">Barrio</label>
       <input  id="update15" type="text" name="Barrio"  placeholder="<?= $datos[0]['Barrio'] ?>"/>
       <input  class="update_student btn-outline-success" type="submit" value="actualizar"/>
     </form>


<?php
        }

   wp_die();
}

function update_student_funtion(){
  $id = $_POST['IdEstudent'];
  unset($_POST['update']);
  unset($_POST['IdEstudent']);

  $modelo = new Modelo_estudiantes;

  $modelo->update_estudent(array_filter($_POST), $id);


  echo "<pre>$id: ";
  print_r( array_filter($_POST) );
  echo "</pre>";
}
