<?php
/* cargar las dependencias del phpword */
require_once dirname(dirname(__DIR__)).'/phpWord/bootstrap.php';

/* volver al contexto */
require dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/wp-load.php';
/* cargar clase controlador de facturas de venta  */
require_once dirname(__DIR__).'/Controller/ControlVentas.php';

/* preguntar por el ultimo id de factura */

$controlador = new ControlVentas();
$ultimaFactura = $controlador->ultima_factura();
$ultimaFactura += 1;
echo "<pre>";
print_r( $ultimaFactura );
echo "</pre>";

$fuente = [
    "name" => "Arial",
    "size" => 11,
    "bold" => false,
];
$fuente2 = [
    "name" => "arial",
    "size" => 11,
    "bold" => true,
];
 
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(__DIR__)) . '/plantillasword/documento.docx');
$archivo = $_POST['cliente'].date("d-D-m-Y").'.docx';
$url = ABSPATH  .'facturaVentas/'.$archivo;
echo "<pre>";
print_r( $url );
echo "</pre>";
/*
$nom = new TextRun();
$nom->addText($_POST['cliente'], $fuente); 
/*
$fecha = new TextRun();
$fecha->addText(date("d-m-Y"));
/*
$direccion = new TextRun();
$direccion->addText($_POST['direccion']);
$ciudad = new TextRun();
$ciudad->addText($_POST['ciudad']);
/*
$cedula = new TextRun();
$cedula->addText($_POST['documento']);
$telefono = new TextRun();
$telefono->addText($_POST['telefono']);
$factura = new TextRun();
$factura->addText($ultimaFactura);
/*
$titulo = new TextRun();
$titulo->addText($_POST['titulos'][0]);
$cant = new TextRun();
$cant->addText($_POST['cants'][0]);
$valoru = new TextRun();
$valoru->addText($_POST['valoresU'][0]);
$desc = new TextRun();
$desc->addText($_POST['descts'][0]);
$iva = new TextRun();
$iva->addText('0');
$valort = new TextRun();
$valort->addText($_POST['valorest'][0]);

$templateProcessor->setComplexBlock('cliente', $nom);
/*
$templateProcessor->setComplexBlock('fecha', $fecha);
$templateProcessor->setComplexBlock('direccion', $direccion);
$templateProcessor->setComplexBlock('ciudad', $ciudad);
$templateProcessor->setComplexBlock('fecha', $cedula);
$templateProcessor->setComplexBlock('telefono', $telefono);
$templateProcessor->setComplexBlock('IdFactura', $factura);
$templateProcessor->setComplexBlock('titulo', $titulo);
$templateProcessor->setComplexBlock('cant', $cant);
$templateProcessor->setComplexBlock('valoru', $valoru);
$templateProcessor->setComplexBlock('desc', $desc);
$templateProcessor->setComplexBlock('iva', $iva);
$templateProcessor->setComplexBlock('valort', $valort);

$templateProcessor->saveAs($url);
$envio = site_url('facturasVentas/'.$archivo); 
*/


echo "<pre>";
print_r( $_POST );
echo "</pre>";