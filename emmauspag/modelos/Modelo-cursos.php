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
  ############################################################
  ######Informacion de tabla, CURSOS, MATERAL, PROGRAMA#######
  ############################################################

  public function informacion_tabla_cursos(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT cursos.IdCurso, cursos.Nombre AS NombreC, niveles.NombreNivel AS NombreN,
            programas.Nombre AS NombreP
            FROM cursos INNER JOIN niveles INNER JOIN programas INNER JOIN cursos_niveles
            WHERE cursos.IdCurso = cursos_niveles.IdCurso
            AND niveles.IdNivel = cursos_niveles.IdNivel
            AND niveles.IdProgramaRel = programas.IdPrograma
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  ############################################################
  ######Informacion de BOTON TABLA ,COSTOS DE MATERIAL#######
  ############################################################

  public function cursos_materiales($ID){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT materiales.IdMaterial, materiales.TituloMaterial, materiales.ValorVenta
            FROM `cursos_materiales` INNER JOIN materiales
            WHERE cursos_materiales.IdCurso = $ID
            AND cursos_materiales.IdMaterialRel = materiales.IdMaterial
            LIMIT 1
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  ####################################################
  ######INFORMACION DE MATERIALES CON ID##############
  ####################################################

  public function cursos_materiales_listado(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT materiales.IdMaterial, materiales.TituloMaterial
            FROM materiales
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  ####################################################
  ######INFORMACION DE NIVELES CON ID##############
  ####################################################

  public function  cursos_niveles_listado(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT niveles.IdNivel, niveles.NombreNivel
            FROM niveles
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  ####################################################################
  ######INFORMACION DE EL ULTIMO ID DE Cursos_Realizados##############
  ####################################################################

  public function  Last_Id_Course(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
          "SELECT MAX(`IdCursoRealizado`) AS IdMax
          FROM `curso_realizados`
          WHERE 1
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }


  ######################################################
  ######Obtener el ID del ultimo curso registrado#######
  ######################################################

  public function ultimo_curso(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT IdCurso
              FROM $this->nombre_tabla
              ORDER BY IdCurso DESC
              LIMIT 1
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  #################################################################
  ######Obtener el ultimo curso registrado de un estudiante #######
  #################################################################

  public function last_course_student($id){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT materiales.`TituloMaterial`, MAX(curso_realizados.`FechaTerminacion`) AS Fecha,
		          curso_realizados.`Porcentaje`
	             FROM curso_realizados INNER JOIN materiales
               WHERE `IdEstudiante` = $id AND
               (curso_realizados.`IdMaterial` = materiales.`IdMaterial` OR
                 curso_realizados.`IdMaterial` = materiales.`Short`)
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  #################################################################
  ######Obtener todos los cursos hechos por un estudiante # #######
  #################################################################

  public function courses_done_student($id){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT cursos.`Nombre`, cursos.`IdCurso`
	           FROM cursos INNER JOIN curso_realizados INNER JOIN materiales INNER JOIN cursos_materiales
             WHERE cursos.`IdCurso` = cursos_materiales.`IdCurso`
             AND materiales.`IdMaterial` = cursos_materiales.`IdMaterialRel`
             AND materiales.`IdMaterial` = curso_realizados.`IdMaterial`
             AND curso_realizados.`IdEstudiante` = $id
             GROUP BY cursos.`Nombre`
             ORDER BY `cursos`.`IdCurso` ASC
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }



  #################################################################
  ######Obtener todos los cursos que hay por ver ########## #######
  #################################################################

  public function Courses_All(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT programas.`Nombre` AS programas, niveles.`NombreNivel` , cursos.`Nombre` AS curso
            FROM programas INNER JOIN niveles INNER join cursos_niveles INNER JOIN cursos
            WHERE cursos_niveles.`IdNivel` = niveles.`IdNivel`
            AND niveles.`IdProgramaRel` = programas.`IdPrograma`
            AND cursos.`IdCurso` = cursos_niveles.`IdCurso`
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }


  #################################################################
  ######Obtener todos los cursos para devolver ########## #######
  #################################################################

  public function Courses_Wins(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT `IdCursoRealizado`, (SELECT Nombres
                           FROM estudiantes
                           WHERE curso_realizados.`IdEstudiante` = estudiantes.`IdEstudiante`) AS Estudiante,

                          (SELECT TituloMaterial
                          FROM materiales
                          WHERE curso_realizados.`IdMaterial` = materiales.`IdMaterial`
                          GROUP BY materiales.`IdMaterial`
                          ) AS Curso,
                          `Porcentaje` , `FechaTerminacion`

FROM `curso_realizados` WHERE `Enviado` < 2
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  #################################################################
  ######Obtener todos los id de cursos para actualizar ############
  #################################################################

  public function Courses_Id_Update(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT `IdCursoRealizado`,`IdMaterial`,`IdCurso`
             FROM `curso_realizados`
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  #################################################################
  ######Obtener todos los estados de cursos para actualizar ############
  #################################################################

  public function Courses_Id_Update_state(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT `IdCursoRealizado`,`Enviado`
             FROM `curso_realizados`
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  ####################################################
  ######INSERTAR UN NUEVO CURSO EN TABLA cursos#######
  ####################################################

  function insertar_curso($args)
  {

    $this->wpdb->insert(
      $this->nombre_tabla, # TABLA
      $args # DATOS
    );
  }

  #############################################################
  ######INSERTAR UN NUEVO CURSO EN TABLA cursos_material#######
  #############################################################

  function insertar_curso_material($args)
  {
    $tabla = 'cursos_materiales';

    $this->wpdb->insert(
      $tabla, # TABLA
      $args # DATOS
    );
  }
  #############################################################
  ######INSERTAR UN NUEVO CURSO EN TABLA cursos_niveles #######
  #############################################################

  function insertar_curso_nivel($args)
  {
    $tabla = 'cursos_niveles';

    $this->wpdb->insert(
      $tabla, # TABLA
      $args # DATOS
    );
  }

  #############################################################
  ######ACTUALIZAR Estado del Curso#####################
  #############################################################


  public function Id_Update_state($id , $datos ){
    $tabla = 'curso_realizados';
    $this->wpdb->show_errors(false);
      $this->wpdb->update(
        $tabla, # TABLA
        $datos, # DATOS
        array('IdCursoRealizado' => $id)
      );
  }


  #############################################################
  ######ACTUALIZAR COSTO DE LOS MATERIALES#####################
  #############################################################


  public function update_costo_material($id , $datos ){
    $tabla = 'materiales';
    $this->wpdb->show_errors(false);
      $this->wpdb->update(
        $tabla, # TABLA
        $datos, # DATOS
        array('IdMaterial' => $id['IdMaterial'])
      );
  }


#############################################################################
######actualizar el IdCurso de curso de la tabla curso_realizados############
#############################################################################

public function Courses_Update_state($id,$datos){
  $tabla = 'curso_realizados';
  $this->wpdb->show_errors(false);
    $this->wpdb->update(
      $tabla, # TABLA
      $datos, # DATOS
      array('IdCursoRealizado' => $id)
    );
}
}
