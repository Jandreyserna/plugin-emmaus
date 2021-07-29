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
