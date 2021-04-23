<div class="titulo text-center">
  <h1>FACTURAS DE VENTA</h1>
</div>

<form class="d-md-flex">
      <input class="form-control me-2" type="date" placeholder="DIGITE EL NOMBRE " >
      <button class="btn btn-outline-success" type="submit">BUSCAR POR FECHA</button>
</form>

<div class="selecc d-md-flex" style="margin:15px; ">
  <select class=" selecc-Factura form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option selected></option>
    <option value="1">001</option>
    <option value="2">002</option>
    <option value="3">003</option>
    <option value="4">004</option>
    <option value="5">005</option>
    <option value="6">006</option>
    <option value="7">007</option>
    <option value="8">008</option>
    <option value="9">009</option>
  </select>
  <h5 class="selecc-Factura">Nro. Factura</h5>

  <select class="selecc-Factura form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option selected></option>
    <option value="1">Bogota</option>
    <option value="2">Medellin</option>
    <option value="3">bucaramanga</option>
    <option value="4">ibague</option>
  </select>
  <h5 class="selecc-Factura">Contacto</h5>

  <button class=" selecc-Factura btn btn-outline-success" type="submit">BUSCAR </button>
</div>

<table class="table">
<thead>
  <tr>
    <th scope="col">Nro. Factura</th>
    <th scope="col">Nombre</th>
    <th scope="col">Fecha</th>
    <th scope="col">Valorr</th>
    <th scope="col">Nombre Cliente</th>
  </tr>
</thead>
<tbody>
  <tr>
    <th scope="row">001</th>
    <td>Daniela Guzman</td>
    <td>15/07/2020</td>
    <td>$ 25.000.00</td>
    <td>Jairo Gonzales</td>
  </tr>
  <tr>
    <th scope="row">002</th>
    <td>Edwar Trejos</td>
    <td>17/08/2020</td>
    <td>$ 250.000.00</td>
    <td>Cristobal Colon</td>
  </tr>
  <tr>
    <th scope="row">003</th>
    <td>Melissa Martinez</td>
    <td>15/03/2019</td>
    <td>$ 50.000.00</td>
    <td>C.B Dosquebradas</td>
  </tr>
  <tr>
    <th scope="row">004</th>
    <td>Rodolfo Jarramillo</td>
    <td>05/11/2020</td>
    <td>$ 100.000.00</td>
    <td>C.B Pereira</td>
  </tr>
</tbody>
</table>
<div class="d-md-flex  justify-content-center">
  <button class="btn btn-primary" type="button" name="button">
    <a href="#" class="class_a_href" >CREAR FACTURA</a>
  </button>
  <button class="btn btn-primary" type="button" name="button">
    <a href="#" class="class_a_href" >PAGAR FACTURA</a>
  </button>
</div>
<div class="d-md-flex justify-content-center">
  <button class="btn btn-primary" type="button" name="button">
    <a href="#" class="class_a_href" >DEVOLUCIONES</a>
  </button>
  <button class="btn btn-primary" type="button" name="button">
    <a href="#" class="class_a_href" >TRASLADO</a>
  </button>
</div>

<div class="boton-volver">
  <button class="boton_para_volver" name="button">
  <a href="<?=site_url()?>">Volver</a>
  </button>
</div>
