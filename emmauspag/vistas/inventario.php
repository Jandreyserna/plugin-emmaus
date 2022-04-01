<?php
if(!empty($_POST['activo'])){
    switch($_POST['activo']){
        case 'update_inventario':
            unset($_POST['activo']);
            update_inventario($_POST);
        break;

        case 'update_stock':
            unset($_POST['activo']);
            update_stock($_POST);
        break;
    }
    
}
    
?>
<!-- Menu principal -->
<header>
  <nav>
    <ul class="main-menu">
      <li><a href="?page=emmaus">Inicio</a></li>
      <li><a href="?page=estudiante">Estudiantes</a></li>
      <li><a href="?page=impresiones">Impresiones</a></li>
      <li><a href="?page=diploma">Diplomas</a></li>
      <li><a href="?page=curso">Cursos</a></li>
    </ul>
  </nav>
</header>



<div class="post-menu container">

    <div class="titulo text-center">
        <h1>Inventario</h1>
    </div>
        
    <table  class=" display" id="table-inventario">
        <thead>
            <th>id</th>
            <th>Titulo material</th>
            <th>Cantidad inventario</th>
            <th>Stock</th>
            <th>Actualizar inventario</th>
            <th>Actualizar stock</th>
        </thead>
    </table>
</div>

<!-- Modal de stock -->
<div class="modal" id="modalStock-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
        </div>
    </div>
</div>

<!-- Modal inventario -->
<div class="modal " id="modalStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
      </div>
    </div>
  </div>





