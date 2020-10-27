<?php
require_once '../DAO/ProductoDAO.php';
require_once '../DAO/LocalDAO.php';
require_once '../DAO/ClienteDAO.php';
session_start();
$ProductoDAO = new ProductoDAO();
$Producto = $ProductoDAO->ListaProductoProcCompByEmpresa($_SESSION["id_Empresa"]);
$LocalDAO = new LocalDAO();
$Local = $LocalDAO->ListarLocalByEmpresa($_SESSION["id_Empresa"]);
$ClienteDAO = new ClienteDAO();
$ClienteP = $ClienteDAO->ListaClientePersonaByEmpresa($_SESSION["id_Empresa"]);
$ClienteE = $ClienteDAO->ListaClienteEmpresaByEmpresa($_SESSION["id_Empresa"]);

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
                #ClienteE_chosen{
                    width: 100% !important;
                }
                #ClienteP_chosen{
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
                    #radio {
                        width: 100% !important;
                    }
                    #radio2 {
                        width: 100% !important;
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
            <div class="content" >
                <div class="card-body" >
                    <div style="text-align: center">
                        <h1 class="mb-4">Venta de Productos</h1>
                    </div>
                    <div class="form-row"  >
                        <div class=" mb-2 form-row" id="radio" style="
                             border: dashed 1px green;
                             padding-right: 0px;
                             margin-left: 2.5px;
                             padding-left: 0px;
                             margin-left: 1px;
                             width: 49.6%;
                             border-radius: 10px;
                             padding-top: 10px;
                             ">
                            <div class="col-md-12 mb-2 " style="text-align: center">
                                <h5>cliente</h5>
                            </div>
                            <div class="col-md-6 mb-3" style="text-align: center">
                                <input type="radio" id="Antiguo" name="prCliente" value="Antiguo" checked="">
                                <label for="Antiguo">Cliente Antiguo</label><br>

                            </div>
                            <div class="col-md-6 mb-3" style="text-align: center">
                                <input type="radio" id="Nuevo" name="prCliente" value="Nuevo" >
                                <label for="Nuevo">Cliente Nuevo</label>
                            </div>
                        </div>
                        <div class=" mb-2 form-row" id="radio2" style="
                             border: dashed 1px green;
                             padding-left: 0px;
                             margin-left: 2.5px;
                             padding-right: 0px;
                             margin-right: 1px;
                             width: 49.6%;
                             border-radius: 10px;
                             padding-top: 10px;
                             ">
                            <div class="col-md-12 mb-2 " style="text-align: center">
                                <h5>Tipos de Cliente</h5>
                            </div>
                            <div class="col-md-6 mb-3" style="text-align: center">
                                <input type="radio" id="Persona" name="TiCliente" value="1" checked="">
                                <label for="male">Persona</label>
                            </div>
                            <div class="col-md-6 mb-3" style="text-align: center">
                                <input type="radio" id="Empresa" name="TiCliente" value="2" >
                                <label for="female">Empresa</label><br>
                            </div>

                        </div>
                    </div>
                    <div class="form-row" style="border: dashed 1px green;border-radius: 10px;margin-bottom: 10px;padding: 10px 0px 0px 0px;">

                        <div class="col-md-7 mb-3" id="ClP">
                            <label for="validationServer01">Clientes (Personas)</label><br>
                            <select class="form-control" name="ClienteP" id="ClienteP" required="" style="background: white">
                                <option value="">SELECCIONAR</option>
                                <?php while ($dataClientep = $ClienteP->fetch_object()) {
                                    ?>
                                    <option value="<?php echo $dataClientep->id_Cliente ?>"><?php echo $dataClientep->No_Cliente ?> - <?php echo $dataClientep->Dni_Cliente ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <div id="CPValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="CPInValid" class="invalid-feedback" style="display: none">
                                Seleccionar Proveedor
                            </div>
                        </div>
                        <div class="col-md-7 mb-3" id="ClE" style="display: none">
                            <label for="validationServer01">Clientes (Empresas)</label><br>
                            <select class="form-control" name="ClienteE" id="ClienteE" required="" style="background: white">
                                <option value="">SELECCIONAR</option>
                                <?php while ($dataClienteE = $ClienteE->fetch_object()) {
                                    ?>
                                    <option value="<?php echo $dataClienteE->id_Cliente ?>"><?php echo $dataClienteE->No_Cliente ?> - <?php echo $dataClienteE->RUC ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <div id="CEValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="CEInValid" class="invalid-feedback" style="display: none">
                                Seleccionar Proveedor
                            </div>
                        </div>
                        <div class="col-md-7 mb-3" style="display: none;" id="Emp">
                            <label for="validationServer01">Empresa</label><br>
                            <input class="form-control" type="text" id="EmpN" name="EmpN" placeholder="Empresa">
                            <div id="ENValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="ENInValid" class="invalid-feedback" style="display: none">
                                Ingresar Nombre Empresa
                            </div>
                        </div>
                        <div class="col-md-3 mb-3" style="display: none;" id="no">
                            <label for="validationServer01">Nombres</label><br>
                            <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Nombres">
                            <div id="NPValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="NPInValid" class="invalid-feedback" style="display: none">
                                Ingresar Nombre
                            </div>
                        </div>
                        <div class="col-md-3 mb-3" style="display: none;" id="ap">
                            <label for="validationServer01">Apellidos</label><br>
                            <input class="form-control" type="text" id="Apellido" name="Apellido" placeholder="Apellidos">
                            <div id="APValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="APInValid" class="invalid-feedback" style="display: none">
                               Ingresar Apellido
                            </div>
                        </div>
                        <div class="col-md-1 mb-3" style="display: none;" id="se">
                            <label for="validationServer01">Sexo</label><br>
                            <select class="form-control" id="sexo" name="sexo">
                                <option value="">Seleccionar</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                            <div id="SPValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="SPInValid" class="invalid-feedback" style="display: none">
                                Seleccionar Sexo
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Local</label>
                            <select class="form-control" name="Local" id="Local" required="" style="background: white" disabled="">
                                <option value="">Seleccionar</option>
                                <?php while ($dataLocal = $Local->fetch_object()) {
                                    ?>
                                    <?php if ($dataLocal->id_Local === $_SESSION["id_local"]) { ?>
                                        <option value="<?php echo $dataLocal->id_Local ?>" selected=""><?php echo $dataLocal->No_Local ?> - <?php echo $dataLocal->Dir_Local ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $dataLocal->id_Local ?>"><?php echo $dataLocal->No_Local ?> - <?php echo $dataLocal->Dir_Local ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <div id="LocValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="LocInValid" class="invalid-feedback" style="display: none">
                                Seleccionar Local
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Tipo de Venta</label>
                            <select class="form-control" name="TipoVenta" id="TipoVenta" required="" style="background: white">
                                <option value="">Seleccionar</option>
                                <option value="1">Boleta</option>
                                <option  value="2">Factura</option>
                            </select>
                            <div id="TVValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="TVInValid" class="invalid-feedback" style="display: none">
                                Selecionar Tipo de Venta
                            </div>
                        </div>
                        <div class="col-md-6 mb-3" id="dnic">
                            <label for="validationServer01">DNI</label>
                            <input class="form-control" type="number" min="0" id="DNI" name="DNI" placeholder="DNI" max="999999999999">
                            <div id="DNIValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="DNIInValid" class="invalid-feedback" style="display: none">
                                Selecionar Estado
                            </div>
                        </div>
                        <div class="col-md-6 mb-3" id="Rucc" style="display: none;">
                            <label for="validationServer01">RUC</label>
                            <input class="form-control" type="number" min="0" id="RUC" name="RUC" placeholder="RUC" max="999999999999">

                            <div id="RUCValid" class="valid-feedback" style="display: none">
                                Valido
                            </div>
                            <div id="RUCInValid" class="invalid-feedback" style="display: none">
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
                                    <tr><td style="font-weight: 600;">Stock:  </td>
                                        <td id="NroStock" style="font-weight: 600;">
                                            <input type="number" id="st" name="st" disabled="">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div id="ProInValid" class="invalid-feedback" style="display: none">
                                Seleccionar Producto
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
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
                                    <button class="form-control btn-block  btn-primary" style="margin-top: 10px;" id="btn_Registrar_Venta">Registrar Venta</button>
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
            <script src="js/chosen.jquery.min.js"></script>
            <script src="js/Venta/ProcesoVenta.js"></script>
            <script type="text/javascript">

                $(".chosen").chosen();
                $("#Proveedor").chosen();
                $("#ClienteP").chosen();
                $("#ClienteE").chosen();
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

            <script type="text/javascript">
                $(document).ready(function () {
                    var input = document.getElementById('RUC');
                    input.addEventListener('input', function () {
                        if (this.value.length > 15)
                            this.value = this.value.slice(0, 15);
                    });
                    $("#TipoVenta").change(function () {
                        if ($("#TipoVenta").val() === "2") {
                            $("#Rucc").css("display", "block");
                        } else {
                            if ($('input:radio[name=TiCliente]:checked').val() === "1") {
                                $("#Rucc").css("display", "none");
                            }
                            if ($('input:radio[name=TiCliente]:checked').val() === "2") {
                                $("#Rucc").css("display", "block");
                            }
                        }
                    });
                    $("#radio input:radio").click(function () {
                        if ($('input:radio[name=prCliente]:checked').val() === "Antiguo"
                                && $('input:radio[name=TiCliente]:checked').val() === "1") {
                            $("#ClP").css("display", "block");
                            $("#ClE").css("display", "none");
                            $("#no").css("display", "none");
                            $("#ap").css("display", "none");
                            $("#se").css("display", "none");
                            $("#Emp").css("display", "none");
                            if ($("#TipoVenta").val() === "2") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "1") {
                                $("#Rucc").css("display", "none");
                            }
                            $("#dnic").css("display", "block");
                        }
                        if ($('input:radio[name=prCliente]:checked').val() === "Nuevo"
                                && $('input:radio[name=TiCliente]:checked').val() === "1") {
                            $("#ClP").css("display", "none");
                            $("#ClE").css("display", "none");
                            $("#no").css("display", "block");
                            $("#ap").css("display", "block");
                            $("#se").css("display", "block");
                            $("#Emp").css("display", "none");
                            if ($("#TipoVenta").val() === "2") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "1") {
                                $("#Rucc").css("display", "none");
                            }
                            $("#dnic").css("display", "block");
                        }
                        if ($('input:radio[name=prCliente]:checked').val() === "Antiguo"
                                && $('input:radio[name=TiCliente]:checked').val() === "2") {
                            $("#ClP").css("display", "none");
                            $("#ClE").css("display", "block");
                            $("#no").css("display", "none");
                            $("#ap").css("display", "none");
                            $("#se").css("display", "none");
                            $("#Emp").css("display", "none");
                            if ($("#TipoVenta").val() === "2") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "1") {
                                $("#Rucc").css("display", "block");
                            }
                            $("#dnic").css("display", "none");
                        }
                        if ($('input:radio[name=prCliente]:checked').val() === "Nuevo"
                                && $('input:radio[name=TiCliente]:checked').val() === "2") {
                            $("#ClP").css("display", "none");
                            $("#ClE").css("display", "none");
                            $("#no").css("display", "none");
                            $("#ap").css("display", "none");
                            $("#se").css("display", "none");
                            $("#Emp").css("display", "block");
                            if ($("#TipoVenta").val() === "2") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "1") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "") {
                                $("#Rucc").css("display", "block");
                            }
                            $("#dnic").css("display", "none");
                        }
                    });
                    $("#radio2 input:radio").click(function () {
                        if ($('input:radio[name=prCliente]:checked').val() === "Antiguo"
                                && $('input:radio[name=TiCliente]:checked').val() === "1") {
                            $("#ClP").css("display", "block");
                            $("#ClE").css("display", "none");
                            $("#no").css("display", "none");
                            $("#ap").css("display", "none");
                            $("#se").css("display", "none");
                            $("#Emp").css("display", "none");
                            if ($("#TipoVenta").val() === "2") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "1") {
                                $("#Rucc").css("display", "none");
                            }
                            if ($("#TipoVenta").val() === "") {
                                $("#Rucc").css("display", "none");
                            }
                            $("#dnic").css("display", "block");
                        }
                        if ($('input:radio[name=prCliente]:checked').val() === "Nuevo"
                                && $('input:radio[name=TiCliente]:checked').val() === "1") {
                            $("#ClP").css("display", "none");
                            $("#ClE").css("display", "none");
                            $("#no").css("display", "block");
                            $("#ap").css("display", "block");
                            $("#se").css("display", "block");
                            $("#Emp").css("display", "none");
                            if ($("#TipoVenta").val() === "2") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "1") {
                                $("#Rucc").css("display", "none");
                            }
                            $("#dnic").css("display", "block");
                        }
                        if ($('input:radio[name=prCliente]:checked').val() === "Antiguo"
                                && $('input:radio[name=TiCliente]:checked').val() === "2") {
                            $("#ClP").css("display", "none");
                            $("#ClE").css("display", "block");
                            $("#no").css("display", "none");
                            $("#ap").css("display", "none");
                            $("#se").css("display", "none");
                            $("#Emp").css("display", "none");
                            if ($("#TipoVenta").val() === "2") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "1") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "") {
                                $("#Rucc").css("display", "block");
                            }
                            $("#dnic").css("display", "none");
                        }
                        if ($('input:radio[name=prCliente]:checked').val() === "Nuevo"
                                && $('input:radio[name=TiCliente]:checked').val() === "2") {
                            $("#ClP").css("display", "none");
                            $("#ClE").css("display", "none");
                            $("#no").css("display", "none");
                            $("#ap").css("display", "none");
                            $("#se").css("display", "none");
                            $("#Emp").css("display", "block");
                            if ($("#TipoVenta").val() === "2") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "1") {
                                $("#Rucc").css("display", "block");
                            }
                            if ($("#TipoVenta").val() === "") {
                                $("#Rucc").css("display", "block");
                            }
                            $("#dnic").css("display", "none");
                        }
                    });
                    
                    $("#Producto").chosen().change(function () {
                        ListarPresentacion($("#Producto").val());
                        $("#ProInValid").css("display", "none");
                        
                    });
                    $("#ClienteP").chosen().change(function () {
                        ListarClienteById($("#ClienteP").val());
                        $("#ProInValid").css("display", "none");
                    });
                    $("#ClienteE").chosen().change(function () {
                        ListarClienteById($("#ClienteE").val());
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