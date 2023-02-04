<?php

/* Actualizar el inventario de la tabla de inventariaos (la cantidad de materiales) */
function update_inventario($datos){
    $modelo = new ModeloInventario();
    $id = $datos['IdMaterial'] ;
    unset($datos['IdMaterial']);
    $cantidad = $modelo->information_material_inventario($id);
    $numero['inventario'] = $cantidad[0]['inventario'] + $datos['inventario'];
    $modelo->Update_inventario_material( $id , $numero );
}
/* Actualizar el stock de la tabla de inventariaos (la cantidad de materiales) */
function update_stock($datos){
    $modelo = new ModeloInventario();
    $id = $datos['IdMaterial'] ;
    unset($datos['IdMaterial']);
    $cantidad = $modelo->information_material_stock($id);
    $numero['stock'] = $cantidad[0]['stock'] + $datos['stock'];
    $modelo->Update_inventario_material( $id , $numero );
}