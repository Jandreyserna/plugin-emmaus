<div class="titulo text-center">
  <h1>ADMINISTRACIÓN DE ESTUDIANTES</h1>
</div>
<div class="certificados crudd">
  <form class="d-md-flex">
        <input class="form-control me-2" type="search" placeholder="DIGITE EL NOMBRE " aria-label="Search">
        <button class="btn btn-outline-success" type="submit">BUSCAR</button>
  </form>
  <button class="btn btn-primary" type="button" name="button">
    <a href="#curso" class="btn-crudd btn-sucess" data-toggle="collapse">Registrar curso</a>
  </button>

</div>

<table class="table">
<thead>
  <tr>
    <th scope="col">Fecha</th>
    <th scope="col">Nombre Del Curso</th>
    <th scope="col">Puntaje</th>
    <th scope="col">Calificador</th>
    <th scope="col">Nombre Estudiante</th>
  </tr>
</thead>
<tbody>
  <tr>
    <th scope="row">15/07/2020</th>
    <td>Siervo de Dios</td>
    <td>98%</td>
    <td>Eliza</td>
    <td>Jairo Gonzales</td>
  </tr>
</tbody>
</table>
<div class="certificado-estudiante">
  <div id="curso" class="boton-registrar-curso">
    <div class="titulo text-center">
      <h1>Jose Mario Valencia Henao</h1><h2 margin-left = "5px"> ID: 132 </h2>
    </div>
    <div class="selecc">
      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option selected>Material</option>
        <option value="1">el hombre mas grande</option>
        <option value="2">El Siervo perfecto</option>
        <option value="3">Camino a Emmaus</option>
      </select>
      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option selected>Nombre del Curso</option>
        <option value="1">A.T parte 1</option>
        <option value="2">A.T Parte 2</option>
        <option value="3">Hermeneutica</option>
        <option value="4">Cristianismo basico</option>
      </select>
    </div>
    <form class="form-certificado" action="index.html" method="post">
      <label for="campo1"> Registrar puntaje: </label>
      <input type="text" id="campo1" name="puntaje" placeholder="Inserta un dato"/>
      <label for="camp2">Nombre calificador</label>
      <input type="text" id="campo2" name="calificador" placeholder="Inserta un dato"/>
      <input  class="btn-primary" type="submit" value="Registrar"/>
    </form>



  </div>

</div>

<div class="boton-volver">
  <button class="boton_para_volver" name="button">
  <a href="<?=site_url()?>">Volver</a>
  </button>
</div>
