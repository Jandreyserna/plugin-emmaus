<?php

class Modelo_materiales
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'cursos';
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
}
