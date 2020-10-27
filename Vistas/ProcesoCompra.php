<?php
require_once '../DAO/ProductoDAO.php';
require_once '../DAO/ProveedorDAO.php';
session_start();
$ProductoDAO = new ProductoDAO();
$Producto = $ProductoDAO->ListaProductoProcCompByEmpresa($_SESSION["id_Empresa"]);
$ProveedorDAO = new ProveedorDAO();
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
                @media (max-width: 768px) {
                    .relleno {
                        display: none;
                    }
                    .titTot {
                        width: 80% !important;
                    }
                    .valTot {
                        width: 20% !important;
                    }
                }
            </style>
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
            <div class="content" style="mar">
                <div class="card-body" style="padding-bottom: 0px !important;">
                    <div style="text-align: center">
                        <h1 class="mb-4">Compra de Productos</h1>
                    </div>
                    <div class="form-row" style="border: dashed 1px green;border-radius: 10px;margin-bottom: 10px;padding: 10px 0px 0px 0px;">
                        <div class="col-md-5 mb-3">
                            <label for="validationServer01">Proveedor</label><br>
                            <select class="form-control" name="Proveedor" id="Proveedor" required="" style="background: white">
                                <option value="">SELECCIONAR</option>
                                <?php while ($dataProveedor = $Proveedor->fetch_object()) {
                                    ?>
                                    <option value="<?php echo $dataProveedor->id_Proveedor ?>"><?php echo $dataProveedor->No_Proveedor ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <div id="ProvValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="ProvInValid" class="invalid-feedback" style="display: none">
                                Seleccionar Proveedor
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="validationServer01">Local</label>
                            <select class="form-control" name="Local" id="Local" required="" style="background: white">
                                <option value="">Seleccionar</option>
                            </select>
                            <div id="LocValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="LocInValid" class="invalid-feedback" style="display: none">
                                Seleccionar Local
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Estado de Compra</label>
                            <select class="form-control" name="EstadoCompra" id="EstadoCompra" required="" style="background: white">
                                <option value="">Seleccionar</option>
                                <option class="alert alert-success" value="1">Pagado</option>
                                <option class="alert alert-danger" value="0">Por Pagar</option>
                            </select>
                            <div id="EsCValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="EsCInValid" class="invalid-feedback" style="display: none">
                                Selecionar Estado
                            </div>
                        </div>
                        <input type="hidden" id="UsuarioCreacion" value="<?php echo $_SESSION["id_Usuario"] ?>">

                    </div>
                    <div class="form-row" style="
                         border: dashed 1px green;
                         border-radius: 10px;
                         margin-bottom: 10px;
                         padding: 10px 0px 0px 0px;
                         ">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Producto</label><br>
                            <select class="chosen form-control" name="Producto" id="Producto" required="" style="background: white">
                                <option value="">SELECCIONAR</option>
                                <?php while ($dataProducto = $Producto->fetch_object()) {
                                    ?>
                                    <option value="<?php echo $dataProducto->id_Producto ?>"><?php echo $dataProducto->No_Producto ?>--<?php echo $dataProducto->No_Categoria ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <div id="Stock" class="valid-feedback" style="display: none">
                                <table>
                                    <tr><td style="font-weight: 600;">Stock:  </td><td id="NroStock" style="font-weight: 600;"></td></tr>
                                </table>
                            </div>
                            <div id="ProInValid" class="invalid-feedback" style="display: none">
                                Seleccionar Producto
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Presentación</label>
                            <select class="form-control" name="Presentacion" id="Presentacion" required="" style="background: white">
                                <option value="">Seleccionar</option>
                            </select>
                            <div id="PresValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="PresInValid" class="invalid-feedback" style="display: none">
                                Seleccionar Presentación
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Fecha Vencimiento</label>
                            <input class="form-control" type="date"   name="FeVenc" placeholder="0" id="FeVenc">
                            <div id="FeVencValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="FeVencInValid" class="invalid-feedback" style="display: none">
                                Invalido
                            </div>
                        </div>
                        <div class="col-md-1 mb-3">
                            <label for="validationServer01">Cantidad</label>
                            <input min="0" class="form-control" type="number"   name="cantidad" placeholder="0" id="cantidad">
                            <div id="CantValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="CantInValid" class="invalid-feedback" style="display: none">
                                Invalido
                            </div>
                        </div>
                        <div class="col-md-1 mb-3">
                            <label for="validationServer01">Precio</label>
                            <input  min="0"  class="form-control" type="number"   step="any"   name="precio" placeholder="0.0" id="precio">
                            <div id="PrecValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="PrecInValid" class="invalid-feedback" style="display: none">
                                Invalido
                            </div>
                        </div>

                        <div class="col-md-12 form-row">
                            <div class="col-md-4 mb-3 relleno">
                            </div>
                            <div class="col-md-4 mb-4">
                                <button class="form-control btn-lg  btn-success" style="margin-top: 10px;" id="btn_Agregar">Agregar Producto</button>
                            </div>
                            <div class="col-md-4 mb-3 relleno">
                            </div>
                        </div>
                    </div>

                </div>           
            </div>

            <div class="d-flex">
                <div class="content p-3" style="padding-top: 0px !important;">

                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                                <thead>
                                    <tr>
                                        <th style="max-width: 30px;">Nro.</th>
                                        <th >id.</th>
                                        <th>Producto</th>
                                        <th>Presentación Producto</th>
                                        <th>cantidad</th>
                                        <th>Fecha Vencimiento</th>
                                        <th>Precio Unitario</th>
                                        <th>Precio Total</th>
                                    </tr>
                                </thead>
                                <tbody id="listaCompra">
                                </tbody>
                            </table>
                            <table class="table alert-info" style="margin-bottom: 0px;">
                                <tr>
                                    <td class="titTot" style="text-align: left;width: 90%;"><strong>Precio Total</strong></td>
                                    <td class="valTot" style="text-align: right;width: 10%;" ><input class="form-control" type="number" step="any" id="CantTotal" disabled="" value="0" style="text-align: right;"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-row">
                                <div class="col-md-5 mb-3 relleno">
                                </div>
                                <div class="col-md-2 mb-4">
                                    <button class="form-control btn-block  btn-primary" style="margin-top: 10px;" id="btn_Registrar_Compra">Registrar Compra</button>
                                </div>
                                <div class="col-md-5 mb-3 relleno">
                                </div>
                            </div>
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
            <script src="js/Compra/ProcCompra.js"></script>
            <script src="js/chosen.jquery.min.js"></script>
            <script type="text/javascript">

                $(".chosen").chosen();
                $("#Proveedor").chosen();

            </script>
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
                $(document).ready(function () {

                    ListarLocalProCom(<?php echo $_SESSION["id_Empresa"] ?>);
                    $("#Producto").chosen().change(function () {
                        ListarPresentacion($("#Producto").val());
                        $("#ProInValid").css("display", "none");
                    });
                });
            </script>

        </body>
    </html>    <?php
} else {
    ?><script type="text/javascript">
            location.href = "VistaLogueo.php"
    </script><?php
}
?>