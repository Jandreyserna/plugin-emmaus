<?php
/* manejo de datos */
require_once dirname(dirname(__DIR__)).'/impresiones/imprimir-venta.php';
/* clase de controlador */
$controlador = new ControlVentas();
/* variable materiales */
$materiales = $controlador->materiales_venta();
$promotores = $controlador-> promotores();
/*  */
?>
<div class="titulo text-center">
  <h1>ventas</h1>
</div>
<section class="cont-fact-venta">

  <div>
    <form action="" method="post">
      <select name="Promotores" id="promotor-select" required style="margin-bottom: 6px;">
            <option value="no"  selected>Promotor</option>
            <?php foreach($promotores as $promotor): ?>
            <option value="<?=$promotor['IdContacto']?>">(<?=$promotor['IdContacto']?>) - <?= $promotor['Nombre']?> - <?=$promotor['Ciudad']?></option>
            <?php endforeach; ?>
          </select>    
      <input type="text" name="Cliente" id="nombreCliente" placeholder="Nombre del Cliente" style="width:70%; margin-bottom: 6px;">
      <div class="documento">
        <label for="cedula"> Documento:</label>
        <input type="number" name="cedula" id="cedula" pattern="[0-9]+" minlength="10" maxlength="10" required>
      </div>
      <div>
        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" placeholder="direccion">
      </div>
      <div>
        <label for="ciudad">Ciudad</label>
        <input type="text" id="ciudad" placeholder="Ciudad">
      </div>
      <div>
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" placeholder="Teléfono">
      </div>
      <div class="resto">
        
      </div>
      <button type="submit" class="btn btn-secondary " > Crear Factura</button>
    </form>
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
              <option value="<?=$material['ValorVenta']?>-<?=$material['IdMaterial']?>-<?= $material['TituloMaterial']?>"><?= $material['IdMaterial']?> - <?= $material['TituloMaterial']?></option>
              <?php endforeach; ?>
            </select>
            <!-- contenedor de formulario ventas -->
            <div id="contenedor-formulario-ventas">
              <input type="hidden" name="Titulo" id= "Titulo" value ="">
              <div class="mb-1 valor " style="display:flex">
                <label for="ValorU" style="width : 24%">Valor Unidad</label>
                <input type="number" name="ValorU" id="ValorU" Value ="0">  
              </div>
              <div class="mb-1 valor" style="display:flex">
                <label for="Cant" style="width : 24%">Cantidad</label>
                <input type="number" name="Cant" id="Cant" Value ="0">
              </div>
              <div class="mb-1 valor" style="display:flex">
                <label for="Cant" style="width : 24%">Descuento (%)</label>
                <input type="number" name="Cant" id="Cant" Value ="0">
              </div>
              <div class="mb-1 valor-total valor" style="display:flex">
                <label for="ValorT" style="width : 24%">Valor Total</label>
                <input type="number" name="ValorT" id="ValorT" Value ="0">
              </div>
            </div>
            <button type="button" class="btn btn-info" id="enviar-lista" style="width = 90%">Actualizar lista de articulos</button>
          </form>
        </div>

      </div>

    <div class="muestra">

    </div>



</section>




