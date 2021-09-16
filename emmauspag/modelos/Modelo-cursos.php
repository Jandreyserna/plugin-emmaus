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

FROM `curso_realizados` WHERE `Enviado` < 2 AND `Enviado` > 0
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


    #################################################################
  ######Obtener informacuion para la tabla notas######## ############
  #################################################################

  public function table_notes(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT curso_realizados.`IdCursoRealizado`,estudiantes.`Nombres`, estudiantes.`Apellidos`, 
            (SELECT materiales.`TituloMaterial`
             FROM materiales 
             WHERE materiales.IdMaterial = curso_realizados.IdMaterial
             GROUP BY materiales.IdMaterial
             ) AS material, `Porcentaje`, estudiantes.`DireccionCasa`, estudiantes.`Ciudad`
            FROM `curso_realizados` INNER JOIN estudiantes
            WHERE curso_realizados.`Porcentaje` = 0
            AND estudiantes.`IdEstudiante` = curso_realizados.`IdEstudiante`
            ",
           'OBJECT'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

 #################################################################
 ######Obtener informacuion para la tabla notas######## ############
#################################################################

  public function table_lost(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT curso_realizados.`IdCursoRealizado`,estudiantes.`Nombres`, estudiantes.`Apellidos`, 
            (SELECT materiales.`TituloMaterial`
             FROM materiales 
             WHERE materiales.IdMaterial = curso_realizados.IdMaterial
             GROUP BY materiales.IdMaterial
             ) AS material, `Porcentaje`, estudiantes.`DireccionCasa`, estudiantes.`Ciudad`
            FROM `curso_realizados` INNER JOIN estudiantes
            WHERE curso_realizados.`Porcentaje` < 70 
            AND  curso_realizados.`FechaTerminacion` > 20150101
            AND estudiantes.`IdEstudiante` = curso_realizados.`IdEstudiante`
            ",
           'OBJECT'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

#################################################################
######Obtener informacuion para la tabla imprimir######## ############
#################################################################

public function table_done_courses(){
  $this->wpdb->show_errors(false);
  $informacion = $this->wpdb->get_results(
          "SELECT curso_realizados.`IdCursoRealizado`,estudiantes.`Nombres`, estudiantes.`Apellidos`, 
          (SELECT materiales.`TituloMaterial`
           FROM materiales 
           WHERE materiales.IdMaterial = curso_realizados.IdMaterial
           GROUP BY materiales.IdMaterial
           ) AS material, `Porcentaje`, estudiantes.`DireccionCasa`, estudiantes.`Ciudad`
          FROM `curso_realizados` INNER JOIN estudiantes
          WHERE curso_realizados.`Porcentaje` > 0
          AND  curso_realizados.`FechaTerminacion` > 20150101
          AND estudiantes.`IdEstudiante` = curso_realizados.`IdEstudiante`
          AND curso_realizados.`Enviado` = 1
          ",
         'OBJECT'
       );
  return (isset($informacion[0])) ? $informacion : null;
}


  #####################################################################
  ######Obtener Toda la informacion de los cursos realixados###########
  #####################################################################

  public function All_courses(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT curso_realizados.`IdCursoRealizado`, 
            (SELECT `Nombres` FROM estudiantes WHERE curso_realizados.IdEstudiante = estudiantes.IdEstudiante) AS estudianteN,
            (SELECT `Apellidos` FROM estudiantes WHERE curso_realizados.IdEstudiante = estudiantes.IdEstudiante) AS estudianteA,
            (SELECT `TituloMaterial` FROM materiales WHERE curso_realizados.IdMaterial = materiales.IdMaterial GROUP BY materiales.IdMaterial) AS Material,
            `Porcentaje`,
            `FechaTerminacion` 
              FROM `curso_realizados` WHERE `FechaTerminacion` > 20150101  
              ORDER BY `curso_realizados`.`FechaTerminacion`  ASC
            ",
           'OBJECT'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  #####################################################################
  ######Obtener Id de estudiande que realizo un curso #################
  #####################################################################

  public function Id_student_course($id){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT `IdEstudiante`
            FROM curso_realizados 
            WHERE `IdCursoRealizado` = $id
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

  ###################################################################################################
  ######Obtener datos para poner en el documento de word de estudiantes que ganaron #################
  ###################################################################################################

  public function datas_for_certificate($id){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT (SELECT `Nombres` 
            FROM estudiantes
            WHERE estudiantes.`IdEstudiante` = curso_realizados.`IdEstudiante`) AS Nombres,
            (SELECT `Apellidos` 
            FROM estudiantes
            WHERE estudiantes.`IdEstudiante` = curso_realizados.`IdEstudiante`) AS Apellidos,
            (SELECT `Ciudad` 
            FROM estudiantes
            WHERE estudiantes.`IdEstudiante` = curso_realizados.`IdEstudiante`) AS Ciudad,
            (SELECT `TituloMaterial`
            FROM materiales
            WHERE materiales.`IdMaterial` = curso_realizados.`IdMaterial`
            GROUP BY materiales.`IdMaterial`) AS Material,
            `Porcentaje`
            FROM curso_realizados
            WHERE IdCursoRealizado = $id
            ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }
  
  ###############################################################################
  ######Obtener el id del ulrimo material registrado en los cursos ################
  #################################################################################

  public function last_material(){
    $this->wpdb->show_errors(false);
    $informacion = $this->wpdb->get_results(
            "SELECT MAX(`IdMaterial`) AS id
            FROM materiales
            ",
           'ARRAY_A'
         );
         echo "<pre>";
         print_r( $informacion );
         echo "</pre>";
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

   ####################################################
  ######INSERTAR UN NUEVO CURSO EN TABLA cursos#######
  ####################################################

  function insertar_material($args)
  {

    $this->wpdb->insert(
      'materiales', # TABLA
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
