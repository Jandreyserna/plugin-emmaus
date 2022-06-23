<?php
/* manejo de datos */
require_once dirname(dirname(__DIR__)).'/impresiones/imprimir-venta.php';
/* crear factura */
if(isset($_POST['post']))
{
  $datos['cliente'] = $_POST['cliente'];
  $datos['cedula'] = $_POST['cedula'];
  $datos['promotores'] = $_POST['promotores'];
  $datos['direccion'] = $_POST['direccion'];
  $datos['ciudad'] = $_POST['ciudad'];
  $datos['telefono'] = $_POST['telefono'];
  $datos['totalFactura'] = $_POST['totalFactura'];
  $datos['descuentoFactura'] = $_POST['descuentoFactura'];
  $datos['totalsinporcentaje'] = $_POST['totalsinporcentaje'];
  unset($_POST['cliente']);
  unset($_POST['cedula']);
  unset($_POST['promotores']);
  unset($_POST['direccion']);
  unset($_POST['ciudad']);
  unset($_POST['telefono']);
  unset($_POST['post']);
  unset($_POST['descuentoFactura']);
  unset($_POST['totalFactura']);
  unset($_POST['totalsinporcentaje']);
  $controlFactura = new ControlImpresiones;
  $controlFactura-> crear_factura_venta($datos, $_POST);
}

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
      <input type="hidden" name="post" value="si">
      <select name="promotores" id="promotor-select" required style="margin-bottom: 6px;">
            <option value="no"  selected>Promotor</option>
            <?php foreach($promotores as $promotor): ?>
            <option value="<?=$promotor['IdContacto']?>">(<?=$promotor['IdContacto']?>) - <?= $promotor['Nombre']?> - <?=$promotor['Ciudad']?></option>
            <?php endforeach; ?>
          </select>    
      <input type="text" name="cliente" id="nombreCliente" placeholder="Nombre del Cliente" style="width:70%; margin-bottom: 6px;">
      <div class="documento">
        <label for="cedula"> Documento:</label>
        <input type="number" name="cedula" id="cedula" pattern="[0-9]+" minlength="10" maxlength="10" required>
      </div>
      <div>
        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="direccion" placeholder="Direccion">
      </div>
      <div>
        <label for="ciudad">Ciudad: </label>
        <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad">
      </div>
      <div>
        <label for="telefono">Teléfono: </label>
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono">
      </div>
      <div class="resto">
        
      </div>
      <div class="valoresGeneral">
        <input type="hidden" name ="descuentoFactura" id="descuentoFactura">
				<input type="hidden" name ="totalFactura" id="totalFactura">
        <input type="hidden" name ="totalsinporcentaje" id="totalsinporcentaje">
      </div>

      <button type="submit" class="btn btn-secondary center " > Crear Factura</button>
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
          <div class="totales">
            <div class="valFactura">
              <label for="valFactura">Valor Factura: </label>
              <input type="number" name="valFactura" id="valFactura" min="0" value="0">
            </div>  
            <div class="descFactura">
              <label for="descFactura">Descuento Factura: </label>
              <input type="number" name="descFactura" id="descFactura" min="0" value="0" >  
            </div>
            <div class="totalsinporcentaje">
              <input type="hidden" name="porcentaje" id="sinPorcentaje" min="0" value="0">
            </div>
          </div>
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
                <input type="number" name="Cant" id="Cant" Value ="0" min="0">
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




