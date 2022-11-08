<div class="titulo text-center p-2">
    <h1>Administracion de usuarios</h1>
</div>

<div class="container">

    <!-- Nav pills -->
    <ul class="nav nav-pills justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#navPillPromotores">Promotores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#navPillProveedores">Proveedores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#navPillColabradores">Colaboradores</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane container active" id="navPillPromotores">
            <!-- Listar Promotores -->
            <div class="titulo p-1">
                <h3>Administracion de Promotores</h3>
                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                    data-target="#añadirestudiante">
                    Nuevo Promotor
                </button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tab-pane container fade" id="navPillProveedores">

            <!-- Listar Proveedores -->
            <div class="titulo p-1">
                <h3>Administracion de Proveedores</h3>
                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                    data-target="#añadirestudiante">
                    Nuevo Proveedor
                </button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane container fade" id="navPillColabradores">

            <!-- Listar Colaboradores -->
            <div class="titulo p-1">
                <h3>Administracion de Colaboradores</h3>
                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                    data-target="#añadirestudiante">
                    Nuevo Colaborador
                </button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>