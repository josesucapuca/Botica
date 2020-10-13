<?php
require_once '../DAO/EmpleadoDao.php';
$EmpleadoDAO = new EmpleadoDAO();
$Empleado = $EmpleadoDAO->ListarEmpleado();


session_start();
if ($_SESSION["Usuario"] !== null) {
    ?>
    <!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
            <link rel="stylesheet" href="css/datatables.min.css">
            <link rel="stylesheet" href="css/fullcalendar.min.css">
            <link rel="stylesheet" href="css/bootadmin.min.css">

            <title>Datatables | BootAdmin</title>
        </head>
        <body id="idbody" class="bg-light">
            <div id="Alertsucces" class="alert alert-success alert-dismissible" style="display: none;">
                Se Ingreso Empleado Correctamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div id="Alertsucces" class="alert alert-danger alert-dismissible"  style="display: none;">
                No se pudo Ingresar Correctamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal fade bd-example-modal-lg" id="ModalIngresarEmpleado" tabindex="-1" role="dialog" aria-labelledby="ModalIngresarEmpleadoTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ingresar Empleado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormIngresarPre" name="FormIngresarProducto" >
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Nombre</label>
                                        <input name="NombreEmpleado" type="text" class="form-control" id="NombreEmpleado" placeholder="Nombre de Empleado" required="">
                                        <div id="NoValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="NoInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Apellido</label>
                                        <input name="ApellidoEmpleado" type="text" class="form-control" id="ApellidoEmpleado" placeholder="Apellido de Empleado" required="">
                                        <div id="ApValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Cargo</label>
                                        <input name="CargoEmpleado" type="text" class="form-control" id="CargoEmpleado" placeholder="Cargo" required="">
                                        <div id="CaValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CaInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Estado</label>
                                        <select class="form-control " name="EstadoEmpleado" id="EstadoEmpleado" required="">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Desativo</option>
                                        </select>
                                        <div id="EsValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EsInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Edad</label>
                                        <input name="EdadEmpleado" type="number" class="form-control" id="EdadEmpleado" placeholder="Edad" required="">
                                        <div id="ApValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">Dirección</label>
                                        <input name="DireccionEmpleado" type="text" class="form-control" id="DireccionEmpleado" placeholder="Dirección" required="">
                                        <div id="DirValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="DirInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Telefono</label>
                                        <input name="TelefonoEmpleado" type="number" class="form-control" id="TelefonoEmpleado" placeholder="Edad" required="">
                                        <div id="ApValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Celular</label>
                                        <input name="CelularEmpleado" type="number" class="form-control" id="CelularEmpleado" placeholder="Celular" required="">
                                        <div id="CaValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CaInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Local</label>
                                        <select class="form-control " name="LocalEmpleado" id="LocalEmpleado" required="">
                                            <option value="">Seleccionar</option>
                                        </select>
                                        <div id="EsValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EsInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Distrito</label>
                                        <select class="form-control " name="DistritoEmpleado" id="DistritoEmpleado" required="">
                                            <option value="">Seleccionar</option>
                                        </select>
                                        <div id="EsValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EsInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Fecha de Ingreso</label>
                                        <input name="FechaIngreso" type="date" class="form-control" id="FechaIngreso" placeholder="Edad" required="">
                                        <div id="ApValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Clave Empleado</label>
                                        <input name="ClaveEmpleado" type="number" class="form-control" id="ClaveEmpleado" placeholder="Clave" required="">
                                        <div id="CaValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CaInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Sexo Empleado</label>
                                        <select class="form-control " name="DistritoEmpleado" id="DistritoEmpleado" required="">
                                            <option value="">Seleccionar</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                        <div id="EsValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EsInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <input type="hidden" name="opc" value="IngresarEmpleado">
                                    <input type="hidden" name="Usuariocreacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">
                                
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="closemod" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  id="btn_Enviar" type="button" class="btn btn-success">Agregar Empleado</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="ModalModificarEmpleado" tabindex="-1" role="dialog" aria-labelledby="ModalModificarPresentacionTitle" aria-hidden="true" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modificar Empleado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormIngresarPre" name="FormIngresarProducto" >
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Nombre</label>
                                        <input name="NombreEmpleado" type="text" class="form-control" id="NombreEmpleado" placeholder="Nombre de Empleado" required="">
                                        <div id="NoValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="NoInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Apellido</label>
                                        <input name="ApellidoEmpleado" type="text" class="form-control" id="ApellidoEmpleado" placeholder="Apellido de Empleado" required="">
                                        <div id="ApValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Cargo</label>
                                        <input name="CargoEmpleado" type="text" class="form-control" id="CargoEmpleado" placeholder="Cargo" required="">
                                        <div id="CaValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CaInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Estado</label>
                                        <select class="form-control " name="EstadoEmpleado" id="EstadoEmpleado" required="">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Desativo</option>
                                        </select>
                                        <div id="EsValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EsInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Edad</label>
                                        <input name="EdadEmpleado" type="number" class="form-control" id="EdadEmpleado" placeholder="Edad" required="">
                                        <div id="ApValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">Dirección</label>
                                        <input name="DireccionEmpleado" type="text" class="form-control" id="DireccionEmpleado" placeholder="Dirección" required="">
                                        <div id="DirValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="DirInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Telefono</label>
                                        <input name="TelefonoEmpleado" type="number" class="form-control" id="TelefonoEmpleado" placeholder="Edad" required="">
                                        <div id="ApValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Celular</label>
                                        <input name="CelularEmpleado" type="number" class="form-control" id="CelularEmpleado" placeholder="Celular" required="">
                                        <div id="CaValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CaInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Local</label>
                                        <select class="form-control " name="LocalEmpleado" id="LocalEmpleado" required="">
                                            <option value="">Seleccionar</option>
                                        </select>
                                        <div id="EsValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EsInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Distrito</label>
                                        <select class="form-control " name="DistritoEmpleado" id="DistritoEmpleado" required="">
                                            <option value="">Seleccionar</option>
                                        </select>
                                        <div id="EsValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EsInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Fecha de Ingreso</label>
                                        <input name="FechaIngreso" type="date" class="form-control" id="FechaIngreso" placeholder="Edad" required="">
                                        <div id="ApValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Clave Empleado</label>
                                        <input name="ClaveEmpleado" type="number" class="form-control" id="ClaveEmpleado" placeholder="Clave" required="">
                                        <div id="CaValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CaInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Sexo Empleado</label>
                                        <select class="form-control " name="DistritoEmpleado" id="DistritoEmpleado" required="">
                                            <option value="">Seleccionar</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                        <div id="EsValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EsInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Fecha de Ingreso</label>
                                        <input name="FechaIngreso" type="date" class="form-control" id="FechaIngreso" placeholder="Edad" required="">
                                        <div id="ApValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_Emp" >
                                    <input type="hidden" name="opc" value="ModificarEmpleado">
                                    <input type="hidden" name="Usuariocreacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">
                                
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="btn_Enviar_Mod" type="button" class="btn btn-success">Modificar Presentación</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModalInformacionEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Datos de Creacion y Modificación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover" style="border: solid 2px #b9bbbe">
                                <tr><td><strong>Usuario Creacion</strong></td><td id="Usu_Creacion">as</td></tr>
                                <tr><td><strong>Empleado que Creacion</strong></td><td id="Empleado_Creacion">sa</td></tr>
                                <tr><td><strong>Usuario de <br>Ultima Modificación</strong></td><td id="Usu_Mod">sa</td></tr>
                                <tr><td><strong>Empleado de <br>Ultima Modificación</strong></td><td id="Empleado_Mod">sa</td></tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">

                <div class="content p-4">
                    <div style="text-align: center">
                        <h1 class="mb-4">EMPLEADOS</h1>
                    </div>

                    <div class="card mb-4">
                        <div class="content">
                            <button type="button" class="btn btn-success btn-lg btn-block" style="border: solid 2px #28a745" data-toggle="modal" data-target="#ModalIngresarEmpleado">Ingresar Nueva Empleados</button>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                                <thead>
                                    <tr>
                                        <th style="max-width: 30px;text-align: top;">id.<br>Emp</th>
                                        <th>Empleado</th>
                                        <th>Estado <br>Emp.</th>
                                        <th>Dirección</th>
                                        <th>Cargo</th>
                                        <th>Edad</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th>Det.<br>Empleado</th>
                                        <th >Opciones</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    while ($dataEmpleado = $Empleado->fetch_object()) {
                                        ?>
                                        <tr class="<?php
                                        if ($dataEmpleado->Es_Empleado === "1") {
                                            echo "alert alert-success";
                                        } else {
                                            echo "alert alert-danger";
                                        }
                                        ?>">
                                            <td ><?php echo $dataEmpleado->id_Empleado ?></td>
                                            <td><?php echo $dataEmpleado->No_Empleado ?></td>
                                            <td><?php
                                                if ($dataEmpleado->Es_Empleado === "1") {
                                                    echo "Activo";
                                                } else {
                                                    echo "Desactivo";
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($dataEmpleado->Dir_Empleado === "" || $dataEmpleado->Dir_Empleado === null) {
                                                    echo "SinRegistrar";
                                                } else {
                                                    echo $dataEmpleado->Dir_Empleado;
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $dataEmpleado->Cargo_Empleado ?></td>
                                            <td><?php
                                                if ($dataEmpleado->Edad_Empleado === "" || $dataEmpleado->Edad_Empleado === null) {
                                                    echo "Sin Registrar";
                                                } else {
                                                    echo $dataEmpleado->Edad_Empleado;
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($dataEmpleado->Te_Empleado === "" || $dataEmpleado->Te_Empleado === null) {
                                                    echo "Sin Registrar";
                                                } else {
                                                    echo $dataEmpleado->Te_Empleado;
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($dataEmpleado->Cel_Empleado === "" || $dataEmpleado->Cel_Empleado === null) {
                                                    echo "Sin Registrar";
                                                } else {
                                                    echo $dataEmpleado->Cel_Empleado;
                                                }
                                                ?>
                                            </td>
                                            <td><button onclick="DatProd(<?php echo $dataEmpleado->id_Empleado ?>)"  class="btn btn-icon btn-pill btn-danger" data-toggle="modal" data-target="#ModalInformacionEmpleado" style="color: white"><i class="fa fa-fw fa-list"></i></button>
                                            </td>
                                            <td>
                                                <button onclick="enviar(<?php echo $dataEmpleado->id_Empleado ?>)" class="btn btn-icon btn-pill btn-primary" data-toggle="modal" data-target="#ModalModificarEmpleado" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
                                                <?php
                                                if ($dataEmpleado->Es_Empleado == 1) {
                                                    ?>
                                                    <button onclick="DesactivarEmpleados(<?php echo $dataEmpleado->id_Empleado ?>,<?php echo $_SESSION["id_Usuario"]; ?>)" class="btn btn-icon btn-pill btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash-alt"></i></button>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <button onclick="ActivarEmpleados(<?php echo $dataEmpleado->id_Empleado ?>,<?php echo $_SESSION["id_Usuario"]; ?>)" class="btn btn-icon btn-pill btn-success" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-check"></i></button>
                                                        <?php
                                                    }
                                                    ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/datatables.min.js"></script>
            <script src="js/moment.min.js"></script>
            <script src="js/fullcalendar.min.js"></script>
            <script src="js/bootadmin.min.js"></script>
            <script src="js/Presentacion/Presentacion.js"></script>
            <script type="text/javascript">

                                                        function enviar(id) {
                                                            ModificarLlenarPre(id);
                                                        }

            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#example').DataTable();
                });
            </script>

            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118868344-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', 'UA-118868344-1');
            </script>

            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({
                    google_ad_client: "ca-pub-4097235499795154",
                    enable_page_level_ads: true
                });
            </script>
            <script type="text/javascript">

            </script>

        </body>
    </html>    <?php
} else {
    ?><script type="text/javascript">
        location.href = "VistaLogueo.php"
    </script><?php
}
?>