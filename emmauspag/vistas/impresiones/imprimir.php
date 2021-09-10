<?php
/* $phpword = new \PhpOffice\PhpWord\PhpWord();
$seccion = $phpword->addSection();
$seccion->addText(
  "primer texto - Jandrey Steven Serna Restrepo"
);
$url = ABSPATH .'ganados.docx';
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword,'Word2007');
$objWriter->save($url);
if(file_exists($url)){
  $envio = site_url('ganados.docx');
?>
  <script>
    window.open(
      '<?=$envio?>',
      '_blank'
    );
  </script>
<?php
} */
?>
<div class="titulo text-center">
<h1>Cursos listo para imprimir</h1>
</div>

<table class="display" id="table-print">
<thead>
  <tr>
    <th scope='col'>ID</th>
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
