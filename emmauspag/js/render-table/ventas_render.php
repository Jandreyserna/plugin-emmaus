<?php
require_once dirname(dirname(__DIR__)) . '/modelos/Modelo-facturas.php';
require dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/wp-load.php';

$modelo = new Modelo_Facturas();
$datos = $modelo->information_ventas();

echo json_encode($datos);