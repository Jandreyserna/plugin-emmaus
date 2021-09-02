<?php
/* \PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\PhpWord;
use PhpOficce\PhpWord\Style\Font;

$documento = new PhpWord();

$seccion = $documento->m addSection();

$seccion->addText(
  htmlspecialchars(
    'primer texto - Texto ain formato'
  )
);

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($documento,'Word2007');
$objWriter->save('certificado.docx');

header("Content-Disposition: attachment; filename='certificado.docx'");
echo file_get_contents('certificado.docx'); */
?>
<div class="titulo text-center">
<h1>Cursos listos para imprimir</h1>
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

