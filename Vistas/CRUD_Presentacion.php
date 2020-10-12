<?php
require_once '../DAO/PresentacionDAO.php';
$PresentacionDAO = new PresentacionDAO();
$Presentacion = $PresentacionDAO->ListarPresentacionDAO();


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
            Se Ingreso Presentacion Correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div id="Alertsucces" class="alert alert-danger alert-dismissible"  style="display: none;">
            No se pudo Ingresar Correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal fade bd-example-modal-lg" id="ModalIngresarPresentacion" tabindex="-1" role="dialog" aria-labelledby="ModalIngresarPresentacionTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ingresar Presentacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body modal-body">
                        <form id="FormIngresarPre" name="FormIngresarProducto" >
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Presentacion</label>
                                    <input name="Presentacion" type="text" class="form-control" id="iPresentacion" placeholder="Presentacion" required="">
                                    <div id="PreValid" class="valid-feedback" style="display: none">
                                        Valido
                                    </div>
                                    <div id="PreInValid" class="invalid-feedback" style="display: none">
                                        Invalido
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Estado</label>
                                    <select class="form-control " name="Estado_Presentacion" id="iEstadoPre" required="">
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
                                <input type="hidden" name="opc" value="IngresarPresentacion">
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

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="closemod" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  id="btn_Enviar" type="button" class="btn btn-success">Agregar Presentación</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="ModalModificarPresentacion" tabindex="-1" role="dialog" aria-labelledby="ModalModificarPresentacionTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modificar Presentacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body modal-body">
                        <form id="FormModificarPre" name="FormIngresarProducto" >
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Presentacion</label>
                                    <input name="ModPresentacion" type="text" class="form-control" id="iPresentacionMod" placeholder="Presentacion" required="">
                                    <div id="PreValidMod" class="valid-feedback" style="display: none">
                                        Valido
                                    </div>
                                    <div id="PreInValidMod" class="invalid-feedback" style="display: none">
                                        Invalido
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Estado</label>
                                    <select class="form-control " name="ModEstado_Presentacion" id="iEstadoPreMod" required="">
                                        <option value="">Seleccionar</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Desativo</option>
                                    </select>
                                    <div id="PreEsValidMod" class="valid-feedback" style="display: none">
                                        Valido
                                    </div>
                                    <div id="PreEsInValidMod" class="invalid-feedback" style="display: none">
                                        Invalido
                                    </div>
                                </div>
                                <input type="hidden" name="opc" value="ModificarPresentacion">
                                <input type="hidden" name="id_Pre" id="id_pre">
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

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="btn_Enviar_Mod" type="button" class="btn btn-success">Modificar Presentación</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">

            <div class="content p-4">
                <div style="text-align: center">
                    <h1 class="mb-4">PRESENTACIÓN</h1>
                </div>

                <div class="card mb-4">
                    <div class="content">
                        <button type="button" class="btn btn-success btn-lg btn-block" style="border: solid 2px #28a745" data-toggle="modal" data-target="#ModalIngresarPresentacion">Ingresar Nueva Presentación</button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                            <thead>
                                <tr>
                                    <th style="max-width: 30px;text-align: top;">Cod. <br>Pres</th>
                                    <th>Presentacion</th>
                                    <th>Estado Presentacion</th>
                                    <th>Usuario Crea.</th>
                                    <th>Empleado Crea.</th>
                                    <th>Usuario Ult.<br> Mod.</th>
                                    <th>Empleado Ult.<br> Mod.</th>
                                    <th class="actions">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                while ($dataPresentacion = $Presentacion->fetch_object()) {
                                    ?>
                                    <tr class="<?php
                                    if ($dataPresentacion->Es_Presentacion === "1") {
                                        echo "alert alert-success";
                                    } else {
                                        echo "alert alert-danger";
                                    }
                                    ?>">
                                        <td ><?php echo $dataPresentacion->id_Presentacion ?></td>
                                        <td><?php echo $dataPresentacion->No_Presentacion ?></td>
                                        <td><?php
                                            if ($dataPresentacion->Es_Presentacion === "1") {
                                                echo "Activo";
                                            } else {
                                                echo "Desactivo";
                                            }
                                            ?>
                                        </td>
                                        <?php
                                        if ($dataPresentacion->Usu_Creacion === " " || $dataPresentacion->Usu_Creacion === NULL) {
                                            echo "<td>---</td>";
                                            echo "<td>---</td>";
                                        } else {
                                            echo "<td>" . $dataPresentacion->Usuario_Creacion . "</td>";
                                            echo "<td>" . $dataPresentacion->Empleado_Creacion . "</td>";
                                        }
                                        ?>

                                        <?php
                                        if ($dataPresentacion->Usu_Modificacion === null || $dataPresentacion->Usu_Modificacion === " ") {
                                            echo "<td>---</td>";
                                            echo "<td>---</td>";
                                        } else {

                                            echo "<td>" . $dataPresentacion->Usuario_Modificacion . "</td>";
                                            echo "<td>" . $dataPresentacion->Empleado_Modificacion . "</td>";
                                        }
                                        ?>

                                        <td>
                                            <button onclick="enviar(<?php echo $dataPresentacion->id_Presentacion ?>)" class="btn btn-icon btn-pill btn-primary" data-toggle="modal" data-target="#ModalModificarPresentacion" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
                                            <?php
                                            if ($dataPresentacion->Es_Presentacion == 1) {
                                                ?>
                                                <button onclick="DesactivarPresentacion(<?php echo $dataPresentacion->id_Presentacion ?>,<?php echo $_SESSION["id_Usuario"]; ?>)" class="btn btn-icon btn-pill btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash-alt"></i></button>
                                                <?php
                                            } else {
                                                ?>
                                                <button onclick="ActivarPresentacion(<?php echo $dataPresentacion->id_Presentacion ?>,<?php echo $_SESSION["id_Usuario"]; ?>)" class="btn btn-icon btn-pill btn-success" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-check"></i></button>
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