<div class="titulo text-center">
  <h1>FACTURAS</h1>
</div>

<!-- <button class="btn btn-primary" id="ventas">Generar Venta</button> -->

<section class="cont-fact-venta">

<div class="container">
    <table class="table">
      <tr>
        <td>Fecha</td>
        <td>Numero de factura</td>
      </tr>
      <tr>
        <td>01/03/2022</td>
        <td>INV-110154685</td>
      </tr>
    </table>
</div>

<div>    
    <form class="d-md-flex">
      <input class="form-control me-2" type="text" placeholder="DIGITE EL NOMBRE " >
      <button class="btn btn-outline-success" type="submit">BUSCAR PROMOTOR</button>
    </form>

    <div class="col-lg-8">
      <h2 >Informacion de promotor</h5>
      <p>Nombre</p>
      <p>Iglesia</p>
      <p>Ciudad, departamento</p>
      <p>Phone: 000-2000-000</p>
    </div>

  <div>

  <h2>
    Detalle de articulos
  </h2>

  <div>
    <form class="d-md-flex">
      <input class="form-control me-2" type="text" placeholder="DIGITE EL MATERIAL " >
      <button class="btn btn-outline-success" type="submit">BUSCAR MATERIAL</button>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id Material</th>
          <th scope="col">Titulo</th>
          <th scope="col">Valor unidad</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">001</th>
          <th scope="col">Creciendo en gracia</th>
          <th scope="col">$7.500</th>
          <th scope="col">2</th>
          <th scope="col">$15.000</th>
        </tr>
      </tbody>
    </table>
    <button class="btn btn-primary" id="ventas">Agregar material</button>
  </div>

  <h2>Lista de materiales agregados</h2>

  <div>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">Referencia</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Valor unidad</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">001</th>
          <th scope="col">2</th>
          <th scope="col">$7.500</th>
          <th scope="col">$15.000</th>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="col-lg-8">
      <h2 >Sub total</h5>
      <p>$15.000</p>

      <form class="d-md-flex">
      <input class="form-control me-2" type="text" placeholder="DIGITE EL AJUSTE " >
      <button class="btn btn-outline-success" type="submit">INGRESE AJUSTE</button>
    </form>
  </div>


</section>


