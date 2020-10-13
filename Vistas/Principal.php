<?php
session_start();
if ($_SESSION["Usuario"] !== null) {
    ?>
    <!doctype html>
    <html >
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css" >
            <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.min.css" >
            <link rel="stylesheet" href="css/datatables.min.css">
            <link rel="stylesheet" href="css/fullcalendar.min.css">
            <link rel="stylesheet" href="css/bootadmin.min.css">
            <title>Principal | </title>
        </head>
        <body class="bg-light">

            <nav class="navbar navbar-expand navbar-dark bg-primary" style="background-color: #0d790d!important;">
                <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
                <a class="navbar-brand" href="https://bootadmin.net">Farmacia</a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "Nombre de usuario: " . $_SESSION["Empleado"]; ?></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="d-flex">
                <div class="sidebar sidebar-dark bg-dark" style="position: -webkit-sticky;position: sticky;top: 0;">
                    <div style="padding: 15px;display:flex;align-items: center;">
                        <img src="img/1.png" >
                    </div>
                    <ul class="list-unstyled">

                        <li><a href="Principal.php"><i class="fa fa-fw fa-tachometer-alt"></i> Pagina de Inicio</a>
                        </li>
                        <?php
                        if ($_SESSION["Nivel_Usuario"] === '1') {
                            ?>
                            <li><a href="#Productos" data-toggle="collapse"><i class="fa fa-cubes"></i> Productos</a>
                                <ul id="Productos" class="list-unstyled collapse">
                                    <li><a href="CRUD_Productos.php" target="myframe"><i class="fa fa-angle-double-right"></i> Mantenimiento de Productos</a></li>
                                    <li><a href="CRUD_Categorias.php" target="myframe"><i class="fa fa-angle-double-right"></i> Mantenimiento de Categorías de Productos</a></li>
                                    <li><a href="CRUD_Presentacion.php" target="myframe"><i class="fa fa-angle-double-right"></i> Mantenimiento de Presentacion de Productos</a></li>
                                    <li><a href="CRUD_Proveedor.php" target="myframe"><i class="fa fa-angle-double-right"></i> Mantenimiento de Proveedor de Productos</a></li>
                                </ul>
                            </li>
                            <li><a href="CRUD_Proveedor.php" target="myframe"><i class="fa fa-cubes"></i> Mantenimiento de Stock</a>
                            </li>
                            <li><a href="#"><i class="fa fa-archway"></i> Locales</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="#"><i class="fa fa-users-cog"></i> Clientes </a></li>
                        <?php
                        if ($_SESSION["Nivel_Usuario"] === '1') {
                            ?>
                            <li><a href="#TalHumano" data-toggle="collapse"><i class="fa fa-user-check"></i> Talento Humnao</a>
                                <ul id="TalHumano" class="list-unstyled collapse">
                                    <li><a href="CRUD_Empleados.php" target="myframe"><i class="fa fa-angle-double-right"></i> Mantenimiento de Empleados</a></li>
                                    <li><a href="CRUD_Productos.php" target="myframe"><i class="fa fa-angle-double-right"></i> Manteniento de Usuarios</a></li>
                                </ul>
                            </li>
                            <li ><a href="#TabSec" data-toggle="collapse"><i class="fa fa-table"></i> Tablas Secundarias</a>
                                <ul id="TabSec" class="list-unstyled collapse">
                                    <li><a href="CRUD_Productos.php" target="myframe"><i class="fa fa-angle-double-right"></i> Mantenimiento de Distritos</a></li>
                                    <li><a href="CRUD_Categorias.php" target="myframe"><i class="fa fa-angle-double-right"></i> Mantenimiento de Usuarios</a></li>
                                    <li><a href="CRUD_Presentacion.php" target="myframe"><i class="fa fa-angle-double-right"></i> CRUD de Presentacion de Productos</a></li>
                                    <li><a href="CRUD_Proveedor.php" target="myframe"><i class="fa fa-angle-double-right"></i> CRUD de Proveedor de Productos</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#sm_examples" data-toggle="collapse">
                                    <i class="fa fa-fw fa-clipboard-list"></i> Reportes
                                </a>
                                <ul id="sm_examples" class="list-unstyled collapse">
                                    <li><a href="" target="myframe"> <i class="fa fa-angle-double-right"></i> Modificaciones por Usuarios</a></li>
                                    <li><a href="" target="myframe"><i class="fa fa-angle-double-right"></i> Ventas por Fecha</a></li>
                                    <li><a href="" target="myframe"><i class="fa fa-angle-double-right"></i> Compras por Fecha</a></li>

                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                        <li><a href="#"><i class="fa fa-archway"></i> Generar Compra </a></li>
                        <li><a href="#"><i class="fa fa-archway"></i> Generar Venta </a></li>
                        <li><a href="#"><i class="fa fa-archway"></i> Ver Stock de Productos </a></li>
                    </ul>
                </div>

                <div class="content p-4" style="    padding: 0px !important;">
                    <iframe id="myframe" name="myframe"  style="display:"  class="iframe_principal" scrolling="si"  width="100%" height="800" frameborder="0"  style="background-color: #002752" src="Inicio.php"></iframe>

                </div>
            </div>

            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/datatables.min.js"></script>
            <script src="js/moment.min.js"></script>
            <script src="js/fullcalendar.min.js"></script>
            <script src="js/bootadmin.min.js"></script>

        </body>
    </html>
    <?php
} else {
    ?>
    <script type="text/javascript">

        location.href = "VistaLogueo.php"

    </script>
    <?php
}
?>