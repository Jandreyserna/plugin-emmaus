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


  public function traer_promotor()
  {
    $informacion = $this->wpdb->get_results(
      "SELECT promotores.`IdContacto`,promotores.`Nombre`, promotores.`Ciudad`
          FROM `promotores`
          GROUP BY promotores.`IdContacto`
          ORDER BY promotores.`Ciudad` 
          
          ",
      'ARRAY_A'
    );
    return (isset($informacion)) ? $informacion : null;

  }

  #=== trae la informacion de un solo promotor segun su id====
  public function traer_un_promotor($id)
  {
    $informacion = $this->wpdb->get_results(
      "SELECT promotores.`Nombre`
          FROM `promotores`
          WHERE promotores.`IdContacto` = $id
          ",
      'ARRAY_A'
    );
    return (isset($informacion[0])) ? $informacion : null;

  }

  #=== trae la informacion de todas las iglesias====
  public function traer_iglesias()
  {
    $informacion = $this->wpdb->get_results(
      "SELECT iglesias.`IdIglesia`, iglesias.`NombreIglesia` as Nombre
          FROM `iglesias`
          GROUP BY iglesias.`IdIglesia`
          ",
      'ARRAY_A'
    );
    return (isset($informacion[0])) ? $informacion : null;

  }

  #=== trae la informacion del ultimo id registrado para promotor====
  public function last_id()
  {
    $informacion = $this->wpdb->get_results(
      "SELECT MAX(IdContacto) AS IdContacto
      FROM `promotores` 
      WHERE 1
      ",
      'ARRAY_A'
    );
    return (isset($informacion[0])) ? $informacion : null;

  }

  /*
  insertar un nuevo promotor
  */
  function insert_promotor($datas)
  {
    $this->wpdb->insert(
      $this->nombre_tabla,
      # TABLA
      $datas # DATOS

    );
  }
  /* consultar datos para tabla de promotores */
  function get_promotores()
  {
    $informacion = $this->wpdb->get_results(
      "SELECT promotores.`IdContacto`,promotores.`Nombre`, promotores.`Ciudad`, iglesias.`NombreIglesia`,
        promotores.`CorreoElectronico`, promotores.`CupoCredito`
        FROM `promotores` INNER JOIN `iglesias`
        WHERE iglesias.`IdIglesia` = promotores.`IdIglesiaRel` 
        GROUP BY promotores.`IdContacto`
        ",
      'ARRAY_A'
    );
    return (isset($informacion)) ? $informacion : null;
  }

}

?>