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


  /* Consulta todos los materiales de inventario donde el campo inventario sea igual a 0 */
  public function information_inventario()
  {
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT * 
           FROM `inventarios` 
           
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }


/* consulta el inventario actual de un material por Id */
  public function information_material_inventario($id)
  {
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT `inventario`
          FROM `inventarios` 
          WHERE `IdMaterial` = $id;
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  

/* Consulta el stock actual de un material por Id */
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
  public function Update_inventario_material($id , $datos )
  {
    $this->wpdb->show_errors(false);
    $tabla = $this->nombre_tabla;
      $this->wpdb->update(
        $tabla, 
        $datos, # DATOS
        array('IdMaterial' => $id)
      );
  }


    /* Actualizar Inventario de un libro */
  function actualizar_cantidad_libro($id, $cantidad){
    $this->wpdb->show_errors(TRUE);
    $tabla = $this->nombre_tabla;
      $this->wpdb->update(
        'inventarios', 
        $cantidad, # DATOS
        array('IdMaterial' => $id)
      );
  }

}