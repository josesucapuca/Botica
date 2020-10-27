<?php
require_once '../DAO/CompraDAO.php';
$idCompra = $_GET["id"];
session_start();
$CompraDAO = new CompraDAO();
$Compra = $CompraDAO->ListaCompraById($idCompra);
$DetCompra = $CompraDAO->ListaDetalleCompraById($idCompra);

if ($_SESSION["Usuario"] !== null) {
    ?>
    <!DOCTYPE html>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="css/bootadmin.min.css">
    <html>
        <head>
            <script src="script.js"></script>
        </head>
        <style>
            * {
                font-size: 12px;
                font-family: 'Times New Roman';
            }

            td,
            th,
            tr,
            table {
                border-top: 1px solid black;
                border-collapse: collapse;
            }

            td.producto,
            th.producto {
                width: 75px;
                max-width: 75px;
            }

            td.cantidad,
            th.cantidad {
                width: 40px;
                max-width: 40px;
                word-break: break-all;
            }

            td.precio,
            th.precio {
                width: 40px;
                max-width: 40px;
                word-break: break-all;
            }

            .centrado {
                text-align: center;
                align-content: center;
            }

            .ticket {
                width: 155px;
                max-width: 155px;
            }

            img {
                max-width: inherit;
                width: inherit;
            }
            @media print {
                .oculto-impresion,
                .oculto-impresion * {
                    display: none !important;
                }
            }
        </style>
        <body style="text-align: center">
            <div id="ticket" class="ticket">
                <?php while ($dataCompra = $Compra->fetch_object()) { ?>
                    <img
                        src="img/logo.png"
                        alt="Logotipo" style=" filter: grayscale(1);">
                    <p class="centrado" > BioFarma<br></p>
                    <p style="text-align: left"><?php echo $dataCompra->No_Proveedor ?>
                        <br><strong>Fecha:</strong> <?php echo $dataCompra->Fe_Compra ?></p>

                    <table>
                        <thead style="border-top: solid 2px #6a6f6f;border-bottom: solid 2px #6a6f6f;">
                            <tr>
                                <th class="cantidad">CANT</th>
                                <th class="producto">PRODUCTO</th>
                                <th class="precio">S/.</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php while ($dataDetCompra = $DetCompra->fetch_object()) { ?>
                            <tr>
                                <td class="cantidad"><?php echo $dataDetCompra->Cantidad?></td>
                                <td class="producto"><?php echo $dataDetCompra->No_Producto." - ".$dataDetCompra->No_Presentacion?></td>
                                <td class="precio">S/.<?php echo $dataDetCompra->Precio_Total?></td>
                            </tr>
                             <?php } ?>
                            <tr style="border-top: solid 2px #6a6f6f;">
                                <td class="cantidad"></td>
                                <td class="producto">TOTAL</td>
                                <td class="precio">S/.<?php echo $dataCompra->Compra_Total ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
                    <br><p class="centrado">¡Compra de Productos registrados!</p>

            </div>
            <a class=" btn btn-lg btn-success oculto-impresion" href="ProcesoCompra.php">Nueva Compra</a>
        </body>
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                window.print();
            });
        </script>
    </html>
    <?php
}
?>