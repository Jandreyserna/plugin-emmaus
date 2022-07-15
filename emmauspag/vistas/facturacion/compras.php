<?php
require_once dirname(dirname(__DIR__)) . '/Controller/ControlVentas.php';
/* clase de controlador */
$controlador = new ControlVentas();
/* variable materiales */
$materiales = $controlador->materiales_venta();
/* ingresar nuevo material si existe el post */
if (!empty($_POST['nuevo-material'])){
    unset($_POST['nuevo-material']);
    $id = $modelo_curso->last_material();
    $_POST['IdMaterial'] = $id[0]['id'] + 1;
    $modelo_curso->insertar_material($_POST);
    ?>
    <div class="alert alert-success" role="alert">
      Nuevo material registrado!
    </div>
    <script>
      location.reload();
    </script> 
<?php
  }
?>

<div class="container-facture">
    <div class="text-center"><h1>Factura de compra</h1></div>
    <div></div>
</div>

<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirmaterial">
   Registrar nuevo material
 </button>

 <!-- Modal añadir Material-->
<div class="modal fade" id="añadirmaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" method="post" action="">
              <label for="campo1">Nombre Curso</label>
              <input name="TituloMaterial" type="text" placeholder="Escriba el titulo del material" >
              <input name="nuevo-material" type="hidden" value="nuevo" >
              <label for="campo1">Short</label>
              <input name="Short" type="text" placeholder="Digite el titulo abreviado" >
              <label for="campo1">Costo de Compra</label>
              <input name="ValorCosto" type="number" placeholder="Digite el costo de compra" >
              <label for="campo1">Costo de Venta</label>
              <input name="ValorVenta" type="number" placeholder="Digite el costo al público" >


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<section class="cont-fact-venta">

  <div>
    <form action="" method="post"> 
      <input type="hidden" name="post" value="si">   
      <select name="Proovedores" id="" required>
            <option value="" disabled selected>proveedor</option>
            <option value="id">Jhon Edwar Trehos </option>
      </select>

      <input type="text" name="Cliente" placeholder="Nombre del Encargado" style="width:70%">
      <input type="date" name="FechaFactura" value="<?=date('Y-m-d')?>" placeholder="<?=date('Y-m-d')?>">
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
          <!-- contenedor de formulario compras -->
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

</section>