<?php

########################################################################
########traer la informacion de todos los cursos sin entregar ##########
########################################################################
function control_course_done()
 {
   $modelo_cursos = new Modelo_cursos();
   $cursos_hechos = $modelo_cursos->Courses_Wins();

   return $cursos_hechos;
 }


 ########################################################################
 ########traer los id de materiales para actualzar############ ##########
 ########################################################################
 function control_update_id()
  {
    $modelo_cursos = new Modelo_cursos();
    $id_cursos = $modelo_cursos->Courses_Id_Update();

    return $id_cursos;
  }

  function control_update_id_state()
   {
     $modelo_cursos = new Modelo_cursos();
     $id_state = $modelo_cursos->Courses_Id_Update_state();

     return $id_state;
   }

###################################################################
###### Actualizar el Id curso de la tabla cursos realizados########
###################################################################
   function update_id_course($num, $id)
    {
      $dato['IdCurso'] = $num;
      echo "<pre>";
      print_r($dato);
      echo "</pre>";
      print_r($id);
      echo "</pre>";
      $modelo_cursos = new Modelo_cursos();
      $modelo_cursos->Courses_Update_state($id,$dato);


    }

   function update_state($datos)
   {
     $modelo_cursos = new Modelo_cursos();
     echo "<pre>";
     print_r($datos['IdCursoRealizado']);
     echo "</pre>";
     $dato['Enviado'] = 3;
     $id = $datos['IdCursoRealizado'];
     $modelo_cursos->Id_Update_state($id,$dato);
   }
