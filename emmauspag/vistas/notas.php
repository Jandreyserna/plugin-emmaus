<?php
$datas_table = control_notes_table();

?>
<div class="titulo text-center">
    <h1>Modulo de Notas</h1>
</div>


<table class="display" id="tabla1">
    <thead>
      <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Nombres</th>
        <th scope='col'>Apellidos</th>
        <th scope='col'>Material</th>
        <th scope='col'>Porcentaje</th>
        <th scope='col'>Dirección</th>
        <th scope='col'>Ciudad</th>
        <!-- <th scope='col'>Ultimo curso</th> -->
        <th></th>
      </tr>

    </thead>
    <tbody>

        <?php
        for ($x=0; $x < sizeof($datas_table); $x++):
            echo  "<tr>";
            foreach ($datas_table[$x] as $key => $dato):

                      echo"<td>".$dato."</td>";

            endforeach;?>
                  <td>
                    
                  </td>
              </tr>
  <?php endfor; ?>
    </tbody>
  </table>




















