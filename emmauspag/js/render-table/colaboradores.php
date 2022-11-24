<?php

require_once dirname(dirname(__DIR__)) . '/modelos/Modelo-colaborador.php';
require dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . '/wp-load.php';

$modelo = new Modelo_colaborador();
$datos = $modelo->get_colaboradores();
echo json_encode($datos);

?>