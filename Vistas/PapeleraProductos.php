<?php
require_once '../DAO/ProductoDAO.php';
session_start();
$ProductoDAO = new ProductoDAO();
$id_Empresa = $_SESSION["id_Empresa"];
$val = $ProductoDAO->ListaProductosEliminados($id_Empresa);
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
            <div class="d-flex">
                <div class="content p-4">

                    <div class="card mb-4">
                        <div class="card-body">
                            <div style="text-align: center">
                                <h1 class="mb-4">PRODUCTOS ELIMINADOS</h1>
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
                                        <th class="actions">Opcion</th>
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
                                            <td>
                                                <button onclick="RestaurarProducto(<?php echo $_SESSION["id_Usuario"]; ?>,<?php echo $dataproducto->id_Producto ?>);" href="#" class="btn btn-icon btn-pill btn-success" data-toggle="tooltip" title="Restaurar"><i class="fa fa-fw fa-refresh "></i>Restaurar</button>
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
            <script src="js/Producto/PapeleraProductos.js"></script>

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