<?php
require_once dirname(dirname(__DIR__)) . '/modelos/Modelo-facturas.php';
require dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/wp-load.php';

$modelo = new Modelo_facturas();
$datosCompras = $modelo->get_facturas_compras();
$datosVentas = $modelo->get_facturas_ventas();
if(!empty($datosVentas)):
    for ($i = 0; $i < sizeof($datosVentas); $i++ ):
        $datos[$i]['Tipo'] = 'Venta';
        $datos[$i]['IdFactura'] = $datosVentas[$i]['IdFactura'];
        $datos[$i]['Promotor'] = $datosVentas[$i]['Promotor'];
        $datos[$i]['FechaFactura'] = $datosVentas[$i]['FechaFactura'];
        $datos[$i]['PrecioTotal'] = $datosVentas[$i]['PrecioTotal'];
        $datos[$i]['Saldo'] = $datosVentas[$i]['Saldo'];
        $datos[$i]['Proovedor'] = $datosVentas[$i]['---'];
    endfor;
endif;
if(!empty($datosCompras)):
    $x = 0;
    for ($i = sizeof($datosCompras) ; $i <= sizeof($datosCompras); $i++ ):
        $datos[$i]['Tipo'] = 'Compra';
        $datos[$i]['IdFactura'] = $datosCompras[$x]['IdFactura'];
        $datos[$i]['Proovedor'] = $datosCompras[$x]['Proovedor'];
        $datos[$i]['FechaFactura'] = $datosCompras[$x]['FechaFactura'];
        $datos[$i]['PrecioTotal'] = $datosCompras[$x]['PrecioTotal'];
        $datos[$i]['Saldo'] = $datosCompras[$x]['Saldo'];
        $datos[$i]['Promotor'] = $datosCompras[$x]['----'];
        $x++;
    endfor;
endif;


echo json_encode($datos);