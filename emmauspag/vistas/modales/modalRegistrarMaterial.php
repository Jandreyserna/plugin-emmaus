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
