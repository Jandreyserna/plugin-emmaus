<?php
class Modelo_facturas
{
  public $wpdb;
  public $nombre_tabla;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = '';
  }


  function Materials_and_title()
  {
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT `IdMaterial`,`TituloMaterial`
           FROM `materiales`
           GROUP BY `IdMaterial`
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }


/* Consulta informacion de las facturas */

  function information_ventas()
  {
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT `IdFactura`,`FechaFactura`, `IdPromotor`, `Nombre`, `PrecioTotal`, `Saldo`, `Encargado`
           FROM `facturas_ventas`
           GROUP BY `IdFactura`
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }


  /* Consulta los materiales existentes */

  function information_materiales()
  {
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT `IdMaterial`,`TituloMaterial`, `ValorVenta`
           FROM `materiales`
           GROUP BY `IdMaterial`
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }


    /* Consulta el valor de un material */

    function information_material($id)
    {
      $this->wpdb->show_errors(false);
      $informacion = $this->wpdb->get_results(
            "SELECT `IdMaterial`,`TituloMaterial`, `ValorVenta`
             FROM `materiales`
             WHERE `IdMaterial` = $id
             GROUP BY `IdMaterial`
              ",
             'ARRAY_A'
           );
      return (isset($informacion[0])) ? $informacion : null;
    }


    /* consulta por el id de la ultima factura registrada  en ventas*/

    function id_ultima_factura()
    {
      $this->wpdb->show_errors(false);
      $informacion = $this->wpdb->get_results(
            "SELECT IdFactura
             FROM `facturas_ventas` 
             ORDER BY `IdFactura` DESC LIMIT 1
              ",
             'ARRAY_A'
           );
      return (isset($informacion[0])) ? $informacion : null;
    }


    /* añadir factura a tabla facturas_ventas */

    function añadir_factura_venta($datos){
      $this->wpdb->show_errors(false);
      $this->wpdb->insert(
        'facturas_ventas', # TABLA
        $datos # DATOS
      );
    }


    /* registrar materiales salida */

    function registrar_materiales_venta($datos){
      $this->wpdb->show_errors(false);
      $this->wpdb->insert(
        'material_salidas', # TABLA
        $datos # DATOS
      );
    }

/* pedir informacion de facturas de ventas */

    function get_facturas_ventas(){
      $this->wpdb->show_errors(false);
      $informacion = $this->wpdb->get_results(
            "SELECT  `facturas_ventas`.`IdFactura` AS 'IdFactura', `promotores`.`Nombre` AS 'Promotor', 
            `facturas_ventas`.`FechaFactura`, `facturas_ventas`.`PrecioTotal`,`facturas_ventas`.`Saldo`
            FROM `facturas_ventas` INNER JOIN `promotores`
            WHERE `promotores`.`IdContacto` = `facturas_ventas`.`IdContacto`
            ",
            'ARRAY_A'
          );
      return (isset($informacion[0])) ? $informacion : null;
    }

/* pedir informacion de facturas de compras */

    function get_facturas_compras(){
      $this->wpdb->show_errors(false);
      $informacion = $this->wpdb->get_results(
            "SELECT `facturas_compras`.`IdFacturaCompra` AS 'IdFactura', `proovedores`.`proovedor` as 'Proovedor',
            `facturas_compras`.`FechaFactura`,
            `facturas_compras`.`PrecioTotal`,`facturas_compras`.`Saldo` 
            FROM `facturas_compras`INNER JOIN `proovedores`
            WHERE `proovedores`.`IdProovedor` = `facturas_compras`.`IdProveedor`
            ",
            'ARRAY_A'
          );
      return (isset($informacion[0])) ? $informacion : null;
    }
}