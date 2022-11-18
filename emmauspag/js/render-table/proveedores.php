<?php

require_once dirname(dirname(__DIR__)) . '/modelos/Modelo-proveedor.php';
require dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/wp-load.php';

$modelo = new Modelo_proveedor();
$datos = $modelo->get_proveedores();

echo json_encode($datos);

?>