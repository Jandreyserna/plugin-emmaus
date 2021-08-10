<?php
class Modelo_estudiantes
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'estudiantes';
      #$this->get_key_foreaneas();
  }



  public function update_estudent($datos, $id){
    $this->wpdb->show_errors(false);
      $this->wpdb->update(
        $this->nombre_tabla, # TABLA
        $datos, # DATOS
        array('IdEstudiante' => $id)
      );
  }

#########################################################################
########## Traer informacion basica de todos los estudiantes ############
#########################################################################

  public function info_table_student(){
      $informacion = $this->wpdb->get_results(
        "SELECT e.IdEstudiante , e.IdContacto , e.Nombres, e.Apellidos , e.DireccionCasa , e.Ciudad
        FROM estudiantes AS e ORDER BY e.IdEstudiante DESC LIMIT 3000;
        ",
       'ARRAY_A'
     );
    return (isset($informacion[0])) ? $informacion : null;
  }

  #########################################################################
  ########## Traer informacion de la tabla de curzos realizados ############
  #########################################################################
  public function cursos_realizados(){
    $informacion = $this->wpdb->get_results(
      "SELECT estudiantes.`IdEstudiante`, estudiantes.`Nombres`, estudiantes.`Apellidos`,estudiantes.`Ciudad`,
      (SELECT COUNT(curso_realizados.`IdCursoRealizado`)
                       FROM curso_realizados
                       WHERE curso_realizados.`IdEstudiante` = estudiantes.`IdEstudiante`)
                       AS Cursos_Realizados,
                       (SELECT MAX(curso_realizados.`FechaTerminacion`)
                       FROM curso_realizados
                       WHERE curso_realizados.`IdEstudiante` = estudiantes.`IdEstudiante`)
                       AS Fecha,
                       (SELECT curso_realizados.`IdMaterial`
                        FROM curso_realizados
                        WHERE curso_realizados.`FechaTerminacion` = Fecha) AS Material
        FROM estudiantes INNER JOIN curso_realizados
        WHERE curso_realizados.`IdEstudiante` = estudiantes.`IdEstudiante`
        OR NOT EXISTS (SELECT  curso_realizados.`IdEstudiante`
                       FROM curso_realizados
                       WHERE estudiantes.`IdEstudiante` = curso_realizados.`IdEstudiante` )
        GROUP BY estudiantes.`IdEstudiante`

      ",

       'ARRAY_A'
     );
    return (isset($informacion[0])) ? $informacion : null;

  }

  ###########################################################
  ########## Traer informacion bde un estudiante ############
  ###########################################################

  public function informacion_estudiante($id){
    $informacion = $this->wpdb->get_results(
      "SELECT *
      FROM `estudiantes`
      WHERE `IdEstudiante` = $id
      ",
       'ARRAY_A'
     );
    return (isset($informacion[0])) ? $informacion : null;

  }
}
