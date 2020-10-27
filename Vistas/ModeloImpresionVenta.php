<?php
require_once '../DAO/VentaDAO.php';
$idVenta = $_GET["id"];
session_start();
$VentaDAO = new VentaDAO();
$Venta = $VentaDAO->ListaVentaById($idVenta);
$DetVenta = $VentaDAO->ListaDetalleVentaById($idVenta);

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
                <?php while ($dataVenta = $Venta->fetch_object()) { ?>
                    <img
                        src="img/logo.png"
                        alt="Logotipo" style=" filter: grayscale(1);">
                    <p class="centrado" > BioFarma<br></p>
                    <p style="text-align: left;padding-left: 4px">
                        Cod. Venta: 0000<?php echo $dataVenta->id_Venta ?>
                        <br><?php echo $dataVenta->No_Cliente." ".$dataVenta->Ape_Cliente ?>
                        <br>Fecha: <?php echo $dataVenta->Fe_Venta ?><p>

                    <table>
                        <thead>
                            <tr>
                                <th class="cantidad">CANT</th>
                                <th class="producto">PRODUCTO</th>
                                <th class="precio">S/.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($dataDetVenta = $DetVenta->fetch_object()) { ?>
                            <tr>
                                <td class="cantidad"><?php echo $dataDetVenta->Cant_Producto ?></td>
                                <td class="producto"><?php echo $dataDetVenta->No_Producto." - ".$dataDetVenta->No_Presentacion ?></td>
                                <td class="precio">S/.<?php echo $dataDetVenta->Precio_Total ?></td>
                            </tr>
                            <?php }?>
                            <tr>
                                <td class="cantidad"></td>
                                <td class="producto">TOTAL</td>
                                <td class="precio">S/.<?php echo $dataVenta->Total_Venta ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
                <p class="centrado">¡GRACIAS POR SU COMPRA!

            </div>
            <a class=" btn btn-lg btn-success oculto-impresion" href="ProcesoVenta.php">Nueva Venta</a>
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