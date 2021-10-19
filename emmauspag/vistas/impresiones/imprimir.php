<?php
$cursos = courses_done_win(); 
if (!empty($_POST['imprimir-ganados'])){
    unset($_POST['imprimir-ganados']);
    
    $documento = new \PhpOffice\PhpWord\PhpWord();
    $archivo = 'ganados'.date("Y-m-d-B-A").'.docx';
    $url = ABSPATH .'/certificados/'.$archivo;
    $fuente = [
      "name" => "Arial",
      "size" => 11,
      "valign"=>'center',
    ];
    $fuente1 = [
      "name" => "Arial",
      "size" => 28,
      "valign"=>'center',
    ];
    $fuente2 = [
      "name" => "Arial",
      "size" => 18,
      "valign"=>'center',
      "bold" => true,
    ];
    $fuente3 = [
      "name" => "Times New Roma",
      "size" => 12,
      "bold" => true,
    ];
    $fuente4 = [
      "name" => "Comic Sans MS",
      "size" => 11,
      "align"=>'center',
      "bold" => true,
    ];
    $z= 0;
      foreach($cursos as $nombre_columna ){
          $seccion = $documento->addSection();
          $seccion->addText(" \n",$fuente);
          $seccion->addText(" \n",$fuente);
          $seccion->addText(" \n",$fuente1);
          $seccion->addText($cursos[$z]['Nombre']." ".$cursos[$z]['Apellido'],$fuente2);
          $seccion->addText("\t\t".$cursos[$z]['Porcentaje'],$fuente3);
          $seccion->addText($cursos[$z]['Material'],$fuente4);
          $seccion->addPageBreak();
          $z++;
        }

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($documento, "Word2007");
    $objWriter->save($url);
    $envio = site_url('certificados/'.$archivo);
?>
    <script>
      window.open(
      '<?=$envio?>',
      '_blank'
      );
    </script>
<?php
}
?>
<div class="titulo text-center">
<h1>Cursos listos para imprimir</h1>
</div>
 <!-- Button descargar documento con todos los cursos ganados -->
  <form action="" method="post">
    <input type="hidden" name="imprimir-ganados" value="ganados">
    <button type="submit" class="btn btn-primary">Imprimir ganados</button>
  </form>

<table class="display" id="table-print">
<thead>
  <tr>
    <th scope='col'>Id</th>
    <th scope='col'>Nombres</th>
    <th scope='col'>Apellidos</th>
    <th scope='col'>Material</th>
    <th scope='col'>Porcentaje</th>
    <th scope='col'>Dirección</th>
    <th scope='col'>Ciudad</th>
    <th></th>
  </tr>

</thead>

</table>
<div class="result">

</div>

<!-- Modal -->
<div class="modal fade" id="añadirnota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    
  </div>
</div>
</div>
