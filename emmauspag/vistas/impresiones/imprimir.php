<?php
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;
$documento = new PhpWord();

echo "<pre>";
print_r( $documento );
echo "</pre>";
$document = $PHPWord->loadTemplate('Template.docx');

$document->setValue('Value1', 'Sun');
$document->setValue('Value2', 'Mercury');
$document->setValue('Value3', 'Venus');
$document->setValue('Value4', 'Earth');
$document->setValue('Value5', 'Mars');
$document->setValue('Value6', 'Jupiter');
$document->setValue('Value7', 'Saturn');
$document->setValue('Value8', 'Uranus');
$document->setValue('Value9', 'Neptun');
$document->setValue('Value10', 'Pluto');

$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

$document->save('Solarsystem.docx');
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

