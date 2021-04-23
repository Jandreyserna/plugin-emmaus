<div class="titulo text-center">
  <h1>ADMINISTRACIÓN DE CURSOS</h1>
</div>
<form class="d-md-flex">
      <input class="form-control me-2" type="search" placeholder="DIGITE EL NOMBRE " aria-label="Search">
      <button class="btn btn-outline-success" type="submit">BUSCAR CUSROS DE UN ESTUDIANTE</button>
</form>
<div class="selecc">
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option selected>Cursos</option>

    <option value="1">El Homber mas grande</option>
    <option value="2">el siervo perfecto</option>
    <option value="3">perdone como Dios lo perdono</option>
    <option value="4">Restauracion Y Caida</option>
    <option value="5">Bautismo</option>
    <option value="6">Crisnianismo basico</option>

  </select>
</div>

<button class="btn btn-primary" type="button" name="button">
  <div class="container">
    <a href="#anadir" class="btn-crudd btn-sucess" data-toggle="collapse">Añadir Nuevo Curso</a>
  </div>
</button>

<table class="table">
<thead>
  <tr>
    <th scope="col">Nombre Del Curso</th>
    <th scope="col">Programa</th>
    <th scope="col">Material</th>
    <th scope="col">Costo Venta</th>
  </tr>
</thead>
<tbody>
  <tr>
    <th scope="row">El primer evangelio</th>
    <td>KM 1</td>
    <td>Mateo</td>
    <td>$ 50.000.00</td>
  </tr>
  <tr>
    <th scope="row">Berea - 1</th>
    <td>Cusro Berea</td>
    <td>Introduccion A.T Turner</td>
    <td>$ 50.000.00</td>
  </tr>
  <tr>
    <th scope="row">El Dicipula amado</th>
    <td>Km 2</td>
    <td>Juan</td>
    <td>$ 50.000.00</td>
  </tr>
</tbody>
</table>

<div id="anadir" class="collapse">
  <form class="">
        <p><label for="campo1">Nombre Curso</label>
        <input type="text" placeholder="DIGITE EL NOMBRE " ></p>
        <p><label for="campo2">Duracion Curso</label>
        <input  type="text" placeholder="DIGITE UN VALOR " ></p>
        <p><label for="campo3">Costo Curso</label>
        <input  type="text" placeholder="DIGITE UN VALOR " ></p>
        <p><label for="campo4">Material (Libro)</label>
        <input  type="text" placeholder="DIGITE EL NOMBRE " ></p>
        <button class="btn btn-outline-success" type="submit">añadir</button>
  </form>

</div>



<div class="boton-volver">
  <button class="boton_para_volver" name="button">
  <a href="<?=site_url()?>">Volver</a>
  </button>
</div>
