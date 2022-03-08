<div class="titulo text-center">
  <h1>ventas</h1>
</div>

<section class="cont-fact-venta">

<!--   <div class="container">

      <table class=" display" id="table-ventas">
        <thead>
          <tr>
            <td>Numero de factura</td>
            <td>Fecha</td>
            <td>Numero de promotor</td>
            <td>Nombre</td>
            <td>Precio total</td>
            <td>Pagado</td>
            <td>Encargado</td>
          </tr>
        </thead>
      </table>
  </div> -->

  <div>    
      <select name="Promotores" id="" required>
            <option value="" disabled selected>promotor</option>
            <option value="id">Jhon Edwar Trehos </option>
      </select>

      <input type="text" name="Cliente" placeholder="Nombre del Cliente" style="width:70%">

      <!-- <div class="col-lg-8">
        <h2 >Informacion de promotor</h5>
        <p>Nombre</p>
        <p>Iglesia</p>
        <p>Ciudad, departamento</p>
        <p>Phone: 000-2000-000</p>
      </div> -->

    <div>

    <h2>
      Detalle de articulos
    </h2>

    <div class="container-fac row">
      <!-- Lista de materiales escogidos -->
      <div class="col">
        <table cellspacing="0" cellpadding="0" border="0" width="325">
          <tr>
            <td>
              <table cellspacing="0" cellpadding="1" border="1" width="300" >
                <tr style="color:white;background-color:grey">
                  <th>Material</th>
                  <th>Cant.</th>
                  <th>V.Unitario</th>
                  <th>Valor Total</th>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <div style="width:320px; height:150px; overflow:auto;">
                <table cellspacing="0" cellpadding="1" border="1" width="300" >
                  <tr>
                    <td>Elemental 1</td>
                    <td>10</td>
                    <td>3000</td>
                    <td>30000</td>
                  </tr>
                </table>  
              </div>
            </td>
          </tr>
        </table>
      </div>
      <!-- formulario para escoger materiales  -->
      <div class="col">
        <form action="">
          <select name="Materiles" id="" required>
            <option value="" disabled selected>Material</option>
            <option value="id">elemental 1</option>
          </select>
          <!-- contenedor de formulario ventas -->
          <div class="mb-1" style="display:flex">
            <label for="ValorU" style="width : 24%">Valor Unidad</label>
            <input type="number" name="ValorU" id="ValorU" Value ="0">  
          </div>
          <div class="mb-1" style="display:flex">
            <label for="Cant" style="width : 24%">Cantidad</label>
            <input type="number" name="Cant" id="Cant" Value ="0">
          </div>
          <div class="mb-1" style="display:flex">
            <label for="ValorT" style="width : 24%">Valor Total</label>
            <input type="number" name="ValorT" id="ValorT" Value ="0">
          </div>
          <button type="submit" class="btn btn-info" style="width = 90%">Actualizar lista de articulos</button>
        </form>
      </div>

    </div>

    <button type="submit" class="btn btn-secondary"> Crear Factura</button>



</section>


