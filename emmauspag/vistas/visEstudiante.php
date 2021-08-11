<?php
if (!empty($_POST['nuevo-estudiante'])){
  unset($_POST['nuevo-estudiante']);
  insert_funtion('estudiantes', $_POST);
} else if (!empty($_POST['id-estudiante'])){
  see_students_admin();
}else{

  $datas = Information_curse_student();
  $columnas_estudiantes = Colum_Students();
  $promotores = Information_Promotors();
   
  $url = ABSPATH;
  //$url = str_replace(\, '/', ABSPATH);
   //echo "<pre>";
   //print_r($url);
   //print_r(ABSPATH .'\wp_confi.php');
   //echo"</pre>";

  ?>

<div class="contenedor-estudiantes">
    <div class="titulo text-center">
      <h1>Módulo Estudiantes</h1>
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante">
      Añadir nuevo estudiante
    </button>
    <button type="button" class="btn btn-outline-success" data-toggle="modal2" data-target="#busquedaavanzada">
      Busqueda avanzada
    </button>


    <table class="display" id="tabla1">
    <thead>
      <tr>
        <th scope='col'>ID</th>
        <th scope='col'>IdPromotor</th>
        <th scope='col'>Nombres</th>
        <th scope='col'>Apellidos</th>
        <th scope='col'>Dirección</th>
        <th scope='col'>Ciudad</th>
        <!-- <th scope='col'>Ultimo curso</th> -->
        <th></th>
      </tr>

    </thead>
  </table>
  </div>
<div class="contenedor.search">
  
</div>


  <!-- Modal -->
  <div class="modal fade" id="añadirestudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulario Estudiante</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
          <input name="nuevo-estudiante" type="hidden" value="nuevo" >
          <select class="id_promotor" name="IdContacto" required>
              <option value="" disabled selected>Promotor</option>
           <?php foreach ($promotores as $col=> $valor): ?>
              <option value="<?= $valor['IdContacto'] ?>"> <?= $valor['Nombre']?></option>
           <?php endforeach; ?>
          </select>

          <?php
                for ($z=2; $z < sizeof($columnas_estudiantes) ; $z++)
                {
                  foreach($columnas_estudiantes[$z] as $nombre_columna => $column ):?>
                    <label for="campo1"><?=$column?></label>
                    <input name="<?=$column?>" type="text" placeholder="DIGITE EL NOMBRE " >
          <?php  endforeach;
                }
              ?>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="boton-volver">
    <button class="boton_para_volver" name="button">
      <a href="<?=site_url()?>">Volver</a>
    </button>
  </div>
</div>
<?php } ?>
