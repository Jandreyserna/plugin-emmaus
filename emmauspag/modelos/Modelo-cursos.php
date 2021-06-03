<?php

class Modelo_cursos
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

  public function informacion_tabla_cursos(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT cursos.IdCurso, cursos.Nombre AS NombreC, niveles.NombreNivel AS NombreN,
            programas.Nombre AS NombreP, materiales.ValorVenta
            FROM cursos INNER JOIN niveles INNER JOIN programas INNER JOIN materiales INNER JOIN cursos_niveles INNER JOIN cursos_materiales
            WHERE cursos.IdCurso = cursos_niveles.IdCurso
            AND niveles.IdNivel = cursos_niveles.IdNivel
            AND programas.IdPrograma = niveles.IdProgramaRel",
           'ARRAY_A'
         );
         print_r($informacion[0]);
    return (isset($informacion[0])) ? $informacion : null;
  }

  // public function update_estudent($datos, $id){
  //   $this->wpdb->show_errors(false);
  //     $this->wpdb->update(
  //       $this->nombre_tabla, # TABLA
  //       $datos, # DATOS
  //       array('IdEstudiante' => $id)
  //     );
  // }
}
