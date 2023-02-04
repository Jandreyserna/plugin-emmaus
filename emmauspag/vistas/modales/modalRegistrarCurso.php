<!-- dependecias consultas bd php -->
<?php
    $modelo_curso = new Modelo_cursos();    
    $info_material = $modelo_curso->cursos_materiales_listado();
    $info_nivel = $modelo_curso->cursos_niveles_listado();
?>

<!-- Modal añadir curso-->
<div class="modal fade" id="añadircurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulario curso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" method="post" action="">
                <p><label for="campo1">Nombre Curso</label>
                <input name="Nombre" type="text" placeholder="Nombre del nuevo curso" ></p>
                <input name="nuevo-curso" type="hidden" value="nuevo" >
                <select class="id_libro" name="IdMaterial" required>
                    <option value="" disabled selected>Material</option>
                <?php foreach ($info_material as $columna=> $data): ?>
                    <option value="<?= $data['IdMaterial'] ?>"> <?= $data['TituloMaterial']?></option>
                <?php endforeach; ?>
                </select>
                <select class="id_Programa" name="IdNivel" required>
                    <option value="" disabled selected>Nivel</option>
                <?php foreach ($info_nivel as $colum=> $date): ?>
                    <option value="<?= $date['IdNivel'] ?>"> <?= $date['NombreNivel']?></option>
                <?php endforeach; ?>
                </select>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>