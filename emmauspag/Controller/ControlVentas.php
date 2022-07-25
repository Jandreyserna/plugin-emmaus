<?php
require_once dirname(__DIR__).'/modelos/Modelo-facturas.php';

class ControlVentas
{
  public $wpdb;
  public $modelo;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb;
      $this->modelo = new Modelo_facturas(); 
  }

  /* Materiales */
    function materiales_venta(){
        $modelo = new Modelo_facturas();
        $materiales = $modelo->information_materiales();
        return $materiales;
    }


    /* material segun Id */
    function one_material_venta($id){
        $modelo = new Modelo_facturas();
        $material = $this->modelo->information_material($id);
        return $material;
    }


    /* todos los promotores */
    function promotores () {
        $modelo = new Modelo_promotor();
        $promotores = $modelo->traer_promotor();
        return $promotores;
    }


    /* id de la ultima factura */
    function ultima_factura(){
        $modelo = new Modelo_facturas();
        $idfactura = $modelo-> id_ultima_factura();
        return $idfactura[0]['IdFactura'];
    }


    /* añadir datos a facturas_ventas */
    function nueva_factura_venta($datos){
        $modelo = new Modelo_facturas();
        $modelo->añadir_factura_venta($datos);
    }


    /* registrar materiales salidas */
    function registrar_materiales_salida($datos){
        $modelo = new Modelo_facturas();
        $modelo->registrar_materiales_venta($datos);
    }


    /* consultar la cantidad actual del inventario */
    function consultar_inventario($id){
        $modelo = new ModeloInventario();
        $dato = $modelo->information_material_stock($id);
        return $dato[0]['stock'];
    }


    /* Funcion para actualizar el inventario de un libro */
    function actualizar_inventario($id, $cantidad){
        $modelo = new ModeloInventario();
        $cant['stock'] = $cantidad;
        $modelo->actualizar_cantidad_libro($id, $cant);
    }


}

