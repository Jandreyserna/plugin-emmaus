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
  /* 
  anade la factura al documento word
  */
  $controlImpresionFactura = new ControlImpresiones;
  $controlImpresionFactura-> crear_factura_venta($datos, $_POST);
  $controlImpresionFactura-> añadir_factura_venta($datos, $_POST);
  /* 
  anade las facturas a las tablas
  */
  $controlTables = new ControlVentas();
?>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>
  <div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      ¡Factura registrada con exito!
    </div>
  </div>
<?php
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
      <select name="promotores" id="promotor-select"  style="margin-bottom: 6px;" required>
        <option value="" disabled selected>Promotor</option>
        <?php foreach($promotores as $promotor): ?>
        <option value="<?=$promotor['IdContacto']?>">(<?=$promotor['IdContacto']?>) - <?= $promotor['Nombre']?> - <?=$promotor['Ciudad']?></option>
        <?php endforeach; ?>
      </select>    
      <input type="text" name="cliente" id="nombreCliente" placeholder="Nombre del Cliente" style="width:70%; margin-bottom: 6px;">
      <div class="documento">
        <label for="cedula"> Documento:</label>
        <input type="number" name="cedula" id="cedula" pattern="[0-9]+" minlength="10" maxlength="10" placeholder="Documento">
      </div>
      <div>
        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="direccion" placeholder="Dirección">
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
          <button id="eliminar-lista" class="btn btn-warning">eliminar de la lista </button>
          <input type="number" id="identificador" placeholder="Identificador Del Material" min="0" >
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




