<?php

/* Actualizar el stock de la tabla de inventariaos (la cantidad de materiales) */
function update_stock($datos){
    $modelo = new ModeloInventario();
    $id = $datos['IdMaterial'] ;
    unset($datos['IdMaterial']);
    $cantidad = $modelo->information_material_stock($id);
    $numero['stock'] = $cantidad[0]['stock'] + $datos['stock'];
    $modelo->Update_stock_material( $id , $numero );
}