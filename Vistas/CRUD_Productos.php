<?php
require_once '../DAO/ProductoDAO.php';
session_start();
$ProductoDAO = new ProductoDAO();
$id_Empresa = $_SESSION["id_Empresa"];
$val = $ProductoDAO->SelectProducto($id_Empresa);
if ($_SESSION["Usuario"] !== null) {
    ?>
    <!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">
            <link rel="stylesheet" href="css/datatables.min.css">
            <link rel="stylesheet" href="css/fullcalendar.min.css">
            <link rel="stylesheet" href="css/bootadmin.min.css">
            <title>Datatables | BootAdmin</title>
        </head>
        <body class="bg-light">
            <div class="modal fade bd-example-modal-lg" id="ModalIngresarProducto" tabindex="-1" role="dialog" aria-labelledby="ModalIngresarProductoTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ingresar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormIngresarProd" name="FormIngresarProducto" action="../Controlador/Producto.php">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01" >Producto</label>
                                        <input name="Producto" type="text" class="form-control" id="Producto" placeholder="Producto" required="" maxlength="100">
                                        <div id="ProValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Estado</label>
                                        <select class="form-control " name="Estado_Producto" id="Estado" required="">
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
                                    <input type="hidden" name="opc" value="IngresarProducto">
                                    <input type="hidden" name="Usuariocreacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">


                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Categoria</label>
                                        <select class="form-control " name="Categoria" id="Categoria" required="">
                                            <option value="">Seleccionar</option>


                                        </select>
                                        <div id="CatValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CatInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Proveedor</label>
                                        <select class="form-control " name=Proveedor id="Proveedor" required="">
                                            <option value="">Seleccionar</option>
                                        </select>
                                        <div id="ProvValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProvInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button id="btn_Enviar" type="button" class="btn btn-success">Agregar Producto</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="ModalModificarProducto" tabindex="-1" role="dialog" aria-labelledby="ModalModificarProductoTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modificar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormModificarProd" name="FormIngresarProducto" action="../Controlador/Producto.php">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Producto</label>
                                        <input name="ProductoMod" type="text" class="form-control" id="ProductoMod" placeholder="Producto" required="" maxlength="100">
                                        <div id="ProMValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProMInValid" class="invalid-feedback" style="display: none">
                                            Ingresar Producto
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Estado</label>
                                        <select class="form-control " name="Estado_ProductoMod" id="EstadoMod" required="">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Desativo</option>
                                        </select>
                                        <div id="EsMValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="EsMInValid" class="invalid-feedback" style="display: none">
                                            Seleccionar Estado
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01">Local</label>
                                        <select class="form-control" name="LocalMod" id="LocalMod" required="">
                                            <option value="">Seleccionar</option>

                                        </select>
                                        <div id="LocMValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="LocMInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <input type="hidden" name="opc" value="ModificarProducto">
                                    <input type="hidden" name="idProducto" value="" id="id_ProductoMod">
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
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Categoria</label>
                                        <select class="form-control " name="CategoriaMod" id="CategoriaMod" required="">
                                            <option value="">Seleccionar</option>


                                        </select>
                                        <div id="CatMValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CatMInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Proveedor</label>
                                        <select class="form-control " name="ProveedorMod" id="ProveedorMod" required="">
                                            <option value="">Seleccionar</option>


                                        </select>
                                        <div id="ProvMValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProvMInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button id="btn_Modificar" type="button" class="btn btn-success">Modificar Producto</button>
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
                                <tr><td><strong>Fecha de Creacion</strong></td><td id="Fecha_Creacion">sa</td></tr>
                                <tr><td><strong>Usuario de <br>Ultima Modificación</strong></td><td id="Usu_Mod">sa</td></tr>
                                <tr><td><strong>Fecha de <br>Ultima Modificación</strong></td><td id="Fe_Mod">sa</td></tr>
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
                                <h1 class="mb-4">PRODUCTOS</h1>
                            </div>
                            <div class="content">
                                <button type="button" class="btn btn-success btn-lg btn-block" style="border: solid 2px #28a745" data-toggle="modal" data-target="#ModalIngresarProducto">Ingresar Nuevo Producto</button>
                            </div>
                        </div>
                        <div class="card-body" style="padding-top: 0px;">
                            <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                                <thead>
                                    <tr>
                                        <th style="max-width: 30px;text-align: top;">Nro.</th>
                                        <th>Producto</th>
                                        <th>Categoría</th>
                                        <th>Local</th>
                                        <th>Proveedor</th>
                                        <th>Estado</th>
                                        <th class="actions">Opciones</th>
                                        <th class="actions">Det. Prod</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($dataproducto = $val->fetch_object()) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $dataproducto->No_Producto ?></td>
                                            <?php if ($dataproducto->Es_Categoria === "1") { ?>
                                                <td class="alert alert-success" ><?php echo $dataproducto->No_Categoria ?></td>
                                            <?php } else { ?>
                                                <td class="alert alert-danger" style=" border-radius: 0px; "><?php echo $dataproducto->No_Categoria ?></td>
                                            <?php } ?>

                                            <?php if ($dataproducto->Es_Local === "1") { ?>
                                                <td class="alert alert-success" style=" border-radius: 0px; "><?php echo $dataproducto->No_Local ?></td>
                                            <?php } else { ?>
                                                <td class="alert alert-danger" style=" border-radius: 0px; "><?php echo $dataproducto->No_local ?></td>
                                            <?php } ?>
                                            <?php if ($dataproducto->Es_Proveedor === "1") { ?>
                                                <td class="alert alert-success" style=" border-radius: 0px; "><?php echo $dataproducto->No_Proveedor ?></td>
                                            <?php } else { ?>
                                                <td class="alert alert-danger" style=" border-radius: 0px; "><?php echo $dataproducto->No_Proveedor ?></td>
                                            <?php } ?> 

                                            <td style=" border-radius:0px; <?php
                                            if ($dataproducto->Es_Producto == 1) {
                                                echo "background-color: #28a745;color: white;";
                                            } else {
                                                echo 'background-color: #ff4747;color: white;';
                                            }
                                            ?>">
                                                    <?php
                                                    if ($dataproducto->Es_Producto == "1") {
                                                        echo "Activo";
                                                    } else if ($dataproducto->Es_Producto === "0") {
                                                        echo 'Desactivo';
                                                    }
                                                    ?></td>
                                            <td>
                                                <button title="Desactivar" onclick="LlenarDat(<?php echo $dataproducto->id_Producto ?>)" class="btn btn-icon btn-pill btn-primary"  data-toggle="modal" data-target="#ModalModificarProducto" title="Desactivar"><i class="fa fa-fw fa-edit"></i></button>
                                                <?php
                                                if ($dataproducto->Es_Producto == "1") {
                                                    ?>
                                                    <button onclick="DesactivarProducto(<?php echo $_SESSION["id_Usuario"]; ?>,<?php echo $dataproducto->id_Producto ?>);" href="#" class="btn btn-icon btn-pill btn-danger" data-toggle="tooltip" title="Desactivar"><i class="fa fa-fw fa-minus"></i></button>
                                                    <?php
                                                } else if ($dataproducto->Es_Producto === "0") {
                                                    ?>
                                                    <button onclick="ActivarProducto(<?php echo $_SESSION["id_Usuario"]; ?>,<?php echo $dataproducto->id_Producto ?>);" href="#" class="btn btn-icon btn-pill btn-success" data-toggle="tooltip" title="Activar"><i class="fa fa-fw fa-check "></i></button>
                                                    <?php
                                                }
                                                ?>
                                                <button onclick="EliminarProducto(<?php echo $_SESSION["id_Usuario"]; ?>,<?php echo $dataproducto->id_Producto ?>);" href="#" class="btn btn-icon btn-pill btn-dark" data-toggle="tooltip" title="Eliminar"><i class="fa fa-fw fa-trash-o "></i></button>

                                            </td>
                                            <td><button onclick="DatProd(<?php echo $dataproducto->id_Producto ?>)"  title="Detalle de Producto" class="btn btn-icon btn-pill btn-danger" data-toggle="modal" data-target="#ModalInformacionProducto" style="color: white;"><i class="fa fa-fw fa-list"></i></button>
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
            <script src="js/Producto/producto.js"></script>

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

            <script>
                (adsbygoogle = window.adsbygoogle || []).push({
                    google_ad_client: "ca-pub-4097235499795154",
                    enable_page_level_ads: true
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    ListarCategoria(<?php echo $_SESSION["id_Empresa"] ?>);
                    ListarLocal(<?php echo $_SESSION["id_Empresa"] ?>);
                    ListarProveedor(<?php echo $_SESSION["id_Empresa"] ?>);
                });
            </script>
        </body>
    </html>
    <?php
} else {
    ?><script type="text/javascript">
            location.href = "VistaLogueo.php"
    </script><?php
}
?>