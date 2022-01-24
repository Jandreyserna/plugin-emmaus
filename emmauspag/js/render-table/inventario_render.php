<?php
require_once dirname(dirname(__DIR__)) . '/modelos/ModeloInventario.php';
require dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/wp-load.php';

$modelo = new ModeloInventario();
$datos = $modelo->information_inventario();

echo json_encode($datos);