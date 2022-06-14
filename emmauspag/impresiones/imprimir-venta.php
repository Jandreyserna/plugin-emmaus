<?php
/* cargar clase controlador de facturas de venta  */
require_once dirname(__DIR__).'/Controller/ControlVentas.php';

class ControlImpresiones
{
  public $wpdb;
  public $modelo;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb;
      $this->modelo; 
  }
  /* preguntar por el ultimo id de factura */
  function id_final_factura(){
    $controlador = new ControlVentas();
    $ultimaFactura = $controlador->ultima_factura();
    $ultimaFactura += 1;
    return $ultimaFactura;
  }

}




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
 echo "<pre>";
 print_r( dirname(dirname(__DIR__)).'/phpWord/bootstrap.php' );
 echo "</pre>";
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(__DIR__)) . '/plantillasword/plant.docx');
$archivo = $_POST['cliente'].date("d-D-m-Y").'.docx';
$url = ABSPATH  .'facturaVentas/'.$archivo;
echo "<pre>";
print_r( dirname(dirname(__DIR__)) . '/plantillasword/plant.docx' );
echo "</pre>";
echo "<pre>";
print_r( $_POST );
echo "</pre>";
echo "<pre>";
print_r( $url );
echo "</pre>";
echo "<pre>";
print_r( site_url('facturaVentas/'.$archivo) );
echo "</pre>";
$nom = $_POST['cliente'];

/*
$nom = new TextRun();
$nom->addText($_POST['cliente'], $fuente); 

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
*/
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
*/
$templateProcessor->saveAs($url);
/* $envio = site_url('facturaVentas/'.$archivo);  */



echo "<pre>";
print_r( $_POST );
echo "</pre>";