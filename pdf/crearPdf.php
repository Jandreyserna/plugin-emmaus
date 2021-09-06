<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// Introducimos HTML de prueba
//$html=file_get_contents_curl(__DIR__."/misDatosPdf.php");
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new Dompdf();
// Definimos el tamaño y orientación del papel que queremos.
$pdf->setPaper("A4", "portrait");
//$pdf->set_paper(array(0,0,104,250));
// Cargamos el contenido HTML.
$pdf->loadHtml("hola viejo");
// Renderizamos el documento PDF.
$pdf->render();
// Enviamos el fichero PDF al navegador.
$pdf->stream('reportePdf.pdf');