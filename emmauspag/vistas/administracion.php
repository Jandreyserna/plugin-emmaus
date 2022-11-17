<?php 

    print_r($_POST);
    if(!empty($_POST['activo'])){
        switch ($_POST['activo']) {
            case 'nuevo-promotor': // accion activada por el boton de añadir un nuevo estudiante de la page estudiante
                unset($_POST['activo']);
                foreach($_POST as $campo => $valor) // convierto todas las minusculas a mayusculas
                {
                    $_POST[$campo] = 	strtoupper($_POST[$campo]);
                }
                $_POST ['FechaInscripcion'] = date("Y-m-d");
                $ultimoId = ultimo_id();
                $ultimoId = $ultimoId + 1;
                $_POST['IdEstudiante'] = $ultimoId;
                insert_funtion('promotores', $_POST);
        }
    }




?>

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
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Iglesia</th>
                        <th scope="col">Email</th>
                        <th scope="col">Cupo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Jose Manuel</td>
                        <td>Pereira</td>
                        <td>1</td>
                        <td></td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>FERNANDO RAMIREZ</td>
                        <td>Florida</td>
                        <td>3</td>
                        <td>fercho0825@hotmail.com</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Jose Manuel</td>
                        <td>Pereira</td>
                        <td>1</td>
                        <td></td>
                        <td>1000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tab-pane container fade" id="navPillProveedores">

            <!-- Listar Proveedores -->
            <div class="titulo p-1">
                <h3>Administracion de Proveedores</h3>
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirProveedor">
                    Nuevo Proveedor
                </button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>                        
                        <th scope="col">Proveedor</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Proveedor prueba</td>
                        <td>Contacto de prueba</td>
                        <td>Direccion de prueba</td>
                        <td>45555555</td>
                        <td>prueba@mdo.com</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Proveedor prueba</td>
                        <td>Contacto de prueba</td>
                        <td>Direccion de prueba</td>
                        <td>45555555</td>
                        <td>prueba@#mdo.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane container fade" id="navPillColabradores">

            <!-- Listar Colaboradores -->
            <div class="titulo p-1">
                <h3>Administracion de Colaboradores</h3>
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#añadirColaborador">
                    Nuevo Colaborador
                </button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>                        
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Colaborador</td>
                        <td>Velasques</td>
                        <td>9555555</td>
                        <td>45555555</td>
                        <td>Direccion de prueba</td>
                        <td>prueba@mdo.com</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Proveedor prueba</td>
                        <td>Contacto de prueba</td>
                        <td>Direccion de prueba</td>
                        <td>45555555</td>
                        <td>prueba@#mdo.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<?php
    $iglesias = Information_iglesias();
?>

<!-- Modal crear promotor -->
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
                    <form action="" method="post">
                    <input name="activo" type="hidden" value="nuevo-promotor" >
                        <div class="form-group row">
                            <label for="inputSelectIglesia">Iglesia</label>
                            <select id="inputSelectIglesia" name="IdIglesia" class="form-control">
                                <option value="" disabled selected>Seleccione la iglesia relacionada</option>
                            <?php
                                foreach ($iglesias as $iglesia => $valor):
                            ?>
                                <option value="<?= $valor['IdIglesia'] ?>"><?= $valor['Nombre']?></option>
                                  
                            <?php
                                endforeach;
                            ?>

                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" name="Nombre" class="form-control" id="inputName" placeholder="Nombre promotor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCiudad" class="col-sm-2 col-form-label">Ciudad:</label>
                            <div class="col-sm-10">
                                <input type="text" name="Ciudad" class="form-control" id="inputCiudad" placeholder="Ciudad promotor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCorreo" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="CorreoElectronico" class="form-control" id="inputCorreo" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelefono" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" name="Celular" class="form-control" id="inputTelefono" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal crear proveedor -->
<div class="modal fade" id="añadirProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar nuevo proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form action="" method="post">
                    <input name="activo" type="hidden" value="nuevo-proveedor" >
                        <!-- <div class="form-group row">
                            <label for="inputSelectIglesia">Iglesia</label>
                            <select id="inputSelectIglesia" class="form-control">
                                <option selected>Seleccione la iglesia relacionada</option>
                                <option>(13) Dosquebradas</option>
                                <option>(22) Pereira</option>

                            </select> 
                        </div>-->
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" name="Nombre" class="form-control" id="inputName" placeholder="Nombre proveedor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputShortName" class="col-sm-2 col-form-label">Corto</label>
                            <div class="col-sm-10">
                                <input type="text" name="ShortNombre" class="form-control" id="inputShortName" placeholder="Nombre corto de proveedor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputContactName" class="col-sm-2 col-form-label">Contacto</label>
                            <div class="col-sm-10">
                                <input type="text" name="NombreContacto" class="form-control" id="inputContactName" placeholder="Nombre contacto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputDireccion" class="col-sm-2 col-form-label">Direccion:</label>
                            <div class="col-sm-10">
                                <input type="text" name="Direccion" class="form-control" id="inputDireccion" placeholder="Direccion del proveedor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCiudad" class="col-sm-2 col-form-label">Ciudad:</label>
                            <div class="col-sm-10">
                                <input type="text" name="Ciudad" class="form-control" id="inputCiudad" placeholder="Ciudad del proveedor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelefono" class="col-xl-2 col-form-label">Telefono de contacto</label>
                            <div class="col-sm-10">
                                <input type="text" name="Telefono" class="form-control" id="inputTelefono" placeholder="Telefono de contacto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCelular" class="col-xl-2 col-form-label">Celular de contacto</label>
                            <div class="col-sm-10">
                                <input type="text" name="Celular" class="form-control" id="inputCelular" placeholder="Celular de contacto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCorreo" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="CorreoElectronico" class="form-control" id="inputCorreo" placeholder="Email del contacto o del proveedor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputNit" class="col-xl-2 col-form-label">NIT proveedor</label>
                            <div class="col-sm-10">
                                <input type="text" name="Nit" class="form-control" id="inputNit" placeholder="NIT del proveedor">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal crear colaborador -->
<div class="modal fade" id="añadirColaborador" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar nuevo colaborador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    <form action="" method="post">
                    <input name="activo" type="hidden" value="nuevo-colaborador" >
                        <!-- <div class="form-group row">
                            <label for="inputSelectIglesia">Iglesia</label>
                            <select id="inputSelectIglesia" class="form-control">
                                <option selected>Seleccione a la iglesia relacionada</option>
                                <option>(13) Dosquebradas</option>
                                <option>(22) Pereira</option>

                            </select>
                        </div> -->
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="text" name="Nombre" class="form-control" id="inputName" placeholder="Nombre del colaborador">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputLastname" class="col-sm-2 col-form-label">Apellido</label>
                            <div class="col-sm-10">
                                <input type="text" name="ShortNombre" class="form-control" id="inputLastname" placeholder="Apellido del colaborador">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputDocument" class="col-sm-2 col-form-label">Documento</label>
                            <div class="col-sm-10">
                                <input type="text" name="NombreContacto" class="form-control" id="inputDocument" placeholder="Documento del colaborador">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelefono" class="col-xl-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" name="Telefono" class="form-control" id="inputTelefono" placeholder="Telefono de colaborador">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputDireccion" class="col-sm-2 col-form-label">Direccion</label>
                            <div class="col-sm-10">
                                <input type="text" name="Direccion" class="form-control" id="inputDireccion" placeholder="Direccion del colaborador">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputVinculacion" class="col-sm-2 col-form-label">Vinculacion</label>
                            <div class="col-sm-10">
                                <input type="text" name="Ciudad" class="form-control" id="inputVinculacion" placeholder="Tipo vinculacion colaborador">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCorreo" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="CorreoElectronico" class="form-control" id="inputCorreo" placeholder="Email del colaborador">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

