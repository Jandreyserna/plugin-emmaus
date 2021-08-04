<?php
// if (!empty($_POST['nuevo-estudiante'])){
//   unset($_POST['nuevo-estudiante']);
//   insert_funtion('estudiantes', $_POST);
// } else if (!empty($_POST['id-estudiante'])){
//   see_students_admin();
// }else{

$idmaterial = data_students();
  // $fechas = data_students();
  // // echo "<pre>";
  // // print_r($fechas );
  // // echo"</pre>";
  // for ($m=0; $m < sizeof($fechas) ; $m++) {
  //   if ($fechas[$m]['FechaTerminacion'] != "") {
  //     $dates = explode(" ", $fechas[$m]['FechaTerminacion']);
  //     if (sizeof($dates) > 4) {
  //
  //
  //     echo $m;
  //     switch ($dates[1]) {
  //       case 'Jan':
  //         $dates[1]= "01";
  //         break;
  //       case 'Feb':
  //       $dates[1]= "02";
  //         break;
  //       case 'Mar':
  //       $dates[1]= "03";
  //         break;
  //       case 'Apr':
  //       $dates[1]= "04";
  //         break;
  //       case 'May':
  //       $dates[1]= "05";
  //         break;
  //       case 'Jun':
  //       $dates[1]= "06";
  //         break;
  //       case 'Jul':
  //       $dates[1]= "07";
  //         break;
  //       case 'Aug':
  //       $dates[1]= "08";
  //         break;
  //       case 'Sep':
  //       $dates[1]= "09";
  //         break;
  //       case 'Oct':
  //       $dates[1]= "10";
  //         break;
  //       case 'Nov':
  //       $dates[1]= "11";
  //         break;
  //       case 'Dec':
  //       $dates[1]= "12";
  //         break;
  //
  //     }
  //     $data['FechaTerminacion'] = $dates[5]."-".$dates[1]."-".$dates[2];
  //     echo "<pre>";
  //     print_r($data );
  //     echo"</pre>";
  //     Update_date_Students($data,$fechas[$m]['IdCursoRealizado']);
  //     }
  //
  //   }
  // }

  $num = 0;
// echo "<pre>";
// print_r($idmaterial);
// echo "</pre>";

for ($m=0; $m <sizeof($idmaterial) ; $m++) {
  if ($idmaterial[$m]['IdMaterial'] != " ") {
    // if ($idmaterial[$m]['IdCurso'] == 0) {

    switch ($idmaterial[$m]['IdMaterial'] ) {
      case 'CBE1':
        $num = 1;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
        break;
      case 'CBE2':
          $num = 2;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
        break;
      case 'HOMBRE':
            $num =3 ;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
        break;
      case 'ENCUEN':
          $num = 4;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
        break;
      case 'ORO':
            $num = 5;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
        break;
      case 'PRISIO':
      $num =6 ;
      $id = $idmaterial[$m]['IdCursoRealizado'];
      update_id_course($num, $id);
        break;
      case 'NACIDO':
      $num = 7;
      $id = $idmaterial[$m]['IdCursoRealizado'];
      update_id_course($num, $id);
        break;
      case 'LIBERT':
      $num = 8;
      $id = $idmaterial[$m]['IdCursoRealizado'];
      update_id_course($num, $id);
        break;
      case 'BAUTIZ':
      $num =9 ;
      $id = $idmaterial[$m]['IdCursoRealizado'];
      update_id_course($num, $id);
        break;
      case 'PERDON':
      $num =10 ;
      $id = $idmaterial[$m]['IdCursoRealizado'];
      update_id_course($num, $id);
        break;
      case 'SUMBIB':
      $num = 11;
      $id = $idmaterial[$m]['IdCursoRealizado'];
      update_id_course($num, $id);
        break;
      case 'ENTIEN':
      $num =12 ;
      $id = $idmaterial[$m]['IdCursoRealizado'];
      update_id_course($num, $id);
        break;
        case 'ACUERD':
        $num =13 ;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'MAR-EB':
        $num = 14;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'JUANEB':
        $num = 15;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'GUIA':
        $num = 16;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'PRIMER':
        $num = 17;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'FAM':
        $num = 18;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'DISCIP':
        $num = 19;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'ESFUN':
        $num =20 ;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'UNDIOS':
        $num = 25;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'SIERVO':
        $num =26 ;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'SALVAD':
        $num = 27;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);
          break;
        case 'VERBO':
        $num = 28;
        $id = $idmaterial[$m]['IdCursoRealizado'];
        update_id_course($num, $id);

          break;
          case 'BIDASI':
          $num =30 ;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'ENSEÑA':
          $num = 31;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'LEY':
          $num = 32;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'POESIA':
          $num = 33;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'PANGEN':
          $num = 34;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'LECCIO':
          $num = 35;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'MEMOMI':
          $num = 36;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'BASHOG':
          $num = 37;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'DISEÑO':
          $num = 38;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'MAYORD':
          $num = 39;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'JENFRE':
          $num = 40;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
          case 'JENCUE':
          $num = 41;
          $id = $idmaterial[$m]['IdCursoRealizado'];
          update_id_course($num, $id);
            break;
            case 'JPLANE':
            $num = 42;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'CONFOR':
            $num = 43;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'EVANGE':
            $num = 44;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'ENSDOM':
            $num =45;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'PALVER':
            $num = 46;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'ESCUDR':
            $num = 47;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'EXPAL':
            $num = 48;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'BASICA':
            $num = 49;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'OTROCO':
            $num = 50;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'TRAZA':
            $num = 51;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'GENESI':
            $num = 54;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
            case 'EXODO':
            $num = 55;
            $id = $idmaterial[$m]['IdCursoRealizado'];
            update_id_course($num, $id);
              break;
              case 'LEVITI':
              $num = 56;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'NUMERO':
              $num = 57;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'DEUTER':
              $num = 58;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'GANPER':
              $num = 59;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'REYDAV':
              $num = 60;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'REINO':
              $num =61;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'JOB':
              $num = 62;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'SALMOS':
              $num = 63;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'PROVER':
              $num = 64;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'PROMAY':
              $num = 66;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'DANIEL':
              $num =67;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
              case 'PROMEN':
              $num =68;
              $id = $idmaterial[$m]['IdCursoRealizado'];
              update_id_course($num, $id);
                break;
                case 'MATEO':
                $num = 69;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'MARCOS':
                $num = 70;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'HECHEM':
                $num = 72;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'ROMAEM':
                $num = 73;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'PRICOR':
                $num = 74;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'SEGCOR':
                $num = 75;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'GALATA':
                $num = 76;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'EFESIO':
                $num = 77;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'FILFIL':
                $num = 78;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'COLOSE':
                $num = 79;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'TESALO':
                $num = 80;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                case 'TIMTIT':
                $num = 81;
                $id = $idmaterial[$m]['IdCursoRealizado'];
                update_id_course($num, $id);
                  break;
                  case 'HEBREO':
                  $num = 82;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'SANTIA':
                  $num = 83;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'PEDRO':
                  $num = 84;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'JUDAS':
                  $num = 85;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'EPJUAN':
                  $num = 86;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'APOCAL':
                  $num = 87;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'BOTELL':
                  $num =95;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'SEPULT':
                  $num =96;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'MAYORD':
                  $num =97;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'CRECED':
                  $num = 98;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'DOSUNO':
                  $num = 99;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                  case 'CIELO':
                  $num = 100;
                  $id = $idmaterial[$m]['IdCursoRealizado'];
                  update_id_course($num, $id);
                    break;
                    case 'IGLIBR':
                    $num = 101;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'EDIGLE':
                    $num = 102;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'PEDIGL':
                    $num = 103;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'IGLESI':
                    $num = 104;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'CANTIC':
                    $num = 105;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'AMANTE':
                    $num = 106;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'PERFEC':
                    $num = 107;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'CARTAS':
                    $num = 108;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'SIEMPR':
                    $num = 109;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'CODIOS':
                    $num = 110;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'ETERNA':
                    $num = 111;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                    case 'HORARI':
                    $num = 112;
                    $id = $idmaterial[$m]['IdCursoRealizado'];
                    update_id_course($num, $id);
                      break;
                      case 'YDIJO':
                      $num = 113;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'DISTIN':
                      $num = 114;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'MUJER':
                      $num = 115;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'PREDIQ':
                      $num = 116;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'ROMAV1':
                      $num = 117;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'ROMAV2':
                      $num = 118;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'ROMAV3':
                      $num = 119;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'HECHV1':
                      $num = 120;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'HECHV2':
                      $num = 121;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'HECHV3':
                      $num = 122;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'CONOV1':
                      $num = 123;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;
                      case 'CONOV2':
                      $num = 124;
                      $id = $idmaterial[$m]['IdCursoRealizado'];
                      update_id_course($num, $id);
                        break;

                        case 'CONOV3':
                        $num = 125;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'CONOV4':
                        $num = 126;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'CONOV5':
                        $num = 127;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'CONOV6':
                        $num = 128;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'CONOV7':
                        $num = 129;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'PRIDB1':
                        $num = 130;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'PRIDB2':
                        $num = 131;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'GENUIN':
                        $num = 132;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'OFREN':
                        $num = 1333;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'HEBEMA':
                        $num = 134;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'PROBI':
                        $num = 135;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;
                        case 'FIGURA':
                        $num = 136;
                        $id = $idmaterial[$m]['IdCursoRealizado'];
                        update_id_course($num, $id);
                          break;

      default:
        // code...
        break;
    // }
  }
 }
}

  // for ($m=0; $m < sizeof($fechas) ; $m++) {
  //   if ($fechas[$m]['FechaNacimiento'] != "") {
  //     $dates = explode("-", $fechas[$m]['FechaNacimiento']);
  //     $num =intval($dates[0]);
  //     if ($num < 100) {
  //       $data['FechaNacimiento'] = $dates[2]."-".$dates[1]."-".$dates[0];
  //       Update_date_Students($data,$fechas[$m]['IdEstudiante']);
  //       echo $m;
  //       echo "<pre>";
  //           print_r($data );
  //           echo"</pre>";
  //     }
  //     echo "<pre>";
  //         print_r($dates[2] );
  //         echo"</pre>";
  //   }
  //
  // }



  // $datas = Information_curse_student();
  // $columnas_estudiantes = Colum_Students();
  // $promotores = Information_Promotors();
  // echo "<pre>";
  // print_r($columnas_estudiantes );
  // echo"</pre>";
  ?>

<!-- <div class="contenedor-estudiantes">
    <div class="titulo text-center">
      <h1>Modulo Estudiantes</h1>
    </div>

<div class="buscador-estudiante">
  <form class="search-student"  method="post">
    <input type="text" name="search">
    <button type="submit" name="button-search">Buscar</button>
  </form>

</div>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirestudiante">
      Añadir nuevo estudiante
    </button> --> -->

    <!-- <table class="display" id="tabla1">
    <thead>
      <tr>
        <th scope='col'>Nombres</th>
        <th scope='col'>Apellidos</th>
        <th scope='col'>Ciudad</th>
        <th scope='col'># Cursos Hechos</th>
        <th scope='col'>Fecha</th>
        <th scope='col'>Ultimo curso</th>
        <th></th>
      </tr>

    </thead>
    <tbody> -->

        <?php
        // for ($x=0; $x < sizeof($datas); $x++):
        //     echo  "<tr>";
        //     foreach ($datas[$x] as $key => $dato):
        //       if ($key != 'IdEstudiante' ):
        //               echo"<td>".$dato."</td>";
        //             endif;
        //     endforeach;?>
                   <!-- <td>
                     <form action=''  method="post">
                       <input name="id-estudiante" type="hidden" value="<?=$datas[$x]['IdEstudiante']?>" >
                       <button class="btn btn-outline-success" type="submit">Ver más</button>
                     </form>
                   </td>
               </tr> -->
<?php
 // endfor;
 ?>
    <!-- </tbody>
  </table>
  </div>

    <div class="container">
      <button type="button" class="btn btn-outline-success" name="button">
        <a href="#añadirestudiante" class="btn-sucess" data-toggle="collapse" >AÑADIR NUEVO ESTUDIANTE</a>
      </button>
    </div>


  <div class="contenedor-search">

  </div> -->


  <!-- Modal -->
  <!-- <div class="modal fade" id="añadirestudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulario Estudiante</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
          <input name="nuevo-estudiante" type="hidden" value="nuevo" >
          <select class="id_promotor" name="IdContacto" required>
              <option value="" disabled selected>Promotor</option> -->
           <?php
            // foreach ($promotores as $col=> $valor): ?>
               <!-- <option value="<?= $valor['IdContacto'] ?>"> <?= $valor['Nombre']?></option> -->
           <?php
          // endforeach;
           ?>
          <!-- </select> -->

          <?php
                // for ($z=2; $z < sizeof($columnas_estudiantes) ; $z++)
                // {
                //   foreach($columnas_estudiantes[$z] as $nombre_columna => $column ):?>
                      <!-- <label for="campo1"><?=$column?></label>
                      <input name="<?=$column?>" type="text" placeholder="DIGITE EL NOMBRE " > -->
          <?php
         // endforeach;
         //        }
              ?>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->





  <!-- <div class="boton-volver">
    <button class="boton_para_volver" name="button">
    <a href="<?=site_url()?>">Volver</a>
    </button>
  </div>
  </div> -->
  <?php
// }
?>
