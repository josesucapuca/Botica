<?php
require_once '../DAO/EmpresaDAO.php';
$EmpresaDAO = new EmpresaDAO();
$Empresa = $EmpresaDAO->ListarEmpresa();
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.min.css">
        <link rel="stylesheet" href="css/datatables.min.css">
        <link rel="stylesheet" href="css/fullcalendar.min.css">
        <link rel="stylesheet" href="css/bootadmin.min.css">
        <style>
            .custom-combobox {
                position: relative;
                display: inline-block;
            }
            .custom-combobox-toggle {
                position: absolute;
                top: 0;
                bottom: 0;
                margin-left: -1px;
                padding: 0;
            }
            .custom-combobox-input {
                margin: 0;
                padding-top: 2px;
                padding-bottom: 5px;
                padding-right: 5px;
            }
        </style>
        <title>Login | BootAdmin</title>
    </head>
    <body class="bg-light" style="background-image: url(img/fon.jpg) !important;background-size: 100% 100%;">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-4">
                    <h1 class="text-center mb-4">Logueo</h1>
                    <div class="card" style="-webkit-border-radius: 10px 10px 0px 0px; border: 0px;">
                        <img src="img/logo.jpeg" style="-webkit-border-radius: 10px 10px 0px 0px;
                             max-height: 100px;">
                    </div>
                    <div class="card" style="background-image: url(img/locoConsultora.jpg);border-radius: 0px;">
                        <div class="card-body">
                            <form id="ingresar" name="formLogueo" >
                                <div id="ValiInvalido" class=" input-group mb-3 alert alert-danger" role="alert" style="display: none">
                                    ¡Contraseña o Usuario Incorrecto!
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input id="usuario" type="text" name="usuario" class="form-control" placeholder="Usuario">
                                    <div id="usu_vacio" class="invalid-feedback" style="display: none">
                                        Ingresar Usuario
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input id="password" name="password" type="password" name="" class="form-control" placeholder="Contraseña">
                                    <div id="pass_vacio" class="invalid-feedback" style="display: none">
                                        Ingresar contraseña
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-store"></i></span>
                                    </div>
                                    <input id="Name_Empresa" list="browsers" name="Empresa" class="form-control" placeholder="Seleccion Empresa">
                                    <datalist id="browsers"  >
                                        <?php while ($datEmpresa = $Empresa->fetch_object()) { ?>
                                            <option value="<?php echo $datEmpresa->No_Empresa ?>">
                                            <?php } ?>

                                    </datalist>
                                    <div id="Empvacio" class="invalid-feedback" style="display: none">
                                        Seleccionar Empresa
                                    </div>
                                </div>
                                <div id="Aviso" class="alert alert-warning" role="alert" style="display: none">

                                </div>

                                <div class="row">
                                    <div class="col pr-2">
                                        <button id="btn_Enviar" type="button" class="btn btn-block btn-primary">Ingresar</button>
                                    </div>
                                    <div class="col pl-2">
                                        <a class="btn btn-block btn-link" href="#">¿Sete olvido la contraseña?</a>
                                    </div>
                                </div>
                                <div class="alert alert-warning" role="alert" id="NroIntentos" style="display: none">

                                </div>
                                <input id="opc" name="opcion" type="hidden" value="validarUsuario">
                            </form>
                        </div>
                    </div>
                    <div class="card" style="-webkit-border-radius: 0px 0px 10px 10px; border: 0px;">
                        <img src="img/logoconsul.jpg" style="-webkit-border-radius: 0px 0px 10px 10px ;
                             max-height: 100px;">
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
                var intentos = 0;
                var Usuario;
                var Password;
                var Empresa;
                function Validar() {

                    Usuario = $("#usuario").val();
                    Password = $("#password").val();
                    Empresa = $("#Name_Empresa").val();
                    if (Usuario !== "" && Password !== "" && Empresa !== "") {
                        ValidarUsuario();
                    } else {
                        if (Usuario === "") {
                            document.getElementById('usuario').className = "form-control is-invalid";
                            document.getElementById('usu_vacio').style = "display:block";
                        } else {
                            document.getElementById('usuario').className = "form-control is-valid";
                            document.getElementById('usu_vacio').style = "display:none";
                        }
                        if (Password === "") {
                            document.getElementById('password').className = "form-control is-invalid";
                            document.getElementById('pass_vacio').style = "display:block";
                        } else {
                            document.getElementById('password').className = "form-control is-valid";
                            document.getElementById('pass_vacio').style = "display:none";
                        }
                        if (Empresa === "") {
                            document.getElementById('Name_Empresa').className = "form-control is-invalid";
                            document.getElementById('Empvacio').style = "display:block";
                        } else {
                            document.getElementById('Name_Empresa').className = "form-control is-valid";
                            document.getElementById('Empvacio').style = "display:none";
                        }
                    }
                }
                function consulta() {
                    $.ajax({
                        type: "POST",
                        url: '../Controlador/Logueo.php',
                        data: $("#ingresar").serialize(),
                        success: function (response)
                        {

                            if (response === "null" || response === null || response === "") {
                                intentos++;
                                $("#Aviso").empty();
                                $("#Aviso").append("Es el intento nro " + intentos);
                                document.getElementById('Aviso').style = "display:block;text-align:center;";
                                document.getElementById('ValiInvalido').style = "display:block";
                            } else {
                                location.href = "Principal.php"
                            }
                        }
                    });
                }
                function ValidarUsuario() {
                    if (intentos === 2) {
                        var opcalert = confirm("Es el tercer intento, si Falla el Usuario se Bloqueara ¿Estas seguro de continuar?");
                        if (opcalert === true) {
                            consulta();
                        } else {
                        }
                    } else {
                        consulta();
                    }
                }
                $("#btn_Enviar").click(function () {
                    Validar();
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                /*$("#Name_Empresa").change(function () {
                 ListarLocal();
                 });*/

                //LISTAR obJETOS
                /*function ListarLocal() {
                 $.ajax({
                 type: "POST",
                 url: '../Controlador/Local.php',
                 data: {opc: "ListarProductobyEmpresa", Empresa: $("#Name_Empresa").val()},
                 success: function (response)
                 {
                 
                 if (response === null) {
                 
                 } else {
                 var html;
                 var opciones = $("#browser2");
                 opciones.empty();
                 var jsonData = JSON.parse(response);
                 var json1 = [jsonData]
                 for (var i = 0; i < json1.length; i++) {
                 html += "<option value=" + json1[i].No_Local + ">";
                 }
                 opciones.append(html);
                 }
                 
                 }
                 });
                 }*/

            });
        </script>
    </body>
</html>