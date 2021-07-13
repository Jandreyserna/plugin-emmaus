<?php

##########################################
##### Evaluar los POST de este archivo ###
##########################################

if (!empty($_POST['nuevo-costo'])){
  $ID['IdMaterial'] = $_POST['nuevo-costo'];
  unset($_POST['nuevo-costo']);
  $modelo_curso = new Modelo_cursos();
  $modelo_curso->update_costo_material($ID, $_POST);

}

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
     $promotor = new Modelo_promotor;
     $promotores = $promotor-> traer_promotor();
      $datos = $modelo->consulta_dato($_POST['id']);
      foreach ($datos as $iglesias => $iglesia) {
        $datosiglesia = $iglesia['NombreIglesia'];
        unset($iglesia['NombreIglesia']);
      }
     ?>
     <form id="form-updata-student"  method="post">
       <input type="hidden" name="update" value="entre"/>
       <input type="hidden" name="IdEstudent" value="<?= $_POST['id']  ?>"/>
       <select class="id_promotor" name="IdContacto">
         <?php foreach ($promotores as $columnas=> $dato): ?>
            <option value="<?= $dato['IdContacto'] ?>"> <?= $dato['Nombre'] ?></option>
         <?php endforeach; ?>
         <option value=""></option>
       </select>
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
       <input  id="update13" type="hidden" name="Iglesia"  value="<?= $datosiglesia['Iglesia'] ?>"/>
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

}


#########################################
#####COLOCAR LOS COSTOS DE LIBROS######
#########################################

function costos_libros()
{
  $id = $_POST['id'];
  $modelo = new Modelo_cursos();
  $material = $modelo->cursos_materiales($id);
  ?>
  <button class="btn btn-outline-success" type="button" name="button">
    <div class="container">
      <a href="#actualizar-costo" class="btn-crudd btn-sucess" data-toggle="collapse">Actualizar Costo Venta Material</a>
    </div>
  </button>

  <div id="actualizar-costo" class="collapse">
    <form class="" method="post" action="">
          <p><label for="campo1">Nuevo Costo de venta</label>
          <input name="ValorVenta" type="number" placeholder="Digite El Valor" ></p>
          <input name="nuevo-costo" type="hidden" value="<?=$material[0]['IdMaterial']?>" >
          <button class="btn btn-outline-success" type="submit">Actualizar</button>
    </form>

  </div>
<?php
  echo "<pre>";
  print_r($material);
  echo "</pre>";
}


##################################################
#####INFORMACION COMPLETA DE LOS ESTUDIANTES######
##################################################

function info_student(){
  if (!empty($_POST['id'])){
     $modelo          = new modelo('estudiantes');
     $datos           = $modelo->consulta_dato($_POST['id']);
     $modelo_promotor = new Modelo_promotor();
     $promotor        = $modelo_promotor-> traer_un_promotor($datos[0]['IdContacto']);
     $modelo_curso    = new Modelo_cursos();
     $ultimo_curso    = $modelo_curso-> last_course_student($_POST['id']);
     $datos[0]['Promotor'] = $promotor[0]['Nombre'];
     // echo "<pre>";
     // print_r($ultimo_curso);
     // echo "</pre>";
?>
     <div class="titulo text-center">
       <h2><?= $datos[0]['Nombres'].' '.$datos[0]['Apellidos'].' '; ?>
     </h2>
       <h3><?= $datos[0]['IdEstudiante']  ?></h3>
     </div>
<?php
unset($datos[0]['IdEstudiante']);
unset($datos[0]['IdContacto']);
unset($datos[0]['Nombres']);
unset($datos[0]['Apellidos']);
?>
<div class="" >
  <div class="datos-estudiante">
    <?php foreach ($datos[0] as $campo => $valor): ?>
    <ul>
<?php   if ($valor != null):  ?>
       <li><?=$campo.': '.$datos[0][$campo]?></li>
<?php   endif; ?>
    </ul>
    <?php endforeach; ?>
  </div>
  <div class="datos_curso_estudiante">
    <?php foreach ($ultimo_curso[0] as $campos => $dato):?>
      <ul>
        <li><?=$campos.': '.$ultimo_curso[0][$campos]?></li>
      </ul>
    <?php endforeach; ?>
  </div>

</div>

<?php
 }

 wp_die();
}
