<?php
class ModeloInventario
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'inventarios';
  }

  /* Me traigo todos los materiales de inventario donde el campo inventario sea igual a 0 */

  public function information_inventario()
  {
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT * 
           FROM `inventarios` 
           WHERE `inventario` = 0
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

/* Me traigo el stock actual de un material por Id */
  
  public function information_material_stock($id)
  {
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT `stock`
          FROM `inventarios` 
          WHERE `IdMaterial` = $id;
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  /* Actualizar el stock de la tabla inventarios */

  public function Update_stock_material($id , $datos )
  {
    $this->wpdb->show_errors(false);
    $tabla = $this->nombre_tabla;
      $this->wpdb->update(
        $tabla, 
        $datos, # DATOS
        array('IdMaterial' => $id)
      );
  }



}