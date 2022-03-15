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
}