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
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirPromotor">
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

<!-- Modal -->
<div class="modal fade" id="añadirPromotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar nuevo promotor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form>
                        <div class="form-group row">
                            <label for="inputSelectIglesia">Iglesia</label>
                            <select id="inputSelectIglesia" class="form-control">
                                <option selected>Seleccione a la iglesia relacionada</option>
                                <option>(13) Dosquebradas</option>
                                <option>(22) Pereira</option>

                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Nombre promotor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCiudad" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputCiudad" placeholder="Ciudad promotor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCorreo" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputCorreo" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelefono" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputTelefono" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>


                <!-- <form>
  <div class="form-group">
    <label for="formGroupExampleInput">Example label</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Another label</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>
</form> -->

                <!-- <form class="form-inline">
                    <div class="form-group mb-2">
                        <label for="staticEmail2">Email</label>
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2"
                            value="email@example.com">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                    </div>
                </form> -->

            </div>

        </div>
    </div>
</div>