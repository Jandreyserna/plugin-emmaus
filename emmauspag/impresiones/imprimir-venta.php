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
    $final = $this->id_final_factura();
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(dirname(dirname(__DIR__)) . '/plantillasword/Factura venta.docx');
    $archivo = $datos['cliente'].date("d-D-m-Y").'.docx';
    $url = ABSPATH  .'facturaVentas/'.$archivo;

    $nom = new TextRun();
    $nom->addText('NOMBRE Y APELLIDO: '.$datos['cliente']); 
    $fecha = new TextRun();
    $fecha->addText('FECHA: '.date("d-m-Y"));
    $direccion = new TextRun();
    $direccion->addText('DIRECCIÓN: '.$datos['direccion']);
    $ciudad = new TextRun();
    $ciudad->addText('CIUDAD:'.$datos['ciudad']);
    $cedula = new TextRun();
    $cedula->addText('NIT / C.C: '.$datos['cedula']);
    $telefono = new TextRun();
    $telefono->addText('TELÉFONO: '.$datos['telefono']);
    $descuento = new TextRun();
    $descuento->addText($datos['descuentoFactura']);
    $costo = new TextRun();
    $costo->addText($datos['totalFactura']);
    $costosinporcentaje = new TextRun();
    $costosinporcentaje->addText($datos['totalsinporcentaje']);
    $factura = new TextRun();
    $factura->addText($final);
    /*     $factura = new TextRun();
    $factura->addText($ultimaFactura); */
    $templateProcessor->setComplexBlock('cliente', $nom);
    $templateProcessor->setComplexBlock('fecha', $fecha);
    $templateProcessor->setComplexBlock('direccion', $direccion);
    $templateProcessor->setComplexBlock('ciudad', $ciudad);
    $templateProcessor->setComplexBlock('cedula', $cedula);
    $templateProcessor->setComplexBlock('telefono', $telefono);
    $templateProcessor->setComplexBlock('descg', $descuento);
    $templateProcessor->setComplexBlock('total', $costo);
    $templateProcessor->setComplexBlock('val', $costosinporcentaje);
    $templateProcessor->setComplexBlock('IdFactura', $factura);
    
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
?>
<script>
      window.open(
      '<?=$envio?>',
      '_blank'
      );
</script>
<?php
    
  }


  /* enviar datos a modelo facturas para añadir facturas de venta */

  function añadir_factura_venta($datos, $libros){
    $final = $this->id_final_factura();
    $usuario = wp_get_current_user();
    $controlador = new ControlVentas();
    $datosFactura['FechaFactura'] = date("d-m-Y");
    $datosFactura['IdFactura'] = $final;
    $datosFactura['IdPromotor'] = $datos['promotores'];
    $datosFactura['PrecioTotal'] = $datos['totalFactura'];
    $datosFactura['Descuento'] = $datos['tdescuentoFactura'];
    $datosFactura['Saldo'] = 0;
    $datosFactura['Nombre'] = $datos['cliente'];
    $datosFactura['OtrosCargos'] = 0;
    $datosFactura['Encargado'] = $usuario->data->user_login;
    $datosFactura['Observaciones'] = '';
    for($i = 1 ; $i <= sizeof($libros) / 6; $i++){
      $datoslibro['IdFactura'] = $final;
      $datoslibro['IdMaterial'] = $libros['IdMaterial-'.$i];
      $datoslibro['Cantidad'] = $libros['Cantidad-'.$i];
      $datoslibro['CostoUnitario'] = $libros['ValorU-'.$i];
      $datoslibro['CostoTotal'] = $libros['Total-'.$i]; 
      $datoslibro['Descuento'] = $libros['Descuento-'.$i]; 
      $controlador->registrar_materiales_salida($datoslibro);
    }
    $controlador->nueva_factura_venta($datosFactura);
  }

}



