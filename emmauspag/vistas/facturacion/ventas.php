<?php
require_once dirname(dirname(__DIR__)) . '/Controller/ControlVentas.php';
/* clase de controlador */
$controlador = new ControlVentas();
/* variable materiales */
$materiales = $controlador->materiales_venta();
?>
<div class="titulo text-center">
  <h1>ventas</h1>
</div>

<section class="cont-fact-venta">

  <div>    
      <select name="Promotores" id="" required>
            <option value="" disabled selected>promotor</option>
            <option value="id">Jhon Edwar Trehos </option>
      </select>

      <input type="text" name="Cliente" placeholder="Nombre del Cliente" style="width:70%">

    <div>

    <h2 class="text-center">
      Detalle de articulos
    </h2>

    <div class="container-fac row">
      <!-- Lista de materiales escogidos -->
      <div class="col">
        <table id="list-fact">
          <thead>
            <tr>
              <th>Id material</th>
              <th>Titulo Material</th>
              <th>Cantidad</th>
              <th>Valor U.</th>
              <th>Descuento %</th>
              <th>Valor Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="cuerpo-lista">
          </tbody>

        </table>
      </div>
      <!-- formulario para escoger materiales  -->
      <div class="col">
        <form action="">
          <select name="Materiles" id="ventas-select" required>
            <option value="" disabled selected>Material</option>
            <?php foreach($materiales as $material): ?>
            <option value="<?=$material['IdMaterial']?>"><?= $material['IdMaterial']?>  <?= $material['TituloMaterial']?></option>
            <?php endforeach; ?>
          </select>
          <!-- contenedor de formulario ventas -->
          <div id="contenedor-formulario-ventas">
            <div class="mb-1 " style="display:flex">
              <label for="ValorU" style="width : 24%">Valor Unidad</label>
              <input type="number" name="ValorU" id="ValorU" Value ="0">  
            </div>
            <div class="mb-1" style="display:flex">
              <label for="Cant" style="width : 24%">Cantidad</label>
              <input type="number" name="Cant" id="Cant" Value ="0">
            </div>
            <div class="mb-1 valor-total" style="display:flex">
              <label for="ValorT" style="width : 24%">Valor Total</label>
              <input type="number" name="ValorT" id="ValorT" Value ="0">
            </div>
          </div>
          <button type="button" class="btn btn-info" id="enviar-lista" style="width = 90%">Actualizar lista de articulos</button>
        </form>
      </div>

    </div>

    <button type="button" class="btn btn-secondary" > Crear Factura</button>



</section>



