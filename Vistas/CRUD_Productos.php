<?php
require_once '../DAO/ProductoDAO.php';

$ProductoDAO = new ProductoDAO();
$val = $ProductoDAO->SelectProducto();
session_start();
if ($_SESSION["Usuario"] !== null) {
    ?>
    <!doctype html>
    <html >
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
        <body class="bg-light">
            <div class="modal fade bd-example-modal-lg" id="ModalIngresarProducto" tabindex="-1" role="dialog" aria-labelledby="ModalIngresarProductoTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
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
                                    <div class="col-md-6 mb-3">
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
                                        <label for="validationServer01">Presentacion</label>
                                        <select class="form-control " name="Presentacion" id="Presentacion" required="">
                                            <option value="">Seleccionar</option>


                                        </select>
                                        <div id="PresValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PresInValid" class="invalid-feedback" style="display: none">
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
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer04">Precio de Compra de Producto</label>
                                        <input name="PrecioCompra" type="number" step="any" class="form-control" id="PrecioCompra" placeholder="0.0" required>
                                        <div id="PCValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PCInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer05">Precio de  Venta Producto</label>
                                        <input name="PrecioVenta" type="number" step="any" class="form-control" id="PrecioVenta" placeholder="0.0" required>
                                        <div id="PVValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PVInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer04">Precio de Pres. Compra</label>
                                        <input name="PrecioCompraPresentacion" type="number" step="any" class="form-control" id="PrecioPresCompra" placeholder="0.0" required>
                                        <div id="PPCValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PPCInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer05">Precio de Pres. Venta</label>
                                        <input name="PrecioVentaPresentacion" type="number" step="any" class="form-control" id="PrecioPresVenta" placeholder="0.0" required>
                                        <div id="PPVValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PPVInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="btn_Enviar" type="button" class="btn btn-success">Agregar Producto</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="ModalModificarProducto" tabindex="-1" role="dialog" aria-labelledby="ModalModificarProductoTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
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
                                        <div id="ProValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="ProInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Estado</label>
                                        <select class="form-control " name="Estado_ProductoMod" id="EstadoMod" required="">
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
                                        <div id="CatValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="CatInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Presentacion</label>
                                        <select class="form-control " name="PresentacionMod" id="PresentacionMod" required="">
                                            <option value="">Seleccionar</option>


                                        </select>
                                        <div id="PresValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PresInValid" class="invalid-feedback" style="display: none">
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
                                        <label for="validationServer01">Proveedor</label>
                                        <select class="form-control " name="ProveedorMod" id="ProveedorMod" required="">
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
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer04">Precio de Compra</label>
                                        <input name="PrecioCompraMod" type="number" step="any" class="form-control" id="PrecioCompraMod" placeholder="0.0" required>
                                        <div id="PCValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PCInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer05">Precio de  Venta Producto</label>
                                        <input name="PrecioVentaMod" type="number" step="any" class="form-control" id="PrecioVentaMod" placeholder="0.0" required>
                                        <div id="PVValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PVInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer04">Precio de Pres. Compra</label>
                                        <input name="PrecioCompraPresentacionMod" type="number" step="any" class="form-control" id="PrecioPresCompraMod" placeholder="0.0" required>
                                        <div id="PPCValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PPCInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer05">Precio de Pres. Venta</label>
                                        <input name="PrecioVentaPresentacionMod" type="number" step="any" class="form-control" id="PrecioPresVentaMod" placeholder="0.0" required>
                                        <div id="PPVValid" class="valid-feedback" style="display: none">
                                            Valido
                                        </div>
                                        <div id="PPVInValid" class="invalid-feedback" style="display: none">
                                            Invalido
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="btn_Modificar" type="button" class="btn btn-success">Modificar Producto</button>
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
                                <tr><td><strong>Fecha de Creacion</strong></td><td id="Fecha_Creacion">sa</td></tr>
                                <tr><td><strong>Usuario de <br>Ultima Modificación</strong></td><td id="Usu_Mod">sa</td></tr>
                                <tr><td><strong>Fecha de <br>Ultima Modificación</strong></td><td id="Fe_Mod">sa</td></tr>
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
                    <div style="text-align: center">
                        <h1 class="mb-4">PRODUCTOS</h1>
                    </div>

                    <div class="card mb-4">
                        <div class="content">
                            <button type="button" class="btn btn-success btn-lg btn-block" style="border: solid 2px #28a745" data-toggle="modal" data-target="#ModalIngresarProducto">Ingresar Nuevo Producto</button>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                                <thead>
                                    <tr>
                                        <th style="max-width: 30px;text-align: top;">Cod. <br>Prod</th>
                                        <th>Producto</th>
                                        <th>Categoría</th>
                                        <th>Presentación</th>
                                        <th>Prec. <br>Unit Com</th>
                                        <th>Prec. <br>Unit Ven</th>
                                        <th>Prec. <br>Pres Com</th>
                                        <th>Prec. <br>Pres Ven</th>
                                        <th>Local</th>
                                        <th>Proveedor</th>
                                        <th>Estado</th>
                                        <th class="actions">Opciones</th>
                                        <th class="actions">Det. Prod</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($dataproducto = $val->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td ><?php echo $dataproducto->id_Producto ?></td>
                                            <td><?php echo $dataproducto->No_Producto ?></td>
                                            <?php if ($dataproducto->Es_Categoria === "1") { ?>
                                                <td class="alert alert-success" ><?php echo $dataproducto->No_Categoria ?></td>
                                            <?php } else { ?>
                                                <td class="alert alert-danger" style=" border-radius: 0px; "><?php echo $dataproducto->No_Categoria ?></td>
                                            <?php } ?>

                                            <?php if ($dataproducto->es_Presentacion === "1") { ?>
                                                <td class="alert alert-success" style=" border-radius: 0px; "><?php echo $dataproducto->no_Presentacion ?></td>
                                            <?php } else { ?>
                                                <td class="alert alert-danger" style=" border-radius: 0px; "><?php echo $dataproducto->no_Presentacion ?></td>
                                            <?php } ?>
                                            <td><?php echo $dataproducto->Precio_Compra ?></td>
                                            <td><?php echo $dataproducto->Precio_Venta ?></td>
                                            <td><?php echo $dataproducto->Precio_Compra_Presentacion ?></td>
                                            <td><?php echo $dataproducto->Precio_Venta_Presentacion ?></td>
                                            <?php if ($dataproducto->Es_Local === "1") { ?>
                                                <td class="alert alert-success" style=" border-radius: 0px; "><?php echo $dataproducto->No_local ?></td>
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
                                                    if ($dataproducto->Es_Producto == 1) {
                                                        echo "Activo";
                                                    } else {
                                                        echo 'Desactivo';
                                                    }
                                                    ?></td>
                                            <td>
                                                <button onclick="LlenarDat(<?php echo $dataproducto->id_Producto ?>)" class="btn btn-icon btn-pill btn-primary"  data-toggle="modal" data-target="#ModalModificarProducto"><i class="fa fa-fw fa-edit"></i></button>
                                                <?php
                                                if ($dataproducto->Es_Producto == 1) {
                                                    ?>
                                                    <button onclick="DesactivarProducto(<?php echo $_SESSION["id_Usuario"]; ?>,<?php echo $dataproducto->id_Producto ?>);" href="#" class="btn btn-icon btn-pill btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash-alt"></i></button>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <button onclick="ActivarProducto(<?php echo $_SESSION["id_Usuario"]; ?>,<?php echo $dataproducto->id_Producto ?>);" href="#" class="btn btn-icon btn-pill btn-success" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-check"></i></button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><button onclick="DatProd(<?php echo $dataproducto->id_Producto ?>)"  class="btn btn-icon btn-pill btn-danger" data-toggle="modal" data-target="#ModalInformacionProducto" style="color: white"><i class="fa fa-fw fa-list"></i></button>
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

            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <script>
                                                (adsbygoogle = window.adsbygoogle || []).push({
                                                    google_ad_client: "ca-pub-4097235499795154",
                                                    enable_page_level_ads: true
                                                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#btn_Enviar").click(function () {
                        Validara();
                    });


                });
                function Validara() {
                    var Prod = $("#Producto");
                    var Est = $("#Estado");
                    var Cat = $("#Categoria");
                    var Pres = $("#Presentacion");
                    var Loc = $("#Local");
                    var Prov = $("#Proveedor");
                    var PreC = $("#PrecioCompra");
                    var PreV = $("#PrecioVenta");
                    var PrePreC = $("#PrecioPresCompra");
                    var PrePreV = $("#PrecioPresVenta");
                    if (Prod.val() !== "" &&
                            Est.val() !== "" &&
                            Cat.val() !== "" &&
                            Pres.val() !== "" &&
                            Loc.val() !== "" &&
                            Prov.val() !== "" &&
                            PreC.val() !== "" &&
                            PreV.val() !== "" &&
                            PrePreC.val() !== "" &&
                            PrePreV.val() !== "") {
                        InsertarProducto();
                    } else {
                        if (Prod.val() !== "") {
                            document.getElementById("Producto").className = "form-control is-valid";
                            document.getElementById("ProValid").style = "display:block;";
                            document.getElementById("ProInValid").style = "display:none;";
                        } else {
                            document.getElementById("Producto").className = "form-control is-invalid";
                            document.getElementById("ProValid").style = "display:none;";
                            document.getElementById("ProInValid").style = "display:block;";
                        }
                        if (Est.val() !== "") {
                            document.getElementById("Estado").className = "form-control is-valid";
                            document.getElementById("EsValid").style = "display:block;";
                            document.getElementById("EsInValid").style = "display:none;";
                        } else {
                            document.getElementById("Estado").className = "form-control is-invalid";
                            document.getElementById("EsValid").style = "display:none;";
                            document.getElementById("EsInValid").style = "display:block;";
                        }
                        if (Cat.val() !== "") {
                            document.getElementById("Categoria").className = "form-control is-valid";
                            document.getElementById("CatValid").style = "display:block;";
                            document.getElementById("CatInValid").style = "display:none;";
                        } else {
                            document.getElementById("Categoria").className = "form-control is-invalid";
                            document.getElementById("CatValid").style = "display:none;";
                            document.getElementById("CatInValid").style = "display:block;";
                        }
                        if (Pres.val() !== "") {
                            document.getElementById("Presentacion").className = "form-control is-valid";
                            document.getElementById("PresValid").style = "display:block;";
                            document.getElementById("PresInValid").style = "display:none;";
                        } else {
                            document.getElementById("Presentacion").className = "form-control is-invalid";
                            document.getElementById("PresValid").style = "display:none;";
                            document.getElementById("PresInValid").style = "display:block;";
                        }
                        if (Loc.val() !== "") {
                            document.getElementById("Local").className = "form-control is-valid";
                            document.getElementById("LocValid").style = "display:block;";
                            document.getElementById("LocInValid").style = "display:none;";
                        } else {
                            document.getElementById("Local").className = "form-control is-invalid";
                            document.getElementById("LocValid").style = "display:none;";
                            document.getElementById("LocInValid").style = "display:block;";
                        }
                        if (Prov.val() !== "") {
                            document.getElementById("Proveedor").className = "form-control is-valid";
                            document.getElementById("ProvValid").style = "display:block;";
                            document.getElementById("ProvInValid").style = "display:none;";
                        } else {
                            document.getElementById("Proveedor").className = "form-control is-invalid";
                            document.getElementById("ProvValid").style = "display:none;";
                            document.getElementById("ProvInValid").style = "display:block;";
                        }
                        if (PreC.val() !== "") {
                            document.getElementById("PrecioCompra").className = "form-control is-valid";
                            document.getElementById("PCValid").style = "display:block;";
                            document.getElementById("PCInValid").style = "display:none;";
                        } else {
                            document.getElementById("PrecioCompra").className = "form-control is-invalid";
                            document.getElementById("PCValid").style = "display:none;";
                            document.getElementById("PCInValid").style = "display:block;";
                        }
                        if (PreV.val() !== "") {
                            document.getElementById("PrecioVenta").className = "form-control is-valid";
                            document.getElementById("PVValid").style = "display:block;";
                            document.getElementById("PVInValid").style = "display:none;";
                        } else {
                            document.getElementById("PrecioVenta").className = "form-control is-invalid";
                            document.getElementById("PVValid").style = "display:none;";
                            document.getElementById("PVInValid").style = "display:block;";
                        }
                        if (PrePreC.val() !== "") {
                            document.getElementById("PrecioPresCompra").className = "form-control is-valid";
                            document.getElementById("PPCValid").style = "display:block;";
                            document.getElementById("PPCInValid").style = "display:none;";
                        } else {
                            document.getElementById("PrecioPresCompra").className = "form-control is-invalid";
                            document.getElementById("PPCValid").style = "display:none;";
                            document.getElementById("PPCInValid").style = "display:block;";
                        }
                        if (PrePreV.val() !== "") {
                            document.getElementById("PrecioPresVenta").className = "form-control is-valid";
                            document.getElementById("PPVValid").style = "display:block;";
                            document.getElementById("PPVInValid").style = "display:none;";
                        } else {
                            document.getElementById("PrecioPresVenta").className = "form-control is-invalid";
                            document.getElementById("PPVValid").style = "display:none;";
                            document.getElementById("PPVInValid").style = "display:block;";
                        }
                    }

                }
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