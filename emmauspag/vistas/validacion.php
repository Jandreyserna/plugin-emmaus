
<div class="selecc">
  <form  action="" method="post">
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option selected>Promotor</option>
      <option value="1">Daniela Guzman</option>
      <option value="2">Angela Valencia</option>
      <option value="3">Camilo Buitrago</option>
      <option value="4">Luis Fernando</option>
      <option value="5">Jhon Edwar Trejos</option>
    </select>
    <input type="submit" value="consultar"/>
  </form>
</div>

<table class="table">
<thead>
  <tr>
    <th scope="col">Codigo</th>
    <th scope="col">Nombre Estudiante</th>
    <th scope="col">Curso</th>
    <th scope="col">validar</th>
  </tr>
</thead>
<tbody>
  <tr>
    <th scope="row">032</th>
    <td>Jandrey Steven Serna Restrepo</td>
    <td>Berea Parte 3</td>
    <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option selected>Validar</option>
      <option value="1">Aprovado</option>
      <option value="2">No Aprobado</option>
    </select></td>

  </tr>
  <tr>
    <th scope="row">001</th>
    <td>Melissa</td>
    <td>Hombre Perfecto</td>
    <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option selected>Validar</option>
      <option value="1">Aprovado</option>
      <option value="2">No Aprobado</option>
    </select></td>

  </tr>
  <tr>
    <th scope="row">013</th>
    <td>Francisco Alejando Medina</td>
    <td>A.T Parte 1</td>
    <td><select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option selected>Validar</option>
      <option value="1">Aprovado</option>
      <option value="2">No Aprobado</option>
    </select></td>
  </tr>
</tbody>
</table>

<div class="boton-volver">
  <button class="boton_para_volver" name="button">
  <a href="<?=site_url()?>">Volver</a>
  </button>
</div>
