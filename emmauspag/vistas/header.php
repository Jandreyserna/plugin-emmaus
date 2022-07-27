<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= site_url('/wp-admin/admin.php?page=emmaus')?>">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= site_url('/wp-admin/admin.php?page=emmaus')?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('/wp-admin/admin.php?page=estudiante')?>">Estudiantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('/wp-admin/admin.php?page=material')?>">Materiales</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?= site_url('/wp-admin/admin.php?page=curso')?>" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cursos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?= site_url('/wp-admin/admin.php?page=curso')?>">Cursos</a></li>
            <li><a class="dropdown-item" href="<?= site_url('/wp-admin/admin.php?page=calificacion')?>">Calificar</a></li>
            <li><a class="dropdown-item" href="<?= site_url('/wp-admin/admin.php?page=perdidos')?>">Corregir</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('/wp-admin/admin.php?page=diploma')?>">Diplomas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('/wp-admin/admin.php?page=inventarios')?>">Inventario</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?= site_url('/wp-admin/admin.php?page=facturas')?>" id="navbarDropdownMenuLink-1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Facturación
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-1">
            <li><a class="dropdown-item" href="<?= site_url('/wp-admin/admin.php?page=facturas')?>">Facturas</a></li>
            <li><a class="dropdown-item" href="<?= site_url('/wp-admin/admin.php?page=venta')?>">Factura de venta</a></li>
            <li><a class="dropdown-item" href="<?= site_url('/wp-admin/admin.php?page=compra')?>">Factura de compra</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('/wp-admin/admin.php?page=impresiones')?>">Impresiones</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<script>
  var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
  return new bootstrap.Dropdown(dropdownToggleEl)
})
</script>