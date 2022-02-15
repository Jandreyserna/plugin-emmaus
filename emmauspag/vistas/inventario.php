<?php
if(!empty($_POST['activo'])){
    switch($_POST['activo']){
        case 'update_stock':
            unset($_POST['activo']);
            update_stock($_POST);
        break;
    }
    
}
    
?>
<div class="titulo text-center">
    <h1>Inventario</h1>
</div>

<div class="container">
    <div class="row align-items-start">
        <div class="col">       
            <table  class=" display" id="table-inventario">
                <thead>
                    <th>id</th>
                    <th>Titulo Material</th>
                    <th>Cantidad</th>
                    <th>actualizar</th>
                    <th>vender</th>
                </thead>
            </table>
        </div>
        <div class="col">
            <p>texto de otra parte</p>
        </div>
    </div>
</div>

<!-- Modal de ventas -->
<div class="modal" id="modalStock-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal " id="modalStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
      </div>
    </div>
  </div>





