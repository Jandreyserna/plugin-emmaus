<?php
/* usar la clase TextRun */
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\Style\TablePosition;
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

  function crear_factura_venta($datos, $datos2){
    echo "<pre>";
    print_r( $datos2 );
    echo "</pre>";
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(__DIR__)) . '/plantillasword/Factura venta.docx');
    $archivo = $datos['cliente'].date("d-D-m-Y").'.docx';
    $url = ABSPATH  .'facturaVentas/'.$archivo;

    $nom = new TextRun();
    $nom->addText('NOMBRE Y APELLIDO: '.$datos['cliente']); 
    $fecha = new TextRun();
    $fecha->addText('FECHA: '.date("d-m-Y"));
    $direccion = new TextRun();
    $direccion->addText('DIRECCIÒN: '.$datos['direccion']);
    $ciudad = new TextRun();
    $ciudad->addText('CIUDAD:'.$datos['ciudad']);
    $cedula = new TextRun();
    $cedula->addText('NIT / C.C: '.$datos['cedula']);
    $telefono = new TextRun();
    $telefono->addText('TELEFONO: '.$datos['telefono']);
/*     $factura = new TextRun();
    $factura->addText($ultimaFactura); */
    
    $templateProcessor->setComplexBlock('cliente', $nom);
    $templateProcessor->setComplexBlock('fecha', $fecha);
    $templateProcessor->setComplexBlock('direccion', $direccion);
    $templateProcessor->setComplexBlock('ciudad', $ciudad);
    $templateProcessor->setComplexBlock('cedula', $cedula);
    $templateProcessor->setComplexBlock('telefono', $telefono);
    $tam = sizeof($datos2) / 6;
    $templateProcessor->cloneRow('titulo', $tam);
    for($i = 1; $i <= $tam; $i++){
      $templateProcessor->setValue('titulo#'.$i, $datos2['Titulo-'.$i]);
      $templateProcessor->setValue('cant#'.$i, $datos2['Cantidad-'.$i]);
      $templateProcessor->setValue('valoru#'.$i, $datos2['ValorU-'.$i]);
      $templateProcessor->setValue('desc#'.$i, $datos2['Descuento-'.$i]);
      $templateProcessor->setValue('iva#'.$i, '0');
      $templateProcessor->setValue('valort#'.$i, $datos2['Total-'.$i]);
    }
    $templateProcessor->saveAs($url);
    $envio = site_url('facturaVentas/'.$archivo);
    
  } 

}



