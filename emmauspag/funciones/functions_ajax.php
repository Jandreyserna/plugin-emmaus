<?php

##########################################
##### Evaluar los POST de este archivo ###
##########################################

use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\Element\TextRun;

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
<div class="container">


  <div class="mostrar-costo-libro center">
    <h4><?=$material[0]['TituloMaterial']?></h4>
    <h5><?=$material[0]['ValorVenta']?></h5>
  </div>

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
</div>
<?php

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



function table_student(){

    wp_die();
}
####################################################################
#########Funcion que llama a la ista secundaria de estudiantes######
####################################################################

function Call_view_students(){
  // require_once dirname(__DIR__) . '/Controller/ControlOnlyEstudiante.php';
  // require_once dirname(__DIR__) . '/modelos/Modelo-estudiantes.php';

  // $result['materiales'] = Materials();

  // ob_start();
  require_once dirname(__DIR__) . '/vistas/estudiantes/estudiantes.php';
  // $result['html'] = ob_get_clean();

  // echo json_encode($result);

  wp_die();
}

##########################################################################################
#########Funcion que llama a la vista secundaria de estudiantes desde la tabal cursos#####
##########################################################################################

function Call_two_view_students(){
  require_once dirname(__DIR__) . '/modelos/Modelo-cursos.php';
  $modelo = new Modelo_cursos();
  $idstudent = $modelo->Id_student_course($_POST['id-course']);
  unset($_POST['id-course']);
  $_POST['id-estudiante'] = $idstudent[0]['IdEstudiante'];
  require_once dirname(__DIR__) . '/vistas/estudiantes/estudiantes.php';
  wp_die();
}

##########################################################################################
#########Funcion que llama a el modal de la vista calificar de cursos#####################
##########################################################################################

function Call_modal_notes(){
  unset($_POST['action']);
  ?>
  <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Calificar Curso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
          <input name="update-nota" type="hidden" value="nuevo" >
          <input name="IdCursoRealizado" type="hidden" value=<?= $_POST['id-course']?> >
          <input name="Porcentaje" type="number" value="0" >
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
          </form>
        </div>
<?php
  wp_die();
}

##########################################################################################
#########Funcion que descarga el documento de word   de cursos ganados o perdidos ########
##########################################################################################

function Call_print_certificate(){
  require ABSPATH . '/wp-load.php';
  require_once dirname(dirname(__DIR__)). '/phpWord/bootstrap.php';
  require_once dirname(__DIR__) . '/modelos/Modelo-cursos.php';
  unset($_POST['action']);
  $modelo = new Modelo_cursos();
  $datos = $modelo->datas_for_certificate($_POST['id-course']);
  $nombre = $datos[0]['Nombres']." ".$datos[0]['Apellidos'];
  
  

  $fuente = [
    "name" => "Arial",
    "size" => 18,
    "valign"=>'center',
    "bold" => true,
  ];
  $fuente2 = [
    "name" => "Times New Roma",
    "size" => 12,
    "bold" => true,
  ];
  $fuente3 = [
    "name" => "Comic Sans MS",
    "size" => 11,
    "align"=>'center',
    "bold" => true,
  ];
  if($datos[0]['Porcentaje'] > 69.9){
      $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor (dirname(dirname(__DIR__)) . '/plantillasword/Plantilla_CERTIFICADO.docx');
      $estudiante = explode(' ',$nombre);
      $estudiante = implode($estudiante);
      $archivo = $estudiante.date("Y-m-d-B-A").'.docx';
      $url = ABSPATH  .'/certificados/'.$archivo;
      $nom = new TextRun();
      $nom->addText($nombre,$fuente);
      $porcentaje = new TextRun();
      $porcentaje->addText("\t\t".$datos[0]['Porcentaje'],$fuente2);
      $material = new TextRun();
      $material->addText($datos[0]['Material'],$fuente3);
      $templateProcessor->setComplexBlock('nombre', $nom);
      $templateProcessor->setComplexBlock('porcentaje', $porcentaje);
      $templateProcessor->setComplexBlock('material', $material);
      $templateProcessor->saveAs($url);
      $envio = site_url('certificados/'.$archivo);
?>
      <script>
        window.open(
        '<?=$envio?>',
        '_blank'
        );
      </script>
<?php
      $dato['Enviado'] = 2;
      $modelo->Id_Update_state($_POST['id-course'] , $dato);
  } else{
      $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor (dirname(dirname(__DIR__)) . '/plantillasword/ANIMO.docx');
      $estudiante = explode(' ',$nombre);
      $estudiante = implode($estudiante);
      $archivo2 = $estudiante.date("Y-m-d-B-A").'.docx';
      $url2 = ABSPATH  .'/perdidos/'.$archivo2;
      $nom = new TextRun();
      $nom->addText($nombre);
      $ciudad = new TextRun();
      $ciudad->addText($datos[0]['Ciudad']);
      $templateProcessor->setComplexBlock('nombre', $nom);
      $templateProcessor->setComplexBlock('ciudad', $ciudad);
      $templateProcessor->saveAs($url2);
      $envio = site_url('perdidos/'.$archivo2);
      ?>
      <script>
        window.open(
        '<?=$envio?>',
        '_blank'
        );
      </script>
<?php
      $dato['Enviado'] = 2;
      $modelo->Id_Update_state($_POST['id-course'] , $dato);
    }   
  wp_die();
}

function Call_print_diploma()
{
  require ABSPATH . '/wp-load.php';
  require_once dirname(dirname(__DIR__)). '/phpWord/bootstrap.php';
  require_once dirname(__DIR__) . '/modelos/ModeloDiplomas.php';
  unset($_POST['action']);
  $modelo = new ModeloDiplomas();
  print_r($_POST['id']);
  $datos = $modelo->datas_for_diploma($_POST['id']);
  $nombre = $datos[0]['Nombres']." ".$datos[0]['Apellidos'];
  
  $fuente = [
    "name" => "Edwardian Script ITC",
    "size" => 47,
    "align"=>'center',
    "bold" => true,
  ];


  $fuente2 = [
    "name" => "Tahoma",
    "size" => 26,
    "align"=>'center',
    "bold" => true,
  ];
  

  $fuente3 = [
    "name" => "Times New Roma",
    "size" => 16,
    "align"=>'center',
    "bold" => true,
  ];
  if($datos[0]['Porcentaje'] > 69.9)
  {
      $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor (dirname(dirname(__DIR__)) . '/plantillasword/Diplomado.docx');
      $estudiante = explode(' ',$nombre);
      $estudiante = implode($estudiante);
      $archivo = $estudiante.date("Y-m-d-B-A").'.docx';
      $url = ABSPATH  .'/diplomas/'.$archivo;
      $nom = new TextRun();
      $nom->addText($nombre,$fuente);
      $programa = new TextRun();
      $programa->addText("\t\t".$datos[0]['Programa'],$fuente2);
      $fecha = new TextRun();
      $fecha->addText($datos[0]['FechaTerminacion'],$fuente3);
      $templateProcessor->setComplexBlock('nombre', $nom);
      $templateProcessor->setComplexBlock('programa', $programa);
      $templateProcessor->setComplexBlock('fecha', $fecha);
      $templateProcessor->saveAs($url);
      $envio = site_url('diplomas/'.$archivo);
?>
      <script>
        window.open(
        '<?=$envio?>',
        '_blank'
        );
      </script>
<?php
      $dato['Enviado'] = 2;
      $modelo->Id_Update_state($_POST['id-course'] , $dato);
  }
  wp_die();
}


##########################################################################################
#########Funcion que llama a el modal de la vista inventarios  para el stock      #####################
##########################################################################################

function Inventarios_modal(){
  unset($_POST['action']);
  
  ?>
  <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Inventario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
          <input name="activo" type="hidden" value="update_inventario" >
          <input name="IdMaterial" type="hidden" value=<?= $_POST['id']?> >
          <label for="inventario">Cantidad</label>
          <input name="inventario" type="number" value="0" >
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>
          </form>
        </div>
<?php
  wp_die();
}

##########################################################################################
#########Funcion que llama a el modal de la vista inventarios  para las ventas      #####################
##########################################################################################

function Inventarios_modal_stock(){
  unset($_POST['action']);
  
  ?>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Stock</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
          <input name="activo" type="hidden" value="update_stock" >
            <input name="IdMaterial" type="hidden" value=<?= $_POST['id']?> >
            <label for="stock">Cantidad a actualizar</label>
            <input name="stock" type="number" value="0" >
            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </form>
        </div>
<?php
  wp_die();
}


##########################################################################
######### FUNCION DE LA VISTA DE FACTURAS DE VENTAS #####################
##########################################################################

function vista_factura_ventas(){ 
  require_once dirname(__DIR__) . '/controller/ControlVentas.php';

  unset($_POST['action']);
  if( !empty($_POST['id']) ){
    /*  consulto valor de material  */
    $control = new ControlVentas();
    $material = $control->one_material_venta($_POST['id']) ;
    /* renuevo los campos input */
?>
    <input type="hidden" name="Titulo" id= "Titulo" value ="<?= $material[0]['TituloMaterial'] ?>">
    <div class="mb-1" style="display:flex">
      <label for="ValorU" style="width : 24%">Valor Unidad</label>
      <input type="number" name="ValorU" id="ValorU" Value ="<?= $material[0]['ValorVenta'] ?>">  
    </div>
    <div class="mb-1" style="display:flex">
      <label for="Cant" style="width : 24%">Cantidad</label>
      <input type="number" name="Cant" id="Cant" Value ="1">
    </div>
    <div class="mb-1 valor-total" style="display:flex">
      <label for="ValorT" style="width : 24%">Valor Total</label>
      <input type="number" name="ValorT" id="ValorT" Value ="<?= $material[0]['ValorVenta'] ?>">
    </div>
<?php
  } else if ( !empty($_POST['ValorU']) ){
    /* multiplico la cantidad por el valor unitario */
    $valort = $_POST['ValorU'] * $_POST['cantidad'];
?>
    <!-- cambio los campos del valor total -->
    <label for="ValorT" style="width : 24%">Valor Total</label>
    <input type="number" name="ValorT" id="ValorT" Value ="<?= $valort?>">

<?php 
  } else if ( !empty($_POST['Cant']) ){
    /* multiplico la cantidad por el valor unitario */
    $valort = $_POST['valor'] * $_POST['Cant'];
?>
    <!-- cambio los campos del valor total -->
    <label for="ValorT" style="width : 24%">Valor Total</label>
    <input type="number" name="ValorT" id="ValorT" Value ="<?= $valort?>">

<?php 
  }
  wp_die();
}