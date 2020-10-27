<?php
require_once '../DAO/ClienteDAO.php';
$ClienteDAO = new ClienteDAO();
session_start();
$Cliente = $ClienteDAO->ListaClienteByEmpresa($_SESSION["id_Empresa"]);
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
                Se Ingreso Producto Correctamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div id="Alertsucces" class="alert alert-danger alert-dismissible"  style="display: none;">
                No Se puedo 
                Correctamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal fade bd-example-modal-lg" id="ModalIngresarCliente" tabindex="-1" role="dialog" aria-labelledby="ModalIngresarClienteTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ingresar Proveedor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormIngresarPro" name="FormIngresarCliente" >
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Nombre</label>
                                        <input name="Nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre" required="" maxlength="100" autofocus="">
                                        <div id="NoValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="NoInValid" class="invalid-feedback" style="display: none">Invalido</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Apellido</label>
                                        <input name="Apellido" type="text" class="form-control" id="Apellido" placeholder="Apellido" required="" maxlength="100" autofocus="">
                                        <div id="ApeValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ApeInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <input type="hidden" name="opc" value="IngresarProveedor">
                                    <input type="hidden" name="Usuariocreacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">Nombre</label>
                                        <input name="Nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre" required="" maxlength="100" autofocus="">
                                        <div id="NoValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="NoInValid" class="invalid-feedback" style="display: none">Invalido</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Estado</label>
                                        <select class="form-control " name="Estado_Proveedor" id="iEstadoProveedor" required="" >
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
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">Dirección</label>
                                        <input name="Direccion" type="text" class="form-control" id="Direccion" placeholder="Direccion" required="" maxlength="100" autofocus>
                                        <div id="DirValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="DirInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Telefono</label>
                                        <input name="Telefono" type="tel" class="form-control" id="Telefono" placeholder="Telefono" required="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15" autofocus>
                                        <div id="TelValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="TelInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Celular</label>
                                        <input name="Celular" type="text" class="form-control" id="Celular" placeholder="Celular" required="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15" autofocus>
                                        <div id="CelValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CelInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Local</label>
                                        <select class="form-control " name="Local" id="Local" required="">
                                            <option value="">Seleccionar</option>

                                        </select>
                                        <div id="LocValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="LocInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Distrito</label>
                                        <select class="form-control " name=Distrito id="Distrito" required="">
                                            <option value="">Seleccionar</option>


                                        </select>
                                        <div id="DisValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="DisInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="closemod" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button  id="btn_Enviar" type="button" class="btn btn-success">Agregar Proveedor</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="ModalModificarProveedor" tabindex="-1" role="dialog" aria-labelledby="ModalModificarProveedorTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modificar Proveedor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormModificarPro" name="FormIngresarProducto" >
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Proveedor</label>
                                        <input name="ModProveedor" type="text" class="form-control" id="iProveedorMod" placeholder="Proveedor" required="" maxlength="100">
                                        <div id="ProValidMod" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProInValidMod" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Estado</label>
                                        <select class="form-control " name="ModEstado_Proveedor" id="iEstadoProMod" required="">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Desativo</option>
                                        </select>
                                        <div id="ProEsValidMod" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PrEsInValidMod" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <input type="hidden" name="opc" value="ModificarProveedor">
                                    <input type="hidden" name="id_Pro" id="id_pro">
                                    <input type="hidden" name="UsuarioModificacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationServer01">Dirección</label>
                                        <input name="DireccionMod" type="text" class="form-control" id="DireccionMod" placeholder="Direccion" required="" maxlength="100">
                                        <div id="ProValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Telefono</label>
                                        <input name="TelefonoMod" type="number" class="form-control" id="TelefonoMod" placeholder="Telefono" required="" maxlength="15" >
                                        <div id="ProValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Celular</label>
                                        <input name="CelularMod" type="number" class="form-control" id="CelularMod" placeholder="Celular" required="" maxlength="15" >
                                        <div id="ProValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Local</label>
                                        <select class="form-control " name="LocalMod" id="LocalMod" required="">
                                            <option value="">Seleccionar</option>

                                        </select>
                                        <div id="LocValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="LocInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Distrito</label>
                                        <select class="form-control " name="DistritoMod" id="DistritoMod" required="">
                                            <option value="">Seleccionar</option>


                                        </select>
                                        <div id="DisValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="DisInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button id="btn_Enviar_Mod" type="button" class="btn btn-success">Modificar Proveedor</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModalInformacionProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">

                <div class="content p-4">


                    <div class="card mb-4">

                        <div class="card-body">
                            <div style="text-align: center">
                                <h1 class="mb-4">PROVEEDORES</h1>
                            </div>
                            <div class="content">
                                <button type="button" class="btn btn-success btn-lg btn-block" style="border: solid 2px #28a745" data-toggle="modal" data-target="#ModalIngresarProveedor">Ingresar Nuevo Proveedor</button>
                            </div>  
                        </div>
                        <div class="card-body" style="padding-top: 0px;">
                            <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                                <thead>
                                    <tr>
                                        <th style="max-width: 30px;text-align: top;">Nro.</th>
                                        <th>Cliente</th>
                                        <th>sexo</th>
                                        <th>DNI</th>
                                        <th>RUC</th>
                                        <th>Tipo Cliente</th>
                                        <th>Telefono</th>
                                        <th>Local</th>
                                        <th class="actions">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    $i = 0;
                                    while ($dataCliente = $Cliente->fetch_object()) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td ><?php echo $i ?></td>
                                            <td><?php echo $dataCliente->No_Cliente . " " . $dataCliente->Ape_Cliente ?></td>
                                            <?php if ($dataCliente->Sexo === "F") { ?>
                                                <td>Femenino</td>
                                            <?php } else if ($dataCliente->Sexo === "M") { ?>
                                                <td>Masculino</td>
                                            <?php } ?>

                                            <?php if ($dataCliente->Dni_Cliente !== "" || $dataCliente->Dni_Cliente !== null) { ?>
                                                <td><?php echo $dataCliente->Dni_Cliente ?></td>
                                            <?php } else { ?>
                                                <td>No Registrado</td>
                                            <?php } ?>

                                            <?php if ($dataCliente->RUC !== "" || $dataCliente->RUC !== null) { ?>
                                                <td><?php echo $dataCliente->RUC ?></td>
                                            <?php } else { ?>
                                                <td>No Registrado</td>
                                            <?php } ?>

                                            <?php if ($dataCliente->Ti_Cliente === "1") { ?>
                                                <td>Cliente Usuario</td>
                                            <?php } else if ($dataCliente->Ti_Cliente === "2") { ?>
                                                <td>Cliente Entidad</td>
                                            <?php } ?>

                                            <?php if ($dataCliente->Tel_Cliente !== null) { ?>
                                                <td><?php echo $dataCliente->Tel_Cliente ?></td>
                                            <?php } else { ?>
                                                <td>No Registrado</td>
                                            <?php } ?>

                                            <?php if ($dataCliente->No_Local !== "" || $dataCliente->No_Local !== null) { ?>
                                                <td><?php echo $dataCliente->No_Local ?></td>
                                            <?php } else { ?>
                                                <td>No Registrado</td>
                                            <?php } ?>

                                            <td>
                                                <button onclick="enviar(<?php echo $dataCliente->id_Cliente ?>)" class="btn btn-icon btn-pill btn-primary" data-toggle="modal" data-target="#ModalModificarProveedor" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
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
            <script src="js/Proveedor/Proveedor.js"></script>
            <script type="text/javascript">

                                            function enviar(id) {
                                                ModificarLlenarPro(id);
                                            }

            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#example').DataTable();
                    ListarLocal(<?php echo $_SESSION["id_Empresa"] ?>);
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