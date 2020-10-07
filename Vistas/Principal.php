<?php
session_start();
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
                    <li ><a href="#Productos" data-toggle="collapse"><i class="fa fa-cubes"></i> Productos</a>
                        <ul id="Productos" class="list-unstyled collapse">
                            <li><a href="CRUD_Productos.php" target="myframe"><i class="fa fa-angle-double-right"></i> CRUD de Productos</a></li>
                            <li><a href="CRUD_Categorias.php" target="myframe"><i class="fa fa-angle-double-right"></i> CRUD de Categorías de Productos</a></li>
                            <li><a href="CRUD_Presentacion.php" target="myframe"><i class="fa fa-angle-double-right"></i> CRUD de Presentacion de Productos</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-archway"></i> Locales</a></li>
                    <li><a href="#"><i class="fa fa-id-card"></i> Proveedores </a></li>
                    <li><a href="#"><i class="fa fa-users-cog"></i> Clientes </a></li>
                    <li><a href="#"><i class="fa fa-users"></i> Empleados </a></li>
                    <li><a href="#"><i class="fa fa-table"></i> Tablas Secundarias </a></li>

                    <li>
                        <a href="#sm_examples" data-toggle="collapse">
                            <i class="fa fa-fw fa-lightbulb"></i> Reportes
                        </a>
                        <ul id="sm_examples" class="list-unstyled collapse">
                            <li><a href="https://bootadmin.net/demo/examples/blank">Reporte de Ventas</a></li>
                            <li><a href="https://bootadmin.net/demo/examples/pricing">Reporte de Compras</a></li>
                            <li><a href="https://bootadmin.net/demo/examples/invoice"></a></li>
                            <li><a href="https://bootadmin.net/demo/examples/faq">FAQ</a></li>
                            <li><a href="https://bootadmin.net/demo/examples/login">Login</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#sm_base" data-toggle="collapse">
                            <i class="fa fa-fw fa-cube"></i> Base
                        </a>
                        <ul id="sm_base" class="list-unstyled collapse">
                            <li><a href="https://bootadmin.net/demo/base/colors">Colors</a></li>
                            <li><a href="https://bootadmin.net/demo/base/typography">Typography</a></li>
                            <li><a href="https://bootadmin.net/demo/base/tables">Tables</a></li>
                            <li><a href="https://bootadmin.net/demo/base/progress">Progress</a></li>
                            <li><a href="https://bootadmin.net/demo/base/modal">Modal</a></li>
                            <li><a href="https://bootadmin.net/demo/base/alerts">Alerts</a></li>
                            <li><a href="https://bootadmin.net/demo/base/popover">Popover</a></li>
                            <li><a href="https://bootadmin.net/demo/base/tooltip">Tooltip</a></li>
                            <li><a href="https://bootadmin.net/demo/base/dropdown">Dropdown</a></li>
                            <li><a href="https://bootadmin.net/demo/base/navs">Navs</a></li>
                            <li><a href="https://bootadmin.net/demo/base/collapse">Collapse</a></li>
                            <li><a href="https://bootadmin.net/demo/base/lists">Lists</a></li>
                        </ul>
                    </li>
                    <li><a href="https://bootadmin.net/demo/icons"><i class="fa fa-fw fa-flag"></i> Icons</a></li>
                    <li><a href="https://bootadmin.net/demo/buttons"><i class="fa fa-fw fa-toggle-on"></i> Buttons</a></li>
                    <li class="active"><a href="https://bootadmin.net/demo/forms"><i class="fa fa-fw fa-edit"></i> Forms</a></li>
                    <li><a href="https://bootadmin.net/demo/datatables"><i class="fa fa-fw fa-table"></i> Datatables</a></li>
                    <li><a href="https://bootadmin.net/demo/cards"><i class="fa fa-fw fa-address-card"></i> Cards</a></li>
                    <li><a href="https://bootadmin.net/demo/calendar"><i class="fa fa-fw fa-calendar-alt"></i> Calendar</a></li>
                    <li><a href="https://bootadmin.net/demo/charts"><i class="fa fa-fw fa-chart-pie"></i> Charts</a></li>
                    <li><a href="https://bootadmin.net/demo/maps"><i class="fa fa-fw fa-map-marker-alt"></i> Maps</a></li>
                    <li>
                        <a href="#sm_examples1" data-toggle="collapse">
                            <i class="fa fa-fw fa-lightbulb"></i> Examples
                        </a>
                        <ul id="sm_examples1" class="list-unstyled collapse">
                            <li><a href="https://bootadmin.net/demo/examples/blank">Blank/Starter</a></li>
                            <li><a href="https://bootadmin.net/demo/examples/pricing">Pricing</a></li>
                            <li><a href="https://bootadmin.net/demo/examples/invoice">Invoice</a></li>
                            <li><a href="https://bootadmin.net/demo/examples/faq">FAQ</a></li>
                            <li><a href="https://bootadmin.net/demo/examples/login">Login</a></li>
                        </ul>
                    </li>
                    <li><a href="https://bootadmin.net/demo/docs" target="myframe"><i class="fa fa-fw fa-book"></i> Ejemplos</a></li>

                </ul>
            </div>

            <div class="content p-4">
                <iframe id="myframe" name="myframe"  style="display:"  class="iframe_principal" scrolling="si"  width="100%" height="800" frameborder="0"  style="background-color: #002752"></iframe>

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