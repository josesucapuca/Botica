<?php
require_once '../DAO/ProveedorDAO.php';
$ProveedorDAO = new ProveedorDAO();
session_start();
$Proveedor = $ProveedorDAO->SelectProveedor($_SESSION["id_Empresa"]);
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
            <div class="modal fade bd-example-modal-lg" id="ModalIngresarProveedor" tabindex="-1" role="dialog" aria-labelledby="ModalIngresarProveedorTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ingresar Proveedor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormIngresarPro" name="FormIngresarProducto" >
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Proveedor</label>
                                        <input name="Proveedor" type="text" class="form-control" id="iProveedor" placeholder="Proveedor" required="" maxlength="100" autofocus="">
                                        <div id="ProValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
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
                                    <input type="hidden" name="opc" value="IngresarProveedor">
                                    <input type="hidden" name="Usuariocreacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">
                                    <!--<div class="col-md-6 mb-3">
                                        <div style="height: 20px"></div>
                                        <div class="form-check">
                                                                                   
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label for="male">Activo</label><br>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                                            <label for="female">Desactivo</label>
                                        </div>
                                    </div>-->

                                </div>
                                <div class="form-row">
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
                <div class="modal-dialog modal-dialog-centered" role="document">
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
                                    <!--<div class="col-md-6 mb-3">
                                        <div style="height: 20px"></div>
                                        <div class="form-check">
                                                                                   
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label for="male">Activo</label><br>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                                            <label for="female">Desactivo</label>
                                        </div>
                                    </div>-->

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
                            <button id="btn_Enviar_Mod" type="button" class="btn btn-success">Modificar Cateogria</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModalInformacionProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">

                <div class="content p-4">
                    <div style="text-align: center">
                        <h1 class="mb-4">PROVEEDORES</h1>
                    </div>

                    <div class="card mb-4">
                        <div class="content">
                            <button type="button" class="btn btn-success btn-lg btn-block" style="border: solid 2px #28a745" data-toggle="modal" data-target="#ModalIngresarProveedor">Ingresar Nuevo Proveedor</button>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                                <thead>
                                    <tr>
                                        <th style="max-width: 30px;text-align: top;">Nro.</th>
                                        <th>Proveedor</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th>Direccion</th>
                                        <th>Distrito</th>
                                        <th>Local</th>
                                        <th>Estado</th>
                                        <th>Mas Detalles</th>
                                        <th class="actions">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    $i=0;
                                    while ($dataProveedor = $Proveedor->fetch_object()) {
                                        $i++;
                                        ?>
                                        <tr class="<?php
                                        if ($dataProveedor->Es_Proveedor === "1") {
                                            echo "alert alert-success";
                                        } else {
                                            echo "alert alert-danger";
                                        }
                                        ?>">
                                            <td ><?php echo $i ?></td>
                                            <td><?php echo $dataProveedor->No_Proveedor ?></td>
                                            <td><?php echo $dataProveedor->Tel_Proveedor ?></td>
                                            <td><?php echo $dataProveedor->Cel_Proveedor ?></td>
                                            <td><?php echo $dataProveedor->Dir_Proveedor ?></td>
                                            <td><?php
                                                if ($dataProveedor->id_Distrito !== null || $dataProveedor->id_Distrito || "") {
                                                    echo $dataProveedor->No_Distrito;
                                                } else {
                                                    echo "No Asignado";
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($dataProveedor->id_Local !== null || $dataProveedor->id_Local || "") {
                                                    echo $dataProveedor->No_Local;
                                                } else {
                                                    echo "No Asignado";
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($dataProveedor->Es_Proveedor === "1") {
                                                    echo "Activo";
                                                } else {
                                                    echo "Desactivo";
                                                }
                                                ?>
                                            </td>
                                           
                                            <td>
                                                <button onclick="enviar(<?php echo  $dataProveedor->id_Proveedor ?>)" class="btn btn-icon btn-pill btn-primary" data-toggle="modal" data-target="#ModalModificarProveedor" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
                                                <?php
                                                if ($dataProveedor->Es_Proveedor == 1) {
                                                    ?>
                                                    <button onclick="DesactivarProveedor(<?php echo $dataProveedor->id_Proveedor ?>,<?php echo $_SESSION["id_Usuario"]; ?>)" class="btn btn-icon btn-pill btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash-alt"></i></button>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <button onclick="ActivarProveedor(<?php echo $dataProveedor->id_Proveedor ?>,<?php echo $_SESSION["id_Usuario"]; ?>)" class="btn btn-icon btn-pill btn-success" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-check"></i></button>
                                                        <?php
                                                    }
                                                    ?>
                                            </td>
                                            <td><button onclick="DatProvee(<?php echo $dataProveedor->id_Proveedor ?>)"  class="btn btn-icon btn-pill btn-danger" data-toggle="modal" data-target="#ModalInformacionProducto" style="color: white"><i class="fa fa-fw fa-list"></i></button>
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
                    ListarLocal(<?php echo $_SESSION["id_Empresa"]?>);
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