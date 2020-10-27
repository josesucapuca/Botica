<?php
require_once '../DAO/ProductoPresentacionDAO.php';
require_once '../DAO/ProductoDAO.php';
require_once '../DAO/PresentacionDAO.php';
session_start();
$ProductoPresentacionDAO = new ProductoPresentacionDAO();
$ProductoDAO = new ProductoDAO();
$PresentacionDAO = new PresentacionDAO();
$id_Empresa = $_SESSION["id_Empresa"];
$val = $ProductoPresentacionDAO->ListarProductoPresentacionByEmpresa($id_Empresa);
$Pro = $ProductoDAO->SelectProducto($id_Empresa);
$Pre = $PresentacionDAO->ListarPresentacionDAO($id_Empresa);

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
            <link rel="stylesheet" href="css/chosen.min.css">
            <style>
                .chosen-single{
                    display: block;
                    width: 100%;
                    padding: .375rem .75rem;
                    font-size: 1rem;
                    line-height: 1.5;
                    color: #495057;
                    background-color: #fff;
                    background-clip: padding-box;
                    border: 1px solid #ced4da;
                    border-radius: .25rem;
                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                    height: auto !important;

                }
                #Producto_chosen{
                    width: 100% !important;
                }
                #Presentacion_chosen{
                    width: 100% !important;
                }
                .bor0{
                    border-radius: 0px;
                }
            </style>
            <title>Datatables | BootAdmin</title>
        </head>
        <body class="bg-light">
            <div class="modal fade bd-example-modal-lg" id="ModalIngresarProductoPresentacion" tabindex="-1" role="dialog" aria-labelledby="ModalIngresarProductoPresentacionTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Asignar Precio de Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormIngresarProdPresentacion" >
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Producto</label><br>
                                        <select class="form-control chosen" name="Producto" id="Producto" required="">
                                            <option value="">Seleccionar</option>
                                            <?php
                                            while ($dataprod = $Pro->fetch_object()) {
                                                ?>
                                                <option value="<?php echo $dataprod->id_Producto ?>"><?php echo $dataprod->No_Producto ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <div id="ProValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProInValid" class="invalid-feedback" style="display: none">
                                            Seleccionar Producto
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Presentacion</label><br>
                                        <select class="form-control" name="Presentacion" id="Presentacion" required="">
                                            <option value="">Seleccionar</option>
                                            <?php
                                            while ($datapre = $Pre->fetch_object()) {
                                                ?>
                                                <option value="<?php echo $datapre->id_Presentacion ?>"><?php echo $datapre->No_Presentacion ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <div id="PreValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PreInValid" class="invalid-feedback" style="display: none">
                                            Seleccionar Presentacion
                                        </div>
                                    </div>
                                    <input type="hidden" name="opc" value="IngresarProductoPresentacion">
                                    <input type="hidden" name="Usuariocreacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Precio Compra</label>
                                        <input name="PrecioCompra" type="number" step="any" class="form-control" id="PrecioCompra" placeholder="0.0" required="" maxlength="100">
                                        <div id="PCValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PCInValid" class="invalid-feedback" style="display: none">
                                            Ingresar Precio Compra
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Precio Venta</label>
                                        <input name="PrecioVenta" type="number" step="any" class="form-control" id="PrecioVenta" placeholder="0.0" required="" maxlength="100">
                                        <div id="PVValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PVInValid" class="invalid-feedback" style="display: none">
                                            Ingresar Precio Venta
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Cantidad de Unidades</label>
                                        <input name="CantidadUnidades" type="number" class="form-control" id="CantidadUnidades" placeholder="0" required="" maxlength="100">
                                        <div id="CUValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CUInValid" class="invalid-feedback" style="display: none">
                                            Ingresar Cantidad de Unidades
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button id="btn_Enviar" type="button" class="btn btn-success">Ingresar Asignación</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="ModalModificarProductoPresentacion" tabindex="-1" role="dialog" aria-labelledby="ModalModificarProductoTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modificar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body modal-body">
                            <form id="FormModificarProdPres" name="FormModificarProductoPresentacion" action="../Controlador/Producto.php">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Producto</label>
                                        <select class="form-control " name="ProductoMod" id="ProductoMod" required="" disabled="true">
                                            <option value="">Seleccionar</option>
                                        </select>
                                        <div id="ProModValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProModInValid" class="invalid-feedback" style="display: none">
                                            Seleccionar Producto
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Presentacion</label>
                                        <select class="form-control " name="PresentacionMod" id="PresentacionMod" required="" disabled="true">
                                            <option value="">Seleccionar</option>

                                        </select>
                                        <div id="PreModValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PreModInValid" class="invalid-feedback" style="display: none">
                                            Seleccionar Presentacion
                                        </div>
                                    </div>
                                    <input type="hidden" name="opc" value="ModificarProductoPresentacion">
                                    <input type="hidden" name="idProductoPresentacion" value="" id="idProductoPresentacion">
                                    <input type="hidden" name="UsuarioModificacion" value="<?php echo $_SESSION["id_Usuario"]; ?>">
                                </div>
                                <div class="form-row">

                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Precio Compra</label>
                                        <input name="PrecioCompraMod" type="number" step="any" class="form-control" id="PrecioCompraMod" placeholder="Precio Compra" required="" maxlength="100">
                                        <div id="PCModValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PCModInValid" class="invalid-feedback" style="display: none">
                                            Ingresar Precio Compra
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Precio Venta</label>
                                        <input name="PrecioVentaMod" type="number" step="any" class="form-control" id="PrecioVentaMod" placeholder="Precio Venta" required="" maxlength="100" >
                                        <div id="PVModValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PVModInValid" class="invalid-feedback" style="display: none">
                                            Ingresar Precio Venta
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Cantidad de Unidades</label>
                                        <input name="CantidadUnidadesMod" type="number" class="form-control" id="CantidadUnidadesMod" placeholder="Cantidad Unidades" required="" maxlength="100" >
                                        <div id="CUModValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CUModInValid" class="invalid-feedback" style="display: none">
                                            Ingresar Cantidad de Unidades
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="btn_Modificar" type="button" class="btn btn-success">Modificar Asignacion</button>
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
                                <tr><td><strong>Usuario Creacion</strong></td><td id="Usu_Creacion"></td></tr>
                                <tr><td><strong>Usuario de <br>Ultima Modificación</strong></td><td id="Usu_Mod"></td></tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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
                                <button type="button" class="btn btn-success btn-lg btn-block" style="border: solid 2px #28a745" data-toggle="modal" data-target="#ModalIngresarProductoPresentacion">Asignar Precios</button>
                            </div>
                        </div>
                        <div class="card-body" style="padding-top: 0px;">
                            <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                                <thead>
                                    <tr>
                                        <th style="max-width: 30px;text-align: top;">Nro.</th>
                                        <th>Producto</th>
                                        <th>Presentacion</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                        <th>Cant. de <br>Unidades</th>
                                        <th class="actions" style="text-align: right">Opciones</th>
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
                                            <td class="<?php
                                            if ($dataproducto->Es_Producto === "1") {
                                                echo "alert alert-success";
                                            } else {
                                                echo "alert alert-danger";
                                            }
                                            ?> bor0"><?php echo $dataproducto->No_Producto ?></td>
                                            <td class="<?php
                                            if ($dataproducto->Es_Presentacion === "1") {
                                                echo "alert alert-success";
                                            } else {
                                                echo "alert alert-danger";
                                            }
                                            ?> bor0"><?php echo $dataproducto->No_Presentacion ?></td>
                                            <td><?php echo $dataproducto->Precio_Compra ?></td>
                                            <td><?php echo $dataproducto->Precio_Venta ?></td>
                                            <td><?php echo $dataproducto->Cant_Unidades ?></td>

                                            <td style="text-align: right">
                                                <button onclick="LMDPP(<?php echo $dataproducto->id_Producto_Presentacion ?>)" class="btn btn-icon btn-pill btn-primary"  data-toggle="modal" data-target="#ModalModificarProductoPresentacion" title="Editar"><i class="fa fa-fw fa-edit"></i></button>
                                                <button onclick="EliminarProductoPresentacion(<?php echo $_SESSION["id_Usuario"]; ?>,<?php echo $dataproducto->id_Producto_Presentacion ?>);" class="btn btn-icon btn-pill btn-dark" data-toggle="tooltip" title="Eliminar"><i class="fa fa-fw fa-trash-o "></i></button>

                                            </td>
                                            <td><button onclick="LlDM(<?php echo $dataproducto->id_Producto_Presentacion ?>)"  title="Detalle de Producto" class="btn btn-icon btn-pill btn-danger" data-toggle="modal" data-target="#ModalInformacionProducto" style="color: white;"><i class="fa fa-fw fa-list"></i></button>
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
            <script src="js/Producto/ProductoPresentacion.js"></script>
            <script src="js/chosen.jquery.min.js"></script>
            <script type="text/javascript">

                                            $("#Producto").chosen();
                                            $("#Presentacion").chosen();

            </script>
            <script>
                $(document).ready(function () {
                    ListaProductos(<?php echo $_SESSION["id_Empresa"] ?>);
                    ListaPresentacion(<?php echo $_SESSION["id_Empresa"] ?>);
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
        </body>
    </html>
    <?php
} else {
    ?><script type="text/javascript">
            location.href = "VistaLogueo.php"
    </script><?php
}
?>