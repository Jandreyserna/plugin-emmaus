<?php

/**
 *
 */
class Modelo
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct($N_tabla)
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = $N_tabla;
      #$this->get_key_foreaneas();
  }

  function insertar_wpdb($args)
  {

    $this->wpdb->insert(
      $this->nombre_tabla, # TABLA
      $args['datos'] # DATOS
    );
  }

  #funcion para traer las columnas de la base de datos;

  function columnas()
  {
    $colum_name = $this->wpdb->get_results (
        "SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_NAME = '{$this->nombre_tabla}'
        ORDER BY ORDINAL_POSITION"
      );

    return $colum_name;
  }

  function columnas_sin_llaves()
  {
    $nombre_columna = $this->wpdb->get_results (
        "SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE `TABLE_SCHEMA` = 'emmaus'
        AND `TABLE_NAME` = '{$this->nombre_tabla}'
        AND `COLUMN_KEY` != 'PRI'
        AND `COLUMN_KEY` != 'MUL' LIMIT 10000",
        'ARRAY_A'
      );

    return $nombre_columna;
  }

  function primary_key()
  {
    $primary_key =$this->wpdb->get_results(
          "SELECT * FROM information_schema.KEY_COLUMN_USAGE
           WHERE KEY_COLUMN_USAGE.TABLE_NAME  = '{$this->nombre_tabla}'",
           'ARRAY_A'
         );
    $primary = array_search('PRIMARY', array_column($primary_key, 'CONSTRAINT_NAME'));

    return $primary_key[$primary]['COLUMN_NAME'];


  }

  public function get_key_foreaneas()
  {
    $results = $this->wpdb->get_results(
          "SELECT *
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE KEY_COLUMN_USAGE.TABLE_NAME  = '{$this->nombre_tabla}' AND
            KEY_COLUMN_USAGE.CONSTRAINT_NAME LIKE '%fk_Es-%';",
           'ARRAY_A'
         );

    #if (isset($results[0])) $this->key_foreaneas = $results;

     return (isset($results[0])) ? $results : null;
  }

  public function get_field_key_foreanea_select($fields, $referenced_table)
  {
    if (is_array($fields))
      $fields = implode(',', $fields);

    $results = $this->wpdb->get_results(
          "SELECT $fields
          FROM $referenced_table",
           'ARRAY_A'
         );
  //  echo "<pre>";
    //print_r( $results );
    //echo "</pre>";

    return $results;

  }

  function buscador_nombre($nombre , $columnas)
  {
    $columnas = implode(',', $columnas);
    $informacion = $this->wpdb->get_results(
          "SELECT $columnas
          FROM `{$this->nombre_tabla}`
          WHERE Nombres = $nombre",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;

  }

  public function Buscador_personas($info)
  {
    $nombres = $info['Nombres'];
    $apellidos = $info['Apellidos'];
    $informacion = $this->wpdb->get_results(
          "SELECT *
          FROM `{$this->nombre_tabla}`
          WHERE Nombres LIKE '%{$nombres}%' AND Apellidos LIKE '%{$apellidos}%'",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }
}
