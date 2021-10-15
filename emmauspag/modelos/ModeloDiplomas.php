<?php
class ModeloDiplomas
{
  public $wpdb;
  public $nombre_tabla;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'diplomas';
  }

  /**
   * Undocumented function long description
   *
   * @param Type $id estudiante , $programa  programa terminado
   * @return void

   **/
  public function insert($id,$programa)
  {
      $args['IdEstudiante'] = $id;
      $args['IdPrograma'] = $programa;
    $this->wpdb->insert(
        $this->nombre_tabla, # TABLA
        $args # DATOS
      );
  }

  function info_table()
  {
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT IdDiploma,Porcentaje,FechaTerminacion, (SELECT Nombre FROM Cursos WHERE cursos.IdCurso = diplomas.IdCurso ) AS Curso,
          (SELECT Nombres FROM estudiantes WHERE estudiantes.IdEstudiante = diplomas.IdEstudiante ) AS Nombres,
          (SELECT Apellidos FROM estudiantes WHERE estudiantes.IdEstudiante = diplomas.IdEstudiante ) AS Apellidos,
          (SELECT Nombre FROM programas WHERE programas.IdPrograma = diplomas.IdPrograma ) AS Programa
          FROM `diplomas`
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }
}