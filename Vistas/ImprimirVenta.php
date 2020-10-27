<?php
require_once '../DAO/VentaDAO.php';
$idVenta = $_GET["id"];
session_start();
$VentaDAO = new VentaDAO();
$Venta = $VentaDAO->ListaVentaById($idVenta);
$DetVenta = $VentaDAO->ListaDetalleVentaById($idVenta);

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
                    .titPro {
                        width: 100% !important;
                    }
                    .Prov {
                        width: 100% !important;
                    }
                    .cannro{
                        width: 10%;
                    }
                }
            </style>
            <title>Detalle de Compra | BioFarma</title>
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
            <?php while ($dataVenta = $Venta->fetch_object()) { ?>
                <div class="content" style="mar">
                    <div class="card-body" style="padding-bottom: 0px !important;">
                        <div style="text-align: center">
                            <h1 class="mb-4">
                                <?php
                                if ($dataVenta->Ti_Venta === "1") {
                                    echo 'BOLETA';
                                } if ($dataVenta->Ti_Venta === "2") {
                                    echo 'FACTURA';
                                }
                                ?></h1>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table table-active alert-success " style="margin-bottom: 0px;">
                                    <?php if ($dataVenta->Ti_Venta === "1") {?>
                                        <tr>
                                            <td class="titPro" style="text-align: left;width: 20% !important;" colspan="1"><strong>Nro de Comprobante: </strong></td>
                                            <td class="Prov" style="text-align: left;width: 30% !important; background-color: #ced4da;font-size: 20px;"><?php echo $dataVenta->id_Venta ?></td>
                                            <td class="titPro" style="text-align: left;width: 20% !important;" colspan="1"><strong>CLIENTE : </strong></td>
                                            <td class="Prov" style="text-align: left;width: 30% !important; background-color: #ced4da;font-size: 20px;"><?php echo $dataVenta->No_Cliente . " " . $dataVenta->Ape_Cliente ?></td>
                                        </tr>
                                    <?php } else {?>
                                        <tr>
                                            <td class="titPro" style="text-align: left;width: 10% !important;" colspan="1"><strong>Nro de Comprobante: </strong></td>
                                            <td class="Prov" style="text-align: left;width: 20% !important; background-color: #ced4da;font-size: 20px;"><?php echo $dataVenta->id_Venta ?></td>
                                            <td class="titPro" style="text-align: left;width: 10% !important;" colspan="1"><strong>Empresa : </strong></td>
                                            <td class="Prov" style="text-align: left;width: 25% !important; background-color: #ced4da;font-size: 20px;"><?php echo $dataVenta->No_Cliente ?></td>
                                            <td class="titPro" style="text-align: left;width: 10% !important;" colspan="1"><strong>RUC : </strong></td>
                                            <td class="Prov" style="text-align: left;width: 25% !important; background-color: #ced4da;font-size: 20px;"><?php echo $dataVenta->RUC ?></td>
                                        </tr>
                                    <?php }?>
                                    <tr>
                                        <td class="titPro" style="text-align: left;width: 20% !important;" colspan="1"><strong>Local : </strong></td>
                                        <td class="Prov" style="text-align: left;width: 30% !important;background-color: #ced4da;font-size: 20px;" ><?php echo $dataVenta->No_Local ?></td>
                                        <td class="titPro" style="text-align: left;width: 20% !important;" colspan="1"><strong>Fecha : </strong></td>
                                        <td class="Prov" style="text-align: left;width: 30% !important;background-color: #ced4da;font-size: 20px;text-align: center" colspan="3"><?php echo $dataVenta->Fe_Venta ?></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-hover" cellspacing="0" width="100%" style="border: solid 1px #b9bbbe;width: 100%;border-radius: 10px;">
                                    <thead>
                                        <tr>
                                            <th class="cannro" style="max-width: 30px;">Nro.</th>
                                            <th>Producto</th>
                                            <th>Presentación Producto</th>
                                            <th>cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Precio Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        while ($dataDetalleVenta = $DetVenta->fetch_object()) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $dataDetalleVenta->No_Producto ?></td>
                                                <td><?php echo $dataDetalleVenta->No_Presentacion ?></td>
                                                <td><?php echo $dataDetalleVenta->Cant_Producto ?></td>
                                                <td><?php echo $dataDetalleVenta->Precio_Producto ?></td>
                                                <td><?php echo $dataDetalleVenta->Precio_Total ?></td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>

                                </table>
                                <table class="table alert-info" style="margin-bottom: 0px;">
                                    <tr>
                                        <td class="titTot" style="text-align: left;width: 80%;" style="" colspan="5"><strong>Precio Total</strong></td>
                                        <td class="valTot" style="text-align: right;width: 20%;background: #b9bbbe"><?php echo $dataVenta->Total_Venta ?></td>
                                    </tr>
                                </table>

                            </div>
                            <div class="form-row">
                                <div class="col-md-12 form-row">
                                    <div class="col-md-5 mb-3 relleno">
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <button  class="form-control btn-block  btn-primary" style="margin-top: 10px;" id="btn_Imprimir"><i class="fa fa-print"></i>Imprimir ticket</button>
                                    </div>
                                    <div class="col-md-5 mb-3 relleno">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>           
                </div>
            <?php } ?>

            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/datatables.min.js"></script>
            <script src="js/moment.min.js"></script>
            <script src="js/fullcalendar.min.js"></script>
            <script src="js/bootadmin.min.js"></script>
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
                    $("#btn_Imprimir").click(function () {
                        location.href = "ModeloImpresionVenta.php?id=<?php echo $idVenta; ?>"
                    });
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