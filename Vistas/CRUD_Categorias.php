<?php
require_once '../DAO/ProductoDAO.php';
require_once '../DAO/ProveedorDAO.php';
require_once '../DAO/PresentacionDAO.php';
require_once '../DAO/CategoriaDAO.php';
require_once '../DAO/LocalDAO.php';

$CategoriaDAO = new CategoriaDAO();

$Cat2 = $CategoriaDAO->ListarCategoriaDAO();


session_start();
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
            Se Ingreso Categoria Correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div id="Alertsucces" class="alert alert-danger alert-dismissible"  style="display: none;">
            No Se puedo Ingresar Correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal fade bd-example-modal-lg" id="ModalIngresarCategoria" tabindex="-1" role="dialog" aria-labelledby="ModalIngresarCategoriaTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ingresar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body modal-body">
                        <form id="FormIngresarCat" name="FormIngresarProducto" >
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Categoria</label>
                                    <input name="Categoria" type="text" class="form-control" id="iCategoria" placeholder="Categoria" required="">
                                    <div id="CatValid" class="valid-feedback" style="display: none">
                                        Valido
                                    </div>
                                    <div id="CatInValid" class="invalid-feedback" style="display: none">
                                        Invalido
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Estado</label>
                                    <select class="form-control " name="Estado_Categoria" id="iEstadoCat" required="">
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
                                <input type="hidden" name="opcCat" value="IngresarCategoria">
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
                        <button id="btn_Enviar" type="button" class="btn btn-success">Agregar Cateogria</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="ModalModificarCategoria" tabindex="-1" role="dialog" aria-labelledby="ModalModificarCategoriaTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ingresar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body modal-body">
                        <form id="FormModificarCat" name="FormIngresarProducto" >
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Categoria</label>
                                    <input name="ModCategoria" type="text" class="form-control" id="iCategoriaMod" placeholder="Categoria" required="">
                                    <div id="CatValidMod" class="valid-feedback" style="display: none">
                                        Valido
                                    </div>
                                    <div id="CatInValidMode" class="invalid-feedback" style="display: none">
                                        Invalido
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Estado</label>
                                    <select class="form-control " name="ModEstado_Categoria" id="iEstadoCatMod" required="">
                                        <option value="">Seleccionar</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Desativo</option>
                                    </select>
                                    <div id="CatEsValid" class="valid-feedback" style="display: none">
                                        Valido
                                    </div>
                                    <div id="CatEsInValid" class="invalid-feedback" style="display: none">
                                        Invalido
                                    </div>
                                </div>
                                <input type="hidden" name="opcCat" value="ModificarCat">
                                <input type="hidden" name="id_Cat" id="id_Cate">
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
                        <button id="btn_Enviar_Mod" type="button" class="btn btn-success">Modificar Cateogria</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">

            <div class="content p-4">
                <div style="text-align: center">
                    <h1 class="mb-4">CATEGORIAS</h1>
                </div>

                <div class="card mb-4">
                    <div class="content">
                        <button type="button" class="btn btn-success btn-lg btn-block" style="border: solid 2px #28a745" data-toggle="modal" data-target="#ModalIngresarCategoria">Ingresar Nuevo Categoria</button>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 2px #b9bbbe">
                            <thead>
                                <tr>
                                    <th style="max-width: 30px;text-align: top;">Cod. <br>Cat</th>
                                    <th>Categoria</th>
                                    <th>Estado Categoria</th>
                                    <th>Usuario Crea.</th>
                                    <th>Empleado Crea.</th>
                                    <th>Usuario Ult.<br> Mod.</th>
                                    <th>Empleado Ult.<br> Mod.</th>
                                    <th class="actions">Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="ListCategorias">
                                <?php
                                while ($datacategor = $Cat2->fetch_object()) {
                                    ?>
                                    <tr class="<?php
                                    if ($datacategor->Es_Categoria === "1") {
                                        echo "alert alert-success";
                                    } else {
                                        echo "alert alert-danger";
                                    }
                                    ?>">
                                        <td ><?php echo $datacategor->id_Categoria ?></td>
                                        <td><?php echo $datacategor->No_Categoria ?></td>
                                        <td><?php
                                            if ($datacategor->Es_Categoria === "1") {
                                                echo "Activo";
                                            } else {
                                                echo "Desactivo";
                                            }
                                            ?>
                                        </td>
                                        <?php
                                        if ($datacategor->Usu_Creacion === " " || $datacategor->Usu_Creacion === NULL) {
                                            echo "<td>---</td>";
                                            echo "<td>---</td>";
                                        } else {
                                            echo "<td>" . $datacategor->Usuario_Creacion . "</td>";
                                            echo "<td>" . $datacategor->Empleado_Creacion . "</td>";
                                        }
                                        ?>

                                        <?php
                                        if ($datacategor->Usu_Modificacion === null || $datacategor->Usu_Modificacion === " ") {
                                            echo "<td>---</td>";
                                            echo "<td>---</td>";
                                        } else {

                                            echo "<td>" . $datacategor->Usuario_Modificacion . "</td>";
                                            echo "<td>" . $datacategor->Empleado_Modificacion . "</td>";
                                        }
                                        ?>

                                        <td>
                                            <button onclick="enviar(<?php echo $datacategor->id_Categoria ?>)" class="btn btn-icon btn-pill btn-primary" data-toggle="modal" data-target="#ModalModificarCategoria" title="Edit"><i class="fa fa-fw fa-edit"></i></button>
                                            <?php
                                            if ($datacategor->Es_Categoria == 1) {
                                                ?>
                                                <button onclick="DesactivarCategoria(<?php echo $datacategor->id_Categoria ?>)" class="btn btn-icon btn-pill btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash"></i></button>
                                                <?php
                                            } else {
                                                ?>
                                                <button onclick="ActivarCategoria(<?php echo $datacategor->id_Categoria ?>)" class="btn btn-icon btn-pill btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-check"></i></button>
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
        <script src="js/Categoria/Categoria.js"></script>
        <script type="text/javascript">

                                                    function enviar(id) {
                                                        ModificarLlenarCat(id);
                                                    }

        </script>
        <script>
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

    </body>
</html>