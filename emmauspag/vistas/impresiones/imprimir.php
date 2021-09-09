<?php
ob_start();
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$seccion = $phpWord->addSection();
$seccion->addText(
    "Primer texto - sin formato"
);

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('primer.docx');
header("content-Type: appliication/octet-stream");
header("Content-Disposition: attachment; filename='primer.docx'");
//file_get_contents('primer.docx');
//ob_end_flush();
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

<!-- Modal -->
<div class="modal fade" id="añadirnota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    
  </div>
</div>
</div>
