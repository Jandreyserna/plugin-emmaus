<div class="contenedor-estudiantes">
  <div class="titulo text-center">
    <h1>ADMINISTRACIÓN DE ESTUDIANTES</h1>
  </div>
  <form class="d-md-flex form-search-estudiantes" method="post"  >
        <input type="hidden" name="boton" value="buscador-nombre">
        <input type="hidden" name="Tabla" value="estudiantes">
        <input   class="form-control me-2" type="search" placeholder="DIGITE EL NOMBRE " aria-label="Search">
        <!-- <input id="Fbuscar" class="btn btn-outline-success" type="submit" value="BUSCAR"/> -->
  </form>

  <div class="contenedor-search">

  </div>

  <table class="table" id="tabla-buscador">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Ciudad</th>
      <th scope="col">Cursos Terminados</th>
      <th scope="col">Ultimo Curso</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">0</th>
      <td>Jose Mario</td>
      <td>Dosquebradas</td>
      <td>5</td>
      <td>el hombre perfecto</td>
      <td>05/05/2020</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>Flikimax</td>
      <td>Dosquebradas</td>
      <td>Todo bebe</td>
      <td>Amado se yo mismo</td>
      <td>01/12/2021</td>
    </tr>
  </tbody>
</table>




</div>

<div class="crudd">
  <button class="btn btn-primary" type="button" name="button">


  <div class="container">

    <a href="#ident" class="btn-crudd btn-sucess" data-toggle="collapse">Insertar Estudiante Nuevo</a>

  </div>
</button>
<button class="btn btn-primary" type="button" name="button">
  <div class="container">
    <a href="#buscar" class="btn-crudd btn-sucess" data-toggle="collapse">Actualizar Estudiante</a>

  </div>
</button>
</div>

<div id="ident" class="collapse">
  <form action="" class="form-inline" method="post">
    <input type="hidden" name="tabla" value="estudiantes"/>
    <input  type="hidden" name="boton" value="ingreso"/>
    <?php

    



    foreach($llaves_foranes as $noimporta)
      {
            $n=0;
            $opciones_select = $modelo_estudiantes->get_field_key_foreanea_select('Nombres', $noimporta['REFERENCED_TABLE_NAME']);
            ?>
            <label for="campo1"><?php echo $noimporta['REFERENCED_TABLE_NAME']; ?> </label>
            <select class="selection" name="selecionador">
                <?php foreach ($opciones_select as $nombres) { ?>
                  <option value="<?php echo 1 ?>"><?php echo $nombres['Nombres'] ?></option>
                  <?php  } ?>
            </select>
      <?php
      }
    foreach ($colum_name as  $value)
            {
                  ?><p>
                    <label for="campo1"><?php echo $value['COLUMN_NAME']; ?> </label>
                    <input type="text" id="campo1" name="<?php  echo $value['COLUMN_NAME'] ?>" placeholder="Inserta un dato"/>
                   </p>
                  <?php
                }
      ?>
    <input href="#enviar-form"  type="submit" value="Enviar"/>
  </form>
</div>

<div id="enviar-form">
  <?php
        insertar_base_datos($_POST);
    ?>
</div>

<div id="buscar" class="collapse">
    <?php
    $columnas = $modelo_estudiantes->columnas_sin_llaves();
    ?>
      <form class="formulario_busqueda" method="post">
        <input  type="hidden" name="tabla" value="estudiantes"/>
        <input  type="hidden" name="boton" value="actualizar"/>
        <input   type="text" name="Nombres"  placeholder="Digite los NOMBRES"/>
        <input   type="text" name="Apellidos"  placeholder="Digite los APELLIDOS"/>
        <input  id="Enviar" type="submit" value="consultar"/>
      </form>
        <div id="respuesta"></div>


</div>

<div class="boton-volver">
  <button class="boton_para_volver" name="button">
  <a href="<?=site_url()?>">Volver</a>
  </button>
</div>
</div>
