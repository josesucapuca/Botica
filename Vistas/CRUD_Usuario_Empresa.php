<?php
require_once '../DAO/UsuarioDAO.php';
$UsuarioDAO = new UsuarioDAO();
session_start();
$DatUsuario = $UsuarioDAO->ListarUsuario($_SESSION["id_Empresa"]);


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
                Se Ingreso Presentacion Correctamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div id="Alertsucces" class="alert alert-danger alert-dismissible"  style="display: none;">
                No se pudo Ingresar Correctamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal fade" id="ModalIngresarUsuario" tabindex="-1" role="dialog" aria-labelledby="ModalInsertarUsuarioTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ingresar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body" style="padding-bottom: 0px;padding-top: 0px;">
                                <form id="FormIngresarUsuario" name="FormIngresarUsuario" style="display: none;">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationServer01">Empleado</label>
                                            <input name="Empleado" type="text" class="form-control" id="Empleado" placeholder="Presentacion" required="" disabled="true">
                                            <div id="EmpiValid" class="valid-feedback" style="display: none">
                                                Valido
                                            </div>
                                            <div id="EmpiInValid" class="invalid-feedback" style="display: none">
                                                Seleccionar Empleado
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationServer01">Usuario</label>
                                            <input name="Usuario" type="text" class="form-control" id="Usuario" placeholder="Usuario" required="">
                                            <div id="usuiValid" class="valid-feedback" style="display: none">
                                                Correcto
                                            </div>
                                            <div id="usuiInValid" class="invalid-feedback" style="display: none">
                                                Ingresar Usuario
                                            </div>
                                        </div>
                                        <input type="hidden" name="opc" value="IngresarUsuario">
                                        <input type="hidden" name="id_Empleado" id="id_Empleado">
                                        <input type="hidden" name="UsuarioCreacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">
                                    </div>
                                    <div class="form-row">

                                        <div class="col-md-6 mb-3">
                                            <label for="validationServer01">Password</label>
                                            <input name="password" type="password" class="form-control" id="password" placeholder="password" required="" maxlength="15">
                                            <div id="PassiValid" class="valid-feedback" style="display: none">
                                                Correcto
                                            </div>
                                            <div id="PassiInValid" class="invalid-feedback" style="display: none">
                                                Ingresar Contraseña
                                            </div>
                                            <div id="pasv" class="invalid-feedback" style="display: none">
                                                Minimo 8 Caracteres y debe tener numeros y Mayusculas 
                                            </div>
                                            <div id="PassiNoInValid" class="invalid-feedback" style="display: none">
                                                Las Contraseña no coinciden
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="validationServer01">Confirmar Password</label>
                                            <input name="Conpassword" type="password" class="form-control" id="Conpassword" placeholder="Password" required="" maxlength="15">
                                            <div id="passciValid" class="valid-feedback" style="display: none">
                                                Correcto
                                            </div>
                                            <div id="passciInValid" class="invalid-feedback" style="display: none">
                                                Ingresar Confirmación de contraseña
                                            </div>
                                            <div id="passciNoInValid" class="invalid-feedback" style="display: none">
                                                Las Contraseña no coinciden
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationServer01">Correo</label>
                                            <input name="correo" type="email" class="form-control" id="correo" placeholder="Correo" required=""  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                            <div id="CoInValid" class="invalid-feedback" style="display: none">
                                                Correo invalido
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <label for="validationServer01">Estado</label>
                                            <select class="form-control " name="Estado" id="Estado" required="">
                                                <option value="">Seleccionar</option>
                                                <option value="1">Activo</option>
                                                <option value="0">Desativo</option>
                                            </select>
                                            <div id="EsiEsValid" class="valid-feedback" style="display: none">
                                                Valido
                                            </div>
                                            <div id="EsiEsInValid" class="invalid-feedback" style="display: none">
                                                Seleccionar Estado
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <label for="validationServer01">Nivel de Usuario</label>
                                            <select class="form-control " name="Nivel" id="Nivel" required="">
                                                <option value="">Seleccionar</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Vendedor</option>
                                            </select>
                                            <div id="NiiEsValid" class="valid-feedback" style="display: none">
                                                Valido
                                            </div>
                                            <div id="NiiEsInValid" class="invalid-feedback" style="display: none">
                                                Seleccionar Nivel de Usuario
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body" style="padding-top: 0px;">
                                <div style="text-align: center">
                                    <h1 class="mb-4">Empleados</h1>
                                </div>
                                <table class="table table-hover" style="border: solid 2px #b9bbbe">
                                    <thead>
                                        <tr>
                                            <th style="max-width: 30px;text-align: top;">Nro.</th>
                                            <th>Empleado</th>
                                            <th class="actions">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ListEmpleados">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="closemo" type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                            <button id="btn_Enviar" type="button" class="btn btn-success" disabled="true">Ingresar Usuario</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="ModalModificarUsuario" tabindex="-1" role="dialog" aria-labelledby="ModalModificarUsuarioTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modificar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormModificacionUsuario" name="FormModificacionUsuario">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Empleado</label>
                                        <input name="EmpleadoMod" type="text" class="form-control" id="EmpleadoMod" required="" disabled="true">
                                        <div id="EmpValidMod" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EmpInValidMod" class="invalid-feedback" style="display: none">
                                            Seleccionar Empleado
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Usuario</label>
                                        <input name="UsuarioMod" type="text" class="form-control" id="UsuarioMod" placeholder="Usuario" required="">
                                        <div id="UsuValidMod" class="valid-feedback" style="display: none">
                                            Correcto
                                        </div>
                                        <div id="UsuInValidMod" class="invalid-feedback" style="display: none">
                                            Ingresar Usuario
                                        </div>
                                    </div>
                                    <input type="hidden" name="opc" value="ModificarUsuario">
                                    <input type="hidden" name="id_Usuario" id="id_Usuario">
                                    <input type="hidden" name="UsuarioModificacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Password</label>
                                        <input name="passwordMod" type="password" class="form-control" id="passwordMod" placeholder="password" required="">
                                        <div id="PassValidMod" class="valid-feedback" style="display: none">
                                            Correcto
                                        </div>
                                        <div id="PassInValidMod" class="invalid-feedback" style="display: none">
                                            Ingresar Contraseña
                                        </div>
                                        <div id="PassNoInValidMod" class="invalid-feedback" style="display: none">
                                            Las Contraseña no coinciden
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Confirmar Password</label>
                                        <input name="ConpasswordMod" type="password" class="form-control" id="ConpasswordMod" placeholder="Password" required="">
                                        <div id="PassConValidMod" class="valid-feedback" style="display: none">
                                            Correcto
                                        </div>
                                        <div id="PassConInValidMod" class="invalid-feedback" style="display: none">
                                            Ingresar Confirmación de contraseña
                                        </div>
                                        <div id="PassConNoInValidMod" class="invalid-feedback" style="display: none">
                                            Las Contraseña no coinciden
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Correo</label>
                                        <input name="correoMod" type="email" class="form-control" id="correoMod" placeholder="Correo" required=""  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                        <div id="CoInValidMod" class="invalid-feedback" style="display: none">
                                            Correo invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="validationServer01">Estado</label>
                                        <select class="form-control " name="EstadoMod" id="EstadoMod" required="">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Desativo</option>
                                        </select>
                                        <div id="EsValidMod" class="valid-feedback" style="display: none">
                                            Correcto
                                        </div>
                                        <div id="EsInValidMod" class="invalid-feedback" style="display: none">
                                            Seleccionar Estado
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="validationServer01">Nivel de Usuario</label>
                                        <select class="form-control " name="NivelMod" id="NivelMod" required="">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Vendedor</option>
                                        </select>
                                        <div id="NiValidMod" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="NiInValidMod" class="invalid-feedback" style="display: none">
                                            Seleccionar Nivel de Usuario
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="closemod" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button  id="btn_Enviar_Mod" type="button" class="btn btn-success">Modificar Usuario</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModalInformacionUsuario" tabindex="-1" role="dialog" aria-labelledby="ModalInformacionUsuarioTitle" aria-hidden="true">
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
                                <tr><td><strong>Nivel Usuario</strong></td><td id="NiUsuario"></td></tr>
                                <tr><td><strong>Correo de Usaurio</strong></td><td id="CorreoUsua"></td></tr>
                                <tr><td><strong>Usuario Creación</strong></td><td id="UsuarioCrea"></td></tr>
                                <tr><td><strong>Usuario ultima Modificaión</strong></td><td id="UsuModi"></td></tr>
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
                        <h1 class="mb-4">USUARIOS</h1>
                    </div>

                    <div class="card mb-4" style="padding-top: 0px;">
                        <div class="content">
                            <button onclick="ListarEmpleados(<?php echo $_SESSION["id_Empresa"] ?>)" type="button" class="btn btn-success btn-lg btn-block" style="border: solid 2px #28a745" data-toggle="modal" data-target="#ModalIngresarUsuario" >Ingresar Nueva Presentación</button>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                                <thead>
                                    <tr>
                                        <th style="max-width: 30px;text-align: top;">Nro.</th>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Nivel de Usuario</th>
                                        <th>Estado<br> Usuario</th>
                                        <th>Correo Usuario</th>
                                        <th>Empleado</th>
                                        <th>Cargo</th>
                                        <th>Mas Detalle</th>
                                        <th class="actions">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    $i = 0;
                                    while ($dataUsuario = $DatUsuario->fetch_object()) {
                                        $i++;
                                        ?>
                                        <tr class="<?php
                                        if ($dataUsuario->Es_Usuario === "1") {
                                            echo "alert alert-success";
                                        } else {
                                            echo "alert alert-danger";
                                        }
                                        ?>">
                                            <td ><?php echo $i ?></td>
                                            <td><?php echo $dataUsuario->Usuario ?></td>
                                            <td><?php echo $dataUsuario->Password ?></td>
                                            <td><?php
                                                if ($dataUsuario->Nivel_Usuario === "1") {
                                                    echo "AdministradorEmpresa";
                                                } else if ($dataUsuario->Nivel_Usuario === "2") {
                                                    echo "Vendedor";
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($dataUsuario->Es_Usuario === "1") {
                                                    echo "Activo";
                                                } else {
                                                    echo "Desactivo";
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                if ($dataUsuario->Correo_Usuario === "" || $dataUsuario->Correo_Usuario === null) {
                                                    echo "No_Registrado";
                                                } else {
                                                    echo $dataUsuario->Correo_Usuario;
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $dataUsuario->Empleado ?></td>
                                            <td><?php echo $dataUsuario->Cargo_Empleado ?></td>
                                            <td><button onclick="InfoUsuario(<?php echo $dataUsuario->id_Usuario ?>)"  class="btn btn-icon btn-pill btn-danger" data-toggle="modal" data-target="#ModalInformacionUsuario" style="color: white"><i class="fa fa-fw fa-list"></i></button>
                                            </td>
                                            <td>
                                                <button onclick="ModificarLlenarUsu(<?php echo $dataUsuario->id_Usuario ?>)" class="btn btn-icon btn-pill btn-primary" data-toggle="modal" data-target="#ModalModificarUsuario" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
                                                <?php
                                                if ($dataUsuario->Es_Usuario == 1) {
                                                    ?>
                                                    <button onclick="DesactivarUsuario(<?php echo $dataUsuario->id_Usuario ?>,<?php echo $_SESSION["id_Usuario"]; ?>)" class="btn btn-icon btn-pill btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash-alt"></i></button>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <button onclick="ActivarUsuario(<?php echo $dataUsuario->id_Usuario ?>,<?php echo $_SESSION["id_Usuario"]; ?>)" class="btn btn-icon btn-pill btn-success" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-check"></i></button>
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
            <script src="js/Usuario/Usuario.js"></script>
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