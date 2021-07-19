<?php
class Modelo_promotor
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'promotores';
      #$this->get_key_foreaneas();
  }

  #=============================================================
  #===TRAER TODOS LOS NOMBRES Y EL ID DE PROMOTOR===============
  #===y traer la iglesia a la que esta asociado ese promotor====
  #=============================================================

  public function traer_promotor(){
    $informacion = $this->wpdb->get_results(
          "SELECT promotores.`IdContacto`,promotores.`Nombre`
          FROM `promotores`
          ",
           'ARRAY_A'
         );
    return (isset($informacion)) ? $informacion : null;

  }

  public function traer_un_promotor($id){
    $informacion = $this->wpdb->get_results(
          "SELECT promotores.`Nombre`
          FROM `promotores`
          WHERE promotores.`IdContacto` = $id
          ",
           'ARRAY_A'
         );
    return (isset($informacion)) ? $informacion : null;

  }
}
